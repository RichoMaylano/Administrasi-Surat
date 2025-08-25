<?php
$daftar_hari = array(
    'Sunday' => 'Minggu',
    'Monday' => 'Senin',
    'Tuesday' => 'Selasa',
    'Wednesday' => 'Rabu',
    'Thursday' => 'Kamis',
    'Friday' => 'Jumat',
    'Saturday' => 'Sabtu'
   );
   date_default_timezone_set('Asia/Jakarta');
    $tgl_create = date("Y-m-d");
   $namahari = date('l', strtotime($tgl_create));
   
   echo $daftar_hari[$namahari];
?>

