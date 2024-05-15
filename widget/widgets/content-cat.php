<?php

namespace WPC\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH')) exit; // Exit if accessed directly


class Contentnet extends Widget_Base{

  public function get_name(){
    return 'contentnet';
  }

  public function get_title(){
    return 'باکس محتوا';
  }

  public function get_icon(){
    return 'eicon-image-box';

  }

  public function get_categories(){
    return ['first-category'];
  }

  protected function _register_controls(){

    $this->start_controls_section(
        'section_modal_style',
        [
            'label' => __( 'محتوا', 'elementor' ),
        ]
    );
    $this->add_control(
        'image',
        [
            'label' => __( 'بارگذاری تصویر', 'plugin-domain' ),
            'type' => \Elementor\Controls_Manager::MEDIA,
            'default' => [
                'url' => \Elementor\Utils::get_placeholder_image_src(),
            ],
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
    $this->add_control(
        'item_description',
        [
            'label' => __( 'توضیح کوتاه', 'plugin-domain' ),
            'type' => \Elementor\Controls_Manager::TEXTAREA,
            'rows' => 10,
            'placeholder' => __( 'Type your description here', 'plugin-domain' ),
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
    $this->add_control(
        'margin',
        [
            'label' => __( 'فاصله', 'elementor' ),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%' ],
            'selectors' => [
                '{{WRAPPER}} .blog-contact' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
            ],
        ]
    );
    $this->add_control(
        'padding_buttom',
        [
            'label' => __( 'پدیینگ', 'elementor' ),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%' ],
            'selectors' => [
                '{{WRAPPER}} .blog-contact' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
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
                '{{WRAPPER}} .blog-contact' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
            ],
        ]
    );
    $this->add_control(
        'title',
        [
            'label' => __( 'پس زمینه', 'plugin-domain' ),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .blog-contact' => 'background: {{VALUE}}',
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
                '{{WRAPPER}} .blog-contact .concat' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
            ],
        ]
    );
    $this->add_group_control(
        \Elementor\Group_Control_Box_Shadow::get_type(),
        [
            'name' => 'shadow',
            'label' => __( 'باکس شدوو', 'plugin-domain' ),
            'selector' => '{{WRAPPER}} .blog-contact .concat',
        ]
    );
    $this->end_controls_section();
    $this->start_controls_section(
        'section_styles_content',
        [
            'label' => __( 'تنظیمات محتوا', 'elementor' ),
            'tab' => Controls_Manager::TAB_STYLE,
        ]
    );
    $this->add_control(
        'more_options_img',
        [
            'label' => __( 'تنظیمات تصویر', 'plugin-name' ),
            'type' => \Elementor\Controls_Manager::HEADING,
            'separator' => 'before',
        ]
    );
    $this->add_responsive_control(
        'width_img',
        [
            'label' => __( 'عرض تصویر', 'elementor' ),
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
                '{{WRAPPER}} .blog-contact .concat figure img' => 'width: {{SIZE}}{{UNIT}};',
            ],
        ]
    );
    $this->add_control(
        'border_radius_img',
        [
            'label' => __( 'گوشه‌های مدور', 'elementor' ),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%' ],
            'selectors' => [
                '{{WRAPPER}} .blog-contact .concat figure img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
            ],
        ]
    );
    $this->add_group_control(
        \Elementor\Group_Control_Box_Shadow::get_type(),
        [
            'name' => 'shadow_border_img',
            'label' => __( 'باکس شدوو', 'plugin-domain' ),
            'selector' => '{{WRAPPER}} .blog-contact .concat figure img',
        ]
    );
    $this->add_control(
        'more_options_content',
        [
            'label' => __( 'تنظیمات عنوان', 'plugin-name' ),
            'type' => \Elementor\Controls_Manager::HEADING,
            'separator' => 'before',
        ]
    );
    $this->add_control(
        'margin_title',
        [
            'label' => __( 'فاصله', 'elementor' ),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%' ],
            'selectors' => [
                '{{WRAPPER}} .blog-contact .concat span.title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
            ],
        ]
    );
    $this->add_control(
        'padding_title',
        [
            'label' => __( 'پدینگ', 'elementor' ),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%' ],
            'selectors' => [
                '{{WRAPPER}} .blog-contact .concat span.title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
            ],
        ]
    );
    $this->add_control(
        'border_radius_title',
        [
            'label' => __( 'گوشه‌های مدور', 'elementor' ),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%' ],
            'selectors' => [
                '{{WRAPPER}} .blog-contact .concat span.title' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
            ],
        ]
    );
    $this->add_control(
        'background',
        [
            'label' => __( 'پس زمینه', 'plugin-domain' ),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .blog-contact .concat span.title' => 'background: {{VALUE}}',
            ],
        ]
    );
    $this->add_control(
        'background_hover',
        [
            'label' => __( 'هاور پس زمینه', 'plugin-domain' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .blog-contact .concat span.title:hover' => 'background: {{VALUE}}',
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
                '{{WRAPPER}} .blog-contact .concat span.title' => 'border-style: {{VALUE}}',
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
                '{{WRAPPER}} .blog-contact .concat span.title' => 'border-width: {{SIZE}}{{UNIT}};',
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
                '{{WRAPPER}} .blog-contact .concat span.title' => 'border-color: {{VALUE}}',
            ],
        ]
    );
    $this->add_group_control(
        \Elementor\Group_Control_Box_Shadow::get_type(),
        [
            'name' => 'shadow_border',
            'label' => __( 'باکس شدوو', 'plugin-domain' ),
            'selector' => '{{WRAPPER}} .blog-contact .concat span.title',
        ]
    );
    $this->add_control(
        'title_options',
        [
            'label' => __( 'تنظیمات عنوان', 'plugin-name' ),
            'type' => \Elementor\Controls_Manager::HEADING,
            'separator' => 'before',
        ]
    );
    $this->add_control(
        'title_button',
        [
            'label' => __( 'رنگ متن', 'plugin-domain' ),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .blog-contact .concat span.title h2' => 'color: {{VALUE}}',
            ],
        ]
    );
    $this->add_control(
        'hover_title',
        [
            'label' => __( 'هاور متن', 'plugin-domain' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .blog-contact .concat span.title h2:hover' => 'color: {{VALUE}}',
            ],
        ]
    );
    $this->add_group_control(
        \Elementor\Group_Control_Typography::get_type(),
        [
            'name' => 'title_typography',
            'label' => __( 'تایپوگرافی عنوان', 'plugin-domain' ),
            'selector' => '{{WRAPPER}} .blog-contact .concat span.title h2',
        ]
    );
    $this->add_control(
        'more_options_desc',
        [
            'label' => __( 'تنظیمات توضیح کوتاه', 'plugin-name' ),
            'type' => \Elementor\Controls_Manager::HEADING,
            'separator' => 'before',
        ]
    );
    $this->add_control(
        'desc_button',
        [
            'label' => __( 'رنگ توضیح کوتاه', 'plugin-domain' ),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .blog-contact .concat p' => 'color: {{VALUE}}',
            ],
        ]
    );
    $this->add_group_control(
        \Elementor\Group_Control_Typography::get_type(),
        [
            'name' => 'desc_typography',
            'label' => __( 'تایپوگرافی توضیح کوتاه', 'plugin-domain' ),
            'selector' => '{{WRAPPER}} .blog-contact .concat p',
        ]
    );
    $this->end_controls_section();
  }
  

  protected function render(){
    $settings = $this->get_settings_for_display();
    $target = $settings['website_link']['is_external'] ? ' target="_blank"' : '';
    $nofollow = $settings['website_link']['nofollow'] ? ' rel="nofollow"' : '';
    ?>
            
        
            
                <div class="blog-contact text-center">
                    <a href="<?php echo $settings['website_link']['url']; ?>"  <?php echo $target; ?> <?php echo $nofollow; ?> class="text-secondary">
                    <div class="concat">
                        <figure>
                            <img src="<?php echo $settings['image']['url']; ?>" alt="<?php echo $settings['widget_title'] ?>">
                        </figure>
                        <span class="btn title p-3" data-toggle="tooltip" title="<?php echo $settings['widget_title'] ?>">
                        <h2><?php echo $settings['widget_title'] ?></h2>
                        </span>
                        <p><?php echo $settings['item_description'] ?></p>
                    </div>
                    </a>
                </div>
                


                    
                    
    <?php
  }

  protected function _content_template(){
    
  }
}