<?php
$konek = new mysqli("localhost","root","","restoran");
	if($konek->connect_error){
  die("Koneksi Gagal Karena : ". $konek->connect_error);
  date_default_timezone_set('Asia/Jakarta');
}
?>