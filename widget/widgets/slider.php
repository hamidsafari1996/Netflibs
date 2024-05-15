<?php

namespace WPC\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH')) exit; // Exit if accessed directly


class Slider extends Widget_Base{

  public function get_name(){
    return 'slider';
  }

  public function get_title(){
    return 'اسلایدر';
  }

  public function get_icon(){
    return 'eicon-slides';
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
    $repeater = new \Elementor\Repeater();
    $repeater->add_control(
        'image_logo',
        [
            'label' => __( 'تصویر رویه اسلایدر', 'plugin-domain' ),
            'type' => \Elementor\Controls_Manager::MEDIA,
            'default' => [
                'url' => \Elementor\Utils::get_placeholder_image_src(),
            ],
        ]
    );
    $repeater->add_control(
			'time_title', [
				'label' => __( 'مدت فیلم', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'List Title' , 'plugin-domain' ),
				'label_block' => true,
			]
		);
    $repeater->add_control(
			'imdb_title', [
				'label' => __( 'امتیاز فیلم', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'List Title' , 'plugin-domain' ),
				'label_block' => true,
			]
		);
    $repeater->add_control(
      'url_imdb',
      [
        'label' => 'لینک امتیاز',
        'type' => \Elementor\Controls_Manager::URL,
        'placeholder' => __( 'https://your-link.com', 'plugin-domain' ),
          'show_external' => true,
          'default' => [
            'url' => '',
            'is_external' => true,
            'nofollow' => true,
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
				'label' => __( 'متن', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'default' => __( 'List Content' , 'plugin-domain' ),
				'show_label' => false,
			]
		);

		$repeater->add_control(
			'image',
			[
				'label' => __( 'تصویر', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);
    $repeater->add_control(
			'buttom_title', [
				'label' => __( 'عنوان دکمه', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'List Title' , 'plugin-domain' ),
				'label_block' => true,
			]
		);
    $repeater->add_control(
      'url_buttom',
      [
        'label' => 'لینک دکمه',
        'type' => \Elementor\Controls_Manager::URL,
        'placeholder' => __( 'https://your-link.com', 'plugin-domain' ),
          'show_external' => true,
          'default' => [
            'url' => '',
            'is_external' => true,
            'nofollow' => true,
          ],
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
						'list_title' => __( 'Title #1', 'plugin-domain' ),
						'list_content' => __( 'Item content. Click the edit button to change this text.', 'plugin-domain' ),
					],
					[
						'list_title' => __( 'Title #2', 'plugin-domain' ),
						'list_content' => __( 'Item content. Click the edit button to change this text.', 'plugin-domain' ),
					],
				],
				'title_field' => '{{{ list_title }}}',
			]
		);
        $this->add_control(
            'show_img',
            [
                'label' => __( 'تصویر رویه اسلایدر', 'plugin-domain' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Show', 'your-plugin' ),
                'label_off' => __( 'Hide', 'your-plugin' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
          );
    $this->add_control(
      'show_time',
      [
          'label' => __( 'نمایش مدت زمان فیلم', 'plugin-domain' ),
          'type' => \Elementor\Controls_Manager::SWITCHER,
          'label_on' => __( 'Show', 'your-plugin' ),
          'label_off' => __( 'Hide', 'your-plugin' ),
          'return_value' => 'yes',
          'default' => 'yes',
      ]
    );
    $this->add_control(
      'show_imDb',
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
      'show_desc',
      [
          'label' => __( 'نمایش توضیح', 'plugin-domain' ),
          'type' => \Elementor\Controls_Manager::SWITCHER,
          'label_on' => __( 'Show', 'your-plugin' ),
          'label_off' => __( 'Hide', 'your-plugin' ),
          'return_value' => 'yes',
          'default' => 'yes',
      ]
    );
    $this->add_control(
      'show_buttom',
      [
          'label' => __( 'نمایش دکمه', 'plugin-domain' ),
          'type' => \Elementor\Controls_Manager::SWITCHER,
          'label_on' => __( 'Show', 'your-plugin' ),
          'label_off' => __( 'Hide', 'your-plugin' ),
          'return_value' => 'yes',
          'default' => 'yes',
      ]
    );
    $this->add_control(
      'show_arrows',
      [
          'label' => __( 'نمایش دکمه‌های کنار', 'plugin-domain' ),
          'type' => \Elementor\Controls_Manager::SWITCHER,
          'label_on' => __( 'Show', 'your-plugin' ),
          'label_off' => __( 'Hide', 'your-plugin' ),
          'return_value' => 'yes',
          'default' => 'yes',
      ]
    );
    $this->add_control(
      'show_corres',
      [
          'label' => __( 'نمایش دکمه‌های اسلاید', 'plugin-domain' ),
          'type' => \Elementor\Controls_Manager::SWITCHER,
          'label_on' => __( 'Show', 'your-plugin' ),
          'label_off' => __( 'Hide', 'your-plugin' ),
          'return_value' => 'yes',
          'default' => 'yes',
      ]
    );
    $this->add_control(
      'fade',
      [
          'label' => __( 'حالت اسلاید', 'plugin-domain' ),
          'type' => \Elementor\Controls_Manager::SELECT,
          'default' => 'slid',
          'options' => [
              'slid'  => __( 'حالت اسلایدر', 'plugin-domain' ),
              'carousel-fade' => __( 'حالت فید', 'plugin-domain' ),
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
          '{{WRAPPER}} .carousel-caption' => 'text-align: {{VALUE}};',
        ],
      ]
  );
  $this->add_control(
    'icon_right',
    [
        'label' => __( 'آیکون سمت راست', 'text-domain' ),
        'type' => \Elementor\Controls_Manager::ICONS,
        'default' => [
            'value' => 'fas fa-chevron-right',
            'library' => 'solid',
        ],
    ]
    );
    $this->add_control(
        'icon_left',
        [
            'label' => __( 'آیکون سمت چپ', 'text-domain' ),
            'type' => \Elementor\Controls_Manager::ICONS,
            'default' => [
                'value' => 'fas fa-chevron-left',
                'library' => 'solid',
            ],
        ]
    );
    $this->end_controls_section();
    $this->start_controls_section(
      'section_button_style',
      [
      'label' => __( 'تنظیمات عمومی', 'elementor' ),
      'tab' => Controls_Manager::TAB_STYLE,
      ]
    );
  $this->add_responsive_control(
    'border_radius',
    [
        'label' => __( 'گوشه‌های مدور', 'elementor' ),
        'type' => Controls_Manager::DIMENSIONS,
        'size_units' => [ 'px', '%' ],
        'selectors' => [
            '{{WRAPPER}} .slide .carousel-inner' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
    ]
  );
  $this->add_group_control(
    \Elementor\Group_Control_Box_Shadow::get_type(),
    [
        'name' => 'box_right_buttom',
        'label' => __( 'باکس شدوو', 'plugin-domain' ),
        'selector' => '{{WRAPPER}} .slide .carousel-inner',
    ]
  );
  $this->add_control(
    'more_options',
    [
        'label' => __( 'جایگاه محتوا', 'plugin-name' ),
        'type' => \Elementor\Controls_Manager::HEADING,
        'separator' => 'before',
    ]
    );
    $this->add_responsive_control(
        'top_left_content',
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
                '{{WRAPPER}} .slide .carousel-item .carousel-caption' => 'top: {{SIZE}}{{UNIT}};',
            ],
        ]
    );
      $this->add_responsive_control(
        'right_left_content',
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
                '{{WRAPPER}} .slide .carousel-item .carousel-caption' => 'right: {{SIZE}}{{UNIT}};',
            ],
        ]
      );
      $this->add_responsive_control(
        'bottom_left_content',
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
                '{{WRAPPER}} .slide .carousel-item .carousel-caption' => 'bottom: {{SIZE}}{{UNIT}};',
            ],
        ]
      );
      $this->add_responsive_control(
        'left_left_content',
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
                '{{WRAPPER}} .slide .carousel-item .carousel-caption' => 'left: {{SIZE}}{{UNIT}};',
            ],
        ]
      );
  $this->end_controls_section();
  $this->start_controls_section(
    'section_image_logo',
    [
    'label' => __( 'تنظیمات تصویر رویه', 'elementor' ),
    'tab' => Controls_Manager::TAB_STYLE,
    ]
  );

  $this->add_responsive_control(
    'width_image',
    [
        'label' => __( 'عرض', 'elementor' ),
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
            '{{WRAPPER}} .carousel-inner .carousel-item .carousel-caption img.image-logo' => 'width: {{SIZE}}{{UNIT}} !important;',
        ],
    ]
  );
  $this->add_responsive_control(
    'height_image',
    [
        'label' => __( 'ارتفاع', 'elementor' ),
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
            '{{WRAPPER}} .carousel-inner .carousel-item .carousel-caption img.image-logo' => 'height: {{SIZE}}{{UNIT}} !important;',
        ],
    ]
  );
  $this->add_responsive_control(
    'margin_logo',
    [
        'label' => __( 'فاصله', 'elementor' ),
        'type' => Controls_Manager::DIMENSIONS,
        'size_units' => [ 'px', '%' ],
        'selectors' => [
            '{{WRAPPER}} .carousel-inner .carousel-item .carousel-caption img.image-logo' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
    ]
  );
  $this->add_responsive_control(
    'padding_logo',
    [
        'label' => __( 'پدینگ', 'elementor' ),
        'type' => Controls_Manager::DIMENSIONS,
        'size_units' => [ 'px', '%' ],
        'selectors' => [
            '{{WRAPPER}} .carousel-inner .carousel-item .carousel-caption img.image-logo' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
    ]
  );
  $this->add_responsive_control(
    'border_radius_logo',
    [
        'label' => __( 'گوشه مدور', 'elementor' ),
        'type' => Controls_Manager::DIMENSIONS,
        'size_units' => [ 'px', '%' ],
        'selectors' => [
            '{{WRAPPER}} .carousel-inner .carousel-item .carousel-caption img.image-logo' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
    ]
  );
  $this->add_control(
    'background_logo',
    [
        'label' => __( 'رنگ پس زمینه', 'plugin-domain' ),
        'type' => Controls_Manager::COLOR,
        'default' => '',
        'selectors' => [
            '{{WRAPPER}} .carousel-inner .carousel-item .carousel-caption img.image-logo' => 'background: {{VALUE}}',
        ],
    ]
  );
  $this->add_group_control(
    \Elementor\Group_Control_Box_Shadow::get_type(),
    [
        'name' => 'box_shadow_logo',
        'label' => __( 'باکس شدوو', 'plugin-domain' ),
        'selector' => '{{WRAPPER}} .carousel-inner .carousel-item .carousel-caption img.image-logo',
    ]
    );
  $this->end_controls_section();
  $this->start_controls_section(
    'time_button_style',
    [
    'label' => __( 'تنظیمات مدت زمان نمایش', 'elementor' ),
    'tab' => Controls_Manager::TAB_STYLE,
    ]
  );
  $this->add_responsive_control(
    'margin_time',
    [
        'label' => __( 'فاصله', 'elementor' ),
        'type' => Controls_Manager::DIMENSIONS,
        'size_units' => [ 'px', '%' ],
        'selectors' => [
            '{{WRAPPER}} .carousel-inner .carousel-caption p.card-subtitl span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
    ]
  );
  $this->add_responsive_control(
    'padding_time',
    [
        'label' => __( 'پدینگ', 'elementor' ),
        'type' => Controls_Manager::DIMENSIONS,
        'size_units' => [ 'px', '%' ],
        'selectors' => [
            '{{WRAPPER}} .carousel-inner .carousel-caption p.card-subtitl span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
    ]
  );
  $this->add_responsive_control(
    'border_radius_time',
    [
        'label' => __( 'گوشه مدور', 'elementor' ),
        'type' => Controls_Manager::DIMENSIONS,
        'size_units' => [ 'px', '%' ],
        'selectors' => [
            '{{WRAPPER}} .carousel-inner .carousel-caption p.card-subtitl span' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
    ]
  );
  $this->add_control(
    'background_time',
    [
        'label' => __( 'رنگ پس زمینه', 'plugin-domain' ),
        'type' => Controls_Manager::COLOR,
        'default' => '',
        'selectors' => [
            '{{WRAPPER}} .carousel-inner .carousel-caption p.card-subtitl span' => 'background: {{VALUE}}',
        ],
    ]
  );
  $this->add_control(
    'color_time',
    [
        'label' => __( 'رنگ متن', 'plugin-domain' ),
        'type' => Controls_Manager::COLOR,
        'default' => '',
        'selectors' => [
            '{{WRAPPER}} .carousel-inner .carousel-caption p.card-subtitl span' => 'color: {{VALUE}}',
        ],
    ]
  );
  $this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    [
        'name' => 'time_typography',
        'label' => __( 'تایپوگرافی مدت زمان فیلم', 'plugin-domain' ),
        'selector' => '{{WRAPPER}} .carousel-inner .carousel-caption p.card-subtitl span',
    ]
  );
  $this->end_controls_section();
  $this->start_controls_section(
    'imDB_button_style',
    [
    'label' => __( 'تنظیمات امتیاز', 'elementor' ),
    'tab' => Controls_Manager::TAB_STYLE,
    ]
  );
  $this->add_responsive_control(
    'margin_imDB',
    [
        'label' => __( 'فاصله', 'elementor' ),
        'type' => Controls_Manager::DIMENSIONS,
        'size_units' => [ 'px', '%' ],
        'selectors' => [
            '{{WRAPPER}} .carousel-inner .carousel-caption p a span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
    ]
  );
  $this->add_responsive_control(
    'padding_imDB',
    [
        'label' => __( 'پدینگ', 'elementor' ),
        'type' => Controls_Manager::DIMENSIONS,
        'size_units' => [ 'px', '%' ],
        'selectors' => [
            '{{WRAPPER}} .carousel-inner .carousel-caption p a span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
    ]
  );
  $this->add_responsive_control(
    'border_radius_imDB',
    [
        'label' => __( 'گوشه مدور', 'elementor' ),
        'type' => Controls_Manager::DIMENSIONS,
        'size_units' => [ 'px', '%' ],
        'selectors' => [
            '{{WRAPPER}} .carousel-inner .carousel-caption p a span' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
    ]
  );
  $this->add_control(
    'background_imDB',
    [
        'label' => __( 'رنگ پس زمینه', 'plugin-domain' ),
        'type' => Controls_Manager::COLOR,
        'default' => '',
        'selectors' => [
            '{{WRAPPER}} .carousel-inner .carousel-caption p a span' => 'background: {{VALUE}}',
        ],
    ]
  );
  $this->add_control(
    'color_imDB',
    [
        'label' => __( 'رنگ متن', 'plugin-domain' ),
        'type' => Controls_Manager::COLOR,
        'default' => '',
        'selectors' => [
            '{{WRAPPER}} .carousel-inner .carousel-caption p a span' => 'color: {{VALUE}}',
        ],
    ]
  );
  $this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    [
        'name' => 'imDB_typography',
        'label' => __( 'تایپوگرافی امتیاز', 'plugin-domain' ),
        'selector' => '{{WRAPPER}} .carousel-inner .carousel-caption p a span',
    ]
  );
  $this->end_controls_section();
  $this->start_controls_section(
    'title_button_style',
    [
    'label' => __( 'تنظیمات عنوان', 'elementor' ),
    'tab' => Controls_Manager::TAB_STYLE,
    ]
  );
  $this->add_responsive_control(
    'margin_title',
    [
        'label' => __( 'فاصله', 'elementor' ),
        'type' => Controls_Manager::DIMENSIONS,
        'size_units' => [ 'px', '%' ],
        'selectors' => [
            '{{WRAPPER}} .carousel-inner .carousel-caption h2 span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
    ]
  );
  $this->add_responsive_control(
    'padding_title',
    [
        'label' => __( 'پدینگ', 'elementor' ),
        'type' => Controls_Manager::DIMENSIONS,
        'size_units' => [ 'px', '%' ],
        'selectors' => [
            '{{WRAPPER}} .carousel-inner .carousel-caption h2 span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
    ]
  );
  $this->add_responsive_control(
    'border_radius_title',
    [
        'label' => __( 'گوشه مدور', 'elementor' ),
        'type' => Controls_Manager::DIMENSIONS,
        'size_units' => [ 'px', '%' ],
        'selectors' => [
            '{{WRAPPER}} .carousel-inner .carousel-caption h2 span' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
    ]
  );
  $this->add_control(
    'background_title',
    [
        'label' => __( 'رنگ پس زمینه', 'plugin-domain' ),
        'type' => Controls_Manager::COLOR,
        'default' => '',
        'selectors' => [
            '{{WRAPPER}} .carousel-inner .carousel-caption h2 span' => 'background: {{VALUE}}',
        ],
    ]
  );
  $this->add_control(
    'color_title',
    [
        'label' => __( 'رنگ متن', 'plugin-domain' ),
        'type' => Controls_Manager::COLOR,
        'default' => '',
        'selectors' => [
            '{{WRAPPER}} .carousel-inner .carousel-caption h2 span' => 'color: {{VALUE}}',
        ],
    ]
  );
  $this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    [
        'name' => 'title_typography',
        'label' => __( 'تایپوگرافی عنوان', 'plugin-domain' ),
        'selector' => '{{WRAPPER}} .carousel-inner .carousel-caption h2 span',
    ]
  );
  $this->end_controls_section();
  $this->start_controls_section(
    'desc_button_style',
    [
    'label' => __( 'تنظیمات متن', 'elementor' ),
    'tab' => Controls_Manager::TAB_STYLE,
    ]
  );
  $this->add_responsive_control(
    'margin_desc',
    [
        'label' => __( 'فاصله', 'elementor' ),
        'type' => Controls_Manager::DIMENSIONS,
        'size_units' => [ 'px', '%' ],
        'selectors' => [
            '{{WRAPPER}} .carousel-inner .carousel-caption .pharagraph p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
    ]
  );
  $this->add_responsive_control(
    'padding_desc',
    [
        'label' => __( 'پدینگ', 'elementor' ),
        'type' => Controls_Manager::DIMENSIONS,
        'size_units' => [ 'px', '%' ],
        'selectors' => [
            '{{WRAPPER}} .carousel-inner .carousel-caption .pharagraph p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
    ]
  );
  $this->add_responsive_control(
    'border_radius_desc',
    [
        'label' => __( 'گوشه مدور', 'elementor' ),
        'type' => Controls_Manager::DIMENSIONS,
        'size_units' => [ 'px', '%' ],
        'selectors' => [
            '{{WRAPPER}} .carousel-inner .carousel-caption .pharagraph p' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
    ]
  );
  $this->add_control(
    'background_desc',
    [
        'label' => __( 'رنگ پس زمینه', 'plugin-domain' ),
        'type' => Controls_Manager::COLOR,
        'default' => '',
        'selectors' => [
            '{{WRAPPER}} .carousel-inner .carousel-caption .pharagraph p' => 'background: {{VALUE}}',
        ],
    ]
  );
  $this->add_control(
    'color_desc',
    [
        'label' => __( 'رنگ متن', 'plugin-domain' ),
        'type' => Controls_Manager::COLOR,
        'default' => '',
        'selectors' => [
            '{{WRAPPER}} .carousel-inner .carousel-caption .pharagraph p' => 'color: {{VALUE}}',
        ],
    ]
  );
  $this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    [
        'name' => 'desc_typography',
        'label' => __( 'تایپوگرافی متن', 'plugin-domain' ),
        'selector' => '{{WRAPPER}} .carousel-inner .carousel-caption .pharagraph p',
    ]
  );
  $this->end_controls_section();
  $this->start_controls_section(
    'button_style',
    [
    'label' => __( 'تنظیمات دکمه', 'elementor' ),
    'tab' => Controls_Manager::TAB_STYLE,
    ]
  );
  $this->add_responsive_control(
    'width_button',
    [
        'label' => __( 'عرض دکمه', 'elementor' ),
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
            '{{WRAPPER}} .carousel-inner .carousel-caption a.btn' => 'width: {{SIZE}}{{UNIT}};',
        ],
    ]
  );
  $this->add_control(
    'type_buttom_style',
    [
        'label' => __( 'طرح دکمه', 'plugin-domain' ),
        'type' => \Elementor\Controls_Manager::SELECT,
        'default' => 'btn-primary',
        'options' => [
            'btn-primary'  => __( 'primary', 'plugin-domain' ),
            'btn-secondary' => __( 'secondary', 'plugin-domain' ),
            'btn-success' => __( 'success', 'plugin-domain' ),
            'btn-danger' => __( 'danger', 'plugin-domain' ),
            'btn-warning' => __( 'warning', 'plugin-domain' ),
            'btn-info' => __( 'info', 'plugin-domain' ),
            'btn-light' => __( 'light', 'plugin-domain' ),
            'btn-dark' => __( 'dark', 'plugin-domain' ),
            'btn-link' => __( 'link', 'plugin-domain' ),
            'btn-outline-primary' => __( 'outline-primary', 'plugin-domain' ),
            'btn-outline-secondary' => __( 'outline-secondary', 'plugin-domain' ),
            'btn-outline-success' => __( 'outline-success', 'plugin-domain' ),
            'btn-outline-danger' => __( 'outline-danger', 'plugin-domain' ),
            'btn-outline-warning' => __( 'outline-warning', 'plugin-domain' ),
            'btn-outline-info' => __( 'outline-info', 'plugin-domain' ),
            'btn-outline-light' => __( 'outline-light', 'plugin-domain' ),
            'btn-outline-dark' => __( 'outline-dark', 'plugin-domain' ),
        ],
    ]
  );
  $this->add_control(
    'round_buttom_style',
    [
        'label' => __( 'گوشه‌های مدور', 'plugin-domain' ),
        'type' => \Elementor\Controls_Manager::SELECT,
        'default' => 'rounded',
        'options' => [
            'rounded'  => __( 'rounded', 'plugin-domain' ),
            'rounded-top' => __( 'rounded-top', 'plugin-domain' ),
            'rounded-right' => __( 'rounded-right', 'plugin-domain' ),
            'rounded-bottom' => __( 'rounded-bottom', 'plugin-domain' ),
            'rounded-left' => __( 'rounded-left', 'plugin-domain' ),
            'rounded-circle' => __( 'rounded-circle', 'plugin-domain' ),
            'rounded-pill' => __( 'rounded-pill', 'plugin-domain' ),
            'rounded-none' => __( 'هیچ', 'plugin-domain' ),
        ],
    ]
  );
  $this->add_responsive_control(
    'margin_button',
    [
        'label' => __( 'فاصله', 'elementor' ),
        'type' => Controls_Manager::DIMENSIONS,
        'size_units' => [ 'px', '%' ],
        'selectors' => [
            '{{WRAPPER}} .carousel-inner .carousel-caption a.btn' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
            '{{WRAPPER}} .carousel-inner .carousel-caption a.btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
    ]
  );
  $this->add_responsive_control(
    'border_radius_button',
    [
        'label' => __( 'گوشه مدور', 'elementor' ),
        'type' => Controls_Manager::DIMENSIONS,
        'size_units' => [ 'px', '%' ],
        'selectors' => [
            '{{WRAPPER}} .carousel-inner .carousel-caption a.btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
    ]
  );
  $this->add_control(
    'background_button',
    [
        'label' => __( 'رنگ پس زمینه', 'plugin-domain' ),
        'type' => Controls_Manager::COLOR,
        'default' => '',
        'selectors' => [
            '{{WRAPPER}} .carousel-inner .carousel-caption a.btn' => 'background: {{VALUE}}',
        ],
    ]
  );
  $this->add_control(
    'background_button-hover',
    [
        'label' => __( 'هاور پس زمینه', 'plugin-domain' ),
        'type' => Controls_Manager::COLOR,
        'default' => '',
        'selectors' => [
            '{{WRAPPER}} .carousel-inner .carousel-caption a.btn:hover' => 'background: {{VALUE}}',
        ],
    ]
  );
  $this->add_control(
    'color_button',
    [
        'label' => __( 'رنگ متن', 'plugin-domain' ),
        'type' => Controls_Manager::COLOR,
        'default' => '',
        'selectors' => [
            '{{WRAPPER}} .carousel-inner .carousel-caption a.btn' => 'color: {{VALUE}}',
        ],
    ]
  );

  $this->add_control(
    'color_button-hover',
    [
        'label' => __( 'هاور متن', 'plugin-domain' ),
        'type' => Controls_Manager::COLOR,
        'default' => '',
        'selectors' => [
            '{{WRAPPER}} .carousel-inner .carousel-caption a.btn:hover' => 'color: {{VALUE}}',
        ],
    ]
  );
  $this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    [
        'name' => 'button_typography',
        'label' => __( 'تایپوگرافی دکمه', 'plugin-domain' ),
        'selector' => '{{WRAPPER}} .carousel-inner .carousel-caption a.btn',
    ]
  );
  $this->add_group_control(
    \Elementor\Group_Control_Box_Shadow::get_type(),
    [
        'name' => 'box_shadow',
        'label' => __( 'باکس شدوو', 'plugin-domain' ),
        'selector' => '{{WRAPPER}} .carousel-inner .carousel-caption a.btn',
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
    'border_style_icon',
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
            '{{WRAPPER}} .carousel-inner .carousel-caption a.btn' => 'border-style: {{VALUE}}',
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
            '{{WRAPPER}} .carousel-inner .carousel-caption a.btn' => 'border-width: {{SIZE}}{{UNIT}};',
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
              '{{WRAPPER}} .carousel-inner .carousel-caption a.btn' => 'border-color: {{VALUE}}',
          ],
      ]
  );
  $this->add_control(
    'icon',
    [
      'label' => __( 'Icon', 'text-domain' ),
      'type' => \Elementor\Controls_Manager::ICONS,
      'default' => [
        'value' => 'fas fa-play',
        'library' => 'solid',
      ],
    ]
  );
  $this->add_responsive_control(
    'margin_right',
    [
        'label' => __( 'فاصله آیکون تا متن', 'elementor' ),
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
            '{{WRAPPER}} .carousel-inner .carousel-caption a.btn svg' => 'margin-left: {{SIZE}}{{UNIT}};',
        ],
    ]
  );
  $this->end_controls_section();
  $this->start_controls_section(
    'arrows_button_style',
    [
    'label' => __( 'تنظیمات دکمه‌های کنار', 'elementor' ),
    'tab' => Controls_Manager::TAB_STYLE,
    ]
  );
  $this->add_responsive_control(
    'margin_arrows',
    [
        'label' => __( 'فاصله', 'elementor' ),
        'type' => Controls_Manager::DIMENSIONS,
        'size_units' => [ 'px', '%' ],
        'selectors' => [
            '{{WRAPPER}} .slide a span.arrow-left, .slide a span.arrow-right' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
    ]
  );
  $this->add_responsive_control(
    'padding_arrows',
    [
        'label' => __( 'پدینگ', 'elementor' ),
        'type' => Controls_Manager::DIMENSIONS,
        'size_units' => [ 'px', '%' ],
        'selectors' => [
            '{{WRAPPER}} .slide a span.arrow-left, .slide a span.arrow-right' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
    ]
  );
  $this->add_responsive_control(
    'border_radius_arrows',
    [
        'label' => __( 'گوشه مدور', 'elementor' ),
        'type' => Controls_Manager::DIMENSIONS,
        'size_units' => [ 'px', '%' ],
        'selectors' => [
            '{{WRAPPER}} .slide a span.arrow-left, .slide a span.arrow-right' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
    ]
  );
  $this->add_control(
    'background_arrows',
    [
        'label' => __( 'رنگ پس زمینه', 'plugin-domain' ),
        'type' => Controls_Manager::COLOR,
        'default' => '',
        'selectors' => [
            '{{WRAPPER}} .slide a span.arrow-left, .slide a span.arrow-right' => 'background-color: {{VALUE}}',
        ],
    ]
  );
  $this->add_control(
    'color_arrows',
    [
        'label' => __( 'رنگ آیکون', 'plugin-domain' ),
        'type' => Controls_Manager::COLOR,
        'default' => '',
        'selectors' => [
            '{{WRAPPER}} .slide a span.arrow-left svg, .slide a span.arrow-right svg' => 'color: {{VALUE}}',
        ],
    ]
  );
  $this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    [
        'name' => 'icon_typography',
        'label' => __( 'تایپوگرافی آیکون', 'plugin-domain' ),
        'selector' => '{{WRAPPER}} .slide a span.arrow-left svg, .slide a span.arrow-right svg',
    ]
  );
  $this->add_control(
    'more_right_arrow',
    [
      'label' => __( 'دکمه سمت راست', 'plugin-name' ),
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
            '{{WRAPPER}} .carousel-control-next' => 'top: {{SIZE}}{{UNIT}};',
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
            '{{WRAPPER}} .carousel-control-next' => 'right: {{SIZE}}{{UNIT}};',
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
            '{{WRAPPER}} .carousel-control-next' => 'bottom: {{SIZE}}{{UNIT}};',
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
            '{{WRAPPER}} .carousel-control-next' => 'left: {{SIZE}}{{UNIT}};',
        ],
    ]
  );
  $this->add_control(
    'more_left_arrow',
    [
      'label' => __( 'دکمه سمت راست', 'plugin-name' ),
      'type' => \Elementor\Controls_Manager::HEADING,
      'separator' => 'before',
    ]
  );
  $this->add_responsive_control(
    'top_left',
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
            '{{WRAPPER}} .carousel-control-prev' => 'top: {{SIZE}}{{UNIT}};',
        ],
    ]
);
  $this->add_responsive_control(
    'right_left',
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
            '{{WRAPPER}} .carousel-control-prev' => 'right: {{SIZE}}{{UNIT}};',
        ],
    ]
  );
  $this->add_responsive_control(
    'bottom_left',
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
            '{{WRAPPER}} .carousel-control-prev' => 'bottom: {{SIZE}}{{UNIT}};',
        ],
    ]
  );
  $this->add_responsive_control(
    'left_left',
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
            '{{WRAPPER}} .carousel-control-prev' => 'left: {{SIZE}}{{UNIT}};',
        ],
    ]
  );
  $this->end_controls_section();
  $this->start_controls_section(
    'croser_button_style',
    [
    'label' => __( 'تنظیمات کروسر', 'elementor' ),
    'tab' => Controls_Manager::TAB_STYLE,
    ]
  );
  $this->add_responsive_control(
    'width_crosser',
    [
        'label' => __( 'عرض', 'elementor' ),
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
            '{{WRAPPER}} .carousel-indicators li' => 'width: {{SIZE}}{{UNIT}};',
        ],
    ]
  );
  $this->add_responsive_control(
    'heaght_crosser',
    [
        'label' => __( 'ارتفاع', 'elementor' ),
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
            '{{WRAPPER}} .carousel-indicators li' => 'height: {{SIZE}}{{UNIT}};',
        ],
    ]
  );
  $this->add_responsive_control(
    'padding_crosser',
    [
        'label' => __( 'پدینگ', 'elementor' ),
        'type' => Controls_Manager::DIMENSIONS,
        'size_units' => [ 'px', '%' ],
        'selectors' => [
            '{{WRAPPER}} .carousel-indicators li' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
    ]
  );
  $this->add_responsive_control(
    'border_radius_crosser',
    [
        'label' => __( 'گوشه مدور', 'elementor' ),
        'type' => Controls_Manager::DIMENSIONS,
        'size_units' => [ 'px', '%' ],
        'selectors' => [
            '{{WRAPPER}} .carousel-indicators li' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
    ]
  );
  $this->add_control(
    'background_crosser',
    [
        'label' => __( 'رنگ کروسر', 'plugin-domain' ),
        'type' => Controls_Manager::COLOR,
        'default' => '',
        'selectors' => [
            '{{WRAPPER}} .carousel-indicators li' => 'background-color: {{VALUE}}',
        ],
    ]
  );
  $this->add_control(
    'more_options_crroser',
    [
      'label' => __( 'تنظیم کروسر فعال', 'plugin-name' ),
      'type' => \Elementor\Controls_Manager::HEADING,
      'separator' => 'before',
    ]
  );
  $this->add_responsive_control(
    'width_crosser_active',
    [
        'label' => __( 'عرض', 'elementor' ),
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
            '{{WRAPPER}} .carousel-indicators li.active' => 'width: {{SIZE}}{{UNIT}};',
        ],
    ]
  );
  $this->add_control(
    'background_crosser_active',
    [
        'label' => __( 'رنگ کروسر فعال', 'plugin-domain' ),
        'type' => Controls_Manager::COLOR,
        'default' => '',
        'selectors' => [
            '{{WRAPPER}} .carousel-indicators li.active' => 'background-color: {{VALUE}}',
        ],
    ]
  );
  $this->add_control(
    'more_left_crosser',
    [
      'label' => __( 'جایگاه کروسر', 'plugin-name' ),
      'type' => \Elementor\Controls_Manager::HEADING,
      'separator' => 'before',
    ]
  );
  $this->add_responsive_control(
    'top_left_crosser',
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
            '{{WRAPPER}} .carousel-indicators' => 'top: {{SIZE}}{{UNIT}};',
        ],
    ]
);
  $this->add_responsive_control(
    'right_left_crosser',
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
            '{{WRAPPER}} .carousel-indicators' => 'right: {{SIZE}}{{UNIT}};',
        ],
    ]
  );
  $this->add_responsive_control(
    'bottom_left_crosser',
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
            '{{WRAPPER}} .carousel-indicators' => 'bottom: {{SIZE}}{{UNIT}};',
        ],
    ]
  );
  $this->add_responsive_control(
    'left_left_crosser',
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
            '{{WRAPPER}} .carousel-indicators' => 'left: {{SIZE}}{{UNIT}};',
        ],
    ]
  );
  $this->end_controls_section();
  }
  

  protected function render(){
    $settings = $this->get_settings_for_display();
    ?>
    
    <div id="carouselExampleCaptions" class="carousel slide <?php echo $settings['fade']; ?>" data-ride="carousel">
    <?php
        if ( 'yes' === $settings['show_corres'] ) {
        ?>
  <ol class="carousel-indicators">
  <?php $count=0; if ( $settings['list'] ) { foreach (  $settings['list'] as $item ) { ?>
    <li data-target="#carouselExampleCaptions" data-slide-to="<?php echo $count; ?>" class="<?php $class= $count==0 ? 'active' : ''; echo $class; ?>"></li>
    <?php $count++;
        }
    } ?>
  </ol>
  <?php
        }
        ?>
  <div class="carousel-inner">
  <?php $counter=0; if ( $settings['list'] ) { foreach (  $settings['list'] as $item ) { ?>
    <?php
    $target_url = $item['url_buttom']['is_external'] ? ' target="_blank"' : '';
    $nofollow_url = $item['url_buttom']['nofollow'] ? ' rel="nofollow"' : '';
    ?>
    <div class="carousel-item <?php $class= $counter==0 ? 'active' : ''; echo $class; ?>">
      <img src="<?php echo $item['image']['url']; ?>" class="d-block">
      <div class="carousel-caption">
        <?php
        if ( 'yes' === $settings['show_img'] ) {
        ?>
        <a href="<?php echo $item['url_buttom']['url'] ?>" <?php echo $target_url; ?> <?php echo $nofollow_url; ?>><img src="<?php echo $item['image_logo']['url']; ?>" alt="<?php echo $item['list_title']; ?>" class="image-logo"></a>
        <?php
        }
        ?>
        <?php
        if ( 'yes' === $settings['show_time'] ) {
        ?>
        <p class="card-subtitl d-none d-md-block"><span><?php echo $item['time_title']; ?></span></p>
        <?php
        }
        ?>
        <?php
        $target = $item['url_imdb']['is_external'] ? ' target="_blank"' : '';
        $nofollow = $item['url_imdb']['nofollow'] ? ' rel="nofollow"' : '';
        ?>
        <?php
        if ( 'yes' === $settings['show_imDb'] ) {
        ?>
        <p class="d-none d-sm-block"><a href="<?php echo $item['url_imdb']['url'] ?>" <?php echo $target; ?> <?php echo $nofollow; ?>><span><i class="fab fa-imdb ml-1"></i><?php echo $item['imdb_title']; ?></span></a></p>
        <?php
        }
        ?>
        <?php
        if ( 'yes' === $settings['show_title'] ) {
        ?>
        <h2><span class="title-slid"><?php echo $item['list_title']; ?></span></h2>
        <?php
        }
        ?>
        <?php
        if ( 'yes' === $settings['show_desc'] ) {
        ?>
        <div class="d-none d-md-block pharagraph">
        <?php echo $item['list_content']; ?>
        </div>
        <?php
        }
        ?>
        <?php
        if ( 'yes' === $settings['show_buttom'] ) {
        ?>
        
        <a href="<?php echo $item['url_buttom']['url'] ?>" <?php echo $target_url; ?> <?php echo $nofollow_url; ?> type="button" class="btn <?php echo $settings['type_buttom_style']; ?> <?php echo $settings['round_buttom_style']; ?>"><?php \Elementor\Icons_Manager::render_icon( $settings['icon'], [ 'aria-hidden' => 'true' ] ); ?><?php echo $item['buttom_title']; ?></a>
        <?php
        }
        ?>
      </div>
    </div>
    <?php $counter++;
        }
    } ?>
  </div>
  <?php
        if ( 'yes' === $settings['show_arrows'] ) {
        ?>
  <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
    <span class="arrow-left"><?php \Elementor\Icons_Manager::render_icon( $settings['icon_left'], [ 'aria-hidden' => 'true' ] ); ?></i></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
    <span class="arrow-right"><?php \Elementor\Icons_Manager::render_icon( $settings['icon_right'], [ 'aria-hidden' => 'true' ] ); ?></span>
    <span class="sr-only">Next</span>
  </a>
  <?php
        }
        ?>
</div>
    <?php
  }

  protected function _content_template(){

  }
}