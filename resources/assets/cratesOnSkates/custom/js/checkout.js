clickEvent(".csBtnAdd")(addAddons)
clickEvent(".csBtnRemove")(removeAddons)
clickEvent(".ord-sum-heading")(markAccordionAsCompleted)
clickEvent('.checkout--continue')(continueCheckout)
clickEvent('#js--place-order')(placeOrder)
clickEvent('#js--apply-coupon')(applyCoupon)
clickEvent('.remove--applied-coupon')(removeAppliedCoupon)
clickEvent('.js--update-rent-days')(updateShippingPickupDate)
clickEvent('.remove--cart-item')(removeCartItem)
clickEvent('.choose--cards')(chooseCards)
clickEvent('.add--new-card')(addNewCard)
changeEvent('select.add--extras')(addExtras)
changeEvent('#same--as-delivery')(sameAsDelivery)
changeEvent('#rent--days')(updateCartWithRentDays)
changeEvent('.update--cart')(updateCartWithQuantity)
changeEvent('.checkout--update-qty')(updateAddonsQuantity)
keyupEvent(".coupon--grouper [name='coupon_code']")(applyCouponOnEnter)

function urlFormulizer(url){
	if($(this).attr('data-is-ala-carte')){
		return url+"?alaCart=true";
	}
	return url;
}

function updateShippingPickupDate(e){
	e.preventDefault();
	$(this).blur()
	return;
}

function setSummaryDates(delivery, pickup){
	setSummaryDelDate(delivery);
	setSummaryPickupDate(pickup);
}

function setSummaryDelDate(delivery){
	$('.js--del--date').text(delivery)
}

function setSummaryPickupDate(pickup){
	$('.js--pickup--date').text(pickup)	
}

function applyCouponOnEnter(e){
	if(e.which === 13) applyCoupon(e);
}

function applyCoupon(e){
	e.preventDefault();
	$('.coupon--grouper .hide-me').hide();
	$('.valid-coupon-box').text('');
	let orderSummaryForm = $('#js--order-summary :input');	
	let url = urlFormulizer.call(this, '/crates/update-order-summary');
	cratesAjax({
		url,
		method : 'post',
		data : orderSummaryForm.serializeArray()
	}, response => {
		updateTotalSummaries(response)		
		if(response.coupon){
			clearCoupon();
			$('.cp-error-msg').text('').hide();
			$('.coupon--grouper .hide-me').show();
			$('.coupon--grouper .valid-coupon-box').html(`
				<span>${response.coupon.code}</span>
				<input type="hidden" name="coupon_code" placeholder="Coupon" class="form-control" value="${response.coupon.code}">
				<i class="fa fa-times remove--applied-coupon" ${response.cart ? `data-is-ala-carte="true"`:''}></i>
			`.trim());
		}
	}, ({responseText}) => {
		toastr.error((JSON.parse(responseText)).message)
		$('.cp-error-msg').show().text(JSON.parse(responseText).message)
		$('.js--coupon-total').hide();

	})
}

function removeAppliedCoupon(e){
	applyCoupon.call(this, e);
	$('.coupon--grouper .hide-me').hide();
	$('.js--coupon-total').hide();
	$(this).closest('.valid-coupon-box').html('')
}

function sameAsDelivery(){
    let formData = $('#checkout--deliver--info :input').serializeArray();   
    $(formData).each((x, {name,value}) => {
        let originalName = name;
		let pickupName = name.replace('delivery', 'pickup');
        $('#checkout--pickup--info').find(`[name="${pickupName}"]`).val(value);
        $('#checkout--pickup--info').find(`textarea[name="${pickupName}"]`).text(value);
        if(originalName.replace('delivery', '') === "_state"){
            let picker = $('#checkout--pickup--info').find(`[name="${pickupName}"]`);
            if ($(picker).find("option[value='" + value + "']").length) {
                $(picker).val(value).trigger('change');
            } else { 
                var newOption = new Option(value, value, true, true);
                $(picker).append(newOption).trigger('change');
            } 
        }
    })
}

function continueCheckout(e) {
    e.preventDefault();
    
    let formId =  $(this).parent().attr("id");
	$(`#${formId}`).find(`input`).css("border-color", "#ced4da");	
	if(isLastStep($(this))) {
		populateVerifyAndPay($(this).closest('form'));
		return;
	}	
	cratesAjax({
		url : $(this).attr('js--validator'),
		method: 'post',
		data : $(`#${formId} :input`).serializeArray()
	}, resp => {
		$("#"+formId).siblings(".ord-sum-heading").css("background","#ffc107");
    	$("#"+formId).siblings(".ord-sum-heading").addClass("formOk").attr('data-toggle', "collapse");
    	$("#"+formId).siblings().children("h3.cs-title-h3").css("color","#000 !important");
	    let current = $(this).attr('data-id');
	    let next = parseInt(current) + 1;
	    $(this).closest(`[data-step=step_${current}]`).children('div .checkout--step2--fill-form').removeClass('show').addClass('hide');
        $(this).closest(`[data-step=step_${current}]`).siblings(`[data-step=step_${next}]`).children('div .checkout--step2--fill-form').removeClass('hide').addClass('show');
        
        $($("#" + formId).siblings().children('.edit-checkout-2')).show();

	}, ({responseJSON : {errors}}) => {
		for(let key in errors){
			$(`#${formId}`).find(`[name='${key}']`).css("border-color", "red");
		}
	})
   
}

function updateTotalSummaries({package_price, subtotal, total, coupon, coupon_discount, tax = 0, cart = false, zipCharge = 0}){
	$('.js--package-price').text(`$${package_price}`)
	$('.js--subtotal').text(`$${cart ? Number(parseFloat(subtotal) + zipCharge).toFixed(2) : subtotal}`)
	if(coupon){
		$('.js--coupon-total').show();
		$('.js--coupon-total .cp--label').text(`Coupon (${coupon.code})`);
		$('.js--coupon-total .cp--amt').text("- $"+coupon_discount);
	}
	$('.js--total').text(`$${total}`)
	$('.tax--amt').text(`$${tax.toFixed(2)}`)
}

function isLastStep(clickedButton){
	return parseInt(clickedButton.find('.btnStep').attr('data-step')) === parseInt($('#js--wizard-items li').length);
	// return parseInt(clickedButton.find('.btnStep').attr('data-step')) === 3;
}

/**
 * Fill the fields in the verify and pay section with the data from delivery and billings
 * 
 * @var form
 */
function populateVerifyAndPay(form){
	let data = form.serializeArray();
	let container = $('.third_wizard_tabs_content_form');
	$(data).each((index, {name, value}) => {
		container.find(`[rel=${name}]`).text(value).append(`<input type="hidden" name="${name}" value="${value.trim()}">`);
		container.find(`[name="temporary_${name}"]`).val(value)
		container.find(`textarea[name="temporary_${name}"]`).text(value);
		if(name === "pickup_state" || name === "delivery_state"){
			let picker = container.find(`select[name="temporary_${name}"]`);
			// console.log(picker)
            if ($(picker).find("option[value='" + value + "']").length) {
                $(picker).val(value).trigger('change');
            } else { 
                var newOption = new Option(value, value, true, true);
                $(picker).append(newOption).trigger('change');
            } 
        }
	});
}

/** mask phone text */
// function maskWithRegex(){
// 	let masker = $(".regex-auto-masker");
// 	let pattern = masker.attr('pattern')
// 	let replacer = masker.attr('replacer')
// 	let replacedText = masker.text().replace(pattern, replacer);
// 	masker.text(replacedText)
// }

function packageRentUpdate(el = null){
	// e.preventDefault()
	let url = urlFormulizer.call(el ? el : this, '/crates/update-order-summary');
	let orderSummaryForm = $('#js--order-summary :input');
	cratesAjax({
		// url : '/crates/update-order-summary',
		url,
		method : 'post',
		data : orderSummaryForm.serializeArray()
	}, response => {
		updateTotalSummaries(response)	
		mapAddonsTosummary(response);	
	}, ({responseText}) => {
		toastr.error((JSON.parse(responseText)).message)
	})
}

function clearCoupon(){
	$('.coupon--grouper input[type="text"][name="coupon_code"]').val('');
}

function placeOrder(e){
	e.preventDefault();
	clearCoupon();
	let forms = $('.third_wizard_tabs_content_form :input:not([name^="temporary"])').serializeArray();
	$('.third_wizard_tabs_content_form :input').css('border-color', '#ced4da');
	let orderSummary = $('#js--order-summary :input').serializeArray();
	let formData = [...forms, ...orderSummary];
	let url = urlFormulizer.call(this, '/crates/place-order');
	cratesAjax({
		url,
		method: 'post',
		data : formData
	}, response => {
		toastr.success("order Successful")
		$("#page-section")
            .empty()
            .append(response);
        window.scrollTo({
            top: 100,
            left: 100,
            behavior: 'smooth'
		});

		if($(this).attr('data-is-ala-carte')){
			$('#shopping--cart').text('').addClass('dp-none')
		}

	}, ({status, responseJSON, message}) => {
		if(status === 422) {
			checkoutValidationError(responseJSON);
			cardsValidationError(responseJSON);
		}else{
			let {message} = responseJSON;
			toastr.error(message);
		}
	})
}

function checkoutValidationError({errors}){
	let errorFormsOffset = [];
	for(let key in errors){
		let target = $(`form.update-review-form [name="temporary_${key}"]`);
		if(!target.length) continue;
		target.closest('form').show();
		errorFormsOffset.push(target.closest('.order-review-1').offset().top);
		target.closest('form').closest('.js-review--holder').find('p.order-review__p').hide(); 
		target.css('border-color', '#e22f01').prev('label').append(`<span class="checkout-err-msg">&ensp;${errors[key]}</span>`);	
	}
	if(errorFormsOffset.length){
		window.scrollTo({
			top: Math.min(...errorFormsOffset) - 60,
			left: 100,
			behavior: 'smooth'
		}); 
	}	
}

function cardsValidationError({errors}){
	let cardKeys = ['card', 'code', 'expm', 'expy', 'name_per_card', 'zip'];
	for(let key in errors){
		let hasCardKey = cardKeys.includes(key);
		if(!hasCardKey) continue;
		let target = $(`.order-review-1 [name="${key}"]`);
		if(!target) continue;
		target.css('border-color', '#e22f01');	
	}
}

function mapAddonsTosummary({products, rental = 1}){
	$(document).find(".summary-items").html('')
	$(products).each(function(i, product){		
		let html = `        
			<div class="or-p__item l-child" id="${product.id}">
				<div class="or-p__item--img">
					<img src="${product.thumb ? `admin/products/image/${product.thumb.file_name}` : '/images/noimage.png'}" alt="bedroom">
				</div>
				<div class="or-p__item--details">
					${product.is_rental || product.isRental ?
						`<div class="cart-rentable">Rental</div>`:					
						`<div class="cart-purchaseable">Purchase</div>`
					}
					<h5>
						${product.name}
						<p class="no-m-bottom price lh-20">
						${product.is_rental || product.isRental ?
							`$${(product.inventory.price * rental).toFixed(2)} <span style="color: #545454; font-size:11px;font-weight: 300;text-transform:lowercase">&nbsp;$${product.inventory.price.toString().replace(/\.00$/, '')} x ${rental} days</span>`:
							`$${product.inventory.price}`
						}
						</p>
						<input type="hidden" name="product[]" value="${product.id}">
						<input type="hidden" name="addon[]" value="${product.addon}">
					</h5>					
					<label for="Qty" style="font-size: 11px">Quantity</label>
					<div class="cs-input-group">
						<input type="button" value="-" class="cs-button-minus-u" data-field="quantity[]">
						<input type="text" step="1" readonly="" value="${product.user_quantity}" name="quantity[]" class="quantity-field cs-qty ${product.addon == 0 ? `update--cart` :`checkout--update-qty`}" style="border-color: rgb(255, 255, 255);" data-inv-id="${product.inventory.id}" ${product.addon == 0 ? `data-cart=true` : ''}>
						<input type="button" value="+" class="cs-button-plus-u" data-field="quantity[]">
					</div>
					<a href="javascript:void(0);" class="m-t-10 csBtnRemove" ${product.addon == 0 ? `data-cart=true data-inv-id="${product.inventory.id}"` :''} style="color: #b12704; text-decoration: underline; display: inline-block">Remove</a>
				</div>
			</div>        
		`.trim();
		if(product.addon == 1){
			$(document).find(".parent-recommended .summary-items").append(html);
		}else if(product.addon == 0){
			$(document).find(".parent-cart-items .summary-items").append(html);
		}else{
			$(document).find(".parent-additional .summary-items").append(html);
		}

	});	
}

function mapExtrasToSummary({extras}){
	if(extras){
		let html = '';
		$.each(extras, function(index, {id, label, price}){
			html += `<p class="extras"><span>${label}</span> - <span class="pull-right extra-pickup">
						<input type="hidden" value="${id}" name="extras[]"/>$${Number(price).toFixed(2)}
					</span></p>`;
		})
		$('[rel="js--item-extras"]').removeClass('dp-none')
		$('[rel="js--item-extras"]').find('div:first').html(html)

	}else{
		$('[rel="js--item-extras"]').addClass('dp-none')
		$('[rel="js--item-extras"]').find('div:first').empty().addClass('dp-none')

	}
}

function addAddons() {
	let container = $(this).closest('.js--extra-product-container');
	let formData = [...container.find(':input').serializeArray(), ...$('#js--order-summary :input').serializeArray()];
	// console.log(formData)
	cratesAjax({
	url : '/crates/add-addons',
	method : "post",
	data : formData
	},(response) => {
		mapAddonsTosummary(response)
		updateTotalSummaries(response)	
	}, ({responseText}) => {
		toastr.error((JSON.parse(responseText)).message)
	})
}

function addExtras(){
	let url = urlFormulizer.call(this, '/crates/add-extras');
	let formData = [...$('#js--order-summary :input:not([name="extras[]"])').serializeArray(), ...$('#checkout--additional--info :input').serializeArray()];

	cratesAjax({
		url,
		method: 'post',
		data : formData
	}, response => {
		mapAddonsTosummary(response)
		mapExtrasToSummary(response)
		updateTotalSummaries(response)	
	},({responseText}) => toastr.error((JSON.parse(responseText)).message));
}

function updateTotal(priceToDecrease) {
    let oldPrice = $(document).find(".cs-final-price").first().text().replace("$", "")
    let newPrice = parseFloat(oldPrice) - priceToDecrease;
    $(document).find(".cs-final-price").text("$" + newPrice.toFixed(2));
}

function removeAddons(e) {

	if($(this).attr('data-cart')){		
		return removeCartItem.call(this, e, checkoutCartItemRemoval);
	}
	
	let item = $(this).closest('.or-p__item')
    item.remove();	
	let orderSummaryForm = $('#js--order-summary :input');	
	cratesAjax({
		url : '/crates/update-order-summary',
		method : 'post',
		data : orderSummaryForm.serializeArray()
	}, response => {
		updateTotalSummaries(response)	
		let abc = $(item).siblings(".or-p__item").length;
		if (abc == 0) {
			if ($(item).parent().hasClass("parent-recommended")) {
				$(item).parent().append('<p class="no-item-recommanded" style="margin: 0 15px">No Items Added</p>');
			} else {
				$(item).parent().append('<p class="no-item-additional" style="margin: 0 15px">No Items Added</p>');
			}
		}			
	}, ({responseText}) => {
		toastr.error((JSON.parse(responseText)).message)
	})   
    
}

function checkoutCartItemRemoval({data}, self){
	let {items, total, totalQuantity, tax= 0}  = data;
	if(!items.length){
		$('#shopping--cart').addClass("dp-none");
		$('#page-section').html(`
			<hr class="hr">
			<div class="cs-select-zip-container" rel="js--cart-container">
				<div class="crates_container" style="background:white; padding: 100px; text-align:center">        
					<h2 class="title">There are no items in this cart</h2>
					<div class="global-btn global-btn__yellow section-product__btn_order m-t-30 load_pages" data-route="/cratesonskates/products" data-slug="page-products">
						<p>Continue Shopping</p>
					</div>
				</div>
			</div>
			<hr class="hr">			
		`.trim());
		window.scrollTo(0, 0);
		return 0;
	}
	let taxAmount = tax/100*total;
	$('.js--total').text(`$${parseFloat(total + taxAmount).toFixed(2)}`);
	$('.tax--amt').text(`${taxAmount.toFixed(2)}`)
	$('#shopping--cart').text(totalQuantity);
	self.closest('.or-p__item').remove();
	$('.js--subtotal').text(`$${total}`)
	toastr.warning('Item removed from cart');
}

function removeCartItem(e, cb = ''){	
	e.preventDefault();
	const self = $(this)
	let days = $(this).attr('data-rent-days');
	let url = 'crates/remove_cart/'+$(this).attr('data-inv-id');
	let method = "get";
	let data = '';
	switch(true){
		case typeof days !== "undefined" : 
			url += `?rented_days=${days}`;
			break;
        case $("[name='selected_delivery_date']") !== null  && $("[name='selected_pickup_date']") !== null:
			let deliveryDate = $("[name='selected_delivery_date']").val();
			let pickupDate = $("[name='selected_pickup_date']").val();
			let differenceInDays = moment(pickupDate).diff(moment(deliveryDate), 'days');
			url += `?rented_days=${parseInt(differenceInDays)}`;

			// For zip price evaluation
			/*
			let zip_delivery_charge = $("[name = 'zip_delivery_charge']").val()
			let zip_pickup_charge = $("[name = 'zip_pickup_charge']").val()
			url += `&zip_delivery_charge=${zip_delivery_charge ? zip_delivery_charge : ''}&zip_pickup_charge=${zip_pickup_charge ? zip_pickup_charge : ''}`;
			*/
			data = $('#js--order-summary :input').serializeArray();
			method = "post";
			break;
		default :			
			return;
	}

	cratesAjax({
		url, method, data
	}, (removedInv) => {
		if(typeof cb === "function"){
			cb(removedInv, self);
		}else{
			defaultCartItemRemoval(removedInv, self)
		}
	});
}

function defaultCartItemRemoval({data}, self){
	let {items, total, totalQuantity}  = data;
	if(!items.length){
		$('#shopping--cart').addClass("dp-none");
		$('[rel="js--cart-container"]').html(`
			<div class="crates_container" style="background:white; padding: 100px; text-align:center">        
				<h2 class="title">There are no items in this cart</h2>
				<div class="global-btn global-btn__yellow section-product__btn_order m-t-30 load_pages" data-route="/cratesonskates/products" data-slug="page-products">
					<p>Continue Shopping</p>
				</div>
			</div>
		`.trim());
		return 0;
	}
	$('#shopping--cart').text(totalQuantity);
	$('#js--cart-list-total').text(`$${total}`);
	// $('.js--subtotal').text(`$${total}`);
	self.closest('tr').remove();
	toastr.warning('Item removed from cart');
}

function updateCartWithRentDays(e){
	e.preventDefault();
	const self = $(this)
	cratesAjax({
		url : 'crates/update_cart?rented_days='+self.val(),
	}, ({data : {total}}) => {
		$('#js--cart-list-total').text(`$${total}`);
		$('#checkout--btn').attr('data-route', `/crates/checkout_from_cart?rentedDays=${self.val()}`);
		$('.remove--cart-item').attr('data-rent-days', self.val())
	});
}

function updateCartWithQuantity(e){
	e.preventDefault();
	const self = $(this);	
	switch(true){
		case $("[name='selected_delivery_date']").length > 0  && $("[name='selected_pickup_date']").length > 0:
			//Update from checkout
			let deliveryDate = $("[name='selected_delivery_date']").val();
			let pickupDate = $("[name='selected_pickup_date']").val();
			rentedDays = moment(pickupDate).diff(moment(deliveryDate), 'days');
			let checkoutData = [
				...$('#js--order-summary :input').serializeArray(), 
				{name : "inventory", value : $(this).attr('data-inv-id')}, 
				{name: "quantity", value: $(this).val()}
			];
			cartQtyUpdate(checkoutData, rentedDays, function({data : {totalQuantity = 0, total = 0, price, tax, zip_charges_excluded_price = 0}}){
				let taxAmount = tax/100*zip_charges_excluded_price;
				$('#shopping--cart').text(totalQuantity);
				$('.js--subtotal').text(`$${price}`);
				$('.tax--amt').text(`${taxAmount.toFixed(2)}`)
				$('.js--total').text(`$${parseFloat(parseFloat(total) + parseFloat(taxAmount)).toFixed(2)}`);
			});
			break;
		default :
			//update from view cart
			let data  = {
				inventory : $(this).attr('data-inv-id'),
				quantity: $(this).val()
			}
			rentedDays = $('#rent--days').val() 
			cartQtyUpdate(data,rentedDays, function({data : {totalQuantity = 0, total = 0, items}}){
				$.each(items, function(i, item){
					if(item.inventory.id == data.inventory){
						// let updateProduct = items[0];
						self.closest('tr').find('td:last').text(`$${(item['inventory']['price'] * item['quantity']).toFixed(2)}`)
						$('#shopping--cart').text(totalQuantity);
						$('#js--cart-list-total').text(`$${total}`);
					}
				});				
			})
	}	
}

function cartQtyUpdate(data,rentedDays, cb = ''){
	cratesAjax({
		url : `crates/update_cart_qty/${rentedDays}`,	
		method: "post",
		data 	
	},cb)
}

function updateAddonsQuantity(e){
	e.preventDefault()	
	let orderSummaryForm = $('#js--order-summary :input');	
	cratesAjax({
		url : '/crates/update-order-summary',
		method : 'post',
		data : orderSummaryForm.serializeArray()
	}, response => {
		updateTotalSummaries(response)				
	}, ({responseText}) => {
		toastr.error((JSON.parse(responseText)).message)
	})
}

function chooseCards(e){
	e.preventDefault();
	$(this).parent('.cardDetail').addClass('dp-none-i')
	$('#js--other-cards').removeClass('dp-none-i');
}

function addNewCard(e){
	e.preventDefault()
	$('[rel= "existing--card-details"]').remove();
	$('[rel="card--details-form"]').removeClass('dp-none');
}

function markAccordionAsCompleted(e){
	e.preventDefault();
	if (!$(this).hasClass("formOk")) {
		$(this).attr('data-toggle', '')
	}
}

