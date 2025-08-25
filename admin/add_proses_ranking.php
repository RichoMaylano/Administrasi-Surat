<?php 
session_start();
include '../database.php';

$no_surat = $_POST['no_surat'];
$nama_lengkap = $_POST['nama_lengkap'];
$nis = $_POST['nis'];
$nisn = $_POST['nisn'];
$kelas = $_POST['kelas'];
$tempat_lahir = $_POST['tempat_lahir'];
$ttl = $_POST['ttl'];
$nama_ortu = $_POST['nama_ortu'];
$alamat = $_POST['alamat'];

$deskripsi = $_POST['deskripsi'];

$rank_smt1 = $_POST['rank_smt1'];
$rank_smt2 = $_POST['rank_smt2'];
$rank_smt3 = $_POST['rank_smt3'];
$rank_smt4 = $_POST['rank_smt4'];
$rank_smt5 = $_POST['rank_smt5'];
$rank_smt6 = $_POST['rank_smt6'];

$jumlah_smt1 = $_POST['jumlah_smt1'];
$jumlah_smt2 = $_POST['jumlah_smt2'];
$jumlah_smt3 = $_POST['jumlah_smt3'];
$jumlah_smt4 = $_POST['jumlah_smt4'];
$jumlah_smt5 = $_POST['jumlah_smt5'];
$jumlah_smt6 = $_POST['jumlah_smt6'];

$penutup_surat = $_POST['penutup_surat'];
$status_cetak = $_POST['status_cetak'];
$pejabat_ttd = $_POST['pejabat_ttd'];
date_default_timezone_set('Asia/Jakarta');
$date = date("Y-m-d H:i:s");
$tgl_surat = $_POST['tgl_surat'];
$jenis_rekomendasi = $_POST['jenis_rekomendasi'];
$creator = $_SESSION['nama_lengkap'];

if(isset($_POST['submit'])){
$query = mysqli_query($db_conn, "SELECT no_surat FROM rekomendasi WHERE no_surat = '$no_surat'");
if($query->num_rows > 0) {
    $_SESSION['id_sama'] = 'Nomor Surat Sudah Terdaftar';
   } else {
$sql = "INSERT INTO rekomendasi VALUES ('', '$no_surat', '$nama_lengkap', '$nis', '$nisn', '$kelas', '$tempat_lahir, $ttl', '$nama_ortu', '$alamat', '$rank_smt1', '$rank_smt3', '$rank_smt3', '$rank_smt4', '$rank_smt5', '$rank_smt6', '$jumlah_smt1', '$jumlah_smt2', '$jumlah_smt3', '$jumlah_smt4', '$jumlah_smt5', '$jumlah_smt6',  '$deskripsi', '$penutup_surat', '$status_cetak', '$pejabat_ttd', '$date', '$tgl_surat', '', '$jenis_rekomendasi', '$creator')";
$result = mysqli_query($db_conn, $sql);
if(!$result){ 
   die('Could not update data: '.  mysqli_error()); 
} else{ 
    $_SESSION['msg'] = '<strong>DATA BERHASIL DITAMBAHKAN !</strong>';
} 
} 
} 
 
header("location: surat_rekomendasi.php");
?>