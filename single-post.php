<?php

get_header();
$select_header = get_post_meta( get_the_ID(), 'wiki_test_select', true );
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
}


?>

<div class="single-blog-section text-right">
    <div class="container">
        <div class="row">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            
        <?php 
            $none_side = get_post_meta( get_the_ID(), 'wiki_test_radio_inline', true );
            if ( 'none' === $none_side ){
                get_template_part('single-page/defult','single'); 
            }
            ?>

            <?php 
            $right_side = get_post_meta( get_the_ID(), 'wiki_test_radio_inline', true );
            if ( 'sidebar_right' === $right_side ){
                get_template_part('single-page/right','sidebar'); 
            }
            ?>

            <?php 
            $left_side = get_post_meta( get_the_ID(), 'wiki_test_radio_inline', true );
            if ( 'sidebar_left' === $left_side ){
                get_template_part('single-page/left','sidebar'); 
            }
            ?>

        <?php endwhile; endif; ?>
        </div>
            <span class="hash"><i class="fas fa-hashtag"></i><?php the_tags(); ?></span>
            <div class="blog-share">
                <h4>اشتراک گذاری در شبکه های اجتماعی</h4>
                <ul>
                    <li>
                        <a class="footer-socials" href="https://www.facebook.com/share.php?v=4&src=bm&u=<?php the_permalink(); ?>"><i class="fab fa-facebook"></i></a>
                    </li>
                    <li>
                        <a class="footer-socials" href="https://twitter.com/home?status=<?php the_permalink(); ?>"><i class="fab fa-twitter"></i></a>
                    </li>
                    <li>
                        <a class="footer-socials" href="https://plus.google.com/share?url=<?php the_permalink(); ?>"><i class="fab fa-google-plus"></i></a>
                    </li>
                    <li>
                        <a class="footer-socials" href="//www.pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&media=<?php if(function_exists('the_post_thumbnail')) echo wp_get_attachment_url(get_post_thumbnail_id()); ?>&description=<?php echo get_the_title(); ?>"><i class="fab fa-pinterest"></i></a>
                    </li>
                    <li>
                        <a class="footer-socials" href="mailto:?subject=اشتراک صفحه‌ای از دایان&amp;body=<?php the_permalink(); ?>"><i class="fa fa-envelope-open"></i></a>
                    </li>
                </ul>
            </div>
        
        <?php if ( comments_open() || get_comments_number() ) {
					                comments_template();
					            } ?>
    </div>
</div>

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