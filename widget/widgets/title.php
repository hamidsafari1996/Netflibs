<?php

namespace WPC\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH')) exit; // Exit if accessed directly


class Titlenet extends Widget_Base{

  public function get_name(){
    return 'titleflibs';
  }

  public function get_title(){
    return 'سربرگ';
  }

  public function get_icon(){
    return 'eicon-t-letter';
  }

  public function get_categories(){
    return ['four-category'];
  }

  protected function _register_controls(){
	$this->start_controls_section(
		'section_content',
		[
          'label' => 'محتوا',
          'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
		]
      );
      $this->add_control(
		'widget_title',
			[
				'label' => __( 'عنوان', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => __( 'Type your title here', 'plugin-domain' ),
			]
      );
	  $this->add_control(
        'icon',
			[
				'label' => __( 'آیکون', 'text-domain' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-star',
					'library' => 'solid',
				],
			]
    );
    $this->add_control(
			'website_link',
			[
				'label' => __( 'لینک', 'plugin-domain' ),
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
			'icon_indent',
			[
				'label' => __( 'فاصله بین متن و آیکون', 'elementor' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 50,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .baby-align .icon' => 'margin-left: {{SIZE}}{{UNIT}};',
				],
			]
		);
    $this->add_control(
			'show_title',
			[
				'label' => __( 'نمایش تاگل', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'your-plugin' ),
				'label_off' => __( 'Hide', 'your-plugin' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);
      $this->end_controls_section();
      $this->start_controls_section(
        'section_video_style',
        [
          'label' => __( 'تنظیمات عمومی', 'elementor' ),
          'tab' => Controls_Manager::TAB_STYLE,
        ]
      );
      $this->add_responsive_control(
        'max-width',
        [
            'label' => __( 'حداکثر عرض', 'elementor' ),
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
                '{{WRAPPER}} .baby-align' => 'max-width: {{SIZE}}{{UNIT}};',
            ],
        ]
    );
      $this->add_control(
        'border_radius',
        [
          'label' => __( 'فاصله', 'elementor' ),
          'type' => Controls_Manager::DIMENSIONS,
          'size_units' => [ 'px', '%' ],
          'selectors' => [
            '{{WRAPPER}} .baby-align ' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
          ],
        ]
      );
      $this->add_control(
        'border_padding',
        [
          'label' => __( 'پدینگ', 'elementor' ),
          'type' => Controls_Manager::DIMENSIONS,
          'size_units' => [ 'px', '%' ],
          'selectors' => [
            '{{WRAPPER}} .baby-align ' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
          ],
        ]
      );
      $this->add_control(
        'border_radius_bt',
        [
          'label' => __( 'گوشه‌های مدور', 'elementor' ),
          'type' => Controls_Manager::DIMENSIONS,
          'size_units' => [ 'px', '%' ],
          'selectors' => [
            '{{WRAPPER}} .baby-align ' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
              '{{WRAPPER}} .baby-align' => 'background: {{VALUE}}',
          ],
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
              '{{WRAPPER}} .baby-align' => 'border-style: {{VALUE}}',
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
              '{{WRAPPER}} .baby-align' => 'border-width: {{SIZE}}{{UNIT}};',
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
            '{{WRAPPER}} .baby-align' => 'border-color: {{VALUE}}',
        ],
    ]
  );
  $this->add_group_control(
      \Elementor\Group_Control_Box_Shadow::get_type(),
      [
          'name' => 'shadow_border',
          'label' => __( 'باکس شدوو', 'plugin-domain' ),
          'selector' => '{{WRAPPER}} .baby-align',
      ]
  );
  $this->end_controls_section();
  $this->start_controls_section(
    'section_title_style',
    [
      'label' => __( 'تنظیمات محتوا', 'elementor' ),
      'tab' => Controls_Manager::TAB_STYLE,
    ]
  );
    $this->add_control(
      'title_color',
      [
          'label' => __( 'رنگ عنوان', 'plugin-domain' ),
          'type' => Controls_Manager::COLOR,
          'default' => '',
          'selectors' => [
              '{{WRAPPER}} .baby-align a h2 .title' => 'color: {{VALUE}}',
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
              '{{WRAPPER}} .icon svg' => 'color: {{VALUE}}',
          ],
      ]
    );
    $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'content_typography',
				'label' => __( 'تایپوگرافی', 'plugin-domain' ),
				'selector' => '{{WRAPPER}} .baby-align span',
			]
		);

    $this->end_controls_section();
  }
  

  protected function render(){
  $settings = $this->get_settings_for_display();
  $target = $settings['website_link']['is_external'] ? ' target="_blank"' : '';
  $nofollow = $settings['website_link']['nofollow'] ? ' rel="nofollow"' : '';
  ?>

    <div class="header-header-section baby-align">
    <span class="icon d-inline">
        <?php \Elementor\Icons_Manager::render_icon( $settings['icon'], [ 'aria-hidden' => 'true' ] ); ?>
    </span>
    <a href="<?php echo $settings['website_link']['url']; ?>" <?php echo $target; ?> <?php echo $nofollow; ?>><h2 class="d-inline"><span class="title" data-toggle="tooltip" <?php if ( 'yes' === $settings['show_title'] ) { ?>    title="<?php echo $settings['widget_title']; ?>"    <?php }?> ><?php echo $settings['widget_title']; ?></span></h2></a>
    </div>


	<?php

  }
  protected function _content_template(){
  }
}
?>
