<?php

namespace WPC\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH')) exit; // Exit if accessed directly


class Taxonomy_custom extends Widget_Base{

  public function get_name(){
    return 'taxonomy-custom';
  }

  public function get_title(){
    return 'تاکسونامی‌ها';
  }

  public function get_icon(){
    return 'eicon-posts-grid';
  }

  public function get_categories(){
    return ['five-category'];
  }
      function taxonomy_crakter(){
            $honarmandan = get_the_terms(get_the_ID(), 'honarmandan');
            if(is_array($honarmandan)){
                  echo "<div class='row single-colors'>";
                  foreach($honarmandan as $crakter){
                  $crakter_id = $crakter->term_id;
                  $crakter_name = $crakter->name;
                  $crakter_url = get_term_link($crakter_id, 'honarmandan');
                  $crakter_code = get_term_meta( $crakter_id, 'pic-honarmand', true );
                  $crakter_code = ($crakter_code != '')? $crakter_code : 'inherant';
                  
                  echo "<div class='single-color crakter-ntf'><a href='$crakter_url'><img src='$crakter_code'><h6>$crakter_name</h6></a></div>";
                  }
                  echo "</div>";
            }
      }
      function taxonomy_laut(){
            $sedapishe = get_the_terms(get_the_ID(), 'sedapishegan');
            if(is_array($sedapishe)){
                  echo "<div class='row single-colors'>";
                  foreach($sedapishe as $soundh){
                  $soundh_id = $soundh->term_id;
                  $soundh_name = $soundh->name;
                  $soundh_url = get_term_link($soundh_id, 'sedapishegan');
                  $soundh_code = get_term_meta( $soundh_id, 'pic-honarmand', true );
                  $soundh_code = ($soundh_code != '')? $soundh_code : 'inherant';
                  
                  echo "<div class='single-color laut-ntf'><a href='$soundh_url'><img src='$soundh_code'><h6>$soundh_name</h6></a></div>";
                  }
                  echo "</div>";
            }
      }
      // function taxonomy_years(){
      //       $categories_years = get_the_terms(get_the_ID(),"yaers");
      //       if ( ! empty( $categories_years ) ) { 
      //             echo esc_html( $categories_years[0]->name ); 
      //       }
      // }
      // function taxonomy_categorymovie(){
      //       $categories_cat = get_the_terms(get_the_ID(),"movie_cat");
      //       if ( ! empty( $categories_cat ) ) { 
      //             echo esc_html( $categories_cat[0]->name ); 
      //       }
      // }
      // function taxonomy_worldsub_tag(){
      //       $categories_worldsub_tag = get_the_terms(get_the_ID(),"worldsub_tag");
      //       if ( ! empty( $categories_worldsub_tag ) ) { 
      //             echo esc_html( $categories_worldsub_tag[0]->name ); 
      //       }
      // }
      // function taxonomy_ages(){
      //       $categories_ages = get_the_terms(get_the_ID(),"ages");
      //       if ( ! empty( $categories_ages ) ) { 
      //             echo esc_html( $categories_ages[0]->name ); 
      //       }
      // }
      // function taxonomy_quality(){
      //       $categories_quality = get_the_terms(get_the_ID(),"quality");
      //       if ( ! empty( $categories_quality ) ) { 
      //             echo esc_html( $categories_quality[0]->name ); 
      //       }
      // }
      // function taxonomy_ganres(){
      //       $categories_ganres = get_the_terms(get_the_ID(),"ganres");
      //       if ( ! empty( $categories_ganres ) ) { 
      //             echo esc_html( $categories_ganres[0]->name ); 
      //       }
      // }
      // function taxonomy_country(){
      //       $categories_country = get_the_terms(get_the_ID(),"country");
      //       if ( ! empty( $categories_country ) ) { 
      //             echo esc_html( $categories_country[0]->name ); 
      //       }
      // }
      // function taxonomy_actors(){
      //       $categories_actors = get_the_terms(get_the_ID(),"actors");
      //       if ( ! empty( $categories_actors ) ) { 
      //             echo esc_html( $categories_actors[0]->name ); 
      //       }
      // }    
      
  protected function _register_controls(){
      $this->start_controls_section(
        'content-contorol',
        [
        'label' => __( 'تنظیمات عمومی', 'elementor' ),
        'tab' => Controls_Manager::TAB_CONTENT,
        ]
      );

      $this->add_control(
            'setting_film_lists_style',
            [
                  'label'   => esc_html__( 'انتخاب تنظیات', 'netflibs-theme' ),
                  'type'    => Controls_Manager::SELECT,
                  'default' => 'crakter_section',
                  'options' => [
                        'crakter_section' => esc_html__('بازیگران', 'netflibs-theme'),
                        'sedapishe' => esc_html__('صدا پیشگان', 'netflibs-theme'),
                  ],
            ]
      );
      $this->add_responsive_control(
            'justify',
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
                '{{WRAPPER}} .justify-content-ntf .single-colors' => 'justify-content: {{VALUE}};',
              ],
              
            ]
          );
      
      $this->end_controls_section();
      $this->start_controls_section(
        'section_content_style',
        [
            'label' => __( 'استایل', 'elementor' ),
            'tab' => Controls_Manager::TAB_STYLE,
        ]
      );

      $this->add_group_control(
        \Elementor\Group_Control_Typography::get_type(),
        [
            'name' => 'desc_typography',
            'label' => __( 'تایپوگرافی', 'plugin-domain' ),
            'selector' => '{{WRAPPER}} .carakter-style-ntf_crakter .single-color a h6,.carakter-style-ntf_sedapishe .single-color a h6',
        ]
      );
      $this->add_control(
        'margin',
        [
            'label' => __( 'فاصله', 'elementor' ),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%' ],
            'selectors' => [
                '{{WRAPPER}} .carakter-style-ntf_crakter .single-color a,.carakter-style-ntf_sedapishe .single-color a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                '{{WRAPPER}} .carakter-style-ntf_crakter .single-color a,.carakter-style-ntf_sedapishe .single-color a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .carakter-style-ntf_crakter .single-color a,.carakter-style-ntf_sedapishe .single-color a,.carakter-style-ntf_crakter .single-color img,.carakter-style-ntf_sedapishe .single-color img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
      );
      $this->add_group_control(
          \Elementor\Group_Control_Box_Shadow::get_type(),
          [
              'name' => 'box_right_buttom',
              'label' => __( 'باکس شدوو', 'plugin-domain' ),
              'selector' => '{{WRAPPER}} .carakter-style-ntf_crakter .single-color a,.carakter-style-ntf_sedapishe .single-color a',
          ]
      );
      $this->start_controls_tabs( 'style_button' );
      $this->start_controls_tab(
            'style_button_video',
            [
            'label' => esc_html__( 'عادی', 'elementor' ),
            ]
      );
      $this->add_control(
        'textetion_color',
        [
            'label' => __( 'رنگ', 'plugin-domain' ),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .carakter-style-ntf_crakter .single-color a h6,.carakter-style-ntf_sedapishe .single-color a h6' => 'color: {{VALUE}}',
            ],
        ]
      );
      $this->add_group_control(
        \Elementor\Group_Control_Background::get_type(),
        [
          'name' => 'background_cl',
          'label' => esc_html__( 'Background', 'plugin-name' ),
          'types' => [ 'classic', 'gradient' ],
          'selector' => '{{WRAPPER}} .carakter-style-ntf_crakter .single-color a,.carakter-style-ntf_sedapishe .single-color a',
        ]
      );
      $this->end_controls_tab();
      $this->start_controls_tab(
        'style_button_video_hover',
        [
              'label' => esc_html__( 'هاور', 'elementor' ),
        ]
      );
      $this->add_control(
        'textetion_color_hover',
        [
            'label' => __( 'رنگ', 'plugin-domain' ),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .carakter-style-ntf_crakter .single-color a h6:hover,.carakter-style-ntf_sedapishe .single-color a h6:hover' => 'color: {{VALUE}}',
            ],
        ]
      );
      $this->add_group_control(
        \Elementor\Group_Control_Background::get_type(),
        [
          'name' => 'background_cl_hover',
          'label' => esc_html__( 'Background', 'plugin-name' ),
          'types' => [ 'classic', 'gradient' ],
          'selector' => '{{WRAPPER}} .carakter-style-ntf_crakter .single-color a:hover,.carakter-style-ntf_sedapishe .single-color a:hover',
        ]
      );
      $this->end_controls_tab();
      $this->end_controls_tabs();
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
                '{{WRAPPER}} .carakter-style-ntf_crakter .single-color a,.carakter-style-ntf_sedapishe .single-color a' => 'border-style: {{VALUE}}',
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
                  '{{WRAPPER}} .carakter-style-ntf_crakter .single-color a,.carakter-style-ntf_sedapishe .single-color a' => 'border-width: {{SIZE}}{{UNIT}};',
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
                  '{{WRAPPER}} .carakter-style-ntf_crakter .single-color a,.carakter-style-ntf_sedapishe .single-color a' => 'border-color: {{VALUE}}',
              ],
          ]
      );
      $this->end_controls_section();
  }
  

      protected function render(){
            $settings = $this->get_settings_for_display();
            // $taxonomy_if_years = get_the_terms(get_the_ID(),"yaers");
            // $taxonomy_if_cat = get_the_terms(get_the_ID(),"movie_cat");
            // $taxonomy_if_tags = get_the_terms(get_the_ID(),"worldsub_tag");
            $taxonomy_if_honarmand = get_the_terms(get_the_ID(),"honarmandan");
            // $taxonomy_if_ages = get_the_terms(get_the_ID(),"ages");
            // $taxonomy_if_qulity = get_the_terms(get_the_ID(),"quality");
            // $taxonomy_if_ganres = get_the_terms(get_the_ID(),"ganres");
            // $taxonomy_if_country = get_the_terms(get_the_ID(),"country");
            // $taxonomy_if_actors = get_the_terms(get_the_ID(),"actors");
            $taxonomy_if_sedapishe = get_the_terms(get_the_ID(),"sedapishegan");
            
      ?>
      <div class="single-section-content">
            <?php /**----------------------------Actor--------------------------------- */ ?>
            <?php if($settings['setting_film_lists_style'] == 'crakter_section'){ ?>
                  <div class="justify-content-ntf carakter-style-ntf_crakter">
                        <?php if($taxonomy_if_honarmand){ ?>
                        <?php $this->taxonomy_crakter(); ?>
                        <?php }else{ ?> 
                              <div class="row single-colors">
                                    <h3 class="text-white">لیست بازیگران</h3>
                                    <div class="single-color">
                                          <a href="#">
                                                <img src="<?php echo path; ?>/img/the-rock.jpg">
                                                <h6>راک</h6>
                                          </a>
                                    </div>
                              </div>      
                        <?php } ?>
                  </div>
            <?php } ?>
            <?php /**----------------------------Laut--------------------------------- */ ?>
            <?php if($settings['setting_film_lists_style'] == 'sedapishe'){ ?>
                  <div class="justify-content-ntf carakter-style-ntf_sedapishe">
                        <?php if($taxonomy_if_sedapishe){ ?>
                        <?php $this->taxonomy_laut(); ?>
                        <?php }else{ ?> 
                              <div class="row single-colors">
                                    <h3 class="text-white">لیست بازیگران</h3>
                                    <div class="single-color">
                                          <a href="#">
                                                <img src="<?php echo path; ?>/img/the-rock.jpg">
                                                <h6>راک</h6>
                                          </a>
                                    </div>
                              </div>      
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
