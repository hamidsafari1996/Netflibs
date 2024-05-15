<?php

namespace WPC\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH')) exit; // Exit if accessed directly


class Cat1footer extends Widget_Base{

  public function get_name(){
    return 'cat1footer';
  }

  public function get_title(){
    return 'دسته‌بندی';
  }

  public function get_icon(){
    return 'eicon-sitemap';
  }

  public function get_categories(){
    return ['four-category'];
  }

  protected function _register_controls(){
    $this->start_controls_section(
      'section_modal_style',
      [
          'label' => __( 'تنظیمات دسته فیلم', 'elementor' ),
      ]
  );
    $this->add_control(
        'taxonomy',
        [
            'label' => __( 'تکسونامی', 'plugin-domain' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'default' => 'movie_cat',
            'options' => [
                'category' => __( 'دسته‌بندی نوشته‌ها', 'plugin-domain' ),
                'post_tag' => __( 'برچسب نوشته‌ها', 'plugin-domain' ),
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
      'orderby',
      [
          'label' => __( 'نمایش بر اساس', 'plugin-domain' ),
          'type' => \Elementor\Controls_Manager::SELECT,
          'default' => 'date',
          'options' => [
              'date'  => __( 'روز', 'plugin-domain' ),
              'title' => __( 'نام', 'plugin-domain' ),
              'rand' => __( 'تصادفی', 'plugin-domain' ),
              'count_comment' => __( 'تعداد نظرات', 'plugin-domain' ),
              'author' => __( 'نویسنده', 'plugin-domain' ),
              'ID' => __( 'پست آیدی', 'plugin-domain' ),
          ],
      ]
  );
  $this->add_control(
    'display',
    [
        'label' => __( 'سبک نمایش', 'plugin-domain' ),
        'type' => \Elementor\Controls_Manager::SELECT,
        'default' => 'inline',
        'options' => [
            'inline'  => __( 'افقی', 'plugin-domain' ),
            'block' => __( 'عمودی', 'plugin-domain' ),
        ],
        'selectors' => [
            '{{WRAPPER}} .social-footer .cat-footer ul li' => 'display: {{VALUE}};',
        ],
    ]
);
  $this->add_control(
    'show_title',
    [
      'label' => __( 'نمایش تعداد', 'plugin-domain' ),
      'type' => \Elementor\Controls_Manager::SWITCHER,
      'label_on' => __( 'Show', 'your-plugin' ),
      'label_off' => __( 'Hide', 'your-plugin' ),
      'return_value' => 'yes',
      'default' => 'true',
    ]
  );
  $this->add_control(
    'price',
    [
        'label' => __( 'تعداد نمایش', 'plugin-domain' ),
        'type' => \Elementor\Controls_Manager::NUMBER,
        'min' => 1,
        'max' => 100,
        'step' => 1,
        'default' => 5,
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
                '{{WRAPPER}} .social-footer .cat-footer ul' => 'text-align: {{VALUE}};',
            ],
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
              '{{WRAPPER}} .social-footer' => 'max-width: {{SIZE}}{{UNIT}};',
          ],
      ]
    );
    $this->add_control(
        'margin',
        [
            'label' => __( 'فاصله', 'elementor' ),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%' ],
            'selectors' => [
                '{{WRAPPER}} .social-footer' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
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
                '{{WRAPPER}} .social-footer .cat-footer' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
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
                '{{WRAPPER}} .social-footer' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
            ],
        ]
    );
    $this->add_control(
		'background',
		[
			'label' => __( 'رنگ پس زمینه', 'plugin-domain' ),
			'type' => Controls_Manager::COLOR,
			'default' => '',
			'selectors' => [
				'{{WRAPPER}} .social-footer' => 'background: {{VALUE}}',
			],
		]
	);
    $this->add_group_control(
        \Elementor\Group_Control_Box_Shadow::get_type(),
        [
            'name' => 'box_shadow',
            'label' => __( 'باکس شدوو', 'plugin-domain' ),
            'selector' => '{{WRAPPER}} .social-footer',
        ]
    );
    $this->end_controls_section();
    $this->start_controls_section(
      'section_style_li',
      [
          'label' => __( 'تنظیمات li', 'elementor' ),
          'tab' => Controls_Manager::TAB_STYLE,
      ]
    );

    $this->add_control(
      'margin_li',
      [
          'label' => __( 'فاصله', 'elementor' ),
          'type' => Controls_Manager::DIMENSIONS,
          'size_units' => [ 'px', '%' ],
          'selectors' => [
              '{{WRAPPER}} .social-footer .cat-footer ul li' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
          ],
      ]
  );
  $this->add_control(
      'padding_li',
      [
          'label' => __( 'پدینگ', 'elementor' ),
          'type' => Controls_Manager::DIMENSIONS,
          'size_units' => [ 'px', '%' ],
          'selectors' => [
              '{{WRAPPER}} .social-footer .cat-footer ul li' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
          ],
      ]
  );
  $this->add_control(
      'border_radius_li',
      [
          'label' => __( 'گوشه‌های مدور', 'elementor' ),
          'type' => Controls_Manager::DIMENSIONS,
          'size_units' => [ 'px', '%' ],
          'selectors' => [
              '{{WRAPPER}} .social-footer .cat-footer ul li' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
          ],
      ]
  );

  $this->add_control(
    'background_li',
    [
        'label' => __( 'رنگ پس زمینه', 'plugin-domain' ),
        'type' => Controls_Manager::COLOR,
        'default' => '',
        'selectors' => [
            '{{WRAPPER}} .social-footer .cat-footer ul li' => 'background: {{VALUE}}',
        ],
    ]
    );
  $this->add_control(
    'hover_li',
    [
        'label' => __( 'هاور', 'plugin-domain' ),
        'type' => \Elementor\Controls_Manager::COLOR,
        'default' => '',
        'selectors' => [
            '{{WRAPPER}} .social-footer .cat-footer ul li:hover' => 'background: {{VALUE}}',
        ],
    ]
);
    $this->end_controls_section();
    $this->start_controls_section(
      'section_style_a',
      [
          'label' => __( 'تنظیمات a', 'elementor' ),
          'tab' => Controls_Manager::TAB_STYLE,
      ]
    );
    $this->add_control(
        'background_a',
        [
            'label' => __( 'رنگ', 'plugin-domain' ),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .social-footer .cat-footer ul li a' => 'color: {{VALUE}}',
            ],
        ]
    );
    $this->add_control(
      'hover_a',
      [
          'label' => __( 'هاور', 'plugin-domain' ),
          'type' => \Elementor\Controls_Manager::COLOR,
          'default' => '',
          'selectors' => [
              '{{WRAPPER}} .social-footer .cat-footer ul li a:hover' => 'color: {{VALUE}}',
          ],
      ]
    );
    $this->add_control(
        'hover_li_a',
        [
            'label' => __( 'رنگ عدد', 'plugin-domain' ),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .social-footer .cat-footer ul li' => 'color: {{VALUE}}',
            ],
        ]
    );
    $this->add_group_control(
      \Elementor\Group_Control_Typography::get_type(),
      [
          'name' => 'li_typography',
          'label' => __( 'تایپوگرافی', 'plugin-domain' ),
          'selector' => '{{WRAPPER}} .social-footer .cat-footer ul li a, .social-footer .cat-footer ul li',
      ]
    );
    $this->end_controls_section();
  }
  

  protected function render(){
    $settings = $this->get_settings_for_display();
    ?>
    <?php
    $taxonomy     = $settings['taxonomy'];
    $orderby      = $settings['orderby'];
    if ( 'yes' === $settings['show_title'] ) {
    $show_count   = true;
    }
    $pad_counts   = false;
    $hierarchical = false;
    $title        = '';
    $number       = $settings['price'];
     
    $args = array(
      'taxonomy'     => $taxonomy,
      'orderby'      => $orderby,
      'show_count'   => $show_count,
      'pad_counts'   => $pad_counts,
      'hierarchical' => $hierarchical,
      'title_li'     => $title,
      'number'       => $number,
    );
    ?>
    
    <div class="social-footer">
        <div class="cat-footer">
            <ul class="cate-foot">
              <?php wp_list_categories( $args ); ?>
            </ul> 
        </div>        
    </div>
  



    <?php
  }

  protected function _content_template(){
    
  }
}