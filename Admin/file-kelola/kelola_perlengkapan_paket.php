<?php
include "../koneksi.php";
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Kelola Perlengkapan Paket</title>
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
			<?php
			$sql="SELECT * FROM paket where id_paket='$_GET[id]'";
			$query=mysql_query($sql);
			$rows=mysql_fetch_array($query);
			$id_paket   = $rows['id_paket'];
			$nama_paket = $rows['nama_paket'];
			?>
			<!-- Main content -->
			<section class="content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<h3 class="card-title">Kelola Perlengkapan Paket : <?php echo $nama_paket ?></h3>
								</div>
								<div class="card border-dark mb-3" style="max-width: 100rem;">
									<div class="card-body text-dark">
										<button type="button" class="btn btn-secondary mb-1" data-toggle="modal" data-target="#Tambahperlengkapanpaket">
											Tambah Perlengkapan Paket
										</button>
									</div>
								</div>
								<div class="card-header">
									<strong>Tabel Perlengkapan Paket : <?php echo $nama_paket ?></strong>
								</div>
								<!-- /.card-header -->
								<div class="card-body">
									<!-- AWAL PROSES TAMBAH DATA LAYANAN PAKET-->
									<div class="modal fade" id="Tambahperlengkapanpaket" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<div class="modal-header">
													<h5 class="modal-title" id="largeModalLabel">Tambah Perlengkapan Paket</h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>
												<div class="modal-body">
													<div class="row">
														<div class="col-lg-12">
															<div class="card">
																<div class="card-body card-block">
																	<form enctype='multipart/form-data' action="../file-aksi/aksi-tambah/aksi_tambah_perlengkapan_paket.php" method="POST" id="form-perlengkapan-paket">  
																		<div class="form-group">
																			<label for="perlengkapan" class=" form-control-label">Tambah perlengkapan untuk paket</label>
																			<input type="text" id="nama_paket" placeholder="Nama Paket" class="form-control" value="<?php echo $nama_paket ?>" disabled>
																			<input type="hidden" id="id_paket" name="id_paket" required="required" placeholder="" class="form-control" value="<?php echo $id_paket ?>">
																			<input type="hidden" id="id_perlengkapan" name="id_perlengkapan" required="required" placeholder="" class="form-control" value="">
																			<span class="help-block"></span>
																		</div>     
																		<div class="form-group">
																			<label for="nama_perlengkapan" class=" form-control-label">Nama Perlengkapan</label>
																			<div class="select-wrap">
																				<span class="icon"><span class="icon-keyboard_arrow_down"></span></span>
																				<select class="form-control" id="id_perlengkapan" name="id_perlengkapan">
																					<option value="">---Pilih Perlengkapan--</option>
																					<?php 
																					$sql = mysql_query("SELECT * FROM perlengkapan order by nama_perlengkapan");
																					while ($data= mysql_fetch_array($sql)){
																						$id_perlengkapan= $data['id_perlengkapan'];
																						$nama_perlengkapan = $data ['nama_perlengkapan'];
																						?>
																						<option value="<?php echo $id_perlengkapan;?>"> <?php echo $nama_perlengkapan;?></option>
																					<?php }; ?>
																				</select> 
																			</div>
																		</div> 
																		<div class="form-group">
																			<label for="jumlah" class="form-control-label">Jumlah</label>
																			<input type="number" id="jumlah" name="jumlah" placeholder="Jumlah" class="form-control">
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
									<!-- AKHIR PROSES TAMBAH DATA LAYANAN PAKET-->
									<!-- AWAL TABEL LAYANAN PAKET -->
									<table id="example1" class="table table-bordered table-striped">
										<thead>
											<tr align="center" valign="top">
												<th scope="col" style="width: 10px;">No.</th>
												<th scope="col">Nama Perlengkapan</th>
												<th scope="col">Jumlah</th>
												<th scope="col" style="width: 250px;">Aksi</th>
											</tr>
										</thead>
										<tbody>
											<?php 
											$i=1;
											$sql = mysql_query("SELECT perlengkapan_paket.id_perlengkapan, perlengkapan_paket.jumlah, perlengkapan.nama_perlengkapan, perlengkapan_paket.id_perlengkapanpaket FROM perlengkapan_paket INNER JOIN perlengkapan ON perlengkapan_paket.id_perlengkapan=perlengkapan.id_perlengkapan JOIN paket ON perlengkapan_paket.id_paket=paket.id_paket WHERE paket.id_paket='$_GET[id]'")or die(mysql_error());
											while ($isi= mysql_fetch_array($sql)){
												?>
												<tr align="center" valign="top">
													<td><?php echo $i; ?></td>
													<form action="../file-aksi/aksi-edit/aksi_edit_perlengkapan_paket.php?id=<?php echo $isi['id_perlengkapanpaket'];?>" method="POST" id="form-edit-perlengkapan-paket">
														<td><?php echo $isi['nama_perlengkapan']; ?></td><span class="help-block"></span>
														<td><input type="number" name="jumlah" class="form-control" value="<?php echo $isi['jumlah']; ?>"></td><span class="help-block"></span>                              
														<td style="text-align: center">
															<button class="btn btn-success btn-sm" name ="update"type="submit" >
																Edit
															</button>
															<a class="btn btn-danger btn-sm" title= "Hapus" href="../file-aksi/aksi-hapus/hapus_perlengkapan_paket.php?id=<?php echo $isi['id_perlengkapanpaket'];?>"onclick="return confirm('Apakah anda yakin ingin menghapus data?');">Hapus</a>
														</td>
													</form>
												</tr>
												<?php $i++; }; ?>
											</tbody>
										</table>
										<!-- AKHIR TABEL LAYANAN PAKET-->
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
					<script src="../plugins/select2/select2.full.min.js"></script>
					<!-- page script -->
					<script type="text/javascript">
						$(document).ready( function () {
							$('#example2').DataTable();
							$('#example1').DataTable({
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
