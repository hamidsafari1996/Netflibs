<?php

namespace WPC\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH')) exit; // Exit if accessed directly


class Adsnet extends Widget_Base{

  public function get_name(){
    return 'adsnet';
  }

  public function get_title(){
    return 'تبلیغات';
  }

  public function get_icon(){
    return 'eicon-gallery-grid';
  }

  public function get_categories(){
    return ['tree-category'];
  }

  protected function _register_controls(){
    $this->start_controls_section(
        'section_content',
        [
            'label' => __( 'تنظیمات محتوا', 'elementor' ),
            'tab' => Controls_Manager::TAB_CONTENT,
        ]
    );
    $this->add_control(
        'widget_title',
        [
            'label' => __( 'عنوان سربرگ', 'plugin-domain' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => __( 'مطالب پیشنهادی از سراسر وب', 'plugin-domain' ),
        ]
    );
    $this->add_control(
        'icon',
        [
            'label' => __( 'آیکون', 'text-domain' ),
            'type' => \Elementor\Controls_Manager::ICONS,
            'default' => [
                'value' => 'fas fa-bullhorn',
                'library' => 'solid',
            ],
        ]
    );
    $this->add_control(
        'more_options',
        [
            'label' => __( 'افزودن تبلیغ', 'plugin-name' ),
            'type' => \Elementor\Controls_Manager::HEADING,
            'separator' => 'before',
        ]
    );
    $this->add_control(
        'pishrafte',
        [
            'label' => __( 'نوع بارگذاری', 'plugin-domain' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'default' => 'dasti',
            'options' => [
                'dasti'  => __( 'دستی', 'plugin-domain' ),
                'query' => __( 'پیشرفته', 'plugin-domain' ),
            ],
        ]
    );
    $this->start_controls_tabs( 'query_or_hand' );

    $this->start_controls_tab(
        'handel_ads',
        [
            'label' => esc_html__( 'دستی', 'elementor' ),
        ]
    );
    $repeater = new \Elementor\Repeater();

    $repeater->add_control(
        'list_title', [
            'label' => __( 'عنوان تبلیغ', 'plugin-domain' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => __( 'قالب نتفلیبس' , 'plugin-domain' ),
            'label_block' => true,
        ]
    );
    $repeater->add_control(
        'image_ads',
        [
            'label' => __( 'تصویر تبلیغ', 'plugin-domain' ),
            'type' => \Elementor\Controls_Manager::MEDIA,
            'default' => [
                'url' => \Elementor\Utils::get_placeholder_image_src(),
            ],
        ]
    );
    $repeater->add_control(
		'url_ads',
		[
		'label' => 'لینک تبلیغ',
        'type' => \Elementor\Controls_Manager::URL,
        'placeholder' => __( 'https://Ads-link.com', 'plugin-domain' ),
				'show_external' => true,
				'default' => [
					'url' => '',
					'is_external' => true,
					'nofollow' => true,
				],
		]
	);
    $this->add_control(
        'list',
        [
            'label' => __( 'ساخت لیست', 'plugin-domain' ),
            'type' => \Elementor\Controls_Manager::REPEATER,
            'fields' => $repeater->get_controls(),
            'default' => [
                [
                'list_title' => __( 'تبلیغ #1', 'plugin-domain' ),
                'image_ads' => __( '', 'plugin-domain' ),
                'url_ads' => __( '<i class="fas fa-play"></i>' ),
                ],
                [
                'list_title' => __( 'تبلیغ #2', 'plugin-domain' ),
                'image_ads' => __( '', 'plugin-domain' ),
                'url_ads' => __( '' ),
                ],
            ],
            'title_field' => '{{{ list_title }}}',
        ]
    );
    $this->end_controls_tab();
    $this->start_controls_tab(
        'query_ads',
        [
            'label' => esc_html__( 'پیشرفته', 'elementor' ),
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
                'name' => __( 'نام', 'plugin-domain' ),
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
        'price',
        [
            'label' => __( 'تعداد نمایش', 'plugin-domain' ),
            'type' => \Elementor\Controls_Manager::NUMBER,
            'min' => 1,
            'max' => 100,
            'step' => 1,
            'default' => 1,
        ]
    );

    $this->end_controls_tab();
    $this->end_controls_section();
    $this->start_controls_section(
        'section_style',
        [
            'label' => __( 'تنظیمات عمومی', 'elementor' ),
            'tab' => Controls_Manager::TAB_STYLE,
        ]
    );
    $this->add_group_control(
        \Elementor\Group_Control_Background::get_type(),
        [
            'name' => 'background',
            'label' => __( 'Background', 'plugin-domain' ),
            'types' => [ 'classic', 'gradient' ],
            'selector' => '{{WRAPPER}} .header-top-section',
        ]
    );
    $this->add_control(
        'margin',
        [
            'label' => __( 'فاصله', 'elementor' ),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%' ],
            'selectors' => [
                '{{WRAPPER}} .header-top-section' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
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
                '{{WRAPPER}} .header-top-section' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
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
                '{{WRAPPER}} .header-top-section' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
            ],
        ]
    );
    $this->add_group_control(
        \Elementor\Group_Control_Box_Shadow::get_type(),
        [
            'name' => 'shadow',
            'label' => __( 'باکس شدوو', 'plugin-domain' ),
            'selector' => '{{WRAPPER}} .header-top-section',
        ]
    );
    $this->end_controls_section();
    $this->start_controls_section(
        'section_style_contact',
        [
            'label' => __( 'تنظیمات هدر', 'elementor' ),
            'tab' => Controls_Manager::TAB_STYLE,
        ]
    );
    $this->add_control(
        'icon_button',
        [
            'label' => __( 'رنگ آیکون‌ها', 'plugin-domain' ),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .header-top-section .title-top svg' => 'color: {{VALUE}}',
            ],
        ]
    );
    $this->add_group_control(
        \Elementor\Group_Control_Typography::get_type(),
        [
            'name' => 'icon_typography',
            'label' => __( 'تایپوگرافی آیکون', 'plugin-domain' ),
            'selector' => '{{WRAPPER}} .header-top-section .title-top svg',
        ]
    );
    $this->add_control(
        'color_title',
        [
            'label' => __( 'رنگ عنوان', 'plugin-domain' ),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .header-top-section .title-top h3' => 'color: {{VALUE}}',
            ],
        ]
    );
    $this->add_group_control(
        \Elementor\Group_Control_Typography::get_type(),
        [
            'name' => 'ctitle_typography',
            'label' => __( 'تایپوگرافی عنوان', 'plugin-domain' ),
            'selector' => '{{WRAPPER}} .header-top-section .title-top h3',
        ]
    );
    $this->end_controls_section();
    $this->start_controls_section(
        'section_ads_contact',
        [
            'label' => __( 'تنظیمات محتوا', 'elementor' ),
            'tab' => Controls_Manager::TAB_STYLE,
        ]
    );
    $this->add_control(
        'border_radius_ads',
        [
            'label' => __( 'گوشه‌های مدور', 'elementor' ),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%' ],
            'selectors' => [
                '{{WRAPPER}} .header-top-section figure a img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
            ],
        ]
    );
    $this->add_group_control(
        \Elementor\Group_Control_Box_Shadow::get_type(),
        [
            'name' => 'shadow_ads',
            'label' => __( 'باکس شدوو', 'plugin-domain' ),
            'selector' => '{{WRAPPER}} .header-top-section figure a img',
        ]
    );
    $this->add_control(
        'color_titr',
        [
            'label' => __( 'رنگ عناوین', 'plugin-domain' ),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .header-top-section figure figcaption a' => 'color: {{VALUE}}',
            ],
        ]
    );
    $this->add_control(
        'hover_titr',
        [
            'label' => __( 'هاور عناوین', 'plugin-domain' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .header-top-section figure figcaption a:hover' => 'color: {{VALUE}} !important',
            ],
        ]
    );
    $this->add_group_control(
        \Elementor\Group_Control_Typography::get_type(),
        [
            'name' => 'titr_typography',
            'label' => __( 'تایپوگرافی عناوین', 'plugin-domain' ),
            'selector' => '{{WRAPPER}} .header-top-section figure figcaption a',
        ]
    );
    $this->end_controls_section();
  }
  

  protected function render(){
    $settings = $this->get_settings_for_display();
    $target = $settings['website_link']['is_external'] ? ' target="_blank"' : '';
    $nofollow = $settings['website_link']['nofollow'] ? ' rel="nofollow"' : '';
    ?>
   
        <div class="container-fluid">
            <div class="header-top-section mb-3 mt-3">
                <div class="title-top d-flex">
                    <?php \Elementor\Icons_Manager::render_icon( $settings['icon'], [ 'aria-hidden' => 'true' ] ); ?>
                    <h3><?php echo  $settings['widget_title']; ?></h3>
                </div>
                <div class="row tizer">
                <?php if( $settings['pishrafte'] == 'dasti'){ ?>
                    
                <?php  if ( $settings['list'] ) { foreach (  $settings['list'] as $item ) { ?>
                    <figure class="col-lg-3 col-md-6 col-sm-6 col-12 text-right mb-4">
                        <a href="<?php echo @$item['url_ads']['url']; ?>" rel="nofollow" target="_blank"><img src="<?php echo @$item['image_ads']['url']; ?>" class="figure-img img-fluid" alt="<?php echo @$item['list_title']; ?>"></a>
                        <figcaption class="figure-caption text-right"><a href="<?php echo @$item['url_ads']['url']; ?>" <?php echo $target; ?> <?php echo $nofollow; ?>><?php echo @$item['list_title']; ?></a></figcaption>
                    </figure>
                    <?php
                    }
                } ?> 
                <?php } ?>
                <?php if( $settings['pishrafte'] == 'query' ){ ?>
                    <?php
                    $ads_link = get_post_meta(get_the_ID(),'ads_link',true);
                            $posts = $settings['price'];
                            $order = $settings['tartib'];
                            $filter = $settings['filter'];
                            $best_product = array(
                                'post_type' => 'ads',
                                'posts_per_page' => $posts,
                                'order' => $order,
                                'orderby' => $filter,
                            );
                            $show_best_product = new \WP_Query($best_product);
                            while($show_best_product->have_posts()) : $show_best_product->the_post();
                            ?>
                    <figure class="col-lg-3 col-md-6 col-sm-6 col-12 text-right mb-4">
                        <a href="<?php echo $ads_link; ?>" rel="nofollow" target="_blank"><img src="<?php the_post_thumbnail_url(); ?>" class="figure-img img-fluid" alt="<?php the_title(); ?>"></a>
                        <figcaption class="figure-caption text-right"><a href="<?php echo $ads_link; ?>" rel="nofollow" target="_blank"><?php the_title(); ?></a></figcaption>
                    </figure>
                    <?php endwhile; wp_reset_postdata(); ?>
                <?php } ?>
                </div>
                
            </div>
        </div>
   


    <?php
  }

  protected function _content_template(){
    
  }
}