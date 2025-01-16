<?php

define("path",get_template_directory_uri());

function netflibs_setup(){
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('woocommerce');
    add_theme_support('wc-product-gallery-slider');
    register_nav_menus(
        array(
            'header-main-menu' => 'منوی اصلی',
            'footer-main-menu' => 'منوی فوتر',
            'push-menu' => 'پوش منو',
            'responsive-menu' => 'منوی موبایل',
        )
    );
}
add_action("after_setup_theme","netflibs_setup");

require_once dirname( __FILE__ ) . '/cmb2/init.php';

require_once dirname( __FILE__ ) . '/functions/f-setting.php';
require_once dirname( __FILE__ ) . '/functions/cmb2-metabox.php';
require_once dirname( __FILE__ ) . '/functions/booke-post_type.php';
require_once dirname( __FILE__ ) . '/functions/ads-posttype.php';
require_once dirname( __FILE__ ) . '/functions/custom-header.php';
require_once dirname( __FILE__ ) . '/functions/custom-footer.php';
require_once dirname( __FILE__ ) . '/functions/custom-headtitle.php';
require_once dirname( __FILE__ ) . '/functions/custom-sidebar.php';
require_once dirname( __FILE__ ) . '/functions/taxonomy-cat.php';
require_once dirname( __FILE__ ) . '/functions/taxonomy-tag.php';
require_once dirname( __FILE__ ) . '/functions/taxonomy-honarmand.php';
require_once dirname( __FILE__ ) . '/functions/taxonamy-age.php';
require_once dirname( __FILE__ ) . '/functions/taxonamy-year.php';
require_once dirname( __FILE__ ) . '/functions/taxonamy-qualitatively.php';
require_once dirname( __FILE__ ) . '/functions/taxonomy-ganre.php';
require_once dirname( __FILE__ ) . '/functions/taxonomy-country.php';
require_once dirname( __FILE__ ) . '/functions/taxonomy-actor.php';
require_once dirname( __FILE__ ) . '/functions/woo-functions.php';
require_once dirname( __FILE__ ) . '/functions/custom-template.php';
require_once dirname( __FILE__ ) . '/functions/taxonomy-sedapishe.php';
require_once dirname( __FILE__ ) . '/functions/taxonomy-translate.php';
require_once dirname( __FILE__ ) . '/functions/functions-base.php';

require_once dirname( __FILE__ ) . '/widget/widget.php';
require_once dirname( __FILE__ ) . '/widget/custom-elementor.php';
require_once dirname( __FILE__ ) . '/widget/category-elementor.php';

require_once dirname( __FILE__ ) . '/functions-netflibs.php';

require_once dirname( __FILE__ ) . '/template/new-comments.php';
require_once dirname( __FILE__ ) . '/template/inc/imdb.class.php';


function coagex_widgets_init()
{
    register_sidebar( array(
		'name'          => 'فوتر سوم',
		'id'            => 'bama_footer',
		'before_widget' => '<div class="col-md-3 text-right">',
    'after_widget'  => '</div>',
    'before_title'  => '<h3 class="text-warning mb-3">',
		'after_title'   => '</h3>',
    ) );
    register_sidebar( array(
      'name'          => 'سایدبار دسته بلاگ',
      'id'            => 'sidebar_cat',
      'before_widget' => '',
      'after_widget'  => '',
    ) );
}
add_action('widgets_init','coagex_widgets_init');


function taxonomy_honarmand(){
  $colors = get_the_terms(get_the_ID(), 'honarmandan');
    if(is_array($colors)){
        echo "<div class='row single-colors'>";
        foreach($colors as $color){
            $color_id = $color->term_id;
            $color_name = $color->name;
            $color_url = get_term_link($color_id, 'honarmandan');
            $color_code = get_term_meta( $color_id, 'pic-honarmand', true );
            $color_code = ($color_code != '')? $color_code : 'inherant';
            
            echo "<div class='single-color'><a href='$color_url'><img src='$color_code'><h6>$color_name</h6></a></div>";
        }
        echo "</div>";
    }
}


function show_order_options() {
		return array(
			'ASC'   => __( 'جدیدترین', 'cmb2' ),
			'DESC' => __( 'قدیمی ترین', 'cmb2' ),
		);
}
function show_orderby_options() {
  return array(
    'title'   => __( 'عنوان', 'cmb2' ),
    'author' => __( 'نویسنده', 'cmb2' ),
    'ID' => __( 'آیدی', 'cmb2' ),
    'name' => __( 'نام', 'cmb2' ),
    'type' => __( 'نوع پست', 'cmb2' ),
    'date' => __( 'تاریخ', 'cmb2' ),
    'modified' => __( 'اصلاح شده', 'cmb2' ),
    'parent' => __( 'والد', 'cmb2' ),
    'rand' => __( 'تصادفی', 'cmb2' ),
  );
}
function show_target_options() {
  return array(
    '_blank'   => __( '_blank', 'cmb2' ),
    '_self' => __( '_self', 'cmb2' ),
    '_parent' => __( '_parent', 'cmb2' ),
    '_top' => __( '_top', 'cmb2' ),
  );
}

function notification_category_options()
{
	$args=array(
		'taxonomy'=>'category',
		'hide_empty'=>false
	);
	$terms=get_terms($args);
	
	$select_items=array();
	foreach($terms as $term){
		$select_items[$term->term_id]=$term->name;
	}
	return $select_items;
}
if (!function_exists( 'shayanweb_font_changer' )) {
  function shayanweb_font_changer() {
    wp_enqueue_style( 'custom_admin_panel_style', trailingslashit( get_stylesheet_directory_uri() )  . 'css/panel.css' );
  }
  add_action( 'admin_enqueue_scripts', 'shayanweb_font_changer' );
}
add_action('elementor/editor/before_enqueue_scripts', function() {
  wp_enqueue_style('admin',path .'/css/admin.css');
});
function wpb_comment_count() { 

  $comments_count = wp_count_comments();
  $message =  $comments_count->approved;
  
  return $message; 
  
  } 
  
  add_shortcode('wpb_total_comments','wpb_comment_count'); 
  add_filter('widget_text','do_shortcode');

?>