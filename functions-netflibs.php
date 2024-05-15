<?php
function welearn_enqueue(){
      wp_enqueue_style('bootstrap',path .'/css/bootstrap.css');
      wp_enqueue_style('magnific',path .'/css/magnific-popup.min.css');
      wp_enqueue_style( 'style-video',path . '/css/style.video.css' );
      wp_enqueue_style( 'owl',path . '/css/owl.carousel.min.css' );
      wp_enqueue_style( 'sweetalert2',path . '/css/sweetalert2.min.css' );
      wp_enqueue_style( 'screen',path . '/stylesheets/screen.css' );
      wp_enqueue_style( 'responsive',path . '/css/responsive.css' );
      wp_enqueue_style('style',path .'/style.css');
     
  
  
      
      wp_enqueue_script('jquery',path .'/js/jquery-3.5.1.min.js',array(),'1.0.0',true);
      wp_enqueue_script('bootstrap',path .'/js/bootstrap.bundle.js',array(),'1.0.0',true);
      wp_enqueue_script('all',path .'/js/all.min.js',array(),'1.0.0',true);
      wp_enqueue_script('brands',path .'/js/jquery.video.js',array(),'1.0.0',true);
      wp_enqueue_script('magnific',path .'/js/magnific-popup.min.js',array(),'1.0.0',true);
  
      wp_enqueue_script('owl',path .'/js/owl.carousel.min.js',array(),'1.0.0',true);
      wp_enqueue_script('sweetalert2',path .'/js/sweetalert2.min.js',array(),'1.0.0',true);

      wp_enqueue_script('index',path .'/js/index.js',array(),'1.0.0',true);
  
     
  }

  add_action("wp_enqueue_scripts","welearn_enqueue");
  require_once dirname( __FILE__ ) . '/functions/custom-template.php';
  require_once dirname( __FILE__ ) . '/functions/taxonomy-sedapishe.php';
  require_once dirname( __FILE__ ) . '/functions/taxonomy-translate.php';
  require_once dirname( __FILE__ ) . '/functions/functions-base.php';

  function show_display_search() {
		return array(
			  'list' => __( 'لیست', 'cmb2' ),
        'table'   => __( 'جدولی', 'cmb2' ),
		);
  }
  function show_display_404() {
		return array(
			  'setting' => __( 'از تنظیمات', 'cmb2' ),
        'elementor'   => __( 'المنتور', 'cmb2' ),
		);
  }
  function create_template_404()
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


function jt_cmb2_address_field( $metakey, $post_id = 0 ) {
  echo jt_cmb2_get_address_field( $metakey, $post_id );
}

// function jt_cmb2_get_address_field( $metakey, $post_id = 0 ) {
//   $post_id = $post_id ? $post_id : get_the_ID();
//   $address = get_post_meta( $post_id, $metakey, 1 );

//   // Set default values for each address key
//   $address = wp_parse_args( $address, array(
//     'title' => '',
//     'link' => '',
//   ) );

//   $output = '<div class="cmb2-address">';
//   $output .= '<p><strong>Address:</strong> ' . esc_html( $address['title'] ) . '</p>';
//   if ( $address['link'] ) {
//     $output .= '<p>' . esc_html( $address['link'] ) . '</p>';
//   }
//   $output .= '<p><strong>City:</strong> ' . esc_html( $address['city'] ) . '</p>';
//   $output .= '<p><strong>State:</strong> ' . esc_html( $address['state'] ) . '</p>';
//   $output .= '<p><strong>Zip:</strong> ' . esc_html( $address['zip'] ) . '</p>';
//   $output .= '</div><!-- .cmb2-address -->';

//   return apply_filters( 'jt_cmb2_get_address_field', $output );
// }

function cmb2_init_address_field() {
  require_once dirname( __FILE__ ) . '/functions/class-cmb2-render-address-field.php';
  require_once dirname( __FILE__ ) . '/functions/class-cmb2-render-boxdl-product-field.php';
  CMB2_Render_Address_Field::init();
  CMB2_Render_boxdl_Field::init();
}
add_action( 'cmb2_init', 'cmb2_init_address_field' );

?>