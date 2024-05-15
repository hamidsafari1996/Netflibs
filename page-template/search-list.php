<?php
   $q3=new WP_Query(
       array("category_name"=>"important_posts","posts_per_page"=>12)
   );
   while($q3->have_posts())
   {
       $q3->the_post();
       ?>
    <?php
    }
    ?>
<div class="web-search-section">
<div class="container-search container">
      
         <?php
         $text_years = get_post_meta(get_the_ID(),'text-years',true); 
         $text_imbd = get_post_meta(get_the_ID(),'text-imDb',true);
         $pic = get_term_meta( get_queried_object()->term_id, 'cat-img', true );
            if(have_posts())
            {
                while(have_posts())
                {
                    the_post();
                    ?>

                    <div class="col-12">
                        <article>
                            <div class="d-flex">
                                <a href="<?php the_permalink(); ?>"><img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>" class="img-search rounded"></a>
                                <div class="d-block text-right mr-3">
                                    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                    <p class="cat"><?php the_terms(get_the_ID(),"movie_cat"); ?></p>
                                    <p class="text-secondary d-none d-lg-block d-md-block"><?php echo get_the_excerpt(); ?></p>
                                    <p class="botton"><a href="<?php the_permalink(); ?>"><i class="far fa-play-circle ml-2"></i>مشاهده</a></p>
                                </div>
                            </div>
                        </article>
                    </div>
         <?php
            }
            }
            else
            {
            
                echo '<div class="alert alert-primary text-right" role="alert">
               موردی یافت نشد دوباره تلاش کنید!
               </div>';
            }
            
            ?>    
         <!-- Pagination -->
         <div class="col-xl-12">
            <div class="next-previous-page">
               <nav aria-label="...">
                  <ul class="pagination">
                     <?php wp_pagenavi();  ?>
                  </ul>
               </nav>
            </div>
         </div>
      
   </div>
</div>