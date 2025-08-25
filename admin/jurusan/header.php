<?php
session_start();
 
if (!isset($_SESSION['username'])) {
    header("Location: ../../");
    exit(); // Terminate script execution after the redirect
}
?>

<?php
  date_default_timezone_set("Asia/jakarta");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo $title ?></title>
    <!-- Icon -->
  <link rel="icon" href="../../assets/images/SMKN7.png">
  
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="../../assets/AdminLTE/plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../../assets/AdminLTE/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="../../assets/AdminLTE/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="../../assets/AdminLTE/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="../../assets/AdminLTE/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
      <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="../../assets/AdminLTE/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="../../assets/AdminLTE/plugins/toastr/toastr.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../assets/AdminLTE/dist/css/adminlte.min.css">
   <!-- DataTables -->
   <link rel="stylesheet" href="../../assets/AdminLTE/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../../assets/AdminLTE/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../../assets/AdminLTE/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  
 

</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__wobble" src="../../assets/images/SMKN7.png" alt="AdminLTELogo" height="100" width="100">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-primary">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link text-white" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
      <a href="#" class="nav-link d-block text-white"><span id="jam"></span></a>
    </li>
    </ul>

    
    <script type="text/javascript">
        window.onload = function() { 
          jam(); }
       
        function jam() {
            var e = document.getElementById('jam'),
            d = new Date(), h, m, s;
            h = d.getHours();
            m = set(d.getMinutes());
            s = set(d.getSeconds());
       
            e.innerHTML = h +':'+ m +':'+ s;
       
            setTimeout('jam()', 1000);
        }
       
        function set(e) {
            e = e < 10 ? '0'+ e : e;
            return e;
        }
    </script>


<?php $richo1 = mysqli_query($db_conn, "SELECT COUNT(creator) AS 'count' FROM surat_keterangan WHERE creator='Richo Maylano Yozienanda' ");
$cho1 = mysqli_fetch_array($richo1);
$r1 = $cho1['count'];
?>

<?php $richo2 = mysqli_query($db_conn, "SELECT COUNT(*) AS 'count' FROM surgas_guru WHERE creator='Richo Maylano Yozienanda' ");
$cho2 = mysqli_fetch_array($richo2);
$r2 = $cho2['count'];
?>

<?php $richo3 = mysqli_query($db_conn, "SELECT COUNT(creator) AS 'count' FROM homevisit WHERE creator='Richo Maylano Yozienanda' ");
$cho3 = mysqli_fetch_array($richo3);
$r3 = $cho3['count'];
?>

<?php $richo4 = mysqli_query($db_conn, "SELECT COUNT(creator) AS 'count' FROM rekomendasi WHERE creator='Richo Maylano Yozienanda' ");
$cho4 = mysqli_fetch_array($richo4);
$r4 = $cho4['count'];
?>

<?php $richo5 = mysqli_query($db_conn, "SELECT COUNT(creator) AS 'count' FROM surat_panggilan WHERE creator='Richo Maylano Yozienanda' ");
$cho5 = mysqli_fetch_array($richo5);
$r5 = $cho5['count'];
?>

<?php $gunadi1 = mysqli_query($db_conn, "SELECT COUNT(creator) AS 'count' FROM surat_keterangan WHERE creator='Gunadi' ");
$gun1 = mysqli_fetch_array($gunadi1);
$g1 = $gun1['count'];
?>

<?php
$gunadi2 = mysqli_query($db_conn, "SELECT COUNT(*) AS 'count' FROM surgas_guru WHERE creator='Gunadi'");
$gun2 = mysqli_fetch_array($gunadi2);
$g2 = $gun2['count'];
?>

<?php $gunadi3 = mysqli_query($db_conn, "SELECT COUNT(creator) AS 'count' FROM homevisit WHERE creator='Gunadi' ");
$gun3 = mysqli_fetch_array($gunadi3);
$g3 = $gun3['count'];
?>

<?php $gunadi4 = mysqli_query($db_conn, "SELECT COUNT(creator) AS 'count' FROM rekomendasi WHERE creator='Gunadi' ");
$gun4 = mysqli_fetch_array($gunadi4);
$g4 = $gun4['count'];
?>

<?php $gunadi5 = mysqli_query($db_conn, "SELECT COUNT(creator) AS 'count' FROM surat_panggilan WHERE creator='Gunadi' ");
$gun5 = mysqli_fetch_array($gunadi5);
$g5 = $gun5['count'];
?>

<?php 
$sum = $r1 + $r2 + $r3 + $r4 + $r5;
$sum2 = $g1 + $g2 + $g3 + $g4 + $g5;
?>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

          <!-- Settings Dropdown Menu --> 
          <li class="nav-item d-none d-sm-inline-block">
      <?php if(date("H:i:s") >= '06:00:00' && date("H:i:s") <= '10:00:00'){?>
        <a href="#" class="btn btn-primary"><i class="fas fa-sun"></i> &nbsp Selamat Pagi, <?php echo $_SESSION['nama_lengkap']?></a> 
        <?php } else if(date("H:i:s") >= '10:00:01' && date("H:i:s") <= '14:00:00'){?>
        <a href="#" class="btn btn-primary"><i class="fas fa-sun"></i> &nbsp Selamat Siang, <?php echo $_SESSION['nama_lengkap']?></a>
        <?php } else if(date("H:i:s") >= '14:00:01' && date("H:i:s") <= '15:30:00'){?>
        <a href="#" class="btn btn-primary"><i class="fas fa-sun"></i> &nbsp Selamat Sore, <?php echo $_SESSION['nama_lengkap']?></a>  
        <?php } else if(date("H:i:s") >= '15:30:01'){?>
        <a href="#" class="btn btn-primary"><i class="fas fa-running"></i> &nbsp Waktunya Pulang</a> 
      <?php } else { 
        echo '' ;
        }?>
    </li>
          <li class="nav-item dropdown">
        <a class="nav-link text-white" href="#" data-toggle="dropdown" ><i class="fas fa-cog"></i>  Settings</a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">Settings</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <?php if($_SESSION['username'] == "Richo"){ ?>
            <i class="fas fa-envelope mr-2"></i> <?php echo $sum?> Surat telah dibuat
            <?php } else if($_SESSION['username'] == "Gunadi"){ ?>
              <i class="fas fa-envelope mr-2"></i> <?php echo $sum2?> Surat telah dibuat
            <?php } ?>
          </a>
          <div class="dropdown-divider"></div>
          <a href="../index.php" class="dropdown-item">
          <i class="fas fa-user mr-2"></i>&nbsp&nbsp&nbsp<?php echo $_SESSION['nama_lengkap']?>
          <span class="float-right text-muted text-sm">User</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="../index.php" class="dropdown-item">
          <i class="fas fa-clock mr-2"></i>&nbsp&nbsp&nbspWaktu Login
          <span class="float-right text-muted text-sm">
          <?php 
              $admin = mysqli_query($db_conn,"SELECT * FROM data_admin WHERE nama_lengkap='{$_SESSION['nama_lengkap']}'");
              if(mysqli_num_rows($admin) > 0){
                while($data = mysqli_fetch_array($admin)){ ?>
                  <?php echo $data['sesi_login'] ?>
            <?php }
          } else {
            echo '';
          }?> WIB</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="../logout.php" onclick="return confirm('Apakah anda yakin ingin keluar ?')" class="dropdown-item dropdown-footer bg-danger"><i class="fas fa-sign-out-alt"></i>&nbsp&nbsp&nbspSign-Out</a>
        </div>
      </li> 
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="../../assets/AdminLTE/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Administrator</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../../assets/AdminLTE/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Selamat Datang, <?php echo $_SESSION["username"] ?></a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        <li class="nav-item">
            <a href="../index.php" class="nav-link <?php if($title == "Home Page | Aplikasi Persuratan | Versi 2.1.2"){ echo "active";}?>">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          
          <li class="nav-item">
            <a href="../peserta_didik.php" class="nav-link <?php if($title == "Peserta Didik Page | Aplikasi Persuratan | Versi 2.1.2"){ echo "active";}?>">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Peserta Didik
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link <?php if($title == "Pekerjaan Sosial Page | Aplikasi Persuratan | Versi 2.1.2" || $title == "Desain Komunikasi Visual Page | Aplikasi Persuratan | Versi 2.1.2" || $title == "Perhotelan Page | Aplikasi Persuratan | Versi 2.1.2"
            || $title == "Kuliner Page | Aplikasi Persuratan | Versi 2.1.2" || $title == "Usaha Layanan Pariwisata Page | Aplikasi Persuratan | Versi 2.1.2" || $title == "Broadcasting dan Perfilman Page | Aplikasi Persuratan | Versi 2.1.2"){ echo "active";}?>">
              <i class="nav-icon fas fa-school"></i>
              <p>
                Kompetensi Keahlian
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pekerjaan_sosial.php" class="nav-link <?php if($title == "Pekerjaan Sosial Page | Aplikasi Persuratan | Versi 2.1.2"){ echo "active";}?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pekerjaan Sosial</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="desain_komunikasi_visual.php" class="nav-link <?php if($title == "Desain Komunikasi Visual Page | Aplikasi Persuratan | Versi 2.1.2"){ echo "active";}?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Desain Komunikasi Visual</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="perhotelan.php" class="nav-link <?php if($title == "Perhotelan Page | Aplikasi Persuratan | Versi 2.1.2"){ echo "active";}?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Perhotelan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="kuliner.php" class="nav-link <?php if($title == "Kuliner Page | Aplikasi Persuratan | Versi 2.1.2"){ echo "active";}?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Kuliner</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pariwisata.php" class="nav-link <?php if($title == "Usaha Layanan Pariwisata Page | Aplikasi Persuratan | Versi 2.1.2"){ echo "active";}?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Usaha Layanan Pariwisata</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="broadcasting.php" class="nav-link <?php if($title == "Broadcasting dan Perfilman Page | Aplikasi Persuratan | Versi 2.1.2"){ echo "active";}?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Broadcasting dan Perfilman</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link <?php if($title == "Surat Perintah Tugas Guru Page | Aplikasi Persuratan | Versi 2.1.2" || $title == "Surat Kunjungan Rumah Page | Aplikasi Persuratan | Versi 2.1.2" || $title == "Surat Panggilan Orang Tua Page | Aplikasi Persuratan | Versi 2.1.2" || $title == "Surat Keterangan Page | Aplikasi Persuratan | Versi 2.1.2" || $title == "Surat Rekomendasi Page | Aplikasi Persuratan | Versi 2.1.2"){ echo "active";}?>">
              <i class="nav-icon fas fa-envelope"></i>
              <p>
                Administrasi Surat
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../surat_keterangan.php" class="nav-link <?php if($title == "Surat Keterangan Page | Aplikasi Persuratan | Versi 2.1.2"){ echo "active";}?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Surat Keterangan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../surat_rekomendasi.php" class="nav-link <?php if($title == "Surat Rekomendasi Page | Aplikasi Persuratan | Versi 2.1.2"){ echo "active";}?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Surat Rekomendasi</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../surat_tugas_guru.php" class="nav-link <?php if($title == "Surat Perintah Tugas Guru Page | Aplikasi Persuratan | Versi 2.1.2"){ echo "active";}?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Surat Tugas Guru</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../surat_panggilan_ortu.php" class="nav-link <?php if($title == "Surat Panggilan Orang Tua Page | Aplikasi Persuratan | Versi 2.1.2"){ echo "active";}?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Surat Panggilan Ortu</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../surat_homevisit.php" class="nav-link <?php if($title == "Surat Kunjungan Rumah Page | Aplikasi Persuratan | Versi 2.1.2"){ echo "active";}?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Surat Homevisit</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link btn btn-info text-white toastrDefaultInfo">
              <i class="nav-icon fas fa-comment"></i>
              <p>
                Random Quotes
              </p>
            </a>
          </li> 
         
         
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>