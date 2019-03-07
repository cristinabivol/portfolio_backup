<div class="container">
	<div class="row justify-content-center">
		<div class="col-12 col-md-10 col-lg-6">
			<form name="sentMessage" id="contactForm" novalidate="">
				<div class="row">
					<div class="form-group col-12">
						<input type="text" class="form-control" placeholder="Name *" id="name" required=""
									 data-validation-required-message="Please enter your name.">
						<p class="help-block text-danger"></p>
					</div>
					<div class="form-group col-12">
						<input type="email" class="form-control" placeholder="Email *" id="email" required=""
									 data-validation-required-message="Please enter your email address.">
						<p class="help-block text-danger"></p>
					</div>
					<div class="form-group col-12">
						<input type="text" class="form-control" placeholder="Subject *" id="subject" required=""
									 data-validation-required-message="Please enter the subject.">
						<p class="help-block text-danger"></p>
					</div>
					<div class="clearfix"></div>
					<div class="form-group col-12">
						<textarea class="form-control" placeholder="Message *" id="message" required=""
											data-validation-required-message="Please enter a message."></textarea>
						<p class="help-block text-danger"></p>
					</div>
					<div class="col-12">
						<div id="success" class="form-alert"></div>
					</div>

					<div class="col-12 text-center form-group submit">
						<button type="submit" class="contact-btn btn-xl">Send message</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
<script>
	jQuery(document).ready(function ($) {

		$("#contactForm input,#contactForm textarea").jqBootstrapValidation({
			preventSubmit: true,
			submitError: function ($form, event, errors) {
// additional error messages or events
			},
			submitSuccess: function ($form, event) {
				event.preventDefault(); // prevent default submit behaviour
// get values from FORM
				var name = $("input#name").val();
				var email = $("input#email").val();
				var subject = $("input#subject").val();
				var message = $("textarea#message").val();
				var firstName = name; // For Success/Failure Message
// Check for white space in name for Success/Fail message
				if (firstName.indexOf(' ') >= 0) {
					firstName = name.split(' ').slice(0, -1).join(' ');
				}
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
// Success message
						$('#success').html("<div class='alert alert-success'>");
						$('#success > .alert-success').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
							.append("</button>");
						$('#success > .alert-success')
							.append("<strong>Your message has been sent. </strong>");
						$('#success > .alert-success')
							.append('</div>');

//clear all fields
						$('#contactForm').trigger("reset");
					},
					error: function () {
// Fail message
						$('#success').html("<div class='alert alert-danger'>");
						$('#success > .alert-danger').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
							.append("</button>");
						$('#success > .alert-danger').append("<strong>Sorry " + firstName + ", it seems that my mail server is not responding. Please try again later!");
						$('#success > .alert-danger').append('</div>');
//clear all fields
						$('#contactForm').trigger("reset");
					}
				});
			},
			filter: function () {
				return $(this).is(":visible");
			}
		});
	});
</script>