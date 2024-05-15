<?php

namespace WPC\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH')) exit; // Exit if accessed directly


class Image_ntf extends Widget_Base{

  public function get_name(){
    return 'imagentf';
  }

  public function get_title(){
    return 'تصاویر صفحه سینگل';
  }

  public function get_icon(){
    return 'eicon-image';
  }

  public function get_categories(){
    return ['five-category'];
  }

  protected function _register_controls(){
    $this->start_controls_section(
        'section_button_style',
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
            '{{WRAPPER}}' => 'text-align: {{VALUE}};',
          ],
        ]
      );
      $this->add_control(
            'image_select',
            [
                'label' => __( 'انتخاب تصویر', 'plugin-domain' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'exerpt',
                'options' => [
                    'img-single'  => __( 'تصویر اصلی', 'plugin-domain' ),
                    'image-portfolio' => __( 'تصویر پرتفولیو', 'plugin-domain' ),
                    'image-background' => __( 'تصویر پس زمینه', 'plugin-domain' ),
                ],
            ]
      );
      $this->add_responsive_control(
            'width_img',
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
                    '{{WRAPPER}} .image-section img' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
      );
      $this->add_responsive_control(
            'height_img',
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
                    '{{WRAPPER}} .image-section img' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
      );
      $this->add_control(
            'margin_site',
            [
                'label' => __( 'فاصله', 'elementor' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .image-section img' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
            );
      $this->add_control(
        'padding_site',
        [
            'label' => __( 'پدینگ', 'elementor' ),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%' ],
            'selectors' => [
                '{{WRAPPER}} .image-section img' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]
      );
      
      $this->add_control(
            'border_site',
            [
                'label' => __( 'گوشه های مدور', 'elementor' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .image-section img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
          );
      $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
            'name' => 'background_cl_hover',
            'label' => esc_html__( 'Background', 'plugin-name' ),
            'types' => [ 'classic', 'gradient' ],
            'selector' => '{{WRAPPER}} .image-section img',
            ]
      );
      $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'box_right_buttom',
                'label' => __( 'باکس شدوو', 'plugin-domain' ),
                'selector' => '{{WRAPPER}} .image-section img',
            ]
      );
      $this->add_control(
      'more_options_border_right',
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
            'default' => 'none',
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
                  '{{WRAPPER}} .image-section img' => 'border-style: {{VALUE}}',
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
                  'unit' => 'px',
                  ],
                  'mobile_default' => [
                  'unit' => 'px',
                  ],
                  'size_units' => [  'px'  ],
                  'range' => [
                  'px' => [
                        'min' => 1,
                        'max' => 1000,
                  ],
                  ],
                  'selectors' => [
                  '{{WRAPPER}} .image-section img' => 'border-width: {{SIZE}}{{UNIT}};',
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
                  '{{WRAPPER}} .image-section img' => 'border-color: {{VALUE}}',
                  ],
            ]
      );

    $this->end_controls_section();
  }
  

  protected function render(){
	$settings = $this->get_settings_for_display();
      $imagev = get_post_meta(get_the_ID(),'imagev',true);
      $img_port = get_post_meta(get_the_ID(),'img',true);
  ?>
      <?php if($settings['image_select'] == 'img-single'){ ?>
            <div class="image-section text-align">
                  <?php if($imagev){ ?>
                        <img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
                  <?php }else{ ?>
                        <img src="<?php echo path; ?>/img/spongbob.jpg" alt="">
                  <?php } ?>
            </div>
      <?php } ?>
      <?php if($settings['image_select'] == 'image-portfolio'){ ?>
            <div class="image-section text-align">
            <?php if($imagev){ ?>
                  <img src="<?php echo $img_port; ?>" alt="<?php the_title(); ?>">
                  <?php }else{ ?>
                        <img src="<?php echo path; ?>/img/spongbob.jpg" alt="">
                  <?php } ?>
            </div>
      <?php } ?>
      <?php if($settings['image_select'] == 'image-background'){ ?>
            <div class="image-section text-align">
            <?php if($imagev){ ?>
                  <img src="<?php echo $imagev; ?>" alt="<?php the_title(); ?>">
                  <?php }else{ ?>
                        <img src="<?php echo path; ?>/img/spongbob.jpg" alt="">
                  <?php } ?>
            </div>
      <?php } ?>

	<?php

  }
  protected function _content_template(){
  }
}
?>
