<?php

function update_status_sertifikat(){

    include_once "registrasiahliWaris.php";
    

    if($_POST['btnAction']){
      
            $id = filter_input(INPUT_POST, "id");
            $status = filter_input(INPUT_POST, "status");

            // Cek Koneksi
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            
            // Query Input/Insert 
            
            // $sql = "UPDATE tbsertifikat SET status_pengajuan = '$status' WHERE id='$id'";
            $sql = "CALL update_status_ahliWaris('$id', '$status')";
            

            if ($conn->query($sql) === true) {
                // echo "New record created successfully";
                echo '<script language="javascript">';
                echo 'alert("Update Status Berhasil"); location.href="http://localhost/Admin_perkades"';
                echo '</script>';

            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }

// End If BtnAction
        }
    

    }

update_status_sertifikat();


?>






