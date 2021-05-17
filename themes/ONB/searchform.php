<?php
/**
 * Template for displaying search forms in Twenty Sixteen
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
?>

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
	<a href="#" id="close-search"><span class="sr-only">Close Search Panel</span><i class="fa fa-times"></i></a>
</form>