<?php get_header(); 
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
get_template_part('template/index','search'); 
?>
<?php
    $coagex_motofa_group = woolearn_get_option('coagex_motofa_group');
    $testig = $coagex_motofa_group[0]['select_dis'];
    if ( 'list' === $testig ){
        get_template_part('page-template/search','list'); 
    }
    if ( 'table' === $testig ){
        get_template_part('page-template/search','table'); 
    }

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
	?>
	<footer>
		<?php
		$elementor = \Elementor\Plugin::instance();
		echo $elementor->frontend->get_builder_content($tab_footer);
		?>
	</footer>
	<?php
}
get_footer(); ?>