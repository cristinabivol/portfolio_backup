<div class="row justify-content-center">
	<div class="col-md-9 contact-form-cell">
		<form id="contact-form" class="needs-validation" novalidate>
			<div class="row">
				<div class="form-group col-md-6">
					<input type="text" name="name" class="form-control" data-validation-required-message="Please enter your Name."
								 placeholder="Name *" required="">
					<p class="help-block text-danger"></p>
				</div>
				<div class="form-group col-md-6">
					<input type="email" name="email" class="form-control"
								 data-validation-required-message="Please enter your email address." placeholder="Email *" required="">
					<p class="help-block text-danger"></p>
				</div>
				<div class="form-group col-md-12">
					<input type="text" name="subject" class="form-control"
								 data-validation-required-message="Please enter a subject." placeholder="Subject *" required="">
					<p class="help-block text-danger"></p>
				</div>
				<div class="form-group col-md-12">
					<textarea class="form-control" name="message" data-validation-required-message="Please enter a message."
										placeholder="Message *" required=""></textarea>
					<p class="help-block text-danger"></p>
				</div>
				<div class="col-md-12 text-center">
					<div id="success"></div>
					<button type="submit" class="common-button">Send message</button>
				</div>
			</div>
		</form>
	</div>
</div>
<script>
	jQuery(document).ready(function ($) {

		$("#contact-form input,#contact-form textarea").jqBootstrapValidation({
			preventSubmit: true,
			submitError: function ($form, event, errors) {
// additional error messages or events
			},
			submitSuccess: function ($form, event) {
				console.log("start contact success");
				event.preventDefault(); // prevent default submit behaviour
// get values from FORM
				var name = $("input#name").val();
				var email = $("input#email").val();
				var subject = $("input#subject").val();
				var message = $("textarea#message").val();
				$.ajax({
					url: '<?php echo admin_url( "admin-ajax.php" ) ?>',
					type: "POST",
					data: {
						action: 'contact_send',
						name: name,
						email: email,
						subject: subject,
						message: message
					},
					cache: false,
					success: function () {
						$('#success').html("<div class='alert alert-success'>");
						$('#success > .alert-success')
							.append("<strong>Your message has been sent. </strong>");
						$('#success > .alert-success')
							.append('</div>');
						$('#contact-form').trigger("reset");
						setTimeout(function () {
							$($form).find("#success").empty();
						}, 5000);
					},
					error: function () {
						$('#success').html("<div class='alert alert-danger'>");
						$('#success > .alert-danger').append("<strong>Sorry, Please try again later!");
						$('#success > .alert-danger').append('</div>');
						$('#contact-form').trigger("reset");
						setTimeout(function () {
							$($form).find("#success").empty();
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