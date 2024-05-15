<?php

namespace WPC\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH')) exit; // Exit if accessed directly


class Portfolionet extends Widget_Base{

  public function get_name(){
    return 'portfolionet';
  }

  public function get_title(){
    return 'پرتفولیو فیلم';
  }

  public function get_icon(){
    return 'eicon-gallery-grid';
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
                'movie_cat'  => __( 'دسته‌بندی', 'plugin-domain' ),
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
            'min' => 0,
            'max' => 100,
            'step' => 1,
            'default' => 5,
        ]
    );
    $this->add_control(
        'show_cardfilm',
        [
            'label' => __( 'عرض کارد فیلم', 'plugin-domain' ),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'label_on' => __( 'Show', 'your-plugin' ),
            'label_off' => __( 'Hide', 'your-plugin' ),
            'return_value' => 'yes',
            'default' => 'yes',
        ]
    );
    $this->add_responsive_control(
        'width_cardfilm',
        [
            'label' => __( 'عرض کارد فیلم', 'elementor' ),
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
                '{{WRAPPER}} .filim .cardfilm' => 'max-width: {{SIZE}}{{UNIT}};',
            ],
        ]
    );
    $this->add_responsive_control(
        'flex_cardfilm',
        [
            'label' => __( 'فلکس عرض کارد فیلم', 'elementor' ),
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
                '{{WRAPPER}} .filim .cardfilm' => 'flex: 0 0 {{SIZE}}{{UNIT}};',
            ],
        ]
    );
    $this->add_control(
        'show_overly',
        [
            'label' => __( 'نمایش جزئیات فیلم', 'plugin-domain' ),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'label_on' => __( 'Show', 'your-plugin' ),
            'label_off' => __( 'Hide', 'your-plugin' ),
            'return_value' => 'yes',
            'default' => 'yes',
        ]
    );
    $this->add_control(
        'show_imdb',
        [
            'label' => __( 'نمایش امتیاز', 'plugin-domain' ),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'label_on' => __( 'Show', 'your-plugin' ),
            'label_off' => __( 'Hide', 'your-plugin' ),
            'return_value' => 'yes',
            'default' => 'yes',
        ]
    );
    $this->add_control(
        'show_title',
        [
            'label' => __( 'نمایش عنوان', 'plugin-domain' ),
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
            'label' => __( 'نمایش دسته بندی', 'plugin-domain' ),
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
            'label' => __( 'نمایش سال ساخت', 'plugin-domain' ),
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
            'label' => __( 'نمایش آیکون به جای محتوا', 'plugin-domain' ),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'label_on' => __( 'Show', 'your-plugin' ),
            'label_off' => __( 'Hide', 'your-plugin' ),
            'return_value' => 'yes',
            'default' => 'yes',
        ]
    );
    $this->add_control(
        'icon_overly',
        [
            'label' => __( 'Icon', 'text-domain' ),
            'type' => \Elementor\Controls_Manager::ICONS,
            'default' => [
                'value' => 'fas fa-play',
                'library' => 'solid',
            ],
        ]
    );
    $this->end_controls_section();
    $this->start_controls_section(
        'section_product_content',
        [
            'label' => __( 'محتوا', 'elementor' ),
        ]
    );
    $this->add_control(
        'show_product_content',
        [
            'label' => __( 'نمایش', 'plugin-domain' ),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'label_on' => __( 'Show', 'your-plugin' ),
            'label_off' => __( 'Hide', 'your-plugin' ),
            'return_value' => 'yes',
            'default' => 'yes',
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
        'content_botton',
        [
          'label' => 'متن دکمه',
          'type' => \Elementor\Controls_Manager::TEXT,
          'default' => 'مشاهده همه'
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
		'url_ads',
		[
		  'label' => 'لینک',
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
    $this->add_responsive_control(
        'width',
        [
            'label' => __( 'فاصله بین آیکون و عنوان', 'elementor' ),
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
                '{{WRAPPER}} .espical-header a .margin-icon' => 'margin-left: {{SIZE}}{{UNIT}};',
            ],
        ]
    );
    $this->end_controls_section();
    $this->start_controls_section(
        'section_style',
        [
            'label' => __( 'تنظیمات هدر', 'elementor' ),
            'tab' => Controls_Manager::TAB_STYLE,
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
                '{{WRAPPER}} .espical-header' => 'max-width: {{SIZE}}{{UNIT}};',
            ],
        ]
    );
    $this->add_control(
        'padding_header',
        [
            'label' => __( 'پدینگ', 'elementor' ),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%' ],
            'selectors' => [
                '{{WRAPPER}} .espical-header' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
            ],
        ]
    );
    $this->add_control(
        'margin_header',
        [
            'label' => __( 'فاصله', 'elementor' ),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%' ],
            'selectors' => [
                '{{WRAPPER}} .espical-header' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
            ],
        ]
    );
    $this->add_control(
        'border_header',
        [
            'label' => __( 'گوشه‌های مدور', 'elementor' ),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%' ],
            'selectors' => [
                '{{WRAPPER}} .espical-header' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
            ],
        ]
    );
    $this->add_control(
        'bg_header',
        [
            'label' => __( 'رنگ پس زمینه', 'plugin-domain' ),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .espical-header' => 'background: {{VALUE}}',
            ],
        ]
      );
    $this->add_control(
        'title_options',
        [
            'label' => __( 'تنظیمات عنوان', 'plugin-name' ),
            'type' => \Elementor\Controls_Manager::HEADING,
            'separator' => 'before',
        ]
    );
    $this->add_control(
        'imdb_color',
        [
            'label' => __( 'رنگ عنوان', 'plugin-domain' ),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .espical-header h3' => 'color: {{VALUE}}',
            ],
        ]
    );
    $this->add_control(
        'hover_titr',
        [
            'label' => __( 'هاور عنوان', 'plugin-domain' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .espical-header h3:hover' => 'color: {{VALUE}}',
            ],
        ]
    );
    $this->add_group_control(
        \Elementor\Group_Control_Typography::get_type(),
        [
            'name' => 'imDb_typography',
            'label' => __( 'تایپوگرافی', 'plugin-domain' ),
            'selector' => '{{WRAPPER}} .espical-header h3',
        ]
    );
    $this->add_control(
        'more_options',
        [
            'label' => __( 'تنظیمات دکمه', 'plugin-name' ),
            'type' => \Elementor\Controls_Manager::HEADING,
            'separator' => 'before',
        ]
    );
    $this->add_control(
        'padding',
        [
            'label' => __( 'پدینگ', 'elementor' ),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%' ],
            'selectors' => [
                '{{WRAPPER}} .espical-header a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
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
                '{{WRAPPER}} .espical-header a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
            ],
        ]
    );
    $this->add_control(
        'bg_button',
        [
            'label' => __( 'رنگ دکمه', 'plugin-domain' ),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .espical-header a' => 'background: {{VALUE}}',
            ],
        ]
    );
    $this->add_control(
        'cl_button',
        [
            'label' => __( 'رنگ متن', 'plugin-domain' ),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .espical-header a' => 'color: {{VALUE}}',
            ],
        ]
    );
    $this->add_control(
        'clh_button',
        [
            'label' => __( 'هاور متن دکمه', 'plugin-domain' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .espical-header a:hover' => 'color: {{VALUE}}',
            ],
        ]
    );
    $this->add_control(
        'bgh_button',
        [
            'label' => __( 'هاور دکمه', 'plugin-domain' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .espical-header a:hover' => 'background: {{VALUE}}',
            ],
        ]
    );
    $this->add_group_control(
        \Elementor\Group_Control_Typography::get_type(),
        [
            'name' => 'button_typography',
            'label' => __( 'تایپوگرافی', 'plugin-domain' ),
            'selector' => '{{WRAPPER}} .espical-header a',
        ]
    );
    $this->end_controls_section();
    $this->start_controls_section(
        'section_content_style',
        [
            'label' => __( 'تنظیمات محتوا', 'elementor' ),
            'tab' => Controls_Manager::TAB_STYLE,
        ]
    );
    $this->add_control(
        'border_portfolio',
        [
            'label' => __( 'گوشه‌های مدور تصویر', 'elementor' ),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%' ],
            'selectors' => [
                '{{WRAPPER}} .portfolio-info img, .portfolio-info .portfolio-overlay' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
            ],
        ]
    );
    
    $this->add_control(
        'imdb_options',
        [
            'label' => __( 'تنظیمات امتیاز', 'plugin-name' ),
            'type' => \Elementor\Controls_Manager::HEADING,
            'separator' => 'before',
        ]
    );
    $this->add_control(
        'imbd_portfolio',
        [
            'label' => __( 'پدینگ', 'elementor' ),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%' ],
            'selectors' => [
                '{{WRAPPER}} .portfolio-info p span.imbd' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
            ],
        ]
    );
    
    $this->add_control(
        'bgh_imbd',
        [
            'label' => __( 'رنگ پس زمینه', 'plugin-domain' ),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .portfolio-info p span.imbd' => 'background: {{VALUE}}',
            ],
        ]
    );
    $this->add_control(
        'clm_imbd',
        [
            'label' => __( 'رنگ امتیاز', 'plugin-domain' ),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .portfolio-info p span.imbd' => 'color: {{VALUE}}',
            ],
        ]
    );
    $this->add_control(
        'radius_imdb',
        [
            'label' => __( 'گوشه‌های مدور', 'elementor' ),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%' ],
            'selectors' => [
                '{{WRAPPER}} .portfolio-info p span.imbd' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
            ],
        ]
    );
    $this->add_control(
        'title_options',
        [
            'label' => __( 'تنظیمات عنوان', 'plugin-name' ),
            'type' => \Elementor\Controls_Manager::HEADING,
            'separator' => 'before',
        ]
    );
    $this->add_control(
        'movie_title',
        [
            'label' => __( 'رنگ عنوان', 'plugin-domain' ),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .portfolio-info h3 a' => 'color: {{VALUE}}',
            ],
        ]
    );
    $this->add_group_control(
        \Elementor\Group_Control_Typography::get_type(),
        [
            'name' => 'title_typography',
            'label' => __( 'تایپوگرافی عنوان', 'plugin-domain' ),
            'selector' => '{{WRAPPER}} .portfolio-info h3 a',
        ]
    );
    $this->add_control(
        'juner_options',
        [
            'label' => __( 'تنظیمات ژانر', 'plugin-name' ),
            'type' => \Elementor\Controls_Manager::HEADING,
            'separator' => 'before',
        ]
    );
    $this->add_control(
        'movie_junre',
        [
            'label' => __( 'رنگ ژانر فیلم', 'plugin-domain' ),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .portfolio-info p .junre a' => 'color: {{VALUE}}',
            ],
        ]
    );
    $this->add_group_control(
        \Elementor\Group_Control_Typography::get_type(),
        [
            'name' => 'junre_typography',
            'label' => __( 'تایپوگرافی ژانر', 'plugin-domain' ),
            'selector' => '{{WRAPPER}} .portfolio-info p .junre a',
        ]
    );
    $this->add_control(
        'year_options',
        [
            'label' => __( 'تنظیمات سال', 'plugin-name' ),
            'type' => \Elementor\Controls_Manager::HEADING,
            'separator' => 'before',
        ]
    );
    $this->add_control(
        'movie_year',
        [
            'label' => __( 'رنگ سال', 'plugin-domain' ),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .portfolio-info .year' => 'color: {{VALUE}}',
            ],
        ]
    );
    $this->add_group_control(
        \Elementor\Group_Control_Typography::get_type(),
        [
            'name' => 'year_typography',
            'label' => __( 'تایپوگرافی سال', 'plugin-domain' ),
            'selector' => '{{WRAPPER}} .portfolio-info .year',
        ]
    );
    $this->end_controls_section();
    $this->start_controls_section(
        'section_hoverimg_style',
        [
            'label' => __( 'تنظیمات هاور تصویر', 'elementor' ),
            'tab' => Controls_Manager::TAB_STYLE,
        ]
    );
    $this->add_control(
        'bgh_overly',
        [
            'label' => __( 'رنگ هاور جزئیات فیلم', 'plugin-domain' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .portfolio-info .portfolio-overlay' => 'background: {{VALUE}}',
            ],
        ]
    );
    $this->add_responsive_control(
        'overly-width',
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
                '{{WRAPPER}} .portfolio-info .portfolio-overlay' => 'width: {{SIZE}}{{UNIT}};',
            ],
        ]
    );
    $this->add_responsive_control(
        'overly-height',
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
                '{{WRAPPER}} .portfolio-info .portfolio-overlay' => 'height: {{SIZE}}{{UNIT}};',
            ],
        ]
    );
    $this->end_controls_section();
    $this->start_controls_section(
        'section_icon_style',
        [
            'label' => __( 'تنظیمات آیکون', 'elementor' ),
            'tab' => Controls_Manager::TAB_STYLE,
        ]
    );

    $this->add_control(
        'padding_header_icon',
        [
            'label' => __( 'پدینگ', 'elementor' ),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%' ],
            'selectors' => [
                '{{WRAPPER}} .portfolio-info .portfolio-overlay-text a.place' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
            ],
        ]
    );
    $this->add_control(
        'margin_header_icon',
        [
            'label' => __( 'فاصله', 'elementor' ),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%' ],
            'selectors' => [
                '{{WRAPPER}} .portfolio-info .portfolio-overlay-text a.place' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
            ],
        ]
    );
    $this->add_control(
        'border_header_icon',
        [
            'label' => __( 'گوشه‌های مدور', 'elementor' ),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%' ],
            'selectors' => [
                '{{WRAPPER}} .portfolio-info .portfolio-overlay-text a.place' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
            ],
        ]
    );
    $this->add_control(
        'bg_header_icon',
        [
            'label' => __( 'رنگ پس زمینه', 'plugin-domain' ),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .portfolio-info .portfolio-overlay-text a.place' => 'background: {{VALUE}}',
            ],
        ]
    );
    $this->add_control(
        'color_header_icon',
        [
            'label' => __( 'رنگ آیکون', 'plugin-domain' ),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .portfolio-info .portfolio-overlay-text a.place' => 'color: {{VALUE}}',
            ],
        ]
    );
    $this->add_control(
        'color_header_icon_hover',
        [
            'label' => __( 'هاور آیکون', 'plugin-domain' ),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .portfolio-info .portfolio-overlay-text a.place:hover' => 'color: {{VALUE}}',
            ],
        ]
    );
    $this->add_group_control(
        \Elementor\Group_Control_Typography::get_type(),
        [
            'name' => 'icon__typography',
            'label' => __( 'تایپوگرافی آیکون', 'plugin-domain' ),
            'selector' => '{{WRAPPER}} .portfolio-info .portfolio-overlay-text a.place',
        ]
    );
    $this->add_control(
        'color_header_svg',
        [
            'label' => __( 'رنگ آیکون svg', 'plugin-domain' ),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .portfolio-info .portfolio-overlay-text a.place svg' => 'fill: {{VALUE}}',
            ],
        ]
    );
    $this->add_responsive_control(
        'width_svgicon',
        [
            'label' => __( 'سایز svg', 'elementor' ),
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
            'size_units' => [ 'px' ],
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
                '{{WRAPPER}} .filim .cardfilm a.place svg' => 'width: {{SIZE}}{{UNIT}};',
            ],
        ]
    );
    $this->add_control(
        'more_options_icon',
        [
            'label' => __( 'جایگاه آیکون', 'plugin-name' ),
            'type' => \Elementor\Controls_Manager::HEADING,
            'separator' => 'before',
        ]
    );
    $this->add_responsive_control(
        'icon_top',
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
                '{{WRAPPER}} .portfolio-info .portfolio-overlay-text a.place' => 'top: {{SIZE}}{{UNIT}};',
            ],
        ]
    );
    $this->add_responsive_control(
        'icon_right',
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
                '{{WRAPPER}} .portfolio-info .portfolio-overlay-text a.place' => 'right: {{SIZE}}{{UNIT}};',
            ],
        ]
    );
    $this->add_responsive_control(
        'icon_bottom',
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
                '{{WRAPPER}} .portfolio-info .portfolio-overlay-text a.place' => 'bottom: {{SIZE}}{{UNIT}};',
            ],
        ]
    );
    $this->add_responsive_control(
        'icon_left',
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
                '{{WRAPPER}} .portfolio-info .portfolio-overlay-text a.place' => 'left: {{SIZE}}{{UNIT}};',
            ],
        ]
    );
    $this->end_controls_section();
  }
  

  protected function render(){
    $settings = $this->get_settings_for_display();
    ?>
<?php
if ( 'yes' === $settings['show_product_content'] ) {
?>
    <div class="row section-style-one m-0">
        <div class="col-6 text-right">
            <div class="espical-header mt-5">
                <h3 class="section-title">
                <?php echo $settings['content'] ?>
                </h3>
            </div>
        </div>
      <div class="col-6 text-left">
         <div class="espical-header mt-5">
            <?php
            $target = $settings['url_ads']['is_external'] ? ' target="_blank"' : '';
            $nofollow = $settings['url_ads']['nofollow'] ? ' rel="nofollow"' : '';
            ?>
            <a href="<?php echo $settings['url_ads']['url'] ?>" <?php echo $target; ?> <?php echo $nofollow; ?> class="text-upper section-header-link mt-5"><span class="margin-icon"><?php echo  $settings['content_botton']; ?></span><?php \Elementor\Icons_Manager::render_icon( $settings['icon'], [ 'aria-hidden' => 'true' ] ); ?></a>
         </div>
      </div>
    </div>
    <?php
    }
    ?>
   <div class="row m-0 filim">
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
      <?php 
         $imbd_link = get_post_meta(get_the_ID(),'link',true);
         $text_imbd = get_post_meta(get_the_ID(),'text-imDb',true);
         $text_img = get_post_meta(get_the_ID(),'img',true); 
         ?>
      
      <div class="<?php if ( 'yes' === $settings['show_cardfilm'] ) { ?>col-12 col-lg-3 col-md-4<?php }else{ echo 'cardfilm px-1'; } ?> ">
      
        <div class="portfolio-info mb-3 shadow-around">
            <a href="<?php the_permalink(); ?>"><img src="<?php echo $text_img; ?>" alt="<?php the_title(); ?>" class=""></a>
            <?php if ( 'yes' === $settings['show_overly'] ) { ?>
            <div class="portfolio-overlay"></div>
            <?php
            $select_sethand = get_post_meta( get_the_ID(), 'imDb_select', true );
            if ( 'defult-select' === $select_sethand ){ ?>
            <div class="portfolio-overlay-text text-right text-white">
            <?php if ( 'yes' === $settings['show_icon'] ) { ?>
            <?php if ( 'yes' === $settings['show_imdb'] ) { ?>
               <p><span class="imbd"><i class="fab fa-imdb"></i><?php echo $text_imbd; ?></span></p>
               <?php } ?>
               <?php if ( 'yes' === $settings['show_title'] ) { ?>
               <h3 class="mb-3 mt-1"><a href="<?php the_permalink(); ?>"><?php the_title() ?></a></h3>
               <?php } ?>
               <?php if ( 'yes' === $settings['show_category'] ) { ?>
               <p><span class="junre"><?php the_terms(get_the_ID(),"movie_cat"); ?></span></p>
               <?php } ?>
               <?php if ( 'yes' === $settings['show_year'] ) { ?>
               <span class="year"><?php the_terms(get_the_ID(),"yaers"); ?></span>
               <?php } ?>
               <?php } else{ ?>
               <div class="film-icon-wrapper">
                    <a href="<?php the_permalink(); ?>" class="position-absolute place"><?php \Elementor\Icons_Manager::render_icon( $settings['icon_overly'], [ 'aria-hidden' => 'true' ] ); ?></a>
                </div>
                <?php } ?>
            </div>
            <?php } ?>
            <?php
            if ( 'imdb-tabligh' === $select_sethand ){ ?>
            <?php
            $IMDB = new \IMDB($imbd_link); 
            ?>
            <div class="portfolio-overlay-text text-right text-white">
            <?php if ( 'yes' === $settings['show_icon'] ) { ?>
            <?php if ( 'yes' === $settings['show_imdb'] ) { ?>
               <p><span class="imbd"><i class="fab fa-imdb"></i><?php if ($IMDB->isReady) { print_r($IMDB->getRating()); } else { echo ''; } ?></span></p>
               <?php } ?>
               <?php if ( 'yes' === $settings['show_title'] ) { ?>
               <h3 class="mb-3 mt-1"><a href="<?php the_permalink(); ?>"><?php the_title() ?></a></h3>
               <?php } ?>
               <?php if ( 'yes' === $settings['show_category'] ) { ?>
               <p><span class="junre"><?php the_terms(get_the_ID(),"movie_cat"); ?></span></p>
               <?php } ?>
               <?php if ( 'yes' === $settings['show_year'] ) { ?>
               <span class="year"><?php if ($IMDB->isReady) { print_r($IMDB->getYear()); } else { echo ''; } ?></span>
               <?php } ?>
               <?php } else{ ?>
               <div class="film-icon-wrapper">
                    <a href="<?php the_permalink(); ?>" class="position-absolute place"><?php \Elementor\Icons_Manager::render_icon( $settings['icon_overly'], [ 'aria-hidden' => 'true' ] ); ?></a>
                </div>
                <?php } ?>
            </div>

            <?php } ?>
            <?php } ?>
        </div>
        
        
      </div>
      <?php endwhile; wp_reset_postdata(); ?>
   </div>

    <?php
  }

  protected function _content_template(){
    
  }
}