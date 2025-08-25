<?php
include "../database.php";
include "../assets/indo.php";
include "../assets/tgl_indo.php";
$title = "Peserta Didik Page | Aplikasi Persuratan | Versi 2.1.2";
include 'header.php';
?>

<?php $pd = mysqli_query($db_conn, "SELECT COUNT(nisn) AS 'count' FROM data_siswa");
$query_siswa = mysqli_fetch_array($pd);
$peserta_didik = $query_siswa['count'];
?>

<?php $pd1 = mysqli_query($db_conn, "SELECT COUNT(nisn) AS 'count' FROM data_siswa WHERE jurusan='Usaha Layanan Pariwisata' ");
$query_siswa1 = mysqli_fetch_array($pd1);
$ulp = $query_siswa1['count'];
?>

<?php $pd2 = mysqli_query($db_conn, "SELECT COUNT(nisn) AS 'count' FROM data_siswa WHERE jurusan='Broadcasting dan Perfilman' ");
$query_siswa2 = mysqli_fetch_array($pd2);
$bcf = $query_siswa2['count'];
?>

<?php $pd3 = mysqli_query($db_conn, "SELECT COUNT(nisn) AS 'count' FROM data_siswa WHERE jurusan='Desain Komunikasi Visual' ");
$query_siswa3 = mysqli_fetch_array($pd3);
$dkv = $query_siswa3['count'];
?>

<?php $pd4 = mysqli_query($db_conn, "SELECT COUNT(nisn) AS 'count' FROM data_siswa WHERE jurusan='Perhotelan' ");
$query_siswa4 = mysqli_fetch_array($pd4);
$ph = $query_siswa4['count'];
?>

<?php $pd5 = mysqli_query($db_conn, "SELECT COUNT(nisn) AS 'count' FROM data_siswa WHERE jurusan='Pekerjaan Sosial' ");
$query_siswa5 = mysqli_fetch_array($pd5);
$ps = $query_siswa5['count'];
?>

<?php $pd6 = mysqli_query($db_conn, "SELECT COUNT(nisn) AS 'count' FROM data_siswa WHERE jurusan='Kuliner' ");
$query_siswa6 = mysqli_fetch_array($pd6);
$kul = $query_siswa6['count'];
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Peserta Didik</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Peserta Didik</li>
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
          <div class="col-sm-12 col-md-2">
            <div class="info-box">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-users"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">BCF</span>
                <span class="info-box-number">
                  <?php echo $bcf ?>
                  <small>Siswa</small>
                </span>
              </div>
            </div>
          </div>

          <div class="col-sm-12 col-md-2">
            <div class="info-box">
              <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-users"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">ULP</span>
                <span class="info-box-number">
                  <?php echo $ulp ?>
                  <small>Siswa</small>
                </span>
              </div>
            </div>
          </div>

          <div class="col-sm-12 col-md-2">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">DKV</span>
                <span class="info-box-number">
                  <?php echo $dkv ?>
                  <small>Siswa</small>
                </span>
              </div>
            </div>
          </div>

          <div class="col-sm-12 col-md-2">
            <div class="info-box">
              <span class="info-box-icon bg-gray elevation-1"><i class="fas fa-users"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">PH</span>
                <span class="info-box-number">
                  <?php echo $ph ?>
                  <small>Siswa</small>
                </span>
              </div>
            </div>
          </div>

          <div class="col-sm-12 col-md-2">
            <div class="info-box">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-users"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">PS</span>
                <span class="info-box-number">
                  <?php echo $ps ?>
                  <small>Siswa</small>
                </span>
              </div>
            </div>
          </div>

          <div class="col-sm-12 col-md-2">
            <div class="info-box">
              <span class="info-box-icon bg-light elevation-1"><i class="fas fa-users"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">KUL</span>
                <span class="info-box-number">
                  <?php echo $kul ?>
                  <small>Siswa</small>
                </span>
              </div>
            </div>
          </div>

        </div>
    </section>

 <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
          <div class="col-12 col-sm-12 col-md-12">
            <div class="info-box">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Jumlah Peserta Didik</span>
                <span class="info-box-number">
                  <?php echo $peserta_didik ?>
                  <small>Siswa</small>
                </span>
              </div>
            </div>
          </div>
        </div>
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12 col-sm-12 col-md-12">
            <div class="card">
            <div class="card-header border-transparent bg-warning">
                <h3 class="card-title"><i class="fas fa-users mr-2"></i> Peserta Didik</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool text-white" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool text-white" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
                    <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                            <thead class="text-center">
                                <tr>
                                    <th>No</th>
                                    <th>NISN</th>
                                    <th>NIS</th>
                                    <th>Nama Siswa</th>
                                    <th>Nama Orang Tua (Nama Ayah - Nama Ibu)</th>
                                    <th>Kelas</th>
                                    <th>Tahun Ajaran</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $qsiswa = mysqli_query($db_conn,"SELECT * FROM data_siswa");
                                    $no = 1;
                                    if(mysqli_num_rows($qsiswa) > 0){
                                        while($data = mysqli_fetch_array($qsiswa)){
                                    $nama = strtolower($data['nama_lengkap']);
                                    $nama_siswa = ucwords($nama);
                                ?>
                                <tr>
                                <td><?php echo $no++ ?></td>
                                <td><?php echo $data['nisn'] ?></td>
                                <td><?php echo $data['nis'] ?></td>
                                <td><?php echo $nama_siswa ?></td>
                                <td><?php echo $data['nama_ayah'] ?> - <?php echo $data['nama_ibu'] ?></td>
                                <td><?php echo $data['kelas'] ?></td>
                                <td><?php echo $data['tahun_ajaran'] ?></td>
                                <td>
                                    <ul class="navbar-nav ml-auto">
                                        <!-- Messages Dropdown Menu --> 
                                        <li class="nav-item dropdown">
                                            <a class="nav-link btn btn-warning" href="#" data-toggle="dropdown" ><strong><i class="fas fa-tasks"></i>  &nbspAksi</strong></a>
                                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                                            <div class="dropdown-divider"></div>
                                            <a href="#" class="dropdown-item" data-toggle="modal" data-target="#detail_siswa<?php echo htmlspecialchars($data['nisn'])?>"><i class="fas fa-info-circle mr-2"></i> Detail Siswa</a>
                                            <div class="dropdown-divider"></div>
                                            <a href="#" class="dropdown-item bg-danger"><i class="fas fa-trash-alt mr-2"></i> Hapus Siswa</a>
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
                                  <span class="info-box-icon elevation-1"><img src="../assets/images/ulp.png" width="100px" alt=""></span>
                                  <div class="info-box-content">
                                    <span class="info-box-text"><strong><?php echo $data['nama_lengkap']?> - <?php echo $data['kelas']?></strong></span>
                                    <span class="info-box-number">
                                      <small><?php echo $data['jurusan']?></small>
                                    </span>
                                  </div>
                                </div>
                              <?php }else if($data['jurusan'] == "Desain Komunikasi Visual"){?>
                                <div class="info-box">
                                  <span class="info-box-icon elevation-1"><img src="../assets/images/dkv.png" width="100px" alt=""></span>
                                  <div class="info-box-content">
                                    <span class="info-box-text"><strong><?php echo $data['nama_lengkap']?> - <?php echo $data['kelas']?></strong></span>
                                    <span class="info-box-number">
                                      <small><?php echo $data['jurusan']?></small>
                                    </span>
                                  </div>
                                </div>
                                <?php }else if($data['jurusan'] == "Perhotelan"){?>
                                <div class="info-box">
                                  <span class="info-box-icon elevation-1"><img src="../assets/images/perhotelan.png" width="100px" alt=""></span>
                                  <div class="info-box-content">
                                    <span class="info-box-text"><strong><?php echo $data['nama_lengkap']?> - <?php echo $data['kelas']?></strong></span>
                                    <span class="info-box-number">
                                      <small><?php echo $data['jurusan']?></small>
                                    </span>
                                  </div>
                                </div>
                                <?php }else if($data['jurusan'] == "Broadcasting dan Perfilman"){?>
                                <div class="info-box">
                                  <span class="info-box-icon elevation-1"><img src="../assets/images/bcf.png" width="100px" alt=""></span>
                                  <div class="info-box-content">
                                    <span class="info-box-text"><strong><?php echo $data['nama_lengkap']?> - <?php echo $data['kelas']?></strong></span>
                                    <span class="info-box-number">
                                      <small><?php echo $data['jurusan']?></small>
                                    </span>
                                  </div>
                                </div>
                                <?php }else if($data['jurusan'] == "Kuliner"){?>
                                <div class="info-box">
                                  <span class="info-box-icon elevation-1"><img src="../assets/images/kuliner.png" width="100px" alt=""></span>
                                  <div class="info-box-content">
                                    <span class="info-box-text"><strong><?php echo $data['nama_lengkap']?> - <?php echo $data['kelas']?></strong></span>
                                    <span class="info-box-number">
                                      <small><?php echo $data['jurusan']?></small>
                                    </span>
                                  </div>
                                </div>
                                <?php }else if($data['jurusan'] == "Pekerjaan Sosial"){?>
                                <div class="info-box">
                                  <span class="info-box-icon elevation-1"><img src="../assets/images/peksos.png" width="100px" alt=""></span>
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
                                        <td></td>
                                        </tr>';
                                    }
			                    ?>
                            </tbody>
                            <tfoot class="text-center">
                                <tr>
                                    <th>No</th>
                                    <th>NISN</th>
                                    <th>NIS</th>
                                    <th>Nama Siswa</th>
                                    <th>Nama Orang Tua (Nama Ayah - Nama Ibu)</th>
                                    <th>Kelas</th>
                                    <th>Tahun Ajaran</th>
                                    <th>Aksi</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
            </div>
            </div>
        </div>
    </div>
</section>


    </div>

<?php
include 'footer.php';
?>