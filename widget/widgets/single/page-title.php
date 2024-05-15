<?php

namespace WPC\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH')) exit; // Exit if accessed directly


class Pagetitle extends Widget_Base{

  public function get_name(){
    return 'pagetitle';
  }

  public function get_title(){
    return 'سربرگ';
  }

  public function get_icon(){
    return 'eicon-archive-title';
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
        'padding_site',
        [
            'label' => __( 'پدینگ', 'elementor' ),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%' ],
            'selectors' => [
                '{{WRAPPER}} .web-siteurl' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
        'margin_site',
        [
            'label' => __( 'فاصله', 'elementor' ),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%' ],
            'selectors' => [
                '{{WRAPPER}} .web-siteurl a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
              '{{WRAPPER}} .web-siteurl .title' => 'color: {{VALUE}}',
          ],
      ]
    );
    $this->add_control(
        'siteurl_hover',
        [
            'label' => __( 'هاور عنوان', 'plugin-domain' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .web-siteurl .title:hover' => 'color: {{VALUE}}',
            ],
        ]
    );

    $this->add_group_control(
        \Elementor\Group_Control_Typography::get_type(),
        [
            'name' => 'content_typography',
            'label' => __( 'تایپوگرافی', 'plugin-domain' ),
            'selector' => '{{WRAPPER}} .web-siteurl .title',
        ]
    );

    $this->end_controls_section();
  }
  

  protected function render(){
	$settings = $this->get_settings_for_display();
  ?>

    <div class="web-siteurl text-align">
        <a class="d-block title" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
    </div>


	<?php

  }
  protected function _content_template(){
  }
}
?>
