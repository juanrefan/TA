<?php 
  ini_set('error_reporting', E_ALL); ini_set('display_errors', true); session_start(); require_once('plugins/initapp.php');
  if (isset($_GET['menu'])) {$menu=$_GET['menu'];} else {$menu='';}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
	<meta charset="UTF-8"><base href="/">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Sistem Informasi Desa Terpadu">
  <meta name="author" content="Fakultas Teknologi Informasi - Maranatha Christian University">
	<title>Sistem Informasi Desa Cibodas Lembang</title>
  <!-- <script src="https://cdn.tiny.cloud/1/eq90623c225kbt0cpduj0yyc02xmgiaveifz0pjjaccrpd8j/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
  <script>
      tinymce.init({
        selector: 'textarea'
      });
  </script>  -->
	<link rel="shortcut icon" type="image/x-icon" href="images/favicon.png">
<!-- 
	<link rel="stylesheet" type="text/css" href="styles/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="styles/fontawesome.min.css">
  <script type="text/javascript" src="plugins/jquery.min.js"></script>
  <script type="text/javascript" src="plugins/bootstrap.min.js"></script>
  <script type="text/javascript" src="plugins/chart.min.js"></script>
 -->
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
            integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css">     
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js"></script>
  <link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" rel="stylesheet">
  <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" type="text/css" href="styles/design.css"> 

       
</head> 
<body><?php 
  require ('indexhdr.php');
  require ('indexcnt.php');
  require ('indexftr.php');
  
  ?>
</body>
</html> 
 
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
        </script>
    
        <script src="https://code.jquery.com/jquery-3.5.1.js"
            integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
        <script type="text/javascript" src="/desa/tampil.js"></script>                          
<script id="mainScript" type="text/javascript">
// $(document).bind("contextmenu",function(e){return false;});
// document.getElementById('pageScript').innerHTML = "";
// document.getElementById('mainScript').innerHTML = "";
</script>

<script>

function undisableButton() {
  document.getElementById("tanggalSuami").disabled = false;
  
}

function undisablebuttonIstri() {
  document.getElementById("tanggalIstri").disabled = false;
  
}
</script>