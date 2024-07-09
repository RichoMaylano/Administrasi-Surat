<?php
session_start();
if(isset($_SESSION['logged']) && !empty($_SESSION['logged'])){
include "../database.php";
include "../indo.php";
include "../tgl_indo.php";
$title = "Surat Keterangan | Administrasi";
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
      <div class="card-header bg-primary bg-gradient text-white py-3">
		<div class="row">
		<div class="col-sm-10">
			<h4 class="m-0 font-weight-bold"><i class="fa-solid fa-circle-info"></i>  <strong>Surat Keterangan</strong></h4>
		</div>
		<div class="col-sm-2">
				<div class="btn-group shadow rounded">
					<!-- Button trigger modal -->
					<a class="btn btn-light" type="button" data-bs-toggle="modal" data-bs-target="#add_sk"aria-current="page">Tambah Data</a>
					<a href="#" class="btn btn-primary"><i class="fa-regular fa-square-plus"></i></a>
				</div>
		</div>
		</div>
      </div>    
      <div class="card-body">

		  
<!-- Modal Tambah Data-->
<div class="modal fade" tabindex="-1" id="add_sk" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-success text-white">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fa-regular fa-square-plus"></i> &nbspTambah Data <strong>Surat Keterangan</strong></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
	  <form action="add_proses_sk.php" class="form-horizontal" method="post">
            <!-- Nomor Surat -->
        <h6 class="m-0 font-weight-bold mb-3">1. Nomor Surat</h6>
	     <div class="form-group row">
			<div class="form-group mb-3">
				<div id="emailHelp" class="form-text text-danger">*Masukkan Nomor Surat Bagian Belakang Saja</div>
					<input type="text" name="no_surat" class="form-control" id="no_surat" placeholder="Masukkan Nomor Surat" required autofocus>
            <div id="emailHelp" class="form-text text-danger"><strong>Contoh : 800/958 (Inputkan Nomor Surat 958)</strong></div>
			</div>
        </div>
        
            <!-- Nama Lengkap -->
        <h6 class="m-0 font-weight-bold mb-3">2. Nama Lengkap</h6>
	     <div class="form-group row">
			<div class="form-group mb-3">
			<select id="siswa" class="form-control" name="nama_lengkap">
			<option value="" disabled selected>--- Pilih Nama Lengkap ---</option>
				<?php 
				$s = mysqli_query($db_conn,"select * from data_siswa");
				while($d = mysqli_fetch_array($s)){
					?>
					<option value="<?php echo $d['nama_lengkap'] ?>"><?php echo $d['nama_lengkap'] ?> - <?php echo $d['jurusan'] ?> - <?php echo $d['nis'] ?></option>
					<?php
				}
				?>				
			</select>
			</div>
        </div>

        <!-- NIS dan NISN -->
        <div class="form-group row">
	<div class="col-sm-6">
        <h6 class="m-0 font-weight-bold mb-3">3. NIS (Nomor Induk Sekolah)</h6>
    </div>
	<div class="col-sm-6">
        <h6 class="m-0 font-weight-bold mb-3">4. NISN (Nomor Induk Sekolah Nasional)</h6>
    </div>
    </div>
    
    <div class="form-group row">
		<div class="col-sm-6">
			<div class="form-group mb-3">
					<input type="text" name="nis" class="form-control" id="nis" placeholder="Masukkan NIS" readonly>
			</div>
		</div>
		<div class="col-sm-6">
			<div class="form-group mb-3">
						<input type="text" name="nisn" class="form-control" id="nisn" placeholder="Masukkan NISN" readonly>
				</div>
            </div>
        </div>

         <!-- Kelas -->
         <h6 class="m-0 font-weight-bold mb-3">5. Kelas</h6>
	     <div class="form-group row">
			<div class="form-group mb-3">
					<input type="text" name="kelas" class="form-control" id="kelas" placeholder="Masukkan Kelas" required autofocus>
            <div id="emailHelp" class="form-text text-danger"><strong>Contoh : XII KUL 1</strong></div>
			</div>
        </div>
         
        <!-- Tempat Lahir -->
         <h6 class="m-0 font-weight-bold mb-3">6. Tempat Lahir</h6>
	     <div class="form-group row">
			<div class="form-group mb-3">
					<input type="text" name="tempat_lahir" class="form-control" id="tempat_lahir" placeholder="Masukkan Tempat Lahir" readonly>
            <div id="emailHelp" class="form-text text-danger"><strong>Contoh : Surakarta</strong></div>
			</div>
        </div>

        <!-- Tanggal Lahir -->
         <h6 class="m-0 font-weight-bold mb-3">7. Tanggal Lahir</h6>
	     <div class="form-group row">
			<div class="form-group mb-3">
					<input type="text" name="ttl" class="form-control" id="ttl" placeholder="Masukkan Tanggal Lahir" readonly>
            <div id="emailHelp" class="form-text text-danger"><strong>Contoh : 13 September 2007</strong></div>
			</div>
        </div>
       
        <!-- Nama Orang Tua -->
         <h6 class="m-0 font-weight-bold mb-3">8. Nama Orang Tua</h6>
	     <div class="form-group row">
			<div class="form-group mb-3">
					<input type="text" name="nama_ortu" class="form-control" id="nama_ortu" placeholder="Masukkan Nama Orang Tua" readonly>
			</div>
        </div>
        
        <!-- Deskripsi / Isi Surat -->
         <h6 class="m-0 font-weight-bold mb-3">9. Deskripsi / Isi Surat</h6>
	     <div class="form-group row">
		 <div class="form-group mb-3">
            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="5" placeholder="Masukkan Deskripsi Surat" required autofocus></textarea>
        </div>
        </div>
        
		<!-- Penutup Surat -->
         <h6 class="m-0 font-weight-bold mb-3">10. Penutup Surat</h6>
	     <div class="form-group row">
		 <div class="form-group mb-3">
            <textarea class="form-control" id="penutup_surat" name="penutup_surat" rows="5" placeholder="Masukkan Penutup Surat" required autofocus></textarea>
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
<hr>

<!-- Table -->
	  <div style="overflow-x:none">
            <table id="example" class="table" style="width:100%">
        <thead>
            <tr>
            <th>No</th>
            <th>Nomor Surat</th>
					<th>NISN</th>
					<th>NIS</th>
					<th>Nama Siswa</th>
					<th>Nama Orang Tua</th>
					<th>Kelas</th>
					<th>Tanggal</th>
					<th></th>
            </tr>
        </thead>
        <tbody>
            <?php
			$qsiswa = mysqli_query($db_conn,"SELECT * FROM surat_keterangan");
			$no = 1;
			if(mysqli_num_rows($qsiswa) > 0){
				while($data = mysqli_fetch_array($qsiswa)){
					echo '<tr>';
					echo '<td>'.$no++.'</td>';
					echo '<td>800/'.$data['no_surat'].'</td>';
					echo '<td>'.$data['nisn'].'</td>';
					echo '<td>'.$data['nis'].'</td>';
					echo '<td>'.$data['nama_lengkap'].'</td>';
					echo '<td>'.$data['nama_ortu'].'</td>';
					echo '<td>'.$data['kelas'].'</td>';
					echo '<td>'.indo($data['tgl_create']).'</td>';
					echo '<td>
					<div class="btn-group">
  					<button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
					Aksi
					</button> 
  					<ul class="dropdown-menu">
					 <li><a href="../cetak_keterangan.php?no_surat='.$data['no_surat'].'"><button class="btn btn-sm"><i class="fas fa-download"></i> Unduh</button></a> </li>
					 <li><a data-bs-toggle="modal" data-bs-target="#edit_sk'.htmlspecialchars($data['id_surat']).'" class="btn btn-sm"><i class="fas fa-edit"></i> Edit</button></a></li>
					 <li><a data-bs-toggle="modal" data-bs-target="#delete_sk'.htmlspecialchars($data['id_surat']).'"  class="btn btn-sm"><i class="fas fa-trash"></i> Hapus</a></li>
					 </ul>
					 </div></td>';
					// echo '<td><a href="../cetak_keterangan.php?no_surat='.$data['no_surat'].'"><button class="btn btn-primary" style="width:100%; color:white;"><i class="fas fa-download text-white"></i> Unduh Surat Keterangan</button></a> </td>';
					
					// echo '<td><a data-bs-toggle="modal" data-bs-target="#edit_sk'.htmlspecialchars($data['id_surat']).'" class="btn btn-warning" style="width:100%; color:white;"><i class="fas fa-edit text-white"></i> Edit</button></a> </td>';
					?>
					
	<!-- Modal Edit Data-->
<div class="modal fade" tabindex="-1" id="edit_sk<?php echo htmlspecialchars($data['id_surat']) ?>" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-warning text-white">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fa-solid fa-pen-to-square"></i> &nbspEdit Surat Keterangan <strong>800/<?php echo $data['no_surat']?> - <?php echo $data['nama_lengkap']?></strong></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
	  <form action="edit_proses_sk.php" class="form-horizontal" method="post">
		  
            <!-- Nomor Surat -->
        <h6 class="m-0 font-weight-bold mb-3">1. Nomor Surat</h6>
	     <div class="form-group row">
			<div class="form-group mb-3">
				<div id="emailHelp" class="form-text text-danger">*Masukkan Nomor Surat Bagian Belakang Saja</div>
					<input type="text" name="no_surat" class="form-control" id="no_surat" value="<?php echo $data['no_surat']?>">
            <div id="emailHelp" class="form-text text-danger"><strong>Contoh : 800/958 (Inputkan Nomor Surat 958)</strong></div>
			</div>
        </div>
        
            <!-- Nama Lengkap -->
        <h6 class="m-0 font-weight-bold mb-3">2. Nama Lengkap</h6>
	     <div class="form-group row">
			<div class="form-group mb-3">
			<select id="nama_siswa2" class="form-control" name="nama_lengkap">
			<option value="<?php echo $data['nama_lengkap'] ?>" readonly selected><?php echo $data['nama_lengkap'] ?> - <?php echo $data['kelas'] ?></option>
			<option value="" disabled>----------------------------------------------------------------------------------------------------------------</option>
				<?php 
				$s = mysqli_query($db_conn,"select * from data_siswa");
				while($d = mysqli_fetch_array($s)){
					?>
					<option value="<?php echo $d['nama_lengkap'] ?>"><?php echo $d['nama_lengkap'] ?> - <?php echo $d['jurusan'] ?> - <?php echo $d['nis'] ?></option>
					<?php
				}
				?>				
			</select>
			
        </div>

        <!-- NIS dan NISN -->
        <div class="form-group row">
	<div class="col-sm-6">
        <h6 class="m-0 font-weight-bold mb-3">3. NIS (Nomor Induk Sekolah)</h6>
    </div>
	<div class="col-sm-6">
        <h6 class="m-0 font-weight-bold mb-3">4. NISN (Nomor Induk Sekolah Nasional)</h6>
    </div>
    </div>
    
    <div class="form-group row">
		<div class="col-sm-6">
			<div class="form-group mb-3">
					<input type="text" name="nis" class="form-control" id="nis2" value="<?php echo $data['nis']?>" readonly>
			</div>
		</div>
		<div class="col-sm-6">
			<div class="form-group mb-3">
						<input type="text" name="nisn" class="form-control" id="nisn2" value="<?php echo $data['nisn']?>" readonly>
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
         
        <!-- Tempat, Tanggal Lahir -->
         <h6 class="m-0 font-weight-bold mb-3">6. Tempat Lahir</h6>
	     <div class="form-group row">
			<div class="form-group mb-3">
					<input type="text" name="ttl" class="form-control" id="ttl" value="<?php echo $data['ttl']?>">
            <div id="emailHelp" class="form-text text-danger"><strong>Contoh : Surakarta, 17 September 2005</strong></div>
			</div>
        </div>
       
        <!-- Nama Orang Tua -->
         <h6 class="m-0 font-weight-bold mb-3">7. Nama Orang Tua</h6>
	     <div class="form-group row">
			<div class="form-group mb-3">
					<input type="text" name="nama_ortu" class="form-control" id="nama_ortu2" value="<?php echo $data['nama_ortu']?>" readonly>
			</div>
        </div>
        
        <!-- Deskripsi / Isi Surat -->
         <h6 class="m-0 font-weight-bold mb-3">9. Deskripsi / Isi Surat</h6>
	     <div class="form-group">
            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="5"><?php echo $data['deskripsi']?></textarea>
        </div>
      
		<!-- Penutup Surat -->
         <h6 class="m-0 font-weight-bold mb-3">10. Penutup Surat</h6>
	     <div class="form-group">
            <textarea class="form-control" id="penutup_surat" name="penutup_surat" rows="5"><?php echo $data['penutup_surat']?></textarea>
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
					echo '</tr>'; ?>


<!-- Modal Delete Data-->
<div class="modal fade" id="delete_sk<?php echo htmlspecialchars($data['id_surat']) ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-danger text-white">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fa-solid fa-trash-can"></i> &nbspHapus Surat Keterangan <strong>800/<?php echo $data['no_surat']?> - <?php echo $data['nama_lengkap']?></strong></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
		<h4>Detail Surat</h4>
		<hr><strong>Nama :</strong> <?php echo $data['nama_lengkap']?>
		<br> <strong>NIS : </strong><?php echo $data['nis']?>
		<br> <strong>NISN : </strong><?php echo $data['nisn']?>
		<br> <strong>Kelas : </strong><?php echo $data['kelas']?>
		<br> <strong>Tempat, Tanggal Lahir : </strong><?php echo $data['ttl']?>
		<br> <strong>Nama Orang Tua : </strong><?php echo $data['nama_ortu']?>
		<br> <strong>Isi Surat : </strong><?php echo $data['deskripsi']?>
	</p><hr>
	<h5>Yakin ingin menghapus <strong>Surat Keterangan Nomor 800/<?php echo $data['no_surat']?></strong> ?</h5>
	<div class="modal-footer">
		<button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="fas fa-times"></i> Batal</button>
        <a href="delete_proses_sk.php?id_surat=<?php echo $data['id_surat']?>" type="submit" name="submit" class="btn btn-success"><i class="fas fa-check"></i> Yakin</a>
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

					<th>NISN</th>
					<th>NIS</th>
					<th>Nama Siswa</th>
					<th>Nama Orang Tua</th>
					<th>Kelas</th>
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
			$("#siswa").change(function(){
				var nama_lengkap = $("#siswa").val();
 
				$.ajax({
					url: 'ajax.php',
					type: 'POST',
					dataType: 'json',
					data: {
						'nama_lengkap': nama_lengkap
					},
					success: function (data_siswa) {
						$("#nis").val(data_siswa['nis']);
						$("#nisn").val(data_siswa['nisn']);
						$("#tempat_lahir").val(data_siswa['tempat_lahir']);
						$("#ttl").val(data_siswa['ttl']);
						if(data_siswa['nama_ayah'] == '-'){
						$("#nama_ortu").val(data_siswa['nama_ibu']);
						} else{
							$("#nama_ortu").val(data_siswa['nama_ortu']);
						}
					}
				});
			});
		});
	</script>

<script>
		$(function() {
			$("#nama_siswa2").change(function(){
				var nama_siswa2 = $("#nama_siswa2").val();
 
				$.ajax({
					url: 'ajax.php',
					type: 'POST',
					dataType: 'json',
					data: {
						'nama_lengkap': nama_siswa2
					},
					success: function (data_siswa) {
						$("#nis2").val(data_siswa['nis']);
						$("#nisn2").val(data_siswa['nisn']);
						if(data_siswa['nama_ayah'] == '-'){
						$("#nama_ortu2").val(data_siswa['nama_ibu']);
						} else{
							$("#nama_ortu2").val(data_siswa['nama_ayah']);
						}
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