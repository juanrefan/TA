<?php  include_once "controller/registrasiSertifikat.php"; ?>
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

  <button onclick="document.getElementById('id01').style.display='block'" class="w3-button w3-black">Registrasi</button>

  <div id="id01" class="w3-modal">
  <div class="w3-modal-content" style="width: 100%">
      <div class="w3-container">
        <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-display-topright">&times;</span>
        <form action="controller/insertwargaSertifikat.php" method="POST" enctype="multipart/form-data">
            <div class="form-columns">
              <div class="form-style-1">
                        <label for="tanggal">No Registrasi<span class="required">*</span></label>
                        <input type="text" id="no_reg_sertifikat" readonly="true" name="no_reg_sertifikat" class="field-divided" value="<?php echo $kodeSertifikat ?>">
                        <label for="tanggal">Tanggal<span class="required">*</span></label>
                        <input type="date" id="tgl" name="tanggal" class="field-divided" placeholder="Tanggal Peraturan Desa">
                        <label for="firstName">Nama Pemohon<span class="required">*</span></label>
                        <input type="text" id="firstName" name="firstname" class="field-divided" placeholder="First">
                        <input type="text" name="lastname" class="field-divided" placeholder="Last" id="lastName">
                        <label for="alamatPemohon">Alamat Pemohon<span class="required">*</span></label>
                        <input type="text" id="alamatPemohon" name="alamatpemohon" class="field-divided">
                        <label for="dasarpengajuanAjb">Dasar Pengajuan AJB<span class="required">*</span></label>
                        <input type="text" id="dasarpengajuanAjb" name="pengajuanajb" class="field-divided" placeholder="First">
                        <label for="kikitirNo">Kikitir no. <span class="required">*</span></label>
                        <input type="date" id="kikitirNo" name="kikitir" class="field-divided" placeholder="First">
                        <label for="noDesa">No C Desa<span class="required">*</span></label>
                        <input type="text" name="nodesa" id="noDesa" class="field-divided" placeholder="First">
                        <label for="blok">Blok<span class="required">*</span></label>
                        <input type="text" name="blok" id="blok" class="field-divided" placeholder="First">
                        <label for="persil">Persil<span class="required">*</span></label>
                        <input type="text" name="persil" id="persil" class="field-divided" placeholder="First">
                <!-- form fields -->
              </div>
              <div class="form-style-2">
                        <label for="luasTanah">Luas Tanah<span class="required">*</span></label>
                        <input type="text" name="luastanah" id="luasTanah" class="field-divided" placeholder="First">
                        <label for="batastanah">Batas-batas Tanah<span class="required">*</span></label>
                        <input type="text" name="batastanah" id="batasTanah" class="field-divided" placeholder="First">
                        <label for="noPbb">No PBB<span class="required">*</span></label>
                        <input type="text" name="nopbb" id="noPbb" class="field-divided" placeholder="First">
                        <!-- <label for="keterangan">Keterangan<span class="required" id="keterangan">*</span></label>
                        <textarea name="keterangan" id="keterangan" class="field-long field-textarea" style="width:500
                        px"></textarea> -->
                        <label for="ktp">KTP:</label>
                        <input type="file" id="ktp" name="file[]" class="field-divided">
                        <label for="kk">KK:</label>
                        <input type="file" id="kk" name="file[]" class="field-divided">
                        <label for="pbb">PBB:</label>
                        <input type="file" id="pbb" name="file[]" class="field-divided">
                        <label for="buktiSurat">Bukti Surat:</label>
                        <input type="file" id="buktiSurat" name="file[]" class="field-divided">
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

// if (isset($_POST['no_reg'])) {
// $no_reg=$_POST['no_reg'];
//   $sql = "SELECT * FROM tbsertifikat WHERE no_reg=$no_reg";
//   $query= mysqli_query($conn,$sql);
//   while ($data=mysqli_fetch_assoc($query)) {
//     if ($no_reg==$data['no_reg']) {
//       echo "Data Sama";
//     }else{
//       echo "Data Tidak Ada";
//     }
//   }

if (isset($_POST['no_reg'])) {
  $no_reg=$_POST['no_reg'];
  $sql = "SELECT * FROM tbsertifikat WHERE no_reg='$no_reg'";

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
                <?php while ($data = $result->fetch_assoc()) {
                  # code...
                ?>
                <td><?php echo $data['no_reg'] ?></td>
                <td><?php echo $data['first_name']." ".$data['last_name'] ?></td>
                <td><?php echo $data['status_pengajuan'] ?></td>
                <td>
                <?php 
                        if($data['status_pengajuan']=="Diproses"){

                      ?>
                      <!-- HTML -->
                        <a href="controller/deleteSertifikat.php?id=<?php echo $data["id"]  ?>"> 
                      <button type="button" name="delete" class="btn btn-primary">Delete</button>
                        </a>
                      
                      <?php
                        }else{
                          
                      ?>
                      <!-- HTML -->
                      <button type="button" disabled="true" name="delete" class="btn btn-primary">Delete</button>

                      <?php
                        }
                ?>
                  ||
                  
               <?php
                    if ($data['status_pengajuan']=="Diproses") {
                      ?>
                          <button onclick="document.getElementById(`<?php echo $data['id'] ?>`).style.display='block'" class="btn btn-primary">Update</button>
                      <?php
                    }else{

                  ?>
                      <button disabled="true" class="btn btn-primary">Update</button>
                <?php
                    }
                  ?>

                </td>
                
                <!-- Start Modal Edit -->
<div class="w3-container">
<div id="<?php echo $data['id'] ?>" class="w3-modal">
<div class="w3-modal-content" style="width: 75%">
    <div class="w3-container">
      <span onclick="document.getElementById('<?php echo $data['id'] ?>').style.display='none'" class="w3-button w3-display-topright">&times;</span>
      <form action="controller/updateSertifikat.php" method="POST" enctype="multipart/form-data">
          <div class="form-columns">
            <div class="form-style-1">
            <label for="tanggal">Tanggal<span class="required">*</span></label>
                      <input type="hidden" name="id" value="<?php echo $data["id"] ?>">
                      <input type="hidden" name="no_reg" value="<?php echo $data["no_reg"] ?>">
                      <label for="tanggal">Tanggal<span class="required">*</span></label>
                      <input type="date" id="tgl" name="tanggal" value="<?php echo $data["tanggal"] ?>" class="field-divided" placeholder="Tanggal Peraturan Desa">
                      
                      <label for="firstName">Nama Pemohon<span class="required">*</span></label>
                      <input type="text" id="firstName" name="firstname" value="<?php echo $data["first_name"] ?>" class="field-divided" placeholder="First">
                      
                      <input type="text" name="lastname" value="<?php echo $data["last_name"] ?>" class="field-divided" placeholder="Last" id="lastName">
                      <label for="alamatPemohon">Alamat Pemohon<span class="required">*</span></label>
                      <input type="text" id="alamatPemohon" name="alamatpemohon" value="<?php echo $data["alamat_pemohon"] ?>" class="field-divided">
                      
                        
                      <label for="kikitirNo">Kikitir no. <span class="required">*</span></label>
                      <input type="date" id="kikitirNo" name="kikitir" value="<?php echo $data["kikitir_no"] ?>" class="field-divided" placeholder="First">

                      
                      <label for="noDesa">No C Desa<span class="required">*</span></label>
                      <input type="text" name="nodesa" id="noDesa" value="<?php echo $data["no_c_desa"] ?>" class="field-divided" placeholder="First">
                      
                      <label for="blok">Blok<span class="required">*</span></label>
                      <input type="text" name="blok" id="blok"  value="<?php echo $data["blok"] ?>" class="field-divided" placeholder="First">
              <!-- form fields -->
            </div>
            <div class="form-style-2">
            <label for="persil">Persil<span class="required">*</span></label>
                      <input type="text" name="persil" id="persil" value="<?php echo $data["persil"] ?>" class="field-divided" placeholder="First">
                     
                      <label for="luasTanah">Luas Tanah<span class="required">*</span></label>
                      <input type="text" name="luastanah" id="luasTanah" value="<?php echo $data["luas_tanah"] ?>" class="field-divided" placeholder="First">
                    
                      <label for="batastanah">Batas-batas Tanah<span class="required">*</span></label>
                      <input type="text" name="batastanah" id="batasTanah" value="<?php echo $data["batas_tanah"] ?>" class="field-divided" placeholder="First">
                    
                      <label for="noPbb">No PBB<span class="required">*</span></label>
                      <input type="text" name="nopbb" id="noPbb" value="<?php echo $data["no_pbb"] ?>" class="field-divided" placeholder="First">
                      
                      <label for="keterangan">Keterangan<span class="required" id="keterangan">*</span></label>
                      <textarea name="keterangan" type="hidden" id="keterangan" class="field-long field-textarea" style="width:500
                      px"></textarea>

                      <label for="ktp">KTP:</label>
                      <input type="file" id="ktp" name="ktp" class="field-divided">
                      <label for="kk">KK:</label>
                      <input type="file" id="kk" name="kk" class="field-divided">
                      <label for="pbb">PBB:</label>
                      <input type="file" id="pbb" name="pbb" class="field-divided">
                      <label for="buktiSurat">Bukti Surat:</label>
                      <input type="file" id="buktiSurat" name="buktiSurat" class="field-divided">
                     
                   
                   
              <!-- form fields -->
            </div>
          </div>
          <div style="clear:both">
          <input id="btnAction" type="submit" value="Submit" button="btnAction" style="float:right; margin-right:10px;">
          </div>
        </form>
    
    </div>
  </div>
</div>
</div>
     
 <!-- End Modal Edit -->




                <?php 
                // End While
                 }
              
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

        

 