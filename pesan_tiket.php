<?php
session_start();

// Koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_travel";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Handle input data
if(isset($_POST['tambah'])){
    $tglpesan = $_POST['tanggal_pemesanan'];
    $tglberangkat = $_POST['tanggal_berangkat'];
    $tglpulang = $_POST['tanggal_pulang'];
    $totalharga = $_POST['total_pembayaran'];

    if(empty($tglpesan) || empty($tglberangkat) || empty($tglpulang) || empty($totalharga)){
        echo "Silakan lengkapi semua data!";
    } else {
        $id_user = $_SESSION['id_user'];
        $query = "INSERT INTO pesan (id_user,tanggal_pemesanan, tanggal_berangkat, tanggal_pulang, total_pembayaran) VALUES (?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, 'issss', $id_user, $tglpesan, $tglberangkat, $tglpulang, $totalharga);
        if (mysqli_stmt_execute($stmt)) {
            header('Location: agen_tiket.php');
            exit();
        } else {
            echo "Gagal menambahkan data: " . mysqli_error($conn);
        }
        mysqli_stmt_close($stmt);
    }
}

// Handle tampil data
function tampil_data($order_by, $id_user){
    global $conn;
    $query = "SELECT * FROM pesan WHERE id_user=? ORDER BY $order_by ASC";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, 'i', $id_user);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    mysqli_stmt_close($stmt);
    return $result;
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Data Pesanan Paket Travel</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="//cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
	<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<nav>
        <div class="navbar">
        <div class="logo">Travel</div>
        <div class="logout"><a href="#">Logout</a></div>
        </div>
    </nav>
	<div class="container mt-3">
		<h2 class="text-center">Tampil Data Pesanan Paket Travel</h2>
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#pesanTiket">Pesan Tiket Travel</button>
		<table id="myTable" class="table table-bordered">
			<thead>
				<tr>
					<th>No.</th>
					<th>Tanggal Pemesanan</th>
					<th>Tanggal Berangkat</th>
					<th>Tanggal Pulang</th>
					<th>Total Harga</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$order_by = isset($_GET['order_by']) ? $_GET['order_by'] : 'tanggal_pemesanan';
				$query = tampil_data($order_by,$_SESSION['id_user']);
				if(mysqli_num_rows($query) == 0){
					echo '<tr><td colspan="6">Tidak ada data!</td></tr>';
				}else{
					$no = 1;
					while($data = mysqli_fetch_assoc($query)){
						echo '<tr>';
						echo '<td>'.$no.'</td>';
						echo '<td>'.$data['tanggal_pemesanan'].'</td>';
						echo '<td>'.$data['tanggal_berangkat'].'</td>';
						echo '<td>'.$data['tanggal_pulang'].'</td>';
						echo '<td>Rp '.number_format($data['total_pembayaran'], 0, ',', '.').'</td>';
						echo '</tr>';
						$no++;
					}
				}
				?>
			</tbody>
		</table>
	</div>
	<div class="modal fade" id="pesanTiket" tabindex="-1" role="dialog" aria-labelledby="pesanTiketLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="tambahModalLabel">Pesan Paket Travel</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form method="post" action="#">
						<div class="form-group">
							<label for="tglpesan">Tanggal Pemesanan:</label>
							<input type="datetime-local" class="form-control" id="tglpesan" name="tglpesan" required>
						</div>
						<div class="form-group">
							<label for="tglberangkat">Tanggal Berangkat:</label>
							<input type="datetime-local" class="form-control" id="tglberangkat" name="tglberangkat" required>
						</div>
						<div class="form-group">
							<label for="tglpulang">Tanggal Pulang:</label>
							<input type="datetime-local" class="form-control" id="tglpulang" name="tglpulang" required>
						</div>
						<div class="form-group">
							<label for="totalharga">Total Harga:</label>
							<input type="number" class="form-control" id="totalharga" name="totalharga" required>
						</div>
						<button type="submit" class="btn btn-primary" name="pesan">Pesan</button>
					</form>
				</div>
			</div>
		</div>
	</div>