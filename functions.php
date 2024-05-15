<?php

define("path",get_template_directory_uri());
function welearn_setup(){
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
add_action("after_setup_theme","welearn_setup");





if ( ! class_exists( 'theme_setup_netflibs' ) ) {
require_once dirname( __FILE__ ) .'/template/inc/examples/imdb.rating.php';
}
require_once dirname( __FILE__ ) . '/cmb2/init.php';
require_once dirname( __FILE__ ) . '/functions/f-setting.php';
require_once dirname( __FILE__ ) . '/functions/cmb2-metabox.php';
require_once dirname( __FILE__ ) . '/widget/widget.php';
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
require_once dirname( __FILE__ ) . '/widget/custom-elementor.php';
require_once dirname( __FILE__ ) . '/widget/category-elementor.php';
require_once dirname( __FILE__ ) . '/template/new-comments.php';
require_once dirname( __FILE__ ) . '/functions-netflibs.php';
require_once dirname( __FILE__ ) . '/template/inc/imdb.class.php';
function license_function() {
  if( theme_setup_netflibs::is_activated() === true ) {
    // License is activated
    } else {
    ?>
    <div class="theme-setup-net">
      <a href="<?php echo site_url(); ?>/wp-admin/index.php?page=NETFLIBS-license">لایسنس خود را وارد کنید</a>
    </div>
    <?php
    }
}
add_action( 'wp_footer', 'license_function' );

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



  

function wpb_faveriat_post(){
  ?>
  
  <div class="section-webmov web-movie-section py-5">
    <div class="row">
    <?php
    $movie_tab_section = woolearn_get_option('coagex_while_film_group');
    $target = $movie_tab_section['target_select_4'];
    if(function_exists("get_user_favorites")){
      $posts = get_user_favorites(get_current_user_id(), get_main_site_id());

      
      $args     = [
        'post_type' => array('post', 'product', 'coagex_movie'),
        'post__in' => $posts,
        'posts_per_page'    =>  20,
      ];
      $wp_query = new \WP_Query($args);

    }
    
    ?>    
    <?php
    if( !empty($posts) && $wp_query-> have_posts()) : while($wp_query-> have_posts()) : $wp_query-> the_post();
    ?>
    <div class="card item-post">
      <a href="<?php the_permalink(); ?>" target="<?php echo $target; ?>"><img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>" class="img-fluid rounded figure-img"></a>
      <div class="card-body">
          <div class="movie-new-content mb-4 text-right">
              <h2 data-toggle="tooltip" title="<?php the_title(); ?>"><a href="<?php the_permalink(); ?>" target="<?php echo $target; ?>"><?php the_title(); ?></a></h2>
          </div>
          <?php 
          $imbd_link = get_post_meta(get_the_ID(),'link',true);
          $text_imbd = get_post_meta(get_the_ID(),'text-imDb',true); 
          ?>
          <?php
          $select_sethand = get_post_meta( get_the_ID(), 'imDb_select', true );
          if ( 'defult-select' === $select_sethand ){ ?>
          <div class="movie-new-footer">
              <span class="star ml-3"><i class="fas fa-star"></i><?php echo $text_imbd; ?></span>
              <span class="eye"><i class="fas fa-eye"></i><?php the_views(); ?></span>
              <span class="float-left d-none d-sm-block d-md-block d-lg-block years"><?php the_terms(get_the_ID(),"yaers"); ?></span>
              <div class="position-absolute faverit-button">
                  <?php echo do_shortcode('[favorite_button]'); ?>
              </div> 
          </div>
          <?php
          }
          ?>

      <?php
      if ( 'imdb-tabligh' === $select_sethand ){ ?>
      <?php
      $IMDB = new IMDB($imbd_link); 
      ?>
      <div class="movie-new-footer">
          <span class="star ml-3"><i class="fas fa-star"></i><?php if ($IMDB->isReady) { print_r($IMDB->getRating()); } else { echo ''; } ?></span>
          <span class="eye"><i class="fas fa-eye"></i><?php the_views(); ?></span>
          <span class="float-left d-none d-sm-block d-md-block d-lg-block"><?php if ($IMDB->isReady) { print_r($IMDB->getYear()); } else { echo ''; } ?></span>
          <div class="position-absolute faverit-button">
              <?php echo do_shortcode('[favorite_button]'); ?>
          </div> 
      </div>

      <?php
      }
      ?>
      </div>
    </div>
    <?php
    endwhile; endif;
    if (empty($posts)){
      echo ' <span>فیلم به لیست علاقمندی اضافه نشده است !!!</span>';
    }
    ?>
    </div>
  </div>
  <?php
}
add_shortcode('faveriat_post','wpb_faveriat_post'); 

?>