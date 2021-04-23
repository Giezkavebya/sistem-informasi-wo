<?php
include "koneksi.php";

$username=$_POST['username'];
$pass=($_POST['pass']);

$qry=mysql_query("SELECT * FROM pelanggan WHERE username='$username' AND pass='$pass' ");
$jumpa=mysql_num_rows($qry);
$r=mysql_fetch_array($qry);

if ($jumpa > 0) {
	session_start();
	$_SESSION[username]= $r[username];
	$_SESSION[id_pelanggan]= $r[id_pelanggan];
	header('location:Pelanggan/profil_pelanggan.php');
}
else {
	echo '<script language="javascript">
	alert("Username atau Password Yang anda Masukkan Salah");
	window.location="login.php";
	</script>';
	exit();
}
?>