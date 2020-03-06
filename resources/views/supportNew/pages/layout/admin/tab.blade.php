<div class="kt-portlet kt-portlet--tabs">
	<div class="kt-portlet__head">
		<div class="kt-portlet__head-toolbar">
			<ul class="nav nav-tabs nav-tabs-line nav-tabs-bold nav-tabs-line-left nav-tabs-line-primary" role="tablist">
				<li class="nav-item">
					<a class="nav-link active" data-toggle="tab" href="#kt_builder_page" role="tab" aria-selected="true">
						Page
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" data-toggle="tab" href="#kt_builder_header" role="tab" aria-selected="false">
						Header
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" data-toggle="tab" href="#kt_builder_subheader" role="tab" aria-selected="false">
						Subheader
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" data-toggle="tab" href="#kt_builder_content" role="tab" aria-selected="false">
						Content
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" data-toggle="tab" href="#kt_builder_footer" role="tab" aria-selected="false">
						Footer
					</a>
				</li>
			</ul>
		</div>
	</div>
	<!--begin::Form-->
	<form class="kt-form kt-form--label-right" action="" method="POST">
		<div class="kt-portlet__body">
			<div class="tab-content">
				@include('supportNew.pages.layout.admin.tab.page')
				<div class="tab-pane" id="kt_builder_header">
					<div class="kt-section kt-margin-t-30">
				    	<div class="kt-section__body">
							<div class="form-group row">
								<label class="col-lg-3 col-form-label">Desktop Fixed Header:</label>
								<div class="col-lg-9 col-xl-4">
									<input type="hidden" name="builder[layout][header][self][fixed][desktop]" value="false">
									<span class="kt-switch kt-switch--icon-check">
										<label>
									        <input type="checkbox" name="builder[layout][header][self][fixed][desktop]" value="true" checked="">
									        <span></span>
									    </label>
									</span>
									<div class="form-text text-muted">Enable fixed header for desktop mode</div>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-lg-3 col-form-label">Mobile Fixed Header:</label>
								<div class="col-lg-9 col-xl-4">
									<input type="hidden" name="builder[layout][header][self][fixed][mobile]" value="false">
									<span class="kt-switch kt-switch--icon-check">
										<label>
											<input type="checkbox" name="builder[layout][header][self][fixed][mobile]" value="true" checked="">
									        <span></span>
									    </label>
									</span>
									<div class="form-text text-muted">Enable fixed header for mobile mode</div>
								</div>
							</div>

							<div class="kt-separator kt-separator--space-lg kt-separator--border-dashed"></div>

							<div class="form-group row">
								<label class="col-lg-3 col-form-label">Display Header Menu:</label>
								<div class="col-lg-9 col-xl-4">
									<input type="hidden" name="builder[layout][header][menu][self][display]" value="false">
									<span class="kt-switch kt-switch--icon-check">
										<label>
											<input type="checkbox" name="builder[layout][header][menu][self][display]" value="true" checked="">
									        <span></span>
									    </label>
									</span>
									<div class="form-text text-muted">Display header menu</div>
								</div>
							</div>
				        </div>
				    </div>
				</div>
				<div class="tab-pane" id="kt_builder_subheader">
					<div class="kt-section kt-margin-t-30">
				    	<div class="kt-section__body">
				    		<div class="form-group row">
								<label class="col-lg-3 col-form-label">Display Subheader:</label>
								<div class="col-lg-9 col-xl-4">
									<input type="hidden" name="builder[layout][subheader][display]" value="false">
									<span class="kt-switch kt-switch--icon-check">
										<label>
									        <input type="checkbox" name="builder[layout][subheader][display]" value="true" checked="">
									        <span></span>
									    </label>
									</span>
									<div class="form-text text-muted">Display subheader</div>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-lg-3 col-form-label">Fixed Subheader:</label>
								<div class="col-lg-9 col-xl-4">
									<span class="kt-switch kt-switch--icon-check">
										<label>
											<input type="hidden" name="builder[layout][subheader][fixed]" value="false">
									        <input type="checkbox" name="builder[layout][subheader][fixed]" value="true">
									        <span></span>
									    </label>
									</span>
									<div class="form-text text-muted">Enable fixed(sticky) subheader. Requires <code>Solid</code> subheader style.</div>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-lg-3 col-form-label">Subheader Style:</label>
								<div class="col-lg-9 col-xl-4">
									<select class="form-control" name="builder[layout][subheader][style]">
										<option value="transparent" selected="">Transparent</option>
										<option value="solid">Solid</option>
									</select>
									<div class="form-text text-muted">Select subheader layout</div>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-lg-3 col-form-label">Width:</label>
								<div class="col-lg-9 col-xl-4">
									<select class="form-control" name="builder[layout][subheader][width]">
										<option value="fluid" selected="">Fluid</option>
										<option value="fixed">Fixed</option>
									</select>
									<div class="form-text text-muted">Select layout width type.</div>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-lg-3 col-form-label">Subheader Layout:</label>
								<div class="col-lg-9 col-xl-4">
									<select class="form-control" name="builder[layout][subheader][layout]">
                                        											<option value="subheader-v1" selected="">Subheader v1</option>
                                        											<option value="subheader-v2">Subheader v2</option>
                                        											<option value="subheader-v3">Subheader v3</option>
                                        											<option value="subheader-v4">Subheader v4</option>
                                        									</select>
									<div class="form-text text-muted">Select subheader layout</div>
								</div>
							</div>
				        </div>
				    </div>
				</div>
				<div class="tab-pane" id="kt_builder_content">
					<div class="kt-section kt-margin-t-30">
				    	<div class="kt-section__body">
							<div class="form-group row">
								<label class="col-lg-3 col-form-label">Width:</label>
								<div class="col-lg-9 col-xl-4">
									<select class="form-control" name="builder[layout][content][width]">
										<option value="fluid" selected="">Fluid</option>
										<option value="fixed">Fixed</option>
									</select>
									<div class="form-text text-muted">Select layout width type.</div>
								</div>
							</div>
				        </div>
				    </div>
				</div>
				<div class="tab-pane" id="kt_builder_footer">
					<div class="kt-section kt-margin-t-30">
						<div class="kt-section__body">
							<div class="form-group row">
								<label class="col-lg-3 col-form-label">Fixed Footer:</label>
								<div class="col-lg-9 col-xl-4">
									<span class="kt-switch kt-switch--icon-check">
										<input type="hidden" name="builder[layout][footer][self][fixed]" value="false">
									    <label>
											<input type="checkbox" name="builder[layout][footer][self][fixed]" value="true">
									        <span></span>
									    </label>
									</span>
									<div class="form-text text-muted">Set fixed header</div>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-lg-3 col-form-label">Width:</label>
								<div class="col-lg-9 col-xl-4">
									<select class="form-control" name="builder[layout][footer][self][width]">
										<option value="fluid" selected="">Fluid</option>
										<option value="fixed">Fixed</option>
									</select>
									<div class="form-text text-muted">Select layout width type.</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="kt-portlet__foot">
			<div class="kt-form__actions">
				<div class="row">
					<div class="col-lg-3"></div>
					<div class="col-lg-9">
						<input type="hidden" name="builder[tab]" value="#kt_builder_page"><button type="submit" name="builder_submit" data-demo="demo7" class="btn btn-brand">
							<i class="la la-eye"></i>
							Preview
						</button>&nbsp;
						<button type="submit" id="builder_export" data-demo="demo7" class="btn btn-success">
							<i class="la la-download"></i>
							Export
						</button>&nbsp;
						<button type="submit" name="builder_reset" data-demo="demo7" class="btn btn-secondary">
							<i class="la la-recycle"></i>
							Reset
						</button>
					</div>
				</div>
			</div>
		</div>
	</form>
	<!--end::Form-->
</div>