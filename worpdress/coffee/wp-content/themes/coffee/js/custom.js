jQuery(document).ready(function () {
	"use strict";

	jQuery('.header-slider').on('init', function () {
		var $firstAnimatingElements = jQuery('div.hero:first-child').find('[data-animation]');
		doAnimations($firstAnimatingElements);
	});
	jQuery('.header-slider').on('beforeChange', function (e, slick, currentSlide, nextSlide) {
		var $animatingElements = jQuery('div.hero[data-slick-index="' + nextSlide + '"]').find('[data-animation]');
		doAnimations($animatingElements);
	});
	jQuery('.blog-carousel').on('beforeChange', function (e, slick, currentSlide, nextSlide) {
		var $animatingElements = jQuery('div.item[data-slick-index="' + nextSlide + '"]').find('[data-animation]');
		doAnimations($animatingElements);
	});



	function doAnimations(elements) {
		var animationEndEvents = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';
		elements.each(function () {
			var $this = jQuery(this);
			var $animationDelay = $this.data('delay');
			var $animationType = 'animated ' + $this.data('animation');
			$this.css({
				'animation-delay': $animationDelay,
				'-webkit-animation-delay': $animationDelay
			});
			$this.addClass($animationType).one(animationEndEvents, function () {
				$this.removeClass($animationType);
			});
		});
	}

	var slick = jQuery('.slick-carousel');
	if (slick.length) {
		slick.slick({dots: true, autoplay: true});
	}

	if (window.location.pathname != '/' && !jQuery('body').hasClass('home')) {
		jQuery('#mainNav').find('.nav-link').on('click', function () {
			jQuery(location).attr('href', '/' + jQuery(this).attr("href"));
		});
	}

	jQuery(".navbar-toggler").click(function () {
		jQuery(".navbar-collapse").toggle("slow", function () {
		});
	});

	jQuery('.navbar-nav>li>a').on('click', function () {
		jQuery(".navbar-collapse").toggle();
	});

	var $grid = jQuery('.grid').masonry({
		itemSelector: '.grid-item',
		percentPosition: true,
		columnWidth: '.grid-sizer'
	});
	$grid.imagesLoaded().progress(function () {
		$grid.masonry();
	});


	if (!/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
		// You are in mobile browser
		jQuery('.fade-animate').addClass("hide-el").viewportChecker({
			classToAdd: 'show-el animated fadeInUp',
			offset: 80
		});
	}

	// Get the modal
	var modal = document.getElementById('myModal');
	var element = '';

	jQuery('.portfolio-link').on('click', function () {
		element = jQuery(this).attr('href');
		jQuery('body').addClass('body-modal');
		jQuery(element).addClass('modal-show');
	});


	// When the user clicks on <span> (x), close the modal
	jQuery('.close-modal, .close-button').on('click', function (event) {
		jQuery('body').removeClass('body-modal');
		jQuery('.modal').removeClass('modal-show');
		event.preventDefault();
		event.stopPropagation();
	});


	jQuery('.form-alert').on("click", ".close", function () {
		jQuery('.alert').hide();
	});


	// When the user clicks anywhere outside of the modal, close it
	window.onclick = function (event) {
		if (event.target === modal) {
			modal.style.display = "none";
		}
	};

	var navbar = jQuery('.navbar');
	if (!navbar.hasClass('block-affix')) {
		jQuery(window).on('scroll', function () {
			var scrollValue = jQuery(window).scrollTop();
			if (scrollValue > 50) {
				navbar.removeClass('affix-top').addClass('affix');
			} else {
				navbar.addClass('affix-top').removeClass('affix');
			}
		});
		jQuery(window).trigger("scroll");
	}

	var toolbar = document.querySelector(".portfolio-nav");
	if (toolbar) {
		toolbar.addEventListener("click", function (e) {
			jQuery('.portfolio-nav a.active').removeClass('active');
			jQuery(e.target).addClass('active');
			var anchor = jQuery(e.target).attr('data-name');
			if (!anchor) {
				return false;
			}
			runFunc(anchor);
			e.preventDefault();
			e.stopPropagation();
		});
	}

});

function runFunc(type) {
	var item1 = jQuery('.item1'),
		item2 = jQuery('.item2'),
		item3 = jQuery('.item3'),
		item4 = jQuery('.item4'),
		item5 = jQuery('.item5'),
		item6 = jQuery('.item6');

	switch (type) {
		case 'all':
			item1.show();
			item2.show();
			item3.show();
			item4.show();
			item5.show();
			item6.show();
			break;
		case 'first':
			item1.hide();
			item2.hide();
			item3.hide();
			item6.hide();
			item4.show();
			item5.show();
			break;
		case 'second':
			item4.hide();
			item5.hide();
			item6.hide();
			item1.show();
			item2.show();
			item3.show();
			break;
		case 'third':
			item2.hide();
			item3.hide();
			item1.show();
			item4.show();
			item5.show();
			item6.show();
			break;
	}
	jQuery('.grid').masonry();
}