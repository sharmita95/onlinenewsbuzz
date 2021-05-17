<?php
/*Attach post type*/
function cmb2_attached_posts_field_metaboxes_example() {

	$example_meta = new_cmb2_box( array(
		'id'           => 'abn_cmb2_attached_posts',
		'title'        => __( 'Attached Pages', 'cmb2' ),
		'object_types' => array( 'page' ), // Post type
		'context'      => 'normal',
		'priority'     => 'high',
		'show_names'   => false, // Show field names on the left
	) );

	$example_meta->add_field( array(
		'name'    => __( 'Attached Pages', 'cmb2' ),
		'desc'    => __( 'Drag pages from the left column to the right column to attach them to this page.<br />You may rearrange the order of the posts in the right column by dragging and dropping.', 'cmb2' ),
		'id'      => 'abn_infomation_pages',
		'type'    => 'custom_attached_posts',
		'options' => array(
			'show_thumbnails' => true, // Show thumbnails on the left
			'filter_boxes'    => true, // Show a text box for filtering the results
			'query_args'      => array( 'posts_per_page' => 20 ), // override the get_posts args
		)
	) );

}
add_action( 'cmb2_init', 'cmb2_attached_posts_field_metaboxes_example' );

?>