<?php 

require 'admin_controller.php';
if (!isset($_SESSION['login']) || $_SESSION['login'] !== "ya") {
    header("location: auth_form.php?view=login");
}
$jumlahAgen = agenCount();
$jumlahCustomer = customerCount();
$jumlahPendapatan = pendapatanSum();

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- Boxicons -->
    <link
      href="https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css"
      rel="stylesheet"
    />
    <!-- My CSS -->
    <link rel="stylesheet" href="../pa_web(fokus)/css/style2.css" />

    <title>AdminHub</title>
  </head>
  <body>
     <!-- SIDEBAR -->
     <section id="sidebar">
      <a href="" class="brand">
        <i class="bx bxs-smile"></i>
        <span class="text">Travel5</span>
      </a>
      <ul class="side-menu top">
        <li class="active">
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
        <li>
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

      <!-- MAIN -->
      <main>
          <div class="card-container">
            <div class="card">
              <div class="card-header">Jumlah Agen Travel</div>
              <?php
              $row = mysqli_fetch_assoc($jumlahAgen);
              $jumlah_agen = $row['jumlah_agen']
              ?>
              <div class="card-body">
                <div class="number"><?= $jumlah_agen?></div>
                <div class="text">Tersimpan</div>
              </div>
            </div>
            <div class="card">
              <div class="card-header">Jumlah Customer</div>
            <?php
              $row = mysqli_fetch_assoc($jumlahCustomer);
              $jumlah_customer = $row['jumlah_customer'];
              ?>
              <div class="card-body">
                <div class="number"><?= $jumlah_customer?></div>
                <div class="text">Tersimpan</div>
              </div>
            </div>
            <div class="card">
              <div class="card-header">Total Pendapatan</div>
            <?php
              $row = mysqli_fetch_assoc($jumlahPendapatan);
              $jumlah_pendapatan = $row['total_pendapatan'];
              ?>
              <div class="card-body">
                <div class="number" id="total"><?= $jumlah_pendapatan?></div>
              </div>
            </div>
          </div>
        </div>
      </main>
      <!-- MAIN -->
    <script src="script.js"></script>
    <script>
        function convertToShortForm(pendapatan) {
        if (pendapatan >= 1000000) {
            return (pendapatan / 1000000) + " Juta";
        } else if (pendapatan >= 1000) {
            return (pendapatan / 1000) + " Ribu";
        } else {
            return pendapatan;
        }
        }
        document.getElementById('total').innerHTML = convertToShortForm(document.getElementById('total').innerHTML)
    </script>
  </body>
</html>
