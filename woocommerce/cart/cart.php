<?php
/**
 * Cart Page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 7.0.1
 */

defined( 'ABSPATH' ) || exit;

do_action( 'woocommerce_before_cart' ); 
?>

<div class="cart-web-section py-5">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12 col-lg-9">
				<form class="woocommerce-cart-form" action="<?php echo esc_url( wc_get_cart_url() ); ?>" method="post">
					<?php do_action( 'woocommerce_before_cart_table' ); ?>

					<table class="shop_table shop_table_responsive cart woocommerce-cart-form__contents" cellspacing="0">
						<thead>
							<tr>
								<th class="product-remove">&nbsp;</th>
								<th class="product-thumbnail">تصویر</th>
								<th class="product-name"><?php esc_html_e( 'Product', 'woocommerce' ); ?></th>
								<th class="product-price"><?php esc_html_e( 'Price', 'woocommerce' ); ?></th>
								<th class="product-quantity"><?php esc_html_e( 'Quantity', 'woocommerce' ); ?></th>
								<th class="product-subtotal"><?php esc_html_e( 'Subtotal', 'woocommerce' ); ?></th>
							</tr>
						</thead>
						<tbody>
							<?php do_action( 'woocommerce_before_cart_contents' ); ?>

							<?php
							foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
								$_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
								$product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

								if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
									$product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
									?>
									<tr class="woocommerce-cart-form__cart-item <?php echo esc_attr( apply_filters( 'woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key ) ); ?>">

										<td class="product-remove">
											<?php
												echo apply_filters( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
													'woocommerce_cart_item_remove_link',
													sprintf(
														'<a href="%s" class="remove" aria-label="%s" data-product_id="%s" data-product_sku="%s"><i class="far fa-trash-alt"></i></a>',
														esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
														esc_html__( 'Remove this item', 'woocommerce' ),
														esc_attr( $product_id ),
														esc_attr( $_product->get_sku() )
													),
													$cart_item_key
												);
											?>
										</td>

										<td class="product-thumbnail">
										<?php
										$thumbnail = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );

										if ( ! $product_permalink ) {
											echo $thumbnail; // PHPCS: XSS ok.
										} else {
											printf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $thumbnail ); // PHPCS: XSS ok.
										}
										?>
										</td>

										<td class="product-name" data-title="<?php esc_attr_e( 'Product', 'woocommerce' ); ?>">
										<?php
										if ( ! $product_permalink ) {
											echo wp_kses_post( apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key ) . '&nbsp;' );
										} else {
											echo wp_kses_post( apply_filters( 'woocommerce_cart_item_name', sprintf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $_product->get_name() ), $cart_item, $cart_item_key ) );
										}

										do_action( 'woocommerce_after_cart_item_name', $cart_item, $cart_item_key );

										// Meta data.
										echo wc_get_formatted_cart_item_data( $cart_item ); // PHPCS: XSS ok.

										// Backorder notification.
										if ( $_product->backorders_require_notification() && $_product->is_on_backorder( $cart_item['quantity'] ) ) {
											echo wp_kses_post( apply_filters( 'woocommerce_cart_item_backorder_notification', '<p class="backorder_notification">' . esc_html__( 'Available on backorder', 'woocommerce' ) . '</p>', $product_id ) );
										}
										?>
										</td>

										<td class="product-price" data-title="<?php esc_attr_e( 'Price', 'woocommerce' ); ?>">
											<?php
												echo apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key ); // PHPCS: XSS ok.
											?>
										</td>

										<td class="product-quantity" data-title="<?php esc_attr_e( 'Quantity', 'woocommerce' ); ?>">
										<?php
										if ( $_product->is_sold_individually() ) {
											$product_quantity = sprintf( '1 <input type="hidden" name="cart[%s][qty]" value="1" />', $cart_item_key );
										} else {
											$product_quantity = woocommerce_quantity_input(
												array(
													'input_name'   => "cart[{$cart_item_key}][qty]",
													'input_value'  => $cart_item['quantity'],
													'max_value'    => $_product->get_max_purchase_quantity(),
													'min_value'    => '0',
													'product_name' => $_product->get_name(),
												),
												$_product,
												false
											);
										}

										echo apply_filters( 'woocommerce_cart_item_quantity', $product_quantity, $cart_item_key, $cart_item ); // PHPCS: XSS ok.
										?>
										</td>

										<td class="product-subtotal" data-title="<?php esc_attr_e( 'Subtotal', 'woocommerce' ); ?>">
											<?php
												echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key ); // PHPCS: XSS ok.
											?>
										</td>
									</tr>
									<?php
								}
							}
							?>

							<?php do_action( 'woocommerce_cart_contents' ); ?>

							<tr>
								<td colspan="6" class="actions">

									<?php if ( wc_coupons_enabled() ) { ?>
										<div class="coupon">
											<label for="coupon_code"><?php esc_html_e( 'Coupon:', 'woocommerce' ); ?></label> <input type="text" name="coupon_code" class="input-text" id="coupon_code" value="" placeholder="<?php esc_attr_e( 'Coupon code', 'woocommerce' ); ?>" /> <button type="submit" class="button" name="apply_coupon" value="<?php esc_attr_e( 'Apply coupon', 'woocommerce' ); ?>"><?php esc_attr_e( 'Apply coupon', 'woocommerce' ); ?></button>
											<?php do_action( 'woocommerce_cart_coupon' ); ?>
										</div>
									<?php } ?>

									<button type="submit" class="button" name="update_cart" value="<?php esc_attr_e( 'Update cart', 'woocommerce' ); ?>"><?php esc_html_e( 'Update cart', 'woocommerce' ); ?></button>

									<?php do_action( 'woocommerce_cart_actions' ); ?>

									<?php wp_nonce_field( 'woocommerce-cart', 'woocommerce-cart-nonce' ); ?>
								</td>
							</tr>

							<?php do_action( 'woocommerce_after_cart_contents' ); ?>
						</tbody>
					</table>
					<?php do_action( 'woocommerce_after_cart_table' ); ?>
				</form>
			</div>
			<?php do_action( 'woocommerce_before_cart_collaterals' ); ?>
			<div class="col-md-12 col-lg-3">
				<div class="cart-collaterals">
					<?php
						/**
						 * Cart collaterals hook.
						 *
						 * @hooked woocommerce_cross_sell_display
						 * @hooked woocommerce_cart_totals - 10
						 */
						do_action( 'woocommerce_cart_collaterals' );
					?>
				</div>

				<?php do_action( 'woocommerce_after_cart' ); ?>
			</div>
		</div>
		<div class="cart-single-film mt-5 mb-2">
			<div class="header-title mt-3 mb-5">
				<h2 class="text-right text-white py-4">ممکن است از این فیلم‌ها هم خوشتان بیاید</h2>
			</div>
		<div class="random-product-film movie-new-carousel owl-carousel owl-theme">
			
			<?php
			$mytags=array();
			$mycat=wp_get_post_categories(get_the_ID());
			$q=new WP_Query(
			array(
				"post_type" => 'product',
				"posts_per_page"=>12,
				"category__in"=>$mycat,
				"tag__in"=>$mytags,
				"post__not_in"=>array(get_the_ID()),
				"orderby"=>"rand"
			)
			);

			while($q->have_posts())
			{
			$q->the_post();
			// var_dump(the_title());
			?>

		<div class="movie-new-item item">
                  <figure class="figure">
                        <a href="<?php the_permalink(); ?>"><img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>" class="img-fluid rounded figure-img"></a>
                  </figure>
                  <ficaption class="figure-caption text-right">
                        <div class="movie-new-content mb-2">
                              <h2><a href="<?php the_permalink(); ?>" data-toggle="tooltip" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
                        </div>
                        <?php  
                        $text_imbd = get_post_meta(get_the_ID(),'text-imDb',true); 
                        ?>
                        <?php
                        $select_sethand = get_post_meta( get_the_ID(), 'imDb_select', true );
                        if ( 'defult-select' === $select_sethand ){ ?>
                        <div class="movie-new-footer">
                              <span class="star ml-3"><i class="fas fa-star"></i><?php echo $text_imbd; ?></span>
                              <span class="eye"><i class="fas fa-eye"></i> <?php the_views(); ?></span>
                              <span class="float-left years"><?php the_terms(get_the_ID(),"yaers"); ?></span>
                        </div>
                        <?php } ?>
                        <?php
                        if ( 'imdb-tabligh' === $select_sethand ){ ?>
                        <div class="movie-new-footer">
                              <span class="star ml-3"><i class="fas fa-star"></i><?php if ($IMDB->isReady) { print_r($IMDB->getRating()); } else { echo ''; } ?></span>
                              <span class="eye"><i class="fas fa-eye"></i> <?php the_views(); ?></span>
                              <span class="float-left"><?php if ($IMDB->isReady) { print_r($IMDB->getYear()); } else { echo ''; } ?></span>
                        </div>

                        <?php } ?>
                  </ficaption>
            </div>

			<?php
                    }
                    wp_reset_postdata();

                    ?>
			
		</div>
		</div>
	</div>
</div>