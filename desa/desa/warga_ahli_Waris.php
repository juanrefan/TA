<?php  include_once "controller/registrasiahliWaris.php"; ?>
<!DOCTYPE html>
<html>
<head>
  <title>W3.CSS</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" type="text/css" href="styles/design.css">      
  <link rel="stylesheet" type="text/css" media="screen" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
  <link rel="stylesheet" type="text/css" media="screen" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" media="screen" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap4.min.css">
  
  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</head>
<body>
<div class="container">
    <h2 class="ahliwarisadmin">Admin Table</h2>


 

    <!-- Modal -->
<div class="w3-container">
  <button onclick="document.getElementById('id01').style.display='block'" class="w3-button w3-black">Tambah</button>
  <div id="id01" class="w3-modal">
  <div class="w3-modal-content" style="width: 75%">
      <div class="w3-container">
        <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-display-topright">&times;</span>
        <form action="controller/insertahliWaris.php" method="POST" enctype="multipart/form-data">
            <div class="form-columns">
              <div class="form-style-1">

              <label for="tanggal">No Registrasi<span class="required">*</span></label>
              <input type="text" id="no_reg_sertifikat" readonly="true" name="no_reg_ahli_waris" class="field-divided" value="<?php echo $kodeahliWaris ?>">

              <label for="tgl">Tanggal<span class="required">*</span></label>
                        <input type="date" id="tgl" name="tanggal" class="field-divided" placeholder="Tanggal Peraturan Desa">

                        <label for="firstName">Nama Pemohon<span class="required">*</span></label>
                        <input type="text" id="firstName" name="namaPemohon" class="field-divided" placeholder="First" pattern="[A-Za-z]+" title="“Input tidak valid. Harap masukan karakter huruf (A-Z) tanpa angka atau simbol" required>
                      

                        <label for="firstnameSuami">Waris Dari | Nama Suami <span class="required">*</span></label>
                        <input type="text" id="firstnameSuami" name="namaSuami" class="field-divided" placeholder="First" pattern="[A-Za-z]+" title="“Input tidak valid. Harap masukan karakter huruf (A-Z) tanpa angka atau simbol" required>

                        <label for="firstnameIstri">Waris Dari | Nama Istri <span class="required">*</span></label>
                        <input type="text" id="firstnameIstri" name="namaIstri" class="field-divided" placeholder="First" pattern="[A-Za-z]+" title="“Input tidak valid. Harap masukan karakter huruf (A-Z) tanpa angka atau simbol" required>

                        <label for="tanggalSuami">Tanggal Meninggal Suami<span class="required">*</span></label>
                        <input type="date" id="tanggalSuami" name="tanggalSuami" class="field-divided" placeholder="Tanggal Peraturan Desa">

                        <label for="tanggalIstri">Tanggal Meninggal Istri<span class="required">*</span></label>
                        <input type="date" id="tanggalIstri" name="tanggalIstri" class="field-divided" placeholder="Tanggal Peraturan Desa">

                        <label for="alamatm meninggal">Alamat Meninggal<span class="required">*</span></label>
                        <input type="text" id="alamatmeninggal" name="alamatmeninggal" class="field-divided">

                        <label for="ahli waris">Ahli Waris<span class="required" id="keterangan">*</span></label>
                        <textarea name="ahliwaris" id="ahliwaris" class="field-long field-textarea" pattern="[A-Za-z]+" title="Please enter only alphabet characters." required></textarea>
                <!-- form fields -->
              </div>
              <div class="form-style-2">
                
              <label for="ahli waris">Hubungan Keluarga<span class="required" id="keterangan">*</span></label>
                        <textarea name="hubungankeluarga" id="hubungankeluarga" class="field-long field-textarea" pattern="[A-Za-z]+" title="Please enter only alphabet characters." required></textarea>

                        <label for="ahli waris">Umur<span>*</span></label>
                        <textarea name="umur" id="umur" class="field-long field-textarea"  pattern="[0-9]+" title="Please enter only numeric characters." required></textarea>

                        <label for="ahli waris">Alamat<span class="required" id="keterangan">*</span></label>
                        <textarea name="alamat" id="alamat" class="field-long field-textarea" ></textarea>

                        
                <!-- form fields -->
                        <label for="ktp">Surat Keterangan Ahli Waris:</label>
                        <input type="file" id="keteranganahliWaris" name="file[]" class="field-divided" accept=".jpg, .jpeg, .png, .pdf" required>
                        <label for="kk">Akta Keterangan hak mewaris:</label>
                        <input type="file" id="aktahakMewaris" name="file[]" class="field-divided" accept=".jpg, .jpeg, .png, .pdf" required>
                        <label for="pbb">Surat Pernyataan Ahli Waris:</label>
                        <input type="file" id="pernyataanahliWaris" name="file[]" class="field-divided" accept=".jpg, .jpeg, .png, .pdf" required>

                <!-- form fields -->
              </div>
            </div>
            <div style="clear:both">
            <input id="btnAction" type="submit" value="Submit" name="btnAction" button="btnAction" style="float:right; margin-right:10px;">

              
            </div>
          </form>
      
      </div>
    </div>
  </div>
</div>
<div class="container">
  <div class="row">
    <form action="" method="POST">
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Cari No Registrasi</label>
        <input type="text" name="no_reg" class="form-control" >
      </div>
      <button type="submit" class="btn btn-primary">Cari</button>
    </form>
  </div>
</div>
<!--  -->

<!--  -->


<?php 

if (isset($_POST['no_reg'])) {
$no_reg=$_POST['no_reg'];
  $query= mysqli_query($conn,"SELECT * FROM tbmutasi WHERE no_reg=$no_reg");
  while ($data=mysqli_fetch_array($query)) {
    if ($no_reg==$data['no_reg']) {
      echo "Data Sama";
    }else{
      echo "Data Tidak Ada";
    }
  }

?>

<?php

}else{
  echo "Silahkan cari data registrasi anda disini !!";
}

?>


  
</body>
</html>

        

 