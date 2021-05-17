<?php  ////////////////////////// FOR REVIEW
/******************************** Review Pros, cons, product link ******************************/
/* function abn_product_pros_meta(){
	$prefix = 'product_meta_';
	$product = new_cmb2_box( array(
		'id'            => $prefix . 'pro_metabox',
		'title'         => __( 'Details Section', 'cmb2' ),
		'object_types'  => array( 'review' ), // Post type
		'context'       => 'normal',
		'priority'      => 'high',
		'show_names'    => true
	) );

	$productlink_id = $product->add_field( array(
        'id'          => $prefix .'link',
        'type'        => 'group',
        'description' => esc_html__( 'External button link (Enter all links here) ', 'cmb2' ),
        'options'     => array(
            'group_title'   => esc_html__( 'Enternal Button Link {#}', 'cmb2' ), // {#} gets replaced by row number
            'add_button'    => esc_html__( 'Add Another external link', 'cmb2' ),
            'remove_button' => esc_html__( 'Remove external link', 'cmb2' ),
            'sortable'      => true,
        ),
    ) );	
    $product->add_group_field( $productlink_id, array(
        'name'       => esc_html__( 'Button text', 'cmb2' ),
        'id'         => 'text',
        'type'       => 'text',
		'attributes'  => array(
			'placeholder' => 'Button text',
			'style'		=>'width:500px;'
		)
    ) );
    $product->add_group_field( $productlink_id, array(
        'name'       => esc_html__( 'Button link', 'cmb2' ),
        'id'         => 'link',
        'type'       => 'text',
		'attributes'  => array(
			'placeholder' => 'Button link',
			'style'		=>'width:500px;'
		)
    ) );

	$pros_product_id = $product->add_field( array(
        'id'          => $prefix .'pros',
        'type'        => 'group',
        'description' => esc_html__( 'Pros Section (Enter all pros here) ', 'cmb2' ),
        'options'     => array(
            'group_title'   => esc_html__( 'Pros {#}', 'cmb2' ), // {#} gets replaced by row number
            'add_button'    => esc_html__( 'Add Another pros', 'cmb2' ),
            'remove_button' => esc_html__( 'Remove pros', 'cmb2' ),
            'sortable'      => true,
        ),
    ) );	
    $product->add_group_field( $pros_product_id, array(
        'name'       => esc_html__( 'Pros', 'cmb2' ),
        'id'         => 'title',
        'type'       => 'text',
		'attributes'  => array(
			'placeholder' => 'Enter pros',
			'style'		=>'width:500px;'
		)
    ) );


    $cons_product_id = $product->add_field( array(
        'id'          => $prefix .'cons',
        'type'        => 'group',
        'description' => esc_html__( 'Cons Section (Enter all cons here) ', 'cmb2' ),
        'options'     => array(
            'group_title'   => esc_html__( 'Cons {#}', 'cmb2' ), // {#} gets replaced by row number
            'add_button'    => esc_html__( 'Add Another cons', 'cmb2' ),
            'remove_button' => esc_html__( 'Remove cons', 'cmb2' ),
            'sortable'      => true,
        ),
    ) );	
    $product->add_group_field( $cons_product_id, array(
        'name'       => esc_html__( 'Cons', 'cmb2' ),
        'id'         => 'title',
        'type'       => 'text',
		'attributes'  => array(
			'placeholder' => 'Enter cons',
			'style'		=>'width:500px;'
		)
    ) );
	$product->add_field( 		
       array(
		'name' => __('Verdict', 'theme_textdomain'),
		'desc' => __('Verdict', 'theme_textdomain'),
		'id' => $prefix.'verdict',
		'default' => '',
		'type'    => 'textarea',
		'options' => array(
				
		)
	));
} */
//add_action( 'cmb2_init', 'abn_product_pros_meta' );

/**************************** Review Rating (for post type - review) **************************/
/* function abn_rating_meta(){
	$prefix = 'meta_';
	$rating = new_cmb2_box( array(
		'id'            => $prefix . 'rating_metabox',
		'title'         => __( "Editor's Rating", 'cmb2' ),
		'object_types'  => array( 'review' ), // Post type
		'context'       => 'normal',
		//'show_on' => array( 'key' => 'category', 'value' => 'best' ),
		'priority'      => 'high',
		'show_names'    => true
	) );	

	$rating->add_field(
       array(
		'name' => __('Rating', 'theme_textdomain'),
		'desc' => __('Rating', 'theme_textdomain'),
		'id' => $prefix.'rating',
		'default' => '',
		'type' => 'text',
		'attributes' => array(
			'type' => 'number',
			'pattern' => '\d*',
			'min' => '0',
			'max' => '5',
			'step' => '0.1',
			'placeholder' => 'Rating (out of 5)',
			'style'		=>'width:430px;'
		)
	));
} */
//add_action( 'cmb2_init', 'abn_rating_meta' );


/*************************************** category image ****************************************/
/* add_action( 'cmb2_admin_init', 'yourprefix_register_taxonomy_metabox' ); 

 function yourprefix_register_taxonomy_metabox() { 
 	$prefix = 'main_category_';

 	$cmb_term = new_cmb2_box( array( 
 		'id'               => $prefix . 'edit', 
 		'title'            => esc_html__( 'Category Metabox', 'cmb2' ), // Doesn't output for term boxes 
 		'object_types'     => array( 'term' ), // Tells CMB2 to use term_meta vs post_meta 
 		'taxonomies'       => array( 'category' ), // Tells CMB2 which taxonomies should have these fields 
 		// 'new_term_section' => true, // Will display in the "Add New Category" section 
 	) ); 
  
 	$cmb_term->add_field( array( 
 		'name'     => esc_html__( 'Extra Info', 'cmb2' ), 
 		'desc'     => esc_html__( 'field description (optional)', 'cmb2' ), 
 		'id'       => $prefix . 'extra_info', 
 		'type'     => 'title', 
 		'on_front' => false, 
 	) ); 
  
 	$cmb_term->add_field( array( 
 		'name' => esc_html__( 'Term Image', 'cmb2' ), 
 		'desc' => esc_html__( 'field description (optional)', 'cmb2' ), 
 		'id'   => $prefix . 'avatar', 
 		'type' => 'file', 
 	) ); 
  
 } */





function abn_post_meta() {

	$prefix = 'post_meta_';
	$cmb = new_cmb2_box( array(
		'id'            => $prefix . 'pro_metabox',
		'title'         => __( 'Details Section', 'cmb2' ),
		'object_types'  => array( 'post' ), // Post type
		'context'       => 'normal',
		'priority'      => 'high',
		'show_names'    => true
	) );
	$cmb->add_field( array(
		'name' => 'Featured',
		'id'   => 'featured',
		'type' => 'checkbox',
	) );
	$cmb->add_field( array(
		'name' => "Editor's pick",
		'id'   => 'editors_pick',
		'type' => 'checkbox',
	) );
}
add_action( 'cmb2_init', 'abn_post_meta' );