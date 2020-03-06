<script>
        var clientsTable = $('#productInfoDataTable').KTDatatable({
                // datasource definition
                data: {
                    type: 'remote',
                    source: {
                        read: {
                            url: '/admin/products/tab/overall/data/{{$product->id}}',
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
        
                // layout definition
                layout: {
                    scroll: false,
                    footer: false,
                },
        
                // column sorting
                sortable: true,
        
                pagination: true,
        
        
                // columns definition
                columns: [
                    {
                        field: '#',
                        title: '#',
                        width: 50,
                        template: function(row, index, datatable) {
                            return index+1;
                        }
        
                    },
                    {
                        field: 'title',
                        title: 'Title',
                        // width: 350,
                    },
                    {
                        field: 'sub_title',
                        title: 'Sub Title',
                        // width: 350,
                    },
                    {
                        field: 'weight',
                        title: 'Weight',
                        template: function(row, index, datatable) {
                            if(row.weight_type){
                                return row.weight + ' '+ row.weight_type;
                            }else{
                                return row.weight;
                            }
                        }
                    },
                    {
                        field: 'manufacture_date',
                        title: 'Manufracture Date',
                        template: function (row) {
                        if(row.manufacture_date){
                                return moment(row.manufacture_date).format('MM/DD/YYYY');
                            }
                        }   
                    },
                    {
                        field: 'unit_price_label',
                        title: 'Unit Price',
                        // width: 350,
                    },
                    
                ],
        
            });
        </script>