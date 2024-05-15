<?php

namespace WPC\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH')) exit; // Exit if accessed directly


class Contact_form extends Widget_Base{

  public function get_name(){
    return 'contact_form';
  }

  public function get_title(){
    return 'فرم تماس 7';
  }

  public function get_icon(){
    return 'eicon-form-horizontal';
  }
  public function get_categories(){
    return ['first-category'];
  }

  protected function _register_controls(){
	$this->start_controls_section(
		'section_content',
		[
          'label' => 'تنظیمات',
          'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
		]
	  );
    $this->add_control(
			'short_code',
			[
				'label' => __( 'شرت کد فرم تماس', 'elementor' ),
				'type' => Controls_Manager::TEXTAREA,
				'dynamic' => [
					'active' => true,
				],
				'placeholder' => '[gallery id="123" size="medium"]',
				'default' => '',
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
					'{{WRAPPER}} .flibs-form' => 'text-align: {{VALUE}};',
				],
			]
		);
    $this->end_controls_section();
    $this->start_controls_section(
			'section_modal_style',
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
					'{{WRAPPER}} .flibs-form span input, .flibs-form select' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .flibs-form span input, .flibs-form select' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .flibs-form span input, .flibs-form select' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
              '{{WRAPPER}} .flibs-form span input, .flibs-form select' => 'background: {{VALUE}}',
          ],
      ]
    );
    $this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'box_shadow',
				'label' => __( 'باکس شدوو', 'plugin-domain' ),
				'selector' => '{{WRAPPER}} .flibs-form span input, .flibs-form select',
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
              '{{WRAPPER}} .flibs-form span input, .flibs-form select' => 'border-style: {{VALUE}}',
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
              '{{WRAPPER}} .flibs-form span input, .flibs-form select' => 'border-width: {{SIZE}}{{UNIT}};',
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
            '{{WRAPPER}} .flibs-form span input, .flibs-form select' => 'border-color: {{VALUE}}',
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
              '{{WRAPPER}} .flibs-form span' => 'color: {{VALUE}}',
          ],
      ]
  );
  $this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    [
      'name' => 'content_typography',
        'label' => __( 'تابپوگرافی', 'plugin-domain' ),
      'selector' => '{{WRAPPER}} .flibs-form span',
    ]
  );
  $this->add_control(
    'color_input',
    [
        'label' => __( 'رنگ متن داخلی', 'plugin-domain' ),
        'type' => Controls_Manager::COLOR,
        'default' => '',
        'selectors' => [
            '{{WRAPPER}} .flibs-form span input, .flibs-form select option' => 'color: {{VALUE}}',
        ],
    ]
);
$this->add_group_control(
  \Elementor\Group_Control_Typography::get_type(),
  [
    'name' => 'input_typography',
      'label' => __( 'تایپوگرافی متن داخلی', 'plugin-domain' ),
    'selector' => '{{WRAPPER}} .flibs-form span input, .flibs-form select option',
  ]
);
$this->add_responsive_control(
  'align_input',
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
      '{{WRAPPER}} .flibs-form span input, .flibs-form textarea, .flibs-form select option' => 'text-align: {{VALUE}};',
    ],
  ]
);
$this->add_responsive_control(
  'width',
  [
    'label' => __( 'Width', 'elementor' ),
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
      '{{WRAPPER}} .flibs-form span input' => 'width: {{SIZE}}{{UNIT}};',
    ],
  ]
);

    $this->end_controls_section();
    $this->start_controls_section(
      'section_content_style',
      [
            'label' => 'تنظیمات استایل درج دیدگاه ',
            'tab' => \Elementor\Controls_Manager::TAB_STYLE,
      ]
    );
    $this->add_responsive_control(
      'width_textarea',
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
          '{{WRAPPER}} .flibs-form textarea' => 'width: {{SIZE}}{{UNIT}};',
        ],
      ]
    );
    $this->add_responsive_control(
      'height',
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
          '{{WRAPPER}} .flibs-form textarea' => 'height: {{SIZE}}{{UNIT}};',
        ],
      ]
    );
    $this->add_control(
			'margin_textarea',
			[
				'label' => __( 'فاصله', 'elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .flibs-form textarea' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
    );
    $this->add_control(
			'padding_textarea',
			[
				'label' => __( 'پدینگ', 'elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .flibs-form textarea' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
    );
    $this->add_control(
			'border_radius_textarea',
			[
				'label' => __( 'گوشه‌های مدور', 'elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .flibs-form textarea' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
    );
    $this->add_control(
      'background_textarea',
      [
          'label' => __( 'رنگ پس زمینه', 'plugin-domain' ),
          'type' => Controls_Manager::COLOR,
          'default' => '',
          'selectors' => [
              '{{WRAPPER}} .flibs-form textarea' => 'background: {{VALUE}}',
          ],
      ]
    );
    $this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'box_textarea',
				'label' => __( 'باکس شدوو', 'plugin-domain' ),
				'selector' => '{{WRAPPER}} .flibs-form textarea',
			]
    );
    $this->add_control(
      'textarea_options',
      [
          'label' => __( 'تنظیمات بردر', 'plugin-name' ),
          'type' => \Elementor\Controls_Manager::HEADING,
          'separator' => 'before',
      ]
    );
    $this->add_control(
      'border_textarea',
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
              '{{WRAPPER}} .flibs-form textarea' => 'border-style: {{VALUE}}',
          ],
      ]
    );
    $this->add_responsive_control(
      'width_textarea',
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
              '{{WRAPPER}} .flibs-form textarea' => 'border-width: {{SIZE}}{{UNIT}};',
          ],
      ]
    );
  $this->add_control(
    'bg_textarea',
    [
        'label' => __( 'رنگ بردر', 'plugin-domain' ),
        'type' => Controls_Manager::COLOR,
        'default' => '',
        'selectors' => [
            '{{WRAPPER}} .flibs-form textarea' => 'border-color: {{VALUE}}',
        ],
    ]
  );
    $this->add_control(
      'color_textarea',
      [
          'label' => __( 'رنگ متن', 'plugin-domain' ),
          'type' => Controls_Manager::COLOR,
          'default' => '',
          'selectors' => [
              '{{WRAPPER}} .flibs-form textarea' => 'color: {{VALUE}}',
          ],
      ]
  );
  $this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    [
      'name' => 'textarea_typography',
        'label' => __( 'تابپوگرافی', 'plugin-domain' ),
      'selector' => '{{WRAPPER}} .flibs-form textarea',
    ]
  );

    $this->end_controls_section();
    $this->start_controls_section(
      'section_style',
      [
            'label' => 'تنظیمات دکمه ارسال',
            'tab' => \Elementor\Controls_Manager::TAB_STYLE,
      ]
    );
    $this->add_responsive_control(
      'width_buttom',
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
          '{{WRAPPER}} .flibs-form input.wpcf7-submit' => 'width: {{SIZE}}{{UNIT}};',
        ],
      ]
    );
    $this->add_control(
			'margin_buttom',
			[
				'label' => __( 'فاصله', 'elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .flibs-form input.wpcf7-submit' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
    );
    $this->add_control(
			'padding_buttom',
			[
				'label' => __( 'پدینگ', 'elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .flibs-form input.wpcf7-submit' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
    );
    $this->add_control(
			'border_radius_buttom',
			[
				'label' => __( 'گوشه‌های مدور', 'elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .flibs-form input.wpcf7-submit' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
    );
    $this->add_control(
      'background_buttom',
      [
          'label' => __( 'رنگ پس زمینه', 'plugin-domain' ),
          'type' => Controls_Manager::COLOR,
          'default' => '',
          'selectors' => [
              '{{WRAPPER}} .flibs-form input.wpcf7-submit' => 'background: {{VALUE}}',
          ],
      ]
    );
    $this->add_control(
      'background_buttom_hover',
      [
          'label' => __( 'هاور دکمه', 'plugin-domain' ),
          'type' => Controls_Manager::COLOR,
          'default' => '',
          'selectors' => [
              '{{WRAPPER}} .flibs-form input.wpcf7-submit:hover' => 'background: {{VALUE}}',
          ],
      ]
    );
    $this->add_control(
      'color_buttom',
      [
          'label' => __( 'رنگ متن', 'plugin-domain' ),
          'type' => Controls_Manager::COLOR,
          'default' => '',
          'selectors' => [
              '{{WRAPPER}} .flibs-form input.wpcf7-submit' => 'color: {{VALUE}}',
          ],
      ]
  );
    $this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'box_buttom',
				'label' => __( 'باکس شدوو', 'plugin-domain' ),
				'selector' => '{{WRAPPER}} .flibs-form input.wpcf7-submit',
			]
    );
    $this->add_control(
      'buttom_options',
      [
          'label' => __( 'تنظیمات بردر', 'plugin-name' ),
          'type' => \Elementor\Controls_Manager::HEADING,
          'separator' => 'before',
      ]
    );
    $this->add_control(
      'border_buttom',
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
              '{{WRAPPER}} .flibs-form input.wpcf7-submit' => 'border-style: {{VALUE}}',
          ],
      ]
    );
    $this->add_responsive_control(
      'width_buttom_submit',
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
              '{{WRAPPER}} .flibs-form input.wpcf7-submit' => 'border-width: {{SIZE}}{{UNIT}};',
          ],
      ]
    );
  $this->add_control(
    'bg_buttom',
    [
        'label' => __( 'رنگ بردر', 'plugin-domain' ),
        'type' => Controls_Manager::COLOR,
        'default' => '',
        'selectors' => [
            '{{WRAPPER}} .flibs-form input.wpcf7-submit' => 'border-color: {{VALUE}}',
        ],
    ]
  );

  $this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    [
      'name' => 'buttom_typography',
        'label' => __( 'تابپوگرافی', 'plugin-domain' ),
      'selector' => '{{WRAPPER}} .flibs-form input.wpcf7-submit',
    ]
  );
    $this->end_controls_section();
  }
  

  protected function render(){
    $shortcode = $this->get_settings_for_display( 'short_code' );

		$shortcode = do_shortcode( shortcode_unautop( $shortcode ) );
    ?>
    <div class="flibs-form"><?php echo $shortcode; ?></div>
    <?php
  }
  
  /**
	 * Render shortcode widget as plain content.
	 *
	 * Override the default behavior by printing the shortcode instead of rendering it.
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function render_plain_content() {
		// In plain mode, render without shortcode
		echo $this->get_settings( 'shortcode' );
	}
  
  protected function _content_template(){
    
  }
}
?>
