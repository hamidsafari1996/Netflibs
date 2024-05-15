<?php get_header(); ?>
<?php while(have_posts()) : the_post(); ?>
<header class="header-elementor-netflibs">
      <?php the_content(); ?>
</header>
<?php endwhile; ?>
<?php get_footer(); ?>