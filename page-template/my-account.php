<?php /**Template name: حساب کاربری */ ?>
<?php get_header(); ?>
<?php
global $user_ID;
if($user_ID){
?>
<?php
get_template_part('template/header','account');
}
?>
<div class="netflibs-page-account">
      <?php while(have_posts()) : the_post(); ?>
      <div class="clearfix"></div>

      <?php the_content(); ?>

      <?php endwhile; ?>
</div>

<?php get_footer(); ?>