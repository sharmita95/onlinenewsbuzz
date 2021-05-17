<?php
function cmb2sdfwrew_get_post_options($argument) {
$get_post_args = array(
        'post_type' => 'page',
        'posts_per_page'   => -1,
        'orderby' => 'type',
        'order' => ASC
    );
    $options = array();
foreach ( get_posts( $get_post_args ) as $post ) {
		
		//print_r($post);
        $post_type = get_post_type( $post->ID);
        echo $title = get_the_title( $post->ID );
        $permalink = get_permalink( $post->ID);

        $options[]= array(
            'name'  => $title . ' : ' . $post_type,
            'value' => $permalink,
        );
    }
    $empty_option[] = array(
        'name' => 'Please select an option',
        'value' => '',
    );
    $options= array_merge($empty_option, $options);


    return $options;
}

function cmb2_get_post_options( $query_args ) {

    $args = wp_parse_args( $query_args, array(
        'post_type'   => 'post',
        'numberposts' =>-1,
    ) );

    $posts = get_posts( $args );

    $post_options = array();
    if ( $posts ) {
        foreach ( $posts as $post ) {
          $post_options[ $post->ID ] = $post->post_title;
        }
    }

    return $post_options;
}
/*hide nag and  notification */
function remove_core_updates(){
       global $wp_version;
       return (object) array(
           'last_checked' => time(),
           'version_checked' => $wp_version,
           );
}
//add_filter('pre_site_transient_update_core', 'remove_core_updates');
//add_filter('pre_site_transient_update_plugins', 'remove_core_updates');
//add_filter('pre_site_transient_update_themes', 'remove_core_updates');
/* To hide post */
function remove_menus(){
    remove_menu_page( 'index.php' );                  //Dashboard
    //remove_menu_page( 'edit.php' );                   //Posts
  //remove_menu_page( 'edit.php?post_type=page' );    //Pages
    remove_menu_page( 'edit-comments.php' );          //Comments
 // remove_menu_page( 'users.php' );                  //Users
  //  remove_menu_page( 'tools.php' );              //Tools
  
}
add_action( 'admin_menu', 'remove_menus' );

function the_excerpt_max_charlength($charlength) {
	$excerpt = get_the_excerpt();
	$charlength++;

	if ( mb_strlen( $excerpt ) > $charlength ) {
		$subex = mb_substr( $excerpt, 0, $charlength - 5 );
		$exwords = explode( ' ', $subex );
		$excut = - ( mb_strlen( $exwords[ count( $exwords ) - 1 ] ) );
		if ( $excut < 0 ) {
			echo mb_substr( $subex, 0, $excut );
		} else {
			echo $subex;
		}
		echo '[...]';
	} else {
		echo $excerpt;
	}
}


/* To Get custom excerpt content */
function new_excerpt_more($more) {
    return '....';
}
add_filter('excerpt_more', 'new_excerpt_more', 21 );

function abn_excerpt($post_id,$length)
{  
    if($length)
	{
		$post=get_post($post_id);
		 setup_postdata($post, $more_link_text, $stripteaser );
		 the_content();
		 wp_reset_postdata($post);
	}
	else
	{ 
	 
		$content_post=get_post($post_id);
		$content = $content_post->post_content;
	    $content = apply_filters('the_content', $content);
		$content = str_replace(']]>',']]&gt;', $content);
	   $content=wp_trim_words($content,$length,'...');
	  return $content;
	}
	
}
/*remove the 32px Push Down from the Admin Bar  from front end*/
add_action('get_header', 'remove_admin_login_header');
function remove_admin_login_header() {
	remove_action('wp_head', '_admin_bar_bump_cb');
}
/*retrieves the attachment ID from the file URL*/
function abn_get_image_id($image_url) {
	global $wpdb;
	$attachment = $wpdb->get_col($wpdb->prepare("SELECT ID FROM $wpdb->posts WHERE guid='%s';", $image_url )); 
        return $attachment[0]; 
}



//add_filter( 'admin_footer', 'abn_remove_visual_tab', 99);
/*Remove Visual Tab*/
function abn_remove_visual_tab(){ 
echo '  <style type="text/css">
        a#content-tmce, a#content-tmce:hover, #qt_content_fullscreen{
            display:none;
        }
        </style>';
echo '  <script type="text/javascript">
        jQuery(document).ready(function(){
            jQuery("#content-tmce").attr("onclick", null);
        });
        </script>'; 
}

/*Product Post Type*/


function abn_taxonomies_terms_links($term_name) {
	
	
	$term_name=$term_name;
	
	$args=array('name'=>$term_name);

	$output = 'objects'; // or names

	$taxonomies=get_terms($args,$output); 

//$slugs = wp_list_pluck($taxonomies, 'slug');
//print_r($slugs); 
//echo  $cl_names = join(' ', $slugs);
	
	$result='<ul class="portfolio-filter brand-filter">';
	$result.='<li class="active waves-effect waves-light" data-group="all">All</li>';
	
	  foreach ($taxonomies  as $taxonomy ) {


				//echo  '<button type="button" class="control btn btn-default" data-filter='.".".$taxonomy->slug.'><i class="fa fa-tag"></i> '.$taxonomy->name.'</button>';
			$result.=' <li class="waves-effect waves-light"  data-group="'.$taxonomy->slug.'"> '.$taxonomy->name.'</li>';
	  }

	$result.='</ul>';
   
	
	return $result;
}


/*Frontend Upload Files*/
function my_generate_attachment_metadata( $attachment_id, $file ) {
    $attachment = get_post( $attachment_id );

    $metadata = array();
    if ( preg_match('!^image/!', get_post_mime_type( $attachment )) && file_is_displayable_image($file) ) {
        $imagesize = getimagesize( $file );
        $metadata['width'] = $imagesize[0];
        $metadata['height'] = $imagesize[1];
        list($uwidth, $uheight) = wp_constrain_dimensions($metadata['width'], $metadata['height'], 128, 96);
        $metadata['hwstring_small'] = "height='$uheight' width='$uwidth'";

        // Make the file path relative to the upload dir
        $metadata['file'] = _wp_relative_upload_path($file);

        // fetch additional metadata from exif/iptc
        $image_meta = wp_read_image_metadata( $file );
        if ( $image_meta )
            $metadata['image_meta'] = $image_meta;
    }

     return apply_filters( 'wp_generate_attachment_metadata', $metadata, $attachment_id );
}


function upload_user_file( $file = array() ) {
 			 require_once( ABSPATH . 'wp-admin/includes/admin.php' );
  			$file_return = wp_handle_upload( $file, array('test_form' => false ) );
				if( isset( $file_return['error'] ) || isset( $file_return['upload_error_handler'] ) ) {
				   return false;
			   } 
			else {
					$filename = $file_return['file'];
					$attachment = array(
										'post_mime_type' => $file_return['type'],
										'post_title' => preg_replace( '/\.[^.]+$/', '', basename( $filename ) ),
										'post_content' => '',
										'post_status' => 'inherit',
										'guid' => $file_return['url']
								);
					
					$attachment_id = wp_insert_attachment( $attachment, $file_return['url'] );
					require_once(ABSPATH . 'wp-admin/includes/image.php');
					$attachment_data = my_generate_attachment_metadata( $attachment_id, $filename );
					wp_update_attachment_metadata( $attachment_id, $attachment_data );
			
						if( 0 < intval( $attachment_id ) ) {
										return $attachment_id;
							}
}
  				return false;
}

function cmb_show_on_meta_value( $display, $meta_box ) {
	if ( ! isset( $meta_box['show_on']['meta_key'] ) ) {
		return $display;
	}

	$post_id = 0;

	// If we're showing it based on ID, get the current ID
	if ( isset( $_GET['post'] ) ) {
		$post_id = $_GET['post'];
	} elseif ( isset( $_POST['post_ID'] ) ) {
		$post_id = $_POST['post_ID'];
	}

	if ( ! $post_id ) {
		return $display;
	}

	$value = get_post_meta( $post_id, $meta_box['show_on']['meta_key'], true );

	if ( empty( $meta_box['show_on']['meta_value'] ) ) {
		return (bool) $value;
	}

	return $value == $meta_box['show_on']['meta_value'];
}
add_filter( 'cmb2_show_on', 'cmb_show_on_meta_value', 10, 2 );


/*Page content till read more by post id*/
function abn_the_content_by_id( $post_id=0, $more_link_text = null, $stripteaser = false ){
    global $post;
    $post = &get_post($post_id);
    setup_postdata( $post, $more_link_text, $stripteaser );
    the_content();
    wp_reset_postdata( $post );
}

function modify_read_more_link() {
    return '<a class="profile-btn more-link" href="' . get_permalink() . '"><i class="fa fa-hand-o-right"></i> More About Dr Sudeshna Saha</a>';
}
add_filter( 'the_content_more_link', 'modify_read_more_link' );
?>