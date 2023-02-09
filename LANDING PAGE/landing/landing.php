<?php
    if(!empty($_SESSION['username_decafe'])){
        header('location:landing');
    }
  
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
   

    <!-- Style CSS -->
    <link rel="stylesheet" href="LANDING PAGE/landing/css/style.css" />
    <link rel="stylesheet" href="LANDING PAGE/landing/css/responsive-style.css" />

    <!-- AOS Animate -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />

  


    <title>DeCafe - Landing Page</title>
  </head>
  <body>
    <!-- Navbar Section Open -->
    <nav class="navbar navbar-expand-lg fixed-top bg-white">
      <div class="container">
        <a class="navbar-brand" href="#">
          <span class="text-primary">DeCafe</span>
        </a>
        <button
          class="navbar-toggler shadow-none"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarNav"
          aria-controls="navbarNav"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <i class="bx bx-menu"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#home"
                >Home</a
              >
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#about">About</a>
            </li>
          </ul>
          <a href="login" class="btn btn-primary">Login</a>
        </div>
      </div>
    </nav>
    <!-- Navbar Section Close -->

    <!-- Home Section Open -->
    <section class="home" id="home">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-6">
            <div
              class="home-content"
              data-aos="fade-up"
              data-aos-duration="1000"
            >
              <p class="badge fs-6 bg-primary-light text-primary">
                You have to try it 😋
              </p>
              <h1 class="text-home-bold fw-bold text-dark mt-1">
                For you, we serve the best food & <span>delicious</span>
              </h1>
              <h4 class="text-home-reguler fw-normal text-secondary">
              Kami menemukan sebuah konsep yang pas dan pantas untuk disajikan di sebuah restoran agar masyarakat bisa merasakannya!
              </h4>
            </div>
          </div>
          <div class="col-md-6">
            <div
              class="home-img mt-4"
              data-aos="fade-up"
              data-aos-duration="2000"
            >
              <img src="LANDING PAGE/landing/img/home.png" class="w-50" alt="" />
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Home Section Close -->

    <!-- Services Section Open -->
    <section class="services text-center">
      <div class="container">
        <span class="text-primary fw-bold">Services</span>
        <h2 class="fw-bold text-dark mt-3">Layanan terbaik kami</h2>
        <div class="row">
          <div
            class="col-sm-4 content mt-5"
            data-aos="fade-up"
            data-aos-duration="1000"
          >
            <img src="LANDING PAGE/landing/img/delivery.jpg" class="w-50" alt="" />
            <h5 class="services-title text-dark mt-4">Fastest delivery</h5>
            <p class="text-secondary mt-3">
            Kami dapat mengirimkan makanan siap saji yang lezat dengan cepat ke depan pintu Anda.
            </p>
          </div>
          <div
            class="col-sm-4 content mt-5"
            data-aos="fade-up"
            data-aos-duration="2000"
          >
            <img src="LANDING PAGE/landing/img/price.png" class="w-50" alt="" />
            <h5 class="services-title text-dark mt-4">Affordable prices</h5>
            <p class="text-secondary mt-3">
            Setiap makanan yang kami sediakan memiliki harga yang terjangkau dan sesuai dengan selera.
            </p>
          </div>
          <div
            class="col-sm-4 content mt-5"
            data-aos="fade-up"
            data-aos-duration="3000"
          >
            <img src="LANDING PAGE/landing/img/delicious.jpg" class="w-50" alt="" />
            <h5 class="services-title text-dark mt-4">Delicious & hygienic</h5>
            <p class="text-secondary mt-3">
            Dalam setiap makanan kami sajikan dengan resep terbaik sehingga rasanya enak.
            </p>
          </div>
        </div>
      </div>
    </section>
    <!-- Services Section Close -->

    <!-- About Section Open -->
    <section class="about" id="about">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-6">
            <div class="row">
              <div class="col-md-11">
                <div
                  class="about-img mt-3"
                  data-aos="fade-up"
                  data-aos-duration="1000"
                >
                  <img src="LANDING PAGE/landing/img/about.png" class="w-53" class="w-100" alt="" />
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div
              class="about-content"
              data-aos="fade-up"
              data-aos-duration="2000"
            >
              <span class="text-primary fw-bold">About</span>
              <h2 class="fw-bold text-dark mt-3">Kami melayani dengan sepenuh hati</h2>
              <p class="text-secondary mt-3">
              Kami percaya bahwa kualitas bahan makanan yang baik dengan hasil masakan yang lezat dapat membuat pelanggan merasa puas, dan dengan pelayanan terbaik kami berikan hanya untuk Anda. Kemudian kami juga selalu berinovasi dengan resep kami dan terus meningkatkan kualitas restoran tersebut.
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- About Section Close -->

  
    <!-- Footer Section Open -->
    <footer class="footer-section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-md-5 col-lg-5">
            <div class="row">
              <div class="col-md-12 col-lg-10">
                <a href="#" class="footer-brand">
                  <span class="text-dark">DeCafe</span>
                  <p class="text-secondary mt-3">
                  DeCafe merupakan restoran yang sudah ada sejak tahun 2021 di Sulawesi Selatan. Kami menyajikan makanan dengan kualitas terbaik untuk Anda.
                  </p>
                </a>
              </div>
            </div>
          </div>
          <div class="col-md-7">
            <div class="row">
              <div class="col-md-3">
                <div class="footer-content">
                  <span>Services</span>
                  <ul class="footer-link mt-3 list-unstyled">
                    <li><a href="#" class="py-1 d-block">Delivery</a></li>
                    <li><a href="#" class="py-1 d-block">Pricing</a></li>
                    <li><a href="#" class="py-1 d-block">Fast food</a></li>
                  </ul>
                </div>
              </div>
              <div class="col-md-3">
                <div class="footer-content">
                  <span>Info</span>
                  <ul class="footer-link mt-3 list-unstyled">
                    <li><a href="#" class="py-1 d-block">Promo date</a></li>
                    <li><a href="#" class="py-1 d-block">Event</a></li>
                    <li><a href="#" class="py-1 d-block">Careers</a></li>
                  </ul>
                </div>
              </div>
              <div class="col-md-5">
                <div class="footer-content">
                  <span>Contact</span>
                  <ul class="footer-link mt-3 list-unstyled">
                    <li>
                      <a href="#" class="py-1 d-block"
                        >Sulawesi Selatan - Indonesia</a
                      >
                    </li>
                    <li>
                      <a href="#" class="py-1 d-block">+62897-9352-423</a>
                    </li>
                    <li>
                      <a href="#" class="py-1 d-block">contact@decafe.co.id</a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row mt-4">
          <p class="copyright text-secondary text-center">
            Copyright &copy; 2023 All rights reserved | By
            <a href="https://ilmaelfiraa.github.io/" class="text-primary"
              >DeCafe</a
            >
          </p>
        </div>
      </div>
    </footer>
    <!-- Footer Section Close -->



    <!-- Add Drop Shadow on Scroll -->
    <script>
      window.addEventListener("scroll", (e) => {
        const nav = document.querySelector(".navbar");
        if (window.pageYOffset > 0) {
          nav.classList.add("drop-shadow");
        } else {
          nav.classList.remove("drop-shadow");
        }
      });
    </script>

    <!-- AOS Animate on Scroll -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <script>
      AOS.init();
    </script>
  </body>
</html>