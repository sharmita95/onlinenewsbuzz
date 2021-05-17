<?php
	require_once dirname( __FILE__ ) . '/abn_lib/abn-custom-function.php';
	if ( file_exists( dirname( __FILE__ ) . '/abn_lib/init.php' ) ) {
		require_once dirname( __FILE__ ) . '/abn_lib/init.php';
	} 
	elseif ( file_exists( dirname( __FILE__ ) . '/abn_lib/init.php' ) ) {
		require_once dirname( __FILE__ ) . '/abn_lib/init.php';	
	}


     /*Attach Post/ Page*/
//require_once dirname( __FILE__ ) . '/abn_lib/cmb2-attached-posts/cmb2-attached-posts-field.php';
class my_Admin {
   
    private $key = 'nkhan_option';
    public $option_metabox = array();
    protected $title = 'khan-opt';
    protected $options_pages = array();
 
    public function __construct() {
       
        $this->title = __( 'Theme Settings', 'theme_textdomain' );
    }
 
 
    public function hooks() {
        add_action( 'admin_init', array( $this, 'init' ) );
        add_action( 'admin_menu', array( $this, 'add_options_page' ) ); //create tab pages
    }
 
 
    public function init() {
    	$option_tabs = self::option_fields();
        foreach ($option_tabs as $index => $option_tab) {
        	register_setting( $option_tab['id'], $option_tab['id'] );
        }
    }
 
   
    public function add_options_page() {        
        $option_tabs = self::option_fields();
        foreach ($option_tabs as $index => $option_tab) {
        	if ( $index == 0) {
        		$this->options_pages[] = add_menu_page( $this->title, $this->title, 'manage_options', $option_tab['id'], array( $this, 'admin_page_display' ) ); //Link admin menu to first tab
        		add_submenu_page( $option_tabs[0]['id'], $this->title, $option_tab['title'], 'manage_options', $option_tab['id'], array( $this, 'admin_page_display' ) ); //Duplicate menu link for first submenu page
        	} else {
        		$this->options_pages[] = add_submenu_page( $option_tabs[0]['id'], $this->title, $option_tab['title'], 'manage_options', $option_tab['id'], array( $this, 'admin_page_display' ) );
        	}
        }
    }
 
 
    public function admin_page_display() {
    	$option_tabs = self::option_fields();
    	$tab_forms = array();     	   	
        ?>
        <div class="wrap cmb_options_page <?php echo $this->key; ?>">        	
            <h2><?php echo esc_html( get_admin_page_title() ); ?></h2>
            
            <!-- Options Page Nav Tabs -->           
            <h2 class="nav-tab-wrapper">
            	<?php foreach ($option_tabs as $option_tab) :
            		$tab_slug = $option_tab['id'];
            		$nav_class = 'nav-tab';
            		if ( $tab_slug == $_GET['page'] ) {
            			$nav_class .= ' nav-tab-active';
            			$tab_forms[] = $option_tab;
            		}
            	?>            	
            	<a class="<?php echo $nav_class; ?>" href="<?php menu_page_url( $tab_slug ); ?>"><?php esc_attr_e($option_tab['title']); ?></a>
            	<?php endforeach; ?>
            </h2>
            <!-- End of Nav Tabs -->
 
            <?php foreach ($tab_forms as $tab_form) : ?>
            <div id="<?php esc_attr_e($tab_form['id']); ?>" class="group">
            	<?php cmb2_metabox_form( $tab_form, $tab_form['id'] ); ?>
            </div>
            <?php endforeach; ?>
        </div>
        <?php
    }
    public function option_fields() {
     $prefix='abn_';	
        if ( ! empty( $this->option_metabox ) ) {
            return $this->option_metabox;
        } 
		$link_post_types = array('charter', 'page'); 
		   
		/* $this->option_metabox[] = array(
            'id'         => 'banner',
            'title'      => 'Banner',
            'show_on'    => array( 'key' => 'options-page', 'value' => array( 'banner' ), ),
            'fields'     => array(
				array(
					'name' => __('Video', 'theme_textdomain'),
					'desc' => __('Upload Video.', 'theme_textdomain'),
					'id' => $prefix.'banner_video',
					'default' => '',
					'type' => 'file',
					'options' => array( 'add_upload_file_text' => 'Upload Banner Video' ),
					'attributes'  => array(
						'style'		=>'width:400px;height:30px;',
					),
				),
			
			)			  	
		); */

        $this->option_metabox[] = array(
            'id'         => 'home_page',
            'title'      => 'Logo',
            'show_on'    => array( 'key' => 'options-page', 'value' => array( 'home_page' ), ),
            'fields'     => array(
				array(
					'name' => __('Logo', 'theme_textdomain'),
					'desc' => __('Upload Logo. ( 300 x 150 )', 'theme_textdomain'),
					'id' => $prefix.'logo',
					'default' => '',
					'type' => 'file',
					'options' => array( 'add_upload_file_text' => 'Upload Header Logo' ),
					'attributes'  => array(
						'style'		=>'width:400px;height:30px;',
					),
				),
			  	array(
					'name' => __('Favicon', 'theme_textdomain'),
					'desc' => __('Upload Favicon (64 x64)', 'theme_textdomain'),
					'id' => $prefix.'favicon',
					'default' => '',
					'type' => 'file',
					'options' => array( 'add_upload_file_text' => 'Upload Favicon' ) ,
					'attributes'  => array(
						'style'		=>'width:400px;height:30px;',
					),					
				),
			
			)
		);
		
	    $this->option_metabox[] = array(
            'id'         => 'social_options',
            'title'      => 'Social Links',
            'show_on'    => array( 'key' => 'options-page', 'value' => array( 'social_options' ), ),
            'show_names' => true,
            'fields'     => array(
				
			     array(
					'name' => __('Facebook Url', 'theme_textdomain'),
					'desc' => __('eg : https://facebook.com/developer', 'theme_textdomain'),
					'id' => $prefix .'fb_link',
					'default' => '',					
					'type' => 'text_url',
					'attributes'  => array(
						'placeholder' => 'Facebook URL',
						'style'		=>'width:400px;'
				    ),
				),
				
				array(
					'name' => __('Twitter Url', 'theme_textdomain'),
					'desc' => __('eg : https://twitter.com/abnwebtech', 'theme_textdomain'),
					'id' => $prefix .'tweet_link',
					'default' => '',					
					'type' => 'text_url',
					'attributes'  => array(
						'placeholder' => 'Twitter URL',
						'style'		=>'width:400px;'
					),
				),
				
				array(
					'name' => __('Pinterest Url', 'theme_textdomain'),
					'desc' => __('eg: https://pinterest.com/', 'theme_textdomain'),
					'id' => $prefix .'pinterest_link',
					'default' => '',					
					'type' => 'text_url',
					'attributes'  => array(
						'placeholder' => 'Pinterest URL',
						'style'		=>'width:400px;'
					),
				),
				
			   array(
					'name' => __('Instagram  Url', 'theme_textdomain'),
					'desc' => __('eg: https://www.instagram.com/', 'theme_textdomain'),
					'id' => $prefix .'ig_link',
					'default' => '',					
					'type' => 'text_url',
					'attributes'  => array(
						'placeholder' => 'Instagram URL',
						'style'		=>'width:400px;'
					),
				),
				array(
					'name' => __('Linkedin  Url', 'theme_textdomain'),
					'desc' => __('eg: https://www.linkedin.com/', 'theme_textdomain'),
					'id' => $prefix .'li_link',
					'default' => '',					
					'type' => 'text_url',
					'attributes'  => array(
						'placeholder' => 'Linkedin URL',
						'style'		=>'width:400px;'
					),
				),
			   
			
			)
		);
		
 	return $this->option_metabox;
   }
    public function get_option_key($field_id) {
    	$option_tabs = $this->option_fields();
    	foreach ($option_tabs as $option_tab) { 
    		foreach ($option_tab['fields'] as $field) { 
    			if ($field['id'] == $field_id) {
    				return $option_tab['id'];
    			}
    		}
    	}
    	return $this->key; 
    }
    public function __get( $field ) {
        if ( in_array( $field, array( 'key', 'fields', 'title', 'options_pages' ), true ) ) {
            return $this->{$field};
        }
        if ( 'option_metabox' === $field ) {
            return $this->option_fields();
        }
 
        throw new Exception( 'Invalid property: ' . $field );
    }
 
}




function js_limit_group_repeat($cmb) {	
?>
	<script type="text/javascript">
	jQuery(document).ready(function($){
		var limit            = 4;
		var fieldGroupId     = '_home_widget';
		var $fieldGroupTable = $( document.getElementById( fieldGroupId + '_repeat' ) );
		var countRows = function() {
			return $fieldGroupTable.find( '> .cmb-row.cmb-repeatable-grouping' ).length;
		};
		var disableAdder = function() {
			$fieldGroupTable.find('.cmb-add-group-row.button').prop( 'disabled', true );
		};
		var enableAdder = function() {
			$fieldGroupTable.find('.cmb-add-group-row.button').prop( 'disabled', false );
		};
		$fieldGroupTable
			.on( 'cmb2_add_row', function() {
				if ( countRows() >= limit ) {
					disableAdder();
				}
			})
			.on( 'cmb2_remove_row', function() {
				if ( countRows() < limit ) {
					enableAdder();
				}
			});
	});
	</script>
	<?php
}
add_action( 'admin_footer', 'js_limit_group_repeat',10);
include('abn_lib/abn_manage_page_func.php');

 
// Get it started
$my_Admin = new my_Admin();
$my_Admin->hooks();
function abn_option($key=NULL) {
    	global $my_Admin;
      return cmb2_get_option($my_Admin->get_option_key($key), $key );
}

?>