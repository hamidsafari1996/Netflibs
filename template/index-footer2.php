<footer>
<div class="footer-line mt-5">
    <div class="bock">
    <div class="menu-footer float-right">
        <nav class="navbar-expand-lg navbar-light text-right">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#netflibsdropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars text-white"></i>
        </button>
            <div class="collapse navbar-collapse deop" id="netflibsdropdown">
                <?php
                $args=array(
                    'theme_location'=>'footer-main-menu',
                    'depth'=>2
                );
                wp_nav_menu($args);

                ?>
            </div>
        </nav>
        </div>
        <div class="btn-group dropup float-left">
            <div type="button" class="text-white-50 dropdown-toggle text-footer mt-2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                شبکه های اجتماعی
            </div>
            <div class="dropdown-menu">
                <?php $coagex_social = woolearn_get_option("coagex_social_group"); if(  is_array($coagex_social) ) { ?>
                <ul class="text-right">
                <?php foreach( $coagex_social as $i => $junr_item) { ?>
                    <li><a href="<?php echo @$junr_item['link']; ?>"><i class="fab <?php echo @$junr_item['title']; ?>"></i><?php echo @$junr_item['subtitle']; ?></a></li>
                    <?php } ?>
                </ul>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
</footer>