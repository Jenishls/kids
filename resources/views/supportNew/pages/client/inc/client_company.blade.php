<style>
	#add_member{
		font-size: 1rem!important;
	    display: flex!important;
	}
	label.f_s_1rem{
		font-size: 1rem!important;
		font-weight: 500!important;
	}
	.formDataTemplater .actionBtn i {
		font-size: 1.2rem!important;
	}
	
	.formDataTemplater .actionBtn {
		padding: 0.2rem 0.3rem 0.2rem 0.7rem!important
	}
	.formDataTemplater .actionBtn i {
		font-size: 1.2rem!important;
	}
	label.f_s_1rem.c_name_label{
		font-size:15px!important;
		color: #49bdf4!important;
	}
	.img_placeholder{
		height: 100px!important;
	}
</style>
<div class="kt-portlet__body" style="padding:25px 8px 0 8px!important;">
      <div class="row">
          <div class="col-md-12">
              <div class="form-group col-12">
                  <div class="shadow_inputs">
                      <div class="form-group row pt-2 ">
                          <div class="col-lg-12">
                             <label class="control-label" for="company_name">Company Name</label>
                          </div>
                          <div class="col-lg-12">
                              <div class="row">
                                  <div class="col-md-7 col-sm-12">
                                       <select name="company_name" id="company_select_picker">
                                      </select>
                                  </div>
                                  <div class="col-md-5 col-sm-12 sm-top-padding-10">
                                      <div class="row">
                                          <div class="col-md-4 col-sm-6 text-right" id="company_lookup_btn_container">
                                              <button class="btn btn-outline-brand btn-icon btn-sm btn-circle m-t-5"  title="Company Lookup">
                                                  <i class="flaticon-eye"></i>
                                              </button>
                                          </div>
                                          <div class="col-md-8 col-sm-6 text-right">
                                             <a href="javascript::void(0);" class="btn btn-sm btn-pill btn-brand btn-elevate btn-icon-sm" id="add_acc">
                                                  <i class="la la-plus"></i>
                                                  Company
                                              </a>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                     </div>
                 </div>
                 <div id="npSearchResults" class="mt-2">
                     <h6 class="tableParentTitle">Choosen <abbr title="Company">Company</abbr></h6>
                     <div class="form-group m-form__group row" id="companyTemplateContainer" style="min-height: 166px;">
	                      	@if(isset($client) && $client->companies->count())
	                      		@foreach($client->companies as $key => $company)
									<div class=" col-md-12 companyForm" data-id="{{$company->id}}" data-isStored="1" data-targetid="{{$company->id}}" >
									  <div class="kt-portlet kt-portlet--mobile formDataTemplater" style="border: 1px solid #e5f7ff;">
									    <div class="kt-portlet__body" style="padding:10px 20px!important;">
									      <div class="row">
									        <div class="col-md-12">
									          <div class="form-group row">
									            <div class="col-md-12">
									              	<div class="row pt-2">
													  	@if($company->image)
													  	<div class="col-md-2">
															<div class="img_placeholder">
																<img src="/admin/account/profileImage/{{$company->image->file_name}}" alt="{{$company->c_name}}" />
															</div>
														</div>
														@endif
														<div class="col-md-8">
															<div class="row">
																<div class="col-md-12">
																	<label class="control-label f_s_1rem c_name_label">
																		<i class="la la-bank"></i>{{$company->c_name}}
																	</label>
																</div>
																@if($company->contact)
																	@if($company->contact->phone_no)
																		<div class="col-md-12">
																			<label class="control-label f_s_1rem">
																			<i class="la la-phone"></i> <span class="text_to_p_mask">{{$company->contact->phone_no}}</span>
																			</label>
																		</div>
																	@endif
																	@if($company->contact->mobile_no)
																		<div class="col-md-12">
																			<label class="control-label f_s_1rem">
																			<i class="la la-mobile-phone"></i> <span class="text_to_p_mask">{{$company->contact->mobile_no}}</span>
																			</label>
																		</div>
																	@endif
																	@if($company->contact->email)
																		<div class="col-md-12">
																			<label class="control-label f_s_1rem">
																			<i class="la la-envelope"></i> <span class="text_to_p_mask">{{$company->contact->email}}</span>
																			</label>
																		</div>
																	@endif
																@endif
																@if($company->address)
																	@if($company->address->add1)
																		<div class="col-md-12">
																			<label class="control-label f_s_1rem">
																			<i class="la la-map-marker"></i> <span class="text_to_p_mask">{{$company->address->add1}}</span>
																			</label>
																		</div>
																	@endif
																	@if($company->address->city)
																		<div class="col-md-12">
																			<label class="control-label f_s_1rem" >
																				<i class="la la-map-o"></i> <span class="text_to_p_mask">
																					{{$company->address->city}},{{$company->address->state}} {{$company->address->zip}}
																				</span>
																			</label>
																		</div>
																	@endif
																@endif
															</div>
														</div>
														<div class="@if($company->image) col-md-2 @else col-md-4 @endif  actionBtnContainer">
															<input type="hidden" name="company_id" value="{{$company->id}}" />
															<button type="" class="btn btn_custom_sm btn-pill btn-danger pull-right actionBtn removeThisCompany" data-id="{{$company->id}}">
																<i class="la la-trash"></i>
															</button>
														</div>
												  </div>
												</div>
									          </div>
									        </div>
									      </div>
									    </div>
									  </div>
									</div>
		                      	@endforeach
	                      	@endif
                      
                     </div>
                 </div>
                 <div id="deletedCompaniesInputs"></div>
              </div>
          </div>
      </div>
</div>
<script>
	$('#company_select_picker').select2({
	        width: '100%',
	        placeholder: "Select a Company",
	        ajax: {
	            method: 'POST',
	            headers: {
	                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	            },
	            url: function (params) {
	              return '/admin/account/select2/data'
	            },
	            processResults: function (data) {
	                let res = [];
	                $.each(data, function(i , obj){
	                    res.push({
	                        id: obj.id,
	                        text : obj.c_name,
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
	        if($("#companyTemplateContainer").find('.companyForm[data-id="'+data.id+'"]').length == 0){
	            let template= `
	            <div class=" col-md-12 companyForm" data-id="${data.id}">
	              <div class="kt-portlet kt-portlet--mobile formDataTemplater" style="border: 1px solid #e5f7ff;">
	                <div class="kt-portlet__body" style="padding:10px 20px!important;">
	                  <div class="row">
						<div class="col-md-12">
							
	                      <div class="form-group row">
	                        <div class="col-md-12">
	                          <div class="row">`
								if(data.image)
	                    template+= '<div class="col-md-2"><div class="img_placeholder"><img src="/admin/account/profileImage/'+data.image.file_name+'" alt="'+data.c_name+'" /></div></div>'
	            		template+=`
	                            <div class="col-md-8">
									<div class="row">
										<div class="col-md-12">
											<label class="control-label f_s_1rem c_name_label">
												<i class="la la-bank"></i>${data.c_name}
											</label>
										</div>`
										if(data.contact){
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
													</div>`;
										}
										if(data.address){
											if(data.address.add1)
												template+=`
													<div class="col-md-12">
														<label class="control-label f_s_1rem" >
															<i class="la la-map-marker"></i> <span class="text_to_p_mask">${data.address.add1}</span>
														</label>
													</div>`;
											if(data.address.city)
												template+=`
													<div class="col-md-12">
														<label class="control-label f_s_1rem" >
															<i class="la la-map-o"></i> <span class="text_to_p_mask">
															${data.address.city}, ${data.address.state} ${data.address.zip}
															</span>
														</label>
													</div>`
										}
	                template+= `
	                            	</div>
								</div>`;
								if(data.image){
									template+='<div class=" col-md-2 actionBtnContainer">';
								}else{
									template+='<div class=" col-md-4 actionBtnContainer">';
								}
								
					template+=`		<input type="hidden" name="company_id" value="${data.id}" />
									<button type="" class="btn btn_custom_sm btn-pill btn-danger pull-right actionBtn removeThisCompany" data-id="${data.id}">
									<i class="la la-trash"></i></button>
								</div>
								
	                          </div>
	                        </div>
	                      </div>
	                    </div>
	                   
	                  </div>
	                </div>
	              </div>
	            </div>
	            `;
	            $('#companyTemplateContainer').html(template);
	        }
	    });
	    $(document).off('click','.removeThisCompany').on('click','.removeThisCompany',function(e){
	        e.preventDefault();
	        let target = $(this).parent().closest('.companyForm').remove();
	    });
	    $(document).off('click','#add_member').on('click','#add_member',function(e){
	        e.preventDefault();
	        showModal({
	            url:'/admin/account/member/addNew',
				c:'addMember'
	        });
		});
	function makeCompanyTempalte(data)
	{
		let template= `
	            <div class=" col-md-12 companyForm" data-id="${data.id}">
	              <div class="kt-portlet kt-portlet--mobile formDataTemplater" style="border: 1px solid #e5f7ff;">
	                <div class="kt-portlet__body"  style="padding:10px 20px!important;">
	                  <div class="row">
	                    <div class="col-md-12">
	                      <div class="form-group row">
	                        <div class="col-md-12">
							  <div class="row">`;
								if(data.image)
									template+='<div class="col-md-2"><div class="img_placeholder"><img src="/admin/account/profileImage/'+data.image.file_name+'" alt="'+data.image.file_name+'" /></div></div>';
								template+=`
									<div class="col-md-8">
										<div class="row">
											<div class="col-md-12">
												<label class="control-label f_s_1rem c_name_label">
													<i class="la la-bank"></i>${data.c_name}
												</label>
											</div>`
											if(data.contact){
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
															</div>`;
	              							}
											if(data.address){
												if(data.address.add1)
													template+=`
														<div class="col-md-12">
															<label class="control-label f_s_1rem" >
																<i class="la la-map-marker"></i> <span class="text_to_p_mask">${data.address.add1}</span>
															</label>
														</div>`;
												if(data.address.city)
													template+=`
														<div class="col-md-12">
															<label class="control-label f_s_1rem" >
																<i class="la la-map-o"></i> <span class="text_to_p_mask">
																${data.address.city}, ${data.address.state} ${data.address.zip}
																</span>
															</label>
														</div>`
											}
										template+= `
														</div>
													</div>`
										if(data.image){
											template+='<div class=" col-md-2 actionBtnContainer">';
										}else{
											template+='<div class=" col-md-4 actionBtnContainer">';
										}
											template+=`	<input type="hidden" name="company_id" value="${data.id}" />
														<button type="" class="btn btn_custom_sm btn-pill btn-danger pull-right actionBtn removeThisCompany" data-id="${data.id}">
														<i class="la la-trash"></i></button>
													</div>
												</div>
												</div>
											</div>
											</div>
										</div>
									</div>
								</div>
							</div>
									`;
	            $('#companyTemplateContainer').html(template);
	}
</script>