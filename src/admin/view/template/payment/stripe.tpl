<?php
//==============================================================================
// Stripe Payment Gateway v156.4
// 
// Author: Clear Thinking, LLC
// E-mail: johnathan@getclearthinking.com
// Website: http://www.getclearthinking.com
//==============================================================================
?>

<?php echo $header; ?>
<style type="text/css">
	.floating {
		background: url('view/image/box.png') repeat-x;
		border: 1px solid #DDD;
		border-radius: 7px;
		margin: -1px 0 0 !important;
		padding: 6px;
		position: fixed;
		right: 30px;
	}
	.floating, .ui-dialog {
		box-shadow: 0 3px 6px #999;
	}
	.help {
		font-style: italic;
		margin-top: 5px;
	}
	td[colspan] .help {
		margin-top: 0;
	}
	.settings-header {
		background: #E4EEF7;
		font-weight: bold;
	}
	.scrollbox {
		height: 70px;
	}
	.scrollbox label:nth-child(even) div {
		background: #E4EEF7;
	}
	.copy-and-paste {
		background: #EEE;
		cursor: pointer;
		font-family: monospace;
		width: 100%;
	}
	#thumb {
		background: #BBC2C6;
		border: 1px solid #9BA2A6;
		border-radius: 6px;
		height: 64px;
		width: 64px;
	}
	.ui-dialog {
		padding: 0;
		position: fixed;
	}
</style>
<?php if ($version > 149) { ?>
<div id="content">
	<div class="breadcrumb">
		<?php foreach ($breadcrumbs as $breadcrumb) { ?>
			<?php echo $breadcrumb['separator']; ?><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a>
		<?php } ?>
	</div>
<?php } ?>
<?php if (isset($this->session->data['success'])) { ?>
	<div class="success"><?php echo $this->session->data['success']; ?></div>
	<?php unset($this->session->data['success']); ?>
<?php } ?>
<div class="box">
	<?php if ($version < 150) { ?><div class="left"></div><div class="right"></div><?php } ?>
	<div class="heading">
		<h1 style="padding: 10px 2px 0"><img src="view/image/<?php echo $type; ?>.png" alt="" style="vertical-align: middle" /> <?php echo $heading_title; ?></h1>
		<div class="floating buttons">
			<a class="button" onclick="saveSettings(true)"><span><?php echo $button_save_exit; ?></span></a>
			<a class="button" onclick="saveSettings(false)"><span><?php echo $button_save_keep_editing; ?></span></a>
			<a class="button" onclick="location = '<?php echo $exit; ?>'"><span><?php echo $button_cancel; ?></span></a>
		</div>
	</div>
	<div class="content">
		<form action="" method="post" enctype="multipart/form-data" id="form">
			<table class="form">
				<!-- General Settings -->
				<tr class="settings-header" style="border-top: 1px dotted #CCC"><td colspan="2"><?php echo $entry_general_settings; ?></td></tr>
				<tr>
					<td style="width: 350px"><?php echo $entry_status; ?></td>
					<td><select name="<?php echo $name; ?>_status">
							<option value="1" <?php if (!empty(${$name.'_status'})) echo 'selected="selected"'; ?>><?php echo $text_enabled; ?></option>
							<option value="0" <?php if (empty(${$name.'_status'})) echo 'selected="selected"'; ?>><?php echo $text_disabled; ?></option>
						</select>
					</td>
				</tr>
				<tr>
					<td><?php echo $entry_sort_order; ?></td>
					<td><input type="text" size="1" name="<?php echo $name; ?>_sort_order" value="<?php echo (isset(${$name.'_sort_order'})) ? ${$name.'_sort_order'} : 1; ?>" /></td>
				</tr>
				<tr>
					<td><?php echo $entry_title; ?></td>
					<td><?php foreach ($languages as $language) { ?>
							<div style="white-space: nowrap">
								<img src="view/image/flags/<?php echo $language['image']; ?>" title="<?php echo $language['name']; ?>" />
								<input type="text" size="42" name="<?php echo $name; ?>_data[title][<?php echo $language['code']; ?>]" value="<?php echo (isset(${$name.'_data'}['title'][$language['code']])) ? ${$name.'_data'}['title'][$language['code']] : 'Credit / Debit Card'; ?>" />
							</div>
						<?php } ?>
					</td>
				</tr>
				<tr>
					<td><?php echo $entry_button_text; ?></td>
					<td><?php foreach ($languages as $language) { ?>
							<div style="white-space: nowrap">
								<img src="view/image/flags/<?php echo $language['image']; ?>" title="<?php echo $language['name']; ?>" />
								<input type="text" name="<?php echo $name; ?>_data[button_text][<?php echo $language['code']; ?>]" value="<?php echo (isset(${$name.'_data'}['button_text'][$language['code']])) ? ${$name.'_data'}['button_text'][$language['code']] : 'Confirm Order'; ?>" />
							</div>
						<?php } ?>
					</td>
				</tr>
				<tr>
					<td><?php echo $entry_button_class; ?></td>
					<td><input type="text" name="<?php echo $name; ?>_data[button_class]" value="<?php echo (isset(${$name.'_data'}['button_class'])) ? ${$name.'_data'}['button_class'] : 'button'; ?>" /></td>
				</tr>
				<tr>
					<td><?php echo $entry_button_styling; ?></td>
					<td><input type="text" name="<?php echo $name; ?>_data[button_styling]" value="<?php echo (isset(${$name.'_data'}['button_styling'])) ? ${$name.'_data'}['button_styling'] : ''; ?>" /></td>
				</tr>
				
				<!-- Order Statuses -->
				<tr class="settings-header"><td colspan="2"><?php echo $entry_order_statuses; ?></td></tr>
				<tr><td colspan="2"><?php echo $help_order_statuses; ?></td></tr>
				<?php foreach (array('success_status_id', 'street_status_id', 'zip_status_id', 'cvc_status_id', 'refund_status_id', 'partial_status_id') as $condition) { ?>
					<tr>
						<td><?php echo ${'entry_' . $condition}; ?></td>
						<td><select name="<?php echo $name; ?>_data[<?php echo $condition; ?>]">
								<?php $order_status_id = (isset(${$name.'_data'}[$condition])) ? ${$name.'_data'}[$condition] : $this->config->get('config_order_status_id'); ?>
								<option value="0" <?php if ($order_status_id == 0) echo 'selected="selected"'; ?>><?php echo $text_ignore; ?></option>
								<?php foreach ($order_statuses as $order_status) { ?>
									<option value="<?php echo $order_status['order_status_id']; ?>" <?php if ($order_status['order_status_id'] == $order_status_id) echo 'selected="selected"'; ?>><?php echo $order_status['name']; ?></option>
								<?php } ?>
							</select>
						</td>
					</tr>
				<?php } ?>
				
				<!-- Restrictions -->
				<tr class="settings-header"><td colspan="2"><?php echo $entry_restrictions; ?></td></tr>
				<tr>
					<td><?php echo $entry_total; ?></td>
					<td><span style="display: inline-block; width: 30px"><?php echo $text_min; ?></span>
						<input type="text" size="4" name="<?php echo $name; ?>_data[min_total]" value="<?php echo (isset(${$name.'_data'}['min_total'])) ? ${$name.'_data'}['min_total'] : ''; ?>" />
						<br />
						<span style="display: inline-block; width: 30px"><?php echo $text_max; ?></span>
						<input type="text" size="4" name="<?php echo $name; ?>_data[max_total]" value="<?php echo (isset(${$name.'_data'}['max_total'])) ? ${$name.'_data'}['max_total'] : ''; ?>" />
					</td>
				</tr>
				<tr>
					<td><?php echo $entry_stores; ?></td>
					<td><div class="scrollbox">
							<?php foreach ($stores as $store) { ?>
								<label><div>
									<?php $checked = (!isset(${$name.'_data'}['stores']) || in_array($store['store_id'], ${$name.'_data'}['stores'])) ? 'checked="checked"' : ''; ?>
									<input type="checkbox" name="<?php echo $name; ?>_data[stores][]" value="<?php echo $store['store_id']; ?>" <?php echo $checked; ?> />
									<?php echo $store['name']; ?>
								</div></label>
							<?php } ?>
						</div>
						<?php echo $selectall_links; ?>
					</td>
				</tr>
				<tr>
					<td><?php echo $entry_geo_zones; ?></td>
					<td><div class="scrollbox">
							<?php foreach ($geo_zones as $geo_zone) { ?>
								<label><div>
									<?php $checked = (!isset(${$name.'_data'}['geo_zones']) || in_array($geo_zone['geo_zone_id'], ${$name.'_data'}['geo_zones'])) ? 'checked="checked"' : ''; ?>
									<input type="checkbox" name="<?php echo $name; ?>_data[geo_zones][]" value="<?php echo $geo_zone['geo_zone_id']; ?>" <?php echo $checked; ?> />
									<?php echo $geo_zone['name']; ?>
								</div></label>
							<?php } ?>
						</div>
						<?php echo $selectall_links; ?>
					</td>
				</tr>
				<tr>
					<td><?php echo $entry_customer_groups; ?></td>
					<td><div class="scrollbox">
							<?php foreach ($customer_groups as $customer_group) { ?>
								<label><div>
									<?php $checked = (!isset(${$name.'_data'}['customer_groups']) || in_array($customer_group['customer_group_id'], ${$name.'_data'}['customer_groups'])) ? 'checked="checked"' : ''; ?>
									<input type="checkbox" name="<?php echo $name; ?>_data[customer_groups][]" value="<?php echo $customer_group['customer_group_id']; ?>" <?php echo $checked; ?> />
									<?php echo $customer_group['name']; ?>
								</div></label>
							<?php } ?>
						</div>
						<?php echo $selectall_links; ?>
					</td>
				</tr>
				
				<!-- Stripe Settings -->
				<tr class="settings-header"><td colspan="2"><?php echo $entry_stripe_settings; ?></td></tr>
				<tr><td colspan="2"><?php echo $help_api_keys; ?></td></tr>
				<tr>
					<td><?php echo $entry_test_secret_key; ?></td>
					<td><input type="text" size="42" onblur="$(this).val($(this).val().trim())" name="<?php echo $name; ?>_data[test_secret_key]" value="<?php echo (isset(${$name.'_data'}['test_secret_key'])) ? ${$name.'_data'}['test_secret_key'] : ''; ?>" /></td>
				</tr>
				<tr>
					<td><?php echo $entry_test_publishable_key; ?></td>
					<td><input type="text" size="42" onblur="$(this).val($(this).val().trim())" name="<?php echo $name; ?>_data[test_publishable_key]" value="<?php echo (isset(${$name.'_data'}['test_publishable_key'])) ? ${$name.'_data'}['test_publishable_key'] : ''; ?>" /></td>
				</tr>
				<tr>
					<td><?php echo $entry_live_secret_key; ?></td>
					<td><input type="text" size="42" onblur="$(this).val($(this).val().trim())" name="<?php echo $name; ?>_data[live_secret_key]" value="<?php echo (isset(${$name.'_data'}['live_secret_key'])) ? ${$name.'_data'}['live_secret_key'] : ''; ?>" /></td>
				</tr>
				<tr>
					<td><?php echo $entry_live_publishable_key; ?></td>
					<td><input type="text" size="42" onblur="$(this).val($(this).val().trim())" name="<?php echo $name; ?>_data[live_publishable_key]" value="<?php echo (isset(${$name.'_data'}['live_publishable_key'])) ? ${$name.'_data'}['live_publishable_key'] : ''; ?>" /></td>
				</tr>
				<tr>
					<td><?php echo $entry_webhook_url; ?></td>
					<td><input type="text" class="copy-and-paste" readonly="readonly" onclick="this.select()" value="<?php echo str_replace('http:', 'https:', HTTP_CATALOG) . 'index.php?route=' . $type . '/' . $name . '/webhook&key=' . $this->config->get('config_encryption'); ?>" /></td>
				</tr>
				<tr>
					<td><?php echo $entry_transaction_mode; ?></td>
					<td><select name="<?php echo $name; ?>_data[transaction_mode]">
							<?php $transaction_mode = (isset(${$name.'_data'}['transaction_mode'])) ? ${$name.'_data'}['transaction_mode'] : 'test'; ?>
							<option value="test" <?php if ($transaction_mode == 'test') echo 'selected="selected"'; ?>><?php echo $text_test; ?></option>
							<option value="live" <?php if ($transaction_mode == 'live') echo 'selected="selected"'; ?>><?php echo $text_live; ?></option>
						</select>
					</td>
				</tr>
				<tr>
					<td><?php echo $entry_charge_mode; ?></td>
					<td><select name="<?php echo $name; ?>_data[charge_mode]">
							<?php $charge_mode = (isset(${$name.'_data'}['charge_mode'])) ? ${$name.'_data'}['charge_mode'] : 'capture'; ?>
							<option value="authorize" <?php if ($charge_mode == 'authorize') echo 'selected="selected"'; ?>><?php echo $text_authorize; ?></option>
							<option value="capture" <?php if ($charge_mode == 'capture') echo 'selected="selected"'; ?>><?php echo $text_authorize_and_capture; ?></option>
						</select>
					</td>
				</tr>
				<tr>
					<td><?php echo $entry_currency_mapping; ?></td>
					<td><?php foreach ($currencies as $currency) { ?>
							<?php echo $currency['code']; ?>:
							<select name="<?php echo $name; ?>_data[currencies][<?php echo $currency['code']; ?>]">
								<?php $curr = (isset(${$name.'_data'}['currencies'][$currency['code']])) ? ${$name.'_data'}['currencies'][$currency['code']] : $this->config->get('config_currency'); ?>
								<option value="0" <?php if ($curr == 0) echo 'selected="selected"'; ?>><?php echo $text_currency_disabled; ?></option>
								<?php foreach ($currencies as $c) { ?>
									<option value="<?php echo $c['code']; ?>" <?php if ($curr == $c['code']) echo 'selected="selected"'; ?>><?php echo $c['code']; ?></option>
								<?php } ?>
							</select>
							<br />
						<?php } ?>
					</td>
				</tr>
				<tr>
					<td><?php echo $entry_send_customer_data; ?></td>
					<td><select name="<?php echo $name; ?>_data[send_customer_data]">
							<?php $send_customer_data = (isset(${$name.'_data'}['send_customer_data'])) ? ${$name.'_data'}['send_customer_data'] : 'never'; ?>
							<option value="never" <?php if ($send_customer_data == 'never') echo 'selected="selected"'; ?>><?php echo $text_never; ?></option>
							<option value="choice" <?php if ($send_customer_data == 'choice') echo 'selected="selected"'; ?>><?php echo $text_customers_choice; ?></option>
							<option value="always" <?php if ($send_customer_data == 'always') echo 'selected="selected"'; ?>><?php echo $text_always; ?></option>
						</select>
					</td>
				</tr>
				<tr>
					<td><?php echo $entry_allow_customers_to_use; ?></td>
					<td><select name="<?php echo $name; ?>_data[allow_stored_cards]">
							<?php $allow_stored_cards = (isset(${$name.'_data'}['allow_stored_cards'])) ? ${$name.'_data'}['allow_stored_cards'] : 0; ?>
							<option value="1" <?php if ($allow_stored_cards == 1) echo 'selected="selected"'; ?>><?php echo $text_yes; ?></option>
							<option value="0" <?php if ($allow_stored_cards == 0) echo 'selected="selected"'; ?>><?php echo $text_no; ?></option>
						</select>
					</td>
				</tr>
				<tr>
					<td><?php echo $entry_stripe_transaction_desc; ?></td>
					<td><input type="text" size="42" name="<?php echo $name; ?>_data[transaction_description]" value="<?php echo (isset(${$name.'_data'}['transaction_description'])) ? ${$name.'_data'}['transaction_description'] : '[store]: Order #[order_id] ([amount], [email])'; ?>" /></td>
				</tr>
				
				<!-- Stripe Checkout -->
				<tr class="settings-header"><td colspan="2"><?php echo $entry_stripe_checkout; ?></td></tr>
				<tr><td colspan="2"><?php echo $help_stripe_checkout; ?></td></tr>
				<tr>
					<td><?php echo $entry_use_stripe_checkout; ?></td>
					<td><select name="<?php echo $name; ?>_data[use_checkout]">
							<?php $use_checkout = (isset(${$name.'_data'}['use_checkout'])) ? ${$name.'_data'}['use_checkout'] : 0; ?>
							<option value="0" <?php if ($use_checkout == 0) echo 'selected="selected"'; ?>><?php echo $text_no; ?></option>
							<option value="1" <?php if ($use_checkout == 1) echo 'selected="selected"'; ?>><?php echo $text_yes; ?></option>
						</select>
					</td>
				</tr>
				<tr>
					<td><?php echo $entry_embed_code; ?></td>
					<td><input type="text" class="copy-and-paste" readonly="readonly" onclick="this.select()" value="&lt;?php echo $this->getChild('payment/stripe/embed'); ?&gt;" /></td>
				</tr>
				<tr>
					<td><?php echo $entry_enable_remember_me; ?></td>
					<td><select name="<?php echo $name; ?>_data[checkout_remember_me]">
							<?php $checkout_remember_me = (isset(${$name.'_data'}['use_checkout'])) ? ${$name.'_data'}['use_checkout'] : 1; ?>
							<option value="0" <?php if ($checkout_remember_me == 0) echo 'selected="selected"'; ?>><?php echo $text_no; ?></option>
							<option value="1" <?php if ($checkout_remember_me == 1) echo 'selected="selected"'; ?>><?php echo $text_yes; ?></option>
						</select>
					</td>
				</tr>
				<tr>
					<td><?php echo $entry_require_billing_address; ?></td>
					<td><select name="<?php echo $name; ?>_data[checkout_billing]">
							<?php $checkout_billing = (isset(${$name.'_data'}['checkout_billing'])) ? ${$name.'_data'}['checkout_billing'] : 1; ?>
							<option value="1" <?php if ($checkout_billing == 1) echo 'selected="selected"'; ?>><?php echo $text_yes; ?></option>
							<option value="0" <?php if ($checkout_billing == 0) echo 'selected="selected"'; ?>><?php echo $text_no; ?></option>
						</select>
					</td>
				</tr>
				<tr>
					<td><?php echo $entry_require_shipping_address; ?></td>
					<td><select name="<?php echo $name; ?>_data[checkout_shipping]">
							<?php $checkout_shipping = (isset(${$name.'_data'}['checkout_shipping'])) ? ${$name.'_data'}['checkout_shipping'] : 0; ?>
							<option value="1" <?php if ($checkout_shipping == 1) echo 'selected="selected"'; ?>><?php echo $text_yes; ?></option>
							<option value="0" <?php if ($checkout_shipping == 0) echo 'selected="selected"'; ?>><?php echo $text_no; ?></option>
						</select>
					</td>
				</tr>
				<tr>
					<td><?php echo $entry_popup_logo; ?></td>
					<td><div class="image" style="text-align: center">
							<?php $this->load->model('tool/image'); ?>
							<a onclick="chooseImage('image', 'thumb');"><img src="<?php echo HTTPS_SERVER . '../image/' . (!empty(${$name.'_data'}['checkout_image']) ? ${$name.'_data'}['checkout_image'] : 'no_image.jpg'); ?>" alt="" id="thumb" /></a>
							<input type="hidden" id="image" name="<?php echo $name; ?>_data[checkout_image]" value="<?php echo (!empty(${$name.'_data'}['checkout_image'])) ? ${$name.'_data'}['checkout_image'] : ''; ?>" />
							<br />
							<a onclick="chooseImage('image', 'thumb');"><?php echo $text_browse; ?></a>
							&nbsp; | &nbsp;
							<a onclick="$('#thumb').attr('src', '<?php echo HTTPS_SERVER . '../image/no_image.jpg'; ?>'); $('#image').attr('value', '');"><?php echo $text_clear; ?></a>
						</div>
					</td>
				</tr>
				<tr>
					<td><?php echo $entry_popup_title; ?></td>
					<td><?php foreach ($languages as $language) { ?>
							<div style="white-space: nowrap">
								<img src="view/image/flags/<?php echo $language['image']; ?>" title="<?php echo $language['name']; ?>" />
								<input type="text" size="42" name="<?php echo $name; ?>_data[checkout_title][<?php echo $language['code']; ?>]" value="<?php echo (isset(${$name.'_data'}['checkout_title'][$language['code']])) ? ${$name.'_data'}['checkout_title'][$language['code']] : '[store]'; ?>" />
							</div>
						<?php } ?>
					</td>
				</tr>
				<tr>
					<td><?php echo $entry_popup_description; ?></td>
					<td><?php foreach ($languages as $language) { ?>
							<div style="white-space: nowrap">
								<img src="view/image/flags/<?php echo $language['image']; ?>" title="<?php echo $language['name']; ?>" />
								<input type="text" size="42" name="<?php echo $name; ?>_data[checkout_description][<?php echo $language['code']; ?>]" value="<?php echo (isset(${$name.'_data'}['checkout_description'][$language['code']])) ? ${$name.'_data'}['checkout_description'][$language['code']] : 'Order #[order_id] ([amount])'; ?>" />
							</div>
						<?php } ?>
					</td>
				</tr>
				<tr>
					<td><?php echo $entry_popup_button_text; ?></td>
					<td><?php foreach ($languages as $language) { ?>
							<div style="white-space: nowrap">
								<img src="view/image/flags/<?php echo $language['image']; ?>" title="<?php echo $language['name']; ?>" />
								<input type="text" name="<?php echo $name; ?>_data[checkout_button][<?php echo $language['code']; ?>]" value="<?php echo (isset(${$name.'_data'}['checkout_button'][$language['code']])) ? ${$name.'_data'}['checkout_button'][$language['code']] : 'Pay'; ?>" />
							</div>
						<?php } ?>
					</td>
				</tr>
				
				<!-- Subscription Products -->
				<tr class="settings-header"><td colspan="2"><?php echo $entry_subscription_products; ?></td></tr>
				<tr><td colspan="2"><?php echo $help_subscription_products; ?></td></tr>
				<tr>
					<td><?php echo $entry_enable_subscription; ?></td>
					<td><select name="<?php echo $name; ?>_data[subscriptions]">
							<?php $subscriptions = (isset(${$name.'_data'}['subscriptions'])) ? ${$name.'_data'}['subscriptions'] : 0; ?>
							<option value="0" <?php if ($subscriptions == 0) echo 'selected="selected"'; ?>><?php echo $text_no; ?></option>
							<option value="1" <?php if ($subscriptions == 1) echo 'selected="selected"'; ?>><?php echo $text_yes; ?></option>
						</select>
					</td>
				</tr>
				<tr>
					<td><?php echo $entry_prevent_guests_from; ?></td>
					<td><select name="<?php echo $name; ?>_data[prevent_guests]">
							<?php $prevent_guests = (isset(${$name.'_data'}['prevent_guests'])) ? ${$name.'_data'}['prevent_guests'] : 0; ?>
							<option value="1" <?php if ($prevent_guests == 1) echo 'selected="selected"'; ?>><?php echo $text_yes; ?></option>
							<option value="0" <?php if ($prevent_guests == 0) echo 'selected="selected"'; ?>><?php echo $text_no; ?></option>
						</select>
					</td>
				</tr>
				<tr>
					<td><?php echo str_replace('[transaction_mode]', ucwords($transaction_mode), $entry_current_subscription); ?></td>
					<td><table class="list">
							<thead>
								<tr>
									<td colspan="3" class="center"><?php echo $text_thead_opencart; ?></td>
									<td colspan="3" class="center"><?php echo $text_thead_stripe; ?></td>
								</tr>
								<tr>
									<td class="left"><?php echo $text_product_name; ?></td>
									<td class="left"><?php echo $text_product_price; ?></td>
									<td class="left"><?php echo $text_location_plan_id; ?></td>
									<td class="left"><?php echo $text_plan_name; ?></td>
									<td class="left"><?php echo $text_plan_interval; ?></td>
									<td class="left"><?php echo $text_plan_charge; ?></td>
								</tr>
							</thead>
							<?php if (empty($subscription_products)) { ?>
								<tr><td class="center" colspan="6"><?php echo $text_no_subscription_products; ?></td></tr>
								<tr><td class="center" colspan="6"><?php echo $text_create_one_by_entering; ?></td></tr>
							<?php } ?>
							<?php foreach ($subscription_products as $product) { ?>
								<?php $highlight = ($product['price'] == $product['charge']) ? '' : 'style="background: #FDD"'; ?>
								<tr>
									<td class="left"><a target="_blank" href="index.php?route=catalog/product/update&amp;product_id=<?php echo $product['product_id']; ?>&amp;token=<?php echo $token; ?>"><?php echo $product['name']; ?></a></td>
									<td class="left" <?php echo $highlight; ?>><?php echo $product['price']; ?></td>
									<td class="left"><?php echo $product['location']; ?></td>
									<td class="left"><?php echo $product['plan']; ?></td>
									<td class="left"><?php echo $product['interval']; ?></td>
									<td class="left" <?php echo $highlight; ?>><?php echo $product['charge']; ?></td>
								</tr>
							<?php } ?>
						</table>
					</td>
				</tr>
			</table>
		</form>
		<?php echo $copyright; ?>
	</div>
</div>
<?php if ($version < 150) { ?>
	<script type="text/javascript" src="view/javascript/jquery/ui/ui.draggable.js"></script>
	<script type="text/javascript" src="view/javascript/jquery/ui/ui.resizable.js"></script>
	<script type="text/javascript" src="view/javascript/jquery/ui/ui.dialog.js"></script>
	<script type="text/javascript" src="view/javascript/jquery/ui/external/bgiframe/jquery.bgiframe.js"></script>
<?php } else { ?>
	</div>
<?php } ?>
<script type="text/javascript"><!--
	function saveSettings(exit) {
		$('<div />').dialog({
			title: '<?php echo $text_saving; ?>',
			closeOnEscape: false,
			draggable: false,
			modal: true,
			resizable: false,
			open: function(event, ui) {
				$('.ui-dialog-content').hide();
				$('.ui-dialog-titlebar-close').hide();
			}
		}).dialog('open');
		
		$.ajax({
			type: 'POST',
			url: 'index.php?route=<?php echo $type; ?>/<?php echo $name; ?>/save&token=<?php echo $token; ?>',
			data: $('#form :input:not(:checkbox), #form :input:checked'),
			success: function(error) {
				if (error) exit = false;
				$('.ui-dialog-titlebar').css(error ? {'background': '#C00', 'border': '1px solid #A00'} : {'background': '#0C0', 'border': '1px solid #0A0'});
				$('.ui-dialog-content').dialog('option', 'title', error ? error : '<?php echo $text_saved; ?>');
				setTimeout(function(){ $('.ui-dialog-content').dialog('close'); if (exit) location = '<?php echo html_entity_decode($exit, ENT_QUOTES, 'UTF-8'); ?>'; }, error ? 2000 : 1000);
			},
			error: function() {
				$('#form').attr('action', location + '&exit=' + exit).submit();
			}
		});
	}
	
	function chooseImage(field, thumb) {
		$('#dialog').remove();
		$('#content').prepend('<div id="dialog" style="padding: 3px 0 0"><iframe src="index.php?route=common/filemanager&token=<?php echo $token; ?>&field=' + encodeURIComponent(field) + '" style="padding: 0; margin: 0; display: block; width: 100%; height: 100%;" frameborder="no" scrolling="auto"></iframe></div>');
		$('#dialog').dialog({
			title: '<?php echo $text_image_manager; ?>',
			close: function (event, ui) {
				if ($('#' + field).attr('value')) {
					$.ajax({
						url: 'index.php?route=common/filemanager/image&token=<?php echo $token; ?>&image=' + encodeURIComponent($('#' + field).val()),
						type: 'POST',
						data: 'image=' + encodeURIComponent($('#' + field).attr('value')),
						dataType: 'text',
						success: function(data) {
							$('#' + thumb).replaceWith('<img src="' + data + '" alt="" id="' + thumb + '" />');
						}
					});
				}
			},	
			bgiframe: false,
			width: 800,
			height: 500,
			resizable: false,
			modal: true
		});
	};
//--></script>
<?php echo $footer; ?>