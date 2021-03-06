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
      var arrow = $('.fixed-action-btn');

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


     function hasFormValidation () {
        return (typeof document.createElement('input').checkValidity === 'function');
    }

    function addError (el) {
        return el.parent().addClass('has-error');
    }

    if (!hasFormValidation()) {
        $('#contact').submit(function () {
            var hasError = false,
                name     = $('#form-name'),
                mail     = $('#form-email'),
                subject  = $('#form-assunto'),
                message = $('#form-mensagem'),
                testmail = /^[^0-9][A-z0-9._%+-]+([.][A-z0-9_]+)*[@][A-z0-9_-]+([.][A-z0-9_]+)*[.][A-z]{2,4}$/,
                $this    = $(this);

            $this.find('div').removeClass('has-error');

            if (name.val() === '') {
                hasError = true;
                addError(name);
            }

            if (!testmail.test(mail.val())) {
                hasError = true;
                addError(mail);
            }

            if (subject.val() === '') {
                hasError = true;
                addError(subject);
            }

            if (message.val() === '') {
                hasError = true;
                addError(message);
            }

            if (hasError === false) {
                return true;
            }

            return false;
        });
    }
}); //fim jquery-
