<?php

namespace WPC\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH')) exit; // Exit if accessed directly


class Time_blog extends Widget_Base{

  public function get_name(){
    return 'time-blog';
  }

  public function get_title(){
    return 'زمان مطالعه بلاگ';
  }

  public function get_icon(){
    return 'fa fa-clock';
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
        'align_time',
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
            '{{WRAPPER}}' => 'time-blog: {{VALUE}};',
          ],
        ]
      );
      $this->add_control(
            'margin_time',
            [
                'label' => __( 'فاصله', 'elementor' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .time-blog' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
      );
      $this->add_control(
            'padding_time',
            [
                  'label' => __( 'پدینگ', 'elementor' ),
                  'type' => Controls_Manager::DIMENSIONS,
                  'size_units' => [ 'px', '%' ],
                  'selectors' => [
                  '{{WRAPPER}} .time-blog' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                  ],
            ]
      );
      $this->add_control(
            'more_options',
            [
                  'label' => __( 'تنظیمات بیشتر', 'plugin-name' ),
                  'type' => \Elementor\Controls_Manager::HEADING,
                  'separator' => 'before',
            ]
      );
      $this->add_control(
            'time_color',
            [
            'label' => __( 'رنگ عنوان', 'plugin-domain' ),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                  '{{WRAPPER}} .time-blog' => 'color: {{VALUE}}',
            ],
            ]
      );
      $this->add_control(
            'time_hover',
            [
                  'label' => __( 'هاور عنوان', 'plugin-domain' ),
                  'type' => \Elementor\Controls_Manager::COLOR,
                  'default' => '',
                  'selectors' => [
                  '{{WRAPPER}} .time-blog:hover' => 'color: {{VALUE}}',
                  ],
            ]
      );
      $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                  'name' => 'time_typography',
                  'label' => __( 'تایپوگرافی', 'plugin-domain' ),
                  'selector' => '{{WRAPPER}} .time-blog',
            ]
      );

    $this->end_controls_section();
  }
  

  protected function render(){
	$settings = $this->get_settings_for_display();
      $text_name = get_post_meta(get_the_ID(),'text-name',true);
  ?>

    <div class="time-blog">
        <?php echo $text_name; ?>
    </div>


	<?php

  }
  protected function _content_template(){
  }
}
?>
