<?php   include_once "controller/util.php";?>
<!doctype html>
<html lang="en">
  
<head>
<link rel="stylesheet" type="text/css" href="styles/stylewarga.css">    
      <link rel="stylesheet" type="text/css" media="screen" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
      <!-- <link rel="stylesheet" type="text/css" media="screen" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css"> -->
      <link rel="stylesheet" type="text/css" media="screen" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap4.min.css">
      <!-- <link rel="stylesheet" type="text/css" href="style.css">       -->
      <!-- CSS only -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous"> -->
      <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
      <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
      <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
      
        </head>
        <body>
      <div class="wrapper">
        <div class="contain-wrappper">
            <div class="container-fluid">
              <div class="row">
                <?php  
                  
                  

                  // $sql = "Call countSertifikat()";
                  
                  
                  // if ($conn->query($sql) === true) {
                  //     // echo "New record created successfully";
                  //    while($result = mysqli_fetch_assoc($sql)){
                  //     echo $result['total_diterima'];
                  //   }
                  // } else {
                  //     echo "Error: " . $sql . "<br>" . $conn->error;
                  // }
                ?>
                <div class="col-lg-2 col-6">
                  <!-- small box -->
                  <div class="small-box bg-info"  style="padding-left: 10px; padding-top: 3px; padding-bottom: 4px">
                    <div class="inner">
                      <?php
                        $sql = mysqli_query($conn,"SELECT COUNT(status_pengajuan)  as total FROM tbsertifikat where status_pengajuan = 'Diterima'");
                    
                        while($result = mysqli_fetch_assoc($sql)){
                         
                        
                      ?>
                      <h3><?php  echo $result['total']; ?></h3>

                      <p>Total Sertifikat</p>
                      <?php
                        }
                      ?>
                    </div>
                    <div class="icon">
                      <i class="ion ion-bag"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                  </div>
                </div>
                <!-- ./col -->

                <div class="col-lg-2 col-6">
                  <!-- small box -->
                  <div class="small-box bg-success"  style="padding-left: 10px; padding-top: 3px; padding-bottom: 4px">
                    <div class="inner">
                    <?php
                        $sql = mysqli_query($conn,"SELECT COUNT(status_pengajuan)  as total FROM tbsertifikat where status_pengajuan = 'Ditolak'");
                    
                        while($result = mysqli_fetch_assoc($sql)){
                         
                        
                      ?>
                      <h3><?php  echo $result['total']; ?></h3>

                      <p>Total Mutasi Tanah</p>
                      <?php
                        }
                      ?>
                    </div>
                    <div class="icon">
                      <i class="ion ion-stats-bars"></i>
                    </div>
                  <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                  </div>
                </div>


                <!-- ./col -->
                <div class="col-lg-2 col-6">
                  <!-- small box -->
                  <div class="small-box bg-warning"  style="padding-left: 10px; padding-top: 3px; padding-bottom: 4px">
                    <div class="inner">
                    <?php
                        $sql = mysqli_query($conn,"SELECT COUNT(status_pengajuan)  as total FROM tbmutasi where status_pengajuan = 'Diterima'");
                    
                        while($result = mysqli_fetch_assoc($sql)){
                         
                        
                      ?>
                      <h3><?php  echo $result['total']; ?></h3>

                      <p>Total Ahli waris</p>
                      <?php
                        }
                      ?>
                    </div>
                    <div class="icon">
                      <i class="ion ion-person-add"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                  </div>
                </div>


                <!-- ./col -->
                <div class="col-lg-2 col-6">
                  <!-- small box -->
                  <div class="small-box bg-success"  style="padding-left: 10px; padding-top: 3px; padding-bottom: 4px">
                    <div class="inner">
                    <?php
                        $sql = mysqli_query($conn,"SELECT COUNT(status_pengajuan)  as total FROM tbahliwaris where status_pengajuan = 'Diterima'");
                    
                        while($result = mysqli_fetch_assoc($sql)){
                         
                        
                      ?>
                      <h3><?php  echo $result['total']; ?></h3>

                      <p>Total Letter C</p>
                      <?php
                        }
                      ?>
                    </div>
                    <div class="icon">
                      <i class="ion ion-pie-graph"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                  </div>
                </div>
                <!-- ./col -->

                <div class="col-lg-2 col-6">
                  <!-- small box -->
                  <div class="small-box bg-danger"  style="padding-left: 10px; padding-top: 3px; padding-bottom: 4px">
                    <div class="inner">
                    <?php
                        $sql = mysqli_query($conn,"SELECT SUM(luas_tanah)  as total FROM tbsertifikat where status_pengajuan = 'Diterima'");
                    
                        while($result = mysqli_fetch_assoc($sql)){
                         
                        
                      ?>
                      <h3><?php  echo $result['total']; ?></h3>

                      <p>Luas Tanah Kering</p>
                      <?php
                        }
                      ?>
                    </div>
                    <div class="icon">
                      <i class="ion ion-pie-graph"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                  </div>
                </div>
                <!-- ./col -->

                <div class="col-lg-2 col-6">
                  <!-- small box -->
                  <div class="small-box bg-info"  style="padding-left: 10px; padding-top: 3px; padding-bottom: 4px">
                    <div class="inner">
                    <?php
                        $sql = mysqli_query($conn,"SELECT SUM(luas_tanah)  as total FROM tbsertifikat where status_pengajuan = 'Diterima'");
                    
                        while($result = mysqli_fetch_assoc($sql)){
                         
                        
                      ?>
                      <h3><?php  echo $result['total']; ?></h3>

                      <p>Luas Tanah Basah / Sawah</p>
                      <?php
                        }
                      ?>
                    </div>
                    <div class="icon">
                      <i class="ion ion-pie-graph"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                  </div>
                </div>
                <!-- ./col -->
              </div>
          </div>
        </div>
  </div>

  <br><br>
  <div class="container">

      </div>
        <div class="row">
        <div class="col-md-6">
          <form action="" method="POST">
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Status Transaksi</label>
              <select class="form-control" name="status_trx_tanah">
                <option>Silahkan Pilih status Transaksi</option>
                <option value="gabung">Gabung</option>
                <option value="pecah">Pecah</option>
                <option value="baru">Baru</option>
              </select>
            </div>
            <button type="submit" class="btn btn-primary">get Filter</button>
            <?php  
           
            $st_trx_tnh = filter_input(INPUT_POST, "status_trx_tanah");

                if (!empty($st_trx_tnh)) {
                  echo "Data ada";
                }else{
                  "data Tidak ada";
                
            ?>
      
          </div>
        </div>
        <br><br>
        <div class="row">
        
         
          <div class="col-md-12">
          <?php 
        $sql = "SELECT * FROM tbmutasi INNER JOIN tbsertifikat ON tbmutasi.no_persil_penjual=tbsertifikat.persil";
        $sql = mysqli_query($conn, $sql);
      
      
      ?>
     
        <table id="example" class="table table-striped table-bordered" style="width:50%">
          <thead>
           <tr>
              <th scope="col">No</th>
              <th scope="col">Nama Pemilik Sebelumnya</th>
              <th scope="col">Persil Pemilik Sebelumnya</th>
              <th scope="col">Nama Pemilik Sekarang</th>
              <th scope="col">Persil Pemilik Sekarang</th>
              <th scope="col">Tanggal Mutasi</th>
              <th scope="col">Details</th>
              
            </tr>
          </thead>
          <tbody>
          <?php 
                    //output data of each row 
                  $no=1;
                  while($result = mysqli_fetch_assoc($sql)){
                   
                
                ?>  
                <tr>
                  <th scope="row"><?php echo $no++; ?> </th>
                  <td><?php echo $result['penjual_nama'] ?></td>
                  <td><?php echo $result['no_persil_penjual'] ?></td>
                  <td><?php echo $result['pembeli_nama'] ?></td>
                  <td><?php echo $result['no_persil'] ?></td>
                  <td><?php echo $result['no_surat_perjanjian'] ?></td>
                  <td><a href="desa_riwayat/riwayat_tanah">button</a></td>
                </tr>
            <?php }?>

          </tbody>
    
      <script>
      $(document).ready(function () {
        $('#example').DataTable({
            dom: '<"top"i>rt<"bottom"flp><"clear">',
        });
    });
      </script>
      </table>

          </div>

        </div>  
      
      </div>
      <?php }?>
      </form>
      
 </body>
</html>
    
        