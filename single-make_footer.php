<?php get_header(); ?>
<?php while(have_posts()) : the_post(); ?>
<footer class="footer-elementor-netflibs">
      <?php the_content(); ?>
</footer>
<?php endwhile; ?>
<?php get_footer(); ?>