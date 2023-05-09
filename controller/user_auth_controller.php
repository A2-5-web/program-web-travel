<?php
require_once('../model/user_model.php');

if(isset($_POST['submit_login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $userModel = new UserModel();
    $user = $userModel->getUserByUsername($username);

    if($user && password_verify($password, $user['password'])) {
        // Login berhasil
        session_start();
        $_SESSION['id_user'] = $user['id_user'];
        $_SESSION['nama'] = $user['nama'];
        $status = $user['status'];
        if($status == 'customer') {
            header("Location: ../Travel5/home.html");
        } elseif ($status == 'agen_trave') {
            header("Location: ../Travel5/galery.html");
        }
        exit();
    } else {
        // Login gagal
        echo "Email atau password salah";
    }
}


if(isset($_POST['submit_register'])) {
    $nama = $_POST['nama_user'];
    $telepon = $_POST['no_user'];
    $alamat = $_POST['alamat_user'];
    $status = $_POST['status'];
    $jenis_kelamin = $_POST['jk'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $password_hashed = password_hash($password, PASSWORD_DEFAULT);

    $userModel = new UserModel();
    $result = $userModel->addUser($nama, $telepon, $alamat, $status, $jenis_kelamin, $username,$password_hashed);

    if($result) {
        echo "Registrasi berhasil";
        header('location: ../view/user_auth_view.php');
        exit;
    } else {
        echo "Registrasi gagal";
    }
}
