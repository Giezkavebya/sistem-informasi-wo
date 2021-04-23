<?php
  require_once("../../koneksi.php");   
$id_perlengkapanpaket =$_GET['id'];
$sql= mysql_query("delete from perlengkapan_paket where id_perlengkapanpaket = '$id_perlengkapanpaket'");
if ($sql){
echo "<script> alert ('Data berhasil dihapus!');
  window.location = '../../file-kelola/kelola_perlengkapan_paket.php</script>";

} else {
echo "<script>alert('Data gagal dihapus'); history.go(-1)</script>";
}
?>
