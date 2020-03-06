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
                        <span class="cms_title_name">{{ucfirst($page->page_name)}}</span>
                    </span>
                </button>
                <a class="kt-subheader__breadcrumbs-link cms_page_title" style="">Title: {{$page->site_title}}</a>
            </div>
            <div>
                {{-- <button type="button" class="btn btn-bold btn-label-brand btn-sm add_field" data-route="{{$page->target}}" data-toggle="modal" data-target="#sys_icon_model" data-id = '{{$page_id}}' id='add_component'>

                    <span>
                        <i class="la la-eye"></i>
                        <span style="font-size: 1rem;">
                            Preview
                        </span>
                    </span>
                </button> --}}
                <button type="button" class="btn btn-bold btn-label-brand btn-sm preview_component_view" id='page_preview' data-route="/admin/preview{{$page->target}}" data-id="{{$page->id}}">
                    <span>
                        <i class="la la-eye"></i>
                        <span id="previewText" style="font-size: 1rem;">
                            Preview
                        </span>
                    </span>
                </button>

                <button type="button" class="btn btn-bold btn-label-brand btn-sm add_field" data-route="/admin/cms/addmodal/component/{{$page_id}}" data-toggle="modal" data-target="#sys_icon_model" data-id = '{{$page_id}}' id='add_component'>

                    <span>
                        <i class="la la-plus"></i>
                        <span style="font-size: 1rem;">
                            Component
                        </span>
                    </span>
                </button>
            </div>
        </div>
        

    </div>
    

</div>
<div id="page_desc" class="page_toggle_body">
    <a class="kt-subheader__breadcrumbs-link cms_page_keyword" name="site_keyword">Keyword: {{$page->site_keyword}} </a><br>
    <a class="kt-subheader__breadcrumbs-link cms_page_desc">Description: {{$page->site_description}}</a><br>
</div>
<div class="row cms_menu_content">
    <div class="col-md-12 col-sm-12 cms_menu_table">
        <table class="table table-striped" id="myTable">
            <thead>
                <tr>
                    <th scope="col">Components</th>
                    <th scope="col">Seq#</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody id="sort_me">
                @foreach ($components as $component)
                    <tr id="{{$component->id}}">
                    <td>{{ucfirst($component->name)}}</td>
                    <td>
                        <span>{{$component->seq_no}}</span>
                    </td>
                    <td>
                        <a title="Delete" data-id="{{$component->id}}" class="btn temp_table_del btn-icon btn-pill delButton" href="#" style="height: 2px;">								<i class="la la-trash"></i>							
                        </a>
                        <a title="Show Posts" data-route="/admin/cms/view/posts/{{$component->id}}" class="btn edit_cms_post btn-icon btn-pill view_sections_element" href="#" style="height: 2px;margin-top:8px;">								<i class="la la-eye"></i>							
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
<iframe id="previewFrame" src="/preview{{$page->target}}" frameborder="0" scrolling="no" onload="resizeIframe(this)" style="display:none;"></iframe>
<script>
	
    $("#sort_me").sortable({
        distance: 5,
        delay: 100,
        opacity: 0.6,
        cursor: 'move',
        update: function(event, ui) {
            var seqData = new Array();
            $('#sort_me tr').each( function() {
                seqData.push({['comp_id']:$(this).attr("id")});
            });

            $.ajax({
                url:'/admin/cms/component/drag_sort',
                method:'POST',
                data:{data:seqData},
                success: function(resp) {
                    $('#cmsElContainer').empty().append(resp);
                }
            });
        }
    });
$(document).off('click', '.delButton').on('click', '.delButton', function(e){
    e.preventDefault();
    let id= $(this).data('id');
		delConfirm({
			url:"/admin/cms/delete/component/"+id,
			appendView: $('#cmsElContainer'),
		});
});

// toggle
$('.page_title_div').click(function(){
    // let id = $(this).attr('data-id');
    // $(`#div_body_${id}`).toggle(`.blog_toggle_${id}`);
    $('#page_desc').toggle('.page_toggle_body');
});

/**
 * Page preview
*/
var preview_toggle = 0;
$(document).off('click', '#page_preview').on('click', '#page_preview', function(e){
    e.preventDefault();
    var self = $(this);
    if(preview_toggle === 0){
        self.children().children('i').removeClass('la-eye').addClass('la-eye-slash');
        $(document).find('#previewText').html('Exit Preview');
        preview_toggle = 1;
    }else{
        self.children().children('i').removeClass('la-eye-slash').addClass('la-eye');
        $(document).find('#previewText').html('Preview');
        preview_toggle = 0;
    }
    $('.cms_menu_content').toggle();
    $('#previewFrame').toggle();
});
function resizeIframe(obj) {
    obj.style.height = obj.contentWindow.document.body.scrollHeight + 'px';
}
</script>