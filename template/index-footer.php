<footer>
<div class="social-footer mt-5">
            <div class="container">
                <div class="row">
                    
                        <div class="col-lg-6 col-md-6 col-12">
                        <div class="menu-footer text-md-right text-center">
                        <?php 
                        $args=array(
                            'theme_location'=>'footer-main-menu',
                            'depth'=>2
                        );
                        wp_nav_menu($args);

                        ?>
                        </div>
                        </div>
                        <?php $coagex_social = woolearn_get_option("coagex_social_group"); if(  is_array($coagex_social) ) { ?>
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="social-net">
                            <?php foreach( $coagex_social as $i => $social_item) { ?>
                                <span><a href="<?php echo @$social_item['link']; ?>"><i class="fab <?php echo @$social_item['title']; ?>"></i></a></span>
                            <?php } ?>
                            </div>
                        </div>
                        <?php } ?>
                    
                </div>
            </div>
            <hr>
            <div class="container">
                    <div class="cat-footer">
                    <?php
                    $select_moviecat=woolearn_get_option('select_taxonamy');
                    if ( 'taxonamy_1' === $select_moviecat ){
                        $taxonomy  = 'movie_cat';
                    }
                    $select_movietag=woolearn_get_option('select_taxonamy');
                    if ( 'taxonamy_2' === $select_movietag ){
                        $taxonomy  = 'worldsub_tag';
                    }
                    $select_category=woolearn_get_option('select_taxonamy');
                    if ( 'taxonamy_3' === $select_category ){
                        $taxonomy     = 'category';
                    }
                    $select_posttag=woolearn_get_option('select_taxonamy');
                    if ( 'taxonamy_4' === $select_posttag ){
                        $taxonomy     = 'post-tag';
                    }
                    $select_honarmand=woolearn_get_option('select_taxonamy');
                    if ( 'taxonamy_5' === $select_honarmand ){
                        $taxonomy     = 'honarmandan';
                    }
                    $orderby      = 'name'; 
                    $show_count   = false;
                    $pad_counts   = false;
                    $hierarchical = true;
                    $title        = '';
                    
                    $args = array(
                    'taxonomy'     => $taxonomy,
                    'orderby'      => $orderby,
                    'show_count'   => $show_count,
                    'pad_counts'   => $pad_counts,
                    'hierarchical' => $hierarchical,
                    'title_li'     => $title,
                    'post_per_page' => 20,
                    );
                    ?>
                    
                    <nav class="nav mb-5 justify-content-center">
                        <?php wp_list_categories( $args ); ?>
                    </nav>
                    <?php
                    $select_moviecat=woolearn_get_option('select_cat');
                    if ( 'taxonamy_1' === $select_moviecat ){
                        $taxonomy  = 'movie_cat';
                    }
                    $select_movietag=woolearn_get_option('select_cat');
                    if ( 'taxonamy_2' === $select_movietag ){
                        $taxonomy  = 'worldsub_tag';
                    }
                    $select_category=woolearn_get_option('select_cat');
                    if ( 'taxonamy_3' === $select_category ){
                        $taxonomy     = 'category';
                    }
                    $select_posttag=woolearn_get_option('select_cat');
                    if ( 'taxonamy_4' === $select_posttag ){
                        $taxonomy     = 'post-tag';
                    }
                    $select_honarmand=woolearn_get_option('select_cat');
                    if ( 'taxonamy_5' === $select_honarmand ){
                        $taxonomy     = 'honarmandan';
                    }
                    $orderby      = 'name'; 
                    $show_count   = false;
                    $pad_counts   = false;
                    $hierarchical = true;
                    $title        = '';
                    
                    $args = array(
                    'taxonomy'     => $taxonomy,
                    'orderby'      => $orderby,
                    'show_count'   => $show_count,
                    'pad_counts'   => $pad_counts,
                    'hierarchical' => $hierarchical,
                    'title_li'     => $title,
                    'post_per_page' => 20,
                    );
                    ?>
                    
                    <nav class="nav mb-5 justify-content-center">
                        <?php wp_list_categories( $args ); ?>
                    </nav>
                    </div>
            </div>
            <?php
            $coagex_app=woolearn_get_option('coagex_app_title_group');
            ?>
            <div class="container">
                <div class="row">
                    <div class="app-footer text-center">
                        <div class="col-12">
                            <div class="header-footer mb-3">
                                <h6><?php echo  $coagex_app[0]['title']; ?></h6>
                            </div>
                            <nav>
                            <?php $coagex_App = woolearn_get_option("coagex_App_group"); if(  is_array($coagex_App) ) { ?>
                                <ul>
                                <?php foreach( $coagex_App as $i => $App_item) { ?>
                                    <li>
                                        <a href="<?php echo @$App_item['link']; ?>"><i class="fab <?php echo @$App_item['icon']; ?> ml-2"></i><?php echo @$App_item['title']; ?></a>
                                    </li>
                                    <?php } ?>
                                </ul>
                            <?php } ?>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <section>
            <?php
            $desc_options=woolearn_get_option('group_desc_id');
            ?>
                <div class="container">
                    <div class="row">
                        <div class="site-law text-center">
                            <p><?php echo $desc_options[0]['desc']; ?></p>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <div class="copyright-section">
            <div class="container">
                <div class="row">
                    <div class="site-copy text-center">
                        <i class="fas fa-copyright d-inline"></i>
                        <p class="mr-2 d-inline"><?php echo $desc_options[0]['title']; ?></p>
                    </div>
                </div>
            </div>
        </div>
</footer>
