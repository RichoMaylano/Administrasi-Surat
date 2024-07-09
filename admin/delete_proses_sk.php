<?php
session_start();
include '../database.php';

$id_surat = $_GET['id_surat'];
$sql = "DELETE FROM surat_keterangan WHERE id_surat = '$id_surat'";
if (mysqli_query($db_conn, $sql)) {
    $_SESSION['del_msg'] = 'Data berhasil dihapus';
} else {
    echo "Error deleting record: " . mysqli_error($db_conn);
}
header("location: keterangan.php");
?>
