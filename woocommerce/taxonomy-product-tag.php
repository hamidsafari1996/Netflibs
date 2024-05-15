<?php
/**
 * The Template for displaying products in a product tag. Simply includes the archive template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/taxonomy-product-tag.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     4.7.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>
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
wc_get_template( 'archive-product.php' );
?>

<?php  $select_footer = get_term_meta( get_queried_object()->term_id, 'wiki_foot_select', true );
if ( 'footer_1' === $select_footer ) {
	get_template_part('template/index','footer');
}
$select_value = get_term_meta( get_queried_object()->term_id, 'wiki_footi_select', true );
if ( 'footer_2' === $select_footer ){
	get_template_part('template/index','footer2');
}
$select_value_2 = get_term_meta( get_queried_object()->term_id, 'wiki_footi_select', true );
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