<?php $coagex_cat = woolearn_get_option("coagex_cat_group"); if(  is_array($coagex_cat) ) { ?>
<div class="web-cat-section">
        <div class="container">
            <div class="col-12">
                <div class="mov-cat-carousel owl-carousel owl-theme">
                <?php foreach( $coagex_cat as $i => $cat_item) { ?>
                    <div class="movie-cat-section item">
                        <a class="btn btn-danger" href="<?php echo @$cat_item['test_text']; ?>" role="button"><?php echo @$cat_item['title']; ?></a>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
    <?php } ?>