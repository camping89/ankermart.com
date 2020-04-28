<?php echo $header; ?>
<div class="<?php if ($column_right) { ?>span9<?php } else {?>span12<?php } ?>">
	<div class="row">
<div class="<?php if ($column_left or $column_right) { ?>span9<?php } ?> <?php if ($column_left and $column_right) { ?>span6<?php } ?> <?php if (!$column_right and !$column_left) { ?>span12 <?php } ?>" id="content"><?php echo $content_top; ?>
  <div class="breadcrumb">
	<?php foreach ($breadcrumbs as $breadcrumb) { ?>
	<?php echo $breadcrumb['separator']; ?><a href="<?php echo $breadcrumb['href']; ?>"><?php echo ucwords(strtolower($breadcrumb['text'])); ?></a>
	<?php } ?>
  </div>
  <!--<h1><?php echo $heading_title; ?></h1>-->
  <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="contact">
	<div class="content contact-f form-horizontal">
		<!--<h2><?php echo $text_contact; ?></h2>-->
		<div class="control-group">
			<label class="control-label" for="name"><?php echo $entry_name; ?></label>
			<div class="controls">
				<input class="span5" type="text" name="name" value="<?php echo $name; ?>" />
				<?php if ($error_name) { ?>
				<span class="error help-inline"><?php echo $error_name; ?></span>
				<?php } ?>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="email"><?php echo $entry_email; ?></label>
			<div class="controls">
				<input class="span5" type="text" name="email" value="<?php echo $email; ?>" />
				<?php if ($error_email) { ?>
				<span class="error help-inline"><?php echo $error_email; ?></span>
				<?php } ?>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="enquiry"><?php echo $entry_enquiry; ?></label>
			<div class="controls">
				<textarea class="span5" name="enquiry" cols="40" rows="10" ><?php echo $enquiry; ?></textarea>
				<?php if ($error_enquiry) { ?>
				<span class="error help-inline"><?php echo $error_enquiry; ?></span>
				<?php } ?>
			</div>
		</div>
		<div class="control-group">
			<!--<label class="control-label" for="captcha"><?php echo $entry_captcha; ?></label>-->
			<div class="controls">
				<!--<input type="text" class="capcha" name="captcha" value="<?php echo $captcha; ?>" />
				<div class="captcha"><img src="index.php?route=information/contact/captcha" alt="" /></div>
				<?php if ($error_captcha) { ?>
				<span class="error help-inline"><?php echo $error_captcha; ?></span>
				<?php } ?>-->
				<div class="buttons"><a onclick="$('#contact').submit();" class="button"><span><?php echo $button_continue; ?></span></a></div>
			</div>
		</div>
	</div>
</form>
	<?php echo $content_bottom; ?></div>
	<?php echo $column_left; ?>
	</div>
</div>
<?php echo $column_right; ?>
<aside class="span3" id="column-right">

<div class="box info">
  <div class="box-heading">Contact Information</div>
  <div class="box-content">
		<h2 style="display:none"><?php echo $text_location; ?></h2>
		<div class="contact-info">
			<div class="contact-box"><i class="icon-home"></i><!--<b><?php echo $text_address; ?></b>-->
						<?php echo $address; ?>
			</div>
		</div>
  </div>
</div>
    <div class="box account">
  <div class="box-heading">Maps</div>
  <div class="box-content">    
		<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d50895.92717822532!2d-121.67505767292467!3d37.12902330612489!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x808e1e1fb1d09e6d%3A0x6812e93e20895cd5!2sMorgan+Hill%2C+CA!5e0!3m2!1sen!2sus!4v1566508900287!5m2!1sen!2sus" width="100%" height="180" frameborder="0" style="border:0" allowfullscreen></iframe>

  </div>
</div>
  </aside>
<!--End right column-->

<?php echo $footer; ?>