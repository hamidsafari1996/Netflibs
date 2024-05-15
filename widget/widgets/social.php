<?php

namespace WPC\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH')) exit; // Exit if accessed directly


class Social extends Widget_Base{

  public function get_name(){
    return 'socialflibs';
  }

  public function get_title(){
    return 'اشتراک گذاری صفحه‌هات';
  }

  public function get_icon(){
    return 'eicon-share';
  }

  public function get_categories(){
    return ['first-category'];
  }

  protected function _register_controls(){
      $this->start_controls_section(
        'section_video_style',
        [
          'label' => __( 'تنظیمات عمومی', 'elementor' ),
          'tab' => Controls_Manager::TAB_STYLE,
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
            '{{WRAPPER}} .net-marg' => 'text-align: {{VALUE}};',
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
            '{{WRAPPER}} .net-marg ' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
            '{{WRAPPER}} .net-marg ' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
              '{{WRAPPER}} .net-marg' => 'background: {{VALUE}}',
          ],
      ]
    );
    $this->add_control(
        'border-radius',
        [
          'label' => __( 'مدور', 'elementor' ),
          'type' => Controls_Manager::DIMENSIONS,
          'size_units' => [ 'px', '%' ],
          'selectors' => [
            '{{WRAPPER}} .net-marg ' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
          ],
        ]
      );
      $this->add_group_control(
        \Elementor\Group_Control_Box_Shadow::get_type(),
        [
            'name' => 'Box Shadow',
            'label' => __( 'باکس شدوو', 'plugin-domain' ),
            'selector' => '{{WRAPPER}} .net-marg',
        ]
        );
        $this->add_responsive_control(
			'width',
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
					'{{WRAPPER}} .net-marg' => 'max-width: {{SIZE}}{{UNIT}};',
				],
			]
    );
    $this->end_controls_section();
    $this->start_controls_section(
        'section_icon_style',
        [
          'label' => __( 'تنظیمات آیکون', 'elementor' ),
          'tab' => Controls_Manager::TAB_STYLE,
        ]
      );
      $this->add_control(
        'margin_icon',
        [
          'label' => __( 'فاصله', 'elementor' ),
          'type' => Controls_Manager::DIMENSIONS,
          'size_units' => [ 'px', '%' ],
          'selectors' => [
            '{{WRAPPER}} .net-marg li ' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
          ],
        ]
      );
      $this->add_control(
        'padding_icon',
        [
          'label' => __( 'پدینگ', 'elementor' ),
          'type' => Controls_Manager::DIMENSIONS,
          'size_units' => [ 'px', '%' ],
          'selectors' => [
            '{{WRAPPER}} .net-marg li ' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
          ],
        ]
      );
    $this->add_control(
      'background_social',
      [
          'label' => __( 'رنگ پس زمینه', 'plugin-domain' ),
          'type' => Controls_Manager::COLOR,
          'default' => '',
          'selectors' => [
              '{{WRAPPER}} .net-marg li' => 'background: {{VALUE}}',
          ],
      ]
    );
    $this->add_control(
      'color',
      [
          'label' => __( 'رنگ آیکون', 'plugin-domain' ),
          'type' => Controls_Manager::COLOR,
          'default' => '',
          'selectors' => [
              '{{WRAPPER}} .net-icon' => 'color: {{VALUE}}',
          ],
      ]
    );
    $this->add_control(
      'border_icon',
      [
        'label' => __( 'گوشه های مدور', 'elementor' ),
        'type' => Controls_Manager::DIMENSIONS,
        'size_units' => [ 'px', '%' ],
        'selectors' => [
          '{{WRAPPER}} .net-marg li ' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
      ]
    );
    $this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'box_shadow',
				'label' => __( 'باکس شدوو', 'plugin-domain' ),
				'selector' => '{{WRAPPER}} .net-marg li',
			]
    );
    $this->add_control(
			'hoverback_color',
			[
				'label' => __( 'هاور', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .net-marg li:hover, {{WRAPPER}} .net-marg li:focus' => 'background: {{VALUE}};',
				],
			]
    );
    $this->add_control(
			'hovercod_color',
			[
				'label' => __( 'هاور آیکون', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .net-marg li a:hover, {{WRAPPER}} .net-marg li a:focus' => 'color: {{VALUE}};',
				],
			]
		);
    $this->add_group_control(
        \Elementor\Group_Control_Typography::get_type(),
        [
            'name' => 'content_typography',
            'label' => __( 'تایپوگرافی', 'plugin-domain' ),
            'selector' => '{{WRAPPER}} .net-marg li a',
        ]
    );
    $this->end_controls_section();
  }
  

  protected function render(){
	$settings = $this->get_settings_for_display();
  ?>

    <ul class="net-marg">
        <li class="d-inline">
            <a class="footer-socials net-icon" href="https://www.facebook.com/share.php?v=4&src=bm&u=<?php the_permalink(); ?>"><i class="fab fa-facebook"></i></a>
        </li>
        <li class="d-inline">
            <a class="footer-socials net-icon" href="https://twitter.com/home?status=<?php the_permalink(); ?>"><i class="fab fa-twitter"></i></a>
        </li>
        <li class="d-inline">
            <a class="footer-socials net-icon" href="https://plus.google.com/share?url=<?php the_permalink(); ?>"><i class="fab fa-google-plus"></i></a>
        </li>
        <li class="d-inline">
            <a class="footer-socials net-icon" href="//www.pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&media=<?php if(function_exists('the_post_thumbnail')) echo wp_get_attachment_url(get_post_thumbnail_id()); ?>&description=<?php echo get_the_title(); ?>"><i class="fab fa-pinterest"></i></a>
        </li>
        <li class="d-inline">
            <a class="footer-socials net-icon" href="mailto:?subject=اشتراک صفحه‌ای از دایان&amp;body=<?php the_permalink(); ?>"><i class="fa fa-envelope-open"></i></a>
        </li>
    </ul>


	<?php

  }
  protected function _content_template(){
  }
}
?>
