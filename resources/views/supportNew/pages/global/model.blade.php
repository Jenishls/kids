<div class="modal fade show" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" style="padding-right: 17px; display: none;" aria-modal="true" data-something='this'>
    <div class="modal-dialog" style=" margin-top: 18%">
        <div id="loadingGif" class="hidden"></div>
        <div class="modal-content" role="document" style="min-width: 504px;">
            {{-- <div class="modal-header deleteModalHeader">
                <h4 id="confirmationBody">Confirm</h4>
            </div> --}}
            <div class="modal-body" style="border-radius:4px;">
                
                <div class="swal2-icon swal2-warning swal2-animate-warning-icon" style="display: flex;border-color: #f06878;color: #f06878;"></div>
                
                <h5 style="text-align: center;">Are you sure you want to delete?</h5>
            <div>
        </div></div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn  modal-close" id="exitDelete">No</button>
                <button type="button" data-dismiss="modal" class="btn btn-danger modal-close" id="confirmedDelete">Yes</button>
            </div>
        </div>

    </div>
</div>

