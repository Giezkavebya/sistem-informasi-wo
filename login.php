<!DOCTYPE html>
<html lang="en">
<head>
  <title>Caricacan and Team Wedding Organizer</title>
  <link rel="icon" href="images/logocari.png" type="image/png">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- MATERIAL DESIGN ICONIC FONT -->
  <link rel="stylesheet" href="regislogin/fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">

  <!-- STYLE CSS -->
  <link rel="stylesheet" href="regislogin/css/style.css">

  <link href="https://fonts.googleapis.com/css?family=Nanum+Gothic:400,700,800" rel="stylesheet">
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
  <link href='https://fonts.googleapis.com/css?family=Sofia' rel='stylesheet'>

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
    <br></br>
    <br></br>

    <div class="wrapper">
      <div class="inner">
        <div class="image-holder">
          <img src="regislogin/images/back.jpg" alt="">
        </div>
        <form action="proses_login.php" method="POST">
          <h3>Login</h3>
          <div class="form-wrapper">
            <input type="text" placeholder="Username" name="username" class="form-control">
          </div>
          <div class="form-wrapper">
            <input type="password" placeholder="Password" name="pass" class="form-control" id="myInput">
          </div>
          <div class="form-wrapper">
            <p><input type="checkbox" onclick="myFunction()">      Lihat Password</p>
          </div>
          <div class="form-wrapper">
           <p>Belum Memiliki Akun? <a href="register.php">Registrasi Akun</a></p>
         </div>
         <button type="submit">Log in
          <i class="zmdi zmdi-arrow-right"></i>
        </button>
      </form>
    </div>
  </div>
</div>


<!--================Header Menu Area =================-->  
<?php 
include'footer.php';
?>
<!--================Header Menu Area =================-->
</div>
<script type="text/javascript">
  function myFunction() {
  var x = document.getElementById("myInput");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>

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