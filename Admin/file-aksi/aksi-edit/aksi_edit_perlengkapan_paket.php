<?php
session_start();
require_once("../../koneksi.php");

$id_perlengkapanpaket= $_GET['id'];
$id_perlengkapan= $_POST['id_perlengkapan'];
$jumlah=$_POST['jumlah'];
$id_paket= $_POST['id_paket'];

$update="update perlengkapan_paket set id_perlengkapan='$id_perlengkapan', jumlah='$jumlah' where id_perlengkapanpaket='$id_perlengkapanpaket'";

$cek = mysql_query($update);

if($cek) {
	echo "<script> alert ('Perubahan berhasil disimpan!');
	window.location= '../../file-kelola/kelola_perlengkapan_paket.php?id=$id_paket'</script>";
} else {
	echo "<script> alert ('Perubahan gagal disimpan!');
	window.location = '../../file-kelola/kelola_perlengkapan_paket.php?id=$id_paket'</script>";
}
?>