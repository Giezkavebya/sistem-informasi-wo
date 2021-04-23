<?php
include('../../koneksi.php');
session_start();

$judul_alur = $_POST['judul_alur'];
$isi_alur= $_POST['isi_alur'];

$query = "insert into alur_pemesanan( judul_alur, isi_alur) values 
				 ( '$judul_alur', '$isi_alur')";
	
	$hasil = mysql_query($query);
	
if($hasil) {
	
	echo "<script> alert('Data Baru berhasil disimpan!');
	window.location = '../../file-kelola/kelola_alur.php'</script> ";
} else {
	echo "<script> alert('Data gagal disimpan!');
	window.location = '../../file-kelola/kelola_alur.php'</script> ";
	}
?>