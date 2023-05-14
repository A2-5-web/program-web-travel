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
            <button type="button" class="btn btn-custom" onclick="hitungHarga(<?php echo $id ?>)" data-toggle="modal" data-id="<?php echo $id; ?>" data-target="#pesanModal-<?php echo $id; ?>" data-harga="<?php echo $harga; ?>">Pesan Tiket</button>
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
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="pesanModalLabel-<?php echo $id ?>">Pesan Tiket</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form method="post" action="customer_controller.php">
                  <div class="form-group">
                    <label for="jumlah_orang-<?php echo $id ?>">Jumlah Orang</label>
                    <input type="number" class="form-control" id="jumlah_orang-<?php echo $id ?>" min="1" max="6" step="1" value="1" oninput="hitungHarga(<?php echo $id ?>)">
                  </div>
                  <div class="form-group">
                    <label for="total_harga-<?php echo $id ?>">Total Harga</label>
                    <input type="text" class="form-control" id="total_harga-<?php echo $id ?>" value="<?php echo $harga ?>" disabled>
                    <input type="hidden" class="form-control" id="total_hargaHid-<?php echo $id ?>" value="<?php echo $harga ?>" disabled>
                    <div class="tampungHarga<?php echo $id ?>" hidden><?php echo $harga ?></div>
                  </div>
                  <div class="form-group">
                    <label for="tanggal_berangkat-<?php echo $id ?>">Tanggal Berangkat</label>
                    <input type="date" class="form-control" id="tanggal_berangkat-<?php echo $id ?>" oninput="hitungTanggal(<?php echo $id ?>)">
                  </div>
                  <div class="form-group">
                    <label for="tanggal_kembali-<?php echo $id ?>">Tanggal Kembali</label>
                    <input type="date" class="form-control" id="tanggal_kembali-<?php echo $id ?>" disabled>
                    <div class="tampungDurasi<?php echo $id ?>" hidden><?php echo $durasiAngka ?></div>
                  </div>
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
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
</script>
<script>
function formatRupiah(angka) {
  let numberString = angka.toString().replace(/[^,\d]/g, '');
  let split = numberString.split(',');
  let sisa = split[0].length % 3;
  let rupiah = split[0].substr(0, sisa);
  let ribuan = split[0].substr(sisa).match(/\d{3}/gi);

  if (ribuan) {
    let separator = sisa ? '.' : '';
    rupiah += separator + ribuan.join('.');
  }

  rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
  return 'Rp. ' + rupiah;
}

function hitungHarga(id) {
  let jumlahOrang = document.getElementById('jumlah_orang-' + id).value;
  let hargaView = document.querySelector('.tampungHarga' + id).innerHTML;
  let hargaHid = document.querySelector('.tampungHarga' + id).innerHTML;
  let totalHargaView = jumlahOrang * hargaView;
  let totalHargaHid = jumlahOrang * hargaView;
  document.getElementById('total_harga-' + id).value = formatRupiah(totalHargaView);
  document.getElementById('total_hargaHid-' + id).value = formatRupiah(totalHargaView);
}
function hitungTanggal(id) {
  let tanggalBerangkat = new Date(document.getElementById('tanggal_berangkat-' + id).value);
  let tanggalArray = tanggalBerangkat.toLocaleDateString("en-US").split("/");
  let tanggal = parseInt(tanggalArray[1]);
  let bulan = parseInt(tanggalArray[0]) - 1;
  let tahun = parseInt(tanggalArray[2]);
  let durasi = parseInt(document.querySelector('.tampungDurasi' + id).innerHTML);
  tanggalBerangkat.setDate(tanggal + durasi);
  tanggalBerangkat.setFullYear(tahun, bulan, tanggal + durasi);
  document.getElementById('tanggal_kembali-' + id).value = tanggalBerangkat.toISOString().split('T')[0];
}


</script>



</html>
