<?php
add_action( 'init', 'create_sidebar' );
function create_sidebar() {
  register_post_type( 'make_sidebar',
    array(
      'labels' => array(
        'name'      =>'سایدبار ساز',
        'singular_name'      =>'سایدبار ساز',
        'menu_name'      =>'سایدبار ساز',
        'name_admin_bar'      =>'سایدبار ساز',
        'add_new'      =>'افزودن سایدبار',
        'add_new_item'      =>'افزودن سایدبار',
        'new_item'      =>'سایدبار جدید',
        'edit_item'      =>'ویرایش سایدبار',
        'veiw_item'      =>'مشاهده سایدبار',
        'all_items'      =>'تمام سایدبار ها',
        'search_items'      =>'جستجوی سایدبار',
        'parent_item_colon'      =>'مادر',
        'not_found'      =>'سایدبار یافت نشد',
        'not_found_in_trash'      =>'سایدبار در سطل زباله یافت نشد'
      ),
      'public' => true,
      'menu_icon'=>'dashicons-welcome-add-page',
      'menu_position'=>46,
      'show_in_admin_bar' => true,
	'supports' => array(
        'title', 'editor',
      ),
      'rewrite'=>array('slug'=>'sidebar_maker'),
    )
  );
}
?>
