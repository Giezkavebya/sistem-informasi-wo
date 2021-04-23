<?php
include "../koneksi.php";
session_start();
if( ! isset($_SESSION['username'])){ 
  header("location: ../login.php"); 
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Caricacan and Team Wedding Organizer</title>
  <link rel="icon" href="../images/logocari.png" type="image/png">
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
    
    <div class="site-blocks-cover overlay" style="background-image: url(../images/gambar3.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row align-items-center justify-content-center text-center">

          <div class="col-md-12">
            <div class="row justify-content-center mb-4">
              <div class="col-md-10 text-center">
                <h1 class="" style="font-family: 'Sofia';" data-aos="fade-up">Caricacan and Team Wedding Organizer</h1>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>  
    <div class="site-section">
      <?php
      $sql            = mysql_query("SELECT * from tentang");
      $isi            = mysql_fetch_array($sql);
      $intro          = $isi['intro'];
      $gambar_tentang = $isi['gambar_tentang'];
      ?>
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-6 ml-auto">
            <h2 class="text-primary mb-3" style="font-family: 'Sofia';" >Why Caricacan and Team</h2>
            <p><?php echo $intro; ?></p>
            <a class="btn btn-primary text-white"  href="paket_pelanggan.php">Pesan Sekarang</a>
          </div>
          <div class="col-md-6">
            <img src="../Admin/images/tentang/<?php echo $gambar_tentang; ?>" alt="Image" class="img-fluid rounded" >
          </div>
        </div>
      </div>
    </div>
    
    <div class="site-section" data-aos="fade">
      <div class="container">
        <div class="row  mb-5">
          <div class="col-12">
            <center><iframe width="1000" height="315" src="https://www.youtube.com/embed/wcgYUak4d1s" frameborder="0" allow="accelerometer"; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></center>
          </div>
        </div>
        <div class="row justify-content-center mb-5">
          <div class="col-md-7 text-center border-primary">
            <h2 class="font-weight-light text-primary" style="font-family: 'Sofia';">Vendor</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-12  block-13">
            <div class="owl-carousel nonloop-block-13">
              <?php
              $query=mysql_query("SELECT * FROM detail_vendor INNER JOIN layanan ON detail_vendor.id_layanan=layanan.id_layanan JOIN vendor ON detail_vendor.id_vendor=vendor.id_vendor");
              while($rows=mysql_fetch_array($query)){
                $id_detailvendor = $rows ['id_detailvendor'];
                $nama_vendor = $rows ['nama_vendor'];
                $foto_vendor= $rows ['foto_vendor'];
                $nama_layanan = $rows ['nama_layanan'];
                ?> 
                <div class="d-block d-md-flex listing vertical">
                  <a href="detail_vendor_pelanggan.php?id=<?php echo $id_detailvendor;?>" class="img d-block" style=""><img src="../Admin/images/vendor/<?php echo $foto_vendor;?>" alt="Image" class="img-fluid rounded"  style="width: 400px; height: 210px;"></a>
                  <div class="lh-content">
                    <span class="category"><img src="../images/diamond.png"style="width: 6%; height: 6%;" /> <?php echo $nama_layanan;?></span>
                    <a href="detail_vendor_pelanggan.php?id=<?php echo $id_detailvendor;?>" class="bookmark" title="Lihat Detail"><span class="icon-heart"></span></a>
                    <center><h3><a href="#"><?php echo $nama_vendor; ?></a></h3></center>
                  </div>
                </div>
              <?php }  ?>
            </div>
          </div>
        </div>  
      </div>
    </div>

    
      <div class="container">
        <div class="row justify-content-center mb-3">
          <div class="col-md-7 text-center border-primary">
            <h2 class="font-weight-light text-primary" style="font-family: 'Sofia';">Review</h2>
          </div>
        </div>
        <div class="slide-one-item home-slider owl-carousel">
          <?php
          $query=mysql_query("SELECT * FROM review JOIN pelanggan ON review.id_pelanggan=pelanggan.id_pelanggan WHERE review.publikasi='Ya'");
          while($row=mysql_fetch_array($query)){
            $nama_pelanggan = $row ['nama_pelanggan'];
            $kepuasan_layanan = $row ['kepuasan_layanan'];
            $isi_review= $row ['isi_review'];
            ?> 
            <div>
              <div class="testimonial">
                <figure class="mb-4">
                  <img src="../images/like.png" alt="Image" class="img-fluid mb-3" style="">
                  <p style="margin-top: -30px;"><?php echo $nama_pelanggan; ?></p>
                  <p style="margin-top: -10px;"><?php echo $kepuasan_layanan; ?></p>
                </figure>
                <blockquote>
                  <p style="margin-top: -10px;">&ldquo;<?php echo $isi_review; ?>&rdquo;</p>
                </blockquote>
              </div>
            </div>
          <?php }  ?>
        </div>
      </div>


    <!--================Header Menu Area =================-->  
    <?php 
    include'footer_pelanggan.php';
    ?>
    <!--================Header Menu Area =================-->

  </div>

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