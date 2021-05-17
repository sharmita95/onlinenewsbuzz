<?php $categories = get_the_category($post->ID);
	$author_id = $post->post_author; ?>

<div class="row">
	<div class="col-md-4">
	<div class="pic-jar">
		<a href="<?php echo get_the_permalink($post->ID); ?>"><?php echo get_the_post_thumbnail($post->ID, 'archive-thumbnail'); ?></a>
	</div>
	</div>
	<div class="col-md-8">
	<div class="combin">
		<span class="category"><a href="<?php echo get_category_link($categories[0]->term_id); ?>"><?php echo $categories[0]->name; ?></a></span>
		<h6 class="title">
		<a href="<?php echo get_the_permalink($post->ID); ?>"><?php echo $post->post_title; ?></a>
		</h6>
		<p class="text">
			<?php the_excerpt(); ?>
		</p>
		<?php loop_author($author_id); ?>
	</div>
	</div>
</div>