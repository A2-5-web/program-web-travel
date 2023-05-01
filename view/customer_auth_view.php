<!DOCTYPE html>
<html>
<head>
	<title>Login / Registrasi</title>
</head>
<body>
	<?php
		// Mengecek apakah terdapat parameter 'view' pada URL
		if(isset($_GET['view'])) {
			$view = $_GET['view'];
		} else {
			$view = 'login';
		}

		if($view == 'register') {
			// Jika parameter 'view' bernilai 'register', tampilkan form registrasi
	?>
			<h1>Registrasi</h1>
			<form method="post" action="../controller/customer_auth_controller.php">
				<label>Nama:</label>
				<input type="text" name="nama" required>
				<br>
				<label>Email:</label>
				<input type="email" name="email" required>
				<br>
				<label>Password:</label>
				<input type="password" name="password" required>
				<br>
				<label>Alamat:</label>
				<textarea name="alamat" required></textarea>
				<br>
				<label>Telepon:</label>
				<input type="tel" name="telepon" required>
				<br>
				<input type="submit" name="submit_register" value="Register">
			</form>
			<p>Sudah punya akun? <a href="?view=login">Login</a></p>
	<?php
		} else {
			// Jika parameter 'view' tidak ditemukan atau bernilai 'login', tampilkan form login
	?>
				<h1>Login</h1>
				<form method="post" action="../controller/customer_auth_controller.php">
					<label for="email">Email:</label>
					<input type="email" name="email" id="email" required><br><br>

					<label for="password">Password:</label>
					<input type="password" name="password" id="password" required><br><br>

					<input type="submit" name="submit" value="Login">
				</form>
				<p>Belum punya akun? <a href="?view=register">Registrasi</a></p>
	<?php
		}
	?>
</body>
</html>
