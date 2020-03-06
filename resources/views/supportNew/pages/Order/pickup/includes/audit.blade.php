<div class="tab-pane mt-10" id="kt_apps_contacts_view_tab_1" role="tabpanel">
    <div id="invoicedataTable" class="kt-datatable kt-datatable--default kt-datatable--brand kt-datatable--loaded" style="">
        <table class="kt-datatable__table" style="display: block; min-height: 500px;">
            <thead class="kt-datatable__head">
                <tr class="kt-datatable__row" style="left: 0px;">
                    <th data-field="#" class="kt-datatable__cell kt-datatable__cell--sort">
                        <span style="width: 20px;">#</span>
                    </th>
                    <th data-field="created_at" class="kt-datatable__cell kt-datatable__cell--sort kt-datatable__cell--sorted" data-sort="desc">
                        <span style="width: 70px;">Date<i class="flaticon2-arrow-down"></i></span>
                    </th>
                    <th data-field="customer_name" class="kt-datatable__cell kt-datatable__cell--sort">
                        <span style="width: 200px;">Activity</span>
                    </th>
                    <th data-field="Actions" class="pr-0 kt-datatable__cell--center kt-datatable__cell kt-datatable__cell--sort">
                        <span style="width: 80px;">Actions</span>
                    </th>
                </tr>
            </thead>
            <tbody class="kt-datatable__body" style="">
                    <?php $i = 1; ?>
                    @foreach($audits as $audit)
                    @if($audit->type == "created_address")
                    @continue
                    @endif
                    @if($order->pickup_addr_id == $audit->table_id 
                        || $order->shipping_addr_id == $audit->table_id
                        || $order->id == $audit->table_id)
                        {{-- || $order->payments->id == $audit->table_id) --}}
                        <tr data-row="0" class="kt-datatable__row" style="left: 0px;">
                            <td data-field="#" class="kt-datatable__cell">
                            <span style="width: 20px;">{{$i}}</span>
                            </td>
                            <td class="kt-datatable__cell--sorted kt-datatable__cell" data-field="created_at">
                                <span style="width: 70px;">{{format_to_us_date($audit->created_at)}}</span>
                            </td>
                            @if($order->pickup_addr_id == $audit->table_id)
                                <td data-field="customer_name" class="kt-datatable__cell">
                                    <span style="width: 200px;">Updated Pickup Address</span>
                                </td>
                            @elseif($order->shipping_addr_id == $audit->table_id)
                                <td data-field="customer_name" class="kt-datatable__cell">
                                    <span style="width: 200px;">Updated Moving Address</span>
                                </td>
                            @elseif($order->id == $audit->table_id)
                                @if($audit->activity == "created_order")
                                    <td data-field="customer_name" class="kt-datatable__cell">
                                        <span style="width: 200px;">Created Order Details</span>
                                    </td>
                                @else
                                    <td data-field="customer_name" class="kt-datatable__cell">
                                        <span style="width: 200px;">Updated Order Details</span>
                                    </td>
                                @endif
                            @elseif($order->payment->id == $audit->table_id)
                                <td data-field="customer_name" class="kt-datatable__cell">
                                    <span style="width: 200px;">Made Payment</span>
                                </td>
                            @endif
                            <td class="kt-datatable__cell--center pr-0 kt-datatable__cell" data-field="Actions">
                                <span style="overflow: visible; position: relative; width: 80px;">
                                <a data-route="/admin/order/audit/detail/{{$audit->id}}" class="btn btn-hover-brand btn-icon btn-pill viewAudit"><i title="Add Item" class="la la-eye"></i></a>
                                </span>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    @endif
                    @endforeach
            </tbody>
        </table>
    </div>
</div>