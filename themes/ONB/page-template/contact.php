<?php
/*Template Name: Contact */
get_header();
while ( have_posts() ) : the_post(); ?>

	<main class="contact-page">
        <div class="container inner-pages">
			<h1>Contact</h1>
			<div class="row">
				
				<div class="col-md-12">

					<?php the_content(); ?>

				</div>
				
			</div>
        </div>
	</main>

<?php
endwhile;
get_footer();