<div id="t_icontable" style="background:white; padding:0;">
	<div  class="iconTableContent">
		<div class="row tableHead ">
				
			<div class="input-group mb-3 input-group-sm col-xl-3">
				<div class="input-group-prepend">
					<span class="input-group-text" id="inputGroup-sizing-code">Group</span>
				</div>
				<input type="text" class="form-control searchIcon" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="Search.." id="icon_group_search" autocomplete="off">
			</div>
			<div class="input-group mb-3 input-group-sm col-xl-3">
				<div class="input-group-prepend">
					<span class="input-group-text" id="inputGroup-sizing-code">Name</span>
				</div>
				<input type="text" class="form-control searchIcon" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="Search.." id="icon_name_search" autocomplete="off">
			</div>
			<div class="input-group mb-3 input-group-sm col-xl-3">
				<div class="input-group-prepend">
					<span class="input-group-text" id="inputGroup-sizing-value">Class</span>
				</div>
				<input type="text" class="form-control searchIcon" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-value" placeholder="Search.." id="icon_class_search" autocomplete="off">
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
var icon =$('#t_icontable').KTDatatable({
  // datasource definition
	  data: {
	    type: 'remote',
	    source: {
	      read: {
	        url: '/system/icondata',
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
	      field: 'icon_group',
	      title: 'Icon Group',
	    }, {
	      field: 'icon_name',
	      title: 'Icon Name',
	       // template: function(row, index, datatable) {
	       //   return row.route;
	       
	    }, {
	      field: 'icon_class',
	      title: 'Icon Class',
	    },      
	    {
	      field: 'icon_class2',
	      title: 'Icon',
	      template: function(row, index, datatble) {
	      	return '<div><i class="'+row.icon_class+'" style="font-size:23px"></i></div>';
	      },
	    },      
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
        return     '<a  class="btn btn-hover-brand btn-icon btn-pill model_load icon_edit_icon edit_icon_table" data-id="'+row.id+'" href="JavaScript:void(0);" data-toggle="modal" data-target="#sys_icon_model"   title="Edit details">\
                        <i class="la la-edit "></i>\
                    </a>\
                    <a class="btn btn-hover-danger btn-icon btn-pill icon_edit_icon delete_icon_table" title="Delete" data-id="'+row.id+'">\
                        <i class="la la-trash"></i>\
                    </a>';
	      },
	    }],
});

$('#icon_group_search').on('keyup', function (e) {
    // alert('h');
    if ($(this).val().length >= 3) {
        $('#t_icontable').KTDatatable().search($(this).val(), 'icon_group');

    }
    if ($(this).val() == '') {
        $('#t_icontable').KTDatatable().search($(this).val(), 'icon_group');

    }
});


// delete
$(document).off('click', '.delete_icon_table').on('click', '.delete_icon_table', function (e) {
    e.preventDefault();
    let id = $(this).attr('data-id');
    delConfirm({
        url: "/system/icon/del/" + id,
        header: $('#t_icontable')
    });

});

// icon name search

$('#icon_name_search').on('keyup', function (e) {
    // alert('h');
    if ($(this).val().length >= 3) {
        $('#t_icontable').KTDatatable().search($(this).val(), 'icon_name');

    }
    if ($(this).val() == '') {
        $('#t_icontable').KTDatatable().search($(this).val(), 'icon_name');

    }
});

// icon class search

$('#icon_class_search').on('keyup', function (e) {
    // alert('h');
    if ($(this).val().length >= 3) {
        $('#t_icontable').KTDatatable().search($(this).val(), 'icon_class');

    }
    if ($(this).val() == '') {
        $('#t_icontable').KTDatatable().search($(this).val(), 'icon_class');

    }
});
</script>