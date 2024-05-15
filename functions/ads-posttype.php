<?php
add_action( 'init', 'posttype_ads' );
function posttype_ads() {
  register_post_type( 'ads',
    array(
      'labels' => array(
        'name'      =>'تبلیغات',
        'singular_name'      =>'تبلیغات',
        'menu_name'      =>'تبلیغات',
        'name_admin_bar'      =>'تبلیغات',
        'add_new'      =>'افزودن تبلیغات',
        'add_new_item'      =>'افزودن تبلیغات',
        'new_item'      =>'تبلیغات جدید',
        'edit_item'      =>'ویرایش تبلیغات',
        'veiw_item'      =>'مشاهده تبلیغات',
        'all_items'      =>'تمام تبلیغات ها',
        'search_items'      =>'جستجوی تبلیغات',
        'parent_item_colon'      =>'مادر',
        'not_found'      =>'تبلیغات یافت نشد',
        'not_found_in_trash'      =>'تبلیغات در سطل زباله یافت نشد'
      ),
      'public' => true,
      'menu_icon'=>'dashicons-bell',
      'menu_position'=>7,
      'show_in_admin_bar' => true,
	'supports' => array(
        'title','thumbnail',
      ),
      'rewrite'=>array('slug'=>'ads'),
    )
  );
}
?>
