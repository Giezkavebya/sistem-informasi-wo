<?php
include("../../koneksi.php");
session_start();

$ket_pengeluaran= $_POST['ket_pengeluaran'];
$harga=preg_replace("/[^0-9]/", "", $_POST['harga']);
$total= $_POST['total'];
$tanggal_pengeluaran =  date("Y-m-d");

$query = "insert into pengeluaran(ket_pengeluaran, harga, total, tanggal_pengeluaran) values 
('$ket_pengeluaran', '$harga', '$total', '$tanggal_pengeluaran')";


$hasil = mysql_query($query);

if($hasil) {
	
	echo "<script> alert('Data Baru berhasil disimpan!');
	window.location = '../../file-kelola/kelola_pengeluaran.php'</script> ";
} else {
	echo "<script> alert('Data gagal disimpan!');
	window.location = '../../file-kelola/kelola_pengeluaran.php'</script> ";
}
?>