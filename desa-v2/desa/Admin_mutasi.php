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
<h2 align="center">Admin Table Mutasi</h2>

<div class="container">
            <div class="dropdown">
                <button type="button" class="btn btn-primary" data-toggle="dropdown">
                    Notifications <span class="badge badge-danger" id="notifmutasi"></span>
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <ul id="pesan" style="width: 250px;">

                    </ul>
                </div>
            </div>
        </div>
            
        

  <div class="container">

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
    <thead>
    <!-- Button trigger modal -->
    <table id="example" class="table table-striped table-bordered" style="width:50%">
      <thead>
        <tr>
              <th>No.Reg</th>
              <th>No.Surat Perjanjian</th>
              <th>Penjual : Nama</th>
              <th>Penjual : Tanggal Lahir</th>
              <th>Penjual : Alamat</th>
              <th>Pembeli : Nama</th>
              <th>Pembeli : Tanggal Lahir</th>
              <th>Pembeli : Alamat</th>
              <th>No.KIKITIR</th>
              <th>No.Persil</th>
              <th>D/S</th>
              <th>Batas Tanah</th>
              <th>Luas Tanah</th>
              <!-- <th>Harga</th> -->
              <th>Akad</th>
              <!-- <th>AJB</th>
              <th>Sertifikat</th>
              <th>PPH</th> -->
              <th>Status_tanah</th>
              <th>Status</th>
          
       
              <th colspan="3">Tindakan</th>
        </tr>
      </thead>
      <tbody>
      <?php
    include_once "controller/process.php";
    $queryselectTable = "SELECT * FROM tbmutasi";
    $sql = mysqli_query($conn, $queryselectTable);
    //output data of each row 
    while($result = mysqli_fetch_assoc($sql)){
        echo "<tr>";
        echo '<td style="display:none;">' . $result["id"] . '</td>';
        echo '<td>' . $result["no_reg"] . '</td>';
        echo '<td>' . $result["no_surat_perjanjian"] . '</td>';
        echo '<td>' . $result["penjual_nama"] . '</td>';
        echo '<td>' . $result["penjual_tanggal_lahir"] . '</td>';
        echo '<td>' . $result["penjual_alamat"] . '</td>';
        echo '<td>' . $result["pembeli_nama"] . '</td>';
        echo '<td>' . $result["pembeli_tanggal_lahir"] . '</td>';
        echo '<td>' . $result["pembeli_alamat"] . '</td>';
        echo '<td>' . $result["no_kikitir"] . '</td>';
        echo '<td>' . $result["no_persil"] . '</td>';
        echo '<td>' . $result["ds"] . '</td>';
        echo '<td>' . $result["batas_tanah"] . '</td>';
        echo '<td>' . $result["luas_tanah"] . '</td>';
        // echo '<td>' . $result["harga"] . '</td>';
        echo '<td>' . $result["mutlak_akad"] . '</td>';
        // echo '<td>' . $result["ajb_filename"] . '</td>';
        // echo '<td>' . $result["sertifikat_tanah_filename"] . '</td>';
        // echo '<td>' . $result["pph_filename"] . '</td>';
        echo '<td>' . $result["status_pengajuan"] . '</td>';
        echo '<td>' . $result["status_tanah"] . '</td>';
        
        // echo '<td><button onclick="deleteModal('.json_encode($result["id"]).')" type="button" name="delete" class="btn btn-primary">Delete</button></td>';
      
?>
<td>
  <?php
    if ($result['status_pengajuan']=="Diterima") {
      ?>
          <button type="button" disabled="true" name="delete" class="btn btn-primary">Delete</button>
     <?php
    }else{
      ?>
         <a href="controller/deleteMutasi.php?id=<?php echo $result["id"]  ?>"> <button type="button" name="delete" class="btn btn-primary">Delete</button></a>
      <?php
    }
  ?>
</td>
 

       <!-- Start Modal Edit -->
       <div class="w3-container">
  <div id="<?php echo $result['id'] ?>" class="w3-modal" class="w3-modal">
  <div class="w3-modal-content" style="width: 75%">
      <div class="w3-container">
        <span onclick="document.getElementById('<?php echo $result['id'] ?>').style.display='none'" class="w3-button w3-display-topright">&times;</span>
        <form action="controller/update_status_Mutasi.php" method="POST" enctype="multipart/form-data">
            <div class="form-columns">
              <div class="form-style-1">
              <input type="hidden" name="id" value="<?php echo $result["id"] ?>">
              <input type="hidden" name="no_reg" value="<?php echo $result["no_reg"] ?>">

              <label for="no_surat_perjanjian">No.Surat Perjanjian<span class="required">*</span></label>
                <input type="text" id="no_surat_perjanjian" name="no_surat_perjanjian"  value="<?php echo $result["no_surat_perjanjian"] ?>"  class="field-divided" placeholder="No.Surat Perjanjian">

                <label for="penjual_nama">Penjual : Nama<span class="required">*</span></label>
                <input type="text" id="penjual_nama" name="penjual_nama" class="field-divided" value="<?php echo $result["penjual_nama"] ?>" placeholder="Nama Penjual">

                <label for="penjual_tanggal_lahir">Penjual : Tanggal Lahir<span class="required">*</span></label>
                <input type="date" id="penjual_tanggal_lahir" name="penjual_tanggal_lahir" value="<?php echo $result["penjual_tanggal_lahir"] ?>" class="field-divided">

                <label for="penjual_alamat">Penjual : Alamat<span class="required">*</span></label>
                <input type="text" id="penjual_alamat" name="penjual_alamat" value="<?php echo $result["penjual_alamat"] ?>" class="field-divided" placeholder="Alamat Penjual">

                <label for="pembeli_nama">Pembeli : Nama<span class="required">*</span></label>
                <input type="text" id="pembeli_nama" name="pembeli_nama" value="<?php echo $result["pembeli_nama"] ?>" class="field-divided" placeholder="Nama Pembeli">

                <label for="pembeli_tanggal_lahir">Pembeli : Tanggal Lahir<span class="required">*</span></label>
                <input type="date" id="pembeli_tanggal_lahir" name="pembeli_tanggal_lahir" value="<?php echo $result["pembeli_tanggal_lahir"] ?>" class="field-divided">

                <label for="pembeli_alamat">Pembeli : Alamat<span class="required">*</span></label>
                <input type="text" id="pembeli_alamat" name="pembeli_alamat" value="<?php echo $result["pembeli_alamat"] ?>" class="field-divided" placeholder="Alamat Pembeli">
             
              </div>
              <div class="form-style-2">
              <label for="no_kikitir">No.KIKITIR<span class="required">*</span></label>
              <input type="text" id="no_kikitir" name="no_kikitir" value="<?php echo $result["no_kikitir"] ?>" class="field-divided" placeholder="No.KIKITIR">

              <label for="no_persil">No.Persil<span class="required">*</span></label>
              <input type="text" id="no_persil" name="no_persil" value="<?php echo $result["no_persil"] ?>" class="field-divided" placeholder="No.Persil">

              <label for="ds">D/S<span class="required">*</span></label>
              <input type="text" id="ds" name="ds" value="<?php echo $result["ds"] ?>" class="field-divided" placeholder="D/S">

              <label for="batas_tanah">Batas Tanah<span class="required">*</span></label>
              <input type="text" id="batas_tanah" name="batas_tanah" value="<?php echo $result["batas_tanah"] ?>" class="field-divided" placeholder="Batas Tanah">

              <label for="luas_tanah">Luas Tanah<span class="required">*</span></label>
              <input type="text" id="luas_tanah" name="luas_tanah" value="<?php echo $result["luas_tanah"] ?>" class="field-divided" placeholder="Luas Tanah">

              <label for="harga">Harga<span class="required">*</span></label>
              <input type="text" id="harga" name="harga" value="<?php echo $result["harga"] ?>" class="field-divided" placeholder="Harga">

              <label for="akad">Mutlak Akad<span class="required">*</span></label>
              <input type="text" id="mutlak_akad" name="mutlak_akad" value="<?php echo $result["mutlak_akad"] ?>" class="field-divided">
              <label for="ktp">AJB`:</label>
                        <input type="file" id="ajb" name="file[]" class="field-divided">
                        <label for="kk">Sertifikat Tanah:</label>
                        <input type="file" id="sertifikattanah" name="file[]" class="field-divided">
                        <label for="pbb">PPH:</label>
                        <input type="file" id="pph" name="file[]" class="field-divided">
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



 <td>
  <button onclick="document.getElementById('<?php echo $result['id']?>').style.display='block'" class="btn btn-primary">View</button>
</td>


      <td>
      <?php
        if ($result['status_pengajuan']=="Diterima" or $result['status_pengajuan']=="Ditolak") {
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
      

  
      
      </tbody>
    </table>
  </div>
  <script>
function showUpdateModal(id) {
  document.getElementById('id01').style.display = "block";
}

</script>


</body>
</html>




















