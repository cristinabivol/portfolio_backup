(function () {
	'use strict';
	//Add top navigation adjustments based on scroll
	if (!jQuery('.navbar').hasClass('block-affix')) {
		jQuery(window).on('scroll', function (event) {
			var scrollValue = jQuery(window).scrollTop();
			if (scrollValue > 100) {
				jQuery('.navbar').removeClass('affix-top').addClass('affix');
			} else {
				jQuery('.navbar').addClass('affix-top').removeClass('affix');
			}
		});
		jQuery(window).trigger("scroll");
		jQuery('body').scrollspy({
			target: '#mainNav',
			offset: 100
		});
	}

	jQuery('.scroll-to .elementor-button-link').click(function () {
		jQuery('html, body').animate({
			scrollTop: jQuery('#book-form').offset().top - 200
		}, 1000);
		return false;
	});

	window.addEventListener('load', function () {
		// Fetch all the forms we want to apply custom Bootstrap validation styles to
		var forms = document.getElementsByClassName('needs-validation');
		// Loop over them and prevent submission
		var validation = Array.prototype.filter.call(forms, function (form) {
			form.addEventListener('submit', function (event) {
				form.classList.add('was-validated');
				if (form.checkValidity() === false) {
					event.preventDefault();
					event.stopPropagation();
				}
			}, false);
		});
	}, false);

	jQuery('#contact-form').submit(function (event) {

		if (this.checkValidity() === false) {
			return false;
		}
		jQuery.ajax({
			url: '/wp-admin/admin-ajax.php',
			type: "POST",
			data: {
				action: 'contact_send',
				name: this.name.value,
				email: this.email.value,
				subject: this.subject.value,
				message: this.message.value,
			},
			cache: false,
			success: function () {
				// Success message
				jQuery('#success').html("<div class='alert alert-success'>");
				jQuery('#success > .alert-success').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
					.append("</button>");
				jQuery('#success > .alert-success')
					.append("<strong>Your message has been sent. </strong>");
				jQuery('#success > .alert-success')
					.append('</div>');

				//clear all fields
				// form.trigger("reset");
			},
			error: function () {
				// Fail message
				jQuery('#success').html("<div class='alert alert-danger'>");
				jQuery('#success > .alert-danger').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
					.append("</button>");
				jQuery('#success > .alert-danger').append("<strong>Sorry, it seems that my mail server is not responding. Please try again later!");
				jQuery('#success > .alert-danger').append('</div>');
				//clear all fields
				//  form.trigger("reset");
			}
		});

		event.preventDefault();
		event.stopPropagation();
	});

	jQuery('#book-form').submit(function (event) {

		if (this.checkValidity() === false) {
			return false;
		}
		jQuery.ajax({
			url: '/wp-admin/admin-ajax.php',
			type: "POST",
			data: {
				action: 'book_send',
				name: this.name.value,
				email: this.phone.value,
				subject: this.amount.value,
				message: this.datetime.value,
			},
			cache: false,
			success: function () {
				// Success message
				jQuery('#success').html("<div class='alert alert-success'>");
				jQuery('#success > .alert-success').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
					.append("</button>");
				jQuery('#success > .alert-success')
					.append("<strong>Your message has been sent. </strong>");
				jQuery('#success > .alert-success')
					.append('</div>');
			},
			error: function () {
				// Fail message
				jQuery('#success').html("<div class='alert alert-danger'>");
				jQuery('#success > .alert-danger').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
					.append("</button>");
				jQuery('#success > .alert-danger').append("<strong>Sorry, it seems that my mail server is not responding. Please try again later!");
				jQuery('#success > .alert-danger').append('</div>');
			}
		});

		event.preventDefault();
		event.stopPropagation();
	});

	jQuery('#subscribe-form').submit(function (event) {

		if (this.checkValidity() === false) {
			return false;
		}
		jQuery.ajax({
			url: '/wp-admin/admin-ajax.php',
			type: "POST",
			data: {
				action: 'subscribe_send',
				name: this.email.value,
			},
			cache: false,
			success: function () {
				// Success message
				jQuery('.common-button>.fa').removeClass('fa-angle-right').addClass('fa-check');
			},
			error: function () {
				// Fail message
				jQuery('.common-button>.fa').removeClass('fa-angle-right').addClass('fa-times');
			}
		});

		event.preventDefault();
		event.stopPropagation();
	});
})();