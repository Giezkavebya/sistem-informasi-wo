<?php
include "../koneksi.php";
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Kelola Pengeluaran</title>
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
							<h1 class="m-0 text-dark">Kelola Pengeluaran</h1>
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
									<button type="button" class="btn btn-secondary mb-3" data-toggle="modal" data-target="#Tambahpengeluaran">
										Tambah Data Pengeluaran
									</button>
									<a href="laporan/laporan_pengeluaran.php" target="_blank" class="btn btn-success mb-3">
										Cetak Semua Data Pengeluaran
									</a>
									<form action="" method="post">
										<label>Cari Data Pengeluaran Berdasarkan Tanggal  : </label>
										<input type="date" name="tgl1">
										<input type="date" name="tgl2">
										<input type="submit" name="tampilkan" value="TAMPILKAN" class="btn-secondary">
									</form>
									<?php 
									if(isset($_POST['tampilkan'])){
										$tgl1 = $_POST["tgl1"];
										$tgl2 =$_POST["tgl2"];
										$sql = mysql_query("SELECT * FROM pengeluaran WHERE tanggal_pengeluaran BETWEEN '$tgl1' AND '$tgl2'");
										if(mysql_num_rows($sql)!=0){
											echo'<label>Pengeluaran Tanggal : '.$tgl1.' s/d '.$tgl2.' </label><p>';
											echo'<a style="margin-bottom:10px" href="laporan/laporan_pengeluaran_tgl.php?tanggal_awal='.$tgl1.'&tanggal_akhir='.$tgl2.'" target="_blank" class="btn btn-success"><span class="glyphicon glyphicon-print"></span>Cetak Data Pengeluaran</a>';
										}
										
										?>
										<?php
									}else{
										
									}
									?>
									<br/>
								</div>
							</div>
							<div class="card border-dark mb-3" style="max-width: 100rem;">
								<div class="card-body text-dark">
									<tr>
										<td colspan="7">
											<?php 
											if(isset($_POST["tampilkan"])){
												$dt1 = $_POST["tgl1"];
												$dt2 = $_POST["tgl2"];
												$x=mysql_query("select sum(total) as total from pengeluaran where tanggal_pengeluaran BETWEEN '$dt1' AND '$dt2'");	
												$xx=mysql_fetch_array($x);			
												echo "<td><h5>Total Pengeluaran  : <b> Rp.". number_format($xx['total']).",-</b></h5></td>";
											}else{
												$x=mysql_query("select sum(total) as total from pengeluaran");	
												$xx=mysql_fetch_array($x);			
												echo "<td><h5>Total Pengeluaran  : <b> Rp.". number_format($xx['total']).",-</b></h5></td>";
											}
											?>
										</td></tr>
									</div>
								</div>
								<div class="card">
									<div class="card-header">
										<h3 class="card-title">Tabel Pengeluaran</h3>
									</div>

									<!-- /.card-header -->
									<div class="card-body">
										<!-- AWAL PROSES TAMBAH LAYANAN -->
										<div class="modal fade" id="Tambahpengeluaran" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
											<div class="modal-dialog" role="document">
												<div class="modal-content">
													<div class="modal-header">
														<h5 class="modal-title" id="largeModalLabel">Tambah Data Pengeluaran</h5>
														<button type="button" class="close" data-dismiss="modal" aria-label="Close">
															<span aria-hidden="true">&times;</span>
														</button>
													</div>
													<div class="modal-body">
														<div class="row">
															<div class="col-lg-12">
																<div class="card">
																	<div class="card-body card-block">
																		<form enctype='multipart/form-data' action="../file-aksi/aksi-tambah/aksi_tambah_pengeluaran.php" method="POST" id="form-pengeluaran">	 	    
																			<div class="form-group">
																				<label for="ket_pengeluaran" class=" form-control-label">Keterangan Pengeluaran</label>
																				<small>*Sertakan jumlah jika ada</small> 
																				<input type="text" id="ket_pengeluaran" name="ket_pengeluaran" required="required" placeholder="Keterangan Pengeluaran" class="form-control">
																				<span class="help-block"></span>
																			</div>  
																			<div class="form-group">
																				<label for="harga" class=" form-control-label">Harga/satuan</label>
																				<input type="text" id="rupiah" name="harga" required="required" placeholder="Harga" class="form-control">
																				<span class="help-block"></span>
																			</div>    
																			<div class="form-group">
																				<label for="total" class=" form-control-label">Total Harga</label>
																				<input type="text" id="rupiah1" name="total" required="required" placeholder="Total Harga" class="form-control">
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
										<!-- AKHIR PROSES TAMBAH LAYANAN -->
										<!-- /.col -->
										<?php
										if(isset($_POST["tampilkan"])){
											$dt1 = $_POST["tgl1"];
											$dt2 = $_POST["tgl2"];


											$sql = mysql_query("SELECT * FROM pengeluaran WHERE tanggal_pengeluaran BETWEEN '$dt1' AND '$dt2'");
										}else{
											$sql=mysql_query("SELECT * FROM pengeluaran order by tanggal_pengeluaran desc");
										}

										echo "
										<table id='example2' class='table table-bordered table-striped'>
										<thead>
										<tr align='center' valign='top'>
										<th scope='col'>No.</th>
										<th scope='col'>Keterangan</th>
										<th scope='col'>Harga/satuan</th>
										<th scope='col'>Total</th>
										<th scope='col'>Tanggal Pengeluaran</th>
										<th scope='col'>Aksi</th>
										</tr>
										</thead>
										<tbody>";
										$no = 1;

										while($data = mysql_fetch_array($sql)){?>
											<tr align="center" valign="top">
												<td><?php echo $no; ?></td>
												<td><?php echo $data['ket_pengeluaran']; ?></td>
												<td><?php echo "Rp. ". number_format($data['harga'], 0, ".", ".");?> </td>
												<td><?php echo "Rp. ". number_format($data['total'], 0, ".", ".");?> </td>
												<td><?php echo $data['tanggal_pengeluaran']; ?></td>
												<td>  <a class="btn btn-danger" title= "Hapus" href="../file-aksi/aksi-hapus/hapus_pengeluaran.php?id=<?php echo $data['id_pengeluaran'];?>"onclick="return confirm('Apakah anda yakin ingin menghapus data?');">Hapus</a></td>
											</tr>
											<?php $no++; ?>
										<?php }
										echo "</tbody>
										</table>";
										?>
									</div>
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
					<script type="text/javascript">
						var rupiah = document.getElementById("rupiah");
						rupiah.addEventListener("keyup", function(e) {
  // tambahkan 'Rp.' pada saat form di ketik
  // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
  rupiah.value = formatRupiah(this.value, "Rp. ");
});

						/* Fungsi formatRupiah */
						function formatRupiah(angka, prefix) {
							var number_string = angka.replace(/[^,\d]/g, "").toString(),
							split = number_string.split(","),
							sisa = split[0].length % 3,
							rupiah = split[0].substr(0, sisa),
							ribuan = split[0].substr(sisa).match(/\d{3}/gi);

  // tambahkan titik jika yang di input sudah menjadi angka ribuan
  if (ribuan) {
  	separator = sisa ? "." : "";
  	rupiah += separator + ribuan.join(".");
  }

  rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
  return prefix == undefined ? rupiah : rupiah ? "Rp. " + rupiah : "";
}

</script>
<script type="text/javascript">
	var rupiah1 = document.getElementById("rupiah1");
	rupiah1.addEventListener("keyup", function(e) {
  // tambahkan 'Rp.' pada saat form di ketik
  // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
  rupiah1.value = formatRupiah(this.value, "Rp. ");
});

	/* Fungsi formatRupiah */
	function formatRupiah(angka, prefix) {
		var number_string = angka.replace(/[^,\d]/g, "").toString(),
		split = number_string.split(","),
		sisa = split[0].length % 3,
		rupiah1 = split[0].substr(0, sisa),
		ribuan = split[0].substr(sisa).match(/\d{3}/gi);

  // tambahkan titik jika yang di input sudah menjadi angka ribuan
  if (ribuan) {
  	separator = sisa ? "." : "";
  	rupiah1 += separator + ribuan.join(".");
  }

  rupiah1 = split[1] != undefined ? rupiah1 + "," + split[1] : rupiah1;
  return prefix == undefined ? rupiah1 : rupiah1 ? "Rp. " + rupiah1 : "";
}

</script>						
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
