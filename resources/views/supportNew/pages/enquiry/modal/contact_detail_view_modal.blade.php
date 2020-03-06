<style>
    .d-grid{
        display: grid;
    }
    .m-t-10{
        margin-top: 10px;
    }

    .grid-gap-25{
        grid-gap: 25px;
    }

    .d-grid h5{
        color: #13b2fd;
    }

</style>
<div class="modal-dialog addZipModalDialog" role="document">
    <div class="modal-content addZipModal">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Enquiry Details</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            </button>
        </div>
        <div class="modal-body">
            <div class="row" style="background: #fff; padding: 20px">
                <div class="col-md-12">
                    <div class="d-grid">
                        <span><h5>{{ucfirst($enq->fname)." ".ucfirst($enq->lname)}}</h5></span>
                        <span>{{$enq->email}}</span>
                        <span>{{$enq->phone ? preg_replace('/(\d{3})(\d{3})(\d{1,4})/', '($1) $2-$3', $enq->phone) : ''}}</span>
                    </div>
                    <div class="d-grid grid-gap-25" style="margin-top: 25px">
                        @if($enq->company)
                            <div>
                                <h5>Company</h5>
                                {{ucfirst($enq->desc)}}
                            </div>
                        @endif
                        <div>
                            <h5>Reason</h5>
                            {{ucfirst($enq->reason)}}
                        </div>
                        <div>
                            <h5>Message</h5>
                            {{ucfirst($enq->desc)}}
                        </div>
                    </div>
                </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary x" data-dismiss="modal">Close</button>
            {{-- <button class="btn btn-sm btn-pill btn-success text-capitalize" data-enq-id="{{$enq->id}}" id="convert--client">Convert to client</button> --}}
        </div>
    </div>
</div>

<script>    

    clickEvent('#convert--client')(convertClient)

    function convertClient(e){
        e.preventDefault()
        supportAjax({
            url : '/admin/enquiry/convert_to_client/'+$(this).attr('data-enq-id')
        }, () => {  
            toastr.success("Successfully converted to client");
        })
    }

</script>