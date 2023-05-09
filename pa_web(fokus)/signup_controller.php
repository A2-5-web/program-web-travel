<?php
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
	$name = $_POST["name"];
	$phone = $_POST["phone"];
	$address = $_POST["address"];
	$status = $_POST["status"];
	$gender = $_POST["gender"];
	$username = $_POST["username"];
	$password = $_POST["password"];

	// Insert data ke tabel users
	$sql = "INSERT INTO user (nama_user, no_user, alamat_user, status, jenis_kelamin, username, password)
	VALUES ('$name', '$phone', '$address', '$status', '$gender', '$username', '$password')";

	if (mysqli_query($conn, $sql)) {
		// Jika data berhasil ditambahkan, redirect ke halaman sukses
		header("Location: auth_form.php?view=login");
		exit();
	} else {
		// Jika terjadi kesalahan, tampilkan pesan error
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}

	// Tutup koneksi ke database
	mysqli_close($conn);
}
?>
