<?php

namespace WPC\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH')) exit; // Exit if accessed directly


class Hexdlnet extends Widget_Base{

  public function get_name(){
    return 'hexdlnet';
  }

  public function get_title(){
    return 'کوئری فیلم 2';
  }

  public function get_icon(){
    return 'eicon-post-list';
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
        'sigma_select_products_lists_style',
        [
            'label'   => esc_html__( 'انتخاب استایل', 'sigma-theme' ),
            'type'    => Controls_Manager::SELECT,
            'default' => 'style01_products_lists',
            'options' => [
                'style01_products_lists' => esc_html__('استایل اول', 'sigma-theme'),
                'style02_products_lists' => esc_html__('استایل دوم', 'sigma-theme'),
                'style03_products_lists' => esc_html__('استایل سوم', 'sigma-theme'),
            ],
        ]
    );
    $this->add_control(
        'sigma_select_products_lists_style01',
        [
            'raw' => '<img class="admin_select_img_style" src="'.get_template_directory_uri().'/img/element-img/style1-min.png">',
            'type' => Controls_Manager::RAW_HTML,
            'condition' => [
                'sigma_select_products_lists_style' => 'style01_products_lists',
            ],      				
        ]
    );        

    $this->add_control(
        'sigma_select_products_lists_style02',
        [
            'raw' => '<img  
                class="admin_select_img_style" src="'.get_template_directory_uri().'/img/element-img/style2-min.png">',
            'type' => Controls_Manager::RAW_HTML,
            'condition' => [
                'sigma_select_products_lists_style' => 'style02_products_lists',
            ],      				
        ]
    ); 
    $this->add_control(
        'sigma_select_products_lists_style03',
        [
            'raw' => '<img  
                class="admin_select_img_style" src="'.get_template_directory_uri().'/img/element-img/style03-min.png">',
            'type' => Controls_Manager::RAW_HTML,
            'condition' => [
                'sigma_select_products_lists_style' => 'style03_products_lists',
            ],      				
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
            'min' => 5,
            'max' => 100,
            'step' => 1,
            'default' => 5,
        ]
    );
    $this->add_control(
        'show_bookmark',
        [
            'label' => __( 'نمایش بوک مارک', 'plugin-domain' ),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'label_on' => __( 'Show', 'your-plugin' ),
            'label_off' => __( 'Hide', 'your-plugin' ),
            'return_value' => 'yes',
            'default' => 'yes',
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
    $this->add_control(
        'margin',
        [
            'label' => __( 'فاصله', 'elementor' ),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%' ],
            'selectors' => [
                '{{WRAPPER}} .whilhex-section .web-hex-section article,.whilhex-section .filmer-nft-section article.filmr-card,.hex-film-card' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
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
                '{{WRAPPER}} .whilhex-section .web-hex-section article,.whilhex-section .filmer-nft-section article.filmr-card,.hex-film-card' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
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
                '{{WRAPPER}} .whilhex-section .web-hex-section article,.whilhex-section .filmer-nft-section article.filmr-card,.hex-film-card' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
            ],
        ]
    );
    $this->add_group_control(
        \Elementor\Group_Control_Background::get_type(),
        [
            'name' => 'background-filmer',
            'label' => esc_html__( 'Background', 'plugin-name' ),
            'types' => [ 'classic', 'gradient' ],
            'selector' => '{{WRAPPER}} .whilhex-section .web-hex-section article,.whilhex-section .filmer-nft-section article.filmr-card,.hex-film-card',
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
                '{{WRAPPER}} .whilhex-section .web-hex-section article,.whilhex-section .filmer-nft-section article.filmr-card,.hex-film-card' => 'border-style: {{VALUE}}',
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
                '{{WRAPPER}} .whilhex-section .web-hex-section article,.whilhex-section .filmer-nft-section article.filmr-card,.hex-film-card' => 'border-width: {{SIZE}}{{UNIT}};',
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
                '{{WRAPPER}} .whilhex-section .web-hex-section article,.whilhex-section .filmer-nft-section article.filmr-card,.hex-film-card' => 'border-color: {{VALUE}}',
            ],
        ]
    );
    $this->add_group_control(
        \Elementor\Group_Control_Box_Shadow::get_type(),
        [
            'name' => 'shadow',
            'label' => __( 'باکس شدوو', 'plugin-domain' ),
            'selector' => '{{WRAPPER}} .whilhex-section .web-hex-section article,.whilhex-section .filmer-nft-section article.filmr-card,.hex-film-card',
        ]
    );
    $this->end_controls_section();
    $this->start_controls_section(
        'section_style_content',
        [
            'label' => __( 'تنظیمات استایل محتوا', 'elementor' ),
            'tab' => Controls_Manager::TAB_STYLE,
            'condition' => [
                'sigma_select_products_lists_style' => 'style01_products_lists',
            ], 
        ]
    );
    $this->add_control(
        'more_options_img',
        [
            'label' => __( 'استایل تصویر', 'plugin-name' ),
            'type' => \Elementor\Controls_Manager::HEADING,
            'separator' => 'before',
        ]
    );
    $this->add_control(
        'border_radius_img',
        [
            'label' => __( 'گوشه‌های مدور تصویر', 'elementor' ),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%' ],
            'selectors' => [
                '{{WRAPPER}} .whilhex-section .web-hex-section article a img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
            ],
        ]
    );
    $this->add_group_control(
        \Elementor\Group_Control_Box_Shadow::get_type(),
        [
            'name' => 'box_shadow',
            'label' => __( 'باکس شدوو', 'plugin-domain' ),
            'selector' => '{{WRAPPER}} .whilhex-section .web-hex-section article a img',
        ]
    );
    $this->add_control(
        'more_options_title',
        [
            'label' => __( 'تنظیمات عنوان', 'plugin-name' ),
            'type' => \Elementor\Controls_Manager::HEADING,
            'separator' => 'before',
        ]
    );
    $this->add_control(
        'cl_button',
        [
            'label' => __( 'رنگ عنوان', 'plugin-domain' ),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .whilhex-section .web-hex-section article h5.title-hex a' => 'color: {{VALUE}}',
            ],
        ]
    );
    $this->add_control(
        'clh_button',
        [
            'label' => __( 'هاور عنوان', 'plugin-domain' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .whilhex-section .web-hex-section article h5.title-hex a:hover' => 'color: {{VALUE}}',
            ],
        ]
    );
    $this->add_group_control(
        \Elementor\Group_Control_Typography::get_type(),
        [
            'name' => 'button_typography',
            'label' => __( 'تایپوگرافی', 'plugin-domain' ),
            'selector' => '{{WRAPPER}} .whilhex-section .web-hex-section article h5.title-hex a',
        ]
    );
    
    $this->add_control(
        'vizhe_options',
        [
            'label' => __( 'تنظیمات دسته بندی', 'plugin-name' ),
            'type' => \Elementor\Controls_Manager::HEADING,
            'separator' => 'before',
        ]
    );
    $this->add_control(
        'cl_category',
        [
            'label' => __( 'رنگ عنوان', 'plugin-domain' ),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .whilhex-section .web-hex-section article .category a' => 'color: {{VALUE}}',
            ],
        ]
    );
    $this->add_control(
        'cl_category_hover',
        [
            'label' => __( 'هاور', 'plugin-domain' ),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .whilhex-section .web-hex-section article .category a:hover' => 'color: {{VALUE}}',
            ],
        ]
    );
    $this->add_control(
        'cl_icon_category',
        [
            'label' => __( 'رنگ آیکون', 'plugin-domain' ),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .whilhex-section .web-hex-section article .category svg' => 'color: {{VALUE}}',
            ],
        ]
    );
    $this->add_group_control(
        \Elementor\Group_Control_Typography::get_type(),
        [
            'name' => 'category_typography',
            'label' => __( 'تایپوگرافی', 'plugin-domain' ),
            'selector' => '{{WRAPPER}} .whilhex-section .web-hex-section article .category',
        ]
    );
    $this->add_control(
        'eye_options',
        [
            'label' => __( 'تنظیمات بازدید', 'plugin-name' ),
            'type' => \Elementor\Controls_Manager::HEADING,
            'separator' => 'before',
        ]
    );
    $this->add_control(
        'cl_eye',
        [
            'label' => __( 'رنگ بازدید', 'plugin-domain' ),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .whilhex-section .web-hex-section article .eye' => 'color: {{VALUE}}',
            ],
        ]
    );
    $this->add_control(
        'cl_icon_eye',
        [
            'label' => __( 'رنگ آیکون', 'plugin-domain' ),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .whilhex-section .web-hex-section article .eye svg' => 'color: {{VALUE}}',
            ],
        ]
    );
    $this->add_group_control(
        \Elementor\Group_Control_Typography::get_type(),
        [
            'name' => 'eye_typography',
            'label' => __( 'تایپوگرافی', 'plugin-domain' ),
            'selector' => '{{WRAPPER}} .whilhex-section .web-hex-section article .eye',
        ]
    );
    $this->add_control(
        'hr_options',
        [
            'label' => __( 'استایل خط جداکننده', 'plugin-name' ),
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
                '{{WRAPPER}} .whilhex-section .web-hex-section article hr' => 'border-top-style: {{VALUE}}',
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
                '{{WRAPPER}} .whilhex-section .web-hex-section article hr' => 'border-top-width: {{SIZE}}{{UNIT}};',
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
                '{{WRAPPER}} .whilhex-section .web-hex-section article hr' => 'border-top-color: {{VALUE}}',
            ],
        ]
    );
    $this->add_control(
        'honarmand_options',
        [
            'label' => __( 'تنظیمات بازیگران', 'plugin-name' ),
            'type' => \Elementor\Controls_Manager::HEADING,
            'separator' => 'before',
        ]
    );
    $this->add_control(
        'honarmand_button',
        [
            'label' => __( 'رنگ', 'plugin-domain' ),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .whilhex-section .web-hex-section article .actor a, .whilhex-section .web-hex-section article .actor' => 'color: {{VALUE}}',
            ],
        ]
    );
    $this->add_control(
        'honarmand_button_hover',
        [
            'label' => __( 'هاور', 'plugin-domain' ),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .whilhex-section .web-hex-section article .actor a:hover' => 'color: {{VALUE}}',
            ],
        ]
    );
    $this->add_group_control(
        \Elementor\Group_Control_Typography::get_type(),
        [
            'name' => 'honarmand_typography',
            'label' => __( 'تایپوگرافی', 'plugin-domain' ),
            'selector' => '{{WRAPPER}} .whilhex-section .web-hex-section article .actor',
        ]
    );
    $this->add_control(
        'exerpt_options',
        [
            'label' => __( 'تنظیمات توضیح کوتاه', 'plugin-name' ),
            'type' => \Elementor\Controls_Manager::HEADING,
            'separator' => 'before',
        ]
    );
    $this->add_control(
        'border_radius_exerpt',
        [
            'label' => __( 'گوشه‌های مدور', 'elementor' ),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%' ],
            'selectors' => [
                '{{WRAPPER}} .whilhex-section .web-hex-section article .exerpt' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
            ],
        ]
    );
    $this->add_control(
        'color_exerpt',
        [
            'label' => __( 'رنگ', 'plugin-domain' ),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .whilhex-section .web-hex-section article .exerpt' => 'color: {{VALUE}}',
            ],
        ]
    );
    $this->add_control(
        'background_exerpt',
        [
            'label' => __( 'رنگ پس زمینه', 'plugin-domain' ),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .whilhex-section .web-hex-section article .exerpt' => 'background: {{VALUE}}',
            ],
        ]
    );
    $this->add_group_control(
        \Elementor\Group_Control_Typography::get_type(),
        [
            'name' => 'exerpt_typography',
            'label' => __( 'تایپوگرافی', 'plugin-domain' ),
            'selector' => '{{WRAPPER}} .whilhex-section .web-hex-section article .exerpt',
        ]
    );
    $this->add_control(
        'footer_options',
        [
            'label' => __( 'تنظیمات محتوای فوتر', 'plugin-name' ),
            'type' => \Elementor\Controls_Manager::HEADING,
            'separator' => 'before',
        ]
    );
    $this->add_control(
        'color_footer',
        [
            'label' => __( 'رنگ متن', 'plugin-domain' ),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .whilhex-section .web-hex-section article .time,
                .whilhex-section .web-hex-section article .date,
                .whilhex-section .web-hex-section article .imdb,
                .whilhex-section .web-hex-section article .date a' => 'color: {{VALUE}}',
            ],
        ]
    );
    $this->add_control(
        'color_footer_icon',
        [
            'label' => __( 'رنگ آیکون', 'plugin-domain' ),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .whilhex-section .web-hex-section article .time svg,
                .whilhex-section .web-hex-section article .date svg,
                .whilhex-section .web-hex-section article .imdb svg' => 'color: {{VALUE}}',
            ],
        ]
    );
    $this->add_group_control(
        \Elementor\Group_Control_Typography::get_type(),
        [
            'name' => 'footer_typography',
            'label' => __( 'تایپوگرافی', 'plugin-domain' ),
            'selector' => '{{WRAPPER}} .whilhex-section .web-hex-section article .time,
            .whilhex-section .web-hex-section article .date,
            .whilhex-section .web-hex-section article .imdb,
            .whilhex-section .web-hex-section article .date a',
        ]
    );
    $this->add_group_control(
        \Elementor\Group_Control_Background::get_type(),
        [
            'name' => 'bookmark_bg',
            'label' => esc_html__( 'Background', 'plugin-name' ),
            'types' => [ 'classic', 'gradient' ],
            'selector' => '{{WRAPPER}} .whilhex-section .web-hex-section .faverit-button button.simplefavorite-button,.web-hex-section .faverit-button-error .simplefavorite-button',
        ]
    );
    $this->add_control(
        'bookmark_color',
        [
            'label' => __( 'رنگ آیکون بوک مارک', 'plugin-domain' ),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .whilhex-section .web-hex-section .faverit-button button.simplefavorite-button svg,.web-hex-section .faverit-button-error .simplefavorite-button svg' => 'color: {{VALUE}}',
            ],
        ]
    );
    $this->end_controls_section();
    $this->start_controls_section(
        'section_style02_content',
        [
            'label' => __( 'تنظیمات استایل محتوا', 'elementor' ),
            'tab' => Controls_Manager::TAB_STYLE,
            'condition' => [
                'sigma_select_products_lists_style' => 'style02_products_lists',
            ], 
        ]
    );
    $this->add_responsive_control(
        'width_cardfilme',
        [
            'label' => __( 'عرض کارد', 'elementor' ),
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
            'size_units' => [ 'px','%'],
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
                '{{WRAPPER}} .whilhex-section .filmer-nft-section .filmr-card' => 'max-width: {{SIZE}}{{UNIT}};',
            ],
        ]
    );
    $this->add_responsive_control(
        'width_cardfilme_flex',
        [
            'label' => __( 'فلکس', 'elementor' ),
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
            'size_units' => [ 'px','%'],
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
                '{{WRAPPER}} .whilhex-section .filmer-nft-section .filmr-card' => 'flex:0 0 {{SIZE}}{{UNIT}};',
            ],
        ]
    );
    $this->add_control(
        'more_style02_img',
        [
            'label' => __( 'استایل تصویر', 'plugin-name' ),
            'type' => \Elementor\Controls_Manager::HEADING,
            'separator' => 'before',
        ]
    );
    $this->add_responsive_control(
        'width_cardfilme_img',
        [
            'label' => __( 'سایز تصویر', 'elementor' ),
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
                '{{WRAPPER}} .whilhex-section .filmer-nft-section .filmr-card img' => 'width: {{SIZE}}{{UNIT}};',
            ],
        ]
    );
    $this->add_control(
        'border_radius_style02',
        [
            'label' => __( 'گوشه‌های مدور تصویر', 'elementor' ),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%' ],
            'selectors' => [
                '{{WRAPPER}} .whilhex-section .filmer-nft-section .filmr-card img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
            ],
        ]
    );
    $this->add_group_control(
        \Elementor\Group_Control_Box_Shadow::get_type(),
        [
            'name' => 'box_shadow_style02',
            'label' => __( 'باکس شدوو', 'plugin-domain' ),
            'selector' => '{{WRAPPER}} .whilhex-section .filmer-nft-section .filmr-card img',
        ]
    );
    $this->add_control(
        'more_optionsstyle02_title',
        [
            'label' => __( 'تنظیمات عنوان', 'plugin-name' ),
            'type' => \Elementor\Controls_Manager::HEADING,
            'separator' => 'before',
        ]
    );
    $this->start_controls_tabs( 'style_button' );
    $this->start_controls_tab(
        'style_button_title',
        [
        'label' => esc_html__( 'عادی', 'elementor' ),
        ]
    );
    $this->add_control(
        'filmer_title',
        [
            'label' => __( 'رنگ عنوان', 'plugin-domain' ),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .whilhex-section .filmr-card h3 a' => 'color: {{VALUE}}',
            ],
        ]
    );
    $this->add_group_control(
        \Elementor\Group_Control_Typography::get_type(),
        [
            'name' => 'tilefimer_typography',
            'label' => __( 'تایپوگرافی', 'plugin-domain' ),
            'selector' => '{{WRAPPER}} .whilhex-section .filmr-card h3 a',
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
        'clhfilmer_button',
        [
            'label' => __( 'هاور عنوان', 'plugin-domain' ),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .whilhex-section .filmr-card h3 a:hover' => 'color: {{VALUE}}',
            ],
        ]
    );
    $this->end_controls_tab();
    $this->end_controls_tabs();
    
    $this->add_control(
        'paragraph_optionsstyle02_title',
        [
            'label' => __( 'تنظیمات پاراگراف', 'plugin-name' ),
            'type' => \Elementor\Controls_Manager::HEADING,
            'separator' => 'before',
        ]
    );
    $this->add_control(
        'filmer_paragraph',
        [
            'label' => __( 'رنگ عنوان', 'plugin-domain' ),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .filmr-card .content-filmer .exerpt' => 'color: {{VALUE}}',
            ],
        ]
    );
    $this->add_group_control(
        \Elementor\Group_Control_Typography::get_type(),
        [
            'name' => 'paragraph_typography',
            'label' => __( 'تایپوگرافی', 'plugin-domain' ),
            'selector' => '{{WRAPPER}} .filmr-card .content-filmer .exerpt p',
        ]
    );
    $this->add_control(
        'paragraph_optionsstyle02_title',
        [
            'label' => __( 'تنظیمات پاراگراف', 'plugin-name' ),
            'type' => \Elementor\Controls_Manager::HEADING,
            'separator' => 'before',
        ]
    );
    $this->start_controls_tabs( 'style02_button' );
    $this->start_controls_tab(
        'style02_save_button',
        [
        'label' => esc_html__( 'دکمه بوک مارک', 'elementor' ),
        ]
    );
    $this->add_group_control(
        \Elementor\Group_Control_Background::get_type(),
        [
            'name' => 'bg_savebutton',
            'label' => esc_html__( 'Background', 'plugin-name' ),
            'types' => [ 'classic', 'gradient' ],
            'selector' => '{{WRAPPER}} .filmr-card .content-filmer .content-m .save-film button,.filmr-card .faverit-button-error .simplefavorite-button',
        ]
    );
    $this->add_control(
        'color_savebutton',
        [
            'label' => __( 'رنگ', 'plugin-domain' ),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .filmr-card .content-filmer .content-m .save-film button svg,.filmr-card .faverit-button-error .simplefavorite-button svg' => 'color: {{VALUE}}',
            ],
        ]
    );
    $this->add_control(
        'radius_savebutton',
        [
            'label' => __( 'گوشه‌های مدور', 'elementor' ),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%' ],
            'selectors' => [
                '{{WRAPPER}} .filmr-card .content-filmer .content-m .save-film button,.filmr-card .faverit-button-error .simplefavorite-button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
            ],
        ]
    );
    $this->add_group_control(
        \Elementor\Group_Control_Box_Shadow::get_type(),
        [
            'name' => 'box_shadow_savebutton',
            'label' => __( 'باکس شدوو', 'plugin-domain' ),
            'selector' => '{{WRAPPER}} .filmr-card .content-filmer .content-m .save-film button,.filmr-card .faverit-button-error .simplefavorite-button',
        ]
    );
    $this->end_controls_tab();
    $this->start_controls_tab(
        'style02_imDb_button',
        [
              'label' => esc_html__( 'امتیاز فیلم', 'elementor' ),
        ]
    );
    $this->add_group_control(
        \Elementor\Group_Control_Background::get_type(),
        [
            'name' => 'background_imdbbutton',
            'label' => esc_html__( 'Background', 'plugin-name' ),
            'types' => [ 'classic', 'gradient' ],
            'selector' => '{{WRAPPER}} .filmr-card .content-filmer .content-m .imdb-filmer svg',
        ]
    );
    $this->add_control(
        'color_imdbbutton',
        [
            'label' => __( 'رنگ', 'plugin-domain' ),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .filmr-card .content-filmer .content-m .imdb-filmer svg' => 'color: {{VALUE}}',
            ],
        ]
    );
    $this->add_control(
        'radius_imdbbutton',
        [
            'label' => __( 'گوشه‌های مدور', 'elementor' ),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%' ],
            'selectors' => [
                '{{WRAPPER}} .filmr-card .content-filmer .content-m .imdb-filmer svg' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
            ],
        ]
    );
    $this->add_group_control(
        \Elementor\Group_Control_Box_Shadow::get_type(),
        [
            'name' => 'box_shadow_imdbbutton',
            'label' => __( 'باکس شدوو', 'plugin-domain' ),
            'selector' => '{{WRAPPER}} .filmr-card .content-filmer .content-m .imdb-filmer svg',
        ]
    );
    $this->end_controls_tab();
    $this->start_controls_tab(
        'style02_time_button',
        [
              'label' => esc_html__( 'زمان فیلم', 'elementor' ),
        ]
    );
    $this->add_group_control(
        \Elementor\Group_Control_Background::get_type(),
        [
            'name' => 'background_timebutton',
            'label' => esc_html__( 'Background', 'plugin-name' ),
            'types' => [ 'classic', 'gradient' ],
            'selector' => '{{WRAPPER}} .filmr-card .content-filmer .content-m .time-filmer svg',
        ]
    );
    $this->add_control(
        'color_timebutton',
        [
            'label' => __( 'رنگ', 'plugin-domain' ),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .filmr-card .content-filmer .content-m .time-filmer svg' => 'color: {{VALUE}}',
            ],
        ]
    );
    $this->add_control(
        'radius_timebutton',
        [
            'label' => __( 'گوشه‌های مدور', 'elementor' ),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%' ],
            'selectors' => [
                '{{WRAPPER}} .filmr-card .content-filmer .content-m .time-filmer svg' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
            ],
        ]
    );
    $this->add_group_control(
        \Elementor\Group_Control_Box_Shadow::get_type(),
        [
            'name' => 'box_shadow_timebutton',
            'label' => __( 'باکس شدوو', 'plugin-domain' ),
            'selector' => '{{WRAPPER}} .filmr-card .content-filmer .content-m .time-filmer svg',
        ]
    );
    $this->end_controls_tab();
    $this->end_controls_tabs();
    $this->end_controls_section();
    $this->start_controls_section(
        'section_style03_content',
        [
            'label' => __( 'تنظیمات استایل محتوا', 'elementor' ),
            'tab' => Controls_Manager::TAB_STYLE,
            'condition' => [
                'sigma_select_products_lists_style' => 'style03_products_lists',
            ], 
        ]
    );
    $this->add_responsive_control(
        'width_cardfilme03',
        [
            'label' => __( 'عرض کارد', 'elementor' ),
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
            'size_units' => [ 'px','%'],
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
                '{{WRAPPER}} .hex-film-card' => 'max-width: {{SIZE}}{{UNIT}};',
            ],
        ]
    );
    $this->add_responsive_control(
        'flex_cardfilme03',
        [
            'label' => __( 'فلکس', 'elementor' ),
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
            'size_units' => [ 'px','%'],
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
                '{{WRAPPER}} .hex-film-card' => 'flex:0 0 {{SIZE}}{{UNIT}};',
            ],
        ]
    );
    $this->add_control(
        'more_style03_img',
        [
            'label' => __( 'استایل تصویر', 'plugin-name' ),
            'type' => \Elementor\Controls_Manager::HEADING,
            'separator' => 'before',
        ]
    );
    $this->add_responsive_control(
        'width_cardfilme_img03',
        [
            'label' => __( 'سایز تصویر', 'elementor' ),
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
            'size_units' => [ 'px','%'],
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
                '{{WRAPPER}} .hex-film-card img' => 'width: {{SIZE}}{{UNIT}};',
            ],
        ]
    );
    $this->add_control(
        'border_radius_style03',
        [
            'label' => __( 'گوشه‌های مدور تصویر', 'elementor' ),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%' ],
            'selectors' => [
                '{{WRAPPER}} .hex-film-card img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
            ],
        ]
    );
    $this->add_group_control(
        \Elementor\Group_Control_Box_Shadow::get_type(),
        [
            'name' => 'box_shadow_style03',
            'label' => __( 'باکس شدوو', 'plugin-domain' ),
            'selector' => '{{WRAPPER}} .hex-film-card img',
        ]
    );
    $this->add_control(
        'more_optionsstyle03_title',
        [
            'label' => __( 'تنظیمات عنوان', 'plugin-name' ),
            'type' => \Elementor\Controls_Manager::HEADING,
            'separator' => 'before',
        ]
    );
    $this->start_controls_tabs( 'style_button03' );
    $this->start_controls_tab(
        'style_button_title03',
        [
        'label' => esc_html__( 'عادی', 'elementor' ),
        ]
    );
    $this->add_control(
        'filmer_title03',
        [
            'label' => __( 'رنگ عنوان', 'plugin-domain' ),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .hex-film-card h2 a' => 'color: {{VALUE}}',
            ],
        ]
    );
    $this->add_group_control(
        \Elementor\Group_Control_Typography::get_type(),
        [
            'name' => 'tilefimer03_typography',
            'label' => __( 'تایپوگرافی', 'plugin-domain' ),
            'selector' => '{{WRAPPER}} .hex-film-card h2 a',
        ]
    );
    $this->end_controls_tab();
    $this->start_controls_tab(
        'style_button_03_hover',
        [
              'label' => esc_html__( 'هاور', 'elementor' ),
        ]
    );
    $this->add_control(
        'clhfilmer03_button',
        [
            'label' => __( 'هاور عنوان', 'plugin-domain' ),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .hex-film-card h2 a:hover' => 'color: {{VALUE}}',
            ],
        ]
    );
    $this->end_controls_tab();
    $this->end_controls_tabs();
    $this->add_control(
        'pragraph_03',
        [
            'label' => __( 'تنظیمات توضیح', 'plugin-name' ),
            'type' => \Elementor\Controls_Manager::HEADING,
            'separator' => 'before',
        ]
    );
    $this->add_group_control(
        \Elementor\Group_Control_Background::get_type(),
        [
            'name' => 'background_help',
            'label' => esc_html__( 'Background', 'plugin-name' ),
            'types' => [ 'classic', 'gradient' ],
            'selector' => '{{WRAPPER}} .hex-film-card .more-desc',
        ]
    );
    $this->add_control(
        'color_help',
        [
            'label' => __( 'رنگ', 'plugin-domain' ),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .hex-film-card .more-desc' => 'color: {{VALUE}}',
            ],
        ]
    );
    $this->add_group_control(
        \Elementor\Group_Control_Typography::get_type(),
        [
            'name' => 'help_typography',
            'label' => __( 'تایپوگرافی', 'plugin-domain' ),
            'selector' => '{{WRAPPER}} .hex-film-card .more-desc',
        ]
    );
    $this->add_control(
        'more_03',
        [
            'label' => __( 'مشخصات فیلم', 'plugin-name' ),
            'type' => \Elementor\Controls_Manager::HEADING,
            'separator' => 'before',
        ]
    );
    $this->add_control(
        'color_icon',
        [
            'label' => __( 'رنگ آیکون', 'plugin-domain' ),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .hex-film-card .actor svg,.hex-film-card .star svg' => 'color: {{VALUE}}',
            ],
        ]
    );
    $this->add_control(
        'color_matn',
        [
            'label' => __( 'رنگ متن', 'plugin-domain' ),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .hex-film-card .actor,.hex-film-card .star,.hex-film-card .actor a' => 'color: {{VALUE}}',
            ],
        ]
    );
    $this->add_group_control(
        \Elementor\Group_Control_Typography::get_type(),
        [
            'name' => 'more_typography',
            'label' => __( 'تایپوگرافی', 'plugin-domain' ),
            'selector' => '{{WRAPPER}} .hex-film-card .actor,.hex-film-card .star,.hex-film-card .actor a',
        ]
    );
    $this->add_control(
        'description_03',
        [
            'label' => __( 'تنظیمات توضیحات فیلم', 'plugin-name' ),
            'type' => \Elementor\Controls_Manager::HEADING,
            'separator' => 'before',
        ]
    );
    $this->add_control(
        'color_description',
        [
            'label' => __( 'رنگ متن', 'plugin-domain' ),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .hex-film-card .desc' => 'color: {{VALUE}}',
            ],
        ]
    );
    $this->add_group_control(
        \Elementor\Group_Control_Typography::get_type(),
        [
            'name' => 'description_typography',
            'label' => __( 'تایپوگرافی', 'plugin-domain' ),
            'selector' => '{{WRAPPER}} .hex-film-card .desc',
        ]
    );
    $this->add_group_control(
        \Elementor\Group_Control_Background::get_type(),
        [
            'name' => 'background_description',
            'label' => esc_html__( 'Background', 'plugin-name' ),
            'types' => [ 'classic', 'gradient' ],
            'selector' => '{{WRAPPER}} .hex-film-card .desc',
        ]
    );
    $this->add_control(
        'bookmark_03',
        [
            'label' => __( 'تنظیمات دکمه بوک مارک', 'plugin-name' ),
            'type' => \Elementor\Controls_Manager::HEADING,
            'separator' => 'before',
        ]
    );
    $this->add_group_control(
        \Elementor\Group_Control_Background::get_type(),
        [
            'name' => 'background_bookmark',
            'label' => esc_html__( 'Background', 'plugin-name' ),
            'types' => [ 'classic', 'gradient' ],
            'selector' => '{{WRAPPER}} .hex-film-card .faverit-button button,.hex-film-card .faverit-button-error .simplefavorite-button',
        ]
    );
    $this->add_control(
        'bookmark_color03',
        [
            'label' => __( 'رنگ آیکون بوک مارک', 'plugin-domain' ),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .hex-film-card .faverit-button button svg,.hex-film-card .faverit-button-error .simplefavorite-button svg' => 'color: {{VALUE}}',
            ],
        ]
    );
    $this->add_group_control(
        \Elementor\Group_Control_Typography::get_type(),
        [
            'name' => 'bookmark_typography',
            'label' => __( 'تایپوگرافی', 'plugin-domain' ),
            'selector' => '{{WRAPPER}} .hex-film-card .faverit-button button svg,.hex-film-card .faverit-button-error .simplefavorite-button svg',
        ]
    );
    $this->end_controls_section();
    $this->start_controls_section(
        'section_style_button',
        [
            'label' => __( 'تنظیمات دکمه', 'elementor' ),
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
        'border_imDB_btn',
        [
            'label' => __( 'گوشه‌های مدور', 'elementor' ),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%' ],
            'selectors' => [
                '{{WRAPPER}} .whilhex-section .web-hex-section article a.btn,.filmr-card .content-filmer a.btn-film,.hex-film-card .hex-film-nft' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]
    );
    $this->add_control(
		'title_color_btn',
		[
			'label' => __( 'رنگ متن', 'plugin-domain' ),
			'type' => Controls_Manager::COLOR,
			'default' => '',
			'selectors' => [
				'{{WRAPPER}} .whilhex-section .web-hex-section article a.btn,.filmr-card .content-filmer a.btn-film,.hex-film-card .hex-film-nft' => 'color: {{VALUE}}',
			],
		]
	);
    $this->add_control(
        'hover_title_btn',
        [
            'label' => __( 'هاور متن', 'plugin-domain' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .whilhex-section .web-hex-section article a.btn:hover,.filmr-card .content-filmer a.btn-film:hover,.hex-film-card .hex-film-nft:hover' => 'color: {{VALUE}}',
            ],
        ]
    );
    $this->add_group_control(
        \Elementor\Group_Control_Typography::get_type(),
        [
            'name' => 'title_typography_btn',
            'label' => __( 'تایپوگرافی', 'plugin-domain' ),
            'selector' => '{{WRAPPER}} .whilhex-section .web-hex-section article a.btn,.filmr-card .content-filmer a.btn-film,.hex-film-card .hex-film-nft',
        ]
    );
    $this->add_control(
		'botton_color_btn',
		[
			'label' => __( 'رنگ دکمه', 'plugin-domain' ),
			'type' => Controls_Manager::COLOR,
			'default' => '',
			'selectors' => [
				'{{WRAPPER}} .whilhex-section .web-hex-section article a.btn,.filmr-card .content-filmer a.btn-film,.hex-film-card .hex-film-nft' => 'background: {{VALUE}}',
			],
		]
	);

    $this->add_control(
        'hover_color_btn',
        [
            'label' => __( 'هاور دکمه', 'plugin-domain' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .whilhex-section .web-hex-section article a.btn:hover,.filmr-card .content-filmer a.btn-film:hover,.hex-film-card .hex-film-nft:hover' => 'background: {{VALUE}}',
            ],
        ]
    );
    
    $this->add_group_control(
        \Elementor\Group_Control_Box_Shadow::get_type(),
        [
            'name' => 'box_shadow_btn',
            'label' => __( 'باکس شدوو', 'plugin-domain' ),
            'selector' => '{{WRAPPER}} .whilhex-section .web-hex-section article a.btn,.filmr-card .content-filmer a.btn-film,.hex-film-card .hex-film-nft',
        ]
    );
    $this->add_control(
        'more_options_btn',
        [
            'label' => __( 'تنظیمات بردر', 'plugin-name' ),
            'type' => \Elementor\Controls_Manager::HEADING,
            'separator' => 'before',
        ]
    );
    $this->add_control(
        'border_style_btn',
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
                '{{WRAPPER}} .whilhex-section .web-hex-section article a.btn,.filmr-card .content-filmer a.btn-film,.hex-film-card .hex-film-nft' => 'border-style: {{VALUE}}',
            ],
        ]
    );
    $this->add_responsive_control(
        'width_border_btn',
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
                '{{WRAPPER}} .whilhex-section .web-hex-section article a.btn,.filmr-card .content-filmer a.btn-film,.hex-film-card .hex-film-nft' => 'border-width: {{SIZE}}{{UNIT}};',
            ],
        ]
    );
    $this->add_control(
		'border_color_btn',
		[
			'label' => __( 'رنگ بردر', 'plugin-domain' ),
			'type' => Controls_Manager::COLOR,
			'default' => '',
			'selectors' => [
				'{{WRAPPER}} .whilhex-section .web-hex-section article a.btn,.filmr-card .content-filmer a.btn-film,.hex-film-card .hex-film-nft' => 'border-color: {{VALUE}}',
			],
		]
	);
    $this->add_control(
        'hover_border_btn',
        [
            'label' => __( 'هاور بردر', 'plugin-domain' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .whilhex-section .web-hex-section article a.btn:hover,.filmr-card .content-filmer a.btn-film:hover,.hex-film-card .hex-film-nft:hover' => 'border-color: {{VALUE}}',
            ],
        ]
    );
    $this->add_control(
        'icon_select',
        [
            'label' => __( 'آیکون', 'text-domain' ),
            'type' => \Elementor\Controls_Manager::ICONS,
            'default' => [
                'value' => 'fas fa-download',
                'library' => 'solid',
            ],
        ]
    );
    $this->add_responsive_control(
        'width__btn',
        [
            'label' => __( 'فاصله آیکون تا نوشته', 'elementor' ),
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
                'px' => [
                    'min' => 1,
                    'max' => 1000,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .whilhex-section .web-hex-section article a.btn svg,.hex-film-nft svg' => 'margin-left: {{SIZE}}{{UNIT}};',
            ],
        ]
    );
    $this->end_controls_section();
  }
  

  protected function render(){
    $settings = $this->get_settings_for_display();
    ?>

<div class="whilhex-section">
    
    <?php if($settings['sigma_select_products_lists_style'] == 'style01_products_lists'){ ?>
            <div class="col-12 px-0">
                <div class="web-hex-section">
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
                        $text_time = get_post_meta(get_the_ID(),'text-time',true);
                        ?>
                        
                        <article>
                            <div class="row">
                                <div class="col-md-3 col-12 text-center"><a href="<?php the_permalink(); ?>"><img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>"></a>
                                    <?php if ( 'yes' === $settings['show_bookmark'] ) {
                                    ?>
                                        
                                        <?php global $user_ID; ?> 
                                        <?php if($user_ID){ ?>
                                            <div class="position-absolute faverit-button faverit-button-hex">
                                                <?php echo do_shortcode('[favorite_button]'); ?>
                                            </div> 
                                            <?php }else{ ?>
                                            <div class="position-absolute faverit-button-error faverit-button-hex">
                                                <button class="simplefavorite-button">
                                                    <i class="far fa-bookmark"></i>
                                                </button>
                                            </div> 
                                        <?php } ?>
                                    <?php   
                                    } ?>
                                </div>
                                <div class="col-md-9 col-12">
                                    <h5 class="title-hex  text-center text-md-right"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                                    <div class="pt-2 pb-3 d-none d-md-flex">
                                        <div class="category ml-3"><i class="fas fa-align-justify ml-2"></i><?php the_terms(get_the_ID(),"movie_cat"); ?></div>
                                        <div class="eye"><i class="fas fa-eye ml-1"></i><?php the_views(); ?></div>
                                    </div>
                                    <hr>
                                    <div class="actor text-right py-5 d-none d-lg-block">بازیگران:<?php the_terms(get_the_ID(),"honarmandan"); ?></div>
                                    <div class="exerpt mb-4 d-none d-lg-block"><?php echo get_the_excerpt(); ?></div>
                                    <div class="d-flex pt-3 align-items-center flex-wrap">

                                        <?php
                                        $select_sethand = get_post_meta( get_the_ID(), 'imDb_select', true );
                                        if ( 'defult-select' === $select_sethand ){ ?>
                                        <div class="col-lg-8 col-12 px-0 text-center text-md-right">
                                            <div class="date d-inline mx-2"><i class="far fa-calendar ml-2"></i>سال انتشار: <?php the_terms(get_the_ID(),"yaers"); ?></div>
                                            <div class="time d-inline mx-2"><i class="far fa-clock ml-2"></i>زمان فیلم: <?php echo $text_time; ?></div>
                                            <div class="imdb d-inline mx-2"><i class="fab fa-imdb ml-2"></i>امتیاز: <?php echo $text_imbd; ?></div>
                                        </div>
                                        <?php  } ?>
                                        <?php
                                        if ( 'imdb-tabligh' === $select_sethand ){ ?>
                                        <?php
                                        $IMDB = new \IMDB($imbd_link); 
                                        ?>

                                        <div class="col-lg-8 col-12 px-0 text-center text-md-right">
                                            <div class="date d-inline mx-2"><i class="far fa-calendar ml-2"></i>سال انتشار: <?php if ($IMDB->isReady) { print_r($IMDB->getYear()); } else { echo ''; } ?></div>
                                            <div class="time d-inline mx-2"><i class="far fa-clock ml-2"></i>زمان فیلم: <?php if ($IMDB->isReady) { print_r($IMDB->getRuntime()); } else { echo ''; } ?></div>
                                            <div class="imdb d-inline mx-2"><i class="fab fa-imdb ml-2"></i>امتیاز: <?php if ($IMDB->isReady) { print_r($IMDB->getRating()); } else { echo ''; } ?></div>
                                        </div>

                                        <?php  } ?>
                                        <div class="col-lg-4 col-12 px-0 text-center text-md-right text-lg-left pt-5 pt-lg-0">
                                            <a href="<?php the_permalink(); ?>" type="button" class="btn <?php echo $settings['type_buttom_style'] ?> <?php echo $settings['round_buttom_style'] ?>"><?php \Elementor\Icons_Manager::render_icon( $settings['icon_select'], [ 'aria-hidden' => 'true' ] ); ?>دانلود فیلم</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </article>
                        
                    <?php endwhile; wp_reset_postdata(); ?>
                </div>
            </div>
            <?php } ?>
            <?php if($settings['sigma_select_products_lists_style'] == 'style02_products_lists'){ ?>
                <div class="filmer-nft-section">
                    <div class="d-flex flex-wrap">
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
                        $text_time = get_post_meta(get_the_ID(),'text-time',true);
                        $text_img = get_post_meta(get_the_ID(),'img',true);
                        $link_imdb = get_post_meta(get_the_ID(),'link',true);
                        ?>

                        <article class="filmr-card">
                            <a href="<?php the_permalink(); ?>">
                                <div class="header-img" style="background-image:url(<?php echo $text_img; ?>);">
                                    <img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
                                    <div class="right-shadow"></div>
                                    <div class="bottom-shadow"></div>
                                </div>
                            </a>
                            <div class="content-filmer">
                                <h3><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
                                <div class="exerpt">
                                    <p>
                                    <?php echo get_the_excerpt(); ?>
                                    </p>
                                </div>
                                <div class="d-flex content-m">
                                    <div class="save-film mx-2">
                                        <?php global $user_ID; if($user_ID){ ?>
                                            <div class="faverit-button">
                                                <?php echo do_shortcode('[favorite_button]'); ?>
                                            </div> 
                                            <?php }else{ ?>
                                            <div class="faverit-button-error ">
                                                <button class="simplefavorite-button">
                                                    <i class="far fa-bookmark"></i>
                                                </button>
                                            </div> 
                                        <?php } ?>
                                    </div>
                                    <?php
                                    $select_sethand = get_post_meta( get_the_ID(), 'imDb_select', true );
                                    if ( 'defult-select' === $select_sethand ){  ?>
                                    <div class="imdb-filmer d-flex flex-column align-items-center justify-content-center mx-2" title="<?php echo $text_imbd; ?>" data-toggle="tooltip">
                                        <i class="fa-solid fa-star"></i>
                                    </div>
                                    <div class="time-filmer d-flex flex-column align-items-center justify-content-center mx-2">
                                        <i class="fa-regular fa-timer" title="<?php echo $text_time; ?>" data-toggle="tooltip"></i>
                                    </div>
                                    <?php } ?>
                                    <?php
                                    if ( 'imdb-tabligh' === $select_sethand ){ $IMDB = new \IMDB($imbd_link);  ?>
                                    <div class="imdb-filmer d-flex flex-column align-items-center justify-content-center mx-2" title="<?php if ($IMDB->isReady) { print_r($IMDB->getRating()); } else { echo ''; } ?>" data-toggle="tooltip">
                                        <i class="fa-solid fa-star"></i>
                                    </div>
                                    <div class="time-filmer d-flex flex-column align-items-center justify-content-center mx-2">
                                        <i class="fa-regular fa-timer" title="<?php if ($IMDB->isReady) { print_r($IMDB->getRuntime()); } else { echo ''; } ?>" data-toggle="tooltip"></i>
                                    </div>
                                    <?php } ?>
                                </div>
                                <a href="<?php the_permalink(); ?>" class="btn-film <?php echo $settings['type_buttom_style']; ?> <?php echo $settings['round_buttom_style']; ?>">دانلود فیلم</a>
                            </div>
                        </article>

                        <?php endwhile; wp_reset_postdata(); ?>
                    </div>
                </div>
            <?php } ?>
            <?php if($settings['sigma_select_products_lists_style'] == 'style03_products_lists'){ ?>
                <div class="hex-section-film">
                    <div class="row">
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
                        $text_help = get_post_meta(get_the_ID(),'text-help',true);
                        $text_imbd = get_post_meta(get_the_ID(),'text-imDb',true);
                        $text_time = get_post_meta(get_the_ID(),'text-time',true);
                        $text_img = get_post_meta(get_the_ID(),'img',true);
                        ?>

                        <article class="hex-film-card">
                            <div class="row">
                                <div class="col-md-3 col-12 text-center">
                                    <img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
                                    <a href="<?php the_permalink(); ?>" class="stretched-link"></a>
                                </div>
                                <div class="col-md-9 col-12 text-right">
                                    <div class="content-film-hex">
                                        <h2 class="d-flex align-items-center">
                                            <div class="col-6 text-right p-0">
                                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                            </div>
                                            <?php if ( 'yes' === $settings['show_bookmark'] ) {
                                            ?>
                                            <div class="col-6 text-left p-0">
                                                <?php global $user_ID; if($user_ID){ ?>
                                                    <div class="faverit-button">
                                                        <?php echo do_shortcode('[favorite_button]'); ?>
                                                    </div> 
                                                    <?php }else{ ?>
                                                    <div class="faverit-button-error">
                                                        <button class="simplefavorite-button">
                                                            <i class="far fa-bookmark"></i>
                                                        </button>
                                                    </div>
                                                <?php } ?>
                                            </div> 
                                            <?php } ?>  
                                        </h2>  
                                        <p class="more-desc d-none d-lg-block"><?php echo $text_help; ?></p>
                                        <p class="actor text-right"><i class="fa-duotone fa-masks-theater"></i>ژانر:<?php the_terms(get_the_ID(),"ganres"); ?></p>
                                        <?php
                                        $imbd_link = get_post_meta(get_the_ID(),'link',true);
                                        $select_sethand = get_post_meta( get_the_ID(), 'imDb_select', true );
                                        if ( 'defult-select' === $select_sethand ){ ?>
                                        <p class="star text-right"><i class="fa-regular fa-star"></i>امتیاز:<?php echo $text_imbd; ?></p>
                                        <?php } ?>
                                        <?php
                                        if ( 'imdb-tabligh' === $select_sethand ){ $IMDB = new \IMDB($imbd_link); ?>
                                        <p class="star text-right"><i class="fa-regular fa-star"></i>امتیاز:<?php if ($IMDB->isReady) { print_r($IMDB->getRating()); } else { echo ''; } ?></p>
                                        <?php } ?>
                                        <p class="actor text-right"><i class="fa-regular fa-user"></i>کارگردان:<?php the_terms(get_the_ID(),"actors"); ?></p>
                                        <p class="actor text-right"><i class="fa-light fa-users"></i>بازیگران:<?php the_terms(get_the_ID(),"honarmandan"); ?></p>
                                        <p class="desc"><?php echo get_the_excerpt(); ?></p>
                                    </div>     
                                </div>
                            </div>
                            <div class="row pt-5">
                                <div class="col-md-6 col-12"></div>
                                <div class="col-md-6 col-12 text-center text-lg-left text-md-left">
                                    <a href="<?php the_permalink(); ?>" class="hex-film-nft <?php echo $settings['type_buttom_style']; ?> <?php echo $settings['round_buttom_style']; ?>"><?php \Elementor\Icons_Manager::render_icon( $settings['icon_select'], [ 'aria-hidden' => 'true' ] ); ?>ادامه دانلود</a>
                                </div>
                            </div>
                        </article>

                        <?php endwhile; wp_reset_postdata(); ?>
                    </div>
                </div>
            <?php } ?> 
</div>



    <?php
  }

  protected function _content_template(){
    
  }
}