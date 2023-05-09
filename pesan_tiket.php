<?php
//koneksi ke database
$conn = mysqli_connect("db4free.net", "kelompok_5", "kelompok_5", "travel");

//query untuk mengambil data dari tabel
$query = "SELECT * FROM paket_wisata";

//eksekusi query
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css"
      integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ"
      crossorigin="anonymous"
    />
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
      crossorigin="anonymous"
    ></script>
  </head>
  <body>
    <header class="header" data-header>
      <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Travel</a>
          <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarNav"
            aria-controls="navbarNav"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Beranda</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Galeri Foto</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Pesan Tiket</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Tentang Kami</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Kontak</a>
              </li>
            </ul>
          </div>
          <ul class="navbar nav ms-auto">
            <li class="nav-item">
                <button type="button" class="btn btn-outline-primary">PESAN TIKET</button>
            </li>
          </ul>
        </div>
      </nav>
    </header>

    <!-- PESAN TIKET -->
    <div class="title-wrap">
        <span class="sm-title"
            >Jangan lewatkan kesempatan untuk menjelajahi dunia!</span
        >
      <h2 class="lg-title">Form Order</h2>
    </div>
    <form class="box">
      <div class="form-group">
        <label for="nama-penumpang">Nama Penumpang</label>
        <input type="text" id="nama-penumpang" name="nama-penumpang" />
      </div>
      <div class="form-group">
        <label for="alamat-penumpang">Alamat Penumpang</label>
        <textarea id="alamat-penumpang" name="alamat-penumpang"></textarea>
      </div>
      <div class="form-group">
        <label for="tanggal-pesan">Tanggal Pesan</label>
        <input type="date" id="tanggal-pesan" name="tanggal-pesan" />
      </div>
      <div class="form-group">
        <label for="tanggal-berangkat">Tanggal Berangkat</label>
        <input type="date" id="tanggal-berangkat" name="tanggal-berangkat" />
      </div>
      <div class="form-group">
        <label for="jam-berangkat">Jam Berangkat</label>
        <input type="time" id="jam-berangkat" name="jam-berangkat" />
      </div>
      <div class="form-group">
        <label for="kode-tiket">Kode Tiket</label>
        <select id="kode-tiket" name="kode-tiket">
            <?php
            while($data = mysqli_fetch_assoc($result)) {
            ?>
            <option value="<?php echo $data['id_paket']; ?>"><?php echo $data['nama_paket']; ?> - $<?php echo $data['harga_paket']; ?></option>
            <?php
            }
            ?>
        </select>
      </div>
      <button type="submit">Pesan Tiket</button>
    </form>
    <br /><br /><br />
    <!-- PESAN TIKET -->

  </body>
</html>
