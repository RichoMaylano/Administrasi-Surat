<?php
include '../database.php';
 
 $query = mysqli_query($db_conn, "SELECT * FROM data_siswa WHERE nama_lengkap='".mysqli_escape_string($db_conn, $_POST['nama_lengkap'])."'");
 $data = mysqli_fetch_array($query);
  
 echo json_encode($data);
?>
