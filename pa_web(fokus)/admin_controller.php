<?php 
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
?>