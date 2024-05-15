<?php
$worldsub_options = woolearn_get_option('coagex_tizer_especial_group');
?>
<div class="container">
<?php 
    $tabligh_select = woolearn_get_option('tabligh_select', true );
    if ( 'setting-tabligh' === $tabligh_select ){ ?>
    <div class="row">
        <div class="col-12">
            <div class="header-top-section shadow-sm mb-3 mt-3">
                <div class="title-top d-flex">
                    <i class="fas fa-bullhorn"></i>
                    <h3><?php echo  $worldsub_options[0]['title_1']; ?></h3>
                </div>
                
                <div class="row tizer justify-content-center">
                <?php
                $ads_link = get_post_meta(get_the_ID(),'ads_link',true);
                ?>
                <?php $ads_posttype_setting = woolearn_get_option('ads_posttype_setting');
                            foreach ($ads_posttype_setting as $item) { ?>
                            <?php
                            $posts = $item['test_number'];
                            $order = $item['order_id'];
                            $filter = $item['orderby_id'];
                            $target = $item['target_select'];
                            $best_product = array(
                                'post_type' => 'ads',
                                'posts_per_page' => $posts,
                                'order' => $order,
                                'orderby' => $filter,
                            );
                            $show_best_product = new WP_Query($best_product);
                            while($show_best_product->have_posts()) : $show_best_product->the_post();
                            ?>
                    <figure class="figure mb-5 col-lg-3 col-md-6 col-sm-6 col-12 text-center text-lg-right">
                        <a href="<?php echo $ads_link; ?>" rel="nofollow" target="<?php echo $target; ?>"><img src="<?php the_post_thumbnail_url(); ?>" class="figure-img img-fluid w-100" alt="<?php the_title(); ?>"></a>
                        <figcaption class="figure-caption text-right"><a href="<?php echo $ads_link; ?>" rel="nofollow" target="<?php echo $target; ?>"><?php the_title(); ?></a></figcaption>
                    </figure>
                    <?php endwhile; wp_reset_postdata(); ?>
                   <?php } ?>
                </div>
               
            </div>
        </div>
    </div>
    <?php } ?>
    <?php 
    if ( 'yektanet-tabligh' === $tabligh_select ){ 
        $html_yektanet = woolearn_get_option('tabligh-html',true); echo $html_yektanet;
    } ?>
</div>