<style>
    .form-group{
        padding-bottom:5px !important;
    }
</style>
<div class="custom-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">{{$bill->bill_no}} Notes</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:#fff;opacity:1 !important;">
            </button>
        </div>
        <div class="modal-body" style="padding:0px !important;">
            <div class="kt-portlet" style="margin-bottom:0px !important;">
                <div class="kt-portlet__body" style="background:#e5f7ff !important; padding:0px !important;color:#000;"> 
                    <div class="" id="kt_portlet_base_demo_1_1_tab_content"style="background:#e5f7ff !important;" >
                        <div class="kt-portlet__body" style="padding:25px;padding-bottom:0px !important;padding-top:0px !important;">
                            <div class="row" style="margin-bottom:1rem;">
                                <div class="form-group col-12">
                                    <div class="">
                                        <div class="form-group row" style="padding:5px;">
                                            <div class="form-group col-xl-12  col-md-6" style="padding-top:10px;">
                                                  <div class="table-responsive">
                                                    <table class="table">
                                                        <thead>
                                                            <tr>
                                                                <th>S.No.</th>
                                                                <th>Title</th>
                                                                <th>Description</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($notes as $key =>$note)
                                                                <tr>
                                                                     <td>
                                                                        <span>{{$key+1}}.</span>
                                                                    </td>
                                                                    <td>
                                                                        <span>{{$note->title}}</span>
                                                                    </td>
                                                                    <td>
                                                                        <span>{{$note->description}}</span>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                                {{-- {{dd($notes, $bill)}} --}}
                                                {{-- @foreach ($notes as $note)
                                                    
                                                @endforeach --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>	  
                        </div>
                        <div class="kt-portlet__foot footer_white">
                            <div class="kt-form__actions">
                                <div class="row">
                                    <div class="col-lg-6">
                                    </div>
                                    <div class="col-lg-6 kt-align-right">
                                        <button data-dismiss="modal" class="btn btn-pill btn-secondary"><i class="la la-remove"></i>Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>