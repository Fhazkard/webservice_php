<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'database_bwb';
$koneksi = mysqli_connect($host, $user, $pass, $db);
if(!$koneksi)
{
	echo "Koneksi Ke Database Gagal! ".mysqli_error;
}
?>
