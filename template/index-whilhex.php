<div class="whilhex-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="web-hex-section mt-5">
                <?php $coagex_product_option = woolearn_get_option('coagex_product_group');
                            foreach ($coagex_product_option as $item) { ?>
                            <?php
                            $tax = $item['tax-mov'];
                            $posts = $item['test1_number'];
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
                            <?php 
                            $text_years = get_post_meta(get_the_ID(),'text-years',true); 
                            $text_imbd = get_post_meta(get_the_ID(),'text-imDb',true); 
                            ?>
                    <article>
                        <div class="float-right text-right header-hex">
                            <h2 class="mb-3"><a href="<?php the_permalink(); ?>" class="text-white"><?php the_title(); ?></a></h2>
                            <div class="portfoil-section">
                                <p><i class="fas fa-compact-disc text-warning ml-2"></i><span>نام فیلم: </span><?php the_title(); ?></p>
                                <p><i class="fas fa-film text-warning ml-2"></i><span>ژانر فیلم: </span><?php the_terms(get_the_ID(),"movie_cat"); ?></p>
                                <p><i class="far fa-star text-warning ml-2"></i><span>امتیاز: </span><?php echo $text_imbd; ?></p>
                                <p><i class="fas fa-calendar text-warning ml-2"></i><span>تاریخ انتشار:</span><?php echo $text_years; ?></p>
                                <p><i class="far fa-comment text-warning ml-2"></i><span>تعداد کامنت: </span><?php comments_popup_link('بدون دیدگاه','1 دیدگاه','% دیدگاه'); ?></p>
                                <p><i class="fas fa-eye text-warning ml-2"></i><span>تعداد بازدید: </span><?php the_views(); ?></p>
                                <p class="text-break"><i class="far fa-clipboard text-warning ml-2"></i><span>خلاصه داستان: </span><?php echo get_the_excerpt(); ?></p>
                            </div>
                        </div>
                        <div>
                            <figure>
                            <a href="<?php the_permalink(); ?>"><img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>" class="rounded"></a>
                            </figure>
                        </div>
                    </article>
                    <?php endwhile; wp_reset_postdata(); ?>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="grune-film mt-5 text-right">
                    <?php dynamic_sidebar('sidebar_footer'); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php } ?>