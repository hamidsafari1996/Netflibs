<?php

namespace WPC\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH')) exit; // Exit if accessed directly


class view_button extends Widget_Base
{

      public function get_name()
      {
            return 'view-button';
      }

      public function get_title()
      {
            return 'تعداد بازدید';
      }

      public function get_icon()
      {
            return 'fas fa-eye';
      }

      public function get_categories()
      {
            return ['five-category'];
      }

      protected function _register_controls()
      {
            $this->start_controls_section(
                  'section_button_style',
                  [
                        'label' => __('تنظیمات عمومی', 'elementor'),
                        'tab' => Controls_Manager::TAB_CONTENT,
                  ]
            );
            $this->add_control(
                  'show_icon',
                  [
                        'label' => esc_html__('نمایش آیکون', 'plugin-name'),
                        'type' => \Elementor\Controls_Manager::SWITCHER,
                        'label_on' => esc_html__('Show', 'your-plugin'),
                        'label_off' => esc_html__('Hide', 'your-plugin'),
                        'return_value' => 'yes',
                        'default' => 'yes',
                  ]
            );
            $this->add_control(
                  'show_number',
                  [
                        'label' => esc_html__('نمایش عدد', 'plugin-name'),
                        'type' => \Elementor\Controls_Manager::SWITCHER,
                        'label_on' => esc_html__('Show', 'your-plugin'),
                        'label_off' => esc_html__('Hide', 'your-plugin'),
                        'return_value' => 'yes',
                        'default' => 'yes',
                  ]
            );
            $this->add_control(
                  'show_title',
                  [
                        'label' => esc_html__('نمایش نام', 'plugin-name'),
                        'type' => \Elementor\Controls_Manager::SWITCHER,
                        'label_on' => esc_html__('Show', 'your-plugin'),
                        'label_off' => esc_html__('Hide', 'your-plugin'),
                        'return_value' => 'yes',
                        'default' => 'yes',
                  ]
            );
            $this->add_control(
			'widget_title',
			[
				'label' => esc_html__( 'نام', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'بازدید', 'plugin-name' ),
				'placeholder' => esc_html__( 'Type your title here', 'plugin-name' ),
			]
		);
            $this->end_controls_section();
            $this->start_controls_section(
                  'section_button_style',
                  [
                        'label' => __('استایل', 'elementor'),
                        'tab' => Controls_Manager::TAB_STYLE,
                  ]
            );
            $this->add_responsive_control(
                  'align',
                  [
                        'label' => __('Alignment', 'elementor'),
                        'type' => Controls_Manager::CHOOSE,
                        'options' => [
                              'left' => [
                                    'title' => __('Left', 'elementor'),
                                    'icon' => 'eicon-text-align-left',
                              ],
                              'center' => [
                                    'title' => __('Center', 'elementor'),
                                    'icon' => 'eicon-text-align-center',
                              ],
                              'right' => [
                                    'title' => __('Right', 'elementor'),
                                    'icon' => 'eicon-text-align-right',
                              ],
                        ],
                        'selectors' => [
                              '{{WRAPPER}} .view-style-elementor' => 'text-align: {{VALUE}};',
                        ],
                  ]
            );

            $this->add_control(
                  'icon_color',
                  [
                        'label' => __('رنگ آیکون', 'plugin-domain'),
                        'type' => Controls_Manager::COLOR,
                        'default' => '',
                        'selectors' => [
                              '{{WRAPPER}} .view-style-elementor .view-sec .icon svg' => 'color: {{VALUE}}',
                        ],
                  ]
            );
            $this->add_control(
                  'number_color',
                  [
                        'label' => __('رنگ متن', 'plugin-domain'),
                        'type' => Controls_Manager::COLOR,
                        'default' => '',
                        'selectors' => [
                              '{{WRAPPER}} .view-style-elementor .view-sec .number,.view-style-elementor .view-sec .text-name' => 'color: {{VALUE}}',
                        ],
                  ]
            );
            $this->add_group_control(
                  \Elementor\Group_Control_Typography::get_type(),
                  [
                        'name' => 'content_typography',
                        'label' => __('تایپوگرافی', 'plugin-domain'),
                        'selector' => '{{WRAPPER}} .view-style-elementor .view-sec',
                  ]
            );
            $this->add_control(
                  'margin_site',
                  [
                        'label' => __('فاصله', 'elementor'),
                        'type' => Controls_Manager::DIMENSIONS,
                        'size_units' => ['px', '%'],
                        'selectors' => [
                              '{{WRAPPER}} .view-style-elementor .view-sec' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                  ]
            );
            $this->add_control(
                  'padding_site',
                  [
                        'label' => __('پدینگ', 'elementor'),
                        'type' => Controls_Manager::DIMENSIONS,
                        'size_units' => ['px', '%'],
                        'selectors' => [
                              '{{WRAPPER}} .view-style-elementor .view-sec' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                  ]
            );

            $this->add_control(
                  'border_site',
                  [
                        'label' => __('گوشه های مدور', 'elementor'),
                        'type' => Controls_Manager::DIMENSIONS,
                        'size_units' => ['px', '%'],
                        'selectors' => [
                              '{{WRAPPER}} .view-style-elementor .view-sec' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                  ]
            );
            $this->add_group_control(
                  \Elementor\Group_Control_Background::get_type(),
                  [
                        'name' => 'background_cl_hover',
                        'label' => esc_html__('Background', 'plugin-name'),
                        'types' => ['classic', 'gradient'],
                        'selector' => '{{WRAPPER}} .view-style-elementor .view-sec',
                  ]
            );
            $this->add_group_control(
                  \Elementor\Group_Control_Box_Shadow::get_type(),
                  [
                        'name' => 'box_right_buttom',
                        'label' => __('باکس شدوو', 'plugin-domain'),
                        'selector' => '{{WRAPPER}} .view-style-elementor .view-sec',
                  ]
            );
            $this->add_control(
                  'more_options_border_right',
                  [
                        'label' => __('تنظیمات بردر', 'plugin-name'),
                        'type' => \Elementor\Controls_Manager::HEADING,
                        'separator' => 'before',
                  ]
            );
            $this->add_control(
                  'border_style',
                  [
                        'label' => __('استایل بردر', 'plugin-domain'),
                        'type' => \Elementor\Controls_Manager::SELECT,
                        'default' => 'none',
                        'options' => [
                              'solid'  => __('Solid', 'plugin-domain'),
                              'dashed' => __('Dashed', 'plugin-domain'),
                              'dotted' => __('Dotted', 'plugin-domain'),
                              'double' => __('Double', 'plugin-domain'),
                              'groove' => __('Groove', 'plugin-domain'),
                              'ridge' => __('Ridge', 'plugin-domain'),
                              'none' => __('None', 'plugin-domain'),
                        ],
                        'selectors' => [
                              '{{WRAPPER}} .view-style-elementor .view-sec' => 'border-style: {{VALUE}}',
                        ],
                  ]
            );
            $this->add_responsive_control(
                  'width_border',
                  [
                        'label' => __('عرض بردر', 'elementor'),
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
                        'size_units' => ['px'],
                        'range' => [
                              'px' => [
                                    'min' => 1,
                                    'max' => 1000,
                              ],
                        ],
                        'selectors' => [
                              '{{WRAPPER}} .view-style-elementor .view-sec' => 'border-width: {{SIZE}}{{UNIT}};',
                        ],
                  ]
            );
            $this->add_control(
                  'bg_button',
                  [
                        'label' => __('رنگ بردر', 'plugin-domain'),
                        'type' => Controls_Manager::COLOR,
                        'default' => '',
                        'selectors' => [
                              '{{WRAPPER}} .view-style-elementor .view-sec' => 'border-color: {{VALUE}}',
                        ],
                  ]
            );
            $this->end_controls_section();
      }


      protected function render()
      {
            $settings = $this->get_settings_for_display();
?>
            <div class="view-style-elementor">
                  <div class="view-sec">
                        <?php if ('yes' === $settings['show_icon']) { ?>
                              <span class="icon"><i class="fas fa-eye"></i></span>
                        <?php }
                        if ('yes' === $settings['show_number']) { ?>
                              <span class="number"><?php the_views(); ?> </span>
                        <?php }
                        if ('yes' === $settings['show_title']) { ?>
                              <span class="text-name"><?php echo $settings['widget_title']; ?></span>
                        <?php } ?>
                  </div>
            </div>


<?php

      }
      protected function _content_template()
      {
      }
}
?>