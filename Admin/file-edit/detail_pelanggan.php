<?php
include "../koneksi.php";
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Data Pelanggan</title>
	<link rel="icon" href="../../images/logocari.png" type="image/png">
	<!-- Tell the browser to be responsive to screen width -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../plugins/font-awesome/css/font-awesome.min.css">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="../dist/css/adminlte.min.css">
	<!-- Google Font: Source Sans Pro -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
	<div class="wrapper">
		<!-- Navbar -->

		<?php 
		include'sidebar.php';
		?>

		<?php
		$sql="select * from pelanggan where id_pelanggan='$_GET[id]'";
		$query=mysql_query($sql);
		$rows=mysql_fetch_array($query);
		$id_pelanggan = $rows['id_pelanggan'];
		$nama_pelanggan = $rows['nama_pelanggan'];
		$nama_pasangan= $rows['nama_pasangan'];
		$alamat= $rows['alamat'];
		$no_telp= $rows['no_telp'];
		$konsep_pernikahan= $rows['konsep_pernikahan'];
		$username= $rows['username'];
		$pass= $rows['pass'];
		?>
		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<!-- Main content -->
			<section class="content">
				<div class="container-fluid">
					<div class="row">

						<!-- /.col -->
						<div class="col-md-12">
							<div class="card">
								<div class="card-header p-2">
									<ul class="nav nav-pills">
										<li class="nav-item"><a class="nav-link active" href="#data" data-toggle="tab">Detail Data Pelanggan</a></li>
									</ul>
								</div><!-- /.card-header -->

								<div class="tab-content">
									<div class="active tab-pane" id="data">
										<div class="card-body card-block">
											<form id="form-pelanggan">
												<div class="form-group">
													<label for="id_pelanggan" class=" form-control-label">ID Pelanggan</label>
													<input type="text" id="id_pelanggan" name="id_pelanggan"  placeholder="ID Pelanggan" class="form-control" value="<?php echo $id_pelanggan; ?>" disabled>
													<span class="help-block">
													</span>
												</div>
												<div class="form-group">
													<label for="user" class=" form-control-label">Username</label>
													<input type="text" id="username" name="username"  placeholder="Username" class="form-control" value="<?php echo $username; ?>" disabled>
													<span class="help-block">
													</span>
												</div>
												<div class="form-group">
													<label for="nama_pelanggan" class=" form-control-label">Nama Pelanggan</label>
													<input type="text" id="nama_pelanggan" name="nama_pelanggan" placeholder="Nama Pelanggan" class="form-control" value="<?php echo $nama_pelanggan; ?>"disabled>
													<span class="help-block">
													</span>
												</div>
												<div class="form-group">
													<label for="nama_pasangan" class=" form-control-label">Nama Pasangan</label>
													<input type="text" id="nama_pasangan" name="nama_pasangan"  placeholder="Nama Pasangan" class="form-control"value="<?php echo $nama_pasangan; ?>"disabled>
													<span class="help-block">
													</span>
												</div>
												<div class="form-group">
													<label for="alamat" class=" form-control-label">Alamat</label>
													<input type="text" id="alamat" name="alamat" placeholder="Alamat" class="form-control"value="<?php echo $alamat; ?>"disabled>
													<span class="help-block">
													</span>
												</div>                  
												<div class="form-group">
													<label for="no_telp" class=" form-control-label">No.Telepon</label>
													<input type="text" id="no_telp" name="no_telp" placeholder="No.Telepon" class="form-control"value="<?php echo $no_telp; ?>" disabled>
													<span class="help-block">
													</span>
												</div> 
												<div class="form-group">
													<label for="konsep_pernikahan" class=" form-control-label">Konsep Pernikahan</label>
													<textarea type="text" id="konsep_pernikahan" name="konsep_pernikahan" rows="5" placeholder="Konsep Pernikahan" class="form-control" value=""disabled><?php echo $konsep_pernikahan; ?></textarea>
													<span class="help-block">
													</span>
												</div> 
											</div>
										</form>
									</div>
									<div class="tab-pane" id="user">


									</div>

									<!-- /.tab-pane -->
								</div>
								<!-- /.tab-content -->

							</div>
							<!-- /.nav-tabs-custom -->
						</div>
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
	<!-- Bootstrap 4 -->
	<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
	<!-- FastClick -->
	<script src="../plugins/fastclick/fastclick.js"></script>
	<!-- AdminLTE App -->
	<script src="../dist/js/adminlte.min.js"></script>
	<!-- AdminLTE for demo purposes -->
	<script src="../dist/js/demo.js"></script>
</body>
</html>
