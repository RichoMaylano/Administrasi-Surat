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
$deskripsi = $_POST['deskripsi'];
$penutup_surat = $_POST['penutup_surat'];
$status_cetak = $_POST['status_cetak'];
$pejabat_ttd = $_POST['pejabat_ttd'];
date_default_timezone_set('Asia/Jakarta');
$date = date("Y-m-d H:i:s");
$tgl_surat = $_POST['tgl_surat'];
$creator = $_SESSION['nama_lengkap'];

if(isset($_POST['submit'])){
$query = mysqli_query($db_conn, "SELECT no_surat FROM surat_keterangan WHERE no_surat = '$no_surat'");
if($query->num_rows > 0) {
    $_SESSION['id_sama'] = 'Nomor Surat Sudah Terdaftar';
   } else {
$sql = "INSERT INTO surat_keterangan VALUES ('', '$no_surat', '$nama_lengkap', '$nis', '$nisn', '$kelas', '$tempat_lahir, $ttl', '$nama_ortu', '$deskripsi', '$penutup_surat', '$status_cetak', '$pejabat_ttd', '$date', '$tgl_surat', '', '$creator')";
$result = mysqli_query($db_conn, $sql);
if(!$result){ 
   die('Could not update data: '.  mysqli_error()); 
} else{ 
    $_SESSION['msg'] = '<strong>DATA BERHASIL DITAMBAHKAN !</strong>';
} 
} 
} 
 
header("location: surat_keterangan.php");
?>