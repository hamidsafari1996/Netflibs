<?php

namespace WPC\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH')) exit; // Exit if accessed directly


class Button_trailer extends Widget_Base{

  public function get_name(){
    return 'button-trailer';
  }

  public function get_title(){
    return 'دکمه تریلر';
  }

  public function get_icon(){
    return 'eicon-button';
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
            'type_buttom_style',
            [
                'label' => __( 'رنگ دکمه', 'plugin-domain' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'btn-danger',
                'options' => [
                    'btn-primary'  => __( 'primary', 'plugin-domain' ),
                    'btn-secondary' => __( 'secondary', 'plugin-domain' ),
                    'btn-success' => __( 'success', 'plugin-domain' ),
                    'btn-danger' => __( 'danger', 'plugin-domain' ),
                    'btn-warning' => __( 'warning', 'plugin-domain' ),
                    'btn-info' => __( 'info', 'plugin-domain' ),
                    'btn-light' => __( 'light', 'plugin-domain' ),
                    'btn-dark' => __( 'dark', 'plugin-domain' ),
                    'btn-link' => __( 'link', 'plugin-domain' ),
                    'btn-outline-primary' => __( 'outline-primary', 'plugin-domain' ),
                    'btn-outline-secondary' => __( 'outline-secondary', 'plugin-domain' ),
                    'btn-outline-success' => __( 'outline-success', 'plugin-domain' ),
                    'btn-outline-danger' => __( 'outline-danger', 'plugin-domain' ),
                    'btn-outline-warning' => __( 'outline-warning', 'plugin-domain' ),
                    'btn-outline-info' => __( 'outline-info', 'plugin-domain' ),
                    'btn-outline-light' => __( 'outline-light', 'plugin-domain' ),
                    'btn-outline-dark' => __( 'outline-dark', 'plugin-domain' ),
                    '' => __( 'هیچ', 'plugin-domain' ),
                ],
            ]
        );
        $this->add_control(
        'round_buttom_style',
        [
            'label' => __( 'گوشه‌های مدور', 'plugin-domain' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'default' => 'rounded',
            'options' => [
                'rounded'  => __( 'rounded', 'plugin-domain' ),
                'rounded-top' => __( 'rounded-top', 'plugin-domain' ),
                'rounded-right' => __( 'rounded-right', 'plugin-domain' ),
                'rounded-bottom' => __( 'rounded-bottom', 'plugin-domain' ),
                'rounded-left' => __( 'rounded-left', 'plugin-domain' ),
                'rounded-circle' => __( 'rounded-circle', 'plugin-domain' ),
                'rounded-pill' => __( 'rounded-pill', 'plugin-domain' ),
                '' => __( 'هیچ', 'plugin-domain' ),
            ],
        ]
        );
      $this->add_control(
            'siteurl_color',
            [
                'label' => __( 'رنگ عنوان', 'plugin-domain' ),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .button-trailer a' => 'color: {{VALUE}}',
                ],
            ]
      );
      $this->add_control(
            'siteurl_hover',
            [
            'label' => __( 'هاور عنوان', 'plugin-domain' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                  '{{WRAPPER}} .button-trailer a:hover' => 'color: {{VALUE}}',
            ],
            ]
      );

      $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
            'name' => 'content_typography',
            'label' => __( 'تایپوگرافی', 'plugin-domain' ),
            'selector' => '{{WRAPPER}} .button-trailer a',
            ]
      );
      $this->add_control(
            'margin_site',
            [
                'label' => __( 'فاصله', 'elementor' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .button-trailer a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                '{{WRAPPER}} .button-trailer a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .button-trailer a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
          );
      $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
            'name' => 'background_cl_hover',
            'label' => esc_html__( 'Background', 'plugin-name' ),
            'types' => [ 'classic', 'gradient' ],
            'selector' => '{{WRAPPER}} .button-trailer a',
            ]
      );
      $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'box_right_buttom',
                'label' => __( 'باکس شدوو', 'plugin-domain' ),
                'selector' => '{{WRAPPER}} .button-trailer a',
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
                  '{{WRAPPER}} .button-trailer a' => 'border-style: {{VALUE}}',
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
                  '{{WRAPPER}} .button-trailer a' => 'border-width: {{SIZE}}{{UNIT}};',
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
                  '{{WRAPPER}} .button-trailer a' => 'border-color: {{VALUE}}',
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

    <div class="button-trailer text-align">
    <a href="<?php echo $time_link ?>" class="btn <?php echo $settings['round_buttom_style'] ?> <?php echo $settings['type_buttom_style'] ?> popup-youtube"><i class="fas fa-play"></i><span class="mr-3"><?php if($text_button){ echo $text_button; }else{ echo 'نمایش تریلر'; } ?></span></a>
    </div>


	<?php

  }
  protected function _content_template(){
  }
}
?>
