<?php 
session_start();
include '../database.php';
$id_surat = $_POST['id_surat'];
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

if(isset($_POST['submit'])){
$sql = "UPDATE homevisit SET no_surat='$no_surat', 
nama_lengkap='$nama_lengkap', 
nama_ayah='$nama_ayah', 
nama_ibu='$nama_ibu', 
kelas='$kelas', 
alamat='$alamat',
nama_walikelas=' $nama_walikelas ', 
nama_bk=' $nama_bk ', 
nip_walikelas='$nip_walikelas', 
nip_bk='$nip_bk', 
pangkat_walikelas='$pangkat_walikelas', 
golongan_walikelas='$golongan_walikelas', 
pangkat_bk='$pangkat_bk', 
golongan_bk='$golongan_bk',
tgl_kunjungan='$tgl_kunjungan', 
jam_kunjungan='$jam_kunjungan', 
status_cetak='$status_cetak', 
pejabat_ttd='$pejabat_ttd', 
tgl_create='$tgl_create'
WHERE id_surat='$id_surat'";
$result = mysqli_query($db_conn, $sql);
if(!$result){ 
   die('Could not update data: '.  mysqli_error()); 
} else{ 
    $_SESSION['msg'] = '<strong>DATA BERHASIL DIUPDATE !</strong>';
} 
} 
 
header("location: surat_homevisit.php");
?>