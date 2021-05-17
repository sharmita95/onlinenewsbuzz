<?php
add_action( 'after_setup_theme', 'custom_setup' );
if(!function_exists('custom_setup'))
{
	  function custom_setup()
	  {
          global $home_page_id;
          /****** Template create *****/
          $template_array = array(
            array(
              'new_page_title' => 'Home',
              'new_page_template' => 'page-template/home-page.php',
            ),
            array(
              'new_page_title' => 'Blog',
              'new_page_template' => 'page-template/blog.php',
            ),            
          );
        
          foreach($template_array as $temp) {
        
            $page_check = get_page_by_title($temp['new_page_title']);			
            $new_page = array(
              'post_type' => 'page',
              'post_title' => $temp['new_page_title'],
              'post_status' => 'publish',
              'post_author' => 1,
            );
            if(!isset($page_check->ID)){

              $new_page_id = wp_insert_post($new_page);				
              if(!empty($temp['new_page_template'])){
                update_post_meta($new_page_id, '_wp_page_template', $temp['new_page_template']);
              }
              if($temp['new_page_title'] == 'Home') {
                $home_page_id = $new_page_id;
              }
              
            } else {

              $my_post = array(
                'ID' => $page_check->ID,
                'post_type' => 'page',
                'post_title' => $temp['new_page_title'],
                'post_status' => 'publish',
                'post_author' => 1,
              );
              wp_update_post( $my_post );
              update_post_meta($page_check->ID, '_wp_page_template', $temp['new_page_template']);

              if($temp['new_page_title'] == 'Home') {
                $home_page_id = $page_check->ID;
              }

            }

          }
          /****** Template end *****/


          update_option( 'page_on_front', $home_page_id );

    }
}