<?php
require 'koneksi.php';

$nama=$_POST['nama'];
$no_meja=$_POST['no_meja'];
$menu=$_POST['menu'];
$jumlah = $_POST['jumlah'];
$tanggal=$_POST['tanggal'];
$j = 0;
for ($i=0; $i < count($jumlah); $i++) { 
	if ($jumlah[$i] != NULL) {
		$jml = $jumlah[$i];
		$idmenu = $menu[$j];
		$query = $konek->query("INSERT INTO `transaksi` (`nama_pelanggan`, `no_meja`, `id_menu`, `jumlah`, `tanggal`) VALUES ('$nama',$no_meja,$idmenu,$jml,'$tanggal')"); // 1
		$j++;
	}
}
if ($query) {
	echo "Sukses";
	header("location:transaksi.php");
}else{
	var_dump($query);
}
?>
