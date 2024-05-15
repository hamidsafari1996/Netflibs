<header>
<?php
$header_options=woolearn_get_option('header-logo');
?>
<div class="menu-web-head d-none d-lg-block">
    <div class="container">
        <div class="row">
        <div class="col-lg-2 col-md-6 col-sm-6 col-6">
            <nav class="navbar-light newlog pt-2 pb-2">
            <a class="navbar-brand" href="<?php echo site_url(); ?>">
                <img src="<?php echo  $header_options[0]['logo']; ?>" width="30" height="30" class="d-inline-block align-top w-100" alt="<?php echo get_bloginfo('name'); ?>" loading="lazy">
            </a>
            </nav>
        </div>
        <div class="col-lg-7 col-md-6 col-sm-6 col-6 older">
            <nav class="navbar-expand-lg navbar-light pt-2 pb-2 text-right">
            <button class="navbar-toggler bg-white" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
                <div class="d-none d-lg-block deop">
                <?php 
                $args=array(
                    'theme_location'=>'header-main-menu',
                    'depth'=>2
                );
                wp_nav_menu($args);

                ?>
                </div>
            </nav>
        </div>
        <?php
        $pro_options=woolearn_get_option('subtitle');
        ?>
        <div class="col-lg-3 col-md-12 col-sm-12 col-12">
        <nav class="navbar-light research pt-2 pb-2">
        <form action="<?php bloginfo("url") ?>/" method="get" role="search" class="w-100">
            <input name="s" class="form-control text-right" type="search" placeholder="<?php echo  @$pro_options; ?>" aria-label="Search">
            <button class="search" type="submit"> <i class="fas fa-search"></i> </button>
            <button type="button" class="filtter position-absolute" data-toggle="modal" data-target="#exampleModal">
                <i class="fas fa-sliders-h"></i>
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
        </div>
    </div>
    <div class="container-fluid p-0 d-block d-lg-none">
        <div class="collapse navbar-collapse deop" id="navbarNavDropdown">
        <?php 
        $args=array(
            'theme_location'=>'header-main-menu',
            'depth'=>2
        );
        wp_nav_menu($args);

        ?>
        </div>
    </div>
</div>
<div class="d-block d-lg-none">
    <?php get_template_part('template/menu','responsive'); ?>
</div>
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