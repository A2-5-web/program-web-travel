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

    <title>AgenHub</title>
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
        <li>
          <a href="#">
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

      <!-- MAIN -->
      <main>
          <div class="card-container">
            <div class="card">
              <div class="card-header">Jumlah Paket Travel</div>
              <div class="card-body">
                <div class="number">100</div>
                <div class="text">Paket Travel Tersedia</div>
              </div>
            </div>
            <div class="card">
              <div class="card-header">Jumlah Paket Travel</div>
              <div class="card-body">
                <div class="number">100</div>
                <div class="text">Paket Travel Tersedia</div>
              </div>
            </div>
            <div class="card">
              <div class="card-header">Jumlah Paket Travel</div>
              <div class="card-body">
                <div class="number">100</div>
                <div class="text">Paket Travel Tersedia</div>
              </div>
            </div>
          </div>
        </div>
      </main>
      <!-- MAIN -->
    <script src="script.js"></script>
  </body>
</html>
