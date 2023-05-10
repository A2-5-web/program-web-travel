<?php
// Mendefinisikan nilai awal view
$view = "login";
// Cek apakah nilai view berubah dari parameter GET
if(isset($_GET['view']) && $_GET['view'] === "register") {
    $view = "register";
}
?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo $view; ?> Form</title>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>
	<?php if($view === "login"): ?>
		<h2>Login Form</h2>
		<form method="post" action="login_controller.php">
			<label for="username">Username:</label>
			<input type="text" name="username" id="username" required><br><br>

			<label for="password">Password:</label>
			<input type="password" name="password" id="password" required><br><br>

			<input type="submit" name="submit" value="Login">
			<br><br>
			<a href="?view=register">Sign Up</a>
		</form>
	<?php elseif($view === "register"): ?>
		<h2>Sign-up Form</h2>
		<form method="post" action="signup_controller.php">
			<label for="name">Name:</label>
			<input type="text" name="name" id="name" required><br><br>

			<label for="phone">Phone:</label>
			<input type="tel" name="phone" id="phone" required><br><br>

			<label for="address">Address:</label>
			<textarea name="address" id="address" required></textarea><br><br>

			<label for="status">Status:</label>
			<select name="status" id="status" required>
				<option value="customer">Customer</option>
				<option value="travel_agent">Travel Agent</option>
			</select><br><br>

			<label for="gender">Gender:</label>
			<input type="radio" name="gender" id="gender-male" value="L" required>Male
			<input type="radio" name="gender" id="gender-female" value="P" required>Female<br><br>

			<label for="username">Username:</label>
			<input type="text" name="username" id="username" required><br><br>

			<label for="password">Password:</label>
			<input type="password" name="password" id="password" required><br><br>

			<input type="submit" name="submit" value="Sign Up">
			<br><br>
			<a href="?view=login">Login</a>
		</form>
	<?php endif; ?>
</body>
</html>
