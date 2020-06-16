<?php echo $header; ?>
<style>
/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 10%; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
  background-color: #fefefe;
  margin: auto;
  padding: 0 20px 20px 20px;
  border: 1px solid #888;
  width: 40%;
}
.text-left {
	text-align:left;
}
.text-right {
	text-align:right;
}
.text-center {
	text-align:center !important;
}
/* The Close Button */
.close {
  color: #aaaaaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}
.order-history .modal-body{
	padding:20px;
	border-bottom:1px solid #ccc;
	margin-bottom:20px;
}
#form-history-order{
	margin-top:20px;
	border-top:1px solid #ccc;
}
</style>
<div id="content">
  <div class="breadcrumb">
    <?php foreach ($breadcrumbs as $breadcrumb) { ?>
    <?php echo $breadcrumb['separator']; ?><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a>
    <?php } ?>
  </div>
  <?php if ($error_warning) { ?>
  <div class="warning"><?php echo $error_warning; ?></div>
  <?php } ?>
  <?php if ($success) { ?>
  <div class="success"><?php echo $success; ?></div>
  <?php } ?>
  <div class="box">
    <div class="heading">
      <h1><img src="view/image/order.png" alt="" /> <?php echo $heading_title; ?></h1>
      <div class="buttons">
	  <a href="<?php echo $show50; ?>">50</a>&nbsp;&nbsp;<a href="<?php echo $show200; ?>">200</a>&nbsp;&nbsp;<a href="<?php echo $show500; ?>">500</a>&nbsp;&nbsp;<a href="<?php echo $show1000; ?>">1000</a>&nbsp;&nbsp;
	  <a onclick="$('#form').attr('action', '<?php echo $export_select; ?>'); $('#form').attr('target', '_self'); $('#form').submit();" class="button"><span><?php echo $button_export; ?></span></a><a onclick="$('#form').attr('action', '<?php echo $update_select; ?>'); $('#form').attr('target', '_self'); $('#form').submit();" class="button"><span><?php echo $button_updateorder; ?></span></a><a onclick="$('#form').attr('action', '<?php echo $invoice; ?>'); $('#form').attr('target', '_blank'); $('#form').submit();" class="button"><span><?php echo $button_invoice; ?></span></a><?php if(isset($insert)){ ?><a onclick="location = '<?php echo $insert; ?>'" class="button"><span><?php echo $button_insert; ?></span></a><?php } ?><a onclick="$('#form').attr('action', '<?php echo $delete; ?>'); $('#form').attr('target', '_self'); $('#form').submit();" class="button"><span><?php echo $button_delete; ?></span></a>	  
	  </div>
    </div>
    <div class="content">
      <form action="" method="post" enctype="multipart/form-data" id="form">
        <table class="list">
          <thead>
            <tr>
              <td width="1" style="text-align: center;"><input type="checkbox" onclick="$('input[name*=\'selected\']').attr('checked', this.checked);" /></td>
              <td class="right"><?php if ($sort == 'o.order_id') { ?>
                <a href="<?php echo $sort_order; ?>" class="<?php echo strtolower($order); ?>"><?php echo $column_order_id; ?></a>
                <?php } else { ?>
                <a href="<?php echo $sort_order; ?>"><?php echo $column_order_id; ?></a>
                <?php } ?></td>
			                

              <td class="left"><?php if ($sort == 'customer') { ?>
                <a href="<?php echo $sort_customer; ?>" class="<?php echo strtolower($order); ?>"><?php echo $column_customer; ?></a>
                <?php } else { ?>
                <a href="<?php echo $sort_customer; ?>"><?php echo $column_customer; ?></a>
                <?php } ?>
				<br />
				<?php if ($sort == 'o.email') { ?>
                <a href="<?php echo $sort_email; ?>" class="<?php echo strtolower($order); ?>"><?php echo $column_email; ?></a>
                <?php } else { ?>
                <a href="<?php echo $sort_email; ?>"><?php echo $column_email; ?></a>
                <?php } ?>
				</td>

			  <td class="left text-center"><?php echo $column_orderproduct; ?></td>   
			  <td class="left"><?php echo $column_orderproduct_name; ?></td>   
              <td class="right"><?php if ($sort == 'o.total') { ?>
                <a href="<?php echo $sort_total; ?>" class="<?php echo strtolower($order); ?>"><?php echo $column_total; ?></a>
                <?php } else { ?>
                <a href="<?php echo $sort_total; ?>"><?php echo $column_total; ?></a>
                <?php } ?></td>

              <td class="left"><?php echo $column_orderproduct_sku; ?></td>

              <td class="left"><?php if ($sort == 'status') { ?>
                <a href="<?php echo $sort_status; ?>" class="<?php echo strtolower($order); ?>"><?php echo $column_status; ?></a>
                <?php } else { ?>
                <a href="<?php echo $sort_status; ?>"><?php echo $column_status; ?></a>
                <?php } ?></td>
			  

			  <!--<td class="left"><?php echo $column_payment_method; ?></td>-->
			  

			  <td class="right"><?php echo $column_sub_total; ?></td>
			  <!--<td class="right"><?php echo $column_store_credit; ?></td>-->
             
             

              <td class="left"><?php if ($sort == 'o.date_added') { ?>
                <a href="<?php echo $sort_date_added; ?>" class="<?php echo strtolower($order); ?>"><?php echo $column_date_added; ?></a>
                <?php } else { ?>
                <a href="<?php echo $sort_date_added; ?>"><?php echo $column_date_added; ?></a>
                <?php } ?></td>
              


              <td class="left"><?php if ($sort == 'o.date_modified') { ?>
                <a href="<?php echo $sort_date_modified; ?>" class="<?php echo strtolower($order); ?>"><?php echo $column_date_modified; ?></a>
                <?php } else { ?>
                <a href="<?php echo $sort_date_modified; ?>"><?php echo $column_date_modified; ?></a>


			  <!--<td class="left"><?php if ($sort == 'invoice_id') { ?>
                <a href="<?php echo $sort_invoice; ?>" class="<?php echo strtolower($order); ?>"><?php echo $column_invoice_id; ?></a>
                <?php } else { ?>
                <a href="<?php echo $sort_invoice; ?>"><?php echo $column_invoice_id; ?></a>
                <?php } ?></td>-->


                <?php } ?></td>
              <td class="right"><?php echo $column_action; ?></td>
            </tr>
          </thead>
          <tbody>
            <tr class="filter">
              <td></td>
              <td align="right"><input type="text" name="filter_order_id" value="<?php echo $filter_order_id; ?>" size="4" style="text-align: right;" /></td>
			  <td><input type="text" name="filter_customer" value="<?php echo $filter_customer; ?>" /></td>
              <!--<td><input type="text" name="filter_email" value="<?php echo $filter_email; ?>" /></td>-->
			  <td>&nbsp;</td>
			  <td>&nbsp;</td>
              <td align="right"><input type="text" name="filter_total" value="<?php echo $filter_total; ?>" size="4" style="text-align: right;" /></td>
			  <td>&nbsp;</td>
			  <td><select name="filter_order_status_id">
                  <option value="*"></option>
                  <?php if ($filter_order_status_id == '0') { ?>
                  <option value="0" selected="selected"><?php echo $text_abandoned_orders; ?></option>
                  <?php } else { ?>
                  <option value="0"><?php echo $text_abandoned_orders; ?></option>
                  <?php } ?>
                  <?php foreach ($order_statuses as $order_status) { ?>
                  <?php if ($order_status['order_status_id'] == $filter_order_status_id) { ?>
                  <option value="<?php echo $order_status['order_status_id']; ?>" selected="selected"><?php echo $order_status['name']; ?></option>
                  <?php } else { ?>
                  <option value="<?php echo $order_status['order_status_id']; ?>"><?php echo $order_status['name']; ?></option>
                  <?php } ?>
                  <?php } ?>
                </select></td>
			  <!--<td>&nbsp;</td>-->
			  <td>&nbsp;</td>
			  <!--<td>&nbsp;</td>-->

              <td><input type="text" name="filter_date_added" value="<?php echo $filter_date_added; ?>" size="12" class="date" /></td>
              <td><input type="text" name="filter_date_modified" value="<?php echo $filter_date_modified; ?>" size="12" class="date" /></td>
              <!--<td align="left"><input type="text" name="filter_invoice_id" value="<?php echo $filter_invoice_id; ?>" size="8" /></td>-->
              <td align="right"><a onclick="filter();" class="button"><span><?php echo $button_filter; ?></span></a></td>
            </tr>
            <?php if ($orders) { ?>
            <?php foreach ($orders as $order) { ?>
            <tr>
              <td style="text-align: center;"><?php if ($order['selected']) { ?>
                <input type="checkbox" name="selected[]" value="<?php echo $order['order_id']; ?>" checked="checked" />
                <?php } else { ?>
                <input type="checkbox" name="selected[]" value="<?php echo $order['order_id']; ?>" />
                <?php } ?></td>
              <td class="right"><?php echo $order['order_id']; ?></td>
              <td class="left"><?php echo $order['customer']; ?><br /><?php echo $order['email']; ?></td>
			  <td class="left text-center"><?php echo $order['orderproduct']; ?></td>
			  <td class="left"><?php echo $order['orderproductname']; ?></td>
		      <td class="right"><?php echo $order['total']; ?></td>
			  <td class="left"><?php echo $order['orderproductsku']; ?></td>
              <td class="left"><?php echo $order['status']; ?><br />
			  <?php if ($order['reward']) { ?>
           	  Reward Points:&nbsp;<?php echo $order['reward']; ?>
              	<?php if (!$order['reward_total']) { ?>
				<img src="view/image/add.png" class="reward-add" />
              	<?php } else { ?>
				<img src="view/image/delete.png" class="reward-remove" />
              	<?php } ?>
	          <?php } ?>
			  <?php if ($order['affiliate']) { ?>
			 Commission:&nbsp;<?php echo $order['commission']; ?>
				 <?php if (!$order['commission_total']) { ?>
			  	  <img src="view/image/add.png" class="commission-add" />
             	 <?php } else { ?>
			  	  <img src="view/image/delete.png" class="commission-remove" />
              	<?php } ?>
			  <?php } ?>
			  </td>
			  <!--<td class="left"><?php echo $order['payment_method']; ?></td>-->
              <td class="right"><?php echo $order['sub_total']; ?></td>
			  <!--<td class="right"><?php echo $order['store_credit']; ?></td>-->

              <td class="left"><?php echo $order['date_added']; ?><br /></td>
              <td class="left"><?php echo $order['date_modified']; ?></td>
              <!--<td class="left"><?php echo $order['invoice_id']; ?></td>-->
              <td class="right">
			  	<?php foreach ($order['action'] as $action) { ?>
                [ <a href="<?php echo $action['href']; ?>"><?php echo $action['text']; ?></a> ]
                <?php } ?>
				[<a href="javascript:;" onclick="showDialogHistory(<?php echo $order['order_id']; ?>);">Tracking</a>]
				</td>
            </tr>
            <?php } ?>
            <?php } else { ?>
            <tr>
              <td class="center" colspan="13"><?php echo $text_no_results; ?></td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
      </form>
      <div class="pagination"><?php echo $pagination; ?></div>
    </div>
  </div>
</div>

<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content order-history">
    <!--<span class="close">&times;</span>-->
    <div class="modal-body">
		<form >
		<h2>Add Order History</h2>
		<table class="form">
			<tr>
				<td class="text-right"><strong>Order ID:</strong></td>
				<td class="text-left"><span id="md-orderid"></span></td>
			</tr>
			<tr>
				<td class="text-right"><strong>Customer:</strong></td>
				<td class="text-left"><span id="md-customer"></span></td>
			</tr>			
			<tr>
				<td class="text-right"><strong>Product Name:</strong></td>
				<td class="text-left"><span id="md-productname"></span></td>
			</tr>
			<tr>
				<td class="text-right"><strong>Date Added:</strong></td>
				<td class="text-left"><span id="md-dateadded"></span></td>
			</tr>
		</table>

		<div id="form-history-order"></div>
		</form>
	</div>
	<div class="tracking-order">
		<button type="button" style="background:red; color: white; border:none; padding:5px 10px;" class="left btn-close-dialog">Close</button>
		<button id="button-history" type="button" style="background:green; color: white; float:right; border:none; padding:5px 10px;"  class="btn-add-history">Save</button>
	</div>
  </div>

</div>

<script type="text/javascript"><!--
$('.reward-add').live('click', function() {
	var obj = $(this);
	$.ajax({
		type: 'POST',
		url: 'index.php?route=sale/order/addreward&token=<?php echo $token; ?>&order_id='+obj.parent().parent().find('input[name=\'selected[]\']').val(),
		dataType: 'json',
		beforeSend: function() {
			obj.after('&nbsp;<img src="view/image/loading.gif" class="loading" style="padding-left: 5px;" />');			
		},
		complete: function() {
			$('.loading').remove();
		},									
		success: function(json) {						
			if (json['error']) {
				 alert(json['error']);
			}
			
			if (json['success']) {
                 alert(json['success']);
				obj.replaceWith('<img src="view/image/delete.png" class="reward-remove" />');
			}
		}
	});
});

$('.reward-remove').live('click', function() {
	var obj = $(this);
	$.ajax({
		type: 'POST',
		url: 'index.php?route=sale/order/removereward&token=<?php echo $token; ?>&order_id='+obj.parent().parent().find('input[name=\'selected[]\']').val(),
		dataType: 'json',
		beforeSend: function() {
			obj.after('&nbsp;<img src="view/image/loading.gif" class="loading" style="padding-left: 5px;" />');
		},
		complete: function() {
			$('.loading').remove();
		},				
		success: function(json) {
			if (json['error']) {
				 alert(json['error']);
			}
			
			if (json['success']) {
                 alert(json['success']);				
				obj.replaceWith('<img src="view/image/add.png" class="reward-add" />');
			}
		}
	});
});

$('.commission-add').live('click', function() {
	var obj = $(this);
	$.ajax({
		type: 'POST',
		url: 'index.php?route=sale/order/addcommission&token=<?php echo $token; ?>&order_id='+obj.parent().parent().find('input[name=\'selected[]\']').val(),
		dataType: 'json',
		beforeSend: function() {
			obj.after('&nbsp;<img src="view/image/loading.gif" class="loading" style="padding-left: 5px;" />');			
		},
		complete: function() {
			$('.loading').remove();
		},									
		success: function(json) {						
			if (json['error']) {
				 alert(json['error']);
			}
			
			if (json['success']) {
                 alert(json['success']);
				obj.replaceWith('<img src="view/image/delete.png" class="commission-remove" />');
			}
		}
	});
});

$('.commission-remove').live('click', function() {
	var obj = $(this);
	$.ajax({
		type: 'POST',
		url: 'index.php?route=sale/order/removecommission&token=<?php echo $token; ?>&order_id='+obj.parent().parent().find('input[name=\'selected[]\']').val(),
		dataType: 'json',
		beforeSend: function() {
			obj.after('&nbsp;<img src="view/image/loading.gif" class="loading" style="padding-left: 5px;" />');
		},
		complete: function() {
			$('.loading').remove();
		},				
		success: function(json) {
			if (json['error']) {
				 alert(json['error']);
			}
			
			if (json['success']) {
                 alert(json['success']);				
				obj.replaceWith('<img src="view/image/add.png" class="commission-add" />');
			}
		}
	});
});

function filter() {
	url = 'index.php?route=sale/manageorder&token=<?php echo $token; ?>';
	
	var filter_order_id = $('input[name=\'filter_order_id\']').attr('value');
	
	if (filter_order_id) {
		url += '&filter_order_id=' + encodeURIComponent(filter_order_id);
	}
	
	var filter_invoice_id = $('input[name=\'filter_invoice_id\']').attr('value');
	
	if (filter_invoice_id) {
		url += '&filter_invoice_id=' + encodeURIComponent(filter_invoice_id);
	}
	
	var filter_customer = $('input[name=\'filter_customer\']').attr('value');
	
	if (filter_customer) {
		url += '&filter_customer=' + encodeURIComponent(filter_customer);
	}
	
	var filter_email = $('input[name=\'filter_email\']').attr('value');
	
	if (filter_email) {
		url += '&filter_email=' + encodeURIComponent(filter_email);
	}
	
	var filter_order_status_id = $('select[name=\'filter_order_status_id\']').attr('value');
	
	if (filter_order_status_id != '*') {
		url += '&filter_order_status_id=' + encodeURIComponent(filter_order_status_id);
	}	

	var filter_total = $('input[name=\'filter_total\']').attr('value');

	if (filter_total) {
		url += '&filter_total=' + encodeURIComponent(filter_total);
	}	
	
	var filter_date_added = $('input[name=\'filter_date_added\']').attr('value');
	
	if (filter_date_added) {
		url += '&filter_date_added=' + encodeURIComponent(filter_date_added);
	}
	
	var filter_date_modified = $('input[name=\'filter_date_modified\']').attr('value');
	
	if (filter_date_modified) {
		url += '&filter_date_modified=' + encodeURIComponent(filter_date_modified);
	}
				
	location = url;
}

$(document).keyup(function(e) {
  if (e.keyCode === 27) $('.btn-close-dialog').click();   // esc
});

//-->
// Get the modal
var modal = document.getElementById("myModal");
// Get the <span> element that closes the modal
//var span = document.getElementsByClassName("close")[0];
var btnclose = document.getElementsByClassName("btn-close-dialog")[0];
	function showDialogHistory(orderid){
		modal.style.display = "block";
		$.ajax({
		type: 'GET',
		dataType: 'json',
		url: 'index.php?route=sale/manageorder/getdetail&token=<?php echo $token; ?>&orderid=' + orderid,
		beforeSend: function() {
			//obj.after('&nbsp;<img src="view/image/loading.gif" class="loading" style="padding-left: 5px;" />');			
		},
		complete: function() {
			$('.loading').remove();
		},									
		success: function(json) {						
			//console.log(json);
			//console.log(json.orderinfo);
			$('#md-orderid').html(json.orderinfo.order_id);
			$('#md-customer').html(json.orderinfo.customer);
			$('#md-productname').html(json.orderproducts[0].name);
			$('#md-dateadded').html(json.orderinfo.date_added);

			$.ajax({
			type: 'GET',
			url: 'index.php?route=sale/order/historyform&token=<?php echo $token; ?>&orderid=' + orderid,										
			success: function(data) {			
				//console.log(data);			
				$("#form-history-order").html(data);
			}});
		}
	});
	}

	
$('#button-history').live('click', function() {
	var order_id = $("#edit_order_id").val();
    if(typeof verifyStatusChange == 'function'){
        if(verifyStatusChange() == false){
            return false;
        }else{
            addOrderInfo(order_id);
        }
    }else{
        addOrderInfo(order_id);
    }

	$.ajax({
		url: 'index.php?route=sale/order/history&token=<?php echo $token; ?>&order_id=' + order_id,
		type: 'post',
		dataType: 'html',
		data: 'order_status_id=' + encodeURIComponent($('select[name=\'order_status_id\']').val()) + '&notify=' + encodeURIComponent($('input[name=\'notify\']').attr('checked') ? 1 : 0) + '&append=' + encodeURIComponent($('input[name=\'append\']').attr('checked') ? 1 : 0) + '&comment=' + encodeURIComponent($('textarea[name=\'comment\']').val()),
		beforeSend: function() {
			$('.success, .warning').remove();
			$('#button-history').attr('disabled', true);
			$('#history').prepend('<div class="attention"><img src="view/image/loading.gif" alt="" /> <?php echo $text_wait; ?></div>');
		},
		complete: function() {
			$('#button-history').attr('disabled', false);
			$('.attention').remove();
		},
		success: function(html) {
			modal.style.display = "none";
			$('#history').html(html);
			
			$('textarea[name=\'comment\']').val('');
			
			$("#form-history-order").html('');

			$('#md-orderid').html('');
			$('#md-customer').html('');
			$('#md-productname').html('');
			$('#md-dateadded').html('');
			location.reload(); 
		}
	});
});

function addOrderInfo(order_id){
        var status_id = $('select[name="order_status_id"]').val();
        var old_status_id = $('#old_order_status_id').val();

        $('#old_order_status_id').val(status_id);

        $.ajax({
            url: 'index.php?route=extension/openbay/ajaxAddOrderInfo&token=<?php echo $token; ?>&order_id=' + order_id +'&status_id='+status_id+'&old_status_id='+old_status_id,
            type: 'post',
            dataType: 'html',
            data: $(".openbayData").serialize(),
            beforeSend: function(){},
            success: function() {},
            failure: function(){},
            error: function(){}
        });
    }


// When the user clicks on <span> (x), close the modal
//span.onclick = function() {
//  modal.style.display = "none";
//}
btnclose.onclick = function() {
  modal.style.display = "none";
}
</script>  
<script type="text/javascript"><!--
$(document).ready(function() {
	$('.date').datepicker({dateFormat: 'yy-mm-dd'});
});
//--></script> 
<script type="text/javascript"><!--
$('#form input').keydown(function(e) {
	if (e.keyCode == 13) {
		filter();
	}
});
//--></script> 
<?php echo $footer; ?>