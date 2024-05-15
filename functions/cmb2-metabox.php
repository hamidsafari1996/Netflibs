<?php

/**
 * CMB2 Genesis Settings Metabox
 *
 * To fetch these options, use `genesis_get_option()`, e.g.
 *      $color = genesis_get_option( 'test_colorpicker' );
 *
 * @version 0.1.0
 */
function netflibs_header_elementor()
{
	$args=array(
		'post_type'=>'make_header',
	);
	$terms=get_posts($args);
	$select_items=array();
	foreach($terms as $term){
		$select_items[$term->ID]=$term->post_title;
	}
	return $select_items;
}


function netflibs_single_footer_option()
{
	$args=array(
		'post_type'=>'make_footer',
	);
	$terms=get_posts($args);
	$select_items=array();
	foreach($terms as $term){
		$select_items[$term->ID]=$term->post_title;
	}
	return $select_items;
}

function coagex_title_head_option()
{
	$args=array(
		'post_type'=>'make_headtitle',
	);
	$terms=get_posts($args);
	$select_items=array();
	foreach($terms as $term){
		$select_items[$term->ID]=$term->post_title;
	}
	return $select_items;
}
function coagex_get_sidebar_option()
{
	$args=array(
		'post_type'=>'make_sidebar',
	);
	$terms=get_posts($args);
	$select_items=array();
	foreach($terms as $term){
		$select_items[$term->ID]=$term->post_title;
	}
	return $select_items;
}
function netflibs_single_teil_option()
{
	$args=array(
		'post_type'=>'make_teil',
	);
	$terms=get_posts($args);
	$select_items=array();
	foreach($terms as $term){
		$select_items[$term->ID]=$term->post_title;
	}
	return $select_items;
}
function create_template()
  {
    $args=array(
      'post_type'=>'make_theme',
    );
    $terms=get_posts($args);
    $select_items=array();
    foreach($terms as $term){
      $select_items[$term->ID]=$term->post_title;
    }
    return $select_items;
  }
  
class Myprefix_Genesis_Settings_Metabox {

	/**
	 * Option key. Could maybe be 'genesis-seo-settings', or other section?
	 *
	 * @var string
	 */
	protected $key = 'genesis-settings';

	/**
	 * The admin page slug.
	 *
	 * @var string
	 */
	protected $admin_page = 'genesis';

	/**
	 * Options page metabox id
	 *
	 * @var string
	 */
	protected $metabox_id = 'myprefix_genesis_settings';

	/**
	 * Admin page hook
	 *
	 * @var string
	 */
	protected $admin_hook = 'toplevel_page_genesis';

	/**
	 * Holds an instance of CMB2
	 *
	 * @var CMB2
	 */
	protected $cmb = null;

	/**
	 * Holds an instance of the object
	 *
	 * @var Myprefix_Genesis_Settings_Metabox
	 */
	protected static $instance = null;

	/**
	 * Returns the running object
	 *
	 * @return Myprefix_Genesis_Settings_Metabox
	 */
	public static function get_instance() {
		if ( null === self::$instance ) {
			self::$instance = new self();
			self::$instance->hooks();
		}

		return self::$instance;
	}

	/**
	 * Constructor
	 *
	 * @since 0.1.0
	 */
	protected function __construct() {
	}

	/**
	 * Initiate our hooks
	 *
	 * @since 0.1.0
	 */
	public function hooks() {
		add_action( 'admin_menu', array( $this, 'admin_hooks' ) );
		add_action( 'cmb2_admin_init', array( $this, 'init_metabox' ) );
	}

	/**
	 * Add menu options page
	 *
	 * @since 0.1.0
	 */
	public function admin_hooks() {
		// Include CMB CSS in the head to avoid FOUC.
		add_action( "admin_print_styles-{$this->admin_hook}", array( 'CMB2_hookup', 'enqueue_cmb_css' ) );

		// Hook into the genesis cpt setttings save and add in the CMB2 sanitized values.
		add_filter( "sanitize_option_{$this->key}", array( $this, 'add_sanitized_values' ), 999 );

		// Hook up our Genesis metabox.
		add_action( 'genesis_theme_settings_metaboxes', array( $this, 'add_meta_box' ) );
	}


	/**
	 * Hook up our Genesis metabox.
	 *
	 * @since 0.1.0
	 */
	public function add_meta_box() {
		$cmb = $this->init_metabox();
		add_meta_box(
			$cmb->cmb_id,
			$cmb->prop( 'title' ),
			array( $this, 'output_metabox' ),
			$this->admin_hook,
			$cmb->prop( 'context' ),
			$cmb->prop( 'priority' )
		);
	}

	/**
	 * Output our Genesis metabox.
	 *
	 * @since 0.1.0
	 */
	public function output_metabox() {
		$cmb = $this->init_metabox();
		$cmb->show_form( $cmb->object_id(), $cmb->object_type() );
	}

	/**
	 * If saving the cpt settings option, add the CMB2 sanitized values.
	 *
	 * @since 0.1.0
	 *
	 * @param array $new_value Array of values for the setting.
	 *
	 * @return array Updated array of values for the setting.
	 */
	public function add_sanitized_values( $new_value ) {
		if ( ! empty( $_POST ) ) {
			$cmb = $this->init_metabox();

			$new_value = array_merge(
				$new_value,
				$cmb->get_sanitized_values( $_POST )
			);
		}

		return $new_value;
	}
	


	/**
	 * Register our Genesis metabox and return the CMB2 instance.
	 *
	 * @since  0.1.0
	 *
	 * @return CMB2 instance.
	 */
	public function init_metabox() {
		if ( null !== $this->cmb ) {
			return $this->cmb;
		}
		//select//
		
		$cmb = new_cmb2_box( array(
			'id'           => 'restice-content',
			'title'        => __( 'محدود کردن', 'myprefix' ),
			//'hookup'       => false, // We'll handle ourselves. (add_sanitized_values())
			//'cmb_styles'   => false, // We'll handle ourselves. (admin_hooks())
			'context'      => 'normal', // Important for Genesis.
			'priority'     => 'high', // Defaults to 'high'.
			'object_types' => array( 'coagex_movie','product'),
		));
		$cmb->add_field( array(
			'name'    => 'تنظیمات اشتراک',
			'id'      => 'restice_select',
			'type'    => 'radio_inline',
			'description' => 'برای استفاده از قابلیت اشتراکی باید افزونه restrict-content-pro را خریداری و نصب کنید',
			'default' => 'restice-no',
			'options' => array(
				'restice-no' => __( 'رایگان', 'cmb2' ),
				'restice-yes'   => __( 'اشتراکی', 'cmb2' ),
			),
		) );
		$cmb = new_cmb2_box( array(
			'id'           => 'post-pull',
			'title'        => __( 'تنظیمات پیشرفته نوشته ها', 'myprefix' ),
			//'hookup'       => false, // We'll handle ourselves. (add_sanitized_values())
			//'cmb_styles'   => false, // We'll handle ourselves. (admin_hooks())
			'context'      => 'normal', // Important for Genesis.
			'priority'     => 'high', // Defaults to 'high'.
			'object_types' => array( 'post'),
		));

		// Set our CMB2 fields.
		$cmb->add_field( array(
			'name' => __( 'دقیقه مطالعه', 'myprefix' ),
			'desc' => __( 'دقیقه مطالعه را وارد کنید فقط عدد', 'myprefix' ),
			'id'   => 'text-name',
			'type' => 'text',
			// 'default' => 'Default Text',
		) );
		
		$cmb->add_field( array(
			'name'    => 'انتخاب سایدبار',
			'id'      => 'wiki_test_radio_inline',
			'type'    => 'radio_inline',
			'options' => array(
				'none' => __( 'بدون سایدبار', 'cmb2' ),
				'sidebar_right'   => __( 'سایدبار سمت راست', 'cmb2' ),
				'sidebar_left'     => __( 'سایدبار سمت چپ', 'cmb2' ),
			),
			'default' => 'none',
		) );
		$cmb->add_field( array(
			'name'             => 'سایدبار المنتور',
			'desc'             => 'سایدبار ساخته شده با المنتور',
			'id'               => 'sidebar-post-elementor',
			'type'             => 'select',
			'show_option_none' => true,
			//'default'          => 'custom',
			'options_cb' => 'coagex_get_sidebar_option',
		) );
		//movie//
		$cmb = new_cmb2_box( array(
			'id'           => 'post-movie',
			'title'        => __( 'تنظیمات پیشرفته فیلم', 'myprefix' ),
			//'hookup'       => false, // We'll handle ourselves. (add_sanitized_values())
			//'cmb_styles'   => false, // We'll handle ourselves. (admin_hooks())
			'context'      => 'normal', // Important for Genesis.
			'priority'     => 'high', // Defaults to 'high'.
			'object_types' => array( 'coagex_movie','product'),
			'closed'     => true,
		));
		$cmb->add_field( array(
			'name'             => 'نوع بارگذاری',
			'desc'             => 'بارگذاری مشخصات از سایت imDb یا دستی',
			'id'               => 'imDb_select',
			'type'             => 'select',
			'show_option_none' => true,
			'default'          => 'defult-select',
			'options'          => array(
				'defult-select' => __( 'دستی', 'cmb2' ),
				'imdb-tabligh' => __( 'از سایت imDb', 'cmb2' ),
			),
		) );
		$cmb->add_field( array(
			'name' => __( 'مدت زمان', 'myprefix' ),
			'desc' => __( 'مثال: 1h 20min', 'myprefix' ),
			'id'   => 'text-time',
			'type' => 'text',
			// 'default' => 'Default Text',
		) );
		// $cmb->add_field( array(
		// 	'name' => __( 'مترجمان', 'myprefix' ),
		// 	'desc' => __( 'نام مترجمان را وارد کنید', 'myprefix' ),
		// 	'id'   => 'text-translate',
		// 	'type' => 'text',
		// 	// 'default' => 'Default Text',
		// ) );
		$cmb->add_field( array(
			'name' => __( 'امتیاز imDb', 'myprefix' ),
			'desc' => __( 'امتیاز imDb را فقط به عدد وارد کنید', 'myprefix' ),
			'id'   => 'text-imDb',
			'type' => 'text',
			// 'default' => 'Default Text',
		) );
		$cmb->add_field( array(
			'name' => __( 'لینک imDb', 'myprefix' ),
			'desc' => __( '<a target="_balnk" href="https://www.imdb.com/">انتخاب امتیاز از وب سایت imDb</a>', 'myprefix' ),
			'id'   => 'link',
			'type' => 'text',
			// 'default' => 'Default Text',
		) );
		$cmb->add_field( array(
			'name' => __( 'عنوان دکمه', 'myprefix' ),
			'desc' => __( 'عنوانی برای دکمه بنویسید', 'myprefix' ),
			'id'   => 'text-button',
			'type' => 'text',
			// 'default' => 'Default Text',
		) );
		$cmb->add_field( array(
			'name'             => 'نوع بارگذاری',
			'desc'             => 'قابل استفاده برای قالب single-tube',
			'id'               => 'select_video',
			'type'             => 'select',
			'show_option_none' => true,
			'default'          => 'video',
			'options'          => array(
				'video' => __( 'از هاست', 'cmb2' ),
				'youtube'   => __( 'از یوتیوب', 'cmb2' ),
				'aparat' => __( 'از آپارات', 'cmb2' ),
			),
		) );
		$cmb->add_field( array(
			'name' => 'اسکریپت آپارات',
			'desc' => 'کد امبد را جایگذاری کنید',
			'id' => 'aparat_embed',
			'type' => 'textarea_code'
		) );
		$cmb->add_field( array(
			'name' => __( 'لینک ویدیو', 'myprefix' ),
			'desc' => __( 'لینک ویدیو را وارد کنید', 'myprefix' ),
			'id'   => 'text-link',
			'type' => 'text',
			// 'default' => 'Default Text',
		) );
		$cmb->add_field( array(
			'name' => __( 'زیرنویس فیلم', 'myprefix' ),
			'desc' => __( 'لینک زیرنویس فیلم | استفاده برای صفحه single-tube', 'myprefix' ),
			'id'   => 'text-subtitle',
			'type' => 'text',
			// 'default' => 'Default Text',
		) );
		$cmb->add_field( array(
			'name' => __( 'نکات و راهنما', 'myprefix' ),
			'desc' => __( 'نکات و راهنما برای استفاده از فایل را وارد کنید', 'myprefix' ),
			'id'   => 'text-help',
			'type' => 'wysiwyg',
			// 'default' => 'Default Text',
		) );
		$cmb->add_field(  array(
			'name' => 'تصویر پس زمینه',
			'desc' => __( 'ابعاد صفحه پیشفرض 540*1440 | ابعاد صفحه single-tube 1280*720 پیکسل', 'myprefix' ),
			'id'   => 'imagev',
			'type' => 'file',
					// Optional:
		'options' => array(
			'url' => false, // Hide the text input for the url
		),
		'text'    => array(
			'add_upload_file_text' => 'انتخاب تصویر' // Change upload button text. Default: "Add or Upload File"
		),
		) );
		$cmb->add_field(  array(
			'name' => 'تبلیغ بنری',
			'id'   => 'image-big',
			'type' => 'file',
					// Optional:
		'options' => array(
			'url' => false, // Hide the text input for the url
		),
		'text'    => array(
			'add_upload_file_text' => 'انتخاب تصویر' // Change upload button text. Default: "Add or Upload File"
		),
		) );
		$cmb->add_field( array(
			'name' => __( 'لینک تبلیغ', 'myprefix' ),
			'desc' => __( 'لینک تبلیغ را وارد کنید', 'myprefix' ),
			'id'   => 'tabligh',
			'type' => 'text',
			// 'default' => 'Default Text',
		) );
		$cmb->add_field(  array(
			'name' => 'تصویر برای پرتفولیو',
			'desc' => __( 'ابعاد تصویر 228*400', 'myprefix' ),
			'id'   => 'img',
			'type' => 'file',
					// Optional:
		'options' => array(
			'url' => false, // Hide the text input for the url
		),
		'text'    => array(
			'add_upload_file_text' => 'انتخاب تصویر' // Change upload button text. Default: "Add or Upload File"
		),
		) );
		
		//movie//
		$cmb = new_cmb2_box( array(
			'id'           => 'box-download',
			'title'        => __( 'باکس دانلود', 'myprefix' ),
			//'hookup'       => false, // We'll handle ourselves. (add_sanitized_values())
			//'cmb_styles'   => false, // We'll handle ourselves. (admin_hooks())
			'context'      => 'normal', // Important for Genesis.
			'priority'     => 'high', // Defaults to 'high'.
			'object_types' => array( 'coagex_movie'),
			'closed'     => true,
		));
		$group_field_id = $cmb->add_field( array(
			'id'          => 'group_field_id',
			'type'        => 'group',
			'description' => __( 'اضافه کنید سریال و فیلم مورد نظر', 'cmb2' ),
			'repeatable'  => true, // use false if you want non-repeatable group
			'options'     => array(
				'group_title'       => __( 'پارت {#}', 'cmb2' ), // since version 1.1.4, {#} gets replaced by row number
				'add_button'        => __( 'افزودن پارت جدید', 'cmb2' ),
				'remove_button'     => __( 'حذف پارت', 'cmb2' ),
				'sortable'          => true,
				'object_types' => array( 'coagex_movie'),
				'closed'     => true,
				// 'closed'         => true, // true to have the groups closed by default
				// 'remove_confirm' => esc_html__( 'Are you sure you want to remove?', 'cmb2' ), // Performs confirmation before removing group.
			),
		) );
		$cmb->add_group_field( $group_field_id, array(
			'name' => 'عنوان فیلم یا سریال',
			'id'   => 'title',
			'type' => 'text',
			// 'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
		) );
		$cmb->add_group_field( $group_field_id, array(
			'name' => 'توضیح کوتاه',
			'description' => 'توضیح کوتاهی وارد کنید',
			'id'   => 'description',
			'type' => 'wysiwyg',
		) );
		$cmb->add_group_field( $group_field_id, array(
			'name' => 'نمایش دکمه پخش آنلاین',
			'id'   => 'quality_checkbox_4',
			'type' => 'checkbox',
		) );
		$cmb->add_group_field( $group_field_id, array(
			'name' => 'عنوان دکمه پخش آنلاین',
			'id'   => 'sub-title_4',
			'type' => 'text',
			// 'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
		) );
		$cmb->add_group_field( $group_field_id, array(
			'name' => 'لینک دکمه پخش آنلاین',
			'id'   => 'sub-link_4',
			'type' => 'text',
			// 'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
		) );
		$cmb->add_group_field($group_field_id, array(
			'name' => __('افزودن لینک دانلود', 'classeitalia'),
			'id' => 'link_products',
			'type' => 'address',
			'repeatable' => true,
			'text' => array(
				  'add_row_text' => 'افزودن',
			),
			'desc' => __('لینک دانلود با کیفیت را قرار بدهید', 'classeitalia'),
		
		));

		//box_download_product//
		$cmb = new_cmb2_box( array(
			'id'           => 'box-download_product',
			'title'        => __( 'باکس دانلود', 'myprefix' ),
			//'hookup'       => false, // We'll handle ourselves. (add_sanitized_values())
			//'cmb_styles'   => false, // We'll handle ourselves. (admin_hooks())
			'context'      => 'normal', // Important for Genesis.
			'priority'     => 'high', // Defaults to 'high'.
			'object_types' => array( 'product'),
			'closed'     => true,
		));
		$group_box_download = $cmb->add_field( array(
			'id'          => 'group_box_download',
			'type'        => 'group',
			'description' => __( 'اضافه کنید سریال و فیلم مورد نظر', 'cmb2' ),
			'repeatable'  => true, // use false if you want non-repeatable group
			'options'     => array(
				'group_title'       => __( 'پارت {#}', 'cmb2' ), // since version 1.1.4, {#} gets replaced by row number
				'add_button'        => __( 'افزودن پارت جدید', 'cmb2' ),
				'remove_button'     => __( 'حذف پارت', 'cmb2' ),
				'sortable'          => true,
				'object_types' => array( 'coagex_movie'),
				'closed'     => true,
				// 'closed'         => true, // true to have the groups closed by default
				// 'remove_confirm' => esc_html__( 'Are you sure you want to remove?', 'cmb2' ), // Performs confirmation before removing group.
			),
		) );
		$cmb->add_group_field( $group_box_download, array(
			'name' => 'عنوان فیلم یا سریال',
			'id'   => 'title_product',
			'type' => 'text',
			// 'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
		) );
		$cmb->add_group_field( $group_box_download, array(
			'name' => 'توضیح کوتاه',
			'description' => 'توضیح کوتاهی وارد کنید',
			'id'   => 'description_product',
			'type' => 'wysiwyg',
		) );
		$cmb->add_group_field($group_box_download, array(
			'name' => __('افزودن لینک دانلود', 'classeitalia'),
			'id' => 'link_products_product',
			'type' => 'boxdl',
			'repeatable' => true,
			'text' => array(
				  'add_row_text' => 'افزودن',
			),
			'desc' => __('لینک دانلود با کیفیت را قرار بدهید', 'classeitalia'),
		
		));
		//movie_cat//
		$cmb = new_cmb2_box( array(
			'id'           => 'cat-movie',
			'title'        => __( 'تنظیمات پیشرفته', 'myprefix' ),
			//'hookup'       => false, // We'll handle ourselves. (add_sanitized_values())
			//'cmb_styles'   => false, // We'll handle ourselves. (admin_hooks())
			'context'      => 'normal', // Important for Genesis.
			'priority'     => 'high', // Defaults to 'high'.
			'object_types' => array( 'term'),
			'taxonomies'       => array( 
				'movie_cat',
				'honarmandan',
				'category',
				'worldsub_tag',
				'post_tag',
				'product_cat',
				'product_tag',
				'sedapishegan'
			),
		));
		$cmb->add_field(  array(
			'name' => 'تصویر پس زمینه',
			'desc' => __( 'ابعاد تصویر 610*1440 پیکسل', 'myprefix' ),
			'id'   => 'cat-img',
			'type' => 'file',
					// Optional:
		'options' => array(
			'url' => true, // Hide the text input for the url
		),
		'text'    => array(
			'add_upload_file_text' => 'انتخاب تصویر' // Change upload button text. Default: "Add or Upload File"
		),

		) );
		$cmb->add_field( array(
			'name'             => 'انتخاب هدر',
			'desc'             => 'هدر خود را انتخاب کنید',
			'id'               => 'wiki_header_select',
			'type'             => 'select',
			'show_option_none' => true,
			'default'          => 'custom',
			'options'          => array(
				'header' => __( 'هدر پیشفرض', 'cmb2' ),
				'header-1' => __( 'هدر دوم', 'cmb2' ),
				'header-2' => __( 'پوش منو', 'cmb2' ),
			),
		) );
		$cmb->add_field( array(
			'name'             => 'انتخاب هدر المنتور',
			'desc'             => 'هدر ساخته شده با المنتور را انتخاب کنید',
			'id'               => 'header_elementor_taxonamy',
			'type'             => 'select',
			'show_option_none' => true,
			'default'          => 'custom',
			'options_cb' => 'netflibs_header_elementor',
		) );
		$cmb->add_field( array(
			'name'             => 'انتخاب فوتر',
			'desc'             => 'فوتر دلخواه خود را انتخاب کنید',
			'id'               => 'wiki_foot_select',
			'type'             => 'select',
			'show_option_none' => true,
			'default'          => 'custom',
			'options'          => array(
				'footer_1' => __( 'فوتر پیشفرض', 'cmb2' ),
				'footer_2'   => __( 'فوتر صفحه دوم', 'cmb2' ),
				'footer_3'     => __( 'فوتر پوسته دانلود زیرنویس', 'cmb2' ),
			),
		) );
		$cmb->add_field( array(
			'name'             => 'انتخاب فوتر المنتور',
			'desc'             => 'فوتر ساخته شده با المنتور را انتخاب کنید',
			'id'               => 'footer_elementor_taxonamy',
			'type'             => 'select',
			'show_option_none' => true,
			//'default'          => 'custom',
			'options_cb' => 'netflibs_single_footer_option',
		) );
		//select//
		$cmb = new_cmb2_box( array(
			'id'           => 'header-select',
			'title'        => __( 'انتخاب هدر و فوتر', 'myprefix' ),
			//'hookup'       => false, // We'll handle ourselves. (add_sanitized_values())
			//'cmb_styles'   => false, // We'll handle ourselves. (admin_hooks())
			'context'      => 'normal', // Important for Genesis.
			'priority'     => 'high', // Defaults to 'high'.
			'object_types' => array( 'page','coagex_movie','post','product'),
		));
		$cmb->add_field( array(
			'name'             => 'انتخاب هدر',
			'desc'             => 'هدر خود را انتخاب کنید',
			'id'               => 'wiki_test_select',
			'type'             => 'select',
			'show_option_none' => true,
			'default'          => 'custom',
			'options'          => array(
				'header' => __( 'هدر پیشفرض', 'cmb2' ),
				'header-1' => __( 'هدر دوم', 'cmb2' ),
				'header-2' => __( 'پوش منو', 'cmb2' ),
			),
		) );
		$cmb->add_field( array(
			'name'             => 'انتخاب هدر المنتور',
			'desc'             => 'هدر ساخته شده با المنتور را انتخاب کنید',
			'id'               => 'header-elementor-select',
			'type'             => 'select',
			'show_option_none' => true,
			'default'          => 'custom',
			'options_cb' => 'netflibs_header_elementor',
		) );
		$cmb->add_field( array(
			'name'             => 'انتخاب فوتر',
			'desc'             => 'فوتر دلخواه خود را انتخاب کنید',
			'id'               => 'wiki_footer_select',
			'type'             => 'select',
			'show_option_none' => true,
			'default'          => 'custom',
			'options'          => array(
				'footer_1' => __( 'فوتر پیشفرض', 'cmb2' ),
				'footer_2'   => __( 'فوتر دوم', 'cmb2' ),
				'footer_3'     => __( 'فوتر سوم', 'cmb2' ),
			),
		) );
		$cmb->add_field( array(
			'name'             => 'انتخاب فوتر المنتور',
			'desc'             => 'فوتر ساخته شده با المنتور را انتخاب کنید',
			'id'               => 'footer_elementor_select',
			'type'             => 'select',
			'show_option_none' => true,
			//'default'          => 'custom',
			'options_cb' => 'netflibs_single_footer_option',
		) );
		$cmb = new_cmb2_box( array(
			'id'           => 'select-sec',
			'title'        => __( 'انتخاب اسلایدر', 'myprefix' ),
			//'hookup'       => false, // We'll handle ourselves. (add_sanitized_values())
			//'cmb_styles'   => false, // We'll handle ourselves. (admin_hooks())
			'context'      => 'normal', // Important for Genesis.
			'priority'     => 'high', // Defaults to 'high'.
			'object_types' => array( 'page','post'),
		));
		$cmb->add_field( array(
			'name'             => 'انتخاب اسلایدر',
			'desc'             => 'اسلایدر پیشفرض وب سایت',
			'id'               => 'wiki_slider_select',
			'type'             => 'select',
			'show_option_none' => true,
			'default'          => 'custom',
			'options'          => array(
				'slid' => __( 'اسلایدر', 'cmb2' ),
				'slidi' => __( 'اسلاید استاتیک', 'cmb2' ),
			),
		) );
		$cmb->add_field( array(
			'name'             => 'اسلایدر المنتور',
			'desc'             => 'اسلایدر یا سربرگ ساخته شده با المنتور',
			'id'               => 'slider_select_elementor',
			'type'             => 'select',
			'show_option_none' => true,
			//'default'          => 'custom',
			'options_cb' => 'coagex_title_head_option',
		) );
		//movie_cat//
		$cmb = new_cmb2_box( array(
			'id'           => 'img-honarmand',
			//'hookup'       => false, // We'll handle ourselves. (add_sanitized_values())
			//'cmb_styles'   => false, // We'll handle ourselves. (admin_hooks())
			'context'      => 'normal', // Important for Genesis.
			'priority'     => 'high', // Defaults to 'high'.
			'object_types' => array( 'term'),
			'taxonomies'       => array( 
				'honarmandan',
				'sedapishegan'
			),
		));
		$cmb->add_field(  array(
			'name' => 'تصویر هنرمند',
			'id'   => 'pic-honarmand',
			'type' => 'file',
					// Optional:
		'options' => array(
			'url' => false, // Hide the text input for the url
		),
		'text'    => array(
			'add_upload_file_text' => 'انتخاب تصویر' // Change upload button text. Default: "Add or Upload File"
		),

		) );
		$cmb = new_cmb2_box( array(
			'id'           => 'bg-cat',
			//'hookup'       => false, // We'll handle ourselves. (add_sanitized_values())
			//'cmb_styles'   => false, // We'll handle ourselves. (admin_hooks())
			'context'      => 'normal', // Important for Genesis.
			'priority'     => 'high', // Defaults to 'high'.
			'object_types' => array( 'term'),
			'taxonomies'       => array( 
				'category',
				'post_tag',
			),
		));
		$cmb->add_field( array(
			'name'             => 'انتخاب اسلایدر',
			'id'               => 'slider_select',
			'type'             => 'select',
			'show_option_none' => true,
			'default'          => 'slider-1',
			'options'          => array(
				'slider-1' => __( 'اسلایدر', 'cmb2' ),
				'slider-2'   => __( 'اسلاید استاتیک', 'cmb2' ),
			),
		) );
		$cmb->add_field( array(
			'name'             => 'اسلایدر المنتور',
			'desc'             => 'اسلایدر یا سربرگ ساخته شده با المنتور',
			'id'               => 'slider_elementor_elementor',
			'type'             => 'select',
			'show_option_none' => true,
			//'default'          => 'custom',
			'options_cb' => 'coagex_title_head_option',
		) );
		$cmb->add_field( array(
			'name'    => 'پس زمینه سربرگ',
			'id'      => 'color_cat',
			'type'    => 'colorpicker',
			'default' => '#fc5d00',
			// 'options' => array(
			// 	'alpha' => true, // Make this a rgba color picker.
			// ),
		) );
		$cmb = new_cmb2_box( array(
			'id'           => 'section-mov',
			'title'        => __( '', 'myprefix' ),
			//'hookup'       => false, // We'll handle ourselves. (add_sanitized_values())
			//'cmb_styles'   => false, // We'll handle ourselves. (admin_hooks())
			'context'      => 'normal', // Important for Genesis.
			'priority'     => 'high', // Defaults to 'high'.
			'object_types' => array( 'term'),
			'taxonomies'       => array( 
				'movie_cat',
				'worldsub_tag',
				'product_cat',
				'product_tag',
			),
		));
		$cmb->add_field( array(
			'name'             => 'دسته‌بندی',
			'id'               => 'category_select',
			'type'             => 'select',
			'show_option_none' => true,
			'default'          => 'category',
			'options'          => array(
				'category' => __( 'دسته بندی', 'cmb2' ),
			),
		) );
		//categor & tag post
		$cmb = new_cmb2_box( array(
			'id'           => 'elementor-sidebar-category',
			'title'        => __( '', 'myprefix' ),
			//'hookup'       => false, // We'll handle ourselves. (add_sanitized_values())
			//'cmb_styles'   => false, // We'll handle ourselves. (admin_hooks())
			'context'      => 'normal', // Important for Genesis.
			'priority'     => 'high', // Defaults to 'high'.
			'object_types' => array( 'term'),
			'taxonomies'       => array( 
				'category',
				'post_tag',
				
			),
		));
		$cmb->add_field( array(
			'name'    => 'انتخاب سایدبار',
			'id'      => 'category_radio_inline',
			'type'    => 'radio_inline',
			'options' => array(
				'none' => __( 'سایدبار ابزارک', 'cmb2' ),
				'sidebar_right'   => __( 'سایدبار سمت راست', 'cmb2' ),
				'sidebar_left'     => __( 'سایدبار سمت چپ', 'cmb2' ),
			),
			'default' => 'none',
		) );
		$cmb->add_field( array(
			'name'             => 'سایدبار المنتور',
			'desc'             => 'سایدبار ساخته شده با المنتور',
			'id'               => 'sidebar_category_elementor',
			'type'             => 'select',
			'show_option_none' => true,
			//'default'          => 'custom',
			'options_cb' => 'coagex_get_sidebar_option',
		) );
		$cmb = new_cmb2_box( array(
			'id'           => 'ads-link',
			'title'        => __( 'لینک تبلیغات', 'myprefix' ),
			//'hookup'       => false, // We'll handle ourselves. (add_sanitized_values())
			//'cmb_styles'   => false, // We'll handle ourselves. (admin_hooks())
			'context'      => 'normal', // Important for Genesis.
			'priority'     => 'high', // Defaults to 'high'.
			'object_types' => array( 'ads'),
		));
		$cmb->add_field( array(
			'name' => __( 'لینک تبلیغ', 'cmb2' ),
			'id'   => 'ads_link',
			'type' => 'text_url',
			// 'protocols' => array( 'http', 'https', 'ftp', 'ftps', 'mailto', 'news', 'irc', 'gopher', 'nntp', 'feed', 'telnet' ), // Array of allowed protocols
		) );
		$cmb = new_cmb2_box( array(
			'id'           => 'elementor-theme-maker',
			'title'        => __( 'تنظیم قالب ساز', 'myprefix' ),
			//'hookup'       => false, // We'll handle ourselves. (add_sanitized_values())
			//'cmb_styles'   => false, // We'll handle ourselves. (admin_hooks())
			'context'      => 'normal', // Important for Genesis.
			'priority'     => 'high', // Defaults to 'high'.
			'object_types' => array( 'post','coagex_movie','product'),
		));
		$cmb->add_field( array(
			'name'             => 'قالب المنتور',
			'id'               => 'theme-post-elementor',
			'type'             => 'select',
			'show_option_none' => true,
			//'default'          => 'custom',
			'options_cb' => 'create_template',
		) );
		$cmb = new_cmb2_box( array(
			'id'           => 'teil',
			'title'        => __( 'تنظیمات چند کیفیتی', 'myprefix' ),
			//'hookup'       => false, // We'll handle ourselves. (add_sanitized_values())
			//'cmb_styles'   => false, // We'll handle ourselves. (admin_hooks())
			'context'      => 'normal', // Important for Genesis.
			'priority'     => 'high', // Defaults to 'high'.
			'object_types' => array( 'make_teil'),
		));
		
		//return $this->cmb;
	}

	/**
	 * Public getter method for retrieving protected/private variables.
	 *
	 * @since 0.1.0
	 *
	 * @param string $field Field to retrieve.
	 *
	 * @throws Exception Throws an exception if the field is invalid.
	 *
	 * @return mixed Field value or exception is thrown
	 */
	public function __get( $field ) {
		if ( 'cmb' === $field ) {
			return $this->init_metabox();
		}

		// Allowed fields to retrieve.
		if ( in_array( $field, array( 'key', 'admin_page', 'metabox_id', 'admin_hook' ), true ) ) {
			return $this->{$field};
		}

		throw new Exception( 'Invalid property: ' . $field );
	}

}

/**
 * Helper function to get/return the Myprefix_Genesis_Settings_Metabox object
 *
 * @since 0.1.0
 *
 * @return Myprefix_Genesis_Settings_Metabox object
 */
function myprefix_genesis_settings_metabox() {
	return Myprefix_Genesis_Settings_Metabox::get_instance();
}

// Get it started.
myprefix_genesis_settings_metabox();