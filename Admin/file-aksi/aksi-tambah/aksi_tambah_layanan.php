<?php
include("../../koneksi.php");
session_start();

$nama_layanan = $_POST['nama_layanan'];


$query = "insert into layanan(nama_layanan) values 
('$nama_layanan')";


$hasil = mysql_query($query);

if($hasil) {
	
	echo "<script> alert('Data Baru berhasil disimpan!');
	window.location = '../../file-kelola/kelola_layanan.php'</script> ";
} else {
	echo "<script> alert('Data gagal disimpan!');
	window.location = '../../file-kelola/kelola_layanan.php'</script> ";
}
?>