<?php
get_header();
?>

<?php if (have_posts()) :
    while (have_posts()) : the_post();

        $postid = get_the_ID();
        subh_set_post_view($postid);
        $author_id = get_the_author_meta('ID');
        $author_fname = get_the_author_meta('first_name', $author_id);
        $author_lname = get_the_author_meta('last_name', $author_id);
        $featured_url = get_the_post_thumbnail_url(get_the_ID(),'full');
        $date = get_the_date();
        $author_display_name = get_the_author();
        $cats = get_the_category($postid);
      
    endwhile;
endif;
?>


<!-- **************page baner ************ -->
<div class="baner-sec" style="background-image: url(<?php echo $featured_url; ?>)">
      <div class="container">
        <div class="page-taitel">
          <h1><?php the_title(); ?></h1>
          <p>
            <i class="fa fa-user"></i>
            <!-- <a href="" title="Posts by Puja Joshi" rel="author">Puja Joshi</a> -->
            <a href="<?php echo get_author_posts_url($author_id, get_the_author_meta('user_nicename')); ?>" title="Posts by Puja Joshi" rel="author">By 
              <?php if (!empty($author_fname)) {
                  echo $author_fname . ' ' . $author_lname;
              } else {
                  echo $author_display_name;
              } ?>
            </a> |
            <i class="fa fa-calendar"></i> <?php echo $date; ?> |
            <i class="fa fa-object-ungroup"></i>
            <?php $cc=1;
            foreach($cats as $cat) {
              if($cc > 1) { echo ', '; } ?>
              <a href="<?php echo get_category_link($cat->term_id); ?>"><?php echo $cat->name; ?></a>
            <?php $cc++;
            } ?>
          </p>
        </div>
      </div>
    </div>
    <!-- **************page baner ************ -->
    <div class="clir-fix"></div>

    <!-- *******************blog sec******************** -->
    <div class="blog-sec">
      <div class="container">
        <div class="row">
          <div class="col-md-9">
            <div class="main-content">
              <article>
                
                <?php the_content(); ?>

                <div class="post-tags">
                  <?php global $post_tag;
                  $post_tags = get_the_tags($postid);
                  if (!empty($post_tags)) {
                      foreach ($post_tags as $post_tag) {
                          echo '<a href="' . get_tag_link($post_tag) . '" rel="tag">' . $post_tag->name . '</a>';
                      }
                  } ?>                  
                </div>
              </article>
              
              <div class="author-sec">
                <div class="row">
                  <div class="col-md-2 author-img-container">
                    <div class="author-img">
                      <img src="<?php echo esc_url(get_avatar_url($author_id)); ?>" alt="" />
                    </div>
                  </div>
                  
                  <div class="col-md-10 author-text-container">
                    
                    <div class="author-text">
                      <h5 class="author-name">
                        <a href="<?php echo get_author_posts_url($author_id, get_the_author_meta('user_nicename')); ?>">
                          <?php if (!empty($author_fname)) {
                              echo $author_fname . ' ' . $author_lname;
                          } else {
                              the_author();
                          } ?>
                        </a>
                      </h5>
                      <p><?php the_author_meta('description', $author_id); ?></p>
                    </div>
                  </div>
                </div>
              </div>

              <div class="custom-comment" style="margin:0vmin 0">
                <div class="row">
                  <div class="col-md-12">
                    <?php if ( comments_open() || get_comments_number() ) :
                      comments_template();
                    endif; ?>
                  </div>
                </div>
              </div>
              
            </div>
          </div>

          <?php get_template_part( 'template-parts/content', 'sidebar'); ?>


        </div>
      </div>
    </div>

    <!-- *******************blog sec******************** -->
    
    <div class="clir-fix"></div>

    <div class="related-posts">
      <div class="Containe container">
        <div class="trending-style">
          <h2 class="sec-title">Related Posts</h2>
        </div>
        <div class="SlickCarousel slik-spach card-slider">

          <?php if ($cats) {
            $first_cat = $cats[0]->term_id;
            $args = array('category__in' => array($first_cat), 'post__not_in' => array(get_the_ID()), 'posts_per_page' => 5);
            $my_query = new WP_Query($args);
            if ($my_query->have_posts()) { ?>	
              <?php while ($my_query->have_posts()) : $my_query->the_post();
                
                  get_template_part( 'template-parts/content', 'loop');
										  
              endwhile; ?>
            <?php }
            wp_reset_query();
          } ?>

        </div>
      </div>
    </div>





<?php
get_footer();
?>