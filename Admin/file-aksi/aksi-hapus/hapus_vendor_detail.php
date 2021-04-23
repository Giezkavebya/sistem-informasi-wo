<?php
  require_once("../../koneksi.php");   
$id_vendor =$_GET['id'];
$sql= mysql_query("delete from detail_vendor where id_vendor = '$id_vendor'");
if ($sql){
echo "<script> alert ('Data berhasil dihapus!');
window.location = '../../file-kelola/kelola_vendor.php'</script>";

} else {
echo "<script>alert('Data gagal dihapus'); history.go(-1)</script>";
}
?>
