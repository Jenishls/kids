<style>
    .cms_menu_table>table>tbody>tr>th,
    .cms_menu_table>table>tbody>tr>td {
    vertical-align: inherit !important;
    }
    .edit_cms_post:hover{
        background:cornflowerblue;
        height: 20px !important;
        width: 25px !important;
        color: white !important;
        border-radius: 3px !important;
    }
</style>
{{-- {{dd($page)}} --}}
<div class="row search_row cms_post_row">
    <div class="rp_btn " style="width:100%">
        <div class="kt-subheader__wrapper page_table_head">
            <div style="" class="page_title_div">
                <button type="button" class="btn btn-bold btn-label-brand btn-sm page_name_view" id=''>
                    <span class="page_name_span"> 
						<span class="cms_title_name">{{ucwords($component->name)}}</span>
                    </span>
                </button>
            </div>
            <div>
			<button type="button" class="btn btn-bold btn-label-brand btn-sm add_field" data-route="/admin/cms/addmodal/post/{{$component->id}}"data-id = '' id='add_cms_post'>
                    <span>
                        <i class="la la-plus"></i>
                        <span style="font-size: 1rem;">
                            Post
                        </span>
                    </span>
                </button>
            </div>
        </div>
        

    </div>
    

</div>

<div class="row cms_menu_content">
    <div class="col-md-12 col-sm-12 cms_menu_table">
        <table class="table table-striped" id="myTable">
            <thead>
                <tr>
                    <th scope="col">Seq#</th>
                    <th scope="col">Title</th>
                    <th scope="col" style="width:30%;">Sub Title</th>
                    <th scope="col">Highlight</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody id="sort_me">
                @foreach ($cms_posts as $post)
                    <tr id="{{$post->id}}">
                        <td>
                            <span>{{$post->seq_no}}</span>
                        </td>
                        <td>{{ucfirst($post->title)}}</td>
                        <td>{{ucfirst($post->sub_title)}}</td>
                        <td>{{ucfirst($post->highlight)}}</td>
                    <td>
                        <a title="Edit" data-id="{{$post->id}}" class="btn btn-icon btn-pill edit_cms_post" data-route="/admin/cms/editmodal/post/{{$post->id}}" style="height: 2px;"><i class="la la-edit"></i>							
                        </a>
                        <a title="Delete" data-id="{{$post->id}}" class="btn temp_table_del btn-icon btn-pill delButton" href="#" style="height: 2px;">								<i class="la la-trash"></i>							
                        </a>
                    </td>
                    </tr>
                @endforeach
                {{-- <tr>
                <th scope="row">2</th>
                <td>Jacob</td>
                <td>Thornton</td>
                <td>@fat</td>
                </tr>
                <tr>
                <th scope="row">3</th>
                <td>Larry</td>
                <td>the Bird</td>
                <td>@twitter</td>
                </tr> --}}
            </tbody>
        </table>
    </div>
</div>



<script>
	
	$(document).off('click', '#add_cms_post').on('click', '#add_cms_post', function(e){
		e.preventDefault();
		e.stopPropagation();
        // let template_id = $(this).attr('data-id');
        let url = $(this).attr('data-route');
		supportAjax({
			// url: 'cms/addmodal/post/'+template_id	
			url: url	
		}, function(resp){
            $('#cmsElContainer').empty().append(resp);
        });
	}).off('click', '.edit_cms_post').on('click', '.edit_cms_post', function(e){
        e.preventDefault();
		supportAjax({
			url: $(this).data('route')	
		}, function(resp){
            $('#cmsElContainer').empty().append(resp);
        });
	}).off('click', '.delButton').on('click', '.delButton', function(e){
		e.preventDefault();
		let id= $(this).data('id');
		delConfirm({
			url:"/admin/cms/delete/post/"+id,
			appendView: $('#cmsElContainer')
		});
	});

	
    $("#sort_me").sortable({
        distance: 5,
        delay: 100,
        opacity: 0.6,
        cursor: 'move',
        update: function(event, ui) {
            var seqData = new Array();
            $('#sort_me tr').each( function() {
                seqData.push({['post_id']:$(this).attr("id")});
            });

            $.ajax({
                url:'/admin/cms/post/drag_sort',
                method:'POST',
                data:{data:seqData},
                success: function(resp) {
                    $('#cmsElContainer').empty().append(resp);
                }
            });
        }
    });
</script>