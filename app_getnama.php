<?php
include('database.php');
$nisn = $_GET['nisn'];
//echo $nisn;
//echo '<br/>';
//$q = mysqli_query($db_conn,"SELECT * FROM data_siswa WHERE nisn='$nisn'");
//if(mysqli_num_rows($q) > 0){
//    $data = mysqli_fetch_array($q);
//    echo $data['nama'];
//}


$query = mysqli_query($db_conn, "SELECT * FROM data_siswa WHERE nisn='$nisn'");
while ($row = mysqli_fetch_assoc($query)) {
	$data[] = $row;
}
//echo '<pre>'; print_r($data); echo '</pre>';				
echo json_encode($data);




?>