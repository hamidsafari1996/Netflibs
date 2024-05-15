<?php

namespace WPC\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH')) exit; // Exit if accessed directly


class Setting_film extends Widget_Base{

  public function get_name(){
    return 'setting-film';
  }

  public function get_title(){
    return 'تنظیمات متنی فیلم';
  }

  public function get_icon(){
    return 'eicon-table-of-contents';
  }

  public function get_categories(){
    return ['five-category'];
  }
  function taxonomy_translate(){
    $categories_translate = get_the_terms(get_the_ID(),"translate");
    if ( ! empty( $categories_translate ) ) { 
          echo esc_html( $categories_translate[0]->name ); 
    }
  }
  function taxonomy_years(){
    $categories_years = get_the_terms(get_the_ID(),"yaers");
    if ( ! empty( $categories_years ) ) { 
          echo esc_html( $categories_years[0]->name ); 
    }
  }
  function taxonomy_ganres(){
    $categories_ganres = get_the_terms(get_the_ID(),"ganres");
    if ( ! empty( $categories_ganres ) ) { 
          echo esc_html( $categories_ganres[0]->name ); 
    }
  }
  function taxonomy_quality(){
    $categories_quality = get_the_terms(get_the_ID(),"quality");
    if ( ! empty( $categories_quality ) ) { 
          echo esc_html( $categories_quality[0]->name ); 
    }
  }
  function taxonomy_actors(){
    $categories_actors = get_the_terms(get_the_ID(),"actors");
    if ( ! empty( $categories_actors ) ) { 
          echo esc_html( $categories_actors[0]->name ); 
    }
  }
  function taxonomy_honarmandan(){
    $categories_honarmandan = get_the_terms(get_the_ID(),"honarmandan");
    if ( ! empty( $categories_honarmandan ) ) { 
          echo esc_html( $categories_honarmandan[0]->name ); 
    }
  }
  function taxonomy_sedapishegan(){
    $categories_sedapishegan = get_the_terms(get_the_ID(),"sedapishegan");
    if ( ! empty( $categories_sedapishegan ) ) { 
          echo esc_html( $categories_sedapishegan[0]->name ); 
    }
  }
  protected function _register_controls(){
      $this->start_controls_section(
        'content-contorol',
        [
        'label' => __( 'تنظیمات عمومی', 'elementor' ),
        'tab' => Controls_Manager::TAB_CONTENT,
        ]
      );
      $this->add_control(
            'setting_film_lists_style',
            [
                  'label'   => esc_html__( 'انتخاب استایل', 'netflibs-theme' ),
                  'type'    => Controls_Manager::SELECT,
                  'default' => 'vertical',
                  'options' => [
                        'vertical' => esc_html__('عمودی', 'netflibs-theme'),
                        'hozintar' => esc_html__('افقی', 'netflibs-theme'),
                  ],
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
            '{{WRAPPER}} .text-align-ntf' => 'text-align: {{VALUE}};',
          ],
        ]
      );
      // $this->add_control(
      //   'icon_imdb',
      //   [
      //         'label' => __( 'آیکون', 'text-domain' ),
      //         'type' => \Elementor\Controls_Manager::ICONS,
      //         'default' => [
      //               'value' => 'fab fa-imdb',
      //               'library' => 'solid',
      //         ],
      //         'condition' => [
      //           'setting_film_lists_style' => 'imDb_products_lists',
      //         ],
      //   ]
      // );
      // $this->add_control(
      //   'icon_button',
      //   [
      //         'label' => __( 'آیکون', 'text-domain' ),
      //         'type' => \Elementor\Controls_Manager::ICONS,
      //         'default' => [
      //               'value' => 'fas fa-play',
      //               'library' => 'solid',
      //         ],
      //         'condition' => [
      //           'setting_film_lists_style' => 'button_products_lists',
      //         ],
      //   ]
      // );
      $this->add_control(
        'show_years',
        [
          'label' => esc_html__( 'نمایش سال ساخت', 'plugin-name' ),
          'type' => \Elementor\Controls_Manager::SWITCHER,
          'label_on' => esc_html__( 'Show', 'your-plugin' ),
          'label_off' => esc_html__( 'Hide', 'your-plugin' ),
          'return_value' => 'yes',
          'default' => 'yes',
        ]
      );
      $this->add_control(
        'show_time',
        [
          'label' => esc_html__( 'نمایش زمان فیلم', 'plugin-name' ),
          'type' => \Elementor\Controls_Manager::SWITCHER,
          'label_on' => esc_html__( 'Show', 'your-plugin' ),
          'label_off' => esc_html__( 'Hide', 'your-plugin' ),
          'return_value' => 'yes',
          'default' => 'yes',
        ]
      );
      $this->add_control(
        'show_translate',
        [
          'label' => esc_html__( 'نمایش مترجمان', 'plugin-name' ),
          'type' => \Elementor\Controls_Manager::SWITCHER,
          'label_on' => esc_html__( 'Show', 'your-plugin' ),
          'label_off' => esc_html__( 'Hide', 'your-plugin' ),
          'return_value' => 'yes',
          'default' => 'yes',
        ]
      );
      $this->add_control(
        'show_ganres',
        [
          'label' => esc_html__( 'نمایش ژانر', 'plugin-name' ),
          'type' => \Elementor\Controls_Manager::SWITCHER,
          'label_on' => esc_html__( 'Show', 'your-plugin' ),
          'label_off' => esc_html__( 'Hide', 'your-plugin' ),
          'return_value' => 'yes',
          'default' => 'yes',
        ]
      );
      $this->add_control(
        'show_quality',
        [
          'label' => esc_html__( 'نمایش کیفیت', 'plugin-name' ),
          'type' => \Elementor\Controls_Manager::SWITCHER,
          'label_on' => esc_html__( 'Show', 'your-plugin' ),
          'label_off' => esc_html__( 'Hide', 'your-plugin' ),
          'return_value' => 'yes',
          'default' => 'yes',
        ]
      );
      $this->add_control(
        'show_rating',
        [
          'label' => esc_html__( 'نمایش امتیاز فیلم', 'plugin-name' ),
          'type' => \Elementor\Controls_Manager::SWITCHER,
          'label_on' => esc_html__( 'Show', 'your-plugin' ),
          'label_off' => esc_html__( 'Hide', 'your-plugin' ),
          'return_value' => 'yes',
          'default' => 'yes',
        ]
      );
      $this->add_control(
        'show_crackter',
        [
          'label' => esc_html__( 'نمایش کارگردان', 'plugin-name' ),
          'type' => \Elementor\Controls_Manager::SWITCHER,
          'label_on' => esc_html__( 'Show', 'your-plugin' ),
          'label_off' => esc_html__( 'Hide', 'your-plugin' ),
          'return_value' => 'yes',
          'default' => 'yes',
        ]
      );
      $this->add_control(
        'show_honarmand',
        [
          'label' => esc_html__( 'نمایش بازیگران', 'plugin-name' ),
          'type' => \Elementor\Controls_Manager::SWITCHER,
          'label_on' => esc_html__( 'Show', 'your-plugin' ),
          'label_off' => esc_html__( 'Hide', 'your-plugin' ),
          'return_value' => 'yes',
          'default' => 'yes',
        ]
      );
      $this->add_control(
        'show_sedapishe',
        [
          'label' => esc_html__( 'نمایش صداپیشگان', 'plugin-name' ),
          'type' => \Elementor\Controls_Manager::SWITCHER,
          'label_on' => esc_html__( 'Show', 'your-plugin' ),
          'label_off' => esc_html__( 'Hide', 'your-plugin' ),
          'return_value' => 'yes',
          'default' => 'yes',
        ]
      );
      $this->end_controls_section();
      $this->start_controls_section(
        'section_content_style',
        [
            'label' => __( 'استایل', 'elementor' ),
            'tab' => Controls_Manager::TAB_STYLE,
        ]
      );
      $this->add_group_control(
        \Elementor\Group_Control_Typography::get_type(),
        [
            'name' => 'desc_typography',
            'label' => __( 'تایپوگرافی', 'plugin-domain' ),
            'selector' => '{{WRAPPER}} .elementor-informaition-film p',
        ]
      );
      $this->add_control(
        'margin',
        [
            'label' => __( 'فاصله', 'elementor' ),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%' ],
            'selectors' => [
                '{{WRAPPER}} .elementor-informaition-film p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                '{{WRAPPER}} .elementor-informaition-film p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .elementor-informaition-film p' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
      );
      $this->add_group_control(
          \Elementor\Group_Control_Box_Shadow::get_type(),
          [
              'name' => 'box_right_buttom',
              'label' => __( 'باکس شدوو', 'plugin-domain' ),
              'selector' => '{{WRAPPER}} .elementor-informaition-film p',
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
        'textetion_color',
        [
            'label' => __( 'رنگ', 'plugin-domain' ),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .elementor-informaition-film p' => 'color: {{VALUE}}',
            ],
        ]
      );
      $this->add_group_control(
        \Elementor\Group_Control_Background::get_type(),
        [
          'name' => 'background_cl',
          'label' => esc_html__( 'Background', 'plugin-name' ),
          'types' => [ 'classic', 'gradient' ],
          'selector' => '{{WRAPPER}} .elementor-informaition-film p',
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
        'textetion_color_hover',
        [
            'label' => __( 'رنگ', 'plugin-domain' ),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .elementor-informaition-film p:hover' => 'color: {{VALUE}}',
            ],
        ]
      );
      $this->add_group_control(
        \Elementor\Group_Control_Background::get_type(),
        [
          'name' => 'background_cl_hover',
          'label' => esc_html__( 'Background', 'plugin-name' ),
          'types' => [ 'classic', 'gradient' ],
          'selector' => '{{WRAPPER}} .elementor-informaition-film p:hover',
        ]
      );
      $this->end_controls_tab();
      $this->end_controls_tabs();
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
                '{{WRAPPER}} .elementor-informaition-film p' => 'border-style: {{VALUE}}',
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
                  '{{WRAPPER}} .elementor-informaition-film p' => 'border-width: {{SIZE}}{{UNIT}};',
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
                  '{{WRAPPER}} .elementor-informaition-film p' => 'border-color: {{VALUE}}',
              ],
          ]
      );
      $this->end_controls_section();
  }
  

      protected function render(){
            $settings = $this->get_settings_for_display();
            $text_time = get_post_meta(get_the_ID(),'text-time',true);
            $text_imDb = get_post_meta(get_the_ID(),'text-imDb',true);
            $link_imDb = get_post_meta(get_the_ID(),'link',true);
            $IMDB = new \IMDB($link_imDb); 
            $select_sethand = get_post_meta( get_the_ID(), 'imDb_select', true );
      ?>
      <?php if($settings['setting_film_lists_style'] == 'vertical'){ ?>
      <div class="elementor-informaition-film">
        <?php /**------------------------------TIME_MOVIE-------------------------------- */ ?>
        
            <?php if ( 'defult-select' === $select_sethand ){ ?>
            <?php if ( 'yes' === $settings['show_years'] ) { ?>
            <p class="actor text-right"><i class="fa-solid fa-calendar"></i>سال ساخت:<?php $this->taxonomy_years(); ?></p>
            <?php } ?>
            <?php if ( 'yes' === $settings['show_time'] ) { ?>
            <p class="actor text-right"><i class="far fa-clock ml-2"></i>زمان فیلم:<?php echo $text_time; ?></p>
            <?php } ?>
            <?php } if ( 'imdb-tabligh' === $select_sethand ){ ?>
            <?php if ( 'yes' === $settings['show_years'] ) { ?>
            <p class="actor text-right"><i class="fa-solid fa-calendar"></i>سال ساخت:<?php if ($IMDB->isReady) { print_r($IMDB->getYear()); } else { echo ''; } ?></p>
            <?php } ?>
            <?php if ( 'yes' === $settings['show_time'] ) { ?>
            <p class="actor text-right"><i class="far fa-clock ml-2"></i>زمان فیلم:<?php if ($IMDB->isReady) { print_r($IMDB->getRuntime()); } else { echo ''; } ?></p>
            <?php } ?>
            <?php } ?>
            <?php if ( 'yes' === $settings['show_translate'] ) { ?>
            <p class="actor text-right"><i class="fa-solid fa-language ml-2"></i>مترجمان:<?php $this->taxonomy_translate(); ?></p>
            <?php } ?>
            <?php if ( 'yes' === $settings['show_ganres'] ) { ?>
            <p class="actor text-right"><i class="fa-duotone fa-masks-theater"></i>ژانر:<?php $this->taxonomy_ganres(); ?></p>
            <?php } ?>
            <?php if ( 'yes' === $settings['show_quality'] ) { ?>
            <p class="actor text-right"><i class="fa-solid fa-badge-check"></i>کیفیت:<?php $this->taxonomy_quality(); ?></p>
            <?php } ?>
            <?php   
            if ( 'defult-select' === $select_sethand ){ ?>
            <?php if ( 'yes' === $settings['show_rating'] ) { ?>
            <p class="star text-right"><i class="fa-regular fa-star"></i>امتیاز:<?php echo $text_imDb; ?></p>
            <?php } ?>
            <?php } ?>
            <?php
            if ( 'imdb-tabligh' === $select_sethand ){ ?>
            <?php if ( 'yes' === $settings['show_rating'] ) { ?>
            <p class="star text-right"><i class="fa-regular fa-star"></i>امتیاز:<?php if ($IMDB->isReady) { print_r($IMDB->getRating()); } else { echo ''; } ?></p>
            <?php } ?>
            <?php } ?>
            <?php if ( 'yes' === $settings['show_crackter'] ) { ?>
            <p class="actor text-right"><i class="fa-regular fa-user"></i>کارگردان:<?php $this->taxonomy_actors(); ?></p>
            <?php } ?>
            <?php if ( 'yes' === $settings['show_honarmand'] ) { ?>
            <p class="actor text-right"><i class="fa-light fa-users"></i>بازیگران:<?php $this->taxonomy_honarmandan(); ?></p>
            <?php } ?>
            <?php if ( 'yes' === $settings['show_sedapishe'] ) { ?>
            <p class="actor text-right"><i class="fa-solid fa-microphone"></i>صداپیشگان:<?php $this->taxonomy_sedapishegan(); ?></p>
            <?php } ?>
        
      </div>
      <?php } ?>
      <?php /**------------------------------translate_MOVIE-------------------------------- */ ?>
      <?php if($settings['setting_film_lists_style'] == 'hozintar'){ ?>
        <div class="elementor-informaition-film d-flex align-items-center">
        <?php /**------------------------------TIME_MOVIE-------------------------------- */ ?>
        
            <?php if ( 'defult-select' === $select_sethand ){ ?>
            <?php if ( 'yes' === $settings['show_years'] ) { ?>
            <p class="actor text-right"><i class="fa-solid fa-calendar"></i>سال ساخت:<?php $this->taxonomy_years(); ?></p>
            <?php } ?>
            <?php if ( 'yes' === $settings['show_time'] ) { ?>
            <p class="actor text-right"><i class="far fa-clock ml-2"></i>زمان فیلم:<?php echo $text_time; ?></p>
            <?php } ?>
            <?php } if ( 'imdb-tabligh' === $select_sethand ){ ?>
            <?php if ( 'yes' === $settings['show_years'] ) { ?>
            <p class="actor text-right"><i class="fa-solid fa-calendar"></i>سال ساخت:<?php if ($IMDB->isReady) { print_r($IMDB->getYear()); } else { echo ''; } ?></p>
            <?php } ?>
            <?php if ( 'yes' === $settings['show_time'] ) { ?>
            <p class="actor text-right"><i class="far fa-clock ml-2"></i>زمان فیلم:<?php if ($IMDB->isReady) { print_r($IMDB->getRuntime()); } else { echo ''; } ?></p>
            <?php } ?>
            <?php } ?>
            <?php if ( 'yes' === $settings['show_translate'] ) { ?>
            <p class="actor text-right"><i class="fa-solid fa-language ml-2"></i>مترجمان:<?php $this->taxonomy_translate(); ?></p>
            <?php } ?>
            <?php if ( 'yes' === $settings['show_ganres'] ) { ?>
            <p class="actor text-right"><i class="fa-duotone fa-masks-theater"></i>ژانر:<?php $this->taxonomy_ganres(); ?></p>
            <?php } ?>
            <?php if ( 'yes' === $settings['show_quality'] ) { ?>
            <p class="actor text-right"><i class="fa-solid fa-badge-check"></i>کیفیت:<?php $this->taxonomy_quality(); ?></p>
            <?php } ?>
            <?php   
            if ( 'defult-select' === $select_sethand ){ ?>
            <?php if ( 'yes' === $settings['show_rating'] ) { ?>
            <p class="star text-right"><i class="fa-regular fa-star"></i>امتیاز:<?php echo $text_imDb; ?></p>
            <?php } ?>
            <?php } ?>
            <?php
            if ( 'imdb-tabligh' === $select_sethand ){ ?>
            <?php if ( 'yes' === $settings['show_rating'] ) { ?>
            <p class="star text-right"><i class="fa-regular fa-star"></i>امتیاز:<?php if ($IMDB->isReady) { print_r($IMDB->getRating()); } else { echo ''; } ?></p>
            <?php } ?>
            <?php } ?>
            <?php if ( 'yes' === $settings['show_crackter'] ) { ?>
            <p class="actor text-right"><i class="fa-regular fa-user"></i>کارگردان:<?php $this->taxonomy_actors(); ?></p>
            <?php } ?>
            <?php if ( 'yes' === $settings['show_honarmand'] ) { ?>
            <p class="actor text-right"><i class="fa-light fa-users"></i>بازیگران:<?php $this->taxonomy_honarmandan(); ?></p>
            <?php } ?>
            <?php if ( 'yes' === $settings['show_sedapishe'] ) { ?>
            <p class="actor text-right"><i class="fa-solid fa-microphone"></i>صداپیشگان:<?php $this->taxonomy_sedapishegan(); ?></p>
            <?php } ?>
        
      </div>  
      <?php } ?>
      
      <?php

  }
  protected function _content_template(){
  }
}
?>
