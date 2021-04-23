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
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

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

		<div class="site-blocks-cover inner-page-cover overlay" style="background-image: url(../images/dress.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
			<div class="container">
				<div class="row align-items-center justify-content-center text-center">
					<div class="col-md-10" data-aos="fade-up" data-aos-delay="400">
						<br> <br> <br> <br> <br> <br>
						<div class="row justify-content-center mt-5">
							<div class="col-md-8 text-center">
								<h1 style="font-family: 'Sofia';" >Vendor</h1>
							</div>
						</div>
						<br> <br> <br> <br> 
						<div class="form-search-wrap mb-2" style="width: 600px; margin-left: 176px;" data-aos="fade-up" data-aos-delay="200">
							<form method="POST">
								<div class="row align-items-center">
									<div class="col-lg-12 mb-4 mb-xl-0 col-xl-7">
										<div class="select-wrap">
											<span class="icon"><span class="icon-keyboard_arrow_down"></span></span>
											<?php 
											$kategori="";
											if (isset($_POST['search'])) {
												$kategori = $_POST['kategori'];
											}
											?>
											<select class="form-control" id="kategori" name="kategori">
												<option value="" <?php if ($kategori=='Pilih Kategori'){ echo "selected"; } ?>>Pilih Kategori</option>
												<?php 
												$sql = mysql_query("SELECT * FROM layanan where id_layanan");
												while ($data= mysql_fetch_array($sql)){
													$id_layanan = $data['id_layanan'];
													$nama_layanan = $data ['nama_layanan'];
													?>
													<option value="<?php echo $id_layanan;?>" <?php if ($kategori==$id_layanan){ echo "selected"; } ?>> <?php echo $nama_layanan;?></option>
												<?php }; ?>
											</select> 
										</div>
									</div>
									<div class="col-lg-12 col-xl-5 ml-auto text-right">
										<input type="submit" class="btn btn-primary btn-block rounded" value="Search" name="search" href="vendor.php">
									</div>
								</div>
							</form>
						</div>

					</div>
				</div>
			</div>
		</div>  

		<div class="site-section">
			<div class="row justify-content-center mb-5">
				<div class="col-md-4 text-center border-primary">
					<a style="font-family: 'Sofia';" class="btn btn-secondary btn-block rounded" href="vendor.php">Lihat Semua Vendor</a>
				</div>
			</div>
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<!--================ Dengan Value Semua Kategori =================-->
						<!--================ Dengan Value Kategori =================-->  
						<div class="row">
							<?php  
							if (isset($_POST['search'])) {
								$kategori = $_POST['kategori'];  
								$sql="SELECT * FROM vendor JOIN detail_vendor ON vendor.id_vendor=detail_vendor.id_vendor JOIN layanan ON detail_vendor.id_layanan=layanan.id_layanan WHERE layanan.id_layanan=$kategori"; 
								$result = mysql_query($sql);  
								} else { 
								$sql="SELECT * FROM vendor JOIN detail_vendor ON vendor.id_vendor=detail_vendor.id_vendor JOIN layanan ON detail_vendor.id_layanan=layanan.id_layanan"; 
								$result = mysql_query($sql);
								} 
									echo '<p></p>';  
									while ($rows = mysql_fetch_array($result)) {  
										$id_detailvendor = $rows ['id_detailvendor'];
										$nama_vendor = $rows ['nama_vendor'];
										$foto_vendor= $rows ['foto_vendor'];
										$nama_layanan = $rows ['nama_layanan'];
										?> 
										<style>
										.col-lg-3 {
											margin-left: 0.5cm;
											margin-right: 2cm;
										} 
									</style>
									<div class="col-lg-3">
										<div class="row mb-5 d-block d-md-flex listing vertical">
											<a href="detail_vendor.php?id=<?php echo $id_detailvendor;?>" class="img d-block" style=""><img src="../Admin/images/vendor/<?php echo $foto_vendor;?>" alt="Image" class="img-fluid rounded"  style="width: 400px; height: 210px;"></a>
											<div class="lh-content">
												<span class="category"><img src="images/diamond.png"style="width: 8%; height: 8%;" /> <?php echo $nama_layanan;?></span>
												<a href="detail_vendor.php?id=<?php echo $id_detailvendor;?>" class="bookmark" title="Lihat Detail"><span class="icon-heart"></span></a>
												<center><h3><a href="#"><?php echo $nama_vendor; ?></a></h3></center>
											</div>
										</div> 
									</div>
						
						<?php }  ?>
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
	<script src="../js/app.js"></script>

</body>
</html>