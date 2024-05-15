<?php
$subtitle_options=woolearn_get_option('coagex_motofa_group');
?>
<div class="head-search-section" style="background: url('<?php echo $subtitle_options[0]['slid']; ?>');">
    <div class="container">
        <div class="row">
            <div class="head-section">
                <form action="<?php bloginfo("url") ?>/" method="get" class="w-75 mx-auto position-relative">
                        <input name="s" class="form-control text-right" type="search" placeholder="<?php echo $subtitle_options[0]['p_search']; ?>" aria-label="Search">
                        <button class="" type="submit"><img src="<?php echo path; ?>/img/search.svg" alt=""></button>
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
                <div class="header-worldsub-logo mt-5">
                    <h1 class="text-white"><?php the_title(); ?></h1>
                </div>
            </div>
        </div>
    </div>
</div>