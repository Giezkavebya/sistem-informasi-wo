<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Caricacan and Team Wedding Organizer | Admin Log in</title>
  <link rel="icon" href="../images/logocari.png" type="image/png">
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/square/blue.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link href='https://fonts.googleapis.com/css?family=Sofia' rel='stylesheet'>
</head>
<style>
.hold-transition {
  background :url(../images/paket1.jpg);
  background-size:80%; 
}
.login-box {
  opacity: 0.9;
}
</style>
<body class="hold-transition login-page">
  <div class="login-box">
    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body">
        <div class="login-logo">
          <a href="index.php"><b style="font-size:30px; font-family: 'Sofia';">Caricacan and Team</b></a>
        </div>
        <p class="login-box-msg" style="font-size:20px;" >ADMIN LOGIN</p>
        <form action="proses_login_admin.php" method="POST">
          <div class="form-group has-feedback">
            <input type="username" class="form-control" placeholder="Username" name="username_adm">
          </div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" placeholder="Password" name="pass_adm">
          </div>
          <div class="row">
            <!-- /.col -->
            <div class="col-12">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Log In</button>
            </div>
            <!-- /.col -->
          </div>
        </form>
      </div>
      <!-- /.login-card-body -->
    </div>
  </div>
  <!-- /.login-box -->

  <!-- jQuery -->
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- iCheck -->
  <script src="plugins/iCheck/icheck.min.js"></script>
</body>
</html>
