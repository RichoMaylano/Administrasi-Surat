<?php
include "../database.php";
$que = mysqli_query($db_conn, "SELECT * FROM data_konfig");
$hsl = mysqli_fetch_array($que);
$timestamp = strtotime($hsl['tgl_pengumuman']);
//echo $timestamp;

?>
<!DOCTYPE html>
<html>
<head>
    <!-- Favicons -->
	<link href="../SMKN7.png" rel="icon">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="aplikasi sederhana untuk menampilkan pengumuman hasil ujian nasional secara online">
    <meta name="author" content="slamet.bsan@gmail.com">
    <title>Pengumuman Kelulusan</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/jasny-bootstrap.min.css" rel="stylesheet">
	<link href="../css/kelulusan.css" rel="stylesheet">


	
</head>

<body>
                
	<div class="row" >
		<table class="table">
			<tr>
				<td align="center">
					<br><br><br>
					<img src="../SMKN7.png"  height="116" />
					<h3><b><?php echo $hsl['sekolah']; ?></b></h3>
					<p>PENGUMUMAN KELULUSAN <?=$hsl['tahun'] ?></p></td>
			</tr>
		</table>
	</div>	

    
    <div class="container" >
		<!-- countdown -->
		
		<div id="clock" class="lead"></div>
		
		<div id="xpengumuman">
		<?php
		if(isset($_REQUEST['submit'])){
			//tampilkan hasil queri jika ada
			$nisn = $_REQUEST['nomor'];
			
			$hasil = mysqli_query($db_conn,"SELECT * FROM data_siswa WHERE nisn='$nisn'");
			if(mysqli_num_rows($hasil) > 0){
				$data = mysqli_fetch_array($hasil);
				
		?>
			<table class="table table-bordered">
				<tr><td width=35%>Nama Siswa</td><td><?php echo $data['nama']; ?></td></tr>
				<tr><td>NISN</td><td><?php echo $data['nisn']; ?></td></tr>
				<tr><td>Kompetensi Keahlian</td><td><?php echo $data['jurusan']; ?></td></tr>
				<tr><td>Tempat, Tanggal lahir</td><td><?php echo $data['tempat_lahir'].', '.$data['tanggal_lahir']; ?></td></tr>
				<tr><td>Nama Orang tua/Wali</td><td><?php echo $data['kelas']; ?></td></tr>
				<tr><td>Jenis Kelamin</td><td><?php echo $data['jk']; ?></td></tr>
			<?php
				if( $data['no_ujian'] == !"" ){
					echo '<tr><td>Nomor Ujian</td><td>'.$data['no_ujian'].'</td></tr>';
				}
			?>		
			</table>
			
			<?php
				if( $data['agama'] == "" and $data['ppkn'] == "" and $data['bindo'] == "" and $data['mm'] == ""){
					echo '<br/>';
				
				}
				else if($data['jurusan'] == "Multimedia"){
			?>		
					<table class="table table-bordered">
						<tr><td><b>Mata Pelajaran</b></td><td align="center"><b>Nilai rata-rata</b></td></tr>
						<tr><td style="border:none"><b>A. Muatan Nasional</b></td></tr>
						<tr><td>1. Pendidikan Agama dan Budi Pekerti</td><td align="center"><?php echo $data['agama']; ?></td></tr>
						<tr><td>2. Pendidikan Pancasila dan Kewarganegaraan</td><td align="center"><?php echo $data['ppkn']; ?></td></tr>
						<tr><td>3. Bahasa Indonesia</td><td align="center"><?php echo $data['bindo']; ?></td></tr>
						<tr><td>4. Matematika</td><td align="center"><?php echo $data['mm']; ?></td></tr>
						<tr><td>5. Sejarah Indonesia</td><td align="center"><?php echo $data['sejarah']; ?></td></tr>
						<tr><td>6. Bahasa Inggris dan Bahasa Asing Lainnya</td><td align="center"><?php echo $data['bing']; ?></td></tr>
						<tr><td style="border:none"><b>B. Muatan Kewilayahan</b></td></tr>
						<tr><td>1. Seni Budaya</td><td align="center"><?php echo $data['senbud']; ?></td></tr>
						<tr><td>2. Pendidikan Jasmani, Olahraga dan Kesehatan</td><td align="center"><?php echo $data['penjas']; ?></td></tr>
						<tr><td>3. Bahasa Jawa</td><td align="center"><?php echo $data['jawa']; ?></td></tr>
						<tr><td style="border:none"><b>C. Muatan Peminatan Kejuruan</b></td></tr>
						<tr><td>1. Simulasi dan Komunikasi Digital</td><td align="center"><?php echo $data['sisdig']; ?></td></tr>
						<tr><td>2. Fisika</td><td align="center"><?php echo $data['fisika']; ?></td></tr>
						<tr><td>3. Kimia</td><td align="center"><?php echo $data['kimia']; ?></td></tr>
						<tr><td>4. Dasar Program Keahlian</td><td align="center"><?php echo $data['dasprog']; ?></td></tr>
						<tr><td>5. Kompetensi Keahlian</td><td align="center"><?php echo $data['kompetensi']; ?></td></tr>
						<tr><td><b>Rata-rata</b></td><td align="center"><b><?php echo $data['rata_rata']; ?></b></td></tr>
					</table>
			<?php 
				} else if($data['jurusan'] == "Tata Boga"){
			?>

					<table class="table table-bordered">
						<tr><td><b>Mata Pelajaran</b></td><td align="center"><b>Nilai rata-rata</b></td></tr>
						<tr><td style="border:none"><b>A. Muatan Nasional</b></td></tr>
						<tr><td>1. Pendidikan Agama dan Budi Pekerti</td><td align="center"><?php echo $data['agama']; ?></td></tr>
						<tr><td>2. Pendidikan Pancasila dan Kewarganegaraan</td><td align="center"><?php echo $data['ppkn']; ?></td></tr>
						<tr><td>3. Bahasa Indonesia</td><td align="center"><?php echo $data['bindo']; ?></td></tr>
						<tr><td>4. Matematika</td><td align="center"><?php echo $data['mm']; ?></td></tr>
						<tr><td>5. Sejarah Indonesia</td><td align="center"><?php echo $data['sejarah']; ?></td></tr>
						<tr><td>6. Bahasa Inggris dan Bahasa Asing Lainnya</td><td align="center"><?php echo $data['bing']; ?></td></tr>
						<tr><td style="border:none"><b>B. Muatan Kewilayahan</b></td></tr>
						<tr><td>1. Seni Budaya</td><td align="center"><?php echo $data['senbud']; ?></td></tr>
						<tr><td>2. Pendidikan Jasmani, Olahraga dan Kesehatan</td><td align="center"><?php echo $data['penjas']; ?></td></tr>
						<tr><td>3. Bahasa Jawa</td><td align="center"><?php echo $data['jawa']; ?></td></tr>
						<tr><td style="border:none"><b>C. Muatan Peminatan Kejuruan</b></td></tr>
						<tr><td>1. Simulasi dan Komunikasi Digital</td><td align="center"><?php echo $data['sisdig']; ?></td></tr>
						<tr><td>2. IPA Terapan</td><td align="center"><?php echo $data['ipa']; ?></td></tr>
						<tr><td>3. Kepariwisataan</td><td align="center"><?php echo $data['pariwisata']; ?></td></tr>
						<tr><td>4. Dasar Program Keahlian</td><td align="center"><?php echo $data['dasprog']; ?></td></tr>
						<tr><td>5. Kompetensi Keahlian</td><td align="center"><?php echo $data['kompetensi']; ?></td></tr>
						<tr><td><b>Rata-rata</b></td><td align="center"><b><?php echo $data['rata_rata']; ?></b></td></tr>
					</table>
			<?php
				} else if($data['jurusan'] == "Usaha Perjalanan Wisata"){
			?>

					<table class="table table-bordered">
						<tr><td><b>Mata Pelajaran</b></td><td align="center"><b>Nilai rata-rata</b></td></tr>
						<tr><td style="border:none"><b>A. Muatan Nasional</b></td></tr>
						<tr><td>1. Pendidikan Agama dan Budi Pekerti</td><td align="center"><?php echo $data['agama']; ?></td></tr>
						<tr><td>2. Pendidikan Pancasila dan Kewarganegaraan</td><td align="center"><?php echo $data['ppkn']; ?></td></tr>
						<tr><td>3. Bahasa Indonesia</td><td align="center"><?php echo $data['bindo']; ?></td></tr>
						<tr><td>4. Matematika</td><td align="center"><?php echo $data['mm']; ?></td></tr>
						<tr><td>5. Sejarah Indonesia</td><td align="center"><?php echo $data['sejarah']; ?></td></tr>
						<tr><td>6. Bahasa Inggris dan Bahasa Asing Lainnya</td><td align="center"><?php echo $data['bing']; ?></td></tr>
						<tr><td style="border:none"><b>B. Muatan Kewilayahan</b></td></tr>
						<tr><td>1. Seni Budaya</td><td align="center"><?php echo $data['senbud']; ?></td></tr>
						<tr><td>2. Pendidikan Jasmani, Olahraga dan Kesehatan</td><td align="center"><?php echo $data['penjas']; ?></td></tr>
						<tr><td>3. Bahasa Jawa</td><td align="center"><?php echo $data['jawa']; ?></td></tr>
						<tr><td style="border:none"><b>C. Muatan Peminatan Kejuruan</b></td></tr>
						<tr><td>1. Simulasi dan Komunikasi Digital</td><td align="center"><?php echo $data['sisdig']; ?></td></tr>
						<tr><td>2. IPA Terapan</td><td align="center"><?php echo $data['ipa']; ?></td></tr>
						<tr><td>3. Kepariwisataan</td><td align="center"><?php echo $data['pariwisata']; ?></td></tr>
						<tr><td>4. Dasar Program Keahlian</td><td align="center"><?php echo $data['dasprog']; ?></td></tr>
						<tr><td>5. Kompetensi Keahlian</td><td align="center"><?php echo $data['kompetensi']; ?></td></tr>
						<tr><td><b>Rata-rata</b></td><td align="center"><b><?php echo $data['rata_rata']; ?></b></td></tr>
					</table>
			<?php
				} else if($data['jurusan'] == "Perhotelan"){
			?>

			<table class="table table-bordered">
						<tr><td><b>Mata Pelajaran</b></td><td align="center"><b>Nilai rata-rata</b></td></tr>
						<tr><td style="border:none"><b>A. Muatan Nasional</b></td></tr>
						<tr><td>1. Pendidikan Agama dan Budi Pekerti</td><td align="center"><?php echo $data['agama']; ?></td></tr>
						<tr><td>2. Pendidikan Pancasila dan Kewarganegaraan</td><td align="center"><?php echo $data['ppkn']; ?></td></tr>
						<tr><td>3. Bahasa Indonesia</td><td align="center"><?php echo $data['bindo']; ?></td></tr>
						<tr><td>4. Matematika</td><td align="center"><?php echo $data['mm']; ?></td></tr>
						<tr><td>5. Sejarah Indonesia</td><td align="center"><?php echo $data['sejarah']; ?></td></tr>
						<tr><td>6. Bahasa Inggris dan Bahasa Asing Lainnya</td><td align="center"><?php echo $data['bing']; ?></td></tr>
						<tr><td style="border:none"><b>B. Muatan Kewilayahan</b></td></tr>
						<tr><td>1. Seni Budaya</td><td align="center"><?php echo $data['senbud']; ?></td></tr>
						<tr><td>2. Pendidikan Jasmani, Olahraga dan Kesehatan</td><td align="center"><?php echo $data['penjas']; ?></td></tr>
						<tr><td>3. Bahasa Jawa</td><td align="center"><?php echo $data['jawa']; ?></td></tr>
						<tr><td style="border:none"><b>C. Muatan Peminatan Kejuruan</b></td></tr>
						<tr><td>1. Simulasi dan Komunikasi Digital</td><td align="center"><?php echo $data['sisdig']; ?></td></tr>
						<tr><td>2. IPA Terapan</td><td align="center"><?php echo $data['ipa']; ?></td></tr>
						<tr><td>3. Kepariwisataan</td><td align="center"><?php echo $data['pariwisata']; ?></td></tr>
						<tr><td>4. Dasar Program Keahlian</td><td align="center"><?php echo $data['dasprog']; ?></td></tr>
						<tr><td>5. Kompetensi Keahlian</td><td align="center"><?php echo $data['kompetensi']; ?></td></tr>
						<tr><td><b>Rata-rata</b></td><td align="center"><b><?php echo $data['rata_rata']; ?></b></td></tr>
					</table>

				<?php
				} else if($data['jurusan'] == "Keperawatan Sosial"){
				?>

				<table class="table table-bordered">
						<tr><td><b>Mata Pelajaran</b></td><td align="center"><b>Nilai rata-rata</b></td></tr>
						<tr><td style="border:none"><b>A. Muatan Nasional</b></td></tr>
						<tr><td>1. Pendidikan Agama dan Budi Pekerti</td><td align="center"><?php echo $data['agama']; ?></td></tr>
						<tr><td>2. Pendidikan Pancasila dan Kewarganegaraan</td><td align="center"><?php echo $data['ppkn']; ?></td></tr>
						<tr><td>3. Bahasa Indonesia</td><td align="center"><?php echo $data['bindo']; ?></td></tr>
						<tr><td>4. Matematika</td><td align="center"><?php echo $data['mm']; ?></td></tr>
						<tr><td>5. Sejarah Indonesia</td><td align="center"><?php echo $data['sejarah']; ?></td></tr>
						<tr><td>6. Bahasa Inggris dan Bahasa Asing Lainnya</td><td align="center"><?php echo $data['bing']; ?></td></tr>
						<tr><td style="border:none"><b>B. Muatan Kewilayahan</b></td></tr>
						<tr><td>1. Seni Budaya</td><td align="center"><?php echo $data['senbud']; ?></td></tr>
						<tr><td>2. Pendidikan Jasmani, Olahraga dan Kesehatan</td><td align="center"><?php echo $data['penjas']; ?></td></tr>
						<tr><td>3. Bahasa Jawa</td><td align="center"><?php echo $data['jawa']; ?></td></tr>
						<tr><td style="border:none"><b>C. Muatan Peminatan Kejuruan</b></td></tr>
						<tr><td>1. Simulasi dan Komunikasi Digital</td><td align="center"><?php echo $data['sisdig']; ?></td></tr>
						<tr><td>2. Psikologi</td><td align="center"><?php echo $data['psikologi']; ?></td></tr>
						<tr><td>3. Sosiologi</td><td align="center"><?php echo $data['sosiologi']; ?></td></tr>
						<tr><td>4. Antropologi</td><td align="center"><?php echo $data['antropologi']; ?></td></tr>
						<tr><td>5. Biologi</td><td align="center"><?php echo $data['biologi']; ?></td></tr>
						<tr><td>6. Dasar Program Keahlian</td><td align="center"><?php echo $data['dasprog']; ?></td></tr>
						<tr><td>7. Kompetensi Keahlian</td><td align="center"><?php echo $data['kompetensi']; ?></td></tr>
						<tr><td><b>Rata-rata</b></td><td align="center"><b><?php echo $data['rata_rata']; ?></b></td></tr>
					</table>

					<?php
					} else if($data['jurusan'] == "Produksi dan Siaran Program Televisi"){
					?>

					<table class="table table-bordered">
						<tr><td><b>Mata Pelajaran</b></td><td align="center"><b>Nilai rata-rata</b></td></tr>
						<tr><td style="border:none"><b>A. Muatan Nasional</b></td></tr>
						<tr><td>1. Pendidikan Agama dan Budi Pekerti</td><td align="center"><?php echo $data['agama']; ?></td></tr>
						<tr><td>2. Pendidikan Pancasila dan Kewarganegaraan</td><td align="center"><?php echo $data['ppkn']; ?></td></tr>
						<tr><td>3. Bahasa Indonesia</td><td align="center"><?php echo $data['bindo']; ?></td></tr>
						<tr><td>4. Matematika</td><td align="center"><?php echo $data['mm']; ?></td></tr>
						<tr><td>5. Sejarah Indonesia</td><td align="center"><?php echo $data['sejarah']; ?></td></tr>
						<tr><td>6. Bahasa Inggris dan Bahasa Asing Lainnya</td><td align="center"><?php echo $data['bing']; ?></td></tr>
						<tr><td style="border:none"><b>B. Muatan Kewilayahan</b></td></tr>
						<tr><td>1. Seni Budaya</td><td align="center"><?php echo $data['senbud']; ?></td></tr>
						<tr><td>2. Pendidikan Jasmani, Olahraga dan Kesehatan</td><td align="center"><?php echo $data['penjas']; ?></td></tr>
						<tr><td>3. Bahasa Jawa</td><td align="center"><?php echo $data['jawa']; ?></td></tr>
						<tr><td style="border:none"><b>C. Muatan Peminatan Kejuruan</b></td></tr>
						<tr><td>1. Simulasi dan Komunikasi Digital</td><td align="center"><?php echo $data['sisdig']; ?></td></tr>
						<tr><td>2. Dasar-Dasar Kreatifitas</td><td align="center"><?php echo $data['kreatif']; ?></td></tr>
						<tr><td>3. Tinjauan Seni</td><td align="center"><?php echo $data['seni']; ?></td></tr>
						<tr><td>4. Dasar Program Keahlian</td><td align="center"><?php echo $data['dasprog']; ?></td></tr>
						<tr><td>5. Kompetensi Keahlian</td><td align="center"><?php echo $data['kompetensi']; ?></td></tr>
						<tr><td><b>Rata-rata</b></td><td align="center"><b><?php echo $data['rata_rata']; ?></b></td></tr>
					</table>

					<?php
					}
					?>

			
			<?php
			//tampilkan status lulus atau tidak lulus 
			if( $data['status'] == 1 ){
				echo '<div class="alert alert-success" role="alert"><strong>SELAMAT !</strong> Anda dinyatakan LULUS.</div>';
			} else {
				echo '<div class="alert alert-danger" role="alert"><strong>MAAF !</strong> Anda dinyatakan TIDAK LULUS.</div>';
			}				
			echo '<a href="cetakskl.php?nisn='.$data['nisn'].'"><button class="btn btn-primary" style="width:100%"> Cetak Surat Keterangan Lulus</button></a> <p></p>';
			
			
			?>
			
		<?php
			} else {
				echo '<p>NISN yang anda inputkan tidak ditemukan! Periksa kembali NISN Anda.</p><br />';
				echo '<p><a href="index.php"><button class="btn btn-primary" style="width:100%"> Kembali</button></a> </p>';
				//tampilkan pop-up dan kembali tampilkan form
			}
		} else {
			//tampilkan form input nomor ujian                            data-mask="23-101-999-9"
		?>
        <p>Masukkan Nomor Induk Siswa Nasional (NISN) di bawah ini.</p>
        
        <form method="post">
            <div class="input-group">
                <input type="text" name="nomor" class="form-control"  placeholder="Ketikkan NISN Anda di sini" required>
                <span class="input-group-btn">
                    <button class="btn btn-primary" type="submit" name="submit">Periksa!</button>
                </span>
            </div>
        </form>
		<?php
		}
		?>
		</div>
    </div><!-- /.container -->
	
	<footer class="footer">
		<div class="container">
			<center><p class="text-muted">&copy; <?=$hsl['tahun'] ?> &middot; <?=$hsl['sekolah'] ?></p></center>
		</div>
	</footer>
    
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="../js/jquery.min.js"></script>
    <script src="../js/jquery.countdown.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
	<script src="../js/jasny-bootstrap.min.js"></script>
	<script type="text/javascript">
	var skrg = Date.now();
	$('#clock').countdown("<?=$hsl['tgl_pengumuman'] ?>", {elapse: true})
	.on('update.countdown', function(event) {
	var $this = $(this);
	if (event.elapsed) {
		$( "#xpengumuman" ).show();
		$( "#clock" ).hide();
	} else {
		$this.html(event.strftime('<p align="center">Pengumuman belum dapat dilihat </p><p align="center">Countdown: <span>%D hari %H jam %M menit %S detik </span> </p>'));
		$( "#xpengumuman" ).hide();
	}
	});

	</script>
</body>
</html>