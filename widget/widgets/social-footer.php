<?php

namespace WPC\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH')) exit; // Exit if accessed directly


class Socialfooter extends Widget_Base{

  public function get_name(){
    return 'socialfooter';
  }

  public function get_title(){
    return 'شبکه‌های اجتماعی';
  }

  public function get_icon(){
    return 'eicon-social-icons';
  }

  public function get_categories(){
    return ['four-category'];
  }

  protected function _register_controls(){
    $this->start_controls_section(
        'section_modal_style',
        [
            'label' => __( 'تنظیمات شبکه اجتماعی', 'elementor' ),
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
        'icon',
        [
            'label' => __( 'آیکون', 'text-domain' ),
            'type' => \Elementor\Controls_Manager::ICONS,
            'default' => [
                'value' => 'fab fa-facebook',
                'library' => 'solid',
            ],
        ]
    );
    $repeater->add_control(
        'social_link',
        [
            'label' => __( 'لینک', 'plugin-domain' ),
            'type' => \Elementor\Controls_Manager::URL,
            'placeholder' => __( 'https://social-link.com', 'plugin-domain' ),
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
                    'list_title' => __( 'فیسبوک', 'plugin-domain' ),
                    'icon' => __( 'fab fa-facebook', 'plugin-domain' ),
                    'social_link' => __( '', 'plugin-domain' ),
                ],
                [
                    'list_title' => __( 'تلگرام', 'plugin-domain' ),
                    'icon' => __( 'fab fa-telegram', 'plugin-domain' ),
                    'social_link' => __( '', 'plugin-domain' ),
                ],
            ],
            'title_field' => '{{{ list_title }}}',
        ]
    );
    $this->add_control(
        'show_name',
        [
            'label' => __( 'نمایش عنوان شبکه اجتماعی', 'plugin-domain' ),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'label_on' => __( 'Show', 'your-plugin' ),
            'label_off' => __( 'Hide', 'your-plugin' ),
            'return_value' => 'yes',
            'default' => 'yes',
        ]
    );
    $this->add_control(
        'show_icon',
        [
            'label' => __( 'نمایش آیکون شبکه اجتماعی', 'plugin-domain' ),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'label_on' => __( 'Show', 'your-plugin' ),
            'label_off' => __( 'Hide', 'your-plugin' ),
            'return_value' => 'yes',
            'default' => 'yes',
        ]
    );
    $this->add_control(
        'display',
        [
            'label' => __( 'سبک نمایش', 'plugin-domain' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'default' => 'inline',
            'options' => [
                'inline'  => __( 'افقی', 'plugin-domain' ),
                'block' => __( 'عمودی', 'plugin-domain' ),
            ],
            'selectors' => [
                '{{WRAPPER}} ul li' => 'display: {{VALUE}};',
            ],
        ]
    );
    $this->end_controls_section();
    $this->start_controls_section(
        'section_style',
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
            '{{WRAPPER}} .social-footer .social-net' => 'text-align: {{VALUE}};',
          ],
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
                '{{WRAPPER}} .social-footer' => 'max-width: {{SIZE}}{{UNIT}};',
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
                '{{WRAPPER}} .social-footer' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
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
                '{{WRAPPER}} .social-footer .social-net' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
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
                '{{WRAPPER}} .social-footer' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
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
                '{{WRAPPER}} .social-footer' => 'background: {{VALUE}}',
            ],
        ]
    );
    $this->add_group_control(
        \Elementor\Group_Control_Box_Shadow::get_type(),
        [
            'name' => 'box_shadow',
            'label' => __( 'باکس شدوو', 'plugin-domain' ),
            'selector' => '{{WRAPPER}} .social-footer',
        ]
    );
    $this->end_controls_section();
    $this->start_controls_section(
        'section_style_ul',
        [
            'label' => __( 'تنظیمات آیکون', 'elementor' ),
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
                '{{WRAPPER}} .social-footer .main-footer .social-net' => 'text-align: {{VALUE}};',
            ],
        ]
    );
    $this->add_control(
        'icon_padding',
        [
            'label' => __( 'پدینگ', 'elementor' ),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%' ],
            'selectors' => [
                '{{WRAPPER}} .social-footer .main-footer .social-net .social-network' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
            ],
        ]
    );
    $this->add_control(
        'icon_margin',
        [
            'label' => __( 'فاصله آیکون‌ها', 'elementor' ),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%' ],
            'selectors' => [
                '{{WRAPPER}} .social-footer .main-footer .social-net .social-network' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
            ],
        ]
    );
    $this->add_control(
        'background_icon',
        [
            'label' => __( 'رنگ پس زمینه آیکون‌ها', 'plugin-domain' ),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .social-footer .main-footer .social-net .social-network' => 'background: {{VALUE}}',
            ],
        ]
    );
    $this->add_control(
        'hover_background_icon',
        [
            'label' => __( 'هاور پس زمینه', 'plugin-domain' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .social-footer .main-footer .social-net .social-network:hover' => 'background: {{VALUE}}',
            ],
        ]
    );
    $this->add_control(
        'icon_radius',
        [
            'label' => __( 'گوشه‌های مدور', 'elementor' ),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%' ],
            'selectors' => [
                '{{WRAPPER}} .social-footer .main-footer .social-net .social-network' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
            ],
        ]
    );
    $this->add_group_control(
        \Elementor\Group_Control_Box_Shadow::get_type(),
        [
            'name' => 'box_shadow_icon',
            'label' => __( 'باکس شدوو', 'plugin-domain' ),
            'selector' => '{{WRAPPER}} .social-footer .main-footer .social-net .social-network',
        ]
    );
    $this->add_control(
        'li_background',
        [
            'label' => __( 'رنگ آیکون', 'plugin-domain' ),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .social-footer .main-footer .social-net .social-network a' => 'color: {{VALUE}}',
            ],
        ]
    );
    $this->add_control(
        'hover_background',
        [
            'label' => __( 'هاور آیکون', 'plugin-domain' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .social-footer .main-footer .social-net .social-network a:hover' => 'color: {{VALUE}}',
            ],
        ]
    );
    $this->add_group_control(
        \Elementor\Group_Control_Typography::get_type(),
        [
            'name' => 'li_typography',
            'label' => __( 'تایپوگرافی', 'plugin-domain' ),
            'selector' => '{{WRAPPER}} .social-footer .main-footer .social-net .social-network a',
        ]
    );
    $this->add_responsive_control(
        'magin-right',
        [
            'label' => __( 'فاصله عنوان از آیکون', 'elementor' ),
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
                '{{WRAPPER}} .social-footer ul li a .name-social' => 'margin-right: {{SIZE}}{{UNIT}};',
            ],
        ]
    );
    $this->end_controls_section();
  }
  

  protected function render(){
    $settings = $this->get_settings_for_display();
    ?>



        <div class="social-footer">
            
                    <div class="main-footer">
                    
                        <ul class="social-net">
                        <?php if ( $settings['list'] ) { foreach (  $settings['list'] as $item ) { 		$target = $item['social_link']['is_external'] ? ' target="_blank"' : ''; $nofollow = $item['social_link']['nofollow'] ? ' rel="nofollow"' : ''; ?>
                            <li class="social-network"><a href="<?php echo $item['social_link']['url']; ?>" <?php echo $target; ?> <?php echo $nofollow; ?>><?php if ( 'yes' === $settings['show_icon'] ) { ?><?php \Elementor\Icons_Manager::render_icon( $item['icon'], [ 'aria-hidden' => 'true' ] ); ?><?php } ?><?php if ( 'yes' === $settings['show_name'] ) { ?><span class="name-social"><?php echo $item['list_title']; ?></span><?php } ?></a></li>
                            <?php
                                }
                            } ?>
                        </ul>
                        
                    </div>
                
        </div>



    <?php
  }

  protected function _content_template(){
    
  }
}