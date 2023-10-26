<?php
$context = stream_context_create(array('http'=>array(  
  'method' => 'POST', 'header'  => "Content-Type: application/json",
  'content' =>json_encode(array('fungsi'=>'GetRunningTeks', 'keyword'=>'', 'status'=>1, 'menu'=>$menu, 'pengguna'=>$_SESSION['IADXPWEONJGTGRULNA'],
    'password'=>$_SESSION['KIAYTWAPKBULNWCKIC'], 'lokasi'=>get_client_address())))));     
try {
  $result = json_decode(file_get_contents($URLServer . 'desa', false, $context), false);
  if ($result == false || is_null($result) || !is_array($result)) {throw new Exception('Running Text not connected !');} else {
  if ($result[0]->ErrCode==0) {echo '<section class="runningTeks"><marquee>'; $posisi=0;
  foreach($result as $pesan) {echo $pesan->teks; $posisi++; if ($posisi < count($result)) {echo '&nbsp;&nbsp;&nbsp;--&nbsp;&nbsp;&nbsp;';}}
  echo '</marquee></section>';}}}
catch (Exception $e) {echo '<script>alert("' . trim($e->getMessage()) . '")</script>';}?>