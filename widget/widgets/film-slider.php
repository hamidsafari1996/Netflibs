<?php

namespace WPC\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH')) exit; // Exit if accessed directly


class Film_slider extends Widget_Base{


    public function __construct ($data = [], $args = null) {
		parent::__construct($data, $args);

		wp_register_script('filimo', get_theme_file_uri('/widget/widgets/film-slider.js'), ['elementor-frontend'], '1.0.0', true);
	}

	public function get_script_depends () {
		return ['filimo'];
	}



  public function get_name(){
    return 'film-slider';
  }

  public function get_title(){
    return 'تک اسلایدر فیلم';
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
    $this->add_control(
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
    $this->add_control(
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
              'name' => __( 'نام', 'plugin-domain' ),
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
          'default' => 1,
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
    'show_cat',
    [
        'label' => __( 'نمایش دسته', 'plugin-domain' ),
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
    'show_time',
    [
        'label' => __( 'نمایش مدت زمان', 'plugin-domain' ),
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
    'show_exerpt',
    [
        'label' => __( 'نمایش توضیح کوتاه', 'plugin-domain' ),
        'type' => \Elementor\Controls_Manager::SWITCHER,
        'label_on' => __( 'Show', 'your-plugin' ),
        'label_off' => __( 'Hide', 'your-plugin' ),
        'return_value' => 'yes',
        'default' => 'yes',
    ]
  );
  
  $this->add_control(
    'show_button',
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
    'default' => '1',
    'options' => [
        '1' => '1',
        '2' => '2',

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
    'section_option_style',
    [
        'label' => __( 'تنظیمات عمومی', 'elementor' ),
        'tab' => Controls_Manager::TAB_STYLE,
    ]
  );
  $this->add_control(
    'margin_all',
    [
        'label' => __( 'فاصله', 'elementor' ),
        'type' => Controls_Manager::DIMENSIONS,
        'size_units' => [ 'px', '%' ],
        'selectors' => [
            '{{WRAPPER}} .filimo-slider' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
    ]
  );
  $this->add_control(
    'padding_all',
    [
        'label' => __( 'پدینگ', 'elementor' ),
        'type' => Controls_Manager::DIMENSIONS,
        'size_units' => [ 'px', '%' ],
        'selectors' => [
            '{{WRAPPER}} .filimo-slider' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
    ]
  );
  $this->add_control(
    'boder_radius_all',
    [
        'label' => __( 'گوشه‌های مدور', 'elementor' ),
        'type' => Controls_Manager::DIMENSIONS,
        'size_units' => [ 'px', '%' ],
        'selectors' => [
            '{{WRAPPER}} .filimo-slider' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
    ]
  );
  $this->add_group_control(
    \Elementor\Group_Control_Box_Shadow::get_type(),
    [
        'name' => 'box_shadow_all',
        'label' => __( 'باکس شدوو', 'plugin-domain' ),
        'selector' => '{{WRAPPER}} .filimo-slider',
    ]
  );

  $this->end_controls_section();
  $this->start_controls_section(
    'section_img_style',
    [
        'label' => __( 'تنظیمات تصویر', 'elementor' ),
        'tab' => Controls_Manager::TAB_STYLE,
    ]
  );
  $this->add_control(
    'border_img',
    [
        'label' => __( 'گوشه‌های مدور تصویر', 'elementor' ),
        'type' => Controls_Manager::DIMENSIONS,
        'size_units' => [ 'px', '%' ],
        'selectors' => [
            '{{WRAPPER}} .filimo-slider a img,.filimo-slider .filimo-overlay' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
    ]
  );
  $this->add_group_control(
    \Elementor\Group_Control_Box_Shadow::get_type(),
    [
        'name' => 'box_shadow',
        'label' => __( 'باکس شدوو تصویر', 'plugin-domain' ),
        'selector' => '{{WRAPPER}} .filimo-slider a img',
    ]
  );
  $this->end_controls_section();
  $this->start_controls_section(
    'section_content_style',
    [
        'label' => __( 'تنظیمات محتوا', 'elementor' ),
        'tab' => Controls_Manager::TAB_STYLE,
    ]
  );
  $this->add_control(
    'title_options',
    [
      'label' => __( 'استایل عنوان', 'plugin-name' ),
      'type' => \Elementor\Controls_Manager::HEADING,
      'separator' => 'before',
    ]
  );
  $this->add_control(
    'title_color',
    [
      'label' => __( 'رنگ عنوان', 'plugin-domain' ),
      'type' => Controls_Manager::COLOR,
      'default' => '',
      'selectors' => [
        '{{WRAPPER}} .filimo-slider h3 a' => 'color: {{VALUE}}',
      ],
    ]
  );
  $this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    [
        'name' => 'title_typography',
        'label' => __( 'تایپوگرافی', 'plugin-domain' ),
        'selector' => '{{WRAPPER}} .filimo-slider h3 a',
    ]
  );
  $this->add_control(
    'cat_options',
    [
      'label' => __( 'استایل دسته', 'plugin-name' ),
      'type' => \Elementor\Controls_Manager::HEADING,
      'separator' => 'before',
    ]
  );
  $this->add_control(
    'cat_color',
    [
      'label' => __( 'رنگ دسته', 'plugin-domain' ),
      'type' => Controls_Manager::COLOR,
      'default' => '',
      'selectors' => [
        '{{WRAPPER}} .filimo-slider .category a' => 'color: {{VALUE}}',
      ],
    ]
  );
  $this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    [
        'name' => 'cat_typography',
        'label' => __( 'تایپوگرافی', 'plugin-domain' ),
        'selector' => '{{WRAPPER}} .filimo-slider .category a',
    ]
  );
  $this->add_control(
    'year_options',
    [
      'label' => __( 'استایل سال ساخت', 'plugin-name' ),
      'type' => \Elementor\Controls_Manager::HEADING,
      'separator' => 'before',
    ]
  );
  $this->add_control(
    'year_color',
    [
      'label' => __( 'رنگ سال ساخت', 'plugin-domain' ),
      'type' => Controls_Manager::COLOR,
      'default' => '',
      'selectors' => [
        '{{WRAPPER}} .filimo-slider .year, .filimo-slider .year a' => 'color: {{VALUE}}',
      ],
    ]
  );
  $this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    [
        'name' => 'year_typography',
        'label' => __( 'تایپوگرافی', 'plugin-domain' ),
        'selector' => '{{WRAPPER}} .filimo-slider .year, .filimo-slider .year a',
    ]
  );
  $this->add_control(
    'time_options',
    [
      'label' => __( 'استایل زمان', 'plugin-name' ),
      'type' => \Elementor\Controls_Manager::HEADING,
      'separator' => 'before',
    ]
  );
  $this->add_control(
    'time_color',
    [
      'label' => __( 'رنگ زمان', 'plugin-domain' ),
      'type' => Controls_Manager::COLOR,
      'default' => '',
      'selectors' => [
        '{{WRAPPER}} .filimo-slider .time' => 'color: {{VALUE}}',
      ],
    ]
  );
  $this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    [
        'name' => 'time_typography',
        'label' => __( 'تایپوگرافی', 'plugin-domain' ),
        'selector' => '{{WRAPPER}} .filimo-slider .time',
    ]
  );
  $this->add_control(
    'exerpt_options',
    [
      'label' => __( 'استایل توضیح‌ کوتاه', 'plugin-name' ),
      'type' => \Elementor\Controls_Manager::HEADING,
      'separator' => 'before',
    ]
  );
  $this->add_control(
    'exerpt_color',
    [
      'label' => __( 'رنگ توضیح کوتاه', 'plugin-domain' ),
      'type' => Controls_Manager::COLOR,
      'default' => '',
      'selectors' => [
        '{{WRAPPER}} .filimo-slider .exerpt' => 'color: {{VALUE}}',
      ],
    ]
  );
  $this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    [
        'name' => 'exerpt_typography',
        'label' => __( 'تایپوگرافی', 'plugin-domain' ),
        'selector' => '{{WRAPPER}} .filimo-slider .exerpt',
    ]
  );
  $this->end_controls_section();
  $this->start_controls_section(
    'section_imdb_style',
    [
        'label' => __( 'استایل امتیاز', 'elementor' ),
        'tab' => Controls_Manager::TAB_STYLE,
    ]
  );
  $this->add_control(
    'type_imdb_style',
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
            '' => __( 'هیچ', 'plugin-domain' ),
        ],
    ]
  );
  $this->add_control(
  'round_imdb_style',
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
          '' => __( 'هیچ', 'plugin-domain' ),
      ],
  ]
  );
  $this->add_control(
    'border_imDB',
    [
        'label' => __( 'گوشه‌های مدور', 'elementor' ),
        'type' => Controls_Manager::DIMENSIONS,
        'size_units' => [ 'px', '%' ],
        'selectors' => [
            '{{WRAPPER}} .filimo-slider .a-imDb' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
    ]
  );
  $this->add_control(
    'imDb_background',
    [
      'label' => __( 'پس زمینه', 'plugin-domain' ),
      'type' => Controls_Manager::COLOR,
      'default' => '',
      'selectors' => [
        '{{WRAPPER}} .filimo-slider .a-imDb' => 'background: {{VALUE}}',
      ],
    ]
  );
  $this->add_control(
    'imDb_color',
    [
      'label' => __( 'رنگ امتیاز', 'plugin-domain' ),
      'type' => Controls_Manager::COLOR,
      'default' => '',
      'selectors' => [
        '{{WRAPPER}} .filimo-slider .a-imDb' => 'color: {{VALUE}}',
      ],
    ]
  );
  $this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    [
        'name' => 'imDb_typography',
        'label' => __( 'تایپوگرافی', 'plugin-domain' ),
        'selector' => '{{WRAPPER}} .filimo-slider .a-imDb',
    ]
  );
  $this->end_controls_section();
  $this->start_controls_section(
    'section_button_style',
    [
        'label' => __( 'استایل دکمه', 'elementor' ),
        'tab' => Controls_Manager::TAB_STYLE,
    ]
  );
  $this->add_control(
    'widget_title',
    [
      'label' => __( 'متن دکمه', 'plugin-domain' ),
      'type' => \Elementor\Controls_Manager::TEXT,
      'default' => __( 'مشاهده بیشتر', 'plugin-domain' ),
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
            '' => __( 'هیچ', 'plugin-domain' ),
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
          '' => __( 'هیچ', 'plugin-domain' ),
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
            '{{WRAPPER}} .filimo-slider a.btn' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
            '{{WRAPPER}} .filimo-slider a.btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
            '{{WRAPPER}} .filimo-slider a.btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
    ]
  );
  $this->add_control(
    'buttom_background',
    [
      'label' => __( 'پس زمینه', 'plugin-domain' ),
      'type' => Controls_Manager::COLOR,
      'default' => '',
      'selectors' => [
        '{{WRAPPER}} .filimo-slider a.btn' => 'background: {{VALUE}}',
      ],
    ]
  );
  $this->add_control(
    'buttom_background_hover',
    [
      'label' => __( 'هاور', 'plugin-domain' ),
      'type' => Controls_Manager::COLOR,
      'default' => '',
      'selectors' => [
        '{{WRAPPER}} .filimo-slider a.btn:hover' => 'background: {{VALUE}}',
      ],
    ]
  );
  $this->add_control(
    'buttom_color',
    [
      'label' => __( 'رنگ متن', 'plugin-domain' ),
      'type' => Controls_Manager::COLOR,
      'default' => '',
      'selectors' => [
        '{{WRAPPER}} .filimo-slider a.btn' => 'color: {{VALUE}}',
      ],
    ]
  );
  $this->add_control(
    'buttom_color_hover',
    [
      'label' => __( 'هاور متن', 'plugin-domain' ),
      'type' => Controls_Manager::COLOR,
      'default' => '',
      'selectors' => [
        '{{WRAPPER}} .filimo-slider a.btn:hover' => 'color: {{VALUE}}',
      ],
    ]
  );
  $this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    [
        'name' => 'buttom_typography',
        'label' => __( 'تایپوگرافی', 'plugin-domain' ),
        'selector' => '{{WRAPPER}} .filimo-slider a.btn',
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
            '{{WRAPPER}} .filimo-slider a.btn' => 'border-style: {{VALUE}}',
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
            '{{WRAPPER}} .filimo-slider a.btn' => 'border-width: {{SIZE}}{{UNIT}};',
        ],
    ]
  );
  $this->add_control(
  'border_color',
  [
    'label' => __( 'رنگ بردر', 'plugin-domain' ),
    'type' => Controls_Manager::COLOR,
    'default' => '',
    'selectors' => [
      '{{WRAPPER}} .filimo-slider a.btn' => 'border-color: {{VALUE}}',
    ],
  ]
  );
  $this->add_control(
      'hover_border',
      [
          'label' => __( 'هاور بردر', 'plugin-domain' ),
          'type' => \Elementor\Controls_Manager::COLOR,
          'default' => '',
          'selectors' => [
              '{{WRAPPER}} .filimo-slider a.btn:hover' => 'border-color: {{VALUE}}',
          ],
      ]
  );
  $this->add_control(
    'icon_options',
    [
        'label' => __( 'تنظیمات آیکون', 'plugin-name' ),
        'type' => \Elementor\Controls_Manager::HEADING,
        'separator' => 'before',
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
    'margin_icon',
    [
        'label' => __( 'فاصله آیکون', 'elementor' ),
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
            '{{WRAPPER}} .filimo-slider a.btn svg' => 'margin-left: {{SIZE}}{{UNIT}};',
        ],
    ]
  );
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
            '{{WRAPPER}} .filimo-crousel button.owl-next, .filimo-crousel button.owl-prev' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
            '{{WRAPPER}} .filimo-crousel button.owl-next, .filimo-crousel button.owl-prev' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
            '{{WRAPPER}} .filimo-crousel button.owl-next, .filimo-crousel button.owl-prev' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
    ]
);
$this->add_control(
    'background_right_buttom',
    [
        'label' => __( 'رنگ پس زمینه', 'plugin-domain' ),
        'type' => Controls_Manager::COLOR,
        'default' => '',
        'selectors' => [
            '{{WRAPPER}} .filimo-crousel button.owl-next, .filimo-crousel button.owl-prev' => 'background: {{VALUE}}',
        ],
    ]
);
$this->add_control(
    'background_right_buttom_hover',
    [
        'label' => __( 'هاور پس زمینه', 'plugin-domain' ),
        'type' => Controls_Manager::COLOR,
        'default' => '',
        'selectors' => [
            '{{WRAPPER}} .filimo-crousel button.owl-next:hover, .filimo-crousel button.owl-prev:hover' => 'background: {{VALUE}}',
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
            '{{WRAPPER}} .filimo-crousel button.owl-next span, .filimo-crousel button.owl-prev span' => 'color: {{VALUE}}',
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
            '{{WRAPPER}} .filimo-crousel button.owl-next span:hover, .filimo-crousel button.owl-prev span:hover' => 'color: {{VALUE}}',
        ],
    ]
);
$this->add_group_control(
    \Elementor\Group_Control_Box_Shadow::get_type(),
    [
        'name' => 'box_right_buttom',
        'label' => __( 'باکس شدوو', 'plugin-domain' ),
        'selector' => '{{WRAPPER}} .filimo-crousel button.owl-next, .filimo-crousel button.owl-prev',
    ]
);
$this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    [
        'name' => 'desc_typography',
        'label' => __( 'تایپوگرافی', 'plugin-domain' ),
        'selector' => '{{WRAPPER}} .filimo-crousel button.owl-next span, .filimo-crousel button.owl-prev span',
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
            '{{WRAPPER}} .filimo-crousel button.owl-next, .filimo-crousel button.owl-prev' => 'border-style: {{VALUE}}',
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
            '{{WRAPPER}} .filimo-crousel button.owl-next, .filimo-crousel button.owl-prev' => 'border-width: {{SIZE}}{{UNIT}};',
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
            '{{WRAPPER}} .filimo-crousel button.owl-next, .filimo-crousel button.owl-prev' => 'border-color: {{VALUE}}',
        ],
    ]
);
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
            '{{WRAPPER}} .filimo-crousel button.owl-next' => 'top: {{SIZE}}{{UNIT}};',
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
            '{{WRAPPER}} .filimo-crousel button.owl-next' => 'right: {{SIZE}}{{UNIT}};',
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
            '{{WRAPPER}} .filimo-crousel button.owl-next' => 'bottom: {{SIZE}}{{UNIT}};',
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
            '{{WRAPPER}} .filimo-crousel button.owl-next' => 'left: {{SIZE}}{{UNIT}};',
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
            '{{WRAPPER}} .filimo-crousel button.owl-prev' => 'top: {{SIZE}}{{UNIT}};',
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
            '{{WRAPPER}} .filimo-crousel button.owl-prev' => 'right: {{SIZE}}{{UNIT}};',
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
            '{{WRAPPER}} .filimo-crousel button.owl-prev' => 'bottom: {{SIZE}}{{UNIT}};',
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
            '{{WRAPPER}} .filimo-crousel button.owl-prev' => 'left: {{SIZE}}{{UNIT}};',
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
            '{{WRAPPER}} .filimo-crousel .owl-dots button.owl-dot' => 'display: {{UNIT}};',
        ],
    ]
);
$this->add_control(
    'bg_button_active',
    [
        'label' => __( 'رنگ دکمه فعال', 'plugin-domain' ),
        'type' => Controls_Manager::COLOR,
        'default' => '',
        'selectors' => [
            '{{WRAPPER}} .filimo-crousel .owl-dots  button.active' => 'background: {{VALUE}} !important',
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
              '{{WRAPPER}} .filimo-crousel .owl-dots  button.active' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
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
              '{{WRAPPER}} .filimo-crousel .owl-dots  button.active' => 'width: {{SIZE}}{{UNIT}} !important;',
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
              '{{WRAPPER}} .filimo-crousel .owl-dots  button.active' => 'height: {{SIZE}}{{UNIT}} !important;',
          ],
      ]
  );
  /**---------------------active-------------- */
  $this->add_control(
      'border_doct',
      [
          'label' => __( 'گوشه‌های مدور', 'elementor' ),
          'type' => Controls_Manager::DIMENSIONS,
          'size_units' => [ 'px', '%' ],
          'selectors' => [
              '{{WRAPPER}} .filimo-crousel .owl-dots  button.owl-dot' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
              '{{WRAPPER}} .filimo-crousel .owl-dots  button.owl-dot' => 'background: {{VALUE}}',
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
              '{{WRAPPER}} .filimo-crousel .owl-dots  button.owl-dot' => 'width: {{SIZE}}{{UNIT}};',
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
              '{{WRAPPER}} .filimo-crousel .owl-dots button.owl-dot' => 'height: {{SIZE}}{{UNIT}};',
          ],
      ]
  );
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
              '{{WRAPPER}} .filimo-crousel .owl-dots' => 'top: {{SIZE}}{{UNIT}};',
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
              '{{WRAPPER}} .filimo-crousel .owl-dots' => 'right: {{SIZE}}{{UNIT}};',
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
              '{{WRAPPER}} .filimo-crousel .owl-dots' => 'bottom: {{SIZE}}{{UNIT}};',
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
              '{{WRAPPER}} .filimo-crousel .owl-dots' => 'left: {{SIZE}}{{UNIT}};',
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
        $widget_post_num = 1;
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
    
    <div class="filimo-slid filimo-crousel owl-carousel owl-theme" data-options='<?php echo(json_encode($config)); ?>'>
    <?php
    $post_type = $settings['post_type'];
      $tax = $settings['button_name'];
      $filter = $settings['filter'];
      $soth = $settings['tartib'];
      $number = $settings['price'];
      $cat = $settings['taxonomy'];
      $best_product = array(
          'post_type' => $post_type,
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
      $bg_img = get_post_meta(get_the_ID(),'imagev',true);
      ?>
        <div class="filimo-slider item" style="background: url('<?php echo $bg_img; ?>');">
            <div class="container-fluid">
                <div class="row">
                <?php if ( 'yes' === $settings['show_img'] ) { ?>
                    <div class="col-lg-3 col-md-3 col-sm-3 col-5 text-left">
                        <a href="<?php the_permalink(); ?>" class="position-relative"><img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>" class="img-fluid w-auto mx-auto"></a>
                    </div>
                    <?php } ?>
                    <div class="col-lg-9 col-md-9 col-sm-9 col-7 text-right">
                    <?php if ( 'yes' === $settings['show_title'] ) { ?>
                        <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                        <?php } ?>
                        <?php if ( 'yes' === $settings['show_cat'] ) { ?>
                        <p class="category"><?php the_terms(get_the_ID(),"movie_cat"); ?></p>
                        <?php } ?>


                        <?php
                        $select_sethand = get_post_meta( get_the_ID(), 'imDb_select', true );
                        if ( 'defult-select' === $select_sethand ){ ?>
                        <?php if ( 'yes' === $settings['show_year'] ) {  ?>
                        <p class="year">سال ساخت:<?php the_terms(get_the_ID(),"yaers"); ?></p>
                        <?php } ?>
                        <?php if ( 'yes' === $settings['show_time'] ) { $text_time = get_post_meta(get_the_ID(),'text-time',true); ?>
                        <p class="time">مدت زمان:<?php echo $text_time; ?></p>
                        <?php } ?>
                        <?php if ( 'yes' === $settings['show_imdb'] ) { $text_imbd = get_post_meta(get_the_ID(),'text-imDb',true); $link_imbd = get_post_meta(get_the_ID(),'link',true); ?>
                        <p><a href="<?php echo $link_imbd; ?>" class="a-imDb <?php echo $settings['type_imdb_style']; ?> <?php echo $settings['round_imdb_style']; ?>"><span class="imdb"><i class="fab fa-imdb ml-1"></i><?php echo $text_imbd; ?></span></a></p>
                        <?php } ?>
                        <?php } ?>
                        <?php
                        if ( 'imdb-tabligh' === $select_sethand ){ ?>
                        <?php
                        $imbd_link = get_post_meta(get_the_ID(),'link',true);
                        $IMDB = new \IMDB($imbd_link); 
                        ?>

                        <?php if ( 'yes' === $settings['show_year'] ) {  ?>
                        <p class="year">سال ساخت:<?php if ($IMDB->isReady) { print_r($IMDB->getYear()); } else { echo ''; } ?></p>
                        <?php } ?>
                        <?php if ( 'yes' === $settings['show_time'] ) { ?>
                        <p class="time">مدت زمان:<?php if ($IMDB->isReady) { print_r($IMDB->getRuntime()); } else { echo ''; } ?></p>
                        <?php } ?>
                        <?php if ( 'yes' === $settings['show_imdb'] ) { ?>
                        <p><a href="<?php echo $imbd_link; ?>" class="a-imDb <?php echo $settings['type_imdb_style']; ?> <?php echo $settings['round_imdb_style']; ?>"><span class="imdb"><i class="fab fa-imdb ml-1"></i><?php if ($IMDB->isReady) { print_r($IMDB->getRating()); } else { echo ''; } ?></span></a></p>
                        <?php } ?>

                        <?php } ?>
                        <?php if ( 'yes' === $settings['show_exerpt'] ) { ?>
                        <p class="exerpt w-75 d-none d-lg-block"><?php echo get_the_excerpt(); ?></p>
                        <?php } ?>
                        <?php if ( 'yes' === $settings['show_button'] ) { ?>
                        <p><a href="<?php the_permalink(); ?>" type="button" class="btn <?php echo $settings['type_buttom_style']; ?> <?php echo $settings['round_buttom_style']; ?>"><?php \Elementor\Icons_Manager::render_icon( $settings['icon'], [ 'aria-hidden' => 'true' ] ); ?><?php echo $settings['widget_title']; ?></a></p>
                        <?php } ?>
                    </div>        
                </div>
            </div>
        </div>
        <?php endwhile; wp_reset_postdata(); ?>
    </div>
    
    
    

    <?php
  }

  protected function _content_template(){

  }
}