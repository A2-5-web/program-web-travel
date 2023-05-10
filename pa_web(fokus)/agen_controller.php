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
//----------------------LOGOUT--------------------------//
if (isset($_GET['action']) && $_GET['action'] == 'logout') {
    // Hapus session id_user
    unset($_SESSION['id_user']);
    // Redirect ke halaman login
    header('Location: auth_form.php');
    exit;
}

//----------------------TAMBAH DATA-----------------------//
// percabangan untuk menangani klik tombol submit pada form tambah data
if (isset($_POST['tambah'])) {
    $nama = $_POST['nama'];
    $destinasi = $_POST['destinasi'];
    $deskripsi = $_POST['deskripsi'];
    $harga = $_POST['harga'];
    $paket_tour = $_POST['paket_tour'];
    $durasi = $_POST['durasi'];
    $gambar = $_FILES['gambar']['name'];
    $gambar_tmp = $_FILES['gambar']['tmp_name'];
    tambah_data($nama, $destinasi, $deskripsi, $paket_tour, $durasi, $harga, $gambar, $gambar_tmp);
}
function tambah_data($nama, $destinasi, $deskripsi, $paket_tour, $durasi, $harga, $gambar, $gambar_tmp) {
    global $conn;

    // escape input untuk mencegah SQL Injection
    $id_user = $_SESSION['id_user'];
    $nama = mysqli_real_escape_string($conn, $nama);
    $destinasi = mysqli_real_escape_string($conn, $destinasi);
    $deskripsi = mysqli_real_escape_string($conn, $deskripsi);
    $paket_tour = $paket_tour;
    $durasi = $durasi;
    // membuat path file tujuan
    $path = "img/" . basename($gambar);
    // mengambil nama file gambar
    $nama_gambar = basename($gambar);
    // query untuk menambahkan data ke tabel db_travel
    $query = "INSERT INTO paket (id_user,nama_paket, destinasi, deskripsi, paket_tour, durasi, harga, nama_gambar) VALUES ($id_user,'$nama', '$destinasi', '$deskripsi', '$paket_tour', '$durasi', '$harga', '$nama_gambar')";
    $result = mysqli_query($conn, $query);
    if ($result) {
        // jika query berhasil, pindahkan file ke folder uploads
        if (move_uploaded_file($gambar_tmp, $path)) {
            // jika file berhasil dipindahkan, redirect ke halaman tampil_data.php
            header('Location: agen_tiket.php');
            exit();
        } else {
            // jika gagal memindahkan file, tampilkan pesan error
            echo "Gagal memindahkan file.";
        }
    } else {
        // jika query gagal, tampilkan pesan error
        echo "Gagal menambahkan data: " . mysqli_error($conn);
    }
}

//----------------------TAMPIL DATA-----------------------//
function tampil_data($order_by,$id_user){
    global $conn;
    $query = "SELECT * FROM paket WHERE id_user='$id_user' ORDER BY $order_by ASC";
    $result = mysqli_query($conn, $query);
    return $result;
}

//----------------------UBAH DATA-----------------------//
// percabangan untuk menangani klik tombol submit pada form tambah data
if(isset($_POST['ubah'])){
    $id_paket = $_POST['id_paket'];
    $nama = $_POST['nama_paket'];
    $destinasi = $_POST['destinasi'];
    $deskripsi = $_POST['deskripsi'];
    $paket_tour = $_POST['paket_tour'];
    $durasi = $_POST['durasi'];
    $harga = $_POST['harga'];
    $gambar = $_FILES['gambar']['name'];
    $gambar_tmp = $_FILES['gambar']['tmp_name'];
    if(empty($nama) || empty($destinasi) || empty($deskripsi) || empty($paket_tour) || empty($durasi) || empty($harga)){
        // jika ada input yang kosong, tampilkan pesan error
        echo "Silakan lengkapi semua data!";
    }else{
        if(!empty($gambar_tmp)){
            // jika gambar diunggah, pindahkan gambar ke folder tujuan
            echo "error";
        }
        // panggil fungsi ubah_data untuk mengubah data di tabel db_travel
        ubah_data($id_paket,$nama, $destinasi, $deskripsi, $paket_tour, $durasi, $harga, $gambar, $gambar_tmp);
    }
}
function ubah_data($id_paket, $nama_paket, $destinasi, $deskripsi, $paket_tour, $durasi, $harga, $gambar, $gambar_tmp){
    global $conn;
	    // membuat path file tujuan
    $path = "img/" . basename($gambar);
    // mengambil nama file gambar
    $nama_gambar = basename($gambar);
    $query = "UPDATE paket SET nama_paket='$nama_paket', destinasi='$destinasi', deskripsi='$deskripsi', paket_tour='$paket_tour', durasi='$durasi', harga='$harga', nama_gambar='$nama_gambar' WHERE id_paket='$id_paket'";
    $result = mysqli_query($conn, $query);
	if ($result) {
        // jika query berhasil, pindahkan file ke folder uploads
        if (move_uploaded_file($gambar_tmp, $path)) {
            // jika file berhasil dipindahkan, redirect ke halaman tampil_data.php
            header('Location: agen_tiket.php');
            exit();
        } else {
            // jika gagal memindahkan file, tampilkan pesan error
            echo "Gagal memindahkan file.";
        }
    } else {
        // jika query gagal, tampilkan pesan error
        echo "Gagal menambahkan data: " . mysqli_error($conn);
    }
}
//----------------------HAPUS DATA-----------------------//
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