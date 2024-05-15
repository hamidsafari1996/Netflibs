<?php

namespace WPC\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH')) exit; // Exit if accessed directly


class Advertisement extends Widget_Base{

  public function get_name(){
    return 'advertisement';
  }

  public function get_title(){
    return 'دکمه مدال';
  }

  public function get_icon(){
    return 'eicon-button';
  }

  public function get_categories(){
    return ['first-category'];
  }

  protected function _register_controls(){

    $this->start_controls_section(
      'section_content',
      [
        'label' => 'محتوا',
      ]
    );
    $this->add_control(
      'button_name',
      [
        'label' => 'عنوان دکمه',
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => 'عنوان دکمه'
      ]
      );
    $this->add_control(
      'title_heading',
      [
        'label' => 'عنوان',
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => 'عنوان سربرگ مدال'
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
            '{{WRAPPER}}' => 'text-align: {{VALUE}};',
          ],
        ]
      );
    $this->add_control(
      'content',
      [
        'label' => 'متن',
        'type' => \Elementor\Controls_Manager::WYSIWYG,
        'default' => 'متن مدال'
      ]
    );

    $this->end_controls_section();
    $this->start_controls_section(
			'section_video_style',
			[
				'label' => __( 'تنظیمات دکمه', 'elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
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
					'{{WRAPPER}} .elementor-button' => 'width: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} .elementor-button' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
    );
    $this->add_control(
			'more_options',
			[
				'label' => __( 'تنظیمات هاور', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
    $this->add_control(
			'hover_color',
			[
				'label' => __( 'Text Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .elementor-button:hover, {{WRAPPER}} .elementor-button:focus' => 'color: {{VALUE}};',
					'{{WRAPPER}} .elementor-button:hover svg, {{WRAPPER}} .elementor-button:focus svg' => 'fill: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'button_background_hover_color',
			[
				'label' => __( 'Background Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .elementor-button:hover, {{WRAPPER}} .elementor-button:focus' => 'background-color: {{VALUE}};',
				],
			]
    );
    $this->add_control(
			'more_opt',
			[
				'label' => __( 'تنظیمات دیگر', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->add_control(
			'button_color',
			[
				'label' => __( 'رنگ دکمه', 'plugin-domain' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .text' => 'background: {{VALUE}}',
				],
			]
		);
	$this->add_control(
		'color_title',
		[
			'label' => __( 'رنگ متن دکمه', 'plugin-domain' ),
			'type' => Controls_Manager::COLOR,
			'default' => '',
			'selectors' => [
				'{{WRAPPER}} .text' => 'color: {{VALUE}}',
			],
		]
	);
    $this->add_control(
			'entrance_animation',
			[
				'label' => __( 'انیمیشن دکمه', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::ANIMATION,
				'prefix_class' => 'animated ',
			]
    );
		$this->add_control(
			'border_radius',
			[
				'label' => __( 'Border Radius', 'elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .elementor-button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
    );
    $this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'box_shadow',
				'label' => __( 'باکس شدوو', 'plugin-domain' ),
				'selector' => '{{WRAPPER}} .elementor-button',
			]
    );
    
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'content_typography',
				'label' => __( 'تایپوگرافی', 'plugin-domain' ),
				'selector' => '{{WRAPPER}} .text',
			]
		);
    $this->end_controls_section();
    $this->start_controls_section(
			'section_modal_style',
			[
				'label' => __( 'تنظیمات مدال', 'elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
    );
	$this->add_control(
		'back_color',
		[
			'label' => __( 'رنگ پس زمینه هدر', 'plugin-domain' ),
			'type' => Controls_Manager::COLOR,
			'default' => '',
			'selectors' => [
				'{{WRAPPER}} .modal .modal-dialog .modal-header' => 'background: {{VALUE}}',
			],
		]
	);
	$this->add_control(
		'color_titr',
		[
			'label' => __( 'رنگ متن هدر', 'plugin-domain' ),
			'type' => Controls_Manager::COLOR,
			'default' => '',
			'selectors' => [
				'{{WRAPPER}} .modal .modal-dialog .modal-header h5, .modal .modal-dialog .modal-header .close' => 'color: {{VALUE}}',
			],
		]
	);
	$this->add_control(
		'background_modal',
		[
			'label' => __( 'رنگ پس زمینه مدال', 'plugin-domain' ),
			'type' => Controls_Manager::COLOR,
			'default' => '',
			'selectors' => [
				'{{WRAPPER}} .modal .modal-dialog .modal-body' => 'background: {{VALUE}}',
			],
		]
	);
		$this->add_control(
			'color_modal',
			[
				'label' => __( 'رنگ متن مدال', 'plugin-domain' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .modal .modal-dialog .modal-body' => 'color: {{VALUE}}',
				],
			]
		);
    $this->end_controls_section();
  }
  

  protected function render(){
    $settings = $this->get_settings_for_display();
    ?>
    <!-- Button trigger modal -->
    <button type="button" class="btn text elementor-button <?php echo $settings['entrance_animation']; ?>" data-toggle="modal" data-target="#exampleModal">
    <?php echo $settings['button_name'] ?>
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"><?php echo $settings['title_heading'] ?></h5>
            <button type="button" class="close m-0" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body natan">
         <?php echo $settings['content'] ?>
          </div>
        </div>
      </div>
    </div>
    <?php
  }

  protected function _content_template(){

  }
}