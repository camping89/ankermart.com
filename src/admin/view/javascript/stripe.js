//==============================================================================
// Stripe Payment Gateway v156.4
// 
// Author: Clear Thinking, LLC
// E-mail: johnathan@getclearthinking.com
// Website: http://www.getclearthinking.com
//==============================================================================

function getQueryVariable(variable) {
	var vars = window.location.search.substring(1).split('&');
	for (i = 0; i < vars.length; i++) {
		var pair = vars[i].split('=');
		if (pair[0] == variable) return pair[1];
	}
	return false;
}

function capture(element, charge_id) {
	element.before('<img src="view/image/loading.gif" /> ');
	$.get('index.php?route=payment/stripe/capture&charge_id=' + charge_id + '&token=' + getQueryVariable('token'),
		function(error) {
			element.prev().remove();
			if (error) {
				alert(error);
			}
			if (!error || error.indexOf('has already been captured') != -1) {
				element.prev().html('Yes');
				element.remove();
			}
		}
	);
}

function refund(element, charge_amount, charge_id, update_history) {
	amount = prompt('Enter the amount to refund:', (charge_amount / 100).toFixed(2));
	if (amount != null && amount > 0) {
		element.before('<img src="view/image/loading.gif" /> ');
		$.get('index.php?route=payment/stripe/refund&charge_id=' + charge_id + '&amount=' + amount + '&token=' + getQueryVariable('token'),
			function(error) {
				if (error) {
					alert(error);
					element.prev().remove();
				} else {
					alert('Success!');
					if (update_history) {
						setTimeout(function(){
							$('#history').load('index.php?route=sale/order/history&token=' + getQueryVariable('token') + '&order_id=' + getQueryVariable('order_id'));
							element.prev().remove();
						}, 2000);
					} else {
						element.prev().remove();
					}
				}
			}
		);
	}
}