<?php
include "../koneksi.php";
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Kelola Vendor</title>
	<link rel="icon" href="../images/logocari.png" type="image/png">
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
							<h1 class="m-0 text-dark">Kelola Vendor</h1>
						</div><!-- /.col -->
					</div><!-- /.row -->
				</div><!-- /.container-fluid -->
			</div>
			<!-- /.content-header -->
			<?php
			$sql="SELECT * FROM layanan where id_layanan='$_GET[id]'";
			$query=mysql_query($sql);
			$rows=mysql_fetch_array($query);
			$id_layanan    = $rows['id_layanan'];
			$nama_layanan = $rows['nama_layanan'];
			?>
			<!-- Main content -->
			<section class="content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-12">
							<p>
								<a class="btn btn-outline-dark" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
									Tambah vendor untuk <?php echo $nama_layanan ?>
								</a>
							</p>
							<div class="collapse" id="collapseExample">
								<div class="card border-dark mb-3" style="max-width: 100rem;">
									<div class="card-body text-dark">
										<button type="button" class="btn btn-secondary mb-1" data-toggle="modal" data-target="#Tambahvendorbaru">
											Tambah Vendor Baru
										</button>
										<button type="button" class="btn btn-secondary mb-1" data-toggle="modal" data-target="#Tambahvendorlama">
											Pilih Vendor 
										</button>
									</div>
								</div>
							</div>
							<div class="card">
								<div class="card-header">
									<h3 class="card-title">Tabel Vendor</h3>
								</div>

								<!-- /.card-header -->
								<div class="card-body">
									<!-- AWAL PROSES TAMBAH DATA VENDOR BARU -->
									<div class="modal fade" id="Tambahvendorbaru" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
										<div class="modal-dialog modal-lg" role="document">
											<div class="modal-content">
												<div class="modal-header">
													<h5 class="modal-title" id="largeModalLabel">Tambah Data Vendor Baru</h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>
												<div class="modal-body">
													<div class="row">
														<div class="col-lg-12">
															<div class="card">
																<div class="card-body card-block">
																	<form enctype='multipart/form-data' action="../file-aksi/aksi-tambah/aksi_tambah_vendor.php" method="POST" id="form-vendor-baru">	 
																		<div class="form-group">
																			<label for="nama_layanan" class=" form-control-label">Tambah data vendor baru untuk layanan</label>
																			<input type="text" id="nama_layanan" placeholder="Nama Layanan" class="form-control" value="<?php echo $nama_layanan ?>" disabled>
																			<input type="hidden" id="id_layanan" name="id_layanan" required="required" placeholder="Nama Layanan" class="form-control" value="<?php echo $id_layanan ?>">
																			<input type="hidden" id="id_vendor" name="id_vendor" required="required" placeholder="id_vendor" class="form-control" value="">
																			<span class="help-block"></span>
																		</div>   
																		<div class="form-group">
																			<label for="nama_vendor" class=" form-control-label">Nama Vendor</label>
																			<input type="text" id="Nama Vendor" name="nama_vendor" required="required" placeholder="Nama Vendor" class="form-control">
																			<span class="help-block"></span>
																		</div>           
																		<div class="form-group">
																			<label for="insta_vendor" class=" form-control-label">Link Instagram (Link)</label>
																			<input type="text" id="insta_vendor" name="insta_vendor" required="required" placeholder="Link Instagram" class="form-control">
																			<span class="help-block"></span>
																		</div>
																		<div class="form-group">
																			<label for="tentang_vendor" class="form-control-label">Tentang Vendor</label>
																			<textarea id="tentang_vendor" name="tentang_vendor"  value="tentang_vendor" rows="5" class="ckeditor" data-rule-required="true" data-rule-minlenght="2"></textarea>
																			<span class="help-block"></span>
																		</div>      
																		<div class="form-group">
																			<label for="foto_vendor" class=" form-control-label">Gambar Vendor</label>
																			<input type="file" name="foto_vendor" id="foto_vendor" >
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
									<!-- AKHIR PROSES TAMBAH DATA VENDOR BARU -->
									<!-- AWAL PROSES TAMBAH DATA VENDOR LAMA -->
									<div class="modal fade" id="Tambahvendorlama" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
										<div class="modal-dialog modal-lg" role="document">
											<div class="modal-content">
												<div class="modal-header">
													<h5 class="modal-title" id="largeModalLabel">Pilih Vendor</h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>
												<div class="modal-body">
													<div class="row">
														<div class="col-lg-12">
															<div class="card">
																<div class="card-body card-block">
																	<form enctype='multipart/form-data' action="../file-aksi/aksi-tambah/aksi_tambah_detail_vendor.php" method="POST" id="form-vendor-lama">	 
																		<div class="form-group">
																			<label for="nama_layanan" class=" form-control-label">Tambah vendor untuk layanan</label>
																			<input type="text" id="nama_layanan" placeholder="Nama Layanan" class="form-control" value="<?php echo $nama_layanan ?>" disabled>
																			<input type="hidden" id="id_layanan" name="id_layanan" required="required" placeholder="Nama Layanan" class="form-control" value="<?php echo $id_layanan ?>">
																			<input type="hidden" id="id_vendor" name="id_vendor" required="required" placeholder="Nama Layanan" class="form-control" value="">
																			<span class="help-block"></span>
																		</div>     
																		<div class="form-group">
																			<label for="nama_vendor" class=" form-control-label">Nama Vendor</label>
																			<div class="select-wrap">
																				<span class="icon"><span class="icon-keyboard_arrow_down"></span></span>
																				<select class="form-control" id="id_vendor" name="id_vendor">
																					<option value="">Pilih Vendor</option>
																					<?php 
																					$sql = mysql_query("SELECT * FROM vendor order by nama_vendor");
																					while ($data= mysql_fetch_array($sql)){
																						$id_vendor = $data['id_vendor'];
																						$nama_vendor = $data ['nama_vendor'];
																						?>
																						<option value="<?php echo $id_vendor;?>"> <?php echo $nama_vendor;?></option>
																					<?php }; ?>
																				</select> 
																			</div>
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
									<!-- AKHIR PROSES TAMBAH DATA VENDOR LAMA -->
									<!-- AWAL TABEL VENDOR -->
									<table id="example2" class="table table-bordered table-striped">
										<thead>
											<tr align="center" valign="top">
												<th scope="col" style="width: 10px;">No.</th>

												<th scope="col">Nama Vendor</th>
												<th scope="col" style="width: 250px;">Aksi</th>
											</tr>
										</thead>
										<tbody>
											<?php 
											$i=1;
											$sql = mysql_query("SELECT DISTINCT detail_vendor.id_vendor, vendor.nama_vendor, detail_vendor.id_vendor as id_vendor1 FROM detail_vendor INNER JOIN vendor ON detail_vendor.id_vendor=vendor.id_vendor JOIN Layanan ON detail_vendor.id_layanan=layanan.id_layanan WHERE detail_vendor.id_layanan='$_GET[id]'")or die(mysql_error());
											while ($isi= mysql_fetch_array($sql)){
												?>
												<tr align="center" valign="top">
													<td><?php echo $i; ?></td>
													<td><?php echo $isi['nama_vendor']; ?></td>
													<td style="text-align: center">
														<a class="btn btn-success" title= "Edit" href="../file-edit/edit_vendor.php?id=<?php echo $isi['id_vendor'];?>">Edit</a>
														<a class="btn btn-danger" title= "Hapus" href="../file-aksi/aksi-hapus/hapus_vendor_detail.php?id=<?php echo $isi['id_vendor1'];?>"onclick="return confirm('Apakah anda yakin ingin menghapus data?');">Hapus Dari Layanan</a>
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
