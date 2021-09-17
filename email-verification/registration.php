<?php 
	$connection = mysqli_connect('localhost', 'root', '', 'userdb');

	if (isset($_POST['submit'])) {
		$full_name		= mysqli_real_escape_string($connection, $_POST['full_name']);
		$email_address  = mysqli_real_escape_string($connection, $_POST['email_address']);
		$password	    = mysqli_real_escape_string($connection, $_POST['password']);

		$verification_code = sha1($email_address . time());
		$verfication_URL  = 'http://localhost/email-verification/verify.php?code=' . $verification_code;

		$query = "INSERT INTO users (full_name, email_address, password, verification_code, is_active) VALUES ('{$full_name}', '{$email_address}', '{$password}', '{$verification_code}', false)";

		$result = mysqli_query($connection, $query);

		// mail sending code
		$to	 		  = $email_address; // receiver
		$sender		  = 'info@bestjobslk.com'; // email address of the sender
		$mail_subject = 'Verify Email Address';
		$email_body   = '<p>Dear ' . $full_name . '</p>';
		$email_body  .= '<p>Thank you for signing up. There is one more step.
Click below link to verify your email address in order to activate your account.</p>';
		$email_body  .= '<p>' . $verfication_URL . '</p>';
		$email_body  .= '<p>Thank You, <br>BestJobsLK</p>';

		$header       = "From: {$sender}\r\nContent-Type: text/html;";

		$send_mail_result = mail($to, $mail_subject, $email_body, $header);

		if ( $send_mail_result ) {
			// mail sent successfully
			echo 'Please check your email.';
		} else {
			// mail could not be sent 
			echo 'Error.';
		}

	}


	
 ?>