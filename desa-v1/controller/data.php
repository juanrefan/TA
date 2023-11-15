<?php
include_once "util.php";

$query = mysqli_query($conn,  "SELECT COUNT(id) as jumlah FROM tbSertifikat");

// if ($query) {
//     $hasil = mysqli_fetch_assoc($query);

//     if ($hasil !== null) {
//         echo json_encode(array('jumlah' => $hasil['jumlah']));
//     } else {
//         echo json_encode(array('error' => 'No results found'));
//     }
// } else {
//     echo json_encode(array('error' => mysqli_error($conn)));
// }

$hasil = mysqli_fetch_array($query);

echo json_encode('jumlah'=>$hasil['jumlah']);
?>
