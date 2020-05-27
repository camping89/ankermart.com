<?php
//==============================================================================
// Stripe Payment Gateway v156.4
// 
// Author: Clear Thinking, LLC
// E-mail: johnathan@getclearthinking.com
// Website: http://www.getclearthinking.com
//==============================================================================

$version = 'v156.4';

// Heading
$_['heading_title']					= 'Stripe';
$_['text_stripe']					= '<a target="blank" href="https://stripe.com"><img src="https://stripe.com/img/logo.png" alt="Stripe" title="Stripe" /></a>';

// Saving
$_['button_save_exit']				= 'Save & Exit';
$_['button_save_keep_editing']		= 'Save & Keep Editing';
$_['text_saving']					= 'Saving...';
$_['text_saved']					= 'Saved!';

// General Settings
$_['entry_general_settings']		= 'General Settings';
$_['entry_status']					= 'Status:';
$_['entry_sort_order']				= 'Sort Order:';
$_['entry_title']					= 'Title:<span class="help">Enter the title for the payment method displayed to the customer. HTML is supported.</span>';
$_['entry_button_text']				= 'Button Text:<span class="help">Enter the text for the order confirmation button.</span>';
$_['entry_button_class']			= 'Button Class:<span class="help">Enter the CSS class for buttons in your theme.</span>';
$_['entry_button_styling']			= 'Button Styling:<span class="help">Optionally enter extra CSS styling for the button.</span>';

// Order Statuses
$_['entry_order_statuses']			= 'Order Statuses';
$_['help_order_statuses']			= '<span class="help">Choose the order statuses set when a payment meets each condition. Note: to actually <strong>deny</strong> payments that fail CVC or Zip Checks, you need to enable the appropriate setting in your Stripe admin panel. You can refund a payment by using the link provided in the History tab for the order.</span>';
$_['entry_success_status_id']		= 'Successful Payment:';
$_['entry_street_status_id']		= 'Street Check Failure:';
$_['entry_zip_status_id']			= 'Zip Check Failure:';
$_['entry_cvc_status_id']			= 'CVC Check Failure:';
$_['entry_refund_status_id']		= 'Fully Refunded Payment:';
$_['entry_partial_status_id']		= 'Partially Refunded Payment:';
$_['text_ignore']					= '-- Ignore --';

// Restrictions
$_['entry_restrictions']			= 'Restrictions';
$_['entry_total']					= 'Total:<span class="help">The minimum and maximum order total that must be reached before this payment method becomes active. Leave blank to have no total restrictions.</span>';
$_['text_min']						= 'Min:';
$_['text_max']						= 'Max:';
$_['entry_stores']					= 'Store(s):<span class="help">Select the stores that can use this payment method.</span>';
$_['entry_geo_zones']				= 'Geo Zone(s):<span class="help">Select the geo zones that can use this payment method. The "All Other Zones" checkbox applies to all locations not within any geo zone.</span>';
$_['text_all_other_zones']			= '<em>All Other Zones</em>';
$_['entry_customer_groups']			= 'Customer Group(s):<span class="help">Select the customer groups that can use this payment method. The "Not Logged In" checkbox applies to all customers not currently logged in.</span>';
$_['text_not_logged_in']			= '<em>Not Logged In</em>';
$_['entry_currencies']				= 'Currencies:<span class="help">Select the currencies that can use this payment method.</span>';

// Stripe Settings
$_['entry_stripe_settings']			= 'Stripe Settings';
$_['help_api_keys']					= '<span class="help">API Keys can be found in your Stripe admin panel under Your Account > Account Settings > API Keys</span>';
$_['entry_test_secret_key']			= 'Test Secret Key:';
$_['entry_test_publishable_key']	= 'Test Publishable Key:';
$_['entry_live_secret_key']			= 'Live Secret Key:';
$_['entry_live_publishable_key']	= 'Live Publishable Key:';
$_['entry_webhook_url']				= 'Webhook URL:<br /><span class="help">Copy and paste this URL into your Stripe account,<br />in Your Account > Account Settings > Webhooks.<br />If you change your store\'s Encryption Key in<br />System > Settings > Server, remember to also update the webhook URL in Stripe.</span>';
$_['entry_transaction_mode']		= 'Transaction Mode:<span class="help">Use "Test" to test payments through Stripe. For more info, visit <a href="https://stripe.com/docs/testing" target="_blank">https://stripe.com/docs/testing</a>.<br /><br />Use "Live" when you\'re ready to accept payments.</span>';
$_['text_test']						= 'Test';
$_['text_live']						= 'Live';
$_['entry_charge_mode']				= 'Charge Mode:<span class="help">Choose whether to authorize payments and manually capture them later, or to both authorize and capture (i.e. fully charge) payments when orders are placed. You can capture a payment that is only Authorized by using the link provided in the History tab for the order.</span>';
$_['text_authorize']				= 'Authorize';
$_['text_authorize_and_capture']	= 'Authorize & Capture';
$_['entry_currency_mapping']		= 'Currency Mapping:<span class="help">Select the currency that Stripe will charge in for each OpenCart currency. Note that while every currency in your OpenCart installation is displayed, the currencies you can charge in are determined by where your business is located. See <a target="_blank" href="https://support.stripe.com/questions/which-currencies-does-stripe-support">this page</a> for more information.</span>';
$_['text_currency_disabled']		= '-- Disabled --';
$_['entry_send_customer_data']		= 'Send Customer Data:<span class="help">Sending customer data will create a customer in Stripe when an order is processed, based on the email address for the order. The credit card used will be attached to this customer, allowing you to charge them again in the future in Stripe.</span>';
$_['text_never']					= 'Never';
$_['text_customers_choice']			= 'Customer\'s choice';
$_['text_always']					= 'Always';
$_['entry_allow_customers_to_use']	= 'Allow Customers to Use Stored Cards:<span class="help">If set to "Yes", customers that have cards stored in Stripe will be able to use those cards for future purchases in your store, without having to re-enter the information.</span>';
$_['entry_stripe_transaction_desc']	= 'Stripe Transaction Description:<span class="help">Enter the text sent as the Stripe transaction description. You can use the following shortcodes to enter information about the order: [store], [order_id], [amount], [email], [comment], [products]</span>';

// Stripe Checkout Button
$_['entry_stripe_checkout']			= 'Stripe Checkout';
$_['help_stripe_checkout']			= '<span class="help">Stripe Checkout uses Stripe\'s design for building and styling credit card inputs, validation, and error handling. You can read more about it and view a demo at <a target="_blank" href="https://stripe.com/docs/checkout">https://stripe.com/docs/checkout</a><br /><br />Note: Stripe Checkout does <strong>not</strong> allow customers to use the billing address entered in OpenCart.</span>';
$_['entry_use_stripe_checkout']		= 'Use Stripe Checkout Button:';
$_['entry_embed_code']				= 'Embed Code:<span class="help">Use this embed code to add a "quick checkout" feature to your store by placing the Stripe Checkout button on other pages besides the checkout confirm page (such as the <a onclick="alert(\'In the default template, you would make this edit to add the embed code:\n\nIN:\n/catalog/view/theme/default/template/checkout/cart.tpl\n\nREPLACE:\n&lt;div class=&quot;buttons&quot;&gt;\n  &lt;div class=&quot;right&quot;&gt;&lt;a href=&quot;&lt;?php echo $checkout; ?&gt;&quot; class=&quot;button&quot;&gt;&lt;?php echo $button_checkout; ?&gt;&lt;/a&gt;&lt;/div&gt;\n  &lt;div class=&quot;center&quot;&gt;&lt;a href=&quot;&lt;?php echo $continue; ?&gt;&quot; class=&quot;button&quot;&gt;&lt;?php echo $button_shopping; ?&gt;&lt;/a&gt;&lt;/div&gt;\n&lt;/div&gt;\n\nWITH:\n&lt;?php echo $this->getChild&#40;&quot;payment/stripe/embed&quot;&#41;; ?&gt;\')">cart page</a>). The customer can enter their e-mail, payment address, shipping address, and credit card details all through the pop-up, and an order will be properly created in OpenCart. Note that this only works for 1.5.x versions, and <b>you must only use this on SSL-enabled pages</b>.</span>';
$_['entry_enable_remember_me']		= 'Enable "Remember Me" Option:<span class="help">This will allow customers to choose whether Stripe remembers them on other sites that use Stripe Checkout. Note: even if enabled, the option will not appear if the customer\'s browser is set to block third-party cookies.</span>';
$_['entry_require_billing_address']	= 'Require Billing Address:<span class="help">If set to "No", the customer will not enter an address in the pop-up, which means no address will be stored or validated in Stripe.</span>';
$_['entry_require_shipping_address']= 'Require Shipping Address:<span class="help">Only enable this setting if using the Stripe Checkout button on the cart page. If set to "Yes", a shipping method must be applied to the cart first. Note that if the customer applies a shipping method and does not use a matching shipping address in the Stipe Checkout pop-up, the charge will not be processed, to prevent incorrect shipping charges.</span>';
$_['entry_popup_logo']				= 'Pop-up Logo:<span class="help">Select the image used for your store logo in the pop-up panel. It should be 128 x 128 pixels, with no text, no gloss, and no rounded corners.</span>';
$_['text_browse']					= 'Browse';
$_['text_clear']					= 'Clear';
$_['text_image_manager']			= 'Image Manager';
$_['entry_popup_title']			 	= 'Pop-up Title:<span class="help">Enter the title that appears at the top of the pop-up panel. You can use the following shortcodes to enter information about the order: [store], [order_id], [amount], [email], [products]</span>';
$_['entry_popup_description']		= 'Pop-up Description:<span class="help">Optionally enter a description that appears under the pop-up title. You can use the following shortcodes to enter information about the order: [store], [order_id], [amount], [email], [products]</span>';
$_['entry_popup_button_text']		= 'Pop-up Button Text:<span class="help">Enter the text for the button in the pop-up panel. You can use the [amount] shortcode to enter the order amount.</span>';

// Subscription Products
$_['entry_subscription_products']	= 'Subscription Products';
$_['help_subscription_products']	= '<span class="help">Subscription products will subscribe the customer to the associated Stripe plan when they are purchased. You can associate a product with a plan by entering the Stripe plan ID in the "Location" field for the product.<br /><br />If the subscription is not set to be charged immediately (i.e. it has a trial period), the amount of the subscription will be taken off their original order, and a new order will be created when the subscription is actually charged to their card.<br /><br />Any time Stripe charges the subscription in the future, a corresponding order will be created in OpenCart.</span>';
$_['entry_enable_subscription']		= 'Enable Subscription Products:';
$_['entry_prevent_guests_from']		= 'Prevent Guests From Purchasing:<br /><span class="help">If set to "Yes", only customers with accounts in OpenCart will be allowed to checkout if a subscription product is in the cart.</span>';
$_['entry_current_subscription']	= 'Current Subscription Products:<br /><span class="help">Products with mismatching prices are highlighted. The customer will always be charged the Stripe plan price, not the OpenCart product price, so you should make sure the price in OpenCart corresponds to the price in Stripe.<br /><br />Note: only plans for your Transaction Mode will be listed. You are currently set to "[transaction_mode]" mode.</span>';
$_['text_thead_opencart']			= 'OpenCart';
$_['text_thead_stripe']				= 'Stripe';
$_['text_product_name']				= 'Product Name';
$_['text_product_price']			= 'Product Price';
$_['text_location_plan_id']			= 'Location / Plan ID';
$_['text_plan_name']				= 'Plan Name';
$_['text_plan_interval']			= 'Plan Interval';
$_['text_plan_charge']				= 'Plan Charge';
$_['text_no_subscription_products']	= 'No Subscription Products';
$_['text_create_one_by_entering']	= 'Create one by entering the Stripe plan ID in the "Location" field for the product';

// Standard Text
$_['copyright']						= '<div style="text-align: center" class="help">' . $_['heading_title'] . ' Payment Gateway ' . $version . ' &copy; <a target="_blank" href="http://www.getclearthinking.com">Clear Thinking, LLC</a></div>';
$_['standard_module']				= 'Modules';
$_['standard_shipping']				= 'Shipping';
$_['standard_payment']				= 'Payments';
$_['standard_total']				= 'Order Totals';
$_['standard_feed']					= 'Product Feeds';
$_['standard_success']				= 'Success: You have modified ' . $_['heading_title'] . '!';
$_['standard_error']				= 'Warning: You do not have permission to modify ' . $_['heading_title'] . ' Payment Gateway!';
?>