<?php
include "../koneksi.php";
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Lihat Jadwal Pertemuan</title>
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
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <link href='packages/core/main.css' rel='stylesheet'/>
  <link href='packages/daygrid/main.css' rel='stylesheet'/>
  <style>


  #calendar {
    max-width: 900px;
    margin: 0 auto;
  }

</style>
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
              <h1 class="m-0 text-dark">Lihat Jadwal Pertemuan</h1>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card border-dark mb-3" style="max-width: 100rem;">
                <div class="card-body text-dark">
                </div>
              </div>
              <div class="card">
               <div id='calendar'></div>
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


  <script src='packages/core/main.js'></script>
  <script src='packages/interaction/main.js'></script>
  <script src='packages/daygrid/main.js'></script>
  <script src='packages/timegrid/main.js'></script>
  <script src='packages/list/main.js'></script>
  <script>

    document.addEventListener('DOMContentLoaded', function() {
      var calendarEl = document.getElementById('calendar');

      var calendar = new FullCalendar.Calendar(calendarEl, {
        plugins: [ 'interaction', 'dayGrid', 'timeGrid', 'list' ],
        header: {
          left: 'prev,next today',
          center: 'title',
          right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
        },
        defaultDate: '2020-01-01',
      navLinks: true, // can click day/week names to navigate views
      businessHours: true, // display business hours
      editable: true,
      events: [
      <?php

      $conn = mysqli_connect("localhost","root","","caricacan");
      $waktu_sekarang = date('Y-m-d H:i:s');

  // Check connection
      if (mysqli_connect_errno())
      {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
      }
      $view       = $conn -> query ("SELECT * FROM jadwal_pertemuan JOIN pemesanan ON jadwal_pertemuan.id_pemesanan=pemesanan.id_pemesanan JOIN pelanggan ON pemesanan.id_pelanggan=pelanggan.id_pelanggan");
      while($row  = $view->fetch_array())
      {

        ?>
        {
          title: '<?php echo  $row['nama_pelanggan'];?>',
          start: '<?php echo  $row['tanggal_pertemuan'];?>',
          constraint: 'availableForMeeting', // defined below
          color: '#257e4a'
        },
      <?php } ?>
      ]
    });

      calendar.render();
    });

  </script>
</body>
</html>
