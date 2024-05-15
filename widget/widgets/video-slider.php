<?php

namespace WPC\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH')) exit; // Exit if accessed directly


class Video_slider extends Widget_Base{


    public function __construct ($data = [], $args = null) {
		parent::__construct($data, $args);

		wp_register_script('script_slider-film', get_theme_file_uri('/widget/widgets/video-slider.js'), ['elementor-frontend'], '1.0.0', true);
	}

	public function get_script_depends () {
		return ['script_slider-film'];
	}



  public function get_name(){
    return 'video-slider';
  }

  public function get_title(){
    return 'اسلایدر فیلم';
  }

  public function get_icon(){
    return 'eicon-media-carousel';
  }

  public function get_categories(){
    return ['tree-category'];
  }

  protected function _register_controls(){
    $this->start_controls_section(
        'section_modal_content',
        [
            'label' => __( 'تنظیمات محتوا', 'elementor' ),
        ]
    );
      
    $repeater = new \Elementor\Repeater();
    $repeater->add_control(
        'select_yolink', [
            'label'   => 'بارگذاری از',
            'type'    => \Elementor\Controls_Manager::SELECT,
            'default' => 'yourhost',
            'options' => [
                'yourhost' => 'از هاست شخصی',
                'eombd' => 'کد امبد',
        ],
    ]);
    $repeater->add_control(
        'website_link',
        [
            'label' => __( 'لینک ویدیو', 'plugin-domain' ),
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
        'subtitle_link',
        [
            'label' => __( 'لینک زیرنویس', 'plugin-domain' ),
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
    'merge', [
        'label'   => 'اندازه ویدیو',
        'type'    => \Elementor\Controls_Manager::SELECT,
        'default' => '2',
        'options' => [
            '2' => '2',
            '3' => '3',
            '4' => '4',
        ],
    ]);
    $repeater->add_control(
		'img_movie',
		[
		    'label' => 'بارگذاری تصویر ویدیو',
            'type' => \Elementor\Controls_Manager::MEDIA,
            'default' => [
                'url' => \Elementor\Utils::get_placeholder_image_src(),
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
                    'website_link' => __( 'https://your-link.com', 'plugin-domain' ),
                    'subtitle_link' => __( 'https://your-link.com', 'plugin-domain' ),
                ],
                [
                    'website_link' => __( 'https://your-link.com', 'plugin-domain' ),
                    'subtitle_link' => __( 'https://your-link.com', 'plugin-domain' ),
                ],
            ],
            'title_field' => '{{{ website_link }}}',
        ]
    );
  

  $this->end_controls_section();
  $this->start_controls_section(
    'section_option_pro',
    [
        'label' => __( 'تنظیمات', 'elementor' ),
    ]
);

$this->add_control(
    'show_arrow',
    [
        'label' => __( 'نمایش دکمه‌های کنار در دسکتاپ', 'plugin-domain' ),
        'type' => \Elementor\Controls_Manager::SWITCHER,
        'label_on' => __( 'Show', 'your-plugin' ),
        'label_off' => __( 'Hide', 'your-plugin' ),
        'return_value' => 'yes',
        'default' => 'yes',
    ]
);
$this->add_control(
    'show_arrow_tablet',
    [
        'label' => __( 'نمایش دکمه‌های کنار در تبلت', 'plugin-domain' ),
        'type' => \Elementor\Controls_Manager::SWITCHER,
        'label_on' => __( 'Show', 'your-plugin' ),
        'label_off' => __( 'Hide', 'your-plugin' ),
        'return_value' => 'yes',
        'default' => 'yes',
    ]
);
$this->add_control(
    'show_arrow_phone',
    [
        'label' => __( 'نمایش دکمه‌های کنار در موبایل', 'plugin-domain' ),
        'type' => \Elementor\Controls_Manager::SWITCHER,
        'label_on' => __( 'Show', 'your-plugin' ),
        'label_off' => __( 'Hide', 'your-plugin' ),
        'return_value' => 'yes',
        'default' => 'yes',
    ]
);
$this->add_control(
    'show_dots',
    [
        'label' => __( 'نمایش دکمه‌های زیر در دسکتاپ', 'plugin-domain' ),
        'type' => \Elementor\Controls_Manager::SWITCHER,
        'label_on' => __( 'Show', 'your-plugin' ),
        'label_off' => __( 'Hide', 'your-plugin' ),
        'return_value' => 'yes',
        'default' => 'yes',
    ]
);
$this->add_control(
    'show_dots_tablet',
    [
        'label' => __( 'نمایش دکمه‌های زیر در تبلت', 'plugin-domain' ),
        'type' => \Elementor\Controls_Manager::SWITCHER,
        'label_on' => __( 'Show', 'your-plugin' ),
        'label_off' => __( 'Hide', 'your-plugin' ),
        'return_value' => 'yes',
        'default' => 'yes',
    ]
);
$this->add_control(
    'show_dots_phone',
    [
        'label' => __( 'نمایش دکمه‌های زیر در موبایل', 'plugin-domain' ),
        'type' => \Elementor\Controls_Manager::SWITCHER,
        'label_on' => __( 'Show', 'your-plugin' ),
        'label_off' => __( 'Hide', 'your-plugin' ),
        'return_value' => 'yes',
        'default' => 'yes',
    ]
);
$this->add_control(
    'show_center',
    [
        'label' => __( 'نمایش وسط', 'plugin-domain' ),
        'type' => \Elementor\Controls_Manager::SWITCHER,
        'label_on' => __( 'Show', 'your-plugin' ),
        'label_off' => __( 'Hide', 'your-plugin' ),
        'return_value' => 'yes',
        'default' => 'yes',
    ]
);
$this->add_control('widget_post_num_th', [
    'label'   => 'تعداد نمایش آیتم در(دسکتاپ)',
    'type'    => \Elementor\Controls_Manager::SELECT,
    'default' => '4',
    'options' => [
        '1' => '1',
        '2' => '2',
        '3' => '3',
        '4' => '4',
        '5' => '5',
        '6' => '6',
        '7' => '7',
        '8' => '8',
        '9' => '9',

    ],
]);



$this->add_control('loop-car-slider', [
    'label'   => 'حالت بی نهایت',
    'type'    => \Elementor\Controls_Manager::SWITCHER,
    'default' => 'yes',

]);

$this->add_control('autoplay-car-slider', [
    'label'   => 'پخش خودکار',
    'type'    => \Elementor\Controls_Manager::SWITCHER,
    'default' => 'yes',

]);


    $this->end_controls_section();
    $this->start_controls_section(
        'section_video_style',
        [
            'label' => __( 'استایل عمومی', 'elementor' ),
            'tab' => Controls_Manager::TAB_STYLE,
        ]
);
$this->add_responsive_control(
        'height',
        [
            'label' => __( 'ارتفاع', 'elementor' ),
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
                '{{WRAPPER}} .video-slider-section .item-video' => 'height: {{SIZE}}{{UNIT}} !important;',
            ],
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
    'button_color',
    [
        'label' => __( 'رنگ', 'plugin-domain' ),
        'type' => Controls_Manager::COLOR,
        'default' => '',
        'selectors' => [
            '{{WRAPPER}} .video-slider-section .plyr__controls button, .video-slider-section .plyr__play-large' => 'color: {{VALUE}}',
        ],
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
    'button_color_hover',
    [
        'label' => __( 'رنگ', 'plugin-domain' ),
        'type' => Controls_Manager::COLOR,
        'default' => '',
        'selectors' => [
            '{{WRAPPER}} .video-slider-section .plyr--audio .plyr__controls button.tab-focus:focus,.video-slider-section .plyr--audio .plyr__controls button:hover, .video-slider-section .plyr__play-large, .plyr__progress--played, .video-slider-section .plyr .plyr__controls .plyr__volume .plyr__volume--display, .video-slider-section .plyr--video .plyr__controls button:hover' => 'color: {{VALUE}}',
        ],
    ]
);
$this->add_control(
    'button_background',
    [
        'label' => __( 'رنگ پس زمینه', 'plugin-domain' ),
        'type' => Controls_Manager::COLOR,
        'default' => '',
        'selectors' => [
            '{{WRAPPER}} .video-slider-section .plyr--audio .plyr__controls button.tab-focus:focus, .video-slider-section .plyr--audio .plyr__controls button:hover, .video-slider-section .plyr__play-large, .plyr--video .plyr__controls button:hover' => 'background: {{VALUE}}',
        ],
    ]
);
$this->end_controls_tab();
$this->end_controls_tabs();
$this->end_controls_section();
    $this->start_controls_section(
            'section_botton_style',
            [
                  'label' => __( 'تنظیمات دکمه‌های کنار', 'elementor' ),
                  'tab' => Controls_Manager::TAB_STYLE,
            ]
      );
$this->add_control(
    'padding_right_buttom',
    [
        'label' => __( 'پدینگ', 'elementor' ),
        'type' => Controls_Manager::DIMENSIONS,
        'size_units' => [ 'px', '%' ],
        'selectors' => [
            '{{WRAPPER}} .video-slider-netflibs button.owl-next, .video-slider-netflibs button.owl-prev' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
    ]
);
$this->add_control(
    'margin_right_buttom',
    [
        'label' => __( 'فاصله', 'elementor' ),
        'type' => Controls_Manager::DIMENSIONS,
        'size_units' => [ 'px', '%' ],
        'selectors' => [
            '{{WRAPPER}} .video-slider-netflibs button.owl-next, .video-slider-netflibs button.owl-prev' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
    ]
);
$this->add_control(
    'border_right_buttom',
    [
        'label' => __( 'گوشه‌های مدور', 'elementor' ),
        'type' => Controls_Manager::DIMENSIONS,
        'size_units' => [ 'px', '%' ],
        'selectors' => [
            '{{WRAPPER}} .video-slider-netflibs button.owl-next, .video-slider-netflibs button.owl-prev' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
    ]
);
    
    


    $this->start_controls_tabs( 'style-arrow' );
    $this->start_controls_tab(
        'style_arrow',
            [
            'label' => esc_html__( 'عادی', 'elementor' ),
            ]
    );

    $this->add_control(
        'background_right_buttom',
        [
            'label' => __( 'رنگ پس زمینه', 'plugin-domain' ),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .video-slider-netflibs button.owl-next, .video-slider-netflibs button.owl-prev' => 'background: {{VALUE}}',
            ],
        ]
    );
    $this->add_control(
        'color_right_buttom',
        [
            'label' => __( 'رنگ دکمه', 'plugin-domain' ),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .video-slider-netflibs button.owl-next span, .video-slider-netflibs button.owl-prev span' => 'color: {{VALUE}}',
            ],
        ]
    );

    $this->end_controls_tab();
    $this->start_controls_tab(
        'style_arrow_hover',
            [
            'label' => esc_html__( 'هاور', 'elementor' ),
            ]
    );

    $this->add_control(
        'background_right_buttom_hover',
        [
            'label' => __( 'هاور پس زمینه', 'plugin-domain' ),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .video-slider-netflibs button.owl-next:hover, .video-slider-netflibs button.owl-prev:hover' => 'background: {{VALUE}}',
            ],
        ]
    );
    $this->add_control(
        'color_right_buttom_hover',
        [
            'label' => __( 'هاور دکمه', 'plugin-domain' ),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .video-slider-netflibs button.owl-next span:hover, .video-slider-netflibs button.owl-prev span:hover' => 'color: {{VALUE}}',
            ],
        ]
    );

    $this->end_controls_tab();
    $this->end_controls_tabs();

$this->add_group_control(
    \Elementor\Group_Control_Box_Shadow::get_type(),
    [
        'name' => 'box_right_buttom',
        'label' => __( 'باکس شدوو', 'plugin-domain' ),
        'selector' => '{{WRAPPER}} .video-slider-netflibs button.owl-next, .video-slider-netflibs button.owl-prev',
    ]
);
$this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    [
        'name' => 'desc_typography',
        'label' => __( 'تایپوگرافی', 'plugin-domain' ),
        'selector' => '{{WRAPPER}} .video-slider-netflibs button.owl-next span, .video-slider-netflibs button.owl-prev span',
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
    'border_style_owl',
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
            '{{WRAPPER}} .video-slider-netflibs button.owl-next, .video-slider-netflibs button.owl-prev' => 'border-style: {{VALUE}}',
        ],
    ]
);
$this->add_responsive_control(
    'width_border_owl',
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
            '{{WRAPPER}} .video-slider-netflibs button.owl-next, .video-slider-netflibs button.owl-prev' => 'border-width: {{SIZE}}{{UNIT}};',
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
            '{{WRAPPER}} .video-slider-netflibs button.owl-next, .video-slider-netflibs button.owl-prev' => 'border-color: {{VALUE}}',
        ],
    ]
);
$this->end_controls_tab();
$this->add_control(
    'more_options_left_arrow',
    [
        'label' => __( 'تنظیمات دکمه سمت چپ', 'plugin-name' ),
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
            '{{WRAPPER}} .video-slider-netflibs button.owl-next' => 'top: {{SIZE}}{{UNIT}};',
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
            '{{WRAPPER}} .video-slider-netflibs button.owl-next' => 'right: {{SIZE}}{{UNIT}};',
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
            '{{WRAPPER}} .video-slider-netflibs button.owl-next' => 'bottom: {{SIZE}}{{UNIT}};',
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
            '{{WRAPPER}} .video-slider-netflibs button.owl-next' => 'left: {{SIZE}}{{UNIT}};',
        ],
    ]
);
/*----left-botton----*/
$this->add_control(
    'more_options_left',
    [
        'label' => __( 'تنظیمات دکمه سمت راست', 'plugin-name' ),
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
            '{{WRAPPER}} .video-slider-netflibs button.owl-prev' => 'top: {{SIZE}}{{UNIT}};',
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
            '{{WRAPPER}} .video-slider-netflibs button.owl-prev' => 'right: {{SIZE}}{{UNIT}};',
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
            '{{WRAPPER}} .video-slider-netflibs button.owl-prev' => 'bottom: {{SIZE}}{{UNIT}};',
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
            '{{WRAPPER}} .video-slider-netflibs button.owl-prev' => 'left: {{SIZE}}{{UNIT}};',
        ],
    ]
);
$this->end_controls_section();
  $this->start_controls_section(
    'section_dots_style',
    [
        'label' => __( 'تنظیمات دکمه‌های زیر', 'elementor' ),
        'tab' => Controls_Manager::TAB_STYLE,
    ]
  );
  $this->add_control(
    'display_ib',
    [
        'label' => __( 'سبک نمایش', 'plugin-domain' ),
        'type' => \Elementor\Controls_Manager::SELECT,
        'default' => 'inline',
        'options' => [
            'inline'  => __( 'افقی', 'plugin-domain' ),
            'block' => __( 'عمودی', 'plugin-domain' ),
        ],
        'selectors' => [
            '{{WRAPPER}} .video-slider-netflibs .owl-dots button.owl-dot' => 'display: {{UNIT}};',
        ],
    ]
);
    $this->start_controls_tabs( 'style-dots' );
    $this->start_controls_tab(
        'style_dots',
            [
            'label' => esc_html__( 'دکمه عادی', 'elementor' ),
            ]
    );

    $this->add_control(
        'border_doct',
        [
            'label' => __( 'گوشه‌های مدور', 'elementor' ),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%' ],
            'selectors' => [
                '{{WRAPPER}} .video-slider-netflibs .owl-dots  button.owl-dot' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]
    );
    $this->add_control(
        'background_doct',
        [
            'label' => __( 'رنگ دکمه', 'plugin-domain' ),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .video-slider-netflibs .owl-dots  button.owl-dot' => 'background: {{VALUE}}',
            ],
        ]
    );
    $this->add_responsive_control(
        'width_dots',
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
                '{{WRAPPER}} .video-slider-netflibs .owl-dots  button.owl-dot' => 'width: {{SIZE}}{{UNIT}};',
            ],
        ]
    );
    $this->add_responsive_control(
        'height_dots',
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
                '{{WRAPPER}} .video-slider-netflibs .owl-dots button.owl-dot' => 'height: {{SIZE}}{{UNIT}};',
            ],
        ]
    );

    $this->end_controls_tab();
    $this->start_controls_tab(
        'style_dots_active',
            [
            'label' => esc_html__( 'دکمه فعال', 'elementor' ),
            ]
    );

    $this->add_control(
        'bg_button_active',
        [
            'label' => __( 'رنگ دکمه فعال', 'plugin-domain' ),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .video-slider-netflibs .owl-dots  button.active' => 'background: {{VALUE}} !important',
            ],
        ]
    );
      $this->add_control(
          'border_doct_active',
          [
              'label' => __( 'گوشه‌های مدور دکمه فعال', 'elementor' ),
              'type' => Controls_Manager::DIMENSIONS,
              'size_units' => [ 'px', '%' ],
              'selectors' => [
                  '{{WRAPPER}} .video-slider-netflibs .owl-dots  button.active' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
              ],
          ]
      );
      $this->add_responsive_control(
          'width_dots_active',
          [
              'label' => __( 'عرض دکمه فعال', 'elementor' ),
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
                  '{{WRAPPER}} .video-slider-netflibs .owl-dots  button.active' => 'width: {{SIZE}}{{UNIT}} !important;',
              ],
          ]
      );
      $this->add_responsive_control(
          'height_dots_active',
          [
              'label' => __( 'ارتفاع دکمه فعال', 'elementor' ),
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
                  '{{WRAPPER}} .video-slider-netflibs .owl-dots  button.active' => 'height: {{SIZE}}{{UNIT}} !important;',
              ],
          ]
      );

      $this->end_controls_tab();
      $this->end_controls_tabs();

  /**---------------------active-------------- */
  
  /*----left-botton----*/
  $this->add_control(
      'more_options_dots',
      [
          'label' => __( 'جایگاه دکمه‌های زیر', 'plugin-name' ),
          'type' => \Elementor\Controls_Manager::HEADING,
          'separator' => 'before',
      ]
  );

  $this->add_responsive_control(
      'top_left_dots',
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
              '{{WRAPPER}} .video-slider-netflibs .owl-dots' => 'top: {{SIZE}}{{UNIT}};',
          ],
      ]
  );
  $this->add_responsive_control(
      'right_left_dots',
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
              '{{WRAPPER}} .video-slider-netflibs .owl-dots' => 'right: {{SIZE}}{{UNIT}};',
          ],
      ]
  );
  $this->add_responsive_control(
      'bottom_left_dots',
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
              '{{WRAPPER}} .video-slider-netflibs .owl-dots' => 'bottom: {{SIZE}}{{UNIT}};',
          ],
      ]
  );
  $this->add_responsive_control(
      'left_left_dots',
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
              '{{WRAPPER}} .video-slider-netflibs .owl-dots' => 'left: {{SIZE}}{{UNIT}};',
          ],
      ]
    );
  $this->end_controls_section();
  }
  

  protected function render(){
    $settings = $this->get_settings_for_display();
    if ( isset($settings['loop-car-slider']) && $settings['loop-car-slider'] === 'yes' ) {
        $loop = true;
    } else {
        $loop = false;
    };
    if ( isset($settings['show_arrow']) && $settings['show_arrow'] === 'yes' ) {
        $arrow = true;
    } else {
        $arrow = false;
    };
    if ( isset($settings['show_arrow_tablet']) && $settings['show_arrow_tablet'] === 'yes' ) {
        $arrow_tablet = true;
    } else {
        $arrow_tablet = false;
    };
    if ( isset($settings['show_arrow_phone']) && $settings['show_arrow_phone'] === 'yes' ) {
        $arrow_phone = true;
    } else {
        $arrow_phone = false;
    };
    if ( isset($settings['show_dots']) && $settings['show_dots'] === 'yes' ) {
        $docts = true;
    } else {
        $docts = false;
    };
    if ( isset($settings['show_dots_tablet']) && $settings['show_dots_tablet'] === 'yes' ) {
        $docts_tablet = true;
    } else {
        $docts_tablet = false;
    };
    if ( isset($settings['show_dots_phone']) && $settings['show_dots_phone'] === 'yes' ) {
        $docts_phone = true;
    } else {
        $docts_phone = false;
    };
    if ( isset($settings['show_center']) && $settings['show_center'] === 'yes' ) {
        $center = true;
    } else {
        $center = false;
    };
    if ( isset($settings['autoplay-car-slider']) && $settings['autoplay-car-slider'] === 'yes' ) {
        $autoplay = true;
    } else {
        $autoplay = false;
    }
    if ( isset($settings['widget_post_num_th']) ) {
        $widget_post_num = $settings['widget_post_num_th'];
    } else {
        $widget_post_num = 4;
    }
    

   
    
    $config = [
        'autoplay'           => $autoplay,
        'loop'               => $loop,
        'arrow'               => $arrow,
        'arrow_tablet'        => $arrow_tablet,
        'arrow_phone'        => $arrow_phone,
        'docts'               => $docts,
        'docts_tablet'        => $docts_tablet,
        'docts_phone'         => $docts_phone,
        'center'               => $center,
        'widgetPostNum'      => $widget_post_num,
        
    ];
    ?>
    
    
      
    <div class="video-slider-section">
        <div class="container-fluid">        
        <div class="video-slider-netflibs owl-carousel owl-theme front-js" data-options='<?php echo(json_encode($config)); ?>'>
                
                
            <?php if ( $settings['list'] ) { foreach (  $settings['list'] as $item ) {  ?>
                <?php if($item['select_yolink'] == 'yourhost'){ ?>
                
                    <div class="item-video" data-merge="<?php echo @$item['merge'] ?>">
                        <video class="video" poster="<?php echo @$item['img_movie']['url'] ?>" controls>
                            <source src="<?php echo @$item['website_link']['url'] ?>" type="video/mp4">
                            <track kind="captions" label="persian" srclang="fa" src="<?php echo @$item['subtitle_link']['url']?>" default>
                        </video>  
                    </div>
                
                <?php } ?>
                <?php  if( @$item['select_yolink'] == 'eombd'){ ?>
                    
                    <div class="item-video" data-merge="<?php echo @$item['merge'] ?>">
                        <a class="owl-video" href="<?php echo @$item['website_link']['url'] ?>"></a> 
                    </div>
                    
                <?php } ?>
            <?php }
            } ?>

        </div>
        </div>
    </div>
    

    <?php
  }

  protected function _content_template(){

  }
}