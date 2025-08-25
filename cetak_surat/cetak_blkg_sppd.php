<?php
session_start();
 
if (!isset($_SESSION['username'])) {
    header("Location: ../");
    exit(); // Terminate script execution after the redirect
}
?>

<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <?php 
    include "../phpqrcode/qrlib.php";
    include('../assets/tgl_indo.php');
    include('../assets/indo.php');
    include('../database.php');
    $no_surat = $_GET['no_surat'];
    $tanggal = date('Y-m-d');
    $a = mysqli_query($db_conn,"SELECT * FROM surgas_guru WHERE no_surat='$no_surat'");
    $data = mysqli_fetch_array($a);
    ?>
    <title>Form 2 SPPD - <?php echo $data['nama_guru'];?> - <?php echo $data['nip_guru'];?></title>
<style>
    @media print
{    
    .no-print, .no-print *
    {
        display: none !important;
    }
}
</style>

<style type="text/css">
body{
	font-family: Tahoma;
}

</style>

<!-- Favicons -->
	<link href="SMKN7.png" rel="icon">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<!--  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">   -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div><button class="no-print" style="height:40px;" onclick="window.print();"><i class="fa fa-download"></i>&nbspCetak Form 2 SPPD </button></div>
<?php
// 	include "phpqrcode/qrlib.php";
// 	include('database.php');
	$que = mysqli_query($db_conn, "SELECT * FROM data_konfig");
	$hsl = mysqli_fetch_array($que);
	
	$no_surat = $_GET['no_surat'];
	//$q = mysqli_query("SELECT * FROM data_siswa where noujian = '$noujian'");
	$q = mysqli_query($db_conn,"SELECT * FROM surgas_guru WHERE no_surat='$no_surat'");
	if(mysqli_num_rows($q) > 0){
				$data = mysqli_fetch_array($q);
			
	echo '<table border="0" width=" 800" align="center">';
  
  echo '<tr>
  <td colspan="5"><div align="justify">
  <table width="900" style="border: 1px solid black; border-collapse: collapse; margin-left: auto; margin-right: auto;">
  <tbody>';

   echo '<tr style="vertical-align: text-top;">
          <td width="30" align="center" style="border: 1px solid black; border-right-style:hidden; border-bottom-style:hidden;">I. <br>&nbsp</td>
          <td width="125" style="border: 1px solid black; border-right-style:hidden; border-bottom-style:hidden;"></td>
          <td width="125" style="border: 1px solid black; border-bottom-style:hidden;"></td>
          <td width="100" style="border: 1px solid black; border-right-style:hidden; border-bottom-style:hidden;">&nbsp&nbsp&nbsp&nbspBerangkat dari <br>&nbsp&nbsp&nbsp&nbspKe <br>&nbsp&nbsp&nbsp&nbspPada Tanggal <br><br>&nbsp&nbsp&nbsp&nbsp';
          if($data['pejabat_ttd'] == 'Wardoyo, S.Pd., M.Pd'){
            echo 'Kepala Sekolah';
          } else if($data['pejabat_ttd'] == 'Inti Kurniati Sri Utami, S.Si'){
            echo '<br> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspPlt. Ka Sub Bag';
          }
          echo '</td>
          <td width="150" style="border: 1px solid black; border-bottom-style:hidden;">: SMKN 7 Surakarta <br> : '.$data['tempat_sppd'].' <br> : '.tgl_indo($data['tgl_kegiatan']).' <br><br>';
          if($data['pejabat_ttd'] == 'Wardoyo, S.Pd., M.Pd'){
            echo '';
          }else if($data['pejabat_ttd'] == 'Inti Kurniati Sri Utami, S.Si'){
            echo 'Tata Usaha';
          }
            
            echo' </td>
      </tr>';
      echo '<tr style="vertical-align: text-top;">
          <td align="center" style="border: 1px solid black; border-right-style:hidden;"></td>
          <td colspan="2" style="border: 1px solid black; "></td>
          <td colspan="2" style="border: 1px solid black;"><br><br><br><br>&nbsp&nbsp&nbsp&nbsp';
          if($data['pejabat_ttd'] == 'Inti Kurniati Sri Utami, S.Si'){
            echo '<b>Inti Kurniati Sri Utami, S,Si</b> <br>&nbsp&nbsp&nbsp&nbspNIP. 197604102008012011';
          } else if($data['pejabat_ttd'] == 'Wardoyo, S.Pd., M.Pd'){
            echo '<b>'.$hsl['nama_kepsek'].'</b> <br>&nbsp&nbsp&nbsp&nbspNIP. '.$hsl['nip_kepsek'].'';
          }
          
          echo' </td>
      </tr>';
   echo '<tr style="vertical-align: text-top;">
          <td align="center" style="border: 1px solid black; border-right-style:hidden; border-bottom-style:hidden;">II. <br>&nbsp</td>
          <td style="border: 1px solid black; border-right-style:hidden; border-bottom-style:hidden;">&nbspTiba di <br>&nbspPada Tanggal <br>&nbspKepala</td>
          <td style="border: 1px solid black; border-bottom-style:hidden;">: <br>: <br>:</td>
          <td style="border: 1px solid black; border-right-style:hidden; border-bottom-style:hidden;">&nbsp&nbsp&nbsp&nbspBerangkat dari <br>&nbsp&nbsp&nbsp&nbspKe <br>&nbsp&nbsp&nbsp&nbspPada Tanggal <br> &nbsp&nbsp&nbsp&nbspKepala</td>
          <td style="border: 1px solid black; border-bottom-style:hidden;">: <br>: <br>: <br>: </td>
      </tr>';
   echo '<tr style="vertical-align: text-top;">
          <td align="center" style="border: 1px solid black; border-right-style:hidden;"></td>
          <td colspan="2" style="border: 1px solid black; "><br><br>( .............................................................. ) <br>NIP.</td>
          <td colspan="2" style="border: 1px solid black;"><br><br>&nbsp&nbsp&nbsp&nbsp( .............................................................. ) <br>&nbsp&nbsp&nbsp&nbspNIP.</td>
      </tr>';
   echo '<tr style="vertical-align: text-top;">
          <td align="center" style="border: 1px solid black; border-right-style:hidden; border-bottom-style:hidden;">III. <br>&nbsp</td>
          <td style="border: 1px solid black; border-right-style:hidden; border-bottom-style:hidden;">&nbspTiba di <br>&nbspPada Tanggal <br>&nbspKepala</td>
          <td style="border: 1px solid black; border-bottom-style:hidden;">: <br>: <br>:</td>
          <td style="border: 1px solid black; border-right-style:hidden; border-bottom-style:hidden;">&nbsp&nbsp&nbsp&nbspBerangkat dari <br>&nbsp&nbsp&nbsp&nbspKe <br>&nbsp&nbsp&nbsp&nbspPada Tanggal <br> &nbsp&nbsp&nbsp&nbspKepala</td>
          <td style="border: 1px solid black; border-bottom-style:hidden;">: <br>: <br>: <br>:</td>
      </tr>';
   echo '<tr style="vertical-align: text-top;">
          <td align="center" style="border: 1px solid black; border-right-style:hidden;"></td>
          <td colspan="2" style="border: 1px solid black; "><br><br>( .............................................................. ) <br>NIP.</td>
          <td colspan="2" style="border: 1px solid black;"><br><br>&nbsp&nbsp&nbsp&nbsp( .............................................................. ) <br>&nbsp&nbsp&nbsp&nbspNIP.</td>
      </tr>';
   echo '<tr style="vertical-align: text-top;">
          <td align="center" style="border: 1px solid black; border-right-style:hidden; border-bottom-style:hidden;">IV. <br>&nbsp</td>
          <td style="border: 1px solid black; border-right-style:hidden; border-bottom-style:hidden;">&nbspTiba di <br>&nbspPada Tanggal <br>&nbspKepala</td>
          <td style="border: 1px solid black; border-bottom-style:hidden;">: <br>: <br>:</td>
          <td style="border: 1px solid black; border-right-style:hidden; border-bottom-style:hidden;">&nbsp&nbsp&nbsp&nbspBerangkat dari <br>&nbsp&nbsp&nbsp&nbspKe <br>&nbsp&nbsp&nbsp&nbspPada Tanggal <br> &nbsp&nbsp&nbsp&nbspKepala</td>
          <td style="border: 1px solid black; border-bottom-style:hidden;">: <br>: <br>: <br>:</td>
      </tr>';
   echo '<tr style="vertical-align: text-top;">
          <td align="center" style="border: 1px solid black; border-right-style:hidden;"></td>
          <td colspan="2" style="border: 1px solid black; "><br><br>( .............................................................. ) <br>NIP.</td>
          <td colspan="2" style="border: 1px solid black;"><br><br>&nbsp&nbsp&nbsp&nbsp( .............................................................. ) <br>&nbsp&nbsp&nbsp&nbspNIP.</td>
      </tr>';
   echo '<tr style="vertical-align: text-top;">
          <td align="center" style="border: 1px solid black; border-right-style:hidden; border-bottom-style:hidden;">V. <br>&nbsp</td>
          <td style="border: 1px solid black; border-right-style:hidden; border-bottom-style:hidden;">&nbspTiba di <br>&nbspPada Tanggal <br>&nbspKepala</td>
          <td style="border: 1px solid black; border-bottom-style:hidden;">: <br>: <br>:</td>
          <td style="border: 1px solid black; border-right-style:hidden; border-bottom-style:hidden;">&nbsp&nbsp&nbsp&nbspBerangkat dari <br>&nbsp&nbsp&nbsp&nbspKe <br>&nbsp&nbsp&nbsp&nbspPada Tanggal <br> &nbsp&nbsp&nbsp&nbspKepala</td>
          <td style="border: 1px solid black; border-bottom-style:hidden;">: <br>: <br>: <br>:</td>
      </tr>';
   echo '<tr style="vertical-align: text-top;">
          <td align="center" style="border: 1px solid black; border-right-style:hidden;"></td>
          <td colspan="2" style="border: 1px solid black; "><br><br>( .............................................................. ) <br>NIP.</td>
          <td colspan="2" style="border: 1px solid black;"><br><br>&nbsp&nbsp&nbsp&nbsp( .............................................................. ) <br>&nbsp&nbsp&nbsp&nbspNIP.</td>
      </tr>';
   echo '<tr style="vertical-align: text-top;">
          <td align="center" style="border: 1px solid black; border-right-style:hidden; border-bottom-style:hidden;">VI. <br>&nbsp</td>
          <td style="border: 1px solid black; border-right-style:hidden; border-bottom-style:hidden;">&nbspTiba di <br>&nbspPada Tanggal <br>';
          if($data['pejabat_ttd'] == 'Inti Kurniati Sri Utami, S.Si'){
            echo '<p style="font-size:15px">Plt. Ka Sub Bag Tata Usaha</p>';
          } else if($data['pejabat_ttd'] == 'Wardoyo, S.Pd., M.Pd'){
            echo 'Kepala Sekolah';
          }
          echo '</td>
          <td style="border: 1px solid black; border-bottom-style:hidden;">: SMK Negeri 7 Surakarta <br>: '.tgl_indo($data['tgl_kegiatan']).'</td>
          <td colspan="2" style="border: 1px solid black; border-bottom-style:hidden;"><div align="justify" style="margin-left:17px;margin-right:5px">Telah diperiksa dengan keterangan bahwa perjalanan tersebut atas perintah pejabat yang berwenang dan semata-mata untuk kepentingan jabatan dalam waktu yang sesingkat-singkatnya.</div></td>
      </tr>';
   echo '<tr style="vertical-align: text-top;">
          <td align="center" style="border: 1px solid black; border-right-style:hidden;"></td>
          <td colspan="2" style="border: 1px solid black; "><br><br><br>';
          if($data['pejabat_ttd'] == 'Inti Kurniati Sri Utami, S.Si'){
            echo '<b>Inti Kurniati Sri Utami, S,Si</b> <br>NIP. 197604102008012011';
          } else if($data['pejabat_ttd'] == 'Wardoyo, S.Pd., M.Pd'){
            echo '<b>'.$hsl['nama_kepsek'].'</b> <br>NIP. '.$hsl['nip_kepsek'].'';
          }
          
          echo '</td>
          <td colspan="2" style="border: 1px solid black;"><br><br><br>&nbsp&nbsp&nbsp&nbsp( .............................................................. ) <br>&nbsp&nbsp&nbsp&nbspNIP.</td>
      </tr>';
   echo '<tr style="vertical-align: text-top;">
          <td align="center" style="border: 1px solid black; border-right-style:hidden; border-bottom-style:hidden;">VII. <br>&nbsp</td>
          <td style="border: 1px solid black; border-right-style:hidden; border-bottom-style:hidden;">&nbspCatatan Lain-Lain</td>
          <td style="border: 1px solid black; border-bottom-style:hidden;border-right-style:hidden;"></td>
          <td colspan="2" style="border: 1px solid black; border-bottom-style:hidden;"></td>
      </tr>';
   echo '<tr style="vertical-align: text-top;">
          <td align="center" style="border: 1px solid black; border-right-style:hidden;"></td>
          <td colspan="2" style="border: 1px solid black; border-right-style:hidden;"></td>
          <td colspan="2" style="border: 1px solid black;"></td>
      </tr>';
   echo '<tr style="vertical-align: text-top;">
          <td align="center" style="border: 1px solid black; border-right-style:hidden; border-bottom-style:hidden;">VIII. <br>&nbsp</td>
          <td colspan="4" style="border: 1px solid black;  border-bottom-style:hidden;">&nbspPERHATIAN &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp : <br><div align="justify" style="margin-right:5px">Pengguna Anggaran/Kuasa Pengguna Anggaran yang menerbitkan SPPD, Gubernur/Wakil Gubernur, Pimpinan dan Anggota DPRD, Pegawai ASN, CPNS, dan Pegawai Non ASN yang melakukan perjalanan dinas, para pejabat yang mengesahkan tanggal berangkat/tiba, serta bendahara pengeluaran bertanggung jawab berdasarkan peraturan-peraturan Keuangan Daerah apabila daerah menderita rugi akibat kesalahan, kelalaian, dan kealpaannya.</div></td>
          
      </tr>';
   echo '<tr style="vertical-align: text-top;">
          <td align="center" style="border: 1px solid black; border-right-style:hidden;"></td>
          <td colspan="4" style="border: 1px solid black;"></td>
      </tr>';
  
  
  

    echo '</tbody>
	</table>
	</div></td>
	</tr>';
  
    
}
  


echo'
</tbody>
</table>
</td>
</tr>';
?>
</body>
</html>