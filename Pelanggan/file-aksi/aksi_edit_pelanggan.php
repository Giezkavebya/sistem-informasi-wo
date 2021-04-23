<?php 
session_start();
include "../../koneksi.php";
$id_pelanggan		= $_SESSION['id_pelanggan'];
$nama_pelanggan		= $_POST['nama_pelanggan'];
$username			= $_POST['username'];
$nama_pasangan 		= $_POST['nama_pasangan'];
$alamat 			= $_POST['alamat'];
$no_telp 			= $_POST['no_telp'];
$email 				= $_POST['email'];
$konsep_pernikahan 	= $_POST['konsep_pernikahan'];
$cekuser = mysql_query("SELECT * FROM pelanggan WHERE username='$username' AND NOT id_pelanggan='$id_pelanggan'");
if(mysql_num_rows($cekuser) > 0) {
	echo "<script> alert('Username tidak tersedia!');
	window.location = 'profil_pelanggan.php'</script> ";
} else {

	$update="update pelanggan set nama_pelanggan='$nama_pelanggan', username='$username', nama_pasangan='$nama_pasangan', alamat='$alamat',no_telp='$no_telp', email='$email', konsep_pernikahan='$konsep_pernikahan'  where id_pelanggan='$id_pelanggan'";

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