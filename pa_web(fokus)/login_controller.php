<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
</html>
<?php
session_unset();
session_start();

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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Ambil data pengguna berdasarkan username
    $getUserQuery = "SELECT * FROM user WHERE username='$username'";
    $getUserResult = mysqli_query($conn, $getUserQuery);

    if (mysqli_num_rows($getUserResult) > 0) {
        $row = mysqli_fetch_assoc($getUserResult);
        $hashedPassword = $row['password'];

        // Verifikasi hash password
        if (password_verify($password, $hashedPassword)) {
            // Autentikasi berhasil
            $status = $row["status"];
            $_SESSION['id_user'] = $row['id_user'];
            $_SESSION['status'] = $row['status'];
            $_SESSION['login'] = true;

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
            // Password salah
            echo "<script>
                swal('Gagal', 'Username atau password salah', 'error').then(function() {
                    window.location.href = 'auth_form.php';
                });
            </script>";
        }
    } else {
        // Username tidak ditemukan
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