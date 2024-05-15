<?php
$subtitle_options=woolearn_get_option('coagex_subtitle_group');
?>
<div class="web-worldsub-section" style="background: url('<?php echo $subtitle_options[0]['slid']; ?>');">
    <div class="container">
        <div class="row">
            <div class="head-section">
                <div class="header-worldsub-logo">
                    <h2 class="text-white"><?php echo $subtitle_options[0]['title']; ?></h2>
                    <p class="text-white mb-5 mt-2"><?php echo $subtitle_options[0]['subtitle']; ?></p>
                </div>
                <div id="search-box">
                    <div class="container">
                        <div class="col-md-6 mx-auto">
                            <div id="searche">
                                <form action="<?php bloginfo("url") ?>/" method="get">
                                    <input class="search-pishrafte1" name="s" placeholder="<?php echo $subtitle_options[0]['search']; ?>"><button><i class="fas fa-search"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>