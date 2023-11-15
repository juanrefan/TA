<?php  include_once "controller/registrasiMutasi.php"; ?>
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
    <h2>Admin Table</h2>
    <!-- Modal -->
<div class="w3-container">
  <button onclick="document.getElementById('id01').style.display='block'" class="w3-button w3-black">Tambah</button>
  <div id="id01" class="w3-modal">
  <div class="w3-modal-content" style="width: 75%">
      <div class="w3-container">
        <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-display-topright">&times;</span>
        <form action="controller/insertMutasi.php" method="POST" enctype="multipart/form-data">
            <div class="form-columns">
              <div class="form-style-1">
              <label for="tanggal">No Registrasi<span class="required">*</span></label>
              <input type="text" id="no_reg_sertifikat" readonly="true" name="no_reg_mutasi" class="field-divided" value="<?php echo $kodeMutasi ?>">
              <label for="no_surat_perjanjian">No.Surat Perjanjian<span class="required">*</span></label>
                <input type="text" id="no_surat_perjanjian" name="no_surat_perjanjian" class="field-divided" placeholder="No.Surat Perjanjian">

                <label for="penjual_nama">Penjual : Nama<span class="required">*</span></label>
                <input type="text" id="penjual_nama" name="penjual_nama" class="field-divided" placeholder="Nama Penjual" pattern="[A-Za-z]+" title="Please enter only alphabet characters." required>
                

                <label for="penjual_tanggal_lahir">Penjual : Tanggal Lahir<span class="required">*</span></label>
                <input type="date" id="penjual_tanggal_lahir" name="penjual_tanggal_lahir" class="field-divided">

                <label for="penjual_alamat">Penjual : Alamat<span class="required">*</span></label>
                <input type="text" id="penjual_alamat" name="penjual_alamat" class="field-divided" placeholder="Alamat Penjual">

                <label for="pembeli_nama">Pembeli : Nama<span class="required">*</span></label>
                <input type="text" id="pembeli_nama" name="pembeli_nama" class="field-divided" placeholder="Nama Pembeli" pattern="[A-Za-z]+" title="Please enter only alphabet characters." required>

                <label for="pembeli_tanggal_lahir">Pembeli : Tanggal Lahir<span class="required">*</span></label>
                <input type="date" id="pembeli_tanggal_lahir" name="pembeli_tanggal_lahir" class="field-divided">

                <label for="pembeli_alamat">Pembeli : Alamat<span class="required">*</span></label>
                <input type="text" id="pembeli_alamat" name="pembeli_alamat" class="field-divided" placeholder="Alamat Pembeli">
             
              </div>
              <div class="form-style-2">
              <label for="no_kikitir">No.KIKITIR<span class="required">*</span></label>
              <input type="text" id="no_kikitir" name="no_kikitir" class="field-divided" placeholder="No.KIKITIR" pattern="[0-9]+" title="Please enter only numeric characters." required>

              <label for="no_persil">No.Persil<span class="required">*</span></label>
              <input type="text" id="no_persil" name="no_persil" class="field-divided" placeholder="No.Persil" pattern="[0-9]+" title="Please enter only numeric characters." required>

              <label for="ds">D/S<span class="required">*</span></label>
              <input type="text" id="ds" name="ds" class="field-divided" placeholder="D/S" pattern="[0-9]+" title="Please enter only numeric characters." required>

              <label for="batas_tanah">Batas Tanah<span class="required">*</span></label>
              <input type="text" id="batas_tanah" name="batas_tanah" class="field-divided" placeholder="Batas Tanah">

              <label for="luas_tanah">Luas Tanah<span class="required">*</span></label>
              <input type="text" id="luas_tanah" name="luas_tanah" class="field-divided" placeholder="Luas Tanah" pattern="[0-9]+" title="Please enter only numeric characters." required>

              <label for="harga">Harga<span class="required">*</span></label>
              <input type="text" id="harga" name="harga" class="field-divided" placeholder="Harga" pattern="[0-9]+" title="Please enter only numeric characters." required>

              <label for="akad">Mutlak Akad<span class="required">*</span></label>
              <input type="text" id="mutlak_akad" name="mutlak_akad" class="field-divided" placeholder="Akad" pattern="[A-Za-z]+" title="Please enter only alphabet characters." required>
              <label for="ktp">AJB`:</label>
                        <input type="file" id="ajb" name="file=[]" class="field-divided" accept=".jpg, .jpeg, .png, .pdf" required>
                        <label for="kk">Sertifikat Tanah:</label>
                        <input type="file" id="sertifikattanah" name="file[]" class="field-divided" accept=".jpg, .jpeg, .png, .pdf" required>
                        <label for="pbb">PPH:</label>
                        <input type="file" id="pph" name="file=[]" class="field-divided" accept=".jpg, .jpeg, .png, .pdf" required>
                       
                        <label for="status">Status dokumen:</label>
                        <select id="status" name="status" class="form-control">
                          <option value="Diterima">Diterima</option>
                          <option value="Ditolak">Ditolak</option>
                          <option value="Perbaiki">Perbaiki</option>
                        </select>
                <!-- form fields -->
              </div>
            </div>
            <div style="clear:both">
            <input id="btnAction" type="submit" value="Submit" name="btnAction"  style="float:right; margin-right:10px;">
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

        

 