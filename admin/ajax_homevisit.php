<?php
include '../database.php';
 
 $query = mysqli_query($db_conn, "SELECT * FROM data_guru WHERE nama_guru='".mysqli_escape_string($db_conn, $_POST['nama_guru'])."'");
 $data = mysqli_fetch_array($query);
  
 echo json_encode($data);
?>
