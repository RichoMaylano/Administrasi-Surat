<?php 
session_start();
include '../database.php';

$no_surat = $_POST['no_surat'];
$nama_lengkap = $_POST['nama_lengkap'];
$nama_ayah = $_POST['nama_ayah'];
$nama_ibu = $_POST['nama_ibu'];
$kelas = $_POST['kelas'];
$alamat = $_POST['alamat'];
$nama_walikelas = $_POST['nama_walikelas'];
$nama_bk = $_POST['nama_bk'];
$nip_walikelas = $_POST['nip_walikelas'];
$nip_bk = $_POST['nip_bk'];
$pangkat_walikelas = $_POST['pangkat_walikelas'];
$golongan_walikelas = $_POST['golongan_walikelas'];
$pangkat_bk = $_POST['pangkat_bk'];
$golongan_bk = $_POST['golongan_bk'];
$tgl_kunjungan = $_POST['tgl_kunjungan']; 
$jam_kunjungan = $_POST['jam_kunjungan'];
$status_cetak = $_POST['status_cetak'];
$pejabat_ttd = $_POST['pejabat_ttd'];
date_default_timezone_set('Asia/Jakarta');
$tgl_create = date("Y-m-d");
$tgl_buat = date("Y-m-d H:i:s");
$creator = $_SESSION['nama_lengkap'];

if(isset($_POST['submit'])){
$query = mysqli_query($db_conn, "SELECT no_surat FROM homevisit WHERE no_surat = '$no_surat'");
if($query->num_rows > 0) {
    $_SESSION['id_sama'] = 'Nomor Surat Sudah Terdaftar';
   } else {
$sql = "INSERT INTO homevisit(id_surat, no_surat, nama_lengkap, nama_ayah, nama_ibu, kelas, alamat, nama_walikelas, nama_bk, nip_walikelas, nip_bk, pangkat_walikelas, golongan_walikelas, pangkat_bk, golongan_bk, tgl_kunjungan, jam_kunjungan, status_cetak, pejabat_ttd, tgl_create, tgl_buat, creator) VALUES ('',
 '$no_surat', 
 '$nama_lengkap', 
 '$nama_ayah', 
 '$nama_ibu', 
 '$kelas', 
 '$alamat', 
 '$nama_walikelas ', 
 ' $nama_bk ',
 '$nip_walikelas',
 '$nip_bk',
 '$pangkat_walikelas',
 '$golongan_walikelas',
 '$pangkat_bk',
 '$golongan_bk',
 '$tgl_kunjungan',
 '$jam_kunjungan',
 '$status_cetak',
 '$pejabat_ttd',
 '$tgl_create',
 '$tgl_buat',
 '$creator')";
$result = mysqli_query($db_conn, $sql);
if(!$result){ 
   die('Could not update data: '.  mysqli_error()); 
} else{ 
    $_SESSION['msg'] = '<strong>DATA BERHASIL DITAMBAHKAN !</strong>';
} 
} 
} 
 
header("location: surat_homevisit.php");
?>