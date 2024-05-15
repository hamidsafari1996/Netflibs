<?php

namespace WPC\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH')) exit; // Exit if accessed directly


class Filternet extends Widget_Base{

  public function get_name(){
    return 'filter';
  }

  public function get_title(){
    return 'فیلتر';
  }

  public function get_icon(){
    return 'fas fa-filter';
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
                'label' => __( 'متن داخل دکمه', 'plugin-domain' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'فیلتر', 'plugin-domain' ),
                'placeholder' => __( 'متن داخل دکمه را وارد کنید', 'plugin-domain' ),
        ]
    );
    $this->add_control(
        'icon',
        [
              'label' => __( 'آیکون', 'text-domain' ),
              'type' => \Elementor\Controls_Manager::ICONS,
              'default' => [
                    'value' => 'fas fa-filter',
                    'library' => 'solid',
              ],
        ]
    );     
    $this->add_control(
        'show_text',
        [
            'label' => __( 'نمایش متن دکمه', 'plugin-domain' ),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'label_on' => __( 'Show', 'your-plugin' ),
            'label_off' => __( 'Hide', 'your-plugin' ),
            'return_value' => 'yes',
            'default' => 'yes',
        ]
    ); 
    $this->add_control(
        'show_icon',
        [
            'label' => __( 'نمایش آیکون دکمه', 'plugin-domain' ),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'label_on' => __( 'Show', 'your-plugin' ),
            'label_off' => __( 'Hide', 'your-plugin' ),
            'return_value' => 'yes',
            'default' => 'yes',
        ]
    ); 
    $this->add_control(
        'show_category',
        [
            'label' => __( 'نمایش فیلتر دسته‌بندی', 'plugin-domain' ),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'label_on' => __( 'Show', 'your-plugin' ),
            'label_off' => __( 'Hide', 'your-plugin' ),
            'return_value' => 'yes',
            'default' => 'yes',
        ]
    );
    $this->add_control(
        'show_honarmand',
        [
            'label' => __( 'نمایش فیلتر هنرمند', 'plugin-domain' ),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'label_on' => __( 'Show', 'your-plugin' ),
            'label_off' => __( 'Hide', 'your-plugin' ),
            'return_value' => 'yes',
            'default' => 'yes',
        ]
    );
    $this->add_control(
        'show_old',
        [
            'label' => __( 'نمایش فیلتر محدودیت سنی', 'plugin-domain' ),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'label_on' => __( 'Show', 'your-plugin' ),
            'label_off' => __( 'Hide', 'your-plugin' ),
            'return_value' => 'yes',
            'default' => 'yes',
        ]
    );
    $this->add_control(
        'show_year',
        [
            'label' => __( 'نمایش فیلتر سال ساخت', 'plugin-domain' ),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'label_on' => __( 'Show', 'your-plugin' ),
            'label_off' => __( 'Hide', 'your-plugin' ),
            'return_value' => 'yes',
            'default' => 'yes',
        ]
    );
    $this->add_control(
        'show_country',
        [
            'label' => __( 'نمایش فیلتر کشور', 'plugin-domain' ),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'label_on' => __( 'Show', 'your-plugin' ),
            'label_off' => __( 'Hide', 'your-plugin' ),
            'return_value' => 'yes',
            'default' => 'yes',
        ]
    );
    $this->add_control(
        'show_guner',
        [
            'label' => __( 'نمایش فیلتر ژانر', 'plugin-domain' ),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'label_on' => __( 'Show', 'your-plugin' ),
            'label_off' => __( 'Hide', 'your-plugin' ),
            'return_value' => 'yes',
            'default' => 'yes',
        ]
    );
    $this->end_controls_section();
    $this->start_controls_section(
        'section_botton_style_content',
        [
            'label' => __( 'استایل فرم', 'elementor' ),
            'tab' => Controls_Manager::TAB_STYLE,
        ]
    );
    $this->add_control(
        'width',
        [
            'label' => esc_html__( 'عرض فرم', 'plugin-name' ),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'size_units' => [ 'px', '%' ],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 1000,
                    'step' => 1,
                ],
                '%' => [
                    'min' => 0,
                    'max' => 100,
                ],
            ],
            'default' => [
                'unit' => '%',
                'size' => 50,
            ],
            'selectors' => [
                '{{WRAPPER}} form.nft-element-filter' => 'width: {{SIZE}}{{UNIT}};',
            ],
        ]
    );
    $this->add_control(
        'margin_content',
        [
            'label' => __( 'فاصله', 'elementor' ),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%' ],
            'selectors' => [
                '{{WRAPPER}} form.nft-element-filter' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]
    );
    $this->add_control(
    'padding_content',
        [
            'label' => __( 'پدینگ', 'elementor' ),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%' ],
            'selectors' => [
                '{{WRAPPER}} form.nft-element-filter' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]
    );
    $this->add_control(
    'border_radius_content',
        [
            'label' => __( 'گوشه‌های مدور', 'elementor' ),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%' ],
            'selectors' => [
                '{{WRAPPER}} form.nft-element-filter' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]
    );
    $this->add_control(
        'bg_filter',
        [
            'label' => __( 'رنگ پس زمینه', 'plugin-domain' ),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} form.nft-element-filter' => 'background: {{VALUE}}',
            ],
        ]
    );
    $this->add_group_control(
    \Elementor\Group_Control_Box_Shadow::get_type(),
        [
            'name' => 'box_right_buttom_content',
            'label' => __( 'باکس شدوو', 'plugin-domain' ),
            'selector' => '{{WRAPPER}} form.nft-element-filter',
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
                '{{WRAPPER}} form.nft-element-filter' => 'border-style: {{VALUE}}',
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
                '{{WRAPPER}} form.nft-element-filter' => 'border-width: {{SIZE}}{{UNIT}};',
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
                '{{WRAPPER}}   form.nft-element-filter' => 'border-color: {{VALUE}}',
            ],
        ]
    );
    $this->end_controls_section();
    $this->start_controls_section(
        'section_button',
        [
            'label' => __( 'استایل دکمه', 'elementor' ),
            'tab' => Controls_Manager::TAB_STYLE,
        ]
    );
    $this->add_responsive_control(
        'max_width_button',
        [
            'label' => __( 'عرض دکمه', 'elementor' ),
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
            'size_units' => [  '%'  ],
            'range' => [
                '%' => [
                    'min' => 1,
                    'max' => 100,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} form.nft-element-filter .col-element-button' => 'max-width: {{SIZE}}{{UNIT}};',
            ],
        ]
    );
    $this->add_responsive_control(
        'max_width_button_button',
        [
            'label' => __( 'عرض دکمه', 'elementor' ),
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
            'size_units' => [  '%'  ],
            'range' => [
                '%' => [
                    'min' => 1,
                    'max' => 100,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} form.nft-element-filter .col-element-button button' => 'width: {{SIZE}}{{UNIT}};',
            ],
        ]
    );
    $this->add_control(
        'text_align_button',
        [
            'label' => esc_html__( 'چیدمان', 'plugin-name' ),
            'type' => \Elementor\Controls_Manager::CHOOSE,
            'options' => [
                'left' => [
                    'title' => esc_html__( 'چپ', 'plugin-name' ),
                    'icon' => 'fa fa-align-left',
                ],
                'center' => [
                    'title' => esc_html__( 'وسط', 'plugin-name' ),
                    'icon' => 'fa fa-align-center',
                ],
                'right' => [
                    'title' => esc_html__( 'راست', 'plugin-name' ),
                    'icon' => 'fa fa-align-right',
                ],
            ],
            'default' => 'center',
            'toggle' => true,
            'selectors' => [
                '{{WRAPPER}} form.nft-element-filter button.btn' => 'text-align: {{SIZE}}{{UNIT}};',
            ],
        ]
    );
    $this->add_control(
        'type_buttom_style',
        [
            'label' => __( 'طرح دکمه', 'plugin-domain' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'default' => 'btn-primary',
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
        'margin_content_button',
        [
            'label' => __( 'فاصله', 'elementor' ),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%' ],
            'selectors' => [
                '{{WRAPPER}} form.nft-element-filter button.btn' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]
    );
    $this->add_control(
    'padding_content_button',
        [
            'label' => __( 'پدینگ', 'elementor' ),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%' ],
            'selectors' => [
                '{{WRAPPER}} form.nft-element-filter button.btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]
    );
    $this->add_control(
    'border_radius_button',
        [
            'label' => __( 'گوشه‌های مدور', 'elementor' ),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%' ],
            'selectors' => [
                '{{WRAPPER}} form.nft-element-filter button.btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
        'button_color',
        [
            'label' => __( 'رنگ متن', 'plugin-domain' ),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} form.nft-element-filter button.btn' => 'color: {{VALUE}}',
            ],
        ]
    );
    $this->add_control(
        'button_background',
        [
            'label' => __( 'رنگ دکمه', 'plugin-domain' ),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} form.nft-element-filter button.btn' => 'background: {{VALUE}}',
            ],
        ]
    );
    $this->add_group_control(
        \Elementor\Group_Control_Typography::get_type(),
        [
            'name' => 'time_typography',
            'label' => __( 'تایپوگرافی دکمه', 'plugin-domain' ),
            'selector' => '{{WRAPPER}} form.nft-element-filter button.btn',
        ]
    );
    $this->add_group_control(
    \Elementor\Group_Control_Box_Shadow::get_type(),
        [
            'name' => 'box_right_buttom_content',
            'label' => __( 'باکس شدوو', 'plugin-domain' ),
            'selector' => '{{WRAPPER}} form.nft-element-filter button.btn',
        ]
    );
    $this->add_control(
        'more_options_button',
        [
            'label' => __( 'تنظیمات بردر', 'plugin-name' ),
            'type' => \Elementor\Controls_Manager::HEADING,
            'separator' => 'before',
        ]
    );
    $this->add_control(
        'border_botton_style',
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
                '{{WRAPPER}} form.nft-element-filter button.btn' => 'border-style: {{VALUE}}',
            ],
        ]
    );
    $this->add_responsive_control(
        'width_border_style',
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
                '{{WRAPPER}} form.nft-element-filter button.btn' => 'border-width: {{SIZE}}{{UNIT}};',
            ],
        ]
    );
    $this->add_control(
        'style_button_border',
        [
            'label' => __( 'رنگ بردر', 'plugin-domain' ),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}}   form.nft-element-filter button.btn' => 'border-color: {{VALUE}}',
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
        'button_color_hover',
        [
            'label' => __( 'رنگ متن', 'plugin-domain' ),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} form.nft-element-filter button.btn:hover' => 'color: {{VALUE}}',
            ],
        ]
    );
    $this->add_control(
        'button_background_hover',
        [
            'label' => __( 'رنگ دکمه', 'plugin-domain' ),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} form.nft-element-filter button.btn:hover' => 'background: {{VALUE}}',
            ],
        ]
    );
    $this->add_group_control(
    \Elementor\Group_Control_Box_Shadow::get_type(),
        [
            'name' => 'box_right_buttom_content_hover',
            'label' => __( 'باکس شدوو', 'plugin-domain' ),
            'selector' => '{{WRAPPER}} form.nft-element-filter button.btn:hover',
        ]
    );
    $this->add_control(
        'more_options_button_hover',
        [
            'label' => __( 'تنظیمات بردر', 'plugin-name' ),
            'type' => \Elementor\Controls_Manager::HEADING,
            'separator' => 'before',
        ]
    );
    $this->add_control(
        'border_botton_style_hover',
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
                '{{WRAPPER}} form.nft-element-filter button.btn:hover' => 'border-style: {{VALUE}}',
            ],
        ]
    );
    $this->add_responsive_control(
        'width_border_style_hover',
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
                '{{WRAPPER}} form.nft-element-filter button.btn:hover' => 'border-width: {{SIZE}}{{UNIT}};',
            ],
        ]
    );
    $this->add_control(
        'style_button_hover',
        [
            'label' => __( 'رنگ بردر', 'plugin-domain' ),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}}   form.nft-element-filter button.btn:hover' => 'border-color: {{VALUE}}',
            ],
        ]
    );

    $this->end_controls_tab();
    $this->end_controls_tabs();
    $this->end_controls_section();
    $this->start_controls_section(
        'section_style_filter',
        [
            'label' => __( 'استایل باکس فیلتر', 'elementor' ),
            'tab' => Controls_Manager::TAB_STYLE,
        ]
    );
    $this->add_responsive_control(
        'max_width_filter',
        [
            'label' => __( 'عرض فیلتر', 'elementor' ),
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
            'size_units' => [  '%'  ],
            'range' => [
                '%' => [
                    'min' => 1,
                    'max' => 100,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} form.nft-element-filter .col-element-nft' => 'max-width: {{SIZE}}{{UNIT}};',
            ],
        ]
    );
    $this->add_control(
        'text_align_filter',
        [
            'label' => esc_html__( 'چیدمان', 'plugin-name' ),
            'type' => \Elementor\Controls_Manager::CHOOSE,
            'options' => [
                'left' => [
                    'title' => esc_html__( 'چپ', 'plugin-name' ),
                    'icon' => 'fa fa-align-left',
                ],
                'center' => [
                    'title' => esc_html__( 'وسط', 'plugin-name' ),
                    'icon' => 'fa fa-align-center',
                ],
                'right' => [
                    'title' => esc_html__( 'راست', 'plugin-name' ),
                    'icon' => 'fa fa-align-right',
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} form.nft-element-filter .col-element-nft select' => 'text-align: {{VALUE}};',
            ], 
        ]
    );
    $this->add_control(
        'margin_content_filter',
        [
            'label' => __( 'فاصله', 'elementor' ),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%' ],
            'selectors' => [
                '{{WRAPPER}} form.nft-element-filter .col-element-nft' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]
    );
    $this->add_control(
    'padding_content_filter',
        [
            'label' => __( 'پدینگ', 'elementor' ),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%' ],
            'selectors' => [
                '{{WRAPPER}} form.nft-element-filter .col-element-nft select' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]
    );
    $this->add_control(
    'border_radius_filter',
        [
            'label' => __( 'گوشه‌های مدور', 'elementor' ),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%' ],
            'selectors' => [
                '{{WRAPPER}} form.nft-element-filter .col-element-nft select' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]
    );
    $this->start_controls_tabs( 'style_button_filter' );
    $this->start_controls_tab(
    'style_filter_video',
        [
        'label' => esc_html__( 'عادی', 'elementor' ),
        ]
    );
    $this->add_control(
        'filter_color',
        [
            'label' => __( 'رنگ متن', 'plugin-domain' ),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} form.nft-element-filter .col-element-nft select' => 'color: {{VALUE}}',
            ],
        ]
    );
    $this->add_control(
        'filter_background',
        [
            'label' => __( 'رنگ فیلتر', 'plugin-domain' ),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} form.nft-element-filter .col-element-nft select' => 'background: {{VALUE}}',
            ],
        ]
    );
    $this->add_group_control(
        \Elementor\Group_Control_Typography::get_type(),
        [
            'name' => 'filter_typography',
            'label' => __( 'تایپوگرافی فیلتر', 'plugin-domain' ),
            'selector' => '{{WRAPPER}} form.nft-element-filter .col-element-nft select',
        ]
    );
    $this->add_group_control(
    \Elementor\Group_Control_Box_Shadow::get_type(),
        [
            'name' => 'box_right_filter_content',
            'label' => __( 'باکس شدوو', 'plugin-domain' ),
            'selector' => '{{WRAPPER}} form.nft-element-filter .col-element-nft select',
        ]
    );
    $this->add_control(
        'more_options_filter',
        [
            'label' => __( 'تنظیمات بردر', 'plugin-name' ),
            'type' => \Elementor\Controls_Manager::HEADING,
            'separator' => 'before',
        ]
    );
    $this->add_control(
        'border_filter_style',
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
                '{{WRAPPER}} form.nft-element-filter .col-element-nft select' => 'border-style: {{VALUE}}',
            ],
        ]
    );
    $this->add_responsive_control(
        'width_filter_style',
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
                '{{WRAPPER}} form.nft-element-filter .col-element-nft select' => 'border-width: {{SIZE}}{{UNIT}};',
            ],
        ]
    );
    $this->add_control(
        'style_filter',
        [
            'label' => __( 'رنگ بردر', 'plugin-domain' ),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} form.nft-element-filter .col-element-nft select' => 'border-color: {{VALUE}}',
            ],
        ]
    );
    $this->end_controls_tab();
    $this->start_controls_tab(
        'style_filter_video_hover',
        [
            'label' => esc_html__( 'هاور', 'elementor' ),
        ]
    );

    $this->add_control(
        'filter_color_hover',
        [
            'label' => __( 'رنگ متن', 'plugin-domain' ),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} form.nft-element-filter .col-element-nft select:hover' => 'color: {{VALUE}}',
            ],
        ]
    );
    $this->add_control(
        'filter_background_hover',
        [
            'label' => __( 'رنگ دکمه', 'plugin-domain' ),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} form.nft-element-filter .col-element-nft select:hover' => 'background: {{VALUE}}',
            ],
        ]
    );
    $this->add_group_control(
    \Elementor\Group_Control_Box_Shadow::get_type(),
        [
            'name' => 'box_right_filter_content_hover',
            'label' => __( 'باکس شدوو', 'plugin-domain' ),
            'selector' => '{{WRAPPER}} form.nft-element-filter .col-element-nft select:hover',
        ]
    );
    $this->add_control(
        'more_options_filter_hover',
        [
            'label' => __( 'تنظیمات بردر', 'plugin-name' ),
            'type' => \Elementor\Controls_Manager::HEADING,
            'separator' => 'before',
        ]
    );
    $this->add_control(
        'border_filter_style_hover',
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
                '{{WRAPPER}} form.nft-element-filter .col-element-nft select:hover' => 'border-style: {{VALUE}}',
            ],
        ]
    );
    $this->add_responsive_control(
        'width_border_filter_hover',
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
                '{{WRAPPER}} form.nft-element-filter .col-element-nft select:hover' => 'border-width: {{SIZE}}{{UNIT}};',
            ],
        ]
    );
    $this->add_control(
        'style_filter_hover',
        [
            'label' => __( 'رنگ بردر', 'plugin-domain' ),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} form.nft-element-filter .col-element-nft select:hover' => 'border-color: {{VALUE}}',
            ],
        ]
    );

    $this->end_controls_tab();
    $this->end_controls_tabs();
    $this->end_controls_section();
  }
  

  protected function render(){
    $settings = $this->get_settings_for_display();

  ?>
    
    
    <!-- Modal -->
<form action="<?php echo site_url() ?>/" method="get" role="filter" class="nft-element-filter">
      <div class="d-flex flex-wrap align-items-center">
        <?php if ( 'yes' === $settings['show_category'] ) { ?>
        <div class="col-element-nft">
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
        <?php } ?>
        <?php if ( 'yes' === $settings['show_honarmand'] ) { ?>
            <div class="col-element-nft">
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
            <?php } ?>
            <?php if ( 'yes' === $settings['show_old'] ) { ?>
            <div class="col-element-nft">
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
            <?php } ?>
            <?php if ( 'yes' === $settings['show_year'] ) { ?>
            <div class="col-element-nft">
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
            <?php } ?>
            <?php if ( 'yes' === $settings['show_country'] ) { ?>
            <div class="col-element-nft">
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
            <?php } ?>
            <?php if ( 'yes' === $settings['show_guner'] ) { ?>
            <div class="col-element-nft">
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
            <?php } ?>
            <div class="col-element-button">
                <button type="submit" class="btn <?php echo $settings['round_buttom_style']; ?> <?php echo $settings['type_buttom_style']; ?>">
                    <?php if ( 'yes' === $settings['show_icon'] ) { ?>
                    <span class="icon-filter"><?php \Elementor\Icons_Manager::render_icon( $settings['icon'], [ 'aria-hidden' => 'true' ] ); ?></span>
                    <?php } ?>
                    <?php if ( 'yes' === $settings['show_text'] ) { ?>
                    <span class="text-filter"><?php echo $settings['widget_title']; ?></span>
                    <?php } ?>
                </button>
            </div>
      </div>
</form>


	<?php

  }
  protected function _content_template(){
  }
}
?>


