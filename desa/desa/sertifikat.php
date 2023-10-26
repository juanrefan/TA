<?php  include_once "controller/registrasiSertifikat.php";
        
?>
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
 <!-- CSS only -->
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</head>
<body>

</div>
  <div class="container">
    <h2>Admin Table</h2>
    <!-- Modal -->
    
<div class="w3-container">
  <br> <br> <br> <br>
  <button onclick="document.getElementById('id01').style.display='block'" class="w3-button w3-black">Tambah</button>

  <div id="id01" class="w3-modal">
  <div class="w3-modal-content" style="width: 100%">
      <div class="w3-container">
        <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-display-topright">&times;</span>
        <form action="controller/insertSertifikat.php" method="POST" enctype="multipart/form-data">
            <div class="form-columns">
              <div class="form-style-1">
                        <label for="tanggal">No Registrasi<span class="required">*</span></label>
                        <input type="text" id="no_reg_sertifikat" readonly="true" name="no_reg_sertifikat" class="field-divided" value="<?php echo $kodeSertifikat ?>">
                        <label for="tanggal">Tanggal<span class="required">*</span></label>
                        <input type="date" id="tgl" name="tanggal" class="field-divided" placeholder="Tanggal Peraturan Desa">
                        <label for="firstName">Nama Pemohon<span class="required">*</span></label>
                        <input type="text" id="firstName" name="firstname"  pattern="[A-Za-z\s]+" class="field-divided" placeholder="First"  pattern="[A-Za-z]+" title="“Input tidak valid. Harap masukan karakter huruf (A-Z) tanpa angka atau simbol" required>
                        <input type="text" name="lastname" class="field-divided" pattern="[A-Za-z\s]+" placeholder="Last" id="lastName">
                        <label for="alamatPemohon">Alamat Pemohon<span class="required">*</span></label>
                        <input type="text" id="alamatPemohon" name="alamatpemohon" class="field-divided" pattern="[A-Za-z0-9.]+" title="Only numbers, characters, and dots are allowed">
                        <label for="kikitirNo">AJB/Kikitir no. <span class="required">*</span></label>
                        <input type="date" id="kikitirNo" name="kikitir" class="field-divided" placeholder="First">
                        <label for="noDesa">No C Desa<span class="required">*</span></label>
                        <input type="text" name="nodesa" id="noDesa" class="field-divided" placeholder="First">
                        <label for="blok">Blok<span class="required">*</span></label>
                        <input type="text" name="blok" id="blok" class="field-divided" placeholder="First"  pattern="[A-Za-z]+" title="“Input tidak valid. Harap masukan karakter huruf (A-Z) tanpa angka atau simbol" required>
                <!-- form fields -->
              </div>
              <div class="form-style-2">
              <label for="persil">Persil<span class="required">*</span></label>
                        <input type="text" name="persil" id="persil" class="field-divided" placeholder="First">
                        <label for="luasTanah">Luas Tanah<span class="required">*</span></label>
                        <input type="text" name="luastanah" id="luasTanah" class="field-divided" placeholder="First">
                        <label for="batastanah">Batas-batas Tanah<span class="required">*</span></label>
                        <input type="text" name="batastanah" id="batasTanah" class="field-divided" placeholder="First">
                        <!-- <label for="noPbb">No PBB<span class="required">*</span></label>
                        <input type="text" name="nopbb" id="noPbb" class="field-divided" placeholder="First"> -->
                        <label for="keterangan">Keterangan<span class="required" id="keterangan">*</span></label>
                        <textarea name="keterangan" id="keterangan" class="field-long field-textarea" style="width:500
                        px"></textarea>
              
                        <label for="ktp">KTP:</label>
                        <div id="preview_ktp">
                        <input type="file" id="ktp" name="file[]" class="field-divided" onchange="getImagePreview(event)">
                        </div>
                        
                        <label for="kk">KK:</label>
                        <div id="preview_kk">
                        <input type="file" id="kk" name="file[]" class="field-divided" onchange="getImagePreview(event)">
                        </div>

                        <label for="pbb">PBB:</label>
                        <div id="preview_pbb">
                        <input type="file" id="pbb" name="file[]" class="field-divided" onchange="getImagePreview(event)">
                        </div>

                        <label for="buktiSurat">Bukti Surat:</label>
                        <div id="preview_buktiSurat">
                        <input type="file" id="buktiSurat" name="file[]" class="field-divided" onchange="getImagePreview(event)">
                        </div>

                        <label for="status">Status dokumen:</label>
                        <select id="status" name="status" class="form-control">
                          <option value="Diterima">Diterima</option>
                          <option value="Ditolak">Ditolak</option>
                          <option value="Perbaiki">Perbaiki</option>
                        </select>
                      <br>
                <!-- form fields -->
              </div>
            </div>
            <div style="clear:both">
            <input id="btnAction" type="submit" value="Submit" name="btnAction" button="btnAction" style="float:right; margin-right:10px;">

            </div>
    
            <input id="btnActionPerbaiki" type="submit" value="Perbaiki" name="btnAction" button="btnAction" style="float:right; margin-right:10px;">

            
          </form>
      
      </div>
    </div>
    <script>
      function getImagePreview(event){
    var image = URL.createObjectURL(event.target.files[0]);
    var imagediv = document.getElementById('preview_' + event.target.id);
    var newimg = document.createElement('img');
    newimg.src = image;
    imagediv.appendChild(newimg);
}

     
    
     
     
    </script>
  </div>
</div>
            

    <thead>
    <!-- Button trigger modal -->




    
    <table id="example" class="table table-striped table-bordered" style="width:50%">
    
      <thead>
        <tr>
          <th>no_reg</th>
          <th>Tanggal</th>
          <th>Nama Pemohon</th>
          <th>Alamat Pemohon</th>
          <th>KIKITIR NO</th>
          <th>No C Desa</th>
          <th>Blok</th>
          <th>Persil</th>
          <th>Luas Tanah</th>
          <th>Batas-batas Tanah</th>
          <th>NO.PBB</th>
          <th>keterangan</th>
          <!-- <th>ktp</th>
          <th>kk</th>
          <th>sppt_pbb</th>
          <th>bukti_Surat_Lainnya</th> -->
          <th>Status</th>
          <th colspan="3">Tindakan</th>
        </tr>
      </thead>
      <tbody>
      
      <?php
    
    include_once "controller/process.php";
    
    $queryselectTable = "SELECT * FROM tbSertifikat";
    $sql = mysqli_query($conn, $queryselectTable);
    //output data of each row
    while($result = mysqli_fetch_assoc($sql)){
        echo "<tr>";
        echo '<td style="display:none;">' . $result["id"] . '</td>';
        echo '<td>' . $result["no_reg"] . '</td>';
        echo '<td>' . $result["tanggal"] . '</td>';
        echo '<td>' . $result["first_name"] . $result["last_name"] . '</td>';
        echo '<td>' . $result["alamat_pemohon"] . '</td>';
        echo '<td>' . $result["kikitir_no"] . '</td>';
        echo '<td>' . $result["no_c_desa"] . '</td>';
        echo '<td>' . $result["blok"] . '</td>';
        echo '<td>' . $result["persil"] . '</td>';
        echo '<td>' . $result["luas_tanah"] . '</td>';
        echo '<td>' . $result["batas_tanah"] . '</td>';
        echo '<td>' . $result["no_pbb"] . '</td>';
        echo '<td>' . $result["keterangan"] . '</td>';
        echo '<td>' . $result["status_pengajuan"] . '</td>';
        // echo '<td>' . $result["kk"] . '</td>';
        // echo '<td>' . $result["sppt_pbb"] . '</td>';
        // echo '<td>' . $result["buktisuratLain"] . '</td>';
        // echo '<td>' .if( $result["status_pengajuan"]==1 ){"Diterima";}else{"Di Tolak";}. '</td>';
       ?>
       
<td>
  <?php
    if ($result['status_pengajuan']=="Diterima") {
      ?>
          <button type="button" disabled="true" name="delete" class="btn btn-primary">Delete</button>
     <?php
    }else{
      ?>
         <a href="controller/deleteSertifikat.php?id=<?php echo $result["id"]  ?>"> <button type="button" name="delete" class="btn btn-primary">Delete</button></a>
      <?php
    }
  ?>
 


</td>
  <!-- Start Modal Edit -->
  <div class="w3-container">



<div id="<?php echo $result['id'] ?>" class="w3-modal">
<div class="w3-modal-content" style="width: 75%">
    <div class="w3-container">
      <span onclick="document.getElementById('<?php echo $result['id'] ?>').style.display='none'" class="w3-button w3-display-topright">&times;</span>
      <form action="controller/updateSertifikat.php" method="POST" enctype="multipart/form-data">
          <div class="form-columns">
            <div class="form-style-1">
       
                      <input type="hidden" name="id" value="<?php echo $result["id"] ?>">
                      <input type="hidden" name="no_reg" value="<?php echo $result["no_reg"] ?>">
                      <label for="tanggal">Tanggal<span class="required">*</span></label>
                      <input type="date" id="tgl" name="tanggal" value="<?php echo $result["tanggal"] ?>" class="field-divided" placeholder="Tanggal Peraturan Desa">
                      
                      <label for="firstName">Nama Pemohon<span class="required">*</span></label>
                      <input type="text" id="firstName" name="firstname" value="<?php echo $result["first_name"] ?>" class="field-divided" placeholder="First">
                      
                      <input type="text" name="lastname" value="<?php echo $result["last_name"] ?>" class="field-divided" placeholder="Last" id="lastName">
                      <label for="alamatPemohon">Alamat Pemohon<span class="required">*</span></label>
                      <input type="text" id="alamatPemohon" name="alamatpemohon" value="<?php echo $result["alamat_pemohon"] ?>" class="field-divided">
                      
                        
                      <label for="kikitirNo">Kikitir no. <span class="required">*</span></label>
                      <input type="date" id="kikitirNo" name="kikitir" value="<?php echo $result["kikitir_no"] ?>" class="field-divided" placeholder="First">

                      <!-- <label for="dasarpengajuanAjb">Dasar Pengajuan AJB<span class="required">*</span></label>
                      <input type="text" id="dasarpengajuanAjb" name="pengajuanajb" value="<?php echo $result["dasar_pengajuanajb"] ?>" class="field-divided" placeholder="First"> -->
                      
                      
                      <label for="noDesa">No C Desa<span class="required">*</span></label>
                      <input type="text" name="nodesa" id="noDesa" value="<?php echo $result["no_c_desa"] ?>" class="field-divided" placeholder="First">
                      
                      <label for="blok">Blok<span class="required">*</span></label>
                      <input type="text" name="blok" id="blok"  value="<?php echo $result["blok"] ?>" class="field-divided" placeholder="First">
              <!-- form fields -->
            </div>
            <div class="form-style-2">
            <label for="persil">Persil<span class="required">*</span></label>
                      <input type="text" name="persil" id="persil" value="<?php echo $result["persil"] ?>" class="field-divided" placeholder="First">
                     
                      <label for="luasTanah">Luas Tanah<span class="required">*</span></label>
                      <input type="text" name="luastanah" id="luasTanah" value="<?php echo $result["luas_tanah"] ?>" class="field-divided" placeholder="First">
                    
                      <label for="batastanah">Batas-batas Tanah<span class="required">*</span></label>
                      <input type="text" name="batastanah" id="batasTanah" value="<?php echo $result["batas_tanah"] ?>" class="field-divided" placeholder="First">
                    
                      <label for="noPbb">No PBB<span class="required">*</span></label>
                      <input type="text" name="nopbb" id="noPbb" value="<?php echo $result["no_pbb"] ?>" class="field-divided" placeholder="First">
                      
                      <label for="keterangan">Keterangan<span class="required" id="keterangan">*</span></label>
                      <textarea name="keterangan" id="keterangan" class="field-long field-textarea" style="width:500
                      px"></textarea>

                      <label for="ktp">KTP:</label>
                      <input type="file" id="ktp" name="file[]" class="field-divided">
                      <img src="../Sertifikat/registrasiSertifikat/<?php echo $result["ktp"] ?>" width="500" height="600"> <br>
                      <label for="kk">KK:</label>
                      <input type="file" id="kk" name="file[]" class="field-divided">
                      <img src="../Sertifikat/registrasiSertifikat/<?php echo $result["kk"] ?>" width="500" height="600"><br>

                      <label for="pbb">PBB:</label>
                      <input type="file" id="pbb" name="file[]" class="field-divided">
                      <img src="../Sertifikat/registrasiSertifikat/<?php echo $result["sppt_pbb"] ?>" width="500" height="600"><br>

                      <label for="buktiSurat">Bukti Surat:</label>
                      <input type="file" id="buktiSurat" name="file[]" class="field-divided">
                      <img src="../Sertifikat/registrasiSertifikat/<?php echo $result["buktisuratLain"] ?>" width="500" height="600"><br>

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
          <input name="btnAction" type="submit" value="Submit" button="btnAction" style="float:right; margin-right:10px;">
          </div>
        </form>
    
    </div>
  </div>
</div>
</div>
     
 <!-- End Modal Edit -->
 <!-- Warga proses -->




 <td>
  <button onclick="document.getElementById('<?php echo $result['id']?>').style.display='block'" class="btn btn-primary">View</button>
</td>
      <td>
      <?php
        if ($result['status_pengajuan']=="Diterima") {
      ?>
         <button disabled="true"  class="btn btn-primary">Update</button>
     <?php
    }else{
      ?>
        <button name="btnAction" onclick="document.getElementById(`<?php echo $result['id'] ?>`).style.display='block'" class="btn btn-primary">Update</button>
      <?php
    }
    ?>

        
      
      </td>
<?php
}   
?> 

 
  <!-- JavaScript Bundle with Popper -->
  <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script> -->
  
</body>
</html>
