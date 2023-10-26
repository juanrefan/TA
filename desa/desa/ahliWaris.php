<?php  include_once "controller/registrasiahliWaris.php"; ?>
<!DOCTYPE html>
<html>
<head>
  <title>W3.CSS</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" type="text/css" href="styles/design.css">      
  <link rel="stylesheet" type="text/css" href="styles/coba.css">      
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
            <input id="btnAction" type="submit" value="Submit" name="btnAction" button="btnAction" style="float:right; margin-right:10px;">

              
            </div>
          </form>
      
      </div>
    </div>
  </div>
</div>
    <thead>
    <!-- Button trigger modal -->
    <table id="example" class="table table-striped table-bordered" style="width:50%">
      <thead>
        <tr>
              <th>No.Reg:</th>
              <th>Tanggal</th>
              <th>Nama Pemohon</th>
              <th>Waris Istri</th>
              <th>Waris: Suami</th>
              <th>Tanggal Meninggal Istri</th>
              <th>Tanggal Meninggal: Suami</th>
              <th>Alamat Meninggal</th>
              <th>Nama Ahli waris</th>
              <th>Umur</th>
              <th>Hubungan Keluarga</th>
              <th>Alamat</th>
             
              <th>Surat Keterangan Ahli Waris</th>
              <th>Surat Pernyataan Ahli waris</th>
              <th>Akta keterangan Ahli Waris</th>
              <th>Status pengajuan</th>
              <th colspan="2" style="text-align : center">Tindakan</th>
      
        </tr>
      </thead>
      <tbody>
      <?php
    include_once "controller/process.php";
    $queryselectTable = "SELECT * FROM tbahliwaris";
    $sql = mysqli_query($conn, $queryselectTable);
    //output data of each row 
    // while($result = mysqli_fetch_assoc($sql)){
      foreach($sql as $result){
        echo "<tr>";
        echo '<td style="display:none;">' . $result["id"] . '</td>';
        echo '<td>' . $result["no_reg"] . '</td>';
        echo '<td>' . $result["tanggal"] . '</td>';
        echo '<td>' . $result["nama_pemohon"];
        echo '<td>' . $result["waris_istri"] . '</td>';
        echo '<td>' . $result["waris_suami"] . '</td>';
        echo '<td>' . $result["tanggal_meninggal_istri"] . '</td>';
        echo '<td>' . $result["tanggal_meninggal_suami"] . '</td>';
        echo '<td>' . $result["alamat_meninggal"] . '</td>';
        echo '<td>' . $result["nama_ahli_waris"] . '</td>';
        echo '<td>' . $result["umur"] . '</td>';
        echo '<td>' . $result["hubungan_keluarga"] . '</td>';
        echo '<td>' . $result["alamat"] . '</td>';
        echo '<td>' . $result["surat_keterangan_ahli_waris"] . '</td>';
        echo '<td>' . $result["akta_keterangan_hak_mewaris"] . '</td>';
        echo '<td>' . $result["surat_pernyataan_ahli_waris"] . '</td>';
        echo '<td>' . $result["status_pengajuan"] . '</td>';
        //echo '<td><button onclick="deleteModal('.json_encode($result["id"]).')" type="button" name="delete" class="btn btn-primary">Delete</button></td>';

      
       

      ?>
      <td><a href="controller/deleteahliWaris.php?id=<?php echo $result["id"]  ?>"> <button type="button" name="delete" class="btn btn-primary">Delete</button></a></td>
      
       <!-- Start Modal Edit -->
  <div class="w3-container">
  <div id="<?php echo $result['id'] ?>" class="w3-modal">
  <div class="w3-modal-content" style="width: 75%">
      <div class="w3-container">
        <span onclick="document.getElementById(`<?php echo $result['id'] ?>`).style.display='none'" class="w3-button w3-display-topright">&times;</span>
        <form action="controller/updateahliWaris.php" method="POST" enctype="multipart/form-data">
            <div class="form-columns">
              <div class="form-style-1">
              
              <input type="hidden" id="id" name="id" value="<?php echo $result["id"] ?>" class="field-divided" placeholder="Tanggal Peraturan Desa">
              <input type="hidden" name="no_reg" value="<?php echo $result["no_reg"] ?>">


              <label for="tgl">Tanggal<span class="required">*</span></label>
                        <input type="date" id="tgl" name="tanggal" value="<?php echo $result["tanggal"] ?>" class="field-divided" placeholder="Tanggal Peraturan Desa">

                        <label for="firstName">Nama Pemohon<span class="required">*</span></label>
                        <input type="text" id="firstName" name="namaPemohon" value="<?php echo $result["nama_pemohon"] ?>" class="field-divided" placeholder="First">
                        <label for="firstnameSuami">Waris Dari | Nama Suami <span class="required">*</span></label>
                        <input type="text" id="firstnameSuami" name="namaSuami" value="<?php echo $result["waris_suami"] ?>" class="field-divided" placeholder="First">

                        <label for="firstnameIstri">Waris Dari | Nama Istri <span class="required">*</span></label>
                        <input type="text" id="firstnameIstri" name="namaIstri" value="<?php echo $result["waris_istri"] ?>" class="field-divided" placeholder="First">

                        <label for="tanggalSuami">Tanggal Meninggal Suami<span class="required">*</span></label>
                        <input type="date" id="tanggalSuami" name="tanggalSuami" value="<?php echo $result["tanggal_meninggal_suami"] ?>" class="field-divided" placeholder="Tanggal Peraturan Desa">

                        <label for="tanggalIstri">Tanggal Meninggal Istri<span class="required">*</span></label>
                        <input type="date" id="tanggalIstri" name="tanggalIstri" value="<?php echo $result["tanggal_meninggal_istri"] ?>"class="field-divided" placeholder="Tanggal Peraturan Desa">

                        <label for="alamatm meninggal">Alamat Meninggal<span class="required">*</span></label>
                        <input type="text" id="alamatmeninggal" name="alamatmeninggal" value="<?php echo $result["alamat_meninggal"] ?>" class="field-divided">

                        <label for="ahli waris">Ahli Waris<span class="required" id="keterangan">*</span></label>
                        <textarea name="ahliwaris" id="ahliwaris" class="field-long field-textarea"><?php echo $result["nama_ahli_waris"] ?> </textarea>
                <!-- form fields -->
              </div>
              <div class="form-style-2">
              <label for="ahli waris">Hubungan Keluarga<span class="required" id="keterangan">*</span></label>
                        <textarea name="hubungankeluarga" id="hubungankeluarga"   class="field-long field-textarea"><?php echo $result["hubungan_keluarga"] ?></textarea>
              <label for="ahli waris">Umur<span class="required" id="keterangan">*</span></label>
                        <textarea name="umur" id="umur" class="field-long field-textarea"><?php echo $result["umur"] ?></textarea>

                        
                        <label for="ahli waris">Alamat<span class="required" id="keterangan">*</span></label>
                        <textarea name="alamat" id="alamat" class="field-long field-textarea"><?php echo $result["alamat"] ?></textarea>

                <!-- form fields -->
                        <label for="ktp">Surat Keterangan Ahli Waris:</label>
                        <input type="file" id="keteranganahliWaris" name="keteranganahliWaris" class="field-divided" accept=".jpg, .jpeg, .png, .pdf" required>
                        <label for="kk">Akta Keterangan hak mewaris:</label>
                        <input type="file" id="aktahakMewaris" name="aktahakMewaris" class="field-divided" accept=".jpg, .jpeg, .png, .pdf" required>
                        <label for="pbb">Surat Pernyataan Ahli Waris:</label>
                        <input type="file" id="pernyataanahliWaris" name="pernyataanahliWaris" class="field-divided" accept=".jpg, .jpeg, .png, .pdf" required>
                <!-- form fields -->
              </div>
            </div>
            <div style="clear:both">
              <input id="btnAction" type="submit" value="Update" button="btnAction">
            </div>
          </form>
      
      </div>
    </div>
  </div>
 </div>
 <!-- End Modal Edit -->
      
      <td><button onclick="document.getElementById(`<?php echo $result['id'] ?>`).style.display='block'" class="btn btn-primary">Update</button></td>
      <?php

        // echo var_dump($result);
      }
        
  
?> 
  
      
      </tbody>
    </table>
</div>
  <script>



    
  
    </script>
</body>
</html>




















