<?php $categories = get_the_category($post->ID); ?>

<div class="bnr-single-div">
    <div class="img-fill">
		<a href="<?php the_permalink($post->ID); ?>">
			<img style="height: 240px; width: 100%;" src="<?php echo get_the_post_thumbnail_url($post->ID, 'banner-small-thumbnail'); ?>">
		</a>        
    </div>
    <div class="content"> 
        <span class="category">
    		<a href="<?php echo get_category_link($categories[0]->term_id); ?>"><?php echo $categories[0]->name; ?></a>
    	</span>
        <h6 class="title">
          <a href="<?php the_permalink($post->ID); ?>">
            <?php echo $post->post_title;
            //echo substr($post->post_title,0,60); if(strlen($post->post_title)>60) { echo '...'; } ?>
          </a>
        </h6>            
    </div>
</div>