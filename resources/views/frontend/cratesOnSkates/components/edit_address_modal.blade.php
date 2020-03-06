{{-- {{dd($address->id)}} --}}
<div class="modal-dialog modal-transform mxw-800" role="document">
    <div class="modal-content">
        <div class="modal-header db-bg-green ">
            <h4 class="modal-title text-center text-white" id="">Address</h4>
            <div>
                <span>
                    <a  class="text-white c-p" data-dismiss="modal">
                        <i class="fa fa-times"></i>
                    </a>
                </span>
                
            </div>
        </div>
        <div class="modal-body db-bg-modal-grey pd-10">
	      <form  id="editAddrForm" class="no-m-bottom">
              
            <div class="row">
                <div class="form-group label-floating col-md-6 col-sm-12">
                    <label class="cs-label cs-cmrcl-label text-capitalize" for="">first name</label>
                    <input class="form-control" value="{{$address->first_name}}" name="first_name" >
                    <div class="errorMessage"></div>
                </div>
    
                <div class="form-group label-floating col-md-6 col-sm-12">
                    <label class="cs-label cs-cmrcl-label text-capitalize" for="">last name</label>
                    <input class="form-control"    value="{{$address->last_name}}" name="last_name">
                    <div class="errorMessage"></div>
                </div>
            </div>

            <div class="row">
                <div class="form-group label-floating col-md-6 col-sm-12">
                    <label class="cs-label cs-cmrcl-label text-capitalize" for="">street address</label>
                    <input class="form-control" value="{{$address->add1}}"  name="add1" >
                    <div class="errorMessage"></div>
                </div>
    
                <div class="form-group label-floating col-md-6 col-sm-12">
                    <label class="cs-label cs-cmrcl-label text-capitalize" for="">building name, apt/suite</label>
                    <input class="form-control"    value="{{$address->add2}}" name="add2">
                    <div class="errorMessage"></div>
                </div>
            </div>

            {{-- address --}}
            <div class="row">
                <div class="form-group label-floating col-md-6 col-sm-12">
                    <label class="cs-label cs-cmrcl-label text-capitalize" for="">city</label>
                    <input class="form-control" value="{{$address->city}}" name="city" >
                    <div class="errorMessage"></div>
                </div>
    
                <div class="form-group label-floating col-md-6 col-sm-12">
                    <label class="cs-label cs-cmrcl-label text-capitalize" for="">state</label>
                    <input class="form-control"  value="{{$address->state}}"  name="state">
                    <div class="errorMessage"></div>
                </div>
            </div>
            
            {{-- country --}}
            <div class="row">
                <div class="form-group label-floating col-md-6 col-sm-12">
                    <label class="cs-label cs-cmrcl-label text-capitalize" for="">zip</label>
                    <input class="form-control" value="{{$address->zip}}" name="zip" >
                    <div class="errorMessage"></div>
                </div>
    
                <div class="form-group label-floating col-md-6 col-sm-12">
                    <label class="cs-label cs-cmrcl-label text-capitalize" for="">country</label>
                    <input class="form-control"  value="{{$address->country}}"  name="country" >
                    <div class="errorMessage"></div>
                </div>
            </div>
             {{--footer  --}}
            <div class="modal-footer pd-10 display-flex justify-space-between">
                <button type="button" class="global-btn global-btn__default no-m-left global-cancel-btn" data-dismiss="modal">
                    <p>Cancel</p>
                </button>
                <button type="button" class="global-btn global-btn__green global-add-btn" data-route="dashboard/address/updateAddressDetail/{{$address->id}}" id="update--address">
                    <p>update</p>
                </button>
            </div>
	      </form>
	      
	    </div>
	  
	</div>
</div>