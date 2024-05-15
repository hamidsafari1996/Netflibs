<?php
add_action( 'init', 'create_movie' );
function create_movie() {
  register_post_type( 'coagex_movie',
    array(
      'labels' => array(
        'name'      =>'فیلم و سریال',
        'singular_name'      =>'فیلم و سریال',
        'menu_name'      =>'فیلم و سریال',
        'name_admin_bar'      =>'ویدئو ها',
        'add_new'      =>'افزودن ویدئو',
        'add_new_item'      =>'افزودن ویدئو',
        'new_item'      =>'ویدئو جدید',
        'edit_item'      =>'ویرایش ویدئو',
        'veiw_item'      =>'مشاهده ویدئو',
        'all_items'      =>'تمام ویدئو ها',
        'search_items'      =>'جستجوی ویدئو',
        'parent_item_colon'      =>'مادر',
        'not_found'      =>'ویدئو یافت نشد',
        'not_found_in_trash'      =>'ویدئو در سطل زباله یافت نشد'
      ),
      'public' => true,
      'menu_icon'=>'dashicons-video-alt3',
      'menu_position'=>6,
      'show_in_admin_bar' => true,
	    'supports' => array(
        'title','thumbnail', 'editor', 'excerpt', 'comments',
      ),
      'rewrite'=>array('slug'=>'movie'),
    )
  );
}
?>
