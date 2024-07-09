<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <?php 
    include "phpqrcode/qrlib.php";
	include('tgl_indo.php');
	include('database.php');
    $no_surat = $_GET['no_surat'];
    $tanggal = date('Y-m-d');
    $a = mysqli_query($db_conn,"SELECT * FROM surgas_guru WHERE no_surat='$no_surat'");
    $data = mysqli_fetch_array($a);
    ?>
    <title>Surat Tugas Guru (Luar Kota) - <?php echo $data['nama_guru'];?> - <?php echo $data['nip_guru'];?></title>
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
	font-family: Bookman old style;
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
<div><button class="no-print" style="height:40px;" onclick="window.print();"><i class="fa fa-download"></i>&nbspCetak Surat Tugas Guru (Luar Kota)</button></div>
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

    echo '<table width="800" align="center">
    <tbody>
        <tr>
            <td style="width: 77px;" rowspan="4"><img src="prov_jateng.png" alt=""  height="110" /></td>
            <td style="text-align: center;font-size:17px;"><b>'.$hsl['pemerintah'].'</b></td>
            <td style="width: 77px;" rowspan="4">&nbsp;</td>
        </tr>
        <tr>
            <td style="text-align: center;font-size:17px;"><b>'.$hsl['dinas'].'</b></td>
        </tr>
        <tr>
            <td style="text-align: center;font-size:19px;"><b>'.$hsl['sekolah'].'</b></td>
        </tr>
        <tr>
            <td style="text-align: center; font-size:10px;">'.$hsl['alamat'].'
            <br>Telepon 0271-718667 Faksimile 0271-718667 Surat Elektronik smkn7surakarta@gmail.com</td>
        </tr>
    </tbody>
</table>
<hr width="800" style="height:2px;border-width:2;color:gray;background-color:gray">	';
			
	echo '<table border="0" width=" 800" align="center">';
  
   echo '<tr>
    <td colspan="5" style="font-size:16px;"><div align="center">
      <b style="font-size:20px;">SURAT PERINTAH TUGAS</b>
      <br>Nomor : 094/'.$data['no_surat'].'
    </div><br><br></td>
  </tr>';

  echo '<tr>
  <td colspan="5"><div align="justify">
  <table width="800" style="border: 0px solid black; border-collapse: collapse; margin-left: auto; margin-right: auto; font-size:16px;">
    <tbody>';

    
if($data['dasar_surat'] == ''){
    echo '<tr>
    <td width="250">Yang bertanda tangan di bawah ini Kepala SMK Negeri 7 Surakarta,</td>
  </tr>';

    echo '</tbody>
	</table>
	</div></td>
	</tr>';

  echo '<tr style="font-size:16px;">
  <td colspan="3">Nama</td>
  <td>:</td>
  <td><b>'.$hsl['nama_kepsek'].' </b></td>
</tr>';

echo '<tr style="font-size:16px;">
<td colspan="3">NIP</td>
<td>:</td>
  <td>'.$hsl['nip_kepsek'].'</td>
</tr>';

echo '<tr style="font-size:16px;">
<td colspan="3">Pangkat/Gol. Ruang</td>
<td>:</td>
  <td>Pembina Tingkat 1/ IV.b</td>
</tr>';

echo '<tr style="font-size:16px;">
<td colspan="3">Jabatan/Unit Kerja</td>
<td>:</td>
  <td>Kepala SMK Negeri 7 Surakarta</td>
</tr>';
} else {
    echo '<tr style="font-size:16px; vertical-align: text-top;">
  <td width="100">Dasar</td>
  <td width="20">:</td>
  <td colspan="3"><div align="justify">'.$data['dasar_surat'].'</div></td>
</tr>';
}
  
 
  echo '<tr>
  <td colspan="5"><div align="justify">
  <table width="800" style="border: 0px solid black; border-collapse: collapse; margin-left: auto; margin-right: auto;">
    <tbody>';
    
    echo '<tr style="font-size:18px;">
    <td width="250"><center><br>MEMERINTAHKAN</center><br></td>
  </tr>';

    echo '</tbody>
	</table>
	</div></td>
	</tr>';

  echo '<tr style="font-size:16px;">
  <td width="100">Kepada</td>
  <td width="30">:</td>
  <td width="180">Nama</td>
  <td>:</td>
  <td><b> '.$data['nama_guru'].' </b></td>
</tr>';

echo '<tr style="font-size:16px;">
<td></td>
<td></td>
  <td>NIP</td>
  <td>:</td>
  <td>'.$data['nip_guru'].'</td>
</tr>';

echo '<tr style="font-size:16px;">
<td></td>
<td></td>
  <td>Pangkat/Gol. Ruang</td>
  <td>:</td>
  <td>'.$data['pangkat_guru'].'/'.$data['golongan_guru'].'</td>
</tr>';

echo '<tr style="font-size:16px;">
<td></td>
<td></td>
  <td>Jabatan</td>
  <td>:</td>
  <td>'.$data['jabatan'].'</td>
</tr>';

echo '<tr style="font-size:16px;">
<td></td>
<td></td>
  <td>Instansi</td>
  <td>:</td>
  <td>SMK Negeri 7 Surakarta</td>
</tr>';

echo '<tr>
  <td><br></td>
</tr>';

echo '<tr style="font-size:16px;vertical-align: text-top;">
  <td width="100">Untuk</td>
  <td width="20">:</td>
  <td colspan="3" style="line-height: 1.2;"><div align="justify">'.$data['isi_surat'].'</div></td>
</tr>';

echo '<tr>
  <td><br></td>
</tr>';

$hari = array ( 1 =>    'Senin',
			'Selasa',
			'Rabu',
			'Kamis',
			'Jumat',
			'Sabtu',
			'Minggu'
		);
  $tgl = date('N', strtotime($data['tgl_kegiatan']));
  $tgl2 = date('N', strtotime($data['tgl_selesai']));

if($data['tgl_selesai'] == '0000-00-00'){
    echo '<tr style="font-size:16px;">
    <td></td>
    <td></td>
    <td>Hari / Tanggal</td>
    <td>:</td>
    <td>'.$hari[$tgl].', '.tgl_indo($data['tgl_kegiatan']).'</td>
    </tr>';
} else {
    echo '<tr style="font-size:16px;">
    <td></td>
    <td></td>
    <td>Hari / Tanggal</td>
    <td>:</td>
    <td>'.$hari[$tgl].' s.d. '.$hari[$tgl2].', '.tgl_indo($data['tgl_kegiatan']).' s.d. '.tgl_indo($data['tgl_selesai']).'</td>
    </tr>';
}

if($data['mulai_kegiatan'] == '' && $data['sampai_kegiatan'] == ''){
    echo '<tr style="font-size:16px;">
    <td></td>
    <td></td>
    <td>Pembukaan</td>
    <td>:</td>
    <td>'.$hari[$tgl].', '.tgl_indo($data['tgl_kegiatan']).', Pukul '.$data['jam_pembukaan'].'</td>
    </tr>';
    
    echo '<tr style="font-size:16px;">
    <td></td>
    <td></td>
    <td>Penutupan</td>
    <td>:</td>
    <td>'.$hari[$tgl2].', '.tgl_indo($data['tgl_selesai']).', Pukul '.$data['jam_penutupan'].'</td>
    </tr>';
}else {
    if($data['sampai_kegiatan'] == 'Selesai' || $data['sampai_kegiatan'] == 'selesai'){
        echo '<tr style="font-size:16px;">
        <td></td>
        <td></td>
        <td>Waktu</td>
        <td>:</td>
        <td>Pukul '.$data['mulai_kegiatan'].' WIB - '.$data['sampai_kegiatan'].'</td>
        </tr>';
    } else {
        echo '<tr style="font-size:16px;">
        <td></td>
        <td></td>
        <td>Waktu</td>
        <td>:</td>
        <td>Pukul '.$data['mulai_kegiatan'].' - '.$data['sampai_kegiatan'].' WIB</td>
        </tr>';
    }
}




echo '<tr style="font-size:16px; vertical-align: text-top;">
<td></td>
<td></td>
  <td>Tempat</td>
  <td>:</td>
  <td><b>'.$data['tempat'].'</b> <br> '.$data['jalan'].'</td>
</tr>';

    
echo '<tr>
  <td colspan="5"><div align="justify">
  <table width="800" style="border: 0px solid black; border-collapse: collapse; margin-left: auto; margin-right: auto;">
    <tbody>';
    
    echo '<tr style="font-size:16px;">
    <td><br><div align="justify"><p>Demikian agar dapat dilaksanakan dengan sebaik-baiknya, serta menyampaikan laporan setelah melaksanakan tugas.</p>
    </div></td>
  </tr>';


    echo '</tbody>
	</table>
	</div></td>
	</tr>';
}
  
  echo '
  </table>';

if($data['nama_guru'] == 'Wardoyo, S.Pd., M.Pd'){
    echo '
    <tr>
    <td colspan="4"><div align="justify">
    <table border="0" width="800" style="margin-left: auto; margin-right: auto;">
    <tbody>
      <tr style="font-size:16px;">
        <td width="600">
         
        </td>
        <td width="400">
        <br><br>
          Ditetapkan di &nbsp: Surakarta<br>
          pada tanggal &nbsp: '.tgl_indo($tanggal).'<br>
          Plt. Ka Sub Bag Tata Usaha
          <br><br><br><br><br><br>
          <b>Kristiyono, S.Pd</b>
          <br>
          Pembina/ IV.a
          <br>
          NIP. 19680221 199802 1 002
        </td>
      </tr>
    </tbody>
    </table>
    </td>
    </tr>';
}else{
  echo '
  <tr>
  <td colspan="4"><div align="justify">
  <table border="0" width="800" style="margin-left: auto; margin-right: auto;">
  <tbody>
    <tr style="font-size:16px;">
      <td width="600">
       
      </td>
      <td width="400">
      <br><br>
        Ditetapkan di &nbsp: Surakarta<br>
        pada tanggal &nbsp: '.tgl_indo($tanggal).'<br>
        Kepala Sekolah
        <br><br><br><br><br><br>
        <b>'.$hsl['nama_kepsek'].'</b>
        <br>
        Pembina Tingkat 1/IV.b
        <br>
        NIP. 19850909 202221 1 011
      </td>
    </tr>
  </tbody>
  </table>
  </td>
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