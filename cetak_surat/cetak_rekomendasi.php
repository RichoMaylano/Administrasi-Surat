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
    $a = mysqli_query($db_conn,"SELECT * FROM rekomendasi WHERE no_surat='$no_surat'");
    $data = mysqli_fetch_array($a);
    ?>
    <title>Surat Rekomendasi - <?php echo $data['nama_lengkap'];?> - <?php echo $data['kelas'];?></title>
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
.kop_surat{
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
<div><button class="no-print" style="height:40px;" onclick="window.print();"><i class="fa fa-download"></i>&nbspCetak Surat Rekomendasi</button></div>
<?php
// 	include "phpqrcode/qrlib.php";
// 	include('database.php');
	$que = mysqli_query($db_conn, "SELECT * FROM data_konfig");
	$hsl = mysqli_fetch_array($que);
	
	$no_surat = $_GET['no_surat'];
	//$q = mysqli_query("SELECT * FROM data_siswa where noujian = '$noujian'");
	$q = mysqli_query($db_conn,"SELECT * FROM rekomendasi WHERE no_surat='$no_surat'");
	if(mysqli_num_rows($q) > 0){
				$data = mysqli_fetch_array($q);

    echo '
    <div class="kop_surat">
      <table width="750" align="center">
        <tbody>
                <tr>
                  <td style="width: 90px;" rowspan="4">&nbsp&nbsp&nbsp&nbsp<img src="../assets/images/prov_jateng.png" alt=""  height="100px" /></td>
                  <td style="text-align: center;font-size:18px;">'.$hsl['pemerintah'].' <br> <b style="font-size:20px;">'.$hsl['dinas'].' <br> '.$hsl['sekolah'].'</b></td>
                  <td style="width: 90px;" rowspan="4">&nbsp&nbsp&nbsp&nbsp<img src="../assets/images/SMKN7.png" alt=""  height="100px" /></td>
                </tr>
                
                <tr>
                  <td style="text-align: center;font-size:12px;">'.$hsl['alamat'].' <br>Telepon 0271-718667 Faksimile 0271-718667 Surat Elektronik smkn7surakarta@gmail.com</td>
                </tr>
              </tbody>
        </table>
    </div>
<hr width="750" style="height:4px;border-width:2;color:black;background-color:black">	';
			
	echo '<table border="0" width=" 700" align="center">';
  
   echo '<tr>
    <td colspan="4" style="font-size:18px;"><div align="center">
      <b><u>SURAT REKOMENDASI</u>
      <br>Nomor : 400.3.12.1/'.$data['no_surat'].'</b>
    </div><br></td>
  </tr>';

  echo '<tr>
  <td colspan="4"><div align="justify">
  <table width="700" style="border: 0px solid black; border-collapse: collapse; margin-left: auto; margin-right: auto; font-size:18px;">
    <tbody>';

    echo '<tr>
    <td width="250">Yang bertanda tangan di bawah ini :</td>
  </tr>';

    echo '</tbody>
	</table>
	</div></td>
	</tr>';

  echo '<tr style="font-size:18px;">
  <td width="250">Nama</td>
  <td>: <b>'.$hsl['nama_kepsek'].' </b></td>
</tr>';

echo '<tr style="font-size:18px;">
  <td>Jabatan/ Unit Kerja</td>
  <td>: Kepala SMK Negeri 7 Surakarta</td>
</tr>';
  
 
  echo '<tr>
  <td colspan="4"><div align="justify">
  <table width="700" style="border: 0px solid black; border-collapse: collapse; margin-left: auto; margin-right: auto;">
    <tbody>';
    
    echo '<tr style="font-size:18px;">
    <td width="250"><br>Memberikan rekomendasi kepada :</td>
  </tr>';

    echo '</tbody>
	</table>
	</div></td>
	</tr>';

$nama = strtolower($data['nama_lengkap']);
$nama_siswa = ucwords($nama);
  echo '<tr style="font-size:18px;">
  <td width="200">Nama</td>
  <td>: <b> '.$nama_siswa.' </b></td>
</tr>';

echo '<tr style="font-size:18px;">
  <td>NIS / NISN</td>
  <td>: '.$data['nis'].' / '.$data['nisn'].'</td>
</tr>';

echo '<tr style="font-size:18px;">
  <td>NPSN</td>
  <td>: 20328153</td>
</tr>';

echo '<tr style="font-size:18px;">
  <td>Kelas</td>
  <td>: '.$data['kelas'].'</td>
</tr>';

$tgl_lahir = strtolower($data['ttl']);
$ttl = ucwords($tgl_lahir);
echo '<tr style="font-size:18px;">
  <td>Tempat, Tanggal Lahir</td>
  <td>: '.$ttl.'</td>
</tr>';

echo '<tr style="font-size:18px;">
  <td>Nama Orang Tua</td>
  <td>: '.$data['nama_ortu'].'</td>
</tr>';
    
echo '<tr>
  <td colspan="4"><div align="justify">
  <table width="700" style="border: 0px solid black; border-collapse: collapse; margin-left: auto; margin-right: auto;">
    <tbody>';
    
    echo '<tr style="font-size:18px;">
    <td><div align="justify">
    <br><p style="text-indent: 50px; line-height: 1.8;">'.$data['deskripsi'].'</p>
    </div></td>
  </tr>';

  echo '<tr style="font-size:18px;">
  <td><div align="justify">
  <br><p style="text-indent: 50px; line-height: 1.8;">'.$data['penutup_surat'].'</p><br>
  </div></td>
</tr>';

    echo '</tbody>
	</table>
	</div></td>
	</tr>';
}
  
  echo '
  </table>';

  echo '
  <tr>
  <td colspan="4"><div align="justify">
  <table border="0" width="800" style="margin-left: auto; margin-right: auto;">
  <tbody>
  <tr style="font-size:18px;">
  <br><td width="200"></td>
  <td width="250"></td>
  <td>Surakarta, '.tgl_indo($data['tgl_surat']).'
  <br>
  ';
  if($data['pejabat_ttd'] == "Wardoyo, S.Pd., M.Pd"){
  echo'
  Kepala Sekolah
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <b>'.$hsl['nama_kepsek'].'</b>
  <br>
  Pembina Utama Muda
  <br>
  NIP. '.$hsl['nip_kepsek'].'
  '; } else if($data['pejabat_ttd'] == "Inti Kurniati Sri Utami, S.Si"){
  echo'
  a.n. Kepala SMK Negeri 7 Surakarta <br>
  Plt. Ka Sub Bag Tata Usaha
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <b>Inti Kurniati Sri Utami, S.Si</b>
  <br>
  Penata Tingkat I / III.d
  <br>
  NIP. 197604102008012011
  '; }
  else if($data['pejabat_ttd'] == "Kristiyono, S.Pd"){
  echo'
  a.n. Kepala SMK Negeri 7 Surakarta <br>
  Plt. Ka Sub Bag Tata Usaha
  <br>
  <br>
  <br>
  <br>
  <br>
  <b>Kristiyono, S.Pd</b>
  <br>
  Pembina Tingkat I / IV.b
  <br>
  NIP. 196802211998021002
  '; }
  
  echo'
  <br>
  <br>
  </td>
  </tr>
  </tbody>
  </table>
  </td>
  </tr>';
  ?>
  </body>
  </html>