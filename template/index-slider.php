<?php 
$coagex_banner_option = woolearn_get_option('coagex_banner_group'); 
if ( !empty($coagex_banner_option)){
    
  

?>
<div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
    
        <ol class="carousel-indicators">
        <?php $coagex_banner_option = woolearn_get_option('coagex_banner_group'); $count=0; foreach ($coagex_banner_option as $item) { ?>
            <li data-target="#carouselExampleSlidesOnly" data-slide-to="<?php echo $count; ?>" class="<?php $class= $count==0 ? 'active' : ''; echo $class; ?>"></li>
        <?php $count++; } ?>
        </ol>
    
    

            <div class="carousel-inner">
            <?php $coagex_banner_option = woolearn_get_option('coagex_banner_group'); $counter=0; foreach ($coagex_banner_option as $item) { ?>
                <div class="carousel-item <?php $class= $counter==0 ? 'active' : ''; echo $class; ?>">
                    <div class="slider mb-3">
                        <img src="<?php echo $item['tabligh']; ?>" class="d-block" alt="<?php echo $item['title']; ?>">
                        <div class="card-img-overlay slid">
                            <div class="container">
                            <div class="col-12">
                                <div class="card-body text-header text-right">
                                    <p class="card-subtitl d-none d-lg-block"><?php echo $item['time']; ?></p>
                                    <p class="d-none d-sm-block"><a href="<?php echo $item['link_s']; ?>"><span><i class="fab fa-imdb"></i><?php echo $item['star']; ?>/10</span></a></p>
                                    <h2 class="card-title mb-4"><?php echo $item['title']; ?></h2>
                                    <p class="card-text d-none d-lg-block"><?php echo $item['test_text']; ?></p>
                                    <a href="<?php echo $item['link']; ?>" class="btn btn-danger"><i class="fas fa-play"></i><span class="mr-3">مشاهده ویدئو</span></a>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
                <?php $counter++; } ?>
            </div>
            

                <a class="carousel-control-prev d-none d-lg-flex" href="#carouselExampleSlidesOnly" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next d-none d-lg-flex" href="#carouselExampleSlidesOnly" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
                
        </div>
    <?php } ?>