(function($){
  $(document).ready(function() {

    if(window.innerWidth > 768){
      if ($('body').hasClass('fixed-header')) {
        var headerOffset = 100
      } else {
        var headerOffset = 170
      }
    } else {
      var headerOffset = 60
    }

    setTimeout(function() {
      if (location.hash) {
        /* we need to scroll to the top of the window first, because the browser will always jump to the anchor first before JavaScript is ready, thanks Stack Overflow: http://stackoverflow.com/a/3659116 */
        window.scrollTo(0, 0);
        target = location.hash.split('#');
        // console.log(target)
      }
    }, 1);

    setTimeout(function() {
      if (location.hash) {
        $('html, body').animate({
            scrollTop: ($('#' + target[1]).offset().top - headerOffset ) + 'px'
        }, 1000, 'swing');
      }
    }, 350)

    setTimeout( function() {
      WatchEntry.init('.js-watch-section-entry')
    },1000)

    scrollToAnchor()


    if ($('.js-faq')) {
      faq()
    }

    $('.js-back-top').on('click', function (e) {
      e.preventDefault();
      $('html,body').animate({
          scrollTop: 0
      }, 700);
    });

  })

  $(window).scroll(function() {
    if ($('.js-fixed-header').length) {
      fixedHeader()
    }
    WatchEntry.init('.js-watch-section-entry')
    parallax()
    scrollFunction()
  });

  // La fonction WatchEntry permet d'ajouter la classe 'in-view' à l'élément ciblé lors de son entréé dans le viweport
  var WatchEntry = {
    'init': function(e){
      WatchEntry.watchItemEntry(e);
    },
    'watchItemEntry': function(e) {
      $(e).each(function () {
        if (isInViewport(this) === true) {
          $(this).addClass('in-view')
        }
      });
    }
  }


  // #     #
  // #     # ###### #      #####  ###### #####   ####
  // #     # #      #      #    # #      #    # #
  // ####### #####  #      #    # #####  #    #  ####
  // #     # #      #      #####  #      #####       #
  // #     # #      #      #      #      #   #  #    #
  // #     # ###### ###### #      ###### #    #  ####

  // Gestion de la parallax sur les elements Background
  function parallax(){
      var scrolled = $(window).scrollTop()
      $('.js-parallax-item').each(function(index, element) {
        var initY = $(this).offset().top
        var height = $(this).height()
        var endY  = initY + $(this).height()
        var imageSrc = $(this).data('image-src')
        var horizontalPos = $(this).data('horizontal-pos')
        var offset = $(this).data('offset')

        $(this).css('background-image','url(' + imageSrc + ')')

        if(window.innerWidth > 768){
        // Check if the element is in the viewport.
          var visible = isInViewport(this)
          if(visible) {
            var diff = scrolled - initY
            var ratio = Math.round((diff / height) * 100) + offset
            $(this).css('background-position', horizontalPos + ' ' + parseInt(-(ratio * 1.2)) + 'px')
          }
        }
      })
  }

  // Detection de l'entrée dans le viewport d'un élément
  function isInViewport(node) {
    var rect = node.getBoundingClientRect()
    return (
      (rect.height > 0 || rect.width > 0) &&
      rect.bottom >= 0 &&
      rect.right >= 0 &&
      rect.top <= (window.innerHeight || document.documentElement.clientHeight) &&
      rect.left <= (window.innerWidth || document.documentElement.clientWidth)
    )
  }

  // Gestion du header fixe au scroll
  function fixedHeader() {
    var headerHeight = $('.js-header-container').outerHeight()
    if ($(window).scrollTop() > 0) {
      $('.js-fixed-header').addClass('fixed-header');
      $('.js-fixed-header').css('padding-top', headerHeight)
    } else {
      $('.js-fixed-header').removeClass('fixed-header');
      $('.js-fixed-header').css('padding-top', 0)
    }
  }

  // Gestion du bouton back to top
  function scrollFunction() {
    if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
        $('.js-back-top').removeClass('hide')
    } else {
        $('.js-back-top').addClass('hide')
    }
  }

  // Gestion du scroll to anchor animé
  function scrollToAnchor() {
    var hash= window.location.hash
    if(window.innerWidth > 768){
      if ($('body').hasClass('fixed-header')) {
        var headerOffset = 100
      } else {
        var headerOffset = 170
      }
    } else {
      var headerOffset = 60
    }
    // Au click sur l'élément
    $(".sliding-link").find('a').click(function(e) {
        if(window.innerWidth > 768){
          if ($('body').hasClass('fixed-header')) {
            var headerOffset = 100
          } else {
            var headerOffset = 170
          }
        } else {
          var headerOffset = 60
        }
        anchor = $(this).attr('href')
        if (window.location.pathname != '/') {
          document.location.href="/" + anchor;
        } else {
          $('html, body').animate({
              scrollTop: ($(anchor).offset().top - headerOffset) + 'px'
          }, 1000, 'swing');
          $('.js-menu').removeClass('active')
        }
    });

  }

// ______    ___    _____
// |  ___|  / _ \  |  _  |
// | |_    / /_\ \ | | | |
// |  _|   |  _  | | | | |
// | |     | | | | \ \/' /
// \_|     \_| |_/  \_/\_\
  function faq() {

    // On cache toutes les réponses aux questions de la FAQ
    var allFAQContent = $('.js-question-content').hide()
    $('.js-category-container[data-cat="metier"]').find('.js-question').first().addClass('active')
    $('.js-category-container[data-cat="metier"]').find('.js-question-content').first().addClass('active').slideDown()

    // Pour chaque container de quesitons
    $('.js-category-container').each(function(){
      $this = $(this)

      // On cache tous ceux qui n'ont pas la classe active
      if (!$this.hasClass('active')) {
        $(this).hide()
      }
    })

    // Au clic sur une question
    $('.js-question-toggle').click(function(e){
      e.preventDefault()
      $this = $(this)

      // On enlève la classe active à toutes les réponses
      allFAQContent.removeClass('active').slideUp()

      // On enlève la classe active à toutes les catégories
      $('.js-question').removeClass('active')

      // On cible la réponse à la question
      $target = $this.parent().next()

      // Si la réponse n'a pas la classe active
      if (!$target.hasClass('active')) {

                // On ajoute la classe active à la réponse voulue
        $target.addClass('active').slideDown()

        $(this).closest('.js-question').addClass('active')
      }
    })

    // Au clic sur une catégorie de la FAQ dans la nav
    $('.js-faq-container-toggle').click(function(e){
      e.preventDefault()

      var allFAQContent = $('.js-question-content').hide()

      // On enlève la classe active à toutes les catégories
      $('.js-question').removeClass('active')

      // On récupère la catégorie voulue
      $activeCat = $(this).data('cat')

      // On enlève la classe active à tous les container de questions
      $('.js-category-container').removeClass('active').hide()

      // On enleve la classe active au container des questions
      $('.js-faq-container-toggle').removeClass('active')

      // On ajoute la classe active à la catégorie cliquée
      $(this).addClass('active')

      // On ajoute la classe active au container corespondant
      $('.js-category-container[data-cat="' + $activeCat + '"]').addClass('active').show();
      $('.js-category-container[data-cat="' + $activeCat + '"]').find('.js-question').first().addClass('active')
      $('.js-category-container[data-cat="' + $activeCat + '"]').find('.js-question-content').first().addClass('active').slideDown()
    })
  }

})(jQuery);
