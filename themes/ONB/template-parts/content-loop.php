<?php $categories = get_the_category($post->ID);
$author_id = $post->post_author;
$stnlength = strlen($post->post_title);
?>

<div class="c-card">
	<div class="img-fill">
	<?php echo get_the_post_thumbnail($post->ID, 'thumbnail-home'); ?>
	</div>
	<div class="content">
	<span class="category">
		<a href="<?php echo get_category_link($categories[0]->term_id); ?>"><?php echo $categories[0]->name; ?></a>
	</span>
	<h6 class="title">
		<a href="<?php the_permalink($post->ID); ?>"><?php echo substr($post->post_title,0,60); if($stnlength>60) { echo '...'; } ?></a>
	</h6>
	<p class="author"><?php loop_author($author_id); ?></p>
	</div>
</div>