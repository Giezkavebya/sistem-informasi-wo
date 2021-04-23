<?php
include "koneksi.php";
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Caricacan and Team Wedding Organizer</title>
  <link rel="icon" href="images/logocari.jpg" type="image/png">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href="https://fonts.googleapis.com/css?family=Nanum+Gothic:400,700,800" rel="stylesheet">
  <link href='https://fonts.googleapis.com/css?family=Sofia' rel='stylesheet'>
  <link href='https://fonts.googleapis.com/css?family=Josefin Sans' rel='stylesheet'>
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
                <h1 style="font-family: 'Sofia';" >Wedding Packages</h1>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>  

    <?php
    $sql="select * from paket where id_paket='$_GET[id]'";
    $query=mysql_query($sql);
    $rows=mysql_fetch_array($query);
    $id_paket=$rows['id_paket'];
    $nama_paket = $rows['nama_paket'];
    $harga_paket = $rows['harga_paket'];
    $jumlah_hari = $rows['jumlah_hari'];
    $jumlah_acara = $rows['jumlah_acara'];
    $jumlah_tamu = $rows['jumlah_tamu'];
    $jumlah_team= $rows['jumlah_team'];
    $foto_paket= $rows['foto_paket'];
    $catatan_tambahan= $rows['catatan_tambahan'];
    ?>

      <div class="site-section">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-5">
              <div class="mb-4" style="margin-top: -150px; margin-left: 50px;">
                <div>
                  <div><img src="Admin/images/fotopaket/<?php echo $foto_paket;?>" alt="Image" class="img-fluid rounded"  style="width: 800px; height: 300px;"></div>
                </div>
              </div>
            </div>
            <div class="col-lg-6 ml-auto" style="margin-top: -58px; margin-right: 50px;">
             <div class="card border-secondary mb-3" style="max-width: 100rem; opacity: 0.5; ">
              <div class="card border-light mb-3" style="text-align: center; color: black; font-weight:bold; font-family: 'Josefin Sans';font-size: 22px;">Paket <?php echo $nama_paket;?></div>
              <div class="card-body" style="margin-top: -20px;">
               <div class="row">
                <div class="col-sm-3">
                  <p><li class="fa fa-tags"></li>Harga</p>
                  <p style="font-size: 16px; color: #000000; margin-top: -18px; font-weight: bold;">IDR <?php echo $harga_paket;?></p>
                </div>
                <div class="col-sm-9" style="margin-top: 18px;">
                  <table style="width:100%">
                    <tr>
                      <td><li class="fa fa-users" style="color: #F08080;"></li> Guests</td>
                      <td>: <?php echo $jumlah_tamu;?> Orang</td>
                      <td><li class="fa fa-calendar" style="color: #F08080;"></li> Hari</td>
                      <td>: <?php echo $jumlah_hari;?> Hari</td>
                    </tr>
                    <tr>
                      <td><li class="fa fa-user" style="color: #F08080;"></li> Team</td>
                      <td>: Max <?php echo $jumlah_team;?> Orang </td>
                      <td><li class="fa fa-heart" style="color: #F08080;"></li> Handling Acara</td>
                      <td>: <?php echo $jumlah_acara;?> Acara</td>
                    </tr>
                  </table>
                </div>
              </div>
            </div>
            <center><a class="btn btn-danger" href="aksi_pemesanan_paket.php?id=<?php echo $id_paket;?>">Pesan Paket</a></center>
          </div>
        </div>
        <div class="col-16" style="margin-left: 150px;">
          <div class="card" style="width: 60rem;">
            <div class="card-body">
              <div class="card-header">
                <h3 class="card-title"  style="font-family: 'Josefin Sans'; height: 12px;">Paket ini termasuk :</h3>
              </div>
              <!-- AWAL PERLENGKAPAN PAKET -->
              <table id="example1" style="margin-left: 30px; font-size: 18px; margin-top: 15px;">
                <tbody>
                  <?php 
                  $sql = mysql_query("SELECT perlengkapan_paket.id_perlengkapan, perlengkapan_paket.jumlah, perlengkapan.nama_perlengkapan, perlengkapan_paket.id_perlengkapanpaket FROM perlengkapan_paket INNER JOIN perlengkapan ON perlengkapan_paket.id_perlengkapan=perlengkapan.id_perlengkapan JOIN paket ON perlengkapan_paket.id_paket=paket.id_paket WHERE paket.id_paket='$_GET[id]'")or die(mysql_error());
                  while ($isi= mysql_fetch_array($sql)){
                    ?>
                    <tr align="center" valign="top"> 
                      <td><li class="fa fa-heart" style="color: #F08080;"></li></td>
                      <td><p><?php echo $isi['jumlah'];?></p></td><span class="help-block"></span>
                      <td><p><?php echo $isi['nama_perlengkapan'];?></p></td><span class="help-block"></span>                              
                    </tr>
                  <?php }; ?>
                </tbody>
              </table>
              <!-- AKHIR PERLENGKAPAN PAKET-->     
            </div>
          </div>
          <div class="card" style="width: 60rem;">
            <div class="card-body">
              <!-- AWAL LAYANAN PAKET -->
              <table id="example2" style="margin-left: 30px; font-size: 18px; margin-top: 15px;">
                <tbody>
                  <?php 
                  $sql = mysql_query("SELECT detail_layananpaket.id_layanan, detail_layananpaket.isi_detlayanan, layanan.nama_layanan,detail_layananpaket.id_detlayananpaket FROM detail_layananpaket INNER JOIN layanan ON detail_layananpaket.id_layanan=layanan.id_layanan JOIN paket ON detail_layananpaket.id_paket=paket.id_paket WHERE paket.id_paket='$_GET[id]'")or die(mysql_error());
                  while ($isi= mysql_fetch_array($sql)){
                    ?>
                    <tr align="center" valign="top"> 
                     <td><li class="fa fa-heart" style="color: #F08080;"></li></td>
                     <td><p><?php echo $isi['nama_layanan'];?></p></td><span class="help-block"></span>
                     <td><p><?php echo $isi['isi_detlayanan'];?></p></td><span class="help-block"></span>                              
                   </tr>
                 <?php }; ?>
               </tbody>
             </table>
             <!-- AKHIR LAYANAN PAKET-->     
           </div>
         </div>
         <div class="border p-3 rounded mb-2">
          <a data-toggle="collapse" href="#collapse-4" role="button" aria-expanded="false" aria-controls="collapse-4" class="accordion-item h5 d-block mb-0" style="margin-left: 20px;"><i class="fa fa-sort" style="color: #f06595;"></i> Packages Notes</a>
          <div class="collapse" id="collapse-4">
            <div class="pt-4">
              <div class="card">
              <p class="card-text"> <?php echo $catatan_tambahan; ?></p>
            </div>
            </div>
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