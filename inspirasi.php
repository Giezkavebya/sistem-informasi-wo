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
    
    <div class="site-blocks-cover inner-page-cover overlay" style="background-image: url(images/gambarinspi.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row align-items-center justify-content-center text-center">
          <div class="col-md-10" data-aos="fade-up" data-aos-delay="400">
            <div class="row justify-content-center mt-5">
              <div class="col-md-8 text-center">
                <h1 style="font-family: 'Sofia';" >Inspirasi</h1>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>  

    <div class="site-section">
      <div class="row justify-content-center mb-5">
        <div class="col-md-12 text-center border-primary">
          <h2 class="font-weight-light text-primary" style="font-family: 'Sofia';">Galeri Inspirasi</h2>
        </div>
      </div>
      <div class="container">

        <table border=0>
          <tr>
            <?php
            $kolom = 3;
            $i = 0;
            $sql = mysql_query("SELECT * FROM inspirasi where id_inspirasi");
            while($data = mysql_fetch_array($sql)){
             $id_inspirasi = $data ['id_inspirasi'];
             $judul_inspirasi= $data ['judul_inspirasi'];
             $foto_inspirasi= $data ['foto_inspirasi'];
             $ket_inspirasi= $data ['ket_inspirasi'];
             if ($i >= $kolom) {
              echo "<tr></tr>";
              $i = 0;
            }
            $i++;
            ?>

            <style type="text/css">
            td
            {
              padding:0 15px 0 15px;
            }
          </style>
          <td> <div class="row">
            <div class="col-lg-12">
              <div class="row mb-3 align-items-stretch">
                <div class="col-md-12 col-lg-12 mb-8 mb-lg-8">
                  <div class="h-entry">
                   <center><h2 style="font-family: 'Sofia';"><?php echo $judul_inspirasi; ?></h2></center>
                   <a tab-index="0" href="javascript:void(0);" class="hover" 
                   id="<?php echo $id_inspirasi; ?>" rel="popover" data-placement=""
                   data-original-title="" data-content=""><img src="Admin/images/inspirasi/<?php echo $foto_inspirasi;?>" alt="Image" class="img-fluid rounded"  style="width: 800px; height: 200px;"></a>

                 </div>
               </div>
             </div>
           </div>

         </div></td>
         <?php
       }
       ?>
     </tr>
   </table>

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
<script>
  /*popover bootstrap*/

  $(document).ready(function () {
    $(document).on('click', '.hover', function (e) {
      e.preventDefault();
      $(this).popover({
        title: "Inspirasi",
        html: true,
        placement: 'right',
        trigger: 'focus',
        content: function () {
          var fetch_data = '';
          var element = $(this);
          var id = element.prop("id");
          $.ajax({
            url: "detail_inspirasi.php",
            method: "POST",
            async: false,
            data: { id: id },
            success: function (data) {
              fetch_data = data;
            },
            error: function (xhr, ajaxOptions, thrownError) {
              alert(thrownError);
            }
          });
          return fetch_data;
        }

      });
      $(this).popover('show');
    });

  });

</script>