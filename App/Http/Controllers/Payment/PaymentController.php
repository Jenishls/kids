<?php

namespace App\Http\Controllers\Payment;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Payment;
use App\Lib\Filter\PaymentFilter;

class PaymentController extends Controller
{
	protected $path= 'supportNew.pages.payment.';
   /**
   * Content Controller operates in the content table(Model)
   */
   /**
   * Index function returns the main View(table view)
   * @param - NULL
   * @return - index page rendered view.
   */
   public function index()
   {
   	return view($this->path.'index');
   }
   public function view(Payment $payment)
   {
    return view($this->path.'view',compact('payment'));
   }
   /**
   * list function returns the data to dateTable(JSON)
   * @param - Request object
   * @return - JSON Data(for Datatable)
   */
   public function list(Request $request)
   {
     $page = $request->pagination['page'] ?: 1;
     $perPage = $request->pagination['perpage'] ?: 50;
     $offset = ($page - 1) * $perPage;
     if ($request->sort) {
         $sort = $request->sort['sort'];
         $field = $request->sort['field'];
     } else {
         $sort = '';
         $field = '';
     }
     $query = Payment::with('order')->select('*')->where("is_deleted", 0);
     $query->when($request->sort, function ($q, $sort) use ($request) {
         return $q->orderBy($sort['field'], $sort['sort']);
     });
     $queryFilter = new PaymentFilter($request);
     $queryBuilder = $queryFilter->getQuery($query);
     $total = $queryBuilder->count();
     $paginatedBuilder =  $queryBuilder->limit($perPage)
         ->offset($offset);
     $data['meta'] = [
         "page" => $request->pagination["page"],
         "pages" => ceil($total / $perPage),
         "perpage" => $perPage,
         "total" => $total,
         "sort" => $sort,
         "field" => $field,
     ];
     $data['data'] = $paginatedBuilder->get();
     return response()->json($data);
   }

   public function edit(Payment $payment)
   {
      return view($this->path.'modal.edit',compact('payment'));
   }
   public function cardDetail(Payment $payment)
   {
    return view($this->path.'modal.cardDetails',compact('payment'));
   }

   public function update(Request $request, Payment $payment)
   {
   //    $rules = validation_value('edit_payments_form');
   //    $this->validate($request, $rules);
      $updated = $payment->update($this->RequestFields($request));
      if($updated)
      {
         return response(['success' => 'Updated Payment Successfully']);
      }
   }

   public function RequestFields(Request $request)
   {
      return $request->only([
         'order_id',
         'gateway',
         'cr_last4',
         'cr_exp_month',
         'cr_exp_year',
         'transaction_id',
         'card_last_name',
         'billing_zip_code',
         'amount',
         'reference'
      ]);
   }
}
