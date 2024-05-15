
<div class="col-lx-12 col-lg-12">

      <div class="header-blog">
      <?php 
      $time_booke = get_post_meta(get_the_ID(),'text-name',true);
      ?>
      <span class="badge-pill"><?php the_category(','); ?></span>
      <span class="badge badge-pill badge-danger"><?php the_title(); ?></span>
      <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
      <span class="year">منتشر شده در <?php echo get_the_date('d F'); ?> - <?php echo $time_booke ?> دقیقه مطالعه</span>
      </div>
      <div class="blog">
      <?php the_content(); ?>
      </div>
</div>
