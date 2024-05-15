<?php
$blog_options=woolearn_get_option('coagex_blog_group');
?>
<div class="blog-width">
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
            <div class="col-lg-3 col-md-6 col-12">
                <article class="text-right mb-4">
                    <a href="<?php the_permalink(); ?>"><img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>" class="w-100 rounded"></a>
                    <span class="category"><?php the_category(','); ?></span>
                    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                    <?php 
                    $time_booke = get_post_meta(get_the_ID(),'text-name',true);
                    ?>
                    <div class="span-content">
                        <span><?php echo get_the_date('d F Y'); ?></span>
                        -
                        <span><?php echo $time_booke ?> دقیقه مطالعه</span>
                    </div>
                </article>
            </div>
            <?php
                }
                } 
            }
            wp_reset_postdata(); ?>
        </div>
    </div>
</div>