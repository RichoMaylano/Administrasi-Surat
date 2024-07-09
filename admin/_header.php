<?php
if(isset($_SESSION['logged']) && !empty($_SESSION['logged'])){
	$que = mysqli_query($db_conn, "SELECT * FROM data_konfig");
	$hsl = mysqli_fetch_array($que);
	$timestamp = strtotime($hsl['tgl_pengumuman']);
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
    <meta name="author" content="">
    
    <!-- <title>Pengumuman Kelulusan</title> -->

    <!-- Bootstrap core CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

	
	<!-- <link href="../css/bootstrap.min.css" rel="stylesheet"> -->
	
	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
	<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

	<link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.bootstrap5.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    
	<!-- Custom styles down here -->
    <style type="text/css">
	/* Sticky footer styles
	-------------------------------------------------- */
	html {
	  position: relative;
	  min-height: 100%;
	}
	body {
		/* background-image: url('../Form_Login/Login/images/bg-02.jpg'); */
		background-repeat: no-repeat;
  		background-size: cover;
		background-position: center;
	  /* Margin bottom by footer height
	  margin-bottom: 60px; */
	}
	.footer {
		position: absolute;
  left: 0;
	  /* position: absolute; */
	  bottom: 0;
	  width: 100%;
	  /* Set the fixed height of the footer here */
	  height: 60px;
	  background-color: #f5f5f5;
	  text-align: center;
	}


	/* Custom page CSS
	-------------------------------------------------- */
	/* Not required for template or sticky footer method. */

	body > .container {
	  padding: 30px 15px 0;
	}
	.container .text-muted {
	  margin: 20px 0;
	}

	.footer > .container {
	  padding-right: 15px;
	  padding-left: 15px;
	}

	code {
	  font-size: 80%;
	}



    </style>


</head>

<body style="overflow-x:hidden">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
	<div class="container-fluid">
	<a href="./"><img src="../SMKN7.png" width="50px" alt=""></a>
	  <a class="navbar-brand" href="./"><strong>&nbsp&nbsp SMKN 7</strong></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link <?php if($title == "Administrasi Surat | Dashboard"){ echo "active";}?>" aria-current="page" href="./"><i class="fas fa-home"></i> Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php if($title == "Administrasi Surat | Data Siswa"){ echo "active";}?>" href="data_siswa.php"><i class="fa-solid fa-circle-user"></i> Data Siswa</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php if($title == "Administrasi Surat | Data Jurusan"){ echo "active";}?>" href="data_jurusan.php"><i class="fa-solid fa-landmark"></i> Data Jurusan</a>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link <?php if($title == "Surat Keterangan | Administrasi" || $title == "Surat Homevisit | Administrasi" || $title == "Surat Rekomendasi | Administrasi" || $title == "Surat Tugas Guru | Administrasi"){ echo "active";}?> dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
		  <i class="fa-solid fa-envelopes-bulk"></i> Jenis Surat
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
			  <li><a class="dropdown-item" href="keterangan.php"><i class="fa-solid fa-circle-info"></i>&nbsp Surat Keterangan</a></li>
			  <li><a class="dropdown-item" href="rekomendasi.php"><i class="fa-solid fa-envelope-circle-check"></i>&nbsp Surat Rekomendasi</a></li>
			  <li><a class="dropdown-item" href="homevisit.php"><i class="fa-solid fa-house-chimney-user"></i>&nbsp Home Visit</a></li>
			  <li><a class="dropdown-item" href="surgas_guru.php"><i class="fa-solid fa-truck-fast"></i>&nbsp Surat Tugas Guru</a></li>
				<!-- <li><a class="dropdown-item" href="dkv.php"><i class="fa-solid fa-palette"></i>&nbsp Desain Komunikasi Visual</a></li>
				<li><a class="dropdown-item" href="kul.php"><i class="fa-solid fa-bread-slice"></i>&nbsp Kuliner</a></li>
				<li><a class="dropdown-item" href="ps.php"><i class="fa-solid fa-house-medical"></i>&nbsp Pekerjaan Sosial</a></li>
				<li><a class="dropdown-item" href="ph.php"><i class="fa-solid fa-hotel"></i>&nbsp Perhotelan</a></li>
				<li><a class="dropdown-item" href="ulp.php"><i class="fa-solid fa-plane"></i>&nbsp Usaha Layanan Pariwisata</a></li> -->
          </ul>
        </li>
        <!-- <li class="nav-item">
          <a class="nav-link <?php if($title == "Transkrip Nilai | Konfigurasi"){ echo "active";}?>" href="konfigurasi.php" ><i class="fas fa-gear"></i> Konfigurasi</a>
        </li> -->
      </ul>
	  
	  <ul class="navbar-nav">
		<li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user"></i> Halo, <?php echo $_SESSION['nama_lengkap']; ?>!</a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
				<li><a class="dropdown-item" onclick="logout()"><i class="fas fa-sign-out-alt"></i>&nbspLogout</a></li>
			</ul>
        </li>
	</ul>

	<script>
	function logout(){
		Swal.fire({
		title: "Yakin ingin Logout?",
		text: "Klik 'Ya, saya yakin' untuk Logout",
		icon: "warning",
		showCancelButton: true,
		confirmButton: "btn btn-success",
		cancelButtonColor: "#d33",
		confirmButtonText: "Ya, saya yakin"
		}).then((result) => {
		if (result.isConfirmed) {
			Swal.fire({
			title: "Logout Sukses",
			text: "Anda Berhasil Logout",
			icon: "success",
		showConfirmButton: false,
		});
		setTimeout(function () {
			window.location.href = "logout.php";
    dialog.close();
}, 1000);
		}
		});
	}
	</script>

    </div>
  </div>
</nav>

<?php
} else {
	header('Location: ../');
}
?>