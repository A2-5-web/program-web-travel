<?php

class CustomerModel {
    private $conn;

    public function __construct() {
        // Membuat koneksi ke database
        $this->conn = mysqli_connect('db4free.net', 'kelompok_5', 'kelompok_5', 'travel');
        if(!$this->conn) {
            die("Koneksi gagal: " . mysqli_connect_error());
        }
    }

    public function __destruct() {
        // Menutup koneksi ke database
        mysqli_close($this->conn);
    }

    public function addCustomer($nama, $email, $password, $alamat, $telepon) {
        // Validasi input
        if(empty($nama) || empty($email) || empty($password) || empty($alamat) || empty($telepon)) {
            return "Harap isi semua data!";
        }

        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return "Email tidak valid!";
        }

        if(strlen($password) < 6) {
            return "Password minimal 6 karakter!";
        }

        if(!preg_match("/^[0-9]+$/", $telepon)) {
            return "Telepon hanya boleh berisi angka!";
        }

        // Menghindari SQL injection dengan prepared statement
        $stmt = mysqli_prepare($this->conn, "INSERT INTO customer (nama_customer, email_customer, password_customer, alamat_customer, telepon_customer) 
                                             VALUES (?, ?, ?, ?, ?)");
        mysqli_stmt_bind_param($stmt, "sssss", $nama, $email, $password, $alamat, $telepon);

        // Menjalankan prepared statement
        if(mysqli_stmt_execute($stmt)) {
            return "Registrasi berhasil";
        } else {
            return "Error: " . mysqli_stmt_error($stmt);
        }
    }

    public function getCustomerByEmail($email) {
        // Menghindari SQL injection dengan prepared statement
        $stmt = mysqli_prepare($this->conn, "SELECT * FROM customer WHERE email_customer = ?");
        mysqli_stmt_bind_param($stmt, "s", $email);

        // Menjalankan prepared statement
        if(mysqli_stmt_execute($stmt)) {
            $result = mysqli_stmt_get_result($stmt);
            if($result && mysqli_num_rows($result) > 0) {
                return mysqli_fetch_assoc($result);
            } else {
                return null;
            }
        } else {
            return "Error: " . mysqli_stmt_error($stmt);
        }
    }
}
