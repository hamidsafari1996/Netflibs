<?php
$header_options=woolearn_get_option('coagex_product_group');
?>
   <div class="container-fluid">
   <div class="row section-style-one">
      <div class="col-6 text-right">
         <div class="espical-header mt-5">
            <h3 class="section-title">
            <?php echo  $header_options[0]['title-name']; ?>
            </h3>
            
         </div>
      </div>
      <div class="col-6 text-left">
         <div class="espical-header mt-5">
            <a href="<?php echo  $header_options[0]['link2-button']; ?>" class="text-upper section-header-link mt-5"><span class="ml-3"><?php echo  $header_options[0]['title2-button']; ?></span><i class="fas fa-arrow-left"></i></a>
         </div>
      </div> 
   </div>

   <div class="row filim">
   <?php $coagex_filimo_option = woolearn_get_option('coagex_product_group');
      foreach ($coagex_filimo_option as $item) { ?>
      <?php
      $tax = $item['tax-mov'];
      $posts = $item['test1_number'];
      $order = $item['order_id_2'];
      $filter = $item['orderby_id_2'];
      $target = $item['target_select_2'];
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
      <div class="col-12 col-lg-3 col-md-4">
      <?php 
         $imbd_link = get_post_meta(get_the_ID(),'link',true); 
         $text_imbd = get_post_meta(get_the_ID(),'text-imDb',true);
         $text_img = get_post_meta(get_the_ID(),'img',true);
         ?>
         <div class="portfolio-info mb-3 shadow-around rounded">
            <img src="<?php echo $text_img; ?>" alt="<?php the_title(); ?>" class="rounded">
            <div class="portfolio-overlay"></div>
            <?php
            $select_sethand = get_post_meta( get_the_ID(), 'imDb_select', true );
            if ( 'defult-select' === $select_sethand ){ ?>
            <div class="portfolio-overlay-text text-right text-white">
               <p><span class="imbd"><i class="fab fa-imdb"></i><?php echo $text_imbd; ?></span></p>
               <a href="<?php the_permalink(); ?>" class="text-white" target="<?php echo $target; ?>"><h3 class="mb-3 mt-1"><?php the_title() ?></h3></a>
               <p><span><?php the_terms(get_the_ID(),"movie_cat"); ?></span></p>
               <span><?php the_terms(get_the_ID(),"yaers"); ?></span>
            </div>
            <?php
            }
            ?>
            <?php
            if ( 'imdb-tabligh' === $select_sethand ){ ?>
            <?php
            $IMDB = new IMDB($imbd_link); 
            ?>
            <div class="portfolio-overlay-text text-right text-white">
               <p><span class="imbd"><i class="fab fa-imdb"></i><?php if ($IMDB->isReady) { print_r($IMDB->getRating()); } else { echo ''; } ?></span></p>
               <a href="<?php the_permalink(); ?>" class="text-white"><h3 class="mb-3 mt-1"><?php the_title() ?></h3></a>
               <p><span><?php the_terms(get_the_ID(),"movie_cat"); ?></span></p>
               <span><?php if ($IMDB->isReady) { print_r($IMDB->getYear()); } else { echo ''; } ?></span>
            </div>

            <?php
            }
            ?>
         </div>
      </div>
      <?php endwhile; wp_reset_postdata(); ?>
   </div>
   </div>
   <?php } ?>