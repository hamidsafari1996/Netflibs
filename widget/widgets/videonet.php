<?php

namespace WPC\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH')) exit; // Exit if accessed directly


class Videonet extends Widget_Base{


  public function get_name(){
    return 'videoflibs';
  }

  public function get_title(){
    return 'ویدیو';
  }

  public function get_icon(){
    return 'eicon-youtube';
  }

  public function get_categories(){
    return ['first-category'];
  }

  protected function _register_controls(){
	$this->start_controls_section(
		'section_content',
		[
		  'label' => 'تنظیمات',
		]
	  );
  
	  $this->add_control(
		'img_movie',
		[
		  'label' => 'بارگذاری تصویر ویدیو',
      'type' => \Elementor\Controls_Manager::MEDIA,
      'default' => [
        'url' => \Elementor\Utils::get_placeholder_image_src(),
        ],
		]
	  );
  
	  $this->add_control(
		'link_movie',
		[
		  'label' => 'لینک ویدیو',
      'type' => \Elementor\Controls_Manager::URL,
      'placeholder' => __( 'https://your-link.com', 'plugin-domain' ),
				'show_external' => true,
				'default' => [
					'url' => '',
					'is_external' => true,
					'nofollow' => true,
				],
		]
	);
	$this->add_control(
		'link_subtitle',
		[
		  'label' => 'لینک زیرنویس',
      'type' => \Elementor\Controls_Manager::URL,
      'placeholder' => __( 'https://your-link.com', 'plugin-domain' ),
				'show_external' => true,
				'default' => [
					'url' => '',
					'is_external' => true,
					'nofollow' => true,
				],
		]
    );
    $this->end_controls_section();
    $this->start_controls_section(
			'section_video_style',
			[
				'label' => __( 'تنظیمات عمومی', 'elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
    );
    $this->add_responsive_control(
			'max-width',
			[
				'label' => __( 'حداکثر اندازه', 'elementor' ),
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
					'{{WRAPPER}} .video-section' => 'max-width: {{SIZE}}{{UNIT}};',
				],
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
		'button_color',
		[
			'label' => __( 'رنگ', 'plugin-domain' ),
			'type' => Controls_Manager::COLOR,
			'default' => '',
			'selectors' => [
				'{{WRAPPER}} .video-section .plyr__controls button, .plyr__play-large' => 'color: {{VALUE}}',
			],
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
		'button_color_hover',
		[
			'label' => __( 'رنگ', 'plugin-domain' ),
			'type' => Controls_Manager::COLOR,
			'default' => '',
			'selectors' => [
				'{{WRAPPER}} .video-section .plyr--audio .plyr__controls button.tab-focus:focus, .video-section .plyr--audio .plyr__controls button:hover, .video-section .plyr__play-large, .plyr__progress--played, .video-section .plyr .plyr__controls .plyr__volume .plyr__volume--display, .video-section .plyr--video .plyr__controls button:hover' => 'color: {{VALUE}}',
			],
		]
	);
	$this->add_control(
		'button_background',
		[
			'label' => __( 'رنگ پس زمینه', 'plugin-domain' ),
			'type' => Controls_Manager::COLOR,
			'default' => '',
			'selectors' => [
				'{{WRAPPER}} .video-section .plyr--audio .plyr__controls button.tab-focus:focus, .video-section .plyr--audio .plyr__controls button:hover, .video-section .plyr__play-large, .video-section .plyr--video .plyr__controls button:hover' => 'background: {{VALUE}}',
			], 
		]
	);
    $this->end_controls_section();
  }
  

  protected function render(){
	$settings = $this->get_settings_for_display();
	?>

  <div class="video-section js-player">
      <video class="video" poster="<?php echo $settings['img_movie']['url'] ?>" controls>
		  <source src="<?php echo $settings['link_movie']['url']?>" type="video/mp4">
		  <track kind="captions" label="persian" srclang="fa" src="<?php echo $settings['link_subtitle']['url']?>" default>
      </video>
  </div>

	<?php

  }
  protected function _content_template(){
  }
}
?>
