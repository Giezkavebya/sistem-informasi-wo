<?php
include("../../koneksi.php");
session_start();
error_reporting(0);
$id_pemesanan=$_POST['id_pemesanan'];
$metode_pembayaran = $_POST['metode_pembayaran'];
$id_pembayaran = $_POST['id_pembayaran'];


$query = "update pemesanan set metode_pembayaran='$metode_pembayaran' where id_pemesanan='$id_pemesanan'";

$hasil = mysql_query($query);
if($hasil) {
	$sql=mysql_query("SELECT metode_pembayaran FROM pemesanan WHERE id_pemesanan='$id_pemesanan'");
	$data=mysql_fetch_array($sql);
		 $rowcart=mysql_fetch_row($data);
		  $sendorder="INSERT INTO pembayaran (id_pembayaran, id_pemesanan) VALUES ('', '$id_pemesanan')";
        while($data=mysql_fetch_row($sendorder))
        	 $sendorder[] = $data['sendorder'];
            $sendorder.=", ('', '$id_pemesanan')";
        $result=mysql_query($sendorder);
		echo "<script> alert ('PERHATIAN! Pemesanan anda akan diproses, mohon selanjutnya lakukan pembayaran paling lambat 3 x 24 jam. Pilih menu pemesanan saya untuk memeriksa data pemesanan anda dan mengunggah bukti pembayaran');
		window.location= '../profil_pelanggan.php'</script>";
	} else {
		echo "<script> alert ('Pemesanan gagal disimpan!');
		window.location = '../profil_pelanggan.php'</script>";
	}
	?>