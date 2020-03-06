{{-- <div class="back_temp" style="width: 94px;position:absolute;left:87%;">
    <a class="kt-menu__link get_profile" onclick="event.preventDefault();" data-route="/admin/client/clientProfile/{{$order->client_id}}">
        <i class="fas fa-arrow-left" style="padding-right: 10px;
        "></i>
        Back
    </a>
</div> --}}
{{-- <div class="kt-portlet kt-portlet--height-fluid">
    <div class="kt-portlet__body">
        <div class="tab-content">
            <div class="tab-pane active" id="kt_widget5_tab1_content" aria-expanded="true">
                <div class="kt-widget5">
                    <div class="kt-widget5__item">
                        <div class="kt-widget5__content">
                            <div class="kt-widget5__pic">
								<img class="kt-widget7__img" src="{{asset('media/products/product27.jpg')}}" alt="">
							</div>
                            <div class="kt-widget5__section">
                                <a href="#" class="kt-widget5__title">
                                    Order Number: {{$order->order_no}}
                                </a>
                                
                                <div class="kt-widget5__info">
                                    <span>Author:</span>
                                    <span class="kt-font-info">Keenthemes</span>
                                    <span>Released:</span>
                                    <span class="kt-font-info">23.08.17</span>
                                </div>
                            </div>
                        </div>						
                        <div class="kt-widget5__content">
                            <div class="kt-widget5__stats">
                                <span class="kt-widget5__number">19,200</span>
                                <span class="kt-widget5__sales">sales</span>
                            </div>
                            <div class="kt-widget5__stats">
                                <span class="kt-widget5__number">1046</span>
                                <span class="kt-widget5__votes">votes</span>
                            </div>
                        </div>	
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}
<div class="kt-portlet kt-portlet--height-fluid">
	<div class="kt-portlet__head">
		<div class="kt-portlet__head-label">
			<h3 class="kt-portlet__head-title">
				Order #: {{$order->order_no}}
			</h3>
		</div>
		<div class="kt-portlet__head-toolbar">
			<ul class="nav nav-pills nav-pills-sm nav-pills-label nav-pills-bold" role="tablist" style="align-items: center;">
                <li class="nav-item">
					<div class="back_temp" style="">
                        <a class="kt-menu__link get_profile" onclick="event.preventDefault();" data-route="/admin/client/clientProfile/{{$order->client_id}}">
                            <i class="fas fa-arrow-left" style="padding-right: 10px;
                            "></i>
                            Back
                        </a>
                    </div>
				</li>
			</ul>
		</div>
	</div>
	<div class="kt-portlet__body">
		<div class="tab-content">
			<div class="tab-pane active" id="kt_widget5_tab1_content" aria-expanded="true">
				<div class="kt-widget5">
					<div class="kt-widget5__item">
						<div class="kt-widget5__content">
							<div class="kt-widget5__pic">
								<img class="kt-widget7__img" src="{{asset('media/products/product27.jpg')}}" alt="">
							</div>
							<div class="kt-widget5__section">
								<a href="#" class="kt-widget5__title">
									Great Logo Designn
								</a>
								<p class="kt-widget5__desc">
									Metronic admin themes. 
								</p>
								<div class="kt-widget5__info">
									<span>Author:</span>
									<span class="kt-font-info">Keenthemes</span>
									<span>Released:</span>
									<span class="kt-font-info">23.08.17</span>
								</div>
							</div>
						</div>						
						<div class="kt-widget5__content">
							<div class="kt-widget5__stats">
								<span class="kt-widget5__number">19,200</span>
								<span class="kt-widget5__sales">sales</span>
							</div>
							<div class="kt-widget5__stats">
								<span class="kt-widget5__number">1046</span>
								<span class="kt-widget5__votes">votes</span>
							</div>
						</div>	
					</div>
					<div class="kt-widget5__item">
						<div class="kt-widget5__content">
							<div class="kt-widget5__pic">
								<img class="kt-widget7__img" src="{{asset('media/products/product22.jpg')}}" alt="">
							</div>
							<div class="kt-widget5__section">
								<a href="#" class="kt-widget5__title">
									Branding Mockup
								</a>
								<p class="kt-widget5__desc">
									Metronic bootstrap themes. 
								</p>
								<div class="kt-widget5__info">
									<span>Author:</span>
									<span class="kt-font-info">Fly themes</span>
									<span>Released:</span>
									<span class="kt-font-info">23.08.17</span>
								</div>
							</div>
						</div>						
						<div class="kt-widget5__content">
							<div class="kt-widget5__stats">
								<span class="kt-widget5__number">24,583</span>
								<span class="kt-widget5__sales">sales</span>
							</div>
							<div class="kt-widget5__stats">
								<span class="kt-widget5__number">3809</span>
								<span class="kt-widget5__votes">votes</span>
							</div>
						</div>	
					</div>		
					<div class="kt-widget5__item">
						<div class="kt-widget5__content">
							<div class="kt-widget5__pic">
								<img class="kt-widget7__img" src="{{asset('media/products/product15.jpg')}}" alt="">
							</div>
							<div class="kt-widget5__section">
								<a href="#" class="kt-widget5__title">
									Awesome Mobile App
								</a>
								<p class="kt-widget5__desc">
									Metronic admin themes.Lorem Ipsum Amet 
								</p>
								<div class="kt-widget5__info">
									<span>Author:</span>
									<span class="kt-font-info">Fly themes</span>
									<span>Released:</span>
									<span class="kt-font-info">23.08.17</span>
								</div>
							</div>
						</div>						
						<div class="kt-widget5__content">
							<div class="kt-widget5__stats">
								<span class="kt-widget5__number">210,054</span>
								<span class="kt-widget5__sales">sales</span>
							</div>
							<div class="kt-widget5__stats">
								<span class="kt-widget5__number">1103</span>
								<span class="kt-widget5__votes">votes</span>
							</div>
						</div>	
					</div>						
				</div>
			</div>
		</div>
	</div>
</div>