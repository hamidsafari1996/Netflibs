<?php

namespace WPC\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH')) exit; // Exit if accessed directly


class Product2 extends Widget_Base{
    public function __construct ($data = [], $args = null) {
		parent::__construct($data, $args);

		wp_register_script('product2_car', get_theme_file_uri('/widget/widgets/product2.js'), ['elementor-frontend'], '1.0.0', true);
	}

	public function get_script_depends () {
		return ['product2_car'];
	}
  public function get_name(){
    return 'product2';
  }

  public function get_title(){
    return 'اسلایدر فیلم2';
  }

  public function get_icon(){
    return 'eicon-media-carousel';
  }

  public function get_categories(){
    return ['tree-category'];
  }

  protected function _register_controls(){

    $this->start_controls_section(
        'section_modal_style',
        [
            'label' => __( 'تنظیمات دسته فیلم', 'elementor' ),
        ]
    );
    $this->add_control(
        'post_type',
        [
            'label' => __( 'انتخاب پست تایپ', 'plugin-domain' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'default' => 'coagex_movie',
            'options' => [
                'coagex_movie'  => __( 'فیلم و سریال', 'plugin-domain' ),
                'product' => __( 'ووکامرس', 'plugin-domain' ),
            ],
        ]
    );
    $this->add_control(
        'taxonomy',
        [
            'label' => __( 'بارگذاری بر اساس', 'plugin-domain' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'default' => 'movie_cat',
            'options' => [
                'movie_cat'  => __( ' دسته‌بندی', 'plugin-domain' ),
                'worldsub_tag' => __( 'برچسب', 'plugin-domain' ),
                'product_cat'  => __( 'دسته‌بندی ووکامرس', 'plugin-domain' ),
                'product_tag' => __( 'برچسب ووکامرس', 'plugin-domain' ),
                'honarmandan' => __( 'هنرمندان', 'plugin-domain' ),
                'ages' => __( 'سن', 'plugin-domain' ),
                'yaers' => __( 'سال ساخت', 'plugin-domain' ),
                'quality' => __( 'کیفیت', 'plugin-domain' ),
                'ganres' => __( 'ژانر', 'plugin-domain' ),
            ],
        ]
    );
    $this->add_control(
        'filter',
        [
            'label' => __( 'فیلتر بر اساس', 'plugin-domain' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'default' => 'title',
            'options' => [
                'title'  => __( 'عنوان', 'plugin-domain' ),
                'date' => __( 'تاریخ', 'plugin-domain' ),
                'rand' => __( 'تصادفی', 'plugin-domain' ),
                'count_comment' => __( 'تعداد نظرات', 'plugin-domain' ),
                'author' => __( 'نویسنده', 'plugin-domain' ),
                'ID' => __( 'آیدی پست', 'plugin-domain' ),
            ],
        ]
    );
    $this->add_control(
        'tartib',
        [
            'label' => __( 'ترتیب بر اساس', 'plugin-domain' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'default' => 'ASC',
            'options' => [
                'ASC'  => __( 'صعودی', 'plugin-domain' ),
                'DESC' => __( 'نزولی', 'plugin-domain' ),
            ],
        ]
    );
    $this->add_control(
        'button_name',
        [
          'label' => 'نامک دسته',
          'type' => \Elementor\Controls_Manager::TEXT,
        'description' => 'نامک دسته بندی مثلا: best'
        ]
    );
    $this->add_control(
        'price',
        [
            'label' => __( 'تعداد نمایش', 'plugin-domain' ),
            'type' => \Elementor\Controls_Manager::NUMBER,
            'min' => 5,
            'max' => 100,
            'step' => 1,
            'default' => 6,
        ]
    );
    $this->end_controls_section();
    $this->start_controls_section(
        'section_product_content',
        [
            'label' => __( 'محتوا', 'elementor' ),
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
            '{{WRAPPER}} .header-top-section' => 'text-align: {{VALUE}};',
          ],
        ]
    );
    $this->add_control(
        'content',
        [
          'label' => 'عنوان',
          'type' => \Elementor\Controls_Manager::TEXT,
          'default' => 'جدید ترینها'
        ]
    );
    
    $this->add_control(
        'icon',
        [
            'label' => __( 'Icon', 'text-domain' ),
            'type' => \Elementor\Controls_Manager::ICONS,
            'default' => [
                'value' => 'fas fa-star',
                'library' => 'solid',
            ],
        ]
    );
    $this->add_control(
        'content_botton',
        [
          'label' => 'متن دکمه',
          'type' => \Elementor\Controls_Manager::TEXT,
          'default' => 'دانلود'
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
        'box_style',
        [
            'label' => __( 'تنظیمات عمومی', 'elementor' ),
            'tab' => Controls_Manager::TAB_STYLE,
        ]
    );
    $this->add_group_control(
        \Elementor\Group_Control_Background::get_type(),
        [
            'name' => 'box_color',
            'label' => __( 'رنگ پس زمینه', 'plugin-domain' ),
            'types' => [ 'classic', 'gradient', 'video' ],
            'selector' => '{{WRAPPER}} .header-top-section',
        ]
    );
    $this->add_control(
        'border_section',
        [
            'label' => __( 'گوشه‌های مدور', 'elementor' ),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%' ],
            'selectors' => [
                '{{WRAPPER}} .header-top-section' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]
    );
    $this->end_controls_section();
    $this->start_controls_section(
        'section_style',
        [
            'label' => __( 'تنظیمات عنوان', 'elementor' ),
            'tab' => Controls_Manager::TAB_STYLE,
        ]
    );
    $this->add_control(
        'imdb_color',
        [
            'label' => __( 'رنگ عنوان', 'plugin-domain' ),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .title-top h3' => 'color: {{VALUE}}',
            ],
        ]
    );
    $this->add_group_control(
        \Elementor\Group_Control_Typography::get_type(),
        [
            'name' => 'imDb_typography',
            'label' => __( 'تایپوگرافی', 'plugin-domain' ),
            'selector' => '{{WRAPPER}} .title-top h3',
        ]
    );
    $this->add_control(
        'view_color',
        [
            'label' => __( 'رنگ آیکون', 'plugin-domain' ),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .title-top span svg' => 'color: {{VALUE}}',
            ],
        ]
    );
    $this->add_group_control(
        \Elementor\Group_Control_Typography::get_type(),
        [
            'name' => 'view_typography',
            'label' => __( 'تایپوگرافی', 'plugin-domain' ),
            'selector' => '{{WRAPPER}} .title-top span',
        ]
    );
    $this->end_controls_section();
    $this->start_controls_section(
        'section_style_content',
        [
            'label' => __( 'تنظیمات محتوا', 'elementor' ),
            'tab' => Controls_Manager::TAB_STYLE,
        ]
    );
    $this->add_control(
        'border_radius',
        [
            'label' => __( 'گوشه‌های مدور', 'elementor' ),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%' ],
            'selectors' => [
                '{{WRAPPER}} .header-top-section .item .filimo-info ' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]
    );
    $this->add_control(
        'color',
        [
            'label' => __( 'رنگ عنوان', 'plugin-domain' ),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .header-top-section .item .filimo-info h3 a, .header-top-section .item .filimo-info p .kafe' => 'color: {{VALUE}}',
            ],
        ]
    );
    $this->add_control(
        'hover',
        [
            'label' => __( 'هاور عنوان', 'plugin-domain' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .header-top-section .item .filimo-info h3 a:hover, .header-top-section .item .filimo-info p .kafe:hover' => 'color: {{VALUE}}',
            ],
        ]
    );
    $this->add_control(
        'color_cont',
        [
            'label' => __( 'رنگ متن', 'plugin-domain' ),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .header-top-section .item .filimo-info p.exeprt' => 'color: {{VALUE}}',
            ],
        ]
    );
    $this->add_control(
        'buttom_options',
        [
            'label' => __( 'تنظیمات دکمه', 'plugin-name' ),
            'type' => \Elementor\Controls_Manager::HEADING,
            'separator' => 'before',
        ]
    );
    $this->add_control(
        'border_radius_botton',
        [
            'label' => __( 'گوشه‌های مدور', 'elementor' ),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%' ],
            'selectors' => [
                '{{WRAPPER}} .header-top-section .item .filimo-info p a.badge' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]
    );
    $this->add_control(
        'padding_botton',
        [
            'label' => __( 'پدینگ', 'elementor' ),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%' ],
            'selectors' => [
                '{{WRAPPER}} .header-top-section .item .filimo-info p a.badge' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]
    );
    $this->add_control(
        'background_button',
        [
            'label' => __( 'رنگ دکمه', 'plugin-domain' ),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .header-top-section .item .filimo-info p a.badge' => 'background: {{VALUE}}',
            ],
        ]
    );
    $this->add_control(
        'hover_button',
        [
            'label' => __( 'هاور دکمه', 'plugin-domain' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .header-top-section .item .filimo-info p a.badge:hover, .elementor hr' => 'background: {{VALUE}}',
            ],
        ]
    );
    $this->add_control(
        'color_button',
        [
            'label' => __( 'رنگ متن دکمه', 'plugin-domain' ),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .header-top-section .item .filimo-info p a.badge' => 'color: {{VALUE}}',
            ],
        ]
    );
    $this->end_controls_section();
    $this->start_controls_section(
        'section_botton_style',
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
                '{{WRAPPER}} .header-top-section .film-boxfilm-container button.owl-next, .header-top-section .film-boxfilm-container button.owl-prev' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                '{{WRAPPER}} .header-top-section .film-boxfilm-container button.owl-next, .header-top-section .film-boxfilm-container button.owl-prev' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                '{{WRAPPER}} .header-top-section .film-boxfilm-container button.owl-next, .header-top-section .film-boxfilm-container button.owl-prev' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                '{{WRAPPER}} .header-top-section .film-boxfilm-container button.owl-next, .header-top-section .film-boxfilm-container button.owl-prev' => 'background: {{VALUE}}',
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
                '{{WRAPPER}} .header-top-section .film-boxfilm-container button.owl-next:hover, .header-top-section .film-boxfilm-container button.owl-prev:hover' => 'background: {{VALUE}}',
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
                '{{WRAPPER}} .header-top-section .film-boxfilm-container button.owl-next span, .header-top-section .film-boxfilm-container button.owl-prev span' => 'color: {{VALUE}}',
            ],
        ]
    );
    $this->add_control(
        'color_right_buttom_hover',
        [
            'label' => __( 'هاور دکه', 'plugin-domain' ),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .header-top-section .film-boxfilm-container button.owl-next span:hover, .header-top-section .film-boxfilm-container button.owl-prev span:hover' => 'color: {{VALUE}}',
            ],
        ]
    );
    $this->add_group_control(
        \Elementor\Group_Control_Box_Shadow::get_type(),
        [
            'name' => 'box_right_buttom',
            'label' => __( 'باکس شدوو', 'plugin-domain' ),
            'selector' => '{{WRAPPER}} .header-top-section .film-boxfilm-container button.owl-next, .header-top-section .film-boxfilm-container button.owl-prev',
        ]
    );
    $this->add_group_control(
        \Elementor\Group_Control_Typography::get_type(),
        [
            'name' => 'desc_typography',
            'label' => __( 'تایپوگرافی', 'plugin-domain' ),
            'selector' => '{{WRAPPER}} .header-top-section .film-boxfilm-container button.owl-next span, .header-top-section .film-boxfilm-container button.owl-prev span',
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
                '{{WRAPPER}} .header-top-section .film-boxfilm-container button.owl-next, .header-top-section .film-boxfilm-container button.owl-prev' => 'border-style: {{VALUE}}',
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
                '{{WRAPPER}} .header-top-section .film-boxfilm-container button.owl-next, .header-top-section .film-boxfilm-container button.owl-prev' => 'border-width: {{SIZE}}{{UNIT}};',
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
                '{{WRAPPER}} .header-top-section .film-boxfilm-container button.owl-next, .header-top-section .film-boxfilm-container button.owl-prev' => 'border-color: {{VALUE}}',
            ],
        ]
    );
    $this->add_control(
        'more_options',
        [
            'label' => __( 'تنظیمات دکمه سمت چپ', 'plugin-name' ),
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
                '{{WRAPPER}} .header-top-section .film-boxfilm-container button.owl-next' => 'top: {{SIZE}}{{UNIT}};',
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
                '{{WRAPPER}} .header-top-section .film-boxfilm-container button.owl-next' => 'right: {{SIZE}}{{UNIT}};',
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
                '{{WRAPPER}} .header-top-section .film-boxfilm-container button.owl-next' => 'bottom: {{SIZE}}{{UNIT}};',
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
                '{{WRAPPER}} .header-top-section .film-boxfilm-container button.owl-next' => 'left: {{SIZE}}{{UNIT}};',
            ],
        ]
    );
    /*----left-botton----*/
    $this->add_control(
        'more_options_left',
        [
            'label' => __( 'تنظیمات دکمه سمت راست', 'plugin-name' ),
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
                '{{WRAPPER}} .header-top-section .film-boxfilm-container button.owl-prev' => 'top: {{SIZE}}{{UNIT}};',
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
                '{{WRAPPER}} .header-top-section .film-boxfilm-container button.owl-prev' => 'right: {{SIZE}}{{UNIT}};',
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
                '{{WRAPPER}} .header-top-section .film-boxfilm-container button.owl-prev' => 'bottom: {{SIZE}}{{UNIT}};',
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
                '{{WRAPPER}} .header-top-section .film-boxfilm-container button.owl-prev' => 'left: {{SIZE}}{{UNIT}};',
            ],
        ]
    );
    $this->end_controls_section();
    $this->start_controls_section(
        'section_dots_style',
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
                '{{WRAPPER}} .film-boxfilm-container .owl-dots button.owl-dot' => 'display: {{UNIT}};',
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
                '{{WRAPPER}} .film-boxfilm-container .owl-dots button.active' => 'background: {{VALUE}} !important',
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
                '{{WRAPPER}} .film-boxfilm-container .owl-dots button.active' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
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
                '{{WRAPPER}} .film-boxfilm-container .owl-dots button.active' => 'width: {{SIZE}}{{UNIT}} !important;',
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
                '{{WRAPPER}} .film-boxfilm-container .owl-dots button.active' => 'height: {{SIZE}}{{UNIT}} !important;',
            ],
        ]
    );
    /**---------------------active-------------- */
    $this->add_control(
        'border_doct',
        [
            'label' => __( 'گوشه‌های مدور', 'elementor' ),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%' ],
            'selectors' => [
                '{{WRAPPER}} .film-boxfilm-container .owl-dots button.owl-dot' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                '{{WRAPPER}} .film-boxfilm-container .owl-dots button.owl-dot' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]
    );
    $this->add_control(
        'background_doct',
        [
            'label' => __( 'رنگ دکمه', 'plugin-domain' ),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .film-boxfilm-container .owl-dots button.owl-dot' => 'background: {{VALUE}}',
            ],
        ]
    );
    $this->add_responsive_control(
        'width_dots',
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
                '{{WRAPPER}} .film-boxfilm-container .owl-dots button.owl-dot' => 'width: {{SIZE}}{{UNIT}};',
            ],
        ]
    );
    $this->add_responsive_control(
        'height_dots',
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
                '{{WRAPPER}} .film-boxfilm-container .owl-dots button.owl-dot' => 'height: {{SIZE}}{{UNIT}};',
            ],
        ]
    );
    /*----left-botton----*/
    $this->add_control(
        'more_options_dots',
        [
            'label' => __( 'جایگاه دکمه‌های زیر', 'plugin-name' ),
            'type' => \Elementor\Controls_Manager::HEADING,
            'separator' => 'before',
        ]
    );
    
    $this->add_responsive_control(
        'top_left_dots',
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
                '{{WRAPPER}} .film-boxfilm-container .owl-dots' => 'top: {{SIZE}}{{UNIT}};',
            ],
        ]
    );
    $this->add_responsive_control(
        'right_left_dots',
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
                '{{WRAPPER}} .film-boxfilm-container .owl-dots' => 'right: {{SIZE}}{{UNIT}};',
            ],
        ]
    );
    $this->add_responsive_control(
        'bottom_left_dots',
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
                '{{WRAPPER}} .film-boxfilm-container .owl-dots' => 'bottom: {{SIZE}}{{UNIT}};',
            ],
        ]
    );
    $this->add_responsive_control(
        'left_left_dots',
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
                '{{WRAPPER}} .film-boxfilm-container .owl-dots' => 'left: {{SIZE}}{{UNIT}};',
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
    
        
    <div class="container-fluid">
       
        <div class="header-top-section shadow-sm mb-3 mt-2">
            
                <div class="title-top">
                    <span class="d-inline"><?php \Elementor\Icons_Manager::render_icon( $settings['icon'], [ 'aria-hidden' => 'true' ] ); ?></span>
                    <h3 class="d-inline"><?php echo $settings['content'] ?></h3>
                </div>
                <div class="film-boxfilm-container owl-carousel owl-theme" data-options='<?php echo(json_encode($config)); ?>'>
                    <?php
                    $post_type = $settings['post_type'];
                    $tax = $settings['button_name'];
                    $filter = $settings['filter'];
                    $soth = $settings['tartib'];
                    $number = $settings['price'];
                    $cat = $settings['taxonomy'];
                    $best_product = array(
                        'post_type' => $post_type,
                        'orderby' => $filter,
                        'order' => $soth,
                        'posts_per_page' => $number,
                        'tax_query' => array(
                            array(
                                'taxonomy' => $cat,
                                'field' => 'slug',
                                'terms' => $tax,
                            ),
                        ),
                    );
                    $show_best_product = new \WP_Query($best_product);
                    while($show_best_product->have_posts()) : $show_best_product->the_post();
                    
                    ?>
                    <div class="item mt-3 top-new">
                        <div class="filimo-info portfolio-width right-pos mb-3 shadow-around">
                        <img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
                        <div class="filimo-overlay"></div>
                        <div class="filimo-overlay-text world-sub text-center text-white">
                            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                            <p class="exeprt"><?php echo get_the_excerpt(); ?></p>
                            <p><span class="kafe"><?php the_terms(get_the_ID(),"quality"); ?></span></p>
                            <hr>
                            <p><a href="<?php the_permalink(); ?>" class="badge badge-pill badge-primary mt-3"><?php echo $settings['content_botton'] ?></a></p>
                        </div>
                        </div>
                    </div>
                    <?php endwhile; wp_reset_postdata(); ?>
                </div>
            
        </div>
    </div>

    <?php
  }

  protected function _content_template(){
    
  }
}