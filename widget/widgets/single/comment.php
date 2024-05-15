<?php

namespace WPC\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH')) exit; // Exit if accessed directly


class comment_sell extends Widget_Base{

  public function get_name(){
    return 'comment-sell';
  }
  public function get_title(){
    return 'دیدگاه';
  }

  public function get_icon(){
    return 'eicon-comments';
  }

  public function get_categories(){
    return ['five-category'];
  }
  
      
  protected function _register_controls(){
      
    $this->start_controls_section(
        'section_modal_style',
        [
            'label' => __( 'استایل', 'elementor' ),
            'tab' => Controls_Manager::TAB_STYLE,
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
          'justify' => [
                'title' => __( 'justify', 'elementor' ),
                'icon' => 'eicon-text-align-justify',
          ],
        ],
        'selectors' => [
          '{{WRAPPER}} .defult-form' => 'text-align: {{VALUE}};',
        ],
      ]
    );
    $this->add_control(
      'title_color_1',
      [
          'label' => __( 'رنگ عنوان 1', 'plugin-domain' ),
          'type' => Controls_Manager::COLOR,
          'default' => '',
          'selectors' => [
              '{{WRAPPER}} .elementor-comment_ntf .defult-form h3,
              .elementor-comment_ntf .defult-form h4,
              .elementor-comment_ntf .defult-form p.comment-form-rating label,
              .defult-form form p.comment-notes, 
              .defult-form form p.comment-form-cookies-consent' => 'color: {{VALUE}}',
          ],
      ]
    );
    $this->add_control(
      'title_color_2',
      [
          'label' => __( 'رنگ عنوان 2', 'plugin-domain' ),
          'type' => Controls_Manager::COLOR,
          'default' => '',
          'selectors' => [
              '{{WRAPPER}} .elementor-comment_ntf .defult-form .comments-icon svg,.elementor-comment_ntf .defult-form .comments-icon a,.elementor-comment_ntf .defult-form ul li,.elementor-comment_ntf .defult-form span.required-field-message' => 'color: {{VALUE}}',
          ],
      ]
    );
    $this->add_group_control(
      \Elementor\Group_Control_Typography::get_type(),
      [
      'name' => 'content1_typography',
      'label' => __( 'تایپوگرافی 1', 'plugin-domain' ),
      'selector' => '{{WRAPPER}} .elementor-comment_ntf .defult-form h3,
      .elementor-comment_ntf .defult-form h4,
      .elementor-comment_ntf .defult-form p.comment-form-rating label,
      .defult-form form p.comment-notes, 
      .defult-form form p.comment-form-cookies-consent',
      ]
    );
    $this->add_group_control(
      \Elementor\Group_Control_Typography::get_type(),
      [
      'name' => 'content2_typography',
      'label' => __( 'تایپوگرافی 2', 'plugin-domain' ),
      'selector' => '{{WRAPPER}} .elementor-comment_ntf .defult-form .comments-icon svg,.elementor-comment_ntf .defult-form .comments-icon a,.elementor-comment_ntf .defult-form ul li,.elementor-comment_ntf .defult-form span.required-field-message'
      ]
    );
    $this->add_control(
      'border_site',
      [
          'label' => __( 'گوشه های مدور', 'elementor' ),
          'type' => Controls_Manager::DIMENSIONS,
          'size_units' => [ 'px', '%' ],
          'selectors' => [
              '{{WRAPPER}} .defult-form form p.logged-in-as a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
          ],
      ]
    );
    $this->add_group_control(
      \Elementor\Group_Control_Background::get_type(),
      [
      'name' => 'background_cl_hover',
      'label' => esc_html__( 'Background', 'plugin-name' ),
      'types' => [ 'classic', 'gradient' ],
      'selector' => '{{WRAPPER}} .defult-form form p.logged-in-as a',
      ]
    );
    $this->end_controls_section();
    $this->start_controls_section(
      'section_form_style',
      [
          'label' => __( 'استایل فرم', 'elementor' ),
          'tab' => Controls_Manager::TAB_STYLE,
      ]
    );
    $this->add_control(
      'form_margin',
      [
          'label' => __( 'فاصله خارجی', 'elementor' ),
          'type' => Controls_Manager::DIMENSIONS,
          'size_units' => [ 'px', '%' ],
          'selectors' => [
              '{{WRAPPER}} .defult-form form p.comment-form-comment textarea
              ,.defult-form form p.comment-form-author input, 
              .defult-form form p.comment-form-email input' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
          ],
      ]
    );
    $this->add_control(
      'form_padding',
      [
          'label' => __( 'فاصله داخلی', 'elementor' ),
          'type' => Controls_Manager::DIMENSIONS,
          'size_units' => [ 'px', '%' ],
          'selectors' => [
              '{{WRAPPER}} .defult-form form p.comment-form-comment textarea
              ,.defult-form form p.comment-form-author input, 
              .defult-form form p.comment-form-email input' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
          ],
      ]
    );
    $this->add_control(
      'form_radius',
      [
          'label' => __( 'گوشه های مدور', 'elementor' ),
          'type' => Controls_Manager::DIMENSIONS,
          'size_units' => [ 'px', '%' ],
          'selectors' => [
              '{{WRAPPER}} .defult-form form p.comment-form-comment textarea
              ,.defult-form form p.comment-form-author input, 
              .defult-form form p.comment-form-email input' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
          ],
      ]
    );
    $this->add_group_control(
      \Elementor\Group_Control_Background::get_type(),
      [
      'name' => 'background_form',
      'label' => esc_html__( 'Background', 'plugin-name' ),
      'types' => [ 'classic', 'gradient' ],
      'selector' => '{{WRAPPER}} .defult-form form p.comment-form-comment textarea
      ,.defult-form form p.comment-form-author input, 
      .defult-form form p.comment-form-email input',
      ]
    );
    $this->add_group_control(
      \Elementor\Group_Control_Box_Shadow::get_type(),
      [
          'name' => 'box_right_buttom',
          'label' => __( 'باکس شدوو', 'plugin-domain' ),
          'selector' => '{{WRAPPER}} .defult-form form p.comment-form-comment textarea
          ,.defult-form form p.comment-form-author input, 
          .defult-form form p.comment-form-email input',
      ]
    );
    $this->add_group_control(
        \Elementor\Group_Control_Typography::get_type(),
        [
            'name' => 'desc_typography',
            'label' => __( 'تایپوگرافی', 'plugin-domain' ),
            'selector' => '{{WRAPPER}} .defult-form form p.comment-form-comment textarea
            ,.defult-form form p.comment-form-author input, 
            .defult-form form p.comment-form-email input',
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
                '{{WRAPPER}} .defult-form form p.comment-form-comment textarea
                ,.defult-form form p.comment-form-author input, 
                .defult-form form p.comment-form-email input' => 'border-style: {{VALUE}}',
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
                '{{WRAPPER}} .defult-form form p.comment-form-comment textarea
                ,.defult-form form p.comment-form-author input, 
                .defult-form form p.comment-form-email input' => 'border-width: {{SIZE}}{{UNIT}};',
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
                '{{WRAPPER}} .defult-form form p.comment-form-comment textarea
                ,.defult-form form p.comment-form-author input, 
                .defult-form form p.comment-form-email input' => 'border-color: {{VALUE}}',
            ],
        ]
    );
    $this->add_control(
      'more_submit',
      [
          'label' => __( 'تنظیمات دکمه ثبت نظر', 'plugin-name' ),
          'type' => \Elementor\Controls_Manager::HEADING,
          'separator' => 'before',
      ]
    );
    $this->add_control(
      'form_radius_submit',
      [
          'label' => __( 'گوشه های مدور', 'elementor' ),
          'type' => Controls_Manager::DIMENSIONS,
          'size_units' => [ 'px', '%' ],
          'selectors' => [
              '{{WRAPPER}} .defult-form form p.form-submit input' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
          ],
      ]
    );
    $this->add_group_control(
      \Elementor\Group_Control_Background::get_type(),
      [
      'name' => 'background_form_submit',
      'label' => esc_html__( 'Background', 'plugin-name' ),
      'types' => [ 'classic', 'gradient' ],
      'selector' => '{{WRAPPER}} .defult-form form p.form-submit input',
      ]
    );
    $this->add_group_control(
      \Elementor\Group_Control_Box_Shadow::get_type(),
      [
          'name' => 'box_right_submit',
          'label' => __( 'باکس شدوو', 'plugin-domain' ),
          'selector' => '{{WRAPPER}} .defult-form form p.form-submit input',
      ]
    );
    $this->add_group_control(
        \Elementor\Group_Control_Typography::get_type(),
        [
            'name' => 'desc_typography_submit',
            'label' => __( 'تایپوگرافی', 'plugin-domain' ),
            'selector' => '{{WRAPPER}} .defult-form form p.form-submit input',
        ]
    );
    $this->add_control(
        'more_options__submit',
        [
            'label' => __( 'تنظیمات بردر', 'plugin-name' ),
            'type' => \Elementor\Controls_Manager::HEADING,
            'separator' => 'before',
        ]
    );
    $this->add_control(
        'border_style_submit',
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
                '{{WRAPPER}} .defult-form form p.form-submit input' => 'border-style: {{VALUE}}',
            ],
        ]
    );
    $this->add_responsive_control(
        'width_border_submit',
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
                '{{WRAPPER}} .defult-form form p.form-submit input' => 'border-width: {{SIZE}}{{UNIT}};',
            ],
        ]
    );
    $this->add_control(
        'bg_button_submit',
        [
            'label' => __( 'رنگ بردر', 'plugin-domain' ),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .defult-form form p.form-submit input' => 'border-color: {{VALUE}}',
            ],
        ]
    );
    $this->end_controls_section();
    $this->start_controls_section(
      'section_porsesh_style',
      [
          'label' => __( 'استایل کامنت', 'elementor' ),
          'tab' => Controls_Manager::TAB_STYLE,
      ]
    );
    $this->add_control(
      'comment_form',
      [
          'label' => __( 'رنگ متن', 'plugin-domain' ),
          'type' => Controls_Manager::COLOR,
          'default' => '',
          'selectors' => [
              '{{WRAPPER}} .elementor-comment_ntf .defult-form .new-comments h3
              ,.elementor-comment_ntf .defult-form .new-comments cite,
              .elementor-comment_ntf .defult-form .new-comments .reply a,
              .elementor-comment_ntf .defult-form .new-comments .reply svg,
              .elementor-comment_ntf .defult-form .new-comments a.comment-date' => 'color: {{VALUE}}',
          ],
      ]
    );
    $this->add_group_control(
      \Elementor\Group_Control_Typography::get_type(),
      [
          'name' => 'desc_typography_submit',
          'label' => __( 'تایپوگرافی', 'plugin-domain' ),
          'selector' => '{{WRAPPER}} .elementor-comment_ntf .defult-form .new-comments h3
          ,.elementor-comment_ntf .defult-form .new-comments cite,
          .elementor-comment_ntf .defult-form .new-comments .reply a,
          .elementor-comment_ntf .defult-form .new-comments .reply svg,
          .elementor-comment_ntf .defult-form .new-comments a.comment-date',
      ]
    );
    $this->add_control(
      'more_comment_img',
      [
          'label' => __( 'استایل آواتار', 'plugin-name' ),
          'type' => \Elementor\Controls_Manager::HEADING,
          'separator' => 'before',
      ]
    );
    $this->add_control(
      'border_site',
      [
          'label' => __( 'گوشه های مدور', 'elementor' ),
          'type' => Controls_Manager::DIMENSIONS,
          'size_units' => [ 'px', '%' ],
          'selectors' => [
              '{{WRAPPER}} .new-comments ol li .comment-author img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
          ],
      ]
    );
    $this->add_group_control(
      \Elementor\Group_Control_Background::get_type(),
      [
      'name' => 'background_comment_img',
      'label' => esc_html__( 'Background', 'plugin-name' ),
      'types' => [ 'classic', 'gradient' ],
      'selector' => '{{WRAPPER}} .new-comments ol li .comment-author img',
      ]
    );
    $this->add_control(
      'more_comment_box_comment',
      [
          'label' => __( 'استایل باکس نظر', 'plugin-name' ),
          'type' => \Elementor\Controls_Manager::HEADING,
          'separator' => 'before',
      ]
    );
    $this->add_control(
      'comment_form_box',
      [
          'label' => __( 'رنگ متن', 'plugin-domain' ),
          'type' => Controls_Manager::COLOR,
          'default' => '',
          'selectors' => [
              '{{WRAPPER}} .new-comments ol li .comment-text p,.new-comments ol li .comment-text::before' => 'color: {{VALUE}} !important',
          ],
      ]
    );
    $this->add_control(
      'form_margin_comment',
      [
          'label' => __( 'فاصله خارجی', 'elementor' ),
          'type' => Controls_Manager::DIMENSIONS,
          'size_units' => [ 'px', '%' ],
          'selectors' => [
              '{{WRAPPER}} .new-comments ol li .comment-text p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
          ],
      ]
    );
    $this->add_control(
      'form_padding_comment',
      [
          'label' => __( 'فاصله داخلی', 'elementor' ),
          'type' => Controls_Manager::DIMENSIONS,
          'size_units' => [ 'px', '%' ],
          'selectors' => [
              '{{WRAPPER}} .new-comments ol li .comment-text p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
          ],
      ]
    );
    $this->add_control(
      'form_radius_box_comment',
      [
          'label' => __( 'گوشه های مدور', 'elementor' ),
          'type' => Controls_Manager::DIMENSIONS,
          'size_units' => [ 'px', '%' ],
          'selectors' => [
              '{{WRAPPER}} .new-comments ol li .comment-text p' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
          ],
      ]
    );
    $this->add_group_control(
      \Elementor\Group_Control_Background::get_type(),
      [
      'name' => 'background_form_box_comment',
      'label' => esc_html__( 'Background', 'plugin-name' ),
      'types' => [ 'classic', 'gradient' ],
      'selector' => '{{WRAPPER}} .new-comments ol li .comment-text p',
      ]
    );
    $this->add_group_control(
      \Elementor\Group_Control_Box_Shadow::get_type(),
      [
          'name' => 'box_right_box_comment',
          'label' => __( 'باکس شدوو', 'plugin-domain' ),
          'selector' => '{{WRAPPER}} .new-comments ol li .comment-text p',
      ]
    );
    $this->add_group_control(
        \Elementor\Group_Control_Typography::get_type(),
        [
            'name' => 'desc_typography_box_comment',
            'label' => __( 'تایپوگرافی', 'plugin-domain' ),
            'selector' => '{{WRAPPER}} .new-comments ol li .comment-text p',
        ]
    );
    $this->add_control(
        'more_options_box_comment',
        [
            'label' => __( 'تنظیمات بردر', 'plugin-name' ),
            'type' => \Elementor\Controls_Manager::HEADING,
            'separator' => 'before',
        ]
    );
    $this->add_control(
        'border_style_box_comment',
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
                '{{WRAPPER}} .new-comments ol li .comment-text p' => 'border-style: {{VALUE}}',
            ],
        ]
    );
    $this->add_responsive_control(
        'width_border_box_comment',
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
                '{{WRAPPER}} .new-comments ol li .comment-text p' => 'border-width: {{SIZE}}{{UNIT}};',
            ],
        ]
    );
    $this->add_control(
        'bg_button_box_comment',
        [
            'label' => __( 'رنگ بردر', 'plugin-domain' ),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .new-comments ol li .comment-text p' => 'border-color: {{VALUE}}',
            ],
        ]
    );
    $this->end_controls_section();
  }
  

  protected function render(){
    $settings = $this->get_settings_for_display();
    ?> 
    <div class="elementor-comment_ntf">
        <?php if(comments_open()){ ?>
        <?php if ( comments_open() || get_comments_number() ) {
              comments_template();
          } ?>  
          <?php }else{ ?>
            <div class="defult-form">
              <div class="container">
                <div id="comments" class="comments-area">
                <span class="comments-icon"><svg class="svg-inline--fa fa-comments fa-w-20 ml-2" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="comments" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" data-fa-i2svg=""><path fill="currentColor" d="M416 176C416 78.8 322.9 0 208 0S0 78.8 0 176c0 39.57 15.62 75.96 41.67 105.4c-16.39 32.76-39.23 57.32-39.59 57.68c-2.1 2.205-2.67 5.475-1.441 8.354C1.9 350.3 4.602 352 7.66 352c38.35 0 70.76-11.12 95.74-24.04C134.2 343.1 169.8 352 208 352C322.9 352 416 273.2 416 176zM599.6 443.7C624.8 413.9 640 376.6 640 336C640 238.8 554 160 448 160c-.3145 0-.6191 .041-.9336 .043C447.5 165.3 448 170.6 448 176c0 98.62-79.68 181.2-186.1 202.5C282.7 455.1 357.1 512 448 512c33.69 0 65.32-8.008 92.85-21.98C565.2 502 596.1 512 632.3 512c3.059 0 5.76-1.725 7.02-4.605c1.229-2.879 .6582-6.148-1.441-8.354C637.6 498.7 615.9 475.3 599.6 443.7z"></path></svg><!-- <i class="fas fa-comments ml-2"></i> Font Awesome fontawesome.com --><a href="http://localhost/netflibs-beta/movie/%d8%b3%da%af%d9%87%d8%a7%db%8c-%d9%86%da%af%d9%87%d8%a8%d8%a7%d9%86/#comments">۱ دیدگاه</a></span>
                <div class="mb-3 mt-3">
                  <h3 class="mb-3">نکاتی درباره ارسال نظر ؛</h3>
                      <ul>
                        <li class="mb-3 ">نظرات حاوی الفاظ رکیک و توهین به دیگران منتشر نمیشود .</li>
                        <li class="mb-3 ">نظرات حاوی الفاظ رکیک و توهین به دیگران منتشر نمیشود .</li>
                        <li class="mb-3 ">قبل از طرح هرگونه سوال ابتدا در سایت جستجو نمایید .</li>
                        <li class="mb-3">نظرات تکراری تایید نمی شوند .</li>
                        <li class="mb-3 ">قوانین ذکر شده بسیار مهم هستند</li>
                      </ul>    
                  </div>
                </div>
                <div id="respond" class="comment-respond">
              <h4 id="reply-title" class="comment-reply-title">دیدگاهتان را بنویسید <small><a rel="nofollow" id="cancel-comment-reply-link" href="/netflibs-beta/movie/%d8%b3%da%af%d9%87%d8%a7%db%8c-%d9%86%da%af%d9%87%d8%a8%d8%a7%d9%86/#respond" style="display:none;">لغو پاسخ</a></small></h4><form action="http://localhost/netflibs-beta/wp-comments-post.php" method="post" id="commentform" class="comment-form" novalidate=""><p class="logged-in-as"><a href="http://localhost/netflibs-beta/wp-admin/profile.php" aria-label="وارد شده به عنوان netflibs-beta. شناسنامه خود را ویرایش کنید.">با عنوان netflibs-beta وارد شده‌اید</a>. <a href="http://localhost/netflibs-beta/wp-login.php?action=logout&amp;redirect_to=http%3A%2F%2Flocalhost%2Fnetflibs-beta%2Fmovie%2F%25d8%25b3%25da%25af%25d9%2587%25d8%25a7%25db%258c-%25d9%2586%25da%25af%25d9%2587%25d8%25a8%25d8%25a7%25d9%2586%2F&amp;_wpnonce=2a784f1fda">خارج می‌شوید؟</a> <span class="required-field-message" aria-hidden="true">بخش‌های موردنیاز علامت‌گذاری شده‌اند <span class="required" aria-hidden="true">*</span></span></p><p class="comment-form-rating">
            <label for="rating" class="">امتیاز</label>
            <span class="starRting">
            <input id="rating5" type="radio" name="rating" value="5"><label for="rating5"></label><input id="rating4" type="radio" name="rating" value="4"><label for="rating4"></label><input id="rating3" type="radio" name="rating" value="3"><label for="rating3"></label><input id="rating2" type="radio" name="rating" value="2"><label for="rating2"></label><input id="rating1" type="radio" name="rating" value="1"><label for="rating1"></label>	</span>
          </p>
          <p class="comment-form-comment"><label for="comment"></label><textarea class="w-100" id="comment" name="comment" cols="45" rows="8" aria-required="true" placeholder="دیدگاه‌ خود را وارد کنید"></textarea></p><p class="form-submit"><input name="submit" type="submit" id="submit" class="submit" value="ثبت نظر"> <input type="hidden" name="comment_post_ID" value="4003" id="comment_post_ID">
          <input type="hidden" name="comment_parent" id="comment_parent" value="0">
          </p><input type="hidden" id="_wp_unfiltered_html_comment_disabled" name="_wp_unfiltered_html_comment" value="251d34610e"><script>(function(){if(window===window.parent){document.getElementById('_wp_unfiltered_html_comment_disabled').name='_wp_unfiltered_html_comment';}})();</script>
          </form>	</div><!-- #respond -->
                <div class="new-comments">
                  <div class="container">
                      <div class="title-form">
                                      <h3 class=" mb-5">دیدگاه اسم فیلم</h3>
                                  </div>
                  <ol class="comments" id="comments">
              
          <li class="comment byuser comment-author-netflibs-beta bypostauthor even thread-even depth-1" id="li-comment-28">
            <div id="comment-28">
              <div class="comment-author vcard">
                <img alt="" src="http://0.gravatar.com/avatar/02ca62cc8372adb9350b498208db1c8b?s=96&amp;d=mm&amp;r=g" srcset="http://0.gravatar.com/avatar/02ca62cc8372adb9350b498208db1c8b?s=192&amp;d=mm&amp;r=g 2x" class="avatar avatar-96 photo" loading="lazy" width="96" height="96">            <cite class="fn d-inline">netflibs-beta</cite>
                      <div class="comment-meta commentmetadata d-md-inline d-block">
                          <a class="comment-date" href="">اردیبهشت ۳۰, ۱۴۰۱</a>          </div>
              </div>
              <div class="rating mt-3 mb-3">
                        <svg class="svg-inline--fa fa-star fa-w-18 text-warning" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="star" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg=""><path fill="currentColor" d="M316.7 17.8l65.43 132.4l146.4 21.29c26.27 3.796 36.79 36.09 17.75 54.59l-105.9 102.1l25.05 145.5c4.508 26.31-23.23 45.9-46.49 33.7L288 439.6l-130.9 68.7C133.8 520.5 106.1 500.9 110.6 474.6l25.05-145.5L29.72 226.1c-19.03-18.5-8.516-50.79 17.75-54.59l146.4-21.29l65.43-132.4C271.1-6.083 305-5.786 316.7 17.8z"></path></svg><!-- <i class="fas fa-star text-warning"></i> Font Awesome fontawesome.com -->
                          <svg class="svg-inline--fa fa-star fa-w-18 text-warning" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="star" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg=""><path fill="currentColor" d="M316.7 17.8l65.43 132.4l146.4 21.29c26.27 3.796 36.79 36.09 17.75 54.59l-105.9 102.1l25.05 145.5c4.508 26.31-23.23 45.9-46.49 33.7L288 439.6l-130.9 68.7C133.8 520.5 106.1 500.9 110.6 474.6l25.05-145.5L29.72 226.1c-19.03-18.5-8.516-50.79 17.75-54.59l146.4-21.29l65.43-132.4C271.1-6.083 305-5.786 316.7 17.8z"></path></svg><!-- <i class="fas fa-star text-warning"></i> Font Awesome fontawesome.com -->
                          <svg class="svg-inline--fa fa-star fa-w-18 text-warning" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="star" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg=""><path fill="currentColor" d="M316.7 17.8l65.43 132.4l146.4 21.29c26.27 3.796 36.79 36.09 17.75 54.59l-105.9 102.1l25.05 145.5c4.508 26.31-23.23 45.9-46.49 33.7L288 439.6l-130.9 68.7C133.8 520.5 106.1 500.9 110.6 474.6l25.05-145.5L29.72 226.1c-19.03-18.5-8.516-50.79 17.75-54.59l146.4-21.29l65.43-132.4C271.1-6.083 305-5.786 316.7 17.8z"></path></svg><!-- <i class="fas fa-star text-warning"></i> Font Awesome fontawesome.com -->
                          <svg class="svg-inline--fa fa-star fa-w-18 text-warning" aria-hidden="true" focusable="false" data-prefix="far" data-icon="star" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg=""><path fill="currentColor" d="M528.5 171.5l-146.4-21.29l-65.43-132.4C310.9 5.971 299.4-.002 287.1 0C276.6 0 265.1 5.899 259.3 17.8L193.8 150.2L47.47 171.5C21.2 175.3 10.68 207.6 29.72 226.1l105.9 102.1L110.6 474.6C107 495.3 123.6 512 142.2 512c4.932 0 10.01-1.172 14.88-3.75L288 439.6l130.9 68.7c4.865 2.553 9.926 3.713 14.85 3.713c18.61 0 35.21-16.61 31.65-37.41l-25.05-145.5l105.9-102.1C565.3 207.6 554.8 175.3 528.5 171.5zM390.2 320.6l22.4 130.1l-117.2-61.48c-4.655-2.442-10.21-2.442-14.87 .0001L163.4 450.7l22.4-130.1C186.7 315.4 184.1 310.1 181.2 306.4l-94.7-92.09l130.9-19.04C222.6 194.5 227.1 191.2 229.4 186.5L288 67.99l58.59 118.5c2.331 4.717 6.833 7.986 12.04 8.744l130.9 19.04l-94.7 92.09C391 310.1 389.3 315.4 390.2 320.6z"></path></svg><!-- <i class="far fa-star text-warning"></i> Font Awesome fontawesome.com -->
                          <svg class="svg-inline--fa fa-star fa-w-18 text-warning" aria-hidden="true" focusable="false" data-prefix="far" data-icon="star" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg=""><path fill="currentColor" d="M528.5 171.5l-146.4-21.29l-65.43-132.4C310.9 5.971 299.4-.002 287.1 0C276.6 0 265.1 5.899 259.3 17.8L193.8 150.2L47.47 171.5C21.2 175.3 10.68 207.6 29.72 226.1l105.9 102.1L110.6 474.6C107 495.3 123.6 512 142.2 512c4.932 0 10.01-1.172 14.88-3.75L288 439.6l130.9 68.7c4.865 2.553 9.926 3.713 14.85 3.713c18.61 0 35.21-16.61 31.65-37.41l-25.05-145.5l105.9-102.1C565.3 207.6 554.8 175.3 528.5 171.5zM390.2 320.6l22.4 130.1l-117.2-61.48c-4.655-2.442-10.21-2.442-14.87 .0001L163.4 450.7l22.4-130.1C186.7 315.4 184.1 310.1 181.2 306.4l-94.7-92.09l130.9-19.04C222.6 194.5 227.1 191.2 229.4 186.5L288 67.99l58.59 118.5c2.331 4.717 6.833 7.986 12.04 8.744l130.9 19.04l-94.7 92.09C391 310.1 389.3 315.4 390.2 320.6z"></path></svg><!-- <i class="far fa-star text-warning"></i> Font Awesome fontawesome.com -->
                      </div>
              <div class="comment-text mt-3 mb-3">
                <p>خوب بود</p>
                  </div>
                      <div class="reply">
                <a rel="nofollow" class="comment-reply-link" href="" data-commentid="28" data-postid="4003" data-belowelement="comment-28" data-respondelement="respond" data-replyto="پاسخ به netflibs-beta" aria-label="پاسخ به netflibs-beta">پاسخ</a><svg class="svg-inline--fa fa-share fa-w-16 mr-2" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="share" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M503.7 226.2l-176 151.1c-15.38 13.3-39.69 2.545-39.69-18.16V272.1C132.9 274.3 66.06 312.8 111.4 457.8c5.031 16.09-14.41 28.56-28.06 18.62C39.59 444.6 0 383.8 0 322.3c0-152.2 127.4-184.4 288-186.3V56.02c0-20.67 24.28-31.46 39.69-18.16l176 151.1C514.8 199.4 514.8 216.6 503.7 226.2z"></path></svg><!-- <i class="fas fa-share mr-2"></i> Font Awesome fontawesome.com -->
              </div>
            </div>
          </li>
          <hr>
          <!-- #comment-## -->
                  </ol>
                  </div>
              </div>
              </div>
          </div>
          <?php } ?>
    </div>
                    
    <?php
  }

  protected function _content_template(){
    
  }
}