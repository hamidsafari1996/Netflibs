<div class="web-search-section web-movie-section">
      <div class="container">
            <div class="row movie-carousel justify-content-center responsive-cat">
                  <?php
                  $text_years = get_post_meta(get_the_ID(),'text-years',true); 
                  $text_imbd = get_post_meta(get_the_ID(),'text-imDb',true);
                  $pic = get_term_meta( get_queried_object()->term_id, 'cat-img', true );
                  if (have_posts()) {

                        while (have_posts()) {

                              the_post();

                  ?>



                              <?php
                              $select_sethand = get_post_meta(get_the_ID(), 'imDb_select', true);
                              if ('defult-select' === $select_sethand) { ?>
                                    <div class="card item-post">
                                          <a href="<?php the_permalink(); ?>"><img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>" class="img-fluid rounded list-img-search figure-img"></a>
                                          <div class="card-body">
                                                <div class="movie-new-content mb-4 text-right">
                                                      <h2 data-toggle="tooltip" title="<?php the_title(); ?>"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                                                </div>
                                                <div class="movie-new-footer">
                                                      <span class="star ml-3"><i class="fas fa-star"></i><?php echo $text_imbd; ?></span>
                                                      <span class="eye"><i class="fas fa-eye"></i><?php the_views(); ?></span>
                                                      <span class="float-left years"><?php the_terms(get_the_ID(), "yaers"); ?></span>
                                                      <?php global $user_ID; ?>
                                                      <?php if ($user_ID) { ?>
                                                            <div class="position-absolute faverit-button">
                                                                  <?php echo do_shortcode('[favorite_button]'); ?>
                                                            </div>
                                                      <?php } else { ?>
                                                            <div class="position-absolute faverit-button-error">
                                                                  <button class="simplefavorite-button">
                                                                        <i class="far fa-bookmark"></i>
                                                                  </button>
                                                            </div>
                                                      <?php } ?>
                                                </div>
                                          </div>
                                    </div>
                              <?php
                              }
                              ?>
                              <?php
                              if ('imdb-tabligh' === $select_sethand) { ?>
                                    <?php
                                    $imbd_link = get_post_meta(get_the_ID(), 'link', true);
                                    $IMDB = new IMDB($imbd_link);
                                    ?>

                                    <div class="card item-post">
                                          <a href="<?php the_permalink(); ?>"><img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>" class="img-fluid rounded list-img-search figure-img"></a>
                                          <div class="card-body">
                                                <div class="movie-new-content mb-4 text-right">
                                                      <h2 data-toggle="tooltip" title="<?php the_title(); ?>"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                                                </div>
                                                <div class="movie-new-footer">
                                                      <span class="star ml-3"><i class="fas fa-star"></i><?php if ($IMDB->isReady) {
                                                                                                                  print_r($IMDB->getRating());
                                                                                                            } else {
                                                                                                                  echo '';
                                                                                                            } ?></span>
                                                      <span class="eye"><i class="fas fa-eye"></i><?php the_views(); ?></span>
                                                      <span class="float-left"><?php if ($IMDB->isReady) {
                                                                                          print_r($IMDB->getYear());
                                                                                    } else {
                                                                                          echo '';
                                                                                    } ?></span>
                                                      <?php if ($user_ID) { ?>
                                                            <div class="position-absolute faverit-button">
                                                                  <?php echo do_shortcode('[favorite_button]'); ?>
                                                            </div>
                                                      <?php } else { ?>
                                                            <div class="position-absolute faverit-button-error">
                                                                  <button class="simplefavorite-button">
                                                                        <i class="far fa-bookmark"></i>
                                                                  </button>
                                                            </div>
                                                      <?php } ?>
                                                </div>
                                          </div>
                                    </div>

                              <?php
                              }
                              ?>
                  <?php

                        }
                  } else {



                        echo '<div class="alert alert-primary text-right" role="alert">
                        موردی یافت نشد دوباره تلاش کنید!
                        </div>';
                  }



                  ?>
            </div>
            <!-- Pagination -->
            <div class="col-xl-12">
                  <div class="next-previous-page">
                        <nav aria-label="...">
                              <ul class="pagination">
                                    <?php wp_pagenavi();  ?>
                              </ul>
                        </nav>
                  </div>
            </div>
      </div>
</div>