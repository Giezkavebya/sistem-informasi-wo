<?php
session_start();
require_once("../../koneksi.php");

$id_perlengkapan = $_GET['id'];
$nama_perlengkapan = $_POST['nama_perlengkapan'];
$harga_perlengkapan = $_POST['harga_perlengkapan'];


$update="update perlengkapan set nama_perlengkapan='$nama_perlengkapan', harga_perlengkapan='$harga_perlengkapan' where id_perlengkapan='$id_perlengkapan'";

$cek = mysql_query($update);

if($cek) {
	echo "<script> alert ('Perubahan berhasil disimpan!');
	window.location= 'kelola_paket.php'</script>";
} else {
	echo "<script> alert ('Perubahan gagal disimpan!');
	window.location = 'kelola_paket.php'</script>";
}
?>