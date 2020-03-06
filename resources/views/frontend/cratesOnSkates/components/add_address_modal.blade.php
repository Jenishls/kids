<div class="modal-dialog modal-transform mxw-800" role="document">
    <div class="modal-content ">
        <div class="modal-header db-bg-green ">
            <h3 class="modal-title text-center text-white">Address</h3>
            <div>
                <span>
                    <a  class="text-white c-p" data-dismiss="modal">
                        <i class="fa fa-times"></i>
                    </a>
                </span>
                
            </div>
        </div>
        <div class="modal-body db-bg-modal-grey pd-10">
	      <form  id="newAddrForm" class="no-m-bottom">
            @csrf
            <div class="row">
                <div class="form-group label-floating col-md-6 col-sm-12">
                    <label class="cs-label cs-cmrcl-label text-capitalize" for="name">first name</label>
                    <input class="form-control" value="" name="first_name" >
                    <div class="errorMessage"></div>
                </div>
    
                <div class="form-group label-floating col-md-6 col-sm-12">
                    <label class="cs-label cs-cmrcl-label text-capitalize" for="">last name</label>
                    <input class="form-control"  name="last_name">
                    <div class="errorMessage"></div>
                </div>
            </div>

            <div class="row">
                <div class="form-group label-floating col-md-6 col-sm-12">
                    <label class="cs-label cs-cmrcl-label text-capitalize" for="name">street address</label>
                    <input class="form-control" value="" name="add1" >
                    <div class="errorMessage"></div>
                </div>
    
                <div class="form-group label-floating col-md-6 col-sm-12">
                    <label class="cs-label cs-cmrcl-label text-capitalize" for="">building name, apt/suite</label>
                    <input class="form-control"   name="add2">
                    <div class="errorMessage"></div>
                </div>
            </div>

            {{-- address --}}
            <div class="row">
                <div class="form-group label-floating col-md-6 col-sm-12">
                    <label class="cs-label cs-cmrcl-label text-capitalize" for="name">city</label>
                    <input class="form-control" value=""  name="city" >
                    <div class="errorMessage"></div>
                </div>
    
                <div class="form-group label-floating col-md-6 col-sm-12">
                    <label class="cs-label cs-cmrcl-label text-capitalize" for="">state</label>
                    <input class="form-control"   name="state">
                    <div class="errorMessage"></div>
                </div>
            </div>
            
            {{-- country --}}
            <div class="row">
                <div class="form-group label-floating col-md-6 col-sm-12">
                    <label class="cs-label cs-cmrcl-label text-capitalize" for="name">zip</label>
                    <input class="form-control" value=""  name="zip" >
                    <div class="errorMessage"></div>
                </div>
    
                <div class="form-group label-floating col-md-6 col-sm-12">
                    <label class="cs-label cs-cmrcl-label text-capitalize" for="">country</label>
                    <input class="form-control" name="country"  >
                    <div class="errorMessage"></div>
                </div>
            </div>
        </form>
             {{--footer  --}}
            <div class="modal-footer pd-10 display-flex justify-space-between">
                <button type="button" class="global-btn global-btn__default no-m-left global-cancel-btn" data-dismiss="modal">
                    <p>Cancel</p>
                </button>
                <button type="button" class="global-btn global-btn__green global-add-btn"   id="add--address">
                    <p>add</p>
                </button>
            </div>
	      
	      
	    </div>
	  
	</div>
</div>