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
          <input type="text" class="input" placeholder="Nama Lengkap" name="nama" />
          <i class="bx bx-user"></i>
        </div>

        <div class="input-field">
          <input type="email" class="input" placeholder="Email" name="email" />
          <i class="bx bx-envelope"></i>
        </div>

        <div class="input-field">
          <input type="Password" class="input" placeholder="Password" name="password" />
          <i class="bx bx-lock-alt"></i>
        </div>

        <div class="input-field">
          <input type="Password" class="input" placeholder="Konfirmasi Password" name="password_confirmation" />
          <i class="bx bx-lock-alt"></i>
        </div>
        <div class="input-field">
          <input type="text" class="input" placeholder="Alamat" name="alamat" />
          <i class="bx bx-lock-alt"></i>
        </div>
        <div class="input-field">
          <input type="text" class="input" placeholder="Nomor Telepon" name="telepon" />
          <i class="bx bx-lock-alt"></i>
        </div>
        <div class="two-col">
          <label for="role">Daftar Sebagai :</label>
          <select name="role" id="role">
            <option value="customer">Customer</option>
            <option value="agen_travel">Agen Travel</option>
          </select>
        </div>

        <div class="input-field">
          <input type="submit" name="submit_register" class="submit" value="Register"/>
        </div>
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
          <input type="text" class="input" placeholder="E-Mail" name="email" />
          <i class="bx bx-user"></i>
        </div>

        <div class="input-field">
          <input type="Password" class="input" placeholder="Password" name="password" />
          <i class="bx bx-lock-alt"></i>
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
