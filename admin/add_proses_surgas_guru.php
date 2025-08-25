<?php 
session_start();
include '../database.php';

$no_surat = $_POST['no_surat'];

$no_surat_sppd = $_POST['no_surat_sppd'];
$tujuan_sppd = $_POST['tujuan_sppd'];
$tempat_sppd = $_POST['tempat_sppd'];
$mata_anggaran = $_POST['mata_anggaran'];


$nama_guru = $_POST['nama_guru'];
$nip_guru = $_POST['nip_guru'];
$pangkat_guru = $_POST['pangkat_guru'];
$golongan_guru = $_POST['golongan_guru'];
$jabatan = $_POST['jabatan'];
$dasar_surat = $_POST['dasar_surat'];
$isi_surat = $_POST['isi_surat'];
$tgl_kegiatan = $_POST['tgl_kegiatan'];
$mulai_kegiatan = $_POST['mulai_kegiatan'];
$sampai_kegiatan = $_POST['sampai_kegiatan'];

$tgl_selesai = $_POST['tgl_selesai'];
$tgl_pembukaan = $_POST['tgl_pembukaan'];
$jam_pembukaan = $_POST['jam_pembukaan'];
$tgl_penutupan = $_POST['tgl_penutupan'];
$jam_penutupan = $_POST['jam_penutupan'];

$tempat = $_POST['tempat'];
$jalan = $_POST['jalan'];
$jenis_surgas = $_POST['jenis_surgas'];
$status_cetak = $_POST['status_cetak'];
$pejabat_ttd = $_POST['pejabat_ttd'];
date_default_timezone_set('Asia/Jakarta');
$date = date("Y-m-d H:i:s");
$creator = $_SESSION['nama_lengkap'];

if(isset($_POST['submit'])){
$query = mysqli_query($db_conn, "SELECT no_surat FROM surgas_guru WHERE no_surat = '$no_surat'");
if($query->num_rows > 0) {
    $_SESSION['id_sama'] = 'Nomor Surat Sudah Terdaftar';
   } else {
$sql = "INSERT INTO surgas_guru VALUES ('', '$no_surat', '$no_surat_sppd', '$tujuan_sppd', '$tempat_sppd', '$mata_anggaran','$nama_guru', '$nip_guru', '$pangkat_guru', 
'$golongan_guru', '$jabatan', '$dasar_surat', '$isi_surat', '$tgl_kegiatan', '$mulai_kegiatan', '$sampai_kegiatan',
'$tgl_selesai', '$tgl_pembukaan', '$jam_pembukaan', '$tgl_penutupan', '$jam_penutupan',
'$tempat', '$jalan', '$jenis_surgas', '$status_cetak', '$pejabat_ttd', '$date', '$creator')";
$result = mysqli_query($db_conn, $sql);
if(!$result){ 
   die('Could not update data: '.  mysqli_error()); 
} else{ 
    $_SESSION['msg'] = '<strong>DATA BERHASIL DITAMBAHKAN !</strong>';
} 
} 
} 
 
header("location: surat_tugas_guru.php");
?>