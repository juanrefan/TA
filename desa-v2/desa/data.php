<?php
include_once "controller/util.php";

$query = mysqli_query($conn,  "SELECT COUNT(id) as jumlah FROM tbsertifikat");
    
 //menampilkan data
 $hasil = mysqli_fetch_array($query);
 
 //membuat data json
 echo json_encode(array('jumlah' => $hasil['jumlah']));
 
?>
