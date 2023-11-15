<?php
include_once "util.php";

// Query untuk mengambil data kode sertifikat yang terbesar (Max)
$query = mysqli_query($conn, "SELECT max(no_reg) as kodeTerbesar FROM tbmutasi");
$data = mysqli_fetch_array($query);
$kode = $data['kodeTerbesar'];
// Mengambil tgl hari ini
$tgl = date('Ymd');

//echo $tgl;  REG20231013_59

// mengambil angka kode yang terbesar, menggunakan fungsi substr

$urutan = (int) substr($kode,12,2);
$urutan++;

$huruf = "REG".$tgl."_";
$kodeMutasi = $huruf.sprintf("%02s",$urutan);




?>