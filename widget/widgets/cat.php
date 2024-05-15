<?php

namespace WPC\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH')) exit; // Exit if accessed directly


class Cat extends Widget_Base{


    public function __construct ($data = [], $args = null) {
		parent::__construct($data, $args);

		wp_register_script('category', get_theme_file_uri('/widget/widgets/cat.js'), ['elementor-frontend'], '1.0.0', true);
	}

	public function get_script_depends () {
		return ['category'];
	}

  public function get_name(){
    return 'cat';
  }

  public function get_title(){
    return 'دسته‌بندی';
  }

  public function get_icon(){
    return 'eicon-sitemap';
  }

  public function get_categories(){
    return ['tree-category'];
  }

  protected function _register_controls(){
    $this->start_controls_section(
        'section_modal_content',
        [
            'label' => __( 'تنظیمات محتوا', 'elementor' ),
        ]
    );
    $repeater = new \Elementor\Repeater();

    $repeater->add_control(
        'list_title', [
            'label' => __( 'Title', 'plugin-domain' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => __( 'List Title' , 'plugin-domain' ),
            'label_block' => true,
        ]
    );
    $repeater->add_control(
        'website_link',
        [
            'label' => __( 'لینک', 'plugin-domain' ),
            'type' => \Elementor\Controls_Manager::URL,
            'placeholder' => __( 'https://your-link.com', 'plugin-domain' ),
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
                    'list_title' => __( 'عنوان #1', 'plugin-domain' ),
                    'website_link' => __( '', 'plugin-domain' ),
                ],
                [
                    'list_title' => __( 'عنوان #2', 'plugin-domain' ),
                    'website_link' => __( '', 'plugin-domain' ),
                ],
            ],
            'title_field' => '{{{ list_title }}}',
        ]
    );
    $this->end_controls_section();
    $this->start_controls_section(
        'section_option_pro',
        [
            'label' => __( 'تنظیمات', 'elementor' ),
        ]
    );
    $this->add_control(
        'show_arrow',
        [
            'label' => __( 'نمایش دکمه‌های کنار در دسکتاپ', 'plugin-domain' ),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'label_on' => __( 'Show', 'your-plugin' ),
            'label_off' => __( 'Hide', 'your-plugin' ),
            'return_value' => 'yes',
            'default' => 'yes',
        ]
    );
    $this->add_control(
        'show_arrow_tablet',
        [
            'label' => __( 'نمایش دکمه‌های کنار در تبلت', 'plugin-domain' ),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'label_on' => __( 'Show', 'your-plugin' ),
            'label_off' => __( 'Hide', 'your-plugin' ),
            'return_value' => 'yes',
            'default' => 'yes',
        ]
    );
    $this->add_control(
        'show_arrow_phone',
        [
            'label' => __( 'نمایش دکمه‌های کنار در موبایل', 'plugin-domain' ),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'label_on' => __( 'Show', 'your-plugin' ),
            'label_off' => __( 'Hide', 'your-plugin' ),
            'return_value' => 'yes',
            'default' => 'yes',
        ]
    );
    $this->add_control(
        'show_dots',
        [
            'label' => __( 'نمایش دکمه‌های زیر در دسکتاپ', 'plugin-domain' ),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'label_on' => __( 'Show', 'your-plugin' ),
            'label_off' => __( 'Hide', 'your-plugin' ),
            'return_value' => 'yes',
            'default' => 'yes',
        ]
    );
    $this->add_control(
        'show_dots_tablet',
        [
            'label' => __( 'نمایش دکمه‌های زیر در تبلت', 'plugin-domain' ),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'label_on' => __( 'Show', 'your-plugin' ),
            'label_off' => __( 'Hide', 'your-plugin' ),
            'return_value' => 'yes',
            'default' => 'yes',
        ]
    );
    $this->add_control(
        'show_dots_phone',
        [
            'label' => __( 'نمایش دکمه‌های زیر در موبایل', 'plugin-domain' ),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'label_on' => __( 'Show', 'your-plugin' ),
            'label_off' => __( 'Hide', 'your-plugin' ),
            'return_value' => 'yes',
            'default' => 'yes',
        ]
    );
    $this->add_control(
        'show_center',
        [
            'label' => __( 'نمایش وسط', 'plugin-domain' ),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'label_on' => __( 'Show', 'your-plugin' ),
            'label_off' => __( 'Hide', 'your-plugin' ),
            'return_value' => 'yes',
            'default' => 'yes',
        ]
    );
    $this->add_control('widget_post_num_th', [
        'label'   => 'تعداد نمایش آیتم در(دسکتاپ)',
        'type'    => \Elementor\Controls_Manager::SELECT,
        'default' => '4',
        'options' => [
            '3' => '3',
            '4' => '4',
            '5' => '5',
            '6' => '6',
            '7' => '7',
            '8' => '8',
            '9' => '9',

        ],
    ]);


    $this->add_control('widget_post_num_th_t', [
        'label'   => 'تعداد نمایش آیتم در(تبلت)',
        'type'    => \Elementor\Controls_Manager::SELECT,
        'default' => '2',
        'options' => [
            '1' => '1',
            '2' => '2',
            '3' => '3',

        ],
    ]);

    $this->add_control('widget_post_num_th_m', [
        'label'   => 'تعداد نمایش آیتم در(موبایل)',
        'type'    => \Elementor\Controls_Manager::SELECT,
        'default' => '1',
        'options' => [
            '1' => '1',
            '2' => '2',
            '3' => '3',

        ],
    ]);


    $this->add_control('loop-car-slider', [
        'label'   => 'حالت بی نهایت',
        'type'    => \Elementor\Controls_Manager::SWITCHER,
        'default' => 'yes',

    ]);

    $this->add_control('autoplay-car-slider', [
        'label'   => 'پخش خودکار',
        'type'    => \Elementor\Controls_Manager::SWITCHER,
        'default' => 'yes',

    ]);


    $this->end_controls_section();
    $this->start_controls_section(
        'section_modal_style',
        [
            'label' => __( 'تنظیمات عمومی', 'elementor' ),
            'tab' => Controls_Manager::TAB_STYLE,
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
        'border_imDB',
        [
            'label' => __( 'گوشه‌های مدور', 'elementor' ),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%' ],
            'selectors' => [
                '{{WRAPPER}} .web-cat-section a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]
    );
    $this->add_control(
		'title_color',
		[
			'label' => __( 'رنگ متن', 'plugin-domain' ),
			'type' => Controls_Manager::COLOR,
			'default' => '',
			'selectors' => [
				'{{WRAPPER}} .web-cat-section a' => 'color: {{VALUE}}',
			],
		]
	);
    $this->add_control(
        'hover_title',
        [
            'label' => __( 'هاور متن', 'plugin-domain' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .web-cat-section a:hover' => 'color: {{VALUE}}',
            ],
        ]
    );
    $this->add_group_control(
        \Elementor\Group_Control_Typography::get_type(),
        [
            'name' => 'title_typography',
            'label' => __( 'تایپوگرافی', 'plugin-domain' ),
            'selector' => '{{WRAPPER}} .web-cat-section a',
        ]
    );
    $this->add_control(
		'botton_color',
		[
			'label' => __( 'رنگ دکمه', 'plugin-domain' ),
			'type' => Controls_Manager::COLOR,
			'default' => '',
			'selectors' => [
				'{{WRAPPER}} .web-cat-section a' => 'background: {{VALUE}}',
			],
		]
	);

    $this->add_control(
        'hover_color',
        [
            'label' => __( 'هاور دکمه', 'plugin-domain' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .web-cat-section a:hover' => 'background: {{VALUE}}',
            ],
        ]
    );
    
    $this->add_group_control(
        \Elementor\Group_Control_Box_Shadow::get_type(),
        [
            'name' => 'box_shadow',
            'label' => __( 'باکس شدوو', 'plugin-domain' ),
            'selector' => '{{WRAPPER}} .web-cat-section a:focus',
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
                '{{WRAPPER}} .web-cat-section a' => 'border-style: {{VALUE}}',
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
                '{{WRAPPER}} .web-cat-section a' => 'border-width: {{SIZE}}{{UNIT}};',
            ],
        ]
    );
    $this->add_control(
		'border_color',
		[
			'label' => __( 'رنگ بردر', 'plugin-domain' ),
			'type' => Controls_Manager::COLOR,
			'default' => '',
			'selectors' => [
				'{{WRAPPER}} .web-cat-section a' => 'border-color: {{VALUE}}',
			],
		]
	);
    $this->add_control(
        'hover_border',
        [
            'label' => __( 'هاور بردر', 'plugin-domain' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .web-cat-section a:hover' => 'border-color: {{VALUE}}',
            ],
        ]
    );
    $this->end_controls_section();
    $this->start_controls_section(
        'section_button_style',
        [
            'label' => __( 'تنظیمات دکمه‌های کنار', 'elementor' ),
            'tab' => Controls_Manager::TAB_STYLE,
        ]
    );
    $this->add_control(
        'padding_right_buttom',
        [
            'label' => __( 'پدینگ', 'elementor' ),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%' ],
            'selectors' => [
                '{{WRAPPER}} .web-cat-section .cate-crousel .owl-next, .web-cat-section .cate-crousel .owl-prev' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]
    );
    $this->add_control(
        'margin_right_buttom',
        [
            'label' => __( 'فاصله', 'elementor' ),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%' ],
            'selectors' => [
                '{{WRAPPER}} .web-cat-section .cate-crousel .owl-next, .web-cat-section .cate-crousel .owl-prev' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]
    );
    $this->add_control(
        'border_right_buttom',
        [
            'label' => __( 'گوشه‌های مدور', 'elementor' ),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%' ],
            'selectors' => [
                '{{WRAPPER}} .web-cat-section .cate-crousel .owl-next, .web-cat-section .cate-crousel .owl-prev' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]
    );
    $this->add_control(
        'background_right_buttom',
        [
            'label' => __( 'رنگ پس زمینه', 'plugin-domain' ),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .web-cat-section .cate-crousel .owl-next, .web-cat-section .cate-crousel .owl-prev' => 'background: {{VALUE}}',
            ],
        ]
    );
    $this->add_control(
        'background_right_buttom_hover',
        [
            'label' => __( 'هاور پس زمینه', 'plugin-domain' ),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .web-cat-section .cate-crousel .owl-next:hover, .web-cat-section .cate-crousel .owl-prev:hover' => 'background: {{VALUE}}',
            ],
        ]
    );
    $this->add_control(
        'color_right_buttom',
        [
            'label' => __( 'رنگ دکمه', 'plugin-domain' ),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .web-cat-section .cate-crousel .owl-next span, .web-cat-section .cate-crousel .owl-prev span' => 'color: {{VALUE}}',
            ],
        ]
    );
    $this->add_control(
        'color_right_buttom_hover',
        [
            'label' => __( 'هاور دکمه', 'plugin-domain' ),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .web-cat-section .cate-crousel .owl-next span:hover, .web-cat-section .cate-crousel .owl-prev span:hover' => 'color: {{VALUE}}',
            ],
        ]
    );
    $this->add_group_control(
        \Elementor\Group_Control_Box_Shadow::get_type(),
        [
            'name' => 'box_right_buttom',
            'label' => __( 'باکس شدوو', 'plugin-domain' ),
            'selector' => '{{WRAPPER}} .web-cat-section .cate-crousel .owl-next, .web-cat-section .cate-crousel .owl-prev',
        ]
    );
    $this->add_group_control(
        \Elementor\Group_Control_Typography::get_type(),
        [
            'name' => 'desc_typography',
            'label' => __( 'تایپوگرافی', 'plugin-domain' ),
            'selector' => '{{WRAPPER}} .web-cat-section .cate-crousel .owl-next span, .web-cat-section .cate-crousel .owl-prev span',
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
        'border_style_button',
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
                '{{WRAPPER}} .web-cat-section .cate-crousel .owl-next, .web-cat-section .cate-crousel .owl-prev' => 'border-style: {{VALUE}}',
            ],
        ]
    );
    $this->add_responsive_control(
        'width_border_button',
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
                '{{WRAPPER}} .web-cat-section .cate-crousel .owl-next, .web-cat-section .cate-crousel .owl-prev' => 'border-width: {{SIZE}}{{UNIT}};',
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
                '{{WRAPPER}} .web-cat-section .cate-crousel .owl-next, .web-cat-section .cate-crousel .owl-prev' => 'border-color: {{VALUE}}',
            ],
        ]
    );
    $this->add_control(
        'more_options_right',
        [
            'label' => __( 'تنظیمات دکمه سمت راست', 'plugin-name' ),
            'type' => \Elementor\Controls_Manager::HEADING,
            'separator' => 'before',
        ]
    );
    $this->add_responsive_control(
        'top_right',
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
                '{{WRAPPER}} .web-cat-section .cate-crousel .owl-prev' => 'top: {{SIZE}}{{UNIT}};',
            ],
        ]
    );
    $this->add_responsive_control(
        'right_right',
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
                '{{WRAPPER}} .web-cat-section .cate-crousel .owl-prev' => 'right: {{SIZE}}{{UNIT}};',
            ],
        ]
    );
    $this->add_responsive_control(
        'bottom_right',
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
                '{{WRAPPER}} .web-cat-section .cate-crousel .owl-prev' => 'bottom: {{SIZE}}{{UNIT}};',
            ],
        ]
    );
    $this->add_responsive_control(
        'left_right',
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
                '{{WRAPPER}} .web-cat-section .cate-crousel .owl-prev' => 'left: {{SIZE}}{{UNIT}};',
            ],
        ]
    );
    /*----left-botton----*/
    $this->add_control(
        'more_options_left',
        [
            'label' => __( 'تنظیمات دکمه سمت چپ', 'plugin-name' ),
            'type' => \Elementor\Controls_Manager::HEADING,
            'separator' => 'before',
        ]
    );
    $this->add_responsive_control(
        'top_left',
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
                '{{WRAPPER}} .web-cat-section .cate-crousel .owl-next' => 'top: {{SIZE}}{{UNIT}};',
            ],
        ]
    );
    $this->add_responsive_control(
        'right_left',
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
                '{{WRAPPER}} .web-cat-section .cate-crousel .owl-next' => 'right: {{SIZE}}{{UNIT}};',
            ],
        ]
    );
    $this->add_responsive_control(
        'bottom_left',
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
                '{{WRAPPER}} .web-cat-section .cate-crousel .owl-next' => 'bottom: {{SIZE}}{{UNIT}};',
            ],
        ]
    );
    $this->add_responsive_control(
        'left_left',
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
                '{{WRAPPER}} .web-cat-section .cate-crousel .owl-next' => 'left: {{SIZE}}{{UNIT}};',
            ],
        ]
    );
    $this->end_controls_section();
    $this->start_controls_section(
        'section_dots_category',
        [
            'label' => __( 'تنظیمات دکمه‌های زیر', 'elementor' ),
            'tab' => Controls_Manager::TAB_STYLE,
        ]
    );
    $this->add_control(
        'display_ib',
        [
            'label' => __( 'سبک نمایش', 'plugin-domain' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'default' => 'inline',
            'options' => [
                'inline'  => __( 'افقی', 'plugin-domain' ),
                'block' => __( 'عمودی', 'plugin-domain' ),
            ],
            'selectors' => [
                '{{WRAPPER}} .cate-crousel .owl-dots button.owl-dot' => 'display: {{UNIT}};',
            ],
        ]
    );
    $this->add_control(
        'bg_button_active',
        [
            'label' => __( 'رنگ دکمه فعال', 'plugin-domain' ),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .cate-crousel .owl-dots button.active' => 'background: {{VALUE}} !important',
            ],
        ]
    );
    $this->add_control(
        'border_doct_active',
        [
            'label' => __( 'گوشه‌های مدور دکمه فعال', 'elementor' ),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%' ],
            'selectors' => [
                '{{WRAPPER}} .cate-crousel .owl-dots button.active' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
            ],
        ]
    );
    $this->add_responsive_control(
        'width_dots_active',
        [
            'label' => __( 'عرض دکمه فعال', 'elementor' ),
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
                '{{WRAPPER}} .cate-crousel .owl-dots .active' => 'width: {{SIZE}}{{UNIT}} !important;',
            ],
        ]
    );
    $this->add_responsive_control(
        'height_dots_active',
        [
            'label' => __( 'ارتفاع دکمه فعال', 'elementor' ),
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
                '{{WRAPPER}} .cate-crousel .owl-dots .active' => 'height: {{SIZE}}{{UNIT}} !important;',
            ],
        ]
    );
    /**---------------------active-------------- */
    $this->add_control(
        'border_doct_category',
        [
            'label' => __( 'گوشه‌های مدور', 'elementor' ),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%' ],
            'selectors' => [
                '{{WRAPPER}} .cate-crousel .owl-dots .owl-dot' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]
    );
    $this->add_control(
        'margin_doct',
        [
            'label' => __( 'فاصله', 'elementor' ),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%' ],
            'selectors' => [
                '{{WRAPPER}} .cate-crousel .owl-dots .owl-dot' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]
    );
    $this->add_control(
        'background_doct_category',
        [
            'label' => __( 'رنگ دکمه', 'plugin-domain' ),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .cate-crousel .owl-dots .owl-dot' => 'background: {{VALUE}}',
            ],
        ]
    );
    $this->add_responsive_control(
        'width_dots_category',
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
                '{{WRAPPER}} .cate-crousel .owl-dots .owl-dot' => 'width: {{SIZE}}{{UNIT}};',
            ],
        ]
    );
    $this->add_responsive_control(
        'height_dots_category',
        [
            'label' => __( 'ارتفاع', 'elementor' ),
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
                '{{WRAPPER}} .cate-crousel .owl-dots .owl-dot' => 'height: {{SIZE}}{{UNIT}};',
            ],
        ]
    );
    /*----left-botton----*/
    $this->add_control(
        'more_options_dots_category',
        [
            'label' => __( 'جایگاه دکمه‌های زیر', 'plugin-name' ),
            'type' => \Elementor\Controls_Manager::HEADING,
            'separator' => 'before',
        ]
    );
    
    $this->add_responsive_control(
        'top_left_dots_category',
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
                '{{WRAPPER}} .cate-crousel .owl-dots' => 'top: {{SIZE}}{{UNIT}};',
            ],
        ]
    );
    $this->add_responsive_control(
        'right_left_dots_category',
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
                '{{WRAPPER}} .cate-crousel .owl-dots' => 'right: {{SIZE}}{{UNIT}};',
            ],
        ]
    );
    $this->add_responsive_control(
        'bottom_left_dots_category',
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
                '{{WRAPPER}} .cate-crousel .owl-dots' => 'bottom: {{SIZE}}{{UNIT}};',
            ],
        ]
    );
    $this->add_responsive_control(
        'left_left_dots_category',
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
                '{{WRAPPER}} .cate-crousel .owl-dots' => 'left: {{SIZE}}{{UNIT}};',
            ],
        ]
    );
    $this->end_controls_section();
  }
  

  protected function render(){
    $settings = $this->get_settings_for_display();
    if ( isset($settings['loop-car-slider']) && $settings['loop-car-slider'] === 'yes' ) {
        $loop = true;
    } else {
        $loop = false;
    };
    if ( isset($settings['show_arrow']) && $settings['show_arrow'] === 'yes' ) {
        $arrow = true;
    } else {
        $arrow = false;
    };
    if ( isset($settings['show_arrow_tablet']) && $settings['show_arrow_tablet'] === 'yes' ) {
        $arrow_tablet = true;
    } else {
        $arrow_tablet = false;
    };
    if ( isset($settings['show_arrow_phone']) && $settings['show_arrow_phone'] === 'yes' ) {
        $arrow_phone = true;
    } else {
        $arrow_phone = false;
    };
    if ( isset($settings['show_dots']) && $settings['show_dots'] === 'yes' ) {
        $docts = true;
    } else {
        $docts = false;
    };
    if ( isset($settings['show_dots_tablet']) && $settings['show_dots_tablet'] === 'yes' ) {
        $docts_tablet = true;
    } else {
        $docts_tablet = false;
    };
    if ( isset($settings['show_dots_phone']) && $settings['show_dots_phone'] === 'yes' ) {
        $docts_phone = true;
    } else {
        $docts_phone = false;
    };
    if ( isset($settings['show_center']) && $settings['show_center'] === 'yes' ) {
        $center = true;
    } else {
        $center = false;
    };
    if ( isset($settings['autoplay-car-slider']) && $settings['autoplay-car-slider'] === 'yes' ) {
        $autoplay = true;
    } else {
        $autoplay = false;
    }
    if ( isset($settings['widget_post_num_th']) ) {
        $widget_post_num = $settings['widget_post_num_th'];
    } else {
        $widget_post_num = 4;
    }
    if ( isset($settings['widget_post_num_th_t']) ) {
        $widget_post_num_t = $settings['widget_post_num_th_t'];
    } else {
        $widget_post_num_t = 4;
    }

    if ( isset($settings['widget_post_num_th_m']) ) {
        $widget_post_num_m = $settings['widget_post_num_th_m'];
    } else {
        $widget_post_num_m = 4;
    }
    
    $config = [
        'autoplay'           => $autoplay,
        'loop'               => $loop,
        'arrow'               => $arrow,
        'arrow_tablet'        => $arrow_tablet,
        'arrow_phone'        => $arrow_phone,
        'docts'               => $docts,
        'docts_tablet'        => $docts_tablet,
        'docts_phone'         => $docts_phone,
        'center'               => $center,
        'widgetPostNum'      => $widget_post_num,
        'widgetPostNum_t'      => $widget_post_num_t,
        'widgetPostNum_m'      => $widget_post_num_m,
    ];
    ?>
    
    
    <div class="web-cat-section">
        <div class="container-fluid">
            
                <div class="col-lg-12 col-md-12 col-12">
                    <div class="cate-crousel owl-carousel owl-theme" data-options='<?php echo(json_encode($config)); ?>'>
                    <?php if ( $settings['list'] ) { foreach (  $settings['list'] as $item ) {     $target = $item['website_link']['is_external'] ? ' target="_blank"' : ''; $nofollow = $item['website_link']['nofollow'] ? ' rel="nofollow"' : ''; ?>
                        <div class="movie-cat-section item">
                            <a class="btn <?php echo $settings['type_buttom_style']; ?> <?php echo $settings['round_buttom_style']; ?>" href="<?php echo $item['website_link']['url'] ?>" <?php echo $target; ?> <?php echo $nofollow; ?> role="button"><?php echo $item['list_title']; ?></a>
                        </div>
                        <?php
                            }
                        } ?>
                    </div>
                </div>
        </div>
        
    </div>
    <div class="clearfix"></div>
    

    <?php
  }

  protected function _content_template(){

  }
}