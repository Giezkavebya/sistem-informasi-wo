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
					<div class="card-header bg-transparent border-success">Pemesanan Paket  <span class="badge badge-pill badge-info" style="margin-right: 100px;">Tanggal Pemesanan : <?=date ('d - m - Y', strtotime ($tanggal_pesan));?></span></div>
					<div class="card-group">
						<div class="card">
							<div class="card-body">
								<center>
									<p class="card-title" style="font-weight: bold;">Total Pembayaran</p>
									<h2 class="card-text" style="background-color:#FFEFD5;"><?php echo "Rp. ". number_format($rows['harga_total'], 0, ".", ".");?> </h2>
									<p style="margin-top: 30px; font-weight: bold;" class="card-title">Sisa Pembayaran</p>
									<h2 class="card-text" style="background-color:#F0FFFF;"><?php echo "Rp. ". number_format($rows['sisa_pembayaran'], 0, ".", ".");?> </h2>
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
								<div class="card-footer bg-transparent border-success">
								<p style="font-style: italic; font-size: 12px;">Catatan : Jika terdapat perubahan terhadap data pemesanan dapat segera menghubungi kontak Caricacan and Team</p>
							</div>
						</div>
					</div>
				</div>


				<!--================ BAGIAN BAWAH =================-->
				<div class="row" style="margin-top: 85px; margin-left: 120px;">
					<div class="col-sm-5">
						<div class="card">
							<div class="card-header bg-transparent border-success">Pilihan Pembayaran</div>
							<div class="card-body">
								<ul class="list-group list-group-flush">
									<li class="list-group-item">
										<?php
										$sql=mysql_query("SELECT harga_total from pemesanan WHERE id_pemesanan='$id_pemesanan'");
										$row=mysql_fetch_array($sql);
										$count = $row['harga_total'];
										$harga_akhir=(20/100) * $count;
										?>

										<?php 
										$sql = mysql_query("SELECT sisa_pembayaran, harga_total from pemesanan where id_pemesanan='$id_pemesanan'");
										$num = mysql_fetch_array($sql);
										$sisa = $num['sisa_pembayaran'];
										$total = $num['harga_total'];
										if($sisa !== $total){
											echo'<p></p>';
										} else {
											echo '<p class="mt-0 mb-1" style="font-size: 15px;">Pembayaran awal minimal anda adalah :</p>
											';
											echo 'Rp.' . number_format($harga_akhir, 0, ".", ".");
											echo'<p style="font-size: 12px;">(20% dari harga total)</p>
											<a class="list-group-item list-group-item-action">
											<center>
											<p class="mb-1" style="text-align: center;">Lakukan Pembayaran Awal</p>
											<button class="btn btn-primary" data-toggle="modal" data-target="#Tambahpembayaranawal">Unggah Bukti Pembayaran</button></center>
											</a>';
										}
										?>
									</li>
									<?php 
									$no=1;
									$sql = mysql_query("SELECT * FROM pembayaran WHERE id_pemesanan='$id_pemesanan'")or die(mysql_error());
									while ($a= mysql_fetch_array($sql)){
										?>
										<li class="list-group-item">
											<?php
											$sql=mysql_query("SELECT SUM(jumlah_pembayaran) AS total from pembayaran WHERE id_pemesanan='$id_pemesanan' AND validasi_pembayaran = 'Ya'")or die(mysql_error());
											$row=mysql_fetch_array($sql);
											$semua = $row['total'];
											?>
											<p class="card-title" style="font-size: 16px; font-weight: bold;">Total pembayaran yang telah dilakukan : </p>
											<p style="text-align: center;"><?php echo "Rp. ". number_format($semua, 0, ".", ".");?></p> 

											<a class="list-group-item list-group-item-action">
												<small><?=date ('d - m - Y', strtotime ($a['tanggal_pembayaran']));?></small>
												<div class="d-flex w-100 justify-content-between">
													<h5 class="mb-1">Pembayaran Ke- <?php echo $no; ?></h5>
													<p><?php echo "Rp. ". number_format($a['jumlah_pembayaran'], 0, ".", ".");?></p>
												</div>
												<p style="margin-top: -20px; margin-left: 10px;">Status Valid 
													<?php 
													$sql=mysql_query("SELECT validasi_pembayaran from pembayaran WHERE id_pemesanan='$id_pemesanan'");
													$row=mysql_fetch_array($sql);
													$valid = $row['validasi_pembayaran'];
													if($valid == 'Ya'){
														echo'<span class="badge badge-primary badge-pill">';
													} else {
														echo'<span class="badge badge-danger badge-pill">';
													}
													?>
													<?php echo $a['validasi_pembayaran'];?></span></p>
												</a>
											</li>
											<?php $no++;}; ?>
											<li class="list-group-item">
												<?php 
												$sql = mysql_query("SELECT tanggal_acara from jadwal_acara where id_pemesanan='$id_pemesanan' order by tanggal_acara ASC LIMIT 1");
												$num = mysql_fetch_array($sql);
												$tanggalacara = $num['tanggal_acara'];
												$hari_ini =  date("Y-m-d");
												$start = strtotime($tanggalacara);
												$end = strtotime($hari_ini);
												$timeDiff = abs($end - $start);
												$numberDays = $timeDiff/86400; 
												$numberDays = intval($numberDays);
												if($numberDays <= 3){
													echo 'Mohon segera lakukan pembayaran lunas sebelum tanggal : '  .date ('d - m - Y', strtotime ($tanggalacara));
												} else {
													echo'<p></p>';
												}
												?>
											</li>
											<li class="list-group-item">
												<?php 
												$sql = mysql_query("SELECT sisa_pembayaran from pemesanan where id_pemesanan='$id_pemesanan' AND validasi_pemesanan='Ya'");
												$num = mysql_fetch_array($sql);
												$sisa = $num['sisa_pembayaran'];
												if($sisa == 0){
													echo'<p></p>';
												} else {
													echo'<a class="list-group-item list-group-item-action">
													<center>
													<p class="mb-1" style="text-align: center;">Lakukan Pembayaran Selanjutnya</p>
													<button class="btn btn-primary" data-toggle="modal" data-target="#Tambahpembayaran">Unggah Bukti Pembayaran</button></center>
													</a>';
												}
												?>
											</li>
										</ul>
									</div>
								</div>
							</div>
							<!-- AWAL POP UP TAMBAH PEMBAYARAN AWAL-->
							<div class="modal fade" id="Tambahpembayaranawal" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="largeModalLabel">Tambah Pembayaran</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
										<div class="modal-body">
											<div class="row">
												<div class="col-lg-12">
													<div class="card">
														<form enctype='multipart/form-data' action="file-aksi/aksi_tambah_pembayaranawal.php" method="POST" id="form-pembayaran">  
															<div class="card-body card-block">
																<input type="hidden" name="id_pemesanan" class="form-control" value="<?php echo $id_pemesanan?>">
																<input type="hidden" name="sisa_pembayaran" class="form-control" value="<?php echo $sisa_pembayaran?>">
																<div class="form-group">
																	<label for="jumlah_pembayaran" class=" form-control-label">Jumlah Pembayaran</label>
																	<input type="text" id="rupiah" name="jumlah_pembayaran" placeholder="Jumlah Pembayaran" required="required" class="form-control">
																	<span class="help-block"></span>
																</div>     
																<div class="form-group">
																	<label for="bukti_pembayaran" class=" form-control-label">Foto Bukti Pembayaran</label>
																	<input type="file" name="bukti_pembayaran" id="bukti_pembayaran" >
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
							<!-- AKHIR POP UP TAMBAH PEMBAYARAN AWAL -->
							<!-- AWAL POP UP TAMBAH PEMBAYARAN-->
							<div class="modal fade" id="Tambahpembayaran" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="largeModalLabel">Tambah Pembayaran</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
										<div class="modal-body">
											<div class="row">
												<div class="col-lg-12">
													<div class="card">
														<form enctype='multipart/form-data' action="file-aksi/aksi_tambah_pembayaran.php" method="POST" id="form-pembayaran1">  
															<div class="card-body card-block">
																<input type="hidden" name="id_pemesanan" class="form-control" value="<?php echo $id_pemesanan?>">
																<input type="hidden" name="sisa_pembayaran" class="form-control" value="<?php echo $sisa_pembayaran?>">
																<div class="form-group">
																	<label for="jumlah_pembayaran" class=" form-control-label">Jumlah Pembayaran</label>
																	<input type="text" id="rupiah" name="jumlah_pembayaran" placeholder="Jumlah Pembayaran" required="required" class="form-control">
																	<span class="help-block"></span>
																</div>     
																<div class="form-group">
																	<label for="bukti_pembayaran" class=" form-control-label">Foto Bukti Pembayaran</label>
																	<input type="file" name="bukti_pembayaran" id="bukti_pembayaran" >
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
							<!-- AKHIR POP UP TAMBAH PEMBAYARAN-->
							<div class="col-sm-4" style="margin-left: 120px;">
								<div class="card">
									<div class="card-header bg-transparent border-success">Transfer Details</div>
									<div class="card-body">
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
									</div>
									<div class="card-footer bg-transparent border-success">
										<a style="font-style: italic;">Ketentuan Pembayaran dan Pemesanan</a>
										<button type="button" class="btn btn-outline-dark" data-toggle="modal" data-target="#Datainfo" title="Ketentuan Pembayaran dan Pemesanan"><i class="fa fa-info"></i>
										</button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<!-- AWAL POP UP INFO-->

				<div class="modal fade" id="Datainfo" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
					<div class="modal-dialog modal-lg" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="largeModalLabel">Ketentuan Pembayaran</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<div class="container">
									<div class="slide-one-item home-slider owl-carousel">
										<div class="card mb-3" style="max-width: 1000px;">
											<div class="row no-gutters">
												<div class="col-md-8">
													<div class="card-body">
														<?php
														$sql=mysql_query("SELECT * from alur_pemesanan WHERE id_alur='4'");
														$row=mysql_fetch_array($sql);
														?>
														<h5 class="card-title"><?php echo $row['judul_alur'];?></h5>
														<p style="font-size: 10px;"><?php echo $row['isi_alur'];?></p>
													</div>
												</div>
												<div class="col-md-4">
													<img src="../images/ilustrasi3.jpg" style="width: 500px; height: 500px;" class="card-img" alt="...">
												</div>
											</div>
										</div>
										<div class="card mb-3" style="max-width: 1000px;">
											<div class="row no-gutters">
												<div class="col-md-8">
													<div class="card-body">
														<?php
														$sql=mysql_query("SELECT * from alur_pemesanan WHERE id_alur='4'");
														$row=mysql_fetch_array($sql);
														?>
														<h5 class="card-title"><?php echo $row['judul_alur'];?></h5>
														<p style="font-size: 10px;"><?php echo $row['isi_alur'];?></p>
													</div>
												</div>
												<div class="col-md-4">
													<img src="../images/ilustrasi2.png" style="width: 500px; height: 500px; margin-right: 100px;" class="card-img" alt="...">
												</div>
											</div>
										</div>
									</div>
								</div>

							</div>
						</div>
					</div>
				</div>
				<!-- AKHIR POP UP INFO -->

				<!--================Header Menu Area =================-->  
				<?php 
				include'footer_pelanggan.php';
				?>
				<script type="text/javascript">
					var rupiah = document.getElementById("rupiah");
					rupiah.addEventListener("keyup", function(e) {

						rupiah.value = formatRupiah(this.value, "Rp. ");
					});

					function formatRupiah(angka, prefix) {
						var number_string = angka.replace(/[^,\d]/g, "").toString(),
						split = number_string.split(","),
						sisa = split[0].length % 3,
						rupiah = split[0].substr(0, sisa),
						ribuan = split[0].substr(sisa).match(/\d{3}/gi);
						if (ribuan) {
							separator = sisa ? "." : "";
							rupiah += separator + ribuan.join(".");
						}

						rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
						return prefix == undefined ? rupiah : rupiah ? "Rp. " + rupiah : "";
					}

				</script>
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