<?php
  require_once("../../koneksi.php");   
$id_alur =$_GET['id'];
$sql= mysql_query("delete from alur_pemesanan where id_alur = '$id_alur'");
if ($sql){
echo "<script> alert ('Data berhasil dihapus!');
window.location = '../../file-kelola/kelola_alur.php'</script>";

} else {
echo "<script>alert('Data gagal dihapus'); window.location = '../../file-kelola/kelola_alur.php'</script>";
}
?>
