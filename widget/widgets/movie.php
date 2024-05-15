<?php

namespace WPC\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH')) exit; // Exit if accessed directly


class Movienet extends Widget_Base{

  public function get_name(){
    return 'movienet';
  }

  public function get_title(){
    return 'کوئری فیلم';
  }

  public function get_icon(){
    return 'eicon-post-list';
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
                'movie_cat'  => __( 'دسته‌بندی', 'plugin-domain' ),
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
        'show_imdb',
        [
            'label' => __( 'نمایش امتیاز', 'plugin-domain' ),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'label_on' => __( 'Show', 'your-plugin' ),
            'label_off' => __( 'Hide', 'your-plugin' ),
            'return_value' => 'yes',
            'default' => 'yes',
        ]
    );
    $this->add_control(
        'show_eye',
        [
            'label' => __( 'نمایش بازدید', 'plugin-domain' ),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'label_on' => __( 'Show', 'your-plugin' ),
            'label_off' => __( 'Hide', 'your-plugin' ),
            'return_value' => 'yes',
            'default' => 'yes',
        ]
    );
    $this->add_control(
        'show_year',
        [
            'label' => __( 'نمایش سال', 'plugin-domain' ),
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
            '{{WRAPPER}} .web-movie-section .movie-carousel' => 'justify-content: {{VALUE}};',
          ],
        ]
      );
    $this->end_controls_section();
    $this->start_controls_section(
        'section_style',
        [
            'label' => __( 'تنظیمات عمومی', 'elementor' ),
            'tab' => Controls_Manager::TAB_STYLE,
        ]
    );
    $this->add_control(
        'padding',
        [
            'label' => __( 'پدینگ', 'elementor' ),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%' ],
            'selectors' => [
                '{{WRAPPER}} .web-movie-section .item-post' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
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
                '{{WRAPPER}} .web-movie-section .item-post' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
            ],
        ]
    );
    $this->add_control(
        'border_item',
        [
            'label' => __( 'گوشه‌های مدور', 'elementor' ),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%' ],
            'selectors' => [
                '{{WRAPPER}} .web-movie-section .item-post' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
            ],
        ]
    );
    $this->add_control(
        'background_item',
        [
            'label' => __( 'رنگ پس زمینه', 'plugin-domain' ),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .web-movie-section .item-post' => 'background-color: {{VALUE}} !important',
            ],
        ]
    );
    $this->end_controls_section();
    $this->start_controls_section(
        'section_content_style',
        [
            'label' => __( 'تنظیمات محتوا', 'elementor' ),
            'tab' => Controls_Manager::TAB_STYLE,
        ]
    );
    $this->add_responsive_control(
        'width_buttom',
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
                '{{WRAPPER}} .web-movie-section .item-post' => 'width: {{SIZE}}{{UNIT}};',
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
                '{{WRAPPER}} .web-movie-section .item-post a img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
            ],
        ]
    );
    $this->add_control(
        'titre_color',
        [
            'label' => __( 'رنگ عنوان', 'plugin-domain' ),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .web-movie-section .item-post .movie-new-content h2 a' => 'color: {{VALUE}} !important',
            ],
        ]
    );
    $this->add_control(
        'titre_hover',
        [
            'label' => __( 'هاور عنوان', 'plugin-domain' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .web-movie-section .item-post .movie-new-content h2 a:hover' => 'color: {{VALUE}}',
            ],
        ]
    );
    $this->add_group_control(
        \Elementor\Group_Control_Typography::get_type(),
        [
            'name' => 'title_typography',
            'label' => __( 'تایپوگرافی عنوان', 'plugin-domain' ),
            'selector' => '{{WRAPPER}} .web-movie-section .item-post .movie-new-content h2 a',
        ]
    );
    $this->add_control(
        'imdb_color',
        [
            'label' => __( 'رنگ امتیاز', 'plugin-domain' ),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .web-movie-section .item-post .movie-new-footer .star' => 'color: {{VALUE}}',
            ],
        ]
    );
    $this->add_group_control(
        \Elementor\Group_Control_Typography::get_type(),
        [
            'name' => 'imDb_typography',
            'label' => __( 'تایپوگرافی امتیاز', 'plugin-domain' ),
            'selector' => '{{WRAPPER}} .web-movie-section .item-post .movie-new-footer .star',
        ]
    );
    $this->add_control(
        'view_color',
        [
            'label' => __( 'رنگ تعداد بازدید', 'plugin-domain' ),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .web-movie-section .item-post .movie-new-footer .eye' => 'color: {{VALUE}}',
            ],
        ]
    );
    $this->add_group_control(
        \Elementor\Group_Control_Typography::get_type(),
        [
            'name' => 'view_typography',
            'label' => __( 'تایپوگرافی بازدید', 'plugin-domain' ),
            'selector' => '{{WRAPPER}} .web-movie-section .item-post .movie-new-footer .eye',
        ]
    );
    $this->add_control(
        'yaer_color',
        [
            'label' => __( 'رنگ تاریخ', 'plugin-domain' ),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .web-movie-section .item-post .movie-new-footer .year,.web-movie-section .item-post .movie-new-footer .year a' => 'color: {{VALUE}}',
            ],
        ]
    );
    $this->add_group_control(
        \Elementor\Group_Control_Typography::get_type(),
        [
            'name' => 'year_typography',
            'label' => __( 'تایپوگرافی تاریخ', 'plugin-domain' ),
            'selector' => '{{WRAPPER}} .web-movie-section .item-post .movie-new-footer .year,.web-movie-section .item-post .movie-new-footer .year a',
        ]
    );
    $this->add_control(
        'bookmark_bg',
        [
            'label' => __( 'رنگ پس زمینه بوک مارک', 'plugin-domain' ),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .web-movie-section .item-post .faverit-button button.simplefavorite-button' => 'background: {{VALUE}}',
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
                '{{WRAPPER}} .web-movie-section .item-post .faverit-button button.simplefavorite-button svg' => 'color: {{VALUE}}',
            ],
        ]
    );
    $this->end_controls_section();
  }
  

  protected function render(){
    $settings = $this->get_settings_for_display();
    ?>

    <div class="web-movie-section p-0">

            
                <div class="w-100">
                    <div class="row movie-carousel mx-0">
                        <?php
                        $post_type = $settings['post_type'];
                        $tax = $settings['button_name'];
                        $number = $settings['price'];
                        $filter = $settings['filter'];
                        $soth = $settings['tartib'];
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

                        <div class="card item-post">
                            <a href="<?php the_permalink(); ?>"><img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>" class="img-fluid rounded figure-img"></a>
                            <div class="card-body">
                            <?php if ( 'yes' === $settings['show_title'] ) {
                                    ?>
                                <div class="movie-new-content mb-4 text-right">
                                    <h2 data-toggle="tooltip" title="<?php the_title(); ?>"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                                </div>
                                <?php } ?>
                                <?php 
                                $imbd_link = get_post_meta(get_the_ID(),'link',true);
                                $text_imbd = get_post_meta(get_the_ID(),'text-imDb',true); 
                                ?>
                                <?php
                                $select_sethand = get_post_meta( get_the_ID(), 'imDb_select', true );
                                if ( 'defult-select' === $select_sethand ){ ?>
                                <div class="movie-new-footer">
                                <?php if ( 'yes' === $settings['show_imdb'] ) {
                                    ?>
                                    <span class="star ml-3"><i class="fas fa-star"></i><?php echo $text_imbd; ?></span>
                                    <?php } ?>
                                    <?php if ( 'yes' === $settings['show_eye'] ) {
                                    ?>
                                    <span class="eye"><i class="fas fa-eye"></i><?php the_views(); ?></span>
                                    <?php } ?>
                                    <?php if ( 'yes' === $settings['show_year'] ) {
                                    ?>
                                    <span class="year float-left"><?php the_terms(get_the_ID(),"yaers"); ?></span>
                                    <?php } ?>
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
                                </div>
                                <?php
                                }
                                ?>
                                <?php
                                if ( 'imdb-tabligh' === $select_sethand ){ ?>
                                <?php
                                $IMDB = new \IMDB($imbd_link); 
                                ?>

                                <div class="movie-new-footer">
                                    <?php if ( 'yes' === $settings['show_imdb'] ) {
                                    ?>
                                    <span class="star ml-3"><i class="fas fa-star"></i><?php if ($IMDB->isReady) { print_r($IMDB->getRating()); } else { echo ''; } ?></span>
                                    <?php } ?>
                                    <?php if ( 'yes' === $settings['show_eye'] ) {
                                    ?>
                                    <span class="eye"><i class="fas fa-eye"></i><?php the_views(); ?></span>
                                    <?php } ?>
                                    <?php if ( 'yes' === $settings['show_year'] ) {
                                    ?>
                                    <span class="year float-left"><?php if ($IMDB->isReady) { print_r($IMDB->getYear()); } else { echo ''; } ?></span>
                                    <?php } ?>
                                    <?php if ( 'yes' === $settings['show_bookmark'] ) {
                                    ?>
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
                                </div>

                                <?php
                                }
                                ?>
                            </div>
                        </div>
                        <?php endwhile; wp_reset_postdata(); ?>

                    </div>
                </div>
            
        
    </div>

    <?php
  }

  protected function _content_template(){
    
  }
}