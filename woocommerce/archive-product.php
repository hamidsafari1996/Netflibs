<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;


$pic = get_term_meta( get_queried_object()->term_id, 'cat-img', true );
?>
<div class="single-film-section" style="background: url('<?php echo $pic; ?>')">
    <div class="container">
        <div class="row">
            <div class="view-movie text-right new-cat">
                <h2 class="mb-4"><?php echo single_cat_title(); ?></h2>
                <div class="decription"><?php echo category_description(); ?></div>
            </div>
            <?php
            $select_category = get_term_meta( get_queried_object()->term_id, 'category_select', true );
            if ( 'category' === $select_category ){
                get_template_part('template/index','cat'); 
            }
            ?>
        </div>
    </div>
</div>
<?php
if ( woocommerce_product_loop() ) {

	?>
	<div class="web-movie-section">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-12">
					<?php
					woocommerce_product_loop_start();

					if ( wc_get_loop_prop( 'total' ) ) {
						while ( have_posts() ) {
							the_post();

							/**
							 * Hook: woocommerce_shop_loop.
							 */
							do_action( 'woocommerce_shop_loop' );

							wc_get_template_part( 'content', 'product' );
						}
					}

					woocommerce_product_loop_end();
					?>
				</div>
			</div>
				<?php
				/**
				 * Hook: woocommerce_after_shop_loop.
				 *
				 * @hooked woocommerce_pagination - 10
				 */
				do_action( 'woocommerce_after_shop_loop' );
			} else {
				/**
				 * Hook: woocommerce_no_products_found.
				 *
				 * @hooked wc_no_products_found - 10
				 */
				do_action( 'woocommerce_no_products_found' );
			}

/**
 * Hook: woocommerce_after_main_content.
 *
 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
 */
do_action( 'woocommerce_after_main_content' );

/**
 * Hook: woocommerce_sidebar.
 *
 * @hooked woocommerce_get_sidebar - 10
 */
do_action( 'woocommerce_sidebar' );
?>
		</div>
	</div>
