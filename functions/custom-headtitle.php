<?php
add_action( 'init', 'create_headtitle' );
function create_headtitle() {
  register_post_type( 'make_headtitle',
    array(
      'labels' => array(
        'name'      =>'سربرگ ساز',
        'singular_name'      =>'سربرگ ساز',
        'menu_name'      =>'سربرگ ساز',
        'name_admin_bar'      =>'سربرگ ساز',
        'add_new'      =>'افزودن سربرگ',
        'add_new_item'      =>'افزودن سربرگ',
        'new_item'      =>'سربرگ جدید',
        'edit_item'      =>'ویرایش سربرگ',
        'veiw_item'      =>'مشاهده سربرگ',
        'all_items'      =>'تمام سربرگ ها',
        'search_items'      =>'جستجوی سربرگ',
        'parent_item_colon'      =>'مادر',
        'not_found'      =>'سربرگ یافت نشد',
        'not_found_in_trash'      =>'سربرگ در سطل زباله یافت نشد'
      ),
      'public' => true,
      'menu_icon'=>'dashicons-welcome-add-page',
      'menu_position'=>40,
      'show_in_admin_bar' => true,
	'supports' => array(
        'title', 'editor',
      ),
      'rewrite'=>array('slug'=>'headtitle_maker'),
    )
  );
}
?>
