<?php
include '../database.php';
session_start();

session_destroy();
mysqli_query($db_conn, "UPDATE data_admin SET status_login = '0' WHERE username = '{$_SESSION['username']}' ");
header('Location: ../');
?>