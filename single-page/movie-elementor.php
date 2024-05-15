<?php 
/*
 * Template Name: سیستم قالب ساز
 * Template Post Type: coagex_movie
 */ 
?>
<?php get_header(); ?>
<?php $select_header = get_post_meta( get_the_ID(), 'wiki_test_select', true );
if ( 'header' === $select_header ){
	get_template_part('template/index','header');
}
$select_header1 = get_post_meta( get_the_ID(), 'wiki_test_select', true );
if ( 'header-1' === $select_header1 ){
	get_template_part('template/index','header2'); 
}
$select_header2 = get_post_meta( get_the_ID(), 'wiki_test_select', true );
if ( 'header-2' === $select_header2 ){
	get_template_part('template/push','menu'); 
}
if($elementor_header = get_post_meta(get_the_ID(),'header-elementor-select',true)){
    $elementor = \Elementor\Plugin::instance();
    echo $elementor->frontend->get_builder_content($elementor_header);
}
$select_value = get_post_meta( get_the_ID(), 'wiki_slider_select', true );
if ( 'slid' === $select_value ){
	get_template_part('template/index','slider');
}
$select_slid = get_post_meta( get_the_ID(), 'wiki_slider_select', true );
if ( 'slidi' === $select_slid ){
      get_template_part('template/index','slid'); 
}
/**--------------------Elementor_headtitle----------------------------- */
if($select_slider_elementor = get_post_meta( get_the_ID(), 'slider_select_elementor', true)){
	$elementor = \Elementor\Plugin::instance();
    echo $elementor->frontend->get_builder_content($select_slider_elementor);
} ?>


<?php

if($select_template_elementor = get_post_meta( get_the_ID(), 'theme-post-elementor', true)){
    $elementor = \Elementor\Plugin::instance();
    echo $elementor->frontend->get_builder_content($select_template_elementor);
} 
?>


<?php 
$select_footer = get_post_meta( get_the_ID(), 'wiki_footer_select', true );
if ( 'footer_1' === $select_footer ) {
	get_template_part('template/index','footer');
}
$select_value = get_post_meta( get_the_ID(), 'wiki_test_select', true );
if ( 'footer_2' === $select_footer ){
	get_template_part('template/index','footer2');
}
$select_value = get_post_meta( get_the_ID(), 'wiki_test_select', true );
if ( 'footer_3' === $select_footer ){
      get_template_part('template/index','footer_3'); 
}


if($elementor_footer = get_post_meta(get_the_ID(),'footer_elementor_select',true)){
    $elementor = \Elementor\Plugin::instance();
    echo $elementor->frontend->get_builder_content($elementor_footer);
}
get_footer(); ?>