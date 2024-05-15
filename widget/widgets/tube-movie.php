<?php

namespace WPC\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH')) exit; // Exit if accessed directly


class Youtube_movie extends Widget_Base{

  public function get_name(){
    return 'youtube_movie';
  }

  public function get_title(){
    return 'کوئری فیلم 3';
  }

  public function get_icon(){
    return 'eicon-youtube';
  }

  public function get_categories(){
    return ['tree-category'];
  }

  protected function _register_controls(){

    $this->start_controls_section(
        'section_modal_style',
        [
            'label' => __( 'تنظیمات دسته فیلم', 'elementor' ),
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
            'min' => 5,
            'max' => 100,
            'step' => 1,
            'default' => 5,
        ]
    );
    $this->add_control(
        'show_img',
        [
            'label' => __( 'نمایش تصویر', 'plugin-domain' ),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'label_on' => __( 'Show', 'your-plugin' ),
            'label_off' => __( 'Hide', 'your-plugin' ),
            'return_value' => 'yes',
            'default' => 'yes',
        ]
    );
    $this->add_control(
        'show_avatar',
        [
            'label' => __( 'نمایش آواتار', 'plugin-domain' ),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'label_on' => __( 'Show', 'your-plugin' ),
            'label_off' => __( 'Hide', 'your-plugin' ),
            'return_value' => 'yes',
            'default' => 'yes',
        ]
    );
    $this->add_control(
        'show_title',
        [
            'label' => __( 'نمایش عنوان', 'plugin-domain' ),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'label_on' => __( 'Show', 'your-plugin' ),
            'label_off' => __( 'Hide', 'your-plugin' ),
            'return_value' => 'yes',
            'default' => 'yes',
        ]
    );
    $this->add_control(
        'show_name',
        [
            'label' => __( 'نمایش نام', 'plugin-domain' ),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'label_on' => __( 'Show', 'your-plugin' ),
            'label_off' => __( 'Hide', 'your-plugin' ),
            'return_value' => 'yes',
            'default' => 'yes',
        ]
    );
    $this->add_control(
        'show_views',
        [
            'label' => __( 'نمایش تعداد بازدید', 'plugin-domain' ),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'label_on' => __( 'Show', 'your-plugin' ),
            'label_off' => __( 'Hide', 'your-plugin' ),
            'return_value' => 'yes',
            'default' => 'yes',
        ]
    );
    $this->add_control(
        'show_time',
        [
            'label' => __( 'نمایش مدت زمان فیلم', 'plugin-domain' ),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'label_on' => __( 'Show', 'your-plugin' ),
            'label_off' => __( 'Hide', 'your-plugin' ),
            'return_value' => 'yes',
            'default' => 'yes',
        ]
    );
    $this->add_control(
        'show_bookmark',
        [
            'label' => __( 'نمایش بوک مارک', 'plugin-domain' ),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'label_on' => __( 'Show', 'your-plugin' ),
            'label_off' => __( 'Hide', 'your-plugin' ),
            'return_value' => 'yes',
            'default' => 'yes',
        ]
    );
    $this->end_controls_section();
    $this->start_controls_section(
        'section_style_box',
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
                '{{WRAPPER}} .youtube' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
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
                '{{WRAPPER}} .youtube' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
            ],
        ]
    );
    $this->add_control(
        'img_options',
        [
            'label' => __( 'تنظیمات تصویر', 'plugin-name' ),
            'type' => \Elementor\Controls_Manager::HEADING,
            'separator' => 'before',
        ]
    );
    $this->add_responsive_control(
        'width',
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
                '{{WRAPPER}} .youtube .figure a img' => 'width: {{SIZE}}{{UNIT}};',
            ],
        ]
    );
    $this->add_responsive_control(
        'height',
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
                '{{WRAPPER}} .youtube .figure a img' => 'height: {{SIZE}}{{UNIT}};',
            ],
        ]
    );
    $this->add_control(
        'border_img',
        [
            'label' => __( 'گوشه‌های مدور تصویر', 'elementor' ),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%' ],
            'selectors' => [
                '{{WRAPPER}} .youtube .figure a img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
            ],
        ]
    );
    $this->add_group_control(
        \Elementor\Group_Control_Box_Shadow::get_type(),
        [
            'name' => 'shadow',
            'label' => __( 'باکس شدوو', 'plugin-domain' ),
            'selector' => '{{WRAPPER}} .youtube .figure a img',
        ]
    );
    $this->add_control(
        'avatar_options',
        [
            'label' => __( 'تنظیمات آواتار', 'plugin-name' ),
            'type' => \Elementor\Controls_Manager::HEADING,
            'separator' => 'before',
        ]
    );
    $this->add_control(
        'border_avatar',
        [
            'label' => __( 'گوشه‌های مدور', 'elementor' ),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%' ],
            'selectors' => [
                '{{WRAPPER}} .youtube .header span img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
            ],
        ]
    );
    $this->add_group_control(
        \Elementor\Group_Control_Box_Shadow::get_type(),
        [
            'name' => 'shadow_avatar',
            'label' => __( 'باکس شدوو', 'plugin-domain' ),
            'selector' => '{{WRAPPER}} .youtube .header span img',
        ]
    );
    $this->add_control(
        'namesite_options',
        [
            'label' => __( 'تنظیمات محتوا', 'plugin-name' ),
            'type' => \Elementor\Controls_Manager::HEADING,
            'separator' => 'before',
        ]
    );
    $this->add_control(
        'title',
        [
            'label' => __( 'رنگ عنوان', 'plugin-domain' ),
            'type' => Controls_Manager::COLOR,
            'default' => '#fff',
            'selectors' => [
                '{{WRAPPER}} .youtube .header span h3 a' => 'color: {{VALUE}}',
            ],
        ]
    );
    $this->add_control(
        'title_hover',
        [
            'label' => __( 'هاور عنوان', 'plugin-domain' ),
            'type' => Controls_Manager::COLOR,
            'default' => '#fff',
            'selectors' => [
                '{{WRAPPER}} .youtube .header span h3 a:hover' => 'color: {{VALUE}}',
            ],
        ]
    );
    $this->add_group_control(
        \Elementor\Group_Control_Typography::get_type(),
        [
            'name' => 'title_typography',
            'label' => __( 'تایپوگرافی', 'plugin-domain' ),
            'selector' => '{{WRAPPER}} .youtube .header span h3 a',
        ]
    );
    $this->add_control(
        'bookmark_bg',
        [
            'label' => __( 'رنگ پس زمینه بوک مارک', 'plugin-domain' ),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .youtube .faverit-button button.simplefavorite-button' => 'background: {{VALUE}}',
            ],
        ]
    );
    $this->add_control(
        'bookmark_color',
        [
            'label' => __( 'رنگ آیکون بوک مارک', 'plugin-domain' ),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .youtube .faverit-button button.simplefavorite-button svg' => 'color: {{VALUE}}',
            ],
        ]
    );
    $this->add_control(
        'title_views',
        [
            'label' => __( 'رنگ', 'plugin-domain' ),
            'type' => Controls_Manager::COLOR,
            'default' => '#6c757d',
            'selectors' => [
                '{{WRAPPER}} .youtube .footer' => 'color: {{VALUE}}',
            ],
        ]
    );
    $this->add_group_control(
        \Elementor\Group_Control_Typography::get_type(),
        [
            'name' => 'title_typography_views',
            'label' => __( 'تایپوگرافی', 'plugin-domain' ),
            'selector' => '{{WRAPPER}} .youtube .footer',
        ]
    );
    $this->add_responsive_control(
        'margin-right',
        [
            'label' => __( 'فاصله از راست', 'elementor' ),
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
                '{{WRAPPER}} .youtube .footer' => 'margin-right: {{SIZE}}{{UNIT}};',
            ],
        ]
    );
    $this->end_controls_section();

  }
  

  protected function render(){
    $settings = $this->get_settings_for_display();
    ?>

<div class="row mx-auto bock">

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
    
    ?>
    <?php $time_movie = get_post_meta(get_the_ID(),'text-time',true); ?>
    <div class="d-block text-right youtube position-relative">
    <div class="figure">
    <?php if ( 'yes' === $settings['show_img'] ) { ?>
        <a href="<?php the_permalink(); ?>">
            <img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
        </a>
    <?php } ?>
    </div>
    <?php if ( 'yes' === $settings['show_bookmark'] ) {
        ?>
        <?php global $user_ID; ?> 
        <?php if($user_ID){ ?>
            <div class="position-absolute faverit-button  ">
                <?php echo do_shortcode('[favorite_button]'); ?>
            </div> 
            <?php }else{ ?>
            <div class="position-absolute faverit-button-error  ">
                <button class="simplefavorite-button">
                    <i class="far fa-bookmark"></i>
                </button>
            </div> 
        <?php } ?>
        <?php   
        } ?>
    <div class="header d-flex mt-1">
    <?php
    $user = wp_get_current_user();
    
    if ( $user ) :
        ?>
        <?php if ( 'yes' === $settings['show_avatar'] ) { ?>
        <span><img src="<?php echo esc_url( get_avatar_url( $user->ID ) ); ?>" alt="<?php the_title(); ?>" class="bg-white width-img"></span>
        <?php } ?>
        <?php endif; ?>
        <?php if ( 'yes' === $settings['show_title'] ) { ?>
        <span class="mr-2 mt-2"><h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3></span>
        <?php } ?>
    </div>
    <div class="footer">
        <?php if ( 'yes' === $settings['show_name'] ) { ?>
        <span><h5 class="mb-2"><?php echo bloginfo('name'); ?></h5></span>
        <?php } ?>
        <?php if ( 'yes' === $settings['show_views'] ) { ?>
        <span class="d-inline"><?php the_views(); ?> بازدید</span>
        .
        <?php } ?>


        <?php
        $select_sethand = get_post_meta( get_the_ID(), 'imDb_select', true );
        if ( 'defult-select' === $select_sethand ){ ?>
        <?php if ( 'yes' === $settings['show_time'] ) { ?>
        <span class="d-inline"><?php echo $time_movie ?></span>
        <?php } ?>
        <?php } ?>
        <?php
        if ( 'imdb-tabligh' === $select_sethand ){ ?>
        <?php
        $imbd_link = get_post_meta(get_the_ID(),'link',true);
        $IMDB = new \IMDB($imbd_link); 
        ?>
        <?php if ( 'yes' === $settings['show_time'] ) { ?>
        <span class="d-inline"><?php if ($IMDB->isReady) { print_r($IMDB->getRuntime()); } else { echo ''; } ?></span>
        <?php } ?>
        <?php } ?>
        


    </div>
    
    </div>
    <?php endwhile; wp_reset_postdata(); ?>


</div>


    <?php
  }

  protected function _content_template(){
    
  }
}