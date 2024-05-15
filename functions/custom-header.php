<?php
add_action( 'init', 'create_header' );
function create_header() {
  register_post_type( 'make_header',
    array(
      'labels' => array(
        'name'      =>'هدر ساز',
        'singular_name'      =>'هدر ساز',
        'menu_name'      =>'هدر ساز',
        'name_admin_bar'      =>'هدر ساز',
        'add_new'      =>'افزودن هدر',
        'add_new_item'      =>'افزودن هدر',
        'new_item'      =>'هدر جدید',
        'edit_item'      =>'ویرایش هدر',
        'veiw_item'      =>'مشاهده هدر',
        'all_items'      =>'تمام هدر ها',
        'search_items'      =>'جستجوی هدر',
        'parent_item_colon'      =>'مادر',
        'not_found'      =>'هدر یافت نشد',
        'not_found_in_trash'      =>'هدر در سطل زباله یافت نشد'
      ),
      'public' => true,
      'menu_icon'=>'dashicons-welcome-add-page',
      'menu_position'=>40,
      'show_in_admin_bar' => true,
	'supports' => array(
        'title', 'editor',
      ),
      'rewrite'=>array('slug'=>'header_maker'),
    )
  );
}
?>
