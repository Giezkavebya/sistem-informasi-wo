<?php
include('../../koneksi.php');
session_start();
$id_pelanggan	= $_POST['id_pelanggan'];
$isi_pesan	= $_POST['isi_pesan'];
$tanggal_kirim =  date("Y-m-d H:i:s");
$query = "insert into pesan_pelanggan(id_pelanggan, isi_pesan, tanggal_kirim ) values 
('$id_pelanggan', '$isi_pesan', '$tanggal_kirim')";
$hasil = mysql_query($query);

if($hasil) {
	echo "<script> alert('Pemesanan Paket berhasil disimpan!');
	window.location = '../profil_pelanggan.php'</script> ";
} else {
	echo "<script> alert('Pemesanan Paket gagal disimpan!');
	window.location = '../profil_pelanggan.php'</script> ";
}

?>