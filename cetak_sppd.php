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
    <title>SPPD - <?php echo $data['nama_guru'];?> - <?php echo $data['nip_guru'];?></title>
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
<div><button class="no-print" style="height:40px;" onclick="window.print();"><i class="fa fa-download"></i>&nbspCetak SPPD</button></div>
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
      <b style="font-size:20px;">SURAT PERINTAH PERJALANAN DINAS</b>
      <br>Nomor : 900/'.$data['no_surat_sppd'].'
    </div><br><br></td>
  </tr>';

  echo '<tr>
  <td colspan="5"><div align="justify">
  <table width="800" style="border: 1px solid black; border-collapse: collapse; margin-left: auto; margin-right: auto;">
  <tbody>';

   echo '<tr>
          <td width="50" align="center" style="border: 1px solid black"><br>1. <br>&nbsp</td>
          <td width="5" style="border-right-style:hidden;"></td>
          <td width="325" style="border: 1px solid black;">Pejabat yang memberi perintah</td>
          <td width="5" style="border-right-style:hidden;"></td>
          <td width="250" style="border: 1px solid black">';
          if($data['nama_guru'] == 'Wardoyo, S.Pd., M.Pd'){
            echo 'Plt. Ka Sub Bag Tata Usaha';
          } else {
            echo 'Kepala SMK Negeri 7 Surakarta';
          }
          echo '</td>
      </tr>';
   echo '<tr>
          <td align="center" style="border: 1px solid black">2. </td>
          <td style="border: 1px solid black; border-right-style:hidden;"></td>
          <td style="border: 1px solid black;">Nama Gubernur/Wakil Gubernur/Pimpinan dan Anggota DPRD/Pegawai ASN dan NIP/CPNS dan NIP/Pegawai Non ASN yang melaksanakan Perjalanan Dinas</td>
          <td style="border: 1px solid black; border-right-style:hidden;"></td>
          <td style="border: 1px solid black"><b>'.$data['nama_guru'].'</b></td>
      </tr>';
   echo '<tr>
          <td align="center" style="border: 1px solid black">3. </td>
          <td style="border: 1px solid black; border-right-style:hidden;"></td>
          <td style="border: 1px solid black;">a. Pangkat dan Golongan <br> b. Jabatan</td>
          <td style="border: 1px solid black; border-right-style:hidden;"></td>
          <td style="border: 1px solid black">';
          if($data['pangkat_guru'] == '-' && $data['golongan_guru'] == '-'){
            echo 'a. - <br> b. '.$data['jabatan'].'';
          } else {
            echo 'a. '.$data['pangkat_guru'].'/'.$data['golongan_guru'].' <br> b. '.$data['jabatan'].'';
          }
          echo '</td>
      </tr>';
   echo '<tr>
          <td align="center" style="border: 1px solid black">4. </td>
          <td style="border: 1px solid black; border-right-style:hidden;"></td>
          <td style="border: 1px solid black;">Maksud Mengadakan Perjalanan</td>
          <td style="border: 1px solid black; border-right-style:hidden;"></td>
          <td style="border: 1px solid black">'.$data['tujuan_sppd'].'</td>
      </tr>';
   echo '<tr>
          <td align="center" style="border: 1px solid black">5. </td>
          <td style="border: 1px solid black; border-right-style:hidden;"></td>
          <td style="border: 1px solid black;">Alat Angkut yang Dipergunakan</td>
          <td style="border: 1px solid black; border-right-style:hidden;"></td>
          <td style="border: 1px solid black">Umum</td>
      </tr>';
   echo '<tr>
          <td align="center" style="border: 1px solid black">6. </td>
          <td style="border: 1px solid black; border-right-style:hidden;"></td>
          <td style="border: 1px solid black;">a. Tempat Berangkat <br> b. Tempat Tujuan</td>
          <td style="border: 1px solid black; border-right-style:hidden;"></td>
          <td style="border: 1px solid black">a. SMK Negeri 7 Surakarta <br> b. '.$data['tempat_sppd'].'</td>
      </tr>';
   echo '<tr>
          <td align="center" style="border: 1px solid black">7. </td>
          <td style="border: 1px solid black; border-right-style:hidden;"></td>
          <td style="border: 1px solid black;">a. Lamanya Perjalanan Dinas <br> b. Tanggal Berangkat <br> c. Tanggal Harus Kembali/Tiba di Tempat Baru *)</td>
          <td style="border: 1px solid black; border-right-style:hidden;"></td>
          <td style="border: 1px solid black">a.';
          if($data['tgl_selesai'] == '0000-00-00'){
            $tgl_mulai = date_create($data['tgl_kegiatan']);
            $tgl_selesai = date_create($data['tgl_kegiatan']);
          } else {
            $tgl_mulai = date_create($data['tgl_kegiatan']);
            $tgl_selesai = date_create($data['tgl_selesai']);
          }
          $selisih  = date_diff($tgl_mulai, $tgl_selesai);
          $hasil = $selisih->days;
          if($hasil == '0'){
           echo '&nbsp1 Hari';
          }else {
            echo '&nbsp'.$hasil." Hari";
          }

           echo '<br> b. '.tgl_indo($data['tgl_kegiatan']).' <br> c.'; 
          if($data['tgl_selesai'] == '0000-00-00'){
            echo ' '.tgl_indo($data['tgl_kegiatan']).'';
          } else {
            echo ' '.tgl_indo($data['tgl_selesai']).'';
          }
          echo '</td>
      </tr>';
      echo '<tr>
          <td align="center" style="border: 1px solid black">8. </td>
          <td style="border: 1px solid black; border-right-style:hidden;"></td>
          <td style="border: 1px solid black;">Pengikut</td>
          <td style="border: 1px solid black; border-right-style:hidden;"></td>
          <td style="border: 1px solid black">-</td>
      </tr>';
      echo '<tr>
          <td align="center" style="border: 1px solid black">9. </td>
          <td style="border: 1px solid black; border-right-style:hidden;"></td>
          <td style="border: 1px solid black;">Pembebanan Anggaran <br> a. Instansi <br> b. Mata Anggaran</td>
          <td style="border: 1px solid black; border-right-style:hidden;"></td>
          <td style="border: 1px solid black"><br>a. SMK Negeri 7 Surakarta <br> b. '.$data['mata_anggaran'].'</td>
      </tr>';
      echo '<tr>
          <td align="center" style="border: 1px solid black"><br>10. <br>&nbsp</td>
          <td style="border: 1px solid black; border-right-style:hidden;"></td>
          <td style="border: 1px solid black;"><br>Keterangan Lain-Lain <br>&nbsp</td>
          <td style="border: 1px solid black; border-right-style:hidden;"></td>
          <td style="border: 1px solid black"></td>
      </tr>';

    echo '</tbody>
	</table>
	</div></td>
	</tr>';
  
    
echo '<tr>
  <td colspan="5"><div align="justify">
  <table width="800" style="border: 0px solid black; border-collapse: collapse; margin-left: auto; margin-right: auto;">
    <tbody>';
    
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