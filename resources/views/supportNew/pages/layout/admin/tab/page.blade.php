<div class="tab-pane active" id="kt_builder_page">
					<div class="kt-section kt-margin-t-30">
						<div class="kt-section__body">
							<div class="form-group row">
								<label class="col-lg-3 col-form-label">Page Loader:</label>
								<div class="col-lg-9 col-xl-4">
									<select class="form-control" name="builder[layout][loader][type]">
										<option value="" selected="">Disabled</option>
										<option value="default">Spinner</option>
										<option value="spinner-message">Spinner &amp; Message</option>
										<option value="spinner-logo">Spinner &amp; Logo</option>
									</select>
									<div class="form-text text-muted">Select page loading indicator</div>
								</div>
							</div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Display Page Toolbar:</label>
                                <div class="col-lg-9 col-xl-4">
                                    <input type="hidden" name="builder[layout][toolbar][display]" value="false">
                                    <span class="kt-switch kt-switch--icon-check">
										<label>
									        <input type="checkbox" name="builder[layout][toolbar][display]" value="true" checked="">
									        <span></span>
									    </label>
									</span>
                                    <div class="form-text text-muted">Display or hide the page's right center toolbar(demos switcher, documentation and page builder links)</div>
                                </div>
                            </div>
				        </div>
				    </div>
				</div>