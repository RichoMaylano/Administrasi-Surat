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
$status_cetak = $_POST['status_cetak'];
$pejabat_ttd = $_POST['pejabat_ttd'];
date_default_timezone_set('Asia/Jakarta');
$date = date("Y-m-d H:i:s");
$tgl_surat = $_POST['tgl_surat'];

if(isset($_POST['submit'])){
$sql = "UPDATE surat_keterangan SET no_surat='$no_surat', nama_lengkap='$nama_lengkap', nis='$nis', nisn='$nisn', kelas='$kelas', ttl='$ttl', nama_ortu='$nama_ortu', deskripsi='$deskripsi', penutup_surat='$penutup_surat', status_cetak='$status_cetak', pejabat_ttd='$pejabat_ttd', tgl_surat='$tgl_surat', tgl_edit='$date' WHERE id_surat='$id_surat'";
$result = mysqli_query($db_conn, $sql);
if(!$result){ 
   die('Could not update data: '.  mysqli_error()); 
} else{ 
    $_SESSION['msg'] = '<strong>DATA BERHASIL DIUPDATE !</strong>';
} 
} 
 
header("location: surat_keterangan.php");
?>