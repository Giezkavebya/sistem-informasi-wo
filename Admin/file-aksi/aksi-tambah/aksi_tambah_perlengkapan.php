<?php
include("../../koneksi.php");
session_start();

$nama_perlengkapan= $_POST['nama_perlengkapan'];
$satuan=$_POST['satuan'];
$harga_perlengkapan= preg_replace("/[^0-9]/", "", $_POST['harga_perlengkapan']);

$query = "insert into perlengkapan(nama_perlengkapan, harga_perlengkapan, satuan) values 
('$nama_perlengkapan', '$harga_perlengkapan', '$satuan')";


$hasil = mysql_query($query);

if($hasil) {
	
	echo "<script> alert('Data Baru berhasil disimpan!');
	window.location = '../../file-kelola/kelola_paket.php'</script> ";
} else {
	echo "<script> alert('Data gagal disimpan!');
	window.location = '../../file-kelola/kelola_paket.php'</script> ";
}
?>