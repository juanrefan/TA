
<?php


function uploadBerkas(){
    include_once "registrasiahliWaris.php";
    $files = $_FILES;

    if($_POST['btnAction']){
        $allowEkstensi = array('png','jpeg','jpg','pdf');
        $files = $_FILES;
        $jumlahfile = count($files['file']['name']);

        for($i=0; $i<$jumlahfile; $i++){
            $namaFile = $files['file']['name'][$i];

        }
        $x_file = explode('.',$namaFile);
        $ekstension_file = strtolower(end($x_file));
        if(in_array($ekstension_file,$allowEkstensi) == TRUE){

            if ($files['file']['size'][0]>200000 AND $files['file']['size'][1]>200000 AND $files['file']['size'][2]>200000) {
                echo '<script language="javascript">';
                echo 'alert("Ukuran file melebihi kapasitas 200kb"); location.href="http://localhost/Admin_perkades"';
                echo '</script>';
            }elseif($files['file']['size'][0]>200000 OR $files['file']['size'][1]>200000 OR $files['file']['size'][2]>200000){
                echo '<script language="javascript">';
                echo 'alert("Ukuran file melebihi kapasitas 200kb"); location.href="http://localhost/Admin_perkades"';
                echo '</script>';
            }else{
                //echo "Test";
                // Jika extension allow dan ukuran File Benar
            $folderUpload = "../Ahliwaris/registrasiahliWaris";
            $namaBaru0 = $kodeahliWaris. '-' . $files['file']['name'][0];
            $namaBaru1 = $kodeahliWaris. '-' . $files['file']['name'][1];
            $namaBaru2 = $kodeahliWaris. '-' . $files['file']['name'][2];
          
            $lokasiTmp0=$files['file']['tmp_name'][0];
            $lokasiTmp1=$files['file']['tmp_name'][1];
            $lokasiTmp2=$files['file']['tmp_name'][2];
            

            $lokasiBaru0 = "{$folderUpload}/{$namaBaru0}";
            $lokasiBaru1 = "{$folderUpload}/{$namaBaru1}";
            $lokasiBaru2 = "{$folderUpload}/{$namaBaru2}";
          

            move_uploaded_file($lokasiTmp0, $lokasiBaru0);
            move_uploaded_file($lokasiTmp1, $lokasiBaru1);
            move_uploaded_file($lokasiTmp2, $lokasiBaru2);

            
            $suratketeranganahliWarisFile = $namaBaru0;
            $aktaketeranganhakMewarisFile = $namaBaru1;
            $suratpernyataanahliWarisFile = $namaBaru2;


            $no_reg = filter_input(INPUT_POST, "no_reg_ahli_waris");
            $tanggal = filter_input(INPUT_POST, "tanggal");
            $namaPemohon = filter_input(INPUT_POST, "namaPemohon" );
            $warisIstri = filter_input(INPUT_POST, "namaIstri" );
            $warisSuami = filter_input(INPUT_POST, "namaSuami" );
            $tanggalmeninggalSuami = filter_input(INPUT_POST, "tanggalSuami" );
            $tanggalmeninggalIstri = filter_input(INPUT_POST, "tanggalIstri" );
            $alamatMeninggal = filter_input(INPUT_POST, "alamatmeninggal" );
            $namaahliWaris = filter_input(INPUT_POST, "ahliwaris" );
            $umur = filter_input(INPUT_POST, "umur");
            $hubunganKeluarga = filter_input(INPUT_POST, "hubungankeluarga" );
            $alamat = filter_input(INPUT_POST, "alamat" );
            $status = filter_input(INPUT_POST, "status");
            



            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "UPDATE tbahliwaris SET no_reg='$no_reg',tanggal='$tanggal',nama_pemohon='$namaPemohon',waris_istri='$warisIstri',waris_suami='$warisSuami',tanggal_meninggal_suami='$tanggalmeninggalSuami',tanggal_meninggal_istri='$tanggalmeninggalIstri',alamat_meninggal='$alamatMeninggal',nama_ahli_waris='$namaahliWaris',
umur='$umur',hubungan_keluarga='$hubunganKeluarga',alamat='$alamat',no_reg='$noReg',surat_keterangan_ahli_waris='$suratketeranganahliWarisFile',
akta_keterangan_hak_mewaris='$aktaketeranganhakMewarisFile',surat_pernyataan_ahli_waris='$suratpernyataanahliWarisFile',status_pengajuan='$status' WHERE id='$id'";


            if ($conn->query($sql) === true) {
                // echo "New record created successfully";
                echo '<script language="javascript">';
                echo 'alert("Data sukses terdaftar"); location.href="http://localhost/Admin_perkades"';
                echo '</script>';

            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
          

        }



    }

}else{
    echo '<script language="javascript">';
    echo 'alert("Tidak support jenis file"); location.href="http://localhost/Admin_perkades"';
    echo '</script>';
}

}
UploadBerkas();

?>
