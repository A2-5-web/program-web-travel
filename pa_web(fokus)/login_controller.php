<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
</html>
<?php

session_start();

// Hapus session
session_unset();

// Koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_travel";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Cek koneksi
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Cek apakah form telah di-submit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Cari data pengguna dengan username dan password yang sesuai di dalam tabel users
    $sql = "SELECT * FROM user WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) { 
        // Ambil data status pengguna
        $row = mysqli_fetch_assoc($result);
        $status = $row["status"];
        $_SESSION['id_user'] = $row['id_user'];

        // Redirect ke halaman sesuai status pengguna
        if ($status == "customer") {
            echo "<script>
                swal('Selamat', 'Login Berhasil', 'success').then(function() {
                    window.location.href = 'customer_pesan.php';
                });
            </script>";
        } elseif ($status == "travel_agent") {
            echo "<script>
                swal('Selamat', 'Login Berhasil', 'success').then(function() {
                    window.location.href = 'agen_beranda.php';
                });
            </script>";
        } elseif ($status == "admin") {
            echo "<script>
                swal('Selamat', 'Login Berhasil', 'success').then(function() {
                    window.location.href = 'admin_beranda.php';
                });
            </script>";
        } else {
            echo "<script>
                swal('Gagal', 'Status Pengguna Tidak Valid', 'error').then(function() {
                    window.location.href = 'auth_form.php';
                });
            </script>";
        }
    } else {
        // Jika data tidak ditemukan, tampilkan pesan error
        echo "<script>
                swal('Gagal', 'Username atau password salah', 'error').then(function() {
                    window.location.href = 'auth_form.php';
                });
            </script>";
    }
}

// Tutup koneksi ke database
mysqli_close($conn);
?>