<?php echo $header; ?>	
<?php if(substr(VERSION,0,3)=='1.4'){?>
<?php if ($error_warning) { ?>
<div class="warning"><?php echo $error_warning; ?></div>
<?php } ?>
<div class="box">
  <div class="left"></div>
  <div class="right"></div>
  <div class="heading">
    <h1 style="background-image: url('view/image/module.png');"><?php echo $heading_title; ?></h1>
	<div class="buttons"><a onclick="$('#form').submit();" class="button"><span><?php echo $button_save; ?></span></a><a onclick="location = '<?php echo $cancel; ?>';" class="button"><span><?php echo $button_cancel; ?></span></a></div>
  </div>
<?php } ?>

<?php if(substr(VERSION,0,3)=='1.5'){?>
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
<?php } ?>  
    <div class="content">
      <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="form">
        <input type="hidden" name="ordertrackingsystem_status" value="1" />
		<table class="form">
          <tr>
            <td><?php echo $entry_order_status; ?></td>
            <td><select name="ordertrackingsystem_status_id">
                <?php foreach ($order_statuses as $order_statuses) { ?>
                <?php if ($order_statuses['order_status_id'] == $ordertrackingsystem_status_id) { ?>
                <option value="<?php echo $order_statuses['order_status_id']; ?>" selected="selected"><?php echo $order_statuses['name']; ?></option>
                <?php } else { ?>
                <option value="<?php echo $order_statuses['order_status_id']; ?>"><?php echo $order_statuses['name']; ?></option>
                <?php } ?>
                <?php } ?>
              </select></td>
          </tr>
          <tr>
            <td><?php echo $entry_notify; ?></td>
            <td>
				<?php if ($ordertrackingsystem_notify) { ?>
				<input type="checkbox" name="ordertrackingsystem_notify" value="1" checked="checked" />
				<?php } else { ?>
				<input type="checkbox" name="ordertrackingsystem_notify" value="1" />
				<?php } ?>
			</td>
          </tr>
          <tr>
            <td><?php echo $entry_comment; ?></td>
            <td><textarea name="ordertrackingsystem_comment" cols="40" rows="8" style="width: 30%"><?php echo $ordertrackingsystem_comment; ?></textarea></td>
          </tr>
        </table>
        <table id="module" class="list">
          <thead>
            <tr>
              <td class="left" width="30%"><?php echo $entry_method; ?></td>
              <td class="left" width="50%"><?php echo $entry_link; ?></td>
              <td></td>
            </tr>
          </thead>
          <?php $module_row = 0; ?>
          <?php foreach ($modules as $module) { ?>
          <tbody id="module-row<?php echo $module_row; ?>">
            <tr>
              <td class="left"><input type="text" name="ordertrackingsystem_setting[<?php echo $module_row; ?>][code]" value="<?php echo $module['code']; ?>" size="40" />
			  	<?php if (isset($error_code[$module_row])) { ?>
                <span class="error"><?php echo $error_code[$module_row]; ?></span>
                <?php } ?></td>
              <td class="left"><input type="text" name="ordertrackingsystem_setting[<?php echo $module_row; ?>][link]" value="<?php echo $module['link']; ?>" size="80" /></td>
              <td class="left"><a onclick="$('#module-row<?php echo $module_row; ?>').remove();" class="button"><span><?php echo $button_remove; ?></span></a></td>
            </tr>
          </tbody>
          <?php $module_row++; ?>
          <?php } ?>
          <tfoot>
            <tr>
              <td colspan="2"></td>
              <td class="left"><a onclick="addModule();" class="button"><span><?php echo $button_add_method; ?></span></a></td>
            </tr>
          </tfoot>
        </table>
      </form>
    </div>
  <?php if(substr(VERSION,0,3)=='1.5'){?></div><?php } ?>
</div>
<script type="text/javascript"><!--
var module_row = <?php echo $module_row; ?>;

function addModule() {	
	html  = '<tbody id="module-row' + module_row + '">';
	html += '  <tr>';
	html += '    <td class="left"><input type="text" name="ordertrackingsystem_setting[' + module_row + '][code]" size="40" /></td>';
	html += '    <td class="left"><input type="text" name="ordertrackingsystem_setting[' + module_row + '][link]" size="80" /></td>';
	html += '    <td class="left"><a onclick="$(\'#module-row' + module_row + '\').remove();" class="button"><span><?php echo $button_remove; ?></span></a></td>';
	html += '  </tr>';
	html += '</tbody>';
	
	$('#module tfoot').before(html);
	
	module_row++;
}
//--></script> 
<?php echo $footer; ?>