$(document).off('click', '#add_acc').on('click', '#add_acc', function(e) {
    e.preventDefault();
    e.stopPropagation();
    showModal({
        url: '/admin/account/modal?add',
        width: '100%',
        c: 'cAccount',
    });
}).off('click', '.edit_account').on('click', '.edit_account', function(e) {
    e.preventDefault();
    e.stopPropagation();
    showModal({
        url: $(this).data('route'),
        c: 'eAccount',
    });
}).off('click', '.delButton').on('click', '.delButton', function(e) {
    e.preventDefault();
    delConfirm({
        url: $(this).data('route'),
        header: $('#t_account_table')
    });
}).off('click','.statusUpdate').off('click','.statusStatus', function(e){
    e.preventDefault();
});

function companyTableReloader()
{
    if($('#t_account_table').length){
        companyDataTable.setDataSourceParam("sort",{"sort":"desc","field":"updated_at"});
        companyDataTable.setDataSourceParam("pagination",{"page":"1","perpage":"20"});
        $('#t_account_table').addClass('addedNew').KTDatatable().reload();
    }
}

//branch append template from data response
function appendBranchTemplate(branches,id, replace=false)
	{
    let template="";
    if(branches.length){
        $.each(branches,function(key,branch){
            template+= `
                <div class="col-md-6" id="branch--${branch.id}">
                    <div class="kt-portlet kt-portlet--mobile" style="background-color:#fbf9ff!important;border:1px solid #e1e1ee;">
                        <div class="kt-portlet__head pr-0 ">
                            <div class="kt-portlet__head-label">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h3 class="kt-portlet__head-title">
                                            ${branch.branch_name} 
                                        </h3>
                                    </div>
                                    <div class="col-md-12">
                                        <h6 data-toggle="kt-tooltip" data-placement="top" data-original-title="Branch No : ${branch.branch_no}">#${branch.branch_no}</h6>
                                    </div>
                                    <div class="col-md-12">
                                        <span class="kt-badge kt-badge--success kt-badge--inline kt-badge--pill">Default</span>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="kt-portlet__head-toolbar pt-1">
                                <div class="kt-portlet__head-actions">
                                    <a href="javascript:void(0);" class="btn btn-hover-brand btn-icon btn-pill waves-effect waves-light branchEBtn" title="Edit details" data-bid="${branch.id}">
                                        <i class="la la-edit"></i>
                                    </a>
                                    <a href="javascript:void(0);" class="btn btn-hover-danger btn-icon btn-pill  waves-effect waves-light branchDBtn" title="Delete" data-bid="${branch.id}">
                                        <i class="la la-trash"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="kt-portlet__body pt-0">
                            <div class="row">`;
                        if(branch.contact){
                            template+=`
                                <div class="col-md-6 pl-1 pr-1 b_r_w">
                                    <div class="kt-portlet__head p-1 pl-0 innerTitle_f" style="border-bottom:none;">
                                        <div class="kt-portlet__head-label">
                                            <span class="kt-portlet__head-icon">
                                                <i class="far fa-address-book"></i>
                                            </span>
                                            <h3 class="kt-portlet__head-title ">
                                                Contact
                                            </h3>
                                        </div>
                                    </div>`
                            if(branch.contact.phone_no)
                                template+=`
                                        <h6 class="innerContent_f" data-toggle="kt-tooltip" data-placement="top" data-original-title="phone : ${branch.contact.phone_no}">
                                            <i class="la la-phone"></i>
                                            ${branch.contact.phone_no}
                                        </h6>
                                        `;
                            if(branch.contact.mobile_no)
                                template+=`
                                    <h6 class="innerContent_f" data-toggle="kt-tooltip" data-placement="top" data-original-title="mobile : ${branch.contact.mobile_no}">
                                        <i class="la la-mobile-phone"></i>
                                        ${branch.contact.mobile_no}
                                    </h6>
                                        `;
                            if(branch.contact.email)
                                template+=`
                                    <h6 data-toggle="kt-tooltip" data-placement="top" data-original-title="email :${branch.contact.email}" title="" class="innerContent_f">
                                        <i class="fa fa-envelope"></i>
                                        ${branch.contact.email}
                                    </h6>
                                    `;
                                    
                            template+='</div>';
                            }
                        if(branch.address){
                            template+=`
                                <div class="col-md-6">
                                    <div class="kt-portlet__head p-1 pl-0 innerTitle_f" style="border-bottom:none;">
                                        <div class="kt-portlet__head-label">
                                            <span class="kt-portlet__head-icon">
                                                <i class="far fa-address-book"></i>
                                            </span>
                                            <h3 class="kt-portlet__head-title ">
                                                Address
                                            </h3>
                                        </div>
                                    </div>`;
                            if(branch.address.add1)
                                template+=`
                                    <h6 class="innerContent_f"
                                    data-toggle="kt-tooltip" data-placement="top" data-original-title="Address : ${branch.address.add1}"
                                    > <i class="la la-map-marker"></i>${branch.address.add1}</h6>`;
                            if(branch.address.add2)
                                template+=`<h6 class="innerContent_f custom_ml-17"
                                    data-toggle="kt-tooltip" data-placement="top" data-original-title="Address : ${branch.address.add2}"
                                    >${branch.address.add2}</h6>`
                            if(branch.address.city)
                                template+=`		
                                    <h6 class="innerContent_f custom_ml-17"
                                    data-toggle="kt-tooltip_content" data-placement="top" data-original-title="
                                    city: ${branch.address.city}<br>"
                                    >
                                        ${branch.address.city}
                                    </h6>`;
                            if(branch.address.county)
                                template+=`
                                    <h6 class="innerContent_f custom_ml-17"
                                    data-toggle="kt-tooltip_content" data-placement="top" data-original-title="
                                    county : ${branch.address.county}<br>"
                                    >
                                        ${branch.address.county}
                                        
                                    </h6>`;
                            if(branch.address.state)
                                template+=`
                                    <h6 class="innerContent_f custom_ml-17"
                                    data-toggle="kt-tooltip_content" data-placement="top" data-original-title="
                                    state :  ${branch.address.state?branch.address.state:''}"
                                    >
                                        ${branch.address.state}
                                    </h6>`;
                            if(branch.address.zip)
                                template+=`
                                    <h6 class="innerContent_f custom_ml-17" data-toggle="kt-tooltip_content" data-placement="top" data-original-title="
                                    Country: ${branch.address.country?branch.address.country:''}<br>
                                    zip: ${branch.address.zip?branch.address.zip:''}
                                    "
                                    >
                                    <i></i>
                                        ${branch.address.country?branch.address.country+',':''}
                                        ${branch.address.zip?branch.address.zip:''}
                                    </h6>`
                                    
                            template+='</div>';
                        }
                        template+=`
                            </div>
                        </div>
                    </div>
                </div>
                `;
        })
    }
    else{
        template+=`
        <div class="col-md-12">
            <h6 class="font-weight-normal text-center">No Branches Found </h6>
        </div>`;
    }
    if(replace){
        $('#'+id).replaceWith(template)
    }
    else{
        $('#'+id).html(template);
    }
    console.log(id)
}
