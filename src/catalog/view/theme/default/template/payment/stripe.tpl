<?php
//==============================================================================
// Stripe Payment Gateway v156.4
// 
// Author: Clear Thinking, LLC
// E-mail: johnathan@getclearthinking.com
// Website: http://www.getclearthinking.com
//==============================================================================
?>

<?php if ($version < 150) { ?>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<?php } ?>

<?php if ($settings['use_checkout'] || $embed) { ?>
	
	<div id="payment"></div>
 	<script src="https://checkout.stripe.com/checkout.js"></script>
	<script type="text/javascript"><!--
		function confirmOrder() {
			<?php if (!empty($settings['checkout_shipping']) && empty($this->session->data['shipping_method'])) { ?>
				alert('<?php echo $error_shipping_required; ?>');
			<?php } else { ?>
				StripeCheckout.open({
					// Required
					key:				'<?php echo $settings[$settings['transaction_mode'].'_publishable_key']; ?>',
					token:				function(token, args) { displayWait(); chargeToken(token, args); },
					
					// Highly Recommended
				<?php if ($checkout_image) { ?>
					image:				'<?php echo $checkout_image; ?>',
				<?php } ?>
					name:				'<?php echo str_replace("'", "\'", $checkout_title); ?>',
				<?php if ($checkout_description) { ?>
					description:		'<?php echo str_replace("'", "\'", $checkout_description); ?>',
				<?php } ?>
					amount:				<?php echo round(100 * $this->currency->convert($order_info['total'], $this->config->get('config_currency'), $this->session->data['currency'])); ?>,
					
					// Optional
				<?php if ($checkout_button) { ?>
					panelLabel:			'<?php echo str_replace(array("'", '[amount]'), array("\'", '{{amount}}'), $checkout_button); ?>',
				<?php } ?>
					currency:			'<?php echo strtolower($this->session->data['currency']); ?>',
					billingAddress:		<?php echo (!empty($settings['checkout_billing'])) ? 'true' : 'false'; ?>,
					shippingAddress:	<?php echo (!empty($settings['checkout_shipping'])) ? 'true' : 'false'; ?>,
					email:				'<?php echo $order_info['email']; ?>',
					allowRememberMe:	<?php echo (!empty($settings['checkout_remember_me'])) ? 'true' : 'false'; ?>,
				});
			<?php } ?>
			
			return false;
		}
	//--></script>
	
<?php } else { ?>
	
	<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
	<h2><?php echo $text_card_details; ?></h2>
	<div id="payment" class="content">
		<table class="form" style="margin-bottom: 0">
			<tr>
			<?php if ($customer) { ?>
				<td style="vertical-align: top">
					<select id="card-select" onchange="if ($('#new-card').css('display') == 'none') { $('#stored-card').fadeOut('slow', function(){$('#new-card').fadeIn('slow')}); } else { $('#new-card').fadeOut('slow', function(){$('#stored-card').fadeIn('slow')}); }">
						<option value="stored"><?php echo $text_use_your_stored_card; ?></option>
						<option value="new"><?php echo $text_use_a_new_card; ?></option>
					</select>
				</td>
				<td>
					<div id="stored-card" style="padding: 4px">
						<?php echo $customer['default_card']['type'] . ' ' . $text_ending_in . ' ' . $customer['default_card']['last4']; ?>
						(<?php echo str_pad($customer['default_card']['exp_month'], 2, '0', STR_PAD_LEFT) . '/' . substr($customer['default_card']['exp_year'], 2); ?>)
					</div>
					<table class="form" id="new-card" style="display: none; margin: -4px 0 0">
			<?php } else { ?>
				<td>
					<table class="form" id="new-card" style="margin: 0">
			<?php } ?>
						<tr>
							<td style="white-space: nowrap"><?php echo $text_card_name; ?></td>
							<td><input type="text" id="card-name" style="width: 160px" value="<?php echo $order_info['firstname'] . ' ' . $order_info['lastname']; ?>" /></td>
						</tr>
						<tr>
							<td style="white-space: nowrap"><?php echo $text_card_number; ?></td>
							<td><input type="text" id="card-number" style="width: 160px" maxlength="20" autocomplete="off" /></td>
						</tr>
						<tr>
							<td style="white-space: nowrap"><?php echo $text_card_expiry; ?></td>
							<td><input type="text" id="card-month" style="width: 18px" maxlength="2" autocomplete="off" />
								/ <input type="text" id="card-year" style="width: 18px" maxlength="2" autocomplete="off" />
							</td>
						</tr>
						<tr>
							<td style="white-space: nowrap"><?php echo $text_card_security; ?></td>
							<td><input type="text" id="card-security" style="width: 32px" maxlength="4" autocomplete="off" /></td>
						</tr>
						<?php if ($this->customer->isLogged() && $settings['allow_stored_cards'] && $settings['send_customer_data'] != 'never') { ?>					
							<tr>
								<td style="white-space: nowrap">
									<?php if ($customer) { ?>
										<?php echo $text_replace_stored_card; ?>
										<br />
										<span style="font-size: 11px"><?php echo $text_your_current_card_will; ?></span>
									<?php } elseif ($settings['send_customer_data'] != 'never') { ?>
										<?php echo $text_store_card_for_future; ?>
									<?php } ?>
								<td><input type="checkbox" id="store-card" /></td>
							</tr>
						<?php } ?>
					</table>
				</td>
			</tr>
		</table>
	</div>
	<script type="text/javascript"><!--
		function confirmOrder() {
			Stripe.setPublishableKey('<?php echo $settings[$settings['transaction_mode'].'_publishable_key']; ?>');
			displayWait();
			
			if ($('#new-card').css('display') == 'none') {
				chargeToken('', '');
			} else {
				Stripe.createToken({
					name: $('#card-name').val(),
					number: $('#card-number').val(),
					exp_month: $('#card-month').val(),
					exp_year: '20' + $('#card-year').val(),
					cvc: $('#card-security').val(),
					address_line1: '<?php echo str_replace("'", "\'", html_entity_decode($order_info['payment_address_1'], ENT_QUOTES, 'UTF-8')); ?>',
					address_line2: '<?php echo str_replace("'", "\'", html_entity_decode($order_info['payment_address_2'], ENT_QUOTES, 'UTF-8')); ?>',
					address_city: '<?php echo str_replace("'", "\'", html_entity_decode($order_info['payment_city'], ENT_QUOTES, 'UTF-8')); ?>',
					address_state: '<?php echo str_replace("'", "\'", html_entity_decode($order_info['payment_zone'], ENT_QUOTES, 'UTF-8')); ?>',
					address_zip: '<?php echo str_replace("'", "\'", html_entity_decode($order_info['payment_postcode'], ENT_QUOTES, 'UTF-8')); ?>',
					address_country: '<?php echo str_replace("'", "\'", html_entity_decode($order_info['payment_country'], ENT_QUOTES, 'UTF-8')); ?>'
				}, function(status, response){
					if (response.error) {
						displayError(response.error.message);
					} else {
						chargeToken(response, '');
					}
				});
			}
		}
	//--></script>
	
<?php } ?>

<div class="buttons">
	<?php if ($version < 150) { ?>
		<table>
			<tr>
				<td align="left"><a onclick="history.back()" class="<?php echo $settings['button_class']; ?>"><span><?php echo $button_back; ?></span></a></td>
				<td align="right">
					<a id="button-confirm" onclick="confirmOrder()" class="<?php echo $settings['button_class']; ?>" style="<?php echo $settings['button_styling']; ?>">
						<span><?php echo $settings['button_text'][$this->session->data['language']]; ?></span>
					</a>
				</td>
			</tr>
		</table>
	<?php } else { ?>
		<div class="right">
			<a id="button-confirm" onclick="confirmOrder()" class="<?php echo $settings['button_class']; ?>" style="<?php echo $settings['button_styling']; ?>">
				<?php echo $settings['button_text'][$this->session->data['language']]; ?>
			</a>
		</div>
	<?php } ?>
</div>

<script type="text/javascript"><!--
	function displayWait() {
		$('#button-confirm').removeAttr('onclick');
		$('#card-select').attr('disabled', 'disabled');
		$('.attention').remove();
		$('.warning').remove();
		$('#payment').before('<div class="attention wait" style="display: none"><img src="catalog/view/theme/default/image/loading<?php echo ($version < 150) ? '_1' : ''; ?>.gif" alt="" /> <?php echo $text_please_wait; ?></div>');
		$('.attention').fadeIn('slow');
	}
	
	function displayError(message) {
		$('.attention').remove();
		$('#payment').before('<div class="warning" style="display: none">' + message + '</div>');
		$('.warning').fadeIn('slow');
		$('#button-confirm').attr('onclick', 'confirmOrder()');
		$('#card-select').removeAttr('disabled');
	}
	
	function chargeToken(token, addresses) {
		$.ajax({
			type: 'POST',
			url: 'index.php?route=<?php echo $type; ?>/<?php echo $name; ?>/send',
			data: {card_token: token.id, email: token.email, addresses: addresses, store_card: $('#store-card').attr('checked'), embed: <?php echo (int)$embed; ?>},
			dataType: 'json',
			success: function(json) {
				if (json['error']) {
					displayError(json['error']);
				} else if (json['success']) {
					location = json['success'];
				}
			}
		});
	}
//--></script>