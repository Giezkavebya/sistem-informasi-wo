<?php
session_start();
require_once("../../koneksi.php");



$validasi_pembayaran= $_POST['validasi_pembayaran'];
$validasi_pemesanan= $_POST['validasi_pemesanan'];
$id_pemesanan= $_POST['id_pemesanan'];
$id_pembayaran= $_POST['id_pembayaran'];
$sisa_pembayaran= $_POST['sisa_pembayaran'];
$jumlah_pembayaran= $_POST['jumlah_pembayaran'];
$harga_total= $_POST['harga_total'];
$harga_kurang=$sisa_pembayaran-$jumlah_pembayaran;
$tanggal_pemasukan =  date("Y-m-d");
$update="UPDATE pembayaran set validasi_pembayaran='$validasi_pembayaran' WHERE id_pembayaran='$id_pembayaran'";
$cek = mysql_query($update);

if($cek) {
	$sql= "update pemesanan set sisa_pembayaran='$harga_kurang', validasi_pemesanan='Ya' WHERE id_pemesanan = '$id_pemesanan'";
	$hasil1 = mysql_query($sql);
	$cekdata= mysql_query("SELECT * FROM pemesanan WHERE id_pemesanan = '$id_pemesanan' AND validasi_pemesanan='Ya' AND sisa_pembayaran=0");
	if(mysql_num_rows($cekdata) < 0) {
	} else {	
		$query = "insert into pemasukan(ket_pemasukan, total_pemasukan, tanggal_pemasukan) values 
		('$id_pemesanan', '$harga_total', '$tanggal_pemasukan')";
		$hasil = mysql_query($query);
	}
	
	$cekvalid= mysql_query("SELECT * FROM pembayaran WHERE id_pemesanan = '$id_pemesanan'");
	$sql_acara = mysql_query("SELECT tanggal_acara from jadwal_acara where id_pemesanan='$id_pemesanan' order by tanggal_acara ASC LIMIT 1");
	$num = mysql_fetch_array($sql_acara);
	$tanggalacara = $num['tanggal_acara'];
	$sql_pesan = mysql_query("SELECT tanggal_pesan from pemesanan where id_pemesanan='$id_pemesanan'");
	$hitung = mysql_fetch_array($sql_pesan);
	$tanggalpesan = $hitung['tanggal_pesan'];

	$start = strtotime($tanggalpesan);
	$end = strtotime($tanggalacara);
	$timeDiff = abs($end - $start);
	$numberDays = $timeDiff/86400; 
	$numberDays1 = floor(intval($numberDays)/3);
	$pertemuan3 =date('Y-m-d', strtotime("-$numberDays1 days", strtotime($tanggalacara)));
	$pertemuan2 =date('Y-m-d', strtotime("-$numberDays1 days", strtotime($pertemuan3)));
	$pertemuan1 =date('Y-m-d', strtotime("-$numberDays1 days", strtotime($pertemuan2)));
	

	if(mysql_num_rows($cekvalid)!=1) {
	} else {	
		$query1= "insert into jadwal_pertemuan(id_pemesanan, tanggal_pertemuan) values 
		('$id_pemesanan', '$pertemuan1') ,('$id_pemesanan', '$pertemuan2'), ('$id_pemesanan', '$pertemuan3')";
		$hasil1 = mysql_query($query1);
	}
	echo "<script> alert ('Validasi Berhasil!');
	window.location= '../../file-edit/detail_pembayaran.php?id=$id_pembayaran'</script>";
} else {
	echo "<script> alert ('Validasi Gagal!');
	window.location = '../../file-edit/detail_pembayaran.php?id=$id_pembayaran'</script>";
}
?>