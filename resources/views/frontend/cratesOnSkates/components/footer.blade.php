<footer class="footer">
    <section class="section-b-space striped-pattern-bg">
        <div class="container">
            <div class="row footer-theme partition-f">               
                <div class="col footer-page-col">
                    <div class="sub-title">
                        <div class="footer-title">
                            <h4>{{default_company('company_name')}}</h4>
                        </div>
                        <div class="footer-contant">
                            <ul>
                                
                                @foreach ($menus as $key => $menu)
                                    <li>
                                        @if($menu->name === 'login')
                                            <a href="javascript:void(0);" class="login_menu" id="" data-route="{{$menu->route}}" data-slug="page-{{$menu->slug?: str_slug($menu->name)}}">  
                                                {{strtoupper($menu->name)}} 
                                            </a>
                                            @else
                                            <a href="javascript:void(0);" class="load_pages" data-route="{{$menu->route}}" data-slug="page-{{$menu->slug?: str_slug($menu->name)}}">  
                                                {{strtoupper($menu->name)}} 
                                            </a>
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                
                <div class="col footer-stalk-us-col">
                    <div class="sub-title">
                        <div class="footer-title">
                            <h4>Stalk Us</h4>
                        </div>
                        <div class="footer-contant">
                            <ul>
                                <li class="text-uppercase"><a href="{{default_company('facebook')}}" target="_blank"><span class="facebook "><i class="fab fa-facebook-f"></i></span>facebook</a></li>
                                <li class="text-uppercase"><a href="{{default_company('instagram')}}" target="_blank"><span class="insta"><i class="fab fa-instagram"></i></span> instagram</a></li>
                                <li class="text-uppercase"><a href="{{default_company('google_plus')}}" target="_blank"><span class="google"><i class="fab fa-google-plus"></i></span>Google Plus</a></li>
                                <li class="text-uppercase"><a href="{{default_company('youtube')}}" target="_blank"><span><i class="fab fa-youtube"></i></span> Youtube</a></li>
                                <li class="text-uppercase"><a href="{{default_company('yelp')}}" target="_blank"><span class="google"><i class="fab fa-yelp"></i></span>Yelp</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col footer-contact-col">
                    <div class="sub-title">
                        <div class="footer-title">
                            <h4 style="margin-bottom:0;">{{default_company('company_name')}}</h4>
                        </div>
                        <div class="footer-contant text-white">
                            {{custom_exploder('|',default_company('address'))[0]}}<br>
                            {{custom_exploder('|',default_company('address'))[1]}}<br>
                            @if(isset(custom_exploder('|',default_company('address'))[2]))
                              {!! custom_exploder('|',default_company('address'))[2]."<br/>" !!}
                            @endif
                            {{preg_replace('/(\d{3})(\d{3})(\d{1,4})/','($1) $2-$3',default_company('phone_number'))}}
                            <ul>
                                <li class="text-uppercase" rel="js--norouter-load" data-route-norouter="/noncomponent/privacy_terms2"><a href="#">Privacy And Terms</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col footer-contact-col" style="border:none;">
                    <div class="sub-title">
                        <div class="footer-contant">
                                <li><img src="{{asset('cratesOnSkatesImages/footer-man.png')}}" align=""></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="hr-b footer__copyright-text">        
        <p>
            <i class="fa fa-copyright" aria-hidden="true"></i> Copyright {{Date('Y')." ".default_company('company_name')}}. All Rights Reserved.
        </p>                   
    </div>
</footer>