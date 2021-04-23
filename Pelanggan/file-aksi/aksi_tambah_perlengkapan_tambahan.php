<?php
include "../../koneksi.php";
session_start();
$id_paket= $_POST['id_paket'];
$id_pemesanan= $_POST['id_pemesanan'];
$id_perlengkapan= $_POST['id_perlengkapan'];
$jumlah_tambahan= $_POST['jumlah_tambahan'];
$harga_total= $_POST['harga_total'];
$sisa_pembayaran= $_POST['sisa_pembayaran'];
$harga_tambahan= mysql_query("SELECT * FROM perlengkapan WHERE id_perlengkapan= '$id_perlengkapan'");
$data=mysql_fetch_array($harga_tambahan);
$harga_satu=$data['harga_perlengkapan'];
$harga_dua=$harga_satu*$jumlah_tambahan;
$harga_akhir=$harga_dua+$harga_total;

$cekdata= mysql_query("SELECT * FROM tambahan_perlengkapan WHERE id_pemesanan = '$id_pemesanan' AND id_perlengkapan = '$id_perlengkapan' ");

if(mysql_num_rows($cekdata) > 0) {
 echo "<script> alert('Data telah dimasukan, coba lagi!');
 window.history.go(-1)/script>";
} else {
 $simpan = mysql_query("INSERT INTO tambahan_perlengkapan(id_pemesanan, id_perlengkapan,jumlah_tambahan) VALUES('$id_pemesanan','$id_perlengkapan','$jumlah_tambahan')");
 if($simpan) {
 $update="update pemesanan set harga_total='$harga_akhir', sisa_pembayaran='$harga_akhir'";
  $hasil1 = mysql_query($update);
  echo "<script> alert('Tambahan Perlengkapan berhasil disimpan!');
  window.location = '../pemesanan_paket.php?id=$id_paket'</script> ";
} else {
 echo "<script> alert('Tambahan Perlengkapan gagal disimpan!');
 window.location = '../pemesanan_paket.php?id=$id_paket'</script> ";
}
}

?>