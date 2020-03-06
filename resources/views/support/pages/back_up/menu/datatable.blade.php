<div id="t_datatable"></div>

<script type="text/javascript">
var menu = $('#t_datatable').KTDatatable({
  // datasource definition
	  data: {
	    type: 'remote',
	    source: {
	      read: {
	        url: '/system/menudata',
	        method: 'POST',
	        params: {
				"_token": "{{ csrf_token() }}"
				},
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
	    pageSize: 10,
	    serverPaging: true,
	    serverFiltering: true,
	    serverSorting: true,
	  },

	  // layout definition
	  layout: {
	    scroll: false,
	    footer: false,
	  },

	  // column sorting
	  sortable: true,

	  pagination: true,

	  search: {
	    input: $('#generalSearch'),
	  },

	  // columns definition
	  columns: [
	    {
	      field: 'id',
	      title: '#',
	      sortable: 'asc',
	      width: 40,
	      type: 'number',
	      selector: false,
	      textAlign: 'center',
	    }, {
	      field: 'name',
	      title: 'Name',
	    }, {
	      field: 'route',
	      title: 'Route',
	       template: function(row, index, datatable) {
	         return row.route;
	       },
	    }, {
	      field: 'seq',
	      title: 'Sequence #',
	    }, {
	      field: 'is_active',
	      title: 'Active',
	      // callback function support for column rendering
	      // template: function(row) {
	      //   var status = {
	      //     1: {'title': 'Pending', 'class': 'kt-badge--brand'},
	      //     2: {'title': 'Delivered', 'class': ' kt-badge--metal'},
	      //     3: {'title': 'Canceled', 'class': ' kt-badge--primary'},
	      //     4: {'title': 'Success', 'class': ' kt-badge--success'},
	      //     5: {'title': 'Info', 'class': ' kt-badge--info'},
	      //     6: {'title': 'Danger', 'class': ' kt-badge--danger'},
	      //     7: {'title': 'Warning', 'class': ' kt-badge--warning'},
	        // };
	      //  return '<span class="kt-badge ' + status[row.status].class + ' kt-badge--inline kt-badge--pill">' + status[row.status].title + '</span>';
	      },
	    // }, {
	    //   field: 'type',
	    //   title: 'Type',
	    //   // callback function support for column rendering
	    //   template: function(row) {
	    //     var status = {
	    //       1: {'title': 'Online', 'state': 'danger'},
	    //       2: {'title': 'Retail', 'state': 'primary'},
	    //       3: {'title': 'Direct', 'state': 'accent'},
	    //     };
	    //   //  return '<span class="kt-badge kt-badge--' + status[row.type].state + ' kt-badge--dot"></span>&nbsp;<span class="kt-font-bold kt-font-' + status[row.type].state + '">' +
	    //         status[row.type].title + '</span>';
	    //   },
	    // },

	     {
	      field: 'Actions',
	      title: 'Actions',
	      sortable: false,
	      width: 130,
	      overflow: 'visible',
	      textAlign: 'center',
	      template: function(row, index, datatable) {
	      	console.log(row.id);
	        var dropup = (datatable.getPageSize() - index) <= 4 ? 'dropup' : '';
        	return '<button  class="btn btn-hover-brand btn-icon btn-pill model_load edit1"  data-id="'+row.id+'" href="JavaScript:void(0);" data-toggle="modal" data-target="#sys_model"  title="Edit details">\
                        <i class="la la-edit"></i>\
                    </button>\
                    <button class="btn btn-hover-danger btn-icon btn-pill del" data-route="/system/menu/del/" data-id="'+row.id+'" title="Delete">\
                        <i class="la la-trash"></i>\
                    </button>';
	      },
	    }],

});

$(document).off('click','#t_datatable').on('click', '.del', function(e){

	
	let swclose; 
	e.preventDefault();
	let id = $(this).attr('data-id');
	let url = $(this).attr('data-route'); 

	
     swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to delete this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'No, cancel!',
        reverseButtons: true
    }).then(function(result){
        if (result.value) {
        		console.log(url);
        	 $.ajax({
					method: 'post',
					url: url,

					data: {
						'id': id,
						"_token": "{{ csrf_token() }}",
					}, 
					beforeSend: function(){
						console.log('loading');

					 

					} ,
					success: function(response, status, xhr){
						menu.reload();

					} ,
					error: function(xhr, status, error){
						console.log('error');
					}
			});

            swal.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success'
            ) 
           
            // result.dismiss can be 'cancel', 'overlay',
            // 'close', and 'timer'
        } else if (result.dismiss === 'cancel') {
            swal.fire(
                'Cancelled',
                'Your imaginary file is safe :)',
                'error'
            )
        }
    });
   
}); 


$(document).off('click','#t_datatable').on('click', '.edit1', function(e){

	   
		let data = $('#menu').serializeArray(); 
		data.push({'name':"id", 'value':$(this).attr('data-id') });
		data.push({'name':"edit", 'value':'dialogue'});

	$.ajax({
		method: 'post',
		url: 'system/menu/edit',
		data: data,
		dataType: 'html', 
		beforeSend: function(){

		},
		success: function(response, status, xhr){
			$('.menu-dialog').html(response);
			menu.reload();

		},
		error: function(xhr, status, error){

		}

	});

});


$(document).on('click', '#addmenu', function(e){

	   
		let data = $('#menu').serializeArray(); 
		data.push({'name':"id", 'value':$(this).attr('data-id') });
		data.push({'name':"edit", 'value':'add'});

	$.ajax({
		method: 'post',
		url: 'system/menu/edit',
		data: data,
		dataType: 'html', 
		beforeSend: function(){

		},
		success: function(response, status, xhr){
			$('.menu-dialog').html(response);
			menu.reload();

		},
		error: function(xhr, status, error){

		}

	});

});


$('#sys_model').on('show.bs.modal', function(e){
	
	

});


$(document).on('click', '#changed_data', function(e){

		
	modal_width_title($(this));

		let data = $('#menu').serializeArray(); 
		data.push({'name':"id", 'value':$(this).attr('data-id') });
		data.push({'name':"edit", 'value':'add'});

	$.ajax({
		method: 'post',
		url: 'system/auditmodel',
		data: data,
		dataType: 'html', 
		beforeSend: function(){

		},
		success: function(response, status, xhr){

			$('.menu-dialog').html(response);
			menu.reload();

		},
		error: function(xhr, status, error){

		}

	});

}); 

</script>