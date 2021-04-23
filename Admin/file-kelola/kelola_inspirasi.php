<?php
include "../koneksi.php";
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Kelola Inspirasi</title>
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

		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<div class="content-header">
				<div class="container-fluid">
					<div class="row mb-2">
						<div class="col-sm-6">
							<h1 class="m-0 text-dark">Kelola Inspirasi</h1>
						</div><!-- /.col -->
					</div><!-- /.row -->
				</div><!-- /.container-fluid -->
			</div>
			<!-- /.content-header -->

			<!-- Main content -->
			<section class="content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<h3 class="card-title">Tabel Inspirasi</h3>
								</div>

								<!-- /.card-header -->
								<div class="card-body">
									<!-- Awal Proses Tambah Data -->
									<button type="button" class="btn btn-secondary mb-1" data-toggle="modal" data-target="#largeModal">
										Tambah Data
									</button>
									<div class="modal fade" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
										<div class="modal-dialog modal-lg" role="document">
											<div class="modal-content">
												<div class="modal-header">
													<h5 class="modal-title" id="largeModalLabel">Tambah Data</h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>
												<div class="modal-body">
													<div class="row">
														<div class="col-lg-12">
															<div class="card">
																<div class="card-body card-block">
																	<form enctype='multipart/form-data' action="../file-aksi/aksi-tambah/aksi_tambah_inspirasi.php" method="POST" id="form-inspirasi">	    
																		<div class="form-group">
																			<label for="judul_inspirasi" class=" form-control-label">Judul Inspirasi</label>
																			<input type="text" id="judul_inspirasi" name="judul_inspirasi" required="required" placeholder="Judul Inspirasi" class="form-control">
																			<span class="help-block"></span>
																		</div>                
																		<div class="form-group">
																			<label for="foto_inspirasi" class=" form-control-label">Gambar Inspirasi</label>
																			<input type="file" name="foto_inspirasi" id="foto_inspirasi" >
																			<span class="help-block"></span>
																		</div>     
																		<div class="form-group">
																			<label for="ket_inspirasi" class="form-control-label">Keterangan Inspirasi</label>
																			<textarea id="ket_inspirasi" name="ket_inspirasi"  value="ket_inspirasi" rows="5" class="ckeditor" data-rule-required="true" data-rule-minlenght="2"></textarea>
																			<span class="help-block"></span>
																		</div>            	
																	</div>
																	<div class="modal-footer">
																		<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
																		<button type="tambah" class="btn btn-primary" name="tambah">Simpan</button>
																	</div>
																</form>
															</div>
														</div>
													</div>   
												</div>
											</div>
										</div>
									</div>
									<!-- Akhir Proses Tambah Data -->
									<table id="example1" class="table table-bordered table-striped">
										<thead>
											<tr align="center" valign="top">
												<th scope="col">No.</th>
												<th scope="col">Judul Inspirasi</th>
												<th scope="col">Gambar Inspirasi</th>
												<th scope="col">Keterangan Inspirasi</th>
												<th scope="col">Aksi</th>
											</tr>
										</thead>
										<tbody>
											<?php 
											$i=1;
											$sql = mysql_query("SELECT * FROM inspirasi");
											while ($isi= mysql_fetch_array($sql)){
												?>
												<tr align="center" valign="top">
													<td><?php echo $i; ?></td>
													<td><?php echo $isi['judul_inspirasi']; ?></td>
													<td><image src="../images/inspirasi/<?php echo $isi['foto_inspirasi']; ?>" style="width: 100px; height: 100px;"></td>
														<td><?php echo $isi['ket_inspirasi']; ?></td>
														<td style="text-align: center">
															<a class="btn btn-success" title= "Edit" href="../file-edit/edit_inspirasi.php?id=<?php echo $isi['id_inspirasi'];?>">Edit</a>
															<a class="btn btn-danger" title= "Hapus" href="../file-aksi/aksi-hapus/hapus_inspirasi.php?id=<?php echo $isi['id_inspirasi'];?>"onclick="return confirm('Apakah anda yakin ingin menghapus data?');">Hapus</a>
														</td>
													</tr>
													<?php $i++; }; ?>
												</tbody>
											</table>
										</div>
									</div>
								</div>
								<!-- /.row -->
							</div><!-- /.container-fluid -->
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
