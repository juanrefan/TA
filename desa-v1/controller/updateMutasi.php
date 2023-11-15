
<?php

function uploadBerkas(){
    include_once "registrasiMutasi.php";
    $files = $_FILES;

    if($_POST['btnAction']){
        //cek ekstensi files
        $allowEkstensi = array('png','jpg','jpeg','pdf');
        $files= $_FILES;
        $jumlahfile = count($files['file']['name']);

        for ($i=0; $i < $jumlahfile; $i++){
            $namaFile=$files['file']['name'][$i];

        }
        $x_file = explode('.',$namaFile);
        $ekstension_file= strtolower(end($x_file));
        if(in_array($ekstension_file,$allowEkstensi)==TRUE){


            if ($files['file']['size'][0]>200000 AND $files['file']['size'][1]>200000 AND $files['file']['size'][2]>200000) {
                echo '<script language="javascript">';
                echo 'alert("Ukuran file melebihi kapasitas 200kb"); location.href="http://localhost/Admin_desa"';
                echo '</script>';
            }elseif($files['file']['size'][0]>200000 OR $files['file']['size'][1]>200000 OR $files['file']['size'][2]>200000){
                echo '<script language="javascript">';
                echo 'alert("Ukuran file melebihi kapasitas 200kb"); location.href="http://localhost/Admin_desa"';
                echo '</script>';
            }else{
                //echo "Test";
                // Jika extension allow dan ukuran File Benar
            $folderUpload = "../Mutasi/registrasiMutasi";
            $namaBaru0 = $kodeMutasi. '-' . $files['file']['name'][0];
            $namaBaru1 = $kodeMutasi. '-' . $files['file']['name'][1];
            $namaBaru2 = $kodeMutasi. '-' . $files['file']['name'][2];
          
            $lokasiTmp0=$files['file']['tmp_name'][0];
            $lokasiTmp1=$files['file']['tmp_name'][1];
            $lokasiTmp2=$files['file']['tmp_name'][2];
            

            $lokasiBaru0 = "{$folderUpload}/{$namaBaru0}";
            $lokasiBaru1 = "{$folderUpload}/{$namaBaru1}";
            $lokasiBaru2 = "{$folderUpload}/{$namaBaru2}";
          

            move_uploaded_file($lokasiTmp0, $lokasiBaru0);
            move_uploaded_file($lokasiTmp1, $lokasiBaru1);
            move_uploaded_file($lokasiTmp2, $lokasiBaru2);
          

            $ajb = $namaBaru0;
            $sertifikat = $namaBaru1;
            $pph = $namaBaru2;
            $no_reg = filter_input(INPUT_POST, "no_reg_mutasi");
            $no_surat_perjanjian = filter_input(INPUT_POST, "no_surat_perjanjian");
            $penjual_nama = filter_input(INPUT_POST, "penjual_nama");
            $penjual_tanggal_lahir = filter_input(INPUT_POST, "penjual_tanggal_lahir");
            $penjual_alamat = filter_input(INPUT_POST, "penjual_alamat");
            $pembeli_nama = filter_input(INPUT_POST, "pembeli_nama");
            $pembeli_tanggal_lahir = filter_input(INPUT_POST, "pembeli_tanggal_lahir");
            $pembeli_alamat = filter_input(INPUT_POST, "pembeli_alamat");
            $no_kikitir = filter_input(INPUT_POST, "no_kikitir");
            $no_persil = filter_input(INPUT_POST, "no_persil");
            $ds = filter_input(INPUT_POST, "ds");
            $batas_tanah = filter_input(INPUT_POST, "batas_tanah");
            $luas_tanah = filter_input(INPUT_POST, "luas_tanah");
            $harga = filter_input(INPUT_POST, "harga");
            $mutlak_akad = filter_input(INPUT_POST, "mutlak_akad");
            $status = filter_input(INPUT_POST, "status");
            
        
            
    
            
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            
            $sql= "UPDATE tbmutasi SET no_reg='$no_reg',no_surat_perjanjian='$no_surat_perjanjian', penjual_nama='$penjual_nama', penjual_tanggal_lahir='$penjual_tanggal_lahir',penjual_alamat='$penjual_alamat', pembeli_nama='$pembeli_nama', pembeli_tanggal_lahir='$pembeli_tanggal_lahir',
pembeli_alamat='$pembeli_alamat', no_kikitir='$no_kikitir', no_persil='$no_persil', ds='$ds',batas_tanah='$batas_tanah', luas_tanah='$luas_tanah', harga='$harga',mutlak_akad='$mutlak_akad',ajb_filename='$ajb',sertifikat_tanah_filename='$sertifikat', pph_filename='$pph', status_pengajuan = '$status' WHERE id= '$id'";

            
        
            
            
            if ($conn->query($sql) === true) {
                // echo "New record created successfully";
                echo '<script language="javascript">';
                echo 'alert("Data sukses terdaftar"); location.href="http://localhost/Admin_desa"';
                echo '</script>';
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
            
            }


        }else{
            echo '<script language="javascript">';
            echo 'alert("Tidak support jenis file"); location.href="http://localhost/Admin_desa"';
            echo '</script>';
        }


    }


}
uploadBerkas();

?>
