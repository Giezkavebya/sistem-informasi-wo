<?php
session_start();
require_once("../../koneksi.php");

$id_pemesanan= $_POST['id_pemesanan'];
$id_paket= $_POST['id_paket'];
$id_gedung=$_POST['id_gedung'];

$update="update pemesanan set id_gedung='$id_gedung'";

$cek = mysql_query($update);

if($cek) {
	echo "<script> alert ('Gedung Berhasil ditambahkan!');
	window.location= '../pemesanan_paket.php?id=$id_paket'</script>";
} else {
	echo "<script> alert ('Gedung gagal ditambahkan!');
	window.location = '../pemesanan_paket.php?id=$id_paket'</script>";
}
?>