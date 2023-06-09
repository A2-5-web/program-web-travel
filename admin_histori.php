<?php
require 'admin_controller.php';
if (!isset($_SESSION['login']) || $_SESSION['login'] !== "ya") {
    header("location: auth_form.php?view=login");
}
$data = tampil_data_histori();
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
    <link rel="stylesheet" href="css/style2.css" />
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
        <li>
          <a href="admin_customer.php">
            <i class="bx bxs-cart-add"></i>
            <span class="text">Customer</span>
          </a>
        </li>
        <li class="active">
          <a href="admin_histori.php">
            <i class="bx bxs-cart-add"></i>
            <span class="text">Histori Login</span>
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
      <main>
  <div class="container">
		<h2 class="text-center">Tampil Data Histori</h2>
		
		<table id="myTable" class="table table-bordered">
  <thead>
    <tr>
      <th>No.</th>
      <th>Waktu dan Tanggal</th>
      <th>Status</th>
    </tr>
  </thead>
  <tbody>
  <?php 
  $no = 1; // inisialisasi nomor
  foreach ($data as $id => $row): ?>
    <tr>
      <td><?php echo $no ?></td>
      <td><?php echo $row['tanggal_login'] ?></td>
      <td><?php echo $row['status'] ?></td>
    </tr>
    <?php 
    $no++; // increment nomor
    endforeach ?>
  </tbody>
</table>
</main>
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