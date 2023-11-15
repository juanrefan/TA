<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDarkDropdown" aria-controls="navbarNavDarkDropdown" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
    <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
      <ul class="navbar-nav"><?php
        $context = stream_context_create(array('http'=>array(
          'method' => 'POST', 'header'  => "Content-Type: application/json",
          'content' =>json_encode(array('fungsi'=>'GetMenu', 'keyword'=>'', 'upper'=>md5('000000'), 'status'=>1, 'menu'=>'Beranda', 
					'pengguna'=>$_SESSION['IADXPWEONJGTGRULNA'], 'password'=>$_SESSION['KIAYTWAPKBULNWCKIC'], 'lokasi'=>get_client_address())))));
        try {
      	$result = json_decode(file_get_contents($URLServer . 'system', false, $context),false); 
		
			$result = json_decode(file_get_contents($URLServer . 'system', false, $context),false); 
					if ($result == false || is_null($result) || !is_array($result)) {throw new Exception ('Menu Lists can not connected !');}}
				catch (Exception $e) {echo '<script>alert("' . trim($e->getMessage()) . '")</script>';exit;}
				foreach($result as $menuUtama) {
          $context1 =  stream_context_create(array('http'=>array(
            'method' => 'POST', 'header'  => "Content-Type: application/json",
            'content' =>json_encode(array('fungsi'=>'GetMenu', 'keyword'=>'', 'upper'=>$menuUtama->id, 'status'=>1, 'menu'=>'Beranda',
            'pengguna'=>$_SESSION['IADXPWEONJGTGRULNA'], 'password'=>$_SESSION['KIAYTWAPKBULNWCKIC'], 'lokasi'=>get_client_address())))));
          try {
            $result1 = json_decode(file_get_contents($URLServer . 'system', false, $context1),false);} 
          catch (Exception $e) {echo '<script>alert("' . trim($e->getMessage()) . '")</script>';}
					echo '<li class="nav-item'; if ($result1[0]->ErrCode==0) {echo ' dropdown';} echo '">';
					echo '<a class="nav-link';  if ($result1[0]->ErrCode==0) {echo ' dropdown-toggle';} echo '" ';
					if ($result1[0]->ErrCode==0) {echo 'id="'.$menuUtama->panggil.'" role="button" data-bs-toggle="dropdown" ';}
					echo 'href="'.$menuUtama->panggil.'">'.$menuUtama->judul.'</a>';
          if ($result1[0]->ErrCode==0) {
						echo '<ul class="dropdown-menu dropdown-menu-light" aria-labelledby="'.$menuUtama->panggil.'">';
            foreach ($result1 as $menuAnak) {echo '<li><a class="dropdown-item" href="'.$menuAnak->panggil.'">'.$menuAnak->judul.'</a></li>';}
						echo '</ul>';}
					echo '</li>';}?>
      </ul>
			<div class="navbar-nav ms-auto">
				<?php if ($_SESSION['IADXPWEONJGTGRULNA']==md5('MK20220001')) {?>
			  <div class="nav-item dropdown loginArea">
				  <a class="nav-link dropdown-toggle" href="#" id="userLogin" role="button" data-bs-toggle="dropdown" aria-expanded="false">Login </a>
				  <div class="dropdown-menu loginForm" aria-labelledby="userLogin">
            <form action="Login" method="post">
				<!-- <form action="controller/proseslogin.php" method="POST"> -->
						  <div class="form-group">
							<input type="text" name="nama" class="form-control" placeholder="Nama akun pengguna" required>
						</div>
						  <div class="form-group">
							<input type="password" name="kunci" class="form-control" placeholder="Kata kunci pengguna" required>
						</div>
              <div class="form-group">
					<input type="submit" name="submit" class="btn btn-primary btn-block" value="Login"></div>

              <div class="row"><div class="col"><a href="Forget">Lupa Kata Kunci</a></div><div class="col" style="text-align:right"><a href="Register">Daftar Baru</a></div></div>
					  </form>
				  </div>
			  </div>
        <?php } else {?>
			  <a href="Berita_Surel" class="nav-item nav-link messages"><i class="fa fa-envelope"></i><span class="badge surel"><?php
 				$context = stream_context_create(array('http'=>array(
					'method' => 'POST', 'header'  => "Content-Type: application/json",
					'content' =>json_encode(array('fungsi'=>'GetPesanMember', 
					  'keyword'=>'', 'jenis'=>md5('0000'), 'kelompok'=>'', 'penerima'=>$_SESSION['IADXPWEONJGTGRULNA'], 'status'=>0, 'menu'=>'Beranda', 
						'pengguna'=>$_SESSION['IADXPWEONJGTGRULNA'], 'password'=>$_SESSION['KIAYTWAPKBULNWCKIC'], 'lokasi'=>get_client_address())))));
				try {
					$result = json_decode(file_get_contents($URLServer . 'pengguna', false, $context),false); 
					if ($result == false || is_null($result) || !is_array($result)) {throw new Exception ('Member Messages can not connected !');} else {
					if ($result[0]->ErrCode==1) {echo 0;} else {echo count($result);}}}
				catch (Exception $e) {echo '<script>alert("' . trim($e->getMessage()) . '")</script>';}?>
				</span></a>
			  <div class="nav-item dropdown memberArea">
				  <a class="nav-link dropdown-toggle" href="#" id="userOption" role="button" data-bs-toggle="dropdown" aria-expanded="false">
					  <img src="<?php echo $_SESSION['FIORTUOHUCSSEWRYIPT'];?>"><?php echo $_SESSION['NRAPMEAROWNYLWIVNE'];?> <b class="caret"></b></a>
				  <div class="dropdown-menu memberForm" aria-labelledby="userOption">
					  <a href="Profile" class="dropdown-item"><i class="fa fa-user"></i> Profile</a></a>
					  <a href="Logout" class="dropdown-item"><i class="fa fa-sign-out"></i> Logout</a></a>
				  </div>
			  </div>
        <?php } ?>
      </div>
    </div>
  </div>
</nav>