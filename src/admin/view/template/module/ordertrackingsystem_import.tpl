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
    </div>
<?php } ?>  
    <div class="content">
      <form action="<?php echo $bulk_action; ?>" method="post" enctype="multipart/form-data" id="form">
        <table class="form">
          <tr>
            <td colspan="2"><?php echo $text_note; ?></td>
          </tr>
		  <tr>
            <td width="5%"><?php echo $entry_file; ?></td>
            <td><input type="file" name="upload" /></td>
          </tr>
           <tr>
            <td width="5%">&nbsp;</td>
            <td><a onclick="$('#form').submit();" class="button"><span><?php echo $bulk_upload; ?></span></a></td>
          </tr>
        </table>
      </form>
    </div>
  <?php if(substr(VERSION,0,3)=='1.5'){?></div><?php } ?>
</div>
<?php echo $footer; ?>