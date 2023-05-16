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
	<link rel="stylesheet" href="../pa_web(fokus)/css/login.css" />
	<link
      href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css"
      rel="stylesheet"
    />
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>
	     <!-- untuk memeriksa apakah ada pesan yang akan ditampilkan atau tidak -->
  <?php
  if (isset($_GET['pesan'])) {
    $pesan = $_GET['pesan'];
    echo "<script>var pesan = '$pesan';
                swal({
                  title: 'Pesan',
                  text: pesan,
                  icon: 'error',
				  button: false,
				  timer: 2000
                }).then(function() {
                  window.location.href = 'auth_form.php?view=register';
                });
          </script>";
  }
  ?>
<div class="box">
	<div class="container">
		<?php if($view === "login"): ?>
			<div class="top">
			<br>
			<h2>LOGIN</h2>
			<br>
			<form method="post" action="login_controller.php">
				<i class="bx bx-user"></i>
				<label for="username">Username:</label>
				<input type="text" name="username" id="username" required><br><br>

				<i class="bx bx-lock-alt"></i>
				<label for="password">Password:</label>
				<input type="password" name="password" id="password" required><br><br>

				<center><input type="submit" name="submit" value="Login"></center>
				<br>
				<p>Belum punya akun?<a href="?view=register"> Sign Up</a></p>
		</form>
	</div>
</div>
	<?php elseif($view === "register"): ?>
		<br>
		<h2>SIGN-UP</h2>
		<br>
		<form method="post" action="signup_controller.php">
			<i class="bx bx-user">
			<label for="name">Name:</label>
			<input type="text" name="name" id="name" required><br><br>

			<i class="bx bx-map"></i>
			<label for="phone">Phone:</label>
			<input type="tel" name="phone" id="phone" required><br><br>

			<i class="bx bx-phone"></i>
			<label for="address">Address:</label>
			<textarea name="address" id="address" required></textarea><br><br>

			<i class="bx bx-check-circle"></i>
			<label for="status">Status:</label>
			<select name="status" id="status" required>
				<option value="customer">Customer</option>
				<option value="travel_agent">Travel Agent</option>
			</select><br><br>

			<i class="bx bx-gender"></i>
			<label for="gender">Gender:</label>
			<input type="radio" name="gender" id="gender-male" value="L" required>Male
			<input type="radio" name="gender" id="gender-female" value="P" required>Female<br><br>

			<i class="bx bx-user">
			<label for="username">Username:</label>
			<input type="text" name="username" id="username" required><br><br>

			<i class="bx bx-lock-alt"></i>
			<label for="password">Password:</label>
			<input type="password" name="password" id="password" required><br><br>

			<input type="submit" name="submit" value="Sign Up">
			<br><br>
			<p>Sudah punya akun?<a href="?view=login">Login</a></p>
		</form>
	<?php endif; ?>
</body>

</html>
