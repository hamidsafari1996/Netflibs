<?php
/**-------------------------woocommerce_filter----------------------------------------- */
remove_action('woocommerce_sidebar','woocommerce_get_sidebar',10);
remove_action('woocommerce_before_main_content','woocommerce_breadcrumb',20);
remove_action('woocommerce_single_product_summary','woocommerce_template_single_meta',40);
remove_action('woocommerce_single_product_summary','woocommerce_template_single_excerpt',20);
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );
remove_action('woocommerce_after_single_product_summary','woocommerce_output_product_data_tabs',10);

remove_action('woocommerce_product_thumbnails','woocommerce_show_product_thumbnails',20);
add_filter('woocommerce_show_product_thumbnails','gallery_section_product');
function gallery_section_product(){
  global $product;
  $attachment_ids = $product->get_gallery_image_ids();
  
  
  if ( $attachment_ids && $product->get_image_id() ) {
    echo '<div class="product-gallery-header pt-5"><div class="gallery-section owl-carousel owl-theme">';
    foreach ( $attachment_ids as $attachment_id ) {
      echo '<div class="item">'. apply_filters( 'woocommerce_single_product_image_thumbnail_html', wc_get_gallery_image_html( $attachment_id ), $attachment_id ) .'</div>';  // phpcs:disable WordPress.XSS.EscapeOutput.OutputNotEscaped
    }
    echo '</div></div>';
  }
  
}
add_action( 'woocommerce_after_shop_loop_item_title', 'conditionally_remove_loop_rating', 4 );
function conditionally_remove_loop_rating(){
    global $product;

    if( ! ( $product->get_review_count() > 0 ) ) {
        remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );
    }
}
// Hook in
add_filter( 'woocommerce_checkout_fields' , 'custom_override_checkout_fields' );

// Our hooked in function - $fields is passed via the filter!
function custom_override_checkout_fields( $fields ) {
     unset($fields['billing']['billing_company']);
     unset($fields['billing']['billing_address_1']);
     unset($fields['billing']['billing_address_2']);
     unset($fields['billing']['billing_city']);
     unset($fields['billing']['billing_postcode']);
     unset($fields['billing']['billing_country']);
     unset($fields['billing']['billing_state']);
      $fields['billing']['billing_first_name'] = array(
            'label'      => __('نام', 'woocommerce'),
            'placeholder' => __('', 'woocommerce'),
            'required' => true,
            'class' => array('col-12 col-md-6'),
            'clear' => false,
      );
      $fields['billing']['billing_last_name'] = array(
            'label'      => __('نام خانوادگی', 'woocommerce'),
            'placeholder' => __('', 'woocommerce'),
            'required' => true,
            'class' => array('col-12 col-md-6'),
            'clear' => false,
      );
      $fields['billing']['billing_email'] = array(
            'label'      => __('ایمیل شما', 'woocommerce'),
            'placeholder' => __('', 'woocommerce'),
            'required' => true,
            'class' => array('col-md-6 col-12'),
            'clear' => false,
      );
      $fields['billing']['billing_phone'] = array(
            'label'      => __('شماره تماس', 'woocommerce'),
            'placeholder' => __('', 'woocommerce'),
            'required' => true,
            'class' => array('col-md-6 col-12'),
            'clear' => false,
      );
     return $fields;
}
remove_action( 'woocommerce_cart_is_empty', 'wc_empty_cart_message', 10 );
add_action( 'woocommerce_cart_is_empty', 'custom_empty_cart_message', 10 );

function custom_empty_cart_message() {
    $html  = '<div class="col-12 empty-cart-net mb-2"><i class="fas fa-shopping-basket"></i><p class="cart-empty text-white my-3">';
    $html .= wp_kses_post( apply_filters( 'wc_empty_cart_message', __( 'Your cart is currently empty.', 'woocommerce' ) ) );
    echo $html . '</p></div>';
}

add_filter( 'woocommerce_account_menu_items', 'QuadLayers_remove_acc_address', 9999 );

function QuadLayers_remove_acc_address( $items ) {
unset( $items['edit-address'] );
return $items;
}
add_filter( 'woocommerce_account_menu_items', 'loguot_remove_acc', 9999 );

function loguot_remove_acc( $items ) {
unset( $items['customer-logout'] );
return $items;
}
//hook accoant navigation
add_filter('woocommerce_before_account_navigation','netflibs_before_account_navigation');
function netflibs_before_account_navigation(){
      echo '<div class="container-fluid p-0"><div class="section-dashboard-netflibs d-flex flex-wrap">';
}
add_filter('woocommerce_after_my_account','netflibs_after_account_navigation');
function netflibs_after_account_navigation(){
      echo '</div></div>';
}
function QuadLayers_add_support_endpoint() {
      add_rewrite_endpoint( 'support', EP_ROOT | EP_PAGES );
  }  
  add_action( 'init', 'QuadLayers_add_support_endpoint' );  
  // ------------------
  // 2. Add new query
  function QuadLayers_support_query_vars( $vars ) {
      $vars[] = 'support';
      return $vars;
  }  
  add_filter( 'query_vars', 'QuadLayers_support_query_vars', 0 );  
  // ------------------
  // 3. Insert the new endpoint 
  function QuadLayers_add_support_link_my_account( $items ) {
      $items['support'] = 'خرید اشتراک';
      return $items;
  }  
  add_filter( 'woocommerce_account_menu_items', 'QuadLayers_add_support_link_my_account' );
  // ------------------
  // 4. Add content to the new endpoint  
  function QuadLayers_support_content() {
  echo '<div class="eshterak-section p-3"><h3 class="text-right text-white">خرید اشتراک</h3>';
  echo do_shortcode( '[register_form]' );
  echo '</div>';
  }  
  add_action( 'woocommerce_account_support_endpoint', 'QuadLayers_support_content' );


/**--------------------------Faveriot----------------------------- */
function Favorites_add_favorit_endpoint() {
      add_rewrite_endpoint( 'favorit', EP_ROOT | EP_PAGES );
  }  
  add_action( 'init', 'Favorites_add_favorit_endpoint' );  
  // ------------------
  // 2. Add new query
  function Favorites_favorit_query_vars( $vars ) {
      $vars[] = 'favorit';
      return $vars;
  }  
  add_filter( 'query_vars', 'Favorites_favorit_query_vars', 0 );  
  // ------------------
  // 3. Insert the new endpoint 
  function Favorites_add_favorit_link_my_account( $items ) {
      $items['favorit'] = 'لیست علاقه‌مندی';
      return $items;
  }  
  add_filter( 'woocommerce_account_menu_items', 'Favorites_add_favorit_link_my_account' );
  // ------------------
  // 4. Add content to the new endpoint  
  function Favorites_favorit_content() {
  echo '<div class="favorit-section p-3"><h3 class="text-right text-white">لیست علاقه‌مندی</h3>';
  echo do_shortcode( '[faveriat_post]' );
  echo '</div>';
  }  
  add_action( 'woocommerce_account_favorit_endpoint', 'Favorites_favorit_content' );

add_filter('woocommerce_sale_flash', 'lw_hide_sale_flash');
function lw_hide_sale_flash()
{
return false;
}


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