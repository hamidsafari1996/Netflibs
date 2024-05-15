<?php

namespace WPC\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH')) exit; // Exit if accessed directly


class Film_sidebar extends Widget_Base{

  public function get_name(){
    return 'film_sidebar';
  }

  public function get_title(){
    return 'سایدبار فیلم';
  }

  public function get_icon(){
    return 'eicon-sidebar';
  }

  public function get_categories(){
    return ['tree-category'];
  }

  protected function _register_controls(){

    $this->start_controls_section(
        'section_sidebar_setting',
        [
            'label' => __( 'تنظیمات دسته فیلم', 'elementor' ),
        ]
    );
    $this->add_control(
      'netflibs_select_products_lists_style',
      [
          'label'   => esc_html__( 'انتخاب استایل', 'sigma-theme' ),
          'type'    => Controls_Manager::SELECT,
          'default' => 'style01_products_lists',
          'options' => [
              'style01_products_lists' => esc_html__('استایل اول', 'sigma-theme'),
              'style02_products_lists' => esc_html__('استایل دوم', 'sigma-theme'),
          ],
      ]
  );
  $this->add_control(
      'netflibs_select_products_lists_style01',
      [
          'raw' => '<img class="admin_select_img_style" src="'.get_template_directory_uri().'/img/element-img/sidebar-1-min.png">',
          'type' => Controls_Manager::RAW_HTML,
          'condition' => [
              'netflibs_select_products_lists_style' => 'style01_products_lists',
          ],      				
      ]
  );        

  $this->add_control(
      'netflibs_select_products_lists_style02',
      [
          'raw' => '<img  
              class="admin_select_img_style" src="'.get_template_directory_uri().'/img/element-img/sidebar-2-min.png">',
          'type' => Controls_Manager::RAW_HTML,
          'condition' => [
              'netflibs_select_products_lists_style' => 'style02_products_lists',
          ],      				
      ]
  ); 
    $this->add_control(
      'post_type',
      [
          'label' => __( 'انتخاب پست تایپ', 'plugin-domain' ),
          'type' => \Elementor\Controls_Manager::SELECT,
          'default' => 'coagex_movie',
          'options' => [
              'coagex_movie'  => __( 'فیلم و سریال', 'plugin-domain' ),
              'product' => __( 'ووکامرس', 'plugin-domain' ),
          ],
      ]
    );
    $this->add_control(
        'taxonomy',
        [
            'label' => __( 'بارگذاری بر اساس', 'plugin-domain' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'default' => 'movie_cat',
            'options' => [
                'movie_cat'  => __( ' دسته‌بندی', 'plugin-domain' ),
                'worldsub_tag' => __( 'برچسب', 'plugin-domain' ),
                'product_cat'  => __( 'دسته‌بندی ووکامرس', 'plugin-domain' ),
                'product_tag' => __( 'برچسب ووکامرس', 'plugin-domain' ),
                'honarmandan' => __( 'هنرمندان', 'plugin-domain' ),
                'ages' => __( 'سن', 'plugin-domain' ),
                'yaers' => __( 'سال ساخت', 'plugin-domain' ),
                'quality' => __( 'کیفیت', 'plugin-domain' ),
                'ganres' => __( 'ژانر', 'plugin-domain' ),
            ],
        ]
    );
    $this->add_control(
        'filter',
        [
            'label' => __( 'فیلتر بر اساس', 'plugin-domain' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'default' => 'title',
            'options' => [
                'title'  => __( 'عنوان', 'plugin-domain' ),
                'date' => __( 'تاریخ', 'plugin-domain' ),
                'rand' => __( 'تصادفی', 'plugin-domain' ),
                'count_comment' => __( 'تعداد نظرات', 'plugin-domain' ),
                'author' => __( 'نویسنده', 'plugin-domain' ),
                'ID' => __( 'آیدی پست', 'plugin-domain' ),
            ],
        ]
    );
    $this->add_control(
        'tartib',
        [
            'label' => __( 'ترتیب بر اساس', 'plugin-domain' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'default' => 'ASC',
            'options' => [
                'ASC'  => __( 'صعودی', 'plugin-domain' ),
                'DESC' => __( 'نزولی', 'plugin-domain' ),
            ],
        ]
    );
    $this->add_control(
        'button_name',
        [
          'label' => 'نامک دسته',
          'type' => \Elementor\Controls_Manager::TEXT,
        'description' => 'نامک دسته بندی مثلا: best'
        ]
    );
    $this->add_control(
        'price',
        [
            'label' => __( 'تعداد نمایش', 'plugin-domain' ),
            'type' => \Elementor\Controls_Manager::NUMBER,
            'min' => 1,
            'max' => 100,
            'step' => 1,
            'default' => 5,
        ]
    );


    $this->end_controls_section();
    $this->start_controls_section(
        'section_content_style',
        [
            'label' => __( 'استایل عمومی', 'elementor' ),
            'tab' => Controls_Manager::TAB_STYLE,
        ]
    );
    $this->add_responsive_control(
      'width_cardfilme03',
      [
          'label' => __( 'عرض کارد', 'elementor' ),
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
          'size_units' => [ 'px','%'],
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
              '{{WRAPPER}} .section-side-port,.sid-film-card' => 'max-width: {{SIZE}}{{UNIT}};',
          ],
      ]
  );
  $this->add_responsive_control(
      'flex_cardfilme03',
      [
          'label' => __( 'فلکس', 'elementor' ),
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
          'size_units' => [ 'px','%'],
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
              '{{WRAPPER}} .section-side-port,.sid-film-card' => 'flex:0 0 {{SIZE}}{{UNIT}};',
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
              '{{WRAPPER}} .section-sidebar-film,.sid-film-card' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
          ],
      ]
    );
    $this->add_control(
      'border-radius',
      [
          'label' => __( 'گوشه های مدور', 'elementor' ),
          'type' => Controls_Manager::DIMENSIONS,
          'size_units' => [ 'px', '%' ],
          'selectors' => [
              '{{WRAPPER}} .section-sidebar-film .cover-film figure img, .section-sidebar-film .cover-film .content-cover,.sid-film-card' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
          ],
      ]
    );
    $this->add_group_control(
      \Elementor\Group_Control_Background::get_type(),
      [
          'name' => 'background_timebutton',
          'label' => esc_html__( 'Background', 'plugin-name' ),
          'types' => [ 'classic', 'gradient' ],
          'selector' => '{{WRAPPER}} .sid-film-card',
      ]
    );
    $this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'box_shadow',
				'label' => __( 'باکس شدوو', 'plugin-domain' ),
				'selector' => '{{WRAPPER}} .section-sidebar-film .cover-film figure img,.sid-film-card',
			]
		);
    $this->end_controls_section();
    $this->start_controls_section(
      'section_count_style',
      [
          'label' => __( 'استایل محتوا', 'elementor' ),
          'tab' => Controls_Manager::TAB_STYLE,
          'condition' => [
            'netflibs_select_products_lists_style' => 'style01_products_lists',
        ], 
      ],
      
    );
    
    $this->add_control(
			'more_options_title',
			[
				'label' => __( 'استایل عنوان', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
    $this->add_control(
      'color_title',
      [
          'label' => __( 'رنگ عنوان', 'plugin-domain' ),
          'type' => Controls_Manager::COLOR,
          'default' => '',
          'selectors' => [
              '{{WRAPPER}} .section-sidebar-film .cover-film .content-cover span.title' => 'color: {{VALUE}}',
          ],
      ]
    );
    $this->add_group_control(
      \Elementor\Group_Control_Typography::get_type(),
      [
          'name' => 'title__typography',
          'label' => __( 'تایپوگرافی عنوان', 'plugin-domain' ),
          'selector' => '{{WRAPPER}} .section-sidebar-film .cover-film .content-cover span.title',
      ]
    );
    $this->add_control(
			'more_options_eye',
			[
				'label' => __( 'استایل بازدید', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
    $this->add_control(
      'color_eye',
      [
          'label' => __( 'رنگ بازدید', 'plugin-domain' ),
          'type' => Controls_Manager::COLOR,
          'default' => '',
          'selectors' => [
              '{{WRAPPER}} .section-sidebar-film .cover-film .content-cover span.eye' => 'color: {{VALUE}}',
              '{{PRAPPER}} .section-sidebar-film .cover-film .content-cover span.eye' => 'border-color: {{VALUE}}',
          ],
      ]
    );
    $this->add_group_control(
      \Elementor\Group_Control_Typography::get_type(),
      [
          'name' => 'eye__typography',
          'label' => __( 'تایپوگرافی بازدید', 'plugin-domain' ),
          'selector' => '{{WRAPPER}} .section-sidebar-film .cover-film .content-cover span.eye',
      ]
    );
    $this->add_control(
      'icon_select',
      [
          'label' => __( 'آیکون', 'text-domain' ),
          'type' => \Elementor\Controls_Manager::ICONS,
          'default' => [
              'value' => 'fas fa-play',
              'library' => 'solid',
          ],
      ]
    );
    $this->end_controls_section();
    $this->start_controls_section(
      'section_count_style02',
      [
          'label' => __( 'استایل محتوا', 'elementor' ),
          'tab' => Controls_Manager::TAB_STYLE,
          'condition' => [
            'netflibs_select_products_lists_style' => 'style02_products_lists',
        ], 
      ],
      
    );
    $this->add_responsive_control(
      'width_img',
      [
          'label' => __( 'عرض تصویر', 'elementor' ),
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
          'size_units' => [ 'px','%'],
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
              '{{WRAPPER}} .sid-film-card .img-card' => 'width: {{SIZE}}{{UNIT}};',
          ],
      ]
  );
  $this->add_responsive_control(
      'height_img',
      [
          'label' => __( 'ارتفاع تصویر', 'elementor' ),
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
          'size_units' => [ 'px','%'],
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
              '{{WRAPPER}} .sid-film-card .img-card' => 'height: {{SIZE}}{{UNIT}};',
          ],
      ]
    );
    $this->add_control(
      'more_optionsstyle03_title',
      [
          'label' => __( 'تنظیمات عنوان', 'plugin-name' ),
          'type' => \Elementor\Controls_Manager::HEADING,
          'separator' => 'before',
      ]
  );
    $this->start_controls_tabs( 'style_button03' );
    $this->start_controls_tab(
        'style_button_title03',
        [
        'label' => esc_html__( 'عادی', 'elementor' ),
        ]
    );
    $this->add_control(
        'filmer_title03',
        [
            'label' => __( 'رنگ عنوان', 'plugin-domain' ),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .sid-film-card .content-more-car h3.title-content a' => 'color: {{VALUE}}',
            ],
        ]
    );
    $this->add_group_control(
        \Elementor\Group_Control_Typography::get_type(),
        [
            'name' => 'tilefimer03_typography',
            'label' => __( 'تایپوگرافی', 'plugin-domain' ),
            'selector' => '{{WRAPPER}} .sid-film-card .content-more-car h3.title-content a',
        ]
    );
    $this->end_controls_tab();
    $this->start_controls_tab(
        'style_button_03_hover',
        [
              'label' => esc_html__( 'هاور', 'elementor' ),
        ]
    );
    $this->add_control(
        'clhfilmer03_button',
        [
            'label' => __( 'هاور عنوان', 'plugin-domain' ),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .sid-film-card .content-more-car h3.title-content a:hover' => 'color: {{VALUE}}',
            ],
        ]
    );
    $this->end_controls_tab();
    $this->end_controls_tabs();
    $this->add_control(
      'more_tax_title',
      [
          'label' => __( 'تنظیمات ژانر', 'plugin-name' ),
          'type' => \Elementor\Controls_Manager::HEADING,
          'separator' => 'before',
      ]
    );
    $this->start_controls_tabs( 'style_ganre' );
    $this->start_controls_tab(
        'style_ganre_defult',
        [
        'label' => esc_html__( 'عادی', 'elementor' ),
        ]
    );
    $this->add_control(
        'filmer_ganre',
        [
            'label' => __( 'رنگ عنوان', 'plugin-domain' ),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .sid-film-card .content-cat a,.sid-film-card .content-cat' => 'color: {{VALUE}}',
            ],
        ]
    );
    $this->add_group_control(
        \Elementor\Group_Control_Typography::get_type(),
        [
            'name' => 'ganre_typography',
            'label' => __( 'تایپوگرافی', 'plugin-domain' ),
            'selector' => '{{WRAPPER}} .sid-film-card .content-cat a',
        ]
    );
    $this->end_controls_tab();
    $this->start_controls_tab(
        'style_ganre_hover',
        [
              'label' => esc_html__( 'هاور', 'elementor' ),
        ]
    );
    $this->add_control(
        'ganre_button',
        [
            'label' => __( 'هاور عنوان', 'plugin-domain' ),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .sid-film-card .content-cat a:hover' => 'color: {{VALUE}}',
            ],
        ]
    );
    $this->end_controls_tab();
    $this->end_controls_tabs();
    $this->add_control(
      'more_tax_icon',
      [
          'label' => __( 'تنظیمات آیکون', 'plugin-name' ),
          'type' => \Elementor\Controls_Manager::HEADING,
          'separator' => 'before',
      ]
    );
    $this->start_controls_tabs( 'button03' );
    $this->start_controls_tab(
        'icon_defult',
        [
        'label' => esc_html__( 'عادی', 'elementor' ),
        ]
    );
    $this->add_control(
        'icon_color',
        [
            'label' => __( 'رنگ آیکون', 'plugin-domain' ),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .sid-film-card .left-content span.icon svg' => 'color: {{VALUE}}',
            ],
        ]
    );
    $this->add_group_control(
      \Elementor\Group_Control_Background::get_type(),
      [
          'name' => 'background_icon',
          'label' => esc_html__( 'Background', 'plugin-name' ),
          'types' => [ 'classic', 'gradient' ],
          'selector' => '{{WRAPPER}} .sid-film-card .left-content span.icon',
      ]
    );
    $this->end_controls_tab();
    $this->start_controls_tab(
        'icon_hover',
        [
              'label' => esc_html__( 'هاور', 'elementor' ),
        ]
    );
    $this->add_control(
        'icon_hover_color',
        [
            'label' => __( 'هاور آیکون', 'plugin-domain' ),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .sid-film-card .left-content span.icon:hover svg' => 'color: {{VALUE}}',
            ],
        ]
    );
    $this->add_group_control(
      \Elementor\Group_Control_Background::get_type(),
      [
          'name' => 'background_icon_hover',
          'label' => esc_html__( 'Background', 'plugin-name' ),
          'types' => [ 'classic', 'gradient' ],
          'selector' => '{{WRAPPER}} .sid-film-card .left-content span.icon:hover',
      ]
    );
    $this->end_controls_tab();
    $this->end_controls_tabs();
    
    $this->add_group_control(
      \Elementor\Group_Control_Typography::get_type(),
      [
          'name' => 'icon__typography',
          'label' => __( 'تایپوگرافی آیکون', 'plugin-domain' ),
          'selector' => '{{WRAPPER}} .sid-film-card .left-content span.icon svg',
      ]
    );
    $this->add_control(
      'icon_select_03',
      [
          'label' => __( 'آیکون', 'text-domain' ),
          'type' => \Elementor\Controls_Manager::ICONS,
          'default' => [
              'value' => 'fas fa-play',
              'library' => 'solid',
          ],
      ]
    );
    $this->end_controls_section();
  }
  

  protected function render(){
    $settings = $this->get_settings_for_display();
    ?>
    <div class="row mx-0">
      <?php
      $post_type = $settings['post_type'];
      $tax = $settings['button_name'];
      $filter = $settings['filter'];
      $soth = $settings['tartib'];
      $number = $settings['price'];
      $cat = $settings['taxonomy'];
      $best_product = array(
          'post_type' => $post_type,
          'orderby' => $filter,
            'order' => $soth,
          'posts_per_page' => $number,
          'tax_query' => array(
              array(
                  'taxonomy' => $cat,
                  'field' => 'slug',
                  'terms' => $tax,
              ),
          ),
    );
    $show_best_product = new \WP_Query($best_product);
    while($show_best_product->have_posts()) : $show_best_product->the_post();
    $cover_img = get_post_meta(get_the_ID(),'imagev',true);
    ?>
    <?php if($settings['netflibs_select_products_lists_style'] == 'style01_products_lists'){ ?>
    <div class="section-side-port">
      <div class="section-sidebar-film">
        <a href="<?php the_permalink(); ?>">
          <div class="cover-film position-relative">
            <figure>
              <img src="<?php echo $cover_img; ?>" alt="<?php the_title(); ?>" class="w-100">
            </figure>
              <div class="position-absolute content-cover d-flex align-items-center">
                  <div class="col-7 text-right">
                    <span class="title"><?php the_title(); ?></span>
                  </div>
                  <div class="col-5 text-left">
                    <span class="eye"><i class="fas fa-eye ml-1"></i>بازدید<?php the_views(); ?></span>
                  </div>
              </div>
          </div>
        </a>
      </div>
    </div>
    <?php } ?>
    <?php if($settings['netflibs_select_products_lists_style'] == 'style02_products_lists'){ ?>
        <div class="sid-film-card d-flex align-items-center">
            <div class="img-card">
              <a href="<?php the_permalink(); ?>">
                <img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
              </a>
            </div>
            <div class="content-more-car d-flex align-items-center w-100">
              <div class="col-6 px-0 text-right">
                <div class="right-content pr-2">
                  <h3 class="title-content mb-3"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                  <div class="content-cat">
                  <?php the_terms(get_the_ID(),"ganres","","-"); ?>
                  </div>
                </div>
              </div>
              <div class="col-6 px-0 text-left">
                <div class="left-content pl-4">
                  <a href="<?php the_permalink(); ?>">
                    <span class="icon">
                      <?php \Elementor\Icons_Manager::render_icon( $settings['icon_select_03'], [ 'aria-hidden' => 'true' ] ); ?>
                    </span>
                  </a>
                </div>
              </div>
            </div>
        </div>
    <?php } ?> 
      <?php endwhile; wp_reset_postdata(); ?>
      </div>
    <?php
  }

  protected function _content_template(){
    
  }
}