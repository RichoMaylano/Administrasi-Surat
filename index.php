<!DOCTYPE html>
<html lang="en">
<head>
	<title>Form Login | Admin</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="SMKN7.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Form_Login/Login/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Form_Login/Login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Form_Login/Login/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Form_Login/Login/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="Form_Login/Login/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Form_Login/Login/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Form_Login/Login/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="Form_Login/Login/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Form_Login/Login/css/util.css">
	<link rel="stylesheet" type="text/css" href="Form_Login/Login/css/main.css">
<!--===============================================================================================-->
</head>
<?php
include "database.php";
$que = mysqli_query($db_conn, "SELECT * FROM data_konfig");
$hsl = mysqli_fetch_array($que);
?>
<?php
	if(isset($_REQUEST['submit'])){
		$username = $_REQUEST['username'];
        $username = preg_replace('/[^a-zA-Z0-9]/', '', $username);
		$password = MD5($_REQUEST['password']);
		
		$hasil = mysqli_query($db_conn,"SELECT * FROM data_admin WHERE username='$username' AND password='$password'");
			if(mysqli_num_rows($hasil) > 0){
				session_start();
				$data = mysqli_fetch_array($hasil);
				$_SESSION['logged'] = $data['UID'];
				$_SESSION['username'] = $data['username'];
				$_SESSION['nama_lengkap'] = $data['nama_lengkap'];
				$_SESSION['message'] = 'Selamat Datang';
                /* jika fungsi: 
                        header('Location: ./'); 
                   tidak bisa digunakan, HAPUS atau berikan tanda komentar
                   kemudian aktifkan (hapus tanda //) pada skrip: 
                        echo '<script>window.location("./");</script>';
                */
				header('Location: admin/./');
                //echo '<script>window.location("./");</script>';
			} else {
				echo '<script>alert("Username dan Password tidak sesuai!");</script>';
			}
	} ?>

<body style="background-color: #666666;">
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
                <form class="login100-form validate-form">
                    <div class="text-center"><img src="SMKN7.png" alt="" width="150px"></div>
                    <br>
					<span class="login100-form-title p-b-43">
						<b>WEBSITE ADMINISTRASI SURAT<br> <?= $hsl['sekolah'] ?></b>
					</span>
					
					
					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="username" id="inputUsername">
						<span class="focus-input100"></span>
						<span class="label-input100">Username</span>
					</div>
					
					
					<div class="wrap-input100 validate-input" data-validate="Password is required">
						<input class="input100" type="password" name="password" id="inputPassword">
						<span class="focus-input100"></span>
						<span class="label-input100">Password</span>
					</div>

					<div class="flex-sb-m w-full p-t-3 p-b-32">
						<div class="contact100-form-checkbox">
							<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
							<label class="label-checkbox100" for="ckb1">
								Remember me
							</label>
						</div>

						<div>
							<a href="#" class="txt1">
								Forgot Password?
							</a>
						</div>
					</div>
			

					<div class="container-login100-form-btn">
						<button class="login100-form-btn" type="submit" name="submit">
							Login
						</button>
					</div>
					
					<div class="text-center p-t-46 p-b-20">
						<span class="txt2">
                            &copy; 2024 &middot; Richo Maylano Yozienanda
						</span>
					</div>

					<!-- <div class="login100-form-social flex-c-m">
						<a href="#" class="login100-form-social-item flex-c-m bg1 m-r-5">
							<i class="fa fa-facebook-f" aria-hidden="true"></i>
						</a>

						<a href="#" class="login100-form-social-item flex-c-m bg2 m-r-5">
							<i class="fa fa-twitter" aria-hidden="true"></i>
						</a>
					</div> -->
				</form>

				<div class="login100-more" style="background-image: url('Surat.png');">
				</div>
			</div>
		</div>
	</div>
	
	

	
	
<!--===============================================================================================-->
	<script src="Form_Login/Login/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="Form_Login/Login/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="Form_Login/Login/vendor/bootstrap/js/popper.js"></script>
	<script src="Form_Login/Login/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="Form_Login/Login/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="Form_Login/Login/vendor/daterangepicker/moment.min.js"></script>
	<script src="Form_Login/Login/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="Form_Login/Login/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="Form_Login/Login/js/main.js"></script>

</body>
</html>