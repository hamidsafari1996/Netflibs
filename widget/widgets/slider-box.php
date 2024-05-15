<?php

namespace WPC\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH')) exit; // Exit if accessed directly


class Slider_box extends Widget_Base{

  public function get_name(){
    return 'slider-box';
  }

  public function get_title(){
    return 'تصویر باکس';
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
            'label' => __( 'تنظیمات اسلاید اول', 'elementor' ),
        ]
    );
    /**-----------------slider_1-------------------------- */
      $this->add_control(
            'icon_1',
            [
                  'label' => __( 'آیکون', 'text-domain' ),
                  'type' => \Elementor\Controls_Manager::ICONS,
                  'default' => [
                        'value' => 'far fa-play-circle',
                        'library' => 'solid',
                  ],
            ]
      );
      $this->add_control(
            'image_1',
            [
                  'label' => __( 'انتخاب تصویر', 'plugin-domain' ),
                  'type' => \Elementor\Controls_Manager::MEDIA,
                  'default' => [
                        'url' => \Elementor\Utils::get_placeholder_image_src(),
                  ],
            ]
      );
      $this->add_control(
            'title_1',
            [
                  'label' => __( 'عنوان فارسی', 'plugin-domain' ),
                  'type' => \Elementor\Controls_Manager::TEXT,
                  'default' => __( 'عنوان', 'plugin-domain' ),
                  'placeholder' => __( 'جایگاه عنوان', 'plugin-domain' ),
            ]
      );
      $this->add_control(
            'title_en_1',
            [
                  'label' => __( 'عنوان انگلیسی', 'plugin-domain' ),
                  'type' => \Elementor\Controls_Manager::TEXT,
                  'default' => __( 'عنوان', 'plugin-domain' ),
                  'placeholder' => __( 'جایگاه عنوان', 'plugin-domain' ),
            ]
      );
      $this->add_control(
            'title_imdb_1',
            [
                  'label' => __( 'امتیاز', 'plugin-domain' ),
                  'type' => \Elementor\Controls_Manager::TEXT,
                  'default' => __( 'عنوان', 'plugin-domain' ),
                  'placeholder' => __( 'جایگاه عنوان', 'plugin-domain' ),
            ]
      );
      $this->add_control(
            'website_link1',
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
            'show_icon_1',
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
            'show_title_1',
            [
                  'label' => __( 'نمایش عنوان فارسی', 'plugin-domain' ),
                  'type' => \Elementor\Controls_Manager::SWITCHER,
                  'label_on' => __( 'Show', 'your-plugin' ),
                  'label_off' => __( 'Hide', 'your-plugin' ),
                  'return_value' => 'yes',
                  'default' => 'yes',
            ]
      );
      $this->add_control(
            'show_titleen_1',
            [
                  'label' => __( 'نمایش عنوان انگلیسی', 'plugin-domain' ),
                  'type' => \Elementor\Controls_Manager::SWITCHER,
                  'label_on' => __( 'Show', 'your-plugin' ),
                  'label_off' => __( 'Hide', 'your-plugin' ),
                  'return_value' => 'yes',
                  'default' => 'yes',
            ]
      );
      $this->add_control(
            'show_imdb_1',
            [
                  'label' => __( 'نمایش امتیاز', 'plugin-domain' ),
                  'type' => \Elementor\Controls_Manager::SWITCHER,
                  'label_on' => __( 'Show', 'your-plugin' ),
                  'label_off' => __( 'Hide', 'your-plugin' ),
                  'return_value' => 'yes',
                  'default' => 'yes',
            ]
      );
      $this->end_controls_section();
      /**-----------------slider_2-------------------------- */
      $this->start_controls_section(
            'section_modal_style2',
            [
                  'label' => __( 'تنظیمات اسلاید دوم', 'elementor' ),
                  'tab' => Controls_Manager::TAB_CONTENT,
            ]
      );
      $this->add_control(
            'icon_2',
            [
                  'label' => __( 'آیکون', 'text-domain' ),
                  'type' => \Elementor\Controls_Manager::ICONS,
                  'default' => [
                        'value' => 'far fa-play-circle',
                        'library' => 'solid',
                  ],
            ]
      );
      $this->add_control(
            'image_2',
            [
                  'label' => __( 'انتخاب تصویر', 'plugin-domain' ),
                  'type' => \Elementor\Controls_Manager::MEDIA,
                  'default' => [
                        'url' => \Elementor\Utils::get_placeholder_image_src(),
                  ],
            ]
      );
      $this->add_control(
            'title_2',
            [
                  'label' => __( 'عنوان فارسی', 'plugin-domain' ),
                  'type' => \Elementor\Controls_Manager::TEXT,
                  'default' => __( 'عنوان', 'plugin-domain' ),
                  'placeholder' => __( 'جایگاه عنوان', 'plugin-domain' ),
            ]
      );
      $this->add_control(
            'title_en_2',
            [
                  'label' => __( 'عنوان انگلیسی', 'plugin-domain' ),
                  'type' => \Elementor\Controls_Manager::TEXT,
                  'default' => __( 'عنوان', 'plugin-domain' ),
                  'placeholder' => __( 'جایگاه عنوان', 'plugin-domain' ),
            ]
      );
      $this->add_control(
            'title_imdb_2',
            [
                  'label' => __( 'امتیاز', 'plugin-domain' ),
                  'type' => \Elementor\Controls_Manager::TEXT,
                  'default' => __( 'عنوان', 'plugin-domain' ),
                  'placeholder' => __( 'جایگاه عنوان', 'plugin-domain' ),
            ]
      );
      $this->add_control(
            'website_link2',
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
            'show_icon_2',
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
            'show_title_2',
            [
                  'label' => __( 'نمایش عنوان فارسی', 'plugin-domain' ),
                  'type' => \Elementor\Controls_Manager::SWITCHER,
                  'label_on' => __( 'Show', 'your-plugin' ),
                  'label_off' => __( 'Hide', 'your-plugin' ),
                  'return_value' => 'yes',
                  'default' => 'yes',
            ]
      );
      $this->add_control(
            'show_titleen_2',
            [
                  'label' => __( 'نمایش عنوان انگلیسی', 'plugin-domain' ),
                  'type' => \Elementor\Controls_Manager::SWITCHER,
                  'label_on' => __( 'Show', 'your-plugin' ),
                  'label_off' => __( 'Hide', 'your-plugin' ),
                  'return_value' => 'yes',
                  'default' => 'yes',
            ]
      );
      $this->add_control(
            'show_imdb_2',
            [
                  'label' => __( 'نمایش امتیاز', 'plugin-domain' ),
                  'type' => \Elementor\Controls_Manager::SWITCHER,
                  'label_on' => __( 'Show', 'your-plugin' ),
                  'label_off' => __( 'Hide', 'your-plugin' ),
                  'return_value' => 'yes',
                  'default' => 'yes',
            ]
      );
      $this->end_controls_section();
      /**-----------------slider_3-------------------------- */
      $this->start_controls_section(
            'section_modal_style3',
            [
                  'label' => __( 'تنظیمات اسلاید سوم', 'elementor' ),
                  'tab' => Controls_Manager::TAB_CONTENT,
            ]
      );
      $this->add_control(
            'icon_3',
            [
                  'label' => __( 'آیکون', 'text-domain' ),
                  'type' => \Elementor\Controls_Manager::ICONS,
                  'default' => [
                        'value' => 'far fa-play-circle',
                        'library' => 'solid',
                  ],
            ]
      );
      $this->add_control(
            'image_3',
            [
                  'label' => __( 'انتخاب تصویر', 'plugin-domain' ),
                  'type' => \Elementor\Controls_Manager::MEDIA,
                  'default' => [
                        'url' => \Elementor\Utils::get_placeholder_image_src(),
                  ],
            ]
      );
      $this->add_control(
            'title_3',
            [
                  'label' => __( 'عنوان فارسی', 'plugin-domain' ),
                  'type' => \Elementor\Controls_Manager::TEXT,
                  'default' => __( 'عنوان', 'plugin-domain' ),
                  'placeholder' => __( 'جایگاه عنوان', 'plugin-domain' ),
            ]
      );
      $this->add_control(
            'title_en_3',
            [
                  'label' => __( 'عنوان انگلیسی', 'plugin-domain' ),
                  'type' => \Elementor\Controls_Manager::TEXT,
                  'default' => __( 'عنوان', 'plugin-domain' ),
                  'placeholder' => __( 'جایگاه عنوان', 'plugin-domain' ),
            ]
      );
      $this->add_control(
            'title_imdb_3',
            [
                  'label' => __( 'امتیاز', 'plugin-domain' ),
                  'type' => \Elementor\Controls_Manager::TEXT,
                  'default' => __( 'عنوان', 'plugin-domain' ),
                  'placeholder' => __( 'جایگاه عنوان', 'plugin-domain' ),
            ]
      );
      $this->add_control(
            'website_link3',
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
            'show_icon_3',
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
            'show_title_3',
            [
                  'label' => __( 'نمایش عنوان فارسی', 'plugin-domain' ),
                  'type' => \Elementor\Controls_Manager::SWITCHER,
                  'label_on' => __( 'Show', 'your-plugin' ),
                  'label_off' => __( 'Hide', 'your-plugin' ),
                  'return_value' => 'yes',
                  'default' => 'yes',
            ]
      );
      $this->add_control(
            'show_titleen_3',
            [
                  'label' => __( 'نمایش عنوان انگلیسی', 'plugin-domain' ),
                  'type' => \Elementor\Controls_Manager::SWITCHER,
                  'label_on' => __( 'Show', 'your-plugin' ),
                  'label_off' => __( 'Hide', 'your-plugin' ),
                  'return_value' => 'yes',
                  'default' => 'yes',
            ]
      );
      $this->add_control(
            'show_imdb_3',
            [
                  'label' => __( 'نمایش امتیاز', 'plugin-domain' ),
                  'type' => \Elementor\Controls_Manager::SWITCHER,
                  'label_on' => __( 'Show', 'your-plugin' ),
                  'label_off' => __( 'Hide', 'your-plugin' ),
                  'return_value' => 'yes',
                  'default' => 'yes',
            ]
      );
      $this->end_controls_section();
      /**-----------------slider_4-------------------------- */
      $this->start_controls_section(
            'section_modal_style4',
            [
                  'label' => __( 'تنظیمات اسلاید چهارم', 'elementor' ),
                  'tab' => Controls_Manager::TAB_CONTENT,
            ]
      );
      $this->add_control(
            'icon_4',
            [
                  'label' => __( 'آیکون', 'text-domain' ),
                  'type' => \Elementor\Controls_Manager::ICONS,
                  'default' => [
                        'value' => 'far fa-play-circle',
                        'library' => 'solid',
                  ],
            ]
      );
      $this->add_control(
            'image_4',
            [
                  'label' => __( 'انتخاب تصویر', 'plugin-domain' ),
                  'type' => \Elementor\Controls_Manager::MEDIA,
                  'default' => [
                        'url' => \Elementor\Utils::get_placeholder_image_src(),
                  ],
            ]
      );
      $this->add_control(
            'title_4',
            [
                  'label' => __( 'عنوان فارسی', 'plugin-domain' ),
                  'type' => \Elementor\Controls_Manager::TEXT,
                  'default' => __( 'عنوان', 'plugin-domain' ),
                  'placeholder' => __( 'جایگاه عنوان', 'plugin-domain' ),
            ]
      );
      $this->add_control(
            'title_en_4',
            [
                  'label' => __( 'عنوان انگلیسی', 'plugin-domain' ),
                  'type' => \Elementor\Controls_Manager::TEXT,
                  'default' => __( 'عنوان', 'plugin-domain' ),
                  'placeholder' => __( 'جایگاه عنوان', 'plugin-domain' ),
            ]
      );
      $this->add_control(
            'website_link4',
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
            'more_options_1',
            [
                  'label' => __( 'تنظیم تصویر دوم', 'plugin-name' ),
                  'type' => \Elementor\Controls_Manager::HEADING,
                  'separator' => 'before',
            ]
      );
      $this->add_control(
            'icon_5',
            [
                  'label' => __( 'آیکون', 'text-domain' ),
                  'type' => \Elementor\Controls_Manager::ICONS,
                  'default' => [
                        'value' => 'far fa-play-circle',
                        'library' => 'solid',
                  ],
            ]
      );
      $this->add_control(
            'image_5',
            [
                  'label' => __( 'انتخاب تصویر', 'plugin-domain' ),
                  'type' => \Elementor\Controls_Manager::MEDIA,
                  'default' => [
                        'url' => \Elementor\Utils::get_placeholder_image_src(),
                  ],
            ]
      );
      $this->add_control(
            'title_5',
            [
                  'label' => __( 'عنوان فارسی', 'plugin-domain' ),
                  'type' => \Elementor\Controls_Manager::TEXT,
                  'default' => __( 'عنوان', 'plugin-domain' ),
                  'placeholder' => __( 'جایگاه عنوان', 'plugin-domain' ),
            ]
      );
      $this->add_control(
            'title_en_5',
            [
                  'label' => __( 'عنوان انگلیسی', 'plugin-domain' ),
                  'type' => \Elementor\Controls_Manager::TEXT,
                  'default' => __( 'عنوان', 'plugin-domain' ),
                  'placeholder' => __( 'جایگاه عنوان', 'plugin-domain' ),
            ]
      );
      $this->add_control(
            'website_link5',
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
            'show_icon_4',
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
            'show_title_4',
            [
                  'label' => __( 'نمایش عنوان فارسی', 'plugin-domain' ),
                  'type' => \Elementor\Controls_Manager::SWITCHER,
                  'label_on' => __( 'Show', 'your-plugin' ),
                  'label_off' => __( 'Hide', 'your-plugin' ),
                  'return_value' => 'yes',
                  'default' => 'yes',
            ]
      );
      $this->add_control(
            'show_titleen_4',
            [
                  'label' => __( 'نمایش عنوان انگلیسی', 'plugin-domain' ),
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
            'label' => __( 'تنظیمات استایل', 'elementor' ),
            'tab' => Controls_Manager::TAB_STYLE,
            ]
      );
      $this->add_control(
            'border_img',
            [
                'label' => __( 'گوشه‌های مدور تصویر', 'elementor' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .slider-box-web .porto-slid-box img, .slider-box-web .porto-slid-box .slid-box-overly' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
      );
      $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'box_right_buttom',
                'label' => __( 'باکس شدوو', 'plugin-domain' ),
                'selector' => '{{WRAPPER}} .slider-box-web .porto-slid-box img',
            ]
      );
      $this->add_control(
            'more_options_button',
            [
                  'label' => __( 'تنظیمات آیکون', 'plugin-name' ),
                  'type' => \Elementor\Controls_Manager::HEADING,
                  'separator' => 'before',
            ]
      );
      $this->add_control(
            'icon_buttom',
            [
                'label' => __( 'رنگ آیکون', 'plugin-domain' ),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .slider-box-web .porto-slid-box .slid-box-overly-content a svg' => 'color: {{VALUE}}',
                ],
            ]
      );
      $this->add_control(
            'icon_buttom_hover',
            [
                'label' => __( 'هاور آیکون', 'plugin-domain' ),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .slider-box-web .porto-slid-box .slid-box-overly-content a svg:hover' => 'color: {{VALUE}}',
                ],
            ]
      );
      $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'icon_typography',
                'label' => __( 'تایپوگرافی', 'plugin-domain' ),
                'selector' => '{{WRAPPER}} .slider-box-web .porto-slid-box .slid-box-overly-content a svg',
            ]
      );
      $this->add_control(
            'more_fa_title',
            [
                  'label' => __( 'تنظیمات عنوان فارسی', 'plugin-name' ),
                  'type' => \Elementor\Controls_Manager::HEADING,
                  'separator' => 'before',
            ]
      );
      $this->add_control(
            'icon_fa_title',
            [
                'label' => __( 'رنگ عنوان', 'plugin-domain' ),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .slider-box-web .porto-slid-box .slid-box-overly-content h3 a' => 'color: {{VALUE}}',
                ],
            ]
      );
      $this->add_control(
            'icon_fa_title_hover',
            [
                'label' => __( 'هاور عنوان', 'plugin-domain' ),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .slider-box-web .porto-slid-box .slid-box-overly-content h3 a:hover' => 'color: {{VALUE}}',
                ],
            ]
      );
      $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'fa_title_typography',
                'label' => __( 'تایپوگرافی', 'plugin-domain' ),
                'selector' => '{{WRAPPER}} .slider-box-web .porto-slid-box .slid-box-overly-content h3 a',
            ]
      );
      $this->add_control(
            'more_en_title',
            [
                  'label' => __( 'تنظیمات عنوان انگلیسی', 'plugin-name' ),
                  'type' => \Elementor\Controls_Manager::HEADING,
                  'separator' => 'before',
            ]
      );
      $this->add_control(
            'icon_en_title',
            [
                'label' => __( 'رنگ عنوان', 'plugin-domain' ),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .slider-box-web .porto-slid-box .slid-box-overly-content .more-conter span' => 'color: {{VALUE}}',
                ],
            ]
      );
      $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'en_title_typography',
                'label' => __( 'تایپوگرافی', 'plugin-domain' ),
                'selector' => '{{WRAPPER}} .slider-box-web .porto-slid-box .slid-box-overly-content .more-conter span',
            ]
      );
      $this->add_control(
            'more_imdb_title',
            [
                  'label' => __( 'تنظیمات امتیاز', 'plugin-name' ),
                  'type' => \Elementor\Controls_Manager::HEADING,
                  'separator' => 'before',
            ]
      );
      $this->add_control(
            'icon_imdb_title',
            [
                'label' => __( 'رنگ امتیاز', 'plugin-domain' ),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .slider-box-web .porto-slid-box .slid-box-overly-content span.imdb' => 'color: {{VALUE}}',
                ],
            ]
      );
      $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'imdb_typography',
                'label' => __( 'تایپوگرافی عدد امتیاز', 'plugin-domain' ),
                'selector' => '{{WRAPPER}} .slider-box-web .porto-slid-box .slid-box-overly-content span.imdb span.imdb-number',
            ]
      );
      $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'imdb2_typography',
                'label' => __( 'تایپوگرافی نام امتیاز', 'plugin-domain' ),
                'selector' => '{{WRAPPER}} .slider-box-web .porto-slid-box .slid-box-overly-content span.imdb',
            ]
      );
      $this->end_controls_section();
  }
  

  protected function render(){
    $settings = $this->get_settings_for_display();
    $target = $settings['website_link']['is_external'] ? ' target="_blank"' : '';
    $nofollow = $settings['website_link']['nofollow'] ? ' rel="nofollow"' : '';
    ?>
    <div class="slider-box-web">
      <div class="container-fluid">
            <div class="row overflow-auto flex-nowrap">
                  <!------------slider_box------------------->
                  <div class="col-2 d-none d-lg-block">
                        <div class="porto-slid-box item-1 text-center position-relative">
                              <img src="<?php echo $settings['image_1']['url'] ?>" alt="<?php echo $settings['title_1']; ?>|<?php echo $settings['titleen_1']; ?>" class="w-100">
                              <div class="slid-box-overly"></div>
                              <div class="slid-box-overly-content">
                                    <?php if ( 'yes' === $settings['show_icon_1'] ) { ?>
                                    <a class="icon-play" href="<?php echo $settings['website_link1']['url']; ?>" <?php echo $target; ?> <?php echo $nofollow; ?>><?php \Elementor\Icons_Manager::render_icon( $settings['icon_1'], [ 'aria-hidden' => 'true' ] ); ?></a>
                                    <?php } ?>
                                    <?php if ( 'yes' === $settings['show_title_1'] ) { ?>
                                    <h3><a href="<?php echo $settings['website_link1']['url']; ?>" <?php echo $target; ?> <?php echo $nofollow; ?>><?php echo $settings['title_1']; ?></a></h3>
                                    <?php } ?>
                                    <?php if ( 'yes' === $settings['show_titleen_1'] ) { ?>
                                    <div class="more-conter">
                                          <span class="year-box"><?php echo $settings['title_en_1']; ?></span>
                                    </div>
                                    <?php } ?>
                                    <?php if ( 'yes' === $settings['show_imdb_1'] ) { ?>
                                    <span class="imdb">امتیاز<span class="imdb-number"><?php echo $settings['title_imdb_1']; ?></span></span>
                                    <?php } ?>
                              </div>
                        </div>
                  </div>
                  <div class="col-lg-5 col-12">
                        <div class="porto-slid-box item-1 text-center position-relative">
                              <img src="<?php echo $settings['image_2']['url'] ?>" alt="<?php echo $settings['title_2']; ?>|<?php echo $settings['titleen_2']; ?>" class="w-100">
                              <div class="slid-box-overly"></div>
                              <div class="slid-box-overly-content">
                                    <?php if ( 'yes' === $settings['show_icon_2'] ) { ?>
                                    <a class="icon-play" href="<?php echo $settings['website_link2']['url']; ?>" <?php echo $target; ?> <?php echo $nofollow; ?>><?php \Elementor\Icons_Manager::render_icon( $settings['icon_2'], [ 'aria-hidden' => 'true' ] ); ?></a>
                                    <?php } ?>
                                    <?php if ( 'yes' === $settings['show_title_2'] ) { ?>
                                    <h3><a href="<?php echo $settings['website_link2']['url']; ?>" <?php echo $target; ?> <?php echo $nofollow; ?>><?php echo $settings['title_2']; ?></a></h3>
                                    <?php } ?>
                                    <?php if ( 'yes' === $settings['show_titleen_2'] ) { ?>
                                    <div class="more-conter">
                                          <span class="year-box"><?php echo $settings['title_en_2']; ?></span>
                                    </div>
                                    <?php } ?>
                                    <?php if ( 'yes' === $settings['show_imdb_2'] ) { ?>
                                    <span class="imdb">امتیاز<span class="imdb-number"><?php echo $settings['title_imdb_2']; ?></span></span>
                                    <?php } ?>
                              </div>
                        </div>
                  </div>
                  <div class="col-2 d-none d-lg-block">
                        <div class="porto-slid-box item-1 text-center position-relative">
                              <img src="<?php echo $settings['image_3']['url'] ?>" alt="<?php echo $settings['title_3']; ?>|<?php echo $settings['titleen_3']; ?>" class="w-100">
                              <div class="slid-box-overly"></div>
                              <div class="slid-box-overly-content">
                                    <?php if ( 'yes' === $settings['show_icon_3'] ) { ?>
                                    <a class="icon-play" href="<?php echo $settings['website_link3']['url']; ?>" <?php echo $target; ?> <?php echo $nofollow; ?>><?php \Elementor\Icons_Manager::render_icon( $settings['icon_3'], [ 'aria-hidden' => 'true' ] ); ?></a>
                                    <?php } ?>
                                    <?php if ( 'yes' === $settings['show_title_3'] ) { ?>
                                    <h3><a href="<?php echo $settings['website_link3']['url']; ?>" <?php echo $target; ?> <?php echo $nofollow; ?>><?php echo $settings['title_3']; ?></a></h3>
                                    <?php } ?>
                                    <?php if ( 'yes' === $settings['show_titleen_3'] ) { ?>
                                    <div class="more-conter">
                                          <span class="year-box"><?php echo $settings['title_en_3']; ?></span>
                                    </div>
                                    <?php } ?>
                                    <?php if ( 'yes' === $settings['show_imdb_3'] ) { ?>
                                    <span class="imdb">امتیاز<span class="imdb-number"><?php echo $settings['title_imdb_3']; ?></span></span>
                                    <?php } ?>
                              </div>
                        </div>
                  </div>
                  <div class="col-3 text-center d-none d-lg-block">
                        <div class="d-block">
                              <div class="porto-slid-box item-4 text-center position-relative">
                                    <img src="<?php echo $settings['image_4']['url'] ?>" alt="<?php echo $settings['title_4']; ?>|<?php echo $settings['titleen_4']; ?>" class="left-img">
                                    <div class="slid-box-overly"></div>
                                    <div class="slid-box-overly-content">
                                          <?php if ( 'yes' === $settings['show_icon_4'] ) { ?>
                                          <a class="icon-play" href="<?php echo $settings['website_link4']['url']; ?>" <?php echo $target; ?> <?php echo $nofollow; ?>><?php \Elementor\Icons_Manager::render_icon( $settings['icon_4'], [ 'aria-hidden' => 'true' ] ); ?></a>
                                          <?php } ?>
                                          <?php if ( 'yes' === $settings['show_title_4'] ) { ?>
                                          <h3><a href="<?php echo $settings['website_link4']['url']; ?>" <?php echo $target; ?> <?php echo $nofollow; ?>><?php echo $settings['title_4']; ?></a></h3>
                                          <?php } ?>
                                          <?php if ( 'yes' === $settings['show_titleen_4'] ) { ?>
                                          <div class="more-conter">
                                                <span class="year-box"><?php echo $settings['title_en_4']; ?></span>
                                          
                                          </div>
                                          <?php } ?>
                                    </div>
                              </div>
                              <div class="porto-slid-box item-4 text-center position-relative">
                                    <img src="<?php echo $settings['image_5']['url'] ?>" alt="<?php echo $settings['title_5']; ?>|<?php echo $settings['titleen_5']; ?>" class="left-img">
                                    <div class="slid-box-overly"></div>
                                    <div class="slid-box-overly-content">
                                          <?php if ( 'yes' === $settings['show_icon_4'] ) { ?>
                                          <a class="icon-play" href="<?php echo $settings['website_link5']['url']; ?>" <?php echo $target; ?> <?php echo $nofollow; ?>><?php \Elementor\Icons_Manager::render_icon( $settings['icon_5'], [ 'aria-hidden' => 'true' ] ); ?></i></a>
                                          <?php } ?>
                                          <?php if ( 'yes' === $settings['show_title_4'] ) { ?>
                                          <h3><a href="<?php echo $settings['website_link5']['url']; ?>" <?php echo $target; ?> <?php echo $nofollow; ?>><?php echo $settings['title_5']; ?></a></h3>
                                          <?php } ?>
                                          <?php if ( 'yes' === $settings['show_titleen_4'] ) { ?>
                                          <div class="more-conter">
                                                <span class="year-box"><?php echo $settings['title_en_5']; ?></span>
                                          </div>
                                          <?php } ?>
                                    </div>
                              </div>     
                        </div>
                  </div>
            </div>
      </div>
    </div>
    <?php
  }

  protected function _content_template(){

  }
}