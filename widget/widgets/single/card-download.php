<?php

namespace WPC\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH')) exit; // Exit if accessed directly


class Card_Download extends Widget_Base
{

      public function get_name()
      {
            return 'card-download';
      }

      public function get_title()
      {
            return 'کارد دانلود فیلم';
      }

      public function get_icon()
      {
            return 'eicon-accordion';
      }

      public function get_categories()
      {
            return ['five-category'];
      }

      protected function _register_controls()
      {
            $this->start_controls_section(
                  'section_style',
                  [
                        'label' => __('تنظیمات عمومی', 'elementor'),
                        'tab' => Controls_Manager::TAB_CONTENT,
                  ]
            );
            $this->add_control(
                  'woocommerce_select_card_download',
                  [
                        'label'   => esc_html__('انتخاب پست تایپ', 'netflibs-theme'),
                        'type'    => Controls_Manager::SELECT,
                        'default' => 'style01_film_lists',
                        'options' => [
                              'style01_film_lists' => esc_html__('پست تایپ فیلم و سریال', 'netflibs-theme'),
                              'style02_woo_lists' => esc_html__('پست تایپ ووکامرس', 'netflibs-theme'),
                        ],
                  ]
            );
            $this->add_control(
                  'netflibs_select_card_download',
                  [
                        'label'   => esc_html__('انتخاب استایل', 'netflibs-theme'),
                        'type'    => Controls_Manager::SELECT,
                        'default' => 'style01_products_lists',
                        'options' => [
                              'style01_products_lists' => esc_html__('استایل اول', 'netflibs-theme'),
                              'style02_products_lists' => esc_html__('استایل دوم', 'netflibs-theme'),
                              'style03_products_lists' => esc_html__('استایل سوم', 'netflibs-theme'),
                        ],
                  ]
            );
            $this->end_controls_section();
            $this->start_controls_section(
                  'section_button_style',
                  [
                        'label' => __('استایل', 'elementor'),
                        'tab' => Controls_Manager::TAB_STYLE,
                        'condition' => [
                              'netflibs_select_card_download' => 'style01_products_lists',
                        ],
                  ]
            );
            $this->add_control(
			'icon',
			[
				'label' => esc_html__( 'آیکون بازشونده', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-play',
					'library' => 'solid','regular',
				],
			]
		);
            $this->add_control(
                  'siteurl_color_style01',
                  [
                        'label' => __('رنگ عنوان و آیکون', 'plugin-domain'),
                        'type' => Controls_Manager::COLOR,
                        'default' => '',
                        'selectors' => [
                              '{{WRAPPER}} .sec-web-dl .accordion .card .card-header button' => 'color: {{VALUE}}',
                        ],
                  ]
            );
            $this->add_control(
                  'siteurl_hover_style01',
                  [
                        'label' => __('رنگ متن', 'plugin-domain'),
                        'type' => \Elementor\Controls_Manager::COLOR,
                        'default' => '',
                        'selectors' => [
                              '{{WRAPPER}} .sec-web-dl .accordion .card .card-body' => 'color: {{VALUE}}',
                        ],
                  ]
            );
            $this->add_group_control(
                  \Elementor\Group_Control_Typography::get_type(),
                  [
                        'name' => 'title_typography_style01',
                        'label' => __('تایپوگرافی عنوان و آیکون', 'plugin-domain'),
                        'selector' => '{{WRAPPER}} .sec-web-dl .accordion .card .card-header button',
                  ]
            );
            $this->add_group_control(
                  \Elementor\Group_Control_Typography::get_type(),
                  [
                        'name' => 'content_typography_style01',
                        'label' => __('تایپوگرافی متن', 'plugin-domain'),
                        'selector' => '{{WRAPPER}} .sec-web-dl .accordion .card .card-body',
                  ]
            );
            $this->add_control(
                  'margin_site_style01',
                  [
                        'label' => __('فاصله', 'elementor'),
                        'type' => Controls_Manager::DIMENSIONS,
                        'size_units' => ['px', '%'],
                        'selectors' => [
                              '{{WRAPPER}} .sec-web-dl .accordion .card' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                  ]
            );
            $this->add_control(
                  'padding_site_style01',
                  [
                        'label' => __('پدینگ', 'elementor'),
                        'type' => Controls_Manager::DIMENSIONS,
                        'size_units' => ['px', '%'],
                        'selectors' => [
                              '{{WRAPPER}} .sec-web-dl .accordion .card' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                  ]
            );

            $this->add_control(
                  'border_site_style01',
                  [
                        'label' => __('گوشه های مدور', 'elementor'),
                        'type' => Controls_Manager::DIMENSIONS,
                        'size_units' => ['px', '%'],
                        'selectors' => [
                              '{{WRAPPER}} .sec-web-dl .accordion .card' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                  ]
            );
            $this->add_group_control(
                  \Elementor\Group_Control_Background::get_type(),
                  [
                        'name' => 'background_cl_style01',
                        'label' => esc_html__('Background', 'plugin-name'),
                        'types' => ['classic', 'gradient'],
                        'selector' => '{{WRAPPER}} .sec-web-dl .accordion .card',
                  ]
            );
            $this->add_group_control(
                  \Elementor\Group_Control_Box_Shadow::get_type(),
                  [
                        'name' => 'box_right_style01',
                        'label' => __('باکس شدوو', 'plugin-domain'),
                        'selector' => '{{WRAPPER}} .sec-web-dl .accordion .card',
                  ]
            );
            $this->add_control(
                  'more_style01_border_right',
                  [
                        'label' => __('تنظیمات بردر', 'plugin-name'),
                        'type' => \Elementor\Controls_Manager::HEADING,
                        'separator' => 'before',
                  ]
            );
            $this->add_control(
                  'border_style_style01',
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
                              '{{WRAPPER}} .sec-web-dl .accordion .card' => 'border-style: {{VALUE}}',
                        ],
                  ]
            );
            $this->add_responsive_control(
                  'width_border_style01',
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
                              '{{WRAPPER}} .sec-web-dl .accordion .card' => 'border-width: {{SIZE}}{{UNIT}};',
                        ],
                  ]
            );
            $this->add_control(
                  'bg_button_style01',
                  [
                        'label' => __('رنگ بردر', 'plugin-domain'),
                        'type' => Controls_Manager::COLOR,
                        'default' => '',
                        'selectors' => [
                              '{{WRAPPER}} .sec-web-dl .accordion .card' => 'border-color: {{VALUE}}',
                        ],
                  ]
            );
            $this->add_control(
                  'clr_btn_style01',
                  [
                        'label' => __('رنگ متن دکمه', 'plugin-domain'),
                        'type' => \Elementor\Controls_Manager::COLOR,
                        'default' => '',
                        'selectors' => [
                              '{{WRAPPER}} .sec-web-dl .accordion .card a' => 'color: {{VALUE}}',
                        ],
                  ]
            );
            $this->add_group_control(
                  \Elementor\Group_Control_Typography::get_type(),
                  [
                        'name' => 'button_typography_style01',
                        'label' => __('تایپوگرافی دکمه', 'plugin-domain'),
                        'selector' => '{{WRAPPER}} .sec-web-dl .accordion .card a',
                  ]
            );
            $this->add_control(
                  'type_buttom__style01',
                  [
                        'label' => __('رنگ دکمه', 'plugin-domain'),
                        'type' => \Elementor\Controls_Manager::SELECT,
                        'default' => 'btn-danger',
                        'options' => [
                              'btn-primary'  => __('primary', 'plugin-domain'),
                              'btn-secondary' => __('secondary', 'plugin-domain'),
                              'btn-success' => __('success', 'plugin-domain'),
                              'btn-danger' => __('danger', 'plugin-domain'),
                              'btn-warning' => __('warning', 'plugin-domain'),
                              'btn-info' => __('info', 'plugin-domain'),
                              'btn-light' => __('light', 'plugin-domain'),
                              'btn-dark' => __('dark', 'plugin-domain'),
                              'btn-link' => __('link', 'plugin-domain'),
                              'btn-outline-primary' => __('outline-primary', 'plugin-domain'),
                              'btn-outline-secondary' => __('outline-secondary', 'plugin-domain'),
                              'btn-outline-success' => __('outline-success', 'plugin-domain'),
                              'btn-outline-danger' => __('outline-danger', 'plugin-domain'),
                              'btn-outline-warning' => __('outline-warning', 'plugin-domain'),
                              'btn-outline-info' => __('outline-info', 'plugin-domain'),
                              'btn-outline-light' => __('outline-light', 'plugin-domain'),
                              'btn-outline-dark' => __('outline-dark', 'plugin-domain'),
                              '' => __('هیچ', 'plugin-domain'),
                        ],
                  ]
            );
            $this->add_control(
                  'round_buttom_style01',
                  [
                        'label' => __('گوشه‌های مدور', 'plugin-domain'),
                        'type' => \Elementor\Controls_Manager::SELECT,
                        'default' => 'rounded',
                        'options' => [
                              'rounded'  => __('rounded', 'plugin-domain'),
                              'rounded-top' => __('rounded-top', 'plugin-domain'),
                              'rounded-right' => __('rounded-right', 'plugin-domain'),
                              'rounded-bottom' => __('rounded-bottom', 'plugin-domain'),
                              'rounded-left' => __('rounded-left', 'plugin-domain'),
                              'rounded-circle' => __('rounded-circle', 'plugin-domain'),
                              'rounded-pill' => __('rounded-pill', 'plugin-domain'),
                              '' => __('هیچ', 'plugin-domain'),
                        ],
                  ]
            );
            $this->end_controls_section();
            $this->start_controls_section(
                  'section_button_style02',
                  [
                        'label' => __('استایل کلی', 'elementor'),
                        'tab' => Controls_Manager::TAB_STYLE,
                        'condition' => [
                              'netflibs_select_card_download' => 'style02_products_lists',
                        ],
                  ]
            );
            $this->add_control(
                  'margin_site_style02',
                  [
                        'label' => __('فاصله', 'elementor'),
                        'type' => Controls_Manager::DIMENSIONS,
                        'size_units' => ['px', '%'],
                        'selectors' => [
                              '{{WRAPPER}} .single-content-section .section-download-film' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                  ]
            );
            $this->add_control(
                  'padding_site_style02',
                  [
                        'label' => __('پدینگ', 'elementor'),
                        'type' => Controls_Manager::DIMENSIONS,
                        'size_units' => ['px', '%'],
                        'selectors' => [
                              '{{WRAPPER}} .single-content-section .section-download-film' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                  ]
            );

            $this->add_control(
                  'border_site_style02',
                  [
                        'label' => __('گوشه های مدور', 'elementor'),
                        'type' => Controls_Manager::DIMENSIONS,
                        'size_units' => ['px', '%'],
                        'selectors' => [
                              '{{WRAPPER}} .single-content-section .section-download-film' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                  ]
            );
            $this->add_group_control(
                  \Elementor\Group_Control_Background::get_type(),
                  [
                        'name' => 'background_cl_style02',
                        'label' => esc_html__('Background', 'plugin-name'),
                        'types' => ['classic', 'gradient'],
                        'selector' => '{{WRAPPER}} .single-content-section .section-download-film',
                  ]
            );
            $this->add_group_control(
                  \Elementor\Group_Control_Box_Shadow::get_type(),
                  [
                        'name' => 'box_right_style02',
                        'label' => __('باکس شدوو', 'plugin-domain'),
                        'selector' => '{{WRAPPER}} .single-content-section .section-download-film',
                  ]
            );
            $this->add_control(
                  'more_style02_border_right',
                  [
                        'label' => __('تنظیمات بردر', 'plugin-name'),
                        'type' => \Elementor\Controls_Manager::HEADING,
                        'separator' => 'before',
                  ]
            );
            $this->add_control(
                  'border_style_style02',
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
                              '{{WRAPPER}} .single-content-section .section-download-film' => 'border-style: {{VALUE}}',
                        ],
                  ]
            );
            $this->add_responsive_control(
                  'width_border_style02',
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
                              '{{WRAPPER}} .single-content-section .section-download-film' => 'border-width: {{SIZE}}{{UNIT}};',
                        ],
                  ]
            );
            $this->add_control(
                  'bg_box_style01',
                  [
                        'label' => __('رنگ بردر', 'plugin-domain'),
                        'type' => Controls_Manager::COLOR,
                        'default' => '',
                        'selectors' => [
                              '{{WRAPPER}} .single-content-section .section-download-film' => 'border-color: {{VALUE}}',
                        ],
                  ]
            );
            $this->end_controls_section();
            /**---------------tab_style---------------------------- */
            $this->start_controls_section(
                  'section_ul_style02',
                  [
                        'label' => __('استایل تب', 'elementor'),
                        'tab' => Controls_Manager::TAB_STYLE,
                        'condition' => [
                              'netflibs_select_card_download' => 'style02_products_lists',
                        ],
                  ]
            );
            $this->add_control(
                  'margin___style02',
                  [
                        'label' => __('فاصله تب', 'elementor'),
                        'type' => Controls_Manager::DIMENSIONS,
                        'size_units' => ['px', '%'],
                        'selectors' => [
                              '{{WRAPPER}} .single-content-section .section-download-film ul li a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                  ]
            );
            $this->add_control(
                  'padding___style02',
                  [
                        'label' => __('پدینگ تب', 'elementor'),
                        'type' => Controls_Manager::DIMENSIONS,
                        'size_units' => ['px', '%'],
                        'selectors' => [
                              '{{WRAPPER}} .single-content-section .section-download-film ul li a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                  ]
            );

            $this->add_control(
                  'border___style02',
                  [
                        'label' => __('گوشه‌های مدور تب', 'elementor'),
                        'type' => Controls_Manager::DIMENSIONS,
                        'size_units' => ['px', '%'],
                        'selectors' => [
                              '{{WRAPPER}} .single-content-section .section-download-film ul li a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                  ]
            );

            $this->add_group_control(
                  \Elementor\Group_Control_Box_Shadow::get_type(),
                  [
                        'name' => 'box___style02',
                        'label' => __('حاشیه تب', 'plugin-domain'),
                        'selector' => '{{WRAPPER}} .single-content-section .section-download-film ul li a',
                  ]
            );

            $this->add_group_control(
                  \Elementor\Group_Control_Typography::get_type(),
                  [
                        'name' => 'tab_typography_style02',
                        'label' => __('تایپوگرافی تب', 'plugin-domain'),
                        'selector' => '{{WRAPPER}} .sec-web-dl .accordion .card a',
                  ]
            );
            $this->start_controls_tabs('style_button');
            $this->start_controls_tab(
                  'style_button_title',
                  [
                        'label' => esc_html__('عادی', 'elementor'),
                  ]
            );
            $this->add_control(
                  'tab_style02',
                  [
                        'label' => __('رنگ متن تب', 'plugin-domain'),
                        'type' => \Elementor\Controls_Manager::COLOR,
                        'default' => '',
                        'selectors' => [
                              '{{WRAPPER}} .single-content-section .section-download-film ul li a' => 'color: {{VALUE}}',
                        ],
                  ]
            );
            $this->add_group_control(
                  \Elementor\Group_Control_Background::get_type(),
                  [
                        'name' => 'background___style02',
                        'label' => esc_html__('بک گراند تب', 'plugin-name'),
                        'types' => ['classic', 'gradient'],
                        'selector' => '{{WRAPPER}} .single-content-section .section-download-film ul li a',
                  ]
            );
            $this->end_controls_tab();
            $this->start_controls_tab(
                  'style_button_video_hover',
                  [
                        'label' => esc_html__('هاور', 'elementor'),
                  ]
            );
            $this->add_control(
                  'hover_style02',
                  [
                        'label' => __('رنگ متن تب', 'plugin-domain'),
                        'type' => \Elementor\Controls_Manager::COLOR,
                        'default' => '',
                        'selectors' => [
                              '{{WRAPPER}} .single-content-section .section-download-film ul li a:hover' => 'color: {{VALUE}}',
                        ],
                  ]
            );
            $this->add_group_control(
                  \Elementor\Group_Control_Background::get_type(),
                  [
                        'name' => 'background___style02_hover',
                        'label' => esc_html__('بک گراند تب', 'plugin-name'),
                        'types' => ['classic', 'gradient'],
                        'selector' => '{{WRAPPER}} .single-content-section .section-download-film ul li a:hover',
                  ]
            );
            $this->end_controls_tab();
            $this->start_controls_tab(
                  'style_button_active',
                  [
                        'label' => esc_html__('فعال', 'elementor'),
                  ]
            );
            $this->add_control(
                  'active_style02',
                  [
                        'label' => __('رنگ متن تب', 'plugin-domain'),
                        'type' => \Elementor\Controls_Manager::COLOR,
                        'default' => '',
                        'selectors' => [
                              '{{WRAPPER}} .single-content-section .section-download-film ul li a:active' => 'color: {{VALUE}}',
                        ],
                  ]
            );
            $this->add_group_control(
                  \Elementor\Group_Control_Background::get_type(),
                  [
                        'name' => 'background___style02_active',
                        'label' => esc_html__('بک گراند تب', 'plugin-name'),
                        'types' => ['classic', 'gradient'],
                        'selector' => '{{WRAPPER}} .single-content-section .section-download-film ul li a.active',
                  ]
            );
            $this->end_controls_tab();
            $this->end_controls_tabs();
            $this->end_controls_section();
            $this->start_controls_section(
                  'section_box_style02',
                  [
                        'label' => __('استایل باکس', 'elementor'),
                        'tab' => Controls_Manager::TAB_STYLE,
                        'condition' => [
                              'netflibs_select_card_download' => 'style02_products_lists',
                        ],
                  ]
            );
            $this->add_control(
                  'margin___style03',
                  [
                        'label' => __('فاصله باکس', 'elementor'),
                        'type' => Controls_Manager::DIMENSIONS,
                        'size_units' => ['px', '%'],
                        'selectors' => [
                              '{{WRAPPER}} .single-content-section .section-download-film .castebox' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                  ]
            );
            $this->add_control(
                  'padding___style03',
                  [
                        'label' => __('پدینگ تب', 'elementor'),
                        'type' => Controls_Manager::DIMENSIONS,
                        'size_units' => ['px', '%'],
                        'selectors' => [
                              '{{WRAPPER}} .single-content-section .section-download-film .castebox' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                  ]
            );

            $this->add_control(
                  'border___style03',
                  [
                        'label' => __('گوشه‌های مدور باکس', 'elementor'),
                        'type' => Controls_Manager::DIMENSIONS,
                        'size_units' => ['px', '%'],
                        'selectors' => [
                              '{{WRAPPER}} .single-content-section .section-download-film .castebox' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                  ]
            );

            $this->add_group_control(
                  \Elementor\Group_Control_Box_Shadow::get_type(),
                  [
                        'name' => 'box___style03',
                        'label' => __('حاشیه باکس', 'plugin-domain'),
                        'selector' => '{{WRAPPER}} .single-content-section .section-download-film .castebox',
                  ]
            );
            $this->add_group_control(
                  \Elementor\Group_Control_Background::get_type(),
                  [
                        'name' => 'background___style03',
                        'label' => esc_html__('بک گراند باکس', 'plugin-name'),
                        'types' => ['classic', 'gradient'],
                        'selector' => '{{WRAPPER}} .single-content-section .section-download-film .castebox',
                  ]
            );
            $this->add_group_control(
                  \Elementor\Group_Control_Background::get_type(),
                  [
                        'name' => 'background_mm__style03',
                        'label' => esc_html__('بک گراند باگس 2', 'plugin-name'),
                        'types' => ['classic', 'gradient'],
                        'selector' => '{{WRAPPER}} .single-content-section .section-download-film .castebox .item-film-repact',
                  ]
            );
            $this->add_control(
                  'title_style02',
                  [
                        'label' => __('رنگ', 'plugin-domain'),
                        'type' => \Elementor\Controls_Manager::COLOR,
                        'default' => '',
                        'selectors' => [
                              '{{WRAPPER}} .single-content-section .section-download-film .castebox .item-film-repact .title-item' => 'color: {{VALUE}}',
                        ],
                  ]
            );
            $this->add_group_control(
                  \Elementor\Group_Control_Typography::get_type(),
                  [
                        'name' => 'box_typography_style02',
                        'label' => __('تایپوگرافی باکس', 'plugin-domain'),
                        'selector' => '{{WRAPPER}} .single-content-section .section-download-film .castebox .item-film-repact .title-item',
                  ]
            );
            $this->add_control(
                  'more_online_button',
                  [
                        'label' => __('تنظیمات دکمه', 'plugin-name'),
                        'type' => \Elementor\Controls_Manager::HEADING,
                        'separator' => 'before',
                  ]
            );
            $this->add_control(
                  'type_buttom_1_style02',
                  [
                        'label' => __('رنگ دکمه دانلود', 'plugin-domain'),
                        'type' => \Elementor\Controls_Manager::SELECT,
                        'default' => 'btn-danger',
                        'options' => [
                              'btn-primary'  => __('primary', 'plugin-domain'),
                              'btn-secondary' => __('secondary', 'plugin-domain'),
                              'btn-success' => __('success', 'plugin-domain'),
                              'btn-danger' => __('danger', 'plugin-domain'),
                              'btn-warning' => __('warning', 'plugin-domain'),
                              'btn-info' => __('info', 'plugin-domain'),
                              'btn-light' => __('light', 'plugin-domain'),
                              'btn-dark' => __('dark', 'plugin-domain'),
                              'btn-link' => __('link', 'plugin-domain'),
                              'btn-outline-primary' => __('outline-primary', 'plugin-domain'),
                              'btn-outline-secondary' => __('outline-secondary', 'plugin-domain'),
                              'btn-outline-success' => __('outline-success', 'plugin-domain'),
                              'btn-outline-danger' => __('outline-danger', 'plugin-domain'),
                              'btn-outline-warning' => __('outline-warning', 'plugin-domain'),
                              'btn-outline-info' => __('outline-info', 'plugin-domain'),
                              'btn-outline-light' => __('outline-light', 'plugin-domain'),
                              'btn-outline-dark' => __('outline-dark', 'plugin-domain'),
                              '' => __('هیچ', 'plugin-domain'),
                        ],
                  ]
            );
            $this->add_control(
                  'type_buttom_2_style02',
                  [
                        'label' => __('رنگ دکمه پخش آنلاین', 'plugin-domain'),
                        'type' => \Elementor\Controls_Manager::SELECT,
                        'default' => 'btn-danger',
                        'options' => [
                              'btn-primary'  => __('primary', 'plugin-domain'),
                              'btn-secondary' => __('secondary', 'plugin-domain'),
                              'btn-success' => __('success', 'plugin-domain'),
                              'btn-danger' => __('danger', 'plugin-domain'),
                              'btn-warning' => __('warning', 'plugin-domain'),
                              'btn-info' => __('info', 'plugin-domain'),
                              'btn-light' => __('light', 'plugin-domain'),
                              'btn-dark' => __('dark', 'plugin-domain'),
                              'btn-link' => __('link', 'plugin-domain'),
                              'btn-outline-primary' => __('outline-primary', 'plugin-domain'),
                              'btn-outline-secondary' => __('outline-secondary', 'plugin-domain'),
                              'btn-outline-success' => __('outline-success', 'plugin-domain'),
                              'btn-outline-danger' => __('outline-danger', 'plugin-domain'),
                              'btn-outline-warning' => __('outline-warning', 'plugin-domain'),
                              'btn-outline-info' => __('outline-info', 'plugin-domain'),
                              'btn-outline-light' => __('outline-light', 'plugin-domain'),
                              'btn-outline-dark' => __('outline-dark', 'plugin-domain'),
                              '' => __('هیچ', 'plugin-domain'),
                        ],
                  ]
            );
            $this->add_control(
                  'round_buttom_1_style02',
                  [
                        'label' => __('گوشه‌های مدور', 'plugin-domain'),
                        'type' => \Elementor\Controls_Manager::SELECT,
                        'default' => 'rounded',
                        'options' => [
                              'rounded'  => __('rounded', 'plugin-domain'),
                              'rounded-top' => __('rounded-top', 'plugin-domain'),
                              'rounded-right' => __('rounded-right', 'plugin-domain'),
                              'rounded-bottom' => __('rounded-bottom', 'plugin-domain'),
                              'rounded-left' => __('rounded-left', 'plugin-domain'),
                              'rounded-circle' => __('rounded-circle', 'plugin-domain'),
                              'rounded-pill' => __('rounded-pill', 'plugin-domain'),
                              '' => __('هیچ', 'plugin-domain'),
                        ],
                  ]
            );
            $this->add_control(
                  'more_style02_border_online',
                  [
                        'label' => __('تنظیمات بردر', 'plugin-name'),
                        'type' => \Elementor\Controls_Manager::HEADING,
                        'separator' => 'before',
                  ]
            );
            $this->add_control(
                  'border_online_style02',
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
                              '{{WRAPPER}} .single-content-section .section-download-film .castebox .item-film-repact a' => 'border-style: {{VALUE}}',
                        ],
                  ]
            );
            $this->add_responsive_control(
                  'width_online_style02',
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
                              '{{WRAPPER}} .single-content-section .section-download-film .castebox .item-film-repact a' => 'border-width: {{SIZE}}{{UNIT}};',
                        ],
                  ]
            );
            $this->add_control(
                  'online_button_style01',
                  [
                        'label' => __('رنگ بردر', 'plugin-domain'),
                        'type' => Controls_Manager::COLOR,
                        'default' => '',
                        'selectors' => [
                              '{{WRAPPER}} .single-content-section .section-download-film .castebox .item-film-repact a' => 'border-color: {{VALUE}}',
                        ],
                  ]
            );
            $this->add_control(
                  'online_btn_style01',
                  [
                        'label' => __('رنگ متن دکمه', 'plugin-domain'),
                        'type' => \Elementor\Controls_Manager::COLOR,
                        'default' => '',
                        'selectors' => [
                              '{{WRAPPER}} .single-content-section .section-download-film .castebox .item-film-repact a' => 'color: {{VALUE}}',
                        ],
                  ]
            );
            $this->add_group_control(
                  \Elementor\Group_Control_Typography::get_type(),
                  [
                        'name' => 'online_typography_style01',
                        'label' => __('تایپوگرافی دکمه', 'plugin-domain'),
                        'selector' => '{{WRAPPER}} .single-content-section .section-download-film .castebox .item-film-repact a',
                  ]
            );
            $this->add_group_control(
                  \Elementor\Group_Control_Box_Shadow::get_type(),
                  [
                        'name' => 'box_online__style02',
                        'label' => __('حاشیه دکمه', 'plugin-domain'),
                        'selector' => '{{WRAPPER}} .single-content-section .section-download-film .castebox .item-film-repact a',
                  ]
            );
            $this->end_controls_section();
            $this->start_controls_section(
                  'section_box1_style03',
                  [
                        'label' => __('استایل کولپس', 'elementor'),
                        'tab' => Controls_Manager::TAB_STYLE,
                        'condition' => [
                              'netflibs_select_card_download' => 'style03_products_lists',
                        ],
                  ]
            );
            $this->add_control(
                  'margin_site_style03',
                  [
                        'label' => __('فاصله', 'elementor'),
                        'type' => Controls_Manager::DIMENSIONS,
                        'size_units' => ['px', '%'],
                        'selectors' => [
                              '{{WRAPPER}} .hex-card-download .accordion .card .card-header' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                  ]
            );
            $this->add_control(
                  'padding_site_style03',
                  [
                        'label' => __('پدینگ', 'elementor'),
                        'type' => Controls_Manager::DIMENSIONS,
                        'size_units' => ['px', '%'],
                        'selectors' => [
                              '{{WRAPPER}} .hex-card-download .accordion .card .card-header' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                  ]
            );

            $this->add_control(
                  'border_site_style03',
                  [
                        'label' => __('گوشه های مدور', 'elementor'),
                        'type' => Controls_Manager::DIMENSIONS,
                        'size_units' => ['px', '%'],
                        'selectors' => [
                              '{{WRAPPER}} .hex-card-download .accordion .card .card-header' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                  ]
            );
            $this->add_group_control(
                  \Elementor\Group_Control_Background::get_type(),
                  [
                        'name' => 'background_cl_style03',
                        'label' => esc_html__('Background', 'plugin-name'),
                        'types' => ['classic', 'gradient'],
                        'selector' => '{{WRAPPER}} .hex-card-download .accordion .card .card-header',
                  ]
            );
            $this->add_group_control(
                  \Elementor\Group_Control_Box_Shadow::get_type(),
                  [
                        'name' => 'box_right_style03',
                        'label' => __('باکس شدوو', 'plugin-domain'),
                        'selector' => '{{WRAPPER}} .hex-card-download .accordion .card .card-header',
                  ]
            );
            $this->add_control(
                  'more_style03_border_right',
                  [
                        'label' => __('تنظیمات بردر', 'plugin-name'),
                        'type' => \Elementor\Controls_Manager::HEADING,
                        'separator' => 'before',
                  ]
            );
            $this->add_control(
                  'border_style_style03',
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
                              '{{WRAPPER}} .hex-card-download .accordion .card .card-header' => 'border-style: {{VALUE}}',
                        ],
                  ]
            );
            $this->add_responsive_control(
                  'width_border_style03',
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
                              '{{WRAPPER}} .hex-card-download .accordion .card .card-header' => 'border-width: {{SIZE}}{{UNIT}};',
                        ],
                  ]
            );
            $this->add_control(
                  'bg_button_style03',
                  [
                        'label' => __('رنگ بردر', 'plugin-domain'),
                        'type' => Controls_Manager::COLOR,
                        'default' => '',
                        'selectors' => [
                              '{{WRAPPER}} .hex-card-download .accordion .card .card-header' => 'border-color: {{VALUE}}',
                        ],
                  ]
            );
            $this->add_control(
                  'more_style03_collaps',
                  [
                        'label' => __('استایل دکمه اول', 'plugin-name'),
                        'type' => \Elementor\Controls_Manager::HEADING,
                        'separator' => 'before',
                  ]
            );
            $this->add_control(
                  'padding_1_style03',
                  [
                        'label' => __('پدینگ', 'elementor'),
                        'type' => Controls_Manager::DIMENSIONS,
                        'size_units' => ['px', '%'],
                        'selectors' => [
                              '{{WRAPPER}} .hex-card-download .accordion .card .card-header button.title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                  ]
            );

            $this->add_control(
                  'border_1_style03',
                  [
                        'label' => __('گوشه های مدور', 'elementor'),
                        'type' => Controls_Manager::DIMENSIONS,
                        'size_units' => ['px', '%'],
                        'selectors' => [
                              '{{WRAPPER}} .hex-card-download .accordion .card .card-header button.title' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                  ]
            );
            $this->add_group_control(
                  \Elementor\Group_Control_Background::get_type(),
                  [
                        'name' => 'background_1_style03',
                        'label' => esc_html__('Background', 'plugin-name'),
                        'types' => ['classic', 'gradient'],
                        'selector' => '{{WRAPPER}} .hex-card-download .accordion .card .card-header button.title',
                  ]
            );
            $this->add_group_control(
                  \Elementor\Group_Control_Box_Shadow::get_type(),
                  [
                        'name' => 'box_1_style03',
                        'label' => __('باکس شدوو', 'plugin-domain'),
                        'selector' => '{{WRAPPER}} .hex-card-download .accordion .card .card-header button.title',
                  ]
            );
            $this->add_control(
                  'more_style03_border1',
                  [
                        'label' => __('تنظیمات بردر', 'plugin-name'),
                        'type' => \Elementor\Controls_Manager::HEADING,
                        'separator' => 'before',
                  ]
            );
            $this->add_control(
                  'border_style1_style03',
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
                              '{{WRAPPER}} .hex-card-download .accordion .card .card-header button.title' => 'border-style: {{VALUE}}',
                        ],
                  ]
            );
            $this->add_responsive_control(
                  'width_border1_style03',
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
                              '{{WRAPPER}} .hex-card-download .accordion .card .card-header button.title' => 'border-width: {{SIZE}}{{UNIT}};',
                        ],
                  ]
            );
            $this->add_control(
                  'bg_button1_style03',
                  [
                        'label' => __('رنگ بردر', 'plugin-domain'),
                        'type' => Controls_Manager::COLOR,
                        'default' => '',
                        'selectors' => [
                              '{{WRAPPER}} .hex-card-download .accordion .card .card-header button.title' => 'border-color: {{VALUE}}',
                        ],
                  ]
            );
            $this->add_control(
                  'online_btn1_style01',
                  [
                        'label' => __('رنگ متن دکمه', 'plugin-domain'),
                        'type' => \Elementor\Controls_Manager::COLOR,
                        'default' => '',
                        'selectors' => [
                              '{{WRAPPER}} .hex-card-download .accordion .card .card-header button.title' => 'color: {{VALUE}}',
                        ],
                  ]
            );
            $this->add_group_control(
                  \Elementor\Group_Control_Typography::get_type(),
                  [
                        'name' => 'online_typography1_style01',
                        'label' => __('تایپوگرافی دکمه', 'plugin-domain'),
                        'selector' => '{{WRAPPER}} .hex-card-download .accordion .card .card-header button.title',
                  ]
            );
            $this->add_control(
                  'desc_collaps',
                  [
                        'label' => __('استایل متن', 'plugin-name'),
                        'type' => \Elementor\Controls_Manager::HEADING,
                        'separator' => 'before',
                  ]
            );
            $this->add_control(
                  'desc_collaps_style01',
                  [
                        'label' => __('رنگ متن', 'plugin-domain'),
                        'type' => \Elementor\Controls_Manager::COLOR,
                        'default' => '',
                        'selectors' => [
                              '{{WRAPPER}} .hex-card-download .accordion .card .card-header .desc' => 'color: {{VALUE}}',
                        ],
                  ]
            );
            $this->add_group_control(
                  \Elementor\Group_Control_Typography::get_type(),
                  [
                        'name' => 'desc_collaps_style01',
                        'label' => __('تایپوگرافی متن', 'plugin-domain'),
                        'selector' => '{{WRAPPER}} .hex-card-download .accordion .card .card-header .desc',
                  ]
            );
            $this->add_control(
                  'more2_style03_collaps',
                  [
                        'label' => __('استایل دکمه دوم', 'plugin-name'),
                        'type' => \Elementor\Controls_Manager::HEADING,
                        'separator' => 'before',
                  ]
            );
            $this->add_control(
                  'padding_2_style03',
                  [
                        'label' => __('پدینگ', 'elementor'),
                        'type' => Controls_Manager::DIMENSIONS,
                        'size_units' => ['px', '%'],
                        'selectors' => [
                              '{{WRAPPER}} .hex-card-download .accordion .card .card-header button.button-collaps-ntf' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                  ]
            );

            $this->add_control(
                  'border_2_style03',
                  [
                        'label' => __('گوشه های مدور', 'elementor'),
                        'type' => Controls_Manager::DIMENSIONS,
                        'size_units' => ['px', '%'],
                        'selectors' => [
                              '{{WRAPPER}} .hex-card-download .accordion .card .card-header button.button-collaps-ntf' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                  ]
            );
            $this->add_group_control(
                  \Elementor\Group_Control_Background::get_type(),
                  [
                        'name' => 'background_2_style03',
                        'label' => esc_html__('Background', 'plugin-name'),
                        'types' => ['classic', 'gradient'],
                        'selector' => '{{WRAPPER}} .hex-card-download .accordion .card .card-header button.button-collaps-ntf',
                  ]
            );
            $this->add_group_control(
                  \Elementor\Group_Control_Box_Shadow::get_type(),
                  [
                        'name' => 'box_2_style03',
                        'label' => __('باکس شدوو', 'plugin-domain'),
                        'selector' => '{{WRAPPER}} .hex-card-download .accordion .card .card-header button.button-collaps-ntf',
                  ]
            );
            $this->add_control(
                  'more_style03_border2',
                  [
                        'label' => __('تنظیمات بردر', 'plugin-name'),
                        'type' => \Elementor\Controls_Manager::HEADING,
                        'separator' => 'before',
                  ]
            );
            $this->add_control(
                  'border_style2_style03',
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
                              '{{WRAPPER}} .hex-card-download .accordion .card .card-header button.button-collaps-ntf' => 'border-style: {{VALUE}}',
                        ],
                  ]
            );
            $this->add_responsive_control(
                  'width_border2_style03',
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
                              '{{WRAPPER}} .hex-card-download .accordion .card .card-header button.button-collaps-ntf' => 'border-width: {{SIZE}}{{UNIT}};',
                        ],
                  ]
            );
            $this->add_control(
                  'bg_button2_style03',
                  [
                        'label' => __('رنگ بردر', 'plugin-domain'),
                        'type' => Controls_Manager::COLOR,
                        'default' => '',
                        'selectors' => [
                              '{{WRAPPER}} .hex-card-download .accordion .card .card-header button.button-collaps-ntf' => 'border-color: {{VALUE}}',
                        ],
                  ]
            );
            $this->add_control(
                  'button_btn2_style01',
                  [
                        'label' => __('رنگ متن دکمه', 'plugin-domain'),
                        'type' => \Elementor\Controls_Manager::COLOR,
                        'default' => '',
                        'selectors' => [
                              '{{WRAPPER}} .hex-card-download .accordion .card .card-header button.button-collaps-ntf' => 'color: {{VALUE}}',
                        ],
                  ]
            );
            $this->add_group_control(
                  \Elementor\Group_Control_Typography::get_type(),
                  [
                        'name' => 'button_typography2_style01',
                        'label' => __('تایپوگرافی دکمه', 'plugin-domain'),
                        'selector' => '{{WRAPPER}} .hex-card-download .accordion .card .card-header button.button-collaps-ntf',
                  ]
            );
            $this->end_controls_section();
            $this->start_controls_section(
                  'section_box_download',
                  [
                        'label' => __('استایل باکس دانلود', 'elementor'),
                        'tab' => Controls_Manager::TAB_STYLE,
                        'condition' => [
                              'netflibs_select_card_download' => 'style03_products_lists',
                        ],
                  ]
            );
            $this->add_control(
                  'margin_box_download',
                  [
                        'label' => __('فاصله', 'elementor'),
                        'type' => Controls_Manager::DIMENSIONS,
                        'size_units' => ['px', '%'],
                        'selectors' => [
                              '{{WRAPPER}} .hex-card-download .accordion .card .collapse .card-body .card-download-he' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                  ]
            );
            $this->add_control(
                  'padding_box_download',
                  [
                        'label' => __('پدینگ', 'elementor'),
                        'type' => Controls_Manager::DIMENSIONS,
                        'size_units' => ['px', '%'],
                        'selectors' => [
                              '{{WRAPPER}} .hex-card-download .accordion .card .collapse .card-body .card-download-he' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                  ]
            );

            $this->add_control(
                  'border_radius_box_download',
                  [
                        'label' => __('گوشه های مدور', 'elementor'),
                        'type' => Controls_Manager::DIMENSIONS,
                        'size_units' => ['px', '%'],
                        'selectors' => [
                              '{{WRAPPER}} .hex-card-download .accordion .card .collapse .card-body .card-download-he' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                  ]
            );
            $this->add_group_control(
                  \Elementor\Group_Control_Background::get_type(),
                  [
                        'name' => 'background_box_download',
                        'label' => esc_html__('Background', 'plugin-name'),
                        'types' => ['classic', 'gradient'],
                        'selector' => '{{WRAPPER}} .hex-card-download .accordion .card .collapse .card-body .card-download-he',
                  ]
            );
            $this->add_group_control(
                  \Elementor\Group_Control_Box_Shadow::get_type(),
                  [
                        'name' => 'border_box_download',
                        'label' => __('باکس شدوو', 'plugin-domain'),
                        'selector' => '{{WRAPPER}} .hex-card-download .accordion .card .collapse .card-body .card-download-he',
                  ]
            );
            $this->add_control(
                  'more_style03_box_download',
                  [
                        'label' => __('تنظیمات بردر', 'plugin-name'),
                        'type' => \Elementor\Controls_Manager::HEADING,
                        'separator' => 'before',
                  ]
            );
            $this->add_control(
                  'border_box_download',
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
                              '{{WRAPPER}} .hex-card-download .accordion .card .collapse .card-body .card-download-he' => 'border-style: {{VALUE}}',
                        ],
                  ]
            );
            $this->add_responsive_control(
                  'width_box_download',
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
                              '{{WRAPPER}} .hex-card-download .accordion .card .collapse .card-body .card-download-he' => 'border-width: {{SIZE}}{{UNIT}};',
                        ],
                  ]
            );
            $this->add_control(
                  'color_box_download',
                  [
                        'label' => __('رنگ بردر', 'plugin-domain'),
                        'type' => Controls_Manager::COLOR,
                        'default' => '',
                        'selectors' => [
                              '{{WRAPPER}} .hex-card-download .accordion .card .collapse .card-body .card-download-he' => 'border-color: {{VALUE}}',
                        ],
                  ]
            );
            $this->add_control(
                  'text_series',
                  [
                        'label' => __('رنگ متن', 'plugin-domain'),
                        'type' => \Elementor\Controls_Manager::COLOR,
                        'default' => '',
                        'selectors' => [
                              '{{WRAPPER}} .hex-card-download .accordion .card .card-body .name-film' => 'color: {{VALUE}}',
                        ],
                  ]
            );
            $this->add_group_control(
                  \Elementor\Group_Control_Typography::get_type(),
                  [
                        'name' => 'text_typography2',
                        'label' => __('تایپوگرافی', 'plugin-domain'),
                        'selector' => '{{WRAPPER}} .hex-card-download .accordion .card .card-body .name-film',
                  ]
            );
            $this->add_control(
                  'button_download_box',
                  [
                        'label' => __('استایل دکمه دانلود', 'plugin-name'),
                        'type' => \Elementor\Controls_Manager::HEADING,
                        'separator' => 'before',
                  ]
            );
            $this->add_control(
                  'button_download_box_padding',
                  [
                        'label' => __('پدینگ', 'elementor'),
                        'type' => Controls_Manager::DIMENSIONS,
                        'size_units' => ['px', '%'],
                        'selectors' => [
                              '{{WRAPPER}} .hex-card-download .accordion .card .card-body .card-download-he .button-download a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                  ]
            );

            $this->add_control(
                  'button_download_box_radius',
                  [
                        'label' => __('گوشه های مدور', 'elementor'),
                        'type' => Controls_Manager::DIMENSIONS,
                        'size_units' => ['px', '%'],
                        'selectors' => [
                              '{{WRAPPER}} .hex-card-download .accordion .card .card-body .card-download-he .button-download a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                  ]
            );
            $this->add_group_control(
                  \Elementor\Group_Control_Background::get_type(),
                  [
                        'name' => 'button_download_box_background',
                        'label' => esc_html__('Background', 'plugin-name'),
                        'types' => ['classic', 'gradient'],
                        'selector' => '{{WRAPPER}} .hex-card-download .accordion .card .card-body .card-download-he .button-download a',
                  ]
            );
            $this->add_group_control(
                  \Elementor\Group_Control_Box_Shadow::get_type(),
                  [
                        'name' => 'button_download_box_shadow',
                        'label' => __('باکس شدوو', 'plugin-domain'),
                        'selector' => '{{WRAPPER}} .hex-card-download .accordion .card .card-body .card-download-he .button-download a',
                  ]
            );
            $this->add_control(
                  'button_download_box_setting_border',
                  [
                        'label' => __('تنظیمات بردر', 'plugin-name'),
                        'type' => \Elementor\Controls_Manager::HEADING,
                        'separator' => 'before',
                  ]
            );
            $this->add_control(
                  'button_download_box_border_style',
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
                              '{{WRAPPER}} .hex-card-download .accordion .card .card-body .card-download-he .button-download a' => 'border-style: {{VALUE}}',
                        ],
                  ]
            );
            $this->add_responsive_control(
                  'button_download_box_width',
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
                              '{{WRAPPER}} .hex-card-download .accordion .card .card-body .card-download-he .button-download a' => 'border-width: {{SIZE}}{{UNIT}};',
                        ],
                  ]
            );
            $this->add_control(
                  'button_download_box_border_color',
                  [
                        'label' => __('رنگ بردر', 'plugin-domain'),
                        'type' => Controls_Manager::COLOR,
                        'default' => '',
                        'selectors' => [
                              '{{WRAPPER}} .hex-card-download .accordion .card .card-body .card-download-he .button-download a' => 'border-color: {{VALUE}}',
                        ],
                  ]
            );
            $this->add_control(
                  'button_download_box_color',
                  [
                        'label' => __('رنگ متن دکمه', 'plugin-domain'),
                        'type' => \Elementor\Controls_Manager::COLOR,
                        'default' => '',
                        'selectors' => [
                              '{{WRAPPER}} .hex-card-download .accordion .card .card-body .card-download-he .button-download a' => 'color: {{VALUE}}',
                        ],
                  ]
            );
            $this->add_group_control(
                  \Elementor\Group_Control_Typography::get_type(),
                  [
                        'name' => 'button_download_box_typography',
                        'label' => __('تایپوگرافی دکمه', 'plugin-domain'),
                        'selector' => '{{WRAPPER}} .hex-card-download .accordion .card .card-body .card-download-he .button-download a',
                  ]
            );
            $this->end_controls_section();
      }


      protected function render()
      {
            $settings = $this->get_settings_for_display();
            $if_collaps_1 = get_post_meta(get_the_id(), 'group_field_id', true);
?>
            <?php if ($settings['woocommerce_select_card_download'] == 'style01_film_lists') { ?>
                  <?php if ($settings['netflibs_select_card_download'] == 'style01_products_lists') { ?>
                        <?php if ($if_collaps_1) { ?>
                              <div class="sec-web-dl">
                                    <div class="row">
                                          <div class="accordion" id="accordionExample">
                                                <?php
                                                $count_collaps = 0;
                                                $successful_students_items = get_post_meta(get_the_id(), 'group_field_id', true);

                                                if (!empty($successful_students_items)) {
                                                      foreach ($successful_students_items as $successful_students_item) { ?>
                                                            <?php
                                                            $restice_select = get_post_meta(get_the_ID(), 'restice_select', true);
                                                            if ('restice-no' === $restice_select) {
                                                            ?>
                                                                  <div class="card">
                                                                        <div class="card-header" id="heading-<?php echo $count_collaps; ?>">
                                                                              <h2 class="mb-0">
                                                                                    <button class="btn btn-link text-right float-right" type="button" data-toggle="collapse" data-target="#collapse-<?php echo $count_collaps; ?>" aria-expanded="false" aria-controls="collapse-<?php echo $count_collaps; ?>">
                                                                                          <?php echo $successful_students_item['title']; ?>
                                                                                    </button>
                                                                                    <button class="btn btn-link text-left float-left" type="button" data-toggle="collapse" data-target="#collapse-<?php echo $count_collaps; ?>" aria-expanded="false" aria-controls="collapse-<?php echo $count_collaps; ?>">
                                                                                          <span><?php \Elementor\Icons_Manager::render_icon( $settings['icon'], [ 'aria-hidden' => 'true' ] ); ?></span>
                                                                                    </button>
                                                                              </h2>
                                                                        </div>

                                                                        <div id="collapse-<?php echo $count_collaps; ?>" class="collapse text-right" aria-labelledby="heading" data-parent="#accordionExample">
                                                                              <div class="card-body">
                                                                                    <?php echo $successful_students_item['description']; ?>
                                                                              </div>
                                                                              <a href="<?php echo $successful_students_item['sub-link']; ?>" class="btn <?php echo $settings['type_buttom__style01']; ?> <?php echo $settings['round_buttom_style01']; ?> m-4"><i class="fas fa-download"></i><span class="mr-3"><?php echo $successful_students_item['sub-title']; ?></span></a>
                                                                        </div>

                                                                  </div>
                                                            <?php } ?>
                                                            <?php
                                                            $restice_select = get_post_meta(get_the_ID(), 'restice_select', true);
                                                            if ('restice-yes' === $restice_select) {
                                                            ?>
                                                                  <?php if (rcp_get_subscription()) { ?>
                                                                        <div class="card">
                                                                              <div class="card-header" id="heading-<?php echo $count_collaps; ?>">
                                                                                    <h2 class="mb-0">
                                                                                          <button class="btn btn-link text-right float-right" type="button" data-toggle="collapse" data-target="#collapse-<?php echo $count_collaps; ?>" aria-expanded="false" aria-controls="collapse-<?php echo $count_collaps; ?>">
                                                                                                <?php echo $successful_students_item['title']; ?>
                                                                                          </button>
                                                                                          <button class="btn btn-link text-left float-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapse-<?php echo $count_collaps; ?>">
                                                                                                <span><?php \Elementor\Icons_Manager::render_icon( $settings['icon'], [ 'aria-hidden' => 'true' ] ); ?></span>
                                                                                          </button>
                                                                                    </h2>
                                                                              </div>

                                                                              <div id="collapse-<?php echo $count_collaps; ?>" class="collapse text-right" aria-labelledby="heading" data-parent="#accordionExample">
                                                                                    <div class="card-body">
                                                                                          <?php echo $successful_students_item['description']; ?>
                                                                                    </div>
                                                                                    <a href="<?php echo $successful_students_item['sub-link']; ?>" class="btn <?php echo $settings['type_buttom__style01']; ?> <?php echo $settings['round_buttom_style01']; ?> m-4"><i class="fas fa-download"></i><span class="mr-3"><?php echo $successful_students_item['sub-title']; ?></span></a>
                                                                              </div>

                                                                        </div>
                                                                  <?php } else { ?>
                                                                        <div class="card">
                                                                              <div class="card-header" id="heading-<?php echo $count_collaps; ?>">
                                                                                    <h2 class="mb-0">
                                                                                          <button class="btn btn-link text-right float-right" type="button" data-toggle="collapse" data-target="#collapse-<?php echo $count_collaps; ?>" aria-expanded="false" aria-controls="collapse-<?php echo $count_collaps; ?>">
                                                                                                <?php echo $successful_students_item['title']; ?>
                                                                                          </button>
                                                                                          <button class="btn btn-link text-left float-left" type="button" data-toggle="collapse" data-target="#collapse-<?php echo $count_collaps; ?>" aria-expanded="false" aria-controls="collapse-<?php echo $count_collaps; ?>">
                                                                                                <span><?php \Elementor\Icons_Manager::render_icon( $settings['icon'], [ 'aria-hidden' => 'true' ] ); ?></span>
                                                                                          </button>
                                                                                    </h2>
                                                                              </div>

                                                                              <div id="collapse-<?php echo $count_collaps; ?>" class="collapse text-right" aria-labelledby="heading" data-parent="#accordionExample">
                                                                                    <div class="card-body">
                                                                                          <?php echo $successful_students_item['description']; ?>
                                                                                    </div>
                                                                                    <button type="button" class="btn btn-danger m-4" data-toggle="modal" data-target="#resigester"><i class="fas fa-download"></i><span class="mr-3"><?php echo $successful_students_item['sub-title']; ?></span></button>
                                                                              </div>

                                                                        </div>
                                                                  <?php } ?>
                                                            <?php } ?>
                                                <?php
                                                $count_collaps++;      }
                                                } ?>
                                          </div>
                                    </div>
                              </div>
                        <?php } else {
                        ?>
                              <div class="sec-web-dl">

                                    <div class="row">
                                          <div class="accordion" id="accordionExample">
                                                <div class="card">
                                                      <div class="card-header" id="heading">
                                                            <h2 class="mb-0">
                                                                  <button class="btn btn-link text-right float-right" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                                                        سرفصل اول تست </button>
                                                                  <button class="btn btn-link text-left float-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                                                        <span><?php \Elementor\Icons_Manager::render_icon( $settings['icon'], [ 'aria-hidden' => 'true' ] ); ?></span>
                                                                  </button>
                                                            </h2>
                                                      </div>

                                                      <div id="collapseOne" class="collapse text-right" aria-labelledby="heading" data-parent="#accordionExample">
                                                            <div class="card-body">
                                                                  این یک متن تست است </div>
                                                            <a href="#" class="btn btn-danger m-4"><svg class="svg-inline--fa fa-download fa-w-16" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="download" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                                                                        <path fill="currentColor" d="M480 352h-133.5l-45.25 45.25C289.2 409.3 273.1 416 256 416s-33.16-6.656-45.25-18.75L165.5 352H32c-17.67 0-32 14.33-32 32v96c0 17.67 14.33 32 32 32h448c17.67 0 32-14.33 32-32v-96C512 366.3 497.7 352 480 352zM432 456c-13.2 0-24-10.8-24-24c0-13.2 10.8-24 24-24s24 10.8 24 24C456 445.2 445.2 456 432 456zM233.4 374.6C239.6 380.9 247.8 384 256 384s16.38-3.125 22.62-9.375l128-128c12.49-12.5 12.49-32.75 0-45.25c-12.5-12.5-32.76-12.5-45.25 0L288 274.8V32c0-17.67-14.33-32-32-32C238.3 0 224 14.33 224 32v242.8L150.6 201.4c-12.49-12.5-32.75-12.5-45.25 0c-12.49 12.5-12.49 32.75 0 45.25L233.4 374.6z"></path>
                                                                  </svg><!-- <i class="fas fa-download"></i> Font Awesome fontawesome.com --><span class="mr-3">دانلود فیلم</span></a>
                                                      </div>

                                                </div>
                                                <div class="card">
                                                      <div class="card-header" id="heading">
                                                            <h2 class="mb-0">
                                                                  <button class="btn btn-link text-right float-right" type="button" data-toggle="collapse" data-target="#collapsetwo" aria-expanded="false" aria-controls="collapsetwo">
                                                                        سرفصل دوم </button>
                                                                  <button class="btn btn-link text-left float-left" type="button" data-toggle="collapse" data-target="#collapsetwo" aria-expanded="false" aria-controls="collapsetwo">
                                                                        <span><?php \Elementor\Icons_Manager::render_icon( $settings['icon'], [ 'aria-hidden' => 'true' ] ); ?></span>
                                                                  </button>
                                                            </h2>
                                                      </div>

                                                      <div id="collapsetwo" class="collapse text-right" aria-labelledby="heading" data-parent="#accordionExample">
                                                            <div class="card-body">
                                                                  این یک متن تست است </div>
                                                            <a href="#" class="btn btn-danger m-4"><svg class="svg-inline--fa fa-download fa-w-16" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="download" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                                                                        <path fill="currentColor" d="M480 352h-133.5l-45.25 45.25C289.2 409.3 273.1 416 256 416s-33.16-6.656-45.25-18.75L165.5 352H32c-17.67 0-32 14.33-32 32v96c0 17.67 14.33 32 32 32h448c17.67 0 32-14.33 32-32v-96C512 366.3 497.7 352 480 352zM432 456c-13.2 0-24-10.8-24-24c0-13.2 10.8-24 24-24s24 10.8 24 24C456 445.2 445.2 456 432 456zM233.4 374.6C239.6 380.9 247.8 384 256 384s16.38-3.125 22.62-9.375l128-128c12.49-12.5 12.49-32.75 0-45.25c-12.5-12.5-32.76-12.5-45.25 0L288 274.8V32c0-17.67-14.33-32-32-32C238.3 0 224 14.33 224 32v242.8L150.6 201.4c-12.49-12.5-32.75-12.5-45.25 0c-12.49 12.5-12.49 32.75 0 45.25L233.4 374.6z"></path>
                                                                  </svg><!-- <i class="fas fa-download"></i> Font Awesome fontawesome.com --><span class="mr-3">دانلود فیلم</span></a>
                                                      </div>

                                                </div>
                                          </div>
                                    </div>

                              </div>
                        <?php
                         } ?>

                        <!-- Modal -->
                        <div class="modal fade resigester-content" id="resigester" tabindex="-1" aria-labelledby="resigesterLabel" aria-hidden="true">
                              <div class="modal-dialog">
                                    <div class="modal-content">
                                          <div class="modal-header">
                                                <h5 class="modal-title" id="resigesterLabel">برای مشاهده این فیلم باید اشتراک داشته باشید</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                      <span aria-hidden="true">&times;</span>
                                                </button>
                                          </div>
                                          <div class="modal-body d-flex">
                                                <div class="col-6 text-center">
                                                      <a href="<?php echo site_url(); ?>/my-account" class="modal-btn-regester right-bg">ورود</a>
                                                </div>
                                                <div class="col-6 text-center">
                                                      <a href="<?php echo site_url(); ?>/my-account/support/" class="modal-btn-regester left-bg">خرید اشتراک</a>
                                                </div>
                                          </div>
                                    </div>
                              </div>
                        </div>
                  <?php } ?>
                  <?php if ($settings['netflibs_select_card_download'] == 'style02_products_lists') { ?>
                        <?php if ($if_collaps_1) { ?>
                              <div class="single-content-section">
                                    <div class="section-download-film my-4 p-4">
                                          <?php
                                          $successful_students_items = get_post_meta(get_the_id(), 'coagex_banner_group', true);

                                          ?>
                                          <ul class="nav nav-tabs fasl" id="myTab" role="tablist">
                                                <?php
                                                $successful_students_items = get_post_meta(get_the_id(), 'group_field_id', true);
                                                $count = 0;

                                                if (!empty($successful_students_items)) {
                                                      foreach ($successful_students_items as $successful_students_item) { ?>
                                                            <li class="nav-item item" role="presentation">
                                                                  <a class="nav-link <?php $class = $count == 0 ? 'active' : '';
                                                                                          echo $class; ?>" id="home-tab<?php echo $count; ?>" data-toggle="tab" href="#home<?php echo $count; ?>" role="tab" aria-controls="home" aria-selected="true"><?php echo $successful_students_item['title']; ?></a>
                                                            </li>
                                                <?php $count++;
                                                      }
                                                } ?>
                                          </ul>
                                          <div class="tab-content castebox" id="myTabContent">
                                                <?php
                                                $successful_students_items = get_post_meta(get_the_id(), 'group_field_id', true);
                                                $counter = 0;

                                                if (!empty($successful_students_items)) {
                                                      foreach ($successful_students_items as $successful_students_item) { ?>
                                                            <div class="tab-pane fade show <?php $class = $counter == 0 ? 'active' : '';
                                                                                                echo $class; ?>" id="home<?php echo $counter; ?>" role="tabpanel" aria-labelledby="home-tab<?php echo $counter; ?>">
                                                                  <?php
                                                                  $t = $successful_students_item['link_products'];
                                                                  $counting = 1;
                                                                  //$t = explode()
                                                                  foreach ($t as $junk) {
                                                                  ?>
                                                                        <?php
                                                                        $restice_select = get_post_meta(get_the_ID(), 'restice_select', true);
                                                                        if ('restice-no' === $restice_select) {
                                                                        ?>
                                                                              <div class="item-film-repact d-flex flex-wrap align-items-center">
                                                                                    <div class="col-md-4 col-12 text-right">
                                                                                          <span class="title-item text-white">قسمت <?php echo $counting; ?></span>
                                                                                    </div>
                                                                                    <div class="col-md-8 col-12 text-left">

                                                                                          <a type="button" href="<?php echo $junk; ?>" class="btn <?php echo $settings['type_buttom_1_style02']; ?> <?php echo $settings['round_buttom_1_style02']; ?>  text-white responsive-button"><i class="fas fa-download ml-2"></i>دانلود</a>
                                                                                          <a type="button" href="<?php echo $junk; ?>" class="btn <?php echo $settings['type_buttom_2_style02']; ?> <?php echo $settings['round_buttom_1_style02']; ?> text-white popup-youtube responsive-button"><i class="fas fa-download ml-2"></i>پخش آنلاین</a>

                                                                                    </div>
                                                                              </div>
                                                                        <?php } ?>
                                                                        <?php
                                                                        $restice_select = get_post_meta(get_the_ID(), 'restice_select', true);
                                                                        if ('restice-yes' === $restice_select) {
                                                                        ?>
                                                                              <?php if (rcp_get_subscription()) { ?>
                                                                                    <div class="item-film-repact d-flex flex-wrap align-items-center">
                                                                                          <div class="col-md-4 col-12 text-right">
                                                                                                <span class="title-item text-white">قسمت <?php echo $counting; ?></span>
                                                                                          </div>
                                                                                          <div class="col-md-8 col-12 text-left">

                                                                                                <a type="button" href="<?php echo $junk; ?>" class="btn <?php echo $settings['type_buttom_1_style02']; ?> <?php echo $settings['round_buttom_1_style02']; ?> text-white responsive-button"><i class="fas fa-download ml-2"></i>دانلود</a>
                                                                                                <a type="button" href="<?php echo $junk; ?>" class="btn <?php echo $settings['type_buttom_2_style02']; ?> <?php echo $settings['round_buttom_1_style02']; ?> text-white popup-youtube responsive-button"><i class="fas fa-download ml-2"></i>پخش آنلاین</a>
                                                                                          </div>
                                                                                    </div>
                                                                              <?php } else { ?>
                                                                                    <div class="item-film-repact d-flex flex-wrap align-items-center">
                                                                                          <div class="col-md-4 col-12 text-right">
                                                                                                <span class="title-item text-white">قسمت <?php echo $counting; ?></span>
                                                                                          </div>
                                                                                          <div class="col-md-8 col-12 text-left">
                                                                                                <buttom type="button" data-toggle="modal" data-target="#resigester" class="btn btn-success rounded text-white responsive-button"><i class="fa-solid fa-lock-keyhole"></i></buttom>
                                                                                          </div>
                                                                                    </div>
                                                                              <?php } ?>
                                                                        <?php } ?>
                                                                  <?php $counting++;
                                                                  } ?>
                                                            </div>
                                                <?php $counter++;
                                                      }
                                                } ?>
                                          </div>

                                    </div>
                              </div>
                        <?php } else { ?>
                              <div class="single-content-section">
                                    <div class="section-download-film my-4 p-4">
                                          <ul class="nav nav-tabs fasl" id="myTab" role="tablist">
                                                <li class="nav-item item" role="presentation">
                                                      <a class="nav-link active" id="home-tab0" data-toggle="tab" href="#home0" role="tab" aria-controls="home" aria-selected="true">سرفصل اول تست</a>
                                                </li>
                                                <li class="nav-item item" role="presentation">
                                                      <a class="nav-link " id="home-tab1" data-toggle="tab" href="#home1" role="tab" aria-controls="home" aria-selected="true">سرفصل دوم</a>
                                                </li>
                                          </ul>
                                          <div class="tab-content castebox" id="myTabContent">
                                                <div class="tab-pane fade show active" id="home0" role="tabpanel" aria-labelledby="home-tab0">
                                                      <div class="item-film-repact d-flex flex-wrap align-items-center">
                                                            <div class="col-md-4 col-12 text-right">
                                                                  <span class="title-item text-white">قسمت 1</span>
                                                            </div>
                                                            <div class="col-md-8 col-12 text-left">

                                                                  <a type="button" href="#" class="btn btn-danger rounded text-white responsive-button"><svg class="svg-inline--fa fa-download fa-w-16 ml-2" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="download" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                                                                              <path fill="currentColor" d="M480 352h-133.5l-45.25 45.25C289.2 409.3 273.1 416 256 416s-33.16-6.656-45.25-18.75L165.5 352H32c-17.67 0-32 14.33-32 32v96c0 17.67 14.33 32 32 32h448c17.67 0 32-14.33 32-32v-96C512 366.3 497.7 352 480 352zM432 456c-13.2 0-24-10.8-24-24c0-13.2 10.8-24 24-24s24 10.8 24 24C456 445.2 445.2 456 432 456zM233.4 374.6C239.6 380.9 247.8 384 256 384s16.38-3.125 22.62-9.375l128-128c12.49-12.5 12.49-32.75 0-45.25c-12.5-12.5-32.76-12.5-45.25 0L288 274.8V32c0-17.67-14.33-32-32-32C238.3 0 224 14.33 224 32v242.8L150.6 201.4c-12.49-12.5-32.75-12.5-45.25 0c-12.49 12.5-12.49 32.75 0 45.25L233.4 374.6z"></path>
                                                                        </svg><!-- <i class="fas fa-download ml-2"></i> Font Awesome fontawesome.com -->دانلود</a>
                                                                  <a type="button" href="#" class="btn btn-danger rounded text-white popup-youtube responsive-button"><svg class="svg-inline--fa fa-download fa-w-16 ml-2" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="download" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                                                                              <path fill="currentColor" d="M480 352h-133.5l-45.25 45.25C289.2 409.3 273.1 416 256 416s-33.16-6.656-45.25-18.75L165.5 352H32c-17.67 0-32 14.33-32 32v96c0 17.67 14.33 32 32 32h448c17.67 0 32-14.33 32-32v-96C512 366.3 497.7 352 480 352zM432 456c-13.2 0-24-10.8-24-24c0-13.2 10.8-24 24-24s24 10.8 24 24C456 445.2 445.2 456 432 456zM233.4 374.6C239.6 380.9 247.8 384 256 384s16.38-3.125 22.62-9.375l128-128c12.49-12.5 12.49-32.75 0-45.25c-12.5-12.5-32.76-12.5-45.25 0L288 274.8V32c0-17.67-14.33-32-32-32C238.3 0 224 14.33 224 32v242.8L150.6 201.4c-12.49-12.5-32.75-12.5-45.25 0c-12.49 12.5-12.49 32.75 0 45.25L233.4 374.6z"></path>
                                                                        </svg><!-- <i class="fas fa-download ml-2"></i> Font Awesome fontawesome.com -->پخش آنلاین</a>
                                                            </div>
                                                      </div>
                                                </div>
                                                <div class="tab-pane fade show " id="home1" role="tabpanel" aria-labelledby="home-tab1">
                                                      <div class="item-film-repact d-flex flex-wrap align-items-center">
                                                            <div class="col-md-4 col-12 text-right">
                                                                  <span class="title-item text-white">قسمت 1</span>
                                                            </div>
                                                            <div class="col-md-8 col-12 text-left">

                                                                  <a type="button" href="#" class="btn btn-danger rounded text-white responsive-button"><svg class="svg-inline--fa fa-download fa-w-16 ml-2" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="download" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                                                                              <path fill="currentColor" d="M480 352h-133.5l-45.25 45.25C289.2 409.3 273.1 416 256 416s-33.16-6.656-45.25-18.75L165.5 352H32c-17.67 0-32 14.33-32 32v96c0 17.67 14.33 32 32 32h448c17.67 0 32-14.33 32-32v-96C512 366.3 497.7 352 480 352zM432 456c-13.2 0-24-10.8-24-24c0-13.2 10.8-24 24-24s24 10.8 24 24C456 445.2 445.2 456 432 456zM233.4 374.6C239.6 380.9 247.8 384 256 384s16.38-3.125 22.62-9.375l128-128c12.49-12.5 12.49-32.75 0-45.25c-12.5-12.5-32.76-12.5-45.25 0L288 274.8V32c0-17.67-14.33-32-32-32C238.3 0 224 14.33 224 32v242.8L150.6 201.4c-12.49-12.5-32.75-12.5-45.25 0c-12.49 12.5-12.49 32.75 0 45.25L233.4 374.6z"></path>
                                                                        </svg><!-- <i class="fas fa-download ml-2"></i> Font Awesome fontawesome.com -->دانلود</a>
                                                                  <a type="button" href="#" class="btn btn-danger rounded text-white popup-youtube responsive-button"><svg class="svg-inline--fa fa-download fa-w-16 ml-2" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="download" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                                                                              <path fill="currentColor" d="M480 352h-133.5l-45.25 45.25C289.2 409.3 273.1 416 256 416s-33.16-6.656-45.25-18.75L165.5 352H32c-17.67 0-32 14.33-32 32v96c0 17.67 14.33 32 32 32h448c17.67 0 32-14.33 32-32v-96C512 366.3 497.7 352 480 352zM432 456c-13.2 0-24-10.8-24-24c0-13.2 10.8-24 24-24s24 10.8 24 24C456 445.2 445.2 456 432 456zM233.4 374.6C239.6 380.9 247.8 384 256 384s16.38-3.125 22.62-9.375l128-128c12.49-12.5 12.49-32.75 0-45.25c-12.5-12.5-32.76-12.5-45.25 0L288 274.8V32c0-17.67-14.33-32-32-32C238.3 0 224 14.33 224 32v242.8L150.6 201.4c-12.49-12.5-32.75-12.5-45.25 0c-12.49 12.5-12.49 32.75 0 45.25L233.4 374.6z"></path>
                                                                        </svg><!-- <i class="fas fa-download ml-2"></i> Font Awesome fontawesome.com -->پخش آنلاین</a>
                                                            </div>
                                                      </div>
                                                      <div class="item-film-repact d-flex flex-wrap align-items-center">
                                                            <div class="col-md-4 col-12 text-right">
                                                                  <span class="title-item text-white">قسمت 2</span>
                                                            </div>
                                                            <div class="col-md-8 col-12 text-left">

                                                                  <a type="button" href="#" class="btn btn-danger rounded text-white responsive-button"><svg class="svg-inline--fa fa-download fa-w-16 ml-2" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="download" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                                                                              <path fill="currentColor" d="M480 352h-133.5l-45.25 45.25C289.2 409.3 273.1 416 256 416s-33.16-6.656-45.25-18.75L165.5 352H32c-17.67 0-32 14.33-32 32v96c0 17.67 14.33 32 32 32h448c17.67 0 32-14.33 32-32v-96C512 366.3 497.7 352 480 352zM432 456c-13.2 0-24-10.8-24-24c0-13.2 10.8-24 24-24s24 10.8 24 24C456 445.2 445.2 456 432 456zM233.4 374.6C239.6 380.9 247.8 384 256 384s16.38-3.125 22.62-9.375l128-128c12.49-12.5 12.49-32.75 0-45.25c-12.5-12.5-32.76-12.5-45.25 0L288 274.8V32c0-17.67-14.33-32-32-32C238.3 0 224 14.33 224 32v242.8L150.6 201.4c-12.49-12.5-32.75-12.5-45.25 0c-12.49 12.5-12.49 32.75 0 45.25L233.4 374.6z"></path>
                                                                        </svg><!-- <i class="fas fa-download ml-2"></i> Font Awesome fontawesome.com -->دانلود</a>
                                                                  <a type="button" href="#" class="btn btn-danger rounded text-white popup-youtube responsive-button"><svg class="svg-inline--fa fa-download fa-w-16 ml-2" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="download" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                                                                              <path fill="currentColor" d="M480 352h-133.5l-45.25 45.25C289.2 409.3 273.1 416 256 416s-33.16-6.656-45.25-18.75L165.5 352H32c-17.67 0-32 14.33-32 32v96c0 17.67 14.33 32 32 32h448c17.67 0 32-14.33 32-32v-96C512 366.3 497.7 352 480 352zM432 456c-13.2 0-24-10.8-24-24c0-13.2 10.8-24 24-24s24 10.8 24 24C456 445.2 445.2 456 432 456zM233.4 374.6C239.6 380.9 247.8 384 256 384s16.38-3.125 22.62-9.375l128-128c12.49-12.5 12.49-32.75 0-45.25c-12.5-12.5-32.76-12.5-45.25 0L288 274.8V32c0-17.67-14.33-32-32-32C238.3 0 224 14.33 224 32v242.8L150.6 201.4c-12.49-12.5-32.75-12.5-45.25 0c-12.49 12.5-12.49 32.75 0 45.25L233.4 374.6z"></path>
                                                                        </svg><!-- <i class="fas fa-download ml-2"></i> Font Awesome fontawesome.com -->پخش آنلاین</a>
                                                            </div>
                                                      </div>
                                                </div>
                                          </div>

                                    </div>
                              </div>
                        <?php } ?>
                        <!-- Modal -->
                        <div class="modal fade resigester-content" id="resigester" tabindex="-1" aria-labelledby="resigesterLabel" aria-hidden="true">
                              <div class="modal-dialog">
                                    <div class="modal-content">
                                          <div class="modal-header">
                                                <h5 class="modal-title" id="resigesterLabel">برای مشاهده این فیلم باید اشتراک داشته باشید</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                      <span aria-hidden="true">&times;</span>
                                                </button>
                                          </div>
                                          <div class="modal-body d-flex">
                                                <div class="col-6 text-center">
                                                      <a href="<?php echo site_url(); ?>/my-account" class="modal-btn-regester right-bg">ورود</a>
                                                </div>
                                                <div class="col-6 text-center">
                                                      <a href="<?php echo site_url(); ?>/my-account/support/" class="modal-btn-regester left-bg">خرید اشتراک</a>
                                                </div>
                                          </div>
                                    </div>
                              </div>
                        </div>
                        <!-- Modal -->
                        <div class="modal fade productprices-content" id="productprices" tabindex="-1" aria-labelledby="productpricesLabel" aria-hidden="true">
                              <div class="modal-dialog">
                                    <div class="modal-content">
                                          <div class="modal-header">
                                                <h5 class="modal-title" id="productpricesLabel">ابتدا محصول را خریداری کنید</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                      <span aria-hidden="true">&times;</span>
                                                </button>
                                          </div>
                                          <div class="modal-body d-flex">
                                                <div class="col-12 text-center">
                                                      <a href="<?php echo site_url(); ?>/my-account" class="modal-btn-regester right-bg">ورود</a>
                                                </div>
                                          </div>
                                    </div>
                              </div>
                        </div>
                  <?php } ?>
                  <?php if ($settings['netflibs_select_card_download'] == 'style03_products_lists') { ?>
                        <?php if ($if_collaps_1) { ?>
                              <div class="hex-card-download">

                                    <div class="accordion" id="accordionExample">
                                          <?php
                                          $successful_accordion = get_post_meta(get_the_id(), 'group_field_id', true);
                                          $i = 0;
                                          if (!empty($successful_accordion)) {
                                                foreach ($successful_accordion as $accordion) { ?>
                                                      <?php
                                                      $restice_select = get_post_meta(get_the_ID(), 'restice_select', true);
                                                      if ('restice-no' === $restice_select) {
                                                      ?>
                                                            <div class="card">
                                                                  <div class="card-header" id="headingOne-<?php echo $i; ?>">
                                                                        <div class="d-flex align-items-center">
                                                                              <div class="col-6">
                                                                                    <h2 class="mb-0 text-right">
                                                                                          <button class="title d-inline-block" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                                                                <?php echo $accordion['title']; ?>
                                                                                          </button>
                                                                                          <div class="desc d-inline-block mr-2" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                                                                <?php echo $accordion['description']; ?>
                                                                                          </div>
                                                                                    </h2>
                                                                              </div>
                                                                              <div class="col-6">
                                                                                    <button class="button-collaps-ntf" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                                                          <?php echo $accordion['sub-title']; ?>
                                                                                    </button>
                                                                              </div>
                                                                        </div>

                                                                  </div>

                                                                  <div id="collapseOne" class="collapse <?php $class = $i == 0 ? 'show' : '';
                                                                                                            echo $class; ?>" aria-labelledby="headingOne-<?php echo $i; ?>" data-parent="#accordionExample">
                                                                        <div class="card-body">
                                                                              <div class="row">
                                                                                    <?php
                                                                                    $t = $accordion['link_products'];
                                                                                    $counting = 1;
                                                                                    //$t = explode()
                                                                                    foreach ($t as $junk) {
                                                                                    ?>
                                                                                          <div class="col-12 col-md-4 pr-0">
                                                                                                <div class="card-download-he my-2  ">
                                                                                                      <div class="d-flex align-items-center justify-content-between">
                                                                                                            <div class="name-film col-4 text-right">قسمت: <?php echo $counting; ?></div>
                                                                                                            <div class="button-download col-8 text-left">
                                                                                                                  <a href="<?php echo $junk; ?>" class="d-flex">دانلود</a>
                                                                                                            </div>
                                                                                                      </div>
                                                                                                </div>
                                                                                          </div>
                                                                                    <?php $counting++;
                                                                                    } ?>
                                                                              </div>
                                                                        </div>
                                                                  </div>
                                                            </div>
                                                      <?php } ?>
                                                      <?php
                                                      $restice_select = get_post_meta(get_the_ID(), 'restice_select', true);
                                                      if ('restice-yes' === $restice_select) {
                                                      ?>
                                                            <?php if (rcp_get_subscription()) { ?>
                                                                  <div class="card">
                                                                        <div class="card-header" id="headingOne-<?php echo $i; ?>">
                                                                              <div class="d-flex align-items-center">
                                                                                    <div class="col-6">
                                                                                          <h2 class="mb-0 text-right">
                                                                                                <button class="title d-inline-block" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                                                                      <?php echo $accordion['title']; ?>
                                                                                                </button>
                                                                                                <div class="desc d-inline-block mr-2" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                                                                      <?php echo $accordion['description']; ?>
                                                                                                </div>
                                                                                          </h2>
                                                                                    </div>
                                                                                    <div class="col-6">
                                                                                          <button class="button-collaps-ntf" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                                                                <?php echo $accordion['sub-title']; ?>
                                                                                          </button>
                                                                                    </div>
                                                                              </div>

                                                                        </div>

                                                                        <div id="collapseOne" class="collapse <?php $class = $i == 0 ? 'show' : '';
                                                                                                                  echo $class; ?>" aria-labelledby="headingOne-<?php echo $i; ?>" data-parent="#accordionExample">
                                                                              <div class="card-body">
                                                                                    <div class="row">
                                                                                          <?php
                                                                                          $t = $accordion['link_products'];
                                                                                          $counting = 1;
                                                                                          //$t = explode()
                                                                                          foreach ($t as $junk) {
                                                                                          ?>
                                                                                                <div class="col-12 col-md-4 pr-0">
                                                                                                      <div class="card-download-he my-2  ">
                                                                                                            <div class="d-flex align-items-center justify-content-between">
                                                                                                                  <div class="name-film col-4 text-right">قسمت: <?php echo $counting; ?></div>
                                                                                                                  <div class="button-download col-8 text-left">
                                                                                                                        <a href="<?php echo $junk; ?>" class="d-flex">دانلود</a>
                                                                                                                  </div>
                                                                                                            </div>
                                                                                                      </div>
                                                                                                </div>
                                                                                          <?php $counting++;
                                                                                          } ?>
                                                                                    </div>
                                                                              </div>
                                                                        </div>
                                                                  </div>

                                                            <?php } else { ?>

                                                                  <div class="card">
                                                                        <div class="card-header" id="headingOne-<?php echo $i; ?>">
                                                                              <div class="d-flex align-items-center">
                                                                                    <div class="col-6">
                                                                                          <h2 class="mb-0 text-right">
                                                                                                <button class="title d-inline-block" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                                                                      <?php echo $accordion['title']; ?>
                                                                                                </button>
                                                                                                <div class="desc d-inline-block mr-2" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                                                                      <?php echo $accordion['description']; ?>
                                                                                                </div>
                                                                                          </h2>
                                                                                    </div>
                                                                                    <div class="col-6">
                                                                                          <button class="button-collaps-ntf" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                                                                <?php echo $accordion['sub-title']; ?>
                                                                                          </button>
                                                                                    </div>
                                                                              </div>

                                                                        </div>

                                                                        <div id="collapseOne" class="collapse <?php $class = $i == 0 ? 'show' : '';
                                                                                                                  echo $class; ?>" aria-labelledby="headingOne-<?php echo $i; ?>" data-parent="#accordionExample">
                                                                              <div class="card-body">
                                                                                    <div class="row">
                                                                                          <?php
                                                                                          $t = $accordion['link_products'];
                                                                                          $counting = 1;
                                                                                          //$t = explode()
                                                                                          foreach ($t as $junk) {
                                                                                          ?>
                                                                                                <div class="col-12 col-md-4 pr-0">
                                                                                                      <div class="card-download-he my-2  ">
                                                                                                            <div class="d-flex align-items-center justify-content-between">
                                                                                                                  <div class="name-film col-4 text-right">قسمت: <?php echo $counting; ?></div>
                                                                                                                  <div class="button-download col-8 text-left">
                                                                                                                        <a type="button" class="d-flex" data-toggle="modal" data-target="#resigester"><i class="fa-solid fa-lock"></i><span class="mr-3">دانلود با اشتراک</span></a>
                                                                                                                  </div>
                                                                                                            </div>
                                                                                                      </div>
                                                                                                </div>
                                                                                          <?php $counting++;
                                                                                          } ?>
                                                                                    </div>
                                                                              </div>
                                                                        </div>
                                                                  </div>
                                                            <?php } ?>
                                                      <?php } ?>
                                          <?php $i++;
                                                }
                                          } ?>

                                    </div>
                              </div>
                        <?php } else { ?>
                              <div class="hex-card-download">

                                    <div class="accordion" id="accordionExample">
                                          <div class="card">
                                                <div class="card-header" id="headingOne-0">
                                                      <div class="d-flex align-items-center">
                                                            <div class="col-6">
                                                                  <h2 class="mb-0 text-right">
                                                                        <button class="title d-inline-block" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                                              سرفصل اول تست </button>
                                                                        <div class="desc d-inline-block mr-2" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                                              این یک متن تست است </div>
                                                                  </h2>
                                                            </div>
                                                            <div class="col-6">
                                                                  <button class="button-collaps-ntf" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                                        دانلود فیلم </button>
                                                            </div>
                                                      </div>

                                                </div>

                                                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne-0" data-parent="#accordionExample">
                                                      <div class="card-body">
                                                            <div class="row">
                                                                  <div class="col-12 col-md-4 pr-0">
                                                                        <div class="card-download-he my-2  ">
                                                                              <div class="d-flex align-items-center justify-content-between">
                                                                                    <div class="name-film col-4 text-right">قسمت: 1</div>
                                                                                    <div class="button-download col-8 text-left">
                                                                                          <a href="#" class="d-flex">دانلود</a>
                                                                                    </div>
                                                                              </div>
                                                                        </div>
                                                                  </div>
                                                            </div>
                                                      </div>
                                                </div>
                                          </div>

                                          <div class="card">
                                                <div class="card-header" id="headingOne-1">
                                                      <div class="d-flex align-items-center">
                                                            <div class="col-6">
                                                                  <h2 class="mb-0 text-right">
                                                                        <button class="title d-inline-block" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                                              سرفصل دوم </button>
                                                                        <div class="desc d-inline-block mr-2" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                                              این یک متن تست است </div>
                                                                  </h2>
                                                            </div>
                                                            <div class="col-6">
                                                                  <button class="button-collaps-ntf" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                                        دانلود فیلم </button>
                                                            </div>
                                                      </div>

                                                </div>

                                                <div id="collapseOne" class="collapse " aria-labelledby="headingOne-1" data-parent="#accordionExample">
                                                      <div class="card-body">
                                                            <div class="row">
                                                                  <div class="col-12 col-md-4 pr-0">
                                                                        <div class="card-download-he my-2  ">
                                                                              <div class="d-flex align-items-center justify-content-between">
                                                                                    <div class="name-film col-4 text-right">قسمت: 1</div>
                                                                                    <div class="button-download col-8 text-left">
                                                                                          <a href="#" class="d-flex">دانلود</a>
                                                                                    </div>
                                                                              </div>
                                                                        </div>
                                                                  </div>
                                                                  <div class="col-12 col-md-4 pr-0">
                                                                        <div class="card-download-he my-2  ">
                                                                              <div class="d-flex align-items-center justify-content-between">
                                                                                    <div class="name-film col-4 text-right">قسمت: 2</div>
                                                                                    <div class="button-download col-8 text-left">
                                                                                          <a href="#" class="d-flex">دانلود</a>
                                                                                    </div>
                                                                              </div>
                                                                        </div>
                                                                  </div>
                                                            </div>
                                                      </div>
                                                </div>
                                          </div>


                                    </div>
                              </div>
                        <?php } ?>
                        <!-- Modal -->
                        <div class="modal fade resigester-content" id="resigester" tabindex="-1" aria-labelledby="resigesterLabel" aria-hidden="true">
                              <div class="modal-dialog">
                                    <div class="modal-content">
                                          <div class="modal-header">
                                                <h5 class="modal-title" id="resigesterLabel">برای مشاهده این فیلم باید اشتراک داشته باشید</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                      <span aria-hidden="true">&times;</span>
                                                </button>
                                          </div>
                                          <div class="modal-body d-flex">
                                                <div class="col-6 text-center">
                                                      <a href="<?php echo site_url(); ?>/my-account" class="modal-btn-regester right-bg">ورود</a>
                                                </div>
                                                <div class="col-6 text-center">
                                                      <a href="<?php echo site_url(); ?>/my-account/support/" class="modal-btn-regester left-bg">خرید اشتراک</a>
                                                </div>
                                          </div>
                                    </div>
                              </div>
                        </div>
                  <?php } ?>
            <?php } ?>
            <?php if ($settings['woocommerce_select_card_download'] == 'style02_woo_lists') { ?>
                  <?php if ($settings['netflibs_select_card_download'] == 'style01_products_lists') { ?>
                        <?php if ($if_collaps_1) { ?>
                              <div class="sec-web-dl">
                                    <div class="row">
                                          <div class="accordion" id="accordionExample">
                                                <?php
                                                $woo_count = 0;
                                                $successful_students_items = get_post_meta(get_the_id(), 'group_field_id', true);

                                                if (!empty($successful_students_items)) {
                                                      foreach ($successful_students_items as $successful_students_item) { ?>
                                                            <?php
                                                            $restice_select = get_post_meta(get_the_ID(), 'restice_select', true);
                                                            if ('restice-no' === $restice_select) {
                                                            ?>
                                                                  <div class="card">
                                                                        <div class="card-header" id="heading-<?php echo $woo_count; ?>">
                                                                              <h2 class="mb-0">
                                                                                    <button class="btn btn-link text-right float-right" type="button" data-toggle="collapse" data-target="#collapseOne-<?php echo $woo_count; ?>" aria-expanded="false" aria-controls="collapseOne-<?php echo $woo_count; ?>">
                                                                                          <?php echo $successful_students_item['title']; ?>
                                                                                    </button>
                                                                                    <button class="btn btn-link text-left float-left" type="button" data-toggle="collapse" data-target="#collapseOne-<?php echo $woo_count; ?>" aria-expanded="false" aria-controls="collapseOne-<?php echo $woo_count; ?>">
                                                                                          <span><?php \Elementor\Icons_Manager::render_icon( $settings['icon'], [ 'aria-hidden' => 'true' ] ); ?></span>
                                                                                    </button>
                                                                              </h2>
                                                                        </div>

                                                                        <div id="collapseOne-<?php echo $woo_count; ?>" class="collapse text-right" aria-labelledby="heading" data-parent="#accordionExample">
                                                                              <div class="card-body">
                                                                                    <?php echo $successful_students_item['description']; ?>
                                                                              </div>
                                                                              <?php
                                                                              global $product;

                                                                              if ($product == Null) { ?>
                                                                                    <a href="<?php echo $successful_students_item['sub-link']; ?>" class="btn <?php echo $settings['type_buttom__style01']; ?> <?php echo $settings['round_buttom_style01']; ?> m-4"><i class="fas fa-download"></i><span class="mr-3"><?php echo $successful_students_item['sub-title']; ?></span></a>
                                                                                    <?php } else {

                                                                                    $logged_in = true;
                                                                                    $user = wp_get_current_user();
                                                                                    $user_id = $user->ID;
                                                                                    $customer_email = $user->user_email;
                                                                                    if (!empty($product)) {
                                                                                          $product_id = $product->get_id();
                                                                                    }
                                                                                    $bought = wc_customer_bought_product($customer_email, $user_id, $product_id);
                                                                                    if ($bought) {
                                                                                    ?>
                                                                                          <a href="<?php echo $successful_students_item['sub-link']; ?>" class="btn <?php echo $settings['type_buttom__style01']; ?> <?php echo $settings['round_buttom_style01']; ?> m-4"><i class="fas fa-download"></i><span class="mr-3"><?php echo $successful_students_item['sub-title']; ?></span></a>
                                                                                    <?php
                                                                                    } else { ?>
                                                                                          <buttom type="button" data-toggle="modal" data-target="#productprices" class="btn <?php echo $settings['type_buttom__style01']; ?> <?php echo $settings['round_buttom_style01']; ?> m-4 responsive-button"><i class="fa-solid fa-lock-keyhole"></i></buttom>
                                                                                    <?php } ?>
                                                                              <?php } ?>

                                                                        </div>

                                                                  </div>
                                                            <?php } ?>
                                                            <?php
                                                            $restice_select = get_post_meta(get_the_ID(), 'restice_select', true);
                                                            if ('restice-yes' === $restice_select) {
                                                            ?>
                                                                  <?php if (rcp_get_subscription()) { ?>
                                                                        <div class="card">
                                                                              <div class="card-header" id="heading-<?php echo $woo_count; ?>">
                                                                                    <h2 class="mb-0">
                                                                                          <button class="btn btn-link text-right float-right" type="button" data-toggle="collapse" data-target="#collapseOne-<?php echo $woo_count; ?>" aria-expanded="false" aria-controls="collapseOne-<?php echo $woo_count; ?>">
                                                                                                <?php echo $successful_students_item['title']; ?>
                                                                                          </button>
                                                                                          <button class="btn btn-link text-left float-left" type="button" data-toggle="collapse" data-target="#collapseOne-<?php echo $woo_count; ?>" aria-expanded="false" aria-controls="collapseOne-<?php echo $woo_count; ?>">
                                                                                                <span><?php \Elementor\Icons_Manager::render_icon( $settings['icon'], [ 'aria-hidden' => 'true' ] ); ?></span>
                                                                                          </button>
                                                                                    </h2>
                                                                              </div>

                                                                              <div id="collapseOne-<?php echo $woo_count; ?>" class="collapse text-right" aria-labelledby="heading" data-parent="#accordionExample">
                                                                                    <div class="card-body">
                                                                                          <?php echo $successful_students_item['description']; ?>
                                                                                    </div>
                                                                                    <a href="<?php echo $successful_students_item['sub-link']; ?>" class="btn <?php echo $settings['type_buttom__style01']; ?> <?php echo $settings['round_buttom_style01']; ?> m-4"><i class="fas fa-download"></i><span class="mr-3"><?php echo $successful_students_item['sub-title']; ?></span></a>
                                                                              </div>

                                                                        </div>
                                                                  <?php } else { ?>
                                                                        <div class="card">
                                                                              <div class="card-header" id="heading-<?php echo $woo_count; ?>">
                                                                                    <h2 class="mb-0">
                                                                                          <button class="btn btn-link text-right float-right" type="button" data-toggle="collapse" data-target="#collapseOne-<?php echo $woo_count; ?>" aria-expanded="false" aria-controls="collapseOne-<?php echo $woo_count; ?>">
                                                                                                <?php echo $successful_students_item['title']; ?>
                                                                                          </button>
                                                                                          <button class="btn btn-link text-left float-left" type="button" data-toggle="collapse" data-target="#collapseOne-<?php echo $woo_count; ?>" aria-expanded="false" aria-controls="collapseOne-<?php echo $woo_count; ?>">
                                                                                                <span><?php \Elementor\Icons_Manager::render_icon( $settings['icon'], [ 'aria-hidden' => 'true' ] ); ?></span>
                                                                                          </button>
                                                                                    </h2>
                                                                              </div>

                                                                              <div id="collapseOne-<?php echo $woo_count; ?>" class="collapse text-right" aria-labelledby="heading" data-parent="#accordionExample">
                                                                                    <div class="card-body">
                                                                                          <?php echo $successful_students_item['description']; ?>
                                                                                    </div>
                                                                                    <button type="button" class="btn btn-danger m-4" data-toggle="modal" data-target="#resigester"><i class="fas fa-download"></i><span class="mr-3"><?php echo $successful_students_item['sub-title']; ?></span></button>
                                                                              </div>

                                                                        </div>
                                                                  <?php } ?>
                                                            <?php } ?>
                                                <?php
                                                $woo_count++;  }
                                                } ?>
                                          </div>
                                    </div>

                              </div>
                        <?php } else { ?>
                              <div class="sec-web-dl">

                                    <div class="row">
                                          <div class="accordion" id="accordionExample">
                                                <div class="card">
                                                      <div class="card-header" id="heading">
                                                            <h2 class="mb-0">
                                                                  <button class="btn btn-link text-right float-right" type="button" data-toggle="collapse" data-target="#collapseOne-zwei" aria-expanded="false" aria-controls="collapseOne-zwei">
                                                                        سرفصل اول تست </button>
                                                                  <button class="btn btn-link text-left float-left" type="button" data-toggle="collapse" data-target="#collapseOne-zwei" aria-expanded="false" aria-controls="collapseOne-zwei">
                                                                        <span><?php \Elementor\Icons_Manager::render_icon( $settings['icon'], [ 'aria-hidden' => 'true' ] ); ?></span>
                                                                  </button>
                                                            </h2>
                                                      </div>

                                                      <div id="collapseOne-zwei" class="collapse text-right" aria-labelledby="heading" data-parent="#accordionExample">
                                                            <div class="card-body">
                                                                  این یک متن تست است </div>
                                                            <a href="#" class="btn btn-danger m-4"><svg class="svg-inline--fa fa-download fa-w-16" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="download" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                                                                        <path fill="currentColor" d="M480 352h-133.5l-45.25 45.25C289.2 409.3 273.1 416 256 416s-33.16-6.656-45.25-18.75L165.5 352H32c-17.67 0-32 14.33-32 32v96c0 17.67 14.33 32 32 32h448c17.67 0 32-14.33 32-32v-96C512 366.3 497.7 352 480 352zM432 456c-13.2 0-24-10.8-24-24c0-13.2 10.8-24 24-24s24 10.8 24 24C456 445.2 445.2 456 432 456zM233.4 374.6C239.6 380.9 247.8 384 256 384s16.38-3.125 22.62-9.375l128-128c12.49-12.5 12.49-32.75 0-45.25c-12.5-12.5-32.76-12.5-45.25 0L288 274.8V32c0-17.67-14.33-32-32-32C238.3 0 224 14.33 224 32v242.8L150.6 201.4c-12.49-12.5-32.75-12.5-45.25 0c-12.49 12.5-12.49 32.75 0 45.25L233.4 374.6z"></path>
                                                                  </svg><!-- <i class="fas fa-download"></i> Font Awesome fontawesome.com --><span class="mr-3">دانلود فیلم</span></a>
                                                      </div>

                                                </div>
                                                <div class="card">
                                                      <div class="card-header" id="heading">
                                                            <h2 class="mb-0">
                                                                  <button class="btn btn-link text-right float-right" type="button" data-toggle="collapse" data-target="#collapseOne-drei" aria-expanded="false" aria-controls="collapseOne-drei">
                                                                        سرفصل دوم </button>
                                                                  <button class="btn btn-link text-left float-left" type="button" data-toggle="collapse" data-target="#collapseOne-drei" aria-expanded="false" aria-controls="collapseOne-drei">
                                                                        <span><?php \Elementor\Icons_Manager::render_icon( $settings['icon'], [ 'aria-hidden' => 'true' ] ); ?></span>
                                                                  </button>
                                                            </h2>
                                                      </div>

                                                      <div id="collapseOne-drei" class="collapse text-right" aria-labelledby="heading" data-parent="#accordionExample">
                                                            <div class="card-body">
                                                                  این یک متن تست است </div>
                                                            <a href="#" class="btn btn-danger m-4"><svg class="svg-inline--fa fa-download fa-w-16" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="download" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                                                                        <path fill="currentColor" d="M480 352h-133.5l-45.25 45.25C289.2 409.3 273.1 416 256 416s-33.16-6.656-45.25-18.75L165.5 352H32c-17.67 0-32 14.33-32 32v96c0 17.67 14.33 32 32 32h448c17.67 0 32-14.33 32-32v-96C512 366.3 497.7 352 480 352zM432 456c-13.2 0-24-10.8-24-24c0-13.2 10.8-24 24-24s24 10.8 24 24C456 445.2 445.2 456 432 456zM233.4 374.6C239.6 380.9 247.8 384 256 384s16.38-3.125 22.62-9.375l128-128c12.49-12.5 12.49-32.75 0-45.25c-12.5-12.5-32.76-12.5-45.25 0L288 274.8V32c0-17.67-14.33-32-32-32C238.3 0 224 14.33 224 32v242.8L150.6 201.4c-12.49-12.5-32.75-12.5-45.25 0c-12.49 12.5-12.49 32.75 0 45.25L233.4 374.6z"></path>
                                                                  </svg><!-- <i class="fas fa-download"></i> Font Awesome fontawesome.com --><span class="mr-3">دانلود فیلم</span></a>
                                                      </div>

                                                </div>
                                          </div>
                                    </div>

                              </div>
                        <?php } ?>
                        <!-- Modal -->
                        <div class="modal fade resigester-content" id="resigester" tabindex="-1" aria-labelledby="resigesterLabel" aria-hidden="true">
                              <div class="modal-dialog">
                                    <div class="modal-content">
                                          <div class="modal-header">
                                                <h5 class="modal-title" id="resigesterLabel">برای مشاهده این فیلم باید اشتراک داشته باشید</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                      <span aria-hidden="true">&times;</span>
                                                </button>
                                          </div>
                                          <div class="modal-body d-flex">
                                                <div class="col-6 text-center">
                                                      <a href="<?php echo site_url(); ?>/my-account" class="modal-btn-regester right-bg">ورود</a>
                                                </div>
                                                <div class="col-6 text-center">
                                                      <a href="<?php echo site_url(); ?>/my-account/support/" class="modal-btn-regester left-bg">خرید اشتراک</a>
                                                </div>
                                          </div>
                                    </div>
                              </div>
                        </div>
                        <!-- Modal -->
                        <div class="modal fade productprices-content" id="productprices" tabindex="-1" aria-labelledby="productpricesLabel" aria-hidden="true">
                              <div class="modal-dialog">
                                    <div class="modal-content">
                                          <div class="modal-header">
                                                <h5 class="modal-title" id="productpricesLabel">ابتدا محصول را خریداری کنید</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                      <span aria-hidden="true">&times;</span>
                                                </button>
                                          </div>
                                          <div class="modal-body d-flex">
                                                <div class="col-12 text-center">
                                                      <a href="<?php echo site_url(); ?>/my-account" class="modal-btn-regester right-bg">ورود</a>
                                                </div>
                                          </div>
                                    </div>
                              </div>
                        </div>
                  <?php } ?>
                  <?php if ($settings['netflibs_select_card_download'] == 'style02_products_lists') { ?>
                        <?php if ($if_collaps_1) { ?>
                              <div class="single-content-section">
                                    <div class="section-download-film my-4 p-4">
                                          <?php
                                          $successful_students_items = get_post_meta(get_the_id(), 'coagex_banner_group', true);

                                          ?>
                                          <ul class="nav nav-tabs fasl" id="myTab" role="tablist">
                                                <?php
                                                $successful_students_items = get_post_meta(get_the_id(), 'group_field_id', true);
                                                $count = 0;

                                                if (!empty($successful_students_items)) {
                                                      foreach ($successful_students_items as $successful_students_item) { ?>
                                                            <li class="nav-item item" role="presentation">
                                                                  <a class="nav-link <?php $class = $count == 0 ? 'active' : '';
                                                                                          echo $class; ?>" id="home-tab<?php echo $count; ?>" data-toggle="tab" href="#home<?php echo $count; ?>" role="tab" aria-controls="home" aria-selected="true"><?php echo $successful_students_item['title']; ?></a>
                                                            </li>
                                                <?php $count++;
                                                      }
                                                } ?>
                                          </ul>
                                          <div class="tab-content castebox" id="myTabContent">
                                                <?php
                                                $successful_students_items = get_post_meta(get_the_id(), 'group_field_id', true);
                                                $counter = 0;

                                                if (!empty($successful_students_items)) {
                                                      foreach ($successful_students_items as $successful_students_item) { ?>
                                                            <div class="tab-pane fade show <?php $class = $counter == 0 ? 'active' : '';
                                                                                                echo $class; ?>" id="home<?php echo $counter; ?>" role="tabpanel" aria-labelledby="home-tab<?php echo $counter; ?>">
                                                                  <?php
                                                                  $t = $successful_students_item['link_products'];
                                                                  $counting = 1;
                                                                  //$t = explode()
                                                                  foreach ($t as $junk) {
                                                                  ?>
                                                                        <?php
                                                                        $restice_select = get_post_meta(get_the_ID(), 'restice_select', true);
                                                                        if ('restice-no' === $restice_select) {
                                                                        ?>
                                                                              <div class="item-film-repact d-flex flex-wrap align-items-center">
                                                                                    <div class="col-md-4 col-12 text-right">
                                                                                          <span class="title-item text-white">قسمت <?php echo $counting; ?></span>
                                                                                    </div>
                                                                                    <div class="col-md-8 col-12 text-left">
                                                                                          <?php
                                                                                          global $product;

                                                                                          if ($product == Null) { ?>
                                                                                                <a type="button" href="<?php echo $junk; ?>" class="btn <?php echo $settings['type_buttom_1_style02']; ?> <?php echo $settings['round_buttom_1_style02']; ?> text-white responsive-button"><i class="fas fa-download ml-2"></i>دانلود</a>
                                                                                                <a type="button" href="<?php echo $junk; ?>" class="btn <?php echo $settings['type_buttom_2_style02']; ?> <?php echo $settings['round_buttom_1_style02']; ?> text-white popup-youtube responsive-button"><i class="fas fa-download ml-2"></i>پخش آنلاین</a>
                                                                                                <?php } else {

                                                                                                $logged_in = true;
                                                                                                $user = wp_get_current_user();
                                                                                                $user_id = $user->ID;
                                                                                                $customer_email = $user->user_email;
                                                                                                if (!empty($product)) {
                                                                                                      $product_id = $product->get_id();
                                                                                                }
                                                                                                $bought = wc_customer_bought_product($customer_email, $user_id, $product_id);
                                                                                                if ($bought) {
                                                                                                ?>
                                                                                                      <a type="button" href="<?php echo $junk; ?>" class="btn btn-success rounded text-white responsive-button"><i class="fas fa-download ml-2"></i>دانلود</a>
                                                                                                      <a type="button" href="<?php echo $junk; ?>" class="btn bg-warning rounded text-white popup-youtube responsive-button"><i class="fas fa-download ml-2"></i>پخش آنلاین</a>
                                                                                                <?php
                                                                                                } else { ?>
                                                                                                      <buttom type="button" data-toggle="modal" data-target="#productprices" class="btn btn-success rounded text-white responsive-button"><i class="fa-solid fa-lock-keyhole"></i></buttom>
                                                                                                <?php } ?>
                                                                                          <?php } ?>
                                                                                    </div>
                                                                              </div>
                                                                        <?php } ?>
                                                                        <?php
                                                                        $restice_select = get_post_meta(get_the_ID(), 'restice_select', true);
                                                                        if ('restice-yes' === $restice_select) {
                                                                        ?>
                                                                              <?php if (rcp_get_subscription()) { ?>
                                                                                    <div class="item-film-repact d-flex flex-wrap align-items-center">
                                                                                          <div class="col-md-4 col-12 text-right">
                                                                                                <span class="title-item text-white">قسمت <?php echo $counting; ?></span>
                                                                                          </div>
                                                                                          <div class="col-md-8 col-12 text-left">

                                                                                                <a type="button" href="<?php echo $junk; ?>" class="btn <?php echo $settings['type_buttom_1_style02']; ?> <?php echo $settings['round_buttom_1_style02']; ?> text-white responsive-button"><i class="fas fa-download ml-2"></i>دانلود</a>
                                                                                                <a type="button" href="<?php echo $junk; ?>" class="btn <?php echo $settings['type_buttom_2_style02']; ?> <?php echo $settings['round_buttom_1_style02']; ?> text-white popup-youtube responsive-button"><i class="fas fa-download ml-2"></i>پخش آنلاین</a>
                                                                                          </div>
                                                                                    </div>
                                                                              <?php } else { ?>
                                                                                    <div class="item-film-repact d-flex flex-wrap align-items-center">
                                                                                          <div class="col-md-4 col-12 text-right">
                                                                                                <span class="title-item text-white">قسمت <?php echo $counting; ?></span>
                                                                                          </div>
                                                                                          <div class="col-md-8 col-12 text-left">
                                                                                                <buttom type="button" data-toggle="modal" data-target="#resigester" class="btn btn-success rounded text-white responsive-button"><i class="fa-solid fa-lock-keyhole"></i></buttom>
                                                                                          </div>
                                                                                    </div>
                                                                              <?php } ?>
                                                                        <?php } ?>
                                                                  <?php $counting++;
                                                                  } ?>
                                                            </div>

                                                <?php $counter++;
                                                      }
                                                } ?>
                                          </div>

                                    </div>
                              </div>
                        <?php } else { ?>
                              <div class="single-content-section">
                                    <div class="section-download-film my-4 p-4">
                                          <ul class="nav nav-tabs fasl" id="myTab" role="tablist">
                                                <li class="nav-item item" role="presentation">
                                                      <a class="nav-link active" id="home-tab0" data-toggle="tab" href="#home0" role="tab" aria-controls="home" aria-selected="true">سرفصل اول تست</a>
                                                </li>
                                                <li class="nav-item item" role="presentation">
                                                      <a class="nav-link " id="home-tab1" data-toggle="tab" href="#home1" role="tab" aria-controls="home" aria-selected="true">سرفصل دوم</a>
                                                </li>
                                          </ul>
                                          <div class="tab-content castebox" id="myTabContent">
                                                <div class="tab-pane fade show active" id="home0" role="tabpanel" aria-labelledby="home-tab0">
                                                      <div class="item-film-repact d-flex flex-wrap align-items-center">
                                                            <div class="col-md-4 col-12 text-right">
                                                                  <span class="title-item text-white">قسمت 1</span>
                                                            </div>
                                                            <div class="col-md-8 col-12 text-left">

                                                                  <a type="button" href="#" class="btn btn-danger rounded text-white responsive-button"><svg class="svg-inline--fa fa-download fa-w-16 ml-2" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="download" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                                                                              <path fill="currentColor" d="M480 352h-133.5l-45.25 45.25C289.2 409.3 273.1 416 256 416s-33.16-6.656-45.25-18.75L165.5 352H32c-17.67 0-32 14.33-32 32v96c0 17.67 14.33 32 32 32h448c17.67 0 32-14.33 32-32v-96C512 366.3 497.7 352 480 352zM432 456c-13.2 0-24-10.8-24-24c0-13.2 10.8-24 24-24s24 10.8 24 24C456 445.2 445.2 456 432 456zM233.4 374.6C239.6 380.9 247.8 384 256 384s16.38-3.125 22.62-9.375l128-128c12.49-12.5 12.49-32.75 0-45.25c-12.5-12.5-32.76-12.5-45.25 0L288 274.8V32c0-17.67-14.33-32-32-32C238.3 0 224 14.33 224 32v242.8L150.6 201.4c-12.49-12.5-32.75-12.5-45.25 0c-12.49 12.5-12.49 32.75 0 45.25L233.4 374.6z"></path>
                                                                        </svg><!-- <i class="fas fa-download ml-2"></i> Font Awesome fontawesome.com -->دانلود</a>
                                                                  <a type="button" href="#" class="btn btn-danger rounded text-white popup-youtube responsive-button"><svg class="svg-inline--fa fa-download fa-w-16 ml-2" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="download" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                                                                              <path fill="currentColor" d="M480 352h-133.5l-45.25 45.25C289.2 409.3 273.1 416 256 416s-33.16-6.656-45.25-18.75L165.5 352H32c-17.67 0-32 14.33-32 32v96c0 17.67 14.33 32 32 32h448c17.67 0 32-14.33 32-32v-96C512 366.3 497.7 352 480 352zM432 456c-13.2 0-24-10.8-24-24c0-13.2 10.8-24 24-24s24 10.8 24 24C456 445.2 445.2 456 432 456zM233.4 374.6C239.6 380.9 247.8 384 256 384s16.38-3.125 22.62-9.375l128-128c12.49-12.5 12.49-32.75 0-45.25c-12.5-12.5-32.76-12.5-45.25 0L288 274.8V32c0-17.67-14.33-32-32-32C238.3 0 224 14.33 224 32v242.8L150.6 201.4c-12.49-12.5-32.75-12.5-45.25 0c-12.49 12.5-12.49 32.75 0 45.25L233.4 374.6z"></path>
                                                                        </svg><!-- <i class="fas fa-download ml-2"></i> Font Awesome fontawesome.com -->پخش آنلاین</a>
                                                            </div>
                                                      </div>
                                                </div>
                                                <div class="tab-pane fade show " id="home1" role="tabpanel" aria-labelledby="home-tab1">
                                                      <div class="item-film-repact d-flex flex-wrap align-items-center">
                                                            <div class="col-md-4 col-12 text-right">
                                                                  <span class="title-item text-white">قسمت 1</span>
                                                            </div>
                                                            <div class="col-md-8 col-12 text-left">

                                                                  <a type="button" href="#" class="btn btn-danger rounded text-white responsive-button"><svg class="svg-inline--fa fa-download fa-w-16 ml-2" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="download" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                                                                              <path fill="currentColor" d="M480 352h-133.5l-45.25 45.25C289.2 409.3 273.1 416 256 416s-33.16-6.656-45.25-18.75L165.5 352H32c-17.67 0-32 14.33-32 32v96c0 17.67 14.33 32 32 32h448c17.67 0 32-14.33 32-32v-96C512 366.3 497.7 352 480 352zM432 456c-13.2 0-24-10.8-24-24c0-13.2 10.8-24 24-24s24 10.8 24 24C456 445.2 445.2 456 432 456zM233.4 374.6C239.6 380.9 247.8 384 256 384s16.38-3.125 22.62-9.375l128-128c12.49-12.5 12.49-32.75 0-45.25c-12.5-12.5-32.76-12.5-45.25 0L288 274.8V32c0-17.67-14.33-32-32-32C238.3 0 224 14.33 224 32v242.8L150.6 201.4c-12.49-12.5-32.75-12.5-45.25 0c-12.49 12.5-12.49 32.75 0 45.25L233.4 374.6z"></path>
                                                                        </svg><!-- <i class="fas fa-download ml-2"></i> Font Awesome fontawesome.com -->دانلود</a>
                                                                  <a type="button" href="#" class="btn btn-danger rounded text-white popup-youtube responsive-button"><svg class="svg-inline--fa fa-download fa-w-16 ml-2" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="download" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                                                                              <path fill="currentColor" d="M480 352h-133.5l-45.25 45.25C289.2 409.3 273.1 416 256 416s-33.16-6.656-45.25-18.75L165.5 352H32c-17.67 0-32 14.33-32 32v96c0 17.67 14.33 32 32 32h448c17.67 0 32-14.33 32-32v-96C512 366.3 497.7 352 480 352zM432 456c-13.2 0-24-10.8-24-24c0-13.2 10.8-24 24-24s24 10.8 24 24C456 445.2 445.2 456 432 456zM233.4 374.6C239.6 380.9 247.8 384 256 384s16.38-3.125 22.62-9.375l128-128c12.49-12.5 12.49-32.75 0-45.25c-12.5-12.5-32.76-12.5-45.25 0L288 274.8V32c0-17.67-14.33-32-32-32C238.3 0 224 14.33 224 32v242.8L150.6 201.4c-12.49-12.5-32.75-12.5-45.25 0c-12.49 12.5-12.49 32.75 0 45.25L233.4 374.6z"></path>
                                                                        </svg><!-- <i class="fas fa-download ml-2"></i> Font Awesome fontawesome.com -->پخش آنلاین</a>
                                                            </div>
                                                      </div>
                                                      <div class="item-film-repact d-flex flex-wrap align-items-center">
                                                            <div class="col-md-4 col-12 text-right">
                                                                  <span class="title-item text-white">قسمت 2</span>
                                                            </div>
                                                            <div class="col-md-8 col-12 text-left">

                                                                  <a type="button" href="#" class="btn btn-danger rounded text-white responsive-button"><svg class="svg-inline--fa fa-download fa-w-16 ml-2" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="download" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                                                                              <path fill="currentColor" d="M480 352h-133.5l-45.25 45.25C289.2 409.3 273.1 416 256 416s-33.16-6.656-45.25-18.75L165.5 352H32c-17.67 0-32 14.33-32 32v96c0 17.67 14.33 32 32 32h448c17.67 0 32-14.33 32-32v-96C512 366.3 497.7 352 480 352zM432 456c-13.2 0-24-10.8-24-24c0-13.2 10.8-24 24-24s24 10.8 24 24C456 445.2 445.2 456 432 456zM233.4 374.6C239.6 380.9 247.8 384 256 384s16.38-3.125 22.62-9.375l128-128c12.49-12.5 12.49-32.75 0-45.25c-12.5-12.5-32.76-12.5-45.25 0L288 274.8V32c0-17.67-14.33-32-32-32C238.3 0 224 14.33 224 32v242.8L150.6 201.4c-12.49-12.5-32.75-12.5-45.25 0c-12.49 12.5-12.49 32.75 0 45.25L233.4 374.6z"></path>
                                                                        </svg><!-- <i class="fas fa-download ml-2"></i> Font Awesome fontawesome.com -->دانلود</a>
                                                                  <a type="button" href="#" class="btn btn-danger rounded text-white popup-youtube responsive-button"><svg class="svg-inline--fa fa-download fa-w-16 ml-2" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="download" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                                                                              <path fill="currentColor" d="M480 352h-133.5l-45.25 45.25C289.2 409.3 273.1 416 256 416s-33.16-6.656-45.25-18.75L165.5 352H32c-17.67 0-32 14.33-32 32v96c0 17.67 14.33 32 32 32h448c17.67 0 32-14.33 32-32v-96C512 366.3 497.7 352 480 352zM432 456c-13.2 0-24-10.8-24-24c0-13.2 10.8-24 24-24s24 10.8 24 24C456 445.2 445.2 456 432 456zM233.4 374.6C239.6 380.9 247.8 384 256 384s16.38-3.125 22.62-9.375l128-128c12.49-12.5 12.49-32.75 0-45.25c-12.5-12.5-32.76-12.5-45.25 0L288 274.8V32c0-17.67-14.33-32-32-32C238.3 0 224 14.33 224 32v242.8L150.6 201.4c-12.49-12.5-32.75-12.5-45.25 0c-12.49 12.5-12.49 32.75 0 45.25L233.4 374.6z"></path>
                                                                        </svg><!-- <i class="fas fa-download ml-2"></i> Font Awesome fontawesome.com -->پخش آنلاین</a>
                                                            </div>
                                                      </div>
                                                </div>
                                          </div>

                                    </div>
                              </div>
                        <?php } ?>
                        <!-- Modal -->
                        <div class="modal fade resigester-content" id="resigester" tabindex="-1" aria-labelledby="resigesterLabel" aria-hidden="true">
                              <div class="modal-dialog">
                                    <div class="modal-content">
                                          <div class="modal-header">
                                                <h5 class="modal-title" id="resigesterLabel">برای مشاهده این فیلم باید اشتراک داشته باشید</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                      <span aria-hidden="true">&times;</span>
                                                </button>
                                          </div>
                                          <div class="modal-body d-flex">
                                                <div class="col-6 text-center">
                                                      <a href="<?php echo site_url(); ?>/my-account" class="modal-btn-regester right-bg">ورود</a>
                                                </div>
                                                <div class="col-6 text-center">
                                                      <a href="<?php echo site_url(); ?>/my-account/support/" class="modal-btn-regester left-bg">خرید اشتراک</a>
                                                </div>
                                          </div>
                                    </div>
                              </div>
                        </div>
                        <!-- Modal -->
                        <div class="modal fade productprices-content" id="productprices" tabindex="-1" aria-labelledby="productpricesLabel" aria-hidden="true">
                              <div class="modal-dialog">
                                    <div class="modal-content">
                                          <div class="modal-header">
                                                <h5 class="modal-title" id="productpricesLabel">ابتدا محصول را خریداری کنید</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                      <span aria-hidden="true">&times;</span>
                                                </button>
                                          </div>
                                          <div class="modal-body d-flex">
                                                <div class="col-12 text-center">
                                                      <a href="<?php echo site_url(); ?>/my-account" class="modal-btn-regester right-bg">ورود</a>
                                                </div>
                                          </div>
                                    </div>
                              </div>
                        </div>
                  <?php } ?>
                  <?php if ($settings['netflibs_select_card_download'] == 'style03_products_lists') { ?>
                        <?php if ($if_collaps_1) { ?>
                              <div class="hex-card-download">

                                    <div class="accordion" id="accordionExample">
                                          <?php
                                          $successful_accordion = get_post_meta(get_the_id(), 'group_field_id', true);
                                          $i = 0;
                                          if (!empty($successful_accordion)) {
                                                foreach ($successful_accordion as $accordion) { ?>
                                                      <?php
                                                      $restice_select = get_post_meta(get_the_ID(), 'restice_select', true);
                                                      if ('restice-no' === $restice_select) {
                                                      ?>
                                                            <div class="card">
                                                                  <div class="card-header" id="headingOne-<?php echo $i; ?>">
                                                                        <div class="d-flex align-items-center">
                                                                              <div class="col-6">
                                                                                    <h2 class="mb-0 text-right">
                                                                                          <button class="title d-inline-block" type="button" data-toggle="collapse" data-target="#collapseOne-<?php echo $i; ?>" aria-expanded="true" aria-controls="collapseOne-<?php echo $i; ?>">
                                                                                                <?php echo $accordion['title']; ?>
                                                                                          </button>
                                                                                          <div class="desc d-inline-block mr-2" type="button" data-toggle="collapse" data-target="#collapseOne-<?php echo $i; ?>" aria-expanded="true" aria-controls="collapseOne-<?php echo $i; ?>">
                                                                                                <?php echo $accordion['description']; ?>
                                                                                          </div>
                                                                                    </h2>
                                                                              </div>
                                                                              <div class="col-6">
                                                                                    <button class="button-collaps-ntf" type="button" data-toggle="collapse" data-target="#collapseOne-<?php echo $i; ?>" aria-expanded="true" aria-controls="collapseOne-<?php echo $i; ?>">
                                                                                          <?php echo $accordion['sub-title']; ?>
                                                                                    </button>
                                                                              </div>
                                                                        </div>

                                                                  </div>

                                                                  <div id="collapseOne-<?php echo $i; ?>" class="collapse <?php $class = $i == 0 ? 'show' : ''; echo $class; ?>" aria-labelledby="headingOne-<?php echo $i; ?>" data-parent="#accordionExample">
                                                                        <div class="card-body">
                                                                              <div class="row">
                                                                                    <?php
                                                                                    $t = $accordion['link_products'];
                                                                                    $counting = 1;
                                                                                    //$t = explode()
                                                                                    foreach ($t as $junk) {
                                                                                    ?>
                                                                                          <div class="col-12 col-md-4 pr-0">
                                                                                                <div class="card-download-he my-2  ">
                                                                                                      <div class="d-flex align-items-center justify-content-between">
                                                                                                            <div class="name-film col-4 text-right">قسمت: <?php echo $counting; ?></div>
                                                                                                            <div class="button-download col-8 text-left">
                                                                                                                  
                                                                                                                  <?php
                                                                                                                  global $product;

                                                                                                                  if ($product == Null) { ?>
                                                                                                                        <a href="<?php echo $junk; ?>" class="d-flex">دانلود</a>
                                                                                                                        <?php } else {

                                                                                                                        $logged_in = true;
                                                                                                                        $user = wp_get_current_user();
                                                                                                                        $user_id = $user->ID;
                                                                                                                        $customer_email = $user->user_email;
                                                                                                                        if (!empty($product)) {
                                                                                                                              $product_id = $product->get_id();
                                                                                                                        }
                                                                                                                        $bought = wc_customer_bought_product($customer_email, $user_id, $product_id);
                                                                                                                        if ($bought) {
                                                                                                                        ?>
                                                                                                                              <a href="<?php echo $junk; ?>" class="d-flex">دانلود</a>
                                                                                                                        <?php
                                                                                                                        } else { ?>
                                                                                                                              <buttom type="button" data-toggle="modal" data-target="#productprices" class="btn btn-danger m-4 responsive-button"><i class="fa-solid fa-lock-keyhole"></i></buttom>
                                                                                                                        <?php } ?>
                                                                                                                  <?php } ?>
                                                                                                            </div>
                                                                                                      </div>
                                                                                                </div>
                                                                                          </div>
                                                                                    <?php $counting++;
                                                                                    } ?>
                                                                              </div>
                                                                        </div>
                                                                  </div>
                                                            </div>
                                                      <?php } ?>
                                                      <?php
                                                      $restice_select = get_post_meta(get_the_ID(), 'restice_select', true);
                                                      if ('restice-yes' === $restice_select) {
                                                      ?>
                                                            <?php if (rcp_get_subscription()) { ?>
                                                                  <div class="card">
                                                                        <div class="card-header" id="headingOne-<?php echo $i; ?>">
                                                                              <div class="d-flex align-items-center">
                                                                                    <div class="col-6">
                                                                                          <h2 class="mb-0 text-right">
                                                                                                <button class="title d-inline-block" type="button" data-toggle="collapse" data-target="#collapseOne-<?php echo $i; ?>" aria-expanded="true" aria-controls="collapseOne-<?php echo $i; ?>">
                                                                                                      <?php echo $accordion['title']; ?>
                                                                                                </button>
                                                                                                <div class="desc d-inline-block mr-2" type="button" data-toggle="collapse" data-target="#collapseOne-<?php echo $i; ?>" aria-expanded="true" aria-controls="collapseOne-<?php echo $i; ?>">
                                                                                                      <?php echo $accordion['description']; ?>
                                                                                                </div>
                                                                                          </h2>
                                                                                    </div>
                                                                                    <div class="col-6">
                                                                                          <button class="button-collaps-ntf" type="button" data-toggle="collapse" data-target="#collapseOne-<?php echo $i; ?>" aria-expanded="true" aria-controls="collapseOne-<?php echo $i; ?>">
                                                                                                <?php echo $accordion['sub-title']; ?>
                                                                                          </button>
                                                                                    </div>
                                                                              </div>

                                                                        </div>

                                                                        <div id="collapseOne-<?php echo $i; ?>" class="collapse <?php $class = $i == 0 ? 'show' : '';
                                                                                                                  echo $class; ?>" aria-labelledby="headingOne-<?php echo $i; ?>" data-parent="#accordionExample">
                                                                              <div class="card-body">
                                                                                    <div class="row">
                                                                                          <?php
                                                                                          $t = $accordion['link_products'];
                                                                                          $counting = 1;
                                                                                          //$t = explode()
                                                                                          foreach ($t as $junk) {
                                                                                          ?>
                                                                                                <div class="col-12 col-md-4 pr-0">
                                                                                                      <div class="card-download-he my-2">
                                                                                                            <div class="d-flex align-items-center justify-content-between">
                                                                                                                  <div class="name-film col-4 text-right">قسمت: <?php echo $counting; ?></div>
                                                                                                                  <div class="button-download col-8 text-left">
                                                                                                                        <a href="<?php echo $junk; ?>" class="d-flex">دانلود</a>
                                                                                                                  </div>
                                                                                                            </div>
                                                                                                      </div>
                                                                                                </div>
                                                                                          <?php $counting++;
                                                                                          } ?>
                                                                                    </div>
                                                                              </div>
                                                                        </div>
                                                                  </div>

                                                            <?php } else { ?>

                                                                  <div class="card">
                                                                        <div class="card-header" id="headingOne-<?php echo $i; ?>">
                                                                              <div class="d-flex align-items-center">
                                                                                    <div class="col-6">
                                                                                          <h2 class="mb-0 text-right">
                                                                                                <button class="title d-inline-block" type="button" data-toggle="collapse" data-target="#collapseOne-<?php echo $i; ?>" aria-expanded="true" aria-controls="collapseOne-<?php echo $i; ?>">
                                                                                                      <?php echo $accordion['title']; ?>
                                                                                                </button>
                                                                                                <div class="desc d-inline-block mr-2" type="button" data-toggle="collapse" data-target="#collapseOne-<?php echo $i; ?>" aria-expanded="true" aria-controls="collapseOne-<?php echo $i; ?>">
                                                                                                      <?php echo $accordion['description']; ?>
                                                                                                </div>
                                                                                          </h2>
                                                                                    </div>
                                                                                    <div class="col-6">
                                                                                          <button class="button-collaps-ntf" type="button" data-toggle="collapse" data-target="#collapseOne-<?php echo $i; ?>" aria-expanded="true" aria-controls="collapseOne-<?php echo $i; ?>">
                                                                                                <?php echo $accordion['sub-title']; ?>
                                                                                          </button>
                                                                                    </div>
                                                                              </div>

                                                                        </div>

                                                                        <div id="collapseOne-<?php echo $i; ?>" class="collapse <?php $class = $i == 0 ? 'show' : ''; echo $class; ?>" aria-labelledby="headingOne-<?php echo $i; ?>" data-parent="#accordionExample">
                                                                              <div class="card-body">
                                                                                    <div class="row">
                                                                                          <?php
                                                                                          $t = $accordion['link_products'];
                                                                                          $counting = 1;
                                                                                          //$t = explode()
                                                                                          foreach ($t as $junk) {
                                                                                          ?>
                                                                                                <div class="col-12 col-md-4 pr-0">
                                                                                                      <div class="card-download-he my-2  ">
                                                                                                            <div class="d-flex align-items-center justify-content-between">
                                                                                                                  <div class="name-film col-4 text-right">قسمت: <?php echo $counting; ?></div>
                                                                                                                  <div class="button-download col-8 text-left">
                                                                                                                        <a type="button" class="d-flex" data-toggle="modal" data-target="#resigester"><i class="fa-solid fa-lock"></i><span class="mr-3">دانلود با اشتراک</span></a>
                                                                                                                  </div>
                                                                                                            </div>
                                                                                                      </div>
                                                                                                </div>
                                                                                          <?php $counting++;
                                                                                          } ?>
                                                                                    </div>
                                                                              </div>
                                                                        </div>
                                                                  </div>
                                                            <?php } ?>
                                                      <?php } ?>
                                          <?php $i++;
                                                }
                                          } ?>

                                    </div>
                              </div>
                        <?php } else { ?>
                              <div class="hex-card-download">

                                    <div class="accordion" id="accordionExample">
                                          <div class="card">
                                                <div class="card-header" id="headingOne-0">
                                                      <div class="d-flex align-items-center">
                                                            <div class="col-6">
                                                                  <h2 class="mb-0 text-right">
                                                                        <button class="title d-inline-block" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                                              سرفصل اول تست </button>
                                                                        <div class="desc d-inline-block mr-2" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                                              این یک متن تست است </div>
                                                                  </h2>
                                                            </div>
                                                            <div class="col-6">
                                                                  <button class="button-collaps-ntf" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                                        دانلود فیلم </button>
                                                            </div>
                                                      </div>

                                                </div>

                                                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne-0" data-parent="#accordionExample">
                                                      <div class="card-body">
                                                            <div class="row">
                                                                  <div class="col-12 col-md-4 pr-0">
                                                                        <div class="card-download-he my-2  ">
                                                                              <div class="d-flex align-items-center justify-content-between">
                                                                                    <div class="name-film col-4 text-right">قسمت: 1</div>
                                                                                    <div class="button-download col-8 text-left">
                                                                                          <a href="#" class="d-flex">دانلود</a>
                                                                                    </div>
                                                                              </div>
                                                                        </div>
                                                                  </div>
                                                            </div>
                                                      </div>
                                                </div>
                                          </div>

                                          <div class="card">
                                                <div class="card-header" id="headingOne-1">
                                                      <div class="d-flex align-items-center">
                                                            <div class="col-6">
                                                                  <h2 class="mb-0 text-right">
                                                                        <button class="title d-inline-block" type="button" data-toggle="collapse" data-target="#collapseOne-1" aria-expanded="true" aria-controls="collapseOne-1">
                                                                              سرفصل دوم </button>
                                                                        <div class="desc d-inline-block mr-2" type="button" data-toggle="collapse" data-target="#collapseOne-1" aria-expanded="true" aria-controls="collapseOne-1">
                                                                              این یک متن تست است </div>
                                                                  </h2>
                                                            </div>
                                                            <div class="col-6">
                                                                  <button class="button-collaps-ntf" type="button" data-toggle="collapse" data-target="#collapseOne-1" aria-expanded="true" aria-controls="collapseOne-1">
                                                                        دانلود فیلم </button>
                                                            </div>
                                                      </div>

                                                </div>

                                                <div id="collapseOne-1" class="collapse " aria-labelledby="headingOne-1" data-parent="#accordionExample">
                                                      <div class="card-body">
                                                            <div class="row">
                                                                  <div class="col-12 col-md-4 pr-0">
                                                                        <div class="card-download-he my-2  ">
                                                                              <div class="d-flex align-items-center justify-content-between">
                                                                                    <div class="name-film col-4 text-right">قسمت: 1</div>
                                                                                    <div class="button-download col-8 text-left">
                                                                                          <a href="#" class="d-flex">دانلود</a>
                                                                                    </div>
                                                                              </div>
                                                                        </div>
                                                                  </div>
                                                                  <div class="col-12 col-md-4 pr-0">
                                                                        <div class="card-download-he my-2  ">
                                                                              <div class="d-flex align-items-center justify-content-between">
                                                                                    <div class="name-film col-4 text-right">قسمت: 2</div>
                                                                                    <div class="button-download col-8 text-left">
                                                                                          <a href="#" class="d-flex">دانلود</a>
                                                                                    </div>
                                                                              </div>
                                                                        </div>
                                                                  </div>
                                                            </div>
                                                      </div>
                                                </div>
                                          </div>


                                    </div>
                              </div>
                        <?php } ?>
                        <!-- Modal -->
                        <div class="modal fade resigester-content" id="resigester" tabindex="-1" aria-labelledby="resigesterLabel" aria-hidden="true">
                              <div class="modal-dialog">
                                    <div class="modal-content">
                                          <div class="modal-header">
                                                <h5 class="modal-title" id="resigesterLabel">برای مشاهده این فیلم باید اشتراک داشته باشید</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                      <span aria-hidden="true">&times;</span>
                                                </button>
                                          </div>
                                          <div class="modal-body d-flex">
                                                <div class="col-6 text-center">
                                                      <a href="<?php echo site_url(); ?>/my-account" class="modal-btn-regester right-bg">ورود</a>
                                                </div>
                                                <div class="col-6 text-center">
                                                      <a href="<?php echo site_url(); ?>/my-account/support/" class="modal-btn-regester left-bg">خرید اشتراک</a>
                                                </div>
                                          </div>
                                    </div>
                              </div>
                        </div>
                        <!-- Modal -->
                        <div class="modal fade productprices-content" id="productprices" tabindex="-1" aria-labelledby="productpricesLabel" aria-hidden="true">
                              <div class="modal-dialog">
                                    <div class="modal-content">
                                          <div class="modal-header">
                                                <h5 class="modal-title" id="productpricesLabel">ابتدا محصول را خریداری کنید</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                      <span aria-hidden="true">&times;</span>
                                                </button>
                                          </div>
                                          <div class="modal-body d-flex">
                                                <div class="col-12 text-center">
                                                      <a href="<?php echo site_url(); ?>/my-account" class="modal-btn-regester right-bg">ورود</a>
                                                </div>
                                          </div>
                                    </div>
                              </div>
                        </div>
                  <?php } ?>
            <?php } ?>

<?php

      }
      protected function _content_template()
      {
      }
}
?>