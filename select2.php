<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Malasngoding.com - Membuat Dropdown Search Dengan PHP</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
	<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
	<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
 
	<?php 
	$koneksi = mysqli_connect("localhost","root","","surat");	
	?>
</head>
<body>
	<div class="container-fluid mt-3">	
		<h2>Malasngoding.com - Membuat Dropdown Search Dengan PHP</h2>		
		<form method="POST">
			<select id="nama_lengkap" name="nama_lengkap">
				<?php 
				$data = mysqli_query($koneksi,"select * from data_siswa");
				while($d = mysqli_fetch_array($data)){
					?>
					<option value="<?php echo $d['nama_lengkap'] ?>"><?php echo $d['nama_lengkap'] ?></option>
					<?php
				}
				?>				
			</select>
		</form>		
	</div>
</body>
 
<script type="text/javascript">	
	$(document).ready(function() {
		$('#nama_lengkap').select2();
	});
</script>
</html>