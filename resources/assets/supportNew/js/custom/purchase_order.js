$(document)
    .off("click", "#addPurchaseOrder")
    .on("click", "#addPurchaseOrder", function(e) {
        e.preventDefault();
        supportAjax(
            {
                url: `/admin/purchaseorder/add`
            },
            function(resp) {
                $("#t_p_o_table")
                    .empty()
                    .append(resp);
            },
            function(err) {
                console.log(err);
            }
        );
    });
function initTaxSelect() {
    $.ajax({
        url: "/admin/purchaseorder/taxes",
        dataType: "json",
        delay: 250,
        success: function(jsonObject) {
            let option = `<option>Select Tax</option>`;
            $.each(jsonObject, function(i, data) {
                if (data.is_percentage === 1) {
                    option += `<option value="${data.id}">${data.type}(${data.value} %)</option>`;
                } else {
                    option += `<option value="${data.id}">${data.type}($ ${data.value})</option>`;
                }
            });
            $(document)
                .find("select.selectTax")
                .empty()
                .append(option);
            $(".selectTax").select2();
        }
    });
}
