<?php
require ('../plugins/initapp.php'); $response=array(); $data='';

if (isset($_POST['proses'])) {$proses=$_POST['proses'];} else {$proses = '';}
if (isset($_POST['kode'])) {$kode=$_POST['kode'];} else {$kode = '';}
if (isset($_POST['nama'])) {$nama=$_POST['nama'];} else {$nama = '';}
if (isset($_POST['tglMulai'])) {$tglMulai=$_POST['tglMulai'];} else {$tglMulai = '';} if (trim($tglMulai)=='') {$tglMulai=date('Y-m-d');}
if (isset($_POST['tglAkhir'])) {$tglAkhir=$_POST['tglAkhir'];} else {$tglAkhir = '';} if (trim($tglAkhir)=='') {$tglAkhir='1900-01-01';}
if (isset($_POST['status'])) {$status=$_POST['status'];} else {$status = 0;}

if (isset($_FILES['gambar'])) {$gambar = $_FILES['gambar'];} else {$gambar='';}



if (isset($_POST['bentuk'])) {$bentuk=$_POST['bentuk'];} else {$bentuk = 0;}
if (isset($_POST['fungsi'])) {$role=$_POST['fungsi'];} else {$role = 0;}
if (isset($_POST['menu'])) {$menu=$_POST['menu'];} else {$menu = '';}
if (isset($_POST['pengguna'])) {$pengguna=$_POST['pengguna'];} else {$pengguna = '';}
if (isset($_POST['password'])) {$password=$_POST['password'];} else {$password = '';}
if (isset($_POST['lokasi'])) {$lokasi=$_POST['lokasi'];} else {$lokasi = '';}


/* Running Teks Management Process */
if ($proses == 'GetRunningTeks') {
  $context = stream_context_create(array('http'=>array(
    'method' => 'POST', 'header'  => "Content-Type: application/json", 'content' => json_encode(array('fungsi' => 'GetRunningTeks', 
    'keyword'=>$kode, 'status'=>$status, 'menu' =>$menu, 'pengguna'=>$pengguna, 'password'=>$password, 'lokasi'=>$lokasi)))));
  try {
    $result = json_decode(file_get_contents($URLServer . 'desa', false, $context),false);
    if ($result == false || is_null($result) || !is_array($result)) {throw new Exception("Running Teks Data can not connected");} else {
    if ($result[0]->ErrCode==1) {throw new Exception($result[0]->ErrMsg);} else {
      switch ($bentuk) {
        case 0: $ubah=''; $hapus='';
          foreach($result as $hasil) {
            $data.='<tr>'; $ubah=' data-id="'.$hasil->id.'"'; $hapus=' data-id="'.$hasil->id.'"';
            $data.='<td>'.$hasil->tglMulai.'</td>';
            $data.='<td class="kol1">'.$hasil->teks.'</td>'; $ubah.=' data-teks="'.$hasil->teks.'"';$hapus.=' data-teks="'.$hasil->teks.'"';
            $data.='<td class="kol2" data-order="'.$hasil->tglMulai.'">'.date("d M Y",strtotime($hasil->tglMulai)).'</td>'; $ubah.=' data-mulai="'.date('Y-m-d',strtotime($hasil->tglMulai)).'"';
            if (date('Y-m-d')==substr($hasil->tglMulai,0,10)) {$ubah.=' data-mulaikode=0';} else {$ubah.=' data-mulaikode=1';}
            $data.='<td class="kol3" data-order="'.$hasil->tglAkhir.'">'; if (substr($hasil->tglAkhir,0,10)=='1900-01-01') {$data.='&nbsp;'; $ubah.=' data-akhirkode="0" data-akhir=""';} else 
            {$data.=date("d M Y",strtotime($hasil->tglAkhir)); $ubah.=' data-akhirkode="1" data-akhir="'.date('Y-m-d',strtotime($hasil->tglAkhir)).'"';}
            $data.='</td>';
            $data.='<td class="kol4" data-order="'.$hasil->tglBuat.'">'.date("d M Y - H:i:s",strtotime($hasil->tglBuat)).'</td>'; 
            $data.='<td class="kol5">'.$hasil->pembuatNama.'</td>'; 
            $data.='<td class="kolStatus">'.$hasil->statusTeks.'</td>'; $ubah.=' data-kondisi="'.$hasil->statusKode.'"';
            if (($role & 2) > 0) {$data .= '<td class="kolEdit"><button type="button" class="btn btn-default btn-xs btnEdit" data-bs-toggle="modal" data-bs-target="#pesanBorang"'.$ubah.'><i class="fas fa-pencil-alt fa-lg"></i></button></td>';}
            if (($role & 4) > 0) {$data .= '<td class="kolDelete"><button type="button" class="btn btn-default btn-xs btnDelete"'.$hapus.'><i class="fas fa-trash-alt fa-lg"></i></button></td>';}
            $data.='</tr>';}
          break;}
      $response=array("status"=>$result[0]->ErrCode, "pesan"=>$result[0]->ErrMsg, "result"=>$data);}}}
    catch (Exception $e) {$response=array("status"=>1, "pesan"=>$e->getMessage(), "result"=>'');}}

if ($proses == 'SetRunningTeks') {
  $context = stream_context_create(array('http'=>array(
    'method' => 'POST', 'header'  => "Content-Type: application/json", 'content' => json_encode(array(
    'fungsi' => 'SetRunningTeks', 'keyword'=>$kode, 'isi'=>$nama, 'mulai'=>$tglMulai, 'akhir'=>$tglAkhir, 'status'=>$status,
    'menu' =>$menu, 'pengguna'=>$pengguna, 'password'=>$password, 'lokasi'=>$lokasi)))));
  try {
    $result = json_decode(file_get_contents($URLServer . 'desa', false, $context),false); 
    if ($result == false || is_null($result) || !is_array($result)) {throw new Exception("Running Teks Data can not connected");} else {
    $response=array("status"=>$result[0]->ErrCode, "pesan"=>$result[0]->ErrMsg, "result"=>'');}}
  catch (Exception $e) {$response=array("status"=>1, "pesan"=>$e->getMessage(), "result"=>'');}}

if ($proses == 'DelRunningTeks') {
  $context = stream_context_create(array('http'=>array(
    'method' => 'POST', 'header'  => "Content-Type: application/json", 'content' => json_encode(array(
    'fungsi' => 'DelRunningTeks', 'keyword'=>$kode, 'menu' =>$menu, 'pengguna'=>$pengguna, 'password'=>$password, 'lokasi'=>$lokasi)))));
  try {
    $result = json_decode(file_get_contents($URLServer . 'desa', false, $context),false); 
    if ($result == false || is_null($result) || !is_array($result)) {throw new Exception("Running Teks Data can not connected");} else {
    $response=array("status"=>$result[0]->ErrCode, "pesan"=>$result[0]->ErrMsg, "result"=>'');}}
  catch (Exception $e) {$response=array("status"=>1, "pesan"=>$e->getMessage(), "result"=>'');}}

    



echo json_encode($response);    
?>  