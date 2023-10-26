<div class="contentArea"><?php 
  $context = stream_context_create(array('http'=>array(  
    'method' => 'POST',
    'header'  => "Content-Type: application/json",
    'content' =>json_encode(array(
      'fungsi'=>'GetMenuFile',
      'menu'=>$menu,
      'pengguna'=>$_SESSION['IADXPWEONJGTGRULNA'],
      'password'=>$_SESSION['KIAYTWAPKBULNWCKIC'],
      'lokasi'=>get_client_address())))));     
  try {
    $result = json_decode(file_get_contents($URLServer . 'system', false, $context), false); 
    if ($result == false || is_null($result) || !is_array($result)) {throw new Exception('Master Menu not connected !');} else {
    if ($result[0]->ErrCode==0) {$menu=$result[0]->trans; $targetFile=$result[0]->link; $hakFile=$result[0]->hakPengguna;} else {$menu=''; $targetFile='404.html'; $hakFile=0;}}
    $_SESSION['UBSEEDRAROIHGEHITA']=$hakFile; if (file_exists($targetFile)) {require($targetFile);} else {require('404.html');}}
  catch (Exception $e) {echo '<script>alert("' . trim($e->getMessage()) . '")</script>';}?>
</div>