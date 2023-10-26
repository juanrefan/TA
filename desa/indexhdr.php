<?php
if ((!isset($_SESSION['UYSWEMRKNPAFMPEATW'])) || ($menu == 'Logout')) {
  $_SESSION['IADXPWEONJGTGRULNA']=md5('MK20220001');            $_SESSION['NRAPMEAROWNYLWIVNE']='Tamu';
  $_SESSION['FIORTUOHUCSSEWRYIPT']=$userFoto.'nophoto.gif';     $_SESSION['ATRUESAKKTEHRIJUATT']='';
  $_SESSION['UBSEEDRAROIHGEHITA']=0;                            $_SESSION['UYSWEMRKNPAFMPEATW']=sha1('tmUsrDftAdm'); 
  $_SESSION['KIAYTWAPKBULNWCKIC']=sha1('-jjGSKJDksjs92-sk');    $menu='';}

if ($menu == 'Login') {
  if (isset($_POST['nama'])) {$nama=$_POST['nama'];} else {$nama='';}
  if (isset($_POST['kunci'])) {$pass=$_POST['kunci'];} else {$pass='';}
  $context = stream_context_create(array('http'=>array(   
    'method' => 'POST', 'header'  => "Content-Type: application/json",
    'content' =>json_encode(array('fungsi'=>'LoginCheck', 'nama'=>$nama, 'pass'=>$pass)))));    
  try {       
    $result = json_decode(file_get_contents($URLServer . 'pengguna', false, $context), false);
    if ($result == false || is_null($result) || !is_array($result)) {throw new Exception ('Master User as can not found !');} else {
    if ($result[0]->ErrCode == 1) {throw new Exception ($result[0]->ErrMsg);} else {
      $_SESSION['IADXPWEONJGTGRULNA']=$result[0]->id;               $_SESSION['NRAPMEAROWNYLWIVNE']=$result[0]->nama;
      $_SESSION['FIORTUOHUCSSEWRYIPT']=$userFoto.$result[0]->foto;  $_SESSION['ATRUESAKKTEHRIJUATT']=$result[0]->hak;
      $_SESSION['UBSEEDRAROIHGEHITA']=0;                            $_SESSION['UYSWEMRKNPAFMPEATW']=sha1($nama);
      $_SESSION['KIAYTWAPKBULNWCKIC']=sha1($pass);                  $menu='';}}}
  catch (Exception $e) {echo '<script>alert("' . trim($e->getMessage()) . '")</script>';}}  
?>  
<header>
  <div class="headArea">
    <div class="row">
      <div class="headerArea areaTempat">
        <img class="areaLogo" src="images/logo.png" alt="Desa Cibodas Lembang">
        <div class="areaNama">Website Desa Cibodas Lembang</div>
        <div class="areaKet">Kec. Lembang, Kab. Bandung Barat, Prov. Jawa Barat</div>
      </div>
      <div class="headerArea areaLain">
        <div class="areaSosial">
          <a href="#"><i class="fa-brands fa-facebook-square fa-2x btnSosial"></i></a>
	        <a href="#"><i class="fa-brands fa-twitter-square fa-2x btnSosial"></i></a>
	        <a href="#"><i class="fa-brands fa-pinterest-square fa-2x btnSosial"></i></a>
	        <a href="#"><i class="fa-brands fa-google-plus-square fa-2x btnSosial"></i></a>
	        <a href="#"><i class="fa-brands fa-linkedin-square fa-2x btnSosial"></i></a>
        </div>
        <div class="areaCari">
          <form method="post" action="Berita_Cari">
            <input type="text" name="txtCari" placeholder="Pencarian Berita">
            <input type="submit" name="btnCari" value=" Cari ">
          </form>
        </div>
      </div>
    </div> 
  </div>
  <div class="menuArea"><?php require ('indexmnu.php');?></div>
</header>