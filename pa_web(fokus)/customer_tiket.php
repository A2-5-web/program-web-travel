<?php
session_start();
require 'customer_controller.php';
$data = tampil_order_byID($_SESSION['id_user']);
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Tiket Saya</title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="//cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
    <!-- font awesome cdn -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
      integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <!-- fonts -->
    <link rel="stylesheet" href="css/fonts.css" />
    <!-- normalize css -->
    <link rel="stylesheet" href="css/normalize.css" />
    <!-- custom css -->
    <link rel="stylesheet" href="css/utility.css" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/responsive.css" />
    <link rel="stylesheet" type="text/css" href="css/customer.css">
  </head>
  <body>
    <!-- navbar  -->
    <nav class="navbar">
      <div class="container flex">
        <a href="customer_pesan.php" class="site-brand"> Travel<span>5</span> </a>
        <button type="button" id="navbar-show-btn" class="flex">
          <i class="fas fa-bars"></i>
        </button>
        <div id="navbar-collapse">
          <button type="button" id="navbar-close-btn" class="flex">
            <i class="fas fa-times"></i>
          </button>
          <ul class="navbar-nav">
            <li class="nav-item">
              <a href="customer_pesan.php" class="nav-link">Beranda</a>
            </li>
            <li class="nav-item">
              <a href="customer_tiket.php" class="nav-link">Tiket Saya</a>
            </li>
            <li class="nav-item">
              <a href="customer_controller.php?action=logout" class="nav-link">Logout</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- end of navbar  -->
    <!-- header -->
    <header class="flex header-sm">
      <div class="container">
        <div class="header-title">
          <h1>Tiket Saya</h1>
          <p>
          Nikmati pengalaman liburan yang tak terlupakan
          </p>
        </div>
      </div>
    </header>
    <!-- header -->

    <!-- booknow -->
    <div class="title-wrap">
      <span class="sm-title"
        >Temukan destinasi impian Anda dan rasakan keindahannya bersama Travel5</span
      >
      <h2 class="lg-title">Daftar Tiket</h2>
    </div>
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

  <div class="table">
  <table id="myTable" class="table table-bordered">
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
    </div>
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
        <td><?= $row['tanggal_berangkat'] ?></td>
        <td>Rp <?= number_format($row['total_bayar'], 0, ',', '.') ?></td>
        <td><?= $row['status'] ?></td>
        <td>
          <?php if ($row['status'] == "Menunggu Konfirmasi") : ?>
            <a title="Anda sudah membayar dan menunggu konfirmasi" href="javascript:void(0);" style="color: #aaa; cursor: default;" disabled><i class="fas fa-credit-card"></i></a>
          <?php elseif ($row['status'] ==  'Sudah Dikonfirmasi') : ?>
            <a title="Tiket anda sudah dikonfirmasi" href="javascript:void(0);" style="color: #aaa; cursor: default;" disabled><i class="fas fa-credit-card"></i></a>
          <?php else : ?>
            <a onclick="confirmBayar(<?php echo $row['id_pemesanan'];?>)" title="Klik untuk melakukan pembayaran"><i class="fas fa-credit-card"></i></a>
          <?php endif; ?>
          <a href="#" data-toggle="modal" data-target="#detailModal-<?php echo $id ?>" title="Klik untuk melihat detail"><i class="fas fa-info-circle"></i></a>
          <a onclick="confirmDelete(<?php echo $row['id_pemesanan'];?>)"><i class="fas fa-trash"></i></a>
        </td>
      </tr>
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
              <p><strong>Nama Paket:</strong> <?php echo $row['nama_paket']; ?></p>
              <p><strong>Jumlah Orang:</strong> <?php echo $row['jumlah_orang'] ?></p>
              <p><strong>Tanggal Berangkat:</strong> <?php echo $row['tanggal_berangkat'] ?></p>
              <p><strong>Tanggal Kembali:</strong> <?php echo $row['tanggal_kembali'] ?></p>
              <p><strong>Harga:</strong> Rp <?php echo number_format($row['total_bayar'], 0, ',', '.') ?></p>
            </div>
            <div class="col-md-6">
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
    </tbody>
  </table>
    <!-- end of booknow section -->
    
    <!-- js -->
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
          window.location.href = "customer_controller.php?hapus=" + id;
        }, 2000);
      } else {
        swal("File tidak jadi dihapus!", {
          icon: "info",
          button: "OK"
        });
      }
    });
    }
    function confirmBayar(id) {
    swal({
      title: "Apakah anda yakin membayar?",
      text: "Anda tidak dapat mengembalikan ini!",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    }).then((willBut) => {
      if (willBut) {
        swal("Berhasil melakukan pembayaran", {
          icon: "success",
          button: "OK"
        });
        setTimeout(function() {
          window.location.href = "customer_controller.php?bayar=" + id;
        }, 2000);
      } else {
        swal("Batal Membayar!", {
          icon: "error",
          button: "OK"
        });
      }
    });
    }
    </script>
    <script> $(document).ready(function() {
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
    });</script>
    <script src="script2.js"></script>
  </body>
</html>
