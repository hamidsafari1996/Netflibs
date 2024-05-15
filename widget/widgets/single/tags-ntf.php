<?php

namespace WPC\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH')) exit; // Exit if accessed directly


class Tags_ntf extends Widget_Base{

  public function get_name(){
    return 'tagsntf';
  }

  public function get_title(){
    return 'برچسب‌ها';
  }

  public function get_icon(){
    return 'eicon-animated-headline';
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
            '{{WRAPPER}} .text-align' => 'justify-content: {{VALUE}};',
          ],
        ]
      );
      $this->add_control(
            'tags_help',
            [
                'label' => __( 'انتخاب برچسب', 'plugin-domain' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'tags-post',
                'options' => [
                    'tags-post'  => __( 'برچسب مقاله', 'plugin-domain' ),
                    'category-post' => __( 'دسته مقاله', 'plugin-domain' ),
                    'tags-film' => __( 'برچسب فیلم', 'plugin-domain' ),
                ],
            ]
      );
      $this->add_control(
            'siteurl_color',
            [
                'label' => __( 'رنگ عنوان', 'plugin-domain' ),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .tags-help a' => 'color: {{VALUE}}',
                ],
            ]
      );
      $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
            'name' => 'content_typography',
            'label' => __( 'تایپوگرافی', 'plugin-domain' ),
            'selector' => '{{WRAPPER}} .tags-help a',
            ]
      );
      $this->add_control(
            'margin_site',
            [
                'label' => __( 'فاصله', 'elementor' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .tags-help a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                '{{WRAPPER}} .tags-help a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .tags-help a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
          );
      $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
            'name' => 'background_cl_hover',
            'label' => esc_html__( 'Background', 'plugin-name' ),
            'types' => [ 'classic', 'gradient' ],
            'selector' => '{{WRAPPER}} .tags-help a',
            ]
      );
      $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'box_right_buttom',
                'label' => __( 'باکس شدوو', 'plugin-domain' ),
                'selector' => '{{WRAPPER}} .tags-help a',
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
                  '{{WRAPPER}} .tags-help a' => 'border-style: {{VALUE}}',
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
                  '{{WRAPPER}} .tags-help a' => 'border-width: {{SIZE}}{{UNIT}};',
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
                  '{{WRAPPER}} .tags-help a' => 'border-color: {{VALUE}}',
                  ],
            ]
      );

    $this->end_controls_section();
  }
  

  protected function render(){
	$settings = $this->get_settings_for_display();
      $worldsub_tag = get_the_terms(get_the_ID(),"worldsub_tag");
  ?>
      <div class="hash-section">
      <?php if($settings['tags_help'] == 'tags-post'){ ?>
            <div class="hash tags-help text-align">
                  <?php if(the_tags()){ ?>
                  <?php the_tags(); ?>
                  <?php }else{ ?>
                  <a href="#" rel="tag">برچسب اول</a>
                  <a href="#" rel="tag">برچسب دوم</a>
                  <?php } ?>
            </div>
      <?php } ?>
      <?php if($settings['tags_help'] == 'category-post'){ ?>
            <div class="hash tags-help text-align">
            <?php if(the_category()){ ?>
                  <?php the_category(','); ?>
                  <?php }else{ ?>
                  <a href="#" rel="tag">برچسب اول</a>
                  <a href="#" rel="tag">برچسب دوم</a>
                  <?php } ?>
            </div>
      <?php } ?>
      <?php if($settings['tags_help'] == 'tags-film'){ ?>
            <div class="hash tags-help text-align">
            <?php if($worldsub_tag){ ?>
                  <?php the_terms(get_the_ID(),"worldsub_tag",); ?>
                  <?php }else{ ?>
                  <a href="#" rel="tag">برچسب اول</a>
                  <a href="#" rel="tag">برچسب دوم</a>
                  <?php } ?>
            </div>
      <?php } ?>
      </div>
      
      
	<?php

  }
  protected function _content_template(){
  }
}
?>
