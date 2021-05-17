<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package WordPress
 * @subpackage Online Health Media
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

	<section class="listing">
    <div class="container">
      <div class="row">

          <div class="col-md-9">
            <div class="main-content">
              <div class="listing-blog">
                <div class="lis-banner">
					<span><h1><?php printf( __( 'Search Results for: %s', 'onb' ), '</span>' . get_search_query()); ?></h1>
                </div>
                <div class="clir-fix"></div>
                <div class="letest-newes">

					<?php if ( have_posts() ) : ?>
			
						<div class="trending-cards">

							<?php while ( have_posts() ) : the_post();
								if($post->post_type == 'post') {
									get_template_part( 'template-parts/content', 'archive-loop');
								}
							endwhile; ?>
							
						</div>
										
						<div class="cat-pagi">
							<?php the_posts_pagination( array(
								'prev_text'          => __( '<< Previous', 'onb' ),
								'next_text'          => __( 'Next >>', 'onb' ),
								'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( '', 'onb' ) . ' </span>',
							) ); ?>
						</div>

					<?php else : ?>
						<div class="col-md-12">
							<h1 class="page-title"><?php _e( 'Nothing Found', 'onb' ); ?></h1>
							<div class="not-found-cont"><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'travel' ); ?></div>					
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
get_footer();
