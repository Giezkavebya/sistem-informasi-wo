<?php
include "../../koneksi.php";
session_start();
date_default_timezone_set('Asia/Jakarta');

$id_pemesanan= $_POST['id_pemesanan'];
$id_paket= $_POST['id_paket'];
$nama_acara =implode($_POST['nama_acara']);
$date = mysql_real_escape_string($_POST['tanggal_acara']);
$new_date = date('Y-m-d',strtotime($date));
$new_waktu = date('H:i',strtotime($_POST['waktu_acara']));

$cekdata= mysql_query("SELECT COUNT(*) AS hitung FROM jadwal_acara WHERE tanggal_acara= '$new_date'");
$num = mysql_fetch_array($cekdata);
$count = $num['hitung'];

$cekwaktu=mysql_query("SELECT waktu_acara FROM jadwal_acara WHERE tanggal_acara='$new_date'");

if(($count > 3) && (mysql_num_rows($cekwaktu) > 0)) {
 echo "<script> alert('Tanggal tidak tersedia, coba lagi!');
 window.location = '../pemesanan_paket.php?id=$id_paket'</script>";
} else {
 $query = "INSERT INTO jadwal_acara(nama_acara,id_pemesanan,tanggal_acara,waktu_acara) VALUES('$nama_acara','$id_pemesanan','$new_date','$new_waktu')";
 $simpan = mysql_query($query);
 if($simpan) {
   echo "<script> alert('Tanggal Acara berhasil disimpan!');
   window.location = '../pemesanan_paket.php?id=$id_paket'</script> ";
 } else {
   echo "<script> alert('Tanggal Acara gagal disimpan!');
   window.location = '../pemesanan_paket.php?id=$id_paket'</script> ";
 }
}

?>
