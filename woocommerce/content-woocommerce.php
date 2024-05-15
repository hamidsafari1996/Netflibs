<div class="py-3 content-woo text-right">
      <?php the_content(); ?>
      <?php $text_help = get_post_meta(get_the_ID(),'text-help',true);
     
      ?>
      <hr class="hr-woo my-3">
      <div class="alert text-success" role="alert">
            <?php echo $text_help; ?>
      </div>
      
      <div class="section-download-film my-4 p-4">
      <?php 
      $successful_students_items = get_post_meta(get_the_id() ,'coagex_banner_group', true); 
      
      ?>
            <ul class="nav nav-tabs fasl" id="myTab" role="tablist">
                  <?php
                  $successful_students_items = get_post_meta(get_the_id() , 'group_field_id', true); $count=0;

                  if (!empty($successful_students_items))
                  {
                  foreach($successful_students_items as $successful_students_item)
                  { ?>
                  <li class="nav-item item" role="presentation">
                        <a class="nav-link <?php $class= $count==0 ? 'active' : ''; echo $class; ?>" id="home-tab<?php echo $count; ?>" data-toggle="tab" href="#home<?php echo $count; ?>" role="tab" aria-controls="home" aria-selected="true"><?php echo $successful_students_item['title']; ?></a>
                  </li>
                  <?php $count++;
                    }
                } ?>
            </ul>
            <div class="tab-content castebox" id="myTabContent">
                  <?php
                  $successful_students_items = get_post_meta(get_the_id() , 'group_box_download', true); $counter=0;

                  if (!empty($successful_students_items))
                  {
                  foreach($successful_students_items as $successful_students_item)
                  {  ?>
                  <div class="tab-pane fade show <?php $class= $counter==0 ? 'active' : ''; echo $class; ?>" id="home<?php echo $counter; ?>" role="tabpanel" aria-labelledby="home-tab<?php echo $counter; ?>">
                        <?php 
                        $t_box_dl = $successful_students_item['link_products_product'];
                        //$t = explode()
                        if (!empty($t_box_dl)){
                        foreach ($t_box_dl as $junk_dl)
                        {
                        ?>
                        <?php
                        $restice_select = get_post_meta( get_the_ID(), 'restice_select', true );
                        if ( 'restice-no' === $restice_select ){ 
                        ?> 
                        
                        
                        <div class="item-film-repact d-flex flex-wrap align-items-center">
                              <div class="col-md-4 col-12 text-right">
                                    <span class="title-item text-white"><?php echo $junk_dl['title_woo']; ?></span>
                              </div>
                              <div class="col-md-8 col-12 text-left">
                                    
                                    <?php
                                    global $product;
                                    $logged_in = true;
                                    $user = wp_get_current_user();
                                    $user_id = $user->ID;
                                    $customer_email = $user->user_email;
                                    $product_id = $product->get_id();
                                    $bought = wc_customer_bought_product( $customer_email, $user_id, $product_id ) ;
                                    if ($bought) {
                                    ?>
                                          <?php if (!empty($junk_dl['btn_eins'])){ ?>
                                                <a type="button" href="<?php echo $junk_dl['link_eins']; ?>" class="btn btn-success rounded text-white responsive-button"><i class="fas fa-download ml-2"></i><?php echo $junk_dl['btn_eins']; ?></a>
                                          <?php } ?>
                                          <?php if (!empty($junk_dl['btn_zwei'])){ ?>
                                                <a type="button" href="<?php echo $junk_dl['link_zwei']; ?>" class="btn btn-success rounded text-white responsive-button"><i class="fas fa-download ml-2"></i><?php echo $junk_dl['btn_zwei']; ?></a>
                                          <?php } ?>
                                          <?php if (!empty($junk_dl['btn_drei'])){ ?>
                                                <a type="button" href="<?php echo $junk_dl['link_drei']; ?>" class="btn btn-success rounded text-white responsive-button"><i class="fas fa-download ml-2"></i><?php echo $junk_dl['btn_drei']; ?></a>
                                          <?php } ?>
                                          <?php if (!empty($junk_dl['title_online'])){ ?>
                                                <a type="button" href="<?php echo $junk_dl['link_online']; ?>" class="btn bg-warning rounded text-white popup-youtube responsive-button"><i class="fas fa-download ml-2"></i><?php echo $junk_dl['title_online']; ?></a>
                                          <?php } ?>    
                                    <?php
                                    } else { ?>
                                    <buttom type="button" data-toggle="modal" data-target="#productprices" class="btn btn-success rounded text-white responsive-button"><i class="fa-solid fa-lock-keyhole"></i></buttom>
                                    <?php } ?>
                              </div>
                        </div>
                        <?php } } } ?>
                        <?php
                        $restice_select = get_post_meta( get_the_ID(), 'restice_select', true );
                        if ( 'restice-yes' === $restice_select ){ 
                        ?>
                        <?php 
                              $t_box_dl = $successful_students_item['link_products_product'];
                              //$t = explode()
                              if (!empty($t_box_dl)){
                              foreach ($t_box_dl as $junk_dl)
                              {
                              ?>
                        <?php if( rcp_get_subscription()){ ?>
                              
                              <div class="item-film-repact d-flex flex-wrap align-items-center">
                                    <div class="col-md-4 col-12 text-right">
                                          <span class="title-item text-white"><?php echo $junk_dl['title_woo']; ?></span>
                                    </div>
                                    <div class="col-md-8 col-12 text-left">
                                          <?php if (!empty($junk_dl['btn_eins'])){ ?>
                                                <a type="button" href="<?php echo $junk_dl['link_eins']; ?>" class="btn btn-success rounded text-white responsive-button"><i class="fas fa-download ml-2"></i><?php echo $junk_dl['btn_eins']; ?></a>
                                          <?php } ?>
                                          <?php if (!empty($junk_dl['btn_zwei'])){ ?>
                                                <a type="button" href="<?php echo $junk_dl['link_zwei']; ?>" class="btn btn-success rounded text-white responsive-button"><i class="fas fa-download ml-2"></i><?php echo $junk_dl['btn_zwei']; ?></a>
                                          <?php } ?>
                                          <?php if (!empty($junk_dl['btn_drei'])){ ?>
                                                <a type="button" href="<?php echo $junk_dl['link_drei']; ?>" class="btn btn-success rounded text-white responsive-button"><i class="fas fa-download ml-2"></i><?php echo $junk_dl['btn_drei']; ?></a>
                                          <?php } ?>
                                          <?php if (!empty($junk_dl['title_online'])){ ?>
                                                <a type="button" href="<?php echo $junk_dl['link_online']; ?>" class="btn bg-warning rounded text-white popup-youtube responsive-button"><i class="fas fa-download ml-2"></i><?php echo $junk_dl['title_online']; ?></a>
                                          <?php } ?>   
                                    </div>
                              </div>
                        
                        <?php } else{ ?>
                        <div class="item-film-repact d-flex flex-wrap align-items-center">
                              <div class="col-md-4 col-12 text-right">
                                    <span class="title-item text-white"><?php echo $junk_dl['title_woo']; ?></span>
                              </div>
                              <div class="col-md-8 col-12 text-left"> 
                                    <buttom type="button" data-toggle="modal" data-target="#resigester" class="btn btn-success rounded text-white responsive-button"><i class="fa-solid fa-lock-keyhole"></i></buttom>
                              </div>
                        </div>
                        <?php } } } ?>
                        <?php } ?>
                  </div>
                  <?php $counter++; } } ?>
            </div>
            
      </div>
  
      <div class="section-rand-movie woo-rand-movie">
            <div class="col-12">
            <div class="header-title py-4 d-flex">
                  <i class="fas fa-film text-white ml-2"></i>
                  <h2 class="text-white">فیلم های مشابه</h2>            
            </div>
                  
            <div class="col-lg-12 col-md-12 col-12">
                  <div class="movie-new-carousel rand-film owl-carousel owl-theme">

                  <?php

                  $q=new WP_Query(
                  array(
                        'post_type' => 'product',
                        "posts_per_page"=>11,
                        "orderby"=>"rand"

                  )
                  );

                  while($q->have_posts())
                  {
                  $q->the_post();
                  ?>
                  
                  <div class="movie-new-item item">
                  <figure class="figure">
                        <a href="<?php the_permalink(); ?>"><img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>" class="img-fluid rounded figure-img"></a>
                  </figure>
                  <ficaption class="figure-caption text-right">
                        <div class="movie-new-content mb-2">
                              <h2><a href="<?php the_permalink(); ?>" data-toggle="tooltip" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
                        </div>
                        <?php  
                        $text_imbd = get_post_meta(get_the_ID(),'text-imDb',true); 
                        ?>
                        <?php
                        $select_sethand = get_post_meta( get_the_ID(), 'imDb_select', true );
                        if ( 'defult-select' === $select_sethand ){ ?>
                        <div class="movie-new-footer">
                              <span class="star ml-3"><i class="fas fa-star"></i><?php echo $text_imbd; ?></span>
                              <span class="eye"><i class="fas fa-eye"></i> <?php the_views(); ?></span>
                              <span class="float-left years"><?php the_terms(get_the_ID(),"yaers"); ?></span>
                        </div>
                        <?php } ?>
                        <?php
                        if ( 'imdb-tabligh' === $select_sethand ){ ?>
                        <div class="movie-new-footer">
                              <span class="star ml-3"><i class="fas fa-star"></i><?php if ($IMDB->isReady) { print_r($IMDB->getRating()); } else { echo ''; } ?></span>
                              <span class="eye"><i class="fas fa-eye"></i> <?php the_views(); ?></span>
                              <span class="float-left"><?php if ($IMDB->isReady) { print_r($IMDB->getYear()); } else { echo ''; } ?></span>
                        </div>

                        <?php } ?>
                  </ficaption>
                  </div>


                  <?php
                        }
                        wp_reset_postdata();

                        ?>  


                  </div>
            </div>
      </div>
      </div>
      <div class="text-right">
            <?php if ( comments_open() || get_comments_number() ) {
                comments_template();
            } ?>
        </div>
</div>
<!-- Modal -->
<div class="modal fade resigester-content" id="resigester" tabindex="-1" aria-labelledby="resigesterLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="resigesterLabel">برای مشاهده این فیلم باید اشتراک داشته باشید</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body d-flex">
        <div class="col-6 text-center">
            <a href="<?php echo site_url(); ?>/my-account" class="modal-btn-regester right-bg">ورود</a>
        </div>
        <div class="col-6 text-center">
            <a href="<?php echo site_url(); ?>/my-account/support/" class="modal-btn-regester left-bg">خرید اشتراک</a>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Modal -->
<div class="modal fade productprices-content" id="productprices" tabindex="-1" aria-labelledby="productpricesLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="productpricesLabel">ابتدا محصول را خریداری کنید</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body d-flex">
        <div class="col-12 text-center">
            <a href="<?php echo site_url(); ?>/my-account" class="modal-btn-regester right-bg">ورود</a>
        </div>
      </div>
    </div>
  </div>
</div>
