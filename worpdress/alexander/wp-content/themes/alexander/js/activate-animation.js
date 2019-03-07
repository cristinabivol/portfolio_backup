jQuery(document).ready(function () {
	if (!/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
		jQuery('.fade-animate').addClass("hide-el").viewportChecker({
			classToAdd: 'show-el animated fadeInUp',
			offset: 150
		});
	}
});