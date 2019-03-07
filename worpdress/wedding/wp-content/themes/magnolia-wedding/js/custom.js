jQuery(document).ready(function () {
	"use strict";

	jQuery(".navbar-toggler").click(function () {
		jQuery(".navbar-collapse").toggle("slow", function () {
		});
	});

	// Hide Header on on scroll down
	var didScroll;
	var lastScrollTop = 0;
	var delta = 50;
	var navbarHeight = jQuery('header').outerHeight();

	jQuery(window).scroll(function (event) {
		didScroll = true;
	});

	setInterval(function () {
		if (didScroll) {
			hasScrolled();
			didScroll = false;
		}
	}, 150);

	jQuery('.navbar-nav > .menu-item-has-children').click(function (e) {

		jQuery(this).find('.dropdown-menu').toggleClass('show');
		e.preventDefault();
		e.stopPropagation();
	});

	function hasScrolled() {
		var st = jQuery(window).scrollTop();

		// Make sure they scroll more than delta
		if (Math.abs(lastScrollTop - st) <= delta)
			return;
		// If they scrolled down and are past the navbar, add class .nav-up.
		// This is necessary so you never see what is "behind" the navbar.
		if (st > lastScrollTop && st > navbarHeight) {
			// Scroll Down
			jQuery('header').removeClass('nav-down').removeClass('nav-top').addClass('nav-up');
		} else {
			// Scroll Up
			if (st < 200) {
				jQuery('header').addClass('nav-top');
			}

			if (st + jQuery(window).height() < jQuery(document).height()) {
				jQuery('header').removeClass('nav-up').addClass('nav-down');
			}
		}

		lastScrollTop = st;
	}

	var $slick = jQuery('.slick-carousel');
	if ($slick.length && $slick.hasClass('header-slider')) {
		$slick.on('init', function (event, slick) {
			$slick.find('.slick-current').removeClass('slick-active').addClass('reset-animation');
			setTimeout(function () {
				$slick.find('.slick-current').removeClass('reset-animation').addClass('slick-active');
			}, 1);
		});

		$slick.slick({dots: true, infinite: true, autoplay: true});
	}

	var $grid = jQuery('.grid').masonry({
		itemSelector: '.grid-item',
		percentPosition: true,
		columnWidth: '.grid-sizer'
	});
	$grid.imagesLoaded().progress(function () {
		$grid.masonry();
	});

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

	jQuery(document).click(function () {
		jQuery('.dropdown-menu.show').removeClass('show');
	});

	jQuery('.dropdown-menu').click(function (e) {
		e.stopPropagation();
	});

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