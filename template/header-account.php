
<header class="header-menu-account">
      <div class="container-fluid px-5">
            <div class="row align-items-center">
                  <div class="col-md-6 text-right">
                        <div class="dropdown">
                              <button class="bg-transparent border-0 rounded-circle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false">
                                    <div class="avatar position-relative">
                                          <?php echo get_avatar(get_current_user_id(), 80); ?>
                                          <i class="fas fa-angle-down position-absolute"></i>
                                    </div>
                              </button>
                              <div class="dropdown-menu menu-open" aria-labelledby="dropdownMenuButton">
                                    <?php foreach ( wc_get_account_menu_items() as $endpoint => $label ) : ?>
                                          <li class="<?php echo wc_get_account_menu_item_classes( $endpoint ); ?>">
                                                <a href="<?php echo esc_url( wc_get_account_endpoint_url( $endpoint ) ); ?>"><?php echo esc_html( $label ); ?></a>
                                          </li>
                                    <?php endforeach; ?>
                              </div>
                        </div>  
                  </div>
                  <?php
                  $allowed_html = array(
                        'a' => array(
                              'href' => array(),
                        ),
                  );
                  ?>

                  <div class="col-md-6 text-left">
                        <ul class="d-flex justify-content-end sid-left">
                              <li class="dropdown mx-2">
                                    
                                    <a class="" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-expanded="false">
                                          <i class="far fa-bell"></i>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                          <p class="text-right text-black-50">اعلان‌ها</p>
                                          <hr class="notification">
                                          <?php $coagex_product_option = woolearn_get_option('coagex_notification_group');
                                          foreach ($coagex_product_option as $item) {
                                          ?>
                                          <?php
                                          $taxonomy_netflibs = $item['notification_select'];
                                          $test_number = $item['test_number'];
                                          $best_product = array(
                                                'post_type' => 'post',
                                                'posts_per_page' => $test_number,
                                                'tax_query' => array(
                                                      array(
                                                          'taxonomy' => 'category',
                                                          'field' => 'slug',
                                                          'terms' => $taxonomy_netflibs,
                                                      ),
                                                ),
                                          );
                                          $show_best_product = new WP_Query($best_product);
                                          while($show_best_product->have_posts()) : $show_best_product->the_post();
                                          ?>
                                          <a class="dropdown-item text-right" href="<?php the_permalink(); ?>"><span class="icon ml-2"><i class="far fa-envelope"></i></span><?php the_title(); ?></a>  
                                          <?php endwhile; wp_reset_postdata(); ?>     
                                          <?php } ?>             
                                    </div>
                                    
                              </li>
                              <li class="logout mx-2">
                                    <a href="<?php echo wp_logout_url(home_url()); ?>"></a>
                              </li>
                        </ul>
                  </div>
            </div>
      </div>
</header>
