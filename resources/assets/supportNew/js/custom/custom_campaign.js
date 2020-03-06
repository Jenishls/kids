clickEvent('#add_campaign')(addCampaign);

function addCampaign(e) {
    e.preventDefault();
    showModal({
        url: '/admin/campaign/add',
        c: 'addCampaign'
    });
}

clickEvent('.editCamp')(function(e) {
    e.preventDefault();
    showModal({
        url: $(this).attr('data-route'),
        c: 'editCampaign'
    });
})
let truncateString = (input, count) => input.length > count ? `${input.substring(0, count)}...` : input;



function campaignTableReloader() {
    if ($('#t_campaign').length) {
        campaignTable.setDataSourceParam("sort", { "sort": "desc", "field": "updated_at" });
        campaignTable.setDataSourceParam("pagination", { "page": "1", "perpage": "20" });
        $('#t_campaign').addClass('addedNew').KTDatatable().reload();
    }
}