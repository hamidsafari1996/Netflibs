<?php

namespace WPC\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH')) exit; // Exit if accessed directly


class Foromnet extends Widget_Base{

  public function get_name(){
    return 'foromnet';
  }

  public function get_title(){
    return 'نوار بازشونده';
  }

  public function get_icon(){
    return 'eicon-toggle';
  }

  public function get_categories(){
    return ['first-category'];
  }

  protected function _register_controls(){
    $this->start_controls_section(
        'content_section',
        [
            'label' => __( 'محتوا', 'plugin-name' ),
            'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
        ]
    );
    $repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'list_title', [
				'label' => __( 'عنوان', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'عنوان' , 'plugin-domain' ),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'list_content', [
				'label' => __( 'محتوا', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'default' => __( 'توضیحات' , 'plugin-domain' ),
				'show_label' => false,
			]
    );
    $repeater->add_control(
			'icon',
			[
				'label' => __( 'آیکون', 'text-domain' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-play',
					'library' => 'solid',
				],
			]
		);
    $this->add_control(
			'list',
			[
				'label' => __( 'ساخت لیست', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'list_title' => __( 'عنوان #1', 'plugin-domain' ),
            'list_content' => __( 'لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.', 'plugin-domain' ),
            'icon' => __( '<i class="fas fa-play"></i>' ),
					],
					[
						'list_title' => __( 'عنوان #2', 'plugin-domain' ),
            'list_content' => __( 'لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.', 'plugin-domain' ),
            'icon' => __( '<i class="fas fa-play"></i>' ),
					],
				],
				'title_field' => '{{{ list_title }}}',
			]
    );
    $this->end_controls_section();
    $this->start_controls_section(
      'content_section_style',
      [
          'label' => __( 'تنظیمات عمومی', 'plugin-name' ),
          'tab' => \Elementor\Controls_Manager::TAB_STYLE,
      ]
    );

    $this->add_responsive_control(
      'max-width',
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
              '{{WRAPPER}} .sec-web-dl .accordion .card' => 'max-width: {{SIZE}}{{UNIT}};',
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
            '{{WRAPPER}} .sec-web-dl .accordion .card' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
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
            '{{WRAPPER}} .sec-web-dl .accordion .card' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
        ],
    ]
  );
  $this->add_control(
    'button_text_color',
    [
      'label' => __( 'رنگ پس زمینه', 'elementor' ),
      'type' => Controls_Manager::COLOR,
      'default' => '',
      'selectors' => [
        '{{WRAPPER}} .sec-web-dl .accordion .card' => 'fill: {{VALUE}}; background-color: {{VALUE}};',
      ],
    ]
  );
  $this->add_control(
    'hover_color',
    [
      'label' => __( 'هاور', 'elementor' ),
      'type' => Controls_Manager::COLOR,
      'default' => '',
      'selectors' => [
        '{{WRAPPER}} .sec-web-dl .accordion .card:hover' => 'fill: {{VALUE}}; background-color: {{VALUE}};',
      ],
    ]
  );
  $this->add_group_control(
    \Elementor\Group_Control_Box_Shadow::get_type(),
    [
        'name' => 'shadow',
        'label' => __( 'باکس شدوو', 'plugin-domain' ),
        'selector' => '{{WRAPPER}} .sec-web-dl .accordion .card',
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
            '{{WRAPPER}} .sec-web-dl .accordion .card' => 'border-style: {{VALUE}}',
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
            '{{WRAPPER}} .sec-web-dl .accordion .card' => 'border-width: {{SIZE}}{{UNIT}};',
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
            '{{WRAPPER}} .sec-web-dl .accordion .card' => 'border-color: {{VALUE}}',
        ],
    ]
  );
  $this->end_controls_section();
  $this->start_controls_section(
    'content_style',
    [
        'label' => __( 'تنظیمات محتوا', 'plugin-name' ),
        'tab' => \Elementor\Controls_Manager::TAB_STYLE,
    ]
  );
  $this->add_control(
    'title_color',
    [
        'label' => __( 'رنگ عنوان', 'plugin-domain' ),
        'type' => Controls_Manager::COLOR,
        'default' => '',
        'selectors' => [
            '{{WRAPPER}} .sec-web-dl .accordion .card .title' => 'color: {{VALUE}}',
        ],
    ]
  );
  $this->add_control(
    'hover_title',
    [
        'label' => __( 'هاور عنوان', 'plugin-domain' ),
        'type' => Controls_Manager::COLOR,
        'default' => '',
        'selectors' => [
            '{{WRAPPER}} .sec-web-dl .accordion .card .title:hover' => 'color: {{VALUE}}',
        ],
    ]
  );
  $this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    [
        'name' => 'button_typography',
        'label' => __( 'تایپوگرافی', 'plugin-domain' ),
        'selector' => '{{WRAPPER}} .sec-web-dl .accordion .card .title',
    ]
  );

  $this->add_control(
    'icon_color',
    [
        'label' => __( 'رنگ آیکون', 'plugin-domain' ),
        'type' => Controls_Manager::COLOR,
        'default' => '',
        'selectors' => [
            '{{WRAPPER}} .sec-web-dl .accordion .card .icon svg' => 'color: {{VALUE}}',
        ],
    ]
  );
  $this->add_control(
    'hover_icon',
    [
        'label' => __( 'هاور آیکون', 'plugin-domain' ),
        'type' => Controls_Manager::COLOR,
        'default' => '',
        'selectors' => [
            '{{WRAPPER}} .sec-web-dl .accordion .card .icon svg:hover' => 'color: {{VALUE}}',
        ],
    ]
  );
  $this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    [
        'name' => 'icon_typography',
        'label' => __( 'تایپوگرافی آیکون', 'plugin-domain' ),
        'selector' => '{{WRAPPER}} .sec-web-dl .accordion .card .icon',
    ]
  );

  $this->add_control(
    'content_color',
    [
        'label' => __( 'رنگ محتوا', 'plugin-domain' ),
        'type' => Controls_Manager::COLOR,
        'default' => '',
        'selectors' => [
            '{{WRAPPER}} .sec-web-dl .accordion .card .card-body' => 'color: {{VALUE}}',
        ],
    ]
  );
  $this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    [
        'name' => 'content_typography',
        'label' => __( 'تایپوگرافی محتوا', 'plugin-domain' ),
        'selector' => '{{WRAPPER}} .sec-web-dl .accordion .card .card-body',
    ]
  );
  $this->end_controls_section();
  }
  

  protected function render(){
    $settings = $this->get_settings_for_display();
    ?>


<div class="sec-web-dl">
    <div class="container">
        <div class="row">
            <div class="accordion mx-auto" id="accordionExample">
            <?php $counter = 0; if ( $settings['list'] ) { foreach (  $settings['list'] as $item ) { ?>
                <div class="card <?php echo $item['_id']; ?>">
                    <div class="card-header" id="heading">
                    <h2 class="mb-0">
                        <button class="btn title btn-link text-right float-right" type="button" data-toggle="collapse" data-target="#collapseOne-<?php echo $counter; ?>" aria-expanded="false" aria-controls="collapseOne-<?php echo $counter; ?>">
                        <?php echo $item['list_title']; ?>
                        </button>
                        <button class="btn icon btn-link text-left float-left" type="button" data-toggle="collapse" data-target="#collapseOne-<?php echo $counter; ?>" aria-expanded="false" aria-controls="collapseOne-<?php echo $counter; ?>">
                        <?php \Elementor\Icons_Manager::render_icon( $item['icon'], [ 'aria-hidden' => 'true' ] ); ?>
                        </button>
                    </h2>
                    </div>

                    <div id="collapseOne-<?php echo $counter; ?>" class="collapse text-right" aria-labelledby="heading" data-parent="#accordionExample">
                      <div class="card-body">
                      <?php echo $item['list_content']; ?>
                      </div>
                    </div>
                </div>
                <?php
                $counter++;    }
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