<?php $coagex_service = woolearn_get_option("coagex_service_group"); if(  is_array($coagex_service) ) { ?>
<div class="web-servic-section">
        <div class="container">
            <div class="row">
            <?php foreach( $coagex_service as $i => $video_item) { ?>
                <div class="col-lg-3 col-md-6 porto-hover">
                    <h6><span class="badge"><i class="fas <?php echo @$video_item['test_text']; ?>"></i></span><?php echo @$video_item['title']; ?></h6>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="container">
        <hr>
    </div>
    <div class="clearfix"></div>
    <?php } ?>