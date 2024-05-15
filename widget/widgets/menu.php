<?php

namespace WPC\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Icons_Manager;

if (!defined('ABSPATH')) exit; // Exit if accessed directly


class Menunet extends Widget_Base{

  public function get_name(){
    return 'menunet';
  }

  public function get_title(){
    return 'منو';
  }

  public function get_icon(){
    return 'eicon-nav-menu';
  }

  public function get_categories(){
    return ['secend-category'];
  }

  	public function on_export( $element ) {
		unset( $element['settings']['menu'] );

		return $element;
	}

	protected function get_nav_menu_index() {
		return $this->nav_menu_index++;
	}

	private function get_available_menus() {
		$menus = wp_get_nav_menus();

		$options = [];

		foreach ( $menus as $menu ) {
			$options[ $menu->slug ] = $menu->name;
		}

		return $options;
    
	}



  protected function _register_controls(){

    $this->start_controls_section(
			'section_layout',
			[
				'label' => __( 'Layout', 'elementor' ),
			]
		);

		$menus = $this->get_available_menus();

		if ( ! empty( $menus ) ) {
			$this->add_control(
				'menu',
				[
					'label' => __( 'Menu', 'elementor' ),
					'type' => Controls_Manager::SELECT,
					'options' => $menus,
					'default' => array_keys( $menus )[0],
					'save_default' => true,
					'separator' => 'after',
					'description' => sprintf( __( 'برای <a href="%s" target="_blank">مدیریت منو</a> به صفحه فهرست ها مراجعه کنید.', 'elementor-pro' ), admin_url( 'nav-menus.php' ) ),
				]
			);
		} else {
			$this->add_control(
				'menu',
				[
					'type' => Controls_Manager::RAW_HTML,
					'raw' => '<strong>' . __( 'هیچ منویی در سایت شما وجود ندارد. ', 'elementor' ) . '</strong><br>' . sprintf( __( 'برای <a href="%s" target="_blank">مدیریت منو</a> به صفحه فهرست ها مراجعه کنید.', 'elementor-pro' ), admin_url( 'nav-menus.php?action=edit&menu=0' ) ),
					'separator' => 'after',
					'content_classes' => 'elementor-panel-alert elementor-panel-alert-info',
				]
			);
		}
    
		$this->add_control(
			'border_style_menu',
			[
				'label' => __( 'سبک منو', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'inline-block',
				'options' => [
					'block'  => __( 'عمودی', 'plugin-domain' ),
					'inline-block' => __( 'افقی', 'plugin-domain' ),
				],
        'selectors' => [
          '{{WRAPPER}} .menu-web-head nav.navbar .flix-nav-menu ul li' => 'display: {{VALUE}};',
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
          '{{WRAPPER}} .menu-web-head nav.navbar .collapse' => 'justify-content: {{VALUE}};',
          '{{PRAPPER}} .menu-web-head nav.navbar .collapse' => 'text-align: {{VALUE}};',
        ],
      ]
    );
    $this->add_control(
			'icon_menu',
			[
				'label' => __( 'آیکون ریسپانسیو', 'text-domain' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-bars',
					'library' => 'solid',
				],
			]
		);
    $this->end_controls_section();
    $this->start_controls_section(
        'section_button_style',
        [
        'label' => __( 'تنظیمات استایل منو', 'elementor' ),
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
		  '{{WRAPPER}} .menu-web-head' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
		  '{{WRAPPER}} .menu-web-head' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	    ],
	]
    );
    $this->add_responsive_control(
	'border_radius',
	[
	    'label' => __( 'گوشه‌های مدور', 'elementor' ),
	    'type' => Controls_Manager::DIMENSIONS,
	    'size_units' => [ 'px', '%' ],
	    'selectors' => [
		  '{{WRAPPER}} .menu-web-head' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	    ],
	]
    );
    $this->add_control(
	'background_menu',
	[
	    'label' => __( 'رنگ پس زمینه', 'plugin-domain' ),
	    'type' => Controls_Manager::COLOR,
	    'default' => '',
	    'selectors' => [
		  '{{WRAPPER}} .menu-web-head' => 'background: {{VALUE}}',
	    ],
	]
    );
    $this->add_group_control(
	\Elementor\Group_Control_Box_Shadow::get_type(),
	[
	    'name' => 'box_shadow',
	    'label' => __( 'باکس شدوو', 'plugin-domain' ),
	    'selector' => '{{WRAPPER}} .menu-web-head',
	]
    );
    $this->end_controls_section();
    $this->start_controls_section(
	'section_a_style',
	[
	'label' => __( 'استایل A', 'elementor' ),
	'tab' => Controls_Manager::TAB_STYLE,
	]
  );
  $this->add_responsive_control(
    'margin_a',
    [
	  'label' => __( 'فاصله', 'elementor' ),
	  'type' => Controls_Manager::DIMENSIONS,
	  'size_units' => [ 'px', '%' ],
	  'selectors' => [
		'{{WRAPPER}} .menu-web-head nav ul li a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	  ],
    ]
  );
  $this->add_responsive_control(
    'padding_a',
    [
	  'label' => __( 'پدینگ', 'elementor' ),
	  'type' => Controls_Manager::DIMENSIONS,
	  'size_units' => [ 'px', '%' ],
	  'selectors' => [
		'{{WRAPPER}} .menu-web-head nav ul li a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	  ],
    ]
  );
  $this->add_responsive_control(
    'border_radius_a',
    [
	  'label' => __( 'گوشه‌های مدور', 'elementor' ),
	  'type' => Controls_Manager::DIMENSIONS,
	  'size_units' => [ 'px', '%' ],
	  'selectors' => [
		'{{WRAPPER}} .menu-web-head nav ul li a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	  ],
    ]
  );
  $this->add_control(
    'color_menu_a',
    [
	  'label' => __( 'رنگ متن', 'plugin-domain' ),
	  'type' => Controls_Manager::COLOR,
	  'default' => '',
	  'selectors' => [
		'{{WRAPPER}} .menu-web-head nav ul li a' => 'color: {{VALUE}}',
	  ],
    ]
  );
  $this->add_control(
	'color_menu_hover',
	[
	    'label' => __( 'هاور متن', 'plugin-domain' ),
	    'type' => Controls_Manager::COLOR,
	    'default' => '',
	    'selectors' => [
		  '{{WRAPPER}} .menu-web-head nav ul li a:hover' => 'color: {{VALUE}}',
	    ],
	]
    );
	$this->add_control(
	'background_menu_a',
	[
		'label' => __( 'رنگ پس زمینه', 'plugin-domain' ),
		'type' => Controls_Manager::COLOR,
		'default' => '',
		'selectors' => [
			'{{WRAPPER}} .menu-web-head nav ul li a' => 'background: {{VALUE}}',
		],
	]
	);
	$this->add_control(
		'background_menu_hover',
		[
		'label' => __( 'هاور پس زمینه', 'plugin-domain' ),
		'type' => Controls_Manager::COLOR,
		'default' => '',
		'selectors' => [
			'{{WRAPPER}} .menu-web-head nav ul li a:hover' => 'background: {{VALUE}}',
		],
		]
	);
	$this->add_group_control(
		\Elementor\Group_Control_Typography::get_type(),
		[
		    'name' => 'a_typography',
		    'label' => __( 'تایپوگرافی', 'plugin-domain' ),
		    'selector' => '{{WRAPPER}} .menu-web-head nav ul li a',
		]
	);
  $this->add_group_control(
    \Elementor\Group_Control_Box_Shadow::get_type(),
    [
	  'name' => 'box_shadow_a',
	  'label' => __( 'باکس شدوو', 'plugin-domain' ),
	  'selector' => '{{WRAPPER}} .menu-web-head nav ul li a',
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
		  '{{WRAPPER}} .menu-web-head nav ul li a' => 'border-style: {{VALUE}}',
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
	    'size_units' => [ 'px' ],
	    'range' => [
		  'px' => [
			'min' => 1,
			'max' => 1000,
		  ],
	    ],
	    'selectors' => [
		  '{{WRAPPER}} .menu-web-head nav ul li a' => 'border-width: {{SIZE}}{{UNIT}};',
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
		  '{{WRAPPER}} .menu-web-head nav ul li a' => 'border-color: {{VALUE}}',
	    ],
	]
  );
  $this->add_control(
	'bg_button_hover',
	[
	    'label' => __( 'هاور بردر', 'plugin-domain' ),
	    'type' => Controls_Manager::COLOR,
	    'default' => '',
	    'selectors' => [
		  '{{WRAPPER}} .menu-web-head nav ul li a:hover' => 'border-color: {{VALUE}}',
	    ],
	]
  );
  $this->end_controls_section();
  $this->start_controls_section(
	'section_ul_style',
	[
	'label' => __( 'استایل منوی بازشونده', 'elementor' ),
	'tab' => Controls_Manager::TAB_STYLE,
	]
  );
  $this->add_control(
    'margin_ul',
    [
	  'label' => __( 'فاصله', 'elementor' ),
	  'type' => Controls_Manager::DIMENSIONS,
	  'size_units' => [ 'px', '%' ],
	  'selectors' => [
		'{{WRAPPER}} .menu-web-head nav ul li ul' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	  ],
    ]
  );
  $this->add_control(
    'padding_ul',
    [
	  'label' => __( 'پدینگ', 'elementor' ),
	  'type' => Controls_Manager::DIMENSIONS,
	  'size_units' => [ 'px', '%' ],
	  'selectors' => [
		'{{WRAPPER}} .menu-web-head nav ul li ul' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	  ],
    ]
  );
  $this->add_control(
    'border_radius_ul',
    [
	  'label' => __( 'گوشه‌های مدور', 'elementor' ),
	  'type' => Controls_Manager::DIMENSIONS,
	  'size_units' => [ 'px', '%' ],
	  'selectors' => [
		'{{WRAPPER}} .menu-web-head nav ul li ul' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	  ],
    ]
  );

	$this->add_control(
	'background_menu_ul',
	[
		'label' => __( 'رنگ پس زمینه', 'plugin-domain' ),
		'type' => Controls_Manager::COLOR,
		'default' => '',
		'selectors' => [
			'{{WRAPPER}} .menu-web-head nav ul li ul.sub-menu' => 'background: {{VALUE}} !important',
		],
	]
	);
  $this->add_group_control(
    \Elementor\Group_Control_Box_Shadow::get_type(),
    [
	  'name' => 'box_shadow_ul',
	  'label' => __( 'باکس شدوو', 'plugin-domain' ),
	  'selector' => '{{WRAPPER}} .menu-web-head nav ul li ul',
    ]
  );
  $this->add_control(
	'more_options_ul',
	[
	    'label' => __( 'تنظیمات بردر', 'plugin-name' ),
	    'type' => \Elementor\Controls_Manager::HEADING,
	    'separator' => 'before',
	]
  );
  $this->add_control(
	'border_style_ul',
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
		  '{{WRAPPER}} .menu-web-head nav ul li ul' => 'border-style: {{VALUE}}',
	    ],
	]
  );
  $this->add_responsive_control(
	'width_border_ul',
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
	    'size_units' => [ 'px' ],
	    'range' => [
		  'px' => [
			'min' => 1,
			'max' => 1000,
		  ],
	    ],
	    'selectors' => [
		  '{{WRAPPER}} .menu-web-head nav ul li ul' => 'border-width: {{SIZE}}{{UNIT}};',
	    ],
	]
  );
  $this->add_control(
	'bg_button_ul',
	[
	    'label' => __( 'رنگ بردر', 'plugin-domain' ),
	    'type' => Controls_Manager::COLOR,
	    'default' => '',
	    'selectors' => [
		  '{{WRAPPER}} .menu-web-head nav ul li ul' => 'border-color: {{VALUE}}',
	    ],
	]
  );
  $this->end_controls_section();
  $this->start_controls_section(
	'section_ul_a_style',
	[
	'label' => __( 'استایل آیتم منوی بازشونده', 'elementor' ),
	'tab' => Controls_Manager::TAB_STYLE,
	]
  );
  $this->add_responsive_control(
    'margin_ul_a',
    [
	  'label' => __( 'فاصله', 'elementor' ),
	  'type' => Controls_Manager::DIMENSIONS,
	  'size_units' => [ 'px', '%' ],
	  'selectors' => [
		'{{WRAPPER}} .menu-web-head nav ul li ul li a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	  ],
    ]
  );
  $this->add_responsive_control(
    'padding_ul_a',
    [
	  'label' => __( 'پدینگ', 'elementor' ),
	  'type' => Controls_Manager::DIMENSIONS,
	  'size_units' => [ 'px', '%' ],
	  'selectors' => [
		'{{WRAPPER}} .menu-web-head nav ul li ul li a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	  ],
    ]
  );
  $this->add_responsive_control(
    'border_radius__ul_a',
    [
	  'label' => __( 'گوشه‌های مدور', 'elementor' ),
	  'type' => Controls_Manager::DIMENSIONS,
	  'size_units' => [ 'px', '%' ],
	  'selectors' => [
		'{{WRAPPER}} .menu-web-head nav ul li ul li a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	  ],
    ]
  );
  $this->add_control(
    'color_menu__ul_a',
    [
	  'label' => __( 'رنگ متن', 'plugin-domain' ),
	  'type' => Controls_Manager::COLOR,
	  'default' => '',
	  'selectors' => [
		'{{WRAPPER}} .menu-web-head nav ul li ul li a' => 'color: {{VALUE}}',
	  ],
    ]
  );
  
  $this->add_control(
	'color_menu_hover_ul_a',
	[
	    'label' => __( 'هاور متن', 'plugin-domain' ),
	    'type' => Controls_Manager::COLOR,
	    'default' => '',
	    'selectors' => [
		  '{{WRAPPER}} .menu-web-head nav ul li ul li a:hover' => 'color: {{VALUE}}',
	    ],
	]
    );
    $this->add_group_control(
	\Elementor\Group_Control_Typography::get_type(),
	[
	    'name' => 'ul_a_typography',
	    'label' => __( 'تایپوگرافی', 'plugin-domain' ),
	    'selector' => '{{WRAPPER}} .menu-web-head nav ul li ul li a',
	]
	);
	$this->add_control(
	'background_menu_ul_a',
	[
		'label' => __( 'رنگ پس زمینه', 'plugin-domain' ),
		'type' => Controls_Manager::COLOR,
		'default' => '',
		'selectors' => [
			'{{WRAPPER}} .menu-web-head nav ul li ul li a' => 'background: {{VALUE}}',
		],
	]
	);
	$this->add_control(
		'background_menu_hover_ul_a',
		[
		'label' => __( 'هاور پس زمینه', 'plugin-domain' ),
		'type' => Controls_Manager::COLOR,
		'default' => '',
		'selectors' => [
			'{{WRAPPER}} .menu-web-head nav ul li ul li a:hover' => 'background: {{VALUE}}',
		],
		]
	);
  $this->add_group_control(
    \Elementor\Group_Control_Box_Shadow::get_type(),
    [
	  'name' => 'box_shadow_a_ul_a',
	  'label' => __( 'باکس شدوو', 'plugin-domain' ),
	  'selector' => '{{WRAPPER}} .menu-web-head nav ul li ul li a',
    ]
  );
  $this->add_control(
	'more_options_ul_a',
	[
	    'label' => __( 'تنظیمات بردر', 'plugin-name' ),
	    'type' => \Elementor\Controls_Manager::HEADING,
	    'separator' => 'before',
	]
  );
  $this->add_control(
	'border_style_ul_a',
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
		  '{{WRAPPER}} .menu-web-head nav ul li ul li a' => 'border-style: {{VALUE}}',
	    ],
	]
  );
  $this->add_responsive_control(
	'width_border_ul_a',
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
	    'size_units' => [ 'px' ],
	    'range' => [
		  'px' => [
			'min' => 1,
			'max' => 1000,
		  ],
	    ],
	    'selectors' => [
		  '{{WRAPPER}} .menu-web-head nav ul li ul li a' => 'border-width: {{SIZE}}{{UNIT}};',
	    ],
	]
  );
  $this->add_control(
	'bg_button_ul_a',
	[
	    'label' => __( 'رنگ بردر', 'plugin-domain' ),
	    'type' => Controls_Manager::COLOR,
	    'default' => '',
	    'selectors' => [
		  '{{WRAPPER}} .menu-web-head nav ul li ul li a' => 'border-color: {{VALUE}}',
	    ],
	]
  );
  $this->add_control(
	'bg_button_hove_ul_a',
	[
	    'label' => __( 'هاور بردر', 'plugin-domain' ),
	    'type' => Controls_Manager::COLOR,
	    'default' => '',
	    'selectors' => [
		  '{{WRAPPER}} .menu-web-head nav ul li ul li a:hover' => 'border-color: {{VALUE}}',
	    ],
	]
  );
  $this->end_controls_section();
  $this->start_controls_section(
	'section_responsive_style',
	[
	'label' => __( 'استایل آیکون ریسپانسیو', 'elementor' ),
	'tab' => Controls_Manager::TAB_STYLE,
	]
  );
  	$this->add_responsive_control(
	'padding_responsive_a',
	[
	    'label' => __( 'پدینگ', 'elementor' ),
	    'type' => Controls_Manager::DIMENSIONS,
	    'size_units' => [ 'px', '%' ],
	    'selectors' => [
		  '{{WRAPPER}} .menu-web-head nav button.navbar-toggler' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	    ],
	]
	);
	$this->add_responsive_control(
		'border_radius_responsive_a',
		[
			'label' => __( 'گوشه‌های مدور', 'elementor' ),
			'type' => Controls_Manager::DIMENSIONS,
			'size_units' => [ 'px', '%' ],
			'selectors' => [
				'{{WRAPPER}} .menu-web-head nav button.navbar-toggler' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
			],
		]
	);
  $this->add_control(
	'color_icon_responsive',
	[
	    'label' => __( 'رنگ آیکون', 'plugin-domain' ),
	    'type' => Controls_Manager::COLOR,
	    'default' => '',
	    'selectors' => [
		  '{{WRAPPER}} .menu-web-head nav button.navbar-toggler' => 'color: {{VALUE}}',
	    ],
	]
  );
  $this->add_control(
	'bg_icon_responsive',
	[
	    'label' => __( 'رنگ پس زمینه', 'plugin-domain' ),
	    'type' => Controls_Manager::COLOR,
	    'default' => '',
	    'selectors' => [
		  '{{WRAPPER}} .menu-web-head nav button.navbar-toggler' => 'background: {{VALUE}}',
		  //'{{PRAPPER}} .menu-web-head nav button.navbar-toggler' => 'border-color: {{VALUE}}',
	    ],
	]
  );
  $this->add_group_control(
      \Elementor\Group_Control_Typography::get_type(),
      [
          'name' => 'icon_responsive_typography',
          'label' => __( 'تایپوگرافی', 'plugin-domain' ),
          'selector' => '{{WRAPPER}} .menu-web-head nav button.navbar-toggler',
      ]
    );
	$this->add_control(
		'more_options_responsive',
		[
			'label' => __( 'استایل منو ریسپانسیو', 'plugin-name' ),
			'type' => \Elementor\Controls_Manager::HEADING,
			'description' => 'در این قسمت حتما روی آیکون ریسپانسیو کلیک کنید بعد تغییرات را اعمال کنید',
			'separator' => 'before',
		]
	);
	$this->add_responsive_control(
		'margin_responsive_menu',
		[
			'label' => __( 'فاصله', 'elementor' ),
			'type' => Controls_Manager::DIMENSIONS,
			'size_units' => [ 'px', '%' ],
			'selectors' => [
				'{{WRAPPER}} .menu-web-head .flix-nav-menu ul' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
			],
		]
	);
	$this->add_responsive_control(
		'padding_responsive_menu',
		[
			'label' => __( 'پدینگ', 'elementor' ),
			'type' => Controls_Manager::DIMENSIONS,
			'size_units' => [ 'px', '%' ],
			'selectors' => [
				'{{WRAPPER}} .menu-web-head .flix-nav-menu ul' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
			],
		]
	);
	$this->add_responsive_control(
		'borderradius_responsive_menu',
		[
			'label' => __( 'گوشه‌های مدور', 'elementor' ),
			'type' => Controls_Manager::DIMENSIONS,
			'size_units' => [ 'px', '%' ],
			'selectors' => [
				'{{WRAPPER}} .menu-web-head .flix-nav-menu ul' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
			],
		]
	);
	$this->add_responsive_control(
		'back_responsive',
		[
			'label' => __( 'رنگ پس زمینه', 'plugin-domain' ),
			'type' => Controls_Manager::COLOR,
			'default' => '',
			'selectors' => [
				'{{WRAPPER}} .menu-web-head .flix-nav-menu ul' => 'background: {{VALUE}}',
			],
		]
	);
	$this->add_responsive_control(
		'align_responsive',
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
			  '{{WRAPPER}} .menu-web-head .flix-nav-menu ul li a' => 'text-align: {{VALUE}};',
		    ],
		]
	);
  $this->end_controls_section();
  }
  

  protected function render(){
	$settings = $this->get_settings_for_display();
  ?>
    <div class="menu-web-head">
        <nav class="navbar navbar-expand-lg navbar-light">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
              <?php \Elementor\Icons_Manager::render_icon( $settings['icon_menu'], [ 'aria-hidden' => 'true' ] ); ?>
            </button>
            <div class="collapse navbar-collapse nav-absolute" id="navbarNavDropdown">
            <?php 
            $args=array(
              'echo' => false,
              'menu' => $settings['menu'],
              'menu_class' => 'elementor-nav-menu',
              'menu_id' => 'menu-' . $this->get_nav_menu_index() . '-' . $this->get_id(),
              'fallback_cb' => '__return_empty_string',
              'container' => '',
              'depth' => '2',
              
            );
            if ( 'vertical' === $settings['layout'] ) {
              $args['menu_class'] .= ' sm-vertical';
            }
        
            // Add custom filter to handle Nav Menu HTML output.
            add_filter( 'nav_menu_link_attributes', [ $this, 'handle_link_classes' ], 10, 4 );
            add_filter( 'nav_menu_link_attributes', [ $this, 'handle_link_tabindex' ], 10, 4 );
            add_filter( 'nav_menu_submenu_css_class', [ $this, 'handle_sub_menu_classes' ] );
            add_filter( 'nav_menu_item_id', '__return_empty_string' );
        
            // General Menu.
            $menu_html = wp_nav_menu( $args );
            // Dropdown Menu.
		$args['menu_id'] = 'menu-' . $this->get_nav_menu_index() . '-' . $this->get_id();
		$args['menu_type'] = 'dropdown';

		// Remove all our custom filters.
		remove_filter( 'nav_menu_link_attributes', [ $this, 'handle_link_classes' ] );
		remove_filter( 'nav_menu_link_attributes', [ $this, 'handle_link_tabindex' ] );
		remove_filter( 'nav_menu_submenu_css_class', [ $this, 'handle_sub_menu_classes' ] );
		remove_filter( 'nav_menu_item_id', '__return_empty_string' );

		if ( empty( $menu_html ) ) {
			return;
		}

		$this->add_render_attribute( 'menu-toggle', [
			'class' => 'elementor-menu-toggle',
			'role' => 'button',
			'tabindex' => '0',
			'aria-label' => __( 'Menu Toggle', 'elementor-pro' ),
			'aria-expanded' => 'false',
		] );

		$is_migrated = isset( $settings['__fa4_migrated']['submenu_icon'] );

		$this->add_render_attribute( 'main-menu', [
			'migration_allowed' => Icons_Manager::is_migration_allowed() ? '1' : '0',
			'migrated' => $is_migrated ? '1' : '0',
			// Accessibility
			'role' => 'navigation',
		] );

		if ( 'dropdown' !== $settings['layout'] ) :
			$this->add_render_attribute( 'main-menu', 'class', [
				'elementor-nav-menu--main',
				'elementor-nav-menu__container',
				'elementor-nav-menu--layout-' . $settings['layout'],
			] );

			if ( $settings['pointer'] ) :
				$this->add_render_attribute( 'main-menu', 'class', 'e--pointer-' . $settings['pointer'] );

				foreach ( $settings as $key => $value ) :
					if ( 0 === strpos( $key, 'animation' ) && $value ) :
						$this->add_render_attribute( 'main-menu', 'class', 'e--animation-' . $value );

						break;
					endif;
				endforeach;
			endif; ?>
            <div class="flix-nav-menu"><?php echo $menu_html; ?></div>
            </div>
        </nav>
    </div>


    <?php
		endif;

	}

	public function handle_link_classes( $atts, $item, $args, $depth ) {
		$classes = $depth ? 'elementor-sub-item' : 'elementor-item';
		$is_anchor = false !== strpos( $atts['href'], '#' );

		if ( ! $is_anchor && in_array( 'current-menu-item', $item->classes ) ) {
			$classes .= ' elementor-item-active';
		}

		if ( $is_anchor ) {
			$classes .= ' elementor-item-anchor';
		}

		if ( empty( $atts['class'] ) ) {
			$atts['class'] = $classes;
		} else {
			$atts['class'] .= ' ' . $classes;
		}

		return $atts;
	}

	public function handle_link_tabindex( $atts, $item, $args ) {
		$settings = $this->get_active_settings();

		// Add `tabindex = -1` to the links if it's a dropdown, for A11y.
		$is_dropdown = 'dropdown' === $settings['layout'];
		$is_dropdown = $is_dropdown || ( isset( $args->menu_type ) && 'dropdown' === $args->menu_type );

		if ( $is_dropdown ) {
			$atts['tabindex'] = '-1';
		}

		return $atts;
	}

	public function handle_sub_menu_classes( $classes ) {
		$classes[] = 'elementor-nav-menu--dropdown';

		return $classes;
	}
  protected function _content_template(){
  }
}
?>
