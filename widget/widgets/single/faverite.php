<?php

namespace WPC\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH')) exit; // Exit if accessed directly


class Faverit_button extends Widget_Base{

  public function get_name(){
    return 'Faverit-button';
  }

  public function get_title(){
    return 'دکمه علاقه‌مندی';
  }

  public function get_icon(){
    return 'fa-solid fa-bookmark';
  }

  public function get_categories(){
    return ['five-category'];
  }

  protected function _register_controls(){
    $this->start_controls_section(
        'section_button_style',
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
      
      $this->add_control(
            'siteurl_color',
            [
                'label' => __( 'رنگ آیکون', 'plugin-domain' ),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .faverit-style-elementor button svg' => 'color: {{VALUE}}',
                ],
            ]
      );
      $this->add_control(
            'siteurl_hover',
            [
            'label' => __( 'هاور آیکون', 'plugin-domain' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                  '{{WRAPPER}} .faverit-style-elementor button svg:hover' => 'color: {{VALUE}}',
            ],
            ]
      );

      $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
            'name' => 'content_typography',
            'label' => __( 'تایپوگرافی', 'plugin-domain' ),
            'selector' => '{{WRAPPER}} .faverit-style-elementor button svg',
            ]
      );
      $this->add_control(
            'margin_site',
            [
                'label' => __( 'فاصله', 'elementor' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .faverit-style-elementor button' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
            );
      $this->add_control(
        'padding_site',
        [
            'label' => __( 'پدینگ', 'elementor' ),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%' ],
            'selectors' => [
                '{{WRAPPER}} .faverit-style-elementor button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]
      );
      
      $this->add_control(
            'border_site',
            [
                'label' => __( 'گوشه های مدور', 'elementor' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .faverit-style-elementor button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
          );
      $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
            'name' => 'background_cl_hover',
            'label' => esc_html__( 'Background', 'plugin-name' ),
            'types' => [ 'classic', 'gradient' ],
            'selector' => '{{WRAPPER}} .faverit-style-elementor button',
            ]
      );
      $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'box_right_buttom',
                'label' => __( 'باکس شدوو', 'plugin-domain' ),
                'selector' => '{{WRAPPER}} .faverit-style-elementor button',
            ]
      );
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
                  '{{WRAPPER}} .faverit-style-elementor button' => 'border-style: {{VALUE}}',
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
                  '{{WRAPPER}} .faverit-style-elementor button' => 'border-width: {{SIZE}}{{UNIT}};',
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
                  '{{WRAPPER}} .faverit-style-elementor button' => 'border-color: {{VALUE}}',
                  ],
            ]
      );
      $this->end_controls_section();
  }
  

  protected function render(){
	$settings = $this->get_settings_for_display();
      $text_button = get_post_meta(get_the_ID(),'text-button',true);
      $time_link = get_post_meta(get_the_ID(),'text-link',true);
  ?>
      <div class="faverit-style-elementor">
            <?php global $user_ID; ?> 
                  <?php if($user_ID){ ?>
                  <div class="faverit-button text-align">
                        <?php echo do_shortcode('[favorite_button]'); ?>
                  </div> 
                  <?php }else{ ?>
                  <div class="faverit-button-error text-align">
                        <button class="simplefavorite-button">
                        <i class="far fa-bookmark"></i>
                        </button>
                  </div> 
            <?php } ?>
      </div>
      

	<?php

  }
  protected function _content_template(){
  }
}
?>
