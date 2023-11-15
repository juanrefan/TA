<?php

function upload_berkas(){

    include_once "registrasiSertifikat.php";
     $files = $_FILES; 
    // echo "<pre>";
    // print_r($files);
    // echo "</pre>";

    if($_POST['btnAction']){
        $allow_ekstensi = array('png','jpg','jpeg','pdf');
        $files = $_FILES;
        $jumlahFile = count($files['file']['name']);

        for ($i = 0; $i < $jumlahFile; $i++) {
            $namaFile  = $files['file']['name'][$i];
            // $lokasiTmp = $files['file']['tmp_name'][$i];
            // $sizeFile  = $files['file']['size'][$i];
            
        // End For
        }
        
        // Cek ekstensi
        $x_file = explode('.',$namaFile);
        $ekstension_file = strtolower(end($x_file));
        if(in_array($ekstension_file,$allow_ekstensi)===TRUE){
            
            // Cek Size
            if ($files['file']['size'][0]>200000 AND $files['file']['size'][1]>200000 AND $files['file']['size'][2]>200000 AND $files['file']['size'][3]>200000  ) {
                echo '<script language="javascript">';
                echo 'alert("Ukuran file melebihi kapasitas 200kb"); location.href="http://localhost/Admin_perdes"';
                echo '</script>';
            }elseif($files['file']['size'][0]>200000 OR $files['file']['size'][1]>200000 OR $files['file']['size'][2]>200000 OR $files['file']['size'][3]>200000 ){
                echo '<script language="javascript">';
                echo 'alert("Ukuran file melebihi kapasitas 200kb"); location.href="http://localhost/Admin_perdes"';
                echo '</script>';
            }else{
                //echo "Test";
                // Jika extension allow dan ukuran File Benar
            $folderUpload = "../Sertifikat/registrasiSertifikat";
            $namaBaru0 = $kodeSertifikat. '-' . $files['file']['name'][0];
            $namaBaru1 = $kodeSertifikat. '-' . $files['file']['name'][1];
            $namaBaru2 = $kodeSertifikat. '-' . $files['file']['name'][2];
            $namaBaru3 = $kodeSertifikat. '-' . $files['file']['name'][3];

            $lokasiTmp0=$files['file']['tmp_name'][0];
            $lokasiTmp1=$files['file']['tmp_name'][1];
            $lokasiTmp2=$files['file']['tmp_name'][2];
            $lokasiTmp3=$files['file']['tmp_name'][3];

            $lokasiBaru0 = "{$folderUpload}/{$namaBaru0}";
            $lokasiBaru1 = "{$folderUpload}/{$namaBaru1}";
            $lokasiBaru2 = "{$folderUpload}/{$namaBaru2}";
            $lokasiBaru3 = "{$folderUpload}/{$namaBaru3}";

            move_uploaded_file($lokasiTmp0, $lokasiBaru0);
            move_uploaded_file($lokasiTmp1, $lokasiBaru1);
            move_uploaded_file($lokasiTmp2, $lokasiBaru2);
            move_uploaded_file($lokasiTmp3, $lokasiBaru3);

           

            // Input Data Ke Database
            $ktp =  $namaBaru0;
            $kk  =  $namaBaru1;
            $pbb =  $namaBaru2;
            $buktiSurat =  $namaBaru3;
            $id = filter_input(INPUT_POST, "id");
            $no_reg = filter_input(INPUT_POST, "no_reg_sertifikat");
            $tanggal = filter_input(INPUT_POST, "tanggal");
            $firstName = filter_input(INPUT_POST, "firstname");
            $lastName = filter_input(INPUT_POST, "lastname");
            $alamatPemohon = filter_input(INPUT_POST, "alamatpemohon");
            $kikitir = filter_input(INPUT_POST, "kikitir");
            $no_desa = filter_input(INPUT_POST, "nodesa");
            $blok = filter_input(INPUT_POST, "blok");
            $persil = filter_input(INPUT_POST, "persil");
            $luasTanah = filter_input(INPUT_POST, "luastanah");
            $batasTanah = filter_input(INPUT_POST, "batastanah");
            $keterangan = filter_input(INPUT_POST, "keterangan");
            $status = filter_input(INPUT_POST, "status");

            // Cek Koneksi
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $nodesaCheck = "SELECT * FROM tbSertifikat where no_c_desa = '$no_desa'";
             
             $result = $conn->query($nodesaCheck);
             if($result->num_rows>0){
                echo '<script language="javascript">';
                echo 'alert("Maaf no C Desa sudah Terdaftar !"); location.href="http://localhost/warga_sertifikat"';
                echo '</script>';
              

             }else{
                
                $sql = "CALL updateSertifikat('$id', '$no_reg', '$tanggal', '$firstName', '$lastName','$alamatPemohon','$kikitir', '$no_desa', '$blok','$persil', '$luasTanah', '$batasTanah', '$keterangan', '$ktp', '$kk', '$pbb', '$buktiSurat','$status')";

             }

            
        



            
            
            // Query Input/Insert 
          

            // $sql = "INSERT INTO tbsertifikat (no_reg, tanggal, first_name, last_name, alamat_pemohon, 
            //  kikitir_no, no_c_desA, blok, persil, luas_tanah, batas_tanah, keterangan, ktp, kk, sppt_pbb, 
            // buktisuratLain, status_pengajuan ) VALUES ('$no_reg', '$tanggal', '$firstName', '$lastName', '$alamatPemohon', 
            // '$kikitir', '$no_desa', '$blok','$persil', '$luasTanah', '$batasTanah', '$keterangan', '$ktp', '$kk', '$pbb', '$buktiSurat','$status')";

          

            if ($conn->query($sql) === true) {
                // echo "New record created successfully";
                echo '<script language="javascript">';
                echo 'alert("Successfully Registered"); location.href="http://localhost/Admin_perdes"';
                echo '</script>';

            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }


        }
    // End If in_array
    }else{
        echo '<script language="javascript">';
        echo 'alert("Ekstensi file hanya menerima jpg,jpeg,png, dan pdf"); location.href="http://localhost/Admin_perdes"';
        echo '</script>';
    }
// End If BtnAction
    }
    
// End Function
}

upload_berkas();


?>