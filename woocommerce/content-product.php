<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

// Ensure visibility.
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
$text_years = get_post_meta(get_the_ID(),'text-years',true); 
$text_imbd = get_post_meta(get_the_ID(),'text-imDb',true);
?>
<?php
$select_sethand = get_post_meta( get_the_ID(), 'imDb_select', true );
if ( 'defult-select' === $select_sethand ){ ?>
<div class="card item-post">
	<a href="<?php the_permalink(); ?>"><img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>" class="img-fluid rounded figure-img"></a>
	<div class="card-body">
		<div class="movie-new-content mb-4 text-right">
			<h2 data-toggle="tooltip" title="<?php the_title(); ?>"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
		</div>
		<div class="movie-new-footer">
			<span class="star ml-3"><i class="fas fa-star"></i><?php echo $text_imbd; ?></span>
			<span class="eye"><i class="fas fa-eye"></i><?php the_views(); ?></span>
			<span class="float-left years"><?php the_terms(get_the_ID(),"yaers"); ?></span>
			<?php global $user_ID; ?> 
			<?php if($user_ID){ ?>
				<div class="position-absolute faverit-button  ">
					<?php echo do_shortcode('[favorite_button]'); ?>
				</div> 
				<?php }else{ ?>
				<div class="position-absolute faverit-button-error  ">
					<button class="simplefavorite-button">
					<i class="far fa-bookmark"></i>
					</button>
				</div> 
			<?php } ?>
		</div>
	</div>
</div>
<?php
}
?>
<?php
if ( 'imdb-tabligh' === $select_sethand ){ ?>
<?php
$imbd_link = get_post_meta(get_the_ID(),'link',true);
$IMDB = new IMDB($imbd_link); 
?>

<div class="card item-post">
	<a href="<?php the_permalink(); ?>"><img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>" class="img-fluid rounded figure-img"></a>
	<div class="card-body">
		<div class="movie-new-content mb-4 text-right">
			<h2 data-toggle="tooltip" title="<?php the_title(); ?>"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
		</div>
		<div class="movie-new-footer">
			<span class="star ml-3"><i class="fas fa-star"></i><?php if ($IMDB->isReady) { print_r($IMDB->getRating()); } else { echo ''; } ?></span>
			<span class="eye"><i class="fas fa-eye"></i><?php the_views(); ?></span>
			<span class="float-left"><?php if ($IMDB->isReady) { print_r($IMDB->getYear()); } else { echo ''; } ?></span>
			<?php if($user_ID){ ?>
				<div class="position-absolute faverit-button  ">
					<?php echo do_shortcode('[favorite_button]'); ?>
				</div> 
				<?php }else{ ?>
				<div class="position-absolute faverit-button-error  ">
					<button class="simplefavorite-button">
					<i class="far fa-bookmark"></i>
					</button>
				</div> 
			<?php } ?>
		</div>
	</div>
</div>

<?php
}
?>