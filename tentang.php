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
		
		<div class="site-blocks-cover overlay" style="background-image: url(images/tentang.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
			<div class="container">
				<div class="row align-items-center justify-content-center text-center">

					<div class="col-md-12">
						<div class="row justify-content-center mb-4">
							<div class="col-md-10 text-center">
								<h1 class="" style="font-family: 'Sofia';" data-aos="fade-up">Tentang Kami</h1>
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
			$profil			= $isi['profil'];
			$alamat			= $isi['alamat'];
			$no_telp		= $isi['no_telp'];
			$email			= $isi['email'];
			$gambar_tentang = $isi['gambar_tentang'];
			?>
			<div class="container">
				<div class="row align-items-center">
					<div class="col-md-6 ml-auto">
						<h2 class="text-primary mb-3" style="font-family: 'Sofia';" >Why Caricacan and Team</h2>
						<p><?php echo $intro; ?></p>
					</div>
					<div class="col-md-6" style="margin-top: -250px;">
						<img src="Admin/images/tentang/<?php echo $gambar_tentang; ?>" alt="Image" class="img-fluid rounded">
					</div>
					<div class="col-md-6 ml-auto">
						<h2 class="text-primary mb-3" style="font-family: 'Sofia';" >Why Caricacan and Team</h2>
						<p><?php echo $profil; ?></p>
					</div>
				</div>
			</div>
		</div>

		<div class="site-section" data-aos="fade">
			<div class="container">
				<div class="row justify-content-center mb-5">
					<div class="col-md-7 text-center border-primary">
						<h2 class="font-weight-light text-primary" style="font-family: 'Sofia';">Kontak</h2>
					</div>
				</div>
				<div class="row">
					<div class="col-md-7 mb-5"  data-aos="fade">
						<div class="mapouter">
							<div class="gmap_canvas" style="width: 60%; height: 82%;">
								<iframe width="1080" height="378" id="gmap_canvas" src="https://maps.google.com/maps?q=caricacan&t=&z=17&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
							</div>
							<style>.mapouter{
								position:relative;
								text-align:right;
								height:378px;
								width:1080px;
							}
							.gmap_canvas {
								overflow:hidden;
								background:none!important;
								height:378px;
								width:1080px;
							}
						</style>
					</div>
				</div>
				<style>
				.p-4
				{
					background : #F4E5E5;
					opacity: 0.8;
				}
			</style>
			<div class="col-md-5"  data-aos="fade" data-aos-delay="100" style="margin-top: -2px;">
				<div class="p-4 mb-3">
					<p class="mb-0 font-weight-bold">Alamat</p>
					<p class="mb-4"><i class="fa fa-map-marker" style="color: #f06595;"></i> <?php echo $alamat; ?></p>

					<p class="mb-0 font-weight-bold">Nomor Telepon</p>
					<p class="mb-4"><a href="#"><i class="fa fa-phone" style="color: #f06595;"></i> <?php echo $no_telp; ?></a></p>

					<p class="mb-0 font-weight-bold">Email</p>
					<p class="mb-0"><a href="#"><i class="fa fa-envelope" style="color: #f06595;"></i> <?php echo $email; ?></a></p>

					<center><p class="mb-0 font-weight-bold">Find Us On</p>
						<p class="mb-0"><a class="fa fa-instagram fa-lg" href="" style="color: #f06595;" title="Instagram"></a> <a class="fa fa-facebook fa-lg" href="" style="color: #f06595;" title="Facebook"></a></p></center>
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
								<img src="images/like.png" alt="Image" class="img-fluid mb-3" style="">
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
	</div>

	<!--================Header Menu Area =================-->  
	<?php 
	include'footer.php';
	?>
	<!--================Header Menu Area =================-->

</div>

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