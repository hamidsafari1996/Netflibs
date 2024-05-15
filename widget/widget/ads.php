<?php

class NetflibsAds extends WP_Widget {

    function __construct() {
      parent::__construct(
      'netflibs_ads',
      'NFS_ads',
      array('description' => 'ابزارک تبلیغات')
      );
    }
  
    function widget( $args, $instance ) {
        echo $args['before_widget'];
        echo '<figure class="figure ml-2">';
        echo '<a href="'.$instance['link'].'" rel="nofollow" target="'.$instance['target'].'"><img src="'.$instance['img'].'" class="figure-img img-fluid" alt="'.$instance['title'].'"></a>';
        echo '<h3 class="text-right mb-4"><a class="text-white" href="'.$instance['link'].'" target="'.$instance['target'].'">'.$instance['title'].'</a></h3>';

        
        echo '</figure>';


        echo $args['after_widget'];
    }
  
    function update( $new_instance, $old_instance ) {
        $instance = array();

          $instance['title'] = (!empty($new_instance['title']))? $new_instance['title'] : '';


          $instance['img'] = (!empty($new_instance['img']))? $new_instance['img'] : '';

            $instance['link'] = (!empty($new_instance['link']))? $new_instance['link'] : '';


            $instance['target'] = (!empty($new_instance['target']))? $new_instance['target'] : '';

    
		
		return $instance;
    }
  
    function form( $instance ) {
        ?>

        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>">عنوان تبلیغ:</label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo @$instance['title']; ?>">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('img'); ?>">آدرس تصویر:</label>
            <input class="widefat" id="<?php echo $this->get_field_id('img'); ?>" name="<?php echo $this->get_field_name('img'); ?>" type="url" value="<?php echo @$instance['img']; ?>">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('link'); ?>">لینک تبلیغ:</label>
            <input class="widefat" id="<?php echo $this->get_field_id('link'); ?>" name="<?php echo $this->get_field_name('link'); ?>" type="url" value="<?php echo @$instance['link']; ?>">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('target'); ?>">نحوه باز شدن لینک:</label>
            <select name="<?php echo $this->get_field_name('target'); ?>" id="<?php echo $this->get_field_id('target'); ?>">
              <option value=""<?php if(empty(@$instance['target'])) echo 'selected'; ?>>- گزینش -</option>
              <option value="_parent" <?php if(@$instance['target'] == '_parent' ) echo 'selected'; ?>>parent</option>
              <option value="_self" <?php if(@$instance['target'] == '_self' ) echo 'selected'; ?>>self</option>
              <option value="_top" <?php if(@$instance['target'] == '_top' ) echo 'selected'; ?>>top</option>
              <option value="_blank" <?php if(@$instance['target'] == '_blank' ) echo 'selected'; ?>>blank</option>
            </select>
        </p>
        <?php
    }
    
  }
  
  function myplugin_register_widgets() {
    register_widget( 'NetflibsAds' );
  }
  
  add_action( 'widgets_init', 'myplugin_register_widgets' );

?>