<?php
  require_once("../../koneksi.php");   
$id_inspirasi =$_GET['id'];
$sql= mysql_query("delete from inspirasi where id_inspirasi = '$id_inspirasi'");
if ($sql){
echo "<script> alert ('Data berhasil dihapus!');
window.location = '../../file-kelola/kelola_inspirasi.php'</script>";

} else {
echo "<script>alert('Data gagal dihapus'); history.go(-1)</script>";
}
?>
