<?php

namespace App\Http\Controllers\Coupon;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Coupon;
use App\Lib\Filter\CouponFilter;


class CouponController extends Controller
{
    public function index()
    {
        return view(default_template() . ".pages.coupon.index");
    }

    public function addCouponModal()
    {
        return view(default_template() . '.pages.coupon.modal.addCouponModal');
    }

    public function addCouponCodeModal()
    {
        return view(default_template() . '.pages.coupon.modal.codeGeneratorModal');
    }

    public function editCouponModal(int $id)
    {
        $coupon = Coupon::find($id);
        return view(default_template() . '.pages.coupon.modal.editCouponModal', compact('coupon'));
    }

    public function couponList(Request $request)
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
        $query = $coupons = Coupon::where('is_deleted', 0);
        $query->when($request->sort, function ($q, $sort) use ($request) {
            return $q->orderBy($sort['field'], $sort['sort']);
        });
        $queryFilter = new CouponFilter($request);
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

    public function storeCoupon(Request $request)
    {
        // dd($request->all());
        $rules = validation_value('coupon_form');
        $this->validate($request, $rules);

        $coupon = Coupon::create([
            'code' => $request->code,
            'name' => $request->name,
            'description' => $request->description,
            'usage' => $request->usage,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'value' => $request->value,
            'type' => $request->type,
            'min_price'=>$request->min_price,
        ]);
           
    }

    // public function storeCouponCode(Request $request)
    // {


    // }

    public function updateCoupon(Request $request, int $id)
    {
        // dd($request->all());
        $coupon = Coupon::find($id);
        $rules = validation_value('update_coupon_form');
        $this->validate($request, $rules);
        $st_date = explode(' ', $request->start_date)[0];
        $end_date = explode(' ', $request->end_date)[0];
        $new_start_date =  implode('-', array_reverse(explode('/', $st_date)));
        $new_end_date =  implode('-', array_reverse(explode('/', $end_date)));
        $arr = [
            'useru_id' => auth()->id(),
            'updated_at' => date('Y-m-d H:i:s'),
            'start_date' => $new_start_date,
            'end_date' => $new_end_date,
        ];
        $req = $request->except(['_token', 'start_date', 'end_date']);
        $update = array_merge($req, $arr);
        $coupon->update($update);
        if (!$coupon) :
            return response(['message' => 'Something went wrong while updating!']);
        endif;
        return response(['message' => 'Updated Successfully!']);
    }

    public function deleteCoupon($id)
    {
        $coupon = Coupon::find($id);
        $coupon->update([
            'is_deleted' => 1,
            'deleted_at' => date('Y-m-d H:i:s'),
            'userd_id' => auth()->id() ?: 0
        ]);
    }
}
