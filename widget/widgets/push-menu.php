<?php

namespace WPC\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH')) exit; // Exit if accessed directly


class Pushmenu extends Widget_Base{

  public function get_name(){
    return 'pushmenu';
  }

  public function get_title(){
    return 'پوش منو';
  }

  public function get_icon(){
    return 'eicon-nav-menu';
  }

  public function get_categories(){
    return ['secend-category'];
  }

  protected function _register_controls(){
    $this->start_controls_section(
      'section_button_menu',
      [
      'label' => __( 'تنظیمات محتوا', 'elementor' ),
      ]
    );
    $this->add_control(
			'image_menu',
			[
				'label' => __( 'انتخاب لوگو', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

    $this->end_controls_section();
    $this->start_controls_section(
        'section_button_style',
        [
        'label' => __( 'تنظیمات عمومی', 'elementor' ),
        'tab' => Controls_Manager::TAB_STYLE,
        ]
    );
    $this->add_control(
      'icon_color',
      [
          'label' => __( 'رنگ آیکون منو بازشونده', 'plugin-domain' ),
          'type' => Controls_Manager::COLOR,
          'default' => '',
          'selectors' => [
              '{{WRAPPER}} label #btn' => 'color: {{VALUE}}',
          ],
      ]
    );
    $this->add_group_control(
      \Elementor\Group_Control_Typography::get_type(),
      [
          'name' => 'icon_typography',
          'label' => __( 'تایپوگرافی آیکون', 'plugin-domain' ),
          'selector' => '{{WRAPPER}} label #btn',
      ]
    );
    $this->add_control(
      'icon_close',
      [
          'label' => __( 'رنگ آیکون بسته شونده', 'plugin-domain' ),
          'type' => Controls_Manager::COLOR,
          'default' => '',
          'selectors' => [
              '{{WRAPPER}} label #cancel' => 'color: {{VALUE}}',
          ],
      ]
    );
    $this->add_group_control(
      \Elementor\Group_Control_Typography::get_type(),
      [
          'name' => 'close_typography',
          'label' => __( 'تایپوگرافی آیکون', 'plugin-domain' ),
          'selector' => '{{WRAPPER}} label #cancel',
      ]
    );
    $this->add_control(
      'color_title',
      [
          'label' => __( 'رنگ عنوان', 'plugin-domain' ),
          'type' => Controls_Manager::COLOR,
          'default' => '',
          'selectors' => [
              '{{WRAPPER}} .sidebar header' => 'color: {{VALUE}}',
          ],
      ]
    );
    $this->add_group_control(
      \Elementor\Group_Control_Typography::get_type(),
      [
          'name' => 'title_typography',
          'label' => __( 'تایپوگرافی عنوان', 'plugin-domain' ),
          'selector' => '{{WRAPPER}} .sidebar header',
      ]
    );
    $this->add_control(
      'color_header',
      [
          'label' => __( 'پس زمینه هدر', 'plugin-domain' ),
          'type' => Controls_Manager::COLOR,
          'default' => '',
          'selectors' => [
              '{{WRAPPER}} .sidebar header' => 'background: {{VALUE}}',
          ],
      ]
    );
    $this->add_control(
      'background_header',
      [
          'label' => __( 'رنگ پس زمینه', 'plugin-domain' ),
          'type' => Controls_Manager::COLOR,
          'default' => '',
          'selectors' => [
              '{{WRAPPER}} .sidebar' => 'background: {{VALUE}}',
          ],
      ]
    );
    $this->add_group_control(
      \Elementor\Group_Control_Typography::get_type(),
      [
          'name' => 'typography',
          'label' => __( 'تایپوگرافی فهرست', 'plugin-domain' ),
          'selector' => '{{WRAPPER}} .sidebar .menu-pushmenu-container ul li a',
      ]
    );
    $this->add_control(
      'li_header',
      [
          'label' => __( 'رنگ فهرست', 'plugin-domain' ),
          'type' => Controls_Manager::COLOR,
          'default' => '',
          'selectors' => [
              '{{WRAPPER}} .sidebar .menu-pushmenu-container ul li a' => 'color: {{VALUE}}',
          ],
      ]
    );
    $this->end_controls_section();
  }
  

  protected function render(){
	$settings = $this->get_settings_for_display();
  ?>

            <input type="checkbox" id="check" />
            <label for="check">
                <i class="fas fa-bars" id="btn"></i>
                <i class="fas fa-times" id="cancel"></i>   
            </label>
            <div class="sidebar">
                <header>
                  <div class="logo-responsive d-flex justify-content-center">
                      <img src="<?php echo  $settings['image_menu']['url']; ?>" alt="<?php echo get_bloginfo('name'); ?>">
                  </div>
                  <h6 class="desc"><?php echo get_bloginfo('description'); ?></h6>
                </header>
                <?php 
                $args=array(
                    'theme_location'=>'push-menu',
                );
                wp_nav_menu($args);

                ?>
            </div>
	<?php

  }
  protected function _content_template(){
  }
}
?>
