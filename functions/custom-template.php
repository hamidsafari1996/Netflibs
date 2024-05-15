<?php
add_action( 'init', 'create_theme' );
function create_theme() {
  register_post_type( 'make_theme',
    array(
      'labels' => array(
        'name'      =>'قالب ساز',
        'singular_name'      =>'قالب ساز',
        'menu_name'      =>'قالب ساز',
        'name_admin_bar'      =>'قالب ساز',
        'add_new'      =>'افزودن قالب',
        'add_new_item'      =>'افزودن قالب',
        'new_item'      =>'قالب جدید',
        'edit_item'      =>'ویرایش قالب',
        'veiw_item'      =>'مشاهده قالب',
        'all_items'      =>'تمام قالب ',
        'search_items'      =>'جستجوی قالب',
        'parent_item_colon'      =>'مادر',
        'not_found'      =>'قالب یافت نشد',
        'not_found_in_trash'      =>'قالب در سطل زباله یافت نشد'
      ),
      'public' => true,
      'menu_icon'=>'dashicons-welcome-add-page',
      'menu_position'=>40,
      'show_in_admin_bar' => true,
	'supports' => array(
        'title', 'editor',
      ),
      'rewrite'=>array('slug'=>'theme_maker'),
    )
  );
}
?>
