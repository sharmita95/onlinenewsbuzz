<div class="col-md-3">
	<aside class="sticy">

		<?php echo do_shortcode('[email-subscribers-form id="1"]'); ?>

		<div class="socil-link">
			<h2 class="widget-title">Social Links</h2>
			
			<?php $fb = abn_option('abn_fb_link');
			$tt = abn_option('abn_tweet_link');
			$ig = abn_option('abn_ig_link');
			$pl = abn_option('abn_pinterest_link');
			$li = abn_option('abn_li_link'); ?>

			<ul class="social-sidebar">
				<?php if(!empty($fb)) { ?>
					<li><a href="<?php echo $fb; ?>"> <i class="fab fa-facebook-f"></i>Facebook </a></li>
				<?php } if(!empty($tt)) { ?>
					<li><a href="<?php echo $tt; ?>"><i class="fab fa-twitter"></i>Twitter</a></li>
				<?php } if(!empty($ig)) { ?>
					<li><a href="<?php echo $ig; ?>"> <i class="fab fa-instagram"></i> Linkedin</a></li>
				<?php } if(!empty($pl)) { ?>
					<li><a href="<?php echo $pl; ?>"> <i class="fab fa-pinterest"></i> Pinterest</a></li>
				<?php } if(!empty($li)) { ?>
					<li><a href="<?php echo $li; ?>"> <i class="fab fa-linkedin"></i> Linkedin</a></li>
				<?php } ?>
			</ul>
			
		</div>

		<?php echo do_shortcode('[my_recent_posts]'); ?>
		<?php echo do_shortcode('[my_popular_posts]'); ?>
		
	</aside>
</div>