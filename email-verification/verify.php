<?php 
	$connection = mysqli_connect('localhost', 'root', '', 'userdb');

	if (isset($_GET['code'])) {
		$verification_code = mysqli_real_escape_string($connection, $_GET['code']);

		$query = "SELECT * FROM users WHERE verification_code = '{$verification_code}'";

		$result = mysqli_query($connection, $query);

		if (mysqli_num_rows($result) == 1) {
			$query = "UPDATE users SET is_active = true, verification_code = NULL WHERE verification_code = '{$verification_code}' LIMIT 1";

			$result = mysqli_query($connection, $query);

			if (mysqli_affected_rows($connection) == 1) {
				echo 'Email address verified successfully.';
			} else {
				echo 'Invalid verification code.';
			}
		}
	}




 ?>