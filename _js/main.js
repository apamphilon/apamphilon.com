$(document).ready(function(){
	//header search
	$('.masthead .fa-search').on('click', function(){
	  $('.header-search').toggleClass('visible');
	  setTimeout(function(){
		  $('.header-search .search-field').focus().val('');
		}, 350);
	});

	//sliders
	//services
	$('.services-slider').slick({
		arrows: false,
		fade: true,
		autoplay: true,
		autoplaySpeed: 8000,
		speed: 400,
		asNavFor: '.services-slider-nav',
		slidesToShow: 1,
		slidesToScroll: 1
	});

	//services nav
	$('.services-slider-nav').slick({
		arrows: true,
		autoplay: true,
		autoplaySpeed: 8000,
		speed: 400,
		slidesToShow: 3,
		slidesToScroll: 1,
		focusOnSelect: true,
		asNavFor: '.services-slider'
	});

	//twitter-feed
	$('#tweets').slick({
		arrows: true,
		fade: true,
		autoplay: true,
		autoplaySpeed: 5000,
		adaptiveHeight: true
	});

	//mobile nav
	$('.nav-toggle').click(function() {
	  $(this).toggleClass("active");
	  $('.header-search').removeClass('visible');

	  if ($('body').hasClass('show-nav')) {
	    // Do things on Nav Close
	    $('body').removeClass('show-nav');
	  } else {
	    // Do things on Nav Open
	    $('body').addClass('show-nav');

	    //on click of page elements
	    $('.banner, .page-wrapper').on('click', function(){
	      //check to see if nav is open
	      if ($('body').hasClass('show-nav')) {
  	      //if open
	        $('body').removeClass('show-nav');
	        $('.nav-toggle .text').text('Menu');
	        $('.nav-toggle-outer').find('.nav-toggle').toggleClass("active");
	      }
	    });
	  }
	});

  //move nav element on mobile
  moveElements(); //call the function initally
  setTimeout( moveElements, 300 ); //call the function again after giving the site 300ms to kick in
  $(window).resize( moveElements ); //bind the function to the resize event

  function moveElements() {
	  var width = $(window).width(),
	  elementToMove = $('.main-menu');

    if (elementToMove.length) {
	    // 820 is the breakpoint, ie 820px.
		  if (width <= 820 && !elementToMove.hasClass('moved')) {
		    elementToMove.addClass('moved');
	      elementToMove.appendTo('.side-menu');
		  }

		  if (width > 820 && elementToMove.hasClass('moved')) {
		    elementToMove.removeClass('moved');
	      elementToMove.appendTo('.masthead .wrapper');
		  }
		}
  }

	$('.side-menu .main-menu ul li a').on('click', function() {
		$('.nav-toggle').toggleClass('active');
		$('body').removeClass('show-nav');
	});

  // jQuery Page Scroll
	$('a[href*=#]:not([href=#])').click(function() {
  	if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') || location.hostname == this.hostname) {
      var target = $(this.hash + '-anchor');
      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');

      if (target.length) {
  	    $('html,body').animate({
  	      scrollTop: target.offset().top -58
  	    }, 800);
  	    return false;
  	  }
  	}
	});

	// scroll to anchor on page load
	$(function() {
		var target = location.hash;

		if (target.length) {
		  $('html, body').animate({
		    scrollTop: $(target + '-anchor').offset().top -58
		  }, 500);
		  return false;
		}
	});

	//my story expand
	$('.my-story .btn').on('click', function(e) {
		e.preventDefault();
		$(this).toggleClass('open').prev('.expand').stop().slideToggle();

		if($(this).hasClass('open')) {
			$(this).text('Show Less');
		} else {
			$(this).text('Learn More');
		}
	});

	// header scroll height
	function init() {
		// vars
		var homeCtaHeight = $('.home-cta').outerHeight();

	    window.addEventListener('scroll', function(e){
	      var
          distanceY = window.pageYOffset || document.documentElement.scrollTop,
	        shrinkOn = homeCtaHeight -60,
	        elm = $('.masthead');

        if (distanceY > shrinkOn) {
	      	$(elm).addClass('small-header');
	      	$('.masthead h1 a').text('ap');
	      } else {
	        if ($(elm).hasClass('small-header')) {
  		    	$(elm).removeClass('small-header');
  		    	$('.masthead h1 a').text('apamphilon');
	        }
        }
	    });
	}
	window.onload = init();

	// fade out scroll arrow
	var fadeStart=0, // 0 scroll or less will equiv to 1 opacity
	fadeUntil=150, // 150px scroll or more will equiv to 0 opacity
	fading = $('.scroll-down');

	$(window).bind('scroll', function() {
	  var offset = $(document).scrollTop(),opacity=0;

    if( offset<=fadeStart ) {
	    opacity=1;
	  } else if( offset<=fadeUntil ) {
      fading.show();
      opacity=1-offset/fadeUntil;
    } else if( offset > fadeUntil ) {
      fading.hide();
    }
    fading.css('opacity',opacity);
	});

  // match-height
  $('.posts li').matchHeight();
  $('.match-height').matchHeight();
  $('.mh').matchHeight();

  // wow.js
  new WOW().init();

  // scroll down arrow
  $('.scroll-down').on('click', function() {
  	$(this).fadeOut();
  });

  // MixItUp
  // blog
	$('#container:not(.show-all, .snippets)').mixItUp({
		pagination: {
			limit: 6,
			generatePagers: true,
		},
		callbacks: {
			onMixEnd: function(state){
			  $('.match-height').matchHeight({
			  	byRow: false
			  });
			}
		}
	});

	//snippets
	$('#container.snippets').mixItUp({
		pagination: {
			limit: 9,
			generatePagers: true,
		},
		callbacks: {
			onMixEnd: function(state){
			    $('.match-height').matchHeight({
			    	byRow: false
			    });
			}
		}
	});

	//no pagination
	$('#container.show-all').mixItUp({
		callbacks: {
			onMixEnd: function(state){
		    $('.match-height').matchHeight({
		    	byRow: false
		    });
			}
		}
	});

	// nav highlighting based on scroll position
	if ($('body').hasClass('page-template-homepage')) {
		$(function() {
			var homeCtaHeight = $('.home-cta').outerHeight();
			// Declares container variables
			var about = $('#about-anchor')[0].offsetTop +homeCtaHeight -60;
			var myServices = $('#my-services-anchor')[0].offsetTop +homeCtaHeight -60;
			var latestPosts = $('.latest-posts')[0].offsetTop +homeCtaHeight -60;

			// binds
			$(document).bind('ready scroll',function() {
				var docScroll = $(document).scrollTop();

			  // about
			  if(docScroll >= about) {
			  	$('.menu-item-383').addClass('selected');
			  	$('.menu-item-382').removeClass('selected');
			  }

				if(docScroll >= myServices) {
			  	$('.mastnav li').removeClass('selected');
			  	$('.menu-item-382').addClass('selected');
			  }

			  if (docScroll <= about || docScroll >= latestPosts) {
			  	$('.mastnav li').removeClass('selected');
			  }
			});
		});
	}

	$('.menu-item-261 a, a[href="#contact"]').on('click', function() {
		$('.contact-footer').fadeIn(400);
		$('body').addClass('contact-open');
	});

	$('.contact-close').on('click', function() {
		$('.contact-footer').fadeOut(400);
		$('body').removeClass('contact-open');
	});
});
