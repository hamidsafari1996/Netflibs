<?php /* Template Name: DL-film */ ?>
<?php 
get_header();
$select_header=woolearn_get_option('select_header');
if ( 'header' === $select_header ){
	get_template_part('template/index','header');
}
$select_header1=woolearn_get_option('select_header');
if ( 'header-1' === $select_header1 ){
	get_template_part('template/index','header2'); 
}
$select_header1=woolearn_get_option('select_header');
if ( 'header-2' === $select_header1 ){
	get_template_part('template/push','menu'); 
}
/**--------------------Elementor_header----------------------------- */
if($tab_slider = woolearn_get_option("elementor_header")){
	$id_post = (int)$tab_slider;
	$term=get_post((int)$tab_slider);
	$post = get_post( $id_post );
	echo apply_filters('the_content', $post->post_content);
}
$select_value=woolearn_get_option('slider_select');
if ( 'slid' === $select_value ){
	get_template_part('template/index','slider');
}
$select_slid=woolearn_get_option('slider_select');
if ( 'slidi' === $select_slid ){
      get_template_part('template/index','slid'); 
}
/**--------------------Elementor_headtitle----------------------------- */
if($elementor_slider = woolearn_get_option("slider_select_elementor")){
	$id_post = (int)$elementor_slider;
	$term=get_post((int)$elementor_slider);
	$post = get_post( $id_post );
	echo apply_filters('the_content', $post->post_content);
}



get_template_part('template/index','top');
get_template_part('template/index','tizer');
get_template_part('template/index','proseriec');
get_template_part('template/index','dogh');
?>
<?php
$select_footer=woolearn_get_option('select_footer');
if ( 'footer_1' === $select_footer ) {
	get_template_part('template/index','footer');
}
$select_footer=woolearn_get_option('select_footer');
if ( 'footer_2' === $select_footer ){
	get_template_part('template/index','footer2');
}
$select_footer=woolearn_get_option('select_footer');
if ( 'footer_3' === $select_footer ){
      get_template_part('template/index','footer_3'); 
}


/**--------------------Elementor_foter----------------------------- */
if($tab_footer = woolearn_get_option("elementor_footer")){
	$id_post = (int)$tab_footer;
	$term=get_post((int)$tab_footer);
	$post = get_post( $id_post );
	echo apply_filters('the_content', $post->post_content);
}


get_footer();
?>