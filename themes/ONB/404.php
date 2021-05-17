<?php
 get_header();
?>


		<section class="banner-with-action">
          
          <div class="container">
            <div class="content">
              <h1 class="title">Blog Posts: Health & Beauty A-Z Topics</h1>
			  <?php //get_search_form(); ?>
			  
			  <form  role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>" class="search-form">
            	<div class="input-group">
            		<input type="text" placeholder="Search Online News Buzz" autofocus required
            		class="form-control" value="<?php echo get_search_query(); ?>" name="s"/>
            		<div class="input-group-append">
            			<button class="search-button btn" type="submit">
            				<span class="sr-only">Search</span><i class="fa fa-search"></i>
            			</button>
            		</div>
            	</div>
              </form>
            

            </div>
          </div>
        </section>
	</header>
	
	<main>
      <section class="trending" style="text-align:center;">
        <div class="container">
			<h2 class="sec-title">
				<span class="highlight">Error : </span> 404
			</h2>
			<div class="row">
				<div class="col-md-12">
					<p>You may have mis-typed the URL.Or the page has been removed.Actually, there is nothing to see here...</p>
					<p>Click on the BUTTON below to do something, Thanks!</p>
					<a href="<?php echo home_url(); ?>" class="btn btn-rect">Home</a>				
				</div>
			</div>	
        </div>
	  </section>
     
	</main>

	<!-------------------- Js Files -------------------->
	<?php
	  get_footer();
	?>