<?php
session_start();
require 'agen_controller.php';
$data = tampil_order_byID($_SESSION['id_user']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="//cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://kit.fontawesome.com/20b151daf7.js" crossorigin="anonymous"></script>
    <title>Tiket Saya</title>
    <!-- Boxicons -->
      <link
      href="https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css"
      rel="stylesheet"
    />
    <!-- My CSS -->
    <link rel="stylesheet" href="../pa_web(fokus)/css/style2.css" />
    <link rel="stylesheet" type="text/css" href="css/customer.css">
<body>
    <?php
  if (isset($_GET['pesan'])) {
    $pesan = $_GET['pesan'];
    echo "<script>var pesan = '$pesan';
                swal({
                  title: 'Pesan',
                  text: pesan,
                  icon: 'error',
                  button: 'OK'
                });
          </script>";
  }
  ?>
     <!-- SIDEBAR -->
     <section id="sidebar">
      <a href="" class="brand">
        <i class="bx bxs-smile"></i>
        <span class="text">Travel5</span>
      </a>
      <ul class="side-menu top">
        <li>
          <a href="agen_beranda.php">
            <i class="bx bxs-home"></i>
            <span class="text">Home</span>
          </a>
        </li>
        <li>
          <a href="agen_tiket.php">
            <i class="bx bxs-shopping-bag-alt"></i>
            <span class="text">Tiket</span>
          </a>
        </li>
        <li class="active">
          <a href="agen_pemesanan.php">
            <i class="bx bxs-cart-add"></i>
            <span class="text">Pemesanan</span>
          </a>
        </li>
      <ul class="side-menu">
        <li>
          <a href="agen_controller.php?action=logout" class="logout">
            <i class="bx bxs-log-out-circle"></i>
            <span class="text">Logout</span>
          </a>
        </li>
      </ul>
    </section>
    <!-- SIDEBAR -->

  <!-- CONTENT -->
  <section id="content">
      <!-- NAVBAR -->
      <nav>
        <i class="bx bx-menu"></i>
        <a href="#" class="nav-link">Kategori</a>
      </nav>
      <!-- NAVBAR -->

    
    <div class="d-flex justify-content-end">
    <a class="ml-2" href="agen_tiket.php">Lihat Travel</a>
    <a class="ml-4" href="customer_controller.php?action=logout">Logout</a>
    </div>
<table id="myTable" class="table table-bordered table-hover" style="margin-top: 100px;">
  <thead>
    <tr>
      <th>No.</th>
      <th>ID Pemesanan</th>
      <th>Tanggal Pesan</th>
      <th>Nama Paket</th>
      <th>Jumlah Orang</th>
      <th>Total Harga</th>
      <th>Status</th>
      <th>Aksi</th>
    </tr>
  </thead>
  <tbody>
  <?php 
  $no = 1; // inisialisasi nomor
  foreach ($data as $id => $row): ?>
    <tr>
      <td><?php echo $no ?></td>
      <td><?= $row['id_pemesanan'] ?></td>
      <td><?= $row['tanggal_pemesanan'] ?></td>
      <td><?= $row['nama_paket'] ?></td>
      <td><?= $row['jumlah_orang'] ?></td>
      <td>Rp <?= number_format($row['total_bayar'], 0, ',', '.') ?></td>
      <td><?= $row['status'] ?></td>
      <td>
        <?php if ($row['status'] == "Menunggu Konfirmasi") : ?>
          <a onclick="confirm(<?php echo $row['id_pemesanan'];?>)" title="Klik Untuk Mengkonfirmasi Pesanan Ini" style="cursor:pointer;">Konfirmasi</a>
        <?php elseif ($row['status'] ==  'Sudah Dikonfirmasi') : ?>
          <a title="Tiket sudah dikonfirmasi" href="javascript:void(0);" style="color: #aaa; cursor: default;" disabled>Konfirmasi</a>
        <?php endif; ?>
        <a href="#" data-toggle="modal" data-target="#detailModal-<?php echo $id ?>" title="Klik untuk melihat detail"><i class="fas fa-info-circle"></i></a>
        <a onclick="confirmDelete(<?php echo $row['id_pemesanan'];?>)"><i class="fas fa-trash"></i></a>
      </td>
    </tr>
  </tbody>
</table>
<div class="modal fade" id="detailModal-<?php echo $id ?>" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel-<?php echo $id ?>" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: none; max-height: none; width: 45%; height: 500px; ">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="detailModalLabel-<?php echo $id ?>">Detail Tiket</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <img src='img/<?php echo $row['nama_gambar'] ?>' style="width: 100%; height: 200px; object-fit: cover;" alt='<?php echo $row['nama_paket'] ?>'>
        <div class="row">
          <div class="col-md-6">
            <p><strong>Nama Pemesan:</strong> <?php echo $row['nama_user']; ?></p>
            <p><strong>Nama Paket:</strong> <?php echo $row['nama_paket']; ?></p>
            <p><strong>Jumlah Orang:</strong> <?php echo $row['jumlah_orang'] ?></p>
            <p><strong>Harga:</strong> Rp <?php echo number_format($row['total_bayar'], 0, ',', '.') ?></p>
          </div>
          <div class="col-md-6">
            <p><strong>Tanggal Berangkat:</strong> <?php echo $row['tanggal_berangkat'] ?></p>
            <p><strong>Tanggal Kembali:</strong> <?php echo $row['tanggal_kembali'] ?></p>
            <p><strong>Status:</strong> <?php echo $row['status'] ?></p>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary mx-auto d-block" data-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>
<?php 
$no++; // increment nomor
endforeach ?>

<script>
    function confirmDelete(id) {
    swal({
      title: "Apakah anda yakin?",
      text: "Anda tidak dapat mengembalikan ini!",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    }).then((willDelete) => {
      if (willDelete) {
        swal("Berhasil menghapus data", {
          icon: "success",
          button: "OK"
        });
        setTimeout(function() {
          window.location.href = "customer_controller.php?hapusTiket=" + id;
        }, 2000);
      } else {
        swal("File tidak jadi dihapus!", {
          icon: "info",
          button: "OK"
        });
      }
    });
    }
    function confirm(id) {
    swal({
      title: "Apakah anda yakin melakukan ini?",
      text: "Anda tidak dapat mengembalikannya!",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    }).then((willBut) => {
      if (willBut) {
        swal("Berhasil melakukan konfirmasi", {
          icon: "success",
          button: "OK"
        });
        setTimeout(function() {
          window.location.href = "agen_controller.php?konfirmasi=" + id;
        }, 2000);
      } else {
        swal("Batal Mengkonfirmasi!", {
          icon: "error",
          button: "OK"
        });
      }
    });
    }
</script>
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
<script src="script.js"></script>
</html>