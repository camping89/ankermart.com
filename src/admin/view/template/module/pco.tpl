<?php echo $header; ?>
<style>
a.color-option {
	display:inline-block;
	width:<?php echo $pco_product_color_selector_width; ?>px;
	height:<?php echo $pco_product_color_selector_height; ?>px;
	margin:3px;
	padding: 0;
	border:2px solid #E7E7E7;
	vertical-align: middle;
	box-sizing: content-box;
}

a.color-option.color-active, a.color-option:hover {
	margin: 0;
	padding: 3px;
}

.hidden {
	display: none !important;
}

/*Oval style*/
a.color-option.pco-style-oval,
.product-color-options.pco-style-oval span
{
	border-radius: 9999px;
}

/*Double rectangle style*/
a.color-option.pco-style-double-rectangle,
.product-color-options.pco-style-double-rectangle span
{
	border: 4px double #E7E7E7;
}	

/*Double oval style*/
a.color-option.pco-style-double-oval,
.product-color-options.pco-style-double-oval span
{
	border-radius: 9999px;
	border: 4px double #E7E7E7;
}			
</style>
<script>
	$(document).ready(function(){
		$('.pco_color_selector_style input').change(function(){
			$this = $(this);
			
			if($this.is(':checked'))
			{
				$('.preview-color-option a').removeClass().addClass("color-option " + $this.val());
			}
		});
		
		$('input[name="pco_product_color_selector_width"]').change(function(){
			$('.preview-color-option a').css('width', $(this).val() + 'px');
		});
		
		$('input[name="pco_product_color_selector_height"]').change(function(){
			$('.preview-color-option a').css('height', $(this).val() + 'px');
		});
	});
</script>
<div id="content">
<div class="breadcrumb">
  <?php foreach ($breadcrumbs as $breadcrumb) { ?>
  <?php echo $breadcrumb['separator']; ?><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a>
  <?php } ?>
</div>
<?php if ($error_warning) { ?>
<div class="warning"><?php echo $error_warning; ?></div>
<?php } ?>
<div class="box">
  <div class="heading">
    <h1><img src="view/image/module.png" alt="" /> <?php echo $heading_title; ?></h1>
    <div class="buttons"><a onclick="$('#form').submit();" class="button"><span><?php echo $button_save; ?></span></a><a onclick="location = '<?php echo $cancel; ?>';" class="button"><span><?php echo $button_cancel; ?></span></a></div>
  </div>
  <div class="content">
    <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="form">
        <h2><?php echo $entry_category; ?></h2>
		<table class="form">
			<tbody>
			  <tr>
				<td><?php echo $entry_show_on_category; ?></td>
				<td>					
					<input type="radio" name="pco_show_on_category" value="1" <?php echo $pco_show_on_category ? 'checked="checked"' : ''; ?> ><?php echo $text_yes;?>
					<input type="radio" name="pco_show_on_category" value="0" <?php echo !$pco_show_on_category ? 'checked="checked"' : ''; ?> ><?php echo $text_no;?>
				</td>
			  </tr>
			  <tr>
				<td><?php echo $entry_list_color_selector_size; ?></td>
				<td>					
					<input type="text" name="pco_list_color_selector_width" value="<?php echo $pco_list_color_selector_width; ?>" size="3" />
						&nbsp;x&nbsp;
					<input type="text" name="pco_list_color_selector_height" value="<?php echo $pco_list_color_selector_height; ?>" size="3" />
				</td>
			  </tr>
			</tbody>
		</table>
		<h2><?php echo $entry_product; ?></h2>
		<table class="form">
			<tbody>
			  <tr>
				<td><?php echo $entry_product_color_selector_size; ?></td>
				<td>					
					<input type="text" name="pco_product_color_selector_width" value="<?php echo $pco_product_color_selector_width; ?>" size="3" />
						&nbsp;x&nbsp;
					<input type="text" name="pco_product_color_selector_height" value="<?php echo $pco_product_color_selector_height; ?>" size="3" />
				</td>
			  </tr>
			</tbody>
		</table>
		<h2><?php echo $entry_style; ?></h2>
		<table class="form">
			<tbody>
			  <tr>
				<td><?php echo $entry_color_selector_style; ?></td>
				<td class="pco_color_selector_style">	
					<input type="radio" name="pco_color_selector_style" value="" <?php echo $pco_color_selector_style == '' ? 'checked="checked"' : ''; ?> ><?php echo $text_style_basic_rectangle;?><br/>
					<input type="radio" name="pco_color_selector_style" value="pco-style-oval" <?php echo $pco_color_selector_style == 'pco-style-oval' ? 'checked="checked"' : ''; ?> ><?php echo $text_style_oval;?><br/>
					<input type="radio" name="pco_color_selector_style" value="pco-style-double-rectangle" <?php echo $pco_color_selector_style == 'pco-style-double-rectangle' ? 'checked="checked"' : ''; ?> ><?php echo $text_style_double_rectangle;?><br/>
					<input type="radio" name="pco_color_selector_style" value="pco-style-double-oval" <?php echo $pco_color_selector_style == 'pco-style-double-oval' ? 'checked="checked"' : ''; ?> ><?php echo $text_style_double_oval;?><br/>
				</td>
			  </tr>
			  <tr>
				<td><?php echo $entry_preview; ?></td>
				<td class="preview-color-option">			  			  
					<a class="color-option" style="background-color: #000000" title="Black "></a>
					<a class="color-option" style="background-color: #f23581" title="Hot Pink "></a>
					<a class="color-option" style="background-color: #46c5db" title="Tender Blue "></a>
					<a class="color-option" style="background-color: #ff7f50" title="Coral (+$8.00)"></a>
				</td>
			  </tr>
			</tbody>
		</table>
    </form>
	<p>
		Thank you for your purchase, please check <a href="http://www.opencart.com/index.php?route=extension/extension&filter_username=WeDoWeb" title="WeDoWeb's OpenCart extensions">our website</a> for more useful extensions.<br/>
		<br/>
		<b><a href="http://wedoweb.com.au" title="WeDoWeb Team">WeDoWeb Team</a></b>
	</p>
  </div>
</div>
<?php echo $footer; ?>