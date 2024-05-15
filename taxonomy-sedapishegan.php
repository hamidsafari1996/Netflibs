<?php get_header();
$select_header = get_term_meta( get_queried_object()->term_id, 'wiki_header_select', true );
if ( 'header' === $select_header ){
	get_template_part('template/index','header');
}
$select_header1 = get_term_meta( get_queried_object()->term_id, 'wiki_header_select', true );
if ( 'header-1' === $select_header1 ){
	get_template_part('template/index','header2'); 
}
$select_header2 = get_term_meta( get_queried_object()->term_id, 'wiki_header_select', true );
if ( 'header-2' === $select_header2 ){
	get_template_part('template/push','menu'); 
}

if($elementor_header = get_term_meta( get_queried_object()->term_id,'header_elementor_taxonamy',true)){
    ?>
        <header>
            <?php
            $elementor = \Elementor\Plugin::instance();
            echo $elementor->frontend->get_builder_content($elementor_header);
            ?>
        </header>
    <?php
}

$pic = get_term_meta( get_queried_object()->term_id, 'cat-img', true );
$img = get_term_meta( get_queried_object()->term_id, 'pic-honarmand', true );
?>
<div class="honarmandan-web-section" style="background: url('<?php echo $pic; ?>')">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-5 col-12 title text-right d-flex pb-3 pb-md-0">
                <img src="<?php echo $img; ?>" alt="<?php echo single_cat_title(); ?>" class="rounded">
                <h3 class="mr-3 mt-5 text-white">
                <?php echo single_cat_title(); ?>
                </h3>
            </div>
            <div class="col-lg-8 col-md-7 col-12">
                <div class="paraghraf-honarmand text-right text-white">
                    <?php echo category_description(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <h3 class="p-4 text-white text-right">
        فیلم های <?php echo single_cat_title(); ?>
    </h3>
</div>
<div class="web-movie-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12">
                <div class="row movie-carousel justify-content-center responsive-cat">
                <?php

                while(have_posts())  
                {
                    the_post();
                    $mycat=wp_get_post_categories(get_the_ID());
                    $t2=wp_get_post_tags(get_the_ID());
                    foreach($t2 as $junk)
                    {
                    $mytags[]=$junk->term_id;
                    } 
                    ?>
                    <?php 
                    $text_years = get_post_meta(get_the_ID(),'text-years',true); 
                    $text_imbd = get_post_meta(get_the_ID(),'text-imDb',true);
                    ?> 
                    <?php
                    $select_sethand = get_post_meta( get_the_ID(), 'imDb_select', true );
                    if ( 'defult-select' === $select_sethand ){ ?>
                    <div class="card item-post">
                        <a href="<?php the_permalink(); ?>"><img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>" class="img-fluid rounded figure-img"></a>
                        <div class="card-body">
                            <div class="movie-new-content mb-4 text-right">
                                <h2 data-toggle="tooltip" title="<?php the_title(); ?>"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                            </div>
                            <div class="movie-new-footer">
                                <span class="star ml-3"><i class="fas fa-star"></i><?php echo $text_imbd; ?></span>
                                <span class="eye"><i class="fas fa-eye"></i><?php the_views(); ?></span>
                                <span class="float-left years"><?php the_terms(get_the_ID(),"yaers"); ?></span>
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
                    </div>
                    <?php
                    }
                    ?>
                    <?php
                    if ( 'imdb-tabligh' === $select_sethand ){ ?>
                    <?php
                    $imbd_link = get_post_meta(get_the_ID(),'link',true);
                    $IMDB = new IMDB($imbd_link); 
                    ?>

                    <div class="card item-post">
                        <a href="<?php the_permalink(); ?>"><img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>" class="img-fluid rounded figure-img"></a>
                        <div class="card-body">
                            <div class="movie-new-content mb-4 text-right">
                                <h2 data-toggle="tooltip" title="<?php the_title(); ?>"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                            </div>
                            <div class="movie-new-footer">
                                <span class="star ml-3"><i class="fas fa-star"></i><?php if ($IMDB->isReady) { print_r($IMDB->getRating()); } else { echo ''; } ?></span>
                                <span class="eye"><i class="fas fa-eye"></i><?php the_views(); ?></span>
                                <span class="float-left"><?php if ($IMDB->isReady) { print_r($IMDB->getYear()); } else { echo ''; } ?></span>
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
                    </div>
                    <?php
                    }
                    ?>
                    <?php 
						}
						wp_reset_query();
					?>
                </div>
                <div class="post-box__pagination">
					<div class="pagination-num num-fa pagination-app">
						<div class="wp-pagenavi text-right mt-5">
							<?php wp_pagenavi(); ?>
						</div>
					</div>
				</div>
            </div>
        </div>
    </div>
</div>
<?php  $select_footer = get_term_meta( get_queried_object()->term_id, 'wiki_foot_select', true );
if ( 'footer_1' === $select_footer ) {
	get_template_part('template/index','footer');
}
$select_value = get_term_meta( get_queried_object()->term_id, 'wiki_footi_select', true );
if ( 'footer_2' === $select_footer ){
	get_template_part('template/index','footer2');
}
$select_value = get_term_meta( get_queried_object()->term_id, 'wiki_footi_select', true );
if ( 'footer_3' === $select_footer ){
      get_template_part('template/index','footer_3'); 
} 

if($elementor_footer = get_term_meta( get_queried_object()->term_id,'footer_elementor_taxonamy',true)){
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