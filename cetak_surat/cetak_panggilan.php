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
    $a = mysqli_query($db_conn,"SELECT * FROM surat_panggilan WHERE no_surat='$no_surat'");
    $data = mysqli_fetch_array($a);
    ?>
    <title>Surat Panggilan Orang Tua - <?php echo $data['nama_lengkap'];?> - <?php echo $data['kelas'];?></title>
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
	font-family: Bookman Old Style;
  margin-left: 50px;
}
.kop_surat{
	font-family: Tahoma;
}

</style>

<!-- Favicons -->
	<link href="SMKN7.png" rel="icon">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<div><button class="no-print" style="height:40px;" onclick="window.print();"><i class="fa fa-download"></i>&nbspCetak Surat Panggilan Orang Tua</button></div>
<?php
// 	include "phpqrcode/qrlib.php";
// 	include('database.php');
	$que = mysqli_query($db_conn, "SELECT * FROM data_konfig");
	$hsl = mysqli_fetch_array($que);
	
	$no_surat = $_GET['no_surat'];
	//$q = mysqli_query("SELECT * FROM data_siswa where noujian = '$noujian'");
	$q = mysqli_query($db_conn,"SELECT * FROM surat_panggilan WHERE no_surat='$no_surat'");
	if(mysqli_num_rows($q) > 0){
				$data = mysqli_fetch_array($q);
        $ayah = strtolower($data['nama_ayah']);
        $ibu = strtolower($data['nama_ibu']);
        $siswa = strtolower($data['nama_lengkap']);
        $nama_siswa = ucwords($siswa);
        $nama_ayah = ucwords($ayah);
        $nama_ibu = ucwords($ibu);

        $petik = $data['jam_kunjungan'];
        $jam_kunjungan = str_replace(":", ".", $petik);
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
<hr width="800" style="height:4px;border-width:2;color:black;background-color:black">	';
			
	echo '<table border="0" width="800" align="center">';
  
  echo '<tr>
  <td colspan="4"><div align="justify">
  <table width="800" style="border: 0px solid black; border-collapse: collapse; margin-left: auto; margin-right: auto;">
    <tbody>';
    
    echo '<tr style="font-size:16px;">
    <td width="380"></td>
    <td>Surakarta, '.tgl_indo($data['tgl_surat']).'</td>
  </tr>';

    echo '</tbody>
	</table>
	</div></td>
	</tr>';

  echo '<tr>
  <td colspan="4"><div align="justify">
  <table width="800" style="border: 0px solid black; border-collapse: collapse; margin-left: auto; margin-right: auto;">
    <tbody>';
    
    echo '<tr style="font-size:16px;">
    <td width="25">Nomor </td>
    <td width="320"> : <strong>421.3/'.$data['no_surat'].'</strong></td>
    <td width=""></td>
  </tr>';
    
    echo '<tr style="font-size:16px;">
    <td width="25">Hal </td>
    <td width="320"> : <b>Panggilan Orang Tua</b></td>
    <td width="5"></td>
    <td width=""><strong>Yth.</strong> Bp/Ibu <b>'.$nama_ayah.'/ '.$nama_ibu.'</b> </td>
  </tr>';
   
  echo '<tr style="font-size:16px;">
    <td width="20"> </td>
    <td width="320"> </td>
    <td width="5"></td>
    <td width="">Orang Tua / Wali Murid</td>
  </tr>';
  
  echo '<tr style="font-size:16px;">
    <td width="20"> </td>
    <td width="320"> </td>
    <td width="5"></td>
    <td width=""><b>'.$nama_siswa.'</b></td>
  </tr>';
  
  echo '<tr style="font-size:16px;">
    <td width="20"> </td>
    <td width="320"> </td>
    <td width="5"></td>
    <td width="">Kelas '.$data['kelas'].'</td>
  </tr>';
  
  echo '<tr style="font-size:16px;">
    <td width="20"> </td>
    <td width="320"> </td>
    <td width="5"></td>
    <td width="">d.a '.$data['alamat'].'</td>
  </tr>';

    echo '</tbody>
	</table>
	</div></td>
	</tr>';

  echo '<tr>
  <td colspan="4"><div align="justify">
  <table width="800" style="border: 0px solid black; border-collapse: collapse; margin-left: auto; margin-right: auto; font-size:16px;">
    <tbody>';
 
  echo '<tr>
  <td colspan="4"><div align="justify">
  <table width="800" style="border: 0px solid black; border-collapse: collapse; margin-left: auto; margin-right: auto; font-size:16px;">
    <tbody>';
    
    echo '<tr><br>
    <td><p style="height:30px;">Mengharap dengan hormat kehadiran Saudara besok pada :</p></td>
  </tr>';

    echo '</tbody>
	</table>
	</div></td>
	</tr>';

  $hari = array ( 1 =>    'Senin',
			'Selasa',
			'Rabu',
			'Kamis',
			'Jumat',
			'Sabtu',
			'Minggu'
		);
  $tgl = date('N', strtotime($data['tgl_kunjungan']));

echo '<tr>
  <td colspan="4"><div align="justify">
  <table width="800" style="border: 0px solid black; border-collapse: collapse; margin-left: auto; margin-right: auto; font-size:16px;">
    <tbody>';

echo'
<tr>
    <td ></td>
    <td width="200" style="height:30px;">Hari/Tanggal</td>
    <td width="20" >:</td>
    <td colspan="2" >'.$hari[$tgl].', '.tgl_indo($data['tgl_kunjungan']).'</td>
</tr>
<tr>
    <td ></td>
    <td width="200" style="height:30px;">Jam</td>
    <td width="20" >:</td>
    <td colspan="2" >'.$jam_kunjungan.' WIB</td>
</tr>
<tr>
    <td ></td>
    <td width="200" style="height:30px;">Tempat</td>
    <td width="20" >:</td>
    <td colspan="2" >'.$data['tempat'].'</td>
</tr>
<tr>
    <td ></td>
    <td width="200" style="height:10px;"></td>
    <td width="20" ></td>
    <td colspan="2" ></td>
</tr>
<tr>
    <td ></td>
    <td width="200" style="height:30px; vertical-align: top;">Bertemu dengan</td>
    <td width="20" style="vertical-align: top;">:</td>
    <td >1. Guru BP/BK <br>2. Wali Kelas</td>
    <td >: '.$data['nama_bk'].' <br> : '.$data['nama_walikelas'].'</td>
</tr>
<tr>
    <td ></td>
    <td width="200" style="height:10px;"></td>
    <td width="20" ></td>
    <td colspan="2" ></td>
</tr>
<tr>
    <td ></td>
    <td width="200" style="height:30px; ; vertical-align: top;">Keperluan</td>
    <td width="20" style="vertical-align: top;">:</td>
    <td colspan="2" >Untuk Membicarakan Perkembangan Kegiatan Belajar Putra/Putri Saudara</td>
</tr>
<tr>
    <td ></td>
    <td width="200" style="height:10px;"></td>
    <td width="20" ></td>
    <td colspan="2" ></td>
</tr>
<tr>
    <td ></td>
    <td width="200" style="height:30px; ; vertical-align: top;">Catatan</td>
    <td width="20" style="vertical-align: top;">:</td>
    <td colspan="2" ><strong>Mengingat pentingnya acara mohon Bapak/Ibu hadir tepat waktu bersama anaknya, tidak mewakilkan.</strong></td>
</tr>
<tr>
    <td ></td>
    <td width="200" style="height:20px;"></td>
    <td width="20" ></td>
    <td colspan="2" ></td>
</tr>
</tbody>';

    echo '
	</table>
	</div></td>
	</tr>';

echo '<tr>
  <td colspan="4"><div align="justify">
  <table width="800" style="border: 0px solid black; border-collapse: collapse; margin-left: auto; margin-right: auto;  font-size:16px;">
    <tbody>';
    
    echo '<tr style="font-size:16px;">
    <td>
    <div align="justify">
  <p>Demikian, atas perhatian dan kehadirannya kami sampaikan terima kasih.<br>&nbsp</p>
    </div>
    </td>
  </tr>';

  echo '
  <tr>
  <td colspan="4"><div align="justify">
  <table border="0" width="800" style="margin-left: auto; margin-right: auto;">
  <tbody>
    <tr style="font-size:16px;">
      <td ></td>
      <td width="600">
        <br>
        Guru BP/BK
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <b>'.$data['nama_bk'].'</b>
        <br>
        NIP. '.$data['nip_bk'].'
      </td>
      <td width="300">
        <br>Wali Kelas
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <b>'.$data['nama_walikelas'].'</b>
        <br>
        NIP. '.$data['nip_walikelas'].'
      </td>
    </tr>
  </tbody>
  </table>
  </td>
  </tr>';
 
  echo '
  <tr>
  <td colspan="4"><div align="justify">
  <table border="0" width="800" style="margin-left: auto; margin-right: auto;">
  <tbody>
    <tr style="font-size:16px;">
      <td width="200">
      </td>
      <td width="400"><br>
       <center>Mengetahui,';
    if($data['pejabat_ttd'] == 'Wardoyo, S.Pd., M.Pd'){
    echo' <br>Kepala SMK Negeri 7 Surakarta
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <b>'.$hsl['nama_kepsek'].'</b>
    <br>
    NIP. '.$hsl['nip_kepsek'].'
    ';
    } else if($data['pejabat_ttd'] == 'Inti Kurniati Sri Utami, S.Si'){
    echo' <br>
    a.n. Kepala SMK Negeri 7 Surakarta <br>
    Plt. Ka Sub Bag Tata Usaha
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <b>Inti Kurniati Sri Utami, S.Si</b>
    <br>
    NIP. 197604102008012011
    ';
    }
    else if($data['pejabat_ttd'] == "Kristiyono, S.Pd"){
  echo'<br>
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
    echo '</center>
  <br>
  <br>
      </td>
      <td width="200">
        
      </td>
    </tr>
  </tbody>
  </table>
  </td>
  </tr>';

    echo '</tbody>
	</table>
	</div></td>
	</tr>';
  

}
  
  echo '
  </table>';


?>
</body>
</html>