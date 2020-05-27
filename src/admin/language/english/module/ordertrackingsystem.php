<?php
// Heading
$_['heading_title']       = 'Order Tracking System';

// Text
$_['text_module']         = 'Modules';
$_['text_note']           = 'Note: If "Order ID" or "Tracking Number" blank, then it will be ignored. If the tracking number of "Order ID" already been imported before, it will be replaced with the latest tracking number.';
$_['text_success']        = 'Success: You have modified  Order Tracking System!';
$_['text_default']        = 'Shipping method is: {shipping_method} 
Tracking number is: {number} 
Tracking website: {link} ';

// Entry
$_['entry_order_status']  = 'Order Status:<br /><span class="help">After import tracking number, the "Order Status" will change to (usually "shipped")</span>';
$_['entry_notify']        = 'Notify Customer:<br /><span class="help">If yes, an email will be sent to the customers when you import the tracking number.</span>';
$_['entry_comment']       = 'Comment:<br /><span class="help">1, Use {shipping_method} to substitute the the shipping method;<br />2, Use {number} to substitute the the tracking number;<br />3, Use {link} to substitute the the tracking website.</span>';
$_['entry_method']		  = 'Shipping Method';
$_['entry_link']          = 'Tracking Website';
$_['bulk_upload']         = 'Upload';
$_['entry_file']          = 'Upload:';

// Button
$_['button_add_method']   = 'Add Shipping Method';

// Error 
$_['error_permission']    = 'Warning: You do not have permission to modify Order Tracking System!';
$_['error_code']          = 'Shipping Method required!';
$_['error_install']       = 'Order Tracking System must be installed!';
$_['error_upload']        = 'Uploaded file is not a valid spreadsheet file or its values are not in the expected formats!';
?>