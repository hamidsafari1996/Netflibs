<?php

function quality_tax() {

    $labels = array(
      'name'                       => _x( 'کیفیت', 'Taxonomy General Name', 'text_domain' ),
      'singular_name'              => _x( 'کیفیت', 'Taxonomy Singular Name', 'text_domain' ),
      'menu_name'                  => __( 'کیفیت', 'text_domain' ),
      'all_items'                  => __( 'تمام کیفیت', 'text_domain' ),
      'parent_item'                => __( 'دسته مادر', 'text_domain' ),
      'parent_item_colon'          => __( 'Parent Item:', 'text_domain' ),
      'new_item_name'              => __( 'New Item Name', 'text_domain' ),
      'add_new_item'               => __( 'افزودن کیفیت جدید', 'text_domain' ),
      'edit_item'                  => __( 'ویرایش کیفیت', 'text_domain' ),
      'update_item'                => __( 'بروزرسانی', 'text_domain' ),
      'view_item'                  => __( 'مشاهده کیفیت', 'text_domain' ),
      'separate_items_with_commas' => __( 'Separate items with commas', 'text_domain' ),
      'add_or_remove_items'        => __( 'Add or remove items', 'text_domain' ),
      'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
      'popular_items'              => __( 'Popular Items', 'text_domain' ),
      'search_items'               => __( 'جستجوی کیفیت', 'text_domain' ),
      'not_found'                  => __( 'کیفیت پیدا نشد', 'text_domain' ),
      'no_terms'                   => __( 'کیفیت نیست', 'text_domain' ),
      'items_list'                 => __( 'لیست کیفیت', 'text_domain' ),
      'items_list_navigation'      => __( 'Items list navigation', 'text_domain' ),
    );
    $args = array(
      'labels'                     => $labels,
      'hierarchical'               => true,
      'public'                     => true,
      'show_ui'                    => true,
      'show_admin_column'          => true,
      'show_in_nav_menus'          => true,
      'show_tagcloud'              => true,
      'rewrite'                       => array( 'slug' => 'quality'),
      
    );
    register_taxonomy( 'quality', array( 'coagex_movie','product' ), $args );
  }
  add_action( 'init', 'quality_tax', 0 );

?>