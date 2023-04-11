<!DOCTYPE html>
<html>
<head>
	<title>Login Form</title>
</head>
<body>
	<h2>Login Form</h2>
	<form method="post" action="">
		<label for="username">Username:</label>
		<input type="text" id="username" name="username" required><br><br>
		<label for="password">Password:</label>
		<input type="password" id="password" name="password" required><br><br>
		<input type="submit" value="Login">
	</form>
	<?php if (isset($error_message)) { echo "<p>$error_message</p>"; } ?>
<?php
// Start session
session_start();

// Connect to database
$host = "localhost";
$username = "admin";
$password = "1234";
$dbname = "day5lab";
$conn = mysqli_connect($host, $username, $password, $dbname);
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	// Collect form data
	$username = mysqli_real_escape_string($conn, $_POST['username']);
	$password = mysqli_real_escape_string($conn, $_POST['password']);

	// Check if user exists in database
	$sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
	$result = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result) > 0) {
		// User is authenticated, store their username in session
		$_SESSION['username'] = $username;

		// Redirect to welcome page
		header("Location: welcome.php");
		exit;
	} else {
		// Invalid credentials, show error message
		$error_message = "Invalid username or password.";
	}
}

mysqli_close($conn);
?>
</body>
</html>

