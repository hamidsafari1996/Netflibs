<?php
$coagex_film_group = woolearn_get_option('coagex_film_group');
?>
<div class="container">

    <div class="col-lg-12 col-md-12 col-12">
        <?php $select_plyr = woolearn_get_option('select_player');
        if ('defult' === $select_plyr) { ?>
            <div class="video-section">


                <?php $select_video = woolearn_get_option('select_video');
                if ('video' === $select_video) { ?>

                    <video class="video js-player" controls="" id="player" poster="<?php echo  $coagex_film_group[0]['logo']; ?>">
                        <source src="<?php echo  $coagex_film_group[0]['link_h']; ?>" type="video/mp4" size="720">
                        <track kind="captions" label="persian" default="" srclang="fa" src="<?php echo  $coagex_film_group[0]['subtitile']; ?>" default>
                    </video>

                <?php } ?>

                <?php 
                if ('youtube' === $select_video) { ?>

                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" src="<?php echo  $coagex_film_group[0]['link_h']; ?>" allowfullscreen></iframe>
                    </div>
                <?php } ?>
            </div>
        <?php } ?>
        
        <?php if ('plyr' === $select_plyr) { ?>

            <div class="jw-player"><?php echo do_shortcode($shortcode_player); ?></div>


        <?php } ?>

    </div>
</div>