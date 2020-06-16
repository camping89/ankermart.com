<?php echo $header; ?>
<div class="<?php if ($column_right) { ?>span9<?php } else {?>span12<?php } ?>">
	<div class="row">
		<div class="span9" id="column-left"><?php echo $content_top; ?>
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
						<label class="control-label" for="fullname"><?php echo $entry_fullname; ?><span class="required-field">*</span></label>
						<div class="controls">
							<input class="span5" type="text" name="fullname" value="<?php echo $fullname; ?>" />
							<?php if ($entry_fullname) { ?>
							<span class="error help-inline"><?php echo $error_fullname; ?></span>
							<?php } ?>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="email"><?php echo $entry_email; ?><span class="required-field">*</span></label>
						<div class="controls">
							<input class="span5" type="text" name="email" value="<?php echo $email; ?>" />
							<?php if ($error_email) { ?>
							<span class="error help-inline"><?php echo $error_email; ?></span>
							<?php } ?>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="ordernumber"><?php echo $entry_ordernumber; ?></label>
						<div class="controls">
							<input class="span5" type="text" name="ordernumber" value="<?php echo $ordernumber; ?>" />
							<?php if ($error_ordernumber) { ?>
							<span class="error help-inline"><?php echo $error_ordernumber; ?></span>
							<?php } ?>
						</div>
					</div>
					
					<div class="control-group">
						<label class="control-label" for="topic"><?php echo $entry_topic; ?></label>
						<div class="controls">
							<select class="span5" type="text" name="topic">
								<?php echo $topic; ?>
							</select>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="enquiry"><?php echo $entry_enquiry; ?><span class="required-field">*</span></label>
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
		</div>
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
			<!--	<div class="box account">
			<div class="box-content contact-map">    
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d50895.92717822532!2d-121.67505767292467!3d37.12902330612489!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x808e1e1fb1d09e6d%3A0x6812e93e20895cd5!2sMorgan+Hill%2C+CA!5e0!3m2!1sen!2sus!4v1566508900287!5m2!1sen!2sus" width="100%" height="100%" frameborder="0" style="border:0" allowfullscreen></iframe>

			</div>
			</div>-->
  		</aside>
		<!--End right column-->
	</div>
</div>
<script>
	$(document).ready(function(){
		$("#column-right .icon-plus-sign").trigger('click');
	});
</script>
<?php echo $footer; ?>