<?php 
session_start();
$conn = mysqli_connect("localhost","root","","db_travel");


function tampil_data_agen($role){
    global $conn;
    $query = "SELECT * FROM user WHERE status = '$role'";
    $result = mysqli_query($conn,$query);
    return $result;
}
function tampil_data_customer($role){
    global $conn;
    $query = "SELECT * FROM user WHERE status = '$role'";
    $result = mysqli_query($conn,$query);
    return $result;
}
function tampil_data_histori(){
    global $conn;
    $query = "SELECT histori_login.*, user.status FROM histori_login JOIN user ON histori_login.id_user = user.id_user";
    $result = mysqli_query($conn,$query);
    return $result;
}

function customerCount(){
    global $conn;
    $query = "SELECT COUNT(*) AS jumlah_customer FROM user WHERE user.status ='customer';";
    $result = mysqli_query($conn, $query);
    return $result;
}
function agenCount(){
    global $conn;
    $query = "SELECT COUNT(*) AS jumlah_agen FROM user WHERE user.status ='travel_agent';";
    $result = mysqli_query($conn, $query);
    return $result;
}
function pendapatanSum(){
    global $conn;
    $query = "SELECT SUM(total_bayar) AS total_pendapatan FROM pemesanan WHERE pemesanan.status = 'Sudah Dikonfirmasi';";
    $result = mysqli_query($conn, $query);
    return $result;
}





//----------------------LOGOUT--------------------------//
if (isset($_GET['action']) && $_GET['action'] == 'logout') {
    // Hapus session id_user
    unset($_SESSION['id_user']);
    // Redirect ke halaman login
    header('Location: auth_form.php');
    exit;
}


if(isset($_GET['hapusAgen'])) {
  $id_agen = $_GET['hapusAgen'];
  // Buat query untuk menghapus data pemesanan
  $sql = "DELETE FROM user WHERE id_user = '$id_agen'";

  // Eksekusi query dan periksa apakah penghapusan berhasil atau tidak
  if($conn->query($sql) === TRUE) {
    // Jika penghapusan berhasil, tampilkan pesan konfirmasi
    header("location: admin_agen.php");
  } else {
    // Jika penghapusan gagal, tampilkan pesan error
    header("location: admin_agen.php?pesan=Gagal Menghapus Agen");
  }

  // Tutup koneksi ke basis data
  $conn->close();
}
if(isset($_GET['hapusCustomer'])) {
  $id_customer = $_GET['hapusCustomer'];
  // Buat query untuk menghapus data pemesanan
  $sql = "DELETE FROM user WHERE id_user = '$id_customer'";

  // Eksekusi query dan periksa apakah penghapusan berhasil atau tidak
  if($conn->query($sql) === TRUE) {
    // Jika penghapusan berhasil, tampilkan pesan konfirmasi
    header("location: admin_customer.php");
  } else {
    // Jika penghapusan gagal, tampilkan pesan error
    header("location: admin_customer.php?pesan=Gagal Menghapus Customer");
  }

  // Tutup koneksi ke basis data
  $conn->close();
}
?>