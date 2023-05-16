<?php
session_start();
require 'admin_controller.php';
$data = tampil_data_customer('customer');
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
          <a href="admin_beranda.php">
            <i class="bx bxs-home"></i>
            <span class="text">Home</span>
          </a>
        </li>
        <li>
          <a href="admin_agen.php">
            <i class="bx bxs-shopping-bag-alt"></i>
            <span class="text">Agen Tiket</span>
          </a>
        </li>
        <li class="active">
          <a href="admin_customer.php">
            <i class="bx bxs-cart-add"></i>
            <span class="text">Customer</span>
          </a>
        </li>
      <ul class="side-menu">
        <li>
          <a href="admin_controller.php?action=logout" class="logout">
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
<table id="myTable" class="table table-bordered table-hover" style="margin-top: 100px;">
  <thead>
    <tr>
      <th>No.</th>
      <th>Nama</th>
      <th>No. HP</th>
      <th>Alamat</th>
      <th>Jenis Kelamin</th>
      <th>Username</th>
      <th>Aksi</th>
    </tr>
  </thead>
  <tbody>
  <?php 
  $no = 1; // inisialisasi nomor
  foreach ($data as $id => $row): ?>
    <tr>
      <td><?php echo $no ?></td>
      <td><?php echo $row['nama_user'] ?></td>
      <td><?php echo $row['no_user'] ?></td>
      <td><?php echo $row['alamat_user'] ?></td>
      <td><?php echo $row['jenis_kelamin'] ?></td>
      <td><?php echo $row['username'] ?></td>
      <td>
        <a href="#" data-toggle="modal" data-target="#detailModal-<?php echo $id ?>" title="Klik untuk melihat detail"><i class="fas fa-info-circle"></i></a>
        <a onclick="confirmDelete(<?php echo $row['id_user'];?>)"><i class="fas fa-trash"></i></a>
      </td>
    </tr>
    <div class="modal fade" id="detailModal-<?php echo $id ?>" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel-<?php echo $id ?>" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: none; max-height: none; width: 45%; height: 500px; ">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="detailModalLabel-<?php echo $id ?>">Detail Agen</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="row">
            <div class="col-md-6">
                <p><strong>Nama Agen :</strong> <?php echo $row['nama_user']; ?></p>
                <p><strong>Nomor HP :</strong> <?php echo $row['no_user'] ?></p>
                <p><strong>Alamat :</strong> <?php echo $row['alamat_user'] ?></p>
            </div>
            <div class="col-md-6">
                <p><strong>Jenis Kelamin:</strong> <?php echo $row['jenis_kelamin'] ?></p>
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
        swal("Berhasil menghapus akun", {
          icon: "success",
          button: "OK"
        });
        setTimeout(function() {
          window.location.href = "admin_controller.php?hapusUser=" + id;
        }, 2000);
      } else {
        swal("Akun tidak jadi dihapus!", {
          icon: "info",
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