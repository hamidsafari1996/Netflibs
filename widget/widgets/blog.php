<?php

namespace WPC\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH')) exit; // Exit if accessed directly


class Blognet extends Widget_Base{

  public function get_name(){
    return 'blognet';
  }

  public function get_title(){
    return 'بلاگ';
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
            'label' => __( 'تنظیمات دسته بلاگ', 'elementor' ),
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
    $this->end_controls_section();
    $this->start_controls_section(
        'section_style',
        [
            'label' => __( 'تنظیمات عمومی', 'elementor' ),
            'tab' => Controls_Manager::TAB_STYLE,
        ]
    );
    $this->add_responsive_control(
        'max-width_box',
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
                '{{WRAPPER}} article' => 'max-width: {{SIZE}}{{UNIT}};',
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
                '{{WRAPPER}} article' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
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
                '{{WRAPPER}} article' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
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
                '{{WRAPPER}} article' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
            ],
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
                '{{WRAPPER}} article' => 'border-style: {{VALUE}}',
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
                '{{WRAPPER}} article' => 'border-width: {{SIZE}}{{UNIT}};',
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
				'{{WRAPPER}} article' => 'border-color: {{VALUE}}',
			],
		]
	);
    $this->add_group_control(
        \Elementor\Group_Control_Box_Shadow::get_type(),
        [
            'name' => 'shadow',
            'label' => __( 'باکس شدوو', 'plugin-domain' ),
            'selector' => '{{WRAPPER}} article',
        ]
    );
    $this->add_control(
		'background',
		[
			'label' => __( 'رنگ پس زمینه', 'plugin-domain' ),
			'type' => Controls_Manager::COLOR,
			'default' => '',
			'selectors' => [
				'{{WRAPPER}} article' => 'background: {{VALUE}}',
			],
		]
	);
    $this->end_controls_section();
    $this->start_controls_section(
        'section_style_content',
        [
            'label' => __( 'تنظیمات محتوا', 'elementor' ),
            'tab' => Controls_Manager::TAB_STYLE,
        ]
    );
    $this->add_control(
        'border_radius_img',
        [
            'label' => __( 'گوشه‌های مدور تصویر', 'elementor' ),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%' ],
            'selectors' => [
                '{{WRAPPER}} article .post-meta .post-news a img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
            ],
        ]
    );
    $this->add_group_control(
        \Elementor\Group_Control_Box_Shadow::get_type(),
        [
            'name' => 'shadow_box',
            'label' => __( 'باکس شدوو تصویر', 'plugin-domain' ),
            'selector' => '{{WRAPPER}} article .post-meta .post-news a img',
        ]
    );
    $this->add_control(
		'color_cat',
		[
			'label' => __( 'رنگ پس زمینه دسته بندی', 'plugin-domain' ),
			'type' => Controls_Manager::COLOR,
			'default' => '',
			'selectors' => [
				'{{WRAPPER}} article .post-meta .badge' => 'background: {{VALUE}}',
			],
		]
	);
    $this->add_control(
		'background_cat',
		[
			'label' => __( 'رنگ متن دسته بندی', 'plugin-domain' ),
			'type' => Controls_Manager::COLOR,
			'default' => '',
			'selectors' => [
				'{{WRAPPER}} article .post-meta .badge a' => 'color: {{VALUE}}',
			],
		]
	);
    $this->add_control(
        'border_radius_cat',
        [
            'label' => __( 'گوشه‌های مدور', 'elementor' ),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%' ],
            'selectors' => [
                '{{WRAPPER}} article .post-meta .badge' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
            ],
        ]
    );
    $this->add_group_control(
        \Elementor\Group_Control_Typography::get_type(),
        [
            'name' => 'ctitle_typography',
            'label' => __( 'تایپوگرافی', 'plugin-domain' ),
            'selector' => '{{WRAPPER}} article .post-meta .badge',
        ]
    );
    $this->add_control(
		'title_color',
		[
			'label' => __( 'رنگ عنوان', 'plugin-domain' ),
			'type' => Controls_Manager::COLOR,
			'default' => '',
			'selectors' => [
				'{{WRAPPER}} article .post-meta h2 a' => 'color: {{VALUE}}',
			],
		]
	);
    $this->add_control(
        'hover_color',
        [
            'label' => __( 'هاور عنوان', 'plugin-domain' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} article .post-meta h2 a:hover' => 'color: {{VALUE}}',
            ],
        ]
    );
    $this->add_group_control(
        \Elementor\Group_Control_Typography::get_type(),
        [
            'name' => 'title',
            'label' => __( 'تایپوگرافی', 'plugin-domain' ),
            'selector' => '{{WRAPPER}} article .post-meta h2 a',
        ]
    );
    $this->add_control(
		'title_year',
		[
			'label' => __( 'رنگ تاریخ و دقیقه مطالعه', 'plugin-domain' ),
			'type' => Controls_Manager::COLOR,
			'default' => '',
			'selectors' => [
				'{{WRAPPER}} article .post-meta .year' => 'color: {{VALUE}}',
			],
		]
	);
    $this->add_group_control(
        \Elementor\Group_Control_Typography::get_type(),
        [
            'name' => 'year',
            'label' => __( 'تایپوگرافی', 'plugin-domain' ),
            'selector' => '{{WRAPPER}} article .post-meta .year',
        ]
    );
    $this->add_control(
		'title_p',
		[
			'label' => __( 'رنگ توضیحات', 'plugin-domain' ),
			'type' => Controls_Manager::COLOR,
			'default' => '',
			'selectors' => [
				'{{WRAPPER}} article .post-meta .exer' => 'color: {{VALUE}}',
			],
		]
	);
    $this->add_group_control(
        \Elementor\Group_Control_Typography::get_type(),
        [
            'name' => 'paraghraph',
            'label' => __( 'تایپوگرافی', 'plugin-domain' ),
            'selector' => '{{WRAPPER}} article .post-meta .exer',
        ]
    );
    $this->end_controls_section();
  }
  

  protected function render(){
    $settings = $this->get_settings_for_display();
    ?>
    
                
                    <?php
                    $tax = $settings['button_name'];
                    $number = $settings['price'];
                    $filter = $settings['filter'];
                    $soth = $settings['tartib'];
                    $best_product = array(
                        'post_type' => 'post',
                        'orderby' => $filter,
                        'order' => $soth,
                        'posts_per_page' => $number,
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'category',
                                'field' => 'slug',
                                'terms' => $tax,
                            ),
                        ),
                    );
                    $show_best_product = new \WP_Query($best_product);
                    while($show_best_product->have_posts()) : $show_best_product->the_post();
                    
                    ?>
                    
                        <article class="blog-elementor">
                            <div class="post-meta d-flex mb-4">
                                <div class="post-news">
                                    <a href="<?php the_permalink(); ?>">
                                        <img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>" class="rounded w-m">
                                    </a>
                                </div>
                                <?php 
                                $time_booke = get_post_meta(get_the_ID(),'text-name',true);
                                ?>
                                <div class="post-text text-right mr-4">
                                    <span class="badge badge-danger"><?php the_category(','); ?></span>
                                    <h2 class=""><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                                    <span class="year">منتشر شده در <?php echo get_the_date('d F'); ?> - <?php echo $time_booke ?> دقیقه مطالعه</span>
                                    <p class="exer mt-3"><?php echo get_the_excerpt(); ?></p>
                                </div>
                            </div>
                        </article>
                    
                    <?php endwhile; wp_reset_postdata(); ?>
                    

                    
                    
    <?php
  }

  protected function _content_template(){
    
  }
}