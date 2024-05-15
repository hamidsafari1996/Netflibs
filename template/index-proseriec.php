<?php
$pro_options=woolearn_get_option('coagex_product_group');
?>
<div class="container">
    <div class="">
        <div class="header-top-section text-right shadow-sm mb-3 mt-2" style="background: url('<?php echo  $pro_options[0]['img-2']; ?>');">
            <div class="title-top d-flex text-white">
                <i class="fas fa-film"></i>
                <h3><?php echo  $pro_options[0]['title-name']; ?></h3>
            </div>
            <div class="movie-filimo-carousel owl-carousel owl-theme">

            <?php $coagex_filimo_option = woolearn_get_option('coagex_product_group');
                foreach ($coagex_filimo_option as $item) { ?>
                <?php
                $tax = $item['tax-mov'];
                $posts = $item['test1_number'];
                $order = $item['order_id_2'];
                $filter = $item['orderby_id_2'];
                $target = $item['target_select_2'];
                $best_product = array(
                    'post_type' => 'coagex_movie',
                    'posts_per_page' => $posts,
                    'order'       => $order,
                    'order_by'       => $filter,
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'movie_cat',
                            'field' => 'slug',
                            'terms' => $tax,
                        ),
                    ),
                );
                $show_best_product = new WP_Query($best_product);
                while($show_best_product->have_posts()) : $show_best_product->the_post();
                
                ?>
                <div class="item mt-3 top-new">
                    <div class="filimo-info portfolio-width right-pos mb-3 shadow-around">
                    <img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>" class="w-100">
                    <div class="filimo-overlay"></div>
                    <div class="filimo-overlay-text world-sub text-center text-white">
                        <h3><a href="<?php the_permalink(); ?>" target="<?php echo $target; ?>"><?php the_title(); ?></a></h3>
                        <p class="matn"><?php echo get_the_excerpt(); ?></p>
                        <p><span class="kafe"><?php the_terms(get_the_ID(),"quality"); ?></span></p>
                        <hr>
                        <p><a href="<?php the_permalink(); ?>" class="badge badge-pill badge-primary mt-3" target="<?php echo $target; ?>">دانلود</a></p>
                    </div>
                    </div>
                </div>
                <?php endwhile; wp_reset_postdata(); ?>
            </div>
            
        </div>
    </div>
</div>
<?php } ?>