<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Email Verification</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<h1>User Registration</h1>
	<form action="registration.php" method="post" autocomplete="off">
		<p>
			<label>Full Name:</label>
			<input type="text" name="full_name">
		</p>
		<p>
			<label>Email Address:</label>
			<input type="email" name="email_address">
		</p>
		<p>
			<label>Password:</label>
			<input type="password" name="password">
		</p>
		<p>
			<button type="submit" name="submit">Sign Up</button>
		</p>
	</form>
</body>
</html>