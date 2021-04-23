<?php
include "../koneksi.php";
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Edit Inspirasi</title>
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
              <h1 class="m-0 text-dark">Edit Inspirasi</h1>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->
      <?php
      $sql="select * from inspirasi where id_inspirasi='$_GET[id]'";
      $query=mysql_query($sql);
      $rows=mysql_fetch_array($query);
      $id_inspirasi    = $rows['id_inspirasi'];
      $judul_inspirasi = $rows['judul_inspirasi'];
      $ket_inspirasi   = $rows['ket_inspirasi'];
      $foto_inspirasi  = $rows['foto_inspirasi'];
      ?>

      <!-- Main content -->
      <section class="content">
       <div class="container-fluid">
        <div class="animated fadeIn">
          <div class="row">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-header">
                  <strong>Edit Data Inspirasi</strong>
                </div>
                <div class="card-body card-block">
                  <form action="../file-aksi/aksi-edit/aksi_edit_inspirasi.php" method="POST" id="form-inspirasi" enctype="multipart/form-data" >
                    <input type="hidden" name="id_inspirasi" value="<?php echo $rows['id_inspirasi']; ?>"/>
                    <div class="form-group">
                      <label for="judul_inspirasi" class=" form-control-label">Judul Inspirasi</label>
                      <input type="text" id="judul_inspirasi" name="judul_inspirasi" required="required" placeholder="Judul Inspirasi" class="form-control" value="<?php echo $judul_inspirasi ?>">
                      <span class="help-block"></span>
                    </div>                
                    <div class="from-group">
                      <label for="foto_inspirasi" class=" form-control-label">Gambar Inspirasi  : </label> 
                      <div> <input type="file" name="foto_inspirasi" id="foto_inspirasi" value="<?php echo $foto_inspirasi ?>"></div>
                      <?php
                      $sql = mysql_query("SELECT * from inspirasi where id_inspirasi='$_GET[id]'"); 
                      while ($isi=mysql_fetch_array($sql)){
                        ?>
                        <center>
                          <tr>
                           <td><image src="../images/inspirasi/<?php echo $isi['foto_inspirasi']; ?>" style="width: 30%; height: 25%;"></td>
                           </tr>
                         </center>
                       <?php }; ?>
                     </div>                                  
                     <div class="form-group">
                      <label for="ket_inspirasi" class="form-control-label">Keterangan Inspirasi</label>
                      <textarea id="ket_inspirasi" name="ket_inspirasi" rows="5" class="ckeditor" data-rule-required="true" data-rule-minlenght="2" <?php echo $ket_inspirasi ?> </textarea>
                      <span class="help-block"></span>
                    </div>  
                    <div class="card-footer">
                      <button class="btn btn-primary btn-sm"name ="update"type="submit" >
                        <i class="fa fa-dot-circle-o"></i> Simpan
                      </button>
                      <button type="reset" class="btn btn-danger btn-sm" href="kelola_inspirasi.php'" onclick="var x = window.location ='kelola_inspirasi.php'">
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