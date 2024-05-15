<?php
$header_options=woolearn_get_option('coagex_product_group');
?>
<div class="hexdl-section" style="background: url('<?php echo  $header_options[0]['img-1']; ?>');">
<div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-12">
                    <div class="movie-new-carousel">
                    <?php $coagex_product_option = woolearn_get_option('coagex_product_group');
                            foreach ($coagex_product_option as $item) { ?>
                            <?php
                            $tax = $item['tax'];
                            $posts = $item['test_number'];
                            $best_product = array(
                                'post_type' => 'coagex_movie',
                                'posts_per_page' => $posts,
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
                        <div class="movie-new-item">
                            <figure class="figure">
                                <a href="<?php the_permalink(); ?>"><img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>" class="img-fluid rounded figure-img"></a>
                            </figure>
                            <ficaption class="figure-caption text-right">
                                <div class="movie-new-content mb-2">
                                    <h2><a href="<?php the_permalink(); ?>" data-toggle="tooltip" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
                                </div>
                                <?php 
                                    $text_years = get_post_meta(get_the_ID(),'text-years',true); 
                                    $text_imbd = get_post_meta(get_the_ID(),'text-imDb',true); 
                                    ?>
                                <div class="movie-new-footer">
                                    <span class="star ml-3"><i class="fas fa-star"></i><?php echo $text_imbd; ?></span>
                                    <span class="eye"><i class="fas fa-eye"></i><?php the_views(); ?></span>
                                    <span class="float-left years"><?php echo $text_years; ?></span>
                                </div>
                            </ficaption>
                        </div>

                        <?php endwhile; wp_reset_postdata(); ?>
                    </div>
                </div>
            </div>
        </div>
</div>
        <div class="clearfix"></div>
        <?php } ?>
