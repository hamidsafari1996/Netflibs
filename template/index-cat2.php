<?php $coagex_cat_two = woolearn_get_option("coagex_cat_two_group"); if(  is_array($coagex_cat_two) ) { ?>
<div class="web-cat-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-12">
                    <div class="mov-cat-carousel">
                    <?php foreach( $coagex_cat_two as $i => $cat_item) { ?>
                        <div class="movie-cat-section">
                            <a class="btn btn-danger" href="<?php echo @$cat_item['test_text']; ?>" role="button"><?php echo @$cat_item['title']; ?></a>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
    <?php } ?>