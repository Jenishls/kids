<div id="t_payment_card" data-id="{{$client->id}}"></div>
<script>

var paymentTable = $('#t_payment_card').KTDatatable({
        // datasource definition
        data: {
            type: 'remote',
            source: {
                read: {
                    url: '/admin/client/paymentCard/{{$client->id}}',
                    method: 'get',
                    map: function(raw) {
                        // sample data mapping
                        var dataSet = raw;
                        if (typeof raw.data !== 'undefined') {
                            dataSet = raw.data;
                        }
                        return dataSet;
                    },
                },
            },
            pageSize: 50,
            serverPaging: true,
            serverFiltering: true,
            serverSorting: true,
            //saveState: true 
        },
        autoColumns: true,
        // layout definition
        layout: {
            scroll: false,
            footer: false,
        },
        // column sorting
        sortable: true,
        pagination: false,
        // columns definition
       
        columns: [
            {
                field: 'Card',
                title: 'card',
                type: 'text',
                template: function(row)
                {
                    return row.card?  row.card: '-'
                }
            },
            {
                field: 'name_per_card',
                title: 'Card Name',
                type: 'text',
                width: 200,
                autoWidth: false,
                template: function(row)
                {
                    return row.name_per_card? row.name_per_card : '-';
                }
            },
            {
                field: 'card_no',
                title: 'Card #',
                type: 'text',
                template: function(row){
                    return row.card_no? row.card_no.replace(/.(?=.{4})/g, 'x') : '-';
                }
            },
            {
                field: 'expiry',
                title: 'Expires On',
                width: 180,
                textAlign:'center',
                template: function(row, index, datatable) {
                    return row.expiry ? moment(row.dob).format("{{settingsValue('momentDateFormat')}}") : '-';
                    
                },
            },
        ],

    });
    paymentTable.on('kt-datatable--on-init', function() {
        $('[data-toggle="kt-tooltip"]').tooltip();
    });
</script>
