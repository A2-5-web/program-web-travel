<?php
require_once "../database/save_to_local.php";

class UserModel {
    private $conn;
    private $databaseBackup;
    public function __construct() {
        // Membuat koneksi ke database
        $this->conn = mysqli_connect('localhost', 'root', '', 'db_travel');
        if(!$this->conn) {
            die("Koneksi gagal: " . mysqli_connect_error());
        }
        // Membuat objek MainModel
        $this->databaseBackup = new DatabaseBackup($this->conn);
    }

    public function __destruct() {
        // Menutup koneksi ke database
        mysqli_close($this->conn);
    }

    public function addUser($nama, $telepon, $alamat, $status, $jenis_kelamin, $username,$password_hashed) {
        if(!preg_match("/^[0-9]+$/", $telepon)) {
            return "Telepon hanya boleh berisi angka!";
        }

        // Menghindari SQL injection dengan prepared statement
        $stmt = mysqli_prepare($this->conn, "INSERT INTO user (nama_user,no_user,alamat_user,status,jenis_kelamin,username,password) 
                                             VALUES (?, ?, ?, ?, ?, ?, ?)");
        mysqli_stmt_bind_param($stmt, "sssssss", $nama, $telepon, $alamat, $status, $jenis_kelamin, $username,$password_hashed);

        // Menjalankan prepared statement
        if(mysqli_stmt_execute($stmt)) {
            //simpan ke dalam database local
            $this->databaseBackup->backup();

            return "Registrasi berhasil";
        } else {
            return "Error: " . mysqli_stmt_error($stmt);
        }
    }

    public function getUserByUsername($username) {
        // Menghindari SQL injection dengan prepared statement
        $stmt = mysqli_prepare($this->conn, "SELECT * FROM user WHERE username = ?");
        mysqli_stmt_bind_param($stmt, "s", $username);

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
