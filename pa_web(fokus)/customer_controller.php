<?php
// untuk menghubungkan ke database
$conn = mysqli_connect('localhost', 'root', '', 'db_travel');


// untuk mengecek apakah database sudah terhubung atau belum
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

// untuk menampilkan data 
function tampil_data(){
    global $conn;
    $query = "SELECT * FROM paket";
    $result = mysqli_query($conn, $query);
    return $result;
}

function tampil_order_byID($id){
  global $conn;
  $query = "SELECT pemesanan.*, paket.nama_paket FROM pemesanan INNER JOIN paket ON pemesanan.id_paket = paket.id_paket WHERE pemesanan.id_user = '$id';";
  $result = mysqli_query($conn, $query);
  return $result;
}

// untuk menambahkan data pada database apabila script ajax berhasil dikirimkan
if (isset($_POST['orderTiket'])) {
  $status = $_POST['status'];
  $tanggal_pesan = $_POST['tanggal_pesan'];
  $id_user = $_POST['id_user'];
  $jumlah_orang = $_POST['jumlah_orang'];
  $total_harga = $_POST['total_harga'];
  $tanggal_berangkat = $_POST['tanggal_berangkat'];
  $tanggal_kembali = $_POST['tanggal_kembali'];
  $id_paket = $_POST['id_paket'];

  // Menambahkan data ke dalam database
  $sql = "INSERT INTO pemesanan (id_user, id_paket, jumlah_orang, tanggal_pemesanan, tanggal_berangkat, tanggal_kembali, total_bayar, status)
          VALUES ($id_user,$id_paket, '$jumlah_orang', '$tanggal_pesan', '$tanggal_berangkat', '$tanggal_kembali','$total_harga','$status')";
  if (mysqli_query($conn, $sql)) {
    echo "sukses";
  } else {
    echo mysqli_error($conn);
  }
  // Menutup koneksi
  mysqli_close($conn);
}
?>