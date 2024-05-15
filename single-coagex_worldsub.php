<?php

/*
 * Template Name: single-2
 * Template Post Type: coagex_movie
 */
get_header();
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

get_template_part('template/index','slid');
get_template_part('template/index','top');
get_template_part('template/index','tizer');
?>

<div class="container">
    <div class="row mx-0">
        <div class="header-top-section shadow-sm mb-3 mt-3">
            <div class="title-top d-flex">
                <i class="fas fa-tape"></i>
                <h3><?php the_title(); ?></h3>
            </div>
            <hr>
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 mt-3">
                <div class="expertise-image position-relative">
                    <img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>" class="shadow-lg">
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
            $movie_years = get_post_meta(get_the_ID(),'text-years',true);
            $time_movie = get_post_meta(get_the_ID(),'text-translate',true);
            $text_button = get_post_meta(get_the_ID(),'link',true); 
            $imbd_name = get_post_meta(get_the_ID(),'text-imDb',true);
            ?>
            <div class="col-xl-8 col-lg-8 col-md-6 col-sm-6 d-flex align-items-center mt-3">
                <div class="section-heading-1 world-sec text-right">
                    <?php
                    $select_sethand = get_post_meta( get_the_ID(), 'imDb_select', true );
                    if ( 'defult-select' === $select_sethand ){ ?>
                    <li><span class="text-secondary"><i class="far fa-clock"></i>تاریخ انتشار: </span><?php the_terms(get_the_ID(),"yaers"); ?></li>
                    <li><span class="text-secondary"><i class="far fa-comment-dots"></i>تعداد دیدگاه: </span><?php comments_popup_link(' 0','1 دیدگاه','% دیدگاه'); ?></li>
                    <li><span class="text-secondary"><i class="fas fa-user-edit"></i>مترجمان: </span><?php echo $time_movie ?></li>
                    <li><span class="text-secondary"><i class="fas fa-genderless"></i>ژانر: </span><?php the_terms(get_the_ID(),"movie_cat"); ?></li>
                    <li><span class="text-secondary"><i class="fas fa-toggle-off"></i>هماهنگ با نسخه: </span><?php the_terms(get_the_ID(),"quality"); ?></li>
                    <li><span class="hash text-dark"><i class="fab fa-slack-hash"></i><?php the_terms(get_the_ID(),"worldsub_tag","برچسب :"); ?></span></li>
                    <li><span class="text-secondary"><i class="far fa-address-book"></i>بازیگران: </span><?php the_terms(get_the_ID(),"honarmandan"); ?></li>
                    <li><span class="text-secondary"><i class="fab fa-imdb"></i>امتیاز: </span><a href="<?php echo $text_button ?>"><img src="<?php echo path; ?>/img/imdb2.png" alt=""><span class="mr-1"><?php echo $imbd_name; ?></span></a></li>
                    <li><span class="badge badge-pill badge-secondary"><i class="fas fa-eye"></i><?php the_views(); ?> بار</span></li>
                    <?php
                    }
                    ?>
                    <?php
                    if ( 'imdb-tabligh' === $select_sethand ){ ?>
                    <?php
                    $IMDB = new IMDB($text_button); ?>
                        <li><span class="text-secondary"><i class="far fa-clock"></i>تاریخ انتشار: </span><?php if ($IMDB->isReady) { print_r($IMDB->getYear()); } else { echo ''; } ?></li>
                        <li><span class="text-secondary"><i class="far fa-comment-dots"></i>تعداد دیدگاه: </span><?php comments_popup_link(' 0','1 دیدگاه','% دیدگاه'); ?></li>
                        <li><span class="text-secondary"><i class="fas fa-user-edit"></i>مترجمان: </span><?php echo $time_movie ?></li>
                        <li><span class="text-secondary"><i class="fas fa-genderless"></i>ژانر: </span><?php the_terms(get_the_ID(),"movie_cat"); ?></li>
                        <li><span class="text-secondary"><i class="fas fa-toggle-off"></i>هماهنگ با نسخه: </span><?php the_terms(get_the_ID(),"quality"); ?></li>
                        <li><span class="hash text-dark"><i class="fab fa-slack-hash"></i><?php the_terms(get_the_ID(),"worldsub_tag","برچسب :"); ?></span></li>
                        <li><span class="text-secondary"><i class="far fa-address-book"></i>بازیگران: </span><?php the_terms(get_the_ID(),"honarmandan"); ?></li>
                        <li><span class="text-secondary"><i class="fab fa-imdb"></i>امتیاز: </span><a href="<?php echo $text_button ?>"><img src="<?php echo path; ?>/img/imdb2.png" alt=""><span class="mr-1"><?php if ($IMDB->isReady) { print_r($IMDB->getRating()); } else { echo ''; } ?></span></a></li>
                        <li><span class="badge badge-pill badge-secondary"><i class="fas fa-eye"></i><?php the_views(); ?> بار</span></li>

                    <?php } ?>
                </div>
            </div>
        </div>
           
        </div>
    </div>
</div>
<?php 
$big_tizer = get_post_meta(get_the_ID(),'image-big',true);
$link_tizer = get_post_meta(get_the_ID(),'tabligh',true);
?>
<div class="container mx-auto p-0">  
    <a href="<?php echo $link_tizer; ?>"><img class="w-100 mb-3 mt-3" src="<?php echo $big_tizer; ?>" alt=""></a>
</div>
<div class="container">
    <div class="row mx-0">
        <div class="header-top-section shadow-sm p-3 mb-3 mt-3 text-right">
            <?php the_content(); ?>
        </div>
    </div>
</div>
<div class="sec-web-dl mb-3 mt-3">
    <div class="container">
        <div class="row mx-0">
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
                <div class="card world my-2">
                    <div class="card-header" id="heading-<?php echo $count_collaps; ?>">
                    <h2 class="mb-0">
                        <button class="btn btn-link text-right float-right text-dark" type="button" data-toggle="collapse" data-target="#collapse-<?php echo $count_collaps; ?>" aria-expanded="false" aria-controls="collapse-<?php echo $count_collaps; ?>">
                        <?php echo $successful_students_item['title']; ?>
                        </button>
                        <button class="btn btn-link text-left float-left text-dark" type="button" data-toggle="collapse" data-target="#collapse-<?php echo $count_collaps; ?>" aria-expanded="false" aria-controls="collapse-<?php echo $count_collaps; ?>">
                        <span><i class="fas fa-play"></i></span>
                        </button>
                    </h2>
                    </div>

                    <div id="collapse-<?php echo $count_collaps; ?>" class="collapse text-right" aria-labelledby="heading-<?php echo $count_collaps; ?>" data-parent="#accordionExample">
                    <div class="card-body text-dark">
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
                <div class="card world my-2">
                    <div class="card-header" id="heading-<?php echo $count_collaps; ?>">
                    <h2 class="mb-0">
                        <button class="btn btn-link text-right float-right text-dark" type="button" data-toggle="collapse" data-target="#collapseOne-<?php echo $count_collaps; ?>" aria-expanded="false" aria-controls="collapseOne-<?php echo $count_collaps; ?>">
                        <?php echo $successful_students_item['title']; ?>
                        </button>
                        <button class="btn btn-link text-left float-left text-dark" type="button" data-toggle="collapse" data-target="#collapseOne-<?php echo $count_collaps; ?>" aria-expanded="false" aria-controls="collapseOne-<?php echo $count_collaps; ?>">
                        <span><i class="fas fa-play"></i></span>
                        </button>
                    </h2>
                    </div>

                    <div id="collapseOne-<?php echo $count_collaps; ?>" class="collapse text-right" aria-labelledby="heading" data-parent="#accordionExample">
                    <div class="card-body text-dark">
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
                <div class="card world my-2">
                    <div class="card-header" id="heading-<?php echo $count_collaps; ?>">
                    <h2 class="mb-0">
                        <button class="btn btn-link text-right float-right text-dark" type="button" data-toggle="collapse" data-target="#collapseOne-<?php echo $count_collaps; ?>" aria-expanded="false" aria-controls="collapseOne-<?php echo $count_collaps; ?>">
                        <?php echo $successful_students_item['title']; ?>
                        </button>
                        <button class="btn btn-link text-left float-left text-dark" type="button" data-toggle="collapse" data-target="#collapseOne-<?php echo $count_collaps; ?>" aria-expanded="false" aria-controls="collapseOne-<?php echo $count_collaps; ?>">
                        <span><i class="fas fa-play"></i></span>
                        </button>
                    </h2>
                    </div>

                    <div id="collapseOne-<?php echo $count_collaps; ?>" class="collapse text-right" aria-labelledby="heading" data-parent="#accordionExample">
                    <div class="card-body text-dark">
                    <?php echo $successful_students_item['description']; ?>
                    </div>
                    <a href="" type="button" data-toggle="modal" data-target="#resigester" class="btn btn-danger m-4"><i class="fa-regular fa-lock"></i><span class="mr-3">خرید اشتراک</span></a>
                    </div>
                </div>
                <?php } ?>
                <?php } ?>
                <?php 
                $count_collaps++;   } 
                }?>
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
            <a href="<?php echo site_url(); ?>/my-account" class="modal-btn-regester left-bg">خرید اشتراک</a>
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
    <div class="row mx-0">
        <div class="header-top-section shadow-sm mb-3 mt-3">
            <div class="title-top d-flex">
                <i class="fas fa-bullhorn"></i>
                <h3><?php echo  $worldsub_options[0]['title_1']; ?></h3>
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
            
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12 text-right">
                    <figure class="figure ml-2 mb-3">
                        <a href="<?php echo $ads_link; ?>" rel="nofollow" target="_blank"><img src="<?php the_post_thumbnail_url(); ?>" class="figure-img img-fluid w-100" alt="<?php the_title(); ?>"></a>
                        <figcaption class="figure-caption text-right"><a href="<?php echo $ads_link; ?>" rel="nofollow"><?php the_title(); ?></a></figcaption>
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
    <div class="row mx-0">
        <div class="header-top-section shadow-sm mb-3 mt-3">
            <div class="title-top d-flex">
                <i class="fas fa-info-circle"></i>
                <h3>راهنما و نکات</h3>
            </div>
            <hr>
            <div class="row tizer">
                <?php $help_movie = get_post_meta(get_the_ID(),'text-help',true); ?>
                    <div class="col-12 text-right">
                        <p><?php echo $help_movie; ?></p>
                    </div>
                
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row mx-0">
        <div class="header-top-section shadow-sm mb-3 mt-3">
            <div class="title-top d-flex">
                <i class="fas fa-archive"></i>
                <h3>مطالب مشابه</h3>
            </div>
            <hr>
            <div class="row mb-3 mt-3">


            <?php

            $q=new WP_Query(
                array(
                    'post_type' => 'coagex_movie',
                    "posts_per_page"=>9,
                    "orderby"=>"rand"

                )
            );

            while($q->have_posts())
            {
                $q->the_post();
            // var_dump(the_title());
                ?>

                <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                    <div class="media">
                        <a href="<?php the_permalink(); ?>"><img src="<?php the_post_thumbnail_url(); ?>" class="ml-3 rounded" alt="<?php the_title(); ?>"></a>
                        <div class="media-body text-right mt-1">
                            <h5 class="mt-1 mb-3"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                            <span><i class="far fa-calendar"></i><?php echo get_the_date('d F'); ?></span>
                        </div>
                    </div>
                </div>

                <?php
                    }
                    wp_reset_postdata();

                    ?>                
            </div>
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

get_footer();
?>