<?php $indikator=''; $slider=''; $banyak=0; $tampil=0;
$context = stream_context_create(array('http'=>array(  
  'method' => 'POST', 'header'  => "Content-Type: application/json",
  'content' =>json_encode(array('fungsi'=>'GetImageSlider', 'keyword'=>'', 'status'=>1, 'menu'=>$menu, 'pengguna'=>$_SESSION['IADXPWEONJGTGRULNA'],
  'password'=>$_SESSION['KIAYTWAPKBULNWCKIC'], 'lokasi'=>get_client_address())))));     
try {
  $result = json_decode(file_get_contents($URLServer . 'desa', false, $context), false);
  if ($result == false || is_null($result) || !is_array($result)) {throw new Exception('Running Text not connected !');} else {
  if ($result[0]->ErrCode==0) {$tampil=1; foreach($result as $hasil) {if (file_exists($sldImage.$hasil->gambar)) {
    $indikator.='<button type="button" data-bs-target="#carouselItem" data-bs-slide-to="'.$banyak.'" '; if ($banyak==0) {$indikator.='class="active" ';} $indikator.='aria-label="Slide '.$banyak.'"></button>';
    $slider.='<div class="carousel-item'; if ($banyak==0) {$slider.=' active';} $slider.='">';
    if (trim($hasil->link)!='') {$slider.='<a href="'.$hasil->link.'">';}
    $slider.='<img src="'.$sldImage.$hasil->gambar.'" class="d-block w-100">';
    $slider.='<div class="carousel-caption d-none d-md-block"><h5>'.$hasil->teks.'</h5></div>';
    if (trim($hasil->link)!='') {$slider.='</a>';}
    $slider.='</div>';} 
    $banyak++;}}}}
catch (Exception $e) {echo '<script>alert("' . trim($e->getMessage()) . '")</script>';}
if ($tampil==1) {?>
<section class="carouselArea">
  <div id="carouselItem" class="carousel slide carousel-fade" data-bs-ride="carousel">
    <div class="carousel-indicators"><?php echo $indikator;?></div>
    <div class="carousel-inner"><?php echo $slider;?></div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselItem" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselItem" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
</section>
<?php } ?>