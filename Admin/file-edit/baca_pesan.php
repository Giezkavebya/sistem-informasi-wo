<?php
include "../koneksi.php";
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Pesan Pelanggan</title>
	<link rel="icon" href="../../images/logocari.png" type="image/png">
	<!-- Tell the browser to be responsive to screen width -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="../plugins/font-awesome/css/font-awesome.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<!-- DataTables -->
	<link rel="stylesheet" type="text/css" href="../plugins/datatables/dataTables.bootstrap4.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="../dist/css/adminlte.min.css">
	<!-- iCheck -->
	<link rel="stylesheet" href="../plugins/iCheck/flat/blue.css">
	<!-- Morris chart -->
	<link rel="stylesheet" href="../plugins/morris/morris.css">
	<!-- jvectormap -->
	<link rel="stylesheet" href="../plugins/jvectormap/jquery-jvectormap-1.2.2.css">
	<!-- Date Picker -->
	<link rel="stylesheet" href="../plugins/datepicker/datepicker3.css">
	<!-- Daterange picker -->
	<link rel="stylesheet" href="../plugins/daterangepicker/daterangepicker-bs3.css">
	<!-- bootstrap wysihtml5 - text editor -->
	<link rel="stylesheet" href="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
	<!-- Google Font: Source Sans Pro -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
	<!-- Select2 -->
	<link rel="stylesheet" href="../plugins/select2/select2.min.css">
	<!-- ckeditor--->
	<script type="text/javascript" src="../ckeditor/style.js"></script>
	<script type="text/javascript" src="../ckeditor/ckeditor.js"></script>
	
</head>
<body class="hold-transition sidebar-mini">
	<div class="wrapper">

		<!-- Sidebar-->
		<?php 
		include'sidebar.php';
		?>

		<?php
		$sql="SELECT pelanggan.id_pelanggan, pesan_pelanggan.id_pesanpelanggan AS id_pesanpelanggan, pelanggan.nama_pelanggan, pesan_pelanggan.isi_pesan, pesan_pelanggan.tanggal_kirim, balas_pesan.isi_balasan  FROM pesan_pelanggan JOIN pelanggan ON pesan_pelanggan.id_pelanggan=pelanggan.id_pelanggan LEFT JOIN balas_pesan ON pesan_pelanggan.id_pesanpelanggan=balas_pesan.id_pesanpelanggan where pesan_pelanggan.id_pesanpelanggan='$_GET[id]'";
		$query=mysql_query($sql);
		$rows=mysql_fetch_array($query);
		$id_pelanggan=$rows['id_pelanggan'];
		$id_pesanpelanggan=$rows['id_pesanpelanggan'];
		$nama_pelanggan = $rows['nama_pelanggan'];
		$isi_pesan= $rows['isi_pesan'];
		$tanggal_kirim = $rows['tanggal_kirim'];
		$isi_balasan=$rows['isi_balasan'];
		?>

		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<div class="content-header">
				<div class="container-fluid">
					<div class="row mb-2">
						<div class="col-sm-6">
							<h1 class="m-0 text-dark">Pesan Pelanggan</h1>
						</div><!-- /.col -->
					</div><!-- /.row -->
				</div><!-- /.container-fluid -->
			</div>
			<!-- /.content-header -->

			<!-- Main content -->
			<section class="content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-3">
							<a href="kelola_pesan.php" class="btn btn-primary btn-block mb-3">Kembali Ke Kotak Masuk</a>
						</div>
						<!-- /.col -->
						<div class="col-md-9">
							<div class="card card-primary card-outline">
								<div class="card-header">
									<h3 class="card-title">Baca Pesan</h3>
								</div>
								<!-- /.card-header -->
								<div class="card-body p-0">
									<div class="mailbox-read-info">
										<h6>Dari: <?php echo $nama_pelanggan;?>
										<span class="mailbox-read-time float-right"><?php echo $tanggal_kirim;?></span></h6>
									</div>
									<div class="mailbox-read-message">
										<p><?php echo $isi_pesan;?></p>
									</div>
									<!-- /.mailbox-read-message -->
								</div>
								<!-- /.card-body -->
								<div class="card-footer bg-white">
									<form class="form-horizontal" action="../file-aksi/aksi-tambah/aksi_balas_pesan.php" method="POST" id="form-balas">
										<input type="hidden" class="form-control" id="id_pesanpelanggan" name="id_pesanpelanggan" placeholder="" value="<?php echo $id_pesanpelanggan;?>">
										<div class="form-group">
											<label for="konsep_pernikahan" class="col-sm-6 control-label">Balas Pesan</label>
											<div class="col-sm-12">
												<textarea class="form-control" id="isi_balasan" placeholder="Tulis Pesan..." name="isi_balasan" rows="5"><?php echo $isi_balasan;?></textarea>
											</div>
										</div>
										<div class="form-group">
											<div class="col-sm-offset-2 col-sm-10">
												<button type="submit" name="update" class="btn btn-success"><li class="fa fa-reply"></li>  Balas Pesan</button>
											</div>
										</div>
									</form>
								</div>
							</div>
							<!-- /. box -->
						</div>
						<!-- /.col -->
					</div>
					<!-- /.row -->
				</section>
				<!-- /.content -->
			</div>
			<!-- /.content-wrapper -->
			<footer class="main-footer">
				<a>Copyright &copy; <script>document.write(new Date().getFullYear());</script>   
					All rights reserved | Website by Giezka Veby Agustin 
				</a>
			</footer>

			<!-- Control Sidebar -->
			<aside class="control-sidebar control-sidebar-dark">
				<!-- Control sidebar content goes here -->
			</aside>
			<!-- /.control-sidebar -->
		</div>
		<!-- ./wrapper -->
		<!-- jQuery -->
		<script src="../plugins/jquery/jquery.min.js"></script>
		<!-- jQuery UI 1.11.4 -->
		<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
		<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
		<script>
			$.widget.bridge('uibutton', $.ui.button)
		</script>
		<!-- Bootstrap 4 -->
		<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
		<!-- Morris.js charts -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
		<script src="../plugins/morris/morris.min.js"></script>
		<!-- Sparkline -->
		<script src="../plugins/sparkline/jquery.sparkline.min.js"></script>
		<!-- jvectormap -->
		<script src="../plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
		<script src="../plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
		<!-- jQuery Knob Chart -->
		<script src="../plugins/knob/jquery.knob.js"></script>
		<!-- daterangepicker -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
		<script src="../plugins/daterangepicker/daterangepicker.js"></script>
		<!-- datepicker -->
		<script src="../plugins/datepicker/bootstrap-datepicker.js"></script>
		<!-- Bootstrap WYSIHTML5 -->
		<script src="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
		<!-- Slimscroll -->
		<script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
		<!-- FastClick -->
		<script src="../plugins/fastclick/fastclick.js"></script>
		<!-- AdminLTE App -->
		<script src="../dist/js/adminlte.js"></script>
		<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
		<script src="../dist/js/pages/dashboard.js"></script>
		<!-- AdminLTE for demo purposes -->
		<script src="../dist/js/demo.js"></script>
		<!-- DataTables -->
		<script type="text/javascript" charset="utf8" src="../plugins/datatables/jquery.dataTables.js"></script>
		<script type="text/javascript" charset="utf8" src="../plugins/datatables/dataTables.bootstrap4.js"></script>
		<script src="plugins/select2/select2.full.min.js"></script>
		<!-- page script -->
		<script type="text/javascript">
			$(document).ready( function () {
				$('#example1').DataTable();
				$('#example2').DataTable({
					"paging": true,
					"lengthChange": false,
					"searching": false,
					"ordering": false,
					"info": true,
					"autoWidth": false
				});
				$('#example3').DataTable({
					"paging": true,
					"lengthChange": false,
					"searching": false,
					"ordering": false,
					"info": true,
					"autoWidth": false
				});
			});
		</script>

	</body>
	</html>
