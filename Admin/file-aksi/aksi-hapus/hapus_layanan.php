<?php
  require_once("../../koneksi.php");   
$id_layanan =$_GET['id'];
$sql= mysql_query("delete from layanan where id_layanan = '$id_layanan'");
if ($sql){
echo "<script> alert ('Data berhasil dihapus!');
window.location = '../../file-kelola/kelola_layanan.php'</script>";

} else {
echo "<script>alert('Data gagal dihapus'); history.go(-1)</script>";
}
?>
