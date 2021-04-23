  <?php
  include "../koneksi.php";
  session_start();
  if( ! isset($_SESSION['username'])){ 
  	header("location: login.php"); 
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
  	<link href='https://fonts.googleapis.com/css?family=Josefin Sans' rel='stylesheet'>
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
  	<script language="JavaScript"><!--
  		javascript:window.history.forward(1);
  		//--></script>
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
  			?>

  			<style>
  			.circle {
  				width: 200px;
  				height: 200px;
  				border-radius: 50%;
  				background: #FAEBD7;
  			}
  		</style>
  		<style>
  		.container1 {
  			position: relative;
  			width: 100%;
  			max-width: 400px;
  		}

  		.container1 img {
  			width: 100%;
  			height: auto;
  		}

  		.container1 .btn {
  			position: absolute;
  			top: 85%;
  			left: 50%;
  			transform: translate(-50%, -50%);
  			-ms-transform: translate(-50%, -50%);
  			background-color: #555;
  			color: white;
  			font-size: 16px;
  			padding: 12px 24px;
  			border: none;
  			cursor: pointer;
  			border-radius: 5px;
  			text-align: center;
  		}

  		.container1 .btn:hover {
  			background-color: black;
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
                        $sql=mysql_query("SELECT * from alur_pemesanan WHERE id_alur='5'");
                        $row=mysql_fetch_array($sql);
                        ?>
                        <h5 class="card-title"><?php echo $row['judul_alur'];?></h5>
                        <p style="font-size: 10px;"><?php echo $row['isi_alur'];?></p>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <img src="../images/ilustrasi3.jpg" style="width: 500px; height: 500px;" class="card-img" alt="...">
                    </div>
                  </div>
                </div>
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
                      <img src="../images/ilustrasi6.png" style="width: 500px; height: 500px; margin-right: 100px;" class="card-img" alt="...">
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
  	<div class="site-section">
      <div style="margin-left: 1100px;">
                <a>Informasi Pemesanan</a>
                <button type="button" class="btn btn-outline-dark" data-toggle="modal" data-target="#Datainfo"><i class="fa fa-info" data-toggle="tooltip" data-placement="top" title="Info Paket dan Pemesanan"></i>
                </button>
              </div>
  		<div class="container-fluid">
  			<div class="row">
  				<div class="col-lg-5">
  					<div class="mb-4" style="margin-top: -220px; margin-left: 300px;">

  						<div class="card border-secondary mb-3" style="width:700px; height: 350px; opacity: 0.8px;">
  							<div class="card border-light mb-3" style="text-align: center; color: black; font-weight:bold; font-family: 'Josefin Sans';font-size: 22px;">Paket <?php echo $nama_paket;?></div>
  							<div class="col-sm-14">
  								<table style="width:100%;">
  									<tr>
  										<td>
  											<div class="container1">
  												<img src="../Admin/images/fotopaket/<?php echo $foto_paket;?>" alt="Image" class="img-fluid rounded"  style="width: 500px; height: 250px; margin-left: 15px;">
  												<form  action="file-aksi/aksi_tambah_pemesanan.php" method="POST" id="form-tambah-pemesanan">
  													<input type="hidden" id="harga_paket" name="harga_paket" required="required" placeholder="" class="form-control" value="<?php echo $harga_paket ?>">
  													<input type="hidden" id="id_paket" name="id_paket" required="required" placeholder="" class="form-control" value="<?php echo $id_paket ?>">
  													<input type="hidden" id="id_pemesanan" name="id_pemesanan" required="required" placeholder="" class="form-control" value="">
  													<?php
  													$sql=mysql_query("SELECT * from pelanggan where id_pelanggan='$_SESSION[id_pelanggan]'");
  													$isi=mysql_fetch_array($sql);
  													?>
  													<input type="hidden" id="id_pelanggan" name="id_pelanggan" placeholder="" class="" value="<?php echo $isi['id_pelanggan'];?>">
  													<center><button class="btn" type="submit" name="tambah">Pesan Paket</button></center>
  												</form>
  											</div>
  										</td>
  										<td><div class="circle"><img src="../images/indonesian-rupiah.png" alt="Image" style="width: 100px; height: 100px; margin-top:10px;">
  											<p style="font-size: 19px; color: #000000; margin-top: 10px; margin-left:35px; font-weight: bold;"><?php echo "Rp. ". number_format($harga_paket, 0, ".", ".");?> </p></div></td>
  										</tr>
  									</table>
  								</div>
  							</div>
  						</div>
  					</div>
  					<div class="col-lg-10 ml-auto" style="margin-top: 10px; margin-right: 100px;">
  						<div class="overlap-category mb-5">
  							<div class="row align-items-stretch no-gutters">
  								<div class="col-sm-6 col-md-4 mb-4 mb-lg-0 col-lg-3">
  									<a href="#" class="popular-category h-100">
  										<span class="icon"><span><img src="../images/love-letter.png" alt="Image" class="img-fluid rounded"  style="width: 55px; height: 55px;"></span></span>
  										<span class="caption mb-2 d-block">Tamu</span>
  										<span class="number mb-2"><?php echo $jumlah_tamu;?> Orang</span>
  										<span class="caption mb-2 d-block">Kapasitas maksimal tamu undangan acara pernikahan</span>
  									</a>
  								</div>
  								<div class="col-sm-6 col-md-4 mb-4 mb-lg-0 col-lg-3">
  									<a href="#" class="popular-category h-100">
  										<span class="icon"><span><img src="../images/wedding-day.png" alt="Image" class="img-fluid rounded"  style="width: 55px; height: 55px;"></span></span>
  										<span class="caption mb-2 d-block">Hari</span>
  										<span class="number mb-2"><?php echo $jumlah_hari;?> Hari</span>
  										<span class="caption mb-2 d-block">Jumlah hari/tanggal pelaksanaan acara (Dalam 1 hari dapat memuat beberapa acara)</span>
  									</a>
  								</div>

  								<div class="col-sm-6 col-md-4 mb-4 mb-lg-0 col-lg-3">
  									<a href="#" class="popular-category h-100">
  										<span class="icon"><span><img src="../images/bow-tie.png" alt="Image" class="img-fluid rounded"  style="width: 55px; height: 55px;"></span></span></span>
  										<span class="caption mb-2 d-block">Team</span>
  										<span class="number mb-2">Max <?php echo $jumlah_team;?> Orang</span>
  										<span class="caption mb-2 d-block">Jumlah maksimal team yang akan bertugas pada acara</span>
  									</a>
  								</div>
  								<div class="col-sm-6 col-md-4 mb-4 mb-lg-0 col-lg-3">
  									<a href="#" class="popular-category h-100">
  										<span class="icon"><span><img src="../images/wedding-arch.png" alt="Image" class="img-fluid rounded"  style="width: 55px; height: 55px;"></span></span>
  										<span class="caption mb-2 d-block">Jumlah Acara</span>
  										<span class="number mb-2"><?php echo $jumlah_acara;?> Acara</span>
  										<span class="caption mb-2 d-block">Jumlah acara yang dilaksanakan (Misalkan resepsi, adat, dan acara lainnya)</span>
  									</a>
  								</div>
  							</div>
  						</div>
  					</div>
  					<div class="col-16" style="margin-left: 150px;">
  						<div class="card" style="width: 60rem;">
  							<div class="card-body">
  								<div class="card-header">
  									<h3 class="card-title"  style="font-family: 'Josefin Sans'; height: 12px;">Paket ini termasuk :</h3>
  								</div>
  								<!-- AWAL PERLENGKAPAN PAKET -->
  								<table id="example1" style="margin-left: 30px; font-size: 18px; margin-top: 15px;" cellpadding="6">
  									<tbody>
  										<?php 
  										$sql = mysql_query("SELECT perlengkapan_paket.id_perlengkapan, perlengkapan_paket.jumlah, perlengkapan.nama_perlengkapan, perlengkapan_paket.id_perlengkapanpaket FROM perlengkapan_paket INNER JOIN perlengkapan ON perlengkapan_paket.id_perlengkapan=perlengkapan.id_perlengkapan JOIN paket ON perlengkapan_paket.id_paket=paket.id_paket WHERE paket.id_paket='$_GET[id]'")or die(mysql_error());
  										while ($isi= mysql_fetch_array($sql)){
  											?>
  											<tr align="" valign="top"> 
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
  								<table id="example2" style="margin-left: 30px; font-size: 18px; margin-top: 15px;" cellpadding="6">
  									<tbody>
  										<?php 
  										$sql = mysql_query("SELECT detail_layananpaket.id_layanan, detail_layananpaket.isi_detlayanan, layanan.nama_layanan,detail_layananpaket.id_detlayananpaket FROM detail_layananpaket INNER JOIN layanan ON detail_layananpaket.id_layanan=layanan.id_layanan JOIN paket ON detail_layananpaket.id_paket=paket.id_paket WHERE paket.id_paket='$_GET[id]'")or die(mysql_error());
  										while ($isi= mysql_fetch_array($sql)){
  											?>
  											<tr align="" valign="top"> 
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
      <script>
        $('#Datainfo').on('hidden', function () {
          var status = $("input[name=dismiss]", this).is(":checked");
          $.cookie('modal_dismiss', status, {
            expires: 7,
            path: '/'
          });
        </script>
        <script>
          $('#Datainfo').modal('show');
        </script>
      </body>
      </html>