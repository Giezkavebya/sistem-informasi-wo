<?php
require_once("../../koneksi.php");   
$id_pemesanan= $_POST['id_pemesanan'];
$id_paket= $_POST['id_paket'];
$id_gedung=$_POST['id_gedung'];
$harga_total= $_POST['harga_total'];
$sisa_pembayaran= $_POST['sisa_pembayaran'];
$harga_gedung= mysql_query("SELECT * FROM gedung WHERE id_gedung= '$id_gedung'");
$data=mysql_fetch_array($harga_gedung);
$harga_satu=$data['harga_tambahgedung'];
$harga_akhir=$harga_total-$harga_satu;
$sql= mysql_query("delete id_gedung from pemesanan where id_pemesanan = '$id_pemesanan'");
if ($sql){
	$update="update pemesanan set harga_total='$harga_akhir', sisa_pembayaran='$harga_akhir'";
$cek = mysql_query($update);
	echo "<script> alert ('Data berhasil dihapus!');
	window.location= '../pemesanan_paket.php?id=$id_paket'</script>";

} else {
	echo "<script>alert('Data gagal dihapus'); history.go(-1)</script>";
}
?>
