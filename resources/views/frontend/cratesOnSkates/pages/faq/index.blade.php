<div class="hr"></div>
<div class="faq-section radial-th-gradient">
    <div class="container">
        <div class="row">
            <!-- ***** FAQ Start ***** -->
            <div class="col-md-10 offset-md-1">
                <div class="title3">
                    <h2 class="title-inner3 cs-section-title-b">FAQ</h2>
                </div>
            </div>
            <div class="col-md-10 offset-md-1" style="padding-bottom: 100px;">
                <div class="faq" id="accordion">
                    @foreach($data as $key => $faq)
                        <div class="card">
                            <div class="card-header" id="faqHeading-1">
                                <div class="mb-0">
                                    <h5 class="faq-title" data-toggle="collapse" data-target="#faqCollapse-{{$key}}" data-aria-expanded="true" data-aria-controls="faqCollapse-{{$key}}">
                                        <span class="badge">{{$loop->iteration}}</span>{{preg_replace('/\?$/', '', ucfirst($faq->question)). " ?"}}
                                    </h5>
                                </div>
                            </div>
                            <div id="faqCollapse-{{$key}}" class="collapse cs-default show" aria-labelledby="faqHeading-{{$key}}" data-parent="#accordion">
                                <div class="card-body">
                                    <p>{{ucfirst($faq->faqAnswer->answer)}}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
               </div>
            </div>
        </div>
    </div>
</div>