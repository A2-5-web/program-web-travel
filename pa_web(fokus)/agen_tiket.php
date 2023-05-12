<?php 
require('agen_controller.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Data Paket Travel</title>
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
        <div class="logout"><a href="agen_controller.php?action=logout">Logout</a></div>
        </div>
    </nav>
  <div class="sidebar">
    <div class="sidebar-icon">T</div>
    <a href="agen_beranda.php"><img src="img/home.png" alt=""></a>
    <a href="agen_view.php"><img src="img/tiket.png" alt=""></a>
    <a href="#"><img src="img/pemesanan.png" alt=""></a>
  </div>
	<div class="container mt-3">
		<h2 class="text-center">Tampil Data Paket Travel</h2>
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahModal">Tambah Paket</button>
		<table id="myTable" class="table table-bordered">
			<thead>
				<tr>
					<th>No.</th>
					<th>Nama</th>
					<th>Destinasi</th>
					<th>Deskripsi</th>
					<th>Paket Tour</th>
					<th>Durasi</th>
					<th>Harga</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$order_by = isset($_GET['order_by']) ? $_GET['order_by'] : 'nama_paket';
				$query = tampil_data($order_by,$_SESSION['id_user']);
				if(mysqli_num_rows($query) == 0){
					echo '<tr><td colspan="6">Tidak ada data!</td></tr>';
				}else{
					$no = 1;
					while($data = mysqli_fetch_assoc($query)){
						echo '<tr>';
						echo '<td>'.$no.'</td>';
						echo '<td>'.$data['nama_paket'].'</td>';
						echo '<td>'.$data['destinasi'].'</td>';
						echo '<td style="word-wrap: break-word; max-width: 200px;">'.$data['deskripsi'].'</td>';
						echo '<td>'.$data['paket_tour'].'</td>';
						echo '<td>'.$data['durasi'].'</td>';
						echo '<td>Rp '.number_format($data['harga'], 0, ',', '.').'</td>';
						echo '<td><a href="agen_controller.php?hapus='.$data['id_paket'].'" onclick="return confirm(\'Anda yakin ingin menghapus data ini?\')">Hapus</a>
								<a href="#" data-id="'.$data['id_paket'].'" data-nama="'.$data['nama_paket'].'" data-destinasi="'.$data['destinasi'].'" data-deskripsi="'.$data['deskripsi'].'" data-paket-tour="'.$data['paket_tour'].'" data-durasi="'.$data['durasi'].'" data-harga="'.$data['harga'].'" data-gambar="'.$data['nama_gambar'].'" data-toggle="modal" data-target="#ubahModal">Ubah</a>

							  </td>';
						echo '</tr>';
						$no++;
					}
				}
				?>
			</tbody>
		</table>
	</div>
	
	<!-- Modal Tambah Data-->
	<div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="tambahModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="tambahModalLabel">Tambah Paket Travel</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form method="post" action="agen_controller.php" enctype="multipart/form-data">
						<div class="form-row">
							<div class="col-md-6 mb-3">
								<label for="nama_paket">Nama Paket:</label>
								<input type="text" class="form-control" id="nama_paket" name="nama_paket" required>
							</div>
							<div class="col-md-6 mb-3">
								<label for="destinasi">Destinasi:</label>
								<input type="text" class="form-control" id="destinasi" name="destinasi" required>
							</div>
						</div>
						<div class="form-group">
							<label for="deskripsi">Deskripsi:</label>
							<textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required></textarea>
						</div>
						<div class="form-row">
							<div class="col-md-6 mb-3">
								<label for="paket_tour">Paket Tour:</label>
								<select class="form-control" id="paket_tour" name="paket_tour" required>
									<option value="domestik">Domestik</option>
									<option value="internasional">Internasional</option>
								</select>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="harga">Harga:</label>
									<input type="text" class="form-control" id="harga" name="harga" onkeyup="formatNumber(this)" onblur="unFormatNumber(this)" required>
								</div>
							</div>
							<div class="col-md-6 mb-3">
								<label for="durasi">Durasi:</label>
								<select class="form-control" id="durasi" name="durasi" required>
									<option value="2 hari">2 Hari</option>
									<option value="3 hari">3 Hari</option>
								</select>
							</div>
							<div class="col-md-6 mb-3">
								<div class="form-group">
									<label for="gambar">Gambar:</label>
									<input type="file" class="form-control" id="gambar" name="gambar" accept="image/*" required>
								</div>
							</div>
						</div>
						<div class="form-group text-center">
							<button type="submit" class="btn btn-primary float-right" name="tambah">Tambah</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- Modal Ubah Data -->
	<div class="modal fade" id="ubahModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title"></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form method="post" action="" enctype="multipart/form-data">
					<input type="hidden" class="form-control" id="id_paket" name="id_paket" readonly>
					<div class="form-row">
						<div class="col-md-6 mb-3">
							<label for="nama_paket">Nama Paket:</label>
							<input type="text" class="form-control" id="nama_paket" name="nama_paket" required>
						</div>
						<div class="col-md-6 mb-3">
							<label for="destinasi">Destinasi:</label>
							<input type="text" class="form-control" id="destinasi" name="destinasi" required>
						</div>
					</div>
					<div class="form-group">
						<label for="deskripsi">Deskripsi:</label>
						<textarea class="form-control" id="deskripsi" name="deskripsi" required></textarea>
					</div>
					<div class="form-row">
						<div class="col-md-6 mb-3">
							<label for="paket_tour">Paket Tour:</label>
							<select class="form-control" id="paket_tour" name="paket_tour" required>
								<option value="domestik">Domestik</option>
								<option value="internasional">Internasional</option>
							</select>
						</div>
						<div class="col-md-6 mb-3">
							<label for="harga">Harga:</label>
							<input type="text" class="form-control" id="harga" name="harga" onkeyup="formatNumber(this)" onblur="unFormatNumber(this)" required>
						</div>
						<div class="col-md-6 mb-3">
							<label for="durasi">Durasi:</label>
							<select class="form-control" id="durasi" name="durasi" required>
								<option value="2 hari">2 Hari</option>
								<option value="3 hari">3 Hari</option>
							</select>
						</div>
						<div class="col-md-6 mb-3">
							<div class="form-group">
								<label for="gambar">Gambar:</label>
								<input type="file" class="form-control" id="gambar" name="gambar" accept="image/*" required>
							</div>
						</div>
					</div>
					<div class="form-group text-center">
						<button type="submit" name="ubah" class="btn btn-primary">Ubah Data</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	</div>
	<script>
	function ubahUrl() {
		var id = this.getAttribute('data-id');
		var nama = this.getAttribute('data-nama');
		var destinasi = this.getAttribute('data-destinasi');
		var deskripsi = this.getAttribute('data-deskripsi');
		var paketTour = this.getAttribute('data-paket-tour');
		var durasi = this.getAttribute('data-durasi');
		var harga = this.getAttribute('data-harga');
		var gambarTmp = this.getAttribute('data-gambar');
		$('#id_paket').val(id);
		$('#nama_paket').val(nama);
		$('#destinasi').val(destinasi);
		$('#deskripsi').val(deskripsi);
		$('#paket_tour').val(paketTour);
		$('#durasi').val(durasi);
		$('#harga').val(harga);
		$('#gambar').val(gambarTmp);
		$('#ubahModal').modal('show');
	}

	document.querySelectorAll('#tabel_data tbody tr td:last-child a').forEach(function(link) {
		link.addEventListener('click', ubahUrl);
	});

	$('#ubahModal').on('show.bs.modal', function (event) {
		var button = $(event.relatedTarget); // Tombol yang men-trigger modal
		var id = button.data('id'); // Mengambil data-id dari tombol
		var nama = button.data('nama'); // Mengambil data-nama dari tombol
		var destinasi = button.data('destinasi'); // Mengambil data-destinasi dari tombol
		var deskripsi = button.data('deskripsi'); // Mengambil data-deskripsi dari tombol
		var paketTour = button.data('paket_tour'); // Mengambil data-paket_tour dari tombol
		var durasi = button.data('durasi'); // Mengambil data-durasi dari tombol
		var harga = button.data('harga'); // Mengambil data-harga dari tombol
		var gambarTmp = button.data('gambar'); // Mengambil data-gambar dari tombol
		console.log(gambarTmp);
		var modal = $(this);
		modal.find('.modal-title').text('Ubah Data Paket ' + nama);
		modal.find('#id_paket').val(id);
		modal.find('#nama_paket').val(nama);
		modal.find('#destinasi').val(destinasi);
		modal.find('#deskripsi').val(deskripsi);
		modal.find('#harga').val(harga);    
		// Menampilkan value select yang sesuai dengan data dari database
		modal.find('#paket_tour option[value="' + paketTour + '"]').prop('selected', true);
		modal.find('#durasi option[value="' + durasi + '"]').prop('selected', true);
		modal.find('#gambar').attr('data-gambar', gambarTmp);

	});

	function formatNumber(num) {
		var str = num.value.replace(/[^\d]/g, '');
		while (/(\d+)(\d{3})/.test(str)) {
			str = str.replace(/(\d+)(\d{3})/, '$1' + ',' + '$2');
		}
		num.value = str;
	}

	function unFormatNumber(num) {
		num.value = num.value.replace(/,/g, '');
	}
	</script>
	<script type="text/javascript">
	$(document).ready(function() {
		$('#myTable').DataTable({
			"paging": true,
			"searching": true,
			"ordering": true,
			"order": [[1, "asc"]],
			"columnDefs": [
				{
					"targets": 0,
					"orderable": false
				}
			]
		});
	});
	</script>
</body>
</html>
