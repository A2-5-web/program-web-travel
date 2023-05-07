<?php
require_once('../model/customer_model.php');

if(isset($_POST['submit_login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $customerModel = new CustomerModel();
    $customer = $customerModel->getCustomerByEmail($email);

    if($customer && password_verify($password, $customer['password'])) {
        // Login berhasil
        session_start();
        $_SESSION['id_user'] = $customer['id_user'];
        $_SESSION['nama'] = $customer['nama'];
        $_SESSION['email'] = $customer['email'];
        $role = $customer['role'];
        if($role == 'customer') {
            header("Location: ../Travel5/home.html");
        } elseif ($role == 'agentravel') {
            header("Location: ../Travel5/galery.html");
        }
        exit();
    } else {
        // Login gagal
        echo "Email atau password salah";
    }
}


if(isset($_POST['submit_register'])) {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password_confirmation = $_POST['password_confirmation'];
    $alamat = $_POST['alamat'];
    $telepon = $_POST['telepon'];
    $role = $_POST['role'];

    // Validasi ulang password
    if($password !== $password_confirmation) {
        echo "Konfirmasi password tidak cocok";
        exit;
    }

    $password_hashed = password_hash($password, PASSWORD_DEFAULT);

    $customerModel = new CustomerModel();
    $result = $customerModel->addCustomer($nama, $email, $password_hashed, $alamat, $telepon, $role);

    if($result) {
        echo "Registrasi berhasil";
        header('location: ../view/customer_auth_view.php');
        exit;
    } else {
        echo "Registrasi gagal";
    }
}
