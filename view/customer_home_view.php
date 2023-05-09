<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Home</title>
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
              <a href="customer_home_view.php" class="nav-link">Beranda</a>
            </li>
            <li class="nav-item">
              <a href="customer_book_view.php" class="nav-link">Pesan Tiket</a>
            </li>
            <li class="nav-item">
              <a href="about.html" class="nav-link">Tentang Kami</a>
            </li>
            <li class="nav-item">
              <a href="contact.html" class="nav-link">Kontak</a>
            </li>
            <li class="nav-item">
              <a href="signup.html" class="nav-link">Daftar</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- end of navbar  -->

    <!-- header -->
    <header class="flex">
      <div class="container">
        <div class="header-title">
          <h1>Selamat Datang di Travel5</h1>
          <p>
            Tempatnya para jalan-jalaners! Temukan destinasi liburan terbaikmu
            dengan harga terjangkau hanya di sini. Tunggu apalagi? Ayo pilih dan
            pesan sekarang juga!
          </p>
        </div>
            <input type="button" class="btn" value="Pesan Tiket" onclick="location.href='booknow.html';" />
      </div>
    </header>
    <!-- header -->

    <!-- featured section -->
    <section id="featured" class="py-4">
      <div class="container">
        <div class="title-wrap">
          <span class="sm-title"
            >Kenali Destinasi Wisata Terbaik Dari Kami Sebelum Melakukan Travelling!</span
          >
          <h2 class="lg-title">best places</h2>
        </div>

        <div class="featured-row">
          <div class="featured-item my-2 shadow">
            <img
              src="../Travel5/images/featured-reo-de-janeiro-brazil.jpg"
              alt="featured place"
            />
            <div class="featured-item-content">
              <span>
                <i class="fas fa-map-marker-alt"></i>
                Reo De Janeiro, Brazil
              </span>
              <div>
                <p class="text">
                  Rio de Janeiro adalah kota terbesar kedua di Brasil yang
                  terkenal dengan pantainya yang indah dan Patung Kristus
                  Penebus yang ikonik.
                </p>
              </div>
            </div>
          </div>

          <div class="featured-item my-2 shadow">
            <img
              src="../Travel5/images/featured-north-bondi-australia.jpg"
              alt="featured place"
            />
            <div class="featured-item-content">
              <span>
                <i class="fas fa-map-marker-alt"></i>
                North Bondi, Australia
              </span>
              <div>
                <p class="text">
                  North Bondi, pantai di Australia dengan pasir putih dan ombak
                  besar yang menarik pengunjung.
                </p>
              </div>
            </div>
          </div>

          <div class="featured-item my-2 shadow">
            <img
              src="../Travel5/images/featured-berlin-germany.jpg"
              alt="featured place"
            />
            <div class="featured-item-content">
              <span>
                <i class="fas fa-map-marker-alt"></i>
                Berlin, Germany
              </span>
              <div>
                <p class="text">
                  Berlin, ibukota Jerman, terkenal dengan sejarahnya dan tempat
                  bersejarah seperti tembok Berlin dan museum seni.
                </p>
              </div>
            </div>
          </div>

          <div class="featured-item my-2 shadow">
            <img
              src="../Travel5/images/featured-khwaeng-wat-arun-thailand.jpg"
              alt="featured place"
            />
            <div class="featured-item-content">
              <span>
                <i class="fas fa-map-marker-alt"></i>
                Khwaeng wat arun, thailand
              </span>
              <div>
                <p class="text">
                  Khwaeng Wat Arun, Thailand adalah destinasi wisata populer
                  dengan kuil megah dan pemandangan indah Sungai Chao Phraya.
                </p>
              </div>
            </div>
          </div>

          <div class="featured-item my-2 shadow">
            <img src="../Travel5/images/featured-rome-italy.jpg" alt="featured place" />
            <div class="featured-item-content">
              <span>
                <i class="fas fa-map-marker-alt"></i>
                Rome, Italy
              </span>
              <div>
                <p class="text">
                  Roma, kota tua yang indah di Italia, terkenal dengan
                  Colosseum, Trevi Fountain, dan kulinernya yang lezat.
                </p>
              </div>
            </div>
          </div>

          <div class="featured-item my-2 shadow">
            <img
              src="../Travel5/images/featured-fuvahmulah-maldives.jpg"
              alt="featured place"
            />
            <div class="featured-item-content">
              <span>
                <i class="fas fa-map-marker-alt"></i>
                fuvahmulah, maldives
              </span>
              <div>
                <p class="text">
                  Fuvahmulah adalah pulau cantik di Maladewa dengan pantai
                  berpasir putih dan air laut yang jernih dan sejuk.
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- end of featured section -->

    <!-- services section -->
    <section id="services" class="py-4">
      <div class="container">
        <div class="title-wrap">
          <span class="sm-title">ketahui layanan yang kami tawarkan</span>
          <h2 class="lg-title">Layanan Kami</h2>
        </div>

        <div class="services-row">
          <div class="services-item">
            <span class="services-icon">
              <i class="fas fa-hotel"></i>
            </span>
            <h3>Luxurious Hotel</h3>
            <p class="text">
              Nikmati kemewahan menginap di hotel kami dengan fasilitas dan
              pelayanan yang tak terlupakan.
            </p>
          </div>

          <div class="services-item">
            <span class="services-icon">
              <i class="fas fa-map-marked-alt"></i>
            </span>
            <h3>Trave Guide</h3>
            <p class="text">
              Dapatkan panduan wisata terbaik dari tim ahli kami untuk
              menjelajahi tempat indah di dunia. Nikmati pengalaman wisata yang
              terorganisir dengan baik bersama kami.
            </p>
          </div>

          <div class="services-item">
            <span class="services-icon">
              <i class="fas fa-money-bill"></i>
            </span>
            <h3>Suitable Price</h3>
            <p class="text">
              Anda bisa menikmati liburan yang menyenangkan tanpa perlu khawatir
              tentang anggaran dengan memilih layanan kami.
            </p>
          </div>
        </div>
      </div>
    </section>
    <!-- end of services section -->

    <!-- testimonials section -->
    <section id="testimonials" class="py-4">
      <div class="container">
        <div class="title-wrap">
          <span class="sm-title">ulasan dari klien kami</span>
          <h2 class="lg-title">testimoni</h2>
        </div>
        <div class="test-row">
          <div class="test-item">
            <p class="text">
              Ternyata, liburan saya di Tokyo sungguh luar biasa! Saya sangat
              menikmati keindahan alam dan budaya Jepang yang begitu kaya. Saya
              benar-benar terkesan dengan fasilitas yang tersedia di hotel kami,
              serta pelayanan yang ramah dan profesional dari tim kami di sana.
              Terima kasih kepada mereka, liburan saya menjadi tak terlupakan!
            </p>
            <div class="test-item-info">
              <img src="../Travel5/images/test-1.jpg" alt="testimonial" />
              <div>
                <h3>Asep Kurniawan</h3>
                <p class="text">Trip to Tokyo</p>
              </div>
            </div>
          </div>

          <div class="test-item">
            <p class="text">
              Saya benar-benar menikmati liburan saya di Birmingham! Semua
              tempat wisata dan keindahan alamnya luar biasa. Hotel yang saya
              inapi sangat nyaman dan stafnya memberikan pelayanan yang sangat
              baik. Saya pasti akan merekomendasikan Birmingham sebagai tujuan
              liburan yang wajib dikunjungi.
            </p>
            <div class="test-item-info">
              <img src="../Travel5/images/test-2.jpg" alt="testimonial" />
              <div>
                <h3>Ucup Anugrah</h3>
                <p class="text">Trip to Birmingham</p>
              </div>
            </div>
          </div>

          <div class="test-item">
            <p class="text">
              Saya benar-benar menikmati liburan saya di Texas! Semua atraksi
              wisata yang saya kunjungi begitu menakjubkan dan alamnya sangat
              indah. Hotel yang saya inapi sangat nyaman dan stafnya sangat
              ramah serta profesional. Saya pasti akan merekomendasikan Texas
              sebagai tujuan liburan yang harus dikunjungi.
            </p>
            <div class="test-item-info">
              <img src="../Travel5/images/test-3.jpg" alt="testimonial" />
              <div>
                <h3>Siti Alimah</h3>
                <p class="text">Trip to Texas</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- end of testimonials section -->

    <!-- video section -->
    <section id="video">
      <div class="video-wrapper flex">
        <video loop>
          <source src="../Travel5/videos/video-section.mp4" type="video/mp4" />
        </video>
        <button type="button" id="play-btn">
          <i class="fas fa-play"></i>
        </button>
      </div>
    </section>
    <!-- end of video section -->

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
    <script>
      // play/pause video
      let video = document.querySelector(".video-wrapper video");
      document.getElementById("play-btn").addEventListener("click", () => {
        if (video.paused) {
          video.play();
        } else {
          video.pause();
        }
      });
    </script>
  </body>
</html>
