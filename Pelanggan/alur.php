<?php
include "../koneksi.php";
error_reporting(0);
session_start();
if( ! isset($_SESSION['username'])){ // Jika tidak ada session username berarti dia belum login
  header("location: login.php"); // Kita Redirect ke halaman index.php karena belum login
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Caricacan and Team Wedding Organizer</title>
  <link rel="icon" href="../images/logocari.jpg" type="image/png">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href="https://fonts.googleapis.com/css?family=Nanum+Gothic:400,700,800" rel="stylesheet">
  <link href='https://fonts.googleapis.com/css?family=Sofia' rel='stylesheet'>
  <link rel="stylesheet" href="../fonts/icomoon/style.css">

  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/magnific-popup.css">
  <link rel="stylesheet" href="../css/jquery-ui.css">
  <link rel="stylesheet" href="../css/owl.carousel.min.css">
  <link rel="stylesheet" href="../css/owl.theme.default.min.css">

  <link rel="stylesheet" href="../css/bootstrap-datepicker.css">

  <link rel="stylesheet" href="../fonts/flaticon/font/flaticon.css">

  <link rel="stylesheet" href="../css/aos.css">
  <link rel="stylesheet" href="../css/rangeslider.css">

  <link rel="stylesheet" href="../css/style.css">
  
</head>
<body>

  <div class="site-wrap">

    <div class="site-mobile-menu">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>

    <!--================Header Menu Area =================-->  
    <?php 
    include'header_pelanggan.php';
    ?>
    <!--================Header Menu Area =================-->
    <div class="site-blocks-cover inner-page-cover overlay" style="background-image: url(../images/alur.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row align-items-center justify-content-center text-center">
          <div class="col-md-10" data-aos="fade-up" data-aos-delay="400">
            <div class="row justify-content-center mt-5">
              <div class="col-md-8 text-center">
                <h1 style="font-family: 'Sofia';" >Alur Pemesanan</h1>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>  

    <div class="site-section">
      <div class="container">
        <div class="row justify-content-center mb-5">
          <div class="col-md-7 text-center border-primary">
            <h2 class="font-weight-light text-primary" style="font-family: 'Sofia';">Alur Pemesanan</h2>
          </div>
        </div>

        <div class="row justify-content-center">
          <div class="col-12">
            <?php 
            $i=1;
            $sql = mysql_query("SELECT * from alur_pemesanan");
            while ($isi= mysql_fetch_array($sql)){
              ?>
              <div class="border p-3 rounded mb-2">
                <a data-toggle="collapse" href="#collapse<?php echo $i; ?>" role="button" aria-expanded="<?php echo ($i==1) ? 'true': 'false'; ?>" aria-controls="collapse<?php echo $i; ?>" class="accordion-item h5 d-block mb-0"><?php echo $isi['judul_alur']; ?></a>
                <div class="collapse" id="collapse<?php echo $i; ?>">
                  <div class="pt-2">
                    <p class="mb-0"><?php echo $isi['isi_alur']; ?></p>
                  </div>
                </div>
              </div>
              <?php $i++; }; ?>  
            </div>

          </div>

        </div>

      </div>

      <!--================Header Menu Area =================-->  
      <?php 
      include'footer_pelanggan.php';
      ?>



      <script src="../js/jquery-3.3.1.min.js"></script>
      <script src="../js/jquery-migrate-3.0.1.min.js"></script>
      <script src="../js/jquery-ui.js"></script>
      <script src="../js/popper.min.js"></script>
      <script src="../js/bootstrap.min.js"></script>
      <script src="../js/owl.carousel.min.js"></script>
      <script src="../js/jquery.stellar.min.js"></script>
      <script src="../js/jquery.countdown.min.js"></script>
      <script src="../js/jquery.magnific-popup.min.js"></script>
      <script src="../js/bootstrap-datepicker.min.js"></script>
      <script src="../js/aos.js"></script>
      <script src="../js/rangeslider.min.js"></script>
      <script src="../js/main.js"></script>

    </body>
    </html>
