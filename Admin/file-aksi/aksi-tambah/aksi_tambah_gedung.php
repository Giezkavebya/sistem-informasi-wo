<?php
include("../../koneksi.php");
session_start();

$nama_gedung= $_POST['nama_gedung'];
$harga_gedung= preg_replace("/[^0-9]/", "", $_POST['harga_gedung']);
$harga_tambahgedung= preg_replace("/[^0-9]/", "", $_POST['harga_tambahgedung']);

$query = "insert into gedung(nama_gedung, harga_gedung, harga_tambahgedung) values 
('$nama_gedung', '$harga_gedung', '$harga_tambahgedung')";


$hasil = mysql_query($query);

if($hasil) {
	
	echo "<script> alert('Data Baru berhasil disimpan!');
	window.location = '../../file-kelola/kelola_paket.php'</script> ";
} else {
	echo "<script> alert('Data gagal disimpan!');
	window.location = '../../file-kelola/kelola_paket.php'</script> ";
}
?>