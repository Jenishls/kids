<div class=" col-md-4 memberForm" data-id="{{$client->id}}">
    <div class="kt-portlet kt-portlet--mobile formDataTemplater" style="border: 1px solid #e5f7ff;">
      <div class="kt-portlet__body py-0 px-3">
        <div class="row">
          <div class="col-md-12">
            <div class="form-group row">
              <div class="col-md-12">
                <div class="row">
                  <div class="col-md-4">
                    <div class="img_placeholder">
                      @if($client->image)
                        <img src="/admin/account/member/image/{{$client->image->file_name}}" alt="{{$client->fname}}" />
                      @endif
                    </div>
                  </div>
                  <div class="col-md-8">
                    <div class="row">
                      <div class="col-md-12">
                          <label class="control-label f_s_1rem">
                            <i class="la la-user"></i>{{$client->fname}} {{$client->lname}}
                          </label>
                      </div>
                      @if($client->contact)
                        @if($client->contact->phone_no)
                          <div class="col-md-12">
                              <label class="control-label f_s_1rem">
                                <i class="la la-phone"></i> <span class="text_to_p_mask">{{$client->contact->phone_no}}</span>
                              </label>
                          </div>
                        @endif
                        @if($client->contact->mobile_no)
                          <div class="col-md-12">
                              <label class="control-label f_s_1rem">
                                <i class="la la-mobile-phone"></i> <span class="text_to_p_mask">{{$client->mobile_no}}</span>
                              </label>
                          </div>
                        @endif
                        @if($client->contact->email)
                          <div class="col-md-12">
                              <label class="control-label f_s_1rem">
                                <i class="la la-envelope"></i> <span class="text_to_p_mask">{{$client->contact->email}}</span>
                              </label>
                          </div>
                        @endif
                      @endif
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-12 pb-2 pt-2 actionBtnContainer">
            <input type="hidden" name="member_id[]" value="{{$client->id}}"> 
              <button type="" class="btn btn_custom_sm btn-pill btn-danger pull-left actionBtn removeThisMember" data-id="{{$client->id}}">
              <i class="la la-trash"></i></button>
          </div>
        </div>
      </div>
    </div>
  </div>