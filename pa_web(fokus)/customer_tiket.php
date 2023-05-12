<?php
require 'customer_controller.php';

// Eksekusi query dan simpan hasilnya dalam variabel $result
$result = tampil_data()

?>

<!DOCTYPE html>
<html>
<head>
	<title>Card Paket Travel</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="//cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
	<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
	<link rel="stylesheet" type="text/css" href="css/customer.css">
</head>
<body>
  <div class="container">
    <div class="card-container">
      <?php foreach ($result as $id => $row) : ?>
      <?php
        // Ambil nilai kolom dari tiap baris data
        $nama_paket = $row['nama_paket'];
        $destinasi = $row['destinasi'];
        $deskripsi = $row['deskripsi'];
        $paket_tour = $row['paket_tour'];
        $durasi = $row['durasi'];
        $harga = $row['harga'];
        $path_gambar = $row['nama_gambar'];
      ?>
        <div class='card'>
          <img src='img/<?php echo $path_gambar ?>' alt='<?php echo $nama_paket ?>'>
          <div class="card-body">
            <h2 class="card-title"><?php echo $nama_paket ?></h2>
            <p class="card-text"><?php echo $deskripsi ?></p>
            <p class="card-text">Rp <?php echo number_format($harga, 0, ',', '.') ?></p>
            <button type="button" class="btn btn-primary btn-detail" data-toggle="modal" data-target="#detailModal-<?php echo $id ?>">Lihat Detail</button>
            <button type="button" class="btn btn-custom" data-toggle="modal" data-target="#pesanModal-<?php echo $id ?>">Pesan Tiket</button>
          </div>
        </div>
        <!-- tambahkan modal disini -->
        <div class="modal fade" id="detailModal-<?php echo $id ?>" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel-<?php echo $id ?>" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: none; max-height: none; width: 40%; height: 500px; ">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="detailModalLabel-<?php echo $id ?>"><?php echo $nama_paket ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <img src='img/<?php echo $path_gambar ?>' alt='<?php echo $nama_paket ?>' class="img-fluid mb-3" style="max-width:none; max-height:none; width:100%; height:300px">
                <div class="row">
                  <div class="col-md-6">
                    <p><strong>Destinasi:</strong> <?php echo $destinasi ?></p>
                    <p><strong>Paket Tour:</strong> <?php echo $paket_tour ?></p>
                    <p><strong>Durasi:</strong> <?php echo $durasi ?></p>
                    <p><strong>Harga:</strong> Rp <?php echo number_format($harga, 0, ',', '.') ?></p>
                  </div>
                  <div class="col-md-6">
                    <h6><strong>Deskripsi:</strong></h6>
                    <p><?php echo $deskripsi ?></p>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary mx-auto d-block" data-dismiss="modal">Tutup</button>
              </div>
            </div>
          </div>
        </div>
        <div class="modal fade" id="pesanModal-<?php echo $id ?>" tabindex="-1" role="dialog" aria-labelledby="pesanModalLabel-<?php echo $id ?>" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: none; max-height: none; width: 40%; height: 500px; ">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="pesanModalLabel-<?php echo $id ?>"><?php echo $nama_paket ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <img src='img/<?php echo $path_gambar ?>' alt='<?php echo $nama_paket ?>' class="img-fluid mb-3" style="max-width:none; max-height:none; width:100%; height:300px">
                <div class="row">
                  <div class="col-md-6">
                    <p><strong>Destinasi:</strong> <?php echo $destinasi ?></p>
                    <p><strong>Paket Tour:</strong> <?php echo $paket_tour ?></p>
                    <p><strong>Durasi:</strong> <?php echo $durasi ?></p>
                    <p><strong>Harga:</strong> Rp <?php echo number_format($harga, 0, ',', '.') ?></p>
                  </div>
                  <div class="col-md-6">
                    <h6><strong>Deskripsi:</strong></h6>
                    <p><?php echo $deskripsi ?></p>
                  </div>
                </div>
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
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary mx-auto d-block" data-dismiss="modal">Tutup</button>

              </div>
            </div>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
  </div>

</body>
<script>
$(document).ready(function() {
  $('.btn-detail').on('click', function() {
    var modalId = $(this).attr('data-target');
    $(modalId).modal('show');
  });
});
$(document).ready(function() {
  $('.modal').on('hidden.bs.modal', function() {
    $('.btn-detail').removeClass('active');
  });
});
$(document).ready(function() {
  $('.btn-custom').on('click', function() {
    var modalId = $(this).attr('data-target');
    $(modalId).modal('show');
  });
});
$(document).ready(function() {
  $('.modal').on('hidden.bs.modal', function() {
    $('.btn-custom').removeClass('active');
  });
});

</script>
</html>
