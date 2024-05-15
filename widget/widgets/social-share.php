<?php

namespace WPC\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH')) exit; // Exit if accessed directly


class Socialshare extends Widget_Base{

  public function get_name(){
    return 'socialshare';
  }

  public function get_title(){
    return 'اشتراک گذاری';
  }

  public function get_icon(){
    return 'eicon-social-icons';
  }

  public function get_categories(){
    return ['first-category'];
  }

  protected function _register_controls(){


    $this->start_controls_section(
        'section_button_style',
        [
        'label' => __( 'تنظیمات محتوا', 'elementor' ),
        'tab' => Controls_Manager::TAB_CONTENT,
        ]
    );
    $this->add_control(
        'widget_title',
        [
            'label' => __( 'عنوان', 'plugin-domain' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => __( 'همرسانی', 'plugin-domain' ),
        ]
    );
    $this->add_control(
        'icon',
        [
            'label' => __( 'Icon', 'text-domain' ),
            'type' => \Elementor\Controls_Manager::ICONS,
            'default' => [
                'value' => 'fas fa-share',
                'library' => 'solid',
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
                '{{WRAPPER}} .net-width' => 'text-align: {{VALUE}};',
            ],
        ]
    );
    $this->add_responsive_control(
        'margin',
        [
            'label' => __( 'فاصله بین آیکون', 'elementor' ),
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
                '{{WRAPPER}} .net-width .text-footer svg' => 'margin-left: {{SIZE}}{{UNIT}};',
            ],
        ]
    );
    $this->end_controls_section();
    $this->start_controls_section(
        'section_style_btn',
        [
        'label' => __( 'تنظیمات', 'elementor' ),
        'tab' => Controls_Manager::TAB_STYLE,
        ]
    );
    $this->add_control(
        'color_social',
        [
            'label' => __( 'رنگ', 'plugin-domain' ),
            'type' => Controls_Manager::COLOR,
            'default' => '#fff',
            'selectors' => [
                '{{WRAPPER}} .net-width .text-footer' => 'color: {{VALUE}}',
            ],
        ]
    );
    $this->add_group_control(
        \Elementor\Group_Control_Typography::get_type(),
        [
        'name' => 'content_typography',
        'label' => __( 'تابپوگرافی', 'plugin-domain' ),
        'selector' => '{{WRAPPER}} .net-width .text-footer',
        ]
    );
    $this->end_controls_section();
    $this->start_controls_section(
        'section_style',
        [
        'label' => __( 'رنگبندی آیکون', 'elementor' ),
        'tab' => Controls_Manager::TAB_STYLE,
        ]
    );
    $this->add_control(
        'color_facebook',
        [
            'label' => __( 'رنگ فیسبوک', 'plugin-domain' ),
            'type' => Controls_Manager::COLOR,
            'default' => '#fff',
            'selectors' => [
                '{{WRAPPER}} .net-width ul .bg1 .color-1' => 'color: {{VALUE}}',
            ],
        ]
    );
    $this->add_control(
        'bg_facebook',
        [
            'label' => __( 'پس زمینه فیسبوک', 'plugin-domain' ),
            'type' => Controls_Manager::COLOR,
            'default' => '#007bff',
            'selectors' => [
                '{{WRAPPER}} .net-width ul .bg1' => 'background: {{VALUE}}',
            ],
        ]
    );
    $this->add_control(
        'hover_facebook',
        [
            'label' => __( 'هاور', 'plugin-domain' ),
            'type' => Controls_Manager::COLOR,
            'default' => '#007bff',
            'selectors' => [
                '{{WRAPPER}} .net-width ul .bg1:hover' => 'background: {{VALUE}}',
            ],
        ]
    );
    $this->add_control(
        'color_tiweter',
        [
            'label' => __( 'رنگ توییتر', 'plugin-domain' ),
            'type' => Controls_Manager::COLOR,
            'default' => '#fff',
            'selectors' => [
                '{{WRAPPER}} .net-width ul .bg2 .color-2' => 'color: {{VALUE}}',
            ],
        ]
    );
    $this->add_control(
        'bg_tiweter',
        [
            'label' => __( 'پس زمینه توییتر', 'plugin-domain' ),
            'type' => Controls_Manager::COLOR,
            'default' => '#17a2b8',
            'selectors' => [
                '{{WRAPPER}} .net-width ul .bg2' => 'background: {{VALUE}}',
            ],
        ]
    );
    $this->add_control(
        'hover_tiweter',
        [
            'label' => __( 'هاور', 'plugin-domain' ),
            'type' => Controls_Manager::COLOR,
            'default' => '#17a2b8',
            'selectors' => [
                '{{WRAPPER}} .net-width ul .bg2:hover' => 'background: {{VALUE}}',
            ],
        ]
    );
    $this->add_control(
        'color_pintrest',
        [
            'label' => __( 'رنگ پینترست', 'plugin-domain' ),
            'type' => Controls_Manager::COLOR,
            'default' => '#fff',
            'selectors' => [
                '{{WRAPPER}} .net-width ul .bg3 .color-3' => 'color: {{VALUE}}',
            ],
        ]
    );
    $this->add_control(
        'bg_pintrest',
        [
            'label' => __( 'پس زمینه پینترست', 'plugin-domain' ),
            'type' => Controls_Manager::COLOR,
            'default' => '#dc3545',
            'selectors' => [
                '{{WRAPPER}} .net-width ul .bg3' => 'background: {{VALUE}}',
            ],
        ]
    );
    $this->add_control(
        'hover_pintrest',
        [
            'label' => __( 'هاور', 'plugin-domain' ),
            'type' => Controls_Manager::COLOR,
            'default' => '#dc3545',
            'selectors' => [
                '{{WRAPPER}} .net-width ul .bg3:hover' => 'background: {{VALUE}}',
            ],
        ]
    );
    $this->add_control(
        'color_mail',
        [
            'label' => __( 'رنگ ایمیل', 'plugin-domain' ),
            'type' => Controls_Manager::COLOR,
            'default' => '#fff',
            'selectors' => [
                '{{WRAPPER}} .net-width ul .bg4 .color-4' => 'color: {{VALUE}}',
            ],
        ]
    );
    $this->add_control(
        'bg_mail',
        [
            'label' => __( 'پس زمینه ایمیل', 'plugin-domain' ),
            'type' => Controls_Manager::COLOR,
            'default' => '#007bff',
            'selectors' => [
                '{{WRAPPER}} .net-width ul .bg4' => 'background: {{VALUE}}',
            ],
        ]
    );
    $this->add_control(
        'hover_mail',
        [
            'label' => __( 'هاور', 'plugin-domain' ),
            'type' => Controls_Manager::COLOR,
            'default' => '#007bff',
            'selectors' => [
                '{{WRAPPER}} .net-width ul .bg4:hover' => 'background: {{VALUE}}',
            ],
        ]
    );
    $this->add_control(
        'color_googleplus',
        [
            'label' => __( 'رنگ گوگل پلاس', 'plugin-domain' ),
            'type' => Controls_Manager::COLOR,
            'default' => '#fff',
            'selectors' => [
                '{{WRAPPER}} .net-width ul .bg5 .color-5' => 'color: {{VALUE}}',
            ],
        ]
    );
    $this->add_control(
        'bg_googleplus',
        [
            'label' => __( 'پس زمینه گوگل پلاس', 'plugin-domain' ),
            'type' => Controls_Manager::COLOR,
            'default' => '#dc3545',
            'selectors' => [
                '{{WRAPPER}} .net-width ul .bg5' => 'background: {{VALUE}}',
            ],
        ]
    );
    $this->add_control(
        'hover_googleplus',
        [
            'label' => __( 'هاور', 'plugin-domain' ),
            'type' => Controls_Manager::COLOR,
            'default' => '#dc3545',
            'selectors' => [
                '{{WRAPPER}} .net-width ul .bg5:hover' => 'background: {{VALUE}}',
            ],
        ]
    );
    $this->add_group_control(
        \Elementor\Group_Control_Typography::get_type(),
        [
        'name' => 'li_typography',
        'label' => __( 'تابپوگرافی', 'plugin-domain' ),
        'selector' => '{{WRAPPER}} .net-width ul li a',
        ]
    );
    $this->end_controls_section();
  }
  

  protected function render(){
	$settings = $this->get_settings_for_display();
    ?>
    <div class="net-width">
        <div class="btn-group dropup">
            <div type="button" class="text-footer" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <?php \Elementor\Icons_Manager::render_icon( $settings['icon'], [ 'aria-hidden' => 'true' ] ); ?>
                <?php echo $settings['widget_title']; ?>
            </div>
            <div class="dropdown-menu p-0">
                <ul class="d-flex">
                    <li class="p-3 bg1">
                        <a class="footer-socials color-1" href="https://www.facebook.com/share.php?v=4&src=bm&u=<?php the_permalink(); ?>"><i class="fab fa-facebook"></i></a>
                    </li>
                    <li class="p-3 bg2">
                        <a class="footer-socials color-2" href="https://twitter.com/home?status=<?php the_permalink(); ?>"><i class="fab fa-twitter"></i></a>
                    </li>
                    <li class="p-3 bg3">
                        <a class="footer-socials color-3" href="//www.pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&media=<?php if(function_exists('the_post_thumbnail')) echo wp_get_attachment_url(get_post_thumbnail_id()); ?>&description=<?php echo get_the_title(); ?>"><i class="fab fa-pinterest"></i></a>
                    </li>
                    <li class="p-3 bg4">
                        <a class="footer-socials color-4" href="mailto:?subject=اشتراک صفحه‌ای از دایان&amp;body=<?php the_permalink(); ?>"><i class="fa fa-envelope-open"></i></a>
                    </li>
                    <li class="p-3 bg5">
                        <a class="footer-socials color-5" href="https://plus.google.com/share?url=<?php the_permalink(); ?>"><i class="fab fa-google-plus"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <?php

  }
  protected function _content_template(){
  }
}
?>
