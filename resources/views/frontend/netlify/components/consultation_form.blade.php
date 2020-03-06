<div class="appointment_area mtb-100">
    <div class="container">
        @foreach ($posts as $post)
            <div class="row">
                <div class="col-md-6">
                    <div class="about_thumbnil shadow__black">
                        @if ($post->file)
                            
                            <img src="data:image;base64,{{base64_encode(file_get_contents(storage_path("CMS/post/".$post->file->file_name)))}}" alt="About">
                        @endif
                        <div class="info">
                            <h3>25<span>year expriance</span></h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="get_touch_area shadow__black">
                        <div class="section_title text-left">
                            <h2 class="title__heading text-capitalize">{{$post->title}}</h2>
                        </div><!--/.section_title-->
                        <div class="project_inquiry_content">
                            <form id="tuch_form_{{$post->id}}" class="default_form tuch_form" name="inquiryform">
                                <div class="form-group">
                                    <input name="name" id="name" placeholder="Your Name" class="form-controllar" type="text">
                                </div><!--/.form-group-->
                                
                                <div class="form-group">
                                    <input name="email" id="email" placeholder="Emaill Address" class="form-controllar" type="email">
                                </div><!--/.form-group-->
                                
                                <div class="form-group form-select">
                                    <select>
                                        <option>web development</option>
                                        <option>web design</option>
                                        <option>graphics design</option>
                                    </select>
                                </div><!--/.form-group-->
                                
                                <div class="form-group">
                                    <textarea name="message" id="message" class="form-controllar" placeholder="Write your message"></textarea>
                                </div><!--/.form-group-->
                                
                                <div class="form-group-btn text-right">
                                    <button id="submit" type="submit" class="btn btn-default">Submit Now</button>
                                </div><!--/.form-group-btn-->
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>