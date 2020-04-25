<?php if (count($languages) > 1) { ?>

  <div id="language" class="header-button">
		<div class="heading"><?php echo $text_language1; ?><i class="icon-angle-down"></i></div>
		<div class="heading1"><i class="icon-globe"></i><?php echo $text_language; ?><i class="icon-angle-down"></i></div>
		<ul>
            <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
			<?php foreach ($languages as $language) { ?>
            <li><span alt="<?php echo $language['name']; ?>" title="<?php echo $language['name']; ?>" onClick="$('input[name=\'language_code\']').attr('value', '<?php echo $language['code']; ?>').submit(); $(this).parent().parent().submit();" ><?php echo $language['code']; ?></span>
			<?php } ?>
            <input type="hidden" name="language_code" value="" />
            <input type="hidden" name="redirect" value="<?php echo $redirect; ?>" />
              </li>
            
            </form>
		</ul>
	</div>

<?php } ?>
