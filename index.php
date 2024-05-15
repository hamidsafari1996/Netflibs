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
$select_header1=woolearn_get_option('select_header');
if ( 'header-3' === $select_header1 ){
	get_template_part('template/index','header3'); 
}
/**--------------------Elementor_header----------------------------- */

if($tab_slider = woolearn_get_option("elementor_header")){
	?>
	<header>
	<?php
		$elementor = \Elementor\Plugin::instance();
		echo $elementor->frontend->get_builder_content($tab_slider);
	?>
	</header>
	<?php
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
	$elementor = \Elementor\Plugin::instance();
      echo $elementor->frontend->get_builder_content($elementor_slider);
}

get_template_part('template/index','service1');
get_template_part('template/index','cat');
get_template_part('template/index','new');
get_template_part('template/index','service2');
get_template_part('template/index','movie');
get_template_part('template/index','film');
get_template_part('template/index','profilm');


$select_blog=woolearn_get_option('blog-select');
if ( 'blog' === $select_blog ){
	get_template_part('template/index','blog');
}
$select_card=woolearn_get_option('blog-select');
if ( 'card' === $select_card ){
	get_template_part('template/index','blogcard');
}
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
	?>
	<footer>
		<?php
		$elementor = \Elementor\Plugin::instance();
		echo $elementor->frontend->get_builder_content($tab_footer);
		?>
	</footer>
	<?php
}


get_footer(); 
?>