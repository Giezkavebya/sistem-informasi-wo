<?php
include "../koneksi.php";
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Detail Pemesanan</title>
	<link rel="icon" href="../../images/logocari.png" type="image/png">
	<!-- Tell the browser to be responsive to screen width -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="../plugins/font-awesome/css/font-awesome.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
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
	<!-- DataTables -->
	<link rel="stylesheet" type="text/css" href="../plugins/datatables/dataTables.bootstrap4.css">
	<link rel="stylesheet" href="../../css/bootstrap-datepicker.css">
</head>
<body class="hold-transition sidebar-mini">
	<div class="wrapper">

		<!-- Sidebar-->
		<?php 
		include'sidebar.php';
		?>

		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- /.content-header -->
			<?php
			$sql="select * from pemesanan where id_pemesanan='$_GET[id]'";
			$query=mysql_query($sql);
			$rows=mysql_fetch_array($query);
			$id_pemesanan=$rows['id_pemesanan'];
			$id_pelanggan=$rows['id_pelanggan'];
			$id_paket=$rows['id_paket'];
			$id_gedung = $rows['id_gedung'];
			$harga_total = $rows['harga_total'];
			$sisa_pembayaran= $rows['sisa_pembayaran'];
			$tanggal_pesan = $rows['tanggal_pesan'];
			$validasi_pemesanan = $rows['validasi_pemesanan'];
			?>

			<!-- Main content -->
			<section class="content">
				<div class="container-fluid">
					<div class="animated fadeIn">
						<div class="row">
							<div class="col-lg-12">
								<div class="card">
									<div class="card-header">
										<strong>Detail Pemesanan</strong> 
									</div>
									<?php 
										$sql=mysql_query("SELECT validasi_pemesanan from pemesanan WHERE id_pemesanan='$id_pemesanan'");
										$row=mysql_fetch_array($sql);
										$valid = $row['validasi_pemesanan'];
										if($valid == 'Ya'){
											echo'	<div class="row">
											<div class="col-sm-1">
												<button class="btn btn-outline-success" disabled>Status Validasi : ';
										} else {
											echo'	<div class="row">
											<div class="col-sm-1">
												<button class="btn btn-outline-danger" disabled>Status Validasi : ';
										}
										?>
										<?php echo $rows['validasi_pemesanan'];?></button>
										<?php 
										$sql = mysql_query("SELECT * FROM pemesanan WHERE validasi_pemesanan ='Ya' AND id_pemesanan='$rows[id_pemesanan]'");
										if(mysql_num_rows($sql)!=0){
											echo'<a style="margin-top:-65px; margin-left:160px;" href="kontrak.php?id='.$rows['id_pelanggan'].'&id1='.$rows['id_pemesanan'].'" target="_blank" class="btn btn-danger mb-1"><span class="fa fa-print"></span>  Cetak Kontrak Perjanjian</a>';
										}
										?>
										<?php
										?>
										</div>
									</div>
								</div><!-- /.card-header -->
									<div class="card-body card-block">
										<div class="row">
											<div class="col-sm-6">
												<div class="card">
													<div class="card-body">
														<form enctype='multipart/form-data' action="../file-aksi/aksi-tambah/aksi_tambah_inspirasi.php" method="POST" id="form-pemesanan">   
															<div class="form-group">
																<label for="id_pemesanan" class=" form-control-label">ID Pemesanan</label>
																<input type="text" id="id_pemesanan" name="id_pemesanan" required="required" placeholder="ID Pemesanan" class="form-control" value="<?php echo $id_pemesanan;?>" disabled>
																<span class="help-block"></span>
															</div>           
															<div class="form-group">
																<label for="tanggal_pesan" class=" form-control-label">Tanggal Pemesanan</label>
																<input type="text" id="tanggal_pesan" name="tanggal_pesan" required="required" placeholder="ID Pemesanan" class="form-control" value="<?=date ('d-m-Y', strtotime ($tanggal_pesan));?>" disabled>
																<span class="help-block"></span>
															</div>         
															<?php
															$sql=mysql_query("SELECT * FROM pemesanan JOIN pelanggan ON pelanggan.id_pelanggan=pemesanan.id_pelanggan where pelanggan.id_pelanggan='$rows[id_pelanggan]'");
															$isi=mysql_fetch_array($sql);
															?>
															<div class="form-group">
																<label for="nama_pelanggan" class=" form-control-label">Nama Pelanggan</label>
																<input type="text" id="nama_pelanggan" name="nama_pelanggan" required="required" placeholder="Nama Pelanggan" class="form-control" value="<?php echo $isi['nama_pelanggan'];?>" disabled>
																<span class="help-block"></span>
															</div>        
															<?php
															$sql=mysql_query("SELECT * FROM pemesanan JOIN paket ON pemesanan.id_paket=paket.id_paket where pemesanan.id_pemesanan='$rows[id_pemesanan]'");
															$isi1=mysql_fetch_array($sql);
															?>
															<div class="form-group">
																<label for="nama_paket" class=" form-control-label">Paket</label>
																<input type="text" id="nama_paket" name="nama_paket" required="required" placeholder="Nama Paket" class="form-control" value="<?php echo $isi1['nama_paket'];?>" disabled>
																<input type="text" id="nama_paket" name="nama_paket" required="required" placeholder="Nama Paket" class="form-control" value="<?php echo "Rp. ". number_format($isi1['harga_paket'], 0, ".", ".");?>" disabled>
																<span class="help-block"></span>
															</div>      
															<?php
															$sql=mysql_query("SELECT * FROM pemesanan JOIN gedung ON pemesanan.id_gedung=gedung.id_gedung where pemesanan.id_pemesanan='$rows[id_pemesanan]'");
															$isi2=mysql_fetch_array($sql);
															?>
															<div class="form-group">
																<label for="nama_gedung" class=" form-control-label">Gedung</label>
																<input type="text" id="nama_gedung" name="nama_gedung" required="required" placeholder="Nama Gedung" class="form-control" value="<?php echo $isi2['nama_gedung'];?>" disabled>
																<span class="help-block"></span>
															</div>            
														</form>
													</div>
												</div>
												<!-- AWAL JADWAL PERTEMUAN-->
												<div class="card">
													<h5 class="card-header">Jadwal Pertemuan</h5>
													<div class="card-body">
														<!-- AWAL TABEL JADWAL PERTEMUAN-->
														<table id="example3" class="table table-bordered table-striped">
															<thead>
																<tr align="center" valign="top">
																	<th scope="col" style="width :180px;">Tanggal Pertemuan</th>
																	<th scope="col" style="width :40px;">Aksi</th>
																</tr>
															</thead>
															<tbody>
																<?php 
																$sql = mysql_query("SELECT * FROM jadwal_pertemuan JOIN pemesanan ON jadwal_pertemuan.id_pemesanan=pemesanan.id_pemesanan WHERE pemesanan.id_pemesanan='$rows[id_pemesanan]'")or die(mysql_error());
																while ($isi= mysql_fetch_array($sql)){
																	?>
																	<tr align="center" valign="top"> 
																		<form action="../file-aksi/aksi-edit/aksi_edit_jadwal_pertemuan.php?id=<?php echo $isi['id_pertemuan'];?>" method="POST" id="form-edit-pertemuan">
																			<td><p><input type="date" id="date" name="tanggal_pertemuan" class="form-control" value="<?php echo $isi['tanggal_pertemuan'];?>"></p></td><span class="help-block"></span>
																			<td style="text-align: center">
																				<button class="btn btn-success" name ="update"type="submit">
																					Edit
																				</button>
																			</td>
																		</form>
																	</tr>
																<?php }; ?>
															</tbody>
														</table>
														<!-- AKHIR TABEL JADWAL PERTEMUAN-->     
													</div>
												</div>
												<!-- AKHIR JADWAL PERTEMUAN-->
											</div>
											<div class="col-sm-6">
												<div class="card">
													<h5 class="card-header">Jadwal Acara</h5>
													<div class="card-body">
														<!-- AWAL TABEL JADWAL ACARA -->
														<table id="example3" class="table table-bordered table-striped">
															<thead>
																<tr align="center" valign="top">
																	<th scope="col">Acara</th>
																	<th scope="col">Tanggal Acara</th>
																</tr>
															</thead>
															<tbody>
																<?php 
																$sql = mysql_query("SELECT * FROM jadwal_acara JOIN pemesanan ON jadwal_acara.id_pemesanan=pemesanan.id_pemesanan WHERE jadwal_acara.id_pemesanan='$rows[id_pemesanan]'")or die(mysql_error());
																while ($isi= mysql_fetch_array($sql)){
																	?>
																	<tr align="center" valign="top"> 
																		<td><p><?php echo $isi['nama_acara'];?></p></td><span class="help-block"></span>
																		<td><p><?=date ('d-m-Y', strtotime ($isi['tanggal_acara']));?></p></td><span class="help-block"></span>
																		</tr>
																	<?php }; ?>
																</tbody>
															</table>
															<!-- AKHIR TABEL JADWAL ACARA-->   
														</div>
													</div>
													<div class="card">
														<h5 class="card-header">Pembayaran</h5>
														<div class="card-body">
															<!-- AWAL TABEL JADWAL ACARA -->
															<table id="example3" class="table table-bordered table-striped">
																<thead>
																	<tr align="center" valign="top">
																		<th scope="col">Jumlah Pembayaran</th>
																		<th scope="col">Tanggal Bayar</th>
																		<th scope="col">Bukti</th>
																	</tr>
																</thead>
																<tbody>
																	<?php 
																	$sql = mysql_query("SELECT * FROM pembayaran JOIN pemesanan ON pembayaran.id_pemesanan=pemesanan.id_pemesanan WHERE pembayaran.id_pemesanan='$rows[id_pemesanan]'")or die(mysql_error());
																	while ($isi= mysql_fetch_array($sql)){
																		?>
																		<tr align="center" valign="top"> 
																			<td><p><?php echo "Rp. ". number_format($isi['jumlah_pembayaran'], 0, ".", ".");?></p></td><span class="help-block"></span>
																			<td><p><?=date ('d-m-Y', strtotime ($isi['tanggal_pembayaran']));?></p></td><span class="help-block"></span>
																			<td>
																				<a  class="btn btn-info" title= "Lihat" href="../detail_pembayaran.php?id=<?php echo $isi['id_pembayaran'];?>">Lihat</a>
																			</td>                       
																		</tr>
																	<?php }; ?>
																</tbody>
															</table>
															<!-- AKHIR TABEL JADWAL ACARA-->   
															<table id="example3" class="table table-bordered table-striped">
																<thead>
																	<tr align="center" valign="top">
																		<th scope="col">Harga Total Pemesanan</th>
																		<th scope="col">Sisa Pembayaran</th>
																	</tr>
																</thead>
																<tbody>
																	<tr align="center" valign="top"> 
																		<td><p><?php echo "Rp. ". number_format($rows['harga_total'], 0, ".", ".");?></p></td><span class="help-block"></span>
																		<td><p><?php echo "Rp. ". number_format($rows['sisa_pembayaran'], 0, ".", ".");?></p></td><span class="help-block"></span>
																	</tr>
																</tbody>
															</table>
														</div>
													</div>
												</div>
												<div class="col-sm-12">
													<div class="card">
														<h5 class="card-header">Perlengkapan Tambahan</h5>
														<div class="card-body">
															<!-- AWAL TABEL PERLENGKAPAN TAMBAHAN-->
															<table id="example3" class="table table-bordered table-striped">
																<thead>
																	<tr align="center" valign="top">
																		<th scope="col">Nama Perlengkapan</th>
																		<th scope="col">Jumlah</th>
																		<th scope="col">Satuan</th>
																		<th scope="col">Harga Total</th>
																	</tr>
																</thead>
																<tbody>
																	<?php 
																	$sql = mysql_query("SELECT perlengkapan.nama_perlengkapan, perlengkapan.satuan,tambahan_perlengkapan.jumlah_tambahan, tambahan_perlengkapan.id_tambahan, perlengkapan.harga_perlengkapan*tambahan_perlengkapan.jumlah_tambahan AS harga_total FROM tambahan_perlengkapan JOIN perlengkapan ON tambahan_perlengkapan.id_perlengkapan=perlengkapan.id_perlengkapan JOIN pemesanan ON tambahan_perlengkapan.id_pemesanan=pemesanan.id_pemesanan WHERE tambahan_perlengkapan.id_pemesanan='$rows[id_pemesanan]'")or die(mysql_error());
																	while ($isi= mysql_fetch_array($sql)){
																		?>
																		<tr align="center" valign="top"> 
																			<td><p><?php echo $isi['nama_perlengkapan'];?></p></td><span class="help-block"></span>
																			<td><p><?php echo $isi['jumlah_tambahan'];?></p></td><span class="help-block"></span>
																			<td><p><?php echo $isi['satuan'];?></p></td><span class="help-block"></span>
																			<td><p><?php echo "Rp. ". number_format($isi['harga_total'], 0, ".", ".");?></p></td><span class="help-block"></span>
																		</tr>
																	<?php }; ?>
																</tbody>
															</table>
															<!-- AKHIR TABEL PERLENGKAPAN TAMBAHAN-->     
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div><!-- .animated -->
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
						"paging": false,
						"lengthChange": false,
						"searching": false,
						"ordering": false,
						"info": false,
						"autoWidth": true
					});
				});
			</script>
			<script>
				var date = new Date();
				date.setDate(date.getDate());

				$('#date').datepicker({ 
					startDate: date
				});
			</script>
		</body>
		</html>
