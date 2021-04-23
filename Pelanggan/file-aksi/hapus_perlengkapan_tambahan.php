<?php
  require_once("../../koneksi.php");   
$id_tambahan =$_GET['id'];

$id_pemesanan= $_POST['id_pemesanan'];
$id_perlengkapan= $_POST['id_perlengkapan'];
$jumlah_tambahan= $_POST['jumlah_tambahan'];
$harga_tambahan= mysql_query("SELECT * FROM perlengkapan WHERE id_perlengkapan= '$id_perlengkapan'");
$data=mysql_fetch_array($harga_tambahan);
$harga_satu=$data['harga_perlengkapan'];
$harga_dua=$harga_satu*$jumlah_tambahan;
$harga_akhir=$harga_dua-$harga_total;

$sql= mysql_query("delete from tambahan_perlengkapan where id_tambahan = '$id_tambahan'");
if ($sql){
$update="update pemesanan set harga_total='$harga_akhir', sisa_pembayaran='$harga_akhir' WHERE id_pemesanan='$id_pemesanan'";
  $hasil1 = mysql_query($update);
echo "<script> alert ('Data berhasil dihapus!');
  window.location = 'kelola_perlengkapan_paket.php?id=$id_paket'</script>";

} else {
echo "<script>alert('Data gagal dihapus'); history.go(-1)</script>";
}
?>
