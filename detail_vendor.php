<?php
include "koneksi.php";
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Caricacan and Team Wedding Organizer</title>
  <link rel="icon" href="images/logocari.png" type="image/png">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href="https://fonts.googleapis.com/css?family=Nanum+Gothic:400,700,800" rel="stylesheet">
  <link href='https://fonts.googleapis.com/css?family=Sofia' rel='stylesheet'>
  <link rel="stylesheet" href="fonts/icomoon/style.css">

  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/magnific-popup.css">
  <link rel="stylesheet" href="css/jquery-ui.css">
  <link rel="stylesheet" href="css/owl.carousel.min.css">
  <link rel="stylesheet" href="css/owl.theme.default.min.css">

  <link rel="stylesheet" href="css/bootstrap-datepicker.css">

  <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">

  <link rel="stylesheet" href="css/aos.css">
  <link rel="stylesheet" href="css/rangeslider.css">

  <link rel="stylesheet" href="css/style.css">
  
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
    include'header.php';
    ?>
    <!--================Header Menu Area =================-->
    
    <div class="site-blocks-cover inner-page-cover overlay" style="background-image: url(images/paket.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row align-items-center justify-content-center text-center">
          <div class="col-md-10" data-aos="fade-up" data-aos-delay="400">
            <div class="row justify-content-center mt-5">
              <div class="col-md-8 text-center">
                <h1 style="font-family: 'Sofia';" >Vendor</h1>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>  

    <?php
    $sql="SELECT * FROM detail_vendor INNER JOIN layanan ON detail_vendor.id_layanan=layanan.id_layanan JOIN vendor ON detail_vendor.id_vendor=vendor.id_vendor where id_detailvendor='$_GET[id]'";
    $query=mysql_query($sql);
    $rows=mysql_fetch_array($query);
    $id_detailvendor = $rows ['id_detailvendor'];
    $nama_vendor = $rows ['nama_vendor'];
    $foto_vendor= $rows ['foto_vendor'];
    $tentang_vendor =$rows['tentang_vendor'];
    $insta_vendor=$rows['insta_vendor'];
    $nama_layanan = $rows ['nama_layanan'];
    ?>

    <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-lg-6">
            <div class="col-14">
              <div class="border p-3 rounded mb-2">
                <a data-toggle="collapse" href="#collapse-1" role="button" aria-expanded="false" aria-controls="collapse-1" class="accordion-item h5 d-block mb-0" style="font-family: 'Sofia';"><i class="fa fa-heart" style="color: #f06595;"></i> Tentang <?php echo $nama_vendor;?></a>
                <div class="collapse" id="collapse-1">
                  <div class="pt-2">
                    <p class="mb-0"><?php echo $tentang_vendor;?></p>
                  </div>
                </div>
              </div>
            </div>

          </div>
          <style>
          .p-4
          {
            background : #F4E5E5;
            opacity: 0.8;
          }
        </style>
        <div class="col-lg-6 ml-auto">
          <div class="mb-4" style="margin-top: -150px;">
            <div>
              <div><img src="Admin/images/vendor/<?php echo $foto_vendor;?>" alt="Image" class="img-fluid rounded"  style="width: 900px; height: 350px;"></div>
            </div>
          </div>
          <div class="p-4 mb-3">
            <h3 class="mb-0 font-weight-bold" style="font-family: 'Sofia'; text-align: center;"><?php echo $nama_vendor; ?></h3>
          </div>
          <style>
          /* Opacity #1 */
          .hover11 figure img {
            opacity: 1;
            -webkit-transition: .3s ease-in-out;
            transition: .3s ease-in-out;
          }
          .hover11 figure:hover img {
            opacity: .5;
          }
        </style>
        <div class="mb-3">
          <p class="mb-0 font-weight-bold" style="font-family: 'Sofia'; text-align: center; font-size: 20px;">Find Us On </p>
          <div class="hover11">
            <center><figure><a href="<?php echo $insta_vendor;?>"><img src="images/insta.png" style="width: 10%; height: 10%" title="Instagram"/></a></figure></center>
          </div>
        </div> 
      </div>
    </div>
  </div>
</div>



<!--================Header Menu Area =================-->  
<?php 
include'footer.php';
?>



<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/jquery-migrate-3.0.1.min.js"></script>
<script src="js/jquery-ui.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/jquery.stellar.min.js"></script>
<script src="js/jquery.countdown.min.js"></script>
<script src="js/jquery.magnific-popup.min.js"></script>
<script src="js/bootstrap-datepicker.min.js"></script>
<script src="js/aos.js"></script>
<script src="js/rangeslider.min.js"></script>
<script src="js/main.js"></script>

</body>
</html>