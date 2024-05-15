<?php

namespace WPC\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH')) exit; // Exit if accessed directly


class Socialplus extends Widget_Base{

  public function get_name(){
    return 'socialplus';
  }

  public function get_title(){
    return 'شبکه اجتماعی بازشونده';
  }

  public function get_icon(){
    return 'eicon-social-icons';
  }

  public function get_categories(){
    return ['four-category'];
  }

  protected function _register_controls(){
    $this->start_controls_section(
        'content_section',
        [
            'label' => __( 'محتوا', 'plugin-name' ),
            'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
        ]
    );

    $this->add_control(
        'widget_title',
        [
            'label' => __( 'عنوان', 'plugin-domain' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => __( 'شبکه‌های اجتماعی', 'plugin-domain' ),
        ]
    );
    $repeater = new \Elementor\Repeater();
    $repeater->add_control(
        'list_title', [
            'label' => __( 'عنوان', 'plugin-domain' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => __( 'عنوان' , 'plugin-domain' ),
            'label_block' => true,
        ]
    );
    $repeater->add_control(
        'icon',
        [
            'label' => __( 'آیکون', 'text-domain' ),
            'type' => \Elementor\Controls_Manager::ICONS,
            'default' => [
                'value' => 'fab fa-facebook',
                'library' => 'solid',
            ],
        ]
    );
    $repeater->add_control(
        'social_link',
        [
            'label' => __( 'لینک', 'plugin-domain' ),
            'type' => \Elementor\Controls_Manager::URL,
            'placeholder' => __( 'https://social-link.com', 'plugin-domain' ),
            'show_external' => true,
            'default' => [
                'url' => '',
                'is_external' => true,
                'nofollow' => true,
            ],
        ]
    );
    $this->add_control(
        'list',
        [
            'label' => __( 'Repeater List', 'plugin-domain' ),
            'type' => \Elementor\Controls_Manager::REPEATER,
            'fields' => $repeater->get_controls(),
            'default' => [
                [
                    'list_title' => __( 'فیسبوک', 'plugin-domain' ),
                    'icon' => __( 'fab fa-facebook', 'plugin-domain' ),
                    'social_link' => __( '', 'plugin-domain' ),
                ],
                [
                    'list_title' => __( 'تلگرام', 'plugin-domain' ),
                    'icon' => __( 'fab fa-telegram', 'plugin-domain' ),
                    'social_link' => __( '', 'plugin-domain' ),
                ],
            ],
            'title_field' => '{{{ list_title }}}',
        ]
    );
    $this->end_controls_section();
    $this->start_controls_section(
        'section_style',
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
                '{{WRAPPER}} .width-section' => 'text-align: {{VALUE}};',
            ],
        ]
      );
    $this->add_responsive_control(
        'max-width',
        [
            'label' => __( 'حداکثر عرض', 'elementor' ),
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
                '{{WRAPPER}} .width-section' => 'max-width: {{SIZE}}{{UNIT}};',
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
                  '{{WRAPPER}} .width-section' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
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
                  '{{WRAPPER}} .width-section' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
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
                  '{{WRAPPER}} .width-section' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
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
                '{{WRAPPER}} .width-section' => 'background: {{VALUE}}',
            ],
        ]
    );
      $this->add_control(
        'more_options',
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
            'default' => 'solid',
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
                '{{WRAPPER}} .width-section' => 'border-style: {{VALUE}}',
            ],
        ]
    );
    $this->add_responsive_control(
        'width_border',
        [
            'label' => __( 'عرض بردر', 'elementor' ),
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
                '{{WRAPPER}} .width-section' => 'border-width: {{SIZE}}{{UNIT}};',
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
                '{{WRAPPER}} .width-section' => 'border-color: {{VALUE}}',
            ],
        ]
    );
      $this->add_group_control(
          \Elementor\Group_Control_Box_Shadow::get_type(),
          [
              'name' => 'box_shadow',
              'label' => __( 'باکس شدوو', 'plugin-domain' ),
              'selector' => '{{WRAPPER}} .width-section',
          ]
      );    
    $this->add_control(
        'title_color',
        [
            'label' => __( 'رنگ متن', 'plugin-domain' ),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .width-section .text-footer' => 'color: {{VALUE}}',
            ],
        ]
    );
    $this->add_group_control(
        \Elementor\Group_Control_Typography::get_type(),
        [
            'name' => 'title_typography',
            'label' => __( 'نایپوگرافی عنوان', 'plugin-domain' ),
            'selector' => '{{WRAPPER}} .width-section .text-footer',
        ]
    );
    $this->end_controls_section();
    $this->start_controls_section(
        'content_section_style',
        [
            'label' => __( 'استایل منوی بازشونده', 'plugin-name' ),
            'tab' => \Elementor\Controls_Manager::TAB_STYLE,
        ]
    );


 
    $this->add_control(
        'border_radius_drop',
        [
            'label' => __( 'گوشه‌های مدور', 'elementor' ),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%' ],
            'selectors' => [
                '{{WRAPPER}} .width-section .dropdown-menu' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
            ],
        ]
    );
    $this->add_control(
        'background_drop',
        [
            'label' => __( 'رنگ پس زمینه', 'plugin-domain' ),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .width-section .dropdown-menu' => 'background: {{VALUE}}',
            ],
        ]
    );
    $this->add_control(
      'more_options_drop',
      [
          'label' => __( 'تنظیمات بردر', 'plugin-name' ),
          'type' => \Elementor\Controls_Manager::HEADING,
          'separator' => 'before',
      ]
  );
  $this->add_control(
      'border_style_drop',
      [
          'label' => __( 'استایل بردر', 'plugin-domain' ),
          'type' => \Elementor\Controls_Manager::SELECT,
          'default' => 'solid',
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
              '{{WRAPPER}} .width-section .dropdown-menu' => 'border-style: {{VALUE}}',
          ],
      ]
  );
  $this->add_responsive_control(
      'width_border_drop',
      [
          'label' => __( 'عرض بردر', 'elementor' ),
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
              '{{WRAPPER}} .width-section .dropdown-menu' => 'border-width: {{SIZE}}{{UNIT}};',
          ],
      ]
  );
  $this->add_control(
    'bg_button_drop',
    [
        'label' => __( 'رنگ بردر', 'plugin-domain' ),
        'type' => Controls_Manager::COLOR,
        'default' => '',
        'selectors' => [
            '{{WRAPPER}} .width-section .dropdown-menu' => 'border-color: {{VALUE}}',
        ],
    ]
    );
  $this->add_group_control(
    \Elementor\Group_Control_Box_Shadow::get_type(),
    [
        'name' => 'box_shadow_drop',
        'label' => __( 'باکس شدوو', 'plugin-domain' ),
        'selector' => '{{WRAPPER}} .width-section .dropdown-menu',
    ]
    );

  
    $this->end_controls_section();
    $this->start_controls_section(
        'content_style',
        [
            'label' => __( 'استایل المان', 'plugin-name' ),
            'tab' => \Elementor\Controls_Manager::TAB_STYLE,
        ]
    );
    $this->add_responsive_control(
        'width_drop',
        [
            'label' => __( 'فاصله بین آیکون و نام', 'elementor' ),
            'type' => Controls_Manager::SLIDER,
            'default' => [
                'unit' => 'px',
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
                '{{WRAPPER}} .width-section .dropdown-menu ul li a svg' => 'margin-left: {{SIZE}}{{UNIT}};',
            ],
        ]
    );
    $this->add_control(
        'margin_drop',
        [
            'label' => __( 'فاصله', 'elementor' ),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%' ],
            'selectors' => [
                '{{WRAPPER}} .width-section .dropdown-menu ul li' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
            ],
        ]
    );
    $this->add_control(
        'padding_drop',
        [
            'label' => __( 'پدینگ', 'elementor' ),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%' ],
            'selectors' => [
                '{{WRAPPER}} .width-section .dropdown-menu ul li' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
            ],
        ]
    );
    $this->add_control(
        'title_background_drop',
        [
            'label' => __( 'رنگ المان', 'plugin-domain' ),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .width-section .dropdown-menu ul li' => 'background: {{VALUE}}',
            ],
        ]
    );
      $this->add_control(
        'title_background_hover',
        [
            'label' => __( 'هاور المان', 'plugin-domain' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .width-section .dropdown-menu ul li:hover' => 'background: {{VALUE}}',
            ],
        ]
      );
    $this->add_control(
        'title_color_drop',
        [
            'label' => __( 'رنگ آیکون و نام', 'plugin-domain' ),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .width-section .dropdown-menu ul li a' => 'color: {{VALUE}}',
            ],
        ]
    );
    $this->add_control(
        'title_hover_drop',
        [
            'label' => __( 'هاور', 'plugin-domain' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .width-section .dropdown-menu ul li a:hover' => 'color: {{VALUE}}',
            ],
        ]
      );
    $this->add_group_control(
        \Elementor\Group_Control_Typography::get_type(),
        [
            'name' => 'title_typography_drop',
            'label' => __( 'نایپوگرافی آیکون و نام', 'plugin-domain' ),
            'selector' => '{{WRAPPER}} .width-section .dropdown-menu ul li a',
        ]
    );
    $this->end_controls_section();
  }
  

  protected function render(){
    $settings = $this->get_settings_for_display();
    ?>
    <div class="width-section">
        <div class="btn-group dropup">
            <div type="button" class="dropdown-toggle text-footer" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <?php echo $settings['widget_title']; ?>
            </div>
            <div class="dropdown-menu">
            
                <ul class="text-right">
                <?php if ( $settings['list'] ) { foreach (  $settings['list'] as $item ) { 		$target = $item['social_link']['is_external'] ? ' target="_blank"' : ''; $nofollow = $item['social_link']['nofollow'] ? ' rel="nofollow"' : ''; ?>
                    <li><a href="<?php echo $item['social_link']['url']; ?>" <?php echo $target; ?> <?php echo $nofollow; ?>><?php \Elementor\Icons_Manager::render_icon( $item['icon'], [ 'aria-hidden' => 'true' ] ); ?><?php echo $item['list_title']; ?></a></li>
                    <?php }
                    } ?>
                </ul>
                
            </div>
        </div>
    </div>
    <?php
  }

  protected function _content_template(){
    
  }
}