<div class="modal fade show" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" style="padding-right: 17px; display: none;" aria-modal="true" data-something='this'>
    <div class="modal-dialog" style=" margin-top: 12%">
        <div id="loadingGif" class="hidden"></div>
        <div class="modal-content" role="document" style="min-width: 504px;">
            {{-- <div class="modal-header deleteModalHeader">
                <h4 id="confirmationBody">Confirm</h4>
            </div> --}}
            <div class="modal-body pd-50" style="border-radius:4px; ">
                
                {{-- <div class="swal2-icon swal2-warning swal2-animate-warning-icon" style="display: flex;border-color: #f06878;color: #f06878;"></div> --}}
                
                <h4 style="text-align: center;">Are you sure you want to delete?</h4>
            <div>
        </div></div>
            <div class="modal-footer display-flex justify-space-between">
                <button type="button" class="global-btn global-btn__default no-m-left global-cancel-btn" data-dismiss="modal" id="exitDelete">
                    <p>No</p>
                </button>
                <button type="button" class="global-btn global-btn__red global-add-btn" data-dismiss="modal" id="confirmedDelete">
                    <p>yes</p>
                </button>
            </div>
        </div>

    </div>
</div>