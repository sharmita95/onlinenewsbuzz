<?php
get_header();
?>

<section class="listing">
    <div class="container">
      <div class="row">

          <div class="col-md-9">
            <div class="main-content">
              <div class="listing-blog">
                <div class="lis-banner">
				  <?php the_archive_title( '<h1 class="page-title">', '</h1>' ); ?>
                  <?php the_archive_description( '<div class="taxonomy-description">', '</div>' ); ?>
                </div>
                <div class="clir-fix"></div>
                <div class="letest-newes">				
				  

                  <?php if ( have_posts() ) :
                  ?>
                
                  <div class="container">

                    <?php while ( have_posts() ) : the_post();
                    
                      get_template_part( 'template-parts/content', 'archive-loop');
                    endwhile; ?>
							
						      </div>
						
                  <div class="cat-pagi">
                    <?php the_posts_pagination( array(
                      'prev_text'          => __( '<< Previous', 'bstellar' ),
                      'next_text'          => __( 'Next >>', 'bstellar' ),
                      'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( '', 'bstellar' ) . ' </span>',
                    ) ); ?>
                  </div>

                  <?php else : ?>
                    <div class="col-md-12 not-found-sec">
                      <h1 class="page-title"><?php _e( 'Nothing Found', 'bstellar' ); ?></h1>
                      <div><?php _e( 'Sorry, but nothing found.', 'bstellar' ); ?></div>
                    </div>
                  <?php endif; ?>

                </div>
              </div>
            </div>
          </div>
		  
		      <?php get_template_part( 'template-parts/content', 'sidebar'); ?>

      </div>
    </div>
</section>


					
					
	
<?php
get_footer(); ?>
