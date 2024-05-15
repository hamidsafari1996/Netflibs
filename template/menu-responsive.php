<div class="responsive-header position-absolute w-100">
    <div class="container-fluid">
        <div class="row">
            <div class="col-6 text-right">
                <input type="checkbox" id="check" />
                <label for="check">
                    <i class="fas fa-bars" id="btn"></i>
                    <i class="fas fa-times" id="cancel"></i>
                </label>
                <div class="sidebar">
                    <header>
                        <?php
                        $logo_options=woolearn_get_option('header-logo');
                        ?>
                        <div class="logo-responsive d-flex justify-content-center">
                            <img src="<?php echo  $logo_options[0]['logo_responsive']; ?>" alt="<?php echo get_bloginfo('name'); ?>">
                        </div>
                        <h6 class="desc"><?php echo get_bloginfo('description'); ?></h6>
                    </header>
                    <?php 
                    $args=array(
                        'theme_location'=>'responsive-menu',
                    );
                    wp_nav_menu($args);

                    ?>
                </div>
                <section></section>
            </div>
            <div class="col-6">
                <div class="d-flex justify-content-end">
                    
                    <div class="dropdown dropdown-responsive">
                    <button class="btn" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-bell text-white"></i>
                    </button>
                    <div class="dropdown-menu overflow-auto" aria-labelledby="dropdownMenuButton">
                        <?php
                            $best_product = array(
                                'post_type' => 'coagex_movie',
                                'posts_per_page' => '10',
                            
                            );
                            $show_best_product = new \WP_Query($best_product);
                            while($show_best_product->have_posts()) : $show_best_product->the_post();
                            
                        ?>
                        <div class="dropdown-item mb-4">
                        <div class="row">
                            <div class="col-md-4 col-12 p-0">
                            <a href="<?php the_permalink(); ?>"><img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>" class="img-fluid"></a>
                            </div>
                            <div class="col-md-8 col-12 p-0 pr-2 text-right">
                            <h3 class="mt-2"><a href="<?php the_permalink(); ?>" class="text-white"><?php the_title(); ?></a></h3>
                            </div>
                            </div>
                        </div>

                        <hr>

                        <?php endwhile; wp_reset_postdata(); ?>
                    </div>
                    </div>
                    
                <div class="search-responsive">
                    <div id="search" class="fade">
                        <a href="#" class="close-btn" id="close-search">
                            <em class="fa fa-times"></em>
                        </a>
                        <form action="<?php bloginfo("url") ?>/" method="get">
                        <input name="s" placeholder="کلمه مورد نظر + اینتر" id="searchbox" type="text" />
                        </form>	
                    </div>
                    
                    <div class="search-responsive-area position-relative">
                        <a href='#search'>
                            <i class="fas fa-search"></i>
                        </a>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>