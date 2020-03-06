<hr class="hr">
<div class="crates_container pd-10-20">
    <div id="crumbs">
        <ul>
          {{-- <li><a href="#1"><i class="fa fa-home" aria-hidden="true"></i></a></li> --}}
          <li><a class="load_pages c-p" data-route="/cratesonskates/dashboard">Dashboard</a></li>
          <li >
            <a class="active">login and security</a>
          </li>
          {{-- <li><a href="#3"><i class="fa fa-cart-plus" aria-hidden="true"></i> Cart</a></li> --}}
          {{-- <li><a href="#4"><i class="fa fa-credit-card-alt" aria-hidden="true"></i> Checkout</a></li> --}}
            
        </ul>
    </div>
  </div>
<div>
<div class="db-login-secutity">
    <div class="crates_container db-pd-tb-50-lr-0 ">
        <div class="db-login-security-container  pd-30">
            <form id="db--login--security--form">
                <div class="row">
                    <div class="form-group label-floating col-md-12">
                        <label class="cs-label cs-cmrcl-label text-capitalize" for="current_password">current password</label>
                        <input class="form-control" type="password"  name="current_password" required="require">
                        <div class="errorMessage"></div>
                    </div>
        
                    <div class="form-group label-floating col-md-12">
                        <label class="cs-label cs-cmrcl-label text-capitalize" for="password">new password</label>
                        <input class="form-control"  type="password" required="require" name="password">
                        <div class="errorMessage"></div>
                    </div>
                    <div class="form-group label-floating col-md-12">
                        <label class="cs-label cs-cmrcl-label text-capitalize" for="password_confirmation">confirm password</label>
                        <input class="form-control"  type="password"  name="password_confirmation" required="require">
                        <div class="errorMessage"></div>
                    </div>
                </div>
                <div class=" " style="text-align:center;">
                    <div class="global-btn global-btn__yellow m-t-20" id="password--update">
                        <p>update</p>
                    </div>
                    
                </div>
            </form>
        </div>
    </div>
</div>