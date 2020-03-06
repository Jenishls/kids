clickEvent('.your-order-ul li')(dashboardOrderMenu);
clickEvent('.db--order--details')(orderDetails);
clickEvent('#cancel--order--items')(cancelOrderItem);
clickEvent('#add--address')(storeNewAddress);
clickEvent('#update--address')(updateAddress);
clickEvent('.make--default')(makeDefaultAddress);
clickEvent('.delete--address')(dashboardDeleteAddress);
clickEvent('#password--update')(passwordUpdate);

// passing url of menu tab of order
function dashboardOrderMenu(e) {
    e.preventDefault();
    $(this)
        .siblings()
        .removeClass("active");
    $(this).addClass("active");

    let url = $(this).attr("data-route");
    cratesAjax({
            url: url,
            method: "GET",
            data: ""
        },
        function (response) {
            $("#db--order--content")
                .empty()
                .append(response);
            $(document).find('.order--details--li').remove();
        },
        function (error) {
            console.log(error);
        }
    );
}
var breadcrumb = `<li class="order--details--li">
                    <a class=" active">order details</a>
                </li>
                `;

// order details
function orderDetails(e) {
    e.preventDefault();
    let url = $(this).attr('data-route');
    cratesAjax({
            url: url,
            method: "GET",
            data: ""
        },
        function (response) {
            // $('#crumbs').children('ul').


            $('#crumbs').children('ul').children('li').children('.your--order-crumb').removeClass('active').addClass('c-p');
            $('#crumbs').children('ul').append(breadcrumb);
            $("#db--order--content")
                .empty()
                .append(response);
        },
        function (error) {
            console.log(error);
        }
    );
}

// // extend order
// clickEvent('.extend--day')(extendOrder);

// function extendOrder(e) {
//     e.preventDefault();
//     let id = $(this).parent('ul').attr('order-id');
//     let days = $(this).attr('data-id');

//     cratesAjax({
//         url: `cratesskates/dashboard/extendorder/${id}/${days}`
//     }, function (resp) {
//         let day = `${days}`.toString();
//         console.log(resp);
//         $("#db--order--content").empty().append(resp);
//         if (`${day}` > 1) {

//             toastr.success('Delivery date is extended for' + ' ' + `${day}` + ' ' + 'days' + '.');
//         } else {
//             toastr.err('Delivery date is extended for' + ' ' + `${day}` + ' ' + 'day' + '.');
//         }
//     }, function (err) {
//         toastr.err('Something went wrong.');
//     });
// }


// extend order

function extendOrder() {
    $.each($('.dbDatePicker'), function () {
        let id = $(this).attr('data-id');
        let prev_date = $(this).attr('data-prev-date');
        var startDate;
        var endDate;

        $(this).daterangepicker({
            // singleDatePicker: false,
            showDropdowns: true,
            showDropdowns: true,
            minYear: 2001,
            maxYear: parseInt(moment().format('YYYY'), 10)
        }, function (start, end) {

            startDate = start;
            endDate = end;

            range = startDate.format('MM/DD/YYYY') + '-' + endDate.format('MM/DD/YYYY');
            cratesAjax({
                url: `
                dashboard/extendorder/${id}/${end.format('YYYY-MM-DD')}`
            }, function (resp) {
                toastr.success('Delivery date is extended for' + ' ' + `${end.format('YYYY-MM-DD')}` + '.');
                showModal({
                    url: `dashboard/modal/ordersummarymodal/${id}/${prev_date}`
                });

            }, function (err) {
                toastr.error('Delivery date cannot be extended for' + ' ' + `${end.format('YYYY-MM-DD')}` + '.');
            })
        })

    })
}
// cancel order
function cancelOrderItem(e) {
    e.preventDefault();
    let url = $(this).attr('data-route');
    cratesAjax({
            url: url,
            method: "get"
        },
        function (resp) {
            $('#cModal').modal('hide');
            $(".your-order-container").empty().append(resp);
            toastr.success("Cancelled Order Successfully")

        },
        function (err) {
            toastr.error("Something went wrong.")
        }
    )
}

// store new  address
function storeNewAddress(e) {
    e.preventDefault();
    let formdata = $("#newAddrForm").serializeArray();
    console.log(formdata);

    cratesAjax({
            url: 'dashboard/address/addNewAddress/',
            method: "POST",
            data: formdata
        },
        function (response) {
            $('#page-section').empty().append(response);
            $('#cModal').modal('hide');
            toastr.success("Added successfully.");
        },
        function (error) {
            console.log(error);
        }
    )
}

// update address
function updateAddress(e) {
    e.preventDefault();
    let editAddressForm = $("#editAddrForm").serializeArray();
    let url = $(this).attr('data-route');

    cratesAjax({
            url: url,
            method: "POST",
            data: editAddressForm
        },
        function (response) {
            $('#page-section').empty().append(response);
            $('#cModal').modal('hide');
            toastr.success("Updated successfully.");
        }
    )
}

// make default
function makeDefaultAddress(e) {
    e.preventDefault();
    let url = $(this).attr('data-route');
    let addr_id = $(this).attr('data-addrId');
    cratesAjax({
            url: url,
            data: {
                addr_id: addr_id
            }
        }, function (response) {
            $('#page-section').empty().append(response);
            toastr.success("Default address added.");
        },
        function (error) {
            toastr.error("Something went wrong.");
        }
    );
}

// delete address 
function dashboardDeleteAddress(e) {
    e.preventDefault();
    let url = $(this).attr('data-route');
    delConfirm({
        url: url,
        reload_div: '#page-section',

    });
};

// login and security
function passwordUpdate(e) {
    e.preventDefault();
    let password_form = $('#db--login--security--form');
    url = "dashboard/updatePassword";
    let data = $('#db--login--security--form').serializeArray();
    cratesAjax({
            url: url,
            method: 'POST',
            data: data
        }, function (response) {
            $('#db--login--security--form')[0].reset();
            toastr.success("Password updated successfully.");
        },
        function ({
            status,
            responseJSON
        }) {
            if (status === 422) {
                password_form.find("input[name], textarea[name]").css("border-color", "#ddd");
                $(`input[name]`).siblings(".errorMessage").empty();

                if (!responseJSON.errors) return;
                const messages = [];
                for (const [key, message] of Object.entries(
                        responseJSON.errors
                    )) {
                    password_form.find(`input[name="${key}"]`).css("border-color", "#f44336");
                    password_form.find(`textarea[name="${key}"]`).css("border-color", "#f44336");
                    messages.push(message);
                    $(`input[name="${key}"]`).siblings(".errorMessage").empty().append(message);
                }
                toastr.error(
                    "<strong>Please check highlighted fields! </strong> <br> <br>" +
                    messages.flat(1).join("<br>")
                );
            }
        }
    )
}
