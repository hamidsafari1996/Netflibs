jQuery( window ).on( 'elementor/frontend/init', () => {
      elementorFrontend.hooks.addAction( 'frontend/element_ready/film-slider.default', function($scope, $){
          $('.filimo-crousel').each(function () {
             var  sliderConfig = JSON.parse($( this ).attr('data-options'));
              $( this ).owlCarousel({
                 rtl: true,
                 autoplay:typeof sliderConfig.autoplay !=='undefined' ? sliderConfig.autoplay : true,
                 autoplayTimeout:3000,
                 autoplayHoverPause:sliderConfig.autoplayHoverPause !=='undefined'? sliderConfig.autoplayHoverPause :true,
                 loop: sliderConfig.loop !=='undefined'? sliderConfig.loop : true,
                 nav: sliderConfig.arrow !=='undefined'? sliderConfig.arrow : true,
                 center: sliderConfig.center !=='undefined'? sliderConfig.center : true,
                 dots: sliderConfig.docts !=='undefined'? sliderConfig.docts : true,
                 margin: 25,
                 responsiveClass:true,
                 responsive:{
                     0:{
                         items: 1,
                         nav: sliderConfig.arrow_phone !=='undefined'? sliderConfig.arrow_phone : true,
                         dots: sliderConfig.docts_phone !=='undefined'? sliderConfig.docts_phone : true,
    
                     },
                     520:{
                         items: 1,
                         nav: sliderConfig.arrow_tablet !=='undefined'? sliderConfig.arrow_tablet : true,
                         dots: sliderConfig.docts_tablet !=='undefined'? sliderConfig.docts_tablet : true,
    
                     },
                     780:{
                         items:3,
    
                     },
                     1000:{
                         items:sliderConfig.widgetPostNum !=='undefined' ? sliderConfig.widgetPostNum : 1,
    
                     }
                 }
             });
          });
      });
    } );
    