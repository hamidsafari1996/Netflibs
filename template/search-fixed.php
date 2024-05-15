<div class="search-box-area-fixabay">
    <div id="search-fixabay" class="fade">
        <a href="#" class="close-btn-fixabay" id="close-search-fixabay">
            <em class="fa fa-times"></em>
        </a>
        <form action="<?php bloginfo("url") ?>/" method="get">
        <input name="s" placeholder="کلمه مورد نظر + اینتر" id="searchbox-fixabay" type="text" />
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
    </div>
    
    <div class="search-icon-area-fixabay">
        <a href='#search-fixabay'>
            <i class="fas fa-search"></i>
        </a>
    </div>
    
</div>