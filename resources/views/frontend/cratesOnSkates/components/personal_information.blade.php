<hr class="hr">
<div class="crates_container pd-10-20">
    <div id="crumbs">
        <ul>
          {{-- <li><a href="#1"><i class="fa fa-home" aria-hidden="true"></i></a></li> --}}
          <li><a class="load_pages c-p" data-route="/cratesonskates/dashboard">Dashboard</a></li>
          <li >
            <a class="active">personal information</a>
          </li>
          {{-- <li><a href="#3"><i class="fa fa-cart-plus" aria-hidden="true"></i> Cart</a></li> --}}
          {{-- <li><a href="#4"><i class="fa fa-credit-card-alt" aria-hidden="true"></i> Checkout</a></li> --}}
            
        </ul>
    </div>
  </div>
<div>
<div class="db-personal-info">
    <div class="crates_container db-pd-tb-50-lr-0 ">
        <div class="db-personal-info-container  pd-30">
            <form id="db--personal--info--form">
        
                <input type="hidden" name="_token" value="">        
                <div class="row">
                    <div class="form-group label-floating col-md-12">
                        <label class="cs-label cs-cmrcl-label text-capitalize" for="name">Username</label>
                        <input class="form-control" value="{{$user_info['username']}}" name="username">
                        <div class="errorMessage"></div>
                    </div>
        
                    <div class="form-group label-floating col-md-12">
                        <label class="cs-label cs-cmrcl-label text-capitalize" for="">email</label>
                        <input class="form-control"  name="email"  value="{{$user_info['email']}}">
                        <div class="errorMessage"></div>
                    </div>
                    <div class="form-group label-floating col-md-12">
                        <label class="cs-label cs-cmrcl-label text-capitalize" for="email">mobile number</label>
                        <input class="form-control"  value="{{$user_info['mobile_no']}}"  name="mobile_no" required="require">
                        <div class="errorMessage"></div>
                    </div>
                </div>
                <div class="contact_submit_btn ">
                    <div class="global-btn global-btn__yellow m-t-20" id="db--user--personal--info" data-route="dashboard/updateCredential">
                        <p>update</p>
                    </div>
                    
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    phoneMask("[name='mobile_no']");

    clickEvent('#db--user--personal--info')(updateUserInfo);

    
    function updateUserInfo(e){
        e.preventDefault();
        let personal_info_form = $('#db--personal--info--form');
        let data = $('#db--personal--info--form').serializeArray();
        // console.log(data);
        // alert('hello');
        let url = $(this).attr('data-route');
        cratesAjax({
                url: url,
                method: "POST",
                data: data
            },
            function (response) {
                $('#db--user--personal--info')[0].reset();
                toastr.success('Information updated successfully.');
            },
            function ({
                status,
                responseJSON
            }) {
                if (status === 422) {
                    personal_info_form.find("input[name]").css("border-color", "#ddd");
                    $(`input[name]`)
                        .siblings(".errorMessage")
                        .empty();

                    if (!responseJSON.errors) return;
                    const messages = [];
                    for (const [key, message] of Object.entries(
                            responseJSON.errors
                        )) {
                        personal_info_form.find(`input[name="${key}"]`).css("border-color", "#f44336");
                        messages.push(message);
                        $(`input[name="${key}"]`).siblings(".errorMessage").empty().append(message);
                    }
                    toastr.error(
                        "<strong>Please check highlighted fields! </strong> <br> <br>" +
                        messages.flat(1).join("<br>")
                    );
                }
                // $('#cModal').modal('hide');
                // toastr.error(error.responseJSON.message);
            }
        );
    }
</script>