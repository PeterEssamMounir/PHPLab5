<!DOCTYPE html>
<html>
	<head>
		<title>Signup Form</title>
	</head>
	<body>
		<h2>Signup Form</h2>
		<form method="post" action="register.php">
			<label for="username">Username:</label>
			<input type="text" id="username" name="username" required><br><br>
			<label for="password">Password:</label>
			<input type="password" id="password" name="password" required><br><br>
			<label for="email">Email:</label>
			<input type="email" id="email" name="email" required><br><br>
			<input type="submit" value="Signup">
		</form>
		
        <?php
            // Connect to database
            $host = "localhost";
            $username = "admin";
            $password = "1234";
            $dbname = "day5lab";
            $conn = mysqli_connect($host, $username, $password, $dbname);

            if (!$conn) {
            	die("Connection failed: " . mysqli_connect_error());
            }

            // Check if form has been submitted
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
            	// Collect form data
            	$username = mysqli_real_escape_string($conn, $_POST['username']);
            	$password = mysqli_real_escape_string($conn, $_POST['password']);
            	$email = mysqli_real_escape_string($conn, $_POST['email']);
            
            	// Insert user data into database
            	$sql = "INSERT INTO users (username, password, email) VALUES ('$username', '$password', '$email')";
            	if (mysqli_query($conn, $sql)) {
            		// Redirect to success page
            		header("Location: login.php");
            		exit;
            	} else {
            		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            	}
            }

mysqli_close($conn);
?>

	</body>
</html>
