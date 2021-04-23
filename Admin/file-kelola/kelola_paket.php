<?php
include "../koneksi.php";
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Kelola Paket</title>
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

		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<div class="content-header">
				<div class="container-fluid">
					<div class="row mb-2">
						<div class="col-sm-6">
							<h1 class="m-0 text-dark">Kelola Paket</h1>
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
							<div class="card border-dark mb-3" style="max-width: 100rem;">
								<div class="card-body text-dark">
									<button type="button" class="btn btn-secondary mb-1" data-toggle="modal" data-target="#Tambahpaket">
										Tambah Data Paket
									</button>
									<button type="button" class="btn btn-secondary mb-1" data-toggle="modal" data-target="#Dataperlengkapan">
										Data Perlengkapan
									</button>
									<button type="button" class="btn btn-secondary mb-1" data-toggle="modal" data-target="#Datagedung">
										Data Gedung
									</button>
								</div>
							</div>
							<div class="card">
								<div class="card-header">
									<h3 class="card-title">Tabel Paket</h3>
								</div>

								<!-- /.card-header -->
								<div class="card-body">
									<!-- AWAL PROSES TAMBAH DATA PAKET BARU -->
									<div class="modal fade" id="Tambahpaket" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<div class="modal-header">
													<h5 class="modal-title" id="largeModalLabel">Tambah Data Paket</h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>
												<div class="modal-body">
													<div class="row">
														<div class="col-lg-12">
															<div class="card">
																<div class="card-body card-block">
																	<form enctype='multipart/form-data' action="../file-aksi/aksi-tambah/aksi_tambah_paket.php" method="POST" id="form-vendor-baru">	 
																		<div class="form-group">
																			<label for="nama_paket" class=" form-control-label">Nama Paket</label>
																			<input type="text" id="Nama Paket" name="nama_paket" required="required" placeholder="Nama Paket" class="form-control">
																			<span class="help-block"></span>
																		</div>           
																		<div class="form-group">
																			<label for="harga_paket" class=" form-control-label">Harga Paket</label>
																			<input type="text" id="rupiah" name="harga_paket" required="required" placeholder="Harga Paket" class="form-control">
																			<span class="help-block"></span>
																		</div>
																		<div class="form-group">
																			<label for="jumlah_hari" class=" form-control-label">Jumlah Hari</label>
																			<input type="number" id="jumlah_hari" name="jumlah_hari" required="required" placeholder="Jumlah Hari" class="form-control">
																			<span class="help-block"></span>
																		</div>
																		<div class="form-group">
																			<label for="jumlah_acara" class=" form-control-label">Jumlah Acara</label>
																			<input type="number" id="jumlah_acara" name="jumlah_acara" required="required" placeholder="Jumlah Acara" class="form-control">
																			<span class="help-block"></span>
																		</div>
																		<div class="form-group">
																			<label for="jumlah_tamu" class=" form-control-label">Jumlah Tamu</label>
																			<input type="number" id="jumlah_tamu" name="jumlah_tamu" required="required" placeholder="Jumlah Tamu" class="form-control">
																			<span class="help-block"></span>
																		</div>
																		<div class="form-group">
																			<label for="jumlah_team" class=" form-control-label">Jumlah Team</label>
																			<input type="number" id="jumlah_team" name="jumlah_team" required="required" placeholder="Jumlah Team" class="form-control">
																			<span class="help-block"></span>
																		</div>  
																		<div class="form-group">
																			<label for="foto_paket" class=" form-control-label">Gambar Paket</label>
																			<input type="file" name="foto_paket" id="foto_paket" >
																			<span class="help-block"></span>
																		</div>               	
																	</div>
																	<div class="modal-footer">
																		<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
																		<button type="tambah" class="btn btn-primary" name="tambah">Simpan</button>
																	</form>
																</div>
															</div>
														</div>
													</div>   
												</div>
											</div>
										</div>
									</div>
									<!-- AKHIR PROSES TAMBAH DATA PAKET BARU -->

									<!-- AWAL PROSES DATA PERLENGKAPAN -->
									<div class="modal fade" id="Dataperlengkapan" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
										<div class="modal-dialog modal-lg" role="document">
											<div class="modal-content">
												<div class="modal-header">
													<h5 class="modal-title" id="largeModalLabel">Daftar Data Perlengkapan</h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>
												<div class="card border-dark mb-3" style="max-width: 100rem;">
													<div class="card-body text-dark">
														<button type="button" class="btn btn-secondary mb-1" data-toggle="modal" data-target="#Tambahperlengkapan">
															Tambah Data Perlengkapan
														</button>
													</div>
												</div>
												<div class="modal-body">
													<!-- AWAL TABEL PERLENGKAPAN-->
													<table id="example3" class="table table-bordered table-striped">
														<thead>
															<tr align="center" valign="top">
																<th scope="col" style="width: 10px;">No.</th>
																<th scope="col">Nama Perlengkapan</th>
																<th scope="col">Satuan</th>
																<th scope="col">Harga</th>
																<th scope="col" style="width: 120px;">Aksi</th>
															</tr>
														</thead>
														<tbody>
															<?php 
															$i=1;
															$sql = mysql_query("SELECT * FROM perlengkapan where id_perlengkapan") or die(mysql_error());
															while ($isi= mysql_fetch_array($sql)){
																?>
																<tr align="center" valign="top">
																	<td><?php echo $i; ?></td>
																	<form action="../file-aksi/aksi-edit/aksi_edit_perlengkapan.php?id=<?php echo $isi['id_perlengkapan'];?>" method="POST" id="form-edit-perlengkapan">
																		<td><input type="text" name="nama_perlengkapan" class="form-control" value="<?php echo $isi['nama_perlengkapan']; ?>"></td><span class="help-block"></span>
																		<td><input type="text" name="satuan" class="form-control" value="<?php echo $isi['satuan']; ?>"></td><span class="help-block"></span>
																		<td><input type="text" id="rupiah1" name="harga_perlengkapan" class="form-control" value="<?php echo "Rp. ". number_format($isi['harga_perlengkapan'], 0, ".", ".");?>"></td><span class="help-block"></span>
																		<td style="text-align: center">
																			<button class="btn btn-success btn-sm" name ="update"type="submit" >
																				Edit
																			</button>
																			<a class="btn btn-danger btn-sm" title= "Hapus" href="../file-aksi/aksi-hapus/hapus_perlengkapan.php?id=<?php echo $isi['id_perlengkapan'];?>"onclick="return confirm('Apakah anda yakin ingin menghapus data?');">Hapus</a>
																		</td>
																	</tr>
																</form>
																<?php $i++; }; ?>
															</tbody>
														</table>
														<!-- AKHIR TABEL PERLENGKAPAN-->
													</div>
												</div>
											</div>
										</div>
										<!-- AKHIR PROSES DATA PERLENGKAPAN -->

										<!-- AWAL PROSES TAMBAH PERLENGKAPAN -->
										<div class="modal fade" id="Tambahperlengkapan" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
											<div class="modal-dialog" role="document">
												<div class="modal-content">
													<div class="modal-header">
														<h5 class="modal-title" id="largeModalLabel">Tambah Data Perlengkapan</h5>
														<button type="button" class="close" data-dismiss="modal" aria-label="Close">
															<span aria-hidden="true">&times;</span>
														</button>
													</div>
													<div class="modal-body">
														<div class="row">
															<div class="col-lg-12">
																<div class="card">
																	<div class="card-body card-block">
																		<form enctype='multipart/form-data' action="../file-aksi/aksi-tambah/aksi_tambah_perlengkapan.php" method="POST" id="form-tambah-perlengkapan">	      
																			<div class="form-group">
																				<label for="nama_perlengkapan" class=" form-control-label">Nama Perlengkapan</label>
																				<input type="text" id="Nama Perlengkapan" name="nama_perlengkapan" required="required" placeholder="Nama Perlengkapan" class="form-control">
																				<span class="help-block"></span>
																			</div> 
																			<div class="form-group">
																				<label for="satuan" class=" form-control-label">Satuan</label>
																				<input type="text" id="satuan" name="satuan" required="required" placeholder="Satuan" class="form-control">
																				<span class="help-block"></span>
																			</div> 
																			<div class="form-group">
																				<label for="harga_perlengkapan" class=" form-control-label">Harga Perlengkapan</label>
																				<input type="text" id="rupiah2" name="harga_perlengkapan" required="required" placeholder="Harga Perlengkapan" class="form-control">
																				<span class="help-block"></span>
																			</div>              	            	
																		</div>
																		<div class="modal-footer">
																			<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
																			<button type="tambah" class="btn btn-primary" name="tambah">Simpan</button>
																		</form>
																	</div>
																</div>
															</div>
														</div>   
													</div>
												</div>
											</div>
										</div>
										<!-- AKHIR PROSES TAMBAH PERLENGKAPAN -->

										<!-- AWAL PROSES DATA GEDUNG-->
										<div class="modal fade" id="Datagedung" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
											<div class="modal-dialog modal-lg" role="document">
												<div class="modal-content">
													<div class="modal-header">
														<h5 class="modal-title" id="largeModalLabel">Daftar Data Gedung</h5>
														<button type="button" class="close" data-dismiss="modal" aria-label="Close">
															<span aria-hidden="true">&times;</span>
														</button>
													</div>
													<div class="card border-dark mb-3" style="max-width: 100rem;">
														<div class="card-body text-dark">
															<button type="button" class="btn btn-secondary mb-1" data-toggle="modal" data-target="#Tambahgedung">
																Tambah Data Gedung
															</button>
														</div>
													</div>
													<div class="modal-body">
														<!-- AWAL TABEL GEDUNG-->
														<table id="example2" class="table table-bordered table-striped">
															<thead>
																<tr align="center" valign="top">
																	<th scope="col" style="width: 10px;">No.</th>
																	<th scope="col">Nama Gedung</th>
																	<th scope="col" style="width: 110px;">Aksi</th>
																</tr>
															</thead>
															<tbody>
																<?php 
																$i=1;
																$sql = mysql_query("SELECT * FROM gedung where id_gedung") or die(mysql_error());
																while ($isi= mysql_fetch_array($sql)){
																	?>
																	<tr align="center" valign="top">
																		<td><?php echo $i; ?></td>
																		<form action="../file-aksi/aksi-edit/aksi_edit_gedung.php?id=<?php echo $isi['id_gedung'];?>" method="POST" id="form-edit-gedung">
																			<td><input type="text" name="nama_gedung" class="form-control" value="<?php echo $isi['nama_gedung']; ?>"></td><span class="help-block"></span>
																			<td style="text-align: center">
																				<button class="btn btn-success btn-sm" name ="update"type="submit" >
																					Edit
																				</button>
																				<a class="btn btn-danger btn-sm" title= "Hapus" href="../file-aksi/aksi-hapus/hapus_gedung.php?id=<?php echo $isi['id_gedung'];?>"onclick="return confirm('Apakah anda yakin ingin menghapus data?');">Hapus</a>
																			</td>
																		</tr>
																	</form>
																	<?php $i++; }; ?>
																</tbody>
															</table>
															<!-- AKHIR TABEL GEDUNG-->
														</div>
													</div>
												</div>
											</div>
											<!-- AKHIR PROSES DATA GEDUNG -->
											
											<!-- AWAL PROSES TAMBAH GEDUNG -->
											<div class="modal fade" id="Tambahgedung" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
												<div class="modal-dialog" role="document">
													<div class="modal-content">
														<div class="modal-header">
															<h5 class="modal-title" id="largeModalLabel">Tambah Data Gedung</h5>
															<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																<span aria-hidden="true">&times;</span>
															</button>
														</div>
														<div class="modal-body">
															<div class="row">
																<div class="col-lg-12">
																	<div class="card">
																		<div class="card-body card-block">
																			<form enctype='multipart/form-data' action="../file-aksi/aksi-tambah/aksi_tambah_gedung.php" method="POST" id="form-tambah-gedung">	      
																				<div class="form-group">
																					<label for="nama_gedung" class=" form-control-label">Nama Gedung</label>
																					<input type="text" id="Nama Gedung" name="nama_gedung" required="required" placeholder="Nama Gedung" class="form-control">
																					<span class="help-block"></span>
																				</div>      	            	
																			</div>
																			<div class="modal-footer">
																				<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
																				<button type="tambah" class="btn btn-primary" name="tambah">Simpan</button>
																			</form>
																		</div>
																	</div>
																</div>
															</div>   
														</div>
													</div>
												</div>
											</div>
											<!-- AKHIR PROSES TAMBAH PERLENGKAPAN -->

											<!-- AWAL TABEL PAKET -->
											<table id="example1" class="table table-bordered table-striped">
												<thead>
													<tr align="center" valign="top">
														<th scope="col" style="width: 10px;">No.</th>
														<th scope="col">Nama Paket</th>
														<th scope="col">Harga Paket</th>
														<th scope="col" style="width: 250px;">Aksi</th>
													</tr>
												</thead>
												<tbody>
													<?php 
													$i=1;
													$sql = mysql_query("SELECT * FROM paket where id_paket")or die(mysql_error());
													while ($isi= mysql_fetch_array($sql)){
														?>
														<tr align="center" valign="top">
															<td><?php echo $i; ?></td>
															<td><?php echo $isi['nama_paket']; ?></td>
															<td><?php echo "Rp. ". number_format($isi['harga_paket'], 0, ".", ".");?></td>
															<td style="text-align: center">
																<a class="btn btn-success" title= "Edit" href="../file-edit/edit_paket.php?id=<?php echo $isi['id_paket'];?>">Edit</a>
																<a class="btn btn-danger" title= "Hapus" href="../file-aksi/aksi-hapus/hapus_paket.php?id=<?php echo $isi['id_paket'];?>"onclick="return confirm('Apakah anda yakin ingin menghapus data?');">Hapus</a>
															</td>
														</tr>
														<?php $i++; }; ?>
													</tbody>
												</table>
												<!-- /.col -->
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
							<script src="rupiah.js"></script>
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
