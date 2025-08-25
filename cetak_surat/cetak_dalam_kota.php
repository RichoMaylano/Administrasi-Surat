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
    <title>Surat Tugas Guru (Dalam Kota) - 094/<?php echo $data['no_surat'];?> - <?php echo $data['nama_guru'];?> - <?php echo $data['nip_guru'];?></title>
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
<div><button class="no-print" style="height:40px;" onclick="window.print();"><i class="fa fa-download"></i>&nbspCetak Surat Tugas Guru (Dalam Kota)</button></div>
<?php
// 	include "phpqrcode/qrlib.php";
// 	include('database.php');
  $today = date("2025-08-17");
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
                  <td style="width: 90px;" rowspan="4">&nbsp&nbsp&nbsp&nbsp<img src="../assets/images/prov_jateng.png" alt=""  height="100px" /></td>
                  <td style="text-align: center;font-size:20px;">'.$hsl['pemerintah'].'</td>
                  <td style="width: 90px;" rowspan="4">&nbsp&nbsp&nbsp&nbsp<img src="../assets/images/SMKN7.png" alt=""  height="100px" /></td>
                </tr>
                <tr>
                  <td style="text-align: center;font-size:20px;"><b>'.$hsl['dinas'].'</b></td>
                </tr>
                <tr>
                  <td style="text-align: center;font-size:20px;"><b>'.$hsl['sekolah'].'</b></td>
                </tr>
                <tr>
                  <td style="text-align: center;font-size:12px;">'.$hsl['alamat'].' <br>Telepon 0271-718667 Faksimile 0271-718667 Surat Elektronik smkn7surakarta@gmail.com</td>
                </tr>
              </tbody>
</table>
<hr width="800" style="height:4px;border-width:2;color:black;background-color:black">	';
			
	echo '<table border="0" width=" 800" align="center">';
  
   echo '<tr>
    <td colspan="5" style="font-size:16px;"><div align="center">
      <b style="font-size:18px;">SURAT PERINTAH TUGAS</b>';

      if($data['no_surat'] == '0' || $data['no_surat'] == '-'){
        if($data['tgl_create'] <= $today){
          echo '<br>Nomor : 094/';
        } else {
          echo '<br>Nomor : 800.1.11.1/';
        }
      } else{
        if($data['tgl_create'] <= $today){
          echo '<br>Nomor : 094/'.$data['no_surat'].'';
        } else {
          echo '<br>Nomor : 800.1.11.1/'.$data['no_surat'].'';
        }
      }

      echo '
    </div><br><br></td>
  </tr>';

  echo '<tr>
  <td colspan="5"><div align="justify">
  <table width="800" style="border: 0px solid black; border-collapse: collapse; margin-left: auto; margin-right: auto; font-size:16px;">
    <tbody>';

    
    if($data['dasar_surat'] == ''){
      if($data['nama_guru'] == 'Wardoyo, S.Pd., M.Pd'){
        if($data['pejabat_ttd'] == 'Inti Kurniati Sri Utami, S.Si'){
          echo '<tr>
      <td width="250">Yang bertanda tangan di bawah ini Plt. Ka Sub Bag Tata Usaha SMK Negeri 7 Surakarta,</td>
    </tr>';
  
      echo '</tbody>
    </table>
    </div></td>
    </tr>';
  
    echo '<tr style="font-size:16px;">
    <td colspan="3">Nama</td>
    <td>:</td>
    <td><b>Inti Kurniati Sri Utami, S.Si</b></td>
  </tr>';
  
  echo '<tr style="font-size:16px;">
  <td colspan="3">NIP</td>
  <td>:</td>
    <td>197604102008012011</td>
  </tr>';
  
  echo '<tr style="font-size:16px;">
  <td colspan="3">Pangkat/Gol. Ruang</td>
  <td>:</td>
    <td>Penata Tingkat I/ III.d</td>
  </tr>';
  
  echo '<tr style="font-size:16px;">
  <td colspan="3">Jabatan/Unit Kerja</td>
  <td>:</td>
    <td>Plt. Ka Sub Bag Tata Usaha</td>
  </tr>';

  } else if($data['pejabat_ttd'] == 'Kristiyono, S.Pd'){
    echo '<tr>
      <td width="250">Yang bertanda tangan di bawah ini Plt. Ka Sub Bag Tata Usaha SMK Negeri 7 Surakarta,</td>
    </tr>';
  
      echo '</tbody>
    </table>
    </div></td>
    </tr>';
  
    echo '<tr style="font-size:16px;">
    <td colspan="3">Nama</td>
    <td>:</td>
    <td><b>Kristiyono, S.Pd</b></td>
  </tr>';
  
  echo '<tr style="font-size:16px;">
  <td colspan="3">NIP</td>
  <td>:</td>
    <td>196802211998021002</td>
  </tr>';
  
  echo '<tr style="font-size:16px;">
  <td colspan="3">Pangkat/Gol. Ruang</td>
  <td>:</td>
    <td>Pembina Tingkat I/ IV.b</td>
  </tr>';
  
  echo '<tr style="font-size:16px;">
  <td colspan="3">Jabatan/Unit Kerja</td>
  <td>:</td>
    <td>Plt. Ka Sub Bag Tata Usaha</td>
  </tr>';

    }
      }else{
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
    <td>Pembina Utama Muda/IV.c</td>
  </tr>';
  
  echo '<tr style="font-size:16px;">
  <td colspan="3">Jabatan/Unit Kerja</td>
  <td>:</td>
    <td>Kepala SMK Negeri 7 Surakarta</td>
  </tr>';
      }
  } else{
      echo '<tr style="font-size:16px; vertical-align: text-top;">
    <td width="100">Dasar</td>
    <td width="20">:</td>
    <td colspan="3"><div align="justify">'.$data['dasar_surat'].'</div></td>
  </tr>';
  }
  
 
  echo '<tr>
  <td colspan="5"><div align="justify">
  <table width="810" style="border: 0px solid black; border-collapse: collapse; margin-left: auto; margin-right: auto;">
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
  <td>';

  if($data['pangkat_guru'] == '-' || $data['golongan_guru'] == ''){
    echo '-';
     } else{
echo $data['pangkat_guru'] ?> / <?php echo $data['golongan_guru'];
}
echo '
  </td>
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
  <td width="100" align="">Untuk</td>
  <td width="20">:</td>
  <td colspan="3" style="line-height: 1.2;">'.$data['isi_surat'].'</td>
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
}else if($data['mulai_kegiatan'] == 'Menyesuaikan Jam Mengajar'){
    echo '<tr style="font-size:16px;">
        <td></td>
        <td></td>
        <td>Waktu</td>
        <td>:</td>
        <td>'.$data['mulai_kegiatan'].'</td>
        </tr>';
}
else {
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
  <td><b>'.$data['tempat'].'</b> <br>';
  if($data['jalan'] == '-' || $data['jalan'] == ''){
 echo '';
  }else{
    echo $data['jalan'];
  }
   echo '</td>
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

if($data['pejabat_ttd'] == 'Inti Kurniati Sri Utami, S.Si'){
  echo '
  <tr>
  <td colspan="4"><div align="justify">
  <table border="0" width="800" style="margin-left: auto; margin-right: auto;">
  <tbody>
    <tr style="font-size:16px;">
      <td width="600">
        <center><br>Mengetahui</center>
        <br>
        <br>
        <br>
        <br>
        <br>
      <center>(.................................)</center>
      </td>
      <td width="400">
      <br><br>
        Ditetapkan di &nbsp: Surakarta<br>
        pada tanggal &nbsp: '.tgl_indo($data['tgl_create']).'<br>
        a.n. Kepala SMK Negeri 7 Surakarta <br>
        Plt. Ka Sub Bag Tata Usaha
        <br><br><br><br><br><br>
        <b>Inti Kurniati Sri Utami, S.Si</b>
          <br>
          Penata Tingkat I/ III.d
          <br>
          NIP. 197604102008012011
      </td>
    </tr>
  </tbody>
  </table>
  </td>
  </tr>';
} else if($data['pejabat_ttd'] == 'Kristiyono, S.Pd'){
  echo '
  <tr>
  <td colspan="4"><div align="justify">
  <table border="0" width="800" style="margin-left: auto; margin-right: auto;">
  <tbody>
    <tr style="font-size:16px;">
      <td width="600">
        <center><br>Mengetahui</center>
        <br>
        <br>
        <br>
        <br>
        <br>
      <center>(.................................)</center>
      </td>
      <td width="400">
      <br><br>
        Ditetapkan di &nbsp: Surakarta<br>
        pada tanggal &nbsp: '.tgl_indo($data['tgl_create']).'<br>
        a.n. Kepala SMK Negeri 7 Surakarta <br>
        Plt. Ka Sub Bag Tata Usaha
        <br><br><br><br><br><br>
        <b>Kristiyono, S.Pd</b>
          <br>
          Pembina Tingkat I/ IV.b
          <br>
          NIP. 196802211998021002
      </td>
    </tr>
  </tbody>
  </table>
  </td>
  </tr>';
} else if($data['pejabat_ttd'] == 'Wardoyo, S.Pd., M.Pd'){
  echo '
  <tr>
  <td colspan="4"><div align="justify">
  <table border="0" width="800" style="margin-left: auto; margin-right: auto;">
  <tbody>
    <tr style="font-size:16px;">
      <td width="400">
        <center><br>Mengetahui</center>
        <br>
        <br>
        <br>
        <br>
        <br>
      <center>(.................................)</center>
      </td>
      <td width="200"></td>
      <td width="400">
      <br><br>
        Ditetapkan di &nbsp: Surakarta<br>
        pada tanggal &nbsp&nbsp: '.tgl_indo($data['tgl_create']).'<br>
        Kepala Sekolah
        <br><br><br><br><br><br>
        <b>'.$hsl['nama_kepsek'].'</b>
        <br>
        Pembina Utama Muda/IV.c
        <br>
        NIP. '.$hsl['nip_kepsek'].'
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