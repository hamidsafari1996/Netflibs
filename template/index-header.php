<header>
        <div class="web-header-section d-none d-lg-block">
            <div class="container">
                        <?php
						$header_options=woolearn_get_option('header-logo');
                        ?>
                <div class="row">
                    <div class="col-md-6 col-6">
                        <div class="navbar navbar-expand-lg">
                            <button class="navbar-toggler" data-toggle="collapse" data-target="#web-header-menu">
                                <span class="navbar-toggler-icon">
                                    <i class="fas fa-bars"></i>
                                </span>
                            </button>
                        
                            <div class="d-none d-lg-block">
                            <?php 
                            $args=array(
                                'theme_location'=>'header-main-menu',
                                'depth'=>2
                            );
                            wp_nav_menu($args);
                            ?>
                            </div>
                        </div>  
                    </div>
                    <div class="col-md-6 col-6">
                        <nav class="navbar-light logo">
                            <a class="navbar-brand" href="<?php echo site_url(); ?>">
                                <img src="<?php echo  $header_options[0]['logo']; ?>" width="30" height="30" class="d-inline-block align-top" alt="<?php echo get_bloginfo('name'); ?>" loading="lazy">
                            </a>
                        </nav>
                    </div> 
                </div>
                
            </div>
        </div>
        
        <div class="d-block d-lg-none">
            <?php get_template_part('template/menu','responsive'); ?>
        </div>
    </header>
    <div class="clear-fix"></div>