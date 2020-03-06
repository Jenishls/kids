<div class="modal-dialog modal-800" role="document">
    <div class="modal-content mp0">
        <!-- <div class="modal-body"> -->
        <div class="modal-body mp0">
            <div class="m-form m-form--label-align-right floatLabelForm">
                <div class="no-bx-shadow">
                    <div class="m-portlet__body card-update">
                        <div class="row">
                            <div class="col-md-12 mx-auto">
                                <div class="card-update_title">
                                    <div style="display:flex">
                                        <div><i class="la la-align-right fs-25"></i></div>
                                        <div>
                                            <div><h4 class="title card_title_container" data-id="{{$card->id}}">{{$card->title}}</h4></div>
                                            <span class="pd-l-10 fs-12">in <span class="fw-600">{{$card->taskboardList->title}} </span></span>
                                        </div>
                                    </div>
                                    <div class="card-update_icon-close"><i class="la la-close fs-20" data-dismiss="modal"></i></div>
                                </div>
                            </div> 
                            <div class="col-12 col-sm-12">
                                <div class="row">
                                    @include("supportNew.pages.taskboard_card.modal.include.card-left")
                                    @include("supportNew.pages.taskboard_card.modal.include.card-right")
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
