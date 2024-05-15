<div class="web-movie-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="welearn-tabs-list col-lg-12 sticky-nav">
                    <ul class="nav text-center pr-0 justify-content-center">
                        <?php $movie_tab_section = woolearn_get_option('coagex_while_film_group'); $count=0; foreach ($movie_tab_section as $movie){ ?>
                        <li><a class="btn btn-danger ml-1 mr-lg-3 ml-lg-3 mt-4" href="#tab<?php echo $count; ?>" data-toggle="tab"><?php echo $movie['title']; ?></a></li>
                        <?php $count++; }
                        ?>
                    </ul>
                </div>
            </div>
            <div class="col-12">
                <div class="welearn-tab-background new-padding mt-5 welearn-shadow">
                    <div class="tab-content">
                    <?php $movie_tab_section = woolearn_get_option('coagex_while_film_group'); $count=0; foreach ($movie_tab_section as $movie){  ?>
                        <div class="tab-pane fade show <?php if($count==0) {echo 'active';} else{} ?>" id="tab<?php echo $count; ?>" role="tabpanel">
                            <div class="row justify-content-center">
                            <?php
                            $tax = $movie['tax'];
                            $posts = $movie['test_number'];
                            $order = $movie['order_id_4'];
                            $filter = $movie['orderby_id_4'];
                            $target = $movie['target_select_4'];
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
                            <div class="card item-post">
                                <a href="<?php the_permalink(); ?>" target="<?php echo $target; ?>"><img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>" class="img-fluid rounded figure-img"></a>
                                <div class="card-body">
                                    <div class="movie-new-content mb-4 text-right">
                                        <h2 data-toggle="tooltip" title="<?php the_title(); ?>"><a href="<?php the_permalink(); ?>" target="<?php echo $target; ?>"><?php the_title(); ?></a></h2>
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
                                        <span class="float-left d-none d-sm-block d-md-block d-lg-block years"><?php the_terms(get_the_ID(),"yaers"); ?></span>
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
                                    <span class="float-left d-none d-sm-block d-md-block d-lg-block"><?php if ($IMDB->isReady) { print_r($IMDB->getYear()); } else { echo ''; } ?></span>
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
                                </div>
                            </div>
                                <?php endwhile; wp_reset_postdata(); ?>
                            </div>
                        </div>
                        <?php $count++; }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>