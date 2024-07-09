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
        
	  <!-- Nomor Surat -->
        <h6 class="m-0 font-weight-bold mb-3">1. Nomor Surat</h6>
	     <div class="form-group row">
			<div class="form-group mb-3">
				<div id="emailHelp" class="form-text text-danger">*Masukkan Nomor Surat Bagian Belakang Saja</div>
					<input type="text" name="no_surat" class="form-control" id="no_surat" placeholder="Masukkan Nomor Surat" required autofocus>
            <div id="emailHelp" class="form-text text-danger"><strong>Contoh : 094/958 (Inputkan Nomor Surat 958)</strong></div>
			</div>
        </div>
        
            <!-- Nama Lengkap -->
        <h6 class="m-0 font-weight-bold mb-3">2. Nama Lengkap</h6>
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
         <h6 class="m-0 font-weight-bold mb-3">3. NIP</h6>
	     <div class="form-group row">
			<div class="form-group mb-3">
				<input type="text" name="nip_guru" class="form-control" id="nip_guru" placeholder="Masukkan NIP" readonly>
			</div>
        </div>
     

        <!-- Pangkat dan Golongan -->
        <div class="form-group row">
	<div class="col-sm-6">
        <h6 class="m-0 font-weight-bold mb-3">4. Pangkat</h6>
    </div>
	<div class="col-sm-6">
        <h6 class="m-0 font-weight-bold mb-3">5. Golongan Ruang</h6>
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
        <h6 class="m-0 font-weight-bold mb-3">6. Jabatan</h6>
    </div>
	<div class="col-sm-6">
        <h6 class="m-0 font-weight-bold mb-3">7. Jenis Surat Tugas</h6>
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
         <h6 class="m-0 font-weight-bold mb-3">8. Dasar Surat</h6>
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
         <h6 class="m-0 font-weight-bold mb-3">9. Isi Surat</h6>
	     <div class="form-group row">
			<div class="form-group mb-3">
				<textarea class="form-control" id="isi_surat" name="isi_surat" rows="5" placeholder="Masukkan Isi Surat" required autofocus></textarea>
			</div>
        </div>
        

        <!-- Tanggal & Jam Acara-->
        <div class="form-group row">
	<div class="col-sm-4">
        <h6 class="m-0 font-weight-bold mb-3">10. Tanggal Mulai Acara</h6>
    </div>
	<div class="col-sm-4">
        <h6 class="m-0 font-weight-bold mb-3">11. Waktu Mulai Acara</h6>
    </div>
	<div class="col-sm-4">
        <h6 class="m-0 font-weight-bold mb-3">12. Waktu Selesai Acara</h6>
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
        <h6 class="m-0 font-weight-bold mb-3">13. Tanggal Selesai Acara</h6>
    </div>
	<div class="col-sm-4">
        <h6 class="m-0 font-weight-bold mb-3">14. Tanggal Pembukaan Acara</h6>
    </div>
	<div class="col-sm-4">
        <h6 class="m-0 font-weight-bold mb-3">15. Tanggal Penutupan Acara</h6>
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
        <h6 class="m-0 font-weight-bold mb-3">16. Jam Pembukaan Acara</h6>
    </div>
	<div class="col-sm-6">
        <h6 class="m-0 font-weight-bold mb-3">17. Jam Penutupan Acara</h6>
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
		<h6 class="m-0 font-weight-bold mb-3">18. Tempat</h6>
	     <div class="form-group row">
			<div class="form-group mb-3">
					<input type="text" name="tempat" class="form-control" id="tempat" placeholder="Masukkan Tempat Diselenggarakannya Kegiatan" required autofocus>
			</div>
        </div>

		
        <!-- Jalan -->
		<h6 class="m-0 font-weight-bold mb-3">19. Jalan</h6>
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
	  <div >
            <table id="example" class="table" style="width:100%">
        <thead>
            <tr>
                <th class="text-center">No</th>
                <th>Nomor Surat</th>
                <th>Nama Guru</th>
                <th>Pangkat / Golongan</th>
                <th>Jenis Surat Tugas</th>
                <th>Tanggal</th>
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
					echo '<td>'.indo($data['tgl_create']).'</td>';
					echo '<td>
					<div class="btn-group">
  					<button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
					Aksi
					</button> 
  					<ul class="dropdown-menu">';
                    if($data['jenis_surgas'] == 'Dalam Kota'){
					 echo '<li><a href="../cetak_dalam_kota.php?no_surat='.$data['no_surat'].'"><button class="btn btn-sm"><i class="fas fa-download"></i> Unduh</button></a> </li>';
                    } else if ($data['jenis_surgas'] == 'Luar Kota'){
					 echo '<li><a href="../cetak_luar_kota.php?no_surat='.$data['no_surat'].'"><button class="btn btn-sm"><i class="fas fa-download"></i> Unduh</button></a> </li>';
					 echo '<li><a href="../cetak_sppd.php?no_surat='.$data['no_surat'].'"><button class="btn btn-sm"><i class="fa-solid fa-cloud-arrow-down"></i> Unduh SPPD</button></a> </li>';
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
	  <strong><?php echo $data['nama_guru']?> <br>NIP. <?php echo $data['nip_guru']?> - <?php echo $data['pangkat_guru']?>/<?php echo $data['golongan_guru']?></strong><hr>
	  <strong>Jabatan : </strong><?php echo $data['jabatan']?><br>
	  <strong>Dasar Surat : </strong><?php if($data['dasar_surat'] == ''){?>
		<i class="text-danger">Tidak Ada Dasar Surat</i>
		<?php }else{?>
		<?php echo $data['dasar_surat']?>
		<?php }?><br>
	  <strong>Isi Surat : </strong><?php echo $data['isi_surat']?><br>
	  <?php if($data['tgl_selesai'] == '0000-00-00'){?>
	  <strong>Hari/Tanggal : </strong><?php echo $hari[$tgl]?>, <?php echo tgl_indo($data['tgl_kegiatan'])?><br>
	  <?php }else{?>
		<strong>Hari/Tanggal : </strong><?php echo $hari[$tgl]?> s.d. <?php echo $hari[$tgl2]?>, <?php echo tgl_indo($data['tgl_kegiatan'])?> s.d. <?php echo tgl_indo($data['tgl_penutupan'])?><br>
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
		<strong>Jalan : </strong><?php echo ($data['jalan'])?><br>


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
        <h5 class="modal-title" id="exampleModalLabel"><i class="fa-solid fa-pen-to-square"></i> &nbspEdit Surat Keterangan <strong>800/<?php echo $data['no_surat']?> - <?php echo $data['nama_lengkap']?></strong></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
	  <form action="edit_proses_surgas_guru.php" class="form-horizontal" method="post">
		<!-- Nomor Surat -->
        <h6 class="m-0 font-weight-bold mb-3">1. Nomor Surat</h6>
	     <div class="form-group row">
			<div class="form-group mb-3">
				<div id="emailHelp" class="form-text text-danger">*Masukkan Nomor Surat Bagian Belakang Saja</div>
					<input type="text" name="no_surat" class="form-control" id="no_surat" value="<?php echo $data['no_surat']?>">
            <div id="emailHelp" class="form-text text-danger"><strong>Contoh : 094/958 (Inputkan Nomor Surat 958)</strong></div>
			</div>
        </div>
        
            <!-- Nama Lengkap -->
        <h6 class="m-0 font-weight-bold mb-3">2. Nama Lengkap</h6>
	     <div class="form-group row">
			<div class="form-group mb-3">
			<select id="nama_siswa2" class="form-control" name="nama_lengkap">
			<option value="<?php echo $data['nama_lengkap'] ?>" readonly selected><?php echo $data['nama_lengkap'] ?> - <?php echo $data['kelas'] ?></option>
			<option value="" disabled>--- Pilih Nama Lengkap ---</option>
				<?php 
				$q1 = mysqli_query($db_conn,"select * from data_siswa");
				while($r1 = mysqli_fetch_array($q1)){
					?>
					<option value="<?php echo $r1['nama_lengkap'] ?>"><?php echo $r1['nama_lengkap'] ?> - <?php echo $r1['kelas'] ?></option>
					<?php
				}
				?>				
			</select>
			</div>
        </div>

        <!-- Nama Orang Tua-->
        <div class="form-group row">
	<div class="col-sm-6">
        <h6 class="m-0 font-weight-bold mb-3">3. Nama Ayah</h6>
    </div>
	<div class="col-sm-6">
        <h6 class="m-0 font-weight-bold mb-3">4. Nama Ibu</h6>
    </div>
    </div>
    
    <div class="form-group row">
		<div class="col-sm-6">
			<div class="form-group mb-3">
					<input type="text" name="nama_ayah" class="form-control" id="nama_ayah2" value="<?php echo $data['nama_ayah']?>" readonly>
			</div>
		</div>
		<div class="col-sm-6">
			<div class="form-group mb-3">
						<input type="text" name="nama_ibu" class="form-control" id="nama_ibu2" value="<?php echo $data['nama_ibu']?>" readonly>
				</div>
            </div>
        </div>

         <!-- Kelas -->
         <h6 class="m-0 font-weight-bold mb-3">5. Kelas</h6>
	     <div class="form-group row">
			<div class="form-group mb-3">
					<input type="text" name="kelas" class="form-control" id="kelas2" value="<?php echo $data['kelas']?>" readonly>
            <div id="emailHelp" class="form-text text-danger"><strong>Contoh : XII KUL 1</strong></div>
			</div>
        </div>
     
        <!-- Alamat -->
         <h6 class="m-0 font-weight-bold mb-3">6. Alamat</h6>
	     <div class="form-group row">
			<div class="form-group mb-3">
				<input type="text" name="alamat" class="form-control" id="alamat" value="<?php echo $data['alamat']?>">
			</div>
        </div>
        
        <!-- Nama Wali Kelas -->
         <h6 class="m-0 font-weight-bold mb-3">7. Nama Wali Kelas</h6>
	     <div class="form-group row">
		 <div class="form-group mb-3">
		 <select id="nama_walikelas2" class="form-control" name="nama_walikelas">
			<option value="<?php echo $data['nama_walikelas'] ?>" readonly selected><?php echo $data['nama_walikelas'] ?>- <?php echo $data['nip_walikelas'] ?></option>
			<option value="" disabled>--- Pilih Nama Wali Kelas ---</option>
				<?php 
				$q2 = mysqli_query($db_conn,"select * from data_guru");
				while($r2 = mysqli_fetch_array($q2)){
					?>
					<option value="<?php echo $r2['nama_guru'] ?>"><?php echo $r2['nama_guru'] ?> - <?php echo $r2['nip_guru'] ?></option>
					<?php
				}
				?>				
			</select>
        </div>
        </div>
        
		<!-- NIP Wali Kelas -->
         <h6 class="m-0 font-weight-bold mb-3">8. NIP Wali Kelas</h6>
	     <div class="form-group row">
		 <div class="form-group mb-3">
				<input type="text" name="nip_walikelas" class="form-control" id="nip_walikelas2" value="<?php echo $data['nip_walikelas']?>" readonly>    
        </div>
        </div>
        
		<!-- Pangkat & Golongan Wali Kelas-->
        <div class="form-group row">
	<div class="col-sm-6">
        <h6 class="m-0 font-weight-bold mb-3">9. Pangkat Wali Kelas</h6>
    </div>
	<div class="col-sm-6">
        <h6 class="m-0 font-weight-bold mb-3">10. Golongan Wali Kelas</h6>
    </div>
    </div>
    
    <div class="form-group row">
		<div class="col-sm-6">
			<div class="form-group mb-3">
				<input type="text" name="pangkat_walikelas" class="form-control" id="pangkat_walikelas2" value="<?php echo $data['pangkat_walikelas']?>" readonly>
			</div>
		</div>
		<div class="col-sm-6">
			<div class="form-group mb-3">
					<input type="text" name="golongan_walikelas" class="form-control" id="golongan_walikelas2" value="<?php echo $data['golongan_walikelas']?>" readonly>
				</div>
            </div>
        </div>
        
        <!-- Nama Guru BP/BK -->
         <h6 class="m-0 font-weight-bold mb-3">11. Nama Guru BP/BK</h6>
	     <div class="form-group row">
		 <div class="form-group mb-3">
		 <select id="nama_bk2" class="form-control" name="nama_bk">
			<option value="<?php echo $data['nama_bk'] ?>" readonly selected><?php echo $data['nama_bk'] ?>- <?php echo $data['nip_bk'] ?></option>
			<option value="" disabled>--- Pilih Nama Guru BP/BK ---</option>
				<?php 
				$q2 = mysqli_query($db_conn,"select * from data_guru");
				while($r2 = mysqli_fetch_array($q2)){
					?>
					<option value="<?php echo $r2['nama_guru'] ?>"><?php echo $r2['nama_guru'] ?> - <?php echo $r2['nip_guru'] ?></option>
					<?php
				}
				?>				
			</select>
        </div>
        </div>
        
		<!-- Nama Guru BP/BK -->
         <h6 class="m-0 font-weight-bold mb-3">12. NIP Guru BP/BK</h6>
	     <div class="form-group row">
		 <div class="form-group mb-3">
				<input type="text" name="nip_bk" class="form-control" id="nip_bk2" value="<?php echo $data['nip_bk']?>" readonly>    
        </div>
        </div>
        
		<!-- Pangkat & Golongan Guru BP/BK-->
        <div class="form-group row">
	<div class="col-sm-6">
        <h6 class="m-0 font-weight-bold mb-3">13. Pangkat Guru BP/BK</h6>
    </div>
	<div class="col-sm-6">
        <h6 class="m-0 font-weight-bold mb-3">14. Golongan Guru BP/BK</h6>
    </div>
    </div>
    
    <div class="form-group row">
		<div class="col-sm-6">
			<div class="form-group mb-3">
					<input type="text" name="pangkat_bk" class="form-control" id="pangkat_bk2" value="<?php echo $data['pangkat_bk']?>" readonly>
			</div>
		</div>
		<div class="col-sm-6">
			<div class="form-group mb-3">
						<input type="text" name="golongan_bk" class="form-control" id="golongan_bk2" value="<?php echo $data['golongan_bk']?>" readonly>
				</div>
            </div>
        </div>

        <!-- Tanggal & Jam Kunjungan-->
        <div class="form-group row">
	<div class="col-sm-6">
        <h6 class="m-0 font-weight-bold mb-3">15. Tanggal Kunjungan</h6>
    </div>
	<div class="col-sm-6">
        <h6 class="m-0 font-weight-bold mb-3">16. Jam Kunjungan</h6>
    </div>
    </div>
    
    <div class="form-group row">
		<div class="col-sm-6">
			<div class="form-group mb-3">
					<input type="date" name="tgl_kunjungan" class="form-control" id="tgl_kunjungan" value="<?php echo $data['tgl_kunjungan']?>">
			</div>
		</div>
		<div class="col-sm-6">
			<div class="form-group mb-3">
						<input type="text" name="jam_kunjungan" class="form-control" id="jam_kunjungan" value="<?php echo $data['jam_kunjungan']?>">
						<div id="emailHelp" class="form-text text-danger"><strong>Contoh : 09.00</strong></div>
				</div>
            </div>
        </div>
        


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
        <h5 class="modal-title" id="exampleModalLabel"><i class="fa-solid fa-trash-can"></i> &nbspHapus Surat Kunjungan / Homevisit <strong>094/<?php echo $data['no_surat']?> - <?php echo $data['nama_lengkap']?></strong></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
		<h4>Detail Surat</h4>
		<hr><strong>Nama Siswa :</strong> <?php echo $data['nama_lengkap']?>
		<br> <strong>Kelas : </strong><?php echo $data['kelas']?>
		<br> <strong>Nama Wali Kelas : </strong><?php echo $data['nama_walikelas']?>
		<br> <strong>Nama Guru BP/BK : </strong><?php echo $data['nama_bk']?>
		<br> <strong>Nama Orang Tua : </strong><?php echo $data['nama_ayah']?> / <?php echo $data['nama_ibu']?>
		<br> <strong>Alamat : </strong><?php echo $data['alamat']?>
		<br> <strong>Waktu Kunjungan : </strong><?php echo $hari[$tgl]?>, <?php echo tgl_indo($data['tgl_kunjungan'])?> - Pukul <?php echo $data['jam_kunjungan']?> WIB
	</p><hr>
	<h5>Yakin ingin menghapus Surat Kunjungan / Homevisit <strong>Nomor 094/<?php echo $data['no_surat']?></strong> ?</h5>
	<div class="modal-footer">
		<button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="fas fa-times"></i> Batal</button>
        <a href="delete_proses_homevisit.php?id_surat=<?php echo $data['id_surat']?>" type="submit" name="submit" class="btn btn-success"><i class="fas fa-check"></i> Yakin</a>
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


<script>
		$(function() {
			$("#nama_siswa2").change(function(){
				var nama_lengkap = $("#nama_siswa2").val();
 
				$.ajax({
					url: 'ajax.php',
					type: 'POST',
					dataType: 'json',
					data: {
						'nama_lengkap': nama_lengkap
					},
					success: function (data_siswa) {
						if(data_siswa['nama_ayah'] == '-'){
						$("#nama_ayah2").val(data_siswa['nama_ibu']);
						} else{
							$("#nama_ayah2").val(data_siswa['nama_ayah']);
						}
						$("#nama_ibu2").val(data_siswa['nama_ibu']);
						$("#kelas2").val(data_siswa['kelas']);
					}
				});
			});
		});
	</script>

<script>
		$(function() {
			$("#nama_guru").change(function(){
				var nama_guru = $("#nama_guru").val();
 
				$.ajax({
					url: 'ajax_homevisit.php',
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
				var nama_guru = $("#nama_guru2").val();
 
				$.ajax({
					url: 'ajax_homevisit.php',
					type: 'POST',
					dataType: 'json',
					data: {
						'nama_guru': nama_guru
					},
					success: function (data_guru) {
						if(data_guru['nip_guru'] == '-'){
						$("#nip_guru2").val('-');
						} else{
							$("#nip_guru2").val(data_guru['nip_guru']);
						}
						$("#pangkat_guru2").val(data_guru['pangkat_guru']);
						$("#golongan_guru2").val(data_guru['golongan_guru']);
					}
				});
			});
		});
	</script>
	
<script>
		$(function() {
			$("#nama_walikelas2").change(function(){
				var nama_guru = $("#nama_walikelas2").val();
 
				$.ajax({
					url: 'ajax_homevisit.php',
					type: 'POST',
					dataType: 'json',
					data: {
						'nama_guru': nama_guru
					},
					success: function (data_guru) {
						if(data_guru['nip_walikelas'] == '-'){
						$("#nip_walikelas2").val('-');
						} else{
							$("#nip_walikelas2").val(data_guru['nip_guru']);
						}
						$("#pangkat_walikelas2").val(data_guru['pangkat_guru']);
						$("#golongan_walikelas2").val(data_guru['golongan_guru']);
					}
				});
			});
		});
	</script>

<script>
		$(function() {
			$("#nama_bk2").change(function(){
				var nama_guru = $("#nama_bk2").val();
 
				$.ajax({
					url: 'ajax_homevisit.php',
					type: 'POST',
					dataType: 'json',
					data: {
						'nama_guru': nama_guru
					},
					success: function (data_guru) {
						if(data_guru['nip_bk'] == '-'){
						$("#nip_bk2").val('-');
						} else{
							$("#nip_bk2").val(data_guru['nip_guru']);
						}
						$("#pangkat_bk2").val(data_guru['pangkat_guru']);
						$("#golongan_bk2").val(data_guru['golongan_guru']);
					}
				});
			});
		});
	</script>

<script>
		$(function() {
			$("#guru").change(function(){
				var nama_guru = $("#guru").val();
 
				$.ajax({
					url: 'ajax_homevisit.php',
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