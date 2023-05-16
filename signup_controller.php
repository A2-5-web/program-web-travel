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
    // Ambil data dari form dan membersihkan nilainya
    $name = mysqli_real_escape_string($conn, $_POST["name"]);
    $phone = mysqli_real_escape_string($conn, $_POST["phone"]);
    $address = mysqli_real_escape_string($conn, $_POST["address"]);
    $status = mysqli_real_escape_string($conn, $_POST["status"]);
    $gender = mysqli_real_escape_string($conn, $_POST["gender"]);
    $username = mysqli_real_escape_string($conn, $_POST["username"]);
    $password = mysqli_real_escape_string($conn, $_POST["password"]);

    // Validasi setiap variabel
    if (empty($name) || empty($phone) || empty($address) || empty($status) || empty($gender) || empty($username) || empty($password)) {
        echo "All fields are required. Please fill in all the fields.";
    } else {
        // Cek apakah username sudah ada dalam database
        $checkUsernameQuery = "SELECT * FROM user WHERE username = '$username'";
        $checkUsernameResult = mysqli_query($conn, $checkUsernameQuery);
        if (mysqli_num_rows($checkUsernameResult) > 0) {
            // Jika username sudah ada, tampilkan pesan error
            header("location: auth_form.php?pesan=Username sudah digunakan&view=register");
        } else {
            // Enkripsi password
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            // Insert data ke tabel users
            $sql = "INSERT INTO user (nama_user, no_user, alamat_user, status, jenis_kelamin, username, password)
            VALUES ('$name', '$phone', '$address', '$status', '$gender', '$username', '$hashedPassword')";

            if (mysqli_query($conn, $sql)) {
                // Jika data berhasil ditambahkan, redirect ke halaman sukses
                header("Location: auth_form.php?view=login");
                exit();
            } else {
                // Jika terjadi kesalahan, tampilkan pesan error
                header("location: auth_form.php?pesan=Login Gagal");
            }
        }
    }

    // Tutup koneksi ke database
    mysqli_close($conn);
}
?>
