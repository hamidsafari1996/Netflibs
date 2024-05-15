<?php

namespace WPC\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH')) exit; // Exit if accessed directly


class Service extends Widget_Base{

  public function get_name(){
    return 'service';
  }

  public function get_title(){
    return 'سرویس';
  }

  public function get_icon(){
    return 'eicon-favorite';
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
        'list_title', [
            'label' => __( 'Title', 'plugin-domain' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => __( 'List Title' , 'plugin-domain' ),
            'label_block' => true,
        ]
    );
    $repeater->add_control(
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
        'list',
        [
            'label' => __( 'Repeater List', 'plugin-domain' ),
            'type' => \Elementor\Controls_Manager::REPEATER,
            'fields' => $repeater->get_controls(),
            'default' => [
                [
                    'list_title' => __( 'عنوان #1', 'plugin-domain' ),
                    'icon' => __( '', 'plugin-domain' ),
                ],
                [
                    'list_title' => __( 'عنوان #2', 'plugin-domain' ),
                    'icon' => __( '', 'plugin-domain' ),
                ],
            ],
            'title_field' => '{{{ list_title }}}',
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
        'span_color',
        [
            'label' => __( 'رنگ متن', 'plugin-domain' ),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .web-servic-section h6' => 'color: {{VALUE}}',
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
                '{{WRAPPER}} .web-servic-section h6 span svg' => 'color: {{VALUE}}',
            ],
        ]
    );
    $this->add_group_control(
        \Elementor\Group_Control_Typography::get_type(),
        [
            'name' => 'imDB_typography',
            'label' => __( 'تایپوگرافی', 'plugin-domain' ),
            'selector' => '{{WRAPPER}} .web-servic-section h6',
        ]
    );
    $this->add_control(
        'more_options',
        [
            'label' => __( 'استایل هاور', 'plugin-name' ),
            'type' => \Elementor\Controls_Manager::HEADING,
            'separator' => 'before',
        ]
    );
    $this->add_control(
        'hover_color',
        [
            'label' => __( 'رنگ', 'plugin-domain' ),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .web-servic-section h6:hover' => 'color: {{VALUE}}',
            ],
        ]
    );
    $this->add_group_control(
        \Elementor\Group_Control_Text_Shadow::get_type(),
        [
            'name' => 'text_shadow',
            'label' => __( 'شدوو متن', 'plugin-domain' ),
            'selector' => '{{WRAPPER}} .web-servic-section h6:hover',
        ]
    );
    $this->add_group_control(
        \Elementor\Group_Control_Typography::get_type(),
        [
            'name' => 'hover_typography',
            'label' => __( 'تایپوگرافی', 'plugin-domain' ),
            'selector' => '{{WRAPPER}} .web-servic-section h6:hover',
        ]
    );
    $this->add_control(
        'hover_color_dote',
        [
            'label' => __( 'رنگ نقطه زیر', 'plugin-domain' ),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .web-servic-section .porto-hover:hover h6::after' => 'background: {{VALUE}}',
            ],
        ]
    );
    $this->add_control(
        'border-radius',
        [
            'label' => __( 'گوشه های مدور', 'elementor' ),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%' ],
            'selectors' => [
                '{{WRAPPER}} .web-servic-section .porto-hover:hover h6::after' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
            ],
        ]
    );
    $this->add_responsive_control(
        'width',
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
                '{{WRAPPER}} .web-servic-section .porto-hover:hover h6::after' => 'width: {{SIZE}}{{UNIT}};',
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
                '{{WRAPPER}} .web-servic-section .porto-hover:hover h6::after' => 'height: {{SIZE}}{{UNIT}};',
            ],
        ]
    );
    $this->end_controls_section();
  }
  

  protected function render(){
    $settings = $this->get_settings_for_display();
    ?>
    
    
    <div class="web-servic-section">
        <div class="container">
            <div class="row">
            <?php if ( $settings['list'] ) { foreach (  $settings['list'] as $item ) { ?>
                <div class="col-lg-3 col-md-6 porto-hover">
                    <h6><span class="badge"><?php \Elementor\Icons_Manager::render_icon( $item['icon'], [ 'aria-hidden' => 'true' ] ); ?></span><?php echo $item['list_title']; ?></h6>
                </div>
                <?php
                    }
                } ?>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
    
    
    <?php
  }

  protected function _content_template(){

  }
}