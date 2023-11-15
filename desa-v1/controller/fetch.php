<?php
include_once "util.php";


$queryselectTable = "SELECT * FROM tbSertifikat";
$result = mysqli_query($conn, $queryselectTable);

if(mysqli_num_rows($result)> 0 ){
   while($row=mysqli_fetch_assoc($result)){
      $tes='<table class="table table-dark">
      <thead>
         <tr>
         <th>Tanggal</th>
         <th>Nama Pemohon</th>
         <th>Alamat Pemohon</th>
         <th>KIKITIR NO</th>
         <th>Pengajuan AJB
         <th>No C Desa</th>
         <th>Blok</th>
         <th>Persil</th>
         <th>Luas Tanah</th>
         <th>Batas-batas Tanah</th>
         <th>NO.PBB</th>
         <th>keterangan</th>
         <th>Tindakan</th>
      </tr>
      </thead>
      <tbody>
        <tr>
          <th scope="row">1</th>
        <td>'.$row["tanggal"].'</td>;
        <td> '.$row["first_name"].' '.$row["last_name"].' </td>;
        <td> '.$row["alamat_pemohon"].'</td>;
        <td> '.$row["kikitir_no"].' </td>;
        <td> '.$row["dasar_pengajuanajb"].'</td>;
        <td> '.$row["no_c_desa"].' </td>;
        <td> '.$row["blok"].' </td>;
        <td> '.$row["persil"].' </td>;
        <td> '.$row["luas_tanah"].' </td>;
        <td> '.$row["batas_tanah"].' </td>;
        <td> '.$row["no_pbb"].' </td>;
        <td> '.$row["keterangan"].' </td>;
        </tr>
      </tbody>
    </table>';

    echo $tes;
   }
}



?>
