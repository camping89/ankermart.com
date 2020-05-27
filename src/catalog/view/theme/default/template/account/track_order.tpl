<?php echo $header; ?>
<div class="row">
	<?php echo $column_left; ?>
	</div>
	<div class="span<?php $span = trim($column_left) ? 9 : 12; $span = trim($column_right) ? $span - 3 : $span; echo $span; ?>">
		<?php echo $content_top; ?>
		<div class="breadcrumb">
			<?php foreach ($breadcrumbs as $breadcrumb) { ?>
			<?php echo $breadcrumb['separator']; ?><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a>
			<?php } ?>
		</div>
		<h1>Track Your Order</h1>
		<p>To view the full details of your order as well as obtain tracking information, please enter your order number with your email address. Please enter this information exactly as it appears on your order confirmation email.</p>
		<?php if (isset($error_warning)) { ?>
		<div class="alert alert-error"><?php echo $error_warning; ?></div>
		<?php } ?>

		<form class="form-horizontal" action="<?php echo $this->url->link('account/track_order', '', 'SSL'); ?>" method="post">
			<!--<input type="hidden" name="route" value="account/track_order" />-->
			<div class="control-group <?php echo (isset($error["email"]))?'error':""; ?>">
				<label class="control-label" for="inputEmail"><?php echo $entry_email; ?></label>
				<div class="controls">
					<input type="text" id="inputEmail" name="email" value="<?php echo htmlentities($email, ENT_QUOTES, "UTF-8"); ?>">
					<?php if (isset($error["email"])) { ?>
					<span class="help-block error"><?php echo $error["email"]; ?></span>
					<?php } ?>
				</div>
			</div>
			<div class="control-group <?php echo (isset($error["order_id"]))?'error':""; ?>">
				<label class="control-label" for="inputOrderId"><?php echo $entry_order_id; ?></label>
				<div class="controls">
					<input type="text" id="inputOrderId" name="order_id" value="<?php echo htmlentities($order_id, ENT_QUOTES, "UTF-8"); ?>">
					<?php if (isset($error["order_id"])) { ?>
					<span class="help-block error"><?php echo $error["order_id"]; ?></span>
					<?php } ?>
				</div>
			</div>
			<div class="control-group">
				<div class="controls">
					<button type="submit" class="btn btn-primary"><?php echo $btn_track_order; ?></button>
				</div>
			</div>
		</form>
<p><strong>Please Note:</strong><br>
   • We will email you updates regarding the status of your order including when your item ships.<br>
   • Packages shipped via FedEx/UPS Ground may not have accessible tracking information for up to 24 hours after you receive the tracking number.<br>
   • Some items require special shipping arrangements and may not be trackable.<br>
</p>

		<?php echo $content_bottom; ?>
	</div>
	<?php echo $column_right; ?>
</div>
<?php echo $footer; ?>
