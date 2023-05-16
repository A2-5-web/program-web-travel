<?php
session_start();
require 'customer_controller.php';
include 'session_checker.php';

// Eksekusi query dan simpan hasilnya dalam variabel $result
$result = tampil_data();
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Card Paket Travel</title>
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
          <h1>Selamat Datang di Travel5</h1>
          <p>
            Temukan pengalaman liburan yang tak terlupakan dengan paket-paket
            kami. Segera booking sekarang dan jadilah bagian dari petualangan
            seru bersama kami!
          </p>
        </div>
      </div>
    </header>
    <!-- header -->

    <!-- booknow -->
    <div class="title-wrap">
      <span class="sm-title"
        >Jangan lewatkan kesempatan untuk menjelajahi dunia!</span
      >
      <h2 class="lg-title">Buruan Pesan!</h2>
    </div>
     <!-- untuk memeriksa apakah ada pesan yang akan ditampilkan atau tidak -->
  <?php
  if (isset($_GET['pesan'])) {
    $pesan = $_GET['pesan'];
    echo "<script>var pesan = '$pesan';
                swal({
                  title: 'Pesan',
                  text: pesan,
                  icon: 'success',
                  button: 'OK'
                }).then(function() {
                  window.location.href = 'customer_pesan.php';
                });
          </script>";
  }
  ?>
  <!-- tampilan utama pada halaman ini  -->
  <div class="container" style="margin-top: 100px;">
    <div class="card-container">
      <?php foreach ($result as $id => $row) : ?>
      <?php
        // Ambil nilai kolom dari tiap baris data
        $id_paket = $row['id_paket'];
        $nama_paket = $row['nama_paket'];
        $destinasi = $row['destinasi'];
        $deskripsi = $row['deskripsi'];
        $paket_tour = $row['paket_tour'];
        $durasi = $row['durasi'];
        $harga = $row['harga'];
        $path_gambar = $row['nama_gambar'];
        $durasiAngka = (int) preg_replace('/\D/', '', $durasi);
      ?>
        <!-- card untuk menampilkan setiap paket travel dari database  -->
        <div class='card'>
          <img src='img/<?php echo $path_gambar ?>' alt='<?php echo $nama_paket ?>'>
          <div class="card-body">
            <h2 class="card-title"><?php echo $nama_paket ?></h2>
            <p class="card-text"><?php echo $deskripsi ?></p>
            <p class="card-text">Rp <?php echo number_format($harga, 0, ',', '.') ?></p>
            <button type="button" class="btn btn-primary btn-detail" data-toggle="modal" data-target="#detailModal-<?php echo $id ?>">Lihat Detail</button>
            <button type="button" class="btn btn-custom" onclick="hitungHarga(<?php echo $id ?>)" data-toggle="modal" data-id="<?php echo $id; ?>" data-target="#pesanModal-<?php echo $id; ?>">Pesan Tiket</button>
          </div>
        </div>
        <!-- modal untuk menampilkan detail paket travel  -->
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
        <!-- modal untuk menampilkan formulir pemesanan paket travel -->
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
                <form>
                  <div class="form-group">
                    <input type="hidden" value="<?php echo $id_paket ?>" id="id_paket-<?php echo $id;?>" name="id_paket">
                    <label for="jumlah_orang-<?php echo $id ?>">Jumlah Orang</label>
                    <input type="number" class="form-control" id="jumlah_orang-<?php echo $id ?>" name="jumlah_orang" min="1" max="6" step="1" value="1" oninput="hitungHarga(<?php echo $id ?>)">
                  </div>
                  <div class="form-group">
                    <label for="total_harga-<?php echo $id ?>">Total Harga</label>
                    <input type="text" class="form-control" id="total_harga-<?php echo $id ?>" value="<?php echo $harga ?>" disabled>
                    <input type="hidden" class="form-control" id="total_hargaHid-<?php echo $id ?>" name="total_harga" value="<?php echo $harga ?>" disabled>
                    <div class="tampungHarga<?php echo $id ?>" hidden><?php echo $harga ?></div>
                  </div>
                  <div class="form-group">
                    <label for="tanggal_berangkat-<?php echo $id ?>">Tanggal Berangkat</label>
                    <input type="date" class="form-control" id="tanggal_berangkat-<?php echo $id ?>" name="tanggal_berangkat" oninput="hitungTanggal(<?php echo $id ?>)">
                  </div>
                  <div class="form-group">
                    <label for="tanggal_kembali-<?php echo $id ?>">Tanggal Kembali</label>
                    <input type="date" class="form-control" id="tanggal_kembali-<?php echo $id ?>" name="tanggal_kembali" disabled>
                    <div class="tampungDurasi<?php echo $id ?>" hidden><?php echo $durasiAngka ?></div>
                  </div>
                  <div class="form-group text-center">
							      <button type="submit" class="btn btn-primary" onclick="orderTiket(<?php echo $id;?>)">Konfirmasi</button>
						      </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach;?>
    </div>
  </div>
    <!-- end of booknow section -->
    
    <!-- footer -->
    <br>
    <footer class="py-4">
      <div class="container footer-row">
        <div class="footer-item">
          <a href="customer_pesan.php" class="site-brand"> Travel<span>5</span> </a>
          <p class="text">
            Jangan lewatkan kesempatan untuk mengunjungi destinasi terbaik di
            seluruh dunia dengan Travel5. Kami menyediakan pilihan tempat wisata
            yang menarik dan layanan terbaik untuk memastikan liburan Anda
            menjadi tak terlupakan. Yuk, plan your dream trip with us now!
          </p>
        </div>

        <div class="footer-item">
          <h2>Follow us on:</h2>
          <ul class="social-links">
            <li>
              <a href="#">
                <i class="fab fa-facebook-f"></i>
              </a>
            </li>
            <li>
              <a href="#">
                <i class="fab fa-instagram"></i>
              </a>
            </li>
            <li>
              <a href="#">
                <i class="fab fa-twitter"></i>
              </a>
            </li>
            <li>
              <a href="#">
                <i class="fab fa-pinterest"></i>
              </a>
            </li>
            <li>
              <a href="#">
                <i class="fab fa-google-plus"></i>
              </a>
            </li>
          </ul>
        </div>
    </footer>
    <!-- end of footer -->
    <!-- js -->
    <script>

      // untuk merubah format angka menjadi rupiah 
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

      // menghitung harga ketika jumlah orang diinput
      function hitungHarga(id) {
        let jumlahOrang = document.getElementById('jumlah_orang-' + id).value;
        let hargaView = document.querySelector('.tampungHarga' + id).innerHTML;
        let hargaHid = document.querySelector('.tampungHarga' + id).innerHTML;
        let totalHargaView = jumlahOrang * hargaView;
        let totalHargaHid = jumlahOrang * hargaView;
        document.getElementById('total_harga-' + id).value = formatRupiah(totalHargaView);
        document.getElementById('total_hargaHid-' + id).value = totalHargaHid;
        console.log(totalHargaHid)
      }

      // menghitung tanggal kembali berdasarkan durasi paket travel dan tanggal keberangkatan yang telah diatur
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

      // menambahkan data pada database menggunakan ajax 
      function orderTiket(id) {
        // Mendapatkan nilai inputan form
        var jumlah_orang = $('#jumlah_orang-' + id).val();
        var total_harga = $('#total_hargaHid-' + id).val();
        var tanggal_berangkat = $('#tanggal_berangkat-' + id).val();
        var tanggal_kembali = $('#tanggal_kembali-' + id).val();
        var id_paket = $('#id_paket-' + id).val();

        // Melakukan ajax post request untuk mengirim data ke server
        $.ajax({
          type: "POST",
          url: "customer_controller.php",
          data: {
            'id_user' : '<?php echo $_SESSION['id_user']; ?>',
            'jumlah_orang': jumlah_orang,
            'total_harga': total_harga,
            'tanggal_berangkat': tanggal_berangkat,
            'tanggal_kembali': tanggal_kembali,
            'tanggal_pesan': '<?php echo date("Y/m/d"); ?>',
            'status' : "Belum Dibayar",
            'id_paket': id_paket,
            'orderTiket': true
          },
          success: function (data) {
            // Menampilkan pesan sukses atau error
            if (data == "sukses") {
                window.location.href= "customer_pesan.php?pesan=Data+berhasil+ditambahkan";

            } else {
              alert("Data gagal ditambahkan! Silahkan coba lagi.");
            }
          },
          error: function (xhr, status, error) {
            alert("Terjadi kesalahan: " + error);
          }
        });
      }
    </script>
    <script src="script2.js"></script>
  </body>
</html>
