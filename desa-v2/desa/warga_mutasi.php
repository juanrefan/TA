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
    <h2>Layanan Registrasi Mutasi</h2>
    <!-- Modal -->
<div class="w3-container">
  <button onclick="document.getElementById('id01').style.display='block'" class="w3-button w3-black">Daftar</button>
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
                <input type="date" id="no_surat_perjanjian" name="no_surat_perjanjian" class="field-divided" placeholder="No.Surat Perjanjian">

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

                <label for="no_kikitir">No.KIKITIR<span class="required">*</span></label>
              <input type="text" id="no_kikitir" name="no_kikitir" class="field-divided" placeholder="No.KIKITIR" pattern="[0-9]+" title="Please enter only numeric characters." required>

                
              <label for="no_persil">No.Persil Penjual<span class="required">*</span></label>
              <input type="text" id="no_persil" name="no_persil_penjual" class="field-divided" placeholder="No.Persil">
             
              </div>
              <div class="form-style-2">
              
              <label for="no_persil">No.Persil<span class="required">*</span></label>
              <input type="text" id="no_persil" name="no_persil" class="field-divided" placeholder="No.Persil" pattern="[0-9]+" title="Please enter only numeric characters." required>

              <label for="ds">D/S<span class="required">*</span></label>
              <input type="text" id="ds" name="ds" class="field-divided" placeholder="D/S" pattern="[A-Za-z.]*" title="Please enter only characters." required>

              <label for="batas_tanah">Batas Tanah<span class="required">*</span></label>
              <input type="text" id="batas_tanah" name="batas_tanah" class="field-divided" pattern="[A-Za-z.]*" placeholder="Batas Tanah">

              <label for="luas_tanah">Luas Tanah<span class="required">*</span></label>
              <input type="text" id="luas_tanah" name="luas_tanah" class="field-divided" placeholder="Luas Tanah" pattern="[0-9]+" title="Please enter only numeric characters." required>

              <label for="harga">Harga<span class="required">*</span></label>
              <input type="text" id="harga" name="harga" class="field-divided" placeholder="Harga" pattern="[0-9]+" title="Please enter only numeric characters." required>

              <label for="akad">Mutlak Akad<span class="required">*</span></label>
              <input type="text" id="mutlak_akad" name="mutlak_akad" class="field-divided" placeholder="Akad" pattern="[A-Za-z]+" title="Please enter only alphabet characters." required>
             
                        <label for="ktp">KTP`:</label>
                        <div id="preview_ajb">
                        <input type="file" id="ajb" name="file[]" class="field-divided" onchange="getImagePreview(event)"  width="500" height="500">
                        </div>

                
                        <label for="kk">KK:</label>
                        <div id="preview_sertifikattanah">
                        <input type="file" id="sertifikattanah" name="file[]" class="field-divided" onchange="getImagePreview(event)"  width="500" height="500">
                        </div>

                       
                        <label for="pbb"> akta jual beli / akta hibah / surat keterangan dari Desa / Kelurahan:</label>
                        <div id="preview_pph">
                        <input type="file" id="pph" name="file[]" class="field-divided"  onchange="getImagePreview(event)"  width="500" height="500">
                        </div>
                        <input type="hidden" name="status" value="Diproses">

                        <label for="status_tanah">Status Tanah:</label>
                        <select id="status" name="status_tanah" class="form-control">
                          <option value="jualbeli">Jual-Beli</option>
                          <option value="ahliwaris">Ahli Waris</option>
                          <option value="hibah">Hibah</option>
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

<br>

<br>

<br>

<script>
     function getImagePreview(event){
    var image = URL.createObjectURL(event.target.files[0]);
    var imagediv = document.getElementById('preview_' + event.target.id);
    var newimg = document.createElement('img');
    newimg.src = image;
    imagediv.appendChild(newimg);
}

     


</script>
  
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
$sql = "SELECT * FROM tbmutasi WHERE no_reg='$no_reg'";
$result = $conn->query($sql);//execute query

if($result->num_rows>0){

    ?>
     <div class="container">
          <div class="row">
            <table class="table table-striped">
              <thead>
                <th>No Registrasi</th>
                <th>Pembeli</th>
                <th>Penjual</th>
                <th>Status Pengajuan</th>
                <th>Status Tanah</th>
               
                <th>Action</th>
              </thead>  
              <tbody>
            <?php while($data = $result->fetch_assoc()){

            ?>
            <td><?php echo $data['no_reg'] ?></td>
            <td><?php echo $data['pembeli_nama']?></td>
            <td><?php echo $data['penjual_nama']?></td>
            <td><?php echo $data['status_tanah']?></td>
            <td><?php echo $data['status_pengajuan'] ?></td>
            <td>
            <?php  
             if($data['status_pengajuan']=="Diproses" or $data['status_pengajuan']=="Perbaiki"){

              ?>
                    <!-- HTML -->
               <a href="controller/deleteMutasi.php?id=<?php echo $data["id"]  ?>"> 
              <button type="button" name="delete" class="btn btn-primary">Delete</button>
              </a>
            <?php 
            }else{
                        
            ?>
               <button type="button" disabled="true" name="delete" class="btn btn-primary">Delete</button>

            <?php
                    
            }
            ?>
                ||
                <?php if($data['status_pengajuan']=="Diproses" or $data['status_pengajuan']=="Perbaiki"){
                    
                    ?>
                    <button onclick="document.getElementById(`<?php echo $data['id'] ?>`).style.display='block'" class="btn btn-primary">Update</button>
                    <?php }else{

                    ?>

                        <button disabled="true" class="btn btn-primary">Update</button>


                        <?php }
                        
                        
                        
                        ?>
                     </td>
                     
       <!-- Start Modal Edit -->
  <div class="w3-container">
  <div id="<?php echo $data['id'] ?>" class="w3-modal" class="w3-modal">
  <div class="w3-modal-content" style="width: 75%">
      <div class="w3-container">
        <span onclick="document.getElementById('<?php echo $data['id'] ?>').style.display='none'" class="w3-button w3-display-topright">&times;</span>
        <form action="controller/updateMutasi.php" method="POST" enctype="multipart/form-data">
            <div class="form-columns">
              <div class="form-style-1">
              <input type="hidden" name="id" value="<?php echo $data["id"] ?>">
              <input type="hidden" name="no_reg" value="<?php echo $data["no_reg"] ?>">

              <label for="no_surat_perjanjian">No.Surat Perjanjian<span class="required">*</span></label>
                <input type="text" id="no_surat_perjanjian" name="no_surat_perjanjian"  value="<?php echo $data["no_surat_perjanjian"] ?>"  class="field-divided" placeholder="No.Surat Perjanjian">

                <label for="penjual_nama">Penjual : Nama<span class="required">*</span></label>
                <input type="text" id="penjual_nama" name="penjual_nama" class="field-divided" value="<?php echo $data["penjual_nama"] ?>" placeholder="Nama Penjual">

                <label for="penjual_tanggal_lahir">Penjual : Tanggal Lahir<span class="required">*</span></label>
                <input type="date" id="penjual_tanggal_lahir" name="penjual_tanggal_lahir" value="<?php echo $data["penjual_tanggal_lahir"] ?>" class="field-divided">

                <label for="penjual_alamat">Penjual : Alamat<span class="required">*</span></label>
                <input type="text" id="penjual_alamat" name="penjual_alamat" value="<?php echo $data["penjual_alamat"] ?>" class="field-divided" placeholder="Alamat Penjual">

                <label for="pembeli_nama">Pembeli : Nama<span class="required">*</span></label>
                <input type="text" id="pembeli_nama" name="pembeli_nama" value="<?php echo $data["pembeli_nama"] ?>" class="field-divided" placeholder="Nama Pembeli">

                <label for="pembeli_tanggal_lahir">Pembeli : Tanggal Lahir<span class="required">*</span></label>
                <input type="date" id="pembeli_tanggal_lahir" name="pembeli_tanggal_lahir" value="<?php echo $data["pembeli_tanggal_lahir"] ?>" class="field-divided">

                <label for="pembeli_alamat">Pembeli : Alamat<span class="required">*</span></label>
                <input type="text" id="pembeli_alamat" name="pembeli_alamat" value="<?php echo $data["pembeli_alamat"] ?>" class="field-divided" placeholder="Alamat Pembeli">
             
              </div>
              <div class="form-style-2">
              <label for="no_kikitir">No.KIKITIR<span class="required">*</span></label>
              <input type="text" id="no_kikitir" name="no_kikitir" value="<?php echo $data["no_kikitir"] ?>" class="field-divided" placeholder="No.KIKITIR">

              
              <label for="no_persil">No.Persil Penjual<span class="required">*</span></label>
              <input type="text" id="no_persil" name="no_persil_penjual" value="<?php echo $data["no_persil_penjual"] ?>" class="field-divided" placeholder="No.Persil">

              <label for="no_persil">No.Persil<span class="required">*</span></label>
              <input type="text" id="no_persil" name="no_persil" value="<?php echo $data["no_persil"] ?>" class="field-divided" placeholder="No.Persil">

              <label for="ds">D/S<span class="required">*</span></label>
              <input type="text" id="ds" name="ds" value="<?php echo $data["ds"] ?>" class="field-divided" placeholder="D/S">

              <label for="batas_tanah">Batas Tanah<span class="required">*</span></label>
              <input type="text" id="batas_tanah" name="batas_tanah" value="<?php echo $data["batas_tanah"] ?>" class="field-divided" placeholder="Batas Tanah">

              <label for="luas_tanah">Luas Tanah<span class="required">*</span></label>
              <input type="text" id="luas_tanah" name="luas_tanah" value="<?php echo $data["luas_tanah"] ?>" class="field-divided" placeholder="Luas Tanah">

              <label for="harga">Harga<span class="required">*</span></label>
              <input type="text" id="harga" name="harga" value="<?php echo $data["harga"] ?>" class="field-divided" placeholder="Harga">

              <label for="akad">Mutlak Akad<span class="required">*</span></label>
              <input type="text" id="mutlak_akad" name="mutlak_akad" value="<?php echo $data["mutlak_akad"] ?>" class="field-divided" placeholder="Akad">
                        <label for="ktp">AJB`:</label>
                        <input type="file" id="ajb" name="file[]" class="field-divided">
                        <label for="kk">Sertifikat Tanah:</label>
                        <input type="file" id="sertifikattanah" name="file[]" class="field-divided">
                        <label for="pbb">PPH:</label>
                        <input type="file" id="pph" name="file[]" class="field-divided">

                        <input type="hidden" name="status" value="Diproses">



                        <label for="status">Status Tanah:</label>
                        <select id="status" name="status" class="form-control">
                          <option value="jualbeli">Juak-Beli</option>
                          <option value="ahliwaris">Ahli Waris</option>
                          <option value="hibah">Hibah</option>
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

     
 <!-- End Modal Edit -->
 <?php }
 // End while
 ?> 

</tbody>

</table>
</div>
</div>
<?php

}else{
echo "Data Tidak ada";
}
}

?>
</body>
</html>

        

 