<?php
include "../koneksi.php";
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Edit Paket</title>
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
      $catatan_tambahan= $rows['catatan_tambahan'];
      ?>

      <!-- Main content -->
      <section class="content">
       <div class="container-fluid">
        <div class="animated fadeIn">
          <div class="row">
            <div class="col-lg-12">
              <div class="card">
               <div class="card-header">
                <p>
                  <a class="btn btn-success btn-lg" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                    Data Layanan dan Perlengkapan Paket
                  </a>
                </p>
                <div class="collapse" id="collapseExample">
                  <div class="card border-dark mb-3" style="max-width: 100rem;">
                    <div class="card-body text-dark">
                      <a class="btn btn-secondary mb-1" href="../file-kelola/kelola_layanan_paket.php?id=<?php echo $id_paket?>">
                        Lihat Data Layanan Paket
                      </a>
                      <a class="btn btn-secondary mb-1" href="../file-kelola/kelola_perlengkapan_paket.php?id=<?php echo $id_paket?>">
                        Lihat Data Perlengkapan Paket
                      </a>
                    </div>
                  </div>
                </div>
              </div>

              <div class="card-header">
               <strong>Edit Data Paket</strong>
             </div><!-- /.card-header -->
             <div class="card-body card-block" style="width: 650px; margin-left: 200px;">

              <form action="../file-aksi/aksi-edit/aksi_edit_paket.php" method="POST" id="form-paket" enctype="multipart/form-data" >
                <input type="hidden" name="id_paket" value="<?php echo $rows['id_paket']; ?>"/>
                <div class="form-group">
                  <label for="nama_paket" class=" form-control-label">Nama Paket</label>
                  <input type="text" id="Nama Paket" name="nama_paket" required="required" placeholder="Nama Paket" class="form-control" value="<?php echo $nama_paket ?>">
                  <span class="help-block"></span>
                </div>    
                <div class="from-group">
                  <label for="foto_paket" class=" form-control-label">Gambar Paket  : </label> 
                  <div> <input type="file" name="foto_paket" id="foto_paket" value="<?php echo $foto_paket ?>"></div>
                  <?php
                  $sql = mysql_query("SELECT * from paket where id_paket='$_GET[id]'");
                  while ($isi=mysql_fetch_array($sql)){
                    ?>
                    <center>
                      <tr>
                       <td><image src="../images/fotopaket/<?php echo $isi['foto_paket']; ?>" style="width: 40%; height: 35%;"></image></td>
                     </tr>
                   </center>
                 <?php }; ?>
               </div>            
               <div class="form-group">
                <label for="harga_paket" class=" form-control-label">Harga Paket</label>
                <input type="text" id="harga_paket" name="harga_paket" required="required" placeholder="Harga Paket" class="form-control" value="<?php echo $harga_paket ?>">
                <span class="help-block"></span>
              </div>
              <div class="form-group">
                <label for="jumlah_hari" class=" form-control-label">Jumlah Hari</label>
                <input type="number" id="jumlah_hari" name="jumlah_hari" required="required" placeholder="Jumlah Hari" class="form-control" value="<?php echo $jumlah_hari?>">
                <span class="help-block"></span>
              </div>
              <div class="form-group">
                <label for="jumlah_acara" class=" form-control-label">Jumlah Acara</label>
                <input type="number" id="jumlah_acara" name="jumlah_acara" required="required" placeholder="Jumlah Acara" class="form-control" value="<?php echo $jumlah_acara?>">
                <span class="help-block"></span>
              </div>
              <div class="form-group">
                <label for="jumlah_tamu" class=" form-control-label">Jumlah Tamu</label>
                <input type="number" id="jumlah_tamu" name="jumlah_tamu" required="required" placeholder="Jumlah Tamu" class="form-control" value="<?php echo $jumlah_tamu ?>">
                <span class="help-block"></span>
              </div>
              <div class="form-group">
                <label for="jumlah_team" class=" form-control-label">Jumlah Team</label>
                <input type="number" id="jumlah_team" name="jumlah_team" required="required" placeholder="Jumlah Team" class="form-control" value="<?php echo $jumlah_team ?>">
                <span class="help-block"></span>
              </div>                                 
            </div>
            <center><div class="card-footer">
              <button class="btn btn-primary"name ="update"type="submit" >
                <i class="fa fa-dot-circle-o"></i> Simpan
              </button>
              <button type="reset" class="btn btn-danger" href="kelola_paket.php'" onclick="var x = window.location ='kelola_paket.php'">
                <i class="fa fa-ban"></i> Batal
              </button>
            </div></center>
          </form>

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
