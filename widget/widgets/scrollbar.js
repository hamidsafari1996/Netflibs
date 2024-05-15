jQuery( window ).on( 'elementor/frontend/init', () => {
      elementorFrontend.hooks.addAction( 'frontend/element_ready/scrolbar.default', function($scope, $){
          
             


             $(window).scroll(function(){
                  if($(this).scrollTop() > 0){
                    $("#scrollbar").fadeIn();
                  }
                  else{
                    $("#scrollbar").fadeOut();
                  }
                });
                $("#scrollbar").click(function(){
                  $("body,html").animate({scrollTop:0}, 400);
                  return false;
                });


            
      });
});
