<?php
include "../koneksi.php";
error_reporting(0);
?>
<!DOCTYPE html>
<html>

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="keywords" content="footer, address, phone, icons" />

  <title></title>


  <link rel="stylesheet" href="../cssfooter/footer-distributed-with-address-and-phones.css">
  
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">

  <link href="http://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css">
</head>
    <!-- The content of your page would go here. -->

<footer class="footer-distributed" style="opacity: 0.7;">
  <div class="footer-center">
   <?php
     $sql=mysql_query("SELECT * from tentang");
     $isi=mysql_fetch_array($sql);
     $alamat = $isi['alamat'];
     $no_telp= $isi['no_telp'];
     $email= $isi['email'];
    ?>
    <div>
      <i class="fa fa-map-marker"></i>
      <p><span><?php echo $alamat; ?></span></p>
    </div>
    <div>
      <i class="fa fa-phone"></i>
      <p><span><?php echo $no_telp; ?></span></p>
    </div>
    <div>
      <i class="fa fa-envelope"></i>
      <p><span><?php echo $email; ?></span></p>
    </div>
 </div>

 <div class="footer-left">
   <h3 style="text-align:left;font-size: 60px;" >Caricacan and Team<span> Wedding Organizer</span></h3>
 </div>

 <div class="footer-right">
    <p class="footer-company-about">
       <span>Follow Us</span>
    </p>
    <div class="footer-icons">
        <a href="#"><i class="fa fa-facebook" title="Facebook"></i></a>
        <a href="https://www.instagram.com/caricacanandteam/?hl=en"><i class="fa fa-instagram" title="Instagram"></i></a>
    </div>
 </div>
  <br></br>
  <center>
  <p>Copyright &copy; <script>document.write(new Date().getFullYear());</script>   
      All rights reserved | Website by Giezka Veby Agustin
  </center>
  </p>
</footer>
