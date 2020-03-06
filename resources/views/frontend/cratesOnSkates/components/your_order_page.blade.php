<style>
    /* .card .collapse {
    display: block;
  } */
</style>
<hr class="hr">
<div class="your-order-container">
  <div class="crates_container pd-l-20 " id="">
    <div id="crumbs">
        <ul>
          <li><a class="load_pages c-p" data-route="/cratesonskates/dashboard">Dashboard <span>/</span></a></li>
          <li>
            <a class="crates--dashboard--page--load active your--order-crumb" data-route="dashboard/page/yourorder">your order</a>
          </li>   
        </ul>
    </div>
  </div>
  <div class="">
      <div class="crates_container">
          <div class="dashboard-order-page db-pd-50-20 ">
              <div class="row db-your-oder-pd-50-10">
                  <div class="col-md-3 col-sm-12 min-height-200 br-4 no-pd db-your-oder-bg db--your--order--tab">
                      <h3 class="db-pd-10-15 db-your-oder-bg-head-black text-white no-m">Your Order</h3>
                      <ul id="" class="nav nav-tabs flex-flow-col-nowrap text-capitalize your-order-ul" role="tablist">
                          <li class="nav-item active" data-route = "dashboard/orderpage/pendingorder">
                            <a id="pending-order "  class="nav-link pd-15 f-w-500">Pending Orders</a>
                          </li>
                          <li class="nav-item" data-route = "dashboard/orderpage/allorder">
                            <a id="all-order"  class="nav-link pd-15 f-w-500">all orders</a>
                          </li>
                          <li class="nav-item" data-route = "dashboard/orderpage/cancelorder">
                            <a id="cancel-order"  class="nav-link pd-15 f-w-500">cancel orders</a>
                          </li>
                      </ul>
                  </div>
                  <div class="col-md-9 col-sm-12 tab-content min-height-200 br-4 db-your-order-tab-content" id="db--order--content" class="" role="tablist">
                      @include('frontend.cratesOnSkates.components.dashboard_pending_order')
                      {{-- @include('frontend.cratesOnSkates.components.dashboard_all_order')
                      @include('frontend.cratesOnSkates.components.dashboard_cancel_order') --}}
                      <div class="cancel--modal--div"></div>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>