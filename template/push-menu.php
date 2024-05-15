<header>
<section class="push-menu">
<div class="container-fluid">
    <div class="row align-self-center">
        <div class="col-lg-2 col-md-6 col-6 older">
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
                <div class="d-none d-lg-block">
                <?php 
                $args=array(
                    'theme_location'=>'push-menu',
                );
                wp_nav_menu($args);

                ?>
                </div>
                <div class="d-block d-lg-none">
                    <?php 
                    $args=array(
                        'theme_location'=>'responsive-menu',
                    );
                    wp_nav_menu($args);

                    ?>
                </div>
            </div>
            <section></section>
            <!--notification-->
        <div class="dropdown d-none d-lg-block">
        <button class="btn btn-secondary" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-bell"></i>
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
              <div class="dropdown-item">
              <div class="row">
                <div class="col-md-4 p-0">
                  <a href="<?php the_permalink(); ?>"><img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>" class="img-fluid"></a>
                </div>
                <div class="col-md-8 p-0 pr-2 text-right">
                  <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                  <p><?php the_terms(get_the_ID(),"movie_cat"); ?></p>
                  <p class="eye"><i class="fas fa-eye"></i><?php the_views(); ?>بازدید</p>
                  <p class="year"><?php echo get_the_date('d F Y'); ?></p>
                </div>
                </div>
              </div>

              <hr>

              <?php endwhile; wp_reset_postdata(); ?>
          </div>
        </div>   
        </div>
        <?php
        $pro_options=woolearn_get_option('subtitle');
        ?>
        <div class="col-lg-8 col-md-12 col-12 d-none d-lg-block">
            <nav class="navbar nav-search navbar-light">
                <form action="<?php bloginfo("url") ?>/" method="get" class="w-100">
                    <input name="s" class="form-control text-right mr-sm-2" type="search" placeholder="<?php echo  @$pro_options; ?>" aria-label="Search">
                    <button class="search" type="submit"> <i class="fas fa-search"></i> </button>
                    <button type="button" class="filtter position-absolute" data-toggle="modal" data-target="#exampleModal">
                        <i class="fas fa-sort-amount-down"></i>
                    </button>
                    <?php $select_posttype=woolearn_get_option('select_posttype'); ?>
                    <?php
                    /**-----------------------POST_TYPE:POST--------------------------- */
                    if ( 'post' === $select_posttype ){
                        echo '<input type="hidden" name="post_type" value="post">';
                    }
                    /**-----------------------POST_TYPE:page--------------------------- */
                    if ( 'page' === $select_posttype ){
                        echo '<input type="hidden" name="post_type" value="page">';
                    }
                    /**-----------------------POST_TYPE:product--------------------------- */
                    if ( 'product' === $select_posttype ){
                        echo '<input type="hidden" name="post_type" value="product">';
                    }
                    /**-----------------------POST_TYPE:coagex_movie--------------------------- */
                    if ( 'coagex_movie' === $select_posttype ){
                        echo '<input type="hidden" name="post_type" value="coagex_movie">';
                    }
                    ?>
                </form>
            </nav>
        </div>
        <?php
        $header_options=woolearn_get_option('header-logo');
        ?>
        <div class="col-lg-2 col-md-6 col-6 logomake">
            <nav class="navbar-light pt-2 d-none d-lg-block">
                <a class="navbar-brand" href="<?php echo get_bloginfo('siteurl'); ?>">
                    <img src="<?php echo  $header_options[0]['logo']; ?>" width="30" height="30" class="d-inline-block align-top w-100" alt="<?php echo get_bloginfo('name'); ?>" loading="lazy">
                </a>
            </nav>
            <div class="d-flex justify-content-end align-items-center d-block d-lg-none">
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
            <div class="search-pushmenu d-block d-lg-none position-absolute">
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

</section>
</header>
<!-- Modal -->
<form action="<?php bloginfo("url") ?>/" method="get" role="search" class="w-100">
<div class="modal fade header-2-fillter" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">جستجوی حرفه‌ای</h5>
            <button type="button" class="close m-0" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
        <input name="s" class="form-control text-right w-100" type="search" placeholder="<?php echo  @$pro_options; ?>" aria-label="Search">
        <div class="row my-3">
            <div class="col-md-4 text-right">
            <?php
                $args_1 = wp_parse_args(
                    
                    array(
                        'show_count'         => false,
                        'hierarchical'       => 1,
                        'hide_empty'         => 1,
                        'orderby'            => 'name',
                        'selected'           => isset( $wp_query->query_vars['movie_cat'] ) ? $wp_query->query_vars['movie_cat'] : '',
                        'show_option_none'   => __( 'دسته‌بندی', 'woocommerce' ),
                        'value_field'        => 'slug',
                        'taxonomy'           => 'movie_cat',
                        'name'               => 'movie_cat',
                    )
                );

                if ( 'order' === $args_1['orderby'] ) {
                    $args_1['orderby']  = 'meta_value_num';
                    $args_1['meta_key'] = 'order';
                }

                wp_dropdown_categories( $args_1 );

            ?>
            </div>
            <div class="col-md-4 text-right">
                <?php
                    $args_2 = wp_parse_args(
                        
                        array(
                            'show_count'         => false,
                            'hierarchical'       => 1,
                            'hide_empty'         => 1,
                            'orderby'            => 'name',
                            'selected'           => isset( $wp_query->query_vars['honarmandan'] ) ? $wp_query->query_vars['honarmandan'] : '',
                            'show_option_none'   => __( 'هنرمند', 'woocommerce' ),
                            'value_field'        => 'slug',
                            'taxonomy'           => 'honarmandan',
                            'name'               => 'honarmandan',
                        )
                    );

                    if ( 'order' === $args_2['orderby'] ) {
                        $args_2['orderby']  = 'meta_value_num';
                        $args_2['meta_key'] = 'order';
                    }

                    wp_dropdown_categories( $args_2 );

                ?>
            </div>
            <div class="col-md-4 text-right">
                <?php
                    $args = wp_parse_args(
                        
                        array(
                            'show_count'         => false,
                            'hierarchical'       => 1,
                            'hide_empty'         => 1,
                            'orderby'            => 'name',
                            'selected'           => isset( $wp_query->query_vars['ages'] ) ? $wp_query->query_vars['ages'] : '',
                            'show_option_none'   => __( 'محدودیت سنی', 'woocommerce' ),
                            'value_field'        => 'slug',
                            'taxonomy'           => 'ages',
                            'name'               => 'ages',
                        )
                    );

                    if ( 'order' === $args['orderby'] ) {
                        $args['orderby']  = 'meta_value_num';
                        $args['meta_key'] = 'order';
                    }

                    wp_dropdown_categories( $args );

                ?>
            </div>
            <div class="col-md-4 text-right">
                <?php
                    $args = wp_parse_args(
                        
                        array(
                            'show_count'         => false,
                            'hierarchical'       => 1,
                            'hide_empty'         => 1,
                            'orderby'            => 'name',
                            'selected'           => isset( $wp_query->query_vars['yaers'] ) ? $wp_query->query_vars['yaers'] : '',
                            'show_option_none'   => __( 'سال ساخت', 'woocommerce' ),
                            'value_field'        => 'slug',
                            'taxonomy'           => 'yaers',
                            'name'               => 'yaers',
                        )
                    );

                    if ( 'order' === $args['orderby'] ) {
                        $args['orderby']  = 'meta_value_num';
                        $args['meta_key'] = 'order';
                    }

                    wp_dropdown_categories( $args );

                ?>
            </div>
            <div class="col-md-4 text-right">
                <?php
                    $args = wp_parse_args(
                        
                        array(
                            'show_count'         => false,
                            'hierarchical'       => 1,
                            'hide_empty'         => 1,
                            'orderby'            => 'name',
                            'selected'           => isset( $wp_query->query_vars['country'] ) ? $wp_query->query_vars['country'] : '',
                            'show_option_none'   => __( 'کشور', 'woocommerce' ),
                            'value_field'        => 'slug',
                            'taxonomy'           => 'country',
                            'name'               => 'country',
                        )
                    );

                    if ( 'order' === $args['orderby'] ) {
                        $args['orderby']  = 'meta_value_num';
                        $args['meta_key'] = 'order';
                    }

                    wp_dropdown_categories( $args );

                ?>
            </div>
            <div class="col-md-4 text-right">
                <?php
                    $args = wp_parse_args(
                        
                        array(
                            'show_count'         => false,
                            'hierarchical'       => 1,
                            'hide_empty'         => 1,
                            'orderby'            => 'name',
                            'selected'           => isset( $wp_query->query_vars['ganres'] ) ? $wp_query->query_vars['ganres'] : '',
                            'show_option_none'   => __( 'ژانر', 'woocommerce' ),
                            'value_field'        => 'slug',
                            'taxonomy'           => 'ganres',
                            'name'               => 'ganres',
                        )
                    );

                    if ( 'order' === $args['orderby'] ) {
                        $args['orderby']  = 'meta_value_num';
                        $args['meta_key'] = 'order';
                    }

                    wp_dropdown_categories( $args );

                ?>
            </div>
        </div>
        </div>
        <div class="modal-footer justify-content-center">
            <button type="submit" class="btn bg-danger text-white rounded">جستجو کن</button>
        </div>
            <?php $select_posttype=woolearn_get_option('select_posttype'); ?>
            <?php
            /**-----------------------POST_TYPE:POST--------------------------- */
            if ( 'post' === $select_posttype ){
                echo '<input type="hidden" name="post_type" value="post">';
            }
            /**-----------------------POST_TYPE:page--------------------------- */
            if ( 'page' === $select_posttype ){
                echo '<input type="hidden" name="post_type" value="page">';
            }
            /**-----------------------POST_TYPE:product--------------------------- */
            if ( 'product' === $select_posttype ){
                echo '<input type="hidden" name="post_type" value="product">';
            }
            /**-----------------------POST_TYPE:coagex_movie--------------------------- */
            if ( 'coagex_movie' === $select_posttype ){
                echo '<input type="hidden" name="post_type" value="coagex_movie">';
            }
            ?>
        </div>
    </div>
</div>
</form>