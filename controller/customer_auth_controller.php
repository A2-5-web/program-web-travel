<?php
require_once('../model/customer_model.php');

if(isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $customerModel = new CustomerModel();
    $customer = $customerModel->getCustomerByEmail($email);

    if($customer && password_verify($password, $customer['password_customer'])) {
        // Login berhasil
        session_start();
        $_SESSION['id_customer'] = $customer['id_customer'];
        $_SESSION['nama_customer'] = $customer['nama_customer'];
        $_SESSION['email_customer'] = $customer['email_customer'];
        header("Location: ../Travel5/home.html");
        exit();
    } else {
        // Login gagal
        echo "Email atau password salah";
    }
}

if(isset($_POST['submit_register'])) {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $alamat = $_POST['alamat'];
    $telepon = $_POST['telepon'];

    $customerModel = new CustomerModel();
    $result = $customerModel->addCustomer($nama, $email, $password, $alamat, $telepon);

    if($result) {
        echo "Registrasi berhasil";
    } else {
        echo "Registrasi gagal";
    }
}
