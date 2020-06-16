
			<!--BOF Product Color Option-->
			<style>
			.product-color-options span
			{
				display:inline-block;
				width:<?php echo $pco_list_color_selector_width; ?>px;
				height:<?php echo $pco_list_color_selector_height; ?>px;
				margin-right:0px;
				border:2px solid #E7E7E7;
			}

			.image .product-color-options
			{
				display: none;
			}
			
			a.color-option {
				display:inline-block;
				width:<?php echo $pco_product_color_selector_width; ?>px;
				height:<?php echo $pco_product_color_selector_height; ?>px;
				margin: 3px;
				padding: 0;
				border:2px solid #E7E7E7;
				vertical-align: middle;
				cursor: pointer;
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
			.product-color-options span.pco-style-oval
			{
				border-radius: 9999px;
			}

			/*Double rectangle style*/
			a.color-option.pco-style-double-rectangle,
			.product-color-options span.pco-style-double-rectangle
			{
				border: 4px double #E7E7E7;
			}	

			/*Double oval style*/
			a.color-option.pco-style-double-oval,
			.product-color-options span.pco-style-double-oval
			{
				border-radius: 9999px;
				border: 4px double #E7E7E7;
			}		
			</style>
			<script type="text/javascript"><!--
			$("a.color-option").click(function(event)
			{
				$this = $(this);
				
				// highlight current color box
				$this.parent().find('a.color-option').removeClass('color-active');
				$this.addClass('color-active');
				
				$('#' + $this.attr('option-text-id')).html($this.attr('title'));
				
				// trigger selection event on hidden select
				$select = $this.parent().find('select');
				
				$select.val($this.attr('option-value'));
				$select.trigger('change');
				
				//option redux
				if(typeof updatePx == 'function') {
					updatePx();
				}
				
				//option boost
				if(typeof obUpdate == 'function') {
					obUpdate($($this.parent().find('select option:selected')), useSwatch);
				}
				event.preventDefault();
			});
			
			$("a.color-option").parent('.option').find('.hidden select').change(function()
			{
				$this = $(this);
				var optionValueId = $this.val();
				$colorOption = $('a#color-option-' + optionValueId);
				if(!$colorOption.hasClass('color-active'))
					$colorOption.trigger('click');
			});
			//--></script> 
			<!--EOF Product Color Option--><div class="clear"></div>
</div>
</div>
</div>
<div class="clear"></div>
</section>
<footer>
	<div class="container">
		<div class="row">
			<?php if ($informations) { ?>
			<div class="span3">
				<h3><?php echo $text_information; ?></h3>
				<ul>
				<?php foreach ($informations as $information) { ?>
				<li><a href="<?php echo $information['href']; ?>"><?php echo $information['title']; ?></a></li>
				<?php } ?>
				</ul>
			</div>
			<?php } ?>
			<div class="span3">
				<h3><?php echo $text_service; ?></h3>
				<ul>
				<li><a href="/index.php?route=account/track_order">Order Status</a></li>
				<li><a href="<?php echo $contact; ?>"><?php echo $text_contact; ?></a></li>
				<li><a href="<?php echo $return; ?>"><?php echo $text_return; ?></a></li>
				<!--<li><a href="<?php echo $sitemap; ?>"><?php echo $text_sitemap; ?></a></li>-->
				</ul>
			</div>
			<div class="span3">
				<h3><?php echo $text_extra; ?></h3>
				<ul>
				<li><a href="<?php echo $manufacturer; ?>"><?php echo $text_manufacturer; ?></a></li>
				<li><a href="<?php echo $voucher; ?>"><?php echo $text_voucher; ?></a></li>
				<li><a href="<?php echo $affiliate; ?>"><?php echo $text_affiliate; ?></a></li>
				<!--<li><a href="<?php echo $special; ?>"><?php echo $text_special; ?></a></li>-->
				</ul>
			</div>
			<div class="span3">
				<h3><?php echo $text_account; ?></h3>
				<ul>
				<li><a href="<?php echo $account; ?>"><?php echo $text_account; ?></a></li>
				<li><a href="<?php echo $order; ?>"><?php echo $text_order; ?></a></li>
				<li><a href="<?php echo $wishlist; ?>"><?php echo $text_wishlist; ?></a></li>
				<li><a href="<?php echo $newsletter; ?>"><?php echo $text_newsletter; ?></a></li>
				</ul>
			</div>
		</div>
		
	</div>
	<div class="container">
		<div class="footer-socials-section">
			<ul class="footer-socials">
				<li>
					<a href="#" rel="nofollow" target="_blank">
						<i class="penci-faicon icon-facebook"></i>
						<span>Facebook</span>
					</a>
				</li>
				<li>
					<a href="#" rel="nofollow" target="_blank">
						<i class="penci-faicon icon-instagram"></i>
						<span>Instagram</span>
					</a>
				</li>
				<li>
					<a href="#" rel="nofollow" target="_blank">
						<i class="penci-faicon icon-pinterest"></i>
						<span>Pinterest</span>
					</a>
				</li>
				<li>
					<a href="#" rel="nofollow" target="_blank">
						<i class="penci-faicon icon-youtube-play"></i>
						<span>Youtube</span>
					</a>
				</li>
				<li>
					<a href="#">
						<i class="penci-faicon icon-envelope"></i>
						<span>Email</span>
					</a>
				</li>
			</ul>
		</div>
		<div class="footer-logo-copyright footer-not-logo">
			<div id="footer-copyright">
				<p><?php echo  $powered; ?></p>
			</div>
			<!--<div class="go-to-top-parent">
				<a href="#" class="go-to-top">
					<span>
						<i class="penci-faicon icon-angle-up"></i>
						<br>Back To Top
						</span>
					</a>
				</div>
			</div>-->
		</div>
	</div>
	<!--<div class="container">
		<div class="row">
			<div class="span12">
				<div id="powered"><?php echo $powered; ?></div>
			</div>
		</div>
	</div>-->
</footer>
<script type="text/javascript" 	src="catalog/view/theme/<?php echo $this->config->get('config_template');?>/js/livesearch.js"></script>
</div>
</div>
</div>
</body></html>