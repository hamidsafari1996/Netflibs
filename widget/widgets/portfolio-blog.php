<?php

namespace WPC\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH')) exit; // Exit if accessed directly


class Portfolioblog extends Widget_Base{

  public function get_name(){
    return 'portfolioblog';
  }

  public function get_title(){
    return 'پرتفولیو بلاگ';
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
            'label' => __( 'تنظیمات محتوا', 'elementor' ),
        ]
    );
    $this->add_control(
        'show_query',
        [
            'label' => __( 'نمایش از کوئری', 'plugin-domain' ),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'label_on' => __( 'Show', 'your-plugin' ),
            'label_off' => __( 'Hide', 'your-plugin' ),
            'return_value' => 'yes',
            'default' => 'yes',
        ]
    );
    
    $this->add_control(
      'taxonomy',
      [
          'label' => __( 'بارگذاری بر اساس', 'plugin-domain' ),
          'type' => \Elementor\Controls_Manager::SELECT,
          'default' => 'category',
          'options' => [
              'category'  => __( 'دسته‌بندی', 'plugin-domain' ),
              'post_tag' => __( 'برچسب', 'plugin-domain' ),
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
      'button_name',
      [
        'label' => 'نامک دسته',
        'type' => \Elementor\Controls_Manager::TEXT,
      'description' => 'نامک دسته بندی مثلا: best'
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
    'size_blog',
    [
      'label' => __( 'سایز', 'plugin-domain' ),
      'type' => \Elementor\Controls_Manager::SELECT,
      'default' => 'col-lg-6 col-md-6 col-sm-12 col-12',
      'options' => [
        'col-lg-6 col-md-6 col-sm-12 col-12'  => __( 'بزرگ', 'plugin-domain' ),
        'col-lg-4 col-md-6 col-sm-12 col-12' => __( 'متوسط', 'plugin-domain' ),
        'col-lg-3 col-md-6 col-sm-12 col-12' => __( 'کوچک', 'plugin-domain' ),
      ],
    ]
  );
  $this->add_control(
    'sabk',
    [
      'label' => __( 'سبک نمایش', 'plugin-domain' ),
      'type' => \Elementor\Controls_Manager::SELECT,
      'default' => 'row',
      'options' => [
        'row'  => __( 'افقی', 'plugin-domain' ),
        'd-block' => __( 'عمودی', 'plugin-domain' ),
      ],
    ]
  );
    $this->add_control(
    'image_static',
    [
        'label' => __( 'انتخاب تصویر', 'plugin-domain' ),
        'description' => __( 'این تصویر برای محتوای استاتیک است.','plugin-domain' ),
        'type' => \Elementor\Controls_Manager::MEDIA,
        'default' => [
            'url' => \Elementor\Utils::get_placeholder_image_src(),
        ],
    ]
    );  
  $this->end_controls_section();
  $this->start_controls_section(
    'section_position_style',
    [
        'label' => __( 'جایگاه محتوا', 'elementor' ),
        'tab' => Controls_Manager::TAB_STYLE,
    ]
  );
  $this->add_responsive_control(
    'top_right',
    [
        'label' => __( 'بالا', 'elementor' ),
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
            '{{WRAPPER}} .portfolio-blog .content-blog' => 'top: {{SIZE}}{{UNIT}};',
        ],
    ]
);
$this->add_responsive_control(
    'right_right',
    [
        'label' => __( 'راست', 'elementor' ),
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
            '{{WRAPPER}} .portfolio-blog .content-blog' => 'right: {{SIZE}}{{UNIT}};',
        ],
    ]
);
$this->add_responsive_control(
    'bottom_right',
    [
        'label' => __( 'پایین', 'elementor' ),
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
            '{{WRAPPER}} .portfolio-blog .content-blog' => 'bottom: {{SIZE}}{{UNIT}};',
        ],
    ]
);
$this->add_responsive_control(
    'left_right',
    [
        'label' => __( 'چپ', 'elementor' ),
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
            '{{WRAPPER}} .portfolio-blog .content-blog' => 'left: {{SIZE}}{{UNIT}};',
        ],
    ]
);

  $this->end_controls_section();
  $this->start_controls_section(
    'section_content_style',
    [
        'label' => __( 'استایل تصویر', 'elementor' ),
        'tab' => Controls_Manager::TAB_STYLE,
    ]
  );
  $this->add_control(
    'border_portfolio',
    [
        'label' => __( 'گوشه‌های مدور تصویر', 'elementor' ),
        'type' => Controls_Manager::DIMENSIONS,
        'size_units' => [ 'px', '%' ],
        'selectors' => [
            '{{WRAPPER}} .portfolio-blog img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
        ],
    ]
  );
  $this->add_group_control(
    \Elementor\Group_Control_Box_Shadow::get_type(),
    [
        'name' => 'box_shdow_img',
        'label' => __( 'باکس شدوو', 'plugin-domain' ),
        'selector' => '{{WRAPPER}} .portfolio-blog img',
    ]
  );
  $this->end_controls_section();
  $this->start_controls_section(
    'section_category_style',
    [
        'label' => __( 'استایل دسته بندی', 'elementor' ),
        'tab' => Controls_Manager::TAB_STYLE,
    ]
  );
  $this->add_control(
    'padding_category',
    [
        'label' => __( 'پدینگ', 'elementor' ),
        'type' => Controls_Manager::DIMENSIONS,
        'size_units' => [ 'px', '%' ],
        'selectors' => [
            '{{WRAPPER}} .portfolio-blog .content-blog .cat-blog a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
    ]
  );
  $this->add_control(
      'margin_category',
      [
          'label' => __( 'فاصله', 'elementor' ),
          'type' => Controls_Manager::DIMENSIONS,
          'size_units' => [ 'px', '%' ],
          'selectors' => [
              '{{WRAPPER}} .portfolio-blog .content-blog .cat-blog a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
          ],
      ]
  );
  $this->add_control(
      'border_category',
      [
          'label' => __( 'گوشه‌های مدور', 'elementor' ),
          'type' => Controls_Manager::DIMENSIONS,
          'size_units' => [ 'px', '%' ],
          'selectors' => [
              '{{WRAPPER}} .portfolio-blog .content-blog .cat-blog a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
          ],
      ]
  );
  $this->add_control(
    'background_category',
    [
        'label' => __( 'رنگ پس زمینه', 'plugin-domain' ),
        'type' => Controls_Manager::COLOR,
        'default' => '',
        'selectors' => [
            '{{WRAPPER}} .portfolio-blog .content-blog .cat-blog a' => 'background: {{VALUE}}',
        ],
    ]
  );
  $this->add_control(
      'background_category_hover',
      [
          'label' => __( 'هاور پس زمینه', 'plugin-domain' ),
          'type' => Controls_Manager::COLOR,
          'default' => '',
          'selectors' => [
              '{{WRAPPER}} .portfolio-blog .content-blog .cat-blog a:hover' => 'background: {{VALUE}}',
          ],
      ]
  );
  $this->add_control(
    'color_category_buttom',
    [
        'label' => __( 'رنگ دکمه', 'plugin-domain' ),
        'type' => Controls_Manager::COLOR,
        'default' => '',
        'selectors' => [
            '{{WRAPPER}} .portfolio-blog .content-blog .cat-blog a' => 'color: {{VALUE}}',
        ],
    ]
  );
  $this->add_control(
    'color_category_hover',
    [
        'label' => __( 'هاور دکمه', 'plugin-domain' ),
        'type' => Controls_Manager::COLOR,
        'default' => '',
        'selectors' => [
            '{{WRAPPER}} .portfolio-blog .content-blog .cat-blog a:hover' => 'color: {{VALUE}}',
        ],
    ]
  );
  $this->add_group_control(
    \Elementor\Group_Control_Box_Shadow::get_type(),
    [
        'name' => 'box_category_buttom',
        'label' => __( 'باکس شدوو', 'plugin-domain' ),
        'selector' => '{{WRAPPER}} .portfolio-blog .content-blog .cat-blog a',
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
    'border_style_category',
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
            '{{WRAPPER}} .portfolio-blog .content-blog .cat-blog a' => 'border-style: {{VALUE}}',
        ],
    ]
  );
  $this->add_responsive_control(
    'width_border_category',
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
            '{{WRAPPER}} .portfolio-blog .content-blog .cat-blog a' => 'border-width: {{SIZE}}{{UNIT}};',
        ],
    ]
  );
  $this->add_control(
      'bg_button_category',
      [
          'label' => __( 'رنگ بردر', 'plugin-domain' ),
          'type' => Controls_Manager::COLOR,
          'default' => '',
          'selectors' => [
              '{{WRAPPER}} .portfolio-blog .content-blog .cat-blog a' => 'border-color: {{VALUE}}',
          ],
      ]
  );
  $this->add_control(
    'bg_button_category_hover',
    [
        'label' => __( 'رنگ بردر', 'plugin-domain' ),
        'type' => Controls_Manager::COLOR,
        'default' => '',
        'selectors' => [
            '{{WRAPPER}} .portfolio-blog .content-blog .cat-blog a:hover' => 'border-color: {{VALUE}}',
        ],
    ]
    );
    $this->add_group_control(
        \Elementor\Group_Control_Typography::get_type(),
        [
            'name' => 'category_typography',
            'label' => __( 'تایپوگرافی', 'plugin-domain' ),
            'selector' => '{{WRAPPER}} .portfolio-blog .content-blog .cat-blog a',
        ]
    );
    $this->end_controls_section();
    $this->start_controls_section(
        'section_title_style',
        [
            'label' => __( 'استایل عنوان', 'elementor' ),
            'tab' => Controls_Manager::TAB_STYLE,
        ]
    );
    $this->add_control(
        'color_title',
        [
            'label' => __( 'رنگ عنوان', 'plugin-domain' ),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .portfolio-blog .content-blog h1 a' => 'color: {{VALUE}}',
            ],
        ]
    );
    $this->add_control(
        'color_title_hover',
        [
            'label' => __( 'هاور عنوان', 'plugin-domain' ),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .portfolio-blog .content-blog h1 a:hover' => 'color: {{VALUE}}',
            ],
        ]
    );
    $this->add_group_control(
        \Elementor\Group_Control_Typography::get_type(),
        [
            'name' => 'tile_typography',
            'label' => __( 'تایپوگرافی', 'plugin-domain' ),
            'selector' => '{{WRAPPER}} .portfolio-blog .content-blog h1 a',
        ]
    );
    $this->add_group_control(
        \Elementor\Group_Control_Text_Shadow::get_type(),
        [
            'name' => 'text_shadow',
            'label' => __( 'شدوو عنوان', 'plugin-domain' ),
            'selector' => '{{WRAPPER}} .portfolio-blog .content-blog h1 a',
        ]
    );
    $this->add_control(
        'more_options_desc',
        [
            'label' => __( 'استایل توضیح کوتاه', 'plugin-name' ),
            'type' => \Elementor\Controls_Manager::HEADING,
            'separator' => 'before',
        ]
    );
    $this->add_control(
        'color_desc',
        [
            'label' => __( 'رنگ متن', 'plugin-domain' ),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .portfolio-blog .content-blog .desc-static-blog' => 'color: {{VALUE}}',
            ],
        ]
    );
    $this->add_group_control(
        \Elementor\Group_Control_Typography::get_type(),
        [
            'name' => 'desc_typography',
            'label' => __( 'تایپوگرافی', 'plugin-domain' ),
            'selector' => '{{WRAPPER}} .portfolio-blog .content-blog .desc-static-blog',
        ]
    );
    $this->add_control(
        'more_options',
        [
            'label' => __( 'استایل تاریخ و دقیقه مطالعه', 'plugin-name' ),
            'type' => \Elementor\Controls_Manager::HEADING,
            'separator' => 'before',
        ]
    );
    $this->add_control(
        'color_year',
        [
            'label' => __( 'رنگ تاریخ', 'plugin-domain' ),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .portfolio-blog .content-blog .more-blog span.date' => 'color: {{VALUE}}',
            ],
        ]
    );
    $this->add_group_control(
        \Elementor\Group_Control_Typography::get_type(),
        [
            'name' => 'year_typography',
            'label' => __( 'تایپوگرافی', 'plugin-domain' ),
            'selector' => '{{WRAPPER}} .portfolio-blog .content-blog .more-blog span.dat',
        ]
    );
    $this->add_group_control(
        \Elementor\Group_Control_Text_Shadow::get_type(),
        [
            'name' => 'year_shadow',
            'label' => __( 'شدوو تاریخ', 'plugin-domain' ),
            'selector' => '{{WRAPPER}} .portfolio-blog .content-blog .more-blog span.dat',
        ]
    );
    $this->end_controls_section();
  }
  

  protected function render(){
    $settings = $this->get_settings_for_display();
    ?>
    <?php if ( 'yes' === $settings['show_query'] ) { ?>
    <div class="<?php echo $settings['sabk']; ?>">
    <?php
      $tax = $settings['button_name'];
      $filter = $settings['filter'];
      $soth = $settings['tartib'];
      $number = $settings['price'];
      $cat = $settings['taxonomy'];
      $best_product = array(
          'post_type' => 'post',
          'orderby' => $filter,
          'order' => $soth,
          'posts_per_page' => $number,
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
      <div class="<?php echo $settings['size_blog']; ?>">
        <div class="portfolio-blog">
            <a href="<?php the_permalink(); ?>" class="position-relative">
              <img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>" class="w-100">
            </a>
            <div class="content-blog position-absolute text-right">
              <span class="cat-blog"><?php the_category(','); ?></span>
              <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
              <div class="more-blog">
                <span class="date"><?php echo get_the_date('d F'); ?> - <?php $time_booke = get_post_meta(get_the_ID(),'text-name',true); echo $time_booke ?> دقیقه مطالعه</span>
              </div>
            </div>
        </div>
      </div>
      <?php endwhile; wp_reset_postdata(); ?>
    </div>
    <?php } 
    
      else{ ?>

    <?php
      $tax = $settings['button_name'];
      $filter = $settings['filter'];
      $soth = $settings['tartib'];
      $cat = $settings['taxonomy'];
      $best_product = array(
          'post_type' => 'post',
          'orderby' => $filter,
          'order' => $soth,
          'posts_per_page' => '1',
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
    
        <div class="portfolio-blog">
            <a href="<?php the_permalink(); ?>" class="position-relative">
              <img src="<?php echo $settings['image_static']['url']; ?>" alt="<?php the_title(); ?>" class="w-100">
            </a>
            <div class="content-blog position-absolute text-right">
              <span class="cat-blog"><?php the_category(','); ?></span>
              <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
              <p class="desc-static-blog"><?php echo get_the_excerpt(); ?></p>
              <div class="more-blog">
                <span class="date"><?php echo get_the_date('d F'); ?> - <?php $time_booke = get_post_meta(get_the_ID(),'text-name',true); echo $time_booke ?> دقیقه مطالعه</span>
              </div>
            </div>
        </div>
        <?php endwhile; wp_reset_postdata(); ?>


    <?php  }

    ?>
    <?php 
  }

  protected function _content_template(){
    
  }
}