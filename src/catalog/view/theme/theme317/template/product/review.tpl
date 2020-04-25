<?php if ($reviews) { ?>
<?php foreach ($reviews as $review) { ?>
<div class="content"><img height="15" width="89" src="catalog/view/theme/theme317/image/stars-<?php echo $review['rating'] . '.png'; ?>" alt="<?php echo $review['reviews']; ?>" /> | <b><?php echo $review['author']; ?></b> | <?php echo $review['date_added']; ?>
  <br />
  <br />
  <?php echo $review['text']; ?></div>
<?php } ?>
<div class="pagination"><?php echo $pagination; ?></div>
<?php } else { ?>
<div class="content"><?php echo $text_no_reviews; ?></div>
<?php } ?>
