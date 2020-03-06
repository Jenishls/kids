@foreach ($posts as $post)
<div class="row">
    <div class="col-md-6">
        <div class="team_thumb image_effect">
            @if ($post->file)
                <img src="data:image;base64,{{base64_encode(file_get_contents(storage_path("CMS/post/".$post->file->file_name)))}}" alt="team">
            @endif
        </div>
    </div>
    <div class="col-md-6">
        <div class="team_info">
            <h3>{{$post->title}}</h3>
            <p>- {{$post->sub_title}}</p>
            <div class="team_content">
                {!!$post->content!!}
                <ul class="team_social text-right">
                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fa fa-skype"></i></a></li>
                    <li><a href="#"><i class="fa fa-behance"></i></a></li>
                    <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endforeach