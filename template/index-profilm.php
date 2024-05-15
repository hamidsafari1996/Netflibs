<div class="container-fluid">
            
                <div class="col-lg-12 col-md-12 col-12">
                    <div class="movie-new-carousel movie-slider owl-carousel owl-theme">
                    <?php $coagex_product_option = woolearn_get_option('coagex_product_group');
                            foreach ($coagex_product_option as $item) { ?>
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
                        <div class="movie-new-item item">
                            <figure class="figure">
                                <a href="<?php the_permalink(); ?>" target="<?php echo $target; ?>"><img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>" class="img-fluid rounded figure-img"></a>
                            </figure>
                            <ficaption class="figure-caption text-right">
                                <div class="movie-new-content mb-2">
                                    <h2><a href="<?php the_permalink(); ?>" data-toggle="tooltip" title="<?php the_title(); ?>" target="<?php echo $target; ?>"><?php the_title(); ?></a></h2>
                                </div>
                                <?php 
                                    $imbd_link = get_post_meta(get_the_ID(),'link',true);
                                    $text_imbd = get_post_meta(get_the_ID(),'text-imDb',true); 
                                    ?>
                                <?php
                                $select_sethand = get_post_meta( get_the_ID(), 'imDb_select', true );
                                if ( 'defult-select' === $select_sethand ){ ?>
                                <div class="movie-new-footer">
                                    <span class="star ml-3"><i class="fas fa-star"></i><?php echo $text_imbd; ?></span>
                                    <span class="eye"><i class="fas fa-eye"></i><?php the_views(); ?></span>
                                    <span class="float-left years"><?php the_terms(get_the_ID(),"yaers"); ?></span>
                                    <?php global $user_ID; ?> 
                                    <?php if($user_ID){ ?>
                                        <div class="position-absolute faverit-button">
                                            <?php echo do_shortcode('[favorite_button]'); ?>
                                        </div> 
                                        <?php }else{ ?>
                                        <div class="position-absolute faverit-button-error">
                                            <button class="simplefavorite-button">
                                                <i class="far fa-bookmark"></i>
                                            </button>
                                        </div> 
                                    <?php } ?>
                                </div>
                                <?php
                                }
                                ?>
                                <?php
                                if ( 'imdb-tabligh' === $select_sethand ){ ?>
                                <?php
                                $IMDB = new IMDB($imbd_link); 
                                ?>
                                <div class="movie-new-footer">
                                    <span class="star ml-3"><i class="fas fa-star"></i><?php if ($IMDB->isReady) { print_r($IMDB->getRating()); } else { echo ''; } ?></span>
                                    <span class="eye"><i class="fas fa-eye"></i><?php the_views(); ?></span>
                                    <span class="float-left"><?php if ($IMDB->isReady) { print_r($IMDB->getYear()); } else { echo ''; } ?></span>
                                    <?php if($user_ID){ ?>
                                        <div class="position-absolute faverit-button">
                                            <?php echo do_shortcode('[favorite_button]'); ?>
                                        </div> 
                                        <?php }else{ ?>
                                        <div class="position-absolute faverit-button-error">
                                            <button class="simplefavorite-button">
                                                <i class="far fa-bookmark"></i>
                                            </button>
                                        </div> 
                                    <?php } ?>
                                </div>
                                <?php } ?>
                            </ficaption>
                        </div>

                        <?php endwhile; wp_reset_postdata(); ?>
                    </div>
                </div>
            
        </div>
        <div class="clearfix"></div>
        <?php } ?>