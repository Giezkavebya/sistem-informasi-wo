<?php
include "../../koneksi.php";   
session_start();
$id_acara =$_GET['id_acara'];
$sql= mysql_query("delete from jadwal_acara where id_acara='$id_acara'");
if ($sql){
	echo "<script> alert ('Acara berhasil dihapus!');history.go(1)</script>";

} else {
	echo "<script>alert('Acara gagal dihapus'); history.go(-1)</script>";
}
?>
