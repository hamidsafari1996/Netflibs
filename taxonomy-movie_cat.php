<?php get_header();
$select_header = get_term_meta( get_queried_object()->term_id, 'wiki_header_select', true );
if ( 'header' === $select_header ){
	get_template_part('template/index','header');
}
$select_header1 = get_term_meta( get_queried_object()->term_id, 'wiki_header_select', true );
if ( 'header-1' === $select_header1 ){
	get_template_part('template/index','header2'); 
}
$select_header2 = get_term_meta( get_queried_object()->term_id, 'wiki_header_select', true );
if ( 'header-2' === $select_header2 ){
	get_template_part('template/push','menu'); 
}

if($elementor_header = get_term_meta( get_queried_object()->term_id,'header_elementor_taxonamy',true)){
	?>
      <header>
		<?php
		$elementor = \Elementor\Plugin::instance();
		echo $elementor->frontend->get_builder_content($elementor_header);
		?>
      </header>
      <?php
}

?>

<?php

	get_template_part('single-page/defult','taxmovie');


?>


<?php  $select_footer = get_term_meta( get_queried_object()->term_id, 'wiki_foot_select', true );
if ( 'footer_1' === $select_footer ) {
	get_template_part('template/index','footer');
}
$select_value = get_term_meta( get_queried_object()->term_id, 'wiki_footi_select', true );
if ( 'footer_2' === $select_footer ){
	get_template_part('template/index','footer2');
}
$select_value = get_term_meta( get_queried_object()->term_id, 'wiki_footi_select', true );
if ( 'footer_3' === $select_footer ){
      get_template_part('template/index','footer_3'); 
} 

if($elementor_footer = get_term_meta( get_queried_object()->term_id,'footer_elementor_taxonamy',true)){
	?>
      <footer>
      <?php
	$elementor = \Elementor\Plugin::instance();
	echo $elementor->frontend->get_builder_content($elementor_footer);
	?>
      </footer>
      <?php
}

get_footer(); ?>