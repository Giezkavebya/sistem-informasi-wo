  <?php
  include "../koneksi.php";
  session_start();
  if( ! isset($_SESSION['username'])){ // Jika tidak ada session username berarti dia belum login
    header("location: login.php"); // Kita Redirect ke halaman index.php karena belum login
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
	<link href='https://fonts.googleapis.com/css?family=Josefin Sans' rel='stylesheet'>
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
		<div class="site-blocks-cover inner-page-cover overlay" style="background-image: url(../images/pembayaran.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
			<div class="container">
				<div class="row align-items-center justify-content-center text-center">
					<div class="col-md-10" data-aos="fade-up" data-aos-delay="400">
						<div class="row justify-content-center mt-5">
						</div>
					</div>
				</div>
			</div>
		</div>  

		<?php
		$sql="SELECT * from pemesanan where id_pelanggan='$_SESSION[id_pelanggan]' AND sisa_pembayaran IS NOT NULL";
		$query=mysql_query($sql);
		$rows=mysql_fetch_array($query);
		$id_pemesanan=$rows['id_pemesanan'];
		$id_paket=$rows['id_paket'];
		$id_gedung = $rows['id_gedung'];
		$harga_total = $rows['harga_total'];
		$sisa_pembayaran = $rows['sisa_pembayaran'];
		$tanggal_pesan = $rows['tanggal_pesan'];
		?>

		<div class="site-section">
			<div class="container-fluid">
				<div class="card" style="margin-top: -450px; width: 78%; margin-left: 120px;">
					<div class="card-header bg-transparent border-success">Pemesanan Paket  <span class="badge badge-pill badge-info">Pembayaran</span></div>
					<div class="card-group">
						<div class="card">
							<div class="card-body">
								<center>
									<p class="card-title">Total Pembayaran</p>
									<h2 class="card-text" style="background-color:#FFEFD5;"><?php echo "Rp. ". number_format($rows['harga_total'], 0, ".", ".");?> </h2>
								</center>					
							</div>
							<div class="accordion" id="accordionExample2">
								<?php 
								$sql = mysql_query("SELECT * from tambahan_perlengkapan where id_pemesanan='$rows[id_pemesanan]'");
								if(mysql_num_rows($sql)!=0) {
									echo'<div class="card-header" id="headingThree">
									<h5 class="mb-0">
									<a class="" style="color: black;" type="text" href="" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree"> Total Harga Perlengkapan Tambahan
									</a>
									</h5>
									</div>';
								} else {
									echo'<p></p>';
								}
								?>
								<div id="collapseThree" class="collapse show" aria-labelledby="headingThree" data-parent="#accordionExample2">
									<div class="card-body">
										<!-- AWAL TABEL PERLENGKAPAN TAMBAHAN-->
										<table id="example1" style="font-size: 16px; width: 100%;" cellpadding="7">
											<tbody>
												<?php 
												$sql = mysql_query("SELECT perlengkapan.nama_perlengkapan, perlengkapan.satuan,tambahan_perlengkapan.jumlah_tambahan, tambahan_perlengkapan.id_tambahan, perlengkapan.harga_perlengkapan*tambahan_perlengkapan.jumlah_tambahan AS harga_total FROM tambahan_perlengkapan JOIN perlengkapan ON tambahan_perlengkapan.id_perlengkapan=perlengkapan.id_perlengkapan JOIN pemesanan ON tambahan_perlengkapan.id_pemesanan=pemesanan.id_pemesanan WHERE tambahan_perlengkapan.id_pemesanan='$id_pemesanan'")or die(mysql_error());
												while ($isi= mysql_fetch_array($sql)){
													?>
													<tr> 
														<td><span><?php echo $isi['nama_perlengkapan'];?></span></td>
														<td><span><?php echo $isi['jumlah_tambahan'];?></span></td>
														<td><span><?php echo $isi['satuan'];?></span></td>
														<td><span style="background-color: #FFDAB9;"> <?php echo "Rp. ". number_format($isi['harga_total'], 0, ".", ".");?></span></td>
													</tr>
												</tbody>
											<?php }; ?>
										</table>
										<!-- AKHIR TABEL PERLENGKAPAN TAMBAHAN-->   
									</div>
								</div>
							</div>							
						</div>
						<div class="card">
							<div class="card-header bg-transparent border-success">Detail Pemesanan</div>
							<div class="accordion" id="accordionExample">
								<div class="card">
									<?php 
									$sql = mysql_query("SELECT * from paket JOIN pemesanan ON paket.id_paket=pemesanan.id_paket WHERE pemesanan.id_paket='$id_paket' AND pemesanan.id_pemesanan='$id_pemesanan'")or die(mysql_error());
									while ($isi= mysql_fetch_array($sql)){
										?>
										<div class="card-header" id="headingOne">
											<h5 class="mb-0">
												<a class="" style="color: black;" type="text" href="" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
													Paket : <?php echo $isi['nama_paket'];?>
												</a>
											</h5>
										</div>

										<div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
											<div class="card-body">
												<!-- AWAL TABEL PERLENGKAPAN TAMBAHAN-->
												<table id="example1" style="margin-left: 5px; font-size: 16px; width: 120%;" cellpadding="-2" cellspacing="1">
													<tbody>
														<tr> 
															<td><p>Jumlah Tamu</p></td>
															<td><p>: <?php echo $isi['jumlah_tamu'];?> Orang</p></td>
														</tr>
														<tr>
															<td><p>Jumlah Hari</p></td>
															<td><p>: <?php echo $isi['jumlah_hari'];?> Hari</p></td>
														</tr>
														<tr>
															<td><p>Jumlah Team</p></td>
															<td><p>: <?php echo $isi['jumlah_team'];?> Orang</p></td>
														</tr>
														<tr>
															<td><p>Jumlah Acara</p></td>
															<td><p>: <?php echo $isi['jumlah_acara'];?> Acara</p></td>
														</tr>
														<tr>
															<td><p>Harga Paket</p></td><span class="help-block"></span>
															<td>: <span style="background-color: #FFDAB9;"> <?php echo "Rp. ". number_format($isi['harga_paket'], 0, ".", ".");?></span></td>
														</tr>
													</tbody>
												<?php }; ?>
											</table>
											<!-- AKHIR TABEL PERLENGKAPAN TAMBAHAN-->	
										</div>
									</div>
								</div>
							</div>
							<div class="accordion" id="accordionExample1">
								<div class="card">
									<div class="card-header" id="headingTwo">
										<h5 class="mb-0">
											<a style="color: black;" type="text" href="" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
												Jadwal Acara
											</a>
										</h5>
									</div>
									<div id="collapseTwo" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample1">
										<div class="card-body">
											<!-- AWAL TABEL JADWAL ACARA -->
											<table id="example1" style="margin-left: 5px; font-size: 18px; width: 100%" cellpadding="5">
												<tbody>
													<?php 
													$sql = mysql_query("SELECT * FROM jadwal_acara JOIN pemesanan ON jadwal_acara.id_pemesanan=pemesanan.id_pemesanan WHERE pemesanan.id_pemesanan='$id_pemesanan'")or die(mysql_error());
													while ($isi= mysql_fetch_array($sql)){
														?>
														<tr align="center" valign="top"> 
															<td><p><?php echo $isi['nama_acara'];?></p></td><span class="help-block"></span>
															<td><p><?=date ('d - m - Y', strtotime ($isi['tanggal_acara']));?></p></td><span class="help-block"></span> 
														</tr>
													<?php }; ?>
												</tbody>
											</table>
											<!-- AKHIR TABEL JADWAL ACARA-->      
										</div>
									</div>
								</div>
							</div>
							<div class="card-footer bg-transparent border-success">
								<?php
								$sql=mysql_query("SELECT * from pemesanan JOIN gedung  ON pemesanan.id_gedung=gedung.id_gedung WHERE pemesanan.id_pemesanan='$id_pemesanan'");
								$row=mysql_fetch_array($sql);
								?>
								<table style="width: 100%;">
									<tbody>
										<tr>
											<td style="font-size: 16px; color: #000000;  font-weight: bold;">Gedung</td>
											<td style="font-size: 16px; color: #000000;  font-weight: bold;"> : <?php echo $row['nama_gedung'];?></td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
					<div class="card-footer bg-transparent border-success">
						<p style="font-size: 15px; font-style: italic; color: red; margin-left: 100px; margin-bottom: 4px;">Mohon periksa kembali data pemesanan anda, atau kembali untuk mengubah data</p><a class="btn btn-primary" name ="tambah" href="pemesanan_paket.php?id=<?php echo $id_paket;?>" type="submit" title="Kembali Ke Menu Pemesanan" style="margin-top: -60px; margin-left: 700px;">
							<i class="fa fa-arrow-circle-left"></i> Kembali Ke Menu Pemesanan
						</a>
					</div>
				</div>


				<!--================ BAGIAN BAWAH =================-->
				<div class="row" style="margin-top: 85px; margin-left: 120px;">
					<div class="col-sm-5">
						<div class="card">
							<div class="card-header bg-transparent border-success">Info Pembayaran</div>
							<div class="card-body">
								<ul class="list-group list-group-flush">
									<li class="list-group-item">
										<?php
										$sql=mysql_query("SELECT harga_total from pemesanan WHERE id_pemesanan='$id_pemesanan'");
										$row=mysql_fetch_array($sql);
										$count = $row['harga_total'];
										$harga_akhir=(20/100) * $count;
										?>
										<p class="mt-0 mb-1" style="text-align:center; font-size: 15px;">Pembayaran awal minimal anda adalah :</p>
										<h5 class="mt-0 mb-1" style="text-align: center;"><?php echo "Rp. ". number_format($harga_akhir, 0, ".", ".");?></h5>
										<p style="text-align: center; font-size: 12px;">(20% dari harga total)</p>
									</li>
									<li class="list-group-item">
										<h5 class="card-title">Transfer Details</h5>
										<ul class="list-unstyled">
											<li class="media">
												<img src="../images/bca.png" style="width: 60px; height: 60px;"class="mr-3" alt="...">
												<div class="media-body">
													<small class="mt-0 mb-1">Bank BCA</small>
													<h6 class="mt-0 mb-1">9978827188919</h6>
													<p style="font-size: 15px;">Caricacan and Team</p>
												</div>
											</li>
											<li class="media my-4">
												<img src="../images/mandiri.png" style="width: 60px; height: 60px;" class="mr-3" alt="...">
												<div class="media-body">
													<small class="mt-0 mb-1">Bank Mandiri</small>
													<h6 class="mt-0 mb-1">9978827188919</h6>
													<p style="font-size: 15px;">Caricacan and Team</p>
												</div>
											</li>
										</ul>
									</li>
								</ul>
							</div>
							<div class="card-footer bg-transparent border-success">
								<center><a class="btn btn-primary btn-lg" href="profil_pelanggan.php" style="margin-top: -3px;" title="Simpan" style="margin-top: 10px;">Selesai <li class="fa fa-check"></li></a></center>
							</div>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="card">
							<div class="card-header bg-transparent border-success">Ketentuan Pembayaran</div>
							<div class="card-body">
								<?php
								$sql=mysql_query("SELECT * from alur_pemesanan WHERE id_alur='4'");
								$row=mysql_fetch_array($sql);
								?>
								<h5 class="card-title"><?php echo $row['judul_alur'];?></h5>
								<p style="font-size: 13px;"><?php echo $row['isi_alur'];?></p>

							</div>
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
	</body>
	</html>