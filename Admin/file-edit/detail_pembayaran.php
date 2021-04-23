<?php
include "../koneksi.php";
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Detail Pembayaran</title>
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
      $sql="select * from pembayaran where id_pembayaran='$_GET[id]'";
      $query=mysql_query($sql);
      $rows=mysql_fetch_array($query);
      $id_pembayaran=$rows['id_pembayaran'];
      $bukti_pembayaran=$rows['bukti_pembayaran'];
      $id_pemesanan = $rows['id_pemesanan'];
      $jumlah_pembayaran = $rows['jumlah_pembayaran'];
      $validasi_pembayaran= $rows['validasi_pembayaran'];
      $tanggal_pembayaran =$rows['tanggal_pembayaran'];
      ?>

      <!-- Main content -->
      <section class="content">
       <div class="container-fluid">
        <div class="animated fadeIn">
          <div class="row">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-header">
                  <strong>Detail Pembayaran</strong>
                  <form enctype='multipart/form-data' action="../file-aksi/aksi-edit/aksi_validasi_pembayaran.php" method="POST" id="form-validasi">   
                   <?php
                   $sql=mysql_query("SELECT * from pemesanan JOIN pembayaran ON pemesanan.id_pemesanan=pembayaran.id_pemesanan where pembayaran.id_pemesanan='$id_pemesanan'");
                   $isi=mysql_fetch_array($sql);
                   ?>
                   <input type="hidden" id="id_pemesanan" name="id_pemesanan" placeholder="" class="" value="<?php echo $isi['id_pemesanan'];?>">
                   <input type="hidden" id="sisa_pembayaran" name="sisa_pembayaran" placeholder="" class="" value="<?php echo $isi['sisa_pembayaran'];?>">
                   <input type="hidden" id="harga_total" name="harga_total" placeholder="" class="" value="<?php echo $isi['harga_total'];?>">
                   <input type="hidden" id="validasi_pemesanan" name="validasi_pemesanan" placeholder="" class="" value="<?php echo $isi['validasi_pemesanan'];?>">
                   <input type="hidden" id="jumlah_pembayaran" name="jumlah_pembayaran" placeholder="" class="" value="<?php echo $rows['jumlah_pembayaran'];?>">
                   <input type="hidden" id="id_pembayaran" name="id_pembayaran" placeholder="" class="" value="<?php echo $rows['id_pembayaran'];?>">
                   <div class="row">
                    <div class="col-sm-1.5">
                      <div class="select-wrap" style="width: 100px;">
                        <span class="icon"><span class="icon-keyboard_arrow_down"></span></span>
                        <select class="form-control" id="validasi" name="validasi_pembayaran">
                          <option name="validasi_pembayaran" value="<?php echo $rows['validasi_pembayaran'];?>" selected disabled><?php echo $rows['validasi_pembayaran'];?></option>
                          <option value="Ya">Ya</option>
                          <option value="Tidak">Tidak</option>
                        </select> 
                      </div>
                    </div>
                    <div class="col-sm-1">
                     <button class="btn btn-success"  title= "">Validasi</button>
                   </div>
                 </div>
               </form>
             </div><!-- /.card-header -->
             <center><div class="card mb-3" style="max-width: 700px;">
              <div class="row no-gutters">
                <div class="col-md-12">
                  <div class="card-header">
                    <h5 class="card-title">Detail Pembayaran</h5>
                    <p class="card-text"><a href="detail_pelanggan.php?id=<?php echo $rows['id_pemesanan'];?>">ID Pemesanan : <?php echo $rows['id_pemesanan']; ?></a></p>
                    <p class="card-text">Jumlah Pembayaran  :  <?php echo "Rp. ". number_format($rows['jumlah_pembayaran'], 0, ".", ".");?></p>
                    <p class="card-text">Tanggal Pembayaran  :  <?php echo $rows['tanggal_pembayaran'];?></p>
                    <label>Bukti Pembayaran : </label> 
                  </div>
                  <div class="from-group">
                    <?php
                    $sql = mysql_query("SELECT * from pembayaran where id_pembayaran='$_GET[id]'");
                    while ($isi=mysql_fetch_array($sql)){
                      ?>
                      <center>
                        <tr>
                         <td><image src="../images/buktipembayaran/<?php echo $isi['bukti_pembayaran']; ?>" style="width: 100%; height: 100%;"></image></td>
                       </tr>
                     </center>
                   <?php }; ?>
                 </div>  
               </div>
             </div>
           </div>
         </div>
       </center> 


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
      "paging": false,
      "lengthChange": false,
      "searching": false,
      "ordering": false,
      "info": false,
      "autoWidth": true
    });
  });
</script>
</body>
</html>
