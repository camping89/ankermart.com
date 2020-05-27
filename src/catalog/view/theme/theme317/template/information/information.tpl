<?php echo $header; ?>
<div class="<?php if ($column_right) { ?>span9<?php } else {?>span12<?php } ?>">
	<div class="row">
<div class="<?php if ($column_left or $column_right) { ?>span9<?php } ?> <?php if ($column_left and $column_right) { ?>span6<?php } ?> <?php if (!$column_right and !$column_left) { ?>span12 <?php } ?>" id="content"><?php echo $content_top; ?>
  <div class="breadcrumb">
    <?php foreach ($breadcrumbs as $breadcrumb) { ?>
    <?php echo ucwords(strtolower($breadcrumb['separator'])); ?><a href="<?php echo $breadcrumb['href']; ?>"><?php echo ucwords(strtolower($breadcrumb['text'])); ?></a>
    <?php } ?>
  </div>
  <!--<h1 class="style-1"><?php echo $heading_title; ?></h1>-->
  <div class="box-container">
    <!--<?php echo $description; ?>-->
    <?php if(strpos($heading_title, 'Frequently Asked Questions') !== false || strpos($heading_title, 'FAQ') !== false) { ?>
      <div class="container">
            <div class="content-collapse content-page-info">
              <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

                <?php
                    $index = 1;
                    $dom = new DOMDocument();
                    $dom->loadHTML($description);
                    foreach($dom->getElementsByTagName('p') as $el){
                        $result_elements[] = ["type" => $el->tagName, "value" => $el->nodeValue];
                    }
                    foreach ($result_elements as $elementhtml) {
                        $element_items = explode("\r\n",$elementhtml["value"]);
                        if(isset($element_items) ){ ?>

                          <div class="panel panel-default">
                            <div class="panel-heading" id="heading<?php echo $index;?>" role="tab">
                              <h4 class="panel-title">
                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $index;?>" aria-expanded="true" aria-controls="collapse<?php echo $index;?>">
                                  <?php echo $element_items[0]; ?>
                                  <i class="pull-right icon-plus"></i>
                                </a>
                              </h4>
                            </div>
                            <div class="panel-collapse collapse" id="collapse<?php echo $index;?>" role="tabpanel" aria-labelledby="heading<?php echo $index;?>">
                              <div class="panel-body">
                              
                                <?php  if(sizeof($element_items) > 1) { echo '<p>' . $element_items[1] . '</p>'; } ?>
                              </div>
                            </div>
                          </div>
                        <?php }
                        $index++;
                    }
                    //$json = json_encode($result_elements, JSON_UNESCAPED_UNICODE);
                    //echo $json;
                ?>
              </div>
            </div>
        </div>
   <?php } else{ ?>
          <?php echo $description; ?>
  <?php } ?>
    <br/>
    <!--<?php echo json_encode($description_array, JSON_PRETTY_PRINT); ?>-->
    <div class="buttons">
      <div class="right"><a href="<?php echo $continue; ?>" class="button-cont-right"><?php echo $button_continue; ?><i class="icon-circle-arrow-right"></i></a></div>
    </div>
  </div>
  <?php echo $content_bottom; ?></div>
    <?php echo $column_left; ?>
	</div>
</div>
<?php echo $column_right; ?>

<?php echo $footer; ?>