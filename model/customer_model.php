<?php
class Model {
    private $db;
    
    public function __construct() {
        $this->db = new mysqli("db4free.net", "kelompok_5", "kelompok_5", "travel");
    }
    
    public function register($nama, $email, $password, $alamat, $telepon) {
        $query = "INSERT INTO customer (nama_customer, email_customer, password_customer, alamat_customer, telepon_customer)
        VALUES ('$nama', '$email', '$password', '$alamat', '$telepon')";
        $result = $this->db->query($query);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    
    public function login($email, $password) {
        $query = "SELECT * FROM customer WHERE email_customer='$email' AND password_customer='$password'";
        $result = $this->db->query($query);
        if ($result->num_rows == 1) {
            return true;
        } else {
            return false;
        }
    }
}
