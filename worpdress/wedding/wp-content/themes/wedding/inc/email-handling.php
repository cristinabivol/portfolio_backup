<?php

add_action( "wp_ajax_contact_send", "sendContactMail" );
add_action( "wp_ajax_nopriv_contact_send", "sendContactMail" );

function sendContactMail() {
	return true;
	$name    = sanitize_text_field( $_POST["name"] );
	$email   = sanitize_email( $_POST["email"] );
	$subject = sanitize_text_field( $_POST["subject"] );
	$message = esc_textarea( $_POST["message"] );
	$headers = "From: $name <$email>" . "\r\n";
	$to      = get_option( 'admin_email' );

	$isSend = wp_mail( $to, $subject, $message, $headers );
	if ( $isSend ) {
		return true;
	}
	header( 'HTTP/1.0 404 Not Found' );
	exit;
}


add_action( "wp_ajax_newsletter_send", "sendSubscribeMail" );
add_action( "wp_ajax_nopriv_newsletter_send", "sendSubscribeMail" );

function sendSubscribeMail() {
	$email   = sanitize_email( $_POST["email"] );
	$headers = "From: <$email>" . "\r\n";
	$to      = get_option( 'admin_email' );
	$message = sprintf( __( 'You have a new subscription on your website from user:.', 'wedding' ), $email );
	$subject = __( 'Newsletter Submition', 'wedding' );
	$isSend  = wp_mail( $to, $subject, $message, $headers );
	if ( $isSend ) {
		return true;
	}
	header( 'HTTP/1.0 404 Not Found' );
	exit;
}