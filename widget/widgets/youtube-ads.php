<?php

namespace WPC\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH')) exit; // Exit if accessed directly


class Youtubeads extends Widget_Base{

  public function get_name(){
    return 'youtubeads';
  }

  public function get_title(){
    return 'تک تبلیغ';
  }

  public function get_icon(){
    return 'eicon-image';
  }

  public function get_categories(){
    return ['first-category'];
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
        'image',
        [
            'label' => __( 'تصویر تبلیغ', 'plugin-domain' ),
            'type' => \Elementor\Controls_Manager::MEDIA,
            'default' => [
                'url' => \Elementor\Utils::get_placeholder_image_src(),
            ],
        ]
    );
    $this->add_control(
        'logo',
        [
            'label' => __( 'لوگو', 'plugin-domain' ),
            'type' => \Elementor\Controls_Manager::MEDIA,
            'default' => [
                'url' => \Elementor\Utils::get_placeholder_image_src(),
            ],
        ]
    );
    $this->add_control(
        'website_link',
        [
            'label' => __( 'لینک تبلیغ', 'plugin-domain' ),
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
            'label' => __( 'متن تبلیغ', 'plugin-domain' ),
            'type' => \Elementor\Controls_Manager::TEXTAREA,
            'rows' => 10,
            'default' => __( '50% تخفیف', 'plugin-domain' ),
            'placeholder' => __( 'Type your description here', 'plugin-domain' ),
        ]
    );
    $this->add_control(
        'widget_title',
        [
            'label' => __( 'نام سایت', 'plugin-domain' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'placeholder' => __( 'Type your title here', 'plugin-domain' ),
        ]
    );
    $this->add_control(
        'button_title',
        [
            'label' => __( 'متن دکمه', 'plugin-domain' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => __( 'کلیک کنید', 'plugin-domain' ),
            'placeholder' => __( 'Type your title here', 'plugin-domain' ),
        ]
    );
    $this->add_control(
        'badge_style',
        [
            'label' => __( 'رنگ Badges', 'plugin-domain' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'default' => 'badge-warning',
            'options' => [
                'badge-primary'  => __( 'آبی', 'plugin-domain' ),
                'badge-secondary' => __( 'خاکستری', 'plugin-domain' ),
                'badge-success' => __( 'سبز', 'plugin-domain' ),
                'badge-danger' => __( 'قرمز', 'plugin-domain' ),
                'badge-warning' => __( 'زرد', 'plugin-domain' ),
                'badge-info' => __( 'آبی', 'plugin-domain' ),
                'badge-light' => __( 'سفید', 'plugin-domain' ),
                'badge-dark' => __( 'سیاه', 'plugin-domain' ),
            ],
        ]
    );
    $this->end_controls_section();
    $this->start_controls_section(
		'section_content_style',
		[
          'label' => 'تنظیمات عمومی',
          'tab' => \Elementor\Controls_Manager::TAB_STYLE,
		]
    );
    $this->add_control(
        'background',
        [
            'label' => __( 'پس زمینه', 'plugin-domain' ),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .youtube-ads' => 'background: {{VALUE}}',
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
                '{{WRAPPER}} .youtube-ads' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                '{{WRAPPER}} .youtube-ads' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]
    );
    $this->add_control(
        'border_radius',
        [
            'label' => __( 'Border Radius', 'elementor' ),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%' ],
            'selectors' => [
                '{{WRAPPER}} .youtube-ads' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                '{{WRAPPER}} .youtube-ads' => 'border-style: {{VALUE}}',
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
                '{{WRAPPER}} .youtube-ads' => 'border-width: {{SIZE}}{{UNIT}};',
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
                '{{WRAPPER}} .youtube-ads' => 'border-color: {{VALUE}}',
            ],
        ]
    );
    $this->add_group_control(
        \Elementor\Group_Control_Box_Shadow::get_type(),
        [
            'name' => 'box_shadow',
            'label' => __( 'Box Shadow', 'plugin-domain' ),
            'selector' => '{{WRAPPER}} .youtube-ads',
        ]
    );
    $this->end_controls_section();
    $this->start_controls_section(
		'section_img_style',
		[
          'label' => 'تنظیمات تصاویر',
          'tab' => \Elementor\Controls_Manager::TAB_STYLE,
		]
    );
    $this->add_control(
        'big_options',
        [
            'label' => __( 'تنظیمات تصویر تبلیغ', 'plugin-name' ),
            'type' => \Elementor\Controls_Manager::HEADING,
            'separator' => 'before',
        ]
    );
    $this->add_control(
        'border_radius_img',
        [
            'label' => __( 'Border Radius', 'elementor' ),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%' ],
            'selectors' => [
                '{{WRAPPER}} .youtube-ads a img.big-img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]
    );
    $this->add_group_control(
        \Elementor\Group_Control_Box_Shadow::get_type(),
        [
            'name' => 'box_shadow_img',
            'label' => __( 'Box Shadow', 'plugin-domain' ),
            'selector' => '{{WRAPPER}} .youtube-ads a img.big-img',
        ]
    );
    $this->add_control(
        'small_options',
        [
            'label' => __( 'تنظیمات تصویر لوگو', 'plugin-name' ),
            'type' => \Elementor\Controls_Manager::HEADING,
            'separator' => 'before',
        ]
    );
    $this->add_responsive_control(
        'width_logo',
        [
            'label' => __( 'عرض لوگو', 'elementor' ),
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
                '{{WRAPPER}} .youtube-ads .content .width-section img' => 'width: {{SIZE}}{{UNIT}};',
            ],
        ]
    );
    $this->add_control(
        'border_radius_small',
        [
            'label' => __( 'Border Radius', 'elementor' ),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%' ],
            'selectors' => [
                '{{WRAPPER}} .youtube-ads .content a img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                '{{WRAPPER}} .width-section' => 'text-align: {{VALUE}};',
            ],
        ]
      );
    $this->add_group_control(
        \Elementor\Group_Control_Box_Shadow::get_type(),
        [
            'name' => 'box_shadow_small',
            'label' => __( 'Box Shadow', 'plugin-domain' ),
            'selector' => '{{WRAPPER}} .youtube-ads .content span a img',
        ]
    );

    $this->end_controls_section();
    $this->start_controls_section(
		'section_title_style',
		[
          'label' => 'تنظیمات محتوا',
          'tab' => \Elementor\Controls_Manager::TAB_STYLE,
		]
    );
    $this->add_responsive_control(
        'align_content',
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
                '{{WRAPPER}} .width-content' => 'text-align: {{VALUE}};',
            ],
        ]
      );
    $this->add_control(
        'color_title',
        [
            'label' => __( 'رنگ عنوان', 'plugin-domain' ),
            'type' => Controls_Manager::COLOR,
            'default' => '#fff',
            'selectors' => [
                '{{WRAPPER}} .youtube-ads .content .content-s h3' => 'color: {{VALUE}}',
            ],
        ]
    );
    $this->add_group_control(
        \Elementor\Group_Control_Typography::get_type(),
        [
        'name' => 'title_typography',
        'label' => __( 'تابپوگرافی', 'plugin-domain' ),
        'selector' => '{{WRAPPER}} .youtube-ads .content .content-s h3',
        ]
    );
    $this->add_control(
        'color_site',
        [
            'label' => __( 'رنگ نام سایت', 'plugin-domain' ),
            'type' => Controls_Manager::COLOR,
            'default' => '#fff',
            'selectors' => [
                '{{WRAPPER}} .youtube-ads .content .content-s span.site' => 'color: {{VALUE}}',
            ],
        ]
    );
    $this->add_group_control(
        \Elementor\Group_Control_Typography::get_type(),
        [
        'name' => 'site_typography',
        'label' => __( 'تابپوگرافی', 'plugin-domain' ),
        'selector' => '{{WRAPPER}} .youtube-ads .content .content-s span.site',
        ]
    );
    $this->end_controls_section();
    $this->start_controls_section(
		'section_button_style',
		[
          'label' => 'تنظیمات دکمه',
          'tab' => \Elementor\Controls_Manager::TAB_STYLE,
		]
    );
    $this->add_responsive_control(
        'align_bottom',
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
                '{{WRAPPER}} .width-bottom' => 'text-align: {{VALUE}};',
            ],
        ]
      );
    $this->add_control(
        'background_button',
        [
            'label' => __( 'رنگ دکمه', 'plugin-domain' ),
            'type' => Controls_Manager::COLOR,
            'default' => '#0062cc',
            'selectors' => [
                '{{WRAPPER}} .youtube-ads .content .bg-button a.btn' => 'background-color: {{VALUE}}',
            ],
        ]
    );
    $this->add_control(
        'hover_button',
        [
            'label' => __( 'هاور دکمه', 'plugin-domain' ),
            'type' => Controls_Manager::COLOR,
            'default' => '#0062cc',
            'selectors' => [
                '{{WRAPPER}} .youtube-ads .content .bg-button a.btn:hover' => 'background-color: {{VALUE}}',
            ],
        ]
    );
    $this->add_control(
        'color_button',
        [
            'label' => __( 'رنگ متن دکمه', 'plugin-domain' ),
            'type' => Controls_Manager::COLOR,
            'default' => '#fff',
            'selectors' => [
                '{{WRAPPER}} .youtube-ads .content .bg-button a.btn' => 'color: {{VALUE}}',
            ],
        ]
    );
    $this->add_control(
        'hover_title',
        [
            'label' => __( 'هاور متن', 'plugin-domain' ),
            'type' => Controls_Manager::COLOR,
            'default' => '#fff',
            'selectors' => [
                '{{WRAPPER}} .youtube-ads .content .bg-button a.btn:hover' => 'color: {{VALUE}}',
            ],
        ]
    );
    $this->add_control(
        'border_radius_button',
        [
            'label' => __( 'Border Radius', 'elementor' ),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%' ],
            'selectors' => [
                '{{WRAPPER}} .youtube-ads .content .bg-button a.btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]
    );
    $this->add_control(
        'more_options_bt',
        [
            'label' => __( 'تنظیمات بردر', 'plugin-name' ),
            'type' => \Elementor\Controls_Manager::HEADING,
            'separator' => 'before',
        ]
    );
    $this->add_control(
        'border_style_bt',
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
                '{{WRAPPER}} .youtube-ads .content .bg-button a.btn' => 'border-style: {{VALUE}}',
            ],
        ]
    );
    $this->add_responsive_control(
        'width_border_bt',
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
                '{{WRAPPER}} .youtube-ads .content .bg-button a.btn' => 'border-width: {{SIZE}}{{UNIT}};',
            ],
        ]
    );
    $this->add_control(
        'bg_button_bt',
        [
            'label' => __( 'رنگ بردر', 'plugin-domain' ),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .youtube-ads .content .bg-button a.btn' => 'border-color: {{VALUE}}',
            ],
        ]
    );
    $this->end_controls_section();
  }
  

  protected function render(){
  $settings = $this->get_settings_for_display();
  $target = $settings['website_link']['is_external'] ? ' target="_blank"' : '';
  $nofollow = $settings['website_link']['nofollow'] ? ' rel="nofollow"' : '';
  ?>
    <div class="youtube-ads">
        <a href="<?php echo $settings['website_link']['url']; ?>" <?php echo $target; ?> <?php echo $nofollow; ?>>
            <img src="<?php echo $settings['image']['url']; ?>" alt="" class="w-100 big-img">
        </a>
        <div class="container-fluid p-0">
        <div class="d-flex mt-4 content">
        <div class="col-md-2 width-section">
        <span><a href="<?php echo $settings['website_link']['url']; ?>" <?php echo $target; ?> <?php echo $nofollow; ?>><img src="<?php echo $settings['logo']['url']; ?>" alt=""></a></span>
        </div>
        
        <div class="col-md-6 width-content d-block pr-3 pl-3 content-s">
                <h3 class="mb-4"><?php echo $settings['item_description']; ?></h3>
                <div class="pro-cont">
                    <span class="badge d-inline <?php echo $settings['badge_style']; ?>">آگهی</span>
                    <span class="mr-2 site d-inline"><?php echo $settings['widget_title']; ?></span>
                </div>
            </div>
        
            <div class="col-md-4 width-bottom">
            <div class="w-100 bg-button">
            <a href="<?php echo $settings['website_link']['url']; ?>" <?php echo $target; ?> <?php echo $nofollow; ?> class="btn btn-lg active" role="button" aria-pressed="true"><?php echo $settings['button_title']; ?></a>
            </div>
            </div>
        </div>
        
            
        </div>
    </div>

	<?php

  }
  protected function _content_template(){
  }
}
?>
