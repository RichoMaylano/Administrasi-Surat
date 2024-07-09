<?php
session_start();
if(isset($_SESSION['logged']) && !empty($_SESSION['logged'])){
include "../database.php";
include "../indo.php";
include "../tgl_indo.php";
$title = "Administrasi Surat | Data Jurusan";
include '_header.php';
?>
<title><?php echo $title;?></title>

<div class="container mt-5 nb-4">
</div>
<div class="row">
	<div class="container mb-4">
		<div class="container-fluid mt-3">
			
			<div style="width:80%; left:10%" class="alert alert-success"><strong>Informasi</strong><br>Sekolah Menengah Negeri 7 Surakarta<br>
		Mempunyai 6 Jurusan diantaranya, yaitu <strong>Pekerjaaan Sosial</strong>, <strong>Desain Komunikasi Visual</strong>, <strong>Perhotelan</strong>, <br><strong>Kuliner</strong>, <strong>Broadcasting dan Perfilman</strong>, dan <strong>Usaha Layanan Pariwisata</strong></div>

		<div class="card shadow mb-4" style="width:80%; left:10%">
			<div class="card-header bg-danger text-white py-3">
        		<h4 class="m-0 font-weight-bold"><i class="fa-solid fa-landmark"></i> &nbspData Jurusan</h4>
      		</div>    
			<div class="card-body">
		<!-- Table -->
		<div style="overflow-x:none">
            <table id="example" class="table" style="width:100%">
        <thead>
        	<tr>
                <th class="text-center">No</th>
                <th class="text-center">Logo</th>
                <th>Nama Jurusan</th>
                <th>Jumlah Kelas</th>
            </tr>
        </thead>
        <tbody>
            <?php
			$qsiswa = mysqli_query($db_conn,"SELECT DISTINCT jurusan FROM data_siswa");
			$no = 1;
			if(mysqli_num_rows($qsiswa) > 0){
				while($data = mysqli_fetch_array($qsiswa)){
					echo '<tr>';
					echo '<td class="text-center"><br>'.$no++.'<br><br></td>';
					if($data['jurusan'] == 'Desain Komunikasi Visual'){
						echo '<td class="text-center" width="100"><br><img src="../dkv.png" alt="dkv" width="125px"><br><br></td>';
					} else if($data['jurusan'] == 'Broadcasting dan Perfilman'){
						echo '<td class="text-center" width="100"><br><img src="../bcf.png" alt="bcf" width="150px"><br><br></td>';
					} else if($data['jurusan'] == 'Usaha Layanan Pariwisata'){
						echo '<td class="text-center" width="100"><br><img src="../ulp.png" alt="ulp" width="125px"><br><br></td>';
					} else if($data['jurusan'] == 'Kuliner'){
						echo '<td class="text-center" width="100"><br><img src="../kuliner.png" alt="ulp" width="100px"><br><br></td>';
					} else if($data['jurusan'] == 'Perhotelan'){
						echo '<td class="text-center" width="100"><br><img src="../perhotelan.png" alt="ulp" width="150px"><br><br></td>';
					} else if($data['jurusan'] == 'Pekerjaan Sosial'){
						echo '<td class="text-center" width="100"><br><img src="../peksos.png" alt="ulp" width="150px"><br><br></td>';
					}
					echo '<td><br>'.$data['jurusan'].'<br><br></td>';
					if($data['jurusan'] == 'Broadcasting dan Perfilman'){
						echo '<td><br>6 Kelas <br><br></td>';
					}else if($data['jurusan'] == 'Usaha Layanan Pariwisata'){
						echo '<td><br>6 Kelas <br><br></td>';
					}else{
						echo '<td><br>9 Kelas <br><br></td>';
					}'</td>';
				}
				
				 
			} else {
				echo '<tr>
				<td colspan="8"><em>Belum ada data! Segera lakukan upload data.</em></td>
				<td></td>
				</tr>';
			}
			
			?>
        </tbody>
        <tfoot>
            <tr>
                <th class="text-center">No</th>
                <th class="text-center">Logo</th>
                <th>Nama Jurusan</th>
				<th>Jumlah Kelas</th>
            </tr>
        </tfoot>
    </table>
			</div>
		</div>

        </div>
      </div>
    </div>

	<div class="row mb-4">
	</div>
	<div class="row mb-4">
	</div>


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