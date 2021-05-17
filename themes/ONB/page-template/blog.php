<?php
/*Template Name: Blog */
get_header(); ?>



    <section class="listing">
      <div class="container">
        <div class="row">
			<h1 style="display: none;">
				Blog
			</h1>
			
          <div class="col-md-9">
            <div class="main-content">
              <div class="listing-blog">
                
                <div class="clir-fix"></div>
                <div class="letest-newes">
						
                    <div class="container">

                        <?php $paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;
                        $args = array( 'post_type' => 'post',
                                    'orderby'=> 'date',
                                    'order'=> 'desc',
                                    'posts_per_page'=> 6,                                    
                                    'post_status'=>'publish',
                                    'paged' => $paged
                        ); 
                        $the_query = new WP_Query($args);
                        ?> 
                        <?php if ( $the_query->have_posts() ) :
                            $i = 1;
                            while ( $the_query->have_posts() ) : $the_query->the_post();
                        
                                get_template_part( 'template-parts/content', 'archive-loop');
                            
                            $i++;
                            endwhile;
                        endif; ?>
                        
                    </div>                    
                    
                    <div class="pagination">
                        <?php
                        echo paginate_links( array(
                            'format'  => 'page/%#%',
                            'current' => $paged,
                            'total'   => $the_query->max_num_pages,
                            'mid_size'        => 2,
                            'prev_text'       => __('&laquo; Previous'),
                            'next_text'       => __('Next &raquo;')
                        ) ); ?>
                    </div>


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