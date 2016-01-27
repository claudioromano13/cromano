  $(document).ready(function() {
    //materialize works
    $('.carousel').carousel();
    $(".button-collapse").sideNav();
    $('.parallax').parallax();
    $('.tooltipped').tooltip({
      delay: 50
    });
    $('.materialboxed').materialbox();

    //bxslider works
    $('.processo').bxSlider({
      minSlides: 1,
      maxSlides: 1,
      slideWidth: 5000,
      pause: 4000
    });

    $('.bxslider-portfolio').bxSlider({
      adaptiveHeight: true,
      pager: false,
      mode: 'fade'
    });

    //close modal from contact form
    $('.alert,.bg-alert').delay(3000).fadeOut();

    //when scroll the menu show
    $(window).bind('scroll', function() {
      var navbar = $('.navbar-default');
      var menu = $('nav#menu-principal ul li a');
      var arrow = $('#arrow-up');

      if ($(window).scrollTop() > 80) {
        $(navbar).css('transition', '500ms').addClass('menu');
        $(arrow).css('transition', '500ms').addClass('show').removeClass('hide');
      } else {
        $(navbar).removeClass('menu');
        $(arrow).removeClass('show').addClass('hide');

      }
    });

    //menu anchor
    $('a[href*=#]:not([href=#])').click(function() {
      if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
        var target = $(this.hash);
        target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
        if (target.length) {
          $('html,body').animate({
            scrollTop: target.offset().top
          }, 800);
          return false;
        }
      }
    }); //

    // up to top anchor arrow 
    $('a.arrow-up').click(function() {
      $("html, body").animate({
        scrollTop: 0
      }, 800);
      return false;
    });
}); //fim jquery-
