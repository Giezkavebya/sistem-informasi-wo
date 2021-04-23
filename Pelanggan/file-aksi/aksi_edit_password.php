<?php 
session_start();
include "../../koneksi.php";
$id_pelanggan		= $_SESSION['id_pelanggan'];
$pass_lama			= $_POST['pass_lama'];
$pass_baru			= $_POST['pass_baru'];
$cekuser = mysql_query("SELECT * FROM pelanggan WHERE pass='$pass_lama' AND id_pelanggan='$id_pelanggan'");
$num = mysql_fetch_array($cekuser);
if($num == false) {
	echo "<script> alert('Password lama salah!');
	window.location = '../profil_pelanggan.php'</script> ";
} else {
	$update="UPDATE pelanggan set pass='$pass_baru' where id_pelanggan='$id_pelanggan'";

	$cek = mysql_query($update);

	if($cek){
		echo "<script> alert ('Perubahan berhasil disimpan!');
		window.location = '../profil_pelanggan.php'</script>";
	}
	else{
		echo "<script> alert ('Data gagal disimpan!');
		window.location = '../profil_pelanggan.php'</script>";
	}
}
?>