<?php 
session_start();
include '../database.php';
$id_surat = $_POST['id_surat'];
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
date_default_timezone_set('Asia/Jakarta');
$date = date("Y-m-d H:i:s");

if(isset($_POST['submit'])){
    $sql = "UPDATE surgas_guru SET no_surat='$no_surat', no_surat_sppd='$no_surat_sppd', tujuan_sppd='$tujuan_sppd',tempat_sppd='$tempat_sppd',mata_anggaran='$mata_anggaran',nama_guru='$nama_guru',nip_guru='$nip_guru',pangkat_guru='$pangkat_guru',golongan_guru='$golongan_guru',jabatan='$jabatan',dasar_surat='$dasar_surat',isi_surat='$isi_surat',tgl_kegiatan='$tgl_kegiatan',mulai_kegiatan='$mulai_kegiatan',sampai_kegiatan='$sampai_kegiatan',tgl_selesai='$tgl_selesai',tgl_pembukaan='$tgl_pembukaan',jam_pembukaan='$jam_pembukaan',tgl_penutupan='$tgl_penutupan',jam_penutupan='$jam_penutupan',tempat='$tempat',jalan='$jalan',jenis_surgas='$jenis_surgas',tgl_create='$date' WHERE id_surat='$id_surat'";
    $result = mysqli_query($db_conn, $sql);
    if(!$result){ 
       die('Could not update data: '.  mysqli_error()); 
    } else{ 
        $_SESSION['edit_msg'] = 'Data berhasil diupdate';
    } 
    } 
     
    header("location: surgas_guru.php");
    ?>