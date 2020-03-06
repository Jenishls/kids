<?php

namespace App\Http\Controllers\Client;

use Carbon\Carbon;
use App\Model\Order;
use App\Model\Client;
use App\Model\Address;
use App\Model\Company;
use App\Model\Contact;
use App\Model\CompanyClient;
use Illuminate\Http\Request;
use App\Lib\Filter\ClientFilter;
use App\Http\Controllers\Controller;
use App\Lib\Filter\PaymentFilter;
use App\Lib\Filter\OrderFilter;

class ClientController extends Controller
{
    public function index()
    {
        return view(default_template() . ".pages.client.index");
    }

    public function client(Request $request)
    {
        // dd($request->all());
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
        $query = Client::where("is_deleted", 0);
        $query->when($request->sort, function ($q, $sort) use ($request) {
            return $q->orderBy($sort['field'], $sort['sort']);
        });
        $queryFilter = new ClientFilter($request);
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

    public function paymentData(Request $request, Client $client)
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
        $query = $client->payments();
        $query->when($request->sort, function ($q, $sort) use ($request) {
            return $q->orderBy($sort['field'], $sort['sort']);
        });
        $queryFilter = new PaymentFilter($request);
        $queryBuilder = $queryFilter->getQuery($query);
        $total = $queryBuilder->count();
        // $paginatedBuilder =  $queryBuilder->limit($perPage)
            // ->offset($offset);
        $data['meta'] = [
            "page" => $request->pagination["page"],
            "pages" => ceil($total / $perPage),
            "perpage" => $perPage,
            "total" => $total,
            "sort" => $sort,
            "field" => $field,
        ];
        $data['data'] = $queryBuilder;
        return response()->json($data);

    }

    /**
     * 
     * Update Company Association
     */
    public function companyEditModal(Request $request, Client $client)
    {
        return view('supportNew.pages.client.modal.edit_company',compact('client'));
    }
      /**
     * 
     * View Client Profile
     */
    public function clientProfile(int $id)
    {
        $client = Client::with(['address','contact'])->find($id);
        $company= $client->companies->first();
        return view(default_template() . '.pages.client.inc.client_profile_view', [
            'client' => $client,
            'company' => $company,
            /** @todo asynchrnous  */
            // 'smsLogs' => $client->getSmsLogs()
            'smsLogs' => []
        ]);
    }

    public function validateFormSteps(Request $request, string $form)
    {
        $customMessage=[
            '*.required'=>'This Field is required.'
        ];
        $rules = validation_value($form);
        $this->validate($request, $rules,$customMessage);
        return response()->json($request);
    }

    public function processAttachments(Request $request)
    {
        $path = storage_path('client/attachments');

        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }
        $file = $request->file('attachment');
        $name = uniqid() . '_' . trim($file->getClientOriginalName());
        $file->move($path, $name);
        return response()->json([
            'name'          => $name,
            'original_name' => $file->getClientOriginalName(),
        ]);
    }

    public function orderData(Client $client, Request $request)
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
        $query = Order::where(['is_deleted' => 0, 'client_id' => $client->id]);
        $query->when($request->sort, function ($q, $sort) use ($request) {
            return $q->orderBy($sort['field'], $sort['sort']);
        });
        $queryFilter = new OrderFilter($request);
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
       
        return $orders;
    }


    public function singleOrder(Order $order)
    {
        return view(default_template() . '.pages.client.inc.client_order_view', compact('order'));
    }

    /**
     * Company lookup on client add/edit modals
     */
    public function getCompanies(string $name = NULL)
    {
        if ($name !== NULL) {
            $companies = Company::where('is_deleted', 0)->where('c_name', 'like', '%' . $name . '%')->get();
        } else {
            $companies = NULL;
        }
        return $companies;
    }

    public function viewProfileImage($file)
    {
        if (file_exists(storage_path('client/profile/'.$file))){
            return response()->file(storage_path('client/profile/'.$file));
        }
    }
    
}
