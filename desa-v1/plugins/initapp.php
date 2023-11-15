<?php
  date_default_timezone_set('Asia/Jakarta');
  $URLServer = 'http://desa.localhost/services/';
  $userFoto = 'images/userimgs/';
  $docTemplate = 'documents/template/';
  $sldImage = 'images/slides/';

  function get_client_address() {
     if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
       $_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
       $_SERVER['HTTP_CLIENT_IP'] = $_SERVER["HTTP_CF_CONNECTING_IP"];}
     $client  = @$_SERVER['HTTP_CLIENT_IP'];
     $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
     $remote  = $_SERVER['REMOTE_ADDR'];
     if (filter_var($client, FILTER_VALIDATE_IP)) {$ip = $client;}
     elseif (filter_var($forward, FILTER_VALIDATE_IP)) {$ip = $forward;} else {$ip = $remote;}
     return $ip;}               
    
  function validateDate($date, $format = 'Y-m-d H:i:s') {
     $d = DateTime::createFromFormat($format, $date);
     return $d && ($d->format($format) == $date);}
?>      