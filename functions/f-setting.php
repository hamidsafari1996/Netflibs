<?php

/**
 * This snippet has been updated to reflect the official supporting of options pages by CMB2
 * in version 2.2.5.
 *
 * If you are using the old version of the options-page registration,
 * it is recommended you swtich to this method.
 */

function coagex_get_post_option()
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


function coagex_get_footer_option()
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

function coagex_get_head_option()
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

add_action( 'cmb2_admin_init', 'woolearn_register_theme_options_metabox' );
/**
 * Hook in and register a metabox to handle a theme options page and adds a menu item.
 */

function woolearn_register_theme_options_metabox() {

    /**
     * Registers options page menu item and form.
     */
    $cmb = new_cmb2_box( array(
        'id'           => 'woolearn_option_metabox',
        'title'        => esc_html__( 'پیکربندی پوسته نتفلیبس', 'woolearn' ),
        'object_types' => array( 'options-page' ),
        
        /*
         * The following parameters are specific to the options-page box
         * Several of these parameters are passed along to add_menu_page()/add_submenu_page().
         */

        'option_key'      => 'NETFLIBS_options', // The option key and admin menu page slug.
        'icon_url'        => 'dashicons-format-video', // Menu icon. Only applicable if 'parent_slug' is left empty.
        'menu_title'      => esc_html__( 'پیکربندی پوسته', 'woolearn' ), // Falls back to 'title' (above).
        // 'parent_slug'     => 'filimo-setting.php', // Make options page a submenu item of the themes menu.
        'capability'      => 'manage_options', // Cap required to view options-page.
        'position'        => 63, // Menu position. Only applicable if 'parent_slug' is left empty.
        // 'admin_menu_hook' => 'network_admin_menu', // 'network_admin_menu' to add network-level options page.
        //'display_cb'      => true, // Override the options-page form output (CMB2_Hookup::options_page_output()).
        'save_button'     => esc_html__( 'ذخیره تنظیمات', 'woolearn' ), // The text for the options-page save button. Defaults to 'Save'.
    ) );

    /*
     * Options fields ids only need
     * to be unique within this box.
     * Prefix is not needed.
     */
    
        
    $cmb->add_field( array(
		'name' => 'تنظیمات کلی ',
        'type' => 'title',
		'id'   => 'group_field_id'
    ) );
    $cmb->add_field( array(
        'name' => __( 'Select Font Awesome Icon', 'cmb' ),
        'id'   => 'iconselect',
        'desc' => 'Select Font Awesome icon',
        'type' => 'faiconselect',
        'options_cb' => 'returnRayFaPre'
    ) );
    //select
    $cmb->add_field( array(
        'name'             => 'انتخاب هدر',
        'desc'             => 'هدر خود را انتخاب کنید',
        'id'               => 'select_header',
        'type'             => 'select',
        'show_option_none' => true,
        //'default'          => 'custom',
        //'options_cb' => 'coagex_get_post_option',
        'options'          => array(
            'header' => __( 'هدر پیشفرض', 'cmb2' ),
            'header-1' => __( 'هدر دوم', 'cmb2' ),
            'header-2' => __( 'پوش منو', 'cmb2' ),
            //'header-3' => __( 'هدر سوم', 'cmb2' ),
        ),
    ) );
    $cmb->add_field( array(
        'name'             => 'انتخاب هدر المنتور',
        'desc'             => 'هدر خود را انتخاب کنید',
        'id'               => 'elementor_header',
        'type'             => 'select',
        'show_option_none' => true,
        //'default'          => 'custom',
        'options_cb' => 'coagex_get_post_option',
    ) );
    $cmb->add_field( array(
        'name'             => 'انتخاب فوتر',
        'desc'             => 'فوتر دلخواه خود را انتخاب کنید',
        'id'               => 'select_footer',
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
        'desc'             => 'فوتر خود را انتخاب کنید',
        'id'               => 'elementor_footer',
        'type'             => 'select',
        'show_option_none' => true,
        //'default'          => 'custom',
        'options_cb' => 'coagex_get_footer_option',
    ) );
    $cmb->add_field( array(
        'name'             => 'انتخاب اسلایدر',
        'desc'             => 'اسلایدر پیشفرض وب سایت',
        'id'               => 'slider_select',
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
        'options_cb' => 'coagex_get_head_option',
    ) );
    $cmb->add_field( array(
        'name'             => 'انتخاب جستجوگر',
        'desc'             => 'جستجوگر ثابت',
        'id'               => 'search_select',
        'type'             => 'select',
        'show_option_none' => true,
        'default'          => 'search',
        'options'          => array(
            'search' => __( 'جستجوگر ثابت', 'cmb2' ),
        ),
    ) );
    $cmb->add_field( array(
        'name'    => 'رنگ جستجوگر',
        'id'      => 'wiki_test_colorpicker',
        'type'    => 'colorpicker',
        'default' => '#C82333',
         'options' => array(
         	'alpha' => true, // Make this a rgba color picker.
         ),
    ) );
    $cmb->add_field( array(
        'name'    => 'رنگ صفحه جستجوگر',
        'id'      => 'bg_colorpicker',
        'type'    => 'colorpicker',
        'default' => '#546E7A',
         'options' => array(
         	'alpha' => true, // Make this a rgba color picker.
         ),
    ) );
    $cmb->add_field( array(
        'name'             => 'انتخاب پست تایپ برای جستجو',
        'desc'             => 'با انتخاب پست تایپ،سرچ بر اساس آن پست تایپ استفاده می‌شود',
        'id'               => 'select_posttype',
        'type'             => 'select',
        'show_option_none' => true,
        'default'          => 'coagex_movie',
        'options'          => array(
            'post' => __( 'نوشته‌ها', 'cmb2' ),
            'page'   => __( 'برگه‌ها', 'cmb2' ),
            'product'     => __( 'ووکامرس', 'cmb2' ),
            'coagex_movie'     => __( 'فیلم و سریال', 'cmb2' ),
        ),
    ) );
    $cmb->add_field( array(
        'name'             => 'انتخاب اسکرول بار',
        'desc'             => 'اسکرولر',
        'id'               => 'scroller_select',
        'type'             => 'select',
        'show_option_none' => false,
        'default'          => 'scroller',
        'options'          => array(
            'scroller' => __( 'اسکرولر', 'cmb2' ),
            'none' => __( 'هیچ', 'cmb2' ),
        ),
    ) );
    $cmb->add_field( array(
        'name'    => 'رنگ اسکرولر',
        'id'      => 'scroller_colorpicker',
        'type'    => 'colorpicker',
        'default' => '#C82333',
         'options' => array(
        	'alpha' => true, // Make this a rgba color picker.
         ),
    ) );
    $cmb->add_field( array(
        'name'             => 'انتخاب شبکه‌های اجتماعی ثابت',
        'id'               => 'socialselect',
        'type'             => 'select',
        'show_option_none' => true,
        'options'          => array(
            'standard' => __( 'شبکه اجتماعی', 'cmb2' ),
        ),
    ) );
    $cmb->add_field( array(
        'name'    => 'رنگ شبکه اجتماعی ثابت',
        'id'      => 'social_colorpicker',
        'type'    => 'colorpicker',
        'default' => '#1877F2',
         'options' => array(
         	'alpha' => true, // Make this a rgba color picker.
         ),
    ) );
    $cmb->add_field( array(
        'name'    => 'رنگ 2 شبکه اجتماعی ثابت',
        'id'      => 'social_color_svg',
        'type'    => 'colorpicker',
        'default' => '#fff',
         'options' => array(
         	'alpha' => true, // Make this a rgba color picker.
         ),
    ) );

    
    $cmb->add_field( array(
        'name'    => 'متن',
        'desc'    => 'متن داخل جستجو',
        'id'      => 'subtitle',
        'type'    => 'text',
    ) );
	$group_field_id = $cmb->add_field( array(
		'id'          => 'header-logo',
		'type'        => 'group',
	    'repeatable'  => false,
		'options'     => array(
			'group_title'       => __( 'تنظیمات لوگو' ), 
			'sortable'          => true,
			'closed'     => true,
		),
	) );
	$cmb->add_group_field( $group_field_id, array(
        'name' => 'لوگوی سایت',
        'desc'    => 'ابعاد لوگوی وب سایت23*83',
		'id'   => 'logo',
		'type' => 'file',
		'options' => array(
			'url' => false, // Hide the text input for the url
		),
	) );
    $cmb->add_group_field( $group_field_id, array(
        'name' => 'لوگوی منوی ریسپانسیو',
		'id'   => 'logo_responsive',
		'type' => 'file',
		'options' => array(
			'url' => false, // Hide the text input for the url
		),
	) );
    $cmb->add_field( array(
		'name' => 'تنظیمات درج کدها ',
        'type' => 'title',
		'id'   => 'group_code_id'
    ) );
    $cmb->add_field( array(
        'name' => 'اسکریپت',
        'desc' => 'اسکریپت خود را بدون تگ اسکریپت بگذارید',
        'id' => 'script-text',
        'type' => 'textarea_code'
    ) );
    $cmb->add_field( array(
        'name' => 'استایل',
        'desc' => 'استایل های خود را وارد کنید',
        'id' => 'style-text',
        'type' => 'textarea_code'
    ) );
    $cmb->add_field( array(
        'name' => 'جی کوئری',
        'desc' => 'جی کوئری یا جاوا اسکریپت خود را اینجا وارد کنید',
        'id' => 'jquery-text',
        'type' => 'textarea_code'
    ) );
    $cmb->add_field( array(
		'name' => 'تنظیمات اسلایدر ',
        'type' => 'title',
		'id'   => 'group_banner_id'
    ) );
    //slider//
	$coagex_banner_group = $cmb->add_field( array(
        'id'          => 'coagex_banner_group',
		'type'        => 'group',
		'description' => '',
		'repeatable'  => true,
		'options'     => array(
			'group_title'   => "اسلایدر {#}",
			'add_button'    => "افزودن اسلایدر",
			'remove_button' => "حذف اسلایدر",
			'closed' => true,
		),
	) );
	$cmb->add_group_field( $coagex_banner_group, array(
        'name' => 'اسلایدر ',
        'desc'    => 'تصویر اسلایدر خود را در سایز 540*1440 انتخاب کنید.',
		'id'   => 'tabligh',
		'type' => 'file',
		'options' => array(
			'url' => false, // Hide the text input for the url
		),
    ) );
    $cmb->add_group_field( $coagex_banner_group, array(
        'name'    => 'مدت زمان فیلم',
        'desc'    => 'مثال:زمان فیلم : 1h 45min',
        'id'      => 'time',
        'type'    => 'text',
    ) );
    $cmb->add_group_field( $coagex_banner_group, array(
        'name'    => 'امتیاز imbd فیلم',
        'desc'    => 'امتیاز از سایت imbd',
        'id'      => 'star',
        'type'    => 'text',
    ) );
    $cmb->add_group_field( $coagex_banner_group, array(
        'name' => 'لینک فیلم در سایت imbd',
        'id'   => 'link_s',
        'type' => 'text_url',
        // 'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
	) );
    $cmb->add_group_field( $coagex_banner_group, array(
        'name'    => 'عنوان',
        'desc'    => 'عنوان فیلم',
        'id'      => 'title',
        'type'    => 'text',
    ) );
    $cmb->add_group_field( $coagex_banner_group, array(
        'name'    => 'توضیح کوتاه فیلم',
        'desc'    => 'توضیح کوتاهی درباره فیلم',
        'id'      => 'test_text',
        'type'    => 'text',
    ) );
    $cmb->add_group_field( $coagex_banner_group, array(
        'name' => 'لینک دکمه',
        'id'   => 'link',
        'type' => 'text',
        // 'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
    ) );
    //slide//
    $coagex_subtitle_group = $cmb->add_field( array(
        'id'          => 'coagex_subtitle_group',
        'type'        => 'group',
        'repeatable'  => false,
        'options'     => array(
            'group_title'       => __( ' اسلاید استاتیک' ), 
            'sortable'          => true,
            'closed'     => true,
        ),
    ) );
    $cmb->add_group_field( $coagex_subtitle_group, array(
        'name'    => 'عنوان',
        'desc'    => 'عنوان را وارد کنید',
        'id'      => 'title',
        'type'    => 'text',
    ) );
    $cmb->add_group_field( $coagex_subtitle_group, array(
        'name'    => 'زیر عنوان',
        'desc'    => 'زیر عنوان را وارد کنید',
        'id'      => 'subtitle',
        'type'    => 'text',
    ) );
    $cmb->add_group_field( $coagex_subtitle_group, array(
        'name'    => 'متن سرچ',
        'desc'    => 'متن داخل سرچر را وارد کنید',
        'id'      => 'search',
        'type'    => 'text',
    ) );
    $cmb->add_group_field( $coagex_subtitle_group, array(
        'name' => 'تصویر ',
        'desc'    => 'تصویر اسلایدر خود را در سایز 540*1440 انتخاب کنید.',
		'id'   => 'slid',
		'type' => 'file',
		'options' => array(
			'url' => false, // Hide the text input for the url
		),
    ) );
    //film
    $cmb->add_field( array(
		'name' => 'تنظیمات فیلم و سریال',
		'type' => 'title',
		'id'   => 'product_movie'
    ) );
    $coagex_product_group = $cmb->add_field( array(
        'id'          => 'coagex_product_group',
        'type'        => 'group',
        'repeatable'  => false,
        'options'     => array(
            'group_title'       => __( 'بارگذاری ویدیوها بر اساس دسته بندی' ), 
            'sortable'          => true,
            'closed'     => true,
        ),
    ) );
    $cmb->add_group_field( $coagex_product_group, array(
        'name'    => '1-عنوان',
        'desc'    => 'عنوان را وارد کنید',
        'id'      => 'title',
        'type'    => 'text',
    ) );
    $cmb->add_group_field( $coagex_product_group, array(
        'name'    => '1- عنوان دکمه',
        'desc'    => 'عنوان دکمه را وارد کنید',
        'id'      => 'title-button',
        'type'    => 'text',
    ) );
    $cmb->add_group_field( $coagex_product_group, array(
        'name'    => '1- لینک دکمه',
        'desc'    => 'لینک دکمه را وارد کنید',
        'id'      => 'link-button',
        'type'    => 'text',
    ) );
    $cmb->add_group_field( $coagex_product_group, array(
        'name'             => '1-ترتیب بر اساس',
        'id'               => 'order_id_1',
        'type'             => 'select',
        'show_option_none' => true,
        'options_cb' => 'show_order_options',
    ) );
    $cmb->add_group_field( $coagex_product_group, array(
        'name'             => '1-فیلتر بر اساس',
        'id'               => 'orderby_id_1',
        'type'             => 'select',
        'show_option_none' => true,
        'options_cb' => 'show_orderby_options',
    ) );
    $cmb->add_group_field( $coagex_product_group, array(
        'name'             => '1-نوع باز شدن لینک',
        'id'               => 'target_select_1',
        'type'             => 'select',
        'show_option_none' => true,
        'default'          => '_blank',
        'options_cb' => 'show_target_options',
    ) );
    $cmb->add_group_field( $coagex_product_group, array(
        'name'    => '1- نامک دسته ویدئو',
        'desc'    => 'نامک یا اسلاگ ویدئو را وارد کنید.',
        'id'      => 'tax',
        'type'    => 'text',
    ) );
    $cmb->add_group_field( $coagex_product_group, array(
        'name' => '1- تعداد نمایش',
        'description' => 'posts_per_page',
        'id'   => 'test_number',
        'type' => 'text',
        'attributes' => array(
            'type' => 'number',
        ),
    ));
    $cmb->add_group_field( $coagex_product_group, array(
        'name' => '1- تصویر پس زمینه',
        'desc'    => 'ابعاد تصویر تبلیغ 610*1440',
		'id'   => 'img-1',
		'type' => 'file',
		'options' => array(
			'url' => true, // Hide the text input for the url
		),
    ) );
    $cmb->add_group_field( $coagex_product_group, array(
        'name'    => '2- عنوان',
        'desc'    => 'عنوان را وارد کنید',
        'id'      => 'title-name',
        'type'    => 'text',
    ) );
    $cmb->add_group_field( $coagex_product_group, array(
        'name'    => '2- عنوان دکمه',
        'desc'    => 'عنوان دکمه را وارد کنید',
        'id'      => 'title2-button',
        'type'    => 'text',
    ) );
    $cmb->add_group_field( $coagex_product_group, array(
        'name'    => '2- لینک دکمه',
        'desc'    => 'لینک دکمه را وارد کنید',
        'id'      => 'link2-button',
        'type'    => 'text',
    ) );
    $cmb->add_group_field( $coagex_product_group, array(
        'name'             => '2-ترتیب بر اساس',
        'id'               => 'order_id_2',
        'type'             => 'select',
        'show_option_none' => true,
        'options_cb' => 'show_order_options',
    ) );
    $cmb->add_group_field( $coagex_product_group, array(
        'name'             => '2-فیلتر بر اساس',
        'id'               => 'orderby_id_2',
        'type'             => 'select',
        'show_option_none' => true,
        'options_cb' => 'show_orderby_options',
    ) );
    $cmb->add_group_field( $coagex_product_group, array(
        'name'             => '2-نوع باز شدن لینک',
        'id'               => 'target_select_2',
        'type'             => 'select',
        'show_option_none' => true,
        'default'          => '_blank',
        'options_cb' => 'show_target_options',
    ) );
    $cmb->add_group_field( $coagex_product_group, array(
		'name'    => '2- نامک دسته ویدئو',
		'desc'    => 'نامک یا اسلاگ ویدئو را وارد کنید.',
		'id'      => 'tax-mov',
		'type'    => 'text',
    ) );
    $cmb->add_group_field( $coagex_product_group, array(
        'name' => '2- تعداد نمایش',
        'description' => 'posts_per_page',
        'id'   => 'test1_number',
        'type' => 'text',
        'attributes' => array(
            'type' => 'number',
        ),
    ));
    $cmb->add_group_field( $coagex_product_group, array(
        'name' => '2- تصویر پس زمینه',
        'desc'    => 'ابعاد تصویر تبلیغ 610*1440',
		'id'   => 'img-2',
		'type' => 'file',
		'options' => array(
			'url' => true, // Hide the text input for the url
		),
    ) );
    $cmb->add_group_field( $coagex_product_group, array(
        'name'    => '3- عنوان',
        'desc'    => 'عنوان را وارد کنید',
        'id'      => 'title-slug',
        'type'    => 'text',
    ) );
    $cmb->add_group_field( $coagex_product_group, array(
        'name'    => '3- عنوان دکمه',
        'desc'    => 'عنوان دکمه را وارد کنید',
        'id'      => 'title3-button',
        'type'    => 'text',
    ) );
    $cmb->add_group_field( $coagex_product_group, array(
        'name'    => '3- لینک دکمه',
        'desc'    => 'لینک دکمه را وارد کنید',
        'id'      => 'link3-button',
        'type'    => 'text',
    ) );
    $cmb->add_group_field( $coagex_product_group, array(
        'name'             => '3-ترتیب بر اساس',
        'id'               => 'order_id_3',
        'type'             => 'select',
        'show_option_none' => true,
        'options_cb' => 'show_order_options',
    ) );
    $cmb->add_group_field( $coagex_product_group, array(
        'name'             => '3-فیلتر بر اساس',
        'id'               => 'orderby_id_3',
        'type'             => 'select',
        'show_option_none' => true,
        'options_cb' => 'show_orderby_options',
    ) );
    $cmb->add_group_field( $coagex_product_group, array(
        'name'             => '3-نوع باز شدن لینک',
        'id'               => 'target_select_3',
        'type'             => 'select',
        'show_option_none' => true,
        'default'          => '_blank',
        'options_cb' => 'show_target_options',
    ) );
    $cmb->add_group_field( $coagex_product_group, array(
		'name'    => '3- نامک دسته ویدئو',
		'desc'    => 'نامک یا اسلاگ ویدئو را وارد کنید.',
		'id'      => 'tax-film',
		'type'    => 'text',
    ) );
    $cmb->add_group_field( $coagex_product_group, array(
        'name' => '3- تعداد نمایش',
        'description' => 'posts_per_page',
        'id'   => 'test2_number',
        'type' => 'text',
        'attributes' => array(
            'type' => 'number',
        ),
    ));
    $cmb->add_group_field( $coagex_product_group, array(
        'name' => '3- تصویر پس زمینه',
        'desc'    => 'ابعاد تصویر تبلیغ 610*1440',
		'id'   => 'img-3',
		'type' => 'file',
		'options' => array(
			'url' => true, // Hide the text input for the url
		),
    ) );
    $coagex_while_film_group = $cmb->add_field( array(
        'id'          => 'coagex_while_film_group',
        'type'        => 'group',
        'description' => '',
        'repeatable'  => true,
        'options'     => array(
            'group_title'   => "دسته فیلم {#}",
            'add_button'    => "افزودن دسته فیلم",
            'remove_button' => "حذف دسته",
            'closed' => true,
        ),
    ) );
    $cmb->add_group_field( $coagex_while_film_group, array(
        'name'    => 'عنوان',
        'desc'    => 'عنوان را وارد کنید',
        'id'      => 'title',
        'type'    => 'text',
    ) );
    $cmb->add_group_field( $coagex_while_film_group, array(
        'name'    => 'عنوان دکمه',
        'desc'    => 'مثل: بیشتر | مشاهده همه',
        'id'      => 'subtitle',
        'type'    => 'text',
    ) );
    $cmb->add_group_field( $coagex_while_film_group, array(
        'name'    => 'لینک دکمه',
        'desc'    => 'لینک دکمه را وارد کنید',
        'id'      => 'link',
        'type'    => 'text',
    ) );
    $cmb->add_group_field( $coagex_while_film_group, array(
        'name'             => 'ترتیب بر اساس',
        'id'               => 'order_id_4',
        'type'             => 'select',
        'show_option_none' => true,
        'options_cb' => 'show_order_options',
    ) );
    $cmb->add_group_field( $coagex_while_film_group, array(
        'name'             => 'فیلتر بر اساس',
        'id'               => 'orderby_id_4',
        'type'             => 'select',
        'show_option_none' => true,
        'options_cb' => 'show_orderby_options',
    ) );
    $cmb->add_group_field( $coagex_while_film_group, array(
        'name'             => 'نوع باز شدن لینک',
        'id'               => 'target_select_4',
        'type'             => 'select',
        'show_option_none' => true,
        'default'          => '_blank',
        'options_cb' => 'show_target_options',
    ) );
    $cmb->add_group_field( $coagex_while_film_group, array(
        'name'    => 'نامک دسته ویدئو',
        'desc'    => 'نامک یا اسلاگ ویدئو را وارد کنید.',
        'id'      => 'tax',
        'type'    => 'text',
    ) );
    $cmb->add_group_field( $coagex_while_film_group, array(
        'name' => 'تعداد نمایش',
        'description' => 'posts_per_page',
        'id'   => 'test_number',
        'type' => 'text',
        'attributes' => array(
            'type' => 'number',
        ),
    ));
    $cmb->add_field( array(
		'name' => 'تنظیمات بلاگ',
		'type' => 'title',
		'id'   => 'blog_group'
	) );
    $coagex_blog_group = $cmb->add_field( array(
		'id'          => 'coagex_blog_group',
		'type'        => 'group',
	    'repeatable'  => false,
		'options'     => array(
			'group_title'       => __( 'تنظیمات وبلاگ' ), 
			'sortable'          => true,
			'closed'     => true,
		),
    ) );
    $cmb->add_group_field( $coagex_blog_group, array(
        'name'    => 'عنوان',
        'desc'    => 'مثال: آخرین اخبار| بلاگ |',
        'id'      => 'title',
        'type'    => 'text',
    ) );
    $cmb->add_group_field( $coagex_blog_group, array(
        'name'    => 'عنوان لینک',
        'desc'    => 'عنوانی برای لینک وارد کنید|مثل: مشاهده همه | بیشتر',
        'id'      => 'title_l',
        'type'    => 'text',
    ) );
    $cmb->add_group_field( $coagex_blog_group, array(
        'name'    => 'لینک',
        'desc'    => 'لینک را وارد کنید',
        'id'      => 'link',
        'type'    => 'text',
    ) );
    $cmb->add_group_field( $coagex_blog_group, array(
        'name' => 'تعداد نمایش',
        'description' => 'posts_per_page',
        'id'   => 'test_number',
        'type' => 'text',
        'attributes' => array(
            'type' => 'number',
        ),
    ));
    $cmb->add_field( array(
        'name'             => 'استایل بلاگ',
        'id'               => 'blog-select',
        'type'             => 'select',
        'show_option_none' => true,
        'default'          => 'blog',
        'options'          => array(
            'blog' => __( 'بلاگ پیشفرض', 'cmb2' ),
            'card' => __( 'بلاگ کارد', 'cmb2' ),
        ),
    ) );
    $cmb->add_field( array(
        'name'    => 'عنوان هنرمندان',
        'desc'    => 'عنوانی به جای هنرمندان وارد کنید',
        'id'      => 'title_artist',
        'default' => 'هنرمندان',
        'type'    => 'text',
    ) );
    $cmb->add_field( array(
        'name'    => 'عنوان صداپیشگان',
        'desc'    => 'عنوانی به جای صداپیشگان وارد کنید',
        'id'      => 'title_singer',
        'default' => 'صداپیشگان',
        'type'    => 'text',
    ) );
    //social//
    $cmb->add_field( array(
		'name' => 'تنظیمات فوتر',
		'type' => 'title',
		'id'   => 'coagex_social'
	) );
    $coagex_social_group = $cmb->add_field( array(
		'id'          => 'coagex_social_group',
		'type'        => 'group',
		'description' => '',
		'repeatable'  => true,
		'options'     => array(
			'group_title'   => "شبکه اجتماعی {#}",
			'add_button'    => "افزودن شبکه اجتماعی",
			'remove_button' => "حذف شبکه اجتماعی",
			'closed' => true,
		),
    ) );
    $cmb->add_group_field( $coagex_social_group, array(
        'name'    => 'آیکون شبکه اجتماعی',
        'desc'    => '<a target="_balnk" href="http://fontawesome.io/3.2.1/icons/">انتخاب  آیکون شبکه اجتماعی</a> ',
        'id'      => 'title',
        'type'    => 'text',
    ) );
    $cmb->add_group_field( $coagex_social_group, array(
        'name'    => 'لینک شبکه اجتماعی',
        'desc'    => 'لینک شبکه اجتماعی خود را کپی کنید',
        'id'      => 'link',
        'type'    => 'text_url',
    ) );
    $cmb->add_group_field( $coagex_social_group, array(
        'name'    => 'نام شبکه اجتماعی',
        'desc'    => 'نام شبکه اجتماعی را وارد  کنید',
        'id'      => 'subtitle',
        'type'    => 'text',
    ) );
    //cat//
    $cmb->add_field( array(
        'name'             => 'انتخاب دسته',
        'desc'             => 'دسته‌ها برای فوتر',
        'id'               => 'select_taxonamy',
        'type'             => 'select',
        'show_option_none' => true,
        'default'          => 'custom',
        'options'          => array(
            'taxonamy_1' => __( 'دسته‌های ویدیو', 'cmb2' ),
            'taxonamy_2'   => __( 'برچسب ویدیو', 'cmb2' ),
            'taxonamy_3'     => __( 'دسته‌ی نوشته‌ها', 'cmb2' ),
            'taxonamy_4'     => __( 'برچسب نوشته‌ها', 'cmb2' ),
            'taxonamy_5'     => __( 'هنرمندان', 'cmb2' ),
        ),
    ) );
    $cmb->add_field( array(
        'name'             => 'انتخاب دسته',
        'desc'             => 'دسته‌ها برای فوتر',
        'id'               => 'select_cat',
        'type'             => 'select',
        'show_option_none' => true,
        'default'          => 'custom',
        'options'          => array(
            'taxonamy_1' => __( 'دسته‌های ویدیو', 'cmb2' ),
            'taxonamy_2'   => __( 'برچسب ویدیو', 'cmb2' ),
            'taxonamy_3'     => __( 'دسته‌ی نوشته‌ها', 'cmb2' ),
            'taxonamy_4'     => __( 'برچسب نوشته‌ها', 'cmb2' ),
            'taxonamy_5'     => __( 'هنرمندان', 'cmb2' ),
        ),
    ) );
    //App//
    $coagex_app_title_group = $cmb->add_field( array(
        'id'          => 'coagex_app_title_group',
        'description' => 'اپلیکیشن های مورد نظر در فوتر',
		'type'        => 'group',
	    'repeatable'  => false,
		'options'     => array(
			'group_title'       => __( 'تنظیمات اپ' ), 
			'sortable'          => true,
			'closed'     => true,
		),
    ) );
    $cmb->add_group_field( $coagex_app_title_group, array(
        'name'    => 'عنوان',
        'desc'    => 'عنوان خود را وارد کنید ',
        'id'      => 'title',
        'type'    => 'text',
    ) );
    $coagex_App_group = $cmb->add_field( array(
        'id'          => 'coagex_App_group',
        'type'        => 'group',
        'description' => '',
        'repeatable'  => true,
        'options'     => array(
            'group_title'   => "اپ {#}",
            'add_button'    => "افزودن اپ",
            'remove_button' => "حذف اپ",
            'closed' => true,
        ),
    ) );
    $cmb->add_group_field( $coagex_App_group, array(
        'name'    => 'آیکون اپلیکیشن',
        'desc'    => '<a target="_balnk" href="http://fontawesome.io/3.2.1/icons/">انتخاب  آیکون</a> ',
        'id'      => 'icon',
        'type'    => 'text',
    ) );
    $cmb->add_group_field( $coagex_App_group, array(
        'name'    => 'توضیع کدام نسخه',
        'desc'    => 'نام پلتفرم برای اپ',
        'id'      => 'title',
        'type'    => 'text',
    ) );
    $cmb->add_group_field( $coagex_App_group, array(
        'name'    => 'لینک اپلیکیشن',
        'desc'    => 'لینک اپلیکیشن خود را وارد کنید.',
        'id'      => 'link',
        'type'    => 'text',
    ) );
    //desc//
    $cmb->add_field( array(
		'name' => ' پخش تنظیمات درباره سایت و حق کپی رایت',
		'type' => 'title',
		'id'   => 'group_desc_id'
	) );
	$group_desc_id = $cmb->add_field( array(
		'id'          => 'group_desc_id',
		'type'        => 'group',
	    'repeatable'  => false,
		'options'     => array(
			'group_title'       => __( 'تنظیمات درباره سایت و حق کپی رایت' ), 
			'sortable'          => true,
			'closed'     => true,
		),
    ) );
    $cmb->add_group_field( $group_desc_id, array(
        'name'    => 'توضیح کوتاه درباره سایت',
        'desc'    => 'توضیح کوتاهی درباره سایت خود اضافه کنید',
        'id'      => 'desc',
        'type'    => 'wysiwyg',
	    'options' => array(),
    ) );
    $cmb->add_group_field( $group_desc_id, array(
        'name'    => 'حق وب سایت',
        'desc'    => 'مثال:NETFLIX.COM 2020',
        'id'      => 'title',
        'type'    => 'text',
    ) );


    $cmb->add_field( array(
		'name' => 'تنظیمات متفرقه',
		'type' => 'title',
		'id'   => 'motofar_net'
    ) );
    //cat//
    $coagex_cat_group = $cmb->add_field( array(
        'id'          => 'coagex_cat_group',
        'type'        => 'group',
        'description' => 'دسته بندی را وارد کنید',
        'repeatable'  => true,
        'options'     => array(
            'group_title'   => "دسته بندی {#}",
            'add_button'    => "افزودن دسته",
            'remove_button' => "حذف دسته",
            'closed' => true,
        ),
    ) );
    $cmb->add_group_field( $coagex_cat_group, array(
        'name'    => 'عنوان',
        'desc'    => 'عنوان دسته',
        'id'      => 'title',
        'type'    => 'text',
    ) );
    $cmb->add_group_field( $coagex_cat_group, array(
        'name'    => 'لینک دکمه',
        'desc'    => 'لینک دسته بندی خود را کپی کنید',
        'id'      => 'test_text',
        'type'    => 'text',
    ) );
    //service//
	$coagex_service_group = $cmb->add_field( array(
		'id'          => 'coagex_service_group',
		'type'        => 'group',
		'description' => 'سرویس های خود را وارد کنید',
		'repeatable'  => true,
		'options'     => array(
			'group_title'   => "سرویس {#}",
			'add_button'    => "افزودن سرویس",
			'remove_button' => "حذف سرویس",
			'closed' => true,
		),
    ) );
    $cmb->add_group_field( $coagex_service_group, array(
        'name'    => 'عنوان',
        'desc'    => 'عنوان سرویس',
        'id'      => 'title',
        'type'    => 'text',
    ) );
    $cmb->add_group_field( $coagex_service_group, array(
        'name'    => 'نام آیکون',
        'desc'    => '<a target="_balnk" href="http://fontawesome.io/3.2.1/icons/">انتخاب آیکون</a>',
        'id'      => 'test_text',
        'type'    => 'text',
    ) );
    //service//
	$coagex_service_two_group = $cmb->add_field( array(
		'id'          => 'coagex_service_two_group',
		'type'        => 'group',
		'description' => 'سرویس های دیگر را وارد کنید',
		'repeatable'  => true,
		'options'     => array(
			'group_title'   => "سرویس {#}",
			'add_button'    => "افزودن سرویس",
			'remove_button' => "حذف سرویس",
			'closed' => true,
		),
    ) );
    $cmb->add_group_field( $coagex_service_two_group, array(
        'name'    => 'عنوان',
        'desc'    => 'عنوان سرویس',
        'id'      => 'title',
        'type'    => 'text',
    ) );
    $cmb->add_group_field( $coagex_service_two_group, array(
        'name'    => 'نام آیکون',
        'desc'    => '<a target="_balnk" href="http://fontawesome.io/3.2.1/icons/">انتخاب آیکون</a>',
        'id'      => 'test_text',
        'type'    => 'text',
    ) );
    $coagex_lawe_group = $cmb->add_field( array(
        'id'          => 'coagex_lawe_group',
        'desc'    => 'قوانین برای درج دیدگاه ها',
		'type'        => 'group',
		'repeatable'  => false,
		'options'     => array(
			'group_title'       => __( 'درج بند' ), 
			'sortable'          => true,
			'closed'     => true,
		),
    ) );
    $cmb->add_group_field( $coagex_lawe_group, array(
        'name'    => 'بند قوانین',
        'desc'    => 'قوانین مورد نظر را وارد کنید',
        'id'      => 'title',
        'type'    => 'wysiwyg',
    ) );


    $cmb->add_field( array(
		'name' => 'تنظیمات تبلیغات',
		'type' => 'title',
		'id'   => 'ads_setting'
    ) );
    $cmb->add_field( array(
        'name'             => 'انتخاب تبلیغ',
        'desc'             => 'نوع بارگذاری تبلیغ خود را انتخاب کنید',
        'id'               => 'tabligh_select',
        'type'             => 'select',
        'show_option_none' => true,
        'default'          => 'setting-tabligh',
        'options'          => array(
            'setting-tabligh' => __( 'از وب سایت', 'cmb2' ),
            'yektanet-tabligh' => __( 'از پلتفرم‌هایی مانند یکتانت', 'cmb2' ),
        ),
    ) );
    $cmb->add_field( array(
        'name' => 'کد html دریافتی',
        'desc' => 'کد html دریافتی از یکتانت را بارگذاری کنید',
        'id' => 'tabligh-html',
        'type' => 'textarea_code'
    ) );
    $coagex_tizer_especial_group = $cmb->add_field( array(
        'id'          => 'coagex_tizer_especial_group',
		'type'        => 'group',
		'repeatable'  => false,
		'options'     => array(
			'group_title'       => __( 'عنوان' ), 
			'sortable'          => true,
			'closed'     => true,
		),
    ) );
    $cmb->add_group_field( $coagex_tizer_especial_group, array(
        'name'    => 'عنوان',
        'desc'    => 'مثال : مطالب پیشنهادی از سراسر وب',
        'id'      => 'title_1',
        'type'    => 'text',
    ) );
    $ads_posttype_setting = $cmb->add_field( array(
		'id'          => 'ads_posttype_setting',
		'type'        => 'group',
	    'repeatable'  => false,
		'options'     => array(
			'group_title'       => __( 'تنظیمات تبلیغات' ), 
			'sortable'          => true,
			'closed'     => true,
		),
    ) );
    $cmb->add_group_field( $ads_posttype_setting, array(
        'name'             => 'ترتیب بر اساس',
        'id'               => 'order_id',
        'type'             => 'select',
        'show_option_none' => true,
        'options_cb' => 'show_order_options',
    ) );
    $cmb->add_group_field( $ads_posttype_setting, array(
        'name'             => 'فیلتر بر اساس',
        'id'               => 'orderby_id',
        'type'             => 'select',
        'show_option_none' => true,
        'options_cb' => 'show_orderby_options',
    ) );
    $cmb->add_group_field( $ads_posttype_setting, array(
        'name'             => 'نوع باز شدن تبلیغ',
        'id'               => 'target_select',
        'type'             => 'select',
        'show_option_none' => true,
        'default'          => '_blank',
        'options_cb' => 'show_target_options',
    ) );
    $cmb->add_group_field( $ads_posttype_setting, array(
        'name' => 'تعداد نمایش',
        'description' => 'posts_per_page',
        'id'   => 'test_number',
        'type' => 'text',
        'attributes' => array(
            'type' => 'number',
        ),
    ));
    $cmb->add_field( array(
		'name' => 'تنظیمات بارگذاری ویدیو',
		'type' => 'title',
		'id'   => 'youtube_net'
    ) );
    $cmb->add_field( array(
        'name'             => 'نوع پلیر',
        'desc'             => 'پلیر پخش کننده را وارد کنید',
        'id'               => 'select_player',
        'type'             => 'select',
        'show_option_none' => true,
        'default'          => 'defult',
        'options'          => array(
            'defult' => __( 'پیشفرض', 'cmb2' ),
            'plyr'   => __( 'افزونه', 'cmb2' ),
        ),
    ) );
    $cmb->add_field( array(
        'name'    => 'شرت کد',
        'desc'    => 'شرت کد افزونه را وارد کنید',
        'id'      => 'shortcode_player',
        'type'    => 'text',
    ) );
    $cmb->add_field( array(
        'name'             => 'نوع بارگذاری',
        'desc'             => 'انتخاب نوع بارگذاری ویدیو',
        'id'               => 'select_video',
        'type'             => 'select',
        'show_option_none' => true,
        'default'          => 'video',
        'options'          => array(
            'video' => __( 'از هاست', 'cmb2' ),
            'youtube'   => __( 'از یوتیوب', 'cmb2' ),
        ),
    ) );
    $coagex_film_group = $cmb->add_field( array(
        'id'          => 'coagex_film_group',
        'description' => 'ویدیو‌ی پیشنهادی خود را وارد کنید',
		'type'        => 'group',
	    'repeatable'  => false,
		'options'     => array(
			'group_title'       => __( 'تنظیمات ویدئو پیشنهادی' ), 
			'sortable'          => true,
			'closed'     => true,
		),
    ) );
    $cmb->add_group_field( $coagex_film_group, array(
        'name' => 'تصویر فیلم',
        'desc'    => 'ابعاد تصویر ویدئو 720*1280',
		'id'   => 'logo',
		'type' => 'file',
		'options' => array(
			'url' => false, // Hide the text input for the url
		),
	) );
	$cmb->add_group_field( $coagex_film_group, array(
        'name' => 'لینک ویدئو',
        'desc'    => 'لینک ویدئو را اضافه کنید.',
        'id'   => 'link_h',
        'type' => 'text_url',
        // 'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
    ) );
    $cmb->add_group_field( $coagex_film_group, array(
        'name' => 'زیرنویس فیلم',
        'desc'    => 'لینک زیرنویس',
		'id'   => 'subtitile',
		'type' => 'text',
    ) );

    //page-section//
    $cmb->add_field( array(
        'name' => 'تنظیمات صفحه‌هات داخلی',
        'type' => 'title',
        'id'   => 'motofa_contact'
    ) );
    $coagex_motofa_group = $cmb->add_field( array(
        'id'          => 'coagex_motofa_group',
        'type'        => 'group',
        'repeatable'  => false,
        'options'     => array(
            'group_title'       => __( 'تنظیمات صفحه سرچ' ), 
            'sortable'          => true,
            'closed'     => true,
        ),
    ) );
    $cmb->add_group_field( $coagex_motofa_group, array(
        'name'             => 'طرح صفحه',
        'id'               => 'select_dis',
        'type'             => 'select',
        'show_option_none' => true,
        'default'          => 'list',
        'options_cb' => 'show_display_search',
    ) );
    $cmb->add_group_field( $coagex_motofa_group, array(
        'name' => 'اسلایدر ',
        'desc'    => 'تصویر اسلاید خود را در سایز 310*1440 انتخاب کنید.',
		'id'   => 'slid',
		'type' => 'file',
		'options' => array(
			'url' => false, // Hide the text input for the url
		),
    ) );
    $cmb->add_group_field( $coagex_motofa_group, array(
        'name'    => 'متن داخل جستجو',
        'desc'    => 'مثال: نام فیلم خود را وارد کنید',
        'id'      => 'p_search',
        'type'    => 'text',
    ) );
    $coagex_404_group = $cmb->add_field( array(
        'id'          => 'coagex_404_group',
        'type'        => 'group',
        'repeatable'  => false,
        'options'     => array(
            'group_title'       => __( 'تنظیمات صفحه 404' ), 
            'sortable'          => true,
            'closed'     => true,
        ),
    ) );
    $cmb->add_group_field( $coagex_404_group, array(
        'name'             => 'طرح صفحه',
        'id'               => 'select_404',
        'type'             => 'select',
        'show_option_none' => true,
        'default'          => 'list',
        'options_cb' => 'show_display_404',
    ) );
    $cmb->add_group_field( $coagex_404_group, array(
        'name'             => 'قالب المنتور',
        'id'               => 'theme-404-elementor',
        'type'             => 'select',
        'show_option_none' => true,
        //'default'          => 'custom',
        'options_cb' => 'create_template_404',
    ) );
    $cmb->add_group_field( $coagex_404_group, array(
        'name' => 'تصویر پس زمینه ',
        'desc'    => 'تصویر پس زمینه صفحه 404 در ابعاد 1300*1400 را انتخاب کنید',
		'id'   => 'not',
		'type' => 'file',
		'options' => array(
			'url' => false, // Hide the text input for the url
		),
    ) );
    $cmb->add_group_field( $coagex_404_group, array(
        'name' => 'تصویر رویه ',
        'desc'    => 'تصویر رویه صفحه 404 را در ابعاد 400*900 انتخاب کنید',
		'id'   => 'foundslid',
		'type' => 'file',
		'options' => array(
			'url' => false, // Hide the text input for the url
		),
    ) );
    $cmb->add_group_field( $coagex_404_group, array(
        'name'    => 'عنوان دکمه',
        'desc'    => 'مثال: بازگشت به خانه',
        'id'      => 'title',
        'type'    => 'text',
    ) );
    $cmb->add_group_field( $coagex_404_group, array(
        'name'    => 'لینک دکمه',
        'desc'    => 'لینک دکمه خود را وارد کنید.',
        'id'      => 'link',
        'type'    => 'text',
    ) );
    //account-section//
    $cmb->add_field( array(
        'name' => 'تنظیمات صفحه حساب کاربری',
        'type' => 'title',
        'id'   => 'account_contact'
    ) );
    $coagex_notification_group = $cmb->add_field( array(
        'id'          => 'coagex_notification_group',
        'type'        => 'group',
        'repeatable'  => false,
        'options'     => array(
            'group_title'       => __( 'تنظیم اعلانات هدر صفحه حساب کاربری ' ), 
            'sortable'          => true,
            'closed'     => true,
        ),
    ) );
    $cmb->add_group_field( $coagex_notification_group, array(
        'name'             => 'اعلانات',
        'description' => 'انتخاب دسته',
        'id'               => 'notification_select',
        'type'             => 'text',
    ) );
    $cmb->add_group_field( $coagex_notification_group, array(
        'name' => 'تعداد نمایش',
        'description' => 'posts_per_page',
        'id'   => 'test_number',
        'type' => 'text',
        'attributes' => array(
            'type' => 'number',
        ),
    ));
    $account_slider = $cmb->add_field( array(
        'id'          => 'account_slider',
		'type'        => 'group',
		'description' => '',
		'repeatable'  => true,
		'options'     => array(
			'group_title'   => "اسلایدر {#}",
			'add_button'    => "افزودن اسلایدر",
			'remove_button' => "حذف اسلایدر",
			'closed' => true,
		),
	) );
	$cmb->add_group_field( $account_slider, array(
        'name' => 'اسلایدر',
        'desc'    => 'تصاویر اسلایدر خود را وارد کنید',
		'id'   => 'slider-pic',
		'type' => 'file',
		'options' => array(
			'url' => false, // Hide the text input for the url
		),
    ) );
    $cmb->add_group_field( $account_slider, array(
        'name'    => 'لینک بنر',
        'id'      => 'link-banner',
        'type'    => 'text',
    ) );
    $notification_header = $cmb->add_field( array(
        'id'          => 'notification_header',
        'type'        => 'group',
        'repeatable'  => false,
        'options'     => array(
            'group_title'       => __( 'تنظیمات باکس سفارشی' ), 
            'sortable'          => true,
            'closed'     => true,
        ),
    ) );
    $cmb->add_group_field( $notification_header, array(
        'name'    => 'نام دلخواه باکس سفارشی',
        'default' => 'تیکت‌های پشتیبانی',
        'id'      => 'text-ticket',
        'type'    => 'text',
    ) );
    $cmb->add_group_field( $notification_header, array(
        'name'    => 'آیکون',
        'default' => 'fas fa-ticket-alt',
        'id'      => 'text-icon',
        'type'    => 'text',
    ) );
    $cmb->add_group_field( $notification_header, array(
        'name'    => 'لینک باکس دلخواه',
        'id'      => 'link-ticket',
        'type'    => 'text',
    ) );
    $coupon_section = $cmb->add_field( array(
        'id'          => 'coupon_section',
        'type'        => 'group',
        'repeatable'  => false,
        'options'     => array(
            'group_title'       => __( 'تنظیمات باکس پایین سمت راست' ), 
            'sortable'          => true,
            'closed'     => true,
        ),
    ) );
    $cmb->add_group_field( $coupon_section, array(
        'name'    => 'نام دلخواه',
        'default' => 'تخفیف های ویژه',
        'id'      => 'header-title',
        'type'    => 'text',
    ) );
    $cmb->add_group_field( $coupon_section, array(
        'name'    => 'نام تخفیف',
        'default' => 'takhfif100',
        'id'      => 'body-text',
        'type'    => 'text',
    ) );
    
}

/**
 * Wrapper function around cmb2_get_option
 * @since  0.1.0
 * @param  string $key     Options array key
 * @param  mixed  $default Optional default value
 * @return mixed           Option value
 */
function woolearn_get_option( $key = '', $default = false ) {
    if ( function_exists( 'cmb2_get_option' ) ) {
        // Use cmb2_get_option as it passes through some key filters.
        return cmb2_get_option( 'NETFLIBS_options', $key, $default );
    }

    // Fallback to get_option if CMB2 is not loaded yet.
    $opts = get_option( 'NETFLIBS_options', $default );

    $val = $default;

    if ( 'all' == $key ) {
        $val = $opts;
    } elseif ( is_array( $opts ) && array_key_exists( $key, $opts ) && false !== $opts[ $key ] ) {
        $val = $opts[ $key ];
    }

    return $val;
}