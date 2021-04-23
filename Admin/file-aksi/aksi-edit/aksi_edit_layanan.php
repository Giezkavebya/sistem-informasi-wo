<?php
session_start();
require_once("../../koneksi.php");

$id_layanan = $_GET['id'];
$nama_layanan = $_POST['nama_layanan'];


$update="update layanan set nama_layanan='$nama_layanan' where id_layanan='$id_layanan'";

$cek = mysql_query($update);

if($cek) {
	echo "<script> alert ('Perubahan berhasil disimpan!');
	window.location= '../../file-kelola/kelola_layanan.php'</script>";
} else {
	echo "<script> alert ('Perubahan gagal disimpan!');
	window.location = '../../file-kelola/kelola_layanan.php'</script>";
}
?>