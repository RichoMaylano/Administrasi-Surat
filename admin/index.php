<?php
session_start();
if(isset($_SESSION['logged']) && !empty($_SESSION['logged'])){
include "../database.php";
$title = "Administrasi Surat | Dashboard";
$page = "Home";
include '_header.php';
?>
<title><?php echo $title;?></title>
<div class="container-fluid mt-4">
<div class="row mt-5">

<div class="card border-0 mt-3" style="width: 100%;">
  </div>
  <div class="card-body">

<div class="row">

<div class="col-xl-12 col-sm-12 mb-3">
<div class="card o-hidden h-100" >
<div class="card-header clearfix small z-1 text-white" href="#" style="background-color: #00AA9E;">
<span class="float-left"><img src="../SMKN7.png" alt="" width="2%"> &nbspSMK NEGERI 7 SURAKARTA
</div>
<div class="card-body text-white" style="background-color: #00C4B6;">
<div class="card-body-icon">
<h3><marquee>DASHBOARD SISTEM ADMINISTRASI PERSURATAN </marquee></h3>
</div>
</div>

</div>
</div>

<?php $result6 = mysqli_query($db_conn, "SELECT COUNT(*) AS 'count' FROM data_siswa");
$row6 = mysqli_fetch_array($result6);
$count6 = $row6['count'];
?>

<div class="col-xl-12 col-sm-12 mb-3">
<div class="card bg-light o-hidden h-100">
<div class="card-body">
<div class="card-body-icon">
<h1><i class="fa-solid fa-circle-user"></i> <?= $row6['count']?></h1><h5> Jumlah Siswa</h5>
</div>
</div>
<a class="card-footer clearfix small z-1" href="data_siswa.php">
<span class="float-left">View Details</span>
<span class="float-right">
<i class="fa fa-angle-right"></i>
</span>
</a>
</div>
</div>

<?php $result = mysqli_query($db_conn, "SELECT COUNT(*) AS 'count' FROM surat_keterangan");
$row = mysqli_fetch_array($result);
$count = $row['count'];
?>

<div class="col-xl-4 col-sm-6 mb-3">
<div class="card text-white bg-primary o-hidden h-100">
<div class="card-body">
<div class="card-body-icon">
<h1><i class="fa-solid fa-circle-info"></i> <?= $row['count']?></h1><h5> Surat Keterangan</h5>
</div>
</div>
<a class="card-footer text-white clearfix small z-1" href="keterangan.php">
<span class="float-left">View Details</span>
<span class="float-right">
<i class="fa fa-angle-right"></i>
</span>
</a>
</div>
</div>


<?php $result2 = mysqli_query($db_conn, "SELECT COUNT(*) AS 'count' FROM homevisit");
$row2 = mysqli_fetch_array($result2);
$count2 = $row2['count'];
?>

<div class="col-xl-4 col-sm-6 mb-3">
<div class="card text-white bg-warning o-hidden h-100">
<div class="card-body">
<div class="card-body-icon">
<h1><i class="fa-solid fa-house-chimney-user"></i> <?= $row2['count']?></h1><h5> Surat Kunjungan / Homevisit</h5>
</div>
</div>
<a class="card-footer text-white clearfix small z-1" href="homevisit.php">
<span class="float-left">View Details</span>
<span class="float-right">
<i class="fa fa-angle-right"></i>
</span>
</a>
</div>
</div>

<?php $result3 = mysqli_query($db_conn, "SELECT COUNT(*) AS 'count' FROM rekomendasi");
$row3 = mysqli_fetch_array($result3);
$count3 = $row3['count'];
?>

<div class="col-xl-4 col-sm-6 mb-3">
<div class="card text-white bg-success o-hidden h-100">
<div class="card-body">
<div class="card-body-icon">
<h1><i class="fa-solid fa-envelope-circle-check"></i> <?= $row3['count']?></h1><h5> Surat Rekomendasi</h5>
</div>
</div>
<a class="card-footer text-white clearfix small z-1" href="rekomendasi.php">
<span class="float-left">View Details</span>
<span class="float-right">
<i class="fa fa-angle-right"></i>
</span>
</a>
</div>
</div>


<?php $result5 = mysqli_query($db_conn, "SELECT COUNT(DISTINCT kelas) as count FROM data_siswa");
$row5 = mysqli_fetch_array($result5);
$count5 = $row5['count'];
?>

<div class="col-xl-4 col-sm-6 mb-3">
<div class="card text-white bg-secondary o-hidden h-100">
<div class="card-body">
<div class="card-body-icon">
<h1><i class="fa-solid fa-school"></i> <?= $row5['count']?></h1><h5> Kelas</h5>
</div>
</div>
<a class="card-footer text-white clearfix small z-1" href="data_kelas.php">
<span class="float-left">View Details</span>
<span class="float-right">
<i class="fa fa-angle-right"></i>
</span>
</a>
</div>
</div>

<?php $result4 = mysqli_query($db_conn, "SELECT COUNT(DISTINCT jurusan) as count FROM data_siswa");
$row4 = mysqli_fetch_array($result4);
$count4 = $row4['count'];
?>

<div class="col-xl-4 col-sm-6 mb-3">
<div class="card text-white bg-danger o-hidden h-100">
<div class="card-body">
<div class="card-body-icon">
<h1><i class="fa-solid fa-landmark"></i> <?= $row4['count']?></h1><h5> Jurusan</h5>
</div>
</div>
<a class="card-footer text-white clearfix small z-1" href="data_jurusan.php">
<span class="float-left">View Details</span>
<span class="float-right">
<i class="fa fa-angle-right"></i>
</span>
</a>
</div>
</div>


<?php $result6 = mysqli_query($db_conn, "SELECT COUNT(*) AS 'count' FROM surgas_guru");
$row6 = mysqli_fetch_array($result6);
$count6 = $row6['count'];
?>

<div class="col-xl-4 col-sm-6 mb-3">
<div class="card text-white bg-dark o-hidden h-100">
<div class="card-body">
<div class="card-body-icon">
<h1><i class="fa-solid fa-truck-fast"></i> <?= $row6['count']?></h1><h5> Surat Tugas Guru</h5>
</div>
</div>
<a class="card-footer text-white clearfix small z-1" href="surgas_guru.php">
<span class="float-left">View Details</span>
<span class="float-right">
<i class="fa fa-angle-right"></i>
</span>
</a>
</div>
</div>

<!-- card -->
</div>
<!-- card-body -->
  </div>
  <!-- row -->
</div>
<!-- row -->
</div>
  <!-- container -->
</div>

<div class="row">

<!-- Carousel -->
<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3" aria-label="Slide 4"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="4" aria-label="Slide 5"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="../bg1.png" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>First slide label</h5>
        <p>Some representative placeholder content for the first slide.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="../bg2.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Second slide label</h5>
        <p>Some representative placeholder content for the second slide.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="../bg3.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Third slide label</h5>
        <p>Some representative placeholder content for the third slide.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="../bg4.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Fourth slide label</h5>
        <p>Some representative placeholder content for the fourth slide.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="../bg5.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Fifth slide label</h5>
        <p>Some representative placeholder content for the fifth slide.</p>
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

</div>
<div class="container mt-5">
  <div class="row">
<?php
                    if (isset($_SESSION['message']) && $_SESSION['message'] <> '') {
                    echo '<div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
  <div id="liveToast" class="toast hide" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="toast-header">
      <strong class="me-auto text-success">Login Success</strong>
      <small>Just Now</small>
      <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
    <div class="toast-body">
      Selamat Datang <b>'.$_SESSION['nama_lengkap'].'</b> di Website Administrasi Surat SMKN Negeri 7 Surakarta !
    </div>
  </div>
</div>';

                    }
                    $_SESSION['message'] = '';
                ?>

        <?php
        //tempatkan di sini halaman administrator
		if(isset($_REQUEST['hlm'])){
			$hlm = $_REQUEST['hlm'];
			
			switch($hlm){
				case 'user': include 'user.php'; break;
				case 'data': include 'data.php';
			}
		} else {
		?>
		<?php
		}
        ?>


<script>
    $(document).ready(function() {
        $(".toast").toast('show');
    });
</script>

    </div><!-- /.container -->

<?php 
include '_footer.php';
} else {
	header('Location: ../');
}
?>