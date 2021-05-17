<?php if(is_category()) {
    $new_cat_url = explode("/", $uri);
} ?>



<nav class="navbar navbar-expand-lg navbar-dark ">
    <a href="<?php echo home_url(); ?>" class="nav-brand">          
        <a class="navbar-brand" href="<?php echo home_url(); ?>">
        <img src="<?php echo abn_option('abn_logo'); ?>" alt="logo" class="site-logo"></a>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">

            <?php

            $expected_cats = array( "business", "lifestyle", "society", "technology", "world-news", "social-media");
            
            $args1 = array(
                'orderby' => 'name',
                'order' => 'ASC',
                'parent' => 0
            );
            $parent_categories = get_categories($args1);
            
            $no_child_cat_arr = array();
                $cCount = 1;

                foreach($parent_categories as $pcat) : setup_postdata($pcat);                    

                    if (in_array($pcat->slug, $expected_cats)) {
                    
                    
                    	    $first_args = array(
                                'orderby' => 'name',
                                'order' => 'ASC',
                                'parent' => $pcat->term_id
                            );
                            $child_categories = get_categories($first_args);
                            
                            if(count($child_categories)>0 && !empty($child_categories) && is_array($child_categories)) { ?>

                                <a class="nav-link menu-text <?php if(!empty($new_cat_url) && in_array($pcat->slug, $new_cat_url)) { echo 'open'; } ?>" 
                                href="<?php echo get_category_link( $pcat->term_id ); ?>">
                                    <?php echo $pcat->name; ?>
                                </a>

                                <li class="nav-item ">
                        
                                    <a class="nav-link dropdown-toggle" href="#" role="button"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">                                    
                                    </a>
                                        
            
                                    <div class="dropdown-menu">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <!-- <h5>Best deals of the day</h5> -->
                                                    <ul class="list-links">
                                                        <?php $c =1;
                                                        foreach($child_categories as $ccat) : setup_postdata($ccat); ?>
                                                            <li class="<?php if($c==1) { echo 'active-data'; } ?>">
                                                                <a data-name="<?php echo $ccat->slug; ?>" href="#<?php echo $ccat->slug; ?>-post">
                                                                    <?php echo $ccat->name; ?>
                                                                </a>
                                                            </li>
                                                        <?php $c++;
                                                        endforeach;
                                                        wp_reset_postdata(); ?>
                                                    </ul>
                                                </div>
        
                                                <?php $pco=1;
                                                foreach($child_categories as $ccat) : setup_postdata($ccat); ?>
        
                                                    <div class="col-md-9 <?php echo $ccat->slug; if($pco>1) { echo ' show-dat'; } else { echo ' defaultShow';} ?>" 
                                                    id="<?php echo $ccat->slug; ?>-post" 
                                                    <?php if($pco>1) { ?> style="display:none;" <?php } ?>>
        
                                                        <div class="row card-group">
                                                            
                                                            <?php $myposts = get_posts(array(
                                                                'post_type' => 'post',
                                                                'numberposts' => 3,
                                                                'tax_query' => array(
                                                                    array(
                                                                    'taxonomy' => 'category',
                                                                    'field' => 'id',
                                                                    'terms' => $ccat->term_id // Where term_id of Term 1 is "1".
                                                                    )
                                                                )
                                                            ));
                                                            foreach($myposts as $post) : setup_postdata($post); ?>
        
                                                            <div class="col-sm-4">
                                                                <div class="c-card">
                                                                    <div class="img-fill">
                                                                        <a href="#" class="thumbnail">
                                                                            <?php echo get_the_post_thumbnail( $post->ID, 'thumbnail-home', '' );?>
                                                                        </a>
                                                                    </div>                                                        
                                                                    <div class="content">	
                                                                        <h6 class="title">
                                                                            <?php $title_count = strlen($post->post_title);
                                                                            $ltr_to_show = 55; ?>
                                                                            <a href="<?php echo get_the_permalink($post->ID); ?>"><?php echo substr($post->post_title,0,$ltr_to_show); if($title_count>$ltr_to_show) { echo '...'; } ?></a>
                                                                        </h6>
                                                                    </div>
                                                                </div>
                                                            </div>
        
                                                            <?php endforeach;
                                                            wp_reset_postdata(); ?>
                                                        </div>
        
                                                        <div class="view-all"><a href="<?php echo get_category_link( $ccat->term_id ); ?>">View All</a></div>
                                                    
                                                    </div>
        
                                                    <?php $pco++;
                                                    endforeach;
                                                    wp_reset_postdata(); ?>
        
                                            </div>
                                        </div>
                                    </div>
        
                                </li>

                            <?php } else {

                                array_push($no_child_cat_arr, $pcat->term_id);
                            
                            } ?>                        

                        <?php
                    }

                $cCount++;
                endforeach;
                wp_reset_postdata();
                
                $current_cat = '';
                
                foreach($no_child_cat_arr as $single_cat) { 
                $current_cat = get_category($single_cat); ?>

                    <a class="nav-link menu-text <?php if(!empty($new_cat_url) && in_array($current_cat->slug, $new_cat_url)) { echo 'open'; } ?>" 
                    href="<?php echo get_category_link( $single_cat ); ?>">
                            <?php echo $current_cat->name; ?>
                    </a>
                    <li class="nav-item ">
                        <a class="nav-link dropdown-toggle" style="visibility: hidden;" href="#" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">                                    
                        </a>
                    </li>
                    
                <?php } ?>

        </ul>


        <span class="search">
          <span class="sr-only">Search the site</span>
          <a id="open-search">
			  <span class="sr-only">Open Search Panel</span><i class="fa fa-search"></i>
		  </a>

          <?php get_search_form(); ?>
          
        </span>


    </div>

</nav>

