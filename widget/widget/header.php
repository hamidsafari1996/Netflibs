<?php

class Netflibshead extends WP_Widget {

    function __construct() {
      parent::__construct(
      'netflibs_header',
      'NFS_head',
      array('description' => 'ابزارک هدر')
      );
    }
  
    function widget( $args, $instance ) {
        echo $args['before_widget'];
        echo '<div class="header-header-section shadow-sm mb-3 mt-3 d-flex">';
        if(!empty($instance['img'])){
        echo '<span class="text-white"><i class="'.$instance['img'].'"></i></span>';
        }
        if(!empty($instance['title'])){
          echo '<h3><span class="mr-3 text-white">'.$instance['title'].'</span></h3>';
        }
        
        
        
        echo '</div><hr>';


        echo $args['after_widget'];
    }
  
    function update( $new_instance, $old_instance ) {
        $instance = array();
    $instance['title'] = (!empty($new_instance['title']))? $new_instance['title'] : '';
    $instance['img'] = (!empty($new_instance['img']))? $new_instance['img'] : '';
    
		
		return $instance;
    }
  
    function form( $instance ) {
        ?>

        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>">عنوان سربرگ:</label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo @$instance['title']; ?>">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('img'); ?>">آیکون:</label>
            <a href="https://fontawesome.com/icons?d=gallery&m=free" target="_blank">انتخاب آیکون</a>
            <input class="widefat" id="<?php echo $this->get_field_id('img'); ?>" name="<?php echo $this->get_field_name('img'); ?>" type="text" value="<?php echo @$instance['img']; ?>">
        </p>
        <?php
    }
    
  }
  
  function myplugin_header_widgets() {
    register_widget( 'Netflibshead' );
  }
  
  add_action( 'widgets_init', 'myplugin_header_widgets' );

?>