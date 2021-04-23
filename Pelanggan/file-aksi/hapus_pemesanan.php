<?php
  require_once("../../koneksi.php");   
$id_pemesanan =$_POST['id_pemesanan'];
$id_paket =$_POST['id_paket'];
$sql= mysql_query("delete from pemesanan where id_pemesanan = '$id_pemesanan'");
if ($sql){
echo "<script> alert ('Pemesanan berhasil dibatalkan!');
window.location = '../detail_paket_pelanggan.php?id=$id_paket'</script>";

} else {
echo "<script>alert('Pemesanan gagal dibatalkan'); history.go(-1)</script>";
}
?>
