<?php
require_once('../model/customer_model.php');

$model = new Model();

if (isset($_POST['register'])) {
    $nama = $_POST['nama_customer'];
    $email = $_POST['email_customer'];
    $password = $_POST['password_customer'];
    $alamat = $_POST['alamat_customer'];
    $telepon = $_POST['telepon_customer'];
    $register = $model->register($nama, $email, $password, $alamat, $telepon);
    if ($register) {
        // Registrasi berhasil, redirect ke halaman login
        echo "<script>alert('Berhasil Menambahkan!');</script>";
        header("location: ../view/customer_registration_view.php");
    } else {
        // Registrasi gagal, tampilkan pesan kesalahan
        echo "Registrasi gagal.";
    }
}
