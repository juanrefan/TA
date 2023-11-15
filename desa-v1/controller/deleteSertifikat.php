<?php
include_once 'util.php';
$id=$_GET['id'];
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "CALL deleteSertifikat('$id')";


if ($conn->query($sql) === true) {
    // echo "New record created successfully";
    

} else {
    // echo "Error: " . $sql . "<br>" . $conn->error;
    echo '<script language="javascript">';
    echo 'alert("Successfully deleted"); location.href="http://localhost/Admin_perkades"';
    echo '</script>';
}





?>