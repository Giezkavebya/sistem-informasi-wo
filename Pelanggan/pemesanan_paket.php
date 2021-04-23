  <?php
  date_default_timezone_set('Asia/Jakarta');
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
		<!-- AWAL POP UP INFO-->

		<div class="modal fade" id="Datainfo" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header">
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
												$sql=mysql_query("SELECT * from alur_pemesanan WHERE id_alur='5'");
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
												$sql=mysql_query("SELECT * from alur_pemesanan WHERE id_alur='6'");
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
								<div class="card mb-3" style="max-width: 1000px;">
									<div class="row no-gutters">
										<div class="col-md-8">
											<div class="card-body">
												<?php
												$sql=mysql_query("SELECT * from alur_pemesanan WHERE id_alur='2'");
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

		<?php
		$sql="select * from paket where id_paket='$_GET[id]'";
		$query=mysql_query($sql);
		$rows=mysql_fetch_array($query);
		$id_paket=$rows['id_paket'];
		$nama_paket = $rows['nama_paket'];
		$harga_paket = $rows['harga_paket'];
		$jumlah_hari = $rows['jumlah_hari'];
		$jumlah_acara = $rows['jumlah_acara'];
		$jumlah_tamu = $rows['jumlah_tamu'];
		$jumlah_team= $rows['jumlah_team'];
		$foto_paket= $rows['foto_paket'];
		?>

		<div class="site-section">
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-5">
						<div class="mb-4" style="margin-top: 15px; margin-left: 60px;">
							<div style="margin-bottom: 10px;">
								<a>Ketentuan Pemesanan Paket</a>
								<button type="button" class="btn btn-outline-dark" data-toggle="modal" data-target="#Datainfo"><i class="fa fa-info" data-toggle="tooltip" data-placement="top" title="Info Paket dan Pemesanan"></i>
								</button>
							</div>
							<div>
								<div><img src="../Admin/images/fotopaket/<?php echo $foto_paket;?>" alt="Image" class="img-fluid rounded"  style="width: 62%; height: 62%;"></div>
							</div>
							<?php
							$sql=mysql_query("SELECT MAX(id_pemesanan) AS id_pemesanan from pemesanan");
							$isii=mysql_fetch_array($sql);
							?>
							<div class="card" style="margin-top: 20px; margin-right: 110px; width: 300px;" >
								<?php 
								$sql = mysql_query("SELECT * FROM pemesanan WHERE id_pemesanan='$isii[id_pemesanan]'")or die(mysql_error());
								while ($a= mysql_fetch_array($sql)){
									?>
									<div class="card text-center">
										<div class="card-body">
											<p class="card-text">Total Harga Pemesanan</p>
											<p class="card-text" style="font-size: 16px; color: #000000;  font-weight: bold;"><?php echo "Rp. ". number_format($a['harga_total'], 0, ".", ".");?> </p>
										</div></div>
									<?php }; ?>
								</div>
								<?php 
								$sql = mysql_query("SELECT * from jadwal_acara where id_pemesanan='$isii[id_pemesanan]'");
								$sql1 = mysql_query("SELECT id_gedung from pemesanan where id_pemesanan='$isii[id_pemesanan]'");
								if((mysql_num_rows($sql)!=0) AND (mysql_num_rows($sql1)!=0)) {
									echo'<div class="card-footer" style="margin-top: 20px; margin-right: 110px; width: 300px;">
									<center><a class="btn btn-success btn-lg" href="pembayaran.php" type="" name="selesai" onclick="return alert("Pemesanan anda berhasil disimpan!");"><li class="fa fa-check"></li>Simpan Pemesanan</a></center>
									</div>';
								} else {
									echo'<div class="card-footer" style="margin-top: 20px; margin-right: 110px; width: 300px;">
									<p style="font-size:12px; font-style:italic; color:red;">Data pemesanan anda belum lengkap, Silahkan lengkapi terlebih dahulu</p>
									<center><button class="btn btn-secondary btn-lg" disabled href="" type="" title="Silahkan Lengkapi Data Pemesanan Anda!" name="selesai"><li class="fa fa-check"></li>Simpan Pemesanan</button></center>
									</div>';
								}
								?>
								
							</div>
						</div>
						<!-- AWAL KETERANGAN PAKET -->
						<div class="col-lg-6 ml-auto" style="margin-top: 20px; margin-right: 110px;">
							<div class="card border-light mb-3" style="text-align: center; color: black; font-weight:bold; font-family: 'Josefin Sans';font-size: 22px;">Paket <?php echo $nama_paket;?></div>
							<div class="card-body" style="margin-top: -20px;">
								<div class="col-lg-16 ml-auto" style="margin-top: 20px;">
									<div class="overlap-category mb-5 col-sm-12" style="width: 700px;" >
										<div class="row align-items-stretch no-gutters">
											<div class="col-sm-6 col-md-2 mb-4 mb-lg-0 col-lg-3">
												<a href="#" class="popular-category h-100">
													<span class="icon"><span><img src="../images/love-letter.png" alt="Image" class="img-fluid rounded"  style="width: 55px; height: 55px;"></span></span>
													<span class="caption mb-2 d-block">Tamu</span>
													<span class="number mb-2" style="font-size: 12px;"><?php echo $jumlah_tamu;?> Orang</span>
												</a>
											</div>
											<div class="col-sm-6 col-md-4 mb-4 mb-lg-0 col-lg-3">
												<a href="#" class="popular-category h-100">
													<span class="icon"><span><img src="../images/wedding-day.png" alt="Image" class="img-fluid rounded"  style="width: 55px; height: 55px;"></span></span>
													<span class="caption mb-2 d-block">Hari</span>
													<span class="number mb-2" style="font-size: 12px;"><?php echo $jumlah_hari;?> Hari</span>
												</a>
											</div>

											<div class="col-sm-6 col-md-4 mb-4 mb-lg-0 col-lg-3">
												<a href="#" class="popular-category h-100">
													<span class="icon"><span><img src="../images/bow-tie.png" alt="Image" class="img-fluid rounded"  style="width: 55px; height: 55px;"></span></span></span>
													<span class="caption mb-2 d-block">Team</span>
													<span class="number mb-2"  style="font-size: 12px;">Max <?php echo $jumlah_team;?> Orang</span>
												</a>
											</div>
											<div class="col-sm-6 col-md-4 mb-4 mb-lg-0 col-lg-3">
												<a href="#" class="popular-category h-100">
													<span class="icon"><span><img src="../images/wedding-arch.png" alt="Image" class="img-fluid rounded"  style="width: 55px; height: 55px;"></span></span>
													<span class="caption mb-2 d-block">Jumlah Acara</span>
													<span class="number mb-2"  style="font-size: 12px;"><?php echo $jumlah_acara;?> Acara</span>
												</a>
											</div>
										</div>
									</div>
								</div>
								<div class="card-footer">
									<!-- AWAL PROSES BATAL PEMESANAN -->
									<form  action="file-aksi/hapus_pemesanan.php" method="POST" id="form-hapus-pemesanan">
										<input type="hidden" id="id_paket" name="id_paket" required="required" placeholder="" class="form-control" value="<?php echo $id_paket ?>">
										<input type="hidden" id="id_pemesanan" name="id_pemesanan" placeholder="" class="" value="<?php echo $isii['id_pemesanan'];?>">
										<center><button class="btn btn-danger btn-lg" type="submit" name="hapus"><li class="fa fa-close"></li>Batalkan Pemesanan</button></center>
									</form>
									<!-- AKHIR PROSES BATAL PEMESANAN -->
								</div>
							</div>
							<!-- AWAL PROSES TAMBAH GEDUNG-->
							<div class="border p-3 rounded mb-2" style="margin-left: 2px;">
								<a data-toggle="collapse" href="#collapse-2" role="button" aria-expanded="false" aria-controls="collapse-2" class="accordion-item h5 d-block mb-0" style="margin-left: 20px;"><i class="fa fa-sort" style="color: #f06595;"></i> Pilih Gedung</a>
								<div class="collapse" id="collapse-2">
									<div class="card" style="width: 38rem; margin-top: 10px; ">
										<div class="card-body">
											<p class="card-text">Pilih Tempat/Gedung Acara Pernikahan</p>
											<small>*Catatan :Pastikan gedung yang anda pilih, telah anda booking terlebih dahulu (Paket diluar pemesanan gedung) </small>
											<form action="file-aksi/aksi_tambah_gedung.php" method="POST" id="form-gedung">
												<input type="hidden" id="id_pemesanan" name="id_pemesanan" placeholder="" class="" value="<?php echo $isii['id_pemesanan'];?>">
												<div class="select-wrap">
													<span class="icon"><span class="icon-keyboard_arrow_down"></span></span>
													<select class="form-control" id="gedung" name="id_gedung">
														<?php
														$sql=mysql_query("SELECT * from pemesanan JOIN gedung  ON pemesanan.id_gedung=gedung.id_gedung where pemesanan.id_pemesanan='$isii[id_pemesanan]'");
														$row=mysql_fetch_array($sql);
														?>
														<option value=""<?php if ($row ['id_gedung']=='0'){ echo "selected"; }?>>--Pilih Gedung/Tempat--</option>
														<option value="<?php echo $row['id_gedung'];?>"<?php if ($row ['id_gedung']!=='0'){ echo "selected"; } ?>><?php echo $row['nama_gedung'];?></option>
														<?php 
														$sql = mysql_query("SELECT * FROM gedung");
														while ($data= mysql_fetch_array($sql)){
															$id_gedung = $data['id_gedung'];
															$nama_gedung = $data ['nama_gedung'];
															?>
															<option value="<?php echo $id_gedung;?>"> <?php echo $nama_gedung;?> </option>
														<?php }; ?>
													</select> 
												</div>
												<input type="hidden" name="id_paket" class="form-control" value="<?php echo $id_paket; ?>">
											</div>
											<div class="card-footer">
												<center><button class="btn btn-primary" name ="tambah"type="submit" title="Simpan Gedung">
													<i class="fa fa-check"></i> Pilih Gedung
												</button></center>
											</div>
										</form>
									</div>
								</div>
							</div>
							<!-- AKHIR PROSES TAMBAH GEDUNG-->
							<!-- AWAL PROSES TAMBAH JADWAL ACARA-->
							<div class="border p-3 rounded mb-2" style="margin-left: 2px;">
								<a data-toggle="collapse" href="#collapse-3" role="button" aria-expanded="false" aria-controls="collapse-2" class="accordion-item h5 d-block mb-0" style="margin-left: 20px;"><i class="fa fa-sort" style="color: #f06595;"></i>Tentukan Jadwal Acara</a>
								<div class="collapse" id="collapse-3">
									<div class="card" style="width: 38rem; margin-top: 10px; ">
										<div class="card-body">
											<?php 
											$sql = mysql_query("SELECT COUNT(*) AS hitung from jadwal_acara where id_pemesanan='$isii[id_pemesanan]'");
											$num = mysql_fetch_array($sql);
											$count = $num['hitung'];
											$sql1 = mysql_query("SELECT jumlah_acara from paket where id_paket='$_GET[id]'");
											$num1 = mysql_fetch_array($sql1);
											$acara_paket = $num1['jumlah_acara'];
											if($count !== $acara_paket){
												echo'<div class="card border-dark mb-3" style="max-width: 100rem;">
												<div class="card-body text-dark">
												<button type="button" class="btn btn-secondary mb-1" data-toggle="modal" data-target="#Tambahacara">
												Tambah Tanggal Acara
												</button></div></div>';
											} else {
												echo'<p></p>';
											}
											?>

											<!-- AWAL POP UP TAMBAH JADWAL -->
											<div class="modal fade" id="Tambahacara" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
												<div class="modal-dialog" role="document">
													<div class="modal-content">
														<div class="modal-header">
															<h5 class="modal-title" id="largeModalLabel">Tambah Jadwal Acara</h5>
															<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																<span aria-hidden="true">&times;</span>
															</button>
														</div>
														<div class="modal-body">
															<div class="row">
																<div class="col-lg-12">
																	<div class="card">
																		<div class="card-body card-block">
																			<form enctype='multipart/form-data' action="file-aksi/aksi_tambah_acara.php" method="POST" id="form-acara">  
																				<input type="hidden" name="id_paket" class="form-control" value="<?php echo $id_paket; ?>">
																				<input type="hidden" id="id_pemesanan" name="id_pemesanan" placeholder="" class="" value="<?php echo $isii['id_pemesanan'];?>">
																				<div class="form-group">
																					<label for="nama_acara" class=" form-control-label">Acara</label>		
																						<span class="icon"><span class="icon-keyboard_arrow_down"></span></span>
																						<select class="form-control" id="nama_acara[]" name="nama_acara[]">
																							<option value="">Pilih Acara</option>
																							<option value="Resepsi">Resepsi</option>
																							<option value="Acara Adat">Acara Adat</option>
																							<option value="Pemberkatan/Akad Nikah">Pemberkatan/Akad Nikah</option>
																							
																						</select> 
																					<input type="text" id="nama_acara[]" name="nama_acara[]" placeholder="Lain-Lain" class="form-control" value="">
																					<span class="help-block"></span>
																				</div>   
																				<div class="form-group">
																					<label for="tanggal_acara" class=" form-control-label">Tanggal</label>
																					<input type="datepicker" id="date" name="tanggal_acara" placeholder="Tanggal Acara" required="required" class="form-control">
																					<span class="help-block"></span>
																				</div> 
																				<div class="form-group">
																					<label for="tanggal_acara" class=" form-control-label">Waktu Acara</label>
																					<input type="time" id="time" name="waktu_acara" placeholder="Waktu Acara" required="required" class="form-control">
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
											<!-- AKHIR POP UP TAMBAH JADWAL -->
											<!-- AWAL TABEL JADWAL ACARA -->
											<table id="example1" style="margin-left: 30px; font-size: 18px; margin-top: 15px;" cellpadding="7">
												<tbody>
													<?php 
													$sql = mysql_query("SELECT * FROM jadwal_acara JOIN pemesanan ON jadwal_acara.id_pemesanan=pemesanan.id_pemesanan WHERE pemesanan.id_pemesanan='$isii[id_pemesanan]'")or die(mysql_error());
													while ($isi= mysql_fetch_array($sql)){
														?>
														<tr align="" valign="top"> 
															<td><li class="fa fa-calendar" style="color: #F08080;"></li></td>
															<td><p><?php echo $isi['nama_acara'];?></p></td><span class="help-block"></span>
															<td><p><?=date ('d - m - Y', strtotime ($isi['tanggal_acara']));?></p></td><span class="help-block"></span> 
															<td><form enctype='multipart/form-data' action="file-aksi/hapus_acara.php" method="POST" id="form-hapusacara">
																<input type="hidden" id="id_paket" name="id_paket" required="required" placeholder="" class="form-control" value="<?php echo $id_paket; ?>">
																<a title= "Hapus" href="file-aksi/hapus_acara.php?id_acara=<?php echo $isi['id_acara'];?>"onclick="return confirm('Apakah anda yakin ingin menghapus acara ini?');"><li class="fa fa-trash" style="color: #F08080;"></li></a>
															</form>
														</td>            
													</tr>
												<?php }; ?>
											</tbody>
										</table>
										<!-- AKHIR TABEL JADWAL ACARA-->   
									</div>
								</div>
							</div>
						</div>
						<!-- AKHIR PROSES TAMBAH JADWAL ACARA-->
						<!-- AWAL PROSES TAMBAH PERLENGKAPAN TAMBAHAN-->
						<div class="border p-3 rounded mb-2" style="margin-left: 2px;">
							<a data-toggle="collapse" href="#collapse-4" role="button" aria-expanded="false" aria-controls="collapse-2" class="accordion-item h5 d-block mb-0" style="margin-left: 20px;"><i class="fa fa-sort" style="color: #f06595;"></i>Tambah Perlengkapan (Opsional)</a>
							<div class="collapse" id="collapse-4">
								<div class="card" style="width: 38rem; margin-top: 10px; ">
									<div class="card-body">
										<div class="card border-dark mb-3" style="max-width: 100rem;">
											<div class="card-body text-dark">
												<button type="button" class="btn btn-secondary mb-1" data-toggle="modal" data-target="#Tambahperlengkapan">
													Tambah Perlengkapan
												</button>
											</div>
										</div>
										<!-- AWAL POP UP TAMBAH PERLENGKAPAN -->
										<div class="modal fade" id="Tambahperlengkapan" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
											<div class="modal-dialog" role="document">
												<div class="modal-content">
													<div class="modal-header">
														<h5 class="modal-title" id="largeModalLabel">Tambah Perlengkapan Tambahan</h5>
														<button type="button" class="close" data-dismiss="modal" aria-label="Close">
															<span aria-hidden="true">&times;</span>
														</button>
													</div>
													<div class="modal-body">
														<div class="row">
															<div class="col-lg-12">
																<div class="card">
																	<div class="card-body card-block">
																		<form enctype='multipart/form-data' action="file-aksi/aksi_tambah_perlengkapan_tambahan.php" method="POST" id="form-perlengkapan"> 
																			<input type="hidden" name="id_paket" class="form-control" value="<?php echo $id_paket; ?>">
																			<input type="hidden" id="id_pemesanan" name="id_pemesanan" placeholder="" class="" value="<?php echo $isii['id_pemesanan'];?>">
																			<?php
																			$sql=mysql_query("SELECT * from pemesanan WHERE id_pemesanan='$isii[id_pemesanan]'");
																			$row1=mysql_fetch_array($sql);
																			?>
																			<input type="hidden" id="harga_total" name="harga_total" placeholder="" class="" value="<?php echo $row1['harga_total'];?>">
																			<input type="hidden" id="sisa_pembayaran" name="sisa_pembayaran" placeholder="" class="" value="<?php echo $row1['sisa_pembayaran'];?>">
																			<p class="card-text">Pilih Perlengkapan Tambahan</p>
																			<small>*Catatan :Jumlah item sesuai dengan keterangan satuan</small>
																			<div class="select-wrap">
																				<span class="icon"><span class="icon-keyboard_arrow_down"></span></span>
																				<select class="form-control" id="perlengkapan" name="id_perlengkapan">
																					<option value="">--Pilih Perlengkapan--</option>
																					<?php 
																					$sql = mysql_query("SELECT * FROM perlengkapan");
																					while ($data= mysql_fetch_array($sql)){
																						$id_perlengkapan = $data['id_perlengkapan'];
																						$nama_perlengkapan = $data ['nama_perlengkapan'];
																						$satuan = $data ['satuan'];
																						$harga_perlengkapan= $data ['harga_perlengkapan'];
																						?>
																						<option value="<?php echo $id_perlengkapan;?>"> <?php echo $nama_perlengkapan;?>  / <?php echo $satuan;?> | <?php echo "Rp. ". number_format($harga_perlengkapan, 0, ".", ".");?> </option>
																					<?php }; ?>
																				</select> 
																			</div> 
																			<div class="form-group">
																				<label for="jumlah_tambahan" class=" form-control-label">Jumlah</label>
																				<input type="number" id="jumlah" name="jumlah_tambahan" placeholder="Jumlah" required="required" class="form-control">
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
										<!-- AKHIR POP UP PERLENGKAPAN -->
										<!-- AWAL TABEL PERLENGKAPAN TAMBAHAN-->
										<table id="example1" style="margin-left: 30px; font-size: 18px; margin-top: 15px;" cellpadding="7">
											<tbody>
												<?php 
												$sql = mysql_query("SELECT perlengkapan.nama_perlengkapan, perlengkapan.satuan,tambahan_perlengkapan.jumlah_tambahan, tambahan_perlengkapan.id_tambahan, perlengkapan.harga_perlengkapan*tambahan_perlengkapan.jumlah_tambahan AS harga_total FROM tambahan_perlengkapan JOIN perlengkapan ON tambahan_perlengkapan.id_perlengkapan=perlengkapan.id_perlengkapan JOIN pemesanan ON tambahan_perlengkapan.id_pemesanan=pemesanan.id_pemesanan WHERE tambahan_perlengkapan.id_pemesanan='$isii[id_pemesanan]'")or die(mysql_error());
												while ($isi= mysql_fetch_array($sql)){
													?>
													<tr align="center" valign="top"> 
														<td><li class="fa fa-briefcase" style="color: #F08080;"></li></td>
														<td><p><?php echo $isi['nama_perlengkapan'];?></p></td><span class="help-block"></span>
														<td><p><?php echo $isi['jumlah_tambahan'];?></p></td><span class="help-block"></span>
														<td><p><?php echo $isi['satuan'];?></p></td><span class="help-block"></span>
														<td><p><?php echo "Rp. ". number_format($isi['harga_total'], 0, ".", ".");?></p></td><span class="help-block"></span>
														<td>
															<form enctype='multipart/form-data' action="file-aksi/hapus_perlengkapan_tambahan.php" method="POST" id="form-hapusperlengkapan">
																<input type="hidden" id="id_pemesanan" name="id_pemesanan" required="required" placeholder="" class="form-control" value="<?php echo $id_pemesanan; ?>">
																<input type="hidden" id="id_perlengkapan" name="id_perlengkapan" required="required" placeholder="" class="form-control" value="<?php echo $isi['id_perlengkapan']; ?>">
																<input type="hidden" id="jumlah_tambahan" name="jumlah_tambahan" required="required" placeholder="" class="form-control" value="<?php echo $isi['jumlah_tambahan']; ?>">
																<a title= "Hapus" href="file-aksi/hapus_perlengkapan_tambahan.php?id=<?php echo $isi['id_tambahan'];?>"onclick="return confirm('Apakah anda yakin ingin menghapus perlengkapan ini?');"><li class="fa fa-trash" style="color: #F08080;"></li></a>
															</form></td>
														</tr>
													</tbody>
												<?php }; ?>
											</table>
											<!-- AKHIR TABEL PERLENGKAPAN TAMBAHAN-->   
										</div>
									</div>
								</div>
							</div>
							<!-- AKHIR PROSES TAMBAH PERLENGKAPAN TAMBAHAN-->
						</div>
						<!-- AKHIR KETERANGAN PAKET -->
						<!-- AWAL DETAIL KETERANGAN PAKET -->
						<div class="border p-3 rounded mb-2" style="margin-left: 60px; width: 19rem;">
							<a data-toggle="collapse" href="#collapse-1" role="button" aria-expanded="false" aria-controls="collapse-1" class="accordion-item h5 d-block mb-0" style="margin-left: 20px;"><i class="fa fa-sort" style="color: #f06595;"></i> Paket ini termasuk</a>
							<div class="collapse" id="collapse-1">
								<div class="col-16" style="margin-top:20px; margin-left: 10px;">
									<div class="card" style="width: 56rem;">
										<div class="card-body">
											<!-- AWAL PERLENGKAPAN PAKET -->
											<table id="example1" style="margin-left: 30px; font-size: 18px; margin-top: 15px;" cellpadding="4">
												<tbody>
													<?php 
													$sql = mysql_query("SELECT perlengkapan_paket.id_perlengkapan, perlengkapan_paket.jumlah, perlengkapan.nama_perlengkapan, perlengkapan.satuan, perlengkapan_paket.id_perlengkapanpaket FROM perlengkapan_paket INNER JOIN perlengkapan ON perlengkapan_paket.id_perlengkapan=perlengkapan.id_perlengkapan JOIN paket ON perlengkapan_paket.id_paket=paket.id_paket WHERE paket.id_paket='$_GET[id]'")or die(mysql_error());
													while ($isi= mysql_fetch_array($sql)){
														?>
														<tr align="" valign="top"> 
															<td><li class="fa fa-heart" style="color: #F08080;"></li></td>
															<td><p><?php echo $isi['jumlah'];?></p></td><span class="help-block"></span>
															<td><p><?php echo $isi['satuan'];?></p></td><span class="help-block"></span>
															<td><p><?php echo $isi['nama_perlengkapan'];?></p></td><span class="help-block"></span>                              
														</tr>
													<?php }; ?>
												</tbody>
											</table>
											<!-- AKHIR PERLENGKAPAN PAKET-->     
										</div>
									</div>
									<div class="card" style="width: 56rem;">
										<div class="card-body">
											<!-- AWAL LAYANAN PAKET -->
											<table id="example2" style="margin-left: 30px; font-size: 18px; margin-top: 15px;" cellpadding="4">
												<tbody>
													<?php 
													$sql = mysql_query("SELECT detail_layananpaket.id_layanan, detail_layananpaket.isi_detlayanan, layanan.nama_layanan,detail_layananpaket.id_detlayananpaket FROM detail_layananpaket INNER JOIN layanan ON detail_layananpaket.id_layanan=layanan.id_layanan JOIN paket ON detail_layananpaket.id_paket=paket.id_paket WHERE paket.id_paket='$_GET[id]'")or die(mysql_error());
													while ($isi= mysql_fetch_array($sql)){
														?>
														<tr align="center" valign="top"> 
															<td><li class="fa fa-heart" style="color: #F08080;"></li></td>
															<td><p><?php echo $isi['nama_layanan'];?></p></td><span class="help-block"></span>
															<td><p><?php echo $isi['isi_detlayanan'];?></p></td><span class="help-block"></span>                              
														</tr>
													<?php }; ?>
												</tbody>
											</table>
											<!-- AKHIR LAYANAN PAKET-->     
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- AKHIR DETAIL KETERANGAN PAKET -->
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
			<script>
				var date = new Date();
				date.setDate(date.getDate());

				$('#date').datepicker({ 
					startDate: date
				});
			</script>
		</body>
		</html>