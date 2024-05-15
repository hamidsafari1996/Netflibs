<footer>
    <div class="footer-world-section">
        <div class="container">
            <div class="row">

                    <?php dynamic_sidebar('bama_footer'); ?>
                
            </div>
        </div>
    </div>
    <?php
    $worldsub_options=woolearn_get_option('group_desc_id');
    ?>
    <div class="licens-footer w-100">
        <div class="container">
            <div class="row">
                <p class="text-white text-center w-100"><span class="ml-2"><i class="fas fa-copyright"></i></span><?php echo  $worldsub_options[0]['title']; ?></p>
            </div>
        </div>
    </div>
</footer>
