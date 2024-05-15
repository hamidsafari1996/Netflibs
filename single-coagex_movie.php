<?php get_header();
$select_header = get_post_meta( get_the_ID(), 'wiki_test_select', true );
if ( 'header' === $select_header ){
	get_template_part('template/index','header');
}
$select_header1 = get_post_meta( get_the_ID(), 'wiki_test_select', true );
if ( 'header-1' === $select_header1 ){
	get_template_part('template/index','header2'); 
}
$select_header2 = get_post_meta( get_the_ID(), 'wiki_test_select', true );
if ( 'header-2' === $select_header2 ){
	get_template_part('template/push','menu'); 
}

if($elementor_header = get_post_meta(get_the_ID(),'header-elementor-select',true)){
    ?>
    <header>
        <?php
        $elementor = \Elementor\Plugin::instance();
        echo $elementor->frontend->get_builder_content($elementor_header);
        ?>
    </header>
    <?php
}

$movie_imagev = get_post_meta(get_the_ID(),'imagev',true);
?>
<?php while(have_posts()) : the_post(); ?>
<div class="single-film-section" style="background-image: url('<?php echo $movie_imagev ?>')">
    <div class="container">
        <div class="row view-movie">
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 ">
                <div class="expertise-image position-relative">
                    <img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
                    <?php global $user_ID; ?> 
                    <?php if($user_ID){ ?>
                        <div class="position-absolute faverit-button">
                            <?php echo do_shortcode('[favorite_button]'); ?>
                        </div> 
                        <?php }else{ ?>
                        <div class="position-absolute faverit-button-error">
                            <button class="simplefavorite-button">
                            <i class="far fa-bookmark"></i>
                            </button>
                        </div> 
                    <?php } ?>
                </div>
                
            </div>
            <?php 
            $time_movie = get_post_meta(get_the_ID(),'text-time',true);
            $imbd_name = get_post_meta(get_the_ID(),'text-imDb',true);
            $imbd_link = get_post_meta(get_the_ID(),'link',true);
            $text_button = get_post_meta(get_the_ID(),'text-button',true);
            $time_link = get_post_meta(get_the_ID(),'text-link',true);
            ?>
            
            <div class="col-xl-8 col-lg-8 col-md-6 col-sm-6 d-flex align-items-center">
                <div class="section-heading-1 text-right text-white">
                    <h4><?php the_title(); ?></h4>

                    <?php
                    $select_sethand = get_post_meta( get_the_ID(), 'imDb_select', true );
                    if ( 'defult-select' === $select_sethand ){ ?>
                    <p class="years"><span><?php the_terms(get_the_ID(),"yaers"); ?></span></p>
                    <p><span><?php echo $time_movie ?></span></p>
                    <p><a href="<?php echo $imbd_link ?>" class="imDb-net"><span><i class="fab fa-imdb ml-1"></i><?php echo $imbd_name; ?></span></a></p>
                    <?php
                    }
                    ?>
                    <?php
                    if ( 'imdb-tabligh' === $select_sethand ){ ?>
                    <?php
                    $IMDB = new IMDB($imbd_link); ?>
                    <p><span><?php if ($IMDB->isReady) { print_r($IMDB->getYear()); } else { echo ''; } ?></span></p>
                    <p><span><?php if ($IMDB->isReady) { print_r($IMDB->getRuntime()); } else { echo ''; } ?></span></p>
                    <p><a href="<?php echo $imbd_link ?>" class="imDb-net"><span><i class="fab fa-imdb ml-1"></i><?php if ($IMDB->isReady) { print_r($IMDB->getRating()); } else { echo ''; } ?></span></a></p>
                    <?php
                    }
                    ?>

                    <p class="cat"><span><?php the_terms(get_the_ID(),"movie_cat"); ?></span></p>
                    <?php the_excerpt(); ?>
                    <a href="<?php echo $time_link ?>" class="btn btn-danger popup-youtube"><i class="fas fa-play"></i><span class="mr-3"><?php echo $text_button ?></span></a>
                </div>
            </div> 
            
        </div>
    </div>
</div>
<div class="container">
    <div class="blog text-right mt-4">
        <?php the_content(); ?>
        
    </div>
    
</div>
<?php endwhile; wp_reset_postdata(); ?>
<?php 
$big_tizer = get_post_meta(get_the_ID(),'image-big',true);
$link_tizer = get_post_meta(get_the_ID(),'tabligh',true);
?>
<div class="container mx-auto p-0">
    <a href="<?php echo $link_tizer; ?>"><img class="w-100 mb-5" src="<?php echo $big_tizer; ?>" alt=""></a>
</div>
<div class="sec-web-dl">
    <div class="container">
        <div class="row">
            <div class="accordion" id="accordionExample">
            <?php
            $count_collaps = 0;
                $successful_students_items = get_post_meta(get_the_id() , 'group_field_id', true);

                if (!empty($successful_students_items))
                {
                foreach($successful_students_items as $successful_students_item)
                { ?>
                <?php
                $restice_select = get_post_meta( get_the_ID(), 'restice_select', true );
                if ( 'restice-no' === $restice_select ){ 
                ?>  
                <div class="card my-2">
                    <div class="card-header" id="heading-<?php echo $count_collaps; ?>">
                    <h2 class="mb-0">
                        <button class="btn btn-link text-right float-right" type="button" data-toggle="collapse" data-target="#collapse-<?php echo $count_collaps; ?>" aria-expanded="false" aria-controls="collapse-<?php echo $count_collaps; ?>">
                        <?php echo $successful_students_item['title']; ?>
                        </button>
                        <button class="btn btn-link text-left float-left" type="button" data-toggle="collapse" data-target="#collapse-<?php echo $count_collaps; ?>" aria-expanded="false" aria-controls="collapse-<?php echo $count_collaps; ?>">
                        <span><i class="fas fa-play"></i></span>
                        </button>
                    </h2>
                    </div>
                    
                    <div id="collapse-<?php echo $count_collaps; ?>" class="collapse text-right" aria-labelledby="heading-<?php echo $count_collaps; ?>" data-parent="#accordionExample">
                    <div class="card-body">
                    <?php echo $successful_students_item['description']; ?>
                    </div>
                    <div class="row mx-4">
                    <?php 
                        $t = $successful_students_item['link_products']; $counting=1;
                        //$t = explode()
                        if (!empty($t)){
                        foreach ($t as $junk)
                        {
                        ?>
                            <a href="<?php echo $junk['link']; ?>" class="btn btn-danger my-4 mx-2"><i class="fas fa-download"></i><span class="mr-3"><?php echo $junk['title']; ?></span></a>
                        <?php } } ?>
                        <?php if ( $successful_students_item['quality_checkbox_4'] ) : ?>
                            <a href="<?php echo $successful_students_item['sub-link_4']; ?>" class="btn bg-warning my-4 mr-2"><i class="fas fa-download"></i><span class="mr-3"><?php echo $successful_students_item['sub-title_4']; ?></span></a>
                        <?php endif; ?>
                    </div>
                </div>
                    
                </div>
                <?php } ?>
                <?php
                $restice_select = get_post_meta( get_the_ID(), 'restice_select', true );
                if ( 'restice-yes' === $restice_select ){ 
                ?>
                <?php if( rcp_get_subscription()){ ?>
                <div class="card my-2">
                    <div class="card-header" id="heading-<?php echo $count_collaps; ?>">
                    <h2 class="mb-0">
                        <button class="btn btn-link text-right float-right" type="button" data-toggle="collapse" data-target="#collapseOne-<?php echo $count_collaps; ?>" aria-expanded="false" aria-controls="collapseOne-<?php echo $count_collaps; ?>">
                        <?php echo $successful_students_item['title']; ?>
                        </button>
                        <button class="btn btn-link text-left float-left" type="button" data-toggle="collapse" data-target="#collapseOne-<?php echo $count_collaps; ?>" aria-expanded="false" aria-controls="collapseOne-<?php echo $count_collaps; ?>">
                        <span><i class="fas fa-play"></i></span>
                        </button>
                    </h2>
                    </div>
                    
                    <div id="collapseOne-<?php echo $count_collaps; ?>" class="collapse text-right" aria-labelledby="heading-<?php echo $count_collaps; ?>" data-parent="#accordionExample">
                        <div class="card-body">
                            <?php echo $successful_students_item['description']; ?>
                        </div>
                        <div class="row mx-4">
                        <?php 
                            $t = $successful_students_item['link_products']; $counting=1;
                            //$t = explode()
                            if (!empty($t)){
                            foreach ($t as $junk)
                            {
                            ?>
                                <a href="<?php echo $junk['link']; ?>" class="btn btn-danger my-4 mx-2"><i class="fas fa-download"></i><span class="mr-3"><?php echo $junk['title']; ?></span></a>
                            <?php } } ?>
                            <?php if ( $successful_students_item['quality_checkbox_4'] ) : ?>
                                <a href="<?php echo $successful_students_item['sub-link_4']; ?>" class="btn bg-warning my-4 mr-2"><i class="fas fa-download"></i><span class="mr-3"><?php echo $successful_students_item['sub-title_4']; ?></span></a>
                            <?php endif; ?>
                        </div>
                    
                    </div>
                    
                </div>
                <?php }else{ ?>
                <div class="card my-2">
                    <div class="card-header" id="heading-<?php echo $count_collaps; ?>">
                    <h2 class="mb-0">
                        <button class="btn btn-link text-right float-right" type="button" data-toggle="collapse" data-target="#collapseOne-<?php echo $count_collaps; ?>" aria-expanded="false" aria-controls="collapseOne-<?php echo $count_collaps; ?>">
                        <?php echo $successful_students_item['title']; ?>
                        </button>
                        <button class="btn btn-link text-left float-left" type="button" data-toggle="collapse" data-target="#collapseOne-<?php echo $count_collaps; ?>" aria-expanded="false" aria-controls="collapseOne-<?php echo $count_collaps; ?>">
                        <span><i class="fas fa-play"></i></span>
                        </button>
                    </h2>
                    </div>
                    
                    <div id="collapseOne-<?php echo $count_collaps; ?>" class="collapse text-right" aria-labelledby="heading-<?php echo $count_collaps; ?>" data-parent="#accordionExample">
                    <div class="card-body">
                    <?php echo $successful_students_item['description']; ?>
                    </div>
                    <button type="button" class="btn btn-danger m-4" data-toggle="modal" data-target="#resigester"><i class="fa-regular fa-lock"></i><span class="mr-3">خرید اشتراک</span></button>
                    </div>
                    
                </div>
                <?php } ?>
                <?php } ?>
                <?php
                $count_collaps++;   }
                } ?>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade resigester-content" id="resigester" tabindex="-1" aria-labelledby="resigesterLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="resigesterLabel">برای مشاهده این فیلم باید اشتراک داشته باشید</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body d-flex">
        <div class="col-6 text-center">
            <a href="<?php echo site_url(); ?>/my-account" class="modal-btn-regester right-bg">ورود</a>
        </div>
        <div class="col-6 text-center">
            <a href="<?php echo site_url(); ?>/my-account/support/" class="modal-btn-regester left-bg">خرید اشتراک</a>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="container">

    <?php 
    $tabligh_select = woolearn_get_option('tabligh_select', true );
    if ( 'setting-tabligh' === $tabligh_select ){ ?>
    <?php
    $worldsub_options = woolearn_get_option('coagex_tizer_especial_group');
    ?>
    <div class="row">
        <div class="header-top-section bg-dark shadow-sm mb-3 mt-5">
            <div class="title-top d-flex">
                <i class="fas fa-bullhorn"></i>
                <h3 class="text-white"><?php echo  $worldsub_options[0]['title_1']; ?></h3>
            </div>
            <div class="row tizer">
            <?php
            $ads_link = get_post_meta(get_the_ID(),'ads_link',true);
            ?>
            <?php $ads_posttype_setting = woolearn_get_option('ads_posttype_setting');
                            foreach ($ads_posttype_setting as $item) { ?>
                            <?php
                            $posts = $item['test_number'];
                            $order = $item['order_id'];
                            $filter = $item['orderby_id'];
                            $target = $item['target_select'];
                            $best_product = array(
                                'post_type' => 'ads',
                                'posts_per_page' => $posts,
                                'order' => $order,
                                'orderby' => $filter,
                            );
                            $show_best_product = new WP_Query($best_product);
                            while($show_best_product->have_posts()) : $show_best_product->the_post();
                            ?>
                            
            
                    <div class="col-lg-3 col-md-6 col-12 text-right">
                    <figure class="figure ml-2 mb-3">
                        <a href="<?php echo $ads_link; ?>" rel="nofollow" target="<?php echo $target; ?>"><img src="<?php the_post_thumbnail_url(); ?>" class="figure-img img-fluid" alt="<?php the_title(); ?>"></a>
                        <figcaption class="figure-caption text-right"><a class="text-white" href="<?php echo $ads_link; ?>" rel="nofollow" target="<?php echo $target; ?>"><?php the_title(); ?></a></figcaption>
                    </figure>
                    </div>
                    <?php endwhile; wp_reset_postdata(); ?>
                   <?php } ?>
                
            </div>
        </div>
    </div>
    <?php } ?>
    <?php 
    if ( 'yektanet-tabligh' === $tabligh_select ){ 
        $html_yektanet = woolearn_get_option('tabligh-html',true); echo $html_yektanet;
    } ?>
</div>

<div class="container">
    <div class="row">
        <div class="hash-section text-right">
            <span class="hash"><i class="fas fa-hashtag"></i><?php
the_terms(get_the_ID(),"worldsub_tag","برچسب : ");
?></span>
        </div>
    </div>
</div>

<section class="mt-5">
<div class="container">
    <div class="row">
        <div class="header-title mt-5 mb-3">
            <h2 class="text-white">فیلم های مشابه</h2>            
        </div>
                
        <div class="col-lg-12 col-md-12 col-12">
            <div class="movie-new-carousel rand-film owl-carousel owl-theme">

            <?php

            $q=new WP_Query(
                array(
                    'post_type' => 'coagex_movie',
                    "posts_per_page"=>11,
                    "orderby"=>"rand"

                )
            );

            while($q->have_posts())
            {
                $q->the_post();
                ?>
            
            <div class="movie-new-item ml-4 item">
                <figure class="figure">
                    <a href="<?php the_permalink(); ?>"><img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>" class="img-fluid rounded figure-img"></a>
                </figure>
                <ficaption class="figure-caption text-right">
                    <div class="movie-new-content mb-2">
                        <h2><a href="<?php the_permalink(); ?>" data-toggle="tooltip" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
                    </div>
                    <?php  
                    $text_imbd = get_post_meta(get_the_ID(),'text-imDb',true); 
                    ?>
                    <?php
                    $select_sethand = get_post_meta( get_the_ID(), 'imDb_select', true );
                    if ( 'defult-select' === $select_sethand ){ ?>
                    <div class="movie-new-footer">
                        <span class="star ml-3"><i class="fas fa-star"></i><?php echo $text_imbd; ?></span>
                        <span class="eye"><i class="fas fa-eye"></i> <?php the_views(); ?></span>
                        <span class="float-left years"><?php the_terms(get_the_ID(),"yaers"); ?></span>
                    </div>
                    <?php } ?>
                    <?php
                    if ( 'imdb-tabligh' === $select_sethand ){ ?>
                    <div class="movie-new-footer">
                        <span class="star ml-3"><i class="fas fa-star"></i><?php if ($IMDB->isReady) { print_r($IMDB->getRating()); } else { echo ''; } ?></span>
                        <span class="eye"><i class="fas fa-eye"></i> <?php the_views(); ?></span>
                        <span class="float-left"><?php if ($IMDB->isReady) { print_r($IMDB->getYear()); } else { echo ''; } ?></span>
                    </div>

                    <?php } ?>
                </ficaption>
            </div>


            <?php
                    }
                    wp_reset_postdata();

                    ?>  


            </div>
        </div>
    </div>
</div>
</section>
<div class="container">
    <div class="row">
    <?php 
    $title_artist = woolearn_get_option('title_artist');
    $title_singer = woolearn_get_option('title_singer');
    ?>
        <div class="single-section-content text-right">
            <?php $colors = get_the_terms(get_the_ID(), 'honarmandan');if($colors){ ?>
            <div class="title-honarmand text-white mb-4">
                <h3><?php echo $title_artist; ?> <?php the_title(); ?></h3>
            </div>
            <?php } ?>
            <?php taxonomy_honarmand() ?>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="single-section-content text-right">
            <?php $sedapishe = get_the_terms(get_the_ID(), 'sedapishegan');if($sedapishe){ ?>
            <div class="title-honarmand text-white mb-4">
                <h3><?php echo $title_singer; ?> <?php the_title(); ?></h3>
            </div>
            <?php } ?>
            <?php taxonomy_sedape() ?>
        </div>
    </div>
</div>
        <div class="text-right">
            <?php if ( comments_open() || get_comments_number() ) {
                comments_template();
            } ?>
        </div>



<?php 
$select_footer = get_post_meta( get_the_ID(), 'wiki_footer_select', true );
if ( 'footer_1' === $select_footer ) {
	get_template_part('template/index','footer');
}
$select_value = get_post_meta( get_the_ID(), 'wiki_test_select', true );
if ( 'footer_2' === $select_footer ){
	get_template_part('template/index','footer2');
}
$select_value = get_post_meta( get_the_ID(), 'wiki_test_select', true );
if ( 'footer_3' === $select_footer ){
      get_template_part('template/index','footer_3'); 
}

if($elementor_footer = get_post_meta(get_the_ID(),'footer_elementor_select',true)){
    ?>
    <footer>
    <?php
    $elementor = \Elementor\Plugin::instance();
    echo $elementor->frontend->get_builder_content($elementor_footer);
    ?>
    </footer>
    <?php
}

get_footer(); ?>