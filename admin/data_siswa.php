<?php
session_start();
if(isset($_SESSION['logged']) && !empty($_SESSION['logged'])){
include "../database.php";
$title = "Administrasi Surat | Data Siswa";
include '_header.php';
?>
<title><?php echo $title;?></title>

<div class="container mt-5">
</div>
<div class="row">
	<div class="container">
		<div class="container-fluid mt-3">

		<div style="width:80%; left:10%" class="alert alert-success"><strong>Informasi</strong><br>Sekolah Menengah Negeri 7 Surakarta<br>
		Mempunyai 1676 Jumlah Siswa <strong>Silahkan memilih berdasarkan Tahun Angkatan untuk menemukan data siswa tersebut <br>Setelah itu klik tombol Submit</strong></div>
		
    <div class="card shadow mb-4" style="width:80%; left:10%">
      <div class="card-header bg-dark text-white py-3">
        <h4 class="m-0 font-weight-bold"><i class="fa-solid fa-circle-user"></i> Data Siswa</h4>
      </div>    
      <div class="card-body">
	  <div style="overflow:auto">

	  <div class="form-group row">
    <div class="col-sm-2">
		<form action='<?php echo $_SERVER['PHP_SELF']; ?>' method='post' name='form_filter' >
			<select class="form-select" aria-label="Default select example" name="value">
				<option value="all">Semua Angkatan</option>
				<option disabled>-----------------------------</option>
				<option value="2022/2023">Tahun Ajaran 2022/2023</option>
				<option value="2023/2024">Tahun Ajaran 2023/2024</option>
				<option value="2024/2025">Tahun Ajaran 2024/2025</option>
			</select>
		
			</div>

			<div class="col-sm-2">
			<button type="submit" class="btn btn-success"value="Submit">Submit</button>
			</form>
			</div>
			</div>

            <table id="example" class="table" style="width:100%">
			<?php
				if(isset($_POST['value'])){
				if($_POST['value'] == '2022/2023') {
					// query to get all Doe records
					$query = "SELECT * FROM data_siswa WHERE tahun_ajaran='2022/2023'";
				}
				elseif($_POST['value'] == '2023/2024') {
					// query to get all Earl records
					$query = "SELECT * FROM data_siswa WHERE tahun_ajaran='2023/2024'";
				} 
				elseif($_POST['value'] == '2024/2025') {
					// query to get all Earl records
					$query = "SELECT * FROM data_siswa WHERE tahun_ajaran='2024/2025'";
				}
				else {
					// query to get all records
					$query = "SELECT * FROM data_siswa";
				}
				$qsiswa = mysqli_query($db_conn,$query);
			?>
        <thead>
            <tr>
            <th class="text-center">No</th>
					<th>Nama Siswa</th>
					<th>Jurusan</th>
					<th>Tahun Ajaran</th>
					<th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
			$no = 1;
			if(mysqli_num_rows($qsiswa) > 0){
				while($data = mysqli_fetch_array($qsiswa)){
					// PROPER nama siswa
					$siswa = strtolower($data['nama_lengkap']);
					$siswa2 = ucwords($siswa);

					// PROPER tempat tanggal lahir
					$ttl = strtolower($data['tempat_lahir']);
					$ttl2 = ucwords($ttl);

					echo '<tr>';
					echo '<td class="text-center">'.$no++.'</td>';
					echo '<td>'.$siswa2.'</td>';
					echo '<td>'.$data['jurusan'].'</td>';
					echo '<td>'.$data['tahun_ajaran'].'</td>';
					echo '<td><a data-bs-toggle="modal" data-bs-target="#detail_siswa'.htmlspecialchars($data['nisn']).'" class="btn btn-sm btn-primary text-white"><i class="fa-solid fa-circle-info"></i> View Detail</a></td>';
					?>
					

<!-- Modal Detail Data Siswa-->
<div class="modal fade" tabindex="-1" id="detail_siswa<?php echo htmlspecialchars($data['nisn'])?>" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fa-solid fa-circle-info"></i> &nbspDetail Data <strong><?php echo $data['nama_lengkap']?></strong></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
		<div class="row">

			<div class="col-sm-2 text-center">
				<?php if($data['jurusan'] == 'Kuliner'){ ?>
					<img src="../kuliner.png" alt="kuliner" width="75%">
				<?php } else if($data['jurusan'] == 'Desain Komunikasi Visual'){ ?>
					<img src="../dkv.png" alt="dkv" width="75%" style="margin-top:15%">
				<?php } else if($data['jurusan'] == 'Broadcasting dan Perfilman'){ ?>
					<img src="../bcf.png" alt="bcf" width="75%" style="margin-top:45%">
				<?php } else if($data['jurusan'] == 'Perhotelan'){ ?>
					<img src="../perhotelan.png" alt="perhotelan" width="100%" style="margin-top:10%">
				<?php }  else if($data['jurusan'] == 'Pekerjaan Sosial'){ ?>
					<img src="../peksos.png" alt="peksos" width="100%" style="margin-top:15%">
				<?php } else if($data['jurusan'] == 'Usaha Layanan Pariwisata'){ ?>
					<img src="../ulp.png" alt="ulp" width="100%" style="margin-top:15%">
				<?php }?>
			</div>

			<div class="col-sm-5">
				<strong>Nama :</strong> <?php echo $siswa2?>
				<br> <strong>NISN / NIS : </strong><?php echo $data['nisn']?> / <?php echo $data['nis']?>
				<br> <strong>Jenis Kelamin : </strong>
				<?php if($data['jk'] == 'L'){ 
							echo 'Laki-Laki';
						}else{
							echo 'Perempuan';
						}?>
				<br> <strong>Kelas / Jurusan : </strong><?php echo $data['kelas']?> / <?php echo $data['jurusan']?>
			</div>

			<div class="col-sm-5">
			<strong>TTL : </strong><?php echo $ttl2?>, <?php echo $data['ttl']?>
		<br> <strong>Nama Orang Tua : </strong><?php echo $data['nama_ayah']?> - <?php echo $data['nama_ibu']?>
		<br> <strong>Tahun Ajaran : </strong><?php echo $data['tahun_ajaran']?>
			</div>
		<!-- row -->
		</div>
	  
		<br>
	<div class="modal-footer">
		<button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="fas fa-times"></i> Close</button>
	</div>

    </div>
  </div>
</div>

					<?php
					echo '</tr>';
				}
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
		}
			?>
			
        </tbody>
        <tfoot>
            <tr>
                <th class="text-center">No</th>
					<th>Nama Siswa</th>
					<th>Jurusan</th>
					<th>Tahun Ajaran</th>
					<th>Aksi</th>
            </tr>
        </tfoot>
    </table>
		</div>

        </div>
      </div>
    </div>
<br>
<br>
<br>
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