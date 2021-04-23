<?php
include "../koneksi.php";
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Edit Vendor</title>
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
              <h1 class="m-0 text-dark">Edit Vendor</h1>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->
      <!-- /.content-header -->
      <?php
      $sql="SELECT * FROM vendor where id_vendor='$_GET[id]'";
      $query=mysql_query($sql);
      $rows=mysql_fetch_array($query);
      $id_vendor    = $rows['id_vendor'];
      $nama_vendor = $rows['nama_vendor'];
      $insta_vendor= $rows['insta_vendor'];
      $foto_vendor = $rows['foto_vendor'];
      $tentang_vendor = $rows['tentang_vendor'];
      ?>

      <!-- Main content -->
      <section class="content">
       <div class="container-fluid">
        <div class="animated fadeIn">
          <div class="row">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-header">
                  <strong>Edit Data Vendor</strong>
                  <a class="btn btn-outline-danger" style="transform: translateX(550%);" title= "Hapus vendor ini" href="../file-aksi/aksi-hapus/hapus_vendor.php?id=<?php echo $id_vendor?>"onclick="return confirm('Apakah anda yakin ingin menghapus data?');">Hapus vendor ini</a>
                </div>
                <div class="card-header" style="width: 18rem;">
                  <ul class="list-group">
                    <button class="list-group-item active" data-toggle="collapse" data-target="#layanan">Lihat Layanan <?php echo $nama_vendor ?> <i class="fa fa-sort-down"></i></button>
                    <div id="layanan" class="collapse">
                      <?php
                      $sql = mysql_query("SELECT DISTINCT detail_vendor.id_layanan, layanan.nama_layanan FROM detail_vendor INNER JOIN layanan ON detail_vendor.id_layanan=layanan.id_layanan JOIN vendor ON detail_vendor.id_vendor=vendor.id_vendor WHERE detail_vendor.id_vendor='$_GET[id]'") or die (mysql_error()); 
                      while ($isi=mysql_fetch_array($sql)){
                        ?>
                        <li class="list-group-item"><?php echo $isi['nama_layanan']; ?></li>
                      <?php }; ?>
                    </div>
                  </ul>
                </div>
                <div class="card-body card-block">
                 <form action="../file-aksi/aksi-edit/aksi_edit_vendor.php" method="POST" id="form-vendor" enctype="multipart/form-data" >
                  <input type="hidden" name="id_vendor" value="<?php echo $rows['id_vendor']; ?>"/>
                  <div class="form-group">
                    <label for="nama_vendor" class=" form-control-label">Nama Vendor</label>
                    <input type="text" id="nama_vendor" name="nama_vendor" required="required" placeholder="Nama Vendor" class="form-control" value="<?php echo $nama_vendor ?>">
                    <span class="help-block"></span>
                  </div> 
                  <div class="form-group">
                    <label for="insta_vendor" class=" form-control-label">Link Instagram Vendor</label>
                    <input type="text" id="insta_vendor" name="insta_vendor" required="required" placeholder="Instagram Vendor" class="form-control" value="<?php echo $insta_vendor?>">
                    <span class="help-block"></span>
                  </div>                
                  <div class="from-group">
                    <label for="foto_vendor" class=" form-control-label">Gambar Vendor  : </label> 
                    <div> <input type="file" name="foto_vendor" id="foto_vendor" value="<?php echo $foto_vendor ?>"></div>
                    <?php
                    $sql = mysql_query("SELECT * from vendor where id_vendor='$_GET[id]'"); 
                    while ($isi=mysql_fetch_array($sql)){
                      ?>
                      <center>
                        <tr>
                         <td><image src="../images/vendor/<?php echo $isi['foto_vendor']; ?>" style="width: 30%; height: 25%;"></image></td>
                       </tr>
                     </center>
                   <?php }; ?>
                 </div>   
                 <div class="form-group">
                  <label for="tentang_vendor" class="form-control-label">Tentang Vendor</label>
                  <textarea id="tentang_vendor" name="tentang_vendor" rows="5" class="ckeditor" data-rule-required="true" data-rule-minlenght="2" <?php echo $tentang_vendor ?>></textarea>
                  <span class="help-block"></span>
                </div>                                 
                <div class="card-footer">
                  <button class="btn btn-primary" name ="update"type="submit">
                    <i class="fa fa-dot-circle-o"></i> Simpan
                  </button>
                  <button type="reset" class="btn btn-danger" href="kelola_vendor.php'" onclick="var x = window.location ='kelola_vendor.php'">
                    <i class="fa fa-ban"></i> Batal
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div><!-- .animated -->
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
</body>
</html>