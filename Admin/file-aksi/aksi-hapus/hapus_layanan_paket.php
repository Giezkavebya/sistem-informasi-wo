<?php
  require_once("../../koneksi.php");   
$id_detlayananpaket =$_GET['id'];
$sql= mysql_query("delete from detail_layananpaket where id_detlayananpaket = '$id_detlayananpaket'");
if ($sql){
echo "<script> alert ('Data berhasil dihapus!');
  window.location = '../../file-kelola/kelola_layanan_paket.php'</script>";

} else {
echo "<script>alert('Data gagal dihapus'); history.go(-1)</script>";
}
?>
