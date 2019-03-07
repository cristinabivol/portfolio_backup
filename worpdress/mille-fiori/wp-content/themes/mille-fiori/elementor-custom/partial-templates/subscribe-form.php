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
	<div id="subscribe2-success" class="form-alert"></div>
</form>
<script type="text/javascript">
	jQuery(document).ready(function ($) {
		$("#subscribe-form input").jqBootstrapValidation({
			preventSubmit: true,
			submitError: function ($form, event, errors) {
				console.log('inside error');
				// additional error messages or events
			},
			submitSuccess: function ($form, event) {
				console.log('inside success');
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
						$('#subscribe2-success').html("<div class='alert alert-success'>");
						$('#subscribe2-success > .alert-success').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
							.append("</button>");
						$('#subscribe2-success > .alert-success')
							.append("<strong>Your message has been sent. </strong>");
						$('#subscribe2-success > .alert-success')
							.append('</div>');

						//clear all fields
						$('#subscribe-form').trigger("reset");
					},
					error: function () {
						// Fail message
						$('#subscribe2-success').html("<div class='alert alert-danger'>");
						$('#subscribe2-success > .alert-danger').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
							.append("</button>");
						$('#subscribe2-success > .alert-danger').append("<strong>Sorry, Please try again later!");
						$('#subscribe2-success > .alert-danger').append('</div>');
						//clear all fields
						$('#subscribe-form').trigger("reset");
					}
				});
			},
			filter: function () {
				return $(this).is(":visible");
			}
		});
	});
</script>