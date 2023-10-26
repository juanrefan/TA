<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
require_once ('dbwbsrv.php'); $conn = new Database(); $result = $conn->check_connection();
if ($result['ErrCode']==1) {echo json_encode($result);} else {$data = json_decode(file_get_contents("php://input"),false); 


/* User Management System */
if ($data->fungsi == 'LoginCheck') {
  $result = $conn->execute_sp('penggunaLogin', array("user"=>htmlspecialchars(trim($data->nama), ENT_QUOTES), "pass"=>htmlspecialchars(trim($data->pass), ENT_QUOTES)));}

    
/* User Message System */

if ($data->fungsi == 'GetPesanMember') {
  $result = $conn->execute_sp('pesanGet', array('keyword'=>htmlspecialchars(trim($data->keyword), ENT_QUOTES), 
            'jenis'=>htmlspecialchars(trim($data->jenis), ENT_QUOTES), 'kelompok'=>htmlspecialchars(trim($data->kelompok), ENT_QUOTES),
            'penerima'=>htmlspecialchars(trim($data->penerima), ENT_QUOTES), 'status'=>htmlspecialchars(trim($data->status), ENT_QUOTES), 
            'menu'=>htmlspecialchars(trim($data->menu), ENT_QUOTES), 'pengguna'=>htmlspecialchars(trim($data->pengguna), ENT_QUOTES), 
            'password'=>htmlspecialchars(trim($data->password), ENT_QUOTES), 'lokasi'=>htmlspecialchars(trim($data->lokasi), ENT_QUOTES)));}




echo json_encode($result);}
?>    