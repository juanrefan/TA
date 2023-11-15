<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script type="text/javascript" src="../chartjs/Chart.js"></script>
	<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
	<link rel="stylesheet" href="/resources/demos/style.css">
	<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
	<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
	
	<script>
		$( function() {
			$( "#datepicker1" ).datepicker({dateFormat: "yy-mm-dd" }).val();
			
		} );

		$( function() {
			$( "#datepicker2" ).datepicker({dateFormat: "yy-mm-dd" }).val();;
			
		} );
  </script>
</head>
<body>
	<style type="text/css">
	body{
		font-family: roboto;
	}

	table{
		margin: 0px auto;
	}
	</style>


	<?php 
	include 'controller/util.php';
	?>

	<div style="width: 800px;margin: 0px auto;">
		<canvas id="myChart"></canvas>
	</div>

	<br/>
	<br/>

<div class="container">
	<div class="row">
		<center>
		<div class="col-md-3">
			<form action="" method="POST" class="form">
				<div class="form-group">
					<label for="">Tanggal Awal</label>
					<input type="text" name="tgl_awal" class="form-control" id="datepicker1" value = "<?php $today = date('Y-m-d');
$newdate = date('Y-m-d', strtotime('-1 months', strtotime($today))); 
echo $newdate;?>">
					<small>Tanggal Awal</small>
				</div>
				<div class="form-group">
					<label for="">Tanggal Akhir</label>
					
					<input type="text" name="tgl_akhir"  class="form-control" id="datepicker2" value = "<?php echo date('Y-m-d')?>">
					<small>Tanggal Awal</small>
				</div>
				<div class="form-group">
					<input type="submit" class="btn btn-primary" value="Get Filter">
				</div>
			</form>
		</div>
		</center>
		<center>
		<div class="col-md-7">
			<caption><b><h3>Data Pengajuan Sertifikat</h3></b></caption>
			<?php
			// echo $_POST['tgl_awal'];
			// echo "<br>";
			// echo $_POST['tgl_akhir'];
           
			?>
			<table border="1" class="table table-striped">
				<thead class="thead-dark">
					<tr>
						<th>No</th>
						<th>No_Reg</th>
						<th>Nama Pemohon</th>
						<th>letter C</th>
						<th>Status</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					$no = 1;
					$data = mysqli_query($conn,"select * from tbsertifikat");
					while($d=mysqli_fetch_array($data)){
						?>
						<tr>
							<td><?php echo $no++; ?></td>
							<td><?php echo $d['no_reg']; ?></td>
							<td><?php echo $d['first_name']; ?></td>
							<td><?php echo $d['no_c_desa']; ?></td>
							<td><?php echo $d['status_pengajuan']; ?></td>
						</tr>
						<?php 
					}
					?>
				</tbody>
			</table>
		</div>
		</center>
	</div>
</div>
   
	<script>
		
		var ctx = document.getElementById("myChart").getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'bar',
			data: {
				labels: ["Diterima", "Ditolak"],
				datasets: [{
					label: '',
					data: [
					<?php 
                    
					$tgl_awal = $_POST['tgl_awal'];
                    $tgl_akhir = $_POST['tgl_akhir'];
                    
                        $diterima = mysqli_query($conn,"SELECT * FROM tbsertifikat 
                        WHERE tanggal BETWEEN '$tgl_awal' AND '$tgl_akhir' AND  status_pengajuan='Diterima'");
                        echo mysqli_num_rows($diterima);
                    
					
					?>, 
					<?php 
                   
                        $ditolak = mysqli_query($conn,"SELECT * FROM tbsertifikat 
                        WHERE tanggal BETWEEN '$tgl_awal' AND '$tgl_akhir' AND  status_pengajuan='Ditolak'");
                        echo mysqli_num_rows($ditolak);
                   
                      
                    
					?>
					],
					backgroundColor: [
					'rgba(255, 99, 132, 0.2)',
					'rgba(54, 162, 235, 0.2)',
					'rgba(255, 206, 86, 0.2)',
					'rgba(75, 192, 192, 0.2)'
					],
					borderColor: [
					'rgba(255,99,132,1)',
					'rgba(54, 162, 235, 1)',
					'rgba(255, 206, 86, 1)',
					'rgba(75, 192, 192, 1)'
					],
					borderWidth: 1
				}]
			},
			options: {
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero:true
						}
					}]
				}
			}
		});
	</script>
</body>
</html>