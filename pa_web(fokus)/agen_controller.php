<?php
session_start();
// Koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_travel";

$conn = mysqli_connect('localhost', 'root', '', 'db_travel');

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
    exit;
}

// percabangan untuk menangani klik tombol submit pada form tambah data
if(isset($_POST['tambah'])){
	$nama = $_POST['nama'];
	$destinasi = $_POST['destinasi'];
	$deskripsi = $_POST['deskripsi'];
	$harga = $_POST['harga'];

	if(empty($nama) || empty($destinasi) || empty($deskripsi) || empty($harga)){
		// jika ada input yang kosong, tampilkan pesan error
		echo "Silakan lengkapi semua data!";
	}else{
		// jika semua input sudah terisi, panggil fungsi tambah_data untuk menambahkan data ke tabel db_travel
		tambah_data($nama, $destinasi, $deskripsi, $harga);
	}
}
function tambah_data($nama, $destinasi, $deskripsi, $harga){
    global $conn;
	// escape input untuk mencegah SQL Injection
    $id_user = $_SESSION['id_user'];
	$nama = mysqli_real_escape_string($conn, $nama);
	$destinasi = mysqli_real_escape_string($conn, $destinasi);
	$deskripsi = mysqli_real_escape_string($conn, $deskripsi);

	// query untuk menambahkan data ke tabel db_travel
	$query = "INSERT INTO paket (id_user,nama_paket, destinasi, deskripsi, harga) VALUES ($id_user,'$nama', '$destinasi', '$deskripsi', '$harga')";
	$result = mysqli_query($conn, $query);

	if($result){
		// jika query berhasil, redirect ke halaman tampil_data.php
		header('Location: agen_tiket.php');
		exit();
	}else{
		// jika query gagal, tampilkan pesan error
		echo "Gagal menambahkan data: " . mysqli_error($conn);
	}
}

function tampil_data($order_by){
    global $conn;
    $query = "SELECT * FROM paket ORDER BY $order_by ASC";
    $result = mysqli_query($conn, $query);
    return $result;
}


function tampil_data_by_id($id_paket){
	global $conn;
	$query = mysqli_query($conn, "SELECT * FROM paket WHERE id_paket='$id_paket'");
	return $query;
}

// percabangan untuk menangani klik tombol submit pada form tambah data
if(isset($_POST['ubah'])){
    $id_paket = $_POST['id_paket'];
	$nama = $_POST['nama_paket'];
	$destinasi = $_POST['destinasi'];
	$deskripsi = $_POST['deskripsi'];
	$harga = $_POST['harga'];

	if(empty($nama) || empty($destinasi) || empty($deskripsi) || empty($harga)){
		// jika ada input yang kosong, tampilkan pesan error
		echo "Silakan lengkapi semua data!";
	}else{
		// jika semua input sudah terisi, panggil fungsi tambah_data untuk menambahkan data ke tabel db_travel
		ubah_data($id_paket,$nama, $destinasi, $deskripsi, $harga);
	}
}

function ubah_data($id_paket, $nama_paket, $destinasi, $deskripsi, $harga){
    global $conn;
    $query = "UPDATE paket SET nama_paket='$nama_paket', destinasi='$destinasi', deskripsi='$deskripsi', harga='$harga' WHERE id_paket='$id_paket'";
    $result = mysqli_query($conn, $query);
    if($result){
		// jika query berhasil, redirect ke halaman tampil_data.php
		header('Location: agen_tiket.php');
		exit();
	}else{
		// jika query gagal, tampilkan pesan error
		echo "Gagal mengupdate data: " . mysqli_error($conn);
	}
}

if(isset($_GET['hapus'])){
    $id_paket = $_GET['hapus'];
    // panggil fungsi hapus_data untuk menghapus data dari tabel db_travel
    hapus_data($id_paket);
}

function hapus_data($id_paket) {
    global $conn;

    // query untuk menghapus data
    $query = "DELETE FROM paket WHERE id_paket = '$id_paket'";
    $result = mysqli_query($conn, $query);

    // mengecek apakah data berhasil dihapus atau tidak
    if ($result) {
        header("location: agen_tiket.php");
    } else {
        return false;
    }
}