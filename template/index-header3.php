<?php
$header_options = woolearn_get_option('header-logo');
?>
<header>
      <div class="header-3__netsflibs web-header-section d-none d-lg-block">
            <div class="container">
                  <div class="row justify-content-center align-items-center">
                        <div class="col-2">
                              <div class="logo-site">
                                    <a class="navbar-brand" href="<?php echo site_url(); ?>">
                                          <img src="<?php echo  $header_options[0]['logo']; ?>" width="30" height="30" class="d-inline-block align-top" alt="<?php echo get_bloginfo('name'); ?>" loading="lazy">
                                    </a>
                              </div>
                        </div>
                        <div class="col-6">
                              <?php
                              $args = array(
                                    'theme_location' => 'header-main-menu',
                                    'depth' => 2
                              );
                              wp_nav_menu($args);
                              ?>
                        </div>
                        <div class="col-4">
                              <div class="d-flex more-netflibs">
                                    <?php
                                    $pro_options=woolearn_get_option('subtitle');
                                    ?>
                                    <div class="col-3">
                                          <form action="<?php bloginfo("url") ?>/" method="get" role="search" class="w-100">
                                                <div class="search-box">
                                                      <input type="text" name="s" placeholder="<?php echo  @$pro_options; ?>" class="search-input">
                                                      <button type="submit" class="search-btn">
                                                            <i class="fas fa-search"></i>
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
                                                </div>
                                          </form>
                                    </div>
                                    <div class="col-6 text-center">
                                          <a href="" class="subscribe-btn">خرید اشتراک</a>
                                    </div>
                                    <div class="col-3 text-center">
                                          <a href="" class="subscribe-btn">ورود</a>
                                    </div>
                              </div>
                        </div>
                  </div>
            </div>
      </div>
      <div class="d-block d-lg-none">
            <?php get_template_part('template/menu', 'responsive'); ?>
      </div>
</header>