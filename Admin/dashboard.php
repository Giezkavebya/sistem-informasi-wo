<?php
include "koneksi.php";
error_reporting(0);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Dashboard</title>
	<link rel="icon" href="../images/logocari.png" type="image/png">
	<!-- Tell the browser to be responsive to screen width -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="plugins/font-awesome/css/font-awesome.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="dist/css/adminlte.min.css">
	<!-- iCheck -->
	<link rel="stylesheet" href="plugins/iCheck/flat/blue.css">
	<!-- Morris chart -->
	<link rel="stylesheet" href="plugins/morris/morris.css">
	<!-- jvectormap -->
	<link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">
	<!-- Date Picker -->
	<link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
	<!-- Daterange picker -->
	<link rel="stylesheet" href="plugins/daterangepicker/daterangepicker-bs3.css">
	<!-- bootstrap wysihtml5 - text editor -->
	<link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
	<!-- Google Font: Source Sans Pro -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
	<div class="wrapper">

		<!-- Sidebar-->
		<?php 
		include'sidebar.php';
		?>

		<!-- Konten/Isi halaman-->

		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<div class="content-header">
				<div class="container-fluid">
					<div class="row mb-2">
						<div class="col-sm-6">
							<h1 class="m-0 text-dark">Dashboard</h1>
						</div><!-- /.col -->
					</div><!-- /.row -->
				</div><!-- /.container-fluid -->
			</div>
			<!-- /.content-header -->
			<section class="content">
				<div class="container-fluid">
					<!-- Info boxes -->
					<div class="row">
						<div class="col-12 col-sm-6 col-md-3">
							<?php
							$sql=mysql_query("SELECT COUNT(id_pelanggan) AS jumlah_pelanggan FROM pelanggan");
							$isi=mysql_fetch_array($sql);
							$jumlah_pelanggan= $isi['jumlah_pelanggan'];
							?>
							<div class="info-box mb-3">
								<span class="info-box-icon bg-danger elevation-1"><a class="fa fa-user" href="lihat_pelanggan.php"></a></span>
								<div class="info-box-content">
									<span class="info-box-text">Jumlah Pelanggan</span>
									<span class="info-box-number"><?php echo $jumlah_pelanggan; ?></span>
								</div>
								<!-- /.info-box-content -->
							</div>
							<!-- /.info-box -->
						</div>
						<div class="col-12 col-sm-6 col-md-3">
							<?php
							$sql=mysql_query("SELECT COUNT(id_vendor) AS jumlah_vendor FROM vendor");
							$isi1=mysql_fetch_array($sql);
							$jumlah_vendor= $isi1['jumlah_vendor'];
							?>
							<div class="info-box">
								<span class="info-box-icon bg-info elevation-1"><i class="fa fa-users"></i></span>
								<div class="info-box-content">
									<span class="info-box-text">Jumlah Vendor</span>
									<span class="info-box-number">
										<?php echo $jumlah_vendor; ?>
									</span>
								</div>
								<!-- /.info-box-content -->
							</div>
							<!-- /.info-box -->
						</div>
						<!-- /.col -->

						<!-- /.col -->

						<!-- fix for small devices only -->
						<div class="clearfix hidden-md-up"></div>
						<div class="col-12 col-sm-6 col-md-3">
							<?php
							$sql=mysql_query("SELECT COUNT(id_pemesanan) AS pemesanan_belum FROM pemesanan WHERE validasi_pemesanan='Tidak'");
							$isi2=mysql_fetch_array($sql);
							$pemesanan_belum= $isi2['pemesanan_belum'];
							?>
							<div class="info-box mb-3">
								<span class="info-box-icon bg-warning elevation-1"><i class="fa fa-close"></i></span>
								<div class="info-box-content">
									<span class="info-box-text">Pemesanan Belum Valid</span>
									<span class="info-box-number"><?php echo $isi2['pemesanan_belum']; ?></span>
								</div>
								<!-- /.info-box-content -->
							</div>
							<!-- /.info-box -->
						</div>
						<!-- /.col -->
						<div class="col-12 col-sm-6 col-md-3">
							<?php
							$sql=mysql_query("SELECT COUNT(id_pemesanan) AS pemesanan_sudah FROM pemesanan WHERE validasi_pemesanan='Ya'");
							$isi3=mysql_fetch_array($sql);
							$pemesanan_belum= $isi3['pemesanan_sudah'];
							?>
							<div class="info-box mb-3">
								<span class="info-box-icon bg-success elevation-1"><i class="fa fa-check"></i></span>
								<div class="info-box-content">
									<span class="info-box-text">Pemesanan Sudah Valid </span>
									<span class="info-box-number"><?php echo $isi3['pemesanan_sudah']; ?></span>
								</div>
								<!-- /.info-box-content -->
							</div>
							<!-- /.info-box -->
						</div>
						<!-- /.col -->
					</section>
					<section class="content">
						<center><div class="bd-example" style="width: 600px;">
							<div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
								<ol class="carousel-indicators">
									<li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
									<li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
									<li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
								</ol>
								<div class="carousel-inner">
									<div class="carousel-item">
										<img src="../images/dashboard.jpg" class="d-block w-100" alt="...">
										<div class="carousel-caption d-none d-md-block">
										</div>
									</div>
									<div class="carousel-item active">
										<img src="../images/dashboard1.jpg" class="d-block w-100" alt="...">
										<div class="carousel-caption d-none d-md-block">
											<h2>SELAMAT DATANG DI DASHBOARD CARICACAN AND TEAM WEDDING ORGANIZER</h2>
										</div>
									</div>
								</div>
								<a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
									<span class="carousel-control-prev-icon" aria-hidden="true"></span>
									<span class="sr-only">Kembali</span>
								</a>
								<a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
									<span class="carousel-control-next-icon" aria-hidden="true"></span>
									<span class="sr-only">Selanjutnya</span>
								</a>
							</div>
						</div></center>
					</section>
				</div>
				<!-- Konten/isi halaman -->

				<footer class="main-footer">
					<a>Copyright &copy; <script>document.write(new Date().getFullYear());</script>   
						All rights reserved | Website by Giezka Veby Agustin 
					</a>
				</footer>


			</div>
			<!-- ./wrapper -->

			<!-- jQuery -->
			<script src="plugins/jquery/jquery.min.js"></script>
			<!-- jQuery UI 1.11.4 -->
			<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
			<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
			<script>
				$.widget.bridge('uibutton', $.ui.button)
			</script>
			<!-- Bootstrap 4 -->
			<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
			<!-- Morris.js charts -->
			<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
			<script src="plugins/morris/morris.min.js"></script>
			<!-- Sparkline -->
			<script src="plugins/sparkline/jquery.sparkline.min.js"></script>
			<!-- jvectormap -->
			<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
			<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
			<!-- jQuery Knob Chart -->
			<script src="plugins/knob/jquery.knob.js"></script>
			<!-- daterangepicker -->
			<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
			<script src="plugins/daterangepicker/daterangepicker.js"></script>
			<!-- datepicker -->
			<script src="plugins/datepicker/bootstrap-datepicker.js"></script>
			<!-- Bootstrap WYSIHTML5 -->
			<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
			<!-- Slimscroll -->
			<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
			<!-- FastClick -->
			<script src="plugins/fastclick/fastclick.js"></script>
			<!-- AdminLTE App -->
			<script src="dist/js/adminlte.js"></script>
			<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
			<script src="dist/js/pages/dashboard.js"></script>
			<!-- AdminLTE for demo purposes -->
			<script src="dist/js/demo.js"></script>
		</body>
		</html>
