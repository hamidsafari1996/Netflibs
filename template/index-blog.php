<?php
$blog_options=woolearn_get_option('coagex_blog_group');
$time_booke = get_post_meta(get_the_ID(),'text-name',true);                             
?>
<div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="row section-style-one clearfix">
                        <div class="col-12">
                            <div class="section-header mt-5 mb-5">
                                <h3 class="section-title mr-3 float-right">
                                <?php echo $blog_options[0]['title']; ?>
                                </h3>
                                <a href="<?php echo $blog_options[0]['link']; ?>" class="text-upper section-header-link"><span class="ml-3"><?php echo $blog_options[0]['title_l']; ?></span><i class="fas fa-arrow-left"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row m-0">
                    <div class="col-xl-4 col-lg-4 col-md-12 d-none d-lg-block">
                        <?php
                        $views_product = array(
                            'post_type' => 'post',
                            'posts_per_page' => 1,
                            'meta_key' => 'views',
                            'orderby' => 'meta_value_num',
                        );
                        $show_views_product = new WP_Query($views_product);
                        while ($show_views_product->have_posts()) : $show_views_product->the_post();
                        ?>
                        <article>
                            <div class="card bg-dark text-white post-big post-meta" style="background:url(<?php the_post_thumbnail_url(); ?>);">
                                <div class="text-right post-text">
                                    <span><?php the_category(','); ?></span>
                                    <h5 class="card-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                                    <p class="card-text mb-3"><?php echo get_the_excerpt(); ?></p>
                                    <p class="card-text"><span class="year">منتشر شده در <?php echo get_the_date('d F'); ?> - <?php echo $time_booke ?> دقیقه مطالعه</span></p>
                                </div>
                                
                                    <a href="<?php the_permalink(); ?>"><div class="card-img-overlay"></div></a>
                                
                            </div>
                        </article>
                        <?php wp_reset_postdata(); endwhile; ?>
                    </div>
                    <div class="col-xl-8 col-lg-7">
                    <?php $coagex_filimo_option = woolearn_get_option('coagex_blog_group');
                    foreach ($coagex_filimo_option as $item) { ?>
                    <?php
                    // WP_Query arguments
                    $posts = $item['test_number'];
                    $args = array(
                        'post_type'              => array( 'post' ),
                        'posts_per_page'         => $posts,
                    );
                    // The Query
                    $blog = new WP_Query( $args );
                    // The Loop
                    if ( $blog->have_posts() ) {
                        while ( $blog->have_posts() ) {
                            $blog->the_post();
                            ?>
                        <div class="col-lg-12 col-md-12">
                            <article>
                                <div class="post-meta d-flex mb-4">
                                    <div class="post-news">
                                        <a href="<?php the_permalink(); ?>">
                                            <img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>" class="rounded">
                                        </a>
                                    </div>
                                    
                                    <div class="post-text text-right mr-4">
                                        <span><?php the_category(','); ?></span>
                                        <h2 class="mb-md-4 mt-md-3"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                                        <span class="year">منتشر شده در <?php echo get_the_date('d F'); ?> - <?php echo $time_booke ?> دقیقه مطالعه</span>
                                        <p class="mt-3"><?php echo get_the_excerpt(); ?></p>
                                    </div>
                                </div>
                            </article>
                        </div>
                        <?php
								}
							} else {
								// no posts found
							}
							wp_reset_postdata(); ?>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>