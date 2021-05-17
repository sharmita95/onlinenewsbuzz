 <?php
/* Template Name: Home Page */
get_header();

$latest_array = get_posts(array(
  'post_type' => 'post',
  'orderby'=> 'date',
  'order'=> 'DESC',
  'posts_per_page'=> 5,
));

$latest_card_array = get_posts(array(
  'post_type' => 'post',
  'orderby'=> 'date',
  'order'=> 'DESC',
  'posts_per_page'=> 4,
  'offset' => 5,
));

$trening_array = get_posts(array(
    'post_type' => 'post',
    'orderby'=> 'comment_count',
    'posts_per_page'=> 6
));


$editors_array = get_posts(array(
  'post_type' => 'post',
  'meta_query' => array(
    array(
        'key' => 'editors_pick',
        'value' => 'on',
        'compare' => '=',
    )
  ),
  'orderby'=> 'date',
  'order'=> 'DESC',
  'posts_per_page'=> 3
));

/* $editors_slick_array = get_posts(array(
  'post_type' => 'post',
  'meta_query' => array(
    array(
        'key' => 'editors_pick',
        'value' => 'on',
        'compare' => '=',
    )
  ),
  'orderby'=> 'date',
  'order'=> 'DESC',
  'posts_per_page'=> 10,
  'offset' => 3,
  
)); */

$featured_array = get_posts(array(
  'post_type' => 'post',
  'meta_query' => array(
    array(
        'key' => 'featured',
        'value' => 'on',
        'compare' => '=',
    )
  ),
  'orderby'=> 'date',
  'posts_per_page'=> 4,
  
));
?>


    <?php /* $banner_fdata = $latest_array[0];
    $banner_sdata = $latest_array[1];
    $banner_tdata = $latest_array[2]; */ ?>
    
    <div class="container-fluid banner-section">
      <div class="row">
		<h1 style="display: none;">
			Home
		</h1>
		
		<?php $banner_count = 1;
		
		foreach($latest_array as $post): setup_postdata($post);
		
		$categories = get_the_category($post->ID);
		
		if($banner_count ==1) { ?>
		
            <div class="col-md-6 full-wdth-banner">
                
              <div class="bnr-single-div">
                <div class="img-fill">
    				<a href="<?php the_permalink($post->ID); ?>">
    					<img style="height: 480px; width: 100%;" src="<?php echo get_the_post_thumbnail_url($post->ID, 'full'); ?>"?>
    				</a>        
                </div>
                <div class="content">
                  <span class="category">
            		<a href="<?php echo get_category_link($categories[0]->term_id); ?>"><?php echo $categories[0]->name; ?></a>
            	  </span>         
                  <h6 class="title">
                    <a href="<?php the_permalink($post->ID); ?>"><?php echo substr($post->post_title,0,60); if(strlen($post->post_title)>60) { echo '...'; } ?></a>
                  </h6>            
                </div>
              </div>
              
            </div>
            
        <?php } else { ?>
        
            <?php if($banner_count == 2) { ?>
            <div class="col-md-6 banner-smaill-card-container">
                <div class="row">
                <?php } ?>
        
                <?php if($banner_count == 2 || $banner_count == 4 ) { ?>
            
                    <div class="col-md-6 banner-smaill-card">
                        
                    <?php } ?>
                        
                        <?php get_template_part( 'template-parts/content', 'small-banner-loop'); ?>
                    
                    <?php if($banner_count == 3 || $banner_count == 5 ) { ?>
                              
                    </div>
        
                <?php } ?>
            
                <?php if($banner_count == 5) { ?>
                </div>
            </div>
            <?php } ?>
            
        <?php }
        
        $banner_count++;
        endforeach;
        wp_reset_postdata(); ?>
        
        
      </div>

    </div>
    
    <!-- latest post card -->
    
    <!-- <div class="trending">
      <div class="container">
        <div class="card-group">

        <?php /* foreach($latest_array as $post): setup_postdata($post);
        
            get_template_part( 'template-parts/content', 'loop');
        
        endforeach;
        wp_reset_postdata(); */ ?>

        </div>
      </div>
    </div>

    <div class="clir-fix"></div> -->

    <!--------------- latest card ------------------->
    <div class="Containe container">
      <div class="SlickCarousel slik-spach card-slider">

      <?php foreach($latest_card_array as $post): setup_postdata($post);
        
          get_template_part( 'template-parts/content', 'small-loop');
      
      endforeach;
      wp_reset_postdata(); ?>

      </div>
    </div>

    <div class="clir-fix"></div>
    <!--------------- Trending ------------------->
    <div class="trending">
      <div class="container">
        <div class="trending-style">
          <h2 class="sec-title">Trending News</h2>
        </div>
        <div class="card-group">

        <?php foreach($trening_array as $post): setup_postdata($post);
        
            get_template_part( 'template-parts/content', 'loop');
        
        endforeach;
        wp_reset_postdata(); ?>

        </div>
      </div>
    </div>

    <div class="clir-fix"></div>
    
    <!--------------- Editor's pick ------------------->
    <div class="eidtor-pic">
      <div class="container">
        <div class="trending-style">
          <h2 class="sec-title">Editor's picks</h2>
        </div>
        <div class="row">


          <?php $e=1;
          foreach($editors_array as $post): setup_postdata($post);

          $categories = get_the_category($post->ID);
          $author_id = $post->post_author;
          $stnlength = strlen($post->post_title);
          $featured_full_img_url = get_the_post_thumbnail_url($post->ID,'full');
          $featured_second_url = get_the_post_thumbnail_url($post->ID,'thumbnail-home');
            
            if($e == 1) { ?>


            <div class="col-md-8">
              <div class="colcova" style="background: url(<?php echo $featured_full_img_url; ?>);">
                <!-- <a href="#">
                  <span class="sr-only">Read blog: Watch Every 2019 super bolw ad Released so far</span>
                </a> -->
                <div class="write-sec">
                  <span class="category">
                    <a href="<?php echo get_category_link($categories[0]->term_id); ?>">
                      <?php echo $categories[0]->name; ?>
                    </a>
                  </span>
                  <h6 class="title">
                    <a href="<?php the_permalink($post->ID); ?>"><?php echo $post->post_title; ?></a>
                  </h6>
                  <p class="author"><?php loop_author($author_id); ?></p>
                </div>
              </div>
            </div>

            <?php } 
          

            elseif($e>1) { ?>

            <?php if($e==2) { echo '<div class="col-md-4">'; } ?>
                  <div class="sub-sec">
                    <div class="under-cov" style="background: url(<?php echo $featured_second_url; ?>);">
                      <div id="one" class="sub-w-sec">
                        <span class="category">
                          <a href="<?php echo get_category_link($categories[0]->term_id); ?>">
                            <?php echo $categories[0]->name; ?>
                          </a>
                        </span>
                        <h6 class="title">
                          <a href="<?php the_permalink($post->ID); ?>">
                            <?php echo substr($post->post_title,0,60); if($stnlength>60) { echo '...'; } ?>
                          </a>
                        </h6>
                        <p class="author"><?php loop_author($author_id); ?></p>
                      </div>
                    </div>
                  </div>

            <?php if($e==3) { echo '</div>'; } ?>

          <?php }
        $e++;
        endforeach;
        wp_reset_postdata(); ?>



        </div>
      </div>
    </div>

    <!--------------- Editor's pick in slider ------------------->
    <!-- <div class="Containe container">
      <div class="SlickCarousel slik-spach card-slider">
        
        <?php /* foreach($editors_slick_array as $post): setup_postdata($post);
        
            get_template_part( 'template-parts/content', 'loop');
        
        endforeach;
        wp_reset_postdata(); */ ?>

      </div>
    </div>

    <div class="clir-fix"></div> -->
    <!--------------- latest post ------------------->
    <!--
    <div class="letest-newes">
      <div class="container">
        <div class="trending-style">
          <h2 class="sec-title">Featured News</h2>
        </div>

        <?php /* foreach($featured_array as $post): setup_postdata($post);
        
            get_template_part( 'template-parts/content', 'archive-loop');

        endforeach;
        wp_reset_postdata(); */ ?>

      </div>
    </div>
    -->
    <div class="letest-newes">
        <div class="Containe container">
            <div class="trending-style">
              <h2 class="sec-title">Featured News</h2>
            </div>
            <div class="SlickCarousel slik-spach card-slider">
    
              <?php foreach($featured_array as $post): setup_postdata($post);
                
                  get_template_part( 'template-parts/content', 'small-loop');
              
              endforeach;
              wp_reset_postdata(); ?>
    
            </div>
        </div>
    </div>

<?php
get_footer();
?>