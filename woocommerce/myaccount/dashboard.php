<?php
/**
 * My Account Dashboard
 *
 * Shows the first intro screen on the account dashboard.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/dashboard.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 4.4.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>
<div class="massage-login-user p-3">
		<?php
		/*global $wp_query;
		$current_user = wp_get_current_user();
		$registered = date_i18n("Y/m/d", strtotime(get_the_author_meta('user_registered', $wp_query->queried_object_id)));
		if($current_user->user_firstname){ ?>
			<p class="text-right text-light">سلام <span><?php echo $current_user->user_firstname, $current_user->user_lastname; ?></span> عزیز خوش آمدید! <span class="">تاریخ عضویت شما:<?php echo $current_user->user_registered; ?></span></p>
		<?php
			
		}else{ ?>
		<p class="text-right text-light">سلام <span><?php echo $current_user->user_login; ?></span> عزیز خوش آمدید! <span>تاریخ عضویت شما:<?php echo $current_user->user_registered; ?></span></p>
		<?php
		} */
		?>
		
	</div>
	<div class="slider-my-account text-center">
		<div id="carouselExampleInterval" class="carousel slide" data-ride="carousel">
			<div class="carousel-inner">
				<?php @$account_slider = woolearn_get_option('account_slider'); $counter=0; foreach ($account_slider as $item) { ?>
				<div class="carousel-item <?php $class= $counter==0 ? 'active' : ''; echo $class; ?>" data-interval="10000">
					<a href="<?php echo $item['link-banner']; ?>"><img src="<?php echo $item['slider-pic']; ?>" class="d-inline-block w-100" alt="..."></a>
				</div>
				<?php $counter++; } ?>	
				
			</div>
			<button class="carousel-control-prev bg-transparent border-0" type="button" data-target="#carouselExampleInterval" data-slide="prev">
				<i class="fas fa-arrow-left"></i>	
			</button>
			<button class="carousel-control-next bg-transparent border-0" type="button" data-target="#carouselExampleInterval" data-slide="next">
				<i class="fas fa-arrow-right"></i>
			</button>
		</div>
	</div>
	<?php
	$current_user = wp_get_current_user();
	$numorders = wc_get_customer_order_count( $current_user->ID );
	// Get CANCELLED orders for customer
	$args = array(
	    'customer_id' => $current_user->ID,
	    'post_status' => 'cancelled',
	    'post_type' => 'shop_order',
	    'return' => 'ids',
	);
	$numorders_cancelled = 0;
	$numorders_cancelled = count( wc_get_orders( $args ) ); // count the array of orders
	
	// NON-CANCELLED equals TOTAL minus CANCELLED
	$num_not_cancelled = $numorders - $numorders_cancelled;
	$downloads = WC()->customer->get_downloadable_products();
	$names_length=count($downloads);
	?>
	<div class="d-flex py-4 flex-wrap">
		<div class="col-12 col-md-6 col-lg-3 my-2 my-lg-0">
			<div class="pack-post package-1 position-relative d-flex justify-content-start align-items-center">
				<div class="icon"><i class="far fa-comment"></i></div>
				<div class="comment-text mx-2 text-right">نظرات ثبت شده</div>
				<div class="commet-number"><?php echo do_shortcode(' [wpb_total_comments]'); ?></div>
			</div>
		</div>
		<div class="col-12 col-md-6 col-lg-3 my-2 my-lg-0">
			<div class="pack-post package-2 position-relative d-flex justify-content-start align-items-center">
				<div class="icon"><i class="fab fa-opencart"></i></div>
				<div class="comment-text mx-2 text-right">محصولات خریداری شده</div>
				
				<div class="commet-number"><?php echo $names_length; ?></div>
				
				<a href="<?php echo site_url(); ?>/my-account/downloads/" class="stretched-link"></a>
			</div>
		</div>
		<?php $notification_header = woolearn_get_option('notification_header'); ?>
		<div class="col-12 col-md-6 col-lg-3 my-2 my-lg-0">
			<div class="pack-post package-3 position-relative d-flex justify-content-start align-items-center">
				<div class="icon"><i class="<?php echo $notification_header[0]['text-icon']; ?>"></i></div>
				<div class="comment-text mx-2 text-right"><?php echo $notification_header[0]['text-ticket']; ?></div>
				<a href="<?php echo $notification_header[0]['link-ticket']; ?>" class="stretched-link"></a>
			</div>
		</div>
		
		<div class="col-12 col-md-6 col-lg-3 my-2 my-lg-0">
			<div class="pack-post package-4 position-relative d-flex justify-content-start align-items-center">
				<div class="icon"><i class="fas fa-dolly"></i></div>
				<div class="comment-text mx-2 text-right">سفارشات انجام شده</div>
				<div class="commet-number"><?php echo $num_not_cancelled; ?></div>
				<a href="<?php echo site_url(); ?>/my-account/orders/" class="stretched-link"></a>
			</div>
		</div>
	</div>
	<?php $coupon_section = woolearn_get_option('coupon_section'); ?>
	<div class="d-flex py-4 flex-wrap">
		<div class="col-12 col-md-6 col-lg-4 my-3 my-lg-0">
			<div class="packet-box portfolio-1 text-right">
				<div class="header-portfolio">
					<h4 class="text-white"><?php echo $coupon_section[0]['header-title']; ?></h4>
				</div>
				<div class="body-portfolio">
					<h6><?php echo $coupon_section[0]['body-text']; ?></h6>
				</div>
			</div>
		</div>
		<div class="col-12 col-md-6 col-lg-4 my-3 my-lg-0">
			<div class="packet-box portfolio-2 text-right">
				<div class="header-portfolio">
					<h4 class="text-white">مشخصات من</h4>
				</div>
				<div class="body-portfolio">
				<?php
					global $wp_query;
					$current_user = wp_get_current_user();
					$registered = date_i18n("Y/m/d", strtotime(get_the_author_meta('user_registered', $wp_query->queried_object_id)));
					if($current_user->user_firstname){ ?>
						<h6 class="text-right text-dark"><?php echo $current_user->user_firstname, $current_user->user_lastname; ?></h6>
						<h6 class="mt-2 text-dark"><?php echo $current_user->user_email ?></h6>
						<h6 class="mt-2"><a href="<?php echo site_url(); ?>/my-account/edit-account/" class="a-eddite">ویرایش مشخصات من</a></h6>
					<?php
						
					}else{ ?>
					<h6 class="text-right text-dark"><?php echo $current_user->user_login; ?></h6>
					<h6 class="mt-2 text-dark"><?php echo $current_user->user_email ?></h6>
					<h6 class="mt-2"><a href="<?php echo site_url(); ?>/my-account/edit-account/" class="a-eddite">ویرایش مشخصات من</a></h6>
					<?php
					}
					?>
				</div>
			</div>
		</div>
		<div class="col-12 col-md-12 col-lg-4 mt-5 mt-lg-0">
			<div class="packet-box portfolio-3 text-right">
				<div class="header-portfolio">
					<h4 class="text-white">آخرین نوشته‌ها</h4>
				</div>
				<div class="body-portfolio">
					<?php
					$best_product = array(
						'post_type' => 'post',
						'posts_per_page' => 3,
					);
					$show_best_product = new WP_Query($best_product);
					while($show_best_product->have_posts()) : $show_best_product->the_post();
                            	?>
					<h6><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h6>
					<?php endwhile; wp_reset_postdata(); ?>
				</div>
			</div>
		</div>
	</div>
<?php
	/**
	 * My Account dashboard.
	 *
	 * @since 2.6.0
	 */
	do_action( 'woocommerce_account_dashboard' );

	/**
	 * Deprecated woocommerce_before_my_account action.
	 *
	 * @deprecated 2.6.0
	 */
	do_action( 'woocommerce_before_my_account' );

	/**
	 * Deprecated woocommerce_after_my_account action.
	 *
	 * @deprecated 2.6.0
	 */
	do_action( 'woocommerce_after_my_account' );

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */
?>
