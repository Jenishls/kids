<div class="col-md-6">
    <div class="specialization_area">
        <h2 class="headline">Our Specialization</h2>
        <div class="skills_list">
            <!-- Start Single skill-->
            @foreach ($posts as $post)
                
                <div class="single_skill">
                    <h3>{{$post->title}} <span>Skill Rate {{$post->sub_title}}%</span></h3>
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" aria-valuenow="{{(int)$post->sub_title}}" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div><!-- End Single skill-->
            @endforeach
{{-- 
            <!-- Start Single skill-->
            <div class="single_skill">
                <h3>Adobe Indesign <span>Skill Rate 88%</span></h3>
                <div class="progress">
                    <div class="progress-bar" role="progressbar" aria-valuenow="88" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div><!-- End Single skill-->

            <!-- Start Single skill-->
            <div class="single_skill">
                <h3>Adobe Flash <span>Skill Rate 80%</span></h3>
                <div class="progress">
                    <div class="progress-bar" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div><!-- End Single skill-->

            <!-- Start Single skill-->
            <div class="single_skill">
                <h3>Adobe After Effect <span>Skill Rate 85%</span></h3>
                <div class="progress">
                    <div class="progress-bar" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div><!-- End Single skill-->

            <!-- Start Single skill-->
            <div class="single_skill">
                <h3>Adobe Dreamweaver <span>Skill Rate 95%</span></h3>
                <div class="progress">
                    <div class="progress-bar" role="progressbar" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div><!-- End Single skill-->

            <!-- Start Single skill-->
            <div class="single_skill">
                <h3>Adobe Indesign <span>Skill Rate 75%</span></h3>
                <div class="progress">
                    <div class="progress-bar" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div><!-- End Single skill--> --}}
        </div>
    </div>
</div>

<script>
    $(".team_details_area").waypoint(function() {
        $('.progress-bar').css("width",
            function() {
                return $(this).attr("aria-valuenow") + "%";
            }
        );
        offset: 'bottom-in-view'
    });

</script>