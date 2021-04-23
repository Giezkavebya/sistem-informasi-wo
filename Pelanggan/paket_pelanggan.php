<?php
include "../koneksi.php";
session_start();
if( ! isset($_SESSION['username'])){ // Jika tidak ada session username berarti dia belum login
  header("location: login.php"); // Kita Redirect ke halaman index.php karena belum login
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

  <link rel="stylesheet" href="../flaticon/font/flaticon.css">

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
    <style>
    .carousel-caption{
      position:static;
    }
  </style>
  <!-- AWAL POP UP INFO-->

  <div class="modal fade" id="Datainfo" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="container">
            <div class="slide-one-item home-slider owl-carousel">
              <div class="card mb-3" style="max-width: 1000px;">
                <div class="row no-gutters">
                  <div class="col-md-8">
                    <div class="card-body">
                      <?php
                      $sql=mysql_query("SELECT * from alur_pemesanan WHERE id_alur='6'");
                      $row=mysql_fetch_array($sql);
                      ?>
                      <h5 class="card-title"><?php echo $row['judul_alur'];?></h5>
                      <p style="font-size: 10px;"><?php echo $row['isi_alur'];?></p>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <img src="../images/ilustrasi5.jpg" style="width: 500px; height: 450px;" class="card-img" alt="...">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- AKHIR POP UP INFO -->

  <div class="site-blocks-cover inner-page-cover overlay" style="background-image: url(../images/paket.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
    <div class="container">
      <div class="row align-items-center justify-content-center text-center">
        <div class="col-md-10" data-aos="fade-up" data-aos-delay="400">
          <div class="row justify-content-center mt-5">
            <div class="col-md-8 text-center">
              <h1 style="font-family: 'Sofia';" >Paket Wedding</h1>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>  

  <div class="site-section">
    <div class="row justify-content-center mb-5">
      <div class="col-md-12 text-center border-primary">
        <a style="font-family: 'Sofia';">Temukan penawaran paket wedding terbaik dari Caricacan and Team</a>
        <div style="margin-left: 950px;">
          <a>Tentang Paket</a>
          <button type="button" class="btn btn-outline-dark" data-toggle="modal" data-target="#Datainfo"><i class="fa fa-info" data-toggle="tooltip" data-placement="top" title="Info Paket dan Pemesanan"></i>
          </button>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="row">
           <?php
           $query=mysql_query("SELECT * from paket where id_paket");
           while($rows=mysql_fetch_array($query)){
            $id_paket = $rows ['id_paket'];
            $nama_paket = $rows ['nama_paket'];
            $foto_paket= $rows ['foto_paket'];
            $harga_paket = $rows ['harga_paket'];
            $jumlah_tamu = $rows ['jumlah_tamu'];
            ?>  
            <style>
            .col-lg-3 {
             margin-left: 0.5cm;
             margin-right: 2cm;
           }
         </style>
         <div class="col-lg-3">
          <div class="row mb-5 d-block d-md-flex listing vertical">
            <a href="detail_paket_pelanggan.php?id=<?php echo $id_paket;?>" class="img d-block" style=""><img src="../Admin/images/fotopaket/<?php echo $foto_paket;?>" alt="Image" class="img-fluid rounded"  style="width: 400px; height: 210px;"></a>
            <div class="lh-content">
              <span class="category"><i class="fa fa-users"></i> <?php echo $jumlah_tamu;?> Tamu</span>
              <a href="detail_paket_pelanggan.php?id=<?php echo $id_paket;?>" class="bookmark" title="Lihat Detail"><span class="icon-info"></span></a>
              <h3><a href="#"><?php echo $nama_paket; ?></a></h3>
              <address><i class="fa fa-tags"></i> <?php echo "Rp. ". number_format($harga_paket, 0, ".", ".");?></address>
            </div>
          </div> 
        </div>
      <?php } ?>
    </div>
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