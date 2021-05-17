<?php
if(!defined('BSTELLAR_DIR')) define('BSTELLAR_DIR',get_template_directory());
if(!defined('BSTELLAR_URI')) define('BSTELLAR_URI',get_template_directory_uri());

/* if ( file_exists( BSTELLAR_DIR.'/shortcode.php') ) {
	require_once(BSTELLAR_DIR.'/shortcode.php');
} */

if ( version_compare( $GLOBALS['wp_version'], '4.4-alpha', '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
}
require get_template_directory() . '/inc/template-tags.php';
require get_template_directory() . '/inc/customizer.php';

add_action( 'after_setup_theme', 'bstelar_setup' );
if(!function_exists('bstelar_setup'))
{
	function bstelar_setup()
	{
		load_theme_textdomain( 'bstelar' );
		add_theme_support( 'automatic-feed-links' );		
		add_theme_support( 'title-tag' );		
		add_theme_support( 'custom-logo');		
		add_theme_support( 'post-thumbnails' );		
				
		$GLOBALS['content_width'] = 900;
		
		register_nav_menus( array(
			//'top'    => __( 'Primary Menu', 'bstelar' ),
			'main_footer' => __( 'Main Footer Menu', 'bstelar' ),
			'category_footer' => __('Category Footer Menu', 'bstelar' ),
			//'third_footer' => __( 'Third Footer Menu', 'bstelar' ),
			//'fourth_footer' => __('Fourth Footer Menu', 'bstelar' ),
		) );
		
		add_theme_support( 'html5', array(
			'comment-form',
			'comment-list',
		) );

		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 1200, 9999 );

		add_image_size('thumbnail-home', 350, 250, true);
		add_image_size('thumbnail-home-second', 420, 250, true);
		add_image_size('sidebar-thumbnail', 50, 50, true);
		add_image_size('small-thumbnail', 280, 180, true);
		add_image_size('banner-small-thumbnail', 360, 230, true);
        add_image_size('archive-thumbnail', 260, 160, true);

		if (!current_user_can('administrator') && !is_admin()) {
		  show_admin_bar(false);
		}		

	}
}


if ( file_exists( BSTELLAR_DIR.'/theme-setup.php') ) {
	require_once(BSTELLAR_DIR.'/theme-setup.php');
}

add_action( 'wp_enqueue_scripts', 'bstellar_front_scripts' );
if(!function_exists('bstellar_front_scripts')) {
	function bstellar_front_scripts(){
		global $bstellar;
		$version = '5.0.2';

		wp_enqueue_style( 'main-theme-css', BSTELLAR_URI.'/style.css', array(), $version,'all');
		wp_enqueue_style( 'bootstrap', '//stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css', array(), $version,'all');
		wp_enqueue_style( 'bootstrap-dropmenu', '//skywalkapps.github.io/bootstrap-dropmenu/stylesheets/bootstrap-dropmenu.min.css', array(), $version,'all');
		wp_enqueue_style( 'font-awesome', '//cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css', array(), $version,'all');
		wp_enqueue_style( 'google-fonts', '//fonts.googleapis.com/css?family=Raleway|Nunito&display=swap', array(), $version,'all');
		//wp_enqueue_style( 'font-awsome-5.11.2', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css', array(), $version,'all');
	
		/****************************************** Custom js **********************************************/
		//wp_enqueue_script('jquery');
		wp_enqueue_script('jquery-js', BSTELLAR_URI . '/js/jquery-2.1.3.min.js',$version, false );
		wp_enqueue_script('slick-js', BSTELLAR_URI . '/js/slick.js',$version, false, true );
		wp_enqueue_script( 'scripts-js', BSTELLAR_URI.'/js/scripts.js',$version, false, true );
	    // $jsData = [
	    //     'ajaxurl' => admin_url('admin-ajax.php'),
	    //     'test' => '123',
	    //     'test1' => 'world',
	    // ];

	    // wp_localize_script('theme_js', 'Front', $jsData);

    }
}

/************************ Widget area ***********************/
add_action( 'widgets_init', 'bstelar_widgets_init' );
if(!function_exists('bstelar_widgets_init'))
{
	function bstelar_widgets_init(){
		register_sidebar( array(
			'name'          => __( 'General Sidebar', 'bstellar' ),
			'id'            => 'general_sidebar',
			'description'   => __( 'Add widgets here to appear in your sidebar.', 'bstellar' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		) );
	}
}

/***** author *****/
if(!function_exists('loop_author'))
{
	function loop_author($author_id){
		
		$first_name = get_the_author_meta( 'first_name' , $author_id );
		$last_name = get_the_author_meta( 'last_name' , $author_id );
		
		$user = get_userdata( $author_id );		
		$display_name = $user->display_name; ?>
		
		<!-- <img src="<?php //the_author_meta( 'avatar' , $author_id ); ?> " width="140" height="140" class="avatar" alt="<?php //echo the_author_meta( 'display_name' , $author_id ); ?>" /> -->
		<a href="<?php echo get_author_posts_url($author_id); ?>">BY 
			<?php if(!empty($first_name)) { ?>
				<?php echo $first_name. ' '.$last_name; ?>
			<?php } else { echo $display_name; } ?>
		</a>
	<?php }
}

function custom_excerpt_length( $length ) {
	return 40;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );


/************************* Post view *****************************/
function subh_get_post_view( $postID ) {
	$count_key = 'post_views_count';
	$count     = get_post_meta( $postID, $count_key, true );
	if ( $count == '' ) {
	delete_post_meta( $postID, $count_key );
	add_post_meta( $postID, $count_key, '0' );
	
	return '0 View';
	}
	
	return $count . ' Views';
}
function subh_set_post_view( $postID ) {
	$count_key = 'post_views_count';
	$count     = (int) get_post_meta( $postID, $count_key, true );
	if ( $count < 1 ) {
	delete_post_meta( $postID, $count_key );
	add_post_meta( $postID, $count_key, '1' );
	} else {
	$count++;
	update_post_meta( $postID, $count_key, (string) $count );
	}
}
function subh_posts_column_views( $defaults ) {
	$defaults['post_views'] = __( 'Views' );
	
	return $defaults;
}
function subh_posts_custom_column_views( $column_name, $id ) {
	if ( $column_name === 'post_views' ) {
	echo subh_get_post_view( get_the_ID() );
	}
}
	
add_filter( 'manage_posts_columns', 'subh_posts_column_views' );
add_action( 'manage_posts_custom_column', 'subh_posts_custom_column_views', 5, 2 );


add_shortcode('my_popular_posts', 'my_popular_post_func');
function my_popular_post_func() { ?>

	<?php global $posts;
	$popular_args = get_posts(
		array( 'post_type' => 'post',
			'post_status'=>'publish', 
			'posts_per_page' => 4,
			'order'     => 'DESC',
			'meta_key' => 'post_views_count',
			'orderby'   => 'meta_value_num'
		)
	);		
	?>

	<div class="recent-post">
			<h4 class="recent-taitel">Popular Posts</h4>
			<ul class="img-rec-sec">
				
			<?php foreach($popular_args as $posts) { ?>
				<li class="lis-i">
					<a class="lis-link" href="<?php echo get_the_permalink($posts->ID); ?>">
					<?php echo get_the_post_thumbnail($posts->ID, 'sidebar-thumbnail', array('class' => 'lis-sma-img')); ?>
						<p class="lis-para"><?php echo $posts->post_title; ?></p>
					</a>
				</li>
				<?php } ?>
			</ul>
		</div>

<?php }



add_shortcode('my_recent_posts', 'my_recent_post_func');
function my_recent_post_func() { ?>

	<?php global $posts;
	$recent_args = get_posts(
		array( 'post_type' => 'post',
			'post_status'=>'publish', 
			'posts_per_page' => 4,
			'orderby' => 'date',
			'order'     => 'DESC',
		)
	);		
	?>

	<div class="recent-post">
			<h4 class="recent-taitel">Recent Posts</h4>
			<ul class="img-rec-sec">
				
			<?php foreach($recent_args as $posts) { ?>
				<li class="lis-i">
					<a class="lis-link" href="<?php echo get_the_permalink($posts->ID); ?>">
					<?php echo get_the_post_thumbnail($posts->ID, 'sidebar-thumbnail', array('class' => 'lis-sma-img')); ?>
						<p class="lis-para"><?php echo $posts->post_title; ?></p>
					</a>
				</li>
				<?php } ?>
			</ul>
		</div>

<?php }
?>