<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Book Now</title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- font awesome cdn -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
      integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <!-- fonts -->
    <link rel="stylesheet" href="../Travel5/font/fonts.css" />
    <!-- normalize css -->
    <link rel="stylesheet" href="../Travel5/css/normalize.css" />
    <!-- custom css -->
    <link rel="stylesheet" href="../Travel5/css/utility.css" />
    <link rel="stylesheet" href="../Travel5/css/style.css" />
    <link rel="stylesheet" href="../Travel5/css/responsive.css" />
  </head>
  <body>
    <!-- navbar  -->
    <nav class="navbar">
      <div class="container flex">
        <a href="home.html" class="site-brand"> Travel<span>5</span> </a>
        <button type="button" id="navbar-show-btn" class="flex">
          <i class="fas fa-bars"></i>
        </button>
        <div id="navbar-collapse">
          <button type="button" id="navbar-close-btn" class="flex">
            <i class="fas fa-times"></i>
          </button>
          <ul class="navbar-nav">
            <li class="nav-item">
              <a href="home.html" class="nav-link">Beranda</a>
            </li>
            <li class="nav-item">
              <a href="gallery.html" class="nav-link">Galeri Foto</a>
            </li>
            <li class="nav-item">
              <a href="booknow.html" class="nav-link">Pesan Tiket</a>
            </li>
            <li class="nav-item">
              <a href="about.html" class="nav-link">Tentang Kami</a>
            </li>
            <li class="nav-item">
              <a href="contact.html" class="nav-link">Kontak</a>
            </li>
            <li class="nav-item">
              <a href="../view/customer_auth_view.php" class="nav-link"
                >Daftar</a
              >
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
          <h1>Pesan</h1>
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
          <option value="1">Eiffel Tower, Paris - $1200</option>
          <option value="2">Machu Picchu, Peru - $1000</option>
          <option value="3">Acropolis, Athens - $900</option>
          <option value="4">Bali, Indonesia - $1000</option>
          <option value="5">Dubai, United Arab Emirates - $1000</option>
          <option value="6">Bhutan - $600</option>
          <option value="7">Havana, Cuba - $500</option>
          <option value="8">Moskva, Russia - $1000</option>
        </select>
      </div>
      <button type="submit">Pesan Tiket</button>
    </form>
    <br /><br /><br />
    <!-- end of booknow section -->

    <!-- footer -->
    <footer class="py-4">
      <div class="container footer-row">
        <div class="footer-item">
          <a href="home.html" class="site-brand"> Travel<span>5</span> </a>
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

        <div class="footer-item">
          <h2>Popular Places:</h2>
          <ul>
            <li><a href="#">Thailand</a></li>
            <li><a href="#">Australia</a></li>
            <li><a href="#">Maldives</a></li>
            <li><a href="#">Switzerland</a></li>
            <li><a href="#">Germany</a></li>
          </ul>
        </div>

        <div class="subscribe-form footer-item">
          <h2>Subscribe for Newsletter!</h2>
          <form class="flex">
            <input
              type="email"
              placeholder="Enter Email"
              class="form-control"
            />
            <input type="submit" class="btn" value="Subscribe" />
          </form>
        </div>
      </div>
    </footer>
    <!-- end of footer -->
    <!-- js -->
    <script src="js/script.js"></script>
    <script src="js/gallery.js"></script>
  </body>
</html>