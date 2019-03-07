jQuery(document).ready(function () {
	"use strict";

	var navChildren = jQuery(".navbar-nav li").children();
	var aArray = [];
	for (var i = 0; i < navChildren.length; i++) {
		var aChild = navChildren[i];
		var ahref = jQuery(aChild).attr('href');
		aArray.push(ahref);
	}
	if (jQuery('body.home').length && jQuery(aArray[0]).length) {
		jQuery(window).scroll(function () {
			var windowPos = jQuery(window).scrollTop();
			for (var i = 0; i < aArray.length; i++) {
				var theID = aArray[i];
				var secPosition = jQuery(theID).offset().top;
				secPosition = secPosition - 66;
				var divHeight = jQuery(theID).height();
				divHeight = divHeight + 200;
				if (windowPos >= secPosition && windowPos < (secPosition + divHeight)) {
					jQuery(".navbar-nav a.active").removeClass("active");
					jQuery("a[href='" + theID + "']").addClass("active");
				}
			}
		});
	}
});