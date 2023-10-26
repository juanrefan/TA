<?php
include_once "data.php";

    // melakukan koneksi 
    
    //mengambil data 5 pesan terbaru 
    $sql = mysqli_query($conn, "SELECT * FROM tbSertifikat ORDER BY id DESC limit 10");
    $result = array();
    
    while ($row = mysqli_fetch_assoc($sql)) {
        $data[] = $row;
    }

    echo json_encode(array("result" => $data));
?>