<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
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
            header("Location: customer.php");
            exit();
        } elseif ($status == "travel_agent") {
            header("Location: agen_beranda.php");
            exit();
        } else {
            echo "Invalid user status.";
        }
    } else {
        // Jika data tidak ditemukan, tampilkan pesan error
        echo "<script>swal( 'Oops' ,  'Something went wrong!' ,  'error' );</script>";
    }
}

// Tutup koneksi ke database
mysqli_close($conn);
?>
!