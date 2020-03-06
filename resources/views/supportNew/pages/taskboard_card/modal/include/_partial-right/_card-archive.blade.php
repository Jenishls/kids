<style>
.custom{
    background: #ffffff;
    position: absolute;
    left: 0;
    border-left: 1px solid #fafafa;
    border-bottom: 1px solid #fafafa;
    -webkit-box-shadow: 2px 3px 9px 3px rgba(224,224,224,0.67);
    -moz-box-shadow: 2px 3px 9px 3px rgba(224,224,224,0.67);
    box-shadow: 2px 3px 9px 3px rgba(224,224,224,0.67);
    padding: 11px;
    z-index: 1;
    top: 35px;
    width: 100%;
 }
</style>
<li class="card-archive-now" title="Archive Card" style="position:relative">
    <button type="button" class="btn action-button btnCardArchive"><i class="la la-archive"></i> Archive</button>
    <div class="card-archive custom text-center" style="display:none">
        <button type="button" class="btn btn-outline-danger  btn-sm m-t-10" data-id="{{$card->id}}" id="btnTaskboardCardArchive">Archive Confirm</button>
    </div>
</li>

<script>
 $(".btnCardArchive").on("click",function() {
        $(".card-archive").toggle();
        $(document).find(".card-copy-custom").hide();
        $(document).find(".card-move-custom").hide();
    });
</script>