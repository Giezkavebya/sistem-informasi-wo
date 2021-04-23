<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8' />
<link href='packages/core/main.css' rel='stylesheet' />
<link href='packages/daygrid/main.css' rel='stylesheet' />
<link href='packages/timegrid/main.css' rel='stylesheet' />
<link href='packages/list/main.css' rel='stylesheet' />
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
      defaultDate: '2018-05-12',
      navLinks: true, // can click day/week names to navigate views
      businessHours: true, // display business hours
      editable: true,
      events: [
<?php

	$conn = mysqli_connect("localhost","root","","inventory");
	$waktu_sekarang = date('Y-m-d H:i:s');

	// Check connection
	if (mysqli_connect_errno())
	  {
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	  }
	    $view       = $conn -> query ("SELECT * FROM `penjualan`");
                              while($row  = $view->fetch_array())
                              {
                            
?>
	  {
          title: '<?php echo  $row['nm_barang'];?>',
          start: '<?php echo  $row['tgl_penjualan'];?>',
          constraint: 'availableForMeeting', // defined below
          color: '#257e4a'
        },
							  <?php } ?>
      ]
    });

    calendar.render();
  });

</script>
<style>

  body {
    margin: 40px 10px;
    padding: 0;
    font-family: Arial, Helvetica Neue, Helvetica, sans-serif;
    font-size: 14px;
  }

  #calendar {
    max-width: 900px;
    margin: 0 auto;
  }

</style>
</head>
<body>

  <div id='calendar'></div>

</body>
</html>
