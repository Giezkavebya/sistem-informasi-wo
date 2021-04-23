<?php
include "../koneksi.php";
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Kelola Pemesanan</title>
  <link rel="icon" href="../../images/logocari.png" type="image/png">
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" type="text/css" href="../plugins/datatables/dataTables.bootstrap4.css">
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
              <h1 class="m-0 text-dark">Kelola Pemesanan</h1>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->
      <?php
      $lama = 3;
      $query = "DELETE FROM pemesanan
      WHERE validasi_pemesanan='Tidak' AND DATEDIFF(CURDATE(), tanggal_pesan) > $lama";
      $hasil = mysql_query($query);
      ?>
      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Tabel Pemesanan</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr align="center" valign="top">
                        <th scope="col">No.</th>
                        <th scope="col">ID Pemesanan</th>
                        <th scope="col">Nama Pelanggan</th>
                        <th scope="col">Tanggal Pemesanan</th>
                        <th scope="col">Paket</th>
                        <th scope="col">Validasi Pemesanan</th>
                        <th scope="col">Detail</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                      $i=1;
                      $sql = mysql_query("SELECT * FROM pelanggan JOIN pemesanan ON pelanggan.id_pelanggan=pemesanan.id_pelanggan JOIN paket ON pemesanan.id_paket=paket.id_paket");
                      while ($isi= mysql_fetch_array($sql)){
                        ?>
                        <tr align="center" valign="top">
                          <td><?php echo $i; ?></td>
                          <td><?php echo $isi['id_pemesanan']; ?></td>
                          <td><a href="../file-edit/detail_pelanggan.php?id=<?php echo $isi['id_pelanggan'];?>"><?php echo $isi['nama_pelanggan']; ?></a></td>
                          <td><?php echo $isi['tanggal_pesan']; ?></td>
                          <td><?php echo $isi['nama_paket']; ?></td>
                          <td><?php echo $isi['validasi_pemesanan']; ?></td>
                          <td>
                            <a  class="btn btn-info" title= "Lihat" href="../file-edit/detail_pemesanan.php?id=<?php echo $isi['id_pemesanan'];?>">Lihat</a>
                          </td>
                        </tr>
                        <?php $i++; }; ?>
                      </tbody>
                    </table>
                  </div>
                </div>
                <!-- /.col -->
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
      <!-- page script -->
      <script type="text/javascript">
       $(document).ready( function () {
         $('#example1').DataTable();
       } );
     </script>
   </body>
   </html>
