<?php
session_start();
include '../database.php';

$id_surat = $_GET['id_surat'];
$sql = "DELETE FROM surat_keterangan WHERE id_surat = '$id_surat'";
if (mysqli_query($db_conn, $sql)) {
    $_SESSION['msg'] = '<strong>DATA BERHASIL DIHAPUS !</strong>';
} else {
    echo "Error deleting record: " . mysqli_error($db_conn);
}
header("location: surat_keterangan.php");
?>
