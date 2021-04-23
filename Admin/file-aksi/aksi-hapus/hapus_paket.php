<?php
  require_once("../../koneksi.php");   
$id_paket =$_GET['id'];
$sql= mysql_query("delete from paket where id_paket = '$id_paket'");
if ($sql){
echo "<script> alert ('Data berhasil dihapus!');
window.location = '../../file-kelola/kelola_paket.php'</script>";

} else {
echo "<script>alert('Data gagal dihapus'); history.go(-1)</script>";
}
?>
