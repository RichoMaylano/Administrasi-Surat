<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <?php 
    include "../phpqrcode/qrlib.php";
	include('../database.php');
    $nisn = $_GET['nisn'];
    $a = mysqli_query($db_conn,"SELECT * FROM data_siswa WHERE nisn='$nisn'");
    $data = mysqli_fetch_array($a);
    ?>
    <title>SKL Asli <?php echo $data['nis'];?> - <?php echo $data['jurusan'];?></title>
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
	font-family:Times New Roman;
}

</style>

<!-- Favicons -->
	<link href="../SMKN7.png" rel="icon">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<!--  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">   -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div><button class="no-print" style="height:40px;" onclick="window.print();"><i class="fa fa-download"></i>&nbspCetak SKL</button></div>
<?php
// 	include "../phpqrcode/qrlib.php";
// 	include('../database.php');
	$que = mysqli_query($db_conn, "SELECT * FROM data_konfig");
	$hsl = mysqli_fetch_array($que);
	
	$nisn = $_GET['nisn'];
	//$q = mysqli_query("SELECT * FROM data_siswa where noujian = '$noujian'");
	$q = mysqli_query($db_conn,"SELECT * FROM data_siswa WHERE nisn='$nisn'");
	if(mysqli_num_rows($q) > 0){
				$data = mysqli_fetch_array($q);
	
//	while($r = mysql_fetch_array($q))
//	{
  echo '<table width="800" align="center">
			<tbody>
				<tr>
					<td style="width: 77px;" rowspan="4"><img src="../prov_jateng.png" alt=""  height="86" /></td>
					<td style="text-align: center;font-size:20px;"><b>'.$hsl['pemerintah'].'</b></td>
					<td style="width: 77px;" rowspan="4">&nbsp;</td>
				</tr>
				<tr>
					<td style="text-align: center;font-size:20px;"><b>'.$hsl['dinas'].'</b></td>
				</tr>
				<tr>
					<td style="text-align: center;font-size:20px;"><b>'.$hsl['sekolah'].'</b></td>
				</tr>
				<tr>
					<td style="text-align: center;">'.$hsl['alamat'].'</td>
				</tr>
			</tbody>
		</table>
		<hr width="800" style="height:2px;border-width:2;color:gray;background-color:gray">	';
			
	echo '<table width="800" align="center">';
  
   echo '<tr>
    <td colspan="4"><div align="center">
      <p><b>SURAT KETERANGAN LULUS</b>
    </div></td>
  </tr>';

   echo '<tr>
    <td colspan="4"><div align="center">
      <p><b>SMK NEGERI 7 SURAKARTA</b>
    </div></td>
  </tr>';

   echo '<tr>
    <td colspan="4"><div align="center">
      <p><b>PROGRAM 3 TAHUN</b>
    </div>
    </td>
  </tr>';

   echo '<tr>
    <td colspan="4"><div align="center">
      <p><b>TAHUN AJARAN 2023/'.$hsl['tahun'].'</b>
    </div><br></td>
  </tr>';

  echo '<tr>
  <td colspan="2">
  <td><b>Program Keahlian</b></td>
  <td><b> : '.$data['jurusan'].' </b>
   </td>
 </tr>';

  echo '<tr>
  <td colspan="2">
  <td><b>Konsentrasi Keahlian</b></td> 
  <td><b> : ';
   if($data['jurusan']=="Desain Komunikasi Visual"){ echo "Desain Komunikasi Visual"; 
   } else if ($data['jurusan']=="Kuliner"){ echo "Kuliner"; 
     } else if ($data['jurusan']=="Usaha Layanan Pariwisata"){ echo "Usaha Layanan Wisata"; 
       } else if ($data['jurusan']=="Perhotelan"){ echo "Perhotelan"; 
         } else if ($data['jurusan']=="Pekerjaan Sosial"){ echo "Pekerja Sosial"; 
           } else if ($data['jurusan']=="Broadcasting dan Perfilman"){ echo "Produksi dan Siaran Program Televisi"; 
             }
     '</b>
   </td>
 </tr>';
  
   echo '<tr>
    <td colspan="4"><div align="center">
       <br>Nomor : 421.3/820</p>
    </div></td>
  </tr>';
  echo '<tr>
    <td colspan="4"><div align="justify">
      <br>
      <p>Yang bertanda tangan di bawah ini, Kepala '.$hsl['sekolah'].', Provinsi Jawa Tengah menerangkan bahwa :</p>

    </div></td>
  </tr>';
  echo '<tr>
    <td height="26">&nbsp;</td>
    <td>Nama</td>
    <td colspan="2">: '.$data['nama'].' </td>
  </tr>';
  echo '<tr>
    <td height="26">&nbsp;</td>
    <td>Tempat, Tanggal Lahir</td>
    <td colspan="2">: '.$data['tempat_lahir'].', '.$data['tanggal_lahir'].' </td>
  </tr>';
  echo '<tr>
    <td height="26">&nbsp;</td>
    <td>Nama Orang tua/Wali</td>
    <td colspan="2">: '.$data['nama_ortu'].'</td>
  </tr>';
//   echo '<tr>
//     <td height="26">&nbsp;</td>
//     <td>Kompetensi Keahlian</td>
//     <td colspan="2">: '; 
//     if($data['jurusan']=="Keperawatan Sosial"){ echo "<i>Sosial Care</i> (Keperawatan Sosial)"; 
//     }  else {
//       echo $data['jurusan'];
//     }
//     ' </td>
//   </tr>';
//   echo '<tr>
//     <td height="26">&nbsp;</td>
//     <td>Program Keahlian</td>
//     <td colspan="2">: '; 
//     if($data['jurusan']=="Multimedia"){ echo "Teknik Komputer dan Informatika"; 
//     } else if ($data['jurusan']=="Tata Boga"){ echo "Kuliner"; 
//       } else if ($data['jurusan']=="Usaha Perjalanan Wisata"){ echo "Perhotelan dan Jasa Pariwisata"; 
//         } else if ($data['jurusan']=="Perhotelan"){ echo "Perhotelan dan Jasa Pariwisata"; 
//           } else if ($data['jurusan']=="Keperawatan Sosial"){ echo "Pekerjaan Sosial"; 
//             } else if ($data['jurusan']=="Produksi dan Siaran Program Televisi"){ echo "Seni Broadcasting dan Film"; 
//               }
//     ' </td>
//   </tr>';
  
  
  echo '<tr>
    <td  height="26" width="70">&nbsp;</td>
    <td width="165">NIS</td>
    <td colspan="2">: '.$data['nis'].' </td>
  </tr>';  
  echo '<tr>
    <td  height="26" width="70">&nbsp;</td>
    <td width="165">NISN</td>
    <td colspan="2">: '.$data['nisn'].' </td>
  </tr>';  

  echo '<tr>
    <td colspan="4"><div align="justify">
      <p>dinyatakan <b>';

		if( $data['status'] == 1 ){echo 'LULUS';} else {echo 'TIDAK LULUS';}	  
	echo '</b> dari satuan pendidikan berdasarkan kriteria kelulusan '.$hsl['sekolah'].' Tahun Ajaran 2023/'.$hsl['tahun'].' ';
		
		if( $data['agama'] == "" and $data['pancasila'] == "" and $data['bhs_indo'] == "" and $data['matematika'] == ""){
							echo '.';
						}
						else {  echo ', dengan nilai sebagai berikut :</p></div></td>
		  </tr>';					
						}					

if( $data['agama'] == "" and $data['pancasila'] == "" and $data['bhs_indo'] == "" and $data['matematika'] == ""){
					echo '<br/>';
				}

  //Desain Komunikasi Visual
	else if ($data['jurusan'] == "Desain Komunikasi Visual"){  
    echo '<tr>
    <td colspan="4"><div align="justify">
    <table width="650" style="border: 1px solid black; border-collapse: collapse; margin-left: auto; margin-right: auto;">
      <tbody >
  
      <tr>
      <td  style="border: 1px solid black;" align="center"><b>No.</b></td>
      <td  style="border: 1px solid black;" align="center"><b>Mata Pelajaran</b></td>
          <td style="border: 1px solid black;" align="center"><b>Nilai</b></td>
        </tr>
        
        <tr>
        <td></td>
        <td style="border:none;"><b>A. Kelompok Mata Pelajaran Umum</b></td></tr>
      
        <tr>
      <td style="border: 1px solid black;" align="center">1.</td>
      <td style="border: 1px solid black;">&nbsp Pendidikan Agama dan Budi Pekerti</td>
          <td style="border: 1px solid black;" align="center">'.$data['agama'].'</td>
        </tr>
  
        <tr>
        <td style="border: 1px solid black;" align="center">2.</td>
      <td style="border: 1px solid black;">&nbsp Pendidikan Pancasila dan Kewarganegaraan</td>
          <td style="border: 1px solid black;" align="center">'.$data['pancasila'].'</td>
        </tr>
  
        <tr>
        <td style="border: 1px solid black;" align="center">3. </td>
      <td style="border: 1px solid black;">&nbsp Bahasa Indonesia</td>
          <td style="border: 1px solid black;" align="center">'.$data['bhs_indo'].'</td>
        </tr>
        
        <tr>
        <td style="border: 1px solid black;" align="center">4. </td>
      <td style="border: 1px solid black;">&nbsp Pendidikan Jasmani, Olahraga, dan Kesehatan</td>
          <td style="border: 1px solid black;" align="center">'.$data['pjok'].'</td>
        </tr>
        
        <tr>
        <td style="border: 1px solid black;" align="center">5. </td>
      <td style="border: 1px solid black;">&nbsp Sejarah</td>
          <td style="border: 1px solid black;" align="center">'.$data['sejarah'].'</td>
        </tr>
        
        <tr>
        <td style="border: 1px solid black;" align="center">6. </td>
      <td style="border: 1px solid black;">&nbsp Seni Budaya</td>
          <td style="border: 1px solid black;" align="center">'.$data['senbud'].'</td>
        </tr>
        
        <tr>
        <td style="border: 1px solid black;" align="center">7. </td>
      <td style="border: 1px solid black;">&nbsp Muatan Lokal</td>
          <td style="border: 1px solid black;" align="center">'.$data['muatan_lokal'].'</td>
        </tr>
  
  
        <tr>
        <td></td>
        <td style="border:none"><b>B. Kelompok Mata Pelajaran Kejuruan</b></td></tr>
      </tr>
  
      <tr>
        <td style="border: 1px solid black;" align="center">1.</td>
      <td style="border: 1px solid black;">&nbsp Matematika</td>
          <td style="border: 1px solid black;" align="center">'.$data['matematika'].'</td>
        </tr>
      
        </tr>
        <td style="border: 1px solid black;" align="center">2.</td>
      <td style="border: 1px solid black;">&nbsp Bahasa Inggris</td>
          <td style="border: 1px solid black;" align="center">'.$data['bhs_inggris'].'</td>
        </tr>
      
        </tr>
        <td style="border: 1px solid black;" align="center">3.</td>
      <td style="border: 1px solid black;">&nbsp Informatika</td>
          <td style="border: 1px solid black;" align="center">'.$data['informatika'].'</td>
        </tr>
      
        </tr>
        <td style="border: 1px solid black;" align="center">4.</td>
      <td style="border: 1px solid black;">&nbsp Projek Ilmu Pengetahuan Alam dan Sosial</td>
          <td style="border: 1px solid black;" align="center">'.$data['ipas'].'</td>
        </tr>
      
        </tr>
        <td style="border: 1px solid black;" align="center">5.</td>
      <td style="border: 1px solid black;">&nbsp Dasar-dasar Program Keahlian</td>
          <td style="border: 1px solid black;" align="center">'.$data['dasprog'].'</td>
        </tr>
      
        </tr>
        <td style="border: 1px solid black;" align="center">6.</td>
      <td style="border: 1px solid black;">&nbsp Konsentrasi Keahlian</td>
          <td style="border: 1px solid black;" align="center">'.$data['keahlian'].'</td>
        </tr>
      
        </tr>
        <td style="border: 1px solid black;" align="center">7.</td>
      <td style="border: 1px solid black;">&nbsp Projek Kreatif dan Kewirausahaan</td>
          <td style="border: 1px solid black;" align="center">'.$data['pkk'].'</td>
        </tr>
      
        </tr>
        <td style="border: 1px solid black;" align="center">8.</td>
      <td style="border: 1px solid black;">&nbsp Praktik Kerja Lapangan</td>
          <td style="border: 1px solid black;" align="center">'.$data['pkl'].'</td>
        </tr>
      
        </tr>
        <td style="border: 1px solid black;" align="center">9.</td>
      <td style="border: 1px solid black;">&nbsp Mata Pelajaran Pilihan</td>
          <td style="border: 1px solid black;" align="center">'.$data['mapel_pilihan'].'</td>
        </tr>
      
        </tr>
        <td></td>
        <td style="border:none"><center><b>Rata-Rata</b></center></td>
          <td style="border: 1px solid black;" align="center"><b>'.$data['rata_rata'].'</b></td>
        </tr>
      </tr>
         
        </tr>
      </tbody>
    </table>
    </div></td>
    </tr>';
  }
  
  //Kuliner
  else if ($data['jurusan'] == "Kuliner"){  
    echo '<tr>
    <td colspan="4"><div align="justify">
    <table width="650" style="border: 1px solid black; border-collapse: collapse; margin-left: auto; margin-right: auto;">
      <tbody >
  
      <tr>
      <td  style="border: 1px solid black;" align="center"><b>No.</b></td>
      <td  style="border: 1px solid black;" align="center"><b>Mata Pelajaran</b></td>
          <td style="border: 1px solid black;" align="center"><b>Nilai</b></td>
        </tr>
        
        <tr>
        <td></td>
        <td style="border:none;"><b>A. Kelompok Mata Pelajaran Umum</b></td></tr>
      
        <tr>
      <td style="border: 1px solid black;" align="center">1.</td>
      <td style="border: 1px solid black;">&nbsp Pendidikan Agama dan Budi Pekerti</td>
          <td style="border: 1px solid black;" align="center">'.$data['agama'].'</td>
        </tr>
  
        <tr>
        <td style="border: 1px solid black;" align="center">2.</td>
      <td style="border: 1px solid black;">&nbsp Pendidikan Pancasila dan Kewarganegaraan</td>
          <td style="border: 1px solid black;" align="center">'.$data['pancasila'].'</td>
        </tr>
  
        <tr>
        <td style="border: 1px solid black;" align="center">3. </td>
      <td style="border: 1px solid black;">&nbsp Bahasa Indonesia</td>
          <td style="border: 1px solid black;" align="center">'.$data['bhs_indo'].'</td>
        </tr>
        
        <tr>
        <td style="border: 1px solid black;" align="center">4. </td>
      <td style="border: 1px solid black;">&nbsp Pendidikan Jasmani, Olahraga, dan Kesehatan</td>
          <td style="border: 1px solid black;" align="center">'.$data['pjok'].'</td>
        </tr>
        
        <tr>
        <td style="border: 1px solid black;" align="center">5. </td>
      <td style="border: 1px solid black;">&nbsp Sejarah</td>
          <td style="border: 1px solid black;" align="center">'.$data['sejarah'].'</td>
        </tr>
        
        <tr>
        <td style="border: 1px solid black;" align="center">6. </td>
      <td style="border: 1px solid black;">&nbsp Seni Budaya</td>
          <td style="border: 1px solid black;" align="center">'.$data['senbud'].'</td>
        </tr>
        
        <tr>
        <td style="border: 1px solid black;" align="center">7. </td>
      <td style="border: 1px solid black;">&nbsp Muatan Lokal</td>
          <td style="border: 1px solid black;" align="center">'.$data['muatan_lokal'].'</td>
        </tr>
  
  
        <tr>
        <td></td>
        <td style="border:none"><b>B. Kelompok Mata Pelajaran Kejuruan</b></td></tr>
      </tr>
  
      <tr>
        <td style="border: 1px solid black;" align="center">1.</td>
      <td style="border: 1px solid black;">&nbsp Matematika</td>
          <td style="border: 1px solid black;" align="center">'.$data['matematika'].'</td>
        </tr>
      
        </tr>
        <td style="border: 1px solid black;" align="center">2.</td>
      <td style="border: 1px solid black;">&nbsp Bahasa Inggris</td>
          <td style="border: 1px solid black;" align="center">'.$data['bhs_inggris'].'</td>
        </tr>
      
        </tr>
        <td style="border: 1px solid black;" align="center">3.</td>
      <td style="border: 1px solid black;">&nbsp Informatika</td>
          <td style="border: 1px solid black;" align="center">'.$data['informatika'].'</td>
        </tr>
      
        </tr>
        <td style="border: 1px solid black;" align="center">4.</td>
      <td style="border: 1px solid black;">&nbsp Projek Ilmu Pengetahuan Alam dan Sosial</td>
          <td style="border: 1px solid black;" align="center">'.$data['ipas'].'</td>
        </tr>
      
        </tr>
        <td style="border: 1px solid black;" align="center">5.</td>
      <td style="border: 1px solid black;">&nbsp Dasar-dasar Program Keahlian</td>
          <td style="border: 1px solid black;" align="center">'.$data['dasprog'].'</td>
        </tr>
      
        </tr>
        <td style="border: 1px solid black;" align="center">6.</td>
      <td style="border: 1px solid black;">&nbsp Konsentrasi Keahlian</td>
          <td style="border: 1px solid black;" align="center">'.$data['keahlian'].'</td>
        </tr>
      
        </tr>
        <td style="border: 1px solid black;" align="center">7.</td>
      <td style="border: 1px solid black;">&nbsp Projek Kreatif dan Kewirausahaan</td>
          <td style="border: 1px solid black;" align="center">'.$data['pkk'].'</td>
        </tr>
      
        </tr>
        <td style="border: 1px solid black;" align="center">8.</td>
      <td style="border: 1px solid black;">&nbsp Praktik Kerja Lapangan</td>
          <td style="border: 1px solid black;" align="center">'.$data['pkl'].'</td>
        </tr>
      
        </tr>
        <td style="border: 1px solid black;" align="center">9.</td>
      <td style="border: 1px solid black;">&nbsp Mata Pelajaran Pilihan</td>
          <td style="border: 1px solid black;" align="center">'.$data['mapel_pilihan'].'</td>
        </tr>
      
        </tr>
        <td></td>
        <td style="border:none"><center><b>Rata-Rata</b></center></td>
          <td style="border: 1px solid black;" align="center"><b>'.$data['rata_rata'].'</b></td>
        </tr>
      </tr>
         
        </tr>
      </tbody>
    </table>
    </div></td>
    </tr>';
  } 
  
  //Usaha Layanan Pariwisata
  else if ($data['jurusan'] == "Usaha Layanan Pariwisata"){  
    echo '<tr>
    <td colspan="4"><div align="justify">
    <table width="650" style="border: 1px solid black; border-collapse: collapse; margin-left: auto; margin-right: auto;">
      <tbody >
  
      <tr>
      <td  style="border: 1px solid black;" align="center"><b>No.</b></td>
      <td  style="border: 1px solid black;" align="center"><b>Mata Pelajaran</b></td>
          <td style="border: 1px solid black;" align="center"><b>Nilai</b></td>
        </tr>
        
        <tr>
        <td></td>
        <td style="border:none;"><b>A. Kelompok Mata Pelajaran Umum</b></td></tr>
      
        <tr>
      <td style="border: 1px solid black;" align="center">1.</td>
      <td style="border: 1px solid black;">&nbsp Pendidikan Agama dan Budi Pekerti</td>
          <td style="border: 1px solid black;" align="center">'.$data['agama'].'</td>
        </tr>
  
        <tr>
        <td style="border: 1px solid black;" align="center">2.</td>
      <td style="border: 1px solid black;">&nbsp Pendidikan Pancasila dan Kewarganegaraan</td>
          <td style="border: 1px solid black;" align="center">'.$data['pancasila'].'</td>
        </tr>
  
        <tr>
        <td style="border: 1px solid black;" align="center">3. </td>
      <td style="border: 1px solid black;">&nbsp Bahasa Indonesia</td>
          <td style="border: 1px solid black;" align="center">'.$data['bhs_indo'].'</td>
        </tr>
        
        <tr>
        <td style="border: 1px solid black;" align="center">4. </td>
      <td style="border: 1px solid black;">&nbsp Pendidikan Jasmani, Olahraga, dan Kesehatan</td>
          <td style="border: 1px solid black;" align="center">'.$data['pjok'].'</td>
        </tr>
        
        <tr>
        <td style="border: 1px solid black;" align="center">5. </td>
      <td style="border: 1px solid black;">&nbsp Sejarah</td>
          <td style="border: 1px solid black;" align="center">'.$data['sejarah'].'</td>
        </tr>
        
        <tr>
        <td style="border: 1px solid black;" align="center">6. </td>
      <td style="border: 1px solid black;">&nbsp Seni Budaya</td>
          <td style="border: 1px solid black;" align="center">'.$data['senbud'].'</td>
        </tr>
        
        <tr>
        <td style="border: 1px solid black;" align="center">7. </td>
      <td style="border: 1px solid black;">&nbsp Muatan Lokal</td>
          <td style="border: 1px solid black;" align="center">'.$data['muatan_lokal'].'</td>
        </tr>
  
  
        <tr>
        <td></td>
        <td style="border:none"><b>B. Kelompok Mata Pelajaran Kejuruan</b></td></tr>
      </tr>
  
      <tr>
        <td style="border: 1px solid black;" align="center">1.</td>
      <td style="border: 1px solid black;">&nbsp Matematika</td>
          <td style="border: 1px solid black;" align="center">'.$data['matematika'].'</td>
        </tr>
      
        </tr>
        <td style="border: 1px solid black;" align="center">2.</td>
      <td style="border: 1px solid black;">&nbsp Bahasa Inggris</td>
          <td style="border: 1px solid black;" align="center">'.$data['bhs_inggris'].'</td>
        </tr>
      
        </tr>
        <td style="border: 1px solid black;" align="center">3.</td>
      <td style="border: 1px solid black;">&nbsp Informatika</td>
          <td style="border: 1px solid black;" align="center">'.$data['informatika'].'</td>
        </tr>
      
        </tr>
        <td style="border: 1px solid black;" align="center">4.</td>
      <td style="border: 1px solid black;">&nbsp Projek Ilmu Pengetahuan Alam dan Sosial</td>
          <td style="border: 1px solid black;" align="center">'.$data['ipas'].'</td>
        </tr>
      
        </tr>
        <td style="border: 1px solid black;" align="center">5.</td>
      <td style="border: 1px solid black;">&nbsp Dasar-dasar Program Keahlian</td>
          <td style="border: 1px solid black;" align="center">'.$data['dasprog'].'</td>
        </tr>
      
        </tr>
        <td style="border: 1px solid black;" align="center">6.</td>
      <td style="border: 1px solid black;">&nbsp Konsentrasi Keahlian</td>
          <td style="border: 1px solid black;" align="center">'.$data['keahlian'].'</td>
        </tr>
      
        </tr>
        <td style="border: 1px solid black;" align="center">7.</td>
      <td style="border: 1px solid black;">&nbsp Projek Kreatif dan Kewirausahaan</td>
          <td style="border: 1px solid black;" align="center">'.$data['pkk'].'</td>
        </tr>
      
        </tr>
        <td style="border: 1px solid black;" align="center">8.</td>
      <td style="border: 1px solid black;">&nbsp Praktik Kerja Lapangan</td>
          <td style="border: 1px solid black;" align="center">'.$data['pkl'].'</td>
        </tr>
      
        </tr>
        <td style="border: 1px solid black;" align="center">9.</td>
      <td style="border: 1px solid black;">&nbsp Mata Pelajaran Pilihan</td>
          <td style="border: 1px solid black;" align="center">'.$data['mapel_pilihan'].'</td>
        </tr>
      
        </tr>
        <td></td>
        <td style="border:none"><center><b>Rata-Rata</b></center></td>
          <td style="border: 1px solid black;" align="center"><b>'.$data['rata_rata'].'</b></td>
        </tr>
      </tr>
         
        </tr>
      </tbody>
    </table>
    </div></td>
    </tr>';
  }
  
  //Perhotelan
  else if ($data['jurusan'] == "Perhotelan"){  
    echo '<tr>
    <td colspan="4"><div align="justify">
    <table width="650" style="border: 1px solid black; border-collapse: collapse; margin-left: auto; margin-right: auto;">
      <tbody >
  
      <tr>
      <td  style="border: 1px solid black;" align="center"><b>No.</b></td>
      <td  style="border: 1px solid black;" align="center"><b>Mata Pelajaran</b></td>
          <td style="border: 1px solid black;" align="center"><b>Nilai</b></td>
        </tr>
        
        <tr>
        <td></td>
        <td style="border:none;"><b>A. Kelompok Mata Pelajaran Umum</b></td></tr>
      
        <tr>
      <td style="border: 1px solid black;" align="center">1.</td>
      <td style="border: 1px solid black;">&nbsp Pendidikan Agama dan Budi Pekerti</td>
          <td style="border: 1px solid black;" align="center">'.$data['agama'].'</td>
        </tr>
  
        <tr>
        <td style="border: 1px solid black;" align="center">2.</td>
      <td style="border: 1px solid black;">&nbsp Pendidikan Pancasila dan Kewarganegaraan</td>
          <td style="border: 1px solid black;" align="center">'.$data['pancasila'].'</td>
        </tr>
  
        <tr>
        <td style="border: 1px solid black;" align="center">3. </td>
      <td style="border: 1px solid black;">&nbsp Bahasa Indonesia</td>
          <td style="border: 1px solid black;" align="center">'.$data['bhs_indo'].'</td>
        </tr>
        
        <tr>
        <td style="border: 1px solid black;" align="center">4. </td>
      <td style="border: 1px solid black;">&nbsp Pendidikan Jasmani, Olahraga, dan Kesehatan</td>
          <td style="border: 1px solid black;" align="center">'.$data['pjok'].'</td>
        </tr>
        
        <tr>
        <td style="border: 1px solid black;" align="center">5. </td>
      <td style="border: 1px solid black;">&nbsp Sejarah</td>
          <td style="border: 1px solid black;" align="center">'.$data['sejarah'].'</td>
        </tr>
        
        <tr>
        <td style="border: 1px solid black;" align="center">6. </td>
      <td style="border: 1px solid black;">&nbsp Seni Budaya</td>
          <td style="border: 1px solid black;" align="center">'.$data['senbud'].'</td>
        </tr>
        
        <tr>
        <td style="border: 1px solid black;" align="center">7. </td>
      <td style="border: 1px solid black;">&nbsp Muatan Lokal</td>
          <td style="border: 1px solid black;" align="center">'.$data['muatan_lokal'].'</td>
        </tr>
  
  
        <tr>
        <td></td>
        <td style="border:none"><b>B. Kelompok Mata Pelajaran Kejuruan</b></td></tr>
      </tr>
  
      <tr>
        <td style="border: 1px solid black;" align="center">1.</td>
      <td style="border: 1px solid black;">&nbsp Matematika</td>
          <td style="border: 1px solid black;" align="center">'.$data['matematika'].'</td>
        </tr>
      
        </tr>
        <td style="border: 1px solid black;" align="center">2.</td>
      <td style="border: 1px solid black;">&nbsp Bahasa Inggris</td>
          <td style="border: 1px solid black;" align="center">'.$data['bhs_inggris'].'</td>
        </tr>
      
        </tr>
        <td style="border: 1px solid black;" align="center">3.</td>
      <td style="border: 1px solid black;">&nbsp Informatika</td>
          <td style="border: 1px solid black;" align="center">'.$data['informatika'].'</td>
        </tr>
      
        </tr>
        <td style="border: 1px solid black;" align="center">4.</td>
      <td style="border: 1px solid black;">&nbsp Projek Ilmu Pengetahuan Alam dan Sosial</td>
          <td style="border: 1px solid black;" align="center">'.$data['ipas'].'</td>
        </tr>
      
        </tr>
        <td style="border: 1px solid black;" align="center">5.</td>
      <td style="border: 1px solid black;">&nbsp Dasar-dasar Program Keahlian</td>
          <td style="border: 1px solid black;" align="center">'.$data['dasprog'].'</td>
        </tr>
      
        </tr>
        <td style="border: 1px solid black;" align="center">6.</td>
      <td style="border: 1px solid black;">&nbsp Konsentrasi Keahlian</td>
          <td style="border: 1px solid black;" align="center">'.$data['keahlian'].'</td>
        </tr>
      
        </tr>
        <td style="border: 1px solid black;" align="center">7.</td>
      <td style="border: 1px solid black;">&nbsp Projek Kreatif dan Kewirausahaan</td>
          <td style="border: 1px solid black;" align="center">'.$data['pkk'].'</td>
        </tr>
      
        </tr>
        <td style="border: 1px solid black;" align="center">8.</td>
      <td style="border: 1px solid black;">&nbsp Praktik Kerja Lapangan</td>
          <td style="border: 1px solid black;" align="center">'.$data['pkl'].'</td>
        </tr>
      
        </tr>
        <td style="border: 1px solid black;" align="center">9.</td>
      <td style="border: 1px solid black;">&nbsp Mata Pelajaran Pilihan</td>
          <td style="border: 1px solid black;" align="center">'.$data['mapel_pilihan'].'</td>
        </tr>
      
        </tr>
        <td></td>
        <td style="border:none"><center><b>Rata-Rata</b></center></td>
          <td style="border: 1px solid black;" align="center"><b>'.$data['rata_rata'].'</b></td>
        </tr>
      </tr>
         
        </tr>
      </tbody>
    </table>
    </div></td>
    </tr>';
  }
  
  //Pekerjaan Sosial
  else if ($data['jurusan'] == "Pekerjaan Sosial"){  
    echo '<tr>
    <td colspan="4"><div align="justify">
    <table width="650" style="border: 1px solid black; border-collapse: collapse; margin-left: auto; margin-right: auto;">
      <tbody >
  
      <tr>
      <td  style="border: 1px solid black;" align="center"><b>No.</b></td>
      <td  style="border: 1px solid black;" align="center"><b>Mata Pelajaran</b></td>
          <td style="border: 1px solid black;" align="center"><b>Nilai</b></td>
        </tr>
        
        <tr>
        <td></td>
        <td style="border:none;"><b>A. Kelompok Mata Pelajaran Umum</b></td></tr>
      
        <tr>
      <td style="border: 1px solid black;" align="center">1.</td>
      <td style="border: 1px solid black;">&nbsp Pendidikan Agama dan Budi Pekerti</td>
          <td style="border: 1px solid black;" align="center">'.$data['agama'].'</td>
        </tr>
  
        <tr>
        <td style="border: 1px solid black;" align="center">2.</td>
      <td style="border: 1px solid black;">&nbsp Pendidikan Pancasila dan Kewarganegaraan</td>
          <td style="border: 1px solid black;" align="center">'.$data['pancasila'].'</td>
        </tr>
  
        <tr>
        <td style="border: 1px solid black;" align="center">3. </td>
      <td style="border: 1px solid black;">&nbsp Bahasa Indonesia</td>
          <td style="border: 1px solid black;" align="center">'.$data['bhs_indo'].'</td>
        </tr>
        
        <tr>
        <td style="border: 1px solid black;" align="center">4. </td>
      <td style="border: 1px solid black;">&nbsp Pendidikan Jasmani, Olahraga, dan Kesehatan</td>
          <td style="border: 1px solid black;" align="center">'.$data['pjok'].'</td>
        </tr>
        
        <tr>
        <td style="border: 1px solid black;" align="center">5. </td>
      <td style="border: 1px solid black;">&nbsp Sejarah</td>
          <td style="border: 1px solid black;" align="center">'.$data['sejarah'].'</td>
        </tr>
        
        <tr>
        <td style="border: 1px solid black;" align="center">6. </td>
      <td style="border: 1px solid black;">&nbsp Seni Budaya</td>
          <td style="border: 1px solid black;" align="center">'.$data['senbud'].'</td>
        </tr>
        
        <tr>
        <td style="border: 1px solid black;" align="center">7. </td>
      <td style="border: 1px solid black;">&nbsp Muatan Lokal</td>
          <td style="border: 1px solid black;" align="center">'.$data['muatan_lokal'].'</td>
        </tr>
  
  
        <tr>
        <td></td>
        <td style="border:none"><b>B. Kelompok Mata Pelajaran Kejuruan</b></td></tr>
      </tr>
  
      <tr>
        <td style="border: 1px solid black;" align="center">1.</td>
      <td style="border: 1px solid black;">&nbsp Matematika</td>
          <td style="border: 1px solid black;" align="center">'.$data['matematika'].'</td>
        </tr>
      
        </tr>
        <td style="border: 1px solid black;" align="center">2.</td>
      <td style="border: 1px solid black;">&nbsp Bahasa Inggris</td>
          <td style="border: 1px solid black;" align="center">'.$data['bhs_inggris'].'</td>
        </tr>
      
        </tr>
        <td style="border: 1px solid black;" align="center">3.</td>
      <td style="border: 1px solid black;">&nbsp Informatika</td>
          <td style="border: 1px solid black;" align="center">'.$data['informatika'].'</td>
        </tr>
      
        </tr>
        <td style="border: 1px solid black;" align="center">4.</td>
      <td style="border: 1px solid black;">&nbsp Projek Ilmu Pengetahuan Alam dan Sosial</td>
          <td style="border: 1px solid black;" align="center">'.$data['ipas'].'</td>
        </tr>
      
        </tr>
        <td style="border: 1px solid black;" align="center">5.</td>
      <td style="border: 1px solid black;">&nbsp Dasar-dasar Program Keahlian</td>
          <td style="border: 1px solid black;" align="center">'.$data['dasprog'].'</td>
        </tr>
      
        </tr>
        <td style="border: 1px solid black;" align="center">6.</td>
      <td style="border: 1px solid black;">&nbsp Konsentrasi Keahlian</td>
          <td style="border: 1px solid black;" align="center">'.$data['keahlian'].'</td>
        </tr>
      
        </tr>
        <td style="border: 1px solid black;" align="center">7.</td>
      <td style="border: 1px solid black;">&nbsp Projek Kreatif dan Kewirausahaan</td>
          <td style="border: 1px solid black;" align="center">'.$data['pkk'].'</td>
        </tr>
      
        </tr>
        <td style="border: 1px solid black;" align="center">8.</td>
      <td style="border: 1px solid black;">&nbsp Praktik Kerja Lapangan</td>
          <td style="border: 1px solid black;" align="center">'.$data['pkl'].'</td>
        </tr>
      
        </tr>
        <td style="border: 1px solid black;" align="center">9.</td>
      <td style="border: 1px solid black;">&nbsp Mata Pelajaran Pilihan</td>
          <td style="border: 1px solid black;" align="center">'.$data['mapel_pilihan'].'</td>
        </tr>
      
        </tr>
        <td></td>
        <td style="border:none"><center><b>Rata-Rata</b></center></td>
          <td style="border: 1px solid black;" align="center"><b>'.$data['rata_rata'].'</b></td>
        </tr>
      </tr>
         
        </tr>
      </tbody>
    </table>
    </div></td>
    </tr>';
  }
  
  //Broadcasting
  else if ($data['jurusan'] == "Broadcasting dan Perfilman"){  
    echo '<tr>
    <td colspan="4"><div align="justify">
    <table width="650" style="border: 1px solid black; border-collapse: collapse; margin-left: auto; margin-right: auto;">
      <tbody >
  
      <tr>
      <td  style="border: 1px solid black;" align="center"><b>No.</b></td>
      <td  style="border: 1px solid black;" align="center"><b>Mata Pelajaran</b></td>
          <td style="border: 1px solid black;" align="center"><b>Nilai</b></td>
        </tr>
        
        <tr>
        <td></td>
        <td style="border:none;"><b>A. Kelompok Mata Pelajaran Umum</b></td></tr>
      
        <tr>
      <td style="border: 1px solid black;" align="center">1.</td>
      <td style="border: 1px solid black;">&nbsp Pendidikan Agama dan Budi Pekerti</td>
          <td style="border: 1px solid black;" align="center">'.$data['agama'].'</td>
        </tr>
  
        <tr>
        <td style="border: 1px solid black;" align="center">2.</td>
      <td style="border: 1px solid black;">&nbsp Pendidikan Pancasila dan Kewarganegaraan</td>
          <td style="border: 1px solid black;" align="center">'.$data['pancasila'].'</td>
        </tr>
  
        <tr>
        <td style="border: 1px solid black;" align="center">3. </td>
      <td style="border: 1px solid black;">&nbsp Bahasa Indonesia</td>
          <td style="border: 1px solid black;" align="center">'.$data['bhs_indo'].'</td>
        </tr>
        
        <tr>
        <td style="border: 1px solid black;" align="center">4. </td>
      <td style="border: 1px solid black;">&nbsp Pendidikan Jasmani, Olahraga, dan Kesehatan</td>
          <td style="border: 1px solid black;" align="center">'.$data['pjok'].'</td>
        </tr>
        
        <tr>
        <td style="border: 1px solid black;" align="center">5. </td>
      <td style="border: 1px solid black;">&nbsp Sejarah</td>
          <td style="border: 1px solid black;" align="center">'.$data['sejarah'].'</td>
        </tr>
        
        <tr>
        <td style="border: 1px solid black;" align="center">6. </td>
      <td style="border: 1px solid black;">&nbsp Seni Budaya</td>
          <td style="border: 1px solid black;" align="center">'.$data['senbud'].'</td>
        </tr>
        
        <tr>
        <td style="border: 1px solid black;" align="center">7. </td>
      <td style="border: 1px solid black;">&nbsp Muatan Lokal</td>
          <td style="border: 1px solid black;" align="center">'.$data['muatan_lokal'].'</td>
        </tr>
  
  
        <tr>
        <td></td>
        <td style="border:none"><b>B. Kelompok Mata Pelajaran Kejuruan</b></td></tr>
      </tr>
  
      <tr>
        <td style="border: 1px solid black;" align="center">1.</td>
      <td style="border: 1px solid black;">&nbsp Matematika</td>
          <td style="border: 1px solid black;" align="center">'.$data['matematika'].'</td>
        </tr>
      
        </tr>
        <td style="border: 1px solid black;" align="center">2.</td>
      <td style="border: 1px solid black;">&nbsp Bahasa Inggris</td>
          <td style="border: 1px solid black;" align="center">'.$data['bhs_inggris'].'</td>
        </tr>
      
        </tr>
        <td style="border: 1px solid black;" align="center">3.</td>
      <td style="border: 1px solid black;">&nbsp Informatika</td>
          <td style="border: 1px solid black;" align="center">'.$data['informatika'].'</td>
        </tr>
      
        </tr>
        <td style="border: 1px solid black;" align="center">4.</td>
      <td style="border: 1px solid black;">&nbsp Projek Ilmu Pengetahuan Alam dan Sosial</td>
          <td style="border: 1px solid black;" align="center">'.$data['ipas'].'</td>
        </tr>
      
        </tr>
        <td style="border: 1px solid black;" align="center">5.</td>
      <td style="border: 1px solid black;">&nbsp Dasar-dasar Program Keahlian</td>
          <td style="border: 1px solid black;" align="center">'.$data['dasprog'].'</td>
        </tr>
      
        </tr>
        <td style="border: 1px solid black;" align="center">6.</td>
      <td style="border: 1px solid black;">&nbsp Konsentrasi Keahlian</td>
          <td style="border: 1px solid black;" align="center">'.$data['keahlian'].'</td>
        </tr>
      
        </tr>
        <td style="border: 1px solid black;" align="center">7.</td>
      <td style="border: 1px solid black;">&nbsp Projek Kreatif dan Kewirausahaan</td>
          <td style="border: 1px solid black;" align="center">'.$data['pkk'].'</td>
        </tr>
      
        </tr>
        <td style="border: 1px solid black;" align="center">8.</td>
      <td style="border: 1px solid black;">&nbsp Praktik Kerja Lapangan</td>
          <td style="border: 1px solid black;" align="center">'.$data['pkl'].'</td>
        </tr>
      
        </tr>
        <td style="border: 1px solid black;" align="center">9.</td>
      <td style="border: 1px solid black;">&nbsp Mata Pelajaran Pilihan</td>
          <td style="border: 1px solid black;" align="center">'.$data['mapel_pilihan'].'</td>
        </tr>
      
        </tr>
        <td></td>
        <td style="border:none"><center><b>Rata-Rata</b></center></td>
          <td style="border: 1px solid black;" align="center"><b>'.$data['rata_rata'].'</b></td>
        </tr>
      </tr>
         
        </tr>
      </tbody>
    </table>
    </div></td>
    </tr>';
  }

  echo '<tr>
    <td colspan="4"><div align="justify">
      <p>Surat Keterangan Lulus ini berlaku sementara sampai dengan diterbitkannya
         Ijazah Tahun Ajaran 2023/'.$hsl['tahun'].', untuk menjadikan maklum bagi yang berkepentingan.</p>
      <p></p><br>
    </div></td>
  </tr>';
  
  
 $namaSave = 'https://'.$_SERVER['SERVER_NAME'].'/cetakskl.php?nisn='.$data['nisn'];
  $lokasi2 = '../QRCODE/'.$data['nisn'].'.png';
  
  QRcode::png($namaSave, $lokasi2, QR_ECLEVEL_L, 5, 0);
  // echo '<tr>
  //   <td colspan="4"><div align="justify">
  //     <p><img src='.$lokasi2.' width="50px" height="50px"/></p>
  //   </div></td>
  // </tr>';

  echo '<tr>';
  if($data['jurusan'] == "Keperawatan Sosial"){ 
  echo '<td width="100"><img src='.$lokasi2.' width="50px" height="50px"/></td>';
}else{
echo '<td>&nbsp;</td>';
}
   echo '<td>&nbsp;</td>
    <td width="223" align="right"><img src="../images/3x4.png"/></td>
    <td width="321"><br />
		<img src="../images/Tanpa_TTD.png" />  <br />
   
  </tr>';
  // $namaSave = 'https://'.$_SERVER['SERVER_NAME'].'/cetakskl.php?nisn='.$data['nisn'];
  // $lokasi2 = '../QRCODE/'.$data['nisn'].'.png';
  
  // QRcode::png($namaSave, $lokasi2, QR_ECLEVEL_L, 5, 0);
  
  if($data['jurusan'] == "Keperawatan Sosial"){ 
  echo '<td>&nbsp;</td>';
}else{
 echo '<tr>
    <td colspan="4"><div align="justify">
      <p><img src='.$lokasi2.' width="50px" height="50px"/></p>
    </div></td>
  </tr>';
}
  // echo '<tr>
  //   <td colspan="4"><div align="justify">
  //     <p><img src='.$lokasi2.' width="50px" height="50px"/></p>
  //   </div></td>
  // </tr>';

  echo '<tr>
    <td colspan="4"><p>&nbsp;</p>
    </tr>';
echo '</table>';
}
?>
</body>
</html>