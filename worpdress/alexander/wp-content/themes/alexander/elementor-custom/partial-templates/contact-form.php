<div class="row justify-content-center">
	<div class="col-md-9 contact-form-cell">
		<form id="contact-form" class="needs-validation" novalidate>
			<div class="row">
				<div class="form-group col-md-6">
					<input type="text" name="name" class="form-control" placeholder="Name *" required>
					<div class="invalid-feedback">
						Please provide your name.
					</div>
				</div>
				<div class="form-group col-md-6">
					<input type="email" name="email" class="form-control" placeholder="Email *" required>
					<div class="invalid-feedback">
						Please provide a valid email.
					</div>
				</div>
				<div class="form-group col-md-12">
					<input type="text" name="subject" class="form-control" placeholder="Subject *" required>
					<div class="invalid-feedback">
						Please provide a subject.
					</div>
				</div>
				<div class="form-group col-md-12">
					<textarea class="form-control" name="message" placeholder="Message *" required></textarea>
					<div class="invalid-feedback">
						Please provide a message.
					</div>
				</div>
				<div class="col-md-12 text-center">
					<div id="success"></div>
					<button type="submit" class="common-button">Send message</button>
				</div>
			</div>
		</form>
	</div>
</div>