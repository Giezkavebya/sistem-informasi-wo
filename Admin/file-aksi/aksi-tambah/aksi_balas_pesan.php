<?php
include('../../koneksi.php');
session_start();
date_default_timezone_set("ASIA/JAKARTA");
$id_pesanpelanggan	= $_POST['id_pesanpelanggan'];
$isi_balasan	= $_POST['isi_balasan'];
$tanggal_kirim =  date("Y-m-d H:i:s");
$query = "insert into balas_pesan(id_pesanpelanggan, isi_balasan, tanggal_kirim ) values 
('$id_pesanpelanggan', '$isi_balasan', '$tanggal_kirim')";
$hasil = mysql_query($query);

if($hasil) {
	echo "<script> alert('Pesan berhasil dikirim!');
	window.location = '../../file-kelola/kelola_pesan.php'</script> ";
} else {
	echo "<script> alert('Pesan Gagal disimpan!');
	window.location = '../../file-kelola/kelola_pesan.php'</script> ";
}

?>