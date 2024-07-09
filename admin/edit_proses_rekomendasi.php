<?php 
session_start();
include '../database.php';
$id_surat = $_POST['id_surat'];
$no_surat = $_POST['no_surat'];
$nama_lengkap = $_POST['nama_lengkap'];
$nis = $_POST['nis'];
$nisn = $_POST['nisn'];
$kelas = $_POST['kelas'];
$ttl = $_POST['ttl'];
$nama_ortu = $_POST['nama_ortu'];
$deskripsi = $_POST['deskripsi'];
$penutup_surat = $_POST['penutup_surat'];
date_default_timezone_set('Asia/Jakarta');
$date = date("Y-m-d H:i:s");

if(isset($_POST['submit'])){
$sql = "UPDATE rekomendasi SET no_surat='$no_surat', nama_lengkap='$nama_lengkap', nis='$nis', nisn='$nisn', kelas='$kelas', ttl='$ttl', nama_ortu='$nama_ortu', deskripsi='$deskripsi', penutup_surat='$penutup_surat', tgl_create='$date' WHERE id_surat='$id_surat'";
$result = mysqli_query($db_conn, $sql);
if(!$result){ 
   die('Could not update data: '.  mysqli_error()); 
} else{ 
    $_SESSION['edit_msg'] = 'Data berhasil diupdate';
} 
} 
 
header("location: rekomendasi.php");
?>