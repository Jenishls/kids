<div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Company Icons - ADD</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col">
                        <form id="addIconForm">
                            @csrf
                            <div class="row">
                                <div class="form-group label-floating col-md-6">
                                    <label class="control-label" for="day">Icon Name</label>
                                    <input class="form-control " type="text" name="icon_name" placeholder="Icon Name" value="icon_">
                                    <div class="errorMessage"></div>
                                </div>
                                <div class="form-group label-floating col-md-6">
                                    <label class="control-label" for="opening_time">Icon Image</label>
                                    <div class="custom-file">
                                        <input type="file" name="icon_image" class="custom-file-input" id="customFile">
                                        <label class="custom-file-label" for="customFile" style="color :#49505796; font-weight: 400; font-size: 13px;">Choose Icon Image</label>
                                    </div>
                                    <div class="errorMessage"></div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
    
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary x" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary sy_icon" data-id="" id="storeIcon">Save</button>
            </div>
        </div>
    </div>
    
    <script>
        $(document).off('click', '#storeIcon').on('click', '#storeIcon', function(e) {
            console.log('sada');
            e.preventDefault();
            e.stopPropagation();
            
            $.ajax({
            url:'icon/store',
            method: 'POST',
            data: new FormData(document.getElementById('addIconForm')),
            contentType: false,
            processData: false,
            success: function(response){
                $('#cModal').modal('hide');
                icons();
                toastr.success('Icon Successfully added.');
            }, 
            error:function({status, responseJSON})
            {
                // if(status===422){
                //     $('#accountAddForm').find('input[name], select[name]').css('border-color', '#ddd');
                //     $(`input[name]`).siblings(".errorMessage").empty();
                //     $(`select[name]`).siblings(".errorMessage").empty();

                //     if (!responseJSON.errors) return;
                //     const messages = [];
                //     for (const [key, message] of Object.entries(responseJSON.errors)) {
                //          $('#accountAddForm').find(`input[name = "${ key }"]`).css('border-color', '#F44336');
                //          $('#accountAddForm').find(`select[name = "${ key }"]`).siblings('button').css('border-color', '#F44336');
                //         messages.push(message);
                //         $(`input[name="${key}"]`).siblings(".errorMessage").empty().append(message);

                //         $(`select[name="${key}"]`).siblings(".errorMessage").empty().append(message);
                //     }
                //     toastr.error('<strong>Please check hightlighted fields!</strong> <br><br>' + messages.flat(1).join('<br>'));
                // }
            }
        });
    });

    function icons(){
        $.ajax({
            url:'icon/getAll',
            method: 'get',
            success: function(response){
                let icons = "";
                $.each(response, function (key, val) {
                    icons += `<div class="col-md-3">
                                <span class="kt-media kt-media--lg kt-media--circle defaultCompanyLogo defaultCompanyIcons">
                                    <img src="admin/defaultCompany/logo/${val.value}" id="default_company_logo" alt="logo">
                                    <label for="">${val.property}</label>
                                    <div style="position: absolute; top: 40px; left: 35px; display: none;" class="defaultCompanyIconsbtn">
                                    <a style="background: #ebedf2; height: 22px; width: 30px;" title="Edit Icon"  data-toggle="modal" data-url="/icon/edit/${val.id}" class="btn icon_btns btn-hover-brand btn-icon btn-pill model_load iconEdit">								
                                            <i style="font-size: 17px;" class="la la-edit"></i>							
                                        </a>							
                                    <a style="background: #ebedf2; height: 22px; width: 30px;" title="Delete" data-id="${val.id}" class="btn btn-hover-danger btn-icon btn-pill delButton icon_btns" href="#">								
                                            <i style="font-size: 17px;" class="la la-trash"></i>							
                                        </a>
                                    </div>
                                </span>
                            </div>`;
                });
                $('#icon-container').html(icons);
            }, 
            error:function({status, responseJSON})
            {
                // if(status===422){
                //     $('#accountAddForm').find('input[name], select[name]').css('border-color', '#ddd');
                //     $(`input[name]`).siblings(".errorMessage").empty();
                //     $(`select[name]`).siblings(".errorMessage").empty();

                //     if (!responseJSON.errors) return;
                //     const messages = [];
                //     for (const [key, message] of Object.entries(responseJSON.errors)) {
                //          $('#accountAddForm').find(`input[name = "${ key }"]`).css('border-color', '#F44336');
                //          $('#accountAddForm').find(`select[name = "${ key }"]`).siblings('button').css('border-color', '#F44336');
                //         messages.push(message);
                //         $(`input[name="${key}"]`).siblings(".errorMessage").empty().append(message);

                //         $(`select[name="${key}"]`).siblings(".errorMessage").empty().append(message);
                //     }
                //     toastr.error('<strong>Please check hightlighted fields!</strong> <br><br>' + messages.flat(1).join('<br>'));
                // }
            }
        });
    }

    </script>