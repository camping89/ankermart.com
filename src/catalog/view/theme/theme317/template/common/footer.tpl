<div class="clear"></div>
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
				<p><?php echo $powered; ?></p>
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