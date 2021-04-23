<header class="site-navbar container-fluid py-0 pr-xl-5 " role="banner">
  <style>
  header
  {
    background : url(../images/black.jpg);
    opacity: 0.8;
  }
  nav
  {
    width: 1200px;
  }
</style>
<div class="row align-items-center pr-xl-5">
  <div class="col-12 col-md-12 d-none d-xl-block">
    <nav class="site-navigation position-relative text-right" role="navigation">
      <ul class="site-menu js-clone-nav mr-auto d-none d-lg-block">
        <a class="mb-0 site-logo" href="index_pelanggan.php"><a href="index_pelanggan.php" class="text-white mb-0" style="font-family: 'Sofia'; font-size : 24px;">Caricacan&Team</a></a>
        <li class="active">
          <a href="index_pelanggan.php">
            <span class="border-left pl-xl-4"></span>Beranda
          </a>
        </li>
        <li>
          <a href="inspirasi_pelanggan.php">
            <span class="border-left pl-xl-4"></span>Inspirasi
          </a>
        </li>
        <li>
          <a href="tentang_pelanggan.php">
            <span class="border-left pl-xl-4"></span>Tentang Kami
          </a>
        </li>
        <li>
          <a href="alur.php">
            <span class="border-left pl-xl-4"></span>Alur Pemesanan
          </a>
        </li>
        <li>
          <a href="vendor_pelanggan.php">
            <span class="border-left pl-xl-4"></span>Vendor
          </a>
        </li>
        <li>
          <a href="paket_pelanggan.php">
            <span class="border-left pl-xl-4"></span>Paket
          </a>
        </li>
        <span class="border-left pl-xl-4"></span>
        <li class="fa fa-heart fa-lg" style="color: #339af0;"></li>
        <li class="has-children">
          <a href="profil_pelanggan.php"><?php echo $_SESSION['username'];?></a>
          <ul class="dropdown">
            <li><a href="profil_pelanggan.php"><i class="fa fa-user"></i> Profil</a></li>
            <li>
              <?php 
              $sql = mysql_query("SELECT * FROM pemesanan WHERE id_pelanggan='$_SESSION[id_pelanggan]' AND sisa_pembayaran!=0");
              if(mysql_num_rows($sql)!=0){
                echo'<li><a href="pemesanan_saya.php"><i class="fa fa-bookmark"></i> Pemesanan Saya</a></li>';
              } else {
               echo'<li><a href="paket_pelanggan.php"><i class="fa fa-bookmark"></i> Pemesanan Saya</a></li>';
             ?>
               <?php
             }
             ?>

           </li>
           <li><a href="" data-toggle="modal" data-target="#Tambahreview"><i class="fa fa-comments"></i> Kirim Review</a></li>
           <li><a href="logout.php"><i class="fa fa-power-off"></i> Log Out</a></li>
         </ul>
       </li>
     </ul>
   </nav>
 </div>
 <div class="d-inline-block d-xl-none ml-auto py-3 col-6 text-right" style="position: relative; top: 3px;">
  <a href="#" class="site-menu-toggle js-menu-toggle text-white"><span class="icon-menu h3"></span></a>
</div>
</div>
</header>
<!-- AWAL POP UP TAMBAH JADWAL -->
<div class="modal fade" id="Tambahreview" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="largeModalLabel">Kirim Review</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-body card-block">
                <form enctype='multipart/form-data' action="file-aksi/aksi_tambah_review.php" method="POST" id="form-review">  
                 <input type="hidden" id="id_pelanggan" name="id_pelanggan" placeholder="" class="" value="<?php echo $_SESSION['id_pelanggan'];?>">
                 <div class="form-group">
                  <label for="kepuasan_layanan" class=" form-control-label">Apakah anda puas dengan layanan kami?</label>
                  <select class="form-control" id="id_acara" name="kepuasan_layanan">
                    <option value="" selected disabled>--Tingkat Kepuasan--</option>
                    <option value="Sangat Puas">Sangat Puas</option>
                    <option value="Cukup Puas">Cukup Puas</option>
                    <option value="Kurang Puas">Kurang Puas</option>
                  </select> 
                  <span class="help-block"></span>
                </div>   
                <div class="form-group">
                  <label for="konsep_pernikahan" class="col-sm-6 control-label">Tulis Review</label>
                  <div class="col-sm-12">
                    <textarea class="form-control" id="isi_review" placeholder="Tuliskan Review Anda..." name="isi_review" rows="5"></textarea>
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
        <!-- AKHIR POP UP TAMBAH JADWAL -->