<div id="t_pagestable">

</div>
<script>
$('#t_pagestable').KTDatatable({
  // datasource definition
	  data: {
	    type: 'remote',
	    source: {
	      read: {
	        url: '/admin/rolePermission/pages',
	        method: 'GET',
	        params: {
				"_token": "{{ csrf_token() }}"
				},
			  map: function(raw) {
				  alert('map');
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
	      field: 'page_name',
	      title: 'Page Name',
	    }, {
	      field: 'action',
	      title: 'Page Action List',
	       // template: function(row, index, datatable) {
	       //   return row.route;
	       
	    }, {
	      field: 'created_at',
	      title: 'Date Created',
	    }],      
	    // {
	    //   field: 'icon_class2',
	    //   title: 'Icon',
	    //   template: function(row, index, datatble) {
	    //   	return '<div><i class="'+row.icon_class+'" style="font-size:23px"></i></div>';
	    //   },
	    // },      
	    //  {
	    //   field: 'Actions',
	    //   title: 'Actions',
	    //   sortable: false,
	    //   width: 130,
	    //   overflow: 'visible',
	    //   textAlign: 'center',
	    //   template: function(row, index, datatable) {
	    //   	console.log(row.id);
	    //     var dropup = (datatable.getPageSize() - index) <= 4 ? 'dropup' : '';
        // return     '<a  class="btn btn-hover-brand btn-icon btn-pill model_load" data-route="system/icon/put/'+row.id+'" href="JavaScript:void(0);" data-toggle="modal" data-target="#sy_global_modal"  title="Edit details">\
        //                 <i class="la la-edit"></i>\
        //             </a>\
        //             <a href="#" class="btn btn-hover-danger btn-icon btn-pill" title="Delete">\
        //                 <i class="la la-trash"></i>\
        //             </a>';
	    //   },
	    // }],

});

$(document).on('click', '#add_icon', function(e){

	   
		let data = $('#icon').serializeArray(); 
		data.push({'name':"id", 'value':$(this).attr('data-id') });
		data.push({'name':"edit", 'value':'add'});

	$.ajax({
		method: 'post',
		url: 'system/icon/edit',
		data: data,
		dataType: 'html', 
		beforeSend: function(){

		},
		success: function(response, status, xhr){
			$('.icon-dialog').html(response);
			
		},
		error: function(xhr, status, error){

		}

	});

});

$('#sys_icon_model').on('show.bs.modal', function(e){
	$(this).find('.model').css({
		width:1000
	});

});



</script>