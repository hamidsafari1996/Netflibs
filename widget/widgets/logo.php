<?php

namespace WPC\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH')) exit; // Exit if accessed directly


class Logonet extends Widget_Base{

  public function get_name(){
    return 'logonet';
  }

  public function get_title(){
    return 'لوگو';
  }

  public function get_icon(){
    return 'eicon-site-logo';
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
        'section_video_style',
        [
          'label' => __( 'تنظیمات عمومی', 'elementor' ),
          'tab' => Controls_Manager::TAB_STYLE,
        ]
      );
      $this->add_responsive_control(
        'align',
        [
          'label' => __( 'Alignment', 'elementor' ),
          'type' => Controls_Manager::CHOOSE,
          'options' => [
            'left' => [
              'title' => __( 'Left', 'elementor' ),
              'icon' => 'eicon-text-align-left',
            ],
            'center' => [
              'title' => __( 'Center', 'elementor' ),
              'icon' => 'eicon-text-align-center',
            ],
            'right' => [
              'title' => __( 'Right', 'elementor' ),
              'icon' => 'eicon-text-align-right',
            ],
          ],
          'selectors' => [
            '{{WRAPPER}}' => 'text-align: {{VALUE}};',
          ],
        ]
      );
      $this->add_responsive_control(
        'width',
        [
            'label' => __( 'Width', 'elementor' ),
            'type' => Controls_Manager::SLIDER,
            'default' => [
                'unit' => '%',
            ],
            'tablet_default' => [
                'unit' => '%',
            ],
            'mobile_default' => [
                'unit' => '%',
            ],
            'size_units' => [ '%', 'px', 'vw' ],
            'range' => [
                '%' => [
                    'min' => 1,
                    'max' => 100,
                ],
                'px' => [
                    'min' => 1,
                    'max' => 1000,
                ],
                'vw' => [
                    'min' => 1,
                    'max' => 100,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .navbar-light' => 'width: {{SIZE}}{{UNIT}};',
            ],
        ]
    );
    $this->add_control(
        'margin',
        [
          'label' => __( 'فاصله', 'elementor' ),
          'type' => Controls_Manager::DIMENSIONS,
          'size_units' => [ 'px', '%' ],
          'selectors' => [
            '{{WRAPPER}} .navbar-light ' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
          ],
        ]
      );
      $this->add_control(
        'border_padding',
        [
          'label' => __( 'پدینگ', 'elementor' ),
          'type' => Controls_Manager::DIMENSIONS,
          'size_units' => [ 'px', '%' ],
          'selectors' => [
            '{{WRAPPER}} .navbar-light ' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
          ],
        ]
      );
      $this->add_control(
        'border_radius',
        [
          'label' => __( 'گوشه‌های مدور', 'elementor' ),
          'type' => Controls_Manager::DIMENSIONS,
          'size_units' => [ 'px', '%' ],
          'selectors' => [
            '{{WRAPPER}} .navbar-light ' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
          ],
        ]
      );
    $this->add_control(
      'background',
      [
          'label' => __( 'رنگ پس زمینه', 'plugin-domain' ),
          'type' => Controls_Manager::COLOR,
          'default' => '',
          'selectors' => [
              '{{WRAPPER}} .navbar-light' => 'background: {{VALUE}}',
          ],
      ]
  );
    $this->add_group_control(
        \Elementor\Group_Control_Box_Shadow::get_type(),
        [
            'name' => 'box_shadow',
            'label' => __( 'باکس شدوو', 'plugin-domain' ),
            'selector' => '{{WRAPPER}} .navbar-light',
        ]
);
    $this->end_controls_section();
  }
  

  protected function render(){
	$settings = $this->get_settings_for_display();
  ?>


            <nav class="navbar-light">
            <a class="navbar-brand" href="<?php echo  site_url(); ?>">
                <img src="<?php echo  $settings['image_menu']['url']; ?>" class="d-inline-block align-top" alt="<?php echo get_bloginfo('name'); ?>" loading="lazy">
            </a>
            </nav>


	<?php

  }
  protected function _content_template(){
  }
}
?>
