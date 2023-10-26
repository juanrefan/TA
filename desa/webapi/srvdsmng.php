<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
require_once ('dbwbsrv.php'); $conn = new Database(); $result = $conn->check_connection();
if ($result['ErrCode']==1) {echo json_encode($result);} else {$data = json_decode(file_get_contents("php://input"),false); 

/* Running Teks Management System */
if ($data->fungsi == 'GetRunningTeks') {
  $result = $conn->execute_sp('runningGet', array('keyword'=>htmlspecialchars(trim($data->keyword), ENT_QUOTES), 
            'status'=>htmlspecialchars(trim($data->status), ENT_QUOTES), 'menu'=>htmlspecialchars(trim($data->menu), ENT_QUOTES), 
            'pengguna'=>htmlspecialchars(trim($data->pengguna), ENT_QUOTES), 'password'=>htmlspecialchars(trim($data->password), ENT_QUOTES), 
            'lokasi'=>htmlspecialchars(trim($data->lokasi), ENT_QUOTES)));}
if ($data->fungsi == 'SetRunningTeks') {
  $result = $conn->execute_sp('runningSet', array('keyword'=>htmlspecialchars(trim($data->keyword), ENT_QUOTES),
            'isi'=>htmlspecialchars(trim($data->isi), ENT_QUOTES), 'mulai'=>htmlspecialchars(trim($data->mulai), ENT_QUOTES),
            'akhir'=>htmlspecialchars(trim($data->akhir), ENT_QUOTES), 'status'=>htmlspecialchars(trim($data->status), ENT_QUOTES), 
            'menu'=>htmlspecialchars(trim($data->menu), ENT_QUOTES), 'pengguna'=>htmlspecialchars(trim($data->pengguna), ENT_QUOTES), 
            'password'=>htmlspecialchars(trim($data->password), ENT_QUOTES), 'lokasi'=>htmlspecialchars(trim($data->lokasi), ENT_QUOTES)));}
if ($data->fungsi == 'DelRunningTeks') {
  $result = $conn->execute_sp('runningDel', array('keyword'=>htmlspecialchars(trim($data->keyword), ENT_QUOTES), 
            'menu'=>htmlspecialchars(trim($data->menu), ENT_QUOTES), 'pengguna'=>htmlspecialchars(trim($data->pengguna), ENT_QUOTES), 
            'password'=>htmlspecialchars(trim($data->password), ENT_QUOTES), 'lokasi'=>htmlspecialchars(trim($data->lokasi), ENT_QUOTES)));}

/* Slider Management System */
if ($data->fungsi == 'GetImageSlider') {
  $result = $conn->execute_sp('sliderGet', array('keyword'=>htmlspecialchars(trim($data->keyword), ENT_QUOTES), 
            'status'=>htmlspecialchars(trim($data->status), ENT_QUOTES), 'menu'=>htmlspecialchars(trim($data->menu), ENT_QUOTES), 
            'pengguna'=>htmlspecialchars(trim($data->pengguna), ENT_QUOTES), 'password'=>htmlspecialchars(trim($data->password), ENT_QUOTES), 
            'lokasi'=>htmlspecialchars(trim($data->lokasi), ENT_QUOTES)));}





echo json_encode($result);}
?>     