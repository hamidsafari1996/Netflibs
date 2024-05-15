
<div class="col-lg-8 col-md-7 col-sm-12 col-12">
<?php //while(have_posts()) : the_post(); ?>
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
      <?php //endwhile; ?>
</div>
<div class="col-lg-4 col-md-5 col-sm-12 col-12">
      <?php 
      
      if($select_sidebar_elementor = get_post_meta( get_the_ID(), 'sidebar-post-elementor', true)){
            $elementor = \Elementor\Plugin::instance();
            echo $elementor->frontend->get_builder_content($select_sidebar_elementor);
      }

      ?> 
</div>