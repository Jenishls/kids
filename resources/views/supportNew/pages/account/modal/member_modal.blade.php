<style>
	#add_member{
		font-size: 1rem!important;
	    display: flex!important;
	}
	.img_placeholder{
		height: 100px!important;
	}
	.btn_custom_sm{
		height: 21px!important;
		width: 38px!important;
		padding: 0px 10px!important;
	}
	.btn_custom_sm i{
		font-size:1.2rem!important;
	}
</style>
<div class="kt-portlet__body" style="padding:25px 8px 0 8px!important;">
      <div class="row">
          <div class="col-md-12">
              <div class="form-group col-12">
                  <div class="shadow_inputs">
                      <div class="form-group row pt-2 ">
                          <div class="col-lg-12">
                             <label class="control-label" for="company_name">Member Name</label>
                          </div>
                          <div class="col-lg-12">
                              <div class="row">
                                  <div class="col-md-10 col-sm-12">
                                       <select name="member_name" id="member_select_picker">
                                      </select>
                                  </div>
                                  <div class="col-md-2 col-sm-12 sm-top-padding-10">
                                      <div class="row">
                                          <div class="col-md-4 col-sm-6 text-right" id="member_lookup_btn_container">
                                              <button class="btn btn-outline-brand btn-icon btn-sm btn-circle m-t-5"  title="Member Lookup">
                                                  <i class="flaticon-eye"></i>
                                              </button>
                                          </div>
                                          <div class="col-md-8 col-sm-6 text-right">
                                             <a href="#" class="btn btn-pill btn-brand btn-elevate btn-icon-sm addNewBranch" id="add_member">
                                                  <i class="la la-plus"></i>
                                                  Member
                                              </a>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                     </div>
                 </div>
                 <div id="npSearchResults" class="mt-2">
                     <h6 class="tableParentTitle">Choose <abbr title="Member">Member</abbr></h6>
                     <div class="form-group m-form__group row" id="memberTemplateContainer" style="min-height: 166px;">
	                      	@if(isset($company) && $company->clients->count())
	                      		@foreach($company->clients as $key => $client)
									<div class=" col-md-4 memberForm" data-id="{{$client->id}}" data-isStored="1" data-targetid="{{$client->id}}" >
									  <div class="kt-portlet kt-portlet--mobile formDataTemplater" style="border: 1px solid #e5f7ff;">
									    <div class="kt-portlet__body p-3">
									      <div class="row">
									        <div class="col-md-12">
									          <div class="form-group row">
									            <div class="col-md-12">
									              <div class="row">
													  @if($client->image)
										                	<div class="col-md-4">
														       <div class="img_placeholder">
														       		<img src="/admin/account/member/image/{{$client->image->file_name}}" alt="{{$client->fname}}" />
														       </div>
															</div>
														@endif
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
									        <input type="hidden" name="member_id[]" value="{{$client->id}}" />
									            <button type="" class="btn btn_custom_sm btn-pill btn-danger pull-left actionBtn removeThisMember" data-id="{{$client->id}}">
									            <i class="la la-trash"></i></button>
									        </div>
									      </div>
									    </div>
									  </div>
									</div>
		                      	@endforeach
	                      	@endif
                      
                     </div>
                 </div>
                 <div id="deletedMembersInputs"></div>
              </div>
          </div>
      </div>
</div>
<script>
		$('#member_select_picker').select2({
	        width: '100%',
	        placeholder: "Select a Member",
	        ajax: {
	            method: 'POST',
	            headers: {
	                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	            },
	            url: function (params) {
	              return '/admin/account/member/select2/data'
	            },
	            processResults: function (data) {
	                let res = [];
	                $.each(data, function(i , obj){
	                    res.push({
	                        id: obj.id,
	                        text : obj.fname+" "+obj.lname,
	                        data : obj
	                    });
	                });
	                return {
	                    results: res
	                };
	            }
	        }
	    }).on('select2:select', function(e){
	        $(this).val('').change();
	        let data =  e.params.data.data;
	        if($("#memberTemplateContainer").find('.memberForm[data-id="'+data.id+'"]').length == 0){
	            let template= `
	            <div class=" col-md-4 memberForm" data-id="${data.id}">
	              <div class="kt-portlet kt-portlet--mobile formDataTemplater" style="border: 1px solid #e5f7ff;">
	                <div class="kt-portlet__body py-0 px-3">
	                  <div class="row">
	                    <div class="col-md-12">
	                      <div class="form-group row">
	                        <div class="col-md-12">
	                          <div class="row">`
	              if(data.image)
				  template+=`<div class="col-md-4">
	                    		<div class="img_placeholder">
									<img src="/admin/account/member/image/'+data.image.file_name+'" alt="${data.image.file_name}" />
								</div>
							</div>`
	            template+=`
	                        <div class="col-md-8">
	                            <div class="row">
	                              <div class="col-md-12">
	                                  <label class="control-label f_s_1rem" >
	                                    <i class="la la-user"></i>${data.fname} ${data.lname}
	                                  </label>
	                              </div>`
	              if(data. contact){
		              	if(data.contact.phone_no)
		              	  	template+=`
		              	            <div class="col-md-12">
		              	                <label class="control-label f_s_1rem" >
		              	                  <i class="la la-phone"></i> <span class="text_to_p_mask">${data.contact.phone_no}</span>
		              	                </label>
		              	            </div>`
		              	if(data.contact.mobile_no)
		              	  	template+=`

		              	            <div class="col-md-12">
		              	                <label class="control-label f_s_1rem" >
		              	                  <i class="la la la-mobile-phone"></i> <span class="text_to_p_mask">${data.contact.mobile_no}</span>
		              	                </label>
		              	            </div>`
		              	if(data.contact.email)
		               		template+=`
		                          <div class="col-md-12">
		                              <label class="control-label f_s_1rem" >
		                                <i class="la la-envelope"></i> <span class="text_to_p_mask">${data.contact.email}</span>
		                              </label>
		                          </div>`
	              }
	                template+= `
	                            </div>
	                            </div>
	                          </div>
	                        </div>
	                         
	                      </div>
	                    </div>
	                    <div class="col-md-12 pb-2 pt-2 actionBtnContainer">
	                    <input type="hidden" name="member_id[]" value="${data.id}" />
	                        <button type="" class="btn btn_custom_sm btn-pill btn-danger pull-left actionBtn removeThisMember" data-id="${data.id}">
	                        <i class="la la-trash"></i></button>
	                    </div>
	                  </div>
	                </div>
	              </div>
	            </div>
	            `;
	            $('#memberTemplateContainer').append(template);
	        }
	    });
	    $(document).off('click','.removeThisMember').on('click','.removeThisMember',function(e){
	        e.preventDefault();
	        let target = $(this).parent().closest('.memberForm');
	        if(target.attr('data-isStored') == 1){
	        	$('#deletedMembersInputs').append(`
					<input type="hidden" name="deleted_member_id[]" value="${target.attr('data-targetid')}" />
	        		`);
	        }
	        target.remove();
	    });
	    $(document).off('click','#add_member').on('click','#add_member',function(e){
	        e.preventDefault();
	        showModal({
	            url:'/admin/account/member/addNew',
	            c:'addMember'
	        });
	    });
</script>