<?php

namespace WPC\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH')) exit; // Exit if accessed directly


class Btn_login extends Widget_Base
{

      public function get_name()
      {
            return 'btn-login';
      }

      public function get_title()
      {
            return 'دکمه لاگین';
      }

      public function get_icon()
      {
            return 'eicon-button';
      }

      public function get_categories()
      {
            return ['secend-category'];
      }
      public function on_export($element)
      {
            unset($element['settings']['menu']);

            return $element;
      }

      protected function get_nav_menu_index()
      {
            return $this->nav_menu_index++;
      }

      private function get_available_menus()
      {
            $menus = wp_get_nav_menus();

            $options = [];

            foreach ($menus as $menu) {
                  $options[$menu->slug] = $menu->name;
            }

            return $options;
      }
      protected function _register_controls()
      {
            $this->start_controls_section(
                  'section_content',
                  [
                        'label' => __('تنظیمات دکمه', 'elementor'),
                        'tab' => Controls_Manager::TAB_CONTENT,
                  ]
            );
            $this->add_control(
                  'id_button',
                  [
                        'label' => esc_html__('آیدی دکمه', 'textdomain'),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'default' => esc_html__('mtn', 'textdomain'),
                        'placeholder' => esc_html__('Type your title here', 'textdomain'),
                  ]
            );
            $this->add_control(
                  'mr-btn-name',
                  [
                        'label' => esc_html__('فاصله نام تا آیکون', 'textdomain'),
                        'type' => \Elementor\Controls_Manager::SLIDER,
                        'size_units' => ['px', '%'],
                        'range' => [
                              'px' => [
                                    'min' => 0,
                                    'max' => 1000,
                                    'step' => 1,
                              ],
                        ],
                        'selectors' => [
                              '{{WRAPPER}} .mr-name-icon' => 'margin-right: {{SIZE}}{{UNIT}};',
                        ],
                  ]
            );
            $this->add_control(
                  'before_more_options',
                  [
                        'label' => esc_html__('تنظیمات قبل از ورود کاربر', 'textdomain'),
                        'type' => \Elementor\Controls_Manager::HEADING,
                        'separator' => 'before',
                  ]
            );
            $this->add_control(
                  'before_login',
                  [
                        'label' => esc_html__('متن دکمه', 'textdomain'),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'default' => esc_html__('ورود', 'textdomain'),
                        'placeholder' => esc_html__('Type your title here', 'textdomain'),
                  ]
            );
            $this->add_control(
                  'before_login_icon',
                  [
                        'label' => __('آیکون', 'text-domain'),
                        'type' => \Elementor\Controls_Manager::ICONS,
                        'default' => [
                              'value' => 'fas fa-user',
                              'library' => 'solid',
                        ],
                  ]
            );
            $this->add_control(
                  'page_link',
                  [
                        'label' => esc_html__('لینک صفحه', 'textdomain'),
                        'type' => \Elementor\Controls_Manager::URL,
                        'placeholder' => esc_html__('https://your-link.com', 'textdomain'),
                        'options' => ['url', 'is_external', 'nofollow'],
                        'default' => [
                              'url' => '',
                              'is_external' => true,
                              'nofollow' => true,
                              // 'custom_attributes' => '',
                        ],
                        'label_block' => true,
                  ]
            );
            $this->add_control(
                  'after_more_options',
                  [
                        'label' => esc_html__('تنظیمات بعد از ورود کاربر', 'textdomain'),
                        'type' => \Elementor\Controls_Manager::HEADING,
                        'separator' => 'before',
                  ]
            );
            $this->add_control(
                  'show_title',
                  [
                        'label' => esc_html__('نمایش نام کاربر', 'textdomain'),
                        'type' => \Elementor\Controls_Manager::SWITCHER,
                        'label_on' => esc_html__('Show', 'your-plugin'),
                        'label_off' => esc_html__('Hide', 'your-plugin'),
                        'return_value' => 'yes',
                        'default' => 'yes',
                  ]
            );
            $this->add_control(
                  'after_login_icon',
                  [
                        'label' => __('آیکون', 'text-domain'),
                        'type' => \Elementor\Controls_Manager::ICONS,
                        'default' => [
                              'value' => 'fas fa-user',
                              'library' => 'solid',
                        ],
                  ]
            );
            $menus = $this->get_available_menus();

            if (!empty($menus)) {
                  $this->add_control(
                        'menu',
                        [
                              'label' => __('Menu', 'elementor'),
                              'type' => Controls_Manager::SELECT,
                              'options' => $menus,
                              'default' => array_keys($menus)[0],
                              'save_default' => true,
                              'separator' => 'after',
                              'description' => sprintf(__('برای <a href="%s" target="_blank">مدیریت منو</a> به صفحه فهرست ها مراجعه کنید.', 'elementor-pro'), admin_url('nav-menus.php')),
                        ]
                  );
            } else {
                  $this->add_control(
                        'menu',
                        [
                              'type' => Controls_Manager::RAW_HTML,
                              'raw' => '<strong>' . __('هیچ منویی در سایت شما وجود ندارد. ', 'elementor') . '</strong><br>' . sprintf(__('برای <a href="%s" target="_blank">مدیریت منو</a> به صفحه فهرست ها مراجعه کنید.', 'elementor-pro'), admin_url('nav-menus.php?action=edit&menu=0')),
                              'separator' => 'after',
                              'content_classes' => 'elementor-panel-alert elementor-panel-alert-info',
                        ]
                  );
            }
            $this->end_controls_section();
            $this->start_controls_section(
                  'section_style',
                  [
                        'label' => __('استایل دکمه', 'elementor'),
                        'tab' => Controls_Manager::TAB_STYLE,
                  ]
            );
            $this->add_control(
                  'siteurl_color',
                  [
                        'label' => __('رنگ عنوان', 'plugin-domain'),
                        'type' => Controls_Manager::COLOR,
                        'default' => '',
                        'selectors' => [
                              '{{WRAPPER}} .btn-login-ntf .btn-login-sty' => 'color: {{VALUE}}',
                        ],
                  ]
            );
            $this->add_control(
                  'siteurl_hover',
                  [
                        'label' => __('هاور عنوان', 'plugin-domain'),
                        'type' => \Elementor\Controls_Manager::COLOR,
                        'default' => '',
                        'selectors' => [
                              '{{WRAPPER}} .btn-login-ntf .btn-login-sty:hover' => 'color: {{VALUE}}',
                        ],
                  ]
            );

            $this->add_group_control(
                  \Elementor\Group_Control_Typography::get_type(),
                  [
                        'name' => 'content_typography',
                        'label' => __('تایپوگرافی', 'plugin-domain'),
                        'selector' => '{{WRAPPER}} .btn-login-ntf .btn-login-sty',
                  ]
            );
            $this->add_control(
                  'margin_site',
                  [
                        'label' => __('فاصله', 'elementor'),
                        'type' => Controls_Manager::DIMENSIONS,
                        'size_units' => ['px', '%'],
                        'selectors' => [
                              '{{WRAPPER}} .btn-login-ntf .btn-login-sty' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                              '{{WRAPPER}} .btn-login-ntf .btn-login-sty' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                              '{{WRAPPER}} .btn-login-ntf .btn-login-sty' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                  ]
            );
            $this->add_group_control(
                  \Elementor\Group_Control_Background::get_type(),
                  [
                        'name' => 'background_cl',
                        'label' => esc_html__('Background', 'plugin-name'),
                        'types' => ['classic', 'gradient'],
                        'selector' => '{{WRAPPER}} .btn-login-ntf .btn-login-sty',
                  ]
            );
            $this->add_group_control(
                  \Elementor\Group_Control_Background::get_type(),
                  [
                        'name' => 'background_cl_hover',
                        'label' => esc_html__('هاور پس زمینه', 'plugin-name'),
                        'types' => ['classic', 'gradient'],
                        'selector' => '{{WRAPPER}} .btn-login-ntf .btn-login-sty:hover',
                  ]
            );
            $this->add_group_control(
                  \Elementor\Group_Control_Box_Shadow::get_type(),
                  [
                        'name' => 'box_right_buttom',
                        'label' => __('باکس شدوو', 'plugin-domain'),
                        'selector' => '{{WRAPPER}} .btn-login-ntf .btn-login-sty',
                  ]
            );
            $this->add_group_control(
                  \Elementor\Group_Control_Box_Shadow::get_type(),
                  [
                        'name' => 'box_right_buttom_hover',
                        'label' => __('هاور باکس شدوو', 'plugin-domain'),
                        'selector' => '{{WRAPPER}} .btn-login-ntf .btn-login-sty:hover',
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
                              '{{WRAPPER}} .btn-login-ntf .btn-login-sty' => 'border-style: {{VALUE}}',
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
                              '{{WRAPPER}} .btn-login-ntf .btn-login-sty' => 'border-width: {{SIZE}}{{UNIT}};',
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
                              '{{WRAPPER}} .btn-login-ntf .btn-login-sty' => 'border-color: {{VALUE}}',
                        ],
                  ]
            );
            $this->add_control(
                  'bg_button_hover',
                  [
                        'label' => __('هاور بردر', 'plugin-domain'),
                        'type' => Controls_Manager::COLOR,
                        'default' => '',
                        'selectors' => [
                              '{{WRAPPER}} .btn-login-ntf .btn-login-sty:hover' => 'border-color: {{VALUE}}',
                        ],
                  ]
            );
            $this->end_controls_section();
            $this->start_controls_section(
                  'section_style_box',
                  [
                        'label' => __('استایل باکس منو', 'elementor'),
                        'tab' => Controls_Manager::TAB_STYLE,
                  ]
            );
            $this->add_control(
                  'margin_sub',
                  [
                        'label' => __('فاصله', 'elementor'),
                        'type' => Controls_Manager::DIMENSIONS,
                        'size_units' => ['px', '%'],
                        'selectors' => [
                              '{{WRAPPER}} .btn-login-ntf .sub-menu-login' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                  ]
            );
            $this->add_control(
                  'padding_sub',
                  [
                        'label' => __('پدینگ', 'elementor'),
                        'type' => Controls_Manager::DIMENSIONS,
                        'size_units' => ['px', '%'],
                        'selectors' => [
                              '{{WRAPPER}} .btn-login-ntf .sub-menu-login' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                  ]
            );

            $this->add_control(
                  'border_sub',
                  [
                        'label' => __('گوشه های مدور', 'elementor'),
                        'type' => Controls_Manager::DIMENSIONS,
                        'size_units' => ['px', '%'],
                        'selectors' => [
                              '{{WRAPPER}} .btn-login-ntf .sub-menu-login' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                  ]
            );
            $this->add_group_control(
                  \Elementor\Group_Control_Background::get_type(),
                  [
                        'name' => 'background_sub',
                        'label' => esc_html__('Background', 'plugin-name'),
                        'types' => ['classic', 'gradient'],
                        'selector' => '{{WRAPPER}} .btn-login-ntf .sub-menu-login',
                  ]
            );
            $this->add_group_control(
                  \Elementor\Group_Control_Box_Shadow::get_type(),
                  [
                        'name' => 'box_sub',
                        'label' => __('باکس شدوو', 'plugin-domain'),
                        'selector' => '{{WRAPPER}} .btn-login-ntf .sub-menu-login',
                  ]
            );
            $this->add_control(
                  'more_options_sub',
                  [
                        'label' => __('تنظیمات بردر', 'plugin-name'),
                        'type' => \Elementor\Controls_Manager::HEADING,
                        'separator' => 'before',
                  ]
            );
            $this->add_control(
                  'border_sub_box',
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
                              '{{WRAPPER}} .btn-login-ntf .sub-menu-login' => 'border-style: {{VALUE}}',
                        ],
                  ]
            );
            $this->add_responsive_control(
                  'width_sub',
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
                              '{{WRAPPER}} .btn-login-ntf .sub-menu-login' => 'border-width: {{SIZE}}{{UNIT}};',
                        ],
                  ]
            );
            $this->add_control(
                  'bg_sub',
                  [
                        'label' => __('رنگ بردر', 'plugin-domain'),
                        'type' => Controls_Manager::COLOR,
                        'default' => '',
                        'selectors' => [
                              '{{WRAPPER}} .btn-login-ntf .sub-menu-login' => 'border-color: {{VALUE}}',
                        ],
                  ]
            );
            $this->add_control(
                  'title_submenu',
                  [
                        'label' => __('تنظیمات نام کاربری', 'plugin-name'),
                        'type' => \Elementor\Controls_Manager::HEADING,
                        'separator' => 'before',
                  ]
            );
            $this->add_control(
                  'user_color',
                  [
                        'label' => __('رنگ عنوان', 'plugin-domain'),
                        'type' => Controls_Manager::COLOR,
                        'default' => '',
                        'selectors' => [
                              '{{WRAPPER}} .btn-login-ntf .sub-menu-login .header-sub-menu a' => 'color: {{VALUE}}',
                        ],
                  ]
            );
            $this->add_control(
                  'user_color_hover',
                  [
                        'label' => __('هاور عنوان', 'plugin-domain'),
                        'type' => \Elementor\Controls_Manager::COLOR,
                        'default' => '',
                        'selectors' => [
                              '{{WRAPPER}} .btn-login-ntf .sub-menu-login .header-sub-menu a:hover' => 'color: {{VALUE}}',
                        ],
                  ]
            );

            $this->add_group_control(
                  \Elementor\Group_Control_Typography::get_type(),
                  [
                        'name' => 'user_typography',
                        'label' => __('تایپوگرافی', 'plugin-domain'),
                        'selector' => '{{WRAPPER}} .btn-login-ntf .sub-menu-login .header-sub-menu a p',
                  ]
            );
            $this->add_control(
                  'hr_submenu',
                  [
                        'label' => __('خط حاشیه', 'plugin-name'),
                        'type' => \Elementor\Controls_Manager::HEADING,
                        'separator' => 'before',
                  ]
            );
            $this->add_control(
                  'bg_submenu',
                  [
                        'label' => __('رنگ حاشیه', 'plugin-domain'),
                        'type' => Controls_Manager::COLOR,
                        'default' => '',
                        'selectors' => [
                              '{{WRAPPER}} .btn-login-ntf .sub-menu-login .sub-menu-hr' => 'background-color: {{VALUE}}',
                        ],
                  ]
            );
            $this->add_control(
                  'menu_submenu',
                  [
                        'label' => __('استایل منو', 'plugin-name'),
                        'type' => \Elementor\Controls_Manager::HEADING,
                        'separator' => 'before',
                  ]
            );
            $this->add_control(
                  'menu_color',
                  [
                        'label' => __('رنگ عنوان', 'plugin-domain'),
                        'type' => Controls_Manager::COLOR,
                        'default' => '',
                        'selectors' => [
                              '{{WRAPPER}} .btn-login-ntf .sub-menu-login .login-submenu .head-menu a' => 'color: {{VALUE}}',
                        ],
                  ]
            );
            $this->add_control(
                  'menu_color_hover',
                  [
                        'label' => __('هاور عنوان', 'plugin-domain'),
                        'type' => \Elementor\Controls_Manager::COLOR,
                        'default' => '',
                        'selectors' => [
                              '{{WRAPPER}} .btn-login-ntf .sub-menu-login .login-submenu .head-menu:hover a' => 'color: {{VALUE}}',
                        ],
                  ]
            );
            $this->add_group_control(
                  \Elementor\Group_Control_Typography::get_type(),
                  [
                        'name' => 'menu_typography',
                        'label' => __('تایپوگرافی', 'plugin-domain'),
                        'selector' => '{{WRAPPER}} .btn-login-ntf .sub-menu-login .login-submenu .head-menu a',
                  ]
            );
            $this->add_control(
                  'margin_menu',
                  [
                        'label' => __('فاصله', 'elementor'),
                        'type' => Controls_Manager::DIMENSIONS,
                        'size_units' => ['px', '%'],
                        'selectors' => [
                              '{{WRAPPER}} .btn-login-ntf .sub-menu-login .login-submenu .head-menu' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                  ]
            );
            $this->add_control(
                  'padding_menu',
                  [
                        'label' => __('پدینگ', 'elementor'),
                        'type' => Controls_Manager::DIMENSIONS,
                        'size_units' => ['px', '%'],
                        'selectors' => [
                              '{{WRAPPER}} .btn-login-ntf .sub-menu-login .login-submenu .head-menu' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                  ]
            );
            $this->add_control(
                  'border_menu',
                  [
                        'label' => __('گوشه های مدور', 'elementor'),
                        'type' => Controls_Manager::DIMENSIONS,
                        'size_units' => ['px', '%'],
                        'selectors' => [
                              '{{WRAPPER}} .btn-login-ntf .sub-menu-login .login-submenu .head-menu' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                  ]
            );
            $this->add_group_control(
                  \Elementor\Group_Control_Background::get_type(),
                  [
                        'name' => 'background_menu',
                        'label' => esc_html__('Background', 'plugin-name'),
                        'types' => ['classic', 'gradient'],
                        'selector' => '{{WRAPPER}} .btn-login-ntf .sub-menu-login .login-submenu .head-menu',
                  ]
            );
            $this->add_group_control(
                  \Elementor\Group_Control_Background::get_type(),
                  [
                        'name' => 'background_menu_hover',
                        'label' => esc_html__('Background هاور', 'plugin-name'),
                        'types' => ['classic', 'gradient'],
                        'selector' => '{{WRAPPER}} .btn-login-ntf .sub-menu-login .login-submenu .head-menu:hover',
                  ]
            );
            $this->add_group_control(
                  \Elementor\Group_Control_Box_Shadow::get_type(),
                  [
                        'name' => 'box_menu',
                        'label' => __('باکس شدوو', 'plugin-domain'),
                        'selector' => '{{WRAPPER}} .btn-login-ntf .sub-menu-login .login-submenu .head-menu',
                  ]
            );
            $this->add_control(
                  'more_options_menu',
                  [
                        'label' => __('تنظیمات بردر', 'plugin-name'),
                        'type' => \Elementor\Controls_Manager::HEADING,
                        'separator' => 'before',
                  ]
            );
            $this->add_control(
                  'border_menu_select',
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
                              '{{WRAPPER}} .btn-login-ntf .sub-menu-login .login-submenu .head-menu' => 'border-style: {{VALUE}}',
                        ],
                  ]
            );
            $this->add_responsive_control(
                  'width_menu',
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
                              '{{WRAPPER}} .btn-login-ntf .sub-menu-login .login-submenu .head-menu' => 'border-width: {{SIZE}}{{UNIT}};',
                        ],
                  ]
            );
            $this->add_control(
                  'bg_menu',
                  [
                        'label' => __('رنگ بردر', 'plugin-domain'),
                        'type' => Controls_Manager::COLOR,
                        'default' => '',
                        'selectors' => [
                              '{{WRAPPER}} .btn-login-ntf .sub-menu-login .login-submenu .head-menu' => 'border-color: {{VALUE}}',
                        ],
                  ]
            );
            $this->end_controls_section();
            $this->start_controls_section(
                  'section_style_popup',
                  [
                        'label' => __('استایل پاپ آپ', 'elementor'),
                        'tab' => Controls_Manager::TAB_STYLE,
                  ]
            );
            $this->add_control(
                  'margin_popup',
                  [
                        'label' => __('فاصله', 'elementor'),
                        'type' => Controls_Manager::DIMENSIONS,
                        'size_units' => ['px', '%'],
                        'selectors' => [
                              '{{WRAPPER}} .btn-login-ntf .modal-content' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                  ]
            );
            $this->add_control(
                  'padding_popup',
                  [
                        'label' => __('پدینگ', 'elementor'),
                        'type' => Controls_Manager::DIMENSIONS,
                        'size_units' => ['px', '%'],
                        'selectors' => [
                              '{{WRAPPER}} .btn-login-ntf .modal-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                  ]
            );
            $this->add_control(
                  'border_popup',
                  [
                        'label' => __('گوشه های مدور', 'elementor'),
                        'type' => Controls_Manager::DIMENSIONS,
                        'size_units' => ['px', '%'],
                        'selectors' => [
                              '{{WRAPPER}} .btn-login-ntf .modal-content' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                  ]
            );
            $this->add_group_control(
                  \Elementor\Group_Control_Background::get_type(),
                  [
                        'name' => 'background_popup',
                        'label' => esc_html__('Background', 'plugin-name'),
                        'types' => ['classic', 'gradient'],
                        'selector' => '{{WRAPPER}} .btn-login-ntf .modal-content,.btn-login-ntf .modal-content .login-portfol',
                  ]
            );
            $this->add_group_control(
                  \Elementor\Group_Control_Box_Shadow::get_type(),
                  [
                        'name' => 'box_popup',
                        'label' => __('باکس شدوو', 'plugin-domain'),
                        'selector' => '{{WRAPPER}} .btn-login-ntf .modal-content',
                  ]
            );
            $this->add_control(
                  'more_options_popup',
                  [
                        'label' => __('تنظیمات بردر', 'plugin-name'),
                        'type' => \Elementor\Controls_Manager::HEADING,
                        'separator' => 'before',
                  ]
            );
            $this->add_control(
                  'border_popup_select',
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
                              '{{WRAPPER}} .btn-login-ntf .modal-content' => 'border-style: {{VALUE}}',
                        ],
                  ]
            );
            $this->add_responsive_control(
                  'width_popup',
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
                              '{{WRAPPER}} .btn-login-ntf .modal-content' => 'border-width: {{SIZE}}{{UNIT}};',
                        ],
                  ]
            );
            $this->add_control(
                  'bg_popup',
                  [
                        'label' => __('رنگ بردر', 'plugin-domain'),
                        'type' => Controls_Manager::COLOR,
                        'default' => '',
                        'selectors' => [
                              '{{WRAPPER}} .btn-login-ntf .modal-content' => 'border-color: {{VALUE}}',
                        ],
                  ]
            );
            $this->add_control(
                  'more_popup',
                  [
                        'label' => __('استایل داخلی', 'plugin-name'),
                        'type' => \Elementor\Controls_Manager::HEADING,
                        'separator' => 'before',
                  ]
            );
            $this->add_control(
                  'color_text',
                  [
                        'label' => __('رنگ متن', 'plugin-domain'),
                        'type' => Controls_Manager::COLOR,
                        'default' => '',
                        'selectors' => [
                              '{{WRAPPER}} .btn-login-ntf .login-portfol h2,.login-netflibs-web .login-portfol form p.woocommerce-form-row label,.btn-login-ntf .login-portfol p,.btn-login-ntf .login-portfol .lost_password p,.btn-login-ntf .login-portfol p span' => 'color: {{VALUE}}',
                        ],
                  ]
            );
            $this->add_control(
                  'padding_popup_button',
                  [
                        'label' => __('پدینگ', 'elementor'),
                        'type' => Controls_Manager::DIMENSIONS,
                        'size_units' => ['px', '%'],
                        'selectors' => [
                              '{{WRAPPER}} .btn-login-ntf .modal-content .woocommerce-button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                  ]
            );
            $this->add_control(
                  'border_popup_button',
                  [
                        'label' => __('گوشه های مدور', 'elementor'),
                        'type' => Controls_Manager::DIMENSIONS,
                        'size_units' => ['px', '%'],
                        'selectors' => [
                              '{{WRAPPER}} .btn-login-ntf .modal-content .woocommerce-button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                  ]
            );
            $this->add_group_control(
                  \Elementor\Group_Control_Background::get_type(),
                  [
                        'name' => 'background_popup_button',
                        'label' => esc_html__('Background', 'plugin-name'),
                        'types' => ['classic', 'gradient'],
                        'selector' => '{{WRAPPER}} .btn-login-ntf .modal-content .woocommerce-button',
                  ]
            );
            $this->add_group_control(
                  \Elementor\Group_Control_Box_Shadow::get_type(),
                  [
                        'name' => 'box_popup_button',
                        'label' => __('باکس شدوو', 'plugin-domain'),
                        'selector' => '{{WRAPPER}} .btn-login-ntf .modal-content .woocommerce-button',
                  ]
            );
            $this->add_control(
                  'color_text_button',
                  [
                        'label' => __('رنگ متن', 'plugin-domain'),
                        'type' => Controls_Manager::COLOR,
                        'default' => '',
                        'selectors' => [
                              '{{WRAPPER}} .btn-login-ntf .modal-content .woocommerce-button' => 'color: {{VALUE}}',
                        ],
                  ]
            );
            $this->add_control(
                  'more_popup_btn',
                  [
                        'label' => __('استایل دکمه تعویض صفحه', 'plugin-name'),
                        'type' => \Elementor\Controls_Manager::HEADING,
                        'separator' => 'before',
                  ]
            );
            $this->add_control(
                  'border_popup_btn',
                  [
                        'label' => __('گوشه های مدور', 'elementor'),
                        'type' => Controls_Manager::DIMENSIONS,
                        'size_units' => ['px', '%'],
                        'selectors' => [
                              '{{WRAPPER}} .btn-login-ntf .modal-content .stl-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                  ]
            );
            $this->add_group_control(
                  \Elementor\Group_Control_Background::get_type(),
                  [
                        'name' => 'background_popup_btn',
                        'label' => esc_html__('Background', 'plugin-name'),
                        'types' => ['classic', 'gradient'],
                        'selector' => '{{WRAPPER}} .btn-login-ntf .modal-content .stl-btn',
                  ]
            );
            $this->add_control(
                  'cls_btn',
                  [
                        'label' => __('رنگ متن', 'plugin-domain'),
                        'type' => Controls_Manager::COLOR,
                        'default' => '',
                        'selectors' => [
                              '{{WRAPPER}} .btn-login-ntf .modal-content .stl-btn' => 'color: {{VALUE}}',
                        ],
                  ]
            );
            $this->end_controls_section();
      }


      protected function render()
      {
            $settings = $this->get_settings_for_display();
            $target = $settings['website_link']['is_external'] ? ' target="_blank"' : '';
            $nofollow = $settings['website_link']['nofollow'] ? ' rel="nofollow"' : '';
            $current_user = wp_get_current_user();
?>
            <div class="btn-login-ntf">
                        <?php global $user_ID;
                        if ($user_ID) { ?>
                              <div class="head-menu">
                                    <a href="" type="button" class="  btn-login-sty">
                                          <?php \Elementor\Icons_Manager::render_icon($settings['after_login_icon'], ['aria-hidden' => 'true']); ?>
                                          <?php if ('yes' === $settings['show_title']) { ?>
                                                <span><?php echo $current_user->user_login ?></span>
                                          <?php } ?>
                                    </a>
                                    <div class="sub-menu-login">
                                          <div class="header-sub-menu">
                                                <a href="<?php site_url() ?>/my-account/">
                                                      <p class="name-user"><?php echo $current_user->user_login ?></p>
                                                </a>
                                          </div>
                                          <hr class="sub-menu-hr">
                                          <div class="body-menu-login">
                                                <?php
                                                $args = array(
                                                      'menu' => $settings['menu'],
                                                      'menu_class' => 'login-submenu',
                                                      'depth' => '1',

                                                );
                                                wp_nav_menu($args);
                                                ?>
                                          </div>
                                    </div>
                              </div>
                        <?php } else { ?>
                              <a href="<?php echo $settings['page_link']['url'] ?>"  target="<?php echo $target; ?>" rel="<?php echo $nofollow; ?>" type="button" class="  btn-login-sty">
                                    <?php \Elementor\Icons_Manager::render_icon($settings['before_login_icon'], ['aria-hidden' => 'true']); ?>
                                    <span class="mr-name-icon"><?php echo $settings['before_login']; ?></span>
                              </a>
                        <?php } ?>

                  
            </div>




<?php
      }

      protected function _content_template()
      {
      }
}
