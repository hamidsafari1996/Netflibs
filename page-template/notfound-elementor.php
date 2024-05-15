


	<div class="block-white shadow-around">
         <?php 
        
            if($select_template_elementor = woolearn_get_option('coagex_404_group')){
                  $theme_not_found = $select_template_elementor[0]['theme-404-elementor'];
                  $elementor = \Elementor\Plugin::instance();
                  echo $elementor->frontend->get_builder_content($theme_not_found);
            } 
         ?>

      </div>



