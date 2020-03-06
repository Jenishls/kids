/*
* @Author: 
 /** 
 * DEVELOPERS 
 * ------------------------------------------------  
 * - SUMAN THAPA - LEAD(NEPALNME@GMAIL.COM) 
 * ------------------------------------------------  
 * -  BASANTA TAJPURIYA 
 * -  RAKESH SHRESTHA 
 * -  LEKH RAJ RAJ 
 * ------------------------------------------------  
 * THIS INTELLECTUAL PROPERTY IS COPYRIGHT Ⓒ 2019 
 * SHUBHU TECH PVT LTD , NEPAL. ALL RIGHT RESERVED
* @Date:   2019-12-16 13:41:51
* @Last Modified by:   Lekh Raj Rai
* @Last Modified time: 2019-12-20 19:47:33
*/
clickEvent(".cs-button-plus")(incrementValue)
clickEvent(".cs-button-minus")(decrementValue)
clickEvent(".cs-button-plus-u")(increaseQty)
clickEvent(".cs-button-minus-u")(decreaseQty)

function incrementValue(e) {
    e.preventDefault();
    var fieldName = $(e.target).attr('data-field');
    var parent = $(e.target).closest('div');
    var currentVal = parseInt(parent.find(`input[name ^="${fieldName}"]`).val(), 10);
    if (!isNaN(currentVal)) {
        parent.find(`input[name ^="${fieldName}"]`).val(currentVal + 1).change();
    } else {
        parent.find(`input[name ^="${fieldName}"]`).val(0).change();
    }
}

function decrementValue(e) {
    e.preventDefault();
    var fieldName = $(e.target).data('field');
    var parent = $(e.target).closest('div');
    var currentVal = parseInt(parent.find(`input[name ^="${fieldName}"]`).val(), 10);
    if (!isNaN(currentVal) && currentVal > 0 && (currentVal- 1 > 0)) {
        parent.find(`input[name ^="${fieldName}"]`).val(currentVal - 1).change();
    }
}

function increaseQty(e) {
    e.preventDefault();
    var fieldName = $(e.target).data('field');
    var parent = $(e.target).closest('div');
    var currentVal = parseInt(parent.find(`input[name="${fieldName}"]`).val(), 10);
    if (!isNaN(currentVal)) {
        parent.find(`input[name="${fieldName}"]`).val(currentVal + 1).change();
        let price = parseFloat($(parent).siblings("h5").children(".price").text().replace("$", ""));
        increasePrice(price);
    } else {
        parent.find(`input[name="${fieldName}"]`).val(1).change();
    }
}

function decreaseQty(e) {
    e.preventDefault();
    var fieldName = $(e.target).data('field');
    var parent = $(e.target).closest('div');
    var currentVal = parseInt(parent.find(`input[name="${fieldName}"]`).val(), 10);

    if (!isNaN(currentVal) && currentVal > 1 && (currentVal- 1 > 0)) {
        parent.find(`input[name="${fieldName}"]`).val(currentVal - 1).change();
        let price = parseFloat($(parent).siblings("h5").children(".price").text().replace("$", ""));
        updateTotal(price);
    } 
}

function increasePrice(priceToIncrease) {
    let oldPrice = $(document).find(".cs-final-price").first().text().replace("$", "")
    let newPrice = parseFloat(oldPrice) + priceToIncrease;
    $(document).find(".cs-final-price").text("$" + newPrice);
}
