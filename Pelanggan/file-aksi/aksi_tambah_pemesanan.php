<?php
include('../../koneksi.php');
session_start();
	$id_pelanggan	= $_POST['id_pelanggan'];
	$id_paket	= $_POST['id_paket'];
	$id_pemesanan	= $_POST['id_pemesanan'];
	$tanggal_pesan =  date("Y-m-d");
	$harga_total=$_POST['harga_paket'];
	$sisa_pembayaran=$_POST['harga_paket'];
	$cekdata= mysql_query("SELECT * FROM pemesanan WHERE id_pelanggan = '$id_pelanggan' AND sisa_pembayaran IS NOT NULL");
	if(mysql_num_rows($cekdata) > 0) {
		echo "<script> alert('Maaf anda belum dapat melakukan pemesanan paket, sebelum melakukan pelunasan pada pemesanan anda saat ini');
		window.location = '../paket_pelanggan.php'</script>";
	} else {
		$query = "insert into pemesanan(id_pelanggan, id_paket, tanggal_pesan, harga_total, sisa_pembayaran) values 
		('$id_pelanggan', '$id_paket', '$tanggal_pesan', '$harga_total','$sisa_pembayaran')";
		$hasil = mysql_query($query);

		if($hasil) {
			echo "<script> alert('Pemesanan Paket berhasil disimpan!');
			window.location = '../pemesanan_paket.php?id=$id_paket&id_pemesanan=$id_pemesanan'</script> ";
		} else {
			echo "<script> alert('Pemesanan Paket gagal disimpan!');
			window.location = '../paket_pelanggan.php'</script> ";
		}
	}

	?>