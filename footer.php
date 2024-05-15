<?php $select_value=woolearn_get_option('search_select'); if ( 'search' === $select_value ){
	get_template_part('template/search','fixed');
} ?>
<?php $select_scroller=woolearn_get_option('scroller_select'); if ( 'scroller' === $select_scroller ){
	 get_template_part('template/scroll'); 
} ?> 
<?php $select_social=woolearn_get_option('socialselect'); if ( 'standard' === $select_social ){
	 get_template_part('template/social','fixed'); 
} ?> 
<?php $select_panelcolor=woolearn_get_option('colorpanel_select'); if ( 'panelcolor' === $select_panelcolor ){
	get_template_part('template/color'); 
} ?>


<script>
	<?php $jquery_text_head = woolearn_get_option('jquery-text'); echo $jquery_text_head; ?>
</script>

<?php wp_footer(); ?>
  
</body>
</html>