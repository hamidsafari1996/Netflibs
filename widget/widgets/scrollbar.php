<?php

namespace WPC\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH')) exit; // Exit if accessed directly


class Scrollbar extends Widget_Base{


      public function __construct ($data = [], $args = null) {
		parent::__construct($data, $args);

		wp_register_script('script-scrolbar', get_theme_file_uri('/widget/widgets/scrollbar.js'), ['elementor-frontend'], '1.0.0', true);
	}

	public function get_script_depends () {
		return ['script-scrolbar'];
	}



  public function get_name(){
    return 'scrolbar';
  }

  public function get_title(){
    return 'اسکرول بار';
  }

  public function get_icon(){
    return 'fas fa-arrow-up';
  }

  public function get_categories(){
    return ['four-category'];
  }

  protected function _register_controls(){
      $this->start_controls_section(
        'section_video_style',
        [
          'label' => __( 'تنظیمات عمومی', 'elementor' ),
          'tab' => Controls_Manager::TAB_STYLE,
        ]
      );
      $this->add_control(
            'icon',
            [
                  'label' => __( 'آیکون', 'text-domain' ),
                  'type' => \Elementor\Controls_Manager::ICONS,
                  'default' => [
                        'value' => 'fas fa-chevron-circle-up',
                        'library' => 'solid',
                  ],
            ]
      );
      $this->add_control(
            'padding',
            [
                'label' => __( 'پدینگ', 'elementor' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .scroll a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
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
                    '{{WRAPPER}} .scroll a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                ],
            ]
      );
      $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'box_right_buttom',
                'label' => __( 'باکس شدوو', 'plugin-domain' ),
                'selector' => '{{WRAPPER}} .scroll a',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'desc_typography',
                'label' => __( 'تایپوگرافی', 'plugin-domain' ),
                'selector' => '{{WRAPPER}} .scroll a svg',
            ]
      );
      $this->start_controls_tabs( 'style_button' );
      $this->start_controls_tab(
            'style_button_video',
            [
            'label' => esc_html__( 'عادی', 'elementor' ),
            ]
      );
      $this->add_control(
            'background_right_buttom',
            [
                  'label' => __( 'رنگ پس زمینه', 'plugin-domain' ),
                  'type' => Controls_Manager::COLOR,
                  'default' => '',
                  'selectors' => [
                        '{{WRAPPER}} .scroll a' => 'background: {{VALUE}} !important',
                  ],
            ]
      );
      $this->add_control(
            'color',
            [
                  'label' => __( 'رنگ', 'plugin-domain' ),
                  'type' => Controls_Manager::COLOR,
                  'default' => '',
                  'selectors' => [
                        '{{WRAPPER}} .scroll a svg' => 'color: {{VALUE}} !important',
                  ],
            ]
      );
      $this->end_controls_tab();
      $this->start_controls_tab(
            'style_button_video_hover',
            [
                  'label' => esc_html__( 'هاور', 'elementor' ),
            ]
      );


      $this->add_control(
            'background_right_hover',
            [
                  'label' => __( 'رنگ پس زمینه', 'plugin-domain' ),
                  'type' => Controls_Manager::COLOR,
                  'default' => '',
                  'selectors' => [
                        '{{WRAPPER}} .scroll a:hover' => 'background: {{VALUE}} !important',
                  ],
            ]
      );
      $this->add_control(
            'color_hover',
            [
                  'label' => __( 'رنگ', 'plugin-domain' ),
                  'type' => Controls_Manager::COLOR,
                  'default' => '',
                  'selectors' => [
                        '{{WRAPPER}} .scroll a svg:hover' => 'color: {{VALUE}} !important',
                  ],
            ]
      );

      $this->end_controls_tab();
      $this->end_controls_tabs();
      
      $this->add_control(
            'more_options_border_right',
            [
                'label' => __( 'تنظیمات بردر', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'border_style',
            [
                'label' => __( 'استایل بردر', 'plugin-domain' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'none',
                'options' => [
                    'solid'  => __( 'Solid', 'plugin-domain' ),
                    'dashed' => __( 'Dashed', 'plugin-domain' ),
                    'dotted' => __( 'Dotted', 'plugin-domain' ),
                    'double' => __( 'Double', 'plugin-domain' ),
                    'groove' => __( 'Groove', 'plugin-domain' ),
                    'ridge' => __( 'Ridge', 'plugin-domain' ),
                    'none' => __( 'None', 'plugin-domain' ),
                ],
                'selectors' => [
                    '{{WRAPPER}} .scroll a' => 'border-style: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'width_border',
            [
                'label' => __( 'عرض بردر', 'elementor' ),
                'type' => Controls_Manager::SLIDER,
                'default' => [
                    'unit' => 'px',
                ],
                'tablet_default' => [
                    'unit' => 'px',
                ],
                'mobile_default' => [
                    'unit' => 'px',
                ],
                'size_units' => [  'px'  ],
                'range' => [
                    'px' => [
                        'min' => 1,
                        'max' => 1000,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .scroll a' => 'border-width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'bg_button',
            [
                'label' => __( 'رنگ بردر', 'plugin-domain' ),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}}   .scroll a' => 'border-color: {{VALUE}}',
                ],
            ]
        );
      $this->end_controls_section();
  }
  

  protected function render(){
	$settings = $this->get_settings_for_display();
  ?>

    
      <div class="scroll">
            <a href="#" id="scrollbar"><?php \Elementor\Icons_Manager::render_icon( $settings['icon'], [ 'aria-hidden' => 'true' ] ); ?></a>
      </div>

	<?php

  }
  protected function _content_template(){
  }
}
?>
