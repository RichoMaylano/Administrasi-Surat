<?php
session_start();
if(isset($_SESSION['logged']) && !empty($_SESSION['logged'])){
include "../database.php";
include "../indo.php";
include "../tgl_indo.php";
$title = "Surat Homevisit | Administrasi";
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
      <div class="card-header bg-warning bg-gradient text-white py-3" >
	  <div class="row">
		<div class="col-sm-10">
			<h4 class="m-0 font-weight-bold"><i class="fa-solid fa-house-chimney-user"></i>  <strong>Surat Kunjungan / Homevisit</strong></h4>
		</div>
		<div class="col-sm-2">
				<div class="btn-group shadow rounded">
					<!-- Button trigger modal -->
					<a class="btn btn-light bg-gradient" type="button" data-bs-toggle="modal" data-bs-target="#add_homevisit"aria-current="page">Tambah Data</a>
					<a href="#" class="btn btn-warning bg-gradient text-white active"><i class="fa-regular fa-square-plus"></i></a>
				</div>
		</div>
		</div>

      </div>    
      <div class="card-body">

<!-- Modal Tambah Data-->
<div class="modal fade" tabindex="-1" id="add_homevisit" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-success text-white">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fa-regular fa-square-plus"></i> &nbspTambah Data <strong>Surat Kunjungan / Homevisit</strong></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
	  <form action="add_proses_homevisit.php" class="form-horizontal" method="post">
        
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
			<select id="nama_lengkap" class="form-control" name="nama_lengkap">
			<option value="" disabled selected>--- Pilih Nama Lengkap ---</option>
				<?php 
				$data = mysqli_query($db_conn,"select * from data_siswa");
				while($d = mysqli_fetch_array($data)){
					?>
					<option value="<?php echo $d['nama_lengkap'] ?>"><?php echo $d['nama_lengkap'] ?> - <?php echo $d['jurusan'] ?> - <?php echo $d['nis'] ?></option>
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
					<input type="text" name="nama_ayah" class="form-control" id="nama_ayah" placeholder="Masukkan Nama Ayah" readonly>
			</div>
		</div>
		<div class="col-sm-6">
			<div class="form-group mb-3">
						<input type="text" name="nama_ibu" class="form-control" id="nama_ibu" placeholder="Masukkan Nama Ibu" readonly>
				</div>
            </div>
        </div>

         <!-- Kelas -->
         <h6 class="m-0 font-weight-bold mb-3">5. Kelas</h6>
	     <div class="form-group row">
			<div class="form-group mb-3">
					<input type="text" name="kelas" class="form-control" id="kelas" placeholder="Masukkan Kelas" readonly>
            <div id="emailHelp" class="form-text text-danger"><strong>Contoh : XII KUL 1</strong></div>
			</div>
        </div>
     
        <!-- Alamat -->
         <h6 class="m-0 font-weight-bold mb-3">6. Alamat</h6>
	     <div class="form-group row">
			<div class="form-group mb-3">
					<input type="text" name="alamat" class="form-control" id="alamat" placeholder="Masukkan Alamat" required autofocus>
			</div>
        </div>
        
        <!-- Nama Wali Kelas -->
         <h6 class="m-0 font-weight-bold mb-3">7. Nama Wali Kelas</h6>
	     <div class="form-group row">
		 <div class="form-group mb-3">
		 <select id="nama_guru" class="form-control" name="nama_walikelas">
			<option value="" disabled selected>--- Pilih Nama Wali Kelas ---</option>
				<?php 
				$data = mysqli_query($db_conn,"select * from data_guru");
				while($d = mysqli_fetch_array($data)){
					?>
					<option value="<?php echo $d['nama_guru'] ?>"><?php echo $d['nama_guru'] ?> - <?php echo $d['nip_guru'] ?></option>
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
				<input type="text" name="nip_walikelas" class="form-control" id="nip_guru" placeholder="Masukkan NIP Wali Kelas" readonly>    
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
					<input type="text" name="pangkat_walikelas" class="form-control" id="pangkat_guru" placeholder="Masukkan Pangkat Wali Kelas" readonly>
			</div>
		</div>
		<div class="col-sm-6">
			<div class="form-group mb-3">
						<input type="text" name="golongan_walikelas" class="form-control" id="golongan_guru" placeholder="Masukkan Golongan Wali Kelas" readonly>
				</div>
            </div>
        </div>
        
        <!-- Nama Guru BP/BK -->
         <h6 class="m-0 font-weight-bold mb-3">11. Nama Guru BP/BK</h6>
	     <div class="form-group row">
		 <div class="form-group mb-3">
		 <select id="nama_guru2" class="form-control" name="nama_bk">
			<option value="" disabled selected>--- Pilih Nama Guru BP/BK ---</option>
				<?php 
				$data = mysqli_query($db_conn,"select * from data_guru");
				while($d = mysqli_fetch_array($data)){
					?>
					<option value="<?php echo $d['nama_guru'] ?>"><?php echo $d['nama_guru'] ?> - <?php echo $d['nip_guru'] ?></option>
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
				<input type="text" name="nip_bk" class="form-control" id="nip_guru2" placeholder="Masukkan NIP Guru BP/BK" readonly>    
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
					<input type="text" name="pangkat_bk" class="form-control" id="pangkat_guru2" placeholder="Masukkan Pangkat Guru BP/BK" readonly>
			</div>
		</div>
		<div class="col-sm-6">
			<div class="form-group mb-3">
						<input type="text" name="golongan_bk" class="form-control" id="golongan_guru2" placeholder="Masukkan Golongan Guru BP/BK" readonly>
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
					<input type="date" name="tgl_kunjungan" class="form-control" id="tgl_kunjungan" required autofocus>
			</div>
		</div>
		<div class="col-sm-6">
			<div class="form-group mb-3">
						<input type="text" name="jam_kunjungan" class="form-control" id="jam_kunjungan" required autofocus>
						<div id="emailHelp" class="form-text text-danger"><strong>Contoh : 09.00</strong></div>
				</div>
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
                <th>No</th>
                <th>Nomor Surat</th>
                <th>Nama Siswa</th>
                <th>Wali Kelas</th>
                <th>Guru BP/BK</th>
                <th>Tanggal</th>
                <th>Pembuat Surat</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
			$qsiswa = mysqli_query($db_conn,"SELECT * FROM homevisit");
			$no = 1;
			if(mysqli_num_rows($qsiswa) > 0){
				while($data = mysqli_fetch_array($qsiswa)){
					echo '<tr>';
					echo '<td>'.$no++.'</td>';
					echo '<td>094/'.$data['no_surat'].'</td>';
					echo '<td>'.$data['nama_lengkap'].'</td>';
					echo '<td>'.$data['nama_walikelas'].'('.$data['kelas'].')</td>';
					echo '<td>'.$data['nama_bk'].'</td>';
					echo '<td>'.indo($data['tgl_buat']).'</td>';
					echo '<td>'.$data['creator'].'</td>';
					echo '<td>
					<div class="btn-group">
  					<button type="button" class="btn btn-warning text-white dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
					Aksi
					</button> 
  					<ul class="dropdown-menu">
					 <li><a href="../cetak_homevisit.php?no_surat='.$data['no_surat'].'"><button class="btn btn-sm"><i class="fas fa-download"></i> Unduh</button></a> </li>
					 <li><a data-bs-toggle="modal" data-bs-target="#edit_homevisit'.htmlspecialchars($data['id_surat']).'" class="btn btn-sm"><i class="fas fa-edit"></i> Edit</button></a></li>
					 <li><a data-bs-toggle="modal" data-bs-target="#delete_homevisit'.htmlspecialchars($data['id_surat']).'"  class="btn btn-sm"><i class="fas fa-trash"></i> Hapus</a></li>
					 </ul>
					 </div></td>';
					// echo '<td><a href="../cetak_keterangan.php?no_surat='.$data['no_surat'].'"><button class="btn btn-primary" style="width:100%; color:white;"><i class="fas fa-download text-white"></i> Unduh Surat Keterangan</button></a> </td>';
					
					// echo '<td><a data-bs-toggle="modal" data-bs-target="#edit_sk'.htmlspecialchars($data['id_surat']).'" class="btn btn-warning" style="width:100%; color:white;"><i class="fas fa-edit text-white"></i> Edit</button></a> </td>';
					?>
	<!-- Modal Edit Data-->
<div class="modal fade" tabindex="-1" id="edit_homevisit<?php echo htmlspecialchars($data['id_surat']) ?>" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-warning text-white">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fa-solid fa-pen-to-square"></i> &nbspEdit Surat Homevisit <strong>094/<?php echo $data['no_surat']?> - <?php echo $data['nama_lengkap']?></strong></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
	  <form action="edit_proses_homevisit.php" class="form-horizontal" method="post">
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
					<input type="text" name="kelas" class="form-control" id="kelas2" value="<?php echo $data['kelas']?>">
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
		  $tgl = date('N', strtotime($data['tgl_kunjungan']));
		  
		  ?>


<!-- Modal Delete Data-->
<div class="modal fade" id="delete_homevisit<?php echo htmlspecialchars($data['id_surat']) ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                <th>No</th>
                <th>Nomor Surat</th>
                <th>Nama Siswa</th>
                <th>Wali Kelas</th>
                <th>Guru BP/BK</th>
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

<script>
		$(function() {
			$("#nama_lengkap").change(function(){
				var nama_lengkap = $("#nama_lengkap").val();
 
				$.ajax({
					url: 'ajax.php',
					type: 'POST',
					dataType: 'json',
					data: {
						'nama_lengkap': nama_lengkap
					},
					success: function (data_siswa) {
						if(data_siswa['nama_ayah'] == '-'){
						$("#nama_ayah").val(data_siswa['nama_ibu']);
						} else{
							$("#nama_ayah").val(data_siswa['nama_ayah']);
						}
						$("#nama_ibu").val(data_siswa['nama_ibu']);
						$("#kelas").val(data_siswa['kelas']);
					}
				});
			});
		});
	</script>

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