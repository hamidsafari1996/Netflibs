<style>
.search-icon-area-fixabay{
	background: <?php $wiki_test_colorpicker = woolearn_get_option('wiki_test_colorpicker'); echo $wiki_test_colorpicker; ?>;
}
.search-btn{
	background: <?php echo $wiki_test_colorpicker; ?>;
}
.scroll #scroller{
	color: <?php $scroller_colorpicker = woolearn_get_option('scroller_colorpicker'); echo $scroller_colorpicker; ?>;;
}
#search-fixabay, #search{
	background: <?php $wiki_bg_colorpicker = woolearn_get_option('bg_colorpicker'); echo $wiki_bg_colorpicker; ?>;	
}
.social-inside-net ul{
	background: <?php $social_colorpicker = woolearn_get_option('social_colorpicker'); echo $social_colorpicker; ?>;
	
}
.social-inside-net ul li a svg{
	color: <?php $social_color = woolearn_get_option('social_color_svg'); echo $social_color; ?>;
}
.colorpanel{
	background: <?php $panel_colorpicker = woolearn_get_option('panel_colorpicker'); echo $panel_colorpicker; ?>;
}
.colorpanel .panel-color svg{
	color: <?php $panel_colorpicker = woolearn_get_option('panel_color_svg'); echo $panel_colorpicker; ?>;
}
/**------------Style_code_setting--------------- */
<?php $style_text_head = woolearn_get_option('style-text'); echo $style_text_head; ?>
</style>
