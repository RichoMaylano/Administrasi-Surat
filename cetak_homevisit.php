<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <?php 
    include "phpqrcode/qrlib.php";
	include('tgl_indo.php');
	include('database.php');
    $no_surat = $_GET['no_surat'];
    $tanggal = date('Y-m-d');
    $a = mysqli_query($db_conn,"SELECT * FROM homevisit WHERE no_surat='$no_surat'");
    $data = mysqli_fetch_array($a);
    ?>
    <title>Surat Homevisit - <?php echo $data['nama_lengkap'];?> - <?php echo $data['kelas'];?></title>
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
	font-family: tahoma;
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
<div><button class="no-print" style="height:40px;" onclick="window.print();"><i class="fa fa-download"></i>&nbspCetak Surat Kunjungan / Homevisit</button></div>
<?php
// 	include "phpqrcode/qrlib.php";
// 	include('database.php');
	$que = mysqli_query($db_conn, "SELECT * FROM data_konfig");
	$hsl = mysqli_fetch_array($que);
	
	$no_surat = $_GET['no_surat'];
	//$q = mysqli_query("SELECT * FROM data_siswa where noujian = '$noujian'");
	$q = mysqli_query($db_conn,"SELECT * FROM homevisit WHERE no_surat='$no_surat'");
	if(mysqli_num_rows($q) > 0){
				$data = mysqli_fetch_array($q);

    echo '<table width="800" align="center">
    <tbody>
        <tr>
            <td style="width: 77px;" rowspan="4"><img src="prov_jateng.png" alt=""  height="110" /></td>
            <td style="text-align: center;font-size:16px;"><b>'.$hsl['pemerintah'].'</b></td>
            <td style="width: 77px;" rowspan="4">&nbsp;</td>
        </tr>
        <tr>
            <td style="text-align: center;font-size:16px;"><b>'.$hsl['dinas'].'</b></td>
        </tr>
        <tr>
            <td style="text-align: center;font-size:17px;"><b>'.$hsl['sekolah'].'</b></td>
        </tr>
        <tr>
            <td style="text-align: center; font-size:12px;">'.$hsl['alamat'].'
            <br>Telepon 0271-718667 Faksimile 0271-718667 Surat Elektronik smkn7surakarta@gmail.com</td>
        </tr>
    </tbody>
</table>
<hr width="800" style="height:2px;border-width:2;color:gray;background-color:gray">	';
			
	echo '<table border="0" width="800" align="center">';
  
  echo '<tr>
  <td colspan="4"><div align="justify">
  <table width="800" style="border: 0px solid black; border-collapse: collapse; margin-left: auto; margin-right: auto;">
    <tbody>';
    
    echo '<tr style="font-size:16px;">
    <td width="500"></td>
    <td>Surakarta, '.tgl_indo($data['tgl_create']).'</td>
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
    <td width="20">Nomor </td>
    <td width="320"> : 094/'.$data['no_surat'].'</td>
    <td width="">Kepada</td>
  </tr>';
    
    echo '<tr style="font-size:16px;">
    <td width="20">Hal </td>
    <td width="320"> : <b>Kunjungan Rumah</b></td>
    <td width="5">Yth</td>
    <td width="">Bp/Ibu <b>'.$data['nama_ayah'].'/ '.$data['nama_ibu'].'</b> </td>
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
    <td width=""><b>'.$data['nama_lengkap'].'</b></td>
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

    echo '<tr><br>
    <td><p style="text-indent: 50px;">Kepala SMK Negeri 7 Surakarta, bahwa sebagai upaya peningkatan hasil kegiatan Proses Belajar Mengajar :</p></td>
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
    <td><p align="center"><b>MENUGASKAN</b></p></td>
  </tr>';
    
  echo '<tr>
    <td><p align="center">Kepada</p></td>
  </tr>';

    echo '</tbody>
	</table>
	</div></td>
	</tr>';

  echo '<tr>
  <td colspan="4"><div align="justify">
  <table width="800" style="border: 1px solid black; border-collapse: collapse; margin-left: auto; margin-right: auto;">
    <thead align="center">
      <th style="border: 1px solid black">No</th>
      <th style="border: 1px solid black;border-right-style: hidden;"></th>
      <th style="border: 1px solid black">Nama / NIP</th>
      <th style="border: 1px solid black">Pangkat / Golongan</th>
      <th style="border: 1px solid black">Pekerjaan</th>
      <th style="border: 1px solid black">Keterangan</th>
    </thead>  
  <tbody>';

   echo '<tr>
          <td align="center" style="border: 1px solid black">1. </td>
          <td width="2" style="border: 1px solid black;border-right-style: hidden;"></td>
          <td style="border: 1px solid black"><b>'.$data['nama_walikelas'].'</b><br>NIP. '.$data['nip_walikelas'].'</td>
          <td style="border: 1px solid black" align="center">'.$data['pangkat_walikelas'].'/'.$data['golongan_walikelas'].'</td>
          <td style="border: 1px solid black" align="center">Guru</td>
          <td style="border: 1px solid black" align="center">Wali Kelas</td>
      </tr>';
   echo '<tr>
          <td align="center" style="border: 1px solid black">2. </td>
          <td width="2" style="border: 1px solid black;border-right-style: hidden;"></td>
          <td style="border: 1px solid black"><b>'.$data['nama_bk'].'</b><br>NIP. '.$data['nip_bk'].'</td>
          <td style="border: 1px solid black" align="center">'.$data['pangkat_bk'].'/'.$data['golongan_bk'].'</td>
          <td style="border: 1px solid black" align="center">Guru</td>
          <td style="border: 1px solid black" align="center">BP/BK</td>
      </tr>';

    echo '</tbody>
	</table>
	</div></td>
	</tr>';

  
 
  echo '<tr>
  <td colspan="4"><div align="justify">
  <table width="800" style="border: 0px solid black; border-collapse: collapse; margin-left: auto; margin-right: auto; font-size:16px;">
    <tbody>';
    
    echo '<tr><br>
    <td><p>Untuk mengadakan kunjungan ke rumah Bapak/Ibu/Wali Siswa pada :</p></td>
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
  <td width="170">Hari</td>
  <td>: '.$hari[$tgl].', '.tgl_indo($data['tgl_kunjungan']).'</td>
</tr>';

echo '<tr >
  <td>Jam</td>
  <td>: '.$data['jam_kunjungan'].' WIB</td>
</tr>';

echo '<tr>
  <td>Keperluan</td>
  <td>: Membicarakan perkembangan belajar Putra/Putri Bapak/Ibu, a.n :</td>
</tr>';

echo '<tr>
  <td>Nama</td>
  <td>: <b>'.$data['nama_lengkap'].'</b></td>
</tr>';

echo '<tr>
  <td>Kelas</td>
  <td>: '.$data['kelas'].'</td>
</tr>';

echo '<tr>
  <td colspan="4"><div align="justify">
  <table width="800" style="border: 0px solid black; border-collapse: collapse; margin-left: auto; margin-right: auto;  font-size:16px;">
    <tbody>';
    
    echo '<tr style="font-size:16px;">
    <td>
    <div align="justify">
  <p style="text-indent: 50px;">Kami harapkan agar saudara bersedia menerima kunjungan tersebut. Sebagai bukti kesediaan, kami harapkan saudara berkenan mengisi dan mengirimkan kembali blangko yang tertulis di bawah surat ini.</p>
    <br></div>
    </td>
  </tr>';

  echo '
  <tr>
  <td colspan="4"><div align="justify">
  <table border="0" width="800" style="margin-left: auto; margin-right: auto;">
  <tbody>
    <tr style="font-size:16px;">
      <td width="500">
        Mengetahui,
        <br>
        Kepala SMK Negeri 7 Surakarta
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
      </td>
      <td width="400">
        <br>
        Koordinator BP/BK SMK Negeri 7 Surakarta
        <img src="TTD_dwi.png" width="65%"><br>
        <b>Dwi Utomo, S.Pd</b>
        <br>
        NIP. 19850909 202221 1 011
      </td>
    </tr>
  </tbody>
  </table>
  </td>
  </tr>';


  echo '<tr>
  <td colspan="4"><div align="justify">
  <table width="800" style="border: 0px solid black; border-collapse: collapse; margin-left: auto; margin-right: auto;  font-size:16px;">
    <tbody>';
    
    echo '<tr style="font-size:16px;" align="center">
      <br>
    <td width="320">
    <hr style="border:1px dashed" align="left">
    </td>
    <td><b><i>Potong disini</i></b></td>
    <td width="320">
    <hr style="border:1px dashed" align="right">
    </td>
  </tr>';


    echo '</tbody>
	</table>
	</div></td>
	</tr>';

  
  echo '<tr>
  <td colspan="4"><div align="justify">
  <table width="800" style="border: 0px solid black; border-collapse: collapse; margin-left: auto; margin-right: auto;  font-size:16px;">
    <tbody>';
    
    echo '<tr style="font-size:16px;">
      <br>
    <td>
    <p>Bersedia menerima kunjungan para petugas SMK Negeri 7 Surakarta</p>
    <p style="text-indent: 50px;">1.  .....................................................................................</p> 
    <p style="text-indent: 50px;">2.  .....................................................................................</p> 
    </td>
  </tr>';

  echo '
  <tr>
  <td colspan="4"><div align="justify">
  <table border="0" width="800" style="margin-left: auto; margin-right: auto;">
  <tbody>
  <tr style="font-size:16px;">
  <br><td width="200"></td>
  <td width="250"></td>
  <td>Hormat Kami
  <br>
  Orang Tua / Wali Murid
  <br>
  <br>
  <br>
  <br>
  ..................................
  <br>
  <br>
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