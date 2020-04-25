<?php if ($error) { ?>
<div class="warning"><?php echo $error; ?></div>
<?php } ?>
<?php if ($success) { ?>
<div class="success"><?php echo $success; ?></div>
<?php } ?>
<table class="list">
  <thead>
    <tr>
      <td class="left"><b><?php echo $column_date_added; ?></b></td>
      <td class="left"><b><?php echo $column_comment; ?></b></td>
      <td class="left"><b><?php echo $column_status; ?></b></td>

				<?php if ($this->config->get('da_track_shipment_status')) { ?>
				<td class="left"><b><?php echo $column_tracking_number; ?></b></td>
				<td class="left"><b><?php echo $column_courier; ?></b></td>
				<?php } ?>
			
      <td class="left"><b><?php echo $column_notify; ?></b></td>
    </tr>
  </thead>
  <tbody>
    <?php if ($histories) { ?>
    <?php foreach ($histories as $history) { ?>
    <tr>
      <td class="left"><?php echo $history['date_added']; ?></td>
      <td class="left"><?php echo $history['comment']; ?></td>
      <td class="left"><?php echo $history['status']; ?></td>

				<?php if ($this->config->get('da_track_shipment_status')) { ?>
				<td class="left">
					<?php
					$username = $this->config->get('da_track_shipment_after_ship_username');
					if ($history['tracking_number']) {
						$tracking_numbers = explode(",", $history['tracking_number']);
						for ($i=0;$i<count($tracking_numbers);$i++)
						{
						echo '<div data-width="100"><a href="https://'.$username.'.aftership.com/'.$history['slug'].'/'.trim($tracking_numbers[$i]).'" target="_blank">'.trim($tracking_numbers[$i]).'</a></div>';
						}
					}
					?>

				</td>
				<td class="center">
				<?php if ($history['slug']) { ?>
				<a href="<?php echo $history['web_url']; ?>" target="_blank"><?php echo $history['name']; ?></a>
				<?php } ?>
				</td>
				<?php } ?>
			
      <td class="left"><?php echo $history['notify']; ?></td>
    </tr>
    <?php } ?>
    <?php } else { ?>
    <tr>
      <td class="center" colspan="4"><?php echo $text_no_results; ?></td>
    </tr>
    <?php } ?>
  </tbody>
</table>
<div class="pagination"><?php echo $pagination; ?></div>
