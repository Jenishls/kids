{{-- {{dd($user->memberships)}} --}}
<div class="row detail">
  <div class="col-xl-12">
    <div class="kt-portlet personal_info_div">

      <form class="kt-form kt-form--label-right m-form">
        @csrf
          <div class="m-portlet__body">
            <div class="m-portlet" style="margin-bottom:0;">
                <h4 style="padding: 20px" class="header_bottom_border  person_info_title "> <span style="padding-bottom: 17px; border-bottom: 2px solid #9756a4; font-size:16px;">Membership</span>
                <a  data-target="#sy_global_modal" data-toggle="modal" data-route="membership/addMembership/{{$user->id}}" class="btn btn-brand btn-elevate btn-icon-sm waves-effect waves-light add_membership_modal pull-right " data-id="{{$user->id}}" id="add_membership"><i class="la la-plus"></i>
                      Membership
                     </a>
                </h4>
                <div id="t_membershipstable">
                </div>
            </div>
          </div>
      </form>
    </div>
  </div>
</div>
<script type="text/javascript">
  var datatable_url = 'membership/tableData/'+$('#add_membership').attr('data-id');
	var usersTable= $('#t_membershipstable').KTDatatable({
	// datasource definition
		data: {
			type: 'remote',
			source: {
			read: {
				url: datatable_url,
				method: 'GET',
				params: {
					"_token": "{{ csrf_token() }}"
				},
				// map: function(raw) {
				// 	// sample data mapping
				// 	var dataSet = raw;
				// 	if (typeof raw.data !== 'undefined') {
				// 		dataSet = raw.data;
				// 	}
				// 	console.log(dataSet);
				// 	return dataSet;
				// },
			},
		},
			serverPaging: false,
			serverFiltering: true,
			serverSorting: true,
			saveState: false//unset in production
		},

		// layout definition
		layout: {
			scroll: false,
			footer: false,
		},

		// column sorting
		sortable: true,

		pagination:false,

		
		// columns definition
		columns: [
		{
			
				field: 'id_card_type',
				title: 'ID Type',
				type: 'text',
				width:140,

			},
			{
				sortable: 'asc',
				field: 'id_card_no',
				title: 'ID Card Number',
				width:160,
				type: 'text',
			},
			 {
			field: 'issued_place',
			title: 'Issued Place',
			width:140,
			
			},{
			field: 'issued_date',
			title: 'Issued Date',
			width:140,
      },
      {
		field: 'exp_date',
		title: 'Expiry Date',
		textAlign : "center",
		width:140, 
      } 
      ,{
		field: 'issue_authority',
        title: 'Issued Authority',
        width:140,
		},     
		{
		field: 'Actions',
		title: 'Actions',
		sortable: false,
		overflow: 'visible',
		width:100,
			textAlign: 'center',
			template: function(row, index, datatable) {
				var dropup = (datatable.getPageSize() - index) <= 4 ? 'dropup' : '';
				return    '<a href="javascript:void(0);" class="btn btn-hover-brand btn-icon btn-pill model_load update_address_details" data-route="/userProfile/membership/'+row.id+'" data-toggle="modal"             data-target="#sy_global_modal"  title="Edit details">\
								<i class="la la-edit"></i>\
							</a>\
							<a href="#" class="btn btn-hover-danger btn-icon btn-pill delButton" data-id="'+row.id+'" title="Delete">\
								<i class="la la-trash"></i>\
							</a>';
			},
			}],

  });
$(document).off('click', '.delButton').on('click', '.delButton', function (e) {
    e.preventDefault();
    let id = $(this).attr('data-id');
    delConfirm({
        url: "membership/delete/" + id,
        header: $('#t_membershipstable')
    });

});
</script>
