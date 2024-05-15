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
	$id_post = (int)$elementor_header;
	$post = get_post( $id_post );
	echo apply_filters('the_content', $post->post_content);
}
$select_slider1 = get_term_meta( get_queried_object()->term_id, 'slider_select', true );
if ( 'slider-1' === $select_slider1 ){
	get_template_part('template/index','slider'); 
}
$select_slider2 = get_term_meta( get_queried_object()->term_id, 'slider_select', true );
if ( 'slider-2' === $select_slider2 ){
	get_template_part('template/index','slid'); 
}
/**--------------------Elementor_headtitle----------------------------- */
if($select_slider_elementor = get_term_meta( get_queried_object()->term_id, 'slider_elementor_elementor', true)){
	$elementor = \Elementor\Plugin::instance();
	echo $elementor->frontend->get_builder_content($select_slider_elementor);
}
?>
<div class="web-categorys-section">
	<div class="container">
		<div class="row">
		<?php 
            $none_side = get_term_meta( get_queried_object()->term_id, 'category_radio_inline', true );
            if ( 'none' === $none_side ){
                get_template_part('single-page/category','defult'); 
            }
            ?>



            <?php 
            $right_side = get_term_meta( get_queried_object()->term_id, 'category_radio_inline', true );
            if ( 'sidebar_right' === $right_side ){
                get_template_part('single-page/category','rightside'); 
            }
            ?>



            <?php 
            $left_side = get_term_meta( get_queried_object()->term_id, 'category_radio_inline', true );
            if ( 'sidebar_left' === $left_side ){
                get_template_part('single-page/category','leftside'); 
            }
            ?>
		</div>
		<div class="col-12 text-center">
			<div class="post-box__pagination text-center">
				<div class="pagination-num num-fa pagination-app">
					<div class="wp-pagenavi">
						<?php wp_pagenavi(); ?>
					</div>
				</div>
			</div>
		</div>
		
	</div>
</div>


<?php 
$select_footer = get_term_meta( get_queried_object()->term_id, 'wiki_foot_select', true );
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
	$elementor = \Elementor\Plugin::instance();
	echo $elementor->frontend->get_builder_content($elementor_footer);
}


get_footer(); ?>