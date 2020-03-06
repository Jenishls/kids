<style>
    .kanban-container {
        width: 100% !important;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -ms-flex-wrap: wrap;
        flex-wrap: wrap;
        position: relative;
        -webkit-box-sizing: border-box;
        box-sizing: border-box;
        width: auto;
        width: 750px;
        display: flex;
        overflow-x: auto;
        display: flex;
        flex-wrap: nowrap;
        overflow-x: scroll;
        overflow-y: hidden;
        min-height: 74.5vh;
        height: auto;
        max-width: 100%;
        -webkit-overflow-scrolling: touch;
        -ms-overflow-style: -ms-autohiding-scrollbar;
    }

    .kanban-container::-webkit-scrollbar {
        height: 1.2rem;
    }


    .kanban-container::-webkit-scrollbar-track {
        -webkit-box-shadow: inset 0 0 6px #f2f3f8 !important;
        box-shadow: inset 0 0 6px #f2f3f8 !important;
    }

    .kanban-container .kanban-board {
        width: calc(20% - 1.25rem) !important;
        border-radius: 4px;
        margin-bottom: 1.25rem;
        margin-right: 1.25rem !important;
        background-color: #f7f8fa;
        min-width: 350px;
        height: min-content;
        max-height: 100%;
        padding-bottom: 15px;
        position: relative;
        float: left;
        background: #fff;
        -webkit-transition: all .3s cubic-bezier(.23, 1, .32, 1);
        transition: all .3s cubic-bezier(.23, 1, .32, 1);
    }

    .kanban-container * {
        -webkit-box-sizing: border-box;
        box-sizing: border-box;
    }

    .kanban-container .kanban-board-header {
        border-top-left-radius: 4px;
        border-top-right-radius: 4px;
        display: flex;
        justify-content: space-between;
        font-size: 16px;
        padding: 15px;
        padding: 18px 18px 7px 18px;
    }

    .kanban-container * {
        -webkit-box-sizing: border-box;
        box-sizing: border-box;
    }

    .kanban-container .kanban-board .kanban-title-board {
        font-weight: 600;
        font-size: 1.2rem;
    }

    .kanban-board header .kanban-title-board {
        font-weight: 700;
        margin: 0;
        padding: 0;
        display: inline;
    }

    .kanban-title-button {
        border: 0;
        border-radius: 50%;
        background: #1dc9b7;
        color: #fff;
        -webkit-box-shadow: 0 0 13px 0 rgba(0, 0, 0, .05);
        box-shadow: 0 0 13px 0 rgba(0, 0, 0, .05);
        width: 25px;
        height: 25px;
    }

    .kanban-board .kanban-drag {
        /* min-height: 200px; */
        padding: 0 20px 20px 20px;
        /* max-height: calc(100vh - 27rem); */
        /* overflow-y: scroll; */
        margin-top: 20px;
    }

    .kanban-board:after {
        clear: both;
        display: block;
        content: "";
    }

    .kanban-container .kanban-item {
        border-radius: 4px;
        font-weight: 500;
        -webkit-box-shadow: 0 0 13px 0 rgba(0, 0, 0, .05);
        box-shadow: 0 0 13px 0 rgba(0, 0, 0, .05);
        background: #e8e8e8;
        padding: 15px;
        margin-bottom: 20px;
        -webkit-transition: all .3s cubic-bezier(.23, 1, .32, 1);
        transition: all .3s cubic-bezier(.23, 1, .32, 1);
        cursor: move;
    }

    .movable-placeholder {
        background: #f2f3f8;
        display: block;
        border-style: dashed;
        border-width: 1px;
        border-color: #fafafa;
        margin-bottom: 15px;
        margin-right: 14px;
        padding: 0;
        border-radius: 4px;
    }

    .kanban-badge-status {
        margin: 1px !important;
        color: #ffffff;
        background: #1dc9b7;
        display: inline-flex;
        -webkit-box-pack: center;
        -ms-flex-pack: center;
        justify-content: center;
        -webkit-box-align: center;
        -ms-flex-align: center;
        align-items: center;
        height: 6px;
        padding: 10px;
        font-size: 12px;
        border-radius: 3px;
        text-transform: capitalize;
    }

    .kanban-item-due-date {
        background: #ffd9d978;
        padding: 2px 9px;
        border-radius: 3px;
        font-weight: 300;
        font-size: 12px;
    }

    .kanban-item-info {
        display: flex;
        justify-content: space-between;
    }

    .ui-sortable-helper {
        transform: rotate(1.5deg);
    }

    .kanban-container::-webkit-scrollbar {
        height: 8px;
    }

    .kanban-status-container {
        padding: 0 20px;
        height: 15px;
    }

    .kanban-status {
        padding: 1px 10px;
        color: #fff;
        border-radius: 11px;
        font-size: 13px;
        font-weight: 500;
        text-transform: capitalize;
    }
    /* .kanban-drag::-webkit-scrollbar {
         width: 4px;
    }

    .kanban-drag::-webkit-scrollbar-thumb {
        background-color: #929292;
    }
    .kanban-drag::-webkit-scrollbar-track {
        -webkit-box-shadow: inset 0 0 6px #cccccc !important;
        box-shadow: inset 0 0 6px #cccccc !important;
    } */

    .kanban-container::-webkit-scrollbar-button {
        display: none;
    }

    .kanban-container::-webkit-scrollbar-thumb {
        background-color: #929292;;
    }

    .kanban-container::-webkit-scrollbar-track {
        -webkit-box-shadow: inset 0 0 6px #c4c9cc !important;
        box-shadow: inset 0 0 6px #c4c9cc !important;
    }
    .kanban-btn-new-card{
        color: #000;
        font-weight: 400;
        margin: 0 10px;
    }
    .kanban-btn-new-card:hover{
        cursor: pointer;
        text-decoration:underline !important;
    }
</style>
<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">
    <div class="kt-subheader kt-grid__item uc_subHeader userControlSubHeader" id="kt_subheader">
		<div class="kt-container ">
			<div class="kt-subheader__main">
				<h3 class="kt-subheader__title">
					{{strtoupper($taskboard->title)}}
				</h3>
				<span class="kt-subheader__separator kt-hidden"></span>
				<div class="kt-subheader__breadcrumbs">
					<a href="JavaScript:void(0);" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
					<span class="kt-subheader__breadcrumbs-separator"></span>
					<a href="" class="kt-subheader__breadcrumbs-link">Taskboard</a>
					<span class="kt-subheader__breadcrumbs-separator"></span>
					<a href="" class="kt-subheader__breadcrumbs-link">Kanban</a>
				</div>
			</div>
		</div>
		<div class="kt-subheader__wrapper" style="display:flex">
			<button type="button" class="btn btn-default btn-sm pageload mr-10" data-route="/admin/taskboard"><i class="fa fa-arrow-left"></i> Back</button>
			<button type="button" class="btn btn-success btn-sm openModel" style="width:max-content"
                    data-url="admin/taskboardlist/add/{{$taskboard->id}}"><i class="fa fa-plus"></i>New List</button>
		</div>
	</div>
    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
        <div class="row">
            <div class="col-lg-12">
                    @include("supportNew.pages.taskboard_list.include._body")
            </div>
        </div>
    </div>
    <script>
        sortableCardTableView();
        $(".kanban-btn-new-card").on("click",function(e){
            e.preventDefault();
            e.stopPropagation();
            $(this).css("display","none");
            $(this).siblings(".kanban-item").css("display","block");
        });
        $(".hideForm").on("click",function(e){
            e.preventDefault();
            e.stopPropagation();
            $(this).closest(".kanban-item").siblings("a.kanban-btn-new-card").css("display","block");
            $(this).closest(".kanban-item").css("display","none");
        });

    </script>
</div>