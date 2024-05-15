<?php

namespace WPC\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH')) exit; // Exit if accessed directly


class Notification extends Widget_Base{

  public function get_name(){
    return 'notification';
  }

  public function get_title(){
    return 'اعلان‌ها';
  }

  public function get_icon(){
    return 'eicon-alert';
  }

  public function get_categories(){
    return ['secend-category'];
  }

  protected function _register_controls(){

    $this->start_controls_section(
        'section_modal_style',
        [
            'label' => __( 'تنظیمات محتوا', 'elementor' ),
        ]
    );
    $this->add_control(
      'posttype',
      [
          'label' => __( 'انتخاب پست تایپ', 'plugin-domain' ),
          'type' => \Elementor\Controls_Manager::SELECT,
          'default' => 'post',
          'options' => [
              'post'  => __( 'نوشته‌ها', 'plugin-domain' ),
              'page' => __( 'برگه ها', 'plugin-domain' ),
              'coagex_movie' => __( 'فیلم و سریال', 'plugin-domain' ),
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
			'icon',
			[
				'label' => __( 'آیکون', 'text-domain' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-bell',
					'library' => 'solid',
				],
			]
		);
    $this->add_control(
      'show_img',
      [
          'label' => __( 'نمایش تصویر', 'plugin-domain' ),
          'type' => \Elementor\Controls_Manager::SWITCHER,
          'label_on' => __( 'Show', 'your-plugin' ),
          'label_off' => __( 'Hide', 'your-plugin' ),
          'return_value' => 'yes',
          'default' => 'yes',
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
        'show_category',
        [
            'label' => __( 'نمایش دسته بندی', 'plugin-domain' ),
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
            'label' => __( 'نمایش تاریخ انتشار', 'plugin-domain' ),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'label_on' => __( 'Show', 'your-plugin' ),
            'label_off' => __( 'Hide', 'your-plugin' ),
            'return_value' => 'yes',
            'default' => 'yes',
        ]
    );
    $this->add_control(
        'show_hr',
        [
            'label' => __( 'نمایش خط جداکننده', 'plugin-domain' ),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'label_on' => __( 'Show', 'your-plugin' ),
            'label_off' => __( 'Hide', 'your-plugin' ),
            'return_value' => 'yes',
            'default' => 'yes',
        ]
    );
    $this->add_control(
        'color-hr',
        [
            'label' => __( 'رنگ خط جداکننده', 'plugin-domain' ),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .dropdown hr' => 'background-color: {{VALUE}}',
            ],
        ]
    );
    $this->end_controls_section();
    $this->start_controls_section(
      'section_style',
      [
          'label' => __( 'تنظیمات استایل آیکون', 'elementor' ),
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
            '{{WRAPPER}} .dropdown button' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
            '{{WRAPPER}} .dropdown button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
            '{{WRAPPER}} .dropdown button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
    ]
  );
  $this->add_group_control(
    \Elementor\Group_Control_Box_Shadow::get_type(),
    [
        'name' => 'box_right_buttom',
        'label' => __( 'باکس شدوو', 'plugin-domain' ),
        'selector' => '{{WRAPPER}} .dropdown button',
    ]
  );
  $this->add_control(
    'title_color',
    [
        'label' => __( 'رنگ پس زمینه', 'plugin-domain' ),
        'type' => Controls_Manager::COLOR,
        'default' => '',
        'selectors' => [
            '{{WRAPPER}} .dropdown button' => 'background: {{VALUE}}',
        ],
    ]
  );
  $this->add_control(
    'title_color_hover',
    [
        'label' => __( 'هاور رنگ پس زمینه', 'plugin-domain' ),
        'type' => Controls_Manager::COLOR,
        'default' => '',
        'selectors' => [
            '{{WRAPPER}} .dropdown button:hover' => 'background: {{VALUE}}',
        ],
    ]
  );
  $this->add_control(
    'icon_color',
    [
        'label' => __( 'رنگ آیکون', 'plugin-domain' ),
        'type' => Controls_Manager::COLOR,
        'default' => '',
        'selectors' => [
            '{{WRAPPER}} .dropdown button svg' => 'color: {{VALUE}}',
        ],
    ]
  );
  $this->add_control(
    'icon_color_hover',
    [
        'label' => __( 'هاور آیکون', 'plugin-domain' ),
        'type' => Controls_Manager::COLOR,
        'default' => '',
        'selectors' => [
            '{{WRAPPER}} .dropdown button svg:hover' => 'color: {{VALUE}}',
        ],
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
            '{{WRAPPER}} .dropdown button' => 'border-style: {{VALUE}}',
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
            '{{WRAPPER}} .dropdown button' => 'border-width: {{SIZE}}{{UNIT}};',
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
            '{{WRAPPER}} .dropdown button' => 'border-color: {{VALUE}}',
        ],
    ]
);
  $this->end_controls_section();
  $this->start_controls_section(
    'section_botton_style',
    [
        'label' => __( 'تنظیمات منو باز شونده', 'elementor' ),
        'tab' => Controls_Manager::TAB_STYLE,
    ]
);
$this->add_responsive_control(
    'max_width',
    [
        'label' => __( 'حداکثر ارتفاع', 'elementor' ),
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
            '{{WRAPPER}} .dropdown .dropdown-menu' => 'max-height: {{SIZE}}{{UNIT}};',
        ],
    ]
);
  $this->add_control(
    'margin_drop',
    [
        'label' => __( 'فاصله', 'elementor' ),
        'type' => Controls_Manager::DIMENSIONS,
        'size_units' => [ 'px', '%' ],
        'selectors' => [
            '{{WRAPPER}} .dropdown .dropdown-menu' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
    ]
  );
  $this->add_control(
    'padding_drop',
    [
        'label' => __( 'پدینگ', 'elementor' ),
        'type' => Controls_Manager::DIMENSIONS,
        'size_units' => [ 'px', '%' ],
        'selectors' => [
            '{{WRAPPER}} .dropdown .dropdown-menu' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
    ]
  );
  $this->add_control(
    'border_radius_drop',
    [
        'label' => __( 'گوشه‌های مدور', 'elementor' ),
        'type' => Controls_Manager::DIMENSIONS,
        'size_units' => [ 'px', '%' ],
        'selectors' => [
            '{{WRAPPER}} .dropdown .dropdown-menu' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
    ]
  );
  $this->add_group_control(
    \Elementor\Group_Control_Box_Shadow::get_type(),
    [
        'name' => 'box_right_buttom_drop',
        'label' => __( 'باکس شدوو', 'plugin-domain' ),
        'selector' => '{{WRAPPER}} .dropdown .dropdown-menu',
    ]
  );
  $this->add_control(
    'title_color_drop',
    [
        'label' => __( 'رنگ پس زمینه', 'plugin-domain' ),
        'type' => Controls_Manager::COLOR,
        'default' => '',
        'selectors' => [
            '{{WRAPPER}} .dropdown .dropdown-menu' => 'background: {{VALUE}}',
        ],
    ]
  );
  $this->add_control(
    'more_options_drop',
    [
        'label' => __( 'موقعیت منو بازشونده', 'plugin-name' ),
        'type' => \Elementor\Controls_Manager::HEADING,
        'separator' => 'before',
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
            '{{WRAPPER}} .dropdown .dropdown-menu' => 'top: {{SIZE}}{{UNIT}} !important;',
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
            '{{WRAPPER}} .dropdown .dropdown-menu' => 'right: {{SIZE}}{{UNIT}} !important;',
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
            '{{WRAPPER}} .dropdown .dropdown-menu' => 'bottom: {{SIZE}}{{UNIT}} !important;',
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
            '{{WRAPPER}} .dropdown .dropdown-menu' => 'left: {{SIZE}}{{UNIT}} !important;',
        ],
    ]
);
  $this->end_controls_section();
  $this->start_controls_section(
    'section_botton_style_content',
    [
        'label' => __( 'تنظیمات محتوا', 'elementor' ),
        'tab' => Controls_Manager::TAB_STYLE,
    ]
);

$this->add_control(
    'margin_content',
    [
        'label' => __( 'فاصله', 'elementor' ),
        'type' => Controls_Manager::DIMENSIONS,
        'size_units' => [ 'px', '%' ],
        'selectors' => [
            '{{WRAPPER}} .dropdown .dropdown-item' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
    ]
  );
  $this->add_control(
    'padding_content',
    [
        'label' => __( 'پدینگ', 'elementor' ),
        'type' => Controls_Manager::DIMENSIONS,
        'size_units' => [ 'px', '%' ],
        'selectors' => [
            '{{WRAPPER}} .dropdown .dropdown-item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
    ]
  );
  $this->add_control(
    'border_radius_content',
    [
        'label' => __( 'گوشه‌های مدور', 'elementor' ),
        'type' => Controls_Manager::DIMENSIONS,
        'size_units' => [ 'px', '%' ],
        'selectors' => [
            '{{WRAPPER}} .dropdown .dropdown-item' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
    ]
  );
  $this->add_group_control(
    \Elementor\Group_Control_Box_Shadow::get_type(),
    [
        'name' => 'box_right_buttom_content',
        'label' => __( 'باکس شدوو', 'plugin-domain' ),
        'selector' => '{{WRAPPER}} .dropdown .dropdown-item',
    ]
  );
  $this->add_control(
    'title_color_content',
    [
        'label' => __( 'رنگ پس زمینه', 'plugin-domain' ),
        'type' => Controls_Manager::COLOR,
        'default' => '',
        'selectors' => [
            '{{WRAPPER}} .dropdown .dropdown-item' => 'background: {{VALUE}}',
        ],
    ]
  );
  $this->add_control(
    'title_color_content_hover',
    [
        'label' => __( 'هاور پس زمینه', 'plugin-domain' ),
        'type' => Controls_Manager::COLOR,
        'default' => '',
        'selectors' => [
            '{{WRAPPER}} .dropdown .dropdown-item:hover' => 'background: {{VALUE}}',
        ],
    ]
  );
  $this->add_control(
    'border_radius_img',
    [
        'label' => __( 'گوشه‌های مدور تصویر', 'elementor' ),
        'type' => Controls_Manager::DIMENSIONS,
        'size_units' => [ 'px', '%' ],
        'selectors' => [
            '{{WRAPPER}} .dropdown .dropdown-item img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
    ]
  );
  $this->add_group_control(
    \Elementor\Group_Control_Box_Shadow::get_type(),
    [
        'name' => 'box_right_drop',
        'label' => __( 'باکس شدوو', 'plugin-domain' ),
        'selector' => '{{WRAPPER}} .dropdown .dropdown-item img',
    ]
  );
  $this->add_control(
    'color-title',
    [
        'label' => __( 'رنگ عنوان', 'plugin-domain' ),
        'type' => Controls_Manager::COLOR,
        'default' => '',
        'selectors' => [
            '{{WRAPPER}} .dropdown .dropdown-item h3 a' => 'color: {{VALUE}}',
        ],
    ]
  );
  $this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    [
        'name' => 'view_typography',
        'label' => __( 'تایپوگرافی عنوان', 'plugin-domain' ),
        'selector' => '{{WRAPPER}} .dropdown .dropdown-item h3 a',
    ]
    );
    $this->add_control(
        'color-category',
        [
            'label' => __( 'رنگ دسته‌بندی', 'plugin-domain' ),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .dropdown .dropdown-item p a' => 'color: {{VALUE}}',
            ],
        ]
      );
      $this->add_group_control(
        \Elementor\Group_Control_Typography::get_type(),
        [
            'name' => 'category_typography',
            'label' => __( 'تایپوگرافی دسته‌بندی', 'plugin-domain' ),
            'selector' => '{{WRAPPER}} .dropdown .dropdown-item p a',
        ]
        );
        $this->add_control(
            'color-eye',
            [
                'label' => __( 'رنگ تعداد بازدید', 'plugin-domain' ),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .dropdown .dropdown-item p.eye' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'eye_typography',
                'label' => __( 'تایپوگرافی بازدید', 'plugin-domain' ),
                'selector' => '{{WRAPPER}} .dropdown .dropdown-item p.eye',
            ]
        );
        $this->add_control(
            'color-year',
            [
                'label' => __( 'رنگ تاریخ', 'plugin-domain' ),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .dropdown .dropdown-item p.year' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'year_typography',
                'label' => __( 'تایپوگرافی تاریخ', 'plugin-domain' ),
                'selector' => '{{WRAPPER}} .dropdown .dropdown-item p.year',
            ]
        );
$this->end_controls_section();
  }
  

  protected function render(){
    $settings = $this->get_settings_for_display();
    ?>
       <div class="dropdown">
        <button class="btn btn-secondary" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <?php \Elementor\Icons_Manager::render_icon( $settings['icon'], [ 'aria-hidden' => 'true' ] ); ?>
        </button>
          <div class="dropdown-menu overflow-auto" aria-labelledby="dropdownMenuButton">
              <?php
                $posttyoe = $settings['posttype'];
                $filter = $settings['filter'];
                $soth = $settings['tartib'];
                $number = $settings['price'];
                $best_product = array(
                    'post_type' => $posttyoe,
                    'orderby' => $filter,
                    'order' => $soth,
                    'posts_per_page' => $number,
                
                );
                $show_best_product = new \WP_Query($best_product);
                while($show_best_product->have_posts()) : $show_best_product->the_post();
                
              ?>
              <div class="dropdown-item">
              <div class="row">
                <div class="col-md-4">
                <?php if ( 'yes' === $settings['show_img'] ) {
                ?>
                  <a href="<?php the_permalink(); ?>"><img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>"></a>
                  <?php } ?>
                </div>
                <div class="col-md-8 text-right">
                <?php if ( 'yes' === $settings['show_title'] ) { ?>
                  <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                  <?php } ?>
                  <?php if ( 'yes' === $settings['show_category'] ) { ?>
                  <p><?php the_terms(get_the_ID(),"movie_cat"); ?></p>
                  <?php } ?>
                  <?php if ( 'yes' === $settings['show_eye'] ) { ?>
                  <p class="eye"><i class="fas fa-eye"></i><?php the_views(); ?>بازدید</p>
                  <?php } ?>
                  <?php if ( 'yes' === $settings['show_year'] ) { ?>
                  <p class="year"><?php echo get_the_date('d F Y'); ?></p>
                  <?php } ?>
                </div>
                </div>
              </div>
              <?php if ( 'yes' === $settings['show_hr'] ) {
                ?>
              <hr>
              <?php } ?>
              <?php endwhile; wp_reset_postdata(); ?>
          </div>
        </div>     

    <?php
  }

  protected function _content_template(){
    
  }
}