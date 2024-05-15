<?php
namespace WPC;

// use Elementor\Plugin; ?????

class Widget_Loader{

  private static $_instance = null;

  public static function instance()
  {
    if (is_null(self::$_instance)) {
      self::$_instance = new self();
    }
    return self::$_instance;
  }


  private function include_widgets_files(){
    /**------------------------------CATEGORY_first-------------------------------*/
    require_once(__DIR__ . '/widgets/advertisement.php');
    require_once(__DIR__ . '/widgets/videonet.php');
    require_once(__DIR__ . '/widgets/social.php');
    require_once(__DIR__ . '/widgets/title.php');
    require_once(__DIR__ . '/widgets/content-cat.php');
    require_once(__DIR__ . '/widgets/formo.php');
    require_once(__DIR__ . '/widgets/social-share.php');
    require_once(__DIR__ . '/widgets/youtube-ads.php');
    require_once(__DIR__ . '/widgets/contact-form.php');
    /**------------------------------CATEGORY_secend-------------------------------*/
    require_once(__DIR__ . '/widgets/logo.php');
    require_once(__DIR__ . '/widgets/search.php');
    require_once(__DIR__ . '/widgets/menu.php');
    require_once(__DIR__ . '/widgets/site-title.php');
    require_once(__DIR__ . '/widgets/push-menu.php');
    require_once(__DIR__ . '/widgets/newmov.php');
    require_once(__DIR__ . '/widgets/filter.php');
    require_once(__DIR__ . '/widgets/btn-login.php');
    /**------------------------------CATEGORY_tree-------------------------------*/
    require_once(__DIR__ . '/widgets/slider.php');
    require_once(__DIR__ . '/widgets/slider-box.php');
    require_once(__DIR__ . '/widgets/service.php');
    require_once(__DIR__ . '/widgets/cat.php');
    require_once(__DIR__ . '/widgets/product1.php');
    require_once(__DIR__ . '/widgets/product2.php');
    require_once(__DIR__ . '/widgets/movie.php');
    require_once(__DIR__ . '/widgets/portfolionet.php');
    require_once(__DIR__ . '/widgets/filimo.php');
    require_once(__DIR__ . '/widgets/hexfilm.php');
    require_once(__DIR__ . '/widgets/ads-group.php');
    require_once(__DIR__ . '/widgets/blog.php');
    require_once(__DIR__ . '/widgets/blog-card.php');
    require_once(__DIR__ . '/widgets/tab-movie.php');
    require_once(__DIR__ . '/widgets/tube-movie.php');
    require_once(__DIR__ . '/widgets/film-slider.php');
    require_once(__DIR__ . '/widgets/group-film.php');
    require_once(__DIR__ . '/widgets/group-img.php');
    require_once(__DIR__ . '/widgets/portfolio-blog.php');
    require_once(__DIR__ . '/widgets/film-sidebar.php');
    require_once(__DIR__ . '/widgets/video-slider.php');
    /**------------------------------CATEGORY_four-------------------------------*/
    require_once(__DIR__ . '/widgets/page.php');
    require_once(__DIR__ . '/widgets/menu-footer.php');
    require_once(__DIR__ . '/widgets/social-footer.php');
    require_once(__DIR__ . '/widgets/category1.php');
    require_once(__DIR__ . '/widgets/social-plus.php'); 
    require_once(__DIR__ . '/widgets/scrollbar.php'); 
    /**------------------------------CATEGORY_five-------------------------------*/
    require_once(__DIR__ . '/widgets/single/page-title.php');
    require_once(__DIR__ . '/widgets/single/time-blog.php');
    require_once(__DIR__ . '/widgets/single/setting-film.php');
    require_once(__DIR__ . '/widgets/single/taxonomy-custom.php');
    require_once(__DIR__ . '/widgets/single/exerpt-ntf.php');
    require_once(__DIR__ . '/widgets/single/tags-ntf.php');
    require_once(__DIR__ . '/widgets/single/button-trailer.php');
    require_once(__DIR__ . '/widgets/single/image-single.php');
    require_once(__DIR__ . '/widgets/single/comment.php');
    require_once(__DIR__ . '/widgets/single/faverite.php');
    require_once(__DIR__ . '/widgets/single/view.php');
    require_once(__DIR__ . '/widgets/relate-post.php');
    require_once(__DIR__ . '/widgets/single/card-download.php');
  }
  
  public function register_widgets(){

    $this->include_widgets_files();
    /**------------------------------CATEGORY_first-------------------------------*/
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Widgets\Advertisement());
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Widgets\Videonet());
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Widgets\Social());
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Widgets\Titlenet());
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Widgets\Contentnet());
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Widgets\Foromnet());
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Widgets\Socialshare());
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Widgets\Youtubeads());
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Widgets\Contact_form());

    /**------------------------------CATEGORY_secend-------------------------------*/
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Widgets\logonet());
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Widgets\Searchnet());
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Widgets\Menunet());
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Widgets\Sitetitle());
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Widgets\Pushmenu());
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Widgets\Notification());
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Widgets\Filternet());
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Widgets\Btn_login());
    /**------------------------------CATEGORY_tree-------------------------------*/
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Widgets\Slider());
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Widgets\Slider_box());
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Widgets\Service());
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Widgets\Cat());
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Widgets\Product1());
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Widgets\Product2());
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Widgets\Movienet());
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Widgets\Portfolionet());
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Widgets\Filimonet());
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Widgets\Hexdlnet());
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Widgets\Adsnet());
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Widgets\Blognet());
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Widgets\Blogcard());
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Widgets\Tabmovie());
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Widgets\Youtube_movie());
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Widgets\Film_slider());
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Widgets\Group_film());
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Widgets\Group_img());
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Widgets\Portfolioblog());
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Widgets\Film_sidebar());
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Widgets\Video_slider());
    /**------------------------------CATEGORY_four-------------------------------*/
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Widgets\Pagenet());
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Widgets\Menufooter());
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Widgets\Socialfooter());
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Widgets\Cat1footer());
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Widgets\Socialplus());
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Widgets\Scrollbar());
    /**------------------------------CATEGORY_five-------------------------------*/
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Widgets\Pagetitle());
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Widgets\Time_blog());
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Widgets\Setting_film());
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Widgets\Taxonomy_custom());
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Widgets\Exerpt_ntf());
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Widgets\Tags_ntf());
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Widgets\Button_trailer());
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Widgets\Image_ntf());
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Widgets\comment_sell());
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Widgets\Faverit_button());
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Widgets\view_button());
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Widgets\relate_post());
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Widgets\Card_Download());
  }

  public function __construct(){
    add_action('elementor/widgets/widgets_registered', [$this, 'register_widgets'], 99);
  }
}

// Instantiate Plugin Class
Widget_Loader::instance();
