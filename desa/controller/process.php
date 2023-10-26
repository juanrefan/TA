<?php
include_once 'util.php';
function upload($file) {
    $namaFile = $file['name'];
    $ukuranFile = $file['size'];
    $error = $file['error'];
    $tmpName = $file['tmp_name'];

    if ($error === 4) {
        echo "<script> alert ('Masukkan gambar terlebih dahulu')</script>";
        return false;
    }

  // Get the file name with extension using pathinfo()
    $filenameWithExtension = pathinfo($tmpName, PATHINFO_FILENAME) . '.' . pathinfo($namaFile, PATHINFO_EXTENSION);

    $ekstensiGambarValid = ['jpg', 'jpeg', 'png', 'pdf'];
    $ekstensiGambar = strtolower(pathinfo($filenameWithExtension, PATHINFO_EXTENSION));

    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "<script>alert('Tolong upload gambar dengan format berikut: jpeg, jpg, dan pdf');</script>";
        return false;
    }
    $Filesize = 200 * 1024;

    if($ukuranFile >= $Filesize){
        echo "<script>alert('Ukuran file melebihi 200Kb');</script>";
        return false;
    }
    return $namaFile;
}

$action = filter_input(INPUT_POST, "btnAction");
if (isset($action)) {
    $ktp = upload($_FILES['ktp']);
    $kk = upload($_FILES['kk']);
    $pbb = upload($_FILES['pbb']);
    $buktiSurat = upload($_FILES['buktiSurat']);

    if (!$ktp || !$kk || !$pbb || !$buktiSurat) {
        return false;
    }
    


    $tanggal = filter_input(INPUT_POST, "tanggal");
    $firstName = filter_input(INPUT_POST, "firstname");
    $lastName = filter_input(INPUT_POST, "lastname");
    $alamatPemohon = filter_input(INPUT_POST, "alamatpemohon");
    $pengajuanAJB = filter_input(INPUT_POST, "pengajuanajb");
    $kikitir = filter_input(INPUT_POST, "kikitir");
    $no_desa = filter_input(INPUT_POST, "nodesa");
    $blok = filter_input(INPUT_POST, "blok");
    $persil = filter_input(INPUT_POST, "persil");
    $luasTanah = filter_input(INPUT_POST, "luastanah");
    $batasTanah = filter_input(INPUT_POST, "batastanah");
    $noPBB = filter_input(INPUT_POST, "nopbb");
    $keterangan = filter_input(INPUT_POST, "keterangan");
        
    


    // Create connec
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "Call insertdataSertifikat(-1,'".$tanggal."','" . $firstName . "','" . $lastName . "','" . $alamatPemohon . "','".$pengajuanAJB."','".$kikitir."',".$no_desa.",".$blok.",".$persil.",".$luasTanah.",".$batasTanah.",'" .$noPBB. "','". $keterangan ."'
    ,'". $ktp ."','". $kk ."','". $pbb ."','". $buktiSurat ."')";
    echo $sql;
    if ($conn->query($sql) === true) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
// ?>








