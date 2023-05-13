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
        $durasiAngka = (int) preg_replace('/\D/', '', $durasi);
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
                  <form method="post" action="customer_controller.php" enctype="multipart/form-data">
                    <input type="hidden" name="id_paket" value="<?php echo $id; ?>">
                    <div class="form-row">
                      <div class="col-md-6 mb-3">
                        <label for="tanggal_berangkat">Tanggal Berangkat:</label>
                        <input type="date" class="form-control" id="tanggal_berangkat" name="tanggal_berangkat" onchange="setTanggalKembali()" required>
                      </div>
                    <div class="col-md-6 mb-3">
                      <label for="tanggal_kembali">Tanggal Kembali:</label>
                      <input type="date" class="form-control" id="tanggal_kembali" name="tanggal_kembali" readonly required>
                    </div>
                    </div>
                    <div class="form-row">
                      <div class="col-md-6 mb-3">
                        <label for="jumlah_orang">Jumlah Orang:</label>
                        <input type="number" class="form-control" id="jumlah_orang" name="jumlah_orang" min="1" onchange="setTotalHarga()" required>
                      </div>
                      <div class="col-md-6 mb-3">
                        <label for="kebutuhan_khusus">Kebutuhan Khusus:</label>
                        <input type="text" class="form-control" id="kebutuhan_khusus" name="kebutuhan_khusus">
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="col-md-6 mb-3">
                        <label for="harga_paket">Harga Paket:</label>
                        <input type="hidden" class="form-control" id="harga_paket" name="harga_paket" value="<?php echo $harga; ?>" readonly>
                      </div>
                      <div class="col-md-6 mb-3">
                        <label for="total_harga">Total Harga:</label>
                        <input type="text" class="form-control" id="total_harga" name="total_harga" readonly>
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
        <?php endforeach;?>
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

let durasiPaket = 0;

function setDurasiPaket(durasi) {
  durasiPaket = durasi;
}

function setTanggalKembali() {
  const tanggalBerangkat = new Date(document.getElementById("tanggal_berangkat").value);
  tanggalBerangkat.setDate(tanggalBerangkat.getDate() + durasiPaket);
  const tanggalKembali = tanggalBerangkat.toISOString().slice(0, 10);
  document.getElementById("tanggal_kembali").value = tanggalKembali;
}

function hitungTotalHarga() {
    const hargaPaket = parseInt(document.getElementById("harga_paket").value);
    const jumlahOrang = parseInt(document.getElementById("jumlah_orang").value);
    const totalHarga = hargaPaket * jumlahOrang;
    document.getElementById("total_harga").value = totalHarga;
  }

  document.getElementById("jumlah_orang").addEventListener("input", hitungTotalHarga);
  document.getElementById("jumlah_orang").addEventListener("change", hitungTotalHarga);
</script>
</html>
