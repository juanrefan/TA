<?php  include_once "controller/registrasiahliWaris.php"; ?>
<!DOCTYPE html>
<html>
<head>
  <title>W3.CSS</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" type="text/css" href="styles/design.css">  

</head>
<body>


<div class="container">
    <h2 class="ahliwarisadmin">Layanan Registrasi Ahliwaris</h2>
    

    <!-- Modal -->
<div class="w3-container">
  <button onclick="document.getElementById('id01').style.display='block'" class="w3-button w3-black">Daftar</button>

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
                      

                        <label for="html">Alm</label><br>
                      <input type="checkbox" id="AlmSuami" name="AlmSuami" value="Suami" onclick="undisableButton()">
                       

                        <label for="firstnameSuami">Waris Dari | Nama Suami <span class="required">*</span></label>
                        <input type="text" id="firstnameSuami" name="namaSuami" class="field-divided" placeholder="First" pattern="[A-Za-z]+" title="“Input tidak valid. Harap masukan karakter huruf (A-Z) tanpa angka atau simbol" required>
                      
                      
                        <label for="html">Alm</label><br>
                        <input type="checkbox" id="AlmIstri" name="fav_language" value="Istri"  onclick="undisablebuttonIstri()">
                       
                        <label for="firstnameIstri">Waris Dari | Nama Istri <span class="required">*</span></label>
                        <input type="text" id="firstnameIstri" name="namaIstri" class="field-divided" placeholder="First" pattern="[A-Za-z]+" title="“Input tidak valid. Harap masukan karakter huruf (A-Z) tanpa angka atau simbol" required>
                      
                      

                      <label for="tanggalSuami">Tanggal Meninggal Suami<span class="required">*</span></label>
                      <input type="date" id="tanggalSuami" disabled name="tanggalSuami" class="field-divided" placeholder="Tanggal Peraturan Desa">

                      <label for="tanggalIstri">Tanggal Meninggal Istri<span class="required">*</span></label>
                      <input type="date" id="tanggalIstri" disabled name="tanggalIstri" class="field-divided" placeholder="Tanggal Peraturan Desa">


                        <label for="alamatm meninggal">Alamat Meninggal<span class="required">*</span></label>
                        <input type="text" id="alamatmeninggal" name="alamatmeninggal" class="field-divided">

                        <label for="ahli waris">Ahli Waris<span class="required" id="keterangan">*</span></label>
                        <textarea name="ahliwaris" id="editor" class="field-long field-textarea" pattern="[A-Za-z]+" title="Please enter only alphabet characters." required></textarea>
                <!-- form fields -->
              </div>
              <div class="form-style-2">
                
              <label for="ahli waris">Hubungan Keluarga<span class="required" id="keterangan">*</span></label>
                        <textarea name="hubungankeluarga" id="editor1" class="field-long field-textarea" pattern="[A-Za-z]+" title="Please enter only alphabet characters." required></textarea>

                        <label for="ahli waris">Umur<span>*</span></label>
                        <textarea name="umur" id="editor2" class="field-long field-textarea"  pattern="[0-9]+" title="Please enter only numeric characters." required></textarea>

                        <label for="ahli waris">Alamat<span class="required" id="keterangan">*</span></label>
                        <textarea name="alamat" id="editor3" class="field-long field-textarea" ></textarea>

                        
                <!-- form fields -->

    
                
                        <label for="keteranganahliwaris">Surat Keterangan Ahli Waris:</label>
                        <div id="preview_keteranganahliWaris">
                        <input type="file" id="keteranganahliWaris" name="file[]" class="field-divided" accept=".jpg, .jpeg, .png, .pdf" onchange="getImagePreview(event)"  width="500" height="500" required>
                        </div>
                  
                     
                        <label for="ktp">KTP:</label>
                        <div id="preview_ktp">
                        <input type="file" id="ktp" name="file[]" class="field-divided" accept=".jpg, .jpeg, .png, .pdf" onchange="getImagePreview(event)"  width="500" height="500" required>
                        </div>
                
                        <label for="kk">KK:</label>
                         <div id="preview_kk">
                        <input type="file" id="kk" name="file[]" class="field-divided" accept=".jpg, .jpeg, .png, .pdf" onchange="getImagePreview(event)"  width="500" height="500" required>
                        
                    </div>
                    <input type="hidden" name="status" value="Diproses">

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
        <label for="exampleInputEmail1" class="form-label">Cari No Registrasi Anda Disini:</label>
        <input type="text" name="no_reg" class="form-control" >
      </div>
      <button type="submit" class="btn btn-primary">Cari</button>
    </form>
  </div>

</div>



<!--  -->

<!--  -->


<?php 
if(isset($_POST['no_reg'])){
$no_reg = $_POST['no_reg'];
$sql = "SELECT * FROM tbahliwaris WHERE no_reg='$no_reg'";
$result = $conn->query($sql);
if($result->num_rows>0){
    ?>
    <div class="container">
    <div class="row">
      <table class="table table-striped">
        <thead>
          <th>No Registrasi</th>
          <th>Nama</th>
          <th>Status</th>
          <th>Action</th>
        </thead>  
        <tbody>
        <?php while($data = $result->fetch_assoc()){
            
            ?>
            <td><?php echo $data['no_reg'] ?></td>
            <td><?php echo $data['nama_pemohon']?></td>
            <td><?php echo $data['status_pengajuan'] ?></td>
            <td>
            <?php if($data['status_pengajuan'] == "Diproses"){
            
            ?>
             <a href="controller/deleteMutasi.php?id=<?php echo $data["id"]  ?>"> 
             <button type="button" name="delete" class="btn btn-primary">Delete</button>
             </a>
            <?php }else{
                ?>
                <button type="button" disabled="true" name="delete" class="btn btn-primary">Delete</button>
            <?php }
            
            ?>
            ||
            <?php if($data['status_pengajuan'] == "Diproses" or $data['status_pengajuan']=="Perbaiki"){
                
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
  <div id="<?php echo $data['id'] ?>" class="w3-modal">
  <div class="w3-modal-content" style="width: 75%">
      <div class="w3-container">
        <span onclick="document.getElementById(`<?php echo $data['id'] ?>`).style.display='none'" class="w3-button w3-display-topright">&times;</span>
        <form action="controller/updateahliWaris.php" method="POST" enctype="multipart/form-data">
            <div class="form-columns">
              <div class="form-style-1">
              
              <input type="hidden" id="id" name="id" value="<?php echo $data["id"] ?>" class="field-divided" placeholder="Tanggal Peraturan Desa">
              <input type="hidden" name="no_reg_ahli_waris" value="<?php echo $data["no_reg"] ?>">


              <label for="tgl">Tanggal<span class="required">*</span></label>
                        <input type="date" id="tgl" name="tanggal" value="<?php echo $data["tanggal"] ?>" class="field-divided" placeholder="Tanggal Peraturan Desa">

                        <label for="firstName">Nama Pemohon<span class="required">*</span></label>
                        <input type="text" id="firstName" name="namaPemohon" value="<?php echo $data["nama_pemohon"] ?>" class="field-divided" placeholder="First">
                        <label for="firstnameSuami">Waris Dari | Nama Suami <span class="required">*</span></label>
                        <input type="text" id="firstnameSuami" name="namaSuami" value="<?php echo $data["waris_suami"] ?>" class="field-divided" placeholder="First">

                        <label for="firstnameIstri">Waris Dari | Nama Istri <span class="required">*</span></label>
                        <input type="text" id="firstnameIstri" name="namaIstri" value="<?php echo $data["waris_istri"] ?>" class="field-divided" placeholder="First">
                        
                        <label for="tanggalSuami">Tanggal Meninggal Suami<span class="required">*</span></label>
                        <input type="date" id="tanggalSuami"  name="tanggalSuami" value="<?php echo $data["tanggal_meninggal_suami"] ?>" class="field-divided" placeholder="Tanggal Peraturan Desa">

                        <label for="tanggalIstri">Tanggal Meninggal Istri<span class="required">*</span></label>
                        <input type="date" id="tanggalIstri" name="tanggalIstri" value="<?php echo $data["tanggal_meninggal_istri"] ?>"class="field-divided" placeholder="Tanggal Peraturan Desa">

                        <label for="alamatm meninggal">Alamat Meninggal<span class="required">*</span></label>
                        <input type="text" id="alamatmeninggal" name="alamatmeninggal" value="<?php echo $data["alamat_meninggal"] ?>" class="field-divided">

                        <label for="ahli waris">Ahli Waris<span class="required" id="keterangan">*</span></label>
                        <textarea name="ahliwaris" id="ahliwaris" class="field-long field-textarea"><?php echo $data["nama_ahli_waris"] ?> </textarea>
                <!-- form fields -->
              </div>
              <div class="form-style-2">
              <label for="ahli waris">Hubungan Keluarga<span class="required" id="keterangan">*</span></label>
                        <textarea name="hubungankeluarga" id="hubungankeluarga"   class="field-long field-textarea"><?php echo $data["hubungan_keluarga"] ?></textarea>
              <label for="ahli waris">Umur<span class="required" id="keterangan">*</span></label>
                        <textarea name="umur" id="umur" class="field-long field-textarea"><?php echo $data["umur"] ?></textarea>

                        
                        <label for="ahli waris">Alamat<span class="required" id="keterangan">*</span></label>
                        <textarea name="alamat" id="alamat" class="field-long field-textarea"><?php echo $data["alamat"] ?></textarea>

                <!-- form fields -->
                        <label for="keteranganahliwaris">Surat Keterangan Ahli Waris:</label>
                        <input type="file" id="keteranganahliWaris" name="file[]" class="field-divided" accept=".jpg, .jpeg, .png, .pdf" required>
                        <label for="ktp">KTP:</label>
                        <input type="file" id="aktahakMewaris" name="file[]" class="field-divided" accept=".jpg, .jpeg, .png, .pdf" required>
                        <label for="KK">KK:</label>
                        <input type="file" id="pernyataanahliWaris" name="file[]" class="field-divided" accept=".jpg, .jpeg, .png, .pdf" required>
                        <input type="hidden" name="status" value="Diproses">

                
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
<?php } // end while

?>

<?php

}else{
echo "Data Tidak ada";
}
}

?>


</tbody>

</table>
</div>
</div>


<script>

function undisableButton() {
  document.getElementById("tanggalSuami").disabled = false;
  
}

function undisablebuttonIstri() {
  document.getElementById("tanggalIstri").disabled = false;
  
}
</script>






  
</body>
</html>

        

 