<form action="#" method="post" class="subscribe-form" target="_blank" novalidate="">
	<div class="input-group input-group-lg form-group">
		<input type="email" name="email" class="newsletter-email form-control" placeholder="Email address..." required=""
					 data-validation-required-message="Please enter your email address.">
		<p class="help-block text-danger"></p>
		<span class="input-group-btn">
			<button type="submit" name="subscribe" class="btn btn-xl">
				<i class="fa fa-angle-right" aria-hidden="true"></i>
			</button>
		</span>
	</div>
	<div class="subscribe-success form-alert"></div>
</form>
<script type="text/javascript">
	jQuery(document).ready(function ($) {
		$(".subscribe-form input").jqBootstrapValidation({
			preventSubmit: true,
			submitError: function ($form, event, errors) {
				// additional error messages or events
			},
			submitSuccess: function ($form, event) {
				event.preventDefault(); // prevent default submit behaviour
				var email = $("input.newsletter-email").val();
				$.ajax({
					url: '<?php echo admin_url( "admin-ajax.php" ) ?>',
					type: "POST",
					data: {
						action: 'newsletter_send',
						email: email
					},
					cache: false,
					success: function () {
						// Success message
						$($form).find('.subscribe-success').html("<div class='alert alert-success'>");
						$($form).find('.subscribe-success > .alert-success')
							.append("<strong>Your message has been sent. </strong>");
						$($form).find('.subscribe-success > .alert-success')
							.append('</div>');

						//clear all fields
						$('.subscribe-form').trigger("reset");
						setTimeout(function () {
							$(".subscribe-success").empty();
						}, 5000);
					},
					error: function () {
						// Fail message
						$($form).find('.subscribe-success').html("<div class='alert alert-danger'>");
						$($form).find('.subscribe-success > .alert-danger').append("<strong>Sorry, Please try again later!");
						$($form).find('.subscribe-success > .alert-danger').append('</div>');
						//clear all fields
						$($form).find('.subscribe-form').trigger("reset");
						$($form).find('.subscribe-form').trigger("reset");
						setTimeout(function () {
							$($form).find(".subscribe-success").empty();
						}, 5000);
					}
				});
			},
			filter: function () {
				return $(this).is(":visible");
			}
		});
	});
</script>