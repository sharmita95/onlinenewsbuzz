<?php
get_header();

while ( have_posts() ) : the_post(); ?>
	
        <div class="container inner-pages">
			<h1><?php the_title(); ?></h1>
			<div class="row">
				
				<div class="col-md-12">

					<?php the_content(); ?>

				</div>
				
			</div>
        </div>

<?php
endwhile;

get_footer();
?>