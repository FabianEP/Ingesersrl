jQuery(document).ready(function() {
  
  //WOW js code
    new WOW().init();



      //this code is for smooth scroll and nav selector
            $(document).ready(function () {
              $(document).on("scroll", onScroll);
              
              //smoothscroll
              $('a[href^="#"]').on('click', function (e) {
                  e.preventDefault();
                  $(document).off("scroll");
                  
                  $('a').each(function () {
                      $(this).removeClass('active');
                  })
                  $(this).addClass('active');
                
                  var target = this.hash,
                      menu = target;
                  $target = $(target);
                  $('html, body').stop().animate({
                      'scrollTop': $target.offset().top-55
                  }, 500, 'swing', function () {
                      window.location.hash = target;
                      $(document).on("scroll", onScroll);
                  });
              });
          });

          function onScroll(event){
              var scrollPos = $(document).scrollTop() + 57;
              $('.navbar-default .navbar-nav>li>a').each(function () {
                  var currLink = $(this);
                  var refElement = $(currLink.attr("href"));
                  if (refElement.position().top <= scrollPos && refElement.position().top + refElement.height() > scrollPos) {
                      $('.navbar-default .navbar-nav>li>a').removeClass("active");
                      currLink.addClass("active");
                  }
                  else{
                      currLink.removeClass("active");
                  }
              });
          }
     
     
     //this code is for animation nav
     jQuery(window).scroll(function() {
        var windowScrollPosTop = jQuery(window).scrollTop();

        if(windowScrollPosTop >= 150) {
          jQuery(".top-header").css({"background": "#f6f6f6",});
          jQuery(".top-header img.logo").css({"margin-top": "-30px", "margin-bottom": "15px"});
          jQuery(".nav-bar").css({"margin-top": "6px",});
        }
        else{
          jQuery(".top-header").css({"background": "transparent",});
           jQuery(".top-header img.logo").css({"margin-top": "-30px", "margin-bottom": "25px"});
           jQuery(".nav-bar").css({"margin-top": "28px"});
          
        }
     });
	

});