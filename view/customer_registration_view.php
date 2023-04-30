<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
</head>
<body>
    <h1>Halaman Registrasi Customer</h1>
    <form action="../controller/customer_registration_controller.php" method="post">
        <label for="nama_customer">Nama :</label>
        <input type="text" name="nama_customer" id="nama_customer"><br><br>

        <label for="email_customer">Email :</label>
        <input type="text" name="email_customer" id="email_customer"><br><br>

        <label for="password_customer">Password :</label>
        <input type="password" name="password_customer" id="password_customer"><br><br>

        <label for="alamat_customer">Alamat :</label>
        <input type="text" name="alamat_customer" id="alamat_customer"><br><br>

        <label for="telepon_customer">Nomor Telepon :</label>
        <input type="number" name="telepon_customer" id="telepon_customer"><br><br>

        <button type="submit" name="register">Registrasi!</button>
    </form>
</body>
</html>