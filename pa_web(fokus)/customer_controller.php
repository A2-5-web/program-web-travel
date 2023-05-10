<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_travel";

$conn = mysqli_connect('localhost', 'root', '', 'db_travel');

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
    exit;
}

function tampil_data(){
    global $conn;
    $query = "SELECT * FROM paket";
    $result = mysqli_query($conn, $query);
    return $result;
}

?>