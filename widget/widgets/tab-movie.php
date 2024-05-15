<?php

namespace WPC\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH')) exit; // Exit if accessed directly


class Tabmovie extends Widget_Base{

  public function get_name(){
    return 'tabmovie';
  }

  public function get_title(){
    return 'تب فیلم';
  }

  public function get_icon(){
    return 'eicon-tabs';
  }

  public function get_categories(){
    return ['tree-category'];
  }

  protected function _register_controls(){

    $this->start_controls_section(
        'section_modal_style',
        [
            'label' => __( 'تنظیمات تب فیلم', 'elementor' ),
        ]
    );
        $repeater = new \Elementor\Repeater();
        $repeater->add_control(
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
        $repeater->add_control(
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
        $repeater->add_control(
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
        $repeater->add_control(
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
		$repeater->add_control(
			'list_title', [
				'label' => __( 'عنوان', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'List Title' , 'plugin-domain' ),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'list_content', [
				'label' => __( 'نامک', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'List Title' , 'plugin-domain' ),
				'label_block' => true,
			]
		);
        $repeater->add_control(
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
			'list',
			[
				'label' => __( 'Repeater List', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'list_title' => __( 'عنوان #1', 'plugin-domain' ),
						'list_content' => __( 'movie', 'plugin-domain' ),
					],
					[
						'list_title' => __( 'نامک #2', 'plugin-domain' ),
						'list_content' => __( 'movie', 'plugin-domain' ),
					],
				],
				'title_field' => '{{{ list_title }}}',
			]
		);
        $this->add_control(
			'id_content', [
				'label' => __( 'آیدی تب', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'tab' , 'plugin-domain' ),
                'description' => __( 'یک id جدید وارد کنید' , 'plugin-domin'),
				'label_block' => true,
			]
		);
        $this->add_control(
            'show_title',
            [
                'label' => __( 'نمایش عنوان', 'plugin-domain' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Show', 'your-plugin' ),
                'label_off' => __( 'Hide', 'your-plugin' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
        $this->add_control(
            'show_imdb',
            [
                'label' => __( 'نمایش امتیاز', 'plugin-domain' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Show', 'your-plugin' ),
                'label_off' => __( 'Hide', 'your-plugin' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
        $this->add_control(
            'show_eye',
            [
                'label' => __( 'نمایش بازدید', 'plugin-domain' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Show', 'your-plugin' ),
                'label_off' => __( 'Hide', 'your-plugin' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
        $this->add_control(
            'show_year',
            [
                'label' => __( 'نمایش سال', 'plugin-domain' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Show', 'your-plugin' ),
                'label_off' => __( 'Hide', 'your-plugin' ),
                'return_value' => 'yes',
                'default' => 'yes',
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
                '{{WRAPPER}} .web-movie-section ul' => 'justify-content: {{VALUE}};',
              ],
            ]
          );
    $this->end_controls_section();
    $this->start_controls_section(
        'section_style',
        [
            'label' => __( 'تنظیمات استایل تب', 'elementor' ),
            'tab' => Controls_Manager::TAB_STYLE,
        ]
    );
    $this->add_responsive_control(
        'margin',
        [
            'label' => __( 'فاصله', 'elementor' ),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%' ],
            'selectors' => [
                '{{WRAPPER}} .web-movie-section ul' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]
    );
    $this->add_responsive_control(
        'padding',
        [
            'label' => __( 'پدینگ', 'elementor' ),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%' ],
            'selectors' => [
                '{{WRAPPER}} .web-movie-section ul' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]
    );
    $this->add_responsive_control(
        'border-radius',
        [
            'label' => __( 'گوشه‌های مدور', 'elementor' ),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%' ],
            'selectors' => [
                '{{WRAPPER}} .web-movie-section ul' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]
    );
    $this->add_control(
        'ul_color',
        [
            'label' => __( 'رنگ پس زمینه', 'plugin-domain' ),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .web-movie-section ul' => 'background: {{VALUE}}',
            ],
        ]
    );
    $this->add_group_control(
        \Elementor\Group_Control_Box_Shadow::get_type(),
        [
            'name' => 'box_right_buttom',
            'label' => __( 'باکس شدوو', 'plugin-domain' ),
            'selector' => '{{WRAPPER}} .web-movie-section ul',
        ]
    );
    $this->add_control(
        'more_options',
        [
            'label' => __( 'تنظیمات دکمه', 'plugin-name' ),
            'type' => \Elementor\Controls_Manager::HEADING,
            'separator' => 'before',
        ]
    );
    $this->add_responsive_control(
        'margin_button',
        [
            'label' => __( 'فاصله', 'elementor' ),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%' ],
            'selectors' => [
                '{{WRAPPER}} .web-movie-section .welearn-tabs-list ul li a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
            ],
        ]
    );
    $this->add_responsive_control(
        'padding_button',
        [
            'label' => __( 'پدینگ', 'elementor' ),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%' ],
            'selectors' => [
                '{{WRAPPER}} .web-movie-section .welearn-tabs-list ul li a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
            ],
        ]
    );
    $this->add_responsive_control(
        'border_radius_img',
        [
            'label' => __( 'گوشه‌های مدور', 'elementor' ),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%' ],
            'selectors' => [
                '{{WRAPPER}} .web-movie-section .welearn-tabs-list ul li a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
            ],
        ]
    );
    $this->add_control(
        'background_btn',
        [
            'label' => __( 'رنگ دکمه', 'plugin-domain' ),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .web-movie-section .welearn-tabs-list ul li a' => 'background: {{VALUE}}',
            ],
        ]
    );
    $this->add_group_control(
        \Elementor\Group_Control_Typography::get_type(),
        [
            'name' => 'contact_typography',
            'label' => __( 'تایپوگرافی', 'plugin-domain' ),
            'selector' => '{{WRAPPER}} .web-movie-section .welearn-tabs-list ul li a',
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
                '{{WRAPPER}} .web-movie-section .welearn-tabs-list ul li a' => 'border-style: {{VALUE}}',
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
                '{{WRAPPER}} .web-movie-section .welearn-tabs-list ul li a' => 'border-width: {{SIZE}}{{UNIT}};',
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
                '{{WRAPPER}} .web-movie-section .welearn-tabs-list ul li a' => 'border-color: {{VALUE}}',
            ],
        ]
    );
    $this->add_control(
        'hover_btn',
        [
            'label' => __( 'هاور دکمه', 'plugin-domain' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .web-movie-section .welearn-tabs-list ul li a:hover' => 'background: {{VALUE}}',
            ],
        ]
    );
    $this->add_control(
        'color_btn',
        [
            'label' => __( 'رنگ متن دکمه', 'plugin-domain' ),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .web-movie-section .welearn-tabs-list ul li a' => 'color: {{VALUE}}',
            ],
        ]
    );
    $this->add_control(
        'color_hover',
        [
            'label' => __( 'هاور متن دکمه', 'plugin-domain' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .web-movie-section .welearn-tabs-list ul li a:hover' => 'color: {{VALUE}}',
            ],
        ]
    );
    $this->add_control(
        'color_active',
        [
            'label' => __( 'رنگ دکمه فعال', 'plugin-domain' ),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .web-movie-section .welearn-tabs-list ul li a.active' => 'background: {{VALUE}}',
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
    $this->add_responsive_control(
        'width_card',
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
                '{{WRAPPER}} .web-movie-section .welearn-tab-background .item-post' => 'width: {{SIZE}}{{UNIT}};',
            ],
        ]
    );
    $this->add_responsive_control(
        'margin_card',
        [
            'label' => __( 'فاصله', 'elementor' ),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%' ],
            'selectors' => [
                '{{WRAPPER}} .web-movie-section .welearn-tab-background .item-post' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]
    );
    $this->add_responsive_control(
        'padding_card',
        [
            'label' => __( 'پدینگ', 'elementor' ),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%' ],
            'selectors' => [
                '{{WRAPPER}} .web-movie-section .welearn-tab-background .item-post' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]
    );
    $this->add_responsive_control(
        'border_radiusimg',
        [
            'label' => __( 'گوشه‌های مدور تصویر', 'elementor' ),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%' ],
            'selectors' => [
                '{{WRAPPER}} .web-movie-section .welearn-tab-background .item-post a img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
            ],
        ]
    );
    $this->add_group_control(
        \Elementor\Group_Control_Typography::get_type(),
        [
            'name' => 'title_typography',
            'label' => __( 'تایپوگرافی عنوان', 'plugin-domain' ),
            'selector' => '{{WRAPPER}} .web-movie-section .welearn-tab-background .item-post h2 a',
        ]
    );
    $this->add_control(
        'title_color',
        [
            'label' => __( 'عنوان', 'plugin-domain' ),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .web-movie-section .welearn-tab-background .item-post h2 a' => 'color: {{VALUE}}',
            ],
        ]
    );
    $this->add_control(
        'title_hover',
        [
            'label' => __( 'هاور عنوان', 'plugin-domain' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .web-movie-section .welearn-tab-background .item-post h2 a:hover' => 'color: {{VALUE}}',
            ],
        ]
    );
    $this->add_group_control(
        \Elementor\Group_Control_Typography::get_type(),
        [
            'name' => 'imdb_typography',
            'label' => __( 'تایپوگرافی امتیاز', 'plugin-domain' ),
            'selector' => '{{WRAPPER}} .web-movie-section .welearn-tab-background .item-post .movie-new-footer span.star',
        ]
    );
    $this->add_control(
        'imdb_color',
        [
            'label' => __( 'رنگ امتیاز', 'plugin-domain' ),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .web-movie-section .welearn-tab-background .item-post .movie-new-footer span.star' => 'color: {{VALUE}}',
            ],
        ]
    );
    $this->add_group_control(
        \Elementor\Group_Control_Typography::get_type(),
        [
            'name' => 'eye_typography',
            'label' => __( 'تایپوگرافی تعداد بازدید', 'plugin-domain' ),
            'selector' => '{{WRAPPER}} .web-movie-section .welearn-tab-background .item-post .movie-new-footer span.eye',
        ]
    );
    $this->add_control(
        'eye_color',
        [
            'label' => __( 'رنگ تعداد بازدید', 'plugin-domain' ),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .web-movie-section .welearn-tab-background .item-post .movie-new-footer span.eye' => 'color: {{VALUE}}',
            ],
        ]
    );
    $this->add_group_control(
        \Elementor\Group_Control_Typography::get_type(),
        [
            'name' => 'year_typography',
            'label' => __( 'تایپوگرافی سال', 'plugin-domain' ),
            'selector' => '{{WRAPPER}} .web-movie-section .welearn-tab-background .item-post .movie-new-footer span.year, .web-movie-section .welearn-tab-background .item-post .movie-new-footer span.year a',
        ]
    );
    $this->add_control(
        'year_color',
        [
            'label' => __( 'رنگ سال', 'plugin-domain' ),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .web-movie-section .welearn-tab-background .item-post .movie-new-footer span.year, .web-movie-section .welearn-tab-background .item-post .movie-new-footer span.year a' => 'color: {{VALUE}}',
            ],
        ]
    );
    $this->add_control(
        'bookmark_bg',
        [
            'label' => __( 'رنگ پس زمینه بوک مارک', 'plugin-domain' ),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .web-movie-section .welearn-tab-background .item-post .faverit-button button.simplefavorite-button' => 'background: {{VALUE}}',
            ],
        ]
    );
    $this->add_control(
        'bookmark_color',
        [
            'label' => __( 'رنگ آیکون بوک مارک', 'plugin-domain' ),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .web-movie-section .welearn-tab-background .item-post .faverit-button button.simplefavorite-button svg' => 'color: {{VALUE}}',
            ],
        ]
    );
    $this->end_controls_section();
  }
  

  protected function render(){
    $settings = $this->get_settings_for_display();
    ?>


<div class="web-movie-section">
    
        
            <div class="col-12">
                <div class="welearn-tabs-list sticky-nav">
                    <ul class="nav">
                    <?php $count=0; if ( $settings['list'] ) { foreach (  $settings['list'] as $item ) { ?>
                        <li><a class="btn btn-danger <?php $class= $count==0 ? 'active' : ''; echo $class; ?>" href="#<?php echo $settings['id_content']; ?><?php echo $count; ?>" data-toggle="tab"><?php echo $item['list_title']; ?></a></li>
                        <?php $count++;
                            }
                        } ?>
                    </ul>
                </div>
            </div>
            <div class="col-12">
                <div class="welearn-tab-background mt-5 welearn-shadow">
                    <div class="tab-content">
                    <?php $counter=0; if ( $settings['list'] ) { foreach (  $settings['list'] as $item ) { ?>
                        <div class="tab-pane fade show <?php if($counter==0) {echo 'active';} else{} ?>" id="<?php echo $settings['id_content']; ?><?php echo $counter; ?>" role="tabpanel">
                            <div class="row justify-content-center">
                            <?php
                            $post_type = $item['post_type'];
                            $number = $item['price'];
                            $cat = $item['taxonomy'];
                            $filter = $item['filter'];
                            $soth = $item['tartib'];
                            $tax = $item['list_content'];
                            $best_product = array(
                                'post_type' => $post_type,
                                'posts_per_page' => $number,
                                'orderby' => $filter,
                                'order' => $soth,
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
                            <div class="card item-post">
                                <a href="<?php the_permalink(); ?>"><img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>" class="img-fluid rounded figure-img"></a>
                                <div class="card-body">
                                <?php if ( 'yes' === $settings['show_title'] ) {
                                    ?>
                                    <div class="movie-new-content mb-4 text-right">
                                        <h2 data-toggle="tooltip" title="<?php the_title(); ?>"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                                    </div>
                                    <?php
                                    } ?>
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
                                        <span class="year float-left"><?php the_terms(get_the_ID(),"yaers"); ?></span>
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
                                    <?php } ?>
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

                                    <?php } ?>
                                </div>
                            </div>
                                <?php endwhile; wp_reset_postdata(); ?>
                            </div>
                        </div>
                        <?php $counter++;
                            }
                            } ?>
                    </div>
                </div>
            </div>
        
    
</div>


    <?php
  }

  protected function _content_template(){
    
  }
}