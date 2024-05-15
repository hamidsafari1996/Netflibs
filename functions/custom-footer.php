<?php
add_action( 'init', 'create_footer' );
function create_footer() {
  register_post_type( 'make_footer',
    array(
      'labels' => array(
        'name'      =>'فوتر ساز',
        'singular_name'      =>'فوتر ساز',
        'menu_name'      =>'فوتر ساز',
        'name_admin_bar'      =>'فوتر ساز',
        'add_new'      =>'افزودن فوتر',
        'add_new_item'      =>'افزودن فوتر',
        'new_item'      =>'فوتر جدید',
        'edit_item'      =>'ویرایش فوتر',
        'veiw_item'      =>'مشاهده فوتر',
        'all_items'      =>'تمام فوتر ها',
        'search_items'      =>'جستجوی فوتر',
        'parent_item_colon'      =>'مادر',
        'not_found'      =>'فوتر یافت نشد',
        'not_found_in_trash'      =>'فوتر در سطل زباله یافت نشد'
      ),
      'public' => true,
      'menu_icon'=>'dashicons-welcome-add-page',
      'menu_position'=>40,
      'show_in_admin_bar' => true,
	'supports' => array(
        'title', 'editor',
      ),
      'rewrite'=>array('slug'=>'footer_maker'),
    )
  );
}
?>
