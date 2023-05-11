<!--  -->
<?php
if(isset($_GET['view']) && $_GET['view'] == 'register') {
  // Tampilkan view registrasi
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../Travel5/css/signup.css" />
    <link
      href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css"
      rel="stylesheet"
    />
    <title>Register</title>
  </head>
  <body>
    <div class="box">
      <div class="container">
        <div class="top">
          <header>REGISTER</header>
        </div>
        <br />
		<form action="../controller/customer_auth_controller.php" method="post">
        <div class="input-field">
          <i class="bx bx-user"></i>
          <input type="text" class="input" placeholder="Nama Lengkap" name="nama" />
        </div>

        <div class="input-field">
          <i class="bx bx-envelope"></i>
          <input type="email" class="input" placeholder="Email" name="email" />
        </div>

        <div class="input-field">
          <i class="bx bx-lock-alt"></i>
          <input type="Password" class="input" placeholder="Password" name="password" />
        </div>

        <div class="input-field">
          <i class="bx bx-lock-alt"></i>
          <input type="Password" class="input" placeholder="Konfirmasi Password" name="password_confirmation" />
        </div>
        <div class="input-field">
          <i class="bx bx-map"></i>
          <input type="text" class="input" placeholder="Alamat" name="alamat" />
        </div>
        <div class="input-field">
          <i class="bx bx-phone"></i>
          <input type="text" class="input" placeholder="Nomor Telepon" name="telepon" />
        </div>
        <div class="two-col">
          <i class="bx bx-user"></i>
          <label for="role">Role</label>
          <select name="role" id="role">
            <option value="customer">Customer</option>
            <option value="agen_travel">Agen Travel</option>
          </select>
        </div>

        <div class="input-field">
          <input type="submit" name="submit_register" class="submit" value="Register"/>
        </div>
        <br>
        <div class="two-col">
          <div class="one">
            <input type="checkbox" name="" id="check" />
            <label for="check"> I agree to the terms and conditions</label>
          </div>
        </div>
		</form>
		<p>Sudah punya akun? <a href="?view=login">Login</a></p>
      </div>
    </div>
  </body>
</html>
<?php
} else {
  // Tampilkan view login
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../Travel5/css/signup.css" />
    <link
      href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css"
      rel="stylesheet"
    />
    <title>Login</title>
  </head>
  <body>
    <div class="box">
      <div class="container">
        <div class="top">
          <header>LOGIN</header>
        </div>
        <br />
		<form action="../controller/customer_auth_controller.php" method="post">
        <div class="input-field">
          <i class="bx bx-envelope"></i>
          <input type="text" class="input" placeholder="E-Mail" name="email" />
        </div>

        <div class="input-field">
          <i class="bx bx-lock-alt"></i>
          <input type="Password" class="input" placeholder="Password" name="password" />
        </div>

        <div class="input-field">
          <input type="submit" class="submit" value="Login" name="submit_login" />
        </div>
		</form>
		<p>Belum punya akun? <a href="?view=register">Daftar</a></p>
      </div>
    </div>
		<?php
		}
	?>
  </body>
</html>
