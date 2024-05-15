<?php

namespace WPC\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH')) exit; // Exit if accessed directly


class relate_post extends Widget_Base
{
      public function __construct ($data = [], $args = null) {
		parent::__construct($data, $args);
            wp_register_script('script-relate', get_theme_file_uri('/widget/widgets/relate-post.js'), ['elementor-frontend'], '1.0.0', true);
	}

	public function get_script_depends () {
            
		return ['script-relate'];
            
	}
      public function get_name()
      {
            return 'relative-post';
      }

      public function get_title()
      {
            return 'فیلم های مشابه';
      }

      public function get_icon()
      {
            return 'eicon-gallery-grid';
      }

      public function get_categories()
      {
            return ['five-category'];
      }

      protected function _register_controls()
      {
            $this->start_controls_section(
                  'section_button_style',
                  [
                        'label' => __('تنظیمات عمومی', 'elementor'),
                        'tab' => Controls_Manager::TAB_CONTENT,
                  ]
            );
            $this->add_control(
                  'netflibs_select_products_lists_style',
                  [
                        'label'   => esc_html__('انتخاب استایل', 'netflibs-theme'),
                        'type'    => Controls_Manager::SELECT,
                        'default' => 'style01_products_lists',
                        'options' => [
                              'style01_products_lists' => esc_html__('استایل اول', 'netflibs-theme'),
                              'style02_products_lists' => esc_html__('استایل دوم', 'netflibs-theme'),
                        ],
                  ]
            );
            $this->add_control(
                  'netflibs_select_products_lists_style01',
                  [
                        'raw' => '<img class="admin_select_img_style" src="' . get_template_directory_uri() . '/img/element-img/relate/relate-1-min.png">',
                        'type' => Controls_Manager::RAW_HTML,
                        'condition' => [
                              'netflibs_select_products_lists_style' => 'style01_products_lists',
                        ],
                  ]
            );
            $this->add_control(
                  'netflibs_select_products_lists_style02',
                  [
                        'raw' => '<img  
                              class="admin_select_img_style" src="' . get_template_directory_uri() . '/img/element-img/relate/relate-2-min.png">',
                        'type' => Controls_Manager::RAW_HTML,
                        'condition' => [
                              'netflibs_select_products_lists_style' => 'style02_products_lists',
                        ],
                  ]
            );
            $this->add_control(
                  'post_type',
                  [
                        'label' => __('انتخاب پست تایپ', 'plugin-domain'),
                        'type' => \Elementor\Controls_Manager::SELECT,
                        'default' => 'coagex_movie',
                        'options' => [
                              'coagex_movie'  => __('فیلم و سریال', 'plugin-domain'),
                              'product' => __('ووکامرس', 'plugin-domain'),
                        ],
                  ]
            );
            $this->add_control(
                  'price',
                  [
                        'label' => __('تعداد نمایش', 'plugin-domain'),
                        'type' => \Elementor\Controls_Manager::NUMBER,
                        'min' => 5,
                        'max' => 100,
                        'step' => 1,
                        'default' => 5,
                  ]
            );
            $this->end_controls_section();
            $this->start_controls_section(
                  'section_option_pro',
                  [
                        'label' => __('تنظیمات', 'elementor'),
                        'condition' => [
                              'netflibs_select_products_lists_style' => 'style02_products_lists',
                        ],
                  ]
            );
            $this->add_control(
                  'show_title',
                  [
                        'label' => __('نمایش عنوان', 'plugin-domain'),
                        'type' => \Elementor\Controls_Manager::SWITCHER,
                        'label_on' => __('Show', 'your-plugin'),
                        'label_off' => __('Hide', 'your-plugin'),
                        'return_value' => 'yes',
                        'default' => 'yes',
                  ]
            );
            $this->add_control(
                  'show_imdb',
                  [
                        'label' => __('نمایش امتیاز', 'plugin-domain'),
                        'type' => \Elementor\Controls_Manager::SWITCHER,
                        'label_on' => __('Show', 'your-plugin'),
                        'label_off' => __('Hide', 'your-plugin'),
                        'return_value' => 'yes',
                        'default' => 'yes',
                  ]
            );
            $this->add_control(
                  'show_eye',
                  [
                        'label' => __('نمایش بازدید', 'plugin-domain'),
                        'type' => \Elementor\Controls_Manager::SWITCHER,
                        'label_on' => __('Show', 'your-plugin'),
                        'label_off' => __('Hide', 'your-plugin'),
                        'return_value' => 'yes',
                        'default' => 'yes',
                  ]
            );
            $this->add_control(
                  'show_year',
                  [
                        'label' => __('نمایش سال', 'plugin-domain'),
                        'type' => \Elementor\Controls_Manager::SWITCHER,
                        'label_on' => __('Show', 'your-plugin'),
                        'label_off' => __('Hide', 'your-plugin'),
                        'return_value' => 'yes',
                        'default' => 'yes',
                  ]
            );
            $this->add_control(
                  'show_bookmark',
                  [
                        'label' => __('نمایش بوک مارک', 'plugin-domain'),
                        'type' => \Elementor\Controls_Manager::SWITCHER,
                        'label_on' => __('Show', 'your-plugin'),
                        'label_off' => __('Hide', 'your-plugin'),
                        'return_value' => 'yes',
                        'default' => 'yes',
                  ]
            );
            $this->add_control(
                  'show_arrow',
                  [
                        'label' => __('نمایش دکمه‌های کنار در دسکتاپ', 'plugin-domain'),
                        'type' => \Elementor\Controls_Manager::SWITCHER,
                        'label_on' => __('Show', 'your-plugin'),
                        'label_off' => __('Hide', 'your-plugin'),
                        'return_value' => 'yes',
                        'default' => 'yes',
                  ]
            );
            $this->add_control(
                  'show_arrow_tablet',
                  [
                        'label' => __('نمایش دکمه‌های کنار در تبلت', 'plugin-domain'),
                        'type' => \Elementor\Controls_Manager::SWITCHER,
                        'label_on' => __('Show', 'your-plugin'),
                        'label_off' => __('Hide', 'your-plugin'),
                        'return_value' => 'yes',
                        'default' => 'yes',
                  ]
            );
            $this->add_control(
                  'show_arrow_phone',
                  [
                        'label' => __('نمایش دکمه‌های کنار در موبایل', 'plugin-domain'),
                        'type' => \Elementor\Controls_Manager::SWITCHER,
                        'label_on' => __('Show', 'your-plugin'),
                        'label_off' => __('Hide', 'your-plugin'),
                        'return_value' => 'yes',
                        'default' => 'yes',
                  ]
            );
            $this->add_control(
                  'show_dots',
                  [
                        'label' => __('نمایش دکمه‌های زیر در دسکتاپ', 'plugin-domain'),
                        'type' => \Elementor\Controls_Manager::SWITCHER,
                        'label_on' => __('Show', 'your-plugin'),
                        'label_off' => __('Hide', 'your-plugin'),
                        'return_value' => 'yes',
                        'default' => 'yes',
                  ]
            );
            $this->add_control(
                  'show_dots_tablet',
                  [
                        'label' => __('نمایش دکمه‌های زیر در تبلت', 'plugin-domain'),
                        'type' => \Elementor\Controls_Manager::SWITCHER,
                        'label_on' => __('Show', 'your-plugin'),
                        'label_off' => __('Hide', 'your-plugin'),
                        'return_value' => 'yes',
                        'default' => 'yes',
                  ]
            );
            $this->add_control(
                  'show_dots_phone',
                  [
                        'label' => __('نمایش دکمه‌های زیر در موبایل', 'plugin-domain'),
                        'type' => \Elementor\Controls_Manager::SWITCHER,
                        'label_on' => __('Show', 'your-plugin'),
                        'label_off' => __('Hide', 'your-plugin'),
                        'return_value' => 'yes',
                        'default' => 'yes',
                  ]
            );
            $this->add_control(
                  'show_center',
                  [
                        'label' => __('نمایش وسط', 'plugin-domain'),
                        'type' => \Elementor\Controls_Manager::SWITCHER,
                        'label_on' => __('Show', 'your-plugin'),
                        'label_off' => __('Hide', 'your-plugin'),
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
                  'section_relate_post',
                  [
                        'label' => __('استایل عمومی', 'elementor'),
                        'tab' => Controls_Manager::TAB_STYLE,
                  ]
            );
            $this->add_control(
                  'margin_site',
                  [
                        'label' => __('فاصله', 'elementor'),
                        'type' => Controls_Manager::DIMENSIONS,
                        'size_units' => ['px', '%'],
                        'selectors' => [
                              '{{WRAPPER}} .header-top-section,.relativ-post-slider .movie-new-item' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                  ]
            );
            $this->add_control(
                  'padding_site',
                  [
                        'label' => __('پدینگ', 'elementor'),
                        'type' => Controls_Manager::DIMENSIONS,
                        'size_units' => ['px', '%'],
                        'selectors' => [
                              '{{WRAPPER}} .header-top-section,.relativ-post-slider .movie-new-item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                  ]
            );

            $this->add_control(
                  'border_site',
                  [
                        'label' => __('گوشه های مدور', 'elementor'),
                        'type' => Controls_Manager::DIMENSIONS,
                        'size_units' => ['px', '%'],
                        'selectors' => [
                              '{{WRAPPER}} .header-top-section,.relativ-post-slider .movie-new-item' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                  ]
            );
            $this->add_group_control(
                  \Elementor\Group_Control_Background::get_type(),
                  [
                        'name' => 'background_cl_hover',
                        'label' => esc_html__('Background', 'plugin-name'),
                        'types' => ['classic', 'gradient'],
                        'selector' => '{{WRAPPER}} .header-top-section,.relativ-post-slider .movie-new-item',
                  ]
            );
            $this->add_group_control(
                  \Elementor\Group_Control_Box_Shadow::get_type(),
                  [
                        'name' => 'box_right_buttom',
                        'label' => __('باکس شدوو', 'plugin-domain'),
                        'selector' => '{{WRAPPER}} .header-top-section,.relativ-post-slider .movie-new-item',
                  ]
            );
            $this->add_control(
                  'more_options_border_right',
                  [
                        'label' => __('تنظیمات بردر', 'plugin-name'),
                        'type' => \Elementor\Controls_Manager::HEADING,
                        'separator' => 'before',
                  ]
            );
            $this->add_control(
                  'border_style',
                  [
                        'label' => __('استایل بردر', 'plugin-domain'),
                        'type' => \Elementor\Controls_Manager::SELECT,
                        'default' => 'none',
                        'options' => [
                              'solid'  => __('Solid', 'plugin-domain'),
                              'dashed' => __('Dashed', 'plugin-domain'),
                              'dotted' => __('Dotted', 'plugin-domain'),
                              'double' => __('Double', 'plugin-domain'),
                              'groove' => __('Groove', 'plugin-domain'),
                              'ridge' => __('Ridge', 'plugin-domain'),
                              'none' => __('None', 'plugin-domain'),
                        ],
                        'selectors' => [
                              '{{WRAPPER}} .header-top-section,.relativ-post-slider .movie-new-item' => 'border-style: {{VALUE}}',
                        ],
                  ]
            );
            $this->add_responsive_control(
                  'width_border',
                  [
                        'label' => __('عرض بردر', 'elementor'),
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
                        'size_units' => ['px'],
                        'range' => [
                              'px' => [
                                    'min' => 1,
                                    'max' => 1000,
                              ],
                        ],
                        'selectors' => [
                              '{{WRAPPER}} .header-top-section,.relativ-post-slider .movie-new-item' => 'border-width: {{SIZE}}{{UNIT}};',
                        ],
                  ]
            );
            $this->add_control(
                  'bg_button',
                  [
                        'label' => __('رنگ بردر', 'plugin-domain'),
                        'type' => Controls_Manager::COLOR,
                        'default' => '',
                        'selectors' => [
                              '{{WRAPPER}} .header-top-section,.relativ-post-slider .movie-new-item' => 'border-color: {{VALUE}}',
                        ],
                  ]
            );
            $this->end_controls_section();
            $this->start_controls_section(
                  'section_relate_style_1',
                  [
                        'label' => __('استایل عمومی', 'elementor'),
                        'tab' => Controls_Manager::TAB_STYLE,
                        'condition' => [
                              'netflibs_select_products_lists_style' => 'style01_products_lists',
                        ],
                  ]
            );
            $this->add_control(
                  'number_color',
                  [
                        'label' => __('رنگ متن', 'plugin-domain'),
                        'type' => Controls_Manager::COLOR,
                        'default' => '',
                        'selectors' => [
                              '{{WRAPPER}} .header-top-section .media .media-body h5 a' => 'color: {{VALUE}}',
                        ],
                  ]
            );
            
            $this->add_control(
                  'number_color_hover',
                  [
                        'label' => __('هاور متن', 'plugin-domain'),
                        'type' => Controls_Manager::COLOR,
                        'default' => '',
                        'selectors' => [
                              '{{WRAPPER}} .header-top-section .media .media-body h5 a:hover' => 'color: {{VALUE}}',
                        ],
                  ]
            );
            $this->add_group_control(
                  \Elementor\Group_Control_Typography::get_type(),
                  [
                        'name' => 'content_typography',
                        'label' => __('تایپوگرافی متن', 'plugin-domain'),
                        'selector' => '{{WRAPPER}} .header-top-section .media .media-body h5 a',
                  ]
            );
            $this->add_control(
                  'more_text',
                  [
                        'label' => __('استایل زیر عنوان', 'plugin-name'),
                        'type' => \Elementor\Controls_Manager::HEADING,
                        'separator' => 'before',
                  ]
            );
            $this->add_control(
                  'icon_color',
                  [
                        'label' => __('رنگ آیکون و متن', 'plugin-domain'),
                        'type' => Controls_Manager::COLOR,
                        'default' => '',
                        'selectors' => [
                              '{{WRAPPER}} .header-top-section .media .media-body span' => 'color: {{VALUE}}',
                        ],
                  ]
            );
            $this->add_group_control(
                  \Elementor\Group_Control_Typography::get_type(),
                  [
                        'name' => 'icon_typography',
                        'label' => __('تایپوگرافی آیکون و متن', 'plugin-domain'),
                        'selector' => '{{WRAPPER}} .header-top-section .media .media-body span',
                  ]
            );
            $this->add_control(
                  'more_img',
                  [
                        'label' => __('استایل تصویر', 'plugin-name'),
                        'type' => \Elementor\Controls_Manager::HEADING,
                        'separator' => 'before',
                  ]
            );
            $this->add_group_control(
                  \Elementor\Group_Control_Box_Shadow::get_type(),
                  [
                        'name' => 'box_img_buttom',
                        'label' => __('باکس شدوو', 'plugin-domain'),
                        'selector' => '{{WRAPPER}} .header-top-section .media img',
                  ]
            );
            $this->add_control(
                  'border_site_img',
                  [
                        'label' => __('گوشه های مدور', 'elementor'),
                        'type' => Controls_Manager::DIMENSIONS,
                        'size_units' => ['px', '%'],
                        'selectors' => [
                              '{{WRAPPER}} .header-top-section .media img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                  ]
            );
            $this->add_control(
                  'hover_img_bg',
                  [
                        'label' => __('استایل باکس فیلم', 'plugin-name'),
                        'type' => \Elementor\Controls_Manager::HEADING,
                        'separator' => 'before',
                  ]
            );
            $this->add_group_control(
                  \Elementor\Group_Control_Box_Shadow::get_type(),
                  [
                        'name' => 'box_bg_hover',
                        'label' => __('باکس شدوو', 'plugin-domain'),
                        'selector' => '{{WRAPPER}} .header-top-section .media:hover',
                  ]
            );
            $this->add_control(
                  'border_bg_hover',
                  [
                        'label' => __('گوشه های مدور', 'elementor'),
                        'type' => Controls_Manager::DIMENSIONS,
                        'size_units' => ['px', '%'],
                        'selectors' => [
                              '{{WRAPPER}} .header-top-section .media:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                  ]
            );
            $this->add_group_control(
                  \Elementor\Group_Control_Background::get_type(),
                  [
                        'name' => 'background_media_hover',
                        'label' => esc_html__('هاور', 'plugin-name'),
                        'types' => ['classic', 'gradient'],
                        'selector' => '{{WRAPPER}} .header-top-section .media:hover',
                  ]
            );
            $this->end_controls_section();
            $this->start_controls_section(
                  'section_relate_style_2',
                  [
                        'label' => __('استایل عمومی', 'elementor'),
                        'tab' => Controls_Manager::TAB_STYLE,
                        'condition' => [
                              'netflibs_select_products_lists_style' => 'style02_products_lists',
                        ],
                  ]
            );
            $this->add_control(
                  'titre_color',
                  [
                        'label' => __('رنگ عنوان', 'plugin-domain'),
                        'type' => Controls_Manager::COLOR,
                        'default' => '',
                        'selectors' => [
                              '{{WRAPPER}} .relativ-post-slider .movie-new-item ficaption h2 a,.hex-card-nft h4 a' => 'color: {{VALUE}}',
                        ],
                  ]
            );
            $this->add_control(
                  'titre_hover',
                  [
                        'label' => __('هاور عنوان', 'plugin-domain'),
                        'type' => \Elementor\Controls_Manager::COLOR,
                        'default' => '',
                        'selectors' => [
                              '{{WRAPPER}} .relativ-post-slider .movie-new-item ficaption h2 a:hover,.hex-card-nft h4 a:hover' => 'color: {{VALUE}}',
                        ],
                  ]
            );
            $this->add_group_control(
                  \Elementor\Group_Control_Typography::get_type(),
                  [
                        'name' => 'title_typography',
                        'label' => __('تایپوگرافی عنوان', 'plugin-domain'),
                        'selector' => '{{WRAPPER}} .relativ-post-slider .movie-new-item ficaption h2 a,.hex-card-nft h4 a',
                  ]
            );
            $this->add_control(
                  'imdb_color',
                  [
                        'label' => __('رنگ امتیاز', 'plugin-domain'),
                        'type' => Controls_Manager::COLOR,
                        'default' => '',
                        'selectors' => [
                              '{{WRAPPER}} .relativ-post-slider .movie-new-item ficaption .movie-new-footer .star' => 'color: {{VALUE}}',
                        ],
                        
                  ]
            );
            $this->add_group_control(
                  \Elementor\Group_Control_Typography::get_type(),
                  [
                        'name' => 'imDb_typography',
                        'label' => __('تایپوگرافی امتیاز', 'plugin-domain'),
                        'selector' => '{{WRAPPER}} .relativ-post-slider .movie-new-item ficaption .movie-new-footer .star',
                        
                  ]
            );
            $this->add_control(
                  'view_color',
                  [
                        'label' => __('رنگ تعداد بازدید', 'plugin-domain'),
                        'type' => Controls_Manager::COLOR,
                        'default' => '',
                        'selectors' => [
                              '{{WRAPPER}} .relativ-post-slider .movie-new-item ficaption .movie-new-footer .eye' => 'color: {{VALUE}}',

                        ],
                        
                  ]
            );
            $this->add_group_control(
                  \Elementor\Group_Control_Typography::get_type(),
                  [
                        'name' => 'view_typography',
                        'label' => __('تایپوگرافی بازدید', 'plugin-domain'),
                        'selector' => '{{WRAPPER}} .relativ-post-slider .movie-new-item ficaption .movie-new-footer .eye',
                        
                  ]
            );
            $this->add_control(
                  'yaer_color',
                  [
                        'label' => __('رنگ تاریخ', 'plugin-domain'),
                        'type' => Controls_Manager::COLOR,
                        'default' => '',
                        'selectors' => [
                              '{{WRAPPER}} .relativ-post-slider .movie-new-item ficaption .movie-new-footer .year, .relativ-post-slider .movie-new-item ficaption .movie-new-footer .year a' => 'color: {{VALUE}}',

                        ],
                        
                  ]
            );
            $this->add_group_control(
                  \Elementor\Group_Control_Typography::get_type(),
                  [
                        'name' => 'year_typography',
                        'label' => __('تایپوگرافی تاریخ', 'plugin-domain'),
                        'selector' => '{{WRAPPER}} .relativ-post-slider .movie-new-item ficaption .movie-new-footer .year, .relativ-post-slider .movie-new-item ficaption .movie-new-footer .year',
                        
                  ]
            );
            $this->add_control(
                  'bookmark_bg',
                  [
                        'label' => __('رنگ پس زمینه بوک مارک', 'plugin-domain'),
                        'type' => Controls_Manager::COLOR,
                        'default' => '',
                        'selectors' => [
                              '{{WRAPPER}} .relativ-post-slider .movie-new-item ficaption .faverit-button button.simplefavorite-button' => 'background: {{VALUE}}',
                        ],

                  ]
            );
            $this->add_control(
                  'bookmark_color',
                  [
                        'label' => __('رنگ آیکون بوک مارک', 'plugin-domain'),
                        'type' => Controls_Manager::COLOR,
                        'default' => '',
                        'selectors' => [
                              '{{WRAPPER}} .relativ-post-slider .movie-new-item ficaption .faverit-button button.simplefavorite-button svg' => 'color: {{VALUE}}',
                        ],
                  ]
            );
            $this->end_controls_section();
            $this->start_controls_section(
                  'section_botton_style',
                  [
                        'label' => __('تنظیمات دکمه‌های کنار', 'elementor'),
                        'tab' => Controls_Manager::TAB_STYLE,
                        'condition' => [
                              'netflibs_select_products_lists_style' => 'style02_products_lists',
                        ],
                  ]
            );
            $this->add_control(
                  'padding_right_buttom',
                  [
                        'label' => __('پدینگ', 'elementor'),
                        'type' => Controls_Manager::DIMENSIONS,
                        'size_units' => ['px', '%'],
                        'selectors' => [
                              '{{WRAPPER}} .relativ-post-slider button.owl-next, .relativ-post-slider button.owl-prev' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                        ],
                  ]
            );
            $this->add_control(
                  'margin_right_buttom',
                  [
                        'label' => __('فاصله', 'elementor'),
                        'type' => Controls_Manager::DIMENSIONS,
                        'size_units' => ['px', '%'],
                        'selectors' => [
                              '{{WRAPPER}} .relativ-post-slider button.owl-next, .relativ-post-slider button.owl-prev' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                        ],
                  ]
            );
            $this->add_control(
                  'border_right_buttom',
                  [
                        'label' => __('گوشه‌های مدور', 'elementor'),
                        'type' => Controls_Manager::DIMENSIONS,
                        'size_units' => ['px', '%'],
                        'selectors' => [
                              '{{WRAPPER}} .relativ-post-slider button.owl-next, .relativ-post-slider button.owl-prev' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                        ],
                  ]
            );
            $this->add_control(
                  'background_right_buttom',
                  [
                        'label' => __('رنگ پس زمینه', 'plugin-domain'),
                        'type' => Controls_Manager::COLOR,
                        'default' => '',
                        'selectors' => [
                              '{{WRAPPER}} .relativ-post-slider button.owl-next, .relativ-post-slider button.owl-prev' => 'background: {{VALUE}} !important',
                        ],
                  ]
            );
            $this->add_control(
                  'background_right_buttom_hover',
                  [
                        'label' => __('هاور پس زمینه', 'plugin-domain'),
                        'type' => Controls_Manager::COLOR,
                        'default' => '',
                        'selectors' => [
                              '{{WRAPPER}} .relativ-post-slider button.owl-next:hover, .relativ-post-slider button.owl-prev:hover' => 'background: {{VALUE}} !important',
                        ],
                  ]
            );
            $this->add_control(
                  'color_right_buttom',
                  [
                        'label' => __('رنگ دکمه', 'plugin-domain'),
                        'type' => Controls_Manager::COLOR,
                        'default' => '',
                        'selectors' => [
                              '{{WRAPPER}} .relativ-post-slider button.owl-next span, .relativ-post-slider button.owl-prev span' => 'color: {{VALUE}} !important',
                        ],
                  ]
            );
            $this->add_control(
                  'color_right_buttom_hover',
                  [
                        'label' => __('هاور دکمه', 'plugin-domain'),
                        'type' => Controls_Manager::COLOR,
                        'default' => '',
                        'selectors' => [
                              '{{WRAPPER}} .relativ-post-slider button.owl-next span:hover, .relativ-post-slider button.owl-prev span:hover' => 'color: {{VALUE}} !important',
                        ],
                  ]
            );
            $this->add_group_control(
                  \Elementor\Group_Control_Box_Shadow::get_type(),
                  [
                        'name' => 'box_right_buttom',
                        'label' => __('باکس شدوو', 'plugin-domain'),
                        'selector' => '{{WRAPPER}} .relativ-post-slider button.owl-next, .relativ-post-slider button.owl-prev',
                  ]
            );
            $this->add_group_control(
                  \Elementor\Group_Control_Typography::get_type(),
                  [
                        'name' => 'desc_typography',
                        'label' => __('تایپوگرافی', 'plugin-domain'),
                        'selector' => '{{WRAPPER}} .relativ-post-slider button.owl-next span, .relativ-post-slider button.owl-prev span',
                  ]
            );
            $this->add_control(
                  'more_options_border_right',
                  [
                        'label' => __('تنظیمات بردر', 'plugin-name'),
                        'type' => \Elementor\Controls_Manager::HEADING,
                        'separator' => 'before',
                  ]
            );
            $this->add_control(
                  'border_style',
                  [
                        'label' => __('استایل بردر', 'plugin-domain'),
                        'type' => \Elementor\Controls_Manager::SELECT,
                        'default' => 'none',
                        'options' => [
                              'solid'  => __('Solid', 'plugin-domain'),
                              'dashed' => __('Dashed', 'plugin-domain'),
                              'dotted' => __('Dotted', 'plugin-domain'),
                              'double' => __('Double', 'plugin-domain'),
                              'groove' => __('Groove', 'plugin-domain'),
                              'ridge' => __('Ridge', 'plugin-domain'),
                              'none' => __('None', 'plugin-domain'),
                        ],
                        'selectors' => [
                              '{{WRAPPER}} .relativ-post-slider button.owl-next, .relativ-post-slider button.owl-prev' => 'border-style: {{VALUE}}',
                        ],
                  ]
            );
            $this->add_responsive_control(
                  'width_border',
                  [
                        'label' => __('عرض بردر', 'elementor'),
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
                        'size_units' => ['%', 'px', 'vw'],
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
                              '{{WRAPPER}} .relativ-post-slider button.owl-next, .relativ-post-slider button.owl-prev' => 'border-width: {{SIZE}}{{UNIT}};',
                        ],
                  ]
            );
            $this->add_control(
                  'bg_button',
                  [
                        'label' => __('رنگ بردر', 'plugin-domain'),
                        'type' => Controls_Manager::COLOR,
                        'default' => '',
                        'selectors' => [
                              '{{WRAPPER}} .relativ-post-slider button.owl-next, .relativ-post-slider button.owl-prev' => 'border-color: {{VALUE}}',
                        ],
                  ]
            );
            $this->add_control(
                  'more_options',
                  [
                        'label' => __('تنظیمات دکمه سمت چپ', 'plugin-name'),
                        'type' => \Elementor\Controls_Manager::HEADING,
                        'separator' => 'before',
                  ]
            );
            $this->add_responsive_control(
                  'top_right',
                  [
                        'label' => __('بالا', 'elementor'),
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
                        'size_units' => ['%', 'px', 'vw'],
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
                              '{{WRAPPER}} .relativ-post-slider button.owl-next' => 'top: {{SIZE}}{{UNIT}};',
                        ],
                  ]
            );
            $this->add_responsive_control(
                  'right_right',
                  [
                        'label' => __('راست', 'elementor'),
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
                        'size_units' => ['%', 'px', 'vw'],
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
                              '{{WRAPPER}} .relativ-post-slider button.owl-next' => 'right: {{SIZE}}{{UNIT}};',
                        ],
                  ]
            );
            $this->add_responsive_control(
                  'bottom_right',
                  [
                        'label' => __('پایین', 'elementor'),
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
                        'size_units' => ['%', 'px', 'vw'],
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
                              '{{WRAPPER}} .relativ-post-slider button.owl-next' => 'bottom: {{SIZE}}{{UNIT}};',
                        ],
                  ]
            );
            $this->add_responsive_control(
                  'left_right',
                  [
                        'label' => __('چپ', 'elementor'),
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
                        'size_units' => ['%', 'px', 'vw'],
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
                              '{{WRAPPER}} .relativ-post-slider button.owl-next' => 'left: {{SIZE}}{{UNIT}};',
                        ],
                  ]
            );
            /*----left-botton----*/
            $this->add_control(
                  'more_options_left',
                  [
                        'label' => __('تنظیمات دکمه سمت راست', 'plugin-name'),
                        'type' => \Elementor\Controls_Manager::HEADING,
                        'separator' => 'before',
                  ]
            );
            $this->add_responsive_control(
                  'top_left',
                  [
                        'label' => __('بالا', 'elementor'),
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
                        'size_units' => ['%', 'px', 'vw'],
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
                              '{{WRAPPER}} .relativ-post-slider button.owl-prev' => 'top: {{SIZE}}{{UNIT}};',
                        ],
                  ]
            );
            $this->add_responsive_control(
                  'right_left',
                  [
                        'label' => __('راست', 'elementor'),
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
                        'size_units' => ['%', 'px', 'vw'],
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
                              '{{WRAPPER}} .relativ-post-slider button.owl-prev' => 'right: {{SIZE}}{{UNIT}};',
                        ],
                  ]
            );
            $this->add_responsive_control(
                  'bottom_left',
                  [
                        'label' => __('پایین', 'elementor'),
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
                        'size_units' => ['%', 'px', 'vw'],
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
                              '{{WRAPPER}} .relativ-post-slider button.owl-prev' => 'bottom: {{SIZE}}{{UNIT}};',
                        ],
                  ]
            );
            $this->add_responsive_control(
                  'left_left',
                  [
                        'label' => __('چپ', 'elementor'),
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
                        'size_units' => ['%', 'px', 'vw'],
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
                              '{{WRAPPER}} .relativ-post-slider button.owl-prev' => 'left: {{SIZE}}{{UNIT}};',
                        ],
                  ]
            );
            $this->end_controls_section();
            $this->start_controls_section(
                  'section_dots_style',
                  [
                        'label' => __('تنظیمات دکمه‌های زیر', 'elementor'),
                        'tab' => Controls_Manager::TAB_STYLE,
                        'condition' => [
                              'netflibs_select_products_lists_style' => 'style02_products_lists',
                        ],
                  ]
            );
            $this->add_control(
                  'display_ib',
                  [
                        'label' => __('سبک نمایش', 'plugin-domain'),
                        'type' => \Elementor\Controls_Manager::SELECT,
                        'default' => 'inline',
                        'options' => [
                              'inline'  => __('افقی', 'plugin-domain'),
                              'block' => __('عمودی', 'plugin-domain'),
                        ],
                        'selectors' => [
                              '{{WRAPPER}} .relativ-post-slider .owl-dots button.owl-dot' => 'display: {{UNIT}};',
                        ],
                  ]
            );
            $this->add_control(
                  'bg_button_active',
                  [
                        'label' => __('رنگ دکمه فعال', 'plugin-domain'),
                        'type' => Controls_Manager::COLOR,
                        'default' => '',
                        'selectors' => [
                              '{{WRAPPER}} .relativ-post-slider .owl-dots button.active' => 'background: {{VALUE}} !important',
                        ],
                  ]
            );
            $this->add_control(
                  'border_doct_active',
                  [
                        'label' => __('گوشه‌های مدور دکمه فعال', 'elementor'),
                        'type' => Controls_Manager::DIMENSIONS,
                        'size_units' => ['px', '%'],
                        'selectors' => [
                              '{{WRAPPER}} .relativ-post-slider .owl-dots button.active' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                        ],
                  ]
            );
            $this->add_responsive_control(
                  'width_dots_active',
                  [
                        'label' => __('عرض دکمه فعال', 'elementor'),
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
                        'size_units' => ['%', 'px', 'vw'],
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
                              '{{WRAPPER}} .relativ-post-slider .owl-dots button.active' => 'width: {{SIZE}}{{UNIT}} !important;',
                        ],
                  ]
            );
            $this->add_responsive_control(
                  'height_dots_active',
                  [
                        'label' => __('ارتفاع دکمه فعال', 'elementor'),
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
                        'size_units' => ['%', 'px', 'vw'],
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
                              '{{WRAPPER}} .relativ-post-slider .owl-dots button.active' => 'height: {{SIZE}}{{UNIT}} !important;',
                        ],
                  ]
            );
            /**---------------------active-------------- */
            $this->add_control(
                  'border_doct',
                  [
                        'label' => __('گوشه‌های مدور', 'elementor'),
                        'type' => Controls_Manager::DIMENSIONS,
                        'size_units' => ['px', '%'],
                        'selectors' => [
                              '{{WRAPPER}} .relativ-post-slider .owl-dots button.owl-dot' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                  ]
            );
            $this->add_control(
                  'margin_doct',
                  [
                        'label' => __('فاصله', 'elementor'),
                        'type' => Controls_Manager::DIMENSIONS,
                        'size_units' => ['px', '%'],
                        'selectors' => [
                              '{{WRAPPER}} .relativ-post-slider .owl-dots button.owl-dot' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                  ]
            );
            $this->add_control(
                  'background_doct',
                  [
                        'label' => __('رنگ دکمه', 'plugin-domain'),
                        'type' => Controls_Manager::COLOR,
                        'default' => '',
                        'selectors' => [
                              '{{WRAPPER}} .relativ-post-slider .owl-dots button.owl-dot' => 'background: {{VALUE}}',
                        ],
                  ]
            );
            $this->add_responsive_control(
                  'width_dots',
                  [
                        'label' => __('عرض', 'elementor'),
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
                        'size_units' => ['%', 'px', 'vw'],
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
                              '{{WRAPPER}} .relativ-post-slider .owl-dots button.owl-dot' => 'width: {{SIZE}}{{UNIT}};',
                        ],
                  ]
            );
            $this->add_responsive_control(
                  'height_dots',
                  [
                        'label' => __('ارتفاع', 'elementor'),
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
                        'size_units' => ['%', 'px', 'vw'],
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
                              '{{WRAPPER}} .relativ-post-slider .owl-dots button.owl-dot' => 'height: {{SIZE}}{{UNIT}};',
                        ],
                  ]
            );
            /*----left-botton----*/
            $this->add_control(
                  'more_options_dots',
                  [
                        'label' => __('جایگاه دکمه‌های زیر', 'plugin-name'),
                        'type' => \Elementor\Controls_Manager::HEADING,
                        'separator' => 'before',
                  ]
            );

            $this->add_responsive_control(
                  'top_left_dots',
                  [
                        'label' => __('بالا', 'elementor'),
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
                        'size_units' => ['%', 'px', 'vw'],
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
                              '{{WRAPPER}} .relativ-post-slider .owl-dots' => 'top: {{SIZE}}{{UNIT}};',
                        ],
                  ]
            );
            $this->add_responsive_control(
                  'right_left_dots',
                  [
                        'label' => __('راست', 'elementor'),
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
                        'size_units' => ['%', 'px', 'vw'],
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
                              '{{WRAPPER}} .relativ-post-slider .owl-dots' => 'right: {{SIZE}}{{UNIT}};',
                        ],
                  ]
            );
            $this->add_responsive_control(
                  'bottom_left_dots',
                  [
                        'label' => __('پایین', 'elementor'),
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
                        'size_units' => ['%', 'px', 'vw'],
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
                              '{{WRAPPER}} .relativ-post-slider .owl-dots' => 'bottom: {{SIZE}}{{UNIT}};',
                        ],
                  ]
            );
            $this->add_responsive_control(
                  'left_left_dots',
                  [
                        'label' => __('چپ', 'elementor'),
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
                        'size_units' => ['%', 'px', 'vw'],
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
                              '{{WRAPPER}} .relativ-post-slider .owl-dots' => 'left: {{SIZE}}{{UNIT}};',
                        ],
                  ]
            );
            $this->end_controls_section();
            
      }


      protected function render()
      {
            $settings = $this->get_settings_for_display();
            if (isset($settings['loop-car-slider']) && $settings['loop-car-slider'] === 'yes') {
                  $loop = true;
            } else {
                  $loop = false;
            };
            if (isset($settings['show_arrow']) && $settings['show_arrow'] === 'yes') {
                  $arrow = true;
            } else {
                  $arrow = false;
            };
            if (isset($settings['show_arrow_tablet']) && $settings['show_arrow_tablet'] === 'yes') {
                  $arrow_tablet = true;
            } else {
                  $arrow_tablet = false;
            };
            if (isset($settings['show_arrow_phone']) && $settings['show_arrow_phone'] === 'yes') {
                  $arrow_phone = true;
            } else {
                  $arrow_phone = false;
            };
            if (isset($settings['show_dots']) && $settings['show_dots'] === 'yes') {
                  $docts = true;
            } else {
                  $docts = false;
            };
            if (isset($settings['show_dots_tablet']) && $settings['show_dots_tablet'] === 'yes') {
                  $docts_tablet = true;
            } else {
                  $docts_tablet = false;
            };
            if (isset($settings['show_dots_phone']) && $settings['show_dots_phone'] === 'yes') {
                  $docts_phone = true;
            } else {
                  $docts_phone = false;
            };
            if (isset($settings['show_center']) && $settings['show_center'] === 'yes') {
                  $center = true;
            } else {
                  $center = false;
            };
            if (isset($settings['autoplay-car-slider']) && $settings['autoplay-car-slider'] === 'yes') {
                  $autoplay = true;
            } else {
                  $autoplay = false;
            }
            if (isset($settings['widget_post_num_th'])) {
                  $widget_post_num = $settings['widget_post_num_th'];
            } else {
                  $widget_post_num = 4;
            }
            if (isset($settings['widget_post_num_th_t'])) {
                  $widget_post_num_t = $settings['widget_post_num_th_t'];
            } else {
                  $widget_post_num_t = 4;
            }

            if (isset($settings['widget_post_num_th_m'])) {
                  $widget_post_num_m = $settings['widget_post_num_th_m'];
            } else {
                  $widget_post_num_m = 4;
            }

            $config = [
                  'autoplay'           => $autoplay,
                  'loop'               => $loop,
                  'nav'               => $arrow,
                  'nav_tablet'        => $arrow_tablet,
                  'nav_phone'        => $arrow_phone,
                  'docts'               => $docts,
                  'docts_tablet'        => $docts_tablet,
                  'docts_phone'         => $docts_phone,
                  'center'               => $center,
                  'widgetPostNum'      => $widget_post_num,
                  'widgetPostNum_t'      => $widget_post_num_t,
                  'widgetPostNum_m'      => $widget_post_num_m,
            ];
?>
            <?php if ($settings['netflibs_select_products_lists_style'] == 'style01_products_lists') { ?>

                  <div class="header-top-section">
                        <div class="row mb-3 mt-3">
                              <?php
                              $post_type = $settings['post_type'];
                              $tax = $settings['price'];
                              global $post;
                              $related = get_posts(array('category__in' => wp_get_post_categories($post->ID), 'numberposts' => $tax, 'post_type' => $post_type, 'post__not_in' => array($post->ID)));
                              if ($related) foreach ($related as $post) {
                                    setup_postdata($post);
                              ?>

                                    <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                          <div class="media">
                                                <a href="<?php the_permalink(); ?>"><img src="<?php the_post_thumbnail_url(); ?>" class="ml-3" alt="<?php the_title(); ?>"></a>
                                                <div class="media-body text-right mt-1">
                                                      <h5 class="mt-1 mb-3"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                                                      <span><i class="far fa-calendar"></i><?php echo get_the_date('d F'); ?></span>
                                                </div>
                                          </div>
                                    </div>

                              <?php
                              }
                              wp_reset_postdata();
                              ?>
                        </div>
                  </div>

            <?php  } ?>
            <?php if ($settings['netflibs_select_products_lists_style'] == 'style02_products_lists') { ?>
                  <div class="col-lg-12 col-md-12 col-12">
                        <div class="movie-slider relativ-post-slider owl-carousel owl-theme" data-options='<?php echo (json_encode($config)); ?>'>
                              <?php
                              $imbd_link = get_post_meta(get_the_ID(), 'link', true);
                              $IMDB = new \IMDB($imbd_link);
                              $post_type = $settings['post_type'];
                              $tax = $settings['price'];
                              global $post;
                              $related = get_posts(array('category__in' => wp_get_post_categories($post->ID), 'numberposts' => $tax, 'post_type' => $post_type, 'post__not_in' => array($post->ID)));
                              if ($related) foreach ($related as $post) {
                                    setup_postdata($post);
                                    
                              ?>
                              <div class="movie-new-item item">
                            <figure class="figure">
                                <a href="<?php the_permalink(); ?>"><img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>" class="img-fluid figure-img"></a>
                            </figure>
                            <ficaption class="figure-caption text-right">
                                <div class="movie-new-content mb-2">
                                <?php if ( 'yes' === $settings['show_title'] ) {
                                    ?>
                                    <h2><a href="<?php the_permalink(); ?>" data-toggle="tooltip" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>  
                                    <?php
                                } ?>
                                    
                                </div>
                                <?php 
                                    $imbd_link = get_post_meta(get_the_ID(),'link',true);
                                    $text_imbd = get_post_meta(get_the_ID(),'text-imDb',true); 
                                    ?>
                                    <?php
                                    $select_sethand = get_post_meta( get_the_ID(), 'imDb_select', true );
                                    if ( 'defult-select' === $select_sethand ){ ?>
                                <div class="movie-new-footer">
                                <?php if ( 'yes' === $settings['show_imdb'] ) {
                                ?>
                                <span class="star ml-3"><i class="fas fa-star"></i><?php echo $text_imbd; ?></span>
                                <?php   
                                } ?>
                                <?php if ( 'yes' === $settings['show_eye'] ) {
                                ?>
                                <span class="eye"><i class="fas fa-eye"></i><?php the_views(); ?></span>
                                <?php   
                                } ?>
                                <?php if ( 'yes' === $settings['show_year'] ) {
                                ?>
                                <span class="year float-left years"><?php the_terms(get_the_ID(),"yaers"); ?></span>
                                <?php   
                                } ?>
                                <?php if ( 'yes' === $settings['show_bookmark'] ) {
                                    ?>
                                <?php global $user_ID; ?> 
                                    <?php if($user_ID){ ?>
                                        <div class="position-absolute faverit-button  ">
                                            <?php echo do_shortcode('[favorite_button]'); ?>
                                        </div> 
                                        <?php }else{ ?>
                                        <div class="position-absolute faverit-button-error  ">
                                            <button class="simplefavorite-button">
                                                <i class="far fa-bookmark"></i>
                                            </button>
                                        </div> 
                                    <?php } ?>
                                <?php   
                                } ?>
                                </div>
                                <?php
                                }
                                ?>
                                <?php
                                if ( 'imdb-tabligh' === $select_sethand ){ ?>
                                <?php
                                $IMDB = new \IMDB($imbd_link); 
                                ?>
                                <div class="movie-new-footer">
                                    <?php if ( 'yes' === $settings['show_imdb'] ) {
                                    ?>
                                    <span class="star ml-3"><i class="fas fa-star"></i><?php if ($IMDB->isReady) { print_r($IMDB->getRating()); } else { echo ''; } ?></span>
                                    <?php   
                                    } ?>
                                    <?php if ( 'yes' === $settings['show_eye'] ) {
                                    ?>
                                    <span class="eye"><i class="fas fa-eye"></i><?php the_views(); ?></span>
                                    <?php   
                                    } ?>
                                    <?php if ( 'yes' === $settings['show_year'] ) {
                                    ?>
                                    <span class="year float-left"><?php if ($IMDB->isReady) { print_r($IMDB->getYear()); } else { echo ''; } ?></span>
                                    <?php   
                                    } ?> 
                                    <?php if ( 'yes' === $settings['show_bookmark'] ) {
                                    ?>
                                    <?php if($user_ID){ ?>
                                        <div class="position-absolute faverit-button  ">
                                            <?php echo do_shortcode('[favorite_button]'); ?>
                                        </div> 
                                        <?php }else{ ?>
                                        <div class="position-absolute faverit-button-error  ">
                                            <button class="simplefavorite-button">
                                                <i class="far fa-bookmark"></i>
                                            </button>
                                        </div> 
                                    <?php } ?>
                                    <?php   
                                    } ?> 
                                </div>
                                <?php
                                }
                                ?>
                            </ficaption>
                        </div>
                              <?php
                              }
                              wp_reset_postdata();
                              ?>
                        </div>
                  </div>
            <?php } ?>


<?php

      }
      protected function _content_template()
      {
      }
}
?>