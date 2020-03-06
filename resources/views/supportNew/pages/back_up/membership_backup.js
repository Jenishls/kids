// $(document)
//     .off("click", "#add_membership")
//     .on("click", "#add_membership", function () {
//         let url = $(this).data("route");
//         showModal({
//             url: url
//         });
//     });

// // add new membership
// $(document)
//     .off("click", "#add_new_membership")
//     .on("click", "#add_new_membership", function (e) {
//         e.preventDefault();
//         let form = $("#add_membership_form").serializeArray();
//         let url = $(this).data("route");

//         let id = $(this).attr("data-id");
//         let data = form.concat({
//             name: "this_user_id",
//             value: id
//         });
//         supportAjax({
//                 url: url,
//                 method: "POST",
//                 data: data
//             },
//             function (resp) {
//                 $("#cModal").modal("hide");
//                 $("#t_membershipstable")
//                     .KTDatatable()
//                     .reload();
//                 toastr.success("Updated successfully.");
//                 // $('.profile_content_column').load('/userMenu/{profile_sidebar}/' + id);
//             },
//             function (err) {
//                 // console.log(err.responseText);
//                 // toastr.error(err.responseText);
//                 errorHandeler({
//                     fields: ['CardType', 'IdCardNo', 'IssuedPlace', 'IssuedDate', 'expiryDate', 'IssueAuthority']
//                 }, err);
//             }
//         );
//     });

// // edit update mebership
// $(document)
//     .off("click", "#membership_update")
//     .on("click", "#membership_update", function (e) {
//         e.preventDefault();
//         let form = $(this)
//             .closest("form")
//             .serializeArray();
//         let url = $(this).data("route") + "/" + $(this).attr("data-id");

//         let id = $(this).attr("data-id");
//         let data = form.concat({
//             name: "this_user_id",
//             value: id
//         });
//         console.log(data);
//         supportAjax({
//                 url: url,
//                 method: "POST",
//                 data: data
//             },
//             function (resp) {
//                 $("#cModal").modal("hide");
//                 $("#t_membershipstable")
//                     .KTDatatable()
//                     .reload();
//                 toastr.success("Updated successfully.");
//                 // $('.profile_content_column').load('/userMenu/{profile_sidebar}/' + id);
//             },
//             function (err) {
//                 console.log(err);
//             }
//         );
//     });

// // look up modal
// $(document)
//     .off("click", ".addModal")
//     .on("click", ".addModal", function () {
//         let url = $(this).data("route");
//         $("#membership_modal_body").css({
//             display: "none"
//         });
//         $("#addMembershipModal")
//             .modal()
//             .show();
//         //show id Card type
//         supportAjax({
//                 url: "/membership/idCardType",
//                 method: "GET"
//             },
//             function (resp) {

//                 let temp = "";
//                 resp.forEach(function (data, index) {
//                     temp += `<label class="kt-checkbox kt-checkbox--solid f-s-16" id="card_type_label" style="text-transform:capitalize;">
//                             <input type="radio" name="id_card_type" class="" value="${data.value}">${data.value}
//                             <span ></span>
//                             </label> <br>`;
//                 });
//                 $(".id_cardlook_up_div")
//                     .empty()
//                     .append(temp);
//             }
//         );
//     });
// //close addModal
// $(document)
//     .off("click", ".closeThisModal")
//     .on("click", ".closeThisModal", function (e) {
//         e.preventDefault();
//         e.stopPropagation();
//         $("#addMembershipModal")
//             .modal()
//             .hide();
//         $("#membership_modal_body").show();
//         $(".modal-backdrop.fade.show").remove();
//         console.log("hello");
//     });
// //add new modal
// $(document)
//     .off("click", ".custom_id_type_modal_btn")
//     .on("click", ".custom_id_type_modal_btn", function (e) {
//         e.preventDefault();
//         e.stopPropagation();
//         $("#membership_modal_body").css({
//             display: "none"
//         });
//         $("#addMembershipModal")
//             .modal()
//             .hide();
//         $("#addNewCardType")
//             .modal()
//             .show();
//         console.log("hello");
//     });

// // close addenewModal
// $(document)
//     .off("click", ".closeThisAddNewModal")
//     .on("click", ".closeThisAddNewModal", function (e) {
//         e.preventDefault();
//         e.stopPropagation();
//         $("#membership_modal_body").css({
//             display: "none"
//         });
//         $("#addNewCardType")
//             .modal()
//             .hide();
//         $("#addMembershipModal")
//             .modal()
//             .show();
//         $(".modal-backdrop.fade.show").remove();
//         console.log("hello");
//     });

// // select card type save
// $(document).off('click', '#save_card_type_selected').on('click', '#save_card_type_selected', function (e) {
//     e.preventDefault();
//     e.stopPropagation();
//     $("#addMembershipModal")
//         .modal()
//         .hide();
//     $("#membership_modal_body").show();
//     $(".modal-backdrop.fade.show").remove();
//     var radioValue = $("#card_type_label input[name='id_card_type']:checked").val();
//     $('[name="id_card_type"]').each(function (index, data) {
//         if (data['value'] === radioValue) {
//             data['checked'] = 'checked';
//         }
//     })
//     $('.select_mem_type .select_card_value_id button .filter-option .filter-option-inner .filter-option-inner-inner').empty().append(radioValue);

// });
// // store new card value
// $(document).off("click", ".store_new_card_type").on("click", ".store_new_card_type", function () {
//     let url = $(this).data("route");
//     let data = $('#save_new_card_type_form').serializeArray();
//     let section_id = $(this).attr('data-id');
//     let form = data.concat({
//         'name': 'section_id',
//         'value': section_id
//     });
//     supportAjax({
//         url: url,
//         data: form,
//         method: 'POST',
//     }, function (resp) {
//         console.log(resp);
//         toastr.success("Added successfully.");
//     }, function (err) {
//         console.log(err)
//     });
//     $("#membership_modal_body").css({
//         display: "none"
//     });
//     $("#addNewCardType")
//         .modal()
//         .hide();
//     $("#addMembershipModal")
//         .modal()
//         .show();
//     $(".modal-backdrop.fade.show").remove();
// });
