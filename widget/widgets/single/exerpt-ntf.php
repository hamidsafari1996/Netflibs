<?php

namespace WPC\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH')) exit; // Exit if accessed directly


class Exerpt_ntf extends Widget_Base{

  public function get_name(){
    return 'exerptntf';
  }

  public function get_title(){
    return 'توضیح کوتاه';
  }

  public function get_icon(){
    return 'eicon-post-excerpt';
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
            'justify' => [
                  'title' => __( 'justify', 'elementor' ),
                  'icon' => 'eicon-text-align-justify',
            ],
          ],
          'selectors' => [
            '{{WRAPPER}}' => 'text-align: {{VALUE}};',
          ],
        ]
      );
      $this->add_control(
            'exerpt_help',
            [
                'label' => __( 'انتخاب باکس توضیح', 'plugin-domain' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'content',
                'options' => [
                        'content'  => __( 'متن کامل', 'plugin-domain' ),
                        'exerpt'  => __( 'چکیده', 'plugin-domain' ),
                        'help' => __( 'نکات و راهنما', 'plugin-domain' ),
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
                    '{{WRAPPER}} .exerpt-help' => 'color: {{VALUE}}',
                ],
            ]
      );
      $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
            'name' => 'content_typography',
            'label' => __( 'تایپوگرافی', 'plugin-domain' ),
            'selector' => '{{WRAPPER}} .exerpt-help',
            ]
      );
      $this->add_control(
            'margin_site',
            [
                'label' => __( 'فاصله', 'elementor' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .exerpt-help' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                '{{WRAPPER}} .exerpt-help' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .exerpt-help' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
          );
      $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
            'name' => 'background_cl_hover',
            'label' => esc_html__( 'Background', 'plugin-name' ),
            'types' => [ 'classic', 'gradient' ],
            'selector' => '{{WRAPPER}} .exerpt-help',
            ]
      );
      $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'box_right_buttom',
                'label' => __( 'باکس شدوو', 'plugin-domain' ),
                'selector' => '{{WRAPPER}} .exerpt-help',
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
                  '{{WRAPPER}} .exerpt-help' => 'border-style: {{VALUE}}',
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
                  '{{WRAPPER}} .exerpt-help' => 'border-width: {{SIZE}}{{UNIT}};',
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
                  '{{WRAPPER}} .exerpt-help' => 'border-color: {{VALUE}}',
                  ],
            ]
      );

    $this->end_controls_section();
  }
  

  protected function render(){
	$settings = $this->get_settings_for_display();
      $text_help = get_post_meta(get_the_ID(),'text-help',true);
      $the_content = get_the_content();
      $the_exerpt = get_the_excerpt();
  ?>
      <?php if($settings['exerpt_help'] == 'content'){ ?>
            <div class="exerpt-help text-align">     
                  <?php if($the_content){ ?>     
                  <?php the_content(); ?>
                  <?php }else{ ?>
                  <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد.</p>
                  <?php } ?>
            </div>
      <?php } ?>
      <?php if($settings['exerpt_help'] == 'exerpt'){ ?>
            <div class="exerpt-help text-align">
            <?php if($the_exerpt){ ?>  
                  <?php echo get_the_excerpt(); ?>
                  <?php }else{ ?>
                  <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد.</p>
                  <?php } ?>
            </div>
      <?php } ?>
      <?php if($settings['exerpt_help'] == 'help'){ ?>
            <div class="exerpt-help text-align">
                  <?php if($text_help){ ?>
                  <?php echo $text_help; ?>
                  <?php }else{ echo 'متن باکس راهنما و نکات'; } ?>
            </div>
      <?php } ?>


	<?php

  }
  protected function _content_template(){
  }
}
?>
