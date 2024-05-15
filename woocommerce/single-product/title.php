<?php
/**
 * Single Product title
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/title.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see        https://docs.woocommerce.com/document/template-structure/
 * @package    WooCommerce\Templates
 * @version    1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

the_title( '<h1 class="product_title entry-title">', '</h1>' );
$text_time = get_post_meta(get_the_ID(),'text-time',true);
$text_imdb = get_post_meta(get_the_ID(),'text-imDb',true);
$link_imdb = get_post_meta(get_the_ID(),'link',true);
?>
<?php
$select_sethand = get_post_meta( get_the_ID(), 'imDb_select', true );
if ( 'defult-select' === $select_sethand ){ ?>
<div class="more-expert py-4">
	<span class="d-inline ganre"><?php the_terms(get_the_ID(),"ganres"); ?></span>
	<span class="d-inline before mx-1">|</span>
	<span class="d-inline year"><?php the_terms(get_the_ID(),"yaers"); ?></span>
	<span class="d-inline before mx-1">|</span>
	<span class="d-inline age"><?php the_terms(get_the_ID(),"ages"); ?></span>
	<span class="d-inline before mx-1">|</span>
	<span class="d-inline country"><?php the_terms(get_the_ID(),"country"); ?></span>
	<span class="d-inline before mx-1">|</span>
	<span class="d-inline time"><?php echo $text_time; ?></span>
</div>
<hr class="hr-woo">
<div class="imdb-exerpt d-flex align-items-center pt-2">
	<a href="<?php echo $link_imdb; ?>" class="icon-imdb" target="_blank"><span><i class="fab fa-imdb"></i></span></a>
	<span class="text-imdb"><?php echo $text_imdb; ?> از 10</span>
</div>
<div class="py-3 text-white-50 artist">بازیگران:<span class="mr-2"><?php the_terms(get_the_ID(),"honarmandan"); ?></span></div>
<div class="pb-3 text-white-50 artist">کارگردان:<span class="mr-2"><?php the_terms(get_the_ID(),"actors"); ?></span></div>
<hr class="hr-woo">
<?php } ?>
<?php
if ( 'imdb-tabligh' === $select_sethand ){ ?>
<?php
$IMDB = new IMDB($link_imdb); 
?>
<div class="more-expert py-4 d-flex">
	<span class="d-inline ganre"><?php if ($IMDB->isReady) { print_r($IMDB->getGenre()); } else { echo ''; } ?></span>
	<span class="d-inline before mx-1">|</span>
	<span class="d-inline year"><?php if ($IMDB->isReady) { print_r($IMDB->getYear()); } else { echo ''; } ?></span>
	<span class="d-inline before mx-1">|</span>
	<span class="d-inline age"><?php the_terms(get_the_ID(),"ages"); ?></span>
	<span class="d-inline before mx-1">|</span>
	<span class="d-inline country"><?php if ($IMDB->isReady) { print_r($IMDB->getCountry()); } else { echo ''; } ?></span>
	<span class="d-inline before mx-1">|</span>
	<span class="d-inline time"><?php if ($IMDB->isReady) { print_r($IMDB->getRuntime()); } else { echo ''; } ?></span>
</div>
<hr class="hr-woo">
<div class="imdb-exerpt d-flex align-items-center pt-2">
	<a href="<?php echo $link_imdb; ?>" class="icon-imdb" target="_blank"><span><i class="fab fa-imdb"></i></span></a>
	<span class="text-imdb"><?php if ($IMDB->isReady) { print_r($IMDB->getRating()); } else { echo ''; } ?></span>
</div>

<div class="pb-3 text-white-50 artist">عوامل فیلم:<span class="mr-2 imdb-actor"><?php if ($IMDB->isReady) { print_r($IMDB->getCastAndCharacterAsUrl($iLimit = 0, $bMore = true, $sTarget = '')); } else { echo ''; } ?></span></div>
<hr class="hr-woo">

<?php } ?>