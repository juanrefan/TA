<?php
include_once "../controller/util.php";

    // melakukan koneksi 
    
    //mengambil data 5 pesan terbaru 
    $sql = mysqli_query($conn, "SELECT * FROM tbsertifikat ORDER BY id DESC limit 5");
    $result = array();
    
    while ($row = mysqli_fetch_assoc($sql)) {
        $data[] = $row;
    }

    echo json_encode(array("result" => $data));
?>