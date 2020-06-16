<table class="form">
          <input type="hidden" name="edit_order_id" value="<?php echo $order_id; ?>" id="edit_order_id" />
          <tr>
            <td class="text-right"><?php echo $entry_order_status; ?></td>
            <td class="text-left">
              <input type="hidden" name="old_order_status_id" value="<?php echo $order_status_id; ?>" id="old_order_status_id" />
              <select name="order_status_id">
                <?php foreach ($order_statuses as $order_statuses) { ?>
                <?php if ($order_statuses['order_status_id'] == $order_status_id) { ?>
                <option value="<?php echo $order_statuses['order_status_id']; ?>" selected="selected"><?php echo $order_statuses['name']; ?></option>
                <?php } else { ?>
                <option value="<?php echo $order_statuses['order_status_id']; ?>"><?php echo $order_statuses['name']; ?></option>
                <?php } ?>
                <?php } ?>
              </select>
            </td>
          </tr>
          <tr>
            <td class="text-right"><?php echo $entry_notify; ?></td>
            <td class="text-left"><input type="checkbox" name="notify" value="1" /></td>
          </tr>
          <tr>
            <td class="text-right"><?php echo $entry_comment; ?></td>
            <td class="text-left"><textarea name="comment" cols="40" rows="8" style="width: 99%"></textarea>
              <!--<div style="margin-top: 10px; text-align: right;"><a id="button-history" class="button"><?php echo $button_add_history; ?></a></div>-->
              </td>
          </tr>
        </table>