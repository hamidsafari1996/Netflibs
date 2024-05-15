<?php

namespace WPC\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH')) exit; // Exit if accessed directly


class Searchnet extends Widget_Base{

  public function get_name(){
    return 'searchnet';
  }

  public function get_title(){
    return 'جستجو';
  }

  public function get_icon(){
    return 'eicon-site-search';
  }

  public function get_categories(){
    return ['secend-category'];
  }

  protected function _register_controls(){

      $this->start_controls_section(
            'section_content',
            [
              'label' => 'محتوا',
              'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
          );
          $this->add_control(
            'widget_title',
                [
                    'label' => __( 'متن داخل جستجو', 'plugin-domain' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => __( 'بگرد', 'plugin-domain' ),
                    'placeholder' => __( 'متن داخل جتسجو را وارد کنید', 'plugin-domain' ),
                ]
          );
          $this->add_control(
			'show_title',
			[
				'label' => __( 'نمایش متن', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'your-plugin' ),
				'label_off' => __( 'Hide', 'your-plugin' ),
				'return_value' => 'yes',
				'default' => 'label_off',
			]
        );
        $this->add_control(
			'show_icon',
			[
				'label' => __( 'نمایش آیکون', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'your-plugin' ),
				'label_off' => __( 'Hide', 'your-plugin' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
        );
        $this->add_control(
			'show_filter',
			[
				'label' => __( 'نمایش فیلتر', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'your-plugin' ),
				'label_off' => __( 'Hide', 'your-plugin' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
        );
        $this->add_control(
            'search_title',
                [
                    'label' => __( 'متن جستجو', 'plugin-domain' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'placeholder' => __( 'اگر از متن به جای آیکون استفاده می‌کنید', 'plugin-domain' ),
                ]
          );
          $this->add_control(
			'icon',
			[
				'label' => __( 'آیکون سرچ', 'text-domain' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-search',
					'library' => 'solid',
				],
			]
        );
        $this->add_control(
			'icon_fillter',
			[
				'label' => __( 'آیکون فیلتر', 'text-domain' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-sliders-h',
					'library' => 'solid',
				],
			]
        );
        $this->add_control(
            'margin_icon',
            [
              'label' => __( 'فاصله', 'elementor' ),
              'type' => Controls_Manager::DIMENSIONS,
              'size_units' => [ 'px', '%' ],
              'selectors' => [
                '{{WRAPPER}} .net-search button svg ' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
          $this->add_control(
            'margin',
            [
              'label' => __( 'فاصله', 'elementor' ),
              'type' => Controls_Manager::DIMENSIONS,
              'size_units' => [ 'px', '%' ],
              'selectors' => [
                '{{WRAPPER}} .menu-web-head ' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                '{{WRAPPER}} .menu-web-head ' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                '{{WRAPPER}} .menu-web-head ' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .menu-web-head' => 'background: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
			'mx_auto',
			[
				'label' => __( 'عریض شدن از وسط', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'your-plugin' ),
				'label_off' => __( 'Hide', 'your-plugin' ),
				'return_value' => 'yes',
				'default' => 'yes',
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
					'{{WRAPPER}} .net-width' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
    );

      $this->end_controls_section();
      $this->start_controls_section(
        'section_input_style',
        [
          'label' => __( 'تنظیمات باکس جستجو', 'elementor' ),
          'tab' => Controls_Manager::TAB_STYLE,
        ]
      );
      $this->add_responsive_control(
        'width_input',
        [
            'label' => __( 'عرض', 'elementor' ),
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
                '{{WRAPPER}} .net-search' => 'width: {{SIZE}}{{UNIT}};',
            ],
        ]
    );
    $this->add_control(
        'input_padding',
        [
          'label' => __( 'پدینگ', 'elementor' ),
          'type' => Controls_Manager::DIMENSIONS,
          'size_units' => [ 'px', '%' ],
          'selectors' => [
            '{{WRAPPER}} .net-search input ' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
          ],
        ]
      );
    $this->add_control(
        'input_radius',
        [
          'label' => __( 'گوشه‌های مدور', 'elementor' ),
          'type' => Controls_Manager::DIMENSIONS,
          'size_units' => [ 'px', '%' ],
          'selectors' => [
            '{{WRAPPER}} .net-search input ' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
          ],
        ]
    );
    $this->add_control(
        'background-box',
        [
            'label' => __( 'رنگ پس زمینه', 'plugin-domain' ),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .net-search input' => 'background: {{VALUE}}',
            ],
        ]
    );
    $this->add_group_control(
        \Elementor\Group_Control_Box_Shadow::get_type(),
        [
            'name' => 'box_shadow',
            'label' => __( 'باکس شدوو', 'plugin-domain' ),
            'selector' => '{{WRAPPER}} .net-search input',
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
        'border_style_icon',
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
                '{{WRAPPER}} .net-search input' => 'border-style: {{VALUE}} !important;',
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
                '{{WRAPPER}} .net-search input' => 'border-width: {{SIZE}}{{UNIT}} !important;',
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
                  '{{WRAPPER}} .net-search input' => 'border-color: {{VALUE}} !important;',
              ],
          ]
      );
    $this->end_controls_section();
    $this->start_controls_section(
        'section_button_style',
        [
          'label' => __( 'تنظیمات دکمه جستجو', 'elementor' ),
          'tab' => Controls_Manager::TAB_STYLE,
        ]
      );
      $this->add_responsive_control(
        'width_button',
        [
            'label' => __( 'خط ارتفاع', 'elementor' ),
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
                '{{WRAPPER}} .net-search button.search' => 'line-height: {{SIZE}}{{UNIT}};',
            ],
        ]
    );
    $this->add_control(
        'button_padding',
        [
          'label' => __( 'پدینگ', 'elementor' ),
          'type' => Controls_Manager::DIMENSIONS,
          'size_units' => [ 'px', '%' ],
          'selectors' => [
            '{{WRAPPER}} .net-search button.search ' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
          ],
        ]
      );
    $this->add_control(
        'button_radius',
        [
          'label' => __( 'گوشه‌های مدور', 'elementor' ),
          'type' => Controls_Manager::DIMENSIONS,
          'size_units' => [ 'px', '%' ],
          'selectors' => [
            '{{WRAPPER}} .net-search button.search ' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
          ],
        ]
    );
    $this->add_group_control(
        \Elementor\Group_Control_Box_Shadow::get_type(),
        [
            'name' => 'box_shadow',
            'label' => __( 'باکس شدوو', 'plugin-domain' ),
            'selector' => '{{WRAPPER}} .net-search button.search',
        ]
    );
    $this->add_control(
        'background-icon',
        [
            'label' => __( 'رنگ آیکون', 'plugin-domain' ),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .net-search button.search svg, .net-search button.color' => 'color: {{VALUE}}',
            ],
        ]
    );
    $this->add_control(
        'color_titr',
        [
            'label' => __( 'رنگ پس زمینه', 'plugin-domain' ),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .net-search button.search' => 'background: {{VALUE}}',
            ],
        ]
    );
    $this->add_group_control(
        \Elementor\Group_Control_Box_Shadow::get_type(),
        [
            'name' => 'box_shadow_buttom',
            'label' => __( 'باکس شدوو', 'plugin-domain' ),
            'selector' => '{{WRAPPER}} .net-search button.search',
        ]
    );
    $this->add_control(
        'button_background_hover_color',
        [
            'label' => __( 'هاور', 'elementor' ),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .net-search button.search:hover, {{WRAPPER}} .net-search button.search:focus' => 'background-color: {{VALUE}};',
            ],
        ]
    );
    $this->add_group_control(
        \Elementor\Group_Control_Typography::get_type(),
        [
            'name' => 'content_typography',
            'label' => __( 'تایپوگرافی آیکون', 'plugin-domain' ),
            'selector' => '{{WRAPPER}} .net-search button.search svg, .net-search button.color',
        ]
    );
    $this->add_control(
        'more_options',
        [
            'label' => __( 'تنظیمات بیشتر', 'plugin-name' ),
            'type' => \Elementor\Controls_Manager::HEADING,
            'separator' => 'before',
        ]
    );
    $this->add_responsive_control(
        'width_top',
        [
            'label' => __( 'فاصله از بالا', 'elementor' ),
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
                '{{WRAPPER}} .net-search button.search' => 'top: {{SIZE}}{{UNIT}};',
            ],
        ]
    );
    $this->add_responsive_control(
        'width_right',
        [
            'label' => __( 'فاصله از راست', 'elementor' ),
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
                '{{WRAPPER}} .net-search button.search' => 'right: {{SIZE}}{{UNIT}};',
            ],
        ]
    );
    $this->add_responsive_control(
        'width_bottom',
        [
            'label' => __( 'فاصله از پایین', 'elementor' ),
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
                '{{WRAPPER}} .net-search button.search' => 'bottom: {{SIZE}}{{UNIT}};',
            ],
        ]
    );
    $this->add_responsive_control(
        'width_left',
        [
            'label' => __( 'فاصله از چپ', 'elementor' ),
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
                '{{WRAPPER}} .net-search button.search' => 'left: {{SIZE}}{{UNIT}};',
            ],
        ]
    );
      $this->end_controls_section();
      $this->start_controls_section(
        'section_filter_style',
        [
          'label' => __( 'تنظیمات فیلتر', 'elementor' ),
          'tab' => Controls_Manager::TAB_STYLE,
        ]
      );

      $this->add_control(
        'button_padding_filter',
        [
          'label' => __( 'پدینگ', 'elementor' ),
          'type' => Controls_Manager::DIMENSIONS,
          'size_units' => [ 'px', '%' ],
          'selectors' => [
            '{{WRAPPER}} .menu-web-head button.filtter' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
          ],
        ]
      );
    $this->add_control(
        'button_radius_filter',
        [
          'label' => __( 'گوشه‌های مدور', 'elementor' ),
          'type' => Controls_Manager::DIMENSIONS,
          'size_units' => [ 'px', '%' ],
          'selectors' => [
            '{{WRAPPER}} .menu-web-head button.filtter' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
          ],
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
        'background-icon_filter',
        [
            'label' => __( 'رنگ آیکون', 'plugin-domain' ),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .menu-web-head button.filtter svg' => 'color: {{VALUE}}',
            ],
        ]
    );
    $this->add_control(
        'color_titr_filter',
        [
            'label' => __( 'رنگ پس زمینه', 'plugin-domain' ),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .menu-web-head button.filtter' => 'background: {{VALUE}}',
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
        'background-icon_filter_hover',
        [
            'label' => __( 'رنگ آیکون', 'plugin-domain' ),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .menu-web-head button.filtter svg:hover' => 'color: {{VALUE}}',
            ],
        ]
    );
    $this->add_control(
        'color_titr_filter_hover',
        [
            'label' => __( 'رنگ پس زمینه', 'plugin-domain' ),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .menu-web-head button.filtter:hover' => 'background: {{VALUE}}',
            ],
        ]
    );

    $this->end_controls_tab();
    $this->end_controls_tabs();
    $this->add_group_control(
        \Elementor\Group_Control_Box_Shadow::get_type(),
        [
            'name' => 'box_shadow_filter',
            'label' => __( 'باکس شدوو', 'plugin-domain' ),
            'selector' => '{{WRAPPER}} .menu-web-head button.filtter',
        ]
    );
    $this->add_control(
        'more_options_border',
        [
            'label' => __( 'تنظیمات بردر', 'plugin-name' ),
            'type' => \Elementor\Controls_Manager::HEADING,
            'separator' => 'before',
        ]
    );
    $this->add_control(
        'border_hr',
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
                '{{WRAPPER}} .menu-web-head button.filtter' => 'border-style: {{VALUE}}',
            ],
        ]
    );
    $this->add_responsive_control(
        'width_hr',
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
            'size_units' => [ 'px'],
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
                '{{WRAPPER}} .menu-web-head button.filtter' => 'border-width: {{SIZE}}{{UNIT}};',
            ],
        ]
    );
    $this->add_control(
        'hr_button',
        [
            'label' => __( 'رنگ بردر', 'plugin-domain' ),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .menu-web-head button.filtter' => 'border-color: {{VALUE}}',
            ],
        ]
    );
    $this->add_control(
        'more_options_jaygah',
        [
            'label' => __( 'تنظیمات جایگاه', 'plugin-name' ),
            'type' => \Elementor\Controls_Manager::HEADING,
            'separator' => 'before',
        ]
    );
    $this->add_responsive_control(
        'width_top_filter',
        [
            'label' => __( 'بالا', 'elementor' ),
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
                '{{WRAPPER}} .menu-web-head button.filtter' => 'top: {{SIZE}}{{UNIT}};',
            ],
        ]
    );
    $this->add_responsive_control(
        'width_right_filter',
        [
            'label' => __( 'راست', 'elementor' ),
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
                '{{WRAPPER}} .menu-web-head button.filtter' => 'right: {{SIZE}}{{UNIT}};',
            ],
        ]
    );
    $this->add_responsive_control(
        'width_bottom_filter',
        [
            'label' => __( 'پایین', 'elementor' ),
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
                '{{WRAPPER}} .menu-web-head button.filtter' => 'bottom: {{SIZE}}{{UNIT}};',
            ],
        ]
    );
    $this->add_responsive_control(
        'width_left_filter',
        [
            'label' => __( 'چپ', 'elementor' ),
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
                '{{WRAPPER}} .menu-web-head button.filtter' => 'left: {{SIZE}}{{UNIT}};',
            ],
        ]
    );
    $this->add_control(
        'more_filter_modal',
        [
            'label' => __( 'تنظیمات مدال', 'plugin-name' ),
            'type' => \Elementor\Controls_Manager::HEADING,
            'separator' => 'before',
        ]
    );
    $this->add_control(
        'header_footer',
        [
            'label' => __( 'رنگ فوتر و هدر', 'plugin-domain' ),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .modal-header, .modal-footer' => 'background: {{VALUE}} !important;',
            ],
        ]
    );
    $this->add_control(
        'header_title',
        [
            'label' => __( 'رنگ متن هدر', 'plugin-domain' ),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .modal-header h5, .modal-header button.close span' => 'color: {{VALUE}} !important;',
            ],
        ]
    );
    $this->add_control(
        'button_filter_modal',
        [
            'label' => __( 'تنظیمات دکمه', 'plugin-name' ),
            'type' => \Elementor\Controls_Manager::HEADING,
            'separator' => 'before',
        ]
    );
    $this->add_control(
        'type_buttom_style',
        [
            'label' => __( 'طرح دکمه', 'plugin-domain' ),
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
    $this->end_controls_section();
  }
  

  protected function render(){
    $settings = $this->get_settings_for_display();

  ?>
    <div class="menu-web-head">
        <nav class="navbar navbar-light net-width <?php if ( 'yes' === $settings['mx_auto'] ) { echo  'mx-auto'; } ?>">
            <form action="<?php echo site_url() ?>/" method="get" class="net-search">
                <input name="s" class="form-control text-right" type="search" placeholder="<?php echo $settings['widget_title'] ?>" aria-label="Search">
                <button class="search color" type="submit"><span><?php if ( 'yes' === $settings['show_icon'] ) { \Elementor\Icons_Manager::render_icon( $settings['icon'], [ 'aria-hidden' => 'true' ] ); } ?></span><span><?php if ( 'yes' === $settings['show_title'] ) { echo  $settings['search_title'] ; }  ?></span></button>
                <?php if ( 'yes' === $settings['show_filter'] ) { ?>
                <button type="button" class="filtter position-absolute" data-toggle="modal" data-target="#exampleModal">
                <?php  \Elementor\Icons_Manager::render_icon( $settings['icon_fillter'], [ 'aria-hidden' => 'true' ] );  ?>
                </button>
                <?php } ?>
            </form>
        </nav>
    </div>
    <?php if ( 'yes' === $settings['show_filter'] ) { ?>
    <!-- Modal -->
<form action="<?php echo site_url() ?>/" method="get" role="search" class="w-100">
<div class="modal fade header-2-fillter" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">جستجوی حرفه‌ای</h5>
            <button type="button" class="close m-0" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
        <input name="s" class="form-control text-right w-100" type="search" placeholder="<?php echo $settings['widget_title'] ?>" aria-label="Search">
        <div class="row my-3">
            <div class="col-md-4 text-right">
            <?php
                $args_1 = wp_parse_args(
                    
                    array(
                        'show_count'         => false,
                        'hierarchical'       => 1,
                        'hide_empty'         => 1,
                        'orderby'            => 'name',
                        'selected'           => isset( $wp_query->query_vars['movie_cat'] ) ? $wp_query->query_vars['movie_cat'] : '',
                        'show_option_none'   => __( 'دسته‌بندی', 'woocommerce' ),
                        'value_field'        => 'slug',
                        'taxonomy'           => 'movie_cat',
                        'name'               => 'movie_cat',
                    )
                );

                if ( 'order' === $args_1['orderby'] ) {
                    $args_1['orderby']  = 'meta_value_num';
                    $args_1['meta_key'] = 'order';
                }

                wp_dropdown_categories( $args_1 );

            ?>
            </div>
            <div class="col-md-4 text-right">
                <?php
                    $args_2 = wp_parse_args(
                        
                        array(
                            'show_count'         => false,
                            'hierarchical'       => 1,
                            'hide_empty'         => 1,
                            'orderby'            => 'name',
                            'selected'           => isset( $wp_query->query_vars['honarmandan'] ) ? $wp_query->query_vars['honarmandan'] : '',
                            'show_option_none'   => __( 'هنرمند', 'woocommerce' ),
                            'value_field'        => 'slug',
                            'taxonomy'           => 'honarmandan',
                            'name'               => 'honarmandan',
                        )
                    );

                    if ( 'order' === $args_2['orderby'] ) {
                        $args_2['orderby']  = 'meta_value_num';
                        $args_2['meta_key'] = 'order';
                    }

                    wp_dropdown_categories( $args_2 );

                ?>
            </div>
            <div class="col-md-4 text-right">
                <?php
                    $args = wp_parse_args(
                        
                        array(
                            'show_count'         => false,
                            'hierarchical'       => 1,
                            'hide_empty'         => 1,
                            'orderby'            => 'name',
                            'selected'           => isset( $wp_query->query_vars['ages'] ) ? $wp_query->query_vars['ages'] : '',
                            'show_option_none'   => __( 'محدودیت سنی', 'woocommerce' ),
                            'value_field'        => 'slug',
                            'taxonomy'           => 'ages',
                            'name'               => 'ages',
                        )
                    );

                    if ( 'order' === $args['orderby'] ) {
                        $args['orderby']  = 'meta_value_num';
                        $args['meta_key'] = 'order';
                    }

                    wp_dropdown_categories( $args );

                ?>
            </div>
            <div class="col-md-4 text-right">
                <?php
                    $args = wp_parse_args(
                        
                        array(
                            'show_count'         => false,
                            'hierarchical'       => 1,
                            'hide_empty'         => 1,
                            'orderby'            => 'name',
                            'selected'           => isset( $wp_query->query_vars['yaers'] ) ? $wp_query->query_vars['yaers'] : '',
                            'show_option_none'   => __( 'سال ساخت', 'woocommerce' ),
                            'value_field'        => 'slug',
                            'taxonomy'           => 'yaers',
                            'name'               => 'yaers',
                        )
                    );

                    if ( 'order' === $args['orderby'] ) {
                        $args['orderby']  = 'meta_value_num';
                        $args['meta_key'] = 'order';
                    }

                    wp_dropdown_categories( $args );

                ?>
            </div>
            <div class="col-md-4 text-right">
                <?php
                    $args = wp_parse_args(
                        
                        array(
                            'show_count'         => false,
                            'hierarchical'       => 1,
                            'hide_empty'         => 1,
                            'orderby'            => 'name',
                            'selected'           => isset( $wp_query->query_vars['country'] ) ? $wp_query->query_vars['country'] : '',
                            'show_option_none'   => __( 'کشور', 'woocommerce' ),
                            'value_field'        => 'slug',
                            'taxonomy'           => 'country',
                            'name'               => 'country',
                        )
                    );

                    if ( 'order' === $args['orderby'] ) {
                        $args['orderby']  = 'meta_value_num';
                        $args['meta_key'] = 'order';
                    }

                    wp_dropdown_categories( $args );

                ?>
            </div>
            <div class="col-md-4 text-right">
                <?php
                    $args = wp_parse_args(
                        
                        array(
                            'show_count'         => false,
                            'hierarchical'       => 1,
                            'hide_empty'         => 1,
                            'orderby'            => 'name',
                            'selected'           => isset( $wp_query->query_vars['ganres'] ) ? $wp_query->query_vars['ganres'] : '',
                            'show_option_none'   => __( 'ژانر', 'woocommerce' ),
                            'value_field'        => 'slug',
                            'taxonomy'           => 'ganres',
                            'name'               => 'ganres',
                        )
                    );

                    if ( 'order' === $args['orderby'] ) {
                        $args['orderby']  = 'meta_value_num';
                        $args['meta_key'] = 'order';
                    }

                    wp_dropdown_categories( $args );

                ?>
            </div>
        </div>
        </div>
        <div class="modal-footer justify-content-center">
            <button type="submit" class="btn <?php echo $settings['type_buttom_style'] ?> <?php echo $settings['round_buttom_style'] ?> text-white">جستجو کن</button>
        </div>
        </div>
    </div>
</div>
</form>
<?php } ?>

	<?php

  }
  protected function _content_template(){
  }
}
?>


