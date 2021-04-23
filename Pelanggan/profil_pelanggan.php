<?php
include "../koneksi.php";
session_start();
if( ! isset($_SESSION['username'])){
  header("location: login.php");
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
  <link rel="stylesheet" herf="datepicker/datepicker.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" type="text/css" rel="stylesheet">

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
    <!--================Header Menu Area =================-->  
    <?php 
    include'kirim_pesan.php';
    ?>
    <!--================Header Menu Area =================-->

    <?php
    $sql=mysql_query("SELECT * from pelanggan where id_pelanggan='$_SESSION[id_pelanggan]'");
    $isi=mysql_fetch_array($sql);
    ?>
    <div class="site-blocks-cover inner-page-cover overlay" style="background-image: url(../images/profilbg.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row align-items-center justify-content-center text-center">
          <div class="col-md-10" data-aos="fade-up" data-aos-delay="400">
            <div class="row justify-content-center mt-5">
              <div class="col-md-8 text-center">
                <h1 style="font-family: 'Sofia';" ><?php echo $isi['username'];?>'s Profile</h1>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>  

    <div class="site-section bg-light">
      <div class="container">
       <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-3">

                <!-- Profile Image -->
                <div class="card card-primary card-outline">
                  <div class="card-body box-profile">
                    <div class="text-center">
                      <img class="profile-user-img img-fluid img-circle"
                      src="../images/love.png"
                      alt="User profile picture">
                    </div>
                    <p class="profile-username text-center" style="font-size: 20px;"><?php echo $isi['nama_pelanggan'];?></p>
                  </div>
                  <!-- /.card-body -->
                </div>
                <!-- /.card -->

              </div>
              <!-- /.col -->
              <div class="col-md-9">
                <div class="card">
                  <div class="card-header p-2">
                    <ul class="nav nav-pills">
                      <li class="nav-item"><a class="nav-link active" href="#profil" data-toggle="tab">Profil</a></li>
                      <li class="nav-item"><a class="nav-link" href="#pesan" data-toggle="tab">Pesan</a></li>
                      <li class="nav-item"><a class="nav-link" href="#notif" data-toggle="tab">Notifikasi</a></li>
                          <?php
							    $sql=mysql_query("SELECT * FROM pemesanan WHERE id_pelanggan='$_SESSION[id_pelanggan]' AND validasi_pemesanan='Ya' AND sisa_pembayaran != 0");
							    $pm=mysql_fetch_array($sql);
						   ?>
						<?php 
							$sql = mysql_query("SELECT * from jadwal_pertemuan where id_pemesanan='$pm[id_pemesanan]'");
							if(mysql_num_rows($sql)!=0) {
									echo' <li class="nav-item"><a class="nav-link" href="#jadwalpertemuan" data-toggle="tab">Jadwal Pertemuan</a></li>';
							} else {
							  echo'<p></p>';
							}
						?>
                      <li class="nav-item"><a class="nav-link" href="#pengaturan" data-toggle="tab">Pengaturan</a></li>
                    </ul>
                  </div><!-- /.card-header -->
                  <div class="card-body">
                    <div class="tab-content">
                      <!-- /.tab-pane -->
                      <div class="active tab-pane" id="profil">
                        <form class="form-horizontal" action="file-aksi/aksi_edit_pelanggan.php" method="POST" id="form-profilpelanggan">
                          <div class="form-group">
                            <label for="username" class="col-sm-2 control-label">Username</label>
                            <div class="col-sm-12">
                              <input type="text" class="form-control" id="username" name="username" placeholder="Username" value="<?php echo $isi['username'];?>">
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="nama_pelanggan" class="col-sm-2 control-label">Nama</label>
                            <div class="col-sm-12">
                              <input type="text" class="form-control" id="nama_pelanggan" name="nama_pelanggan" placeholder="Nama Lengkap" value="<?php echo $isi['nama_pelanggan'];?>">
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="nama_pasangan" class="col-sm-6 control-label">Nama Pasangan</label>
                            <div class="col-sm-12">
                              <input type="text" class="form-control" id="nama_pasangan" name="nama_pasangan" placeholder="Nama Pasangan" value="<?php echo $isi['nama_pasangan'];?>">
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="alamat" class="col-sm-2 control-label">Alamat</label>
                            <div class="col-sm-12">
                              <input type="text" class="form-control" id="alamat" placeholder="Alamat" name="alamat" value="<?php echo $isi['alamat'];?>" >
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="no_telp" class="col-sm-6 control-label">Nomor Telepon</label>
                            <div class="col-sm-12">
                              <input type="tel"  class="form-control" id="no_telp" placeholder="Nomor Telepon" name="no_telp" value="<?php echo $isi['no_telp'];?>" >
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="email" class="col-sm-6 control-label">Email</label>
                            <div class="col-sm-12">
                              <input type="email" class="form-control" id="email" placeholder="Email" name="email" value="<?php echo $isi['email'];?>" >
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="konsep_pernikahan" class="col-sm-6 control-label">Konsep Pernikahan</label>
                            <div class="col-sm-12">
                              <textarea class="form-control" id="konsep_pernikahan" placeholder="Deskripsikan Konsep Pernikahan Impian Anda..." name="konsep_pernikahan" rows="5"><?php echo $isi['konsep_pernikahan'];?></textarea>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                              <button type="submit" name="update" class="btn btn-success">Simpan</button>
                            </div>
                          </div>
                        </form>
                      </div>
                      <!-- /.tab-pane -->
                      <div class="tab-pane" id="pesan">
                       <div class="col-md-12">
                        <div class="card card-primary card-outline">
                          <div class="card-body p-0">
                            <div class="mailbox-controls">
                              <div class="table-responsive mailbox-messages">
                                <table class="table table-hover table-striped">
                                  <tbody>
                                    <?php 
                                    $i=1;
                                    $sql = mysql_query("SELECT pelanggan.id_pelanggan, pesan_pelanggan.id_pesanpelanggan, pesan_pelanggan.id_pelanggan, pesan_pelanggan.isi_pesan, balas_pesan.tanggal_kirim, balas_pesan.isi_balasan, balas_pesan.id_balaspesan FROM pesan_pelanggan JOIN pelanggan ON pesan_pelanggan.id_pelanggan=pelanggan.id_pelanggan LEFT JOIN balas_pesan ON pesan_pelanggan.id_pesanpelanggan=balas_pesan.id_pesanpelanggan WHERE pesan_pelanggan.id_pelanggan='$_SESSION[id_pelanggan]' ORDER BY balas_pesan.tanggal_kirim DESC ") or die(mysql_error());
                                    while ($isi= mysql_fetch_array($sql)){
                                      ?>
                                      <tr>
                                        <td class="mailbox-star"><a href="#"><i class="fa fa-comments"></i></a></td>
                                        <td class="mailbox-subject"><a><?php echo $isi['isi_pesan'];?></a></td>
                                        <td class="mailbox-subject"> <a tab-index="0" href="javascript:void(0);" class="hover" 
                                         id="<?php echo $isi['id_balaspesan'];?>" rel="popover" data-placement=""
                                         data-original-title="" data-content="" style="color: red;"onClick="this.style.color='black';"><?php echo $isi['isi_balasan'];?></a></td>
                                         <td class="mailbox-attachment"></td>
                                         <td class="mailbox-date"><small><?php echo $isi['tanggal_kirim'];?></small></td>
                                       </tr>
                                       <?php $i++; }; ?>
                                     </tbody>
                                   </table>
                                   <!-- /.table -->
                                 </div>
                               </div>
                             </div>
                           </div>
                         </div>
                       </div>
                       <!-- /.tab-pane -->
                       <div class="tab-pane" id="notif">
                        <?php 
                        $sql = mysql_query("SELECT * FROM pemesanan WHERE id_pelanggan='$_SESSION[id_pelanggan]' AND validasi_pemesanan='Ya' AND sisa_pembayaran=0");
                        $isi1=mysql_fetch_array($sql);
                        if(mysql_num_rows($sql)!=0){
                          echo'<div class="alert alert-secondary" role="alert">Pemesanan yang anda lakukan pada tanggal '.$isi1["tanggal_pesan"].' telah LUNAS
                          <hr>
                             <p class="mb-0" style="font-size:14px;">Terimakasih telah memilih Caricacan and Team! :)</p>
                          </div>';
                        } else {
                         ?>
                         <?php
                       }
                       ?>
                       <?php 
                       $sql = mysql_query("SELECT * FROM pemesanan WHERE id_pelanggan='$_SESSION[id_pelanggan]' AND validasi_pemesanan='Ya' AND sisa_pembayaran != 0");
                       if(mysql_num_rows($sql)!=0){
                        echo'<div class="alert alert-success" role="alert">
                        <h4 class="alert-heading">Pemesanan</h4>
                        <hr>
                        <p class="mb-0" style="font-size:14px;">Pemesanan anda telah di validasi oleh Caricacan and Team, silahkan lanjutkan pembayaran anda selanjutnya</p>
                        </div>';
                      } else {
                       ?>
                       <?php
                     }
                     ?>
                     <?php 
                     $sql = mysql_query("SELECT * FROM pembayaran JOIN pemesanan ON pembayaran.id_pemesanan=pemesanan.id_pemesanan WHERE pemesanan.id_pelanggan='$_SESSION[id_pelanggan]' AND validasi_pemesanan='Ya' AND pemesanan.sisa_pembayaran !=0");
                     if(mysql_num_rows($sql)!=0){
                      echo'<div class="alert alert-light" role="alert">
                      <h4 class="alert-heading">Pembayaran</h4>
                      <hr>';
                      while($data = mysql_fetch_array($sql)){?>
                        <div class="alert alert-info" role="alert" style="font-size:14px;">
                         Pembayaran pada tanggal <?php echo $data['tanggal_pembayaran']; ?> dengan nominal <?php echo "Rp. ". number_format($data['jumlah_pembayaran'], 0, ".", ".");?> telah di validasi
                       </div>
                     <?php }
                     echo '</div>';
                   } else {
                     ?>
                     <?php
                   }
                   ?>
                 </div>
                 <!-- /.tab-pane -->
                 <div class="tab-pane" id="jadwalpertemuan">
                 	<div class="card border-success mb-3" style="max-width: 50rem;">
                 		<div class="card-body">
                 			<table id="example1" style="margin-left: 170px; font-size: 18px; margin-top: 15px;" cellpadding="7">
                 				<tbody>
                 					<?php 
                 					$i=1;
                 					$sql = mysql_query("SELECT * FROM jadwal_pertemuan WHERE id_pemesanan='$pm[id_pemesanan]'")or die(mysql_error());
                 					while ($isi= mysql_fetch_array($sql)){
                 						?>
                 						<tr align="" valign="top"> 
                 							<td><li class="fa fa-calendar" style="color: #F08080;"></li></td>
                 							<td><p>Pertemuan Ke- <?php echo $i; ?></p></td><span class="help-block"></span>
                 							<td><p><?=date ('d - m - Y', strtotime ($isi['tanggal_pertemuan']));?></p></td><span class="help-block"></span> 
                 						</tr>
                 					<?php $i++;}; ?>
                 				</tbody>
                 			</table>
                 		</div>
                 		<div class="card-footer bg-transparent border-success"><p style="font-size: 15px; font-style: italic; color: red;">*Catatan : Jadwal pertemuan dapat berubah sewaktu-waktu, jika terdapat perubahan jadwal pihak caricacan and team akan mengubungi anda. Waktu pertemuan akan di informasikan oleh caricacan and team dengan menghubungi kontak anda. Jika anda ingin melakukan perubahan jadwal pertemuan dapat menghubungi caricacan and team </p></div>
                 	</div>
                 </div>

                 <div class="tab-pane" id="pengaturan">
                   <!-- left column -->
                   <center><div class="col-md-10">
                    <!-- general form elements -->
                    <div class="card card-primary">
                      <!-- form start -->
                      <form role="form" action="file-aksi/aksi_edit_password.php" method="POST">
                        <div class="card-body">
                          <div class="form-group">
                            <input type="password" class="form-control" id="pass" name="pass_lama" value="" placeholder="Masukkan Password Lama">
                            <p style="text-align: left;"><input type="checkbox" onclick="myFunction()">      Lihat Password</p>
                          </div>
                          <div class="form-group">
                            <input type="password" class="form-control" id="pass1" name="pass_baru" value="" placeholder="Masukkan Password Baru">
                            <p  style="text-align: left;"><input type="checkbox" onclick="myFunction1()">      Lihat Password</p>
                          </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                          <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                      </form>
                    </div>
                    <!-- /.card -->
                  </div></center>
                  <!--/.col (left) -->
                </div>
                <!-- /.tab-pane -->

              </div>
              <!-- /.tab-content -->
            </div><!-- /.card-body -->
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
</div>
</div>







<!--================Header Menu Area =================-->  
<?php 
include'footer_pelanggan.php';
?>
<!--================Header Menu Area =================-->

</div>
<script type="text/javascript">
  function myFunction() {
    var x = document.getElementById("pass");
    if (x.type === "password") {
      x.type = "text";
    } else {
      x.type = "password";
    }
  }
</script>
<script type="text/javascript">
  function myFunction1() {
    var x = document.getElementById("pass1");
    if (x.type === "password") {
      x.type = "text";
    } else {
      x.type = "password";
    }
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
<script src="datepicker/datepicker.js"></script>
</body>
</html>

<script>
  /*popover bootstrap*/

  $(document).ready(function () {
    $(document).on('click', '.hover', function (e) {
      e.preventDefault();
      $(this).popover({
        title: "Pesan",
        html: true,
        placement: 'right',
        trigger: 'focus',
        content: function () {
          var fetch_data = '';
          var element = $(this);
          var id = element.prop("id");
          $.ajax({
            url: "detail_balasan.php",
            method: "POST",
            async: false,
            data: { id: id },
            success: function (data) {
              fetch_data = data;
            },
            error: function (xhr, ajaxOptions, thrownError) {
              alert(thrownError);
            }
          });
          return fetch_data;
        }

      });
      $(this).popover('show');
    });

  });

</script>