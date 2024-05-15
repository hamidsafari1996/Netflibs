<?php $coagex_while_option = woolearn_get_option('coagex_while_film_group');
foreach ($coagex_while_option as $item) { ?>
<div class="container-fluid">
    <div class="row section-style-one">
      <div class="col-6 text-right">
         <div class="espical-header mt-5">
            <h3 class="section-title">
            <?php echo @$item['title']; ?>
            </h3>
            
         </div>
      </div>
      <div class="col-6 text-left">
         <div class="espical-header mt-5">
            <a href="<?php echo @$item['link']; ?>" class="text-upper section-header-link mt-5"><span class="ml-3"><?php echo @$item['subtitle']; ?></span><i class="fas fa-arrow-left"></i></a>
         </div>
      </div> 
   </div>
<div class="row filimna flex-nowrap overflow-auto px-3">
<?php
    $tax = $item['tax'];
    $posts = $item['test_number'];
    $order = $item['order_id_4'];
    $filter = $item['orderby_id_4'];
    $target = $item['target_select_4'];
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

    <div class="mb-5 responsive-width mx-1">
        <div class="filimo-info mb-3 shadow-around">
        <img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>" class="filimo-index">
        <div class="filimo-overlay"></div>
        <div class="filimo-overlay-text text-right text-white">
        <?php 
        $imbd_link = get_post_meta(get_the_ID(),'link',true);  
        $text_imbd = get_post_meta(get_the_ID(),'text-imDb',true); 
        ?>
            <?php
            $select_sethand = get_post_meta( get_the_ID(), 'imDb_select', true );
            if ( 'defult-select' === $select_sethand ){ ?>
            <p><a href="<?php echo $imbd_link; ?>"><span class="imbd"><i class="fab fa-imdb"></i><?php echo $text_imbd; ?></span></a></p>
            <p><span><?php the_terms(get_the_ID(),"movie_cat"); ?></span></p>
            <p><span><?php the_terms(get_the_ID(),"yaers"); ?></span></p>
            <?php
            }
            ?>
            <?php
            if ( 'imdb-tabligh' === $select_sethand ){ ?>
            <?php
            $IMDB = new IMDB($imbd_link); 
            ?>

            <p><a href="<?php echo $imbd_link; ?>"><span class="imbd"><i class="fab fa-imdb"></i><?php if ($IMDB->isReady) { print_r($IMDB->getRating()); } else { echo ''; } ?></span></a></p>
            <p><span><?php the_terms(get_the_ID(),"movie_cat"); ?></span></p>
            <p><span><?php if ($IMDB->isReady) { print_r($IMDB->getYear()); } else { echo ''; } ?></span></p>

            <?php
            }
            ?>
        </div>
        </div>
        <ficaption class="fig text-right">
            <h3><a href="<?php the_permalink(); ?>" class="text-white" data-toggle="tooltip" title="<?php the_title(); ?>" target="<?php echo $target; ?>"><?php the_title(); ?></a></h3>
        </ficaption>
    </div>
    <?php endwhile; wp_reset_postdata(); ?>


</div>
</div>
<?php } ?>