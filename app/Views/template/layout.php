<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>APP BMN</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="<?= base_url('startbootstrap'); ?>/img/logo-bps.png">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="/template/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="/template/css/style.css" rel="stylesheet">
</head>

<body>
<!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href="Pages">Barang Milik Negara</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      
      <a href="<?= base_url('login') ?>" class="btn btn-primary py-2 px-4 ml-auto d-none d-lg-block" >Login</a>

    </div>
  </header>
<!-- End Header -->

    <?= $this->renderSection('content'); ?>
    <!-- Footer Start -->
<section id="contact" class="contact">
    <div class="container" data-aos="fade-in">
        <div class="row mt-5">
            <div class="col-lg-4">
                <h5 class="text-primary text-uppercase mb-4" style="letter-spacing: 5px;"><b>About Us</b></h5>
              <div class="info">
                <div class="address">
                  <i class="fa fa-map-marker-alt mr-2"></i>
                  <h4> Alamat:</h4>
                  <p>Jl. Sultan Syahril No.30, Pahoman, Engal, Kota Bandar Lampung, Lampung 35213</p>
                </div>

                <div class="email">
                  <i class="fa fa-envelope mr-2"></i>
                  <h4>Email:</h4>
                  <p>bps1871@bps.go.id</p>
                </div>

                <div class="phone">
                  <i class="fa fa-phone-alt mr-2"></i>
                  <h4>No Telp:</h4>
                  <p>(0721) 255980</p>
                </div>

              </div>
          </div>

          <div class="col-lg-8 mt-5 mt-lg-0">

            <iframe style="border:0; width: 100%; height: 350px;" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15887.551263030777!2d105.2553293!3d-5.4340059!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e40dbc995555555%3A0x99d597a84cdf184d!2sBadan%20Pusat%20Statistik%20Kota%20Bandar%20Lampung!5e0!3m2!1sid!2sid!4v1677247032263!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

          </div>

          <div class="d-flex justify-content-start mt-4">
            <a class="btn btn-outline-light btn-square mr-2" target="_blank" href="https://twitter.com/bps_statistics"><i class="fab fa-twitter"></i></a>
            <a class="btn btn-outline-light btn-square mr-2" target="_blank" href="https://web.facebook.com/bpsstatistics/"><i class="fab fa-facebook-f"></i></a>
            <a class="btn btn-outline-light btn-square mr-2" target="_blank" href="https://www.instagram.com/bpsbandarlampung/"><i class="fab fa-instagram"></i></a>
            <a class="btn btn-outline-light btn-square mr-2" target="_blank" href="https://www.youtube.com/channel/UCYxOi_FgBHcOdgj0WYoGvmA"><i class="fab fa-youtube"></i></a>
        </div>
        </div>
    </div>
</section>

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="fa fa-angle-double-up"></i></a>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="/template/lib/easing/easing.min.js"></script>
    <script src="/template/lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="/template/mail/jqBootstrapValidation.min.js"></script>
    <script src="/template/mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="/template/js/main.js"></script>
</body>

</html>