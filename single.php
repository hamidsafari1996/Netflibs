<?php get_header(); ?>
<?php while(have_posts()) : the_post(); ?>
<div class="clearfix"></div>

	<div class="block-white shadow-around">
         <?php the_content(); ?>
    </div>



<?php endwhile; ?>
<?php get_footer(); ?>