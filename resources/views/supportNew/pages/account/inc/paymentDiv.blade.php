<table class="table"  style="height: 406px;">
   <thead>
         <tr>
          <th scope="col" class="text-info">Transaction#</th>
          <th scope="col" class="text-info"></th>
          <th scope="col" class="text-info">items</th>
          <th scope="col" class="text-info">Extra Items</th>
          <th scope="col" class="text-info">Delivery Date</th>
          <th scope="col" class="text-info">Pickup Date</th>
          <th scope="col" class="text-info">Status</th>
          <th scope="col" class="text-info">Actions</th>
         </tr>
   </thead>
   <tbody>
    @if($account->company->orders->count())
      @foreach($account->company->orders as $order)
       <tr>
          <td>
             {{$order->order_no}}
          </td>
          <td>
            Rabin Caterji
          </td>
          <td>
             {{$order->items->count()}}
          </td>
          <td class="text-center">
             @if($order->hasExtra)
             {{$order->extras->count()}}
          @else
             -
             @endif
          </td>
          <td>
            {{$order->delivery_date->format('m/d/Y')}}
          </td>
          <td>
            {{$order->pickup_date->format('m/d/Y')}}
          </td>
          <td>
             @if($order->order_status == 'pending')
                <span class="kt-badge kt-badge--brand kt-badge--inline kt-badge--pill">Pending</span>
             @elseif($order->order_status =='cancelled')
                <span class="kt-badge  kt-badge--danger kt-badge--inline kt-badge--pill">Cancelled</span>
             @elseif($order->order_status =='return')
                <span class="kt-badge  kt-badge--info kt-badge--inline kt-badge--pill">Return</span>
             @elseif($order->order_status =='shipped')
                <span class="kt-badge  kt-badge--success kt-badge--inline kt-badge--pill">Delivered</span>
             @endif
          </td>
          <td>
          <a class="btn btn-hover-brand btn-icon btn-pill" >
             <i class="la la-eye" title="View profile"></i>
          </a>
          <a href="javascript:void(0);" class="btn btn-hover-brand btn-icon btn-pill  "   title="Edit details">
             <i class="la la-edit"></i>
          </a>
          <a href="#" class="btn btn-hover-danger btn-icon btn-pill "  title="Delete" >
             <i class="la la-trash"></i>
          </a>
          </td>
       </tr>
      @endforeach
    @else
      <tr>
       {{--  <td colspan="7" class="text-center font-weight-normal" style="color: grey!important;">
          No Orders found!
        </td> --}}
          <td>
             #CR5007
          </td>
          <td>
            Rabin Caterji
          </td>
          <td>
             4
          </td>
          <td class="text-center">
             -
          </td>
          <td>
            11 Dec, 2019
          </td>
          <td>
            13 Dec, 2019
          </td>
          <td>
            <span class="kt-badge kt-badge--brand kt-badge--inline kt-badge--pill">Pending</span>
          </td>
          <td>
          <a class="btn btn-hover-brand btn-icon btn-pill" >
             <i class="la la-eye" title="View profile"></i>
          </a>
          <a href="javascript:void(0);" class="btn btn-hover-brand btn-icon btn-pill  "   title="Edit details">
             <i class="la la-edit"></i>
          </a>
          <a href="#" class="btn btn-hover-danger btn-icon btn-pill "  title="Delete" >
             <i class="la la-trash"></i>
          </a>
          </td>
      </tr>
    @endif
   </tbody>
</table>

