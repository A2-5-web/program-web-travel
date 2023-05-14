<?php
session_start();
require 'customer_controller.php';
$data = tampil_order_byID($_SESSION['id_user']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="//cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://kit.fontawesome.com/20b151daf7.js" crossorigin="anonymous"></script>

    <title>Tiket Saya</title>
    <style>
    th {
      text-align: center;
    }
    td {
      vertical-align: middle;
      text-align: center;
    }
    .btn {
      padding: 0.25rem 0.5rem;
      font-size: 0.875rem;
    }
    .btn-pay {
      color: #fff;
      background-color: #007bff;
      border-color: #007bff;
    }
    .btn-pay:hover {
      color: #fff;
      background-color: #0069d9;
      border-color: #0062cc;
    }
    .btn-detail {
      color: #212529;
      background-color: #f8f9fa;
      border-color: #f8f9fa;
    }
    .btn-detail:hover {
      color: #212529;
      background-color: #e2e6ea;
      border-color: #dae0e5;
    }
  </style>
</head>
<body>
<div class="d-flex justify-content-end">
    <a class="ml-auto" href="customer_pesan.php">Pesan Tiket</a>
    <a class="2" href="customer_controller.php?action=logout">Logout</a>
</div>
<table id="myTable" class="table table-bordered table-hover" style="margin-top: 100px;">
  <thead>
    <tr>
      <th>No.</th>
      <th>ID Pemesanan</th>
      <th>Tanggal Pesan</th>
      <th>Nama Paket</th>
      <th>Jumlah Orang</th>
      <th>Tanggal Berangkat</th>
      <th>Total Harga</th>
      <th>Status</th>
      <th>Aksi</th>
    </tr>
  </thead>
  <tbody>
  <?php 
  $no = 1; // inisialisasi nomor
  foreach ($data as $row): ?>
    <tr>
      <td><?php echo $no ?></td>
      <td><?= $row['id_pemesanan'] ?></td>
      <td><?= $row['tanggal_pemesanan'] ?></td>
      <td><?= $row['nama_paket'] ?></td>
      <td><?= $row['jumlah_orang'] ?></td>
      <td><?= $row['tanggal_berangkat'] ?></td>
      <td>Rp <?= number_format($row['total_bayar'], 0, ',', '.') ?></td>
      <td><?= $row['status'] ?></td>
      <td>
        <a href="#" title="Klik untuk melakukan pembayaran"><i class="fas fa-credit-card"></i></a>
        <a href="#" title="Klik untuk melihat detail"><i class="fas fa-info-circle"></i></a>
      </td>
    </tr>
    <?php 
    $no++; // increment nomor
  endforeach ?>
  </tbody>
</table>

</body>
<script>
    $(document).ready(function() {
    $('#myTable').DataTable({
        "paging": true,
        "searching": true,
        "ordering": true,
        "columnDefs": [
            {
                "targets": 0,
                "orderable": false
            }
        ]
    });
});
</script>
</html>