<?php
session_start();
if(isset($_SESSION['logged']) && !empty($_SESSION['logged'])){
include "../database.php";
include "../indo.php";
include "../tgl_indo.php";
$title = "Surat Tugas Guru | Administrasi";
include '_header.php';
?>
<title><?php echo $title;?></title>

<div class="container mt-5">
</div>
<div class="row">
	<div class="container">
		<div class="container-fluid mt-3">
			
			<div style="width:80%; left:10%" class="alert alert-warning"><strong>Peringatan !</strong><br>Jangan lupa tetap mencatat nomor surat melalui excel di menu Surat Keluar<br>
		Tambahkan data yang diperlukan surat keterangan melalui tombol <strong>Tambah Data</strong></div>

    <div class="card shadow mb-4" style="width:80%; left:10%">
      <div class="card-header bg-dark bg-gradient text-white py-3" >
	  <div class="row">
		<div class="col-sm-10">
			<h4 class="m-0 font-weight-bold"><i class="fa-solid fa-truck-fast"></i>  <strong>Surat Tugas Guru</strong></h4>
		</div>
		<div class="col-sm-2">
				<div class="btn-group shadow rounded">
					<!-- Button trigger modal -->
					<a class="btn btn-light bg-gradient" type="button" data-bs-toggle="modal" data-bs-target="#add_surgas_guru"aria-current="page">Tambah Data</a>
					<a href="#" class="btn btn-dark bg-gradient text-white active"><i class="fa-regular fa-square-plus"></i></a>
				</div>
		</div>
		</div>

      </div>    
      <div class="card-body">

<!-- Modal Tambah Data-->
<div class="modal fade" tabindex="-1" id="add_surgas_guru" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-success text-white">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fa-regular fa-square-plus"></i> &nbspTambah Data <strong>Surat Tugas Guru</strong></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
	  <form action="add_proses_surgas_guru.php" class="form-horizontal" method="post">
        
	  <!-- Nomor Surat Tugas -->
        <h6 class="m-0 font-weight-bold mb-3">1. Nomor Surat Tugas</h6>
	     <div class="form-group row">
			<div class="form-group mb-3">
				<div id="emailHelp" class="form-text text-danger">*Masukkan Nomor Surat Bagian Belakang Saja</div>
					<input type="text" name="no_surat" class="form-control" id="no_surat" placeholder="Masukkan Nomor Surat" required autofocus>
            <div id="emailHelp" class="form-text text-danger"><strong>Contoh : 094/958 (Inputkan Nomor Surat 958)</strong></div>
			</div>
        </div>
	  
		<!-- Nomor Surat SPPD -->
        <h6 class="m-0 font-weight-bold mb-3">2. Nomor Surat SPPD</h6>
	     <div class="form-group row">
			<div class="form-group mb-3">
				<div id="emailHelp" class="form-text text-danger">*Masukkan Nomor Surat Bagian Belakang Saja</div>
					<input type="text" name="no_surat_sppd" class="form-control" id="no_surat_sppd" placeholder="Masukkan Nomor Surat SPPD" required autofocus>
            <div id="emailHelp" class="form-text text-danger"><strong>Contoh : 900/958 (Inputkan Nomor Surat 958)</strong></div>
			</div>
        </div>
		
		<!-- Tujuan SPPD -->
        <h6 class="m-0 font-weight-bold mb-3">3. Tujuan Perjalanan SPPD</h6>
	     <div class="form-group row">
			<div class="form-group mb-3">
			<textarea class="form-control" name="tujuan_sppd" id="tujuan_sppd" placeholder="Masukkan Tujuan Perjalanan SPPD" required autofocus></textarea>
            <div id="emailHelp" class="form-text text-danger"><strong>Contoh : Menghadiri undangan kegiatan...</strong></div>
			</div>
        </div>

		<!-- Tempat SPPD dan Anggaran SPPD -->
        <div class="form-group row">
	<div class="col-sm-6">
        <h6 class="m-0 font-weight-bold mb-3">4. Tempat Tujuan SPPD</h6>
    </div>
	<div class="col-sm-6">
        <h6 class="m-0 font-weight-bold mb-3">5. Mata Anggaran untuk SPPD</h6>
    </div>
    </div>
    
    <div class="form-group row">
		<div class="col-sm-6">
			<div class="form-group mb-3">
					<input type="text" name="tempat_sppd" class="form-control" id="tempat_sppd" placeholder="Masukkan Tempat Tujuan SPPD" required autofocus>
			</div>
		</div>
		<div class="col-sm-6">
			<div class="form-group mb-3">
						<input type="text" name="mata_anggaran" class="form-control" id="mata_anggaran" placeholder="Masukkan Mata Anggaran untuk SPPD">
				</div>
            </div>
        </div>
        
            <!-- Nama Lengkap -->
        <h6 class="m-0 font-weight-bold mb-3">6. Nama Lengkap</h6>
	     <div class="form-group row">
			<div class="form-group mb-3">
			<select id="guru" class="form-control" name="nama_guru">
			<option value="" disabled selected>--- Pilih Nama Lengkap ---</option>
				<?php 
				$data = mysqli_query($db_conn,"select * from data_guru");
				while($d = mysqli_fetch_array($data)){
					?>
					<option value="<?php echo $d['nama_guru'] ?>"><?php echo $d['nama_guru'] ?> - <?php echo $d['nip_guru'] ?> - <?php echo $d['pangkat_guru'] ?>/<?php echo $d['golongan_guru'] ?></option>
					<?php
				}
				?>				
			</select>
			</div>
        </div>

		
         <!-- NIP -->
         <h6 class="m-0 font-weight-bold mb-3">7. NIP</h6>
	     <div class="form-group row">
			<div class="form-group mb-3">
				<input type="text" name="nip_guru" class="form-control" id="nip_guru" placeholder="Masukkan NIP" readonly>
			</div>
        </div>
     

        <!-- Pangkat dan Golongan -->
        <div class="form-group row">
	<div class="col-sm-6">
        <h6 class="m-0 font-weight-bold mb-3">8. Pangkat</h6>
    </div>
	<div class="col-sm-6">
        <h6 class="m-0 font-weight-bold mb-3">9. Golongan Ruang</h6>
    </div>
    </div>
    
    <div class="form-group row">
		<div class="col-sm-6">
			<div class="form-group mb-3">
					<input type="text" name="pangkat_guru" class="form-control" id="pangkat_guru" placeholder="Masukkan Pangkat Guru" readonly>
			</div>
		</div>
		<div class="col-sm-6">
			<div class="form-group mb-3">
						<input type="text" name="golongan_guru" class="form-control" id="golongan_guru" placeholder="Masukkan Golongan Guru" readonly>
				</div>
            </div>
        </div>

        <!-- Jabatan dan Jenis Surat Tugas -->
        <div class="form-group row">
	<div class="col-sm-6">
        <h6 class="m-0 font-weight-bold mb-3">10. Jabatan</h6>
    </div>
	<div class="col-sm-6">
        <h6 class="m-0 font-weight-bold mb-3">11. Jenis Surat Tugas</h6>
    </div>
    </div>
    
    <div class="form-group row">
		<div class="col-sm-6">
			<div class="form-group mb-3">
					<input type="text" name="jabatan" class="form-control" id="jabatan" placeholder="Masukkan Jabatan" required autofocus>
			</div>
		</div>
		<div class="col-sm-6">
			<div class="form-group mb-3">
				<select id="jenis_surgas" class="form-control" name="jenis_surgas" required autofocus>
					<option value="" readonly selected>----- Pilih Jenis Surat Tugas -----</option>
					<option value="Dalam Kota">Dalam Kota</option>
					<option value="Luar Kota">Luar Kota</option>
				</select>
				<div id="emailHelp" class="form-text text-danger">*Silahkan Pilih Jenis Surat Tugas (Dalam Kota / Luar Kota)</div>
				</div>
            </div>
        </div>


        <!-- Dasar Surat -->
         <h6 class="m-0 font-weight-bold mb-3">12. Dasar Surat</h6>
	     <div class="form-group row">
			<div class="form-group mb-3">

				<div class="form-check">
					<input class="form-check-input" type="radio" name="choose" id="ada" value="ada" checked>
						<label class="form-check-label" for="flexRadioDefault1">Ada</label>
					</div>
					<div class="form-group mb-3">
						<textarea class="form-control" id="dasar_surat" name="dasar_surat" rows="5" placeholder="Masukkan Dasar Surat"></textarea>
					</div>

				<div class="form-check">
					<input class="form-check-input" type="radio" name="choose" id="tidak_ada" value="tidak ada">
						<label class="form-check-label" for="flexRadioDefault2">Tidak Ada</label>
				</div>
				
			</div>
        </div>

		<script type="text/javascript">
		$(document).ready(function() {
			$('input[name="choose"]').click(function() 
											{
				var value = $(this).val();
				if( value == "tidak ada")
				{
				$('#dasar_surat').hide();
				}
				else{
				$('#dasar_surat').show();
				}
			});
			});
		</script>

        <!-- Isi Surat -->
         <h6 class="m-0 font-weight-bold mb-3">13. Isi Surat</h6>
	     <div class="form-group row">
			<div class="form-group mb-3">
				<textarea class="form-control" id="isi_surat" name="isi_surat" rows="5" placeholder="Masukkan Isi Surat" required autofocus></textarea>
			</div>
        </div>
        

        <!-- Tanggal & Jam Acara-->
        <div class="form-group row">
	<div class="col-sm-4">
        <h6 class="m-0 font-weight-bold mb-3">14. Tanggal Mulai Acara</h6>
    </div>
	<div class="col-sm-4">
        <h6 class="m-0 font-weight-bold mb-3">15. Waktu Mulai Acara</h6>
    </div>
	<div class="col-sm-4">
        <h6 class="m-0 font-weight-bold mb-3">16. Waktu Selesai Acara</h6>
    </div>
    </div>
    
    <div class="form-group row">
		<div class="col-sm-4">
			<div class="form-group mb-3">
					<input type="date" name="tgl_kegiatan" class="form-control" id="tgl_kegiatan" required autofocus>
			</div>
		</div>
		<div class="col-sm-4">
			<div class="form-group mb-3">
						<input type="text" name="mulai_kegiatan" class="form-control" id="mulai_kegiatan" placeholder="Masukkan Waktu Mulai Acara">
					<div id="emailHelp" class="form-text text-danger">*Dipakai untuk 1 hari saja, Apabila lebih dari 1 hari dikosongi saja</div>
				</div>
            </div>
		<div class="col-sm-4">
			<div class="form-group mb-3">
						<input type="text" name="sampai_kegiatan" class="form-control" id="sampai_kegiatan" placeholder="Masukkan Waktu Selesai Acara">
						<div id="emailHelp" class="form-text text-danger">*Dipakai untuk 1 hari saja, Apabila lebih dari 1 hari dikosongi saja</div>

				</div>
            </div>
        </div>
       
		<!-- Tanggal Pembukaan dan Penutupan Acara-->
        <div class="form-group row">
	<div class="col-sm-4">
        <h6 class="m-0 font-weight-bold mb-3">17. Tanggal Selesai Acara</h6>
    </div>
	<div class="col-sm-4">
        <h6 class="m-0 font-weight-bold mb-3">18. Tanggal Pembukaan Acara</h6>
    </div>
	<div class="col-sm-4">
        <h6 class="m-0 font-weight-bold mb-3">19. Tanggal Penutupan Acara</h6>
    </div>
    </div>
    
    <div class="form-group row">
		<div class="col-sm-4">
			<div class="form-group mb-3">
					<input type="date" name="tgl_selesai" class="form-control" id="tgl_selesai" >
					<div id="emailHelp" class="form-text text-danger">*Dipakai apabila lebih dari 1 hari</div>
			</div>
		</div>
		<div class="col-sm-4">
			<div class="form-group mb-3">
						<input type="date" name="tgl_pembukaan" class="form-control" id="tgl_pembukaan">
					<div id="emailHelp" class="form-text text-danger">*Dipakai apabila lebih dari 1 hari</div>
				</div>
            </div>
		<div class="col-sm-4">
			<div class="form-group mb-3">
						<input type="date" name="tgl_penutupan" class="form-control" id="tgl_penutupan">
						<div id="emailHelp" class="form-text text-danger">*Dipakai apabila lebih dari 1 hari</div>
				</div>
            </div>
        </div>

		<!-- Jam Pembukaan dan Penutupan Acara -->
        <div class="form-group row">
	<div class="col-sm-6">
        <h6 class="m-0 font-weight-bold mb-3">20. Jam Pembukaan Acara</h6>
    </div>
	<div class="col-sm-6">
        <h6 class="m-0 font-weight-bold mb-3">21. Jam Penutupan Acara</h6>
    </div>
    </div>
    
    <div class="form-group row">
		<div class="col-sm-6">
			<div class="form-group mb-3">
			<input type="text" name="jam_pembukaan" class="form-control" id="jam_pembukaan" placeholder="Masukkan Waktu Pembukaan Acara">
			<div id="emailHelp" class="form-text text-danger">*Dipakai apabila lebih dari 1 hari</div>
			</div>
		</div>
		<div class="col-sm-6">
			<div class="form-group mb-3">
			<input type="text" name="jam_penutupan" class="form-control" id="jam_penutupan" placeholder="Masukkan Waktu Penutupan Acara">
			<div id="emailHelp" class="form-text text-danger">*Dipakai apabila lebih dari 1 hari</div>
				</div>
            </div>
        </div>

		
        <!-- Tempat -->
		<h6 class="m-0 font-weight-bold mb-3">22. Tempat</h6>
	     <div class="form-group row">
			<div class="form-group mb-3">
					<input type="text" name="tempat" class="form-control" id="tempat" placeholder="Masukkan Tempat Diselenggarakannya Kegiatan" required autofocus>
			</div>
        </div>

		
        <!-- Jalan -->
		<h6 class="m-0 font-weight-bold mb-3">23. Jalan</h6>
	     <div class="form-group row">
			<div class="form-group mb-3">
					<input type="text" name="jalan" class="form-control" id="jalan" placeholder="Masukkan Jalan Diselenggarakannya Kegiatan" required autofocus>
			</div>
        </div>
        


	</div>

	<div class="modal-footer">
		<button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="fas fa-times"></i> Close</button>
        <button type="submit" name="submit" class="btn btn-primary"><i class="fas fa-paper-plane"></i> Kirim</button>
	</div>
</form>

    </div>
  </div>
</div>

<hr>
<!-- Notifikasi Pesan Surat Keterangan (Add, Edit, Delete) -->
<?php
	if (isset($_SESSION['add_msg']) && $_SESSION['add_msg'] <> '') {
	echo '<div id="add_msg" class="alert alert-success" style="display:none;">'.$_SESSION['add_msg'].'</div>';
	}
	$_SESSION['add_msg'] = '';
?>
<?php
	if (isset($_SESSION['del_msg']) && $_SESSION['del_msg'] <> '') {
	echo '<div id="del_msg" class="alert alert-success" style="display:none;">'.$_SESSION['del_msg'].'</div>';
	}
	$_SESSION['del_msg'] = '';
?>
<?php
	if (isset($_SESSION['edit_msg']) && $_SESSION['edit_msg'] <> '') {
	echo '<div id="edit_msg" class="alert alert-success" style="display:none;">'.$_SESSION['edit_msg'].'</div>';
	}
	$_SESSION['edit_msg'] = '';
?>
<?php
	if (isset($_SESSION['id_sama']) && $_SESSION['id_sama'] <> '') {
	echo '<div id="id_sama" class="alert alert-warning" style="display:none;">'.$_SESSION['id_sama'].'</div>';
	}
	$_SESSION['id_sama'] = '';
?>

<!-- Table -->
	  <div style="overflow:auto">
            <table id="example" class="table" style="width:100%">
        <thead>
            <tr>
                <th class="text-center">No</th>
                <th>Nomor Surat</th>
                <th>Nama Guru</th>
                <th>Pangkat / Golongan</th>
                <th>Jenis Surat Tugas</th>
                <th>Tanggal</th>
                <th>Pembuat Surat</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
			$qguru = mysqli_query($db_conn,"SELECT * FROM surgas_guru");
			$no = 1;
			if(mysqli_num_rows($qguru) > 0){
				while($data = mysqli_fetch_array($qguru)){
					echo '<tr>';
					echo '<td class="text-center">'.$no++.'</td>';
					echo '<td>094/'.$data['no_surat'].'</td>';
					echo '<td>'.$data['nama_guru'].'<br><b>NIP. '.$data['nip_guru'].'</b></td>';
					echo '<td>'.$data['pangkat_guru'].' / '.$data['golongan_guru'].'</td>';
					echo '<td>'.$data['jenis_surgas'].'</td>';
					echo '<td>'.tgl_indo($data['tgl_create']).'</td>';
					echo '<td>'.$data['creator'].'</td>';
					echo '<td>
					<div class="btn-group">
  					<button type="button" class="btn btn-warning text-white dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
					Aksi
					</button> 
  					<ul class="dropdown-menu">';
                    if($data['jenis_surgas'] == 'Dalam Kota'){
					 echo '<li><a href="../cetak_dalam_kota.php?no_surat='.$data['no_surat'].'"><button class="btn btn-sm"><i class="fas fa-download"></i> Unduh</button></a> </li>';
                    } else if ($data['jenis_surgas'] == 'Luar Kota'){
					 echo '<li><a href="../cetak_luar_kota.php?no_surat='.$data['no_surat'].'"><button class="btn btn-sm"><i class="fas fa-download"></i> Unduh</button></a> </li>';
					 echo '<li><a href="../cetak_sppd.php?no_surat='.$data['no_surat'].'"><button class="btn btn-sm"><i class="fa-solid fa-cloud-arrow-down"></i> Unduh SPPD</button></a> </li>';
					 echo '<li><a href="../cetak_blkg_sppd.php?no_surat='.$data['no_surat'].'"><button class="btn btn-sm"><i class="fa-solid fa-file-arrow-down"></i> Unduh Form 2 SPPD</button></a> </li>';
                    }
					 echo '<li><a data-bs-toggle="modal" data-bs-target="#detail_surgas_guru'.htmlspecialchars($data['id_surat']).'" class="btn btn-sm"><i class="fas fa-eye"></i> Detail</button></a></li>
					 <li><a data-bs-toggle="modal" data-bs-target="#edit_surgas_guru'.htmlspecialchars($data['id_surat']).'" class="btn btn-sm"><i class="fas fa-edit"></i> Edit</button></a></li>
					 <li><a data-bs-toggle="modal" data-bs-target="#delete_surgas_guru'.htmlspecialchars($data['id_surat']).'"  class="btn btn-sm"><i class="fas fa-trash"></i> Hapus</a></li>
					 </ul>
					 </div></td>';
					// echo '<td><a href="../cetak_keterangan.php?no_surat='.$data['no_surat'].'"><button class="btn btn-primary" style="width:100%; color:white;"><i class="fas fa-download text-white"></i> Unduh Surat Keterangan</button></a> </td>';
					
					// echo '<td><a data-bs-toggle="modal" data-bs-target="#edit_sk'.htmlspecialchars($data['id_surat']).'" class="btn btn-warning" style="width:100%; color:white;"><i class="fas fa-edit text-white"></i> Edit</button></a> </td>';
					?>
	
<!-- Modal Detail Surat Tugas Guru-->
<div class="modal fade" tabindex="-1" id="detail_surgas_guru<?php echo htmlspecialchars($data['id_surat'])?>" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fa-solid fa-circle-info"></i> &nbspDetail Data <strong><?php echo $data['nama_guru']?> <br>NIP. <?php echo $data['nip_guru']?> - <?php echo $data['pangkat_guru']?>/<?php echo $data['golongan_guru']?></strong></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
		<?php 
		$hari = array ( 1 =>    'Senin',
		'Selasa',
		'Rabu',
		'Kamis',
		'Jumat',
		'Sabtu',
		'Minggu');
		$tgl = date('N', strtotime($data['tgl_kegiatan']));
		$tgl2 = date('N', strtotime($data['tgl_penutupan']));
		?>
		<i><strong><h5>Surat Tugas <?php echo $data['jenis_surgas']?></h5></strong></i><hr>
	  <strong><?php echo $data['nama_guru']?> <br>NIP. <?php echo $data['nip_guru']?> - <?php echo $data['pangkat_guru']?>/<?php echo $data['golongan_guru']?></strong><br><button type="button" class="btn btn-success btn-sm"><i class="fa-solid fa-check"></i> &nbspSudah Cetak</button><hr>
	  <strong>Jabatan : </strong><?php echo $data['jabatan']?><br>
	  <strong>Dasar Surat : </strong><?php if($data['dasar_surat'] == ''){?>
		<i class="text-danger">Tidak Ada Dasar Surat</i>
		<?php }else{?>
		<?php echo $data['dasar_surat']?>
		<?php }?><br>
	  <strong>Isi Surat : </strong><?php echo $data['isi_surat']?><br>
	  <strong>Lama Hari :</strong> <?php if($data['tgl_selesai'] == '0000-00-00'){
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
          }?><br>
	  <?php if($data['tgl_selesai'] == '0000-00-00'){?>
	  <strong>Hari/Tanggal : </strong><?php echo $hari[$tgl]?>, <?php echo tgl_indo($data['tgl_kegiatan'])?><br>
	  <?php }else{?>
		<strong>Hari/Tanggal : </strong><?php echo $hari[$tgl]?> s.d. <?php echo $hari[$tgl2]?>, <?php echo tgl_indo($data['tgl_kegiatan'])?> s.d. 
		<?php if($data['tgl_penutupan'] == '0000-00-00'){
			echo tgl_indo($data['tgl_selesai']);
		}else if($data['tgl_selesai'] == '0000-00-00'){ 
			 echo tgl_indo($data['tgl_penutupan']);
		}else{
			echo tgl_indo($data['tgl_penutupan']);
		}?><br>
	  <?php }?>
	  <?php if($data['mulai_kegiatan'] == '' && $data['sampai_kegiatan'] == ''){?>
		<strong>Pembukaan : </strong><?php echo $hari[$tgl]?>, <?php echo tgl_indo($data['tgl_kegiatan'])?>, Pukul <?php echo $data['jam_pembukaan']?><br>
		<strong>Penutupan : </strong><?php echo $hari[$tgl2]?>, <?php echo tgl_indo($data['tgl_penutupan'])?>, Pukul <?php echo $data['jam_penutupan']?><br>
	<?php }else {  
		if($data['sampai_kegiatan'] == 'Selesai' || $data['sampai_kegiatan'] == 'selesai'){?>
		<strong>Waktu :</strong> Pukul <?php echo $data['mulai_kegiatan']?> WIB - <?php echo $data['sampai_kegiatan']?><br>
		<?php }else {?>
			<strong>Waktu :</strong> Pukul <?php echo $data['mulai_kegiatan']?> - <?php echo $data['sampai_kegiatan']?>  WIB<br>
		<?php }?>
	<?php }?>
		<strong>Tempat Kegiatan : </strong><?php echo ($data['tempat'])?><br>
		
		<?php if($data['jalan'] == '' || $data['jalan'] == '-'){
		echo '';
		} else {
			echo '<strong>Jalan : </strong>'.$data['jalan'];
		}?><br>
		

</div>
	  
		<br>
	<div class="modal-footer">
		<button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="fas fa-times"></i> Close</button>
	</div>

    </div>
  </div>
</div>

	<!-- Modal Edit Data-->
<div class="modal fade" tabindex="-1" id="edit_surgas_guru<?php echo htmlspecialchars($data['id_surat']) ?>" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-warning text-white">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fa-solid fa-pen-to-square"></i> &nbspEdit Surat Tugas Guru <strong>094/<?php echo $data['no_surat']?></strong></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
		<div class="row">
			<div class="col-sm-6">
	  			<?php echo $data['nama_guru']?> <br> <strong>NIP. <?php echo $data['nip_guru']?></strong>
			</div>
			<div class="col-sm-6">
				Jenis Surat Tugas : <strong><?php echo $data['jenis_surgas']?></strong> <br>Pangkat/Gol. Ruang : <strong><?php echo $data['pangkat_guru']?>/<?php echo $data['golongan_guru']?></strong>
			</div>
		</div>
		<hr>
		<form action="edit_proses_surgas_guru.php" class="form-horizontal" method="post">
	  <!-- Nomor Surat Tugas -->
        <h6 class="m-0 font-weight-bold mb-3">1. Nomor Surat Tugas</h6>
	     <div class="form-group row">
			<div class="form-group mb-3">
				<div id="emailHelp" class="form-text text-danger">*Masukkan Nomor Surat Bagian Belakang Saja</div>
					<input type="text" name="no_surat" class="form-control" id="no_surat" value="<?php echo $data['no_surat']?>">
            <div id="emailHelp" class="form-text text-danger"><strong>Contoh : 094/958 (Inputkan Nomor Surat 958)</strong></div>
			</div>
        </div>
	  
		<!-- Nomor Surat SPPD -->
        <h6 class="m-0 font-weight-bold mb-3">2. Nomor Surat SPPD</h6>
	     <div class="form-group row">
			<div class="form-group mb-3">
				<div id="emailHelp" class="form-text text-danger">*Masukkan Nomor Surat Bagian Belakang Saja</div>
					<input type="text" name="no_surat_sppd" class="form-control" id="no_surat_sppd" value="<?php echo $data['no_surat_sppd']?>">
            <div id="emailHelp" class="form-text text-danger"><strong>Contoh : 900/958 (Inputkan Nomor Surat 958)</strong></div>
			</div>
        </div>
		
		<!-- Tujuan SPPD -->
        <h6 class="m-0 font-weight-bold mb-3">3. Tujuan Perjalanan SPPD</h6>
	     <div class="form-group row">
			<div class="form-group mb-3">
			<textarea class="form-control" name="tujuan_sppd" id="tujuan_sppd" row="5"><?php echo $data['tujuan_sppd']?></textarea>
            <div id="emailHelp" class="form-text text-danger"><strong>Contoh : Menghadiri undangan kegiatan...</strong></div>
			</div>
        </div>

		<!-- Tempat SPPD dan Anggaran SPPD -->
        <div class="form-group row">
	<div class="col-sm-6">
        <h6 class="m-0 font-weight-bold mb-3">4. Tempat Tujuan SPPD</h6>
    </div>
	<div class="col-sm-6">
        <h6 class="m-0 font-weight-bold mb-3">5. Mata Anggaran untuk SPPD</h6>
    </div>
    </div>
    
    <div class="form-group row">
		<div class="col-sm-6">
			<div class="form-group mb-3">
					<input type="text" name="tempat_sppd" class="form-control" id="tempat_sppd" value="<?php echo $data['tempat_sppd']?>">
			</div>
		</div>
		<div class="col-sm-6">
			<div class="form-group mb-3">
						<input type="text" name="mata_anggaran" class="form-control" id="mata_anggaran" value="<?php echo $data['mata_anggaran']?>">
				</div>
            </div>
        </div>

		<!-- Nama Lengkap -->
        <h6 class="m-0 font-weight-bold mb-3">2. Nama Lengkap</h6>
	     <div class="form-group row">
			<div class="form-group mb-3">
			<select id="nama_guru2" class="form-control" name="nama_guru">
			<option value="<?php echo $data['nama_guru'] ?>" readonly selected><?php echo $data['nama_guru'] ?>- <?php echo $data['nip_guru'] ?></option>
			<option value="" disabled>--- Pilih Nama Guru / Karyawan ---</option>
				<?php 
				$q2 = mysqli_query($db_conn,"select * from data_guru");
				while($r2 = mysqli_fetch_array($q2)){
					?>
					<option value="<?php echo $r2['nama_guru'] ?>"><?php echo $r2['nama_guru'] ?> - <?php echo $r2['nip_guru'] ?> - <?php echo $r2['pangkat_guru'] ?>/<?php echo $r2['golongan_guru'] ?></option>
					<?php
				}
				?>				
			</select>
        </div>
        </div>
		
         <!-- NIP -->
         <h6 class="m-0 font-weight-bold mb-3">7. NIP</h6>
	     <div class="form-group row">
			<div class="form-group mb-3">
				<input type="text" name="nip_guru" class="form-control" id="nip_guru2" value="<?php echo $data['nip_guru']?>">
			</div>
        </div>
     

        <!-- Pangkat dan Golongan -->
        <div class="form-group row">
	<div class="col-sm-6">
        <h6 class="m-0 font-weight-bold mb-3">8. Pangkat</h6>
    </div>
	<div class="col-sm-6">
        <h6 class="m-0 font-weight-bold mb-3">9. Golongan Ruang</h6>
    </div>
    </div>
    
    <div class="form-group row">
		<div class="col-sm-6">
			<div class="form-group mb-3">
					<input type="text" name="pangkat_guru" class="form-control" id="pangkat_guru2" value="<?php echo $data['pangkat_guru']?>">
			</div>
		</div>
		<div class="col-sm-6">
			<div class="form-group mb-3">
						<input type="text" name="golongan_guru" class="form-control" id="golongan_guru2" value="<?php echo $data['golongan_guru']?>">
				</div>
            </div>
        </div>


        <!-- Jabatan dan Jenis Surat Tugas -->
        <div class="form-group row">
	<div class="col-sm-6">
        <h6 class="m-0 font-weight-bold mb-3">10. Jabatan</h6>
    </div>
	<div class="col-sm-6">
        <h6 class="m-0 font-weight-bold mb-3">11. Jenis Surat Tugas</h6>
    </div>
    </div>
    
    <div class="form-group row">
		<div class="col-sm-6">
			<div class="form-group mb-3">
					<input type="text" name="jabatan" class="form-control" id="jabatan" value="<?php echo $data['jabatan']?>">
			</div>
		</div>
		<div class="col-sm-6">
			<div class="form-group mb-3">
				<select id="jenis_surgas" class="form-control" name="jenis_surgas" required autofocus>
					<?php if($data['jenis_surgas'] == 'Dalam Kota'){?>
						<option value="<?php echo $data['jenis_surgas']?>" readonly selected><?php echo $data['jenis_surgas']?></option>
						<option value="Luar Kota">Luar Kota</option>
					<?php }else{
					?>
						<option value="<?php echo $data['jenis_surgas']?>" readonly selected><?php echo $data['jenis_surgas']?></option>
						<option value="Dalam Kota">Dalam Kota</option>
					<?php }?>
				</select>
				<div id="emailHelp" class="form-text text-danger">*Silahkan Pilih Jenis Surat Tugas (Dalam Kota / Luar Kota)</div>
				</div>
            </div>
        </div>


        <!-- Dasar Surat -->
         <h6 class="m-0 font-weight-bold mb-3">12. Dasar Surat</h6>
	     <div class="form-group row">
			<div class="form-group mb-3">

				<div class="form-check">
					<input class="form-check-input" type="radio" name="choose" id="ada2" value="ada2" checked>
						<label class="form-check-label" for="flexRadioDefault1">Ada</label>
					</div>
					<div class="form-group mb-3">
						<textarea class="form-control" id="dasar_surat2" name="dasar_surat" rows="5"><?php echo $data['dasar_surat']?></textarea>
					</div>

				<div class="form-check">
					<input class="form-check-input" type="radio" name="choose" id="tidak_ada2" value="tidak_ada2">
						<label class="form-check-label" for="flexRadioDefault2">Tidak Ada</label>
				</div>
				
			</div>
        </div>


        <!-- Isi Surat -->
         <h6 class="m-0 font-weight-bold mb-3">13. Isi Surat</h6>
	     <div class="form-group row">
			<div class="form-group mb-3">
				<textarea class="form-control" id="isi_surat" name="isi_surat" rows="5"><?php echo $data['isi_surat']?></textarea>
			</div>
        </div>
        

        <!-- Tanggal & Jam Acara-->
        <div class="form-group row">
	<div class="col-sm-4">
        <h6 class="m-0 font-weight-bold mb-3">14. Tanggal Mulai Acara</h6>
    </div>
	<div class="col-sm-4">
        <h6 class="m-0 font-weight-bold mb-3">15. Waktu Mulai Acara</h6>
    </div>
	<div class="col-sm-4">
        <h6 class="m-0 font-weight-bold mb-3">16. Waktu Selesai Acara</h6>
    </div>
    </div>
    
    <div class="form-group row">
		<div class="col-sm-4">
			<div class="form-group mb-3">
					<input type="date" name="tgl_kegiatan" class="form-control" id="tgl_kegiatan" value="<?php echo $data['tgl_kegiatan']?>">
			</div>
		</div>
		<div class="col-sm-4">
			<div class="form-group mb-3">
						<input type="text" name="mulai_kegiatan" class="form-control" id="mulai_kegiatan" value="<?php echo $data['mulai_kegiatan']?>">
					<div id="emailHelp" class="form-text text-danger">*Dipakai untuk 1 hari saja, Apabila lebih dari 1 hari dikosongi saja</div>
				</div>
            </div>
		<div class="col-sm-4">
			<div class="form-group mb-3">
						<input type="text" name="sampai_kegiatan" class="form-control" id="sampai_kegiatan" value="<?php echo $data['sampai_kegiatan']?>">
						<div id="emailHelp" class="form-text text-danger">*Dipakai untuk 1 hari saja, Apabila lebih dari 1 hari dikosongi saja</div>

				</div>
            </div>
        </div>
       
		<!-- Tanggal Pembukaan dan Penutupan Acara-->
        <div class="form-group row">
	<div class="col-sm-4">
        <h6 class="m-0 font-weight-bold mb-3">17. Tanggal Selesai Acara</h6>
    </div>
	<div class="col-sm-4">
        <h6 class="m-0 font-weight-bold mb-3">18. Tanggal Pembukaan Acara</h6>
    </div>
	<div class="col-sm-4">
        <h6 class="m-0 font-weight-bold mb-3">19. Tanggal Penutupan Acara</h6>
    </div>
    </div>
    
    <div class="form-group row">
		<div class="col-sm-4">
			<div class="form-group mb-3">
					<input type="date" name="tgl_selesai" class="form-control" id="tgl_selesai" value="<?php echo $data['tgl_selesai']?>">
					<div id="emailHelp" class="form-text text-danger">*Dipakai apabila lebih dari 1 hari</div>
			</div>
		</div>
		<div class="col-sm-4">
			<div class="form-group mb-3">
						<input type="date" name="tgl_pembukaan" class="form-control" id="tgl_pembukaan" value="<?php echo $data['tgl_pembukaan']?>">
					<div id="emailHelp" class="form-text text-danger">*Dipakai apabila lebih dari 1 hari</div>
				</div>
            </div>
		<div class="col-sm-4">
			<div class="form-group mb-3">
						<input type="date" name="tgl_penutupan" class="form-control" id="tgl_penutupan" value="<?php echo $data['tgl_penutupan']?>">
						<div id="emailHelp" class="form-text text-danger">*Dipakai apabila lebih dari 1 hari</div>
				</div>
            </div>
        </div>

		
		<!-- Jam Pembukaan dan Penutupan Acara -->
        <div class="form-group row">
	<div class="col-sm-6">
        <h6 class="m-0 font-weight-bold mb-3">20. Jam Pembukaan Acara</h6>
    </div>
	<div class="col-sm-6">
        <h6 class="m-0 font-weight-bold mb-3">21. Jam Penutupan Acara</h6>
    </div>
    </div>
    
    <div class="form-group row">
		<div class="col-sm-6">
			<div class="form-group mb-3">
			<input type="text" name="jam_pembukaan" class="form-control" id="jam_pembukaan" value="<?php echo $data['jam_pembukaan']?>">
			<div id="emailHelp" class="form-text text-danger">*Dipakai apabila lebih dari 1 hari</div>
			</div>
		</div>
		<div class="col-sm-6">
			<div class="form-group mb-3">
			<input type="text" name="jam_penutupan" class="form-control" id="jam_penutupan" value="<?php echo $data['jam_penutupan']?>">
			<div id="emailHelp" class="form-text text-danger">*Dipakai apabila lebih dari 1 hari</div>
				</div>
            </div>
        </div>

		
        <!-- Tempat -->
		<h6 class="m-0 font-weight-bold mb-3">22. Tempat</h6>
	     <div class="form-group row">
			<div class="form-group mb-3">
					<input type="text" name="tempat" class="form-control" id="tempat" value="<?php echo $data['tempat']?>">
			</div>
        </div>

		
        <!-- Jalan -->
		<h6 class="m-0 font-weight-bold mb-3">23. Jalan</h6>
	     <div class="form-group row">
			<div class="form-group mb-3">
					<input type="text" name="jalan" class="form-control" id="jalan" value="<?php echo $data['jalan']?>">
			</div>
        </div>

		<!-- div modal body -->
	</div>

	<div class="modal-footer">
		<button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="fas fa-times"></i> Close</button>
        <button type="submit" name="submit" class="btn btn-primary"><i class="fas fa-paper-plane"></i> Kirim</button>
	</div>
	<input type="hidden" name="id_surat" id="id_surat" value="<?php echo $data['id_surat']?>">
		</form>

    </div>
  </div>
</div>
					
					<?php 
					// echo '<td><a data-bs-toggle="modal" data-bs-target="#delete_sk'.htmlspecialchars($data['id_surat']).'" class="btn btn-danger" style="width:100%; color:white;"><i class="fas fa-trash text-white"></i> Hapus</a> </td>';
					echo '</tr>'; 
					
					$hari = array ( 1 =>    'Senin',
					'Selasa',
					'Rabu',
					'Kamis',
					'Jumat',
					'Sabtu',
					'Minggu'
				);
		  $tgl = date('N', strtotime($data['tgl_kegiatan']));
		  
		  ?>


<!-- Modal Delete Data-->
<div class="modal fade" id="delete_surgas_guru<?php echo htmlspecialchars($data['id_surat']) ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-danger text-white">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fa-solid fa-trash-can"></i> &nbspHapus Surat Tugas Guru (<?php echo $data['jenis_surgas']?>) <br>
		<strong><?php echo $data['nama_guru']?> - Nomor Surat 094/<?php echo $data['no_surat']?></strong></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
	  <?php 
		$hari = array ( 1 =>    'Senin',
		'Selasa',
		'Rabu',
		'Kamis',
		'Jumat',
		'Sabtu',
		'Minggu');
		$tgl = date('N', strtotime($data['tgl_kegiatan']));
		$tgl2 = date('N', strtotime($data['tgl_penutupan']));
		?>
		<i><strong><h5>Surat Tugas <?php echo $data['jenis_surgas']?></h5></strong></i><hr>
	  <strong><?php echo $data['nama_guru']?> <br>NIP. <?php echo $data['nip_guru']?> - <?php echo $data['pangkat_guru']?>/<?php echo $data['golongan_guru']?></strong><hr>
	  <strong>Jabatan : </strong><?php echo $data['jabatan']?><br>
	  <strong>Dasar Surat : </strong><?php if($data['dasar_surat'] == ''){?>
		<i class="text-danger">Tidak Ada Dasar Surat</i>
		<?php }else{?>
		<?php echo $data['dasar_surat']?>
		<?php }?><br>
	  <strong>Isi Surat : </strong><?php echo $data['isi_surat']?><br>
	  <strong>Lama Hari :</strong> <?php if($data['tgl_selesai'] == '0000-00-00'){
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
          }?><br>
	  <?php if($data['tgl_selesai'] == '0000-00-00'){?>
	  <strong>Hari/Tanggal : </strong><?php echo $hari[$tgl]?>, <?php echo tgl_indo($data['tgl_kegiatan'])?><br>
	  <?php }else{?>
		<strong>Hari/Tanggal : </strong><?php echo $hari[$tgl]?> s.d. <?php echo $hari[$tgl2]?>, <?php echo tgl_indo($data['tgl_kegiatan'])?> s.d. 
		<?php if($data['tgl_penutupan'] == '0000-00-00'){
			echo tgl_indo($data['tgl_selesai']);
		}else if($data['tgl_selesai'] == '0000-00-00'){ 
			 echo tgl_indo($data['tgl_penutupan']);
		}else{
			echo tgl_indo($data['tgl_penutupan']);
		}?><br>
	  <?php }?>
	  <?php if($data['mulai_kegiatan'] == '' && $data['sampai_kegiatan'] == ''){?>
		<strong>Pembukaan : </strong><?php echo $hari[$tgl]?>, <?php echo tgl_indo($data['tgl_kegiatan'])?>, Pukul <?php echo $data['jam_pembukaan']?><br>
		<strong>Penutupan : </strong><?php echo $hari[$tgl2]?>, <?php echo tgl_indo($data['tgl_penutupan'])?>, Pukul <?php echo $data['jam_penutupan']?><br>
	<?php }else {  
		if($data['sampai_kegiatan'] == 'Selesai' || $data['sampai_kegiatan'] == 'selesai'){?>
		<strong>Waktu :</strong> Pukul <?php echo $data['mulai_kegiatan']?> WIB - <?php echo $data['sampai_kegiatan']?><br>
		<?php }else {?>
			<strong>Waktu :</strong> Pukul <?php echo $data['mulai_kegiatan']?> - <?php echo $data['sampai_kegiatan']?>  WIB<br>
		<?php }?>
	<?php }?>
		<strong>Tempat Kegiatan : </strong><?php echo ($data['tempat'])?><br>
		<?php if($data['jalan'] == '' || $data['jalan'] == '-'){
		echo '';
		} else {
			echo '<strong>Jalan : </strong>'.$data['jalan'];
		}?><br>
		<hr>
	<h5>Yakin ingin menghapus Surat Tugas Guru - <strong><?php echo $data['nama_guru']?> - Nomor Surat 094/<?php echo $data['no_surat']?></strong> ?</h5>
	<div class="modal-footer">
		<button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="fas fa-times"></i> Batal</button>
        <a href="delete_proses_surgas_guru.php?id_surat=<?php echo $data['id_surat']?>" type="submit" name="submit" class="btn btn-success"><i class="fas fa-check"></i> Yakin</a>
	</div>
    </div>
  </div>
</div>



	
				<?php }
			} else {
				echo '<tr>
				<td colspan="8"><em>Belum ada data! Segera lakukan upload data.</em></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				</tr>';
			}
			?>
        </tbody>
        <tfoot>
            <tr>
            <th class="text-center">No</th>
                <th>Nomor Surat</th>
                <th>Nama Guru</th>
                <th>Pangkat / Golongan</th>
                <th>Jenis Surat Tugas</th>
                <th>Tanggal</th>
                <th>Pembuat Surat</th>
                <th></th>
            </tr>
        </tfoot>
    </table>

	

		<!-- </div> -->

        </div>
      </div>
    </div>
<br>
<br>
<br>
<br>
<script type="text/javascript">
		$(document).ready(function() {
			$('input[name="choose"]').click(function() 
											{
				var value = $(this).val();
				if( value == "tidak_ada2")
				{
				$('#dasar_surat2').hide();
				}
				else{
				$('#dasar_surat2').show();
				}
			});
			});
		</script>

<script>
		$(function() {
			$("#guru").change(function(){
				var nama_guru = $("#guru").val();
 
				$.ajax({
					url: 'ajax_surgas.php',
					type: 'POST',
					dataType: 'json',
					data: {
						'nama_guru': nama_guru
					},
					success: function (data_guru) {
						if(data_guru['nip_guru'] == '-'){
						$("#nip_guru").val('-');
						} else{
							$("#nip_guru").val(data_guru['nip_guru']);
						}
						$("#pangkat_guru").val(data_guru['pangkat_guru']);
						$("#golongan_guru").val(data_guru['golongan_guru']);
					}
				});
			});
		});
	</script>

<script>
		$(function() {
			$("#nama_guru2").change(function(){
				var nama_guru2 = $("#nama_guru2").val();
 
				$.ajax({
					url: 'ajax_surgas.php',
					type: 'POST',
					dataType: 'json',
					data: {
						'nama_guru': nama_guru2
					},
					success: function (data_guru2) {
						if(data_guru2['nip_guru'] == '-'){
						$("#nip_guru2").val('-');
						} else{
							$("#nip_guru2").val(data_guru2['nip_guru']);
						}
						$("#pangkat_guru2").val(data_guru2['pangkat_guru']);
						$("#golongan_guru2").val(data_guru2['golongan_guru']);
					}
				});
			});
		});
	</script>



	
	

<script>
	$(document).ready(function () {
    $('#example').DataTable();
});
</script>

<?php
include '_footer.php';
} else {
	header('Location: ../');
}
?>