<?php

// Konfigurasi database
$db_host = "db4free.net";
$db_name = "travel";
$db_user = "kelompok_5";
$db_pass = "kelompok_5";

// Membuat koneksi ke database
$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

// Mengecek apakah koneksi berhasil
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

echo "Koneksi berhasil";

// Menutup koneksi
mysqli_close($conn);

?>
