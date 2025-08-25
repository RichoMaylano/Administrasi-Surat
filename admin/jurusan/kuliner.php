<?php
include "../../database.php";
include "../../assets/indo.php";
include "../../assets/tgl_indo.php";
$title = "Kuliner Page | Aplikasi Persuratan | Versi 2.1.2";
include 'header.php';
?>

<?php $pd = mysqli_query($db_conn, "SELECT COUNT(nisn) AS 'count' FROM data_siswa WHERE jurusan='Kuliner' ");
$query_siswa = mysqli_fetch_array($pd);
$kul = $query_siswa['count'];
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Kompetensi Keahlian Kuliner</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Kompetensi Keahlian</li>
              <li class="breadcrumb-item active">Kuliner</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
          <div class="col">
            <div class="info-box">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">KUL</span>
                <span class="info-box-number">
                  <?php echo $kul ?>
                  <small>Siswa</small>
                </span>
              </div>
            </div>
          </div>
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-sm-8">
                <div class="card">
                    <div class="card-header bg-warning"><i class="fas fa-users"></i>&nbsp Tabel Peserta Didik Kompetensi Keahlian Kuliner</div>
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead class="text-center">
                                <tr>
                                    <th>No</th>
                                    <th>Nama Siswa</th>
                                    <th>NISN</th>
                                    <th>NIS</th>
                                    <th>Kelas</th>
                                    <th>Tahun Ajaran</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $qsiswa = mysqli_query($db_conn,"SELECT * FROM data_siswa WHERE jurusan='Kuliner' ORDER BY nama_lengkap ASC");
                                    $no = 1;
                                    if(mysqli_num_rows($qsiswa) > 0){
                                        while($data = mysqli_fetch_array($qsiswa)){
                                    $nama = strtolower($data['nama_lengkap']);
                                    $nama_siswa = ucwords($nama);
                                ?>
                                <tr>
                                <td><?php echo $no++ ?></td>
                                <td><?php echo $nama_siswa ?></td>
                                <td><?php echo $data['nisn'] ?></td>
                                <td><?php echo $data['nis'] ?></td>
                                <td><?php echo $data['kelas'] ?></td>
                                <td><?php echo $data['tahun_ajaran'] ?></td>
                                <td>
                                    <ul class="navbar-nav ml-auto">
                                        <!-- Messages Dropdown Menu --> 
                                        <li class="nav-item dropdown">
                                            <a class="nav-link btn btn-warning" href="#" data-toggle="dropdown" ><strong>&nbsp<i class="fas fa-tasks"></i>  &nbsp Aksi &nbsp</strong></a>
                                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                                            <div class="dropdown-divider"></div>
                                            <a href="#" class="dropdown-item" data-toggle="modal" data-target="#detail_siswa<?php echo htmlspecialchars($data['nisn'])?>"><i class="fas fa-info-circle mr-2"></i> Detail Siswa</a>
                                            <div class="dropdown-divider"></div>
                                            <a href="#" class="dropdown-item bg-warning"><i class="fas fa-trash-alt mr-2"></i> Hapus Siswa</a>
                                            </div>
                                        </li> 
                                    </ul>
                                </td>
                                </tr>

                                <div class="modal fade" id="detail_siswa<?php echo htmlspecialchars($data['nisn']) ?>">
                            <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title col-12">
                                  <?php if($data['jurusan'] == "Usaha Layanan Pariwisata"){?>
                                <div class="info-box">
                                  <span class="info-box-icon elevation-1"><img src="../../assets/images/ulp.png" width="50px" alt=""></span>
                                  <div class="info-box-content">
                                    <span class="info-box-text"><strong><?php echo $data['nama_lengkap']?> - <?php echo $data['kelas']?></strong></span>
                                    <span class="info-box-number">
                                      <small><?php echo $data['jurusan']?></small>
                                    </span>
                                  </div>
                                </div>
                              <?php }else if($data['jurusan'] == "Desain Komunikasi Visual"){?>
                                <div class="info-box">
                                  <span class="info-box-icon elevation-1"><img src="../../assets/images/dkv.png" width="50px" alt=""></span>
                                  <div class="info-box-content">
                                    <span class="info-box-text"><strong><?php echo $data['nama_lengkap']?> - <?php echo $data['kelas']?></strong></span>
                                    <span class="info-box-number">
                                      <small><?php echo $data['jurusan']?></small>
                                    </span>
                                  </div>
                                </div>
                                <?php }else if($data['jurusan'] == "Perhotelan"){?>
                                <div class="info-box">
                                  <span class="info-box-icon elevation-1"><img src="../../assets/images/perhotelan.png" width="50px" alt=""></span>
                                  <div class="info-box-content">
                                    <span class="info-box-text"><strong><?php echo $data['nama_lengkap']?> - <?php echo $data['kelas']?></strong></span>
                                    <span class="info-box-number">
                                      <small><?php echo $data['jurusan']?></small>
                                    </span>
                                  </div>
                                </div>
                                <?php }else if($data['jurusan'] == "Broadcasting dan Perfilman"){?>
                                <div class="info-box">
                                  <span class="info-box-icon elevation-1"><img src="../../assets/images/bcf.png" width="50px" alt=""></span>
                                  <div class="info-box-content">
                                    <span class="info-box-text"><strong><?php echo $data['nama_lengkap']?> - <?php echo $data['kelas']?></strong></span>
                                    <span class="info-box-number">
                                      <small><?php echo $data['jurusan']?></small>
                                    </span>
                                  </div>
                                </div>
                                <?php }else if($data['jurusan'] == "Kuliner"){?>
                                <div class="info-box">
                                  <span class="info-box-icon elevation-1"><img src="../../assets/images/kuliner.png" width="50px" alt=""></span>
                                  <div class="info-box-content">
                                    <span class="info-box-text"><strong><?php echo $data['nama_lengkap']?> - <?php echo $data['kelas']?></strong></span>
                                    <span class="info-box-number">
                                      <small><?php echo $data['jurusan']?></small>
                                    </span>
                                  </div>
                                </div>
                                <?php }else if($data['jurusan'] == "Pekerjaan Sosial"){?>
                                <div class="info-box">
                                  <span class="info-box-icon elevation-1"><img src="../../assets/images/peksos.png" width="50px" alt=""></span>
                                  <div class="info-box-content">
                                    <span class="info-box-text"><strong><?php echo $data['nama_lengkap']?> - <?php echo $data['kelas']?></strong></span>
                                    <span class="info-box-number">
                                      <small><?php echo $data['jurusan']?></small>
                                    </span>
                                  </div>
                                </div>
                                <?php }?>
                              </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body">
                                  
                                <div class="row">
                                  <div class="col-3">
                                    Nama
                                  </div>
                                  <div class="col-1">
                                    :
                                  </div>
                                  <div class="col-8">
                                  <?php echo $data['nama_lengkap']?>
                                  </div>
                                </div>

                                <div class="row">
                                  <div class="col-3">
                                    NIS / NISN
                                  </div>
                                  <div class="col-1">
                                    :
                                  </div>
                                  <div class="col-8">
                                  <?php echo $data['nis']?> / <?php echo $data['nisn']?>
                                  </div>
                                </div>

                                <div class="row">
                                  <div class="col-3">
                                    Kelas
                                  </div>
                                  <div class="col-1">
                                    :
                                  </div>
                                  <div class="col-8">
                                  <?php echo $data['kelas']?>
                                  </div>
                                </div>

                                <div class="row">
                                  <div class="col-3">
                                    Nama Orang Tua
                                  </div>
                                  <div class="col-1">
                                    :
                                  </div>
                                  <div class="col-8">
                                  <?php echo $data['nama_ayah']?> - <?php echo $data['nama_ibu']?>
                                  </div>
                                </div>

                                <div class="row">
                                  <div class="col-3">
                                    Kompetensi Keahlian
                                  </div>
                                  <div class="col-1">
                                    :
                                  </div>
                                  <div class="col-8">
                                  <?php echo $data['jurusan']?>
                                  </div>
                                </div>

                                <div class="row">
                                  <div class="col-3">
                                    Tempat, Tanggal Lahir
                                  </div>
                                  <div class="col-1">
                                    :
                                  </div>
                                  <div class="col-8">
                                  <?php echo $data['tempat_lahir']?>, <?php echo $data['ttl']?>
                                  </div>
                                </div>

                                </div>
                                <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times mr-2"></i> Batal</button>
                                </div>
                            </div>
                            <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                        </div>
                        <!-- /.modal -->


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
                            <tfoot class="text-center">
                                <tr>
                                    <th>No</th>
                                    <th>Nama Siswa</th>
                                    <th>NISN</th>
                                    <th>NIS</th>
                                    <th>Kelas</th>
                                    <th>Tahun Ajaran</th>
                                    <th>Aksi</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 mb-4">
                <div class="card">
                    <div class="card-header bg-warning"><i class="fas fa-info"></i>&nbsp Tentang Kuliner</div>
                    <div class="card-body">
                        <div class="text-center">
                        <img src="../../assets/images/kuliner.png" width="50px" alt="" class="mt-2 mb-4">
                        </div>

                        <h5 class="mt-2 mb-2"><strong>SEJARAH KULINER</strong></h5>
                        <p>Jurusan Kuliner yang sebelumnya bernama Tata Boga, mempunyai visi yaitu, Menjadi Pusat Pendidikan Peserta Didik dan Wirausahawan Bidang Kuliner yang Beriman, Sehat, Unggul, Mandiri, dan Cendekia serta Berdaya Saing Nasional maupun Internasional di Tahun 2025</p>
                        <h5 class="mt-2 mb-2"><strong>VISI</strong></h5>
                        <p>Menjadi Pusat Pendidikan Peserta Didik dan Wirausahawan Bidang Kuliner yang Beriman, Sehat, Unggul, Mandiri, dan Cendekia serta Berdaya Saing Nasional maupun Internasional di Tahun 2025.</p>
                        <h5 class="mt-2 mb-2"><strong>MISI</strong></h5>
                        <p>
                            <ol>
                                <li>Mengembangkan Pendidikan Bidang Kuliner untuk Menghasilkan Lulusan yang Profesional di Bidang Kuliner yang Beriman, Sehat, Unggul, Mandiri dan Cendikia.</li>
                                <li>Menghasilkan Karya dan Produk Inovatif yang Trend di Masyarakat Melalui Penilaian Kuliner</li>
                                <li>Menghasilkan Lulusan yang Mampu Berwirausaha di Bidang Kuliner yang Berdaya Saing di masyarakat</li>
                                <li>Mengembangkan Kerjasama Untuk Membangun Masyarakat yang Berkarakter Mulia dan Meningkatkan Kesejahteraan Masyarakat Melalui Penerapan IPTEKS Bidang Kuliner.</li>
                            </ol>
                        </p>
                        
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h6><i class="fas fa-info-circle"></i>&nbsp <strong>Informasi lebih lanjut : </strong><a href="https://smkn7surakarta.sch.id/program-keahlian/kuliner/" target="_blank">Kuliner</a> </h6>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
<?php
include 'footer.php';
?>