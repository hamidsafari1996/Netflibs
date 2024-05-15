<?php

namespace WPC\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH')) exit; // Exit if accessed directly


class Pagenet extends Widget_Base{

  public function get_name(){
    return 'pagenet';
  }

  public function get_title(){
    return 'برگه‌ها';
  }

  public function get_icon(){
    return 'eicon-table-of-contents';
  }

  public function get_categories(){
    return ['four-category'];
  }

  protected function _register_controls(){

    $this->start_controls_section(
        'section_modal_style',
        [
            'label' => __( 'تنظیمات محتوا', 'elementor' ),
        ]
    );
    $this->add_control(
        'post',
        [
            'label' => __( 'پست تایپ', 'plugin-domain' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'default' => 'page',
            'options' => [
                'page'  => __( 'برگه‌ها', 'plugin-domain' ),
                'coagex_movie' => __( 'فیلم و سریال', 'plugin-domain' ),
                'post' => __( 'نوشته‌ها', 'plugin-domain' ),
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
                '{{WRAPPER}} ul li' => 'display: {{VALUE}};',
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
                '{{WRAPPER}} ul' => 'text-align: {{VALUE}};',
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
    $this->add_control(
        'margin',
        [
            'label' => __( 'فاصله', 'elementor' ),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%' ],
            'selectors' => [
                '{{WRAPPER}} ul li' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
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
                '{{WRAPPER}} ul li' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
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
                '{{WRAPPER}} ul li' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
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
				'{{WRAPPER}} ul li' => 'background: {{VALUE}}',
			],
		]
    );
    $this->add_control(
		'background_hover',
		[
			'label' => __( 'هاور پس زمینه', 'plugin-domain' ),
			'type' => Controls_Manager::COLOR,
			'default' => '',
			'selectors' => [
				'{{WRAPPER}} ul li:hover' => 'background: {{VALUE}}',
			],
		]
    );
    $this->add_control(
        'border_style',
        [
            'label' => __( 'Border Style', 'plugin-domain' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'default' => 'solid',
            'options' => [
                'solid'  => __( 'Solid', 'plugin-domain' ),
                'dashed' => __( 'Dashed', 'plugin-domain' ),
                'dotted' => __( 'Dotted', 'plugin-domain' ),
                'double' => __( 'Double', 'plugin-domain' ),
                'none' => __( 'None', 'plugin-domain' ),
            ],
            'selectors' => [
				'{{WRAPPER}} ul li' => 'border-style: {{VALUE}}',
			],
        ]
    );
    $this->add_responsive_control(
        'width',
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
                '{{WRAPPER}} ul li' => 'border-width: {{SIZE}}{{UNIT}};',
            ],
        ]
      );
      $this->add_control(
		'color-li',
		[
			'label' => __( 'رنگ بردر', 'plugin-domain' ),
			'type' => Controls_Manager::COLOR,
			'default' => '',
			'selectors' => [
				'{{WRAPPER}} ul li' => 'color: {{VALUE}}',
			],
		]
    );
    $this->add_group_control(
        \Elementor\Group_Control_Box_Shadow::get_type(),
        [
            'name' => 'box_shadow',
            'label' => __( 'باکس شدوو', 'plugin-domain' ),
            'selector' => '{{WRAPPER}} ul li',
        ]
    );
    $this->end_controls_section();
    $this->start_controls_section(
        'section_style_title',
        [
            'label' => __( 'استایل عنواین', 'elementor' ),
            'tab' => Controls_Manager::TAB_STYLE,
        ]
    );
    $this->add_control(
		'color-a',
		[
			'label' => __( 'رنگ عنوان', 'plugin-domain' ),
			'type' => Controls_Manager::COLOR,
			'default' => '',
			'selectors' => [
				'{{WRAPPER}} ul li a' => 'color: {{VALUE}}',
			],
		]
    );
    $this->add_control(
		'color-hover',
		[
			'label' => __( 'هاور عنوان', 'plugin-domain' ),
			'type' => Controls_Manager::COLOR,
			'default' => '',
			'selectors' => [
				'{{WRAPPER}} ul li a:hover' => 'color: {{VALUE}}',
			],
		]
    );
    $this->add_group_control(
        \Elementor\Group_Control_Typography::get_type(),
        [
            'name' => 'content_typography',
            'label' => __( 'تایپوگرافی', 'plugin-domain' ),
            'selector' => '{{WRAPPER}} ul li a',
        ]
    );
    $this->add_group_control(
        \Elementor\Group_Control_Text_Shadow::get_type(),
        [
            'name' => 'text_shadow',
            'label' => __( 'شدوو عنوان', 'plugin-domain' ),
            'selector' => '{{WRAPPER}} ul li a',
        ]
    );
    $this->end_controls_section();
  }
  

  protected function render(){
    $settings = $this->get_settings_for_display();
    ?>
    
                <ul>
                    <?php
                    $post_type = $settings['post'];
                    $number = $settings['price'];
                    $filter = $settings['filter'];
                    $soth = $settings['tartib'];
                    $best_product = array(
                        'post_type' => $post_type,
                        'orderby' => $filter,
                        'order' => $soth,
                        'posts_per_page' => $number,
                    );
                    $show_best_product = new \WP_Query($best_product);
                    while($show_best_product->have_posts()) : $show_best_product->the_post();
                    
                    ?>
                    
                        <li>
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </li>
                    
                    
                    <?php endwhile; wp_reset_postdata(); ?>
                </ul>
                    

                    
                    
    <?php
  }

  protected function _content_template(){
    
  }
}