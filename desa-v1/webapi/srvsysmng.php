<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
require_once ('dbwbsrv.php'); $conn = new Database(); $result = $conn->check_connection();
if ($result['ErrCode']==1) {echo json_encode($result);} else {$data = json_decode(file_get_contents("php://input"),false); 

/* Menu Management System */
if ($data->fungsi == 'GetMenu') {
  $result = $conn->execute_sp('menuGet', array('keyword'=>htmlspecialchars(trim($data->keyword), ENT_QUOTES), 
            'upper'=>htmlspecialchars(trim($data->upper), ENT_QUOTES), 'status'=>htmlspecialchars(trim($data->status), ENT_QUOTES), 
            'menu'=>htmlspecialchars(trim($data->menu), ENT_QUOTES), 'pengguna'=>htmlspecialchars(trim($data->pengguna), ENT_QUOTES), 
            'password'=>htmlspecialchars(trim($data->password), ENT_QUOTES), 'lokasi'=>htmlspecialchars(trim($data->lokasi), ENT_QUOTES)));}
if ($data->fungsi == 'GetMenuFile') {
  $result = $conn->execute_sp('menuLink', array('menu'=>htmlspecialchars(trim($data->menu), ENT_QUOTES), 
            'pengguna'=>htmlspecialchars(trim($data->pengguna), ENT_QUOTES), 'password'=>htmlspecialchars(trim($data->password), ENT_QUOTES), 
            'lokasi'=>htmlspecialchars(trim($data->lokasi), ENT_QUOTES)));}



echo json_encode($result);}
?> 