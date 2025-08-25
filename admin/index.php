<?php
include "../database.php";
include '../assets/indo.php';
include '../assets/tgl_indo.php';

$title = "Home Page | Aplikasi Persuratan | Versi 2.1.2";
include 'header.php';
?>

<?php $richo1 = mysqli_query($db_conn, "SELECT COUNT(creator) AS 'count' FROM surat_keterangan WHERE creator='Richo Maylano Yozienanda' ");
$cho1 = mysqli_fetch_array($richo1);
$r1 = $cho1['count'];
?>

<?php $richo2 = mysqli_query($db_conn, "SELECT COUNT(*) AS 'count' FROM surgas_guru WHERE creator='Richo Maylano Yozienanda' ");
$cho2 = mysqli_fetch_array($richo2);
$r2 = $cho2['count'];
?>

<?php $richo3 = mysqli_query($db_conn, "SELECT COUNT(creator) AS 'count' FROM homevisit WHERE creator='Richo Maylano Yozienanda' ");
$cho3 = mysqli_fetch_array($richo3);
$r3 = $cho3['count'];
?>

<?php $richo4 = mysqli_query($db_conn, "SELECT COUNT(creator) AS 'count' FROM rekomendasi WHERE creator='Richo Maylano Yozienanda' ");
$cho4 = mysqli_fetch_array($richo4);
$r4 = $cho4['count'];
?>

<?php $richo5 = mysqli_query($db_conn, "SELECT COUNT(creator) AS 'count' FROM surat_panggilan WHERE creator='Richo Maylano Yozienanda' ");
$cho5 = mysqli_fetch_array($richo5);
$r5 = $cho5['count'];
?>

<?php $gunadi1 = mysqli_query($db_conn, "SELECT COUNT(creator) AS 'count' FROM surat_keterangan WHERE creator='Gunadi' ");
$gun1 = mysqli_fetch_array($gunadi1);
$g1 = $gun1['count'];
?>

<?php
$gunadi2 = mysqli_query($db_conn, "SELECT COUNT(*) AS 'count' FROM surgas_guru WHERE creator='Gunadi'");
$gun2 = mysqli_fetch_array($gunadi2);
$g2 = $gun2['count'];
?>

<?php $gunadi3 = mysqli_query($db_conn, "SELECT COUNT(creator) AS 'count' FROM homevisit WHERE creator='Gunadi' ");
$gun3 = mysqli_fetch_array($gunadi3);
$g3 = $gun3['count'];
?>

<?php $gunadi4 = mysqli_query($db_conn, "SELECT COUNT(creator) AS 'count' FROM rekomendasi WHERE creator='Gunadi' ");
$gun4 = mysqli_fetch_array($gunadi4);
$g4 = $gun4['count'];
?>

<?php $gunadi5 = mysqli_query($db_conn, "SELECT COUNT(creator) AS 'count' FROM surat_panggilan WHERE creator='Gunadi' ");
$gun5 = mysqli_fetch_array($gunadi5);
$g5 = $gun5['count'];
?>

<?php 
$sum = $r1 + $r2 + $r3 + $r4 + $r5;
$sum2 = $g1 + $g2 + $g3 + $g4 + $g5;
?>


<?php $p_panggilan = mysqli_query($db_conn, "SELECT COUNT(creator) AS 'count' FROM surat_panggilan WHERE status_cetak='Pending' ");
  $pending5 = mysqli_fetch_array($p_panggilan);
  $sp_panggilan = $pending5['count'];
?>
<?php $p_rekomen = mysqli_query($db_conn, "SELECT COUNT(creator) AS 'count' FROM rekomendasi WHERE status_cetak='Pending' ");
  $pending4 = mysqli_fetch_array($p_rekomen);
  $sp_rekomen = $pending4['count'];
?>
<?php $p_homevisit = mysqli_query($db_conn, "SELECT COUNT(creator) AS 'count' FROM homevisit WHERE status_cetak='Pending' ");
  $pending3 = mysqli_fetch_array($p_homevisit);
  $sp_homevisit = $pending3['count'];
?>
<?php $p_surgas = mysqli_query($db_conn, "SELECT COUNT(creator) AS 'count' FROM surgas_guru WHERE status_cetak='Pending' ");
  $pending2 = mysqli_fetch_array($p_surgas);
  $sp_surgas = $pending2['count'];
?>
<?php $p_sk = mysqli_query($db_conn, "SELECT COUNT(creator) AS 'count' FROM surat_keterangan WHERE status_cetak='Pending' ");
  $pending = mysqli_fetch_array($p_sk);
  $sp_sk = $pending['count'];
?>

<?php 
$sum_pending = $sp_panggilan + $sp_rekomen + $sp_homevisit + $sp_surgas + $sp_sk;
?>

<?php $pd = mysqli_query($db_conn, "SELECT COUNT(nisn) AS 'count' FROM data_siswa");
$query_siswa = mysqli_fetch_array($pd);
$peserta_didik = $query_siswa['count'];
?>

<?php
  if (isset($_SESSION['pesan']) && $_SESSION['pesan'] <> '') {

  if($_SESSION['username'] == 'Richo'){?>
  <!-- Toasts -->
    <div aria-live="polite" aria-atomic="true" style="position: relative;">
<!-- Position it -->
<div style="position: absolute; top: 3em; bottom: 0; right: 0; z-index: 999;">
    <div class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-autohide="true" data-delay="7000">
        <div class="toast-header bg-info text-white">
          <i class="fas fa-user mr-2"></i>
            <strong class="mr-auto">Selamat Datang, <?php echo $_SESSION['username']?></strong>
            <small><?php 
              $admin = mysqli_query($db_conn,"SELECT * FROM data_admin WHERE nama_lengkap='{$_SESSION['nama_lengkap']}'");
              if(mysqli_num_rows($admin) > 0){
                while($data = mysqli_fetch_array($admin)){ ?>
                  <?php echo $data['sesi_login'] ?>
            <?php }
          } else {
            echo '';
          }?> WIB</small>
            <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="toast-body">
          Aplikasi Administrasi Persuratan <strong>SMK Negeri 7 Surakarta</strong> V2.1.2
        </div>
   </div>
</div>
</div>
  <!-- Toasts -->
    <div aria-live="polite" aria-atomic="true" style="position: relative;">
<!-- Position it -->
<div style="position: absolute; top: 9em; bottom: 0; right: 0; z-index: 999;">
    <div class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-autohide="true" data-delay="8000">
        <div class="toast-header bg-info text-white">
          <i class="fas fa-user mr-2"></i>
            <strong class="mr-auto">Sesi Login Aplikasi</strong>
            <small>now</small>
            <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="toast-body">
          <strong>Tanggal Login </strong> : <?php echo tgl_indo(date("Y-m-d"));?> <br>
          <strong>Waktu Sesi Login </strong>: <?php 
              $admin = mysqli_query($db_conn,"SELECT * FROM data_admin WHERE nama_lengkap='{$_SESSION['nama_lengkap']}'");
              if(mysqli_num_rows($admin) > 0){
                while($data = mysqli_fetch_array($admin)){ ?>
                  <?php echo $data['sesi_login'] ?>
            <?php }
          } else {
            echo '';
          }?> WIB
        </div>
   </div>
</div>
</div>

<?php } else if($_SESSION['username'] == 'Gunadi'){?>
 <!-- Toasts -->
 <div aria-live="polite" aria-atomic="true" style="position: relative;">
<!-- Position it -->
<div style="position: absolute; top: 3em; bottom: 0; right: 0; z-index: 999;">
    <div class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-autohide="true" data-delay="7000">
        <div class="toast-header bg-info text-white">
          <i class="fas fa-user mr-2"></i>
            <strong class="mr-auto">Selamat Datang, <?php echo $_SESSION['username']?></strong>
            <small><?php echo $_SESSION['sesi_login']?> WIB</small>
            <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="toast-body">
          Aplikasi Administrasi Persuratan <strong>SMK Negeri 7 Surakarta</strong> V2.1.2
        </div>
   </div>
</div>
</div>
  <!-- Toasts -->
    <div aria-live="polite" aria-atomic="true" style="position: relative;">
<!-- Position it -->
<div style="position: absolute; top: 9em; bottom: 0; right: 0; z-index: 999;">
    <div class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-autohide="true" data-delay="8000">
        <div class="toast-header bg-info text-white">
          <i class="fas fa-user mr-2"></i>
            <strong class="mr-auto">Sesi Login Aplikasi</strong>
            <small>now</small>
            <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="toast-body">
          <strong>Tanggal Login </strong> : <?php echo tgl_indo(date("Y-m-d"));?> <br>
          <strong>Waktu Sesi Login </strong>: <?php 
              $admin = mysqli_query($db_conn,"SELECT * FROM data_admin WHERE nama_lengkap='{$_SESSION['nama_lengkap']}'");
              if(mysqli_num_rows($admin) > 0){
                while($data = mysqli_fetch_array($admin)){ ?>
                  <?php echo $data['sesi_login'] ?>
            <?php }
          } else {
            echo '';
          }?> WIB
        </div>
   </div>
</div>
</div>
      <?php }
      }
      $_SESSION['pesan'] = '';
    ?> 

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

      <?php if($sum_pending != '0'){ ?>
        <!-- Info boxes -->
        <div class="row">
          <div class="col-12 col-sm-12 col-md-12">
          <div class="info-box mb-3 bg-danger">
              <span class="info-box-icon"><i class="fas fa-exclamation-triangle"></i></span>
              <div class="info-box-content">
                <span class="info-box-text"><strong>Peringatan !</strong></span>
                <span class="info-box-text">Anda memiliki <strong><?php echo $sum_pending?> Surat </strong> yang belum dicetak Harap segera mencetak surat tersebut !</span>
              </div>
          </div>

          <div class="card">
            <div class="card-header bg-danger"><i class="fas fa-exclamation-triangle"></i> &nbsp<strong>LIST SURAT BELUM DICETAK / PENDING</strong>
            <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
                </div>
            <div class="card-body">
  
          <?php if($sp_surgas != '0'){ ?>

                    <!-- Surat Tugas Guru -->
                    <div class="card">
                            <div class="card-header bg-warning">Surat Perintah Tugas Guru (<?php echo $sp_surgas?> Surat Belum Dicetak/Pending)
                              <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
                            </div>
                            <div class="card-body">
                              <table class="table table-bordered table-striped">
                                <thead>
                                  <th>No Surat</th>
                                  <th>Nama Guru/Karyawan</th>
                                  <th>Tempat Tujuan</th>
                                  <th>Tanggal Kegiatan</th>
                                  <th>Tanggal Surat</th>
                                  <th>Jenis Surat Tugas</th>
                                  <th>Pejabat TTD</th>
                                  <th>Creator</th>
                                  <th width="7%"></th>
                                </thead>

                                <?php
                                $today = date("2025-08-17"); 
                                $pending_surgas = mysqli_query($db_conn,"SELECT * FROM surgas_guru WHERE status_cetak='Pending' ");
                                if(mysqli_num_rows($pending_surgas) > 0){
                                  while($p_surgas = mysqli_fetch_array($pending_surgas)){?>

                                <tbody>
                                  <tr>
                                    <?php if($p_surgas['tgl_create'] <= $today){?>
                                <td>094/<?php echo $p_surgas['no_surat'] ?></td>
                                <?php } else {?>
                                  <td>800.1.11.1/<?php echo $p_surgas['no_surat'] ?></td>
                                  <?php }?>
                                  <td><?php echo $p_surgas['nama_guru']?><br><strong>NIP. <?php echo $p_surgas['nip_guru']?></strong></td>
                                  <td><?php echo $p_surgas['tempat']?></td>
                                  <td><?php echo tgl_indo($p_surgas['tgl_kegiatan'])?></td>
                                  <td><?php echo tgl_indo($p_surgas['tgl_create'])?></td>
                                  <td><?php echo $p_surgas['jenis_surgas']?></td>
                                  <td><?php echo $p_surgas['pejabat_ttd']?></td>
                                  <td><?php echo $p_surgas['creator']?></td>
                                  <td>
                                    <?php if($p_surgas['jenis_surgas'] == 'Luar Kota'){?>
                                        <ul class="navbar-nav ml-auto">
                                        <!-- Messages Dropdown Menu --> 
                                        <li class="nav-item dropdown">
                                            <a class="nav-link btn btn-warning" href="#" data-toggle="dropdown" ><strong>&nbsp<i class="fas fa-tasks"></i>  &nbspAksi</strong>&nbsp</a>
                                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                                            <div class="dropdown-divider"></div>
                                            <a href="../cetak_surat/cetak_sppd.php?no_surat=<?php echo $p_surgas['no_surat']?>" class="dropdown-item bg-primary">
                                                <i class="fas fa-truck mr-2"></i> Unduh SPPD
                                            </a>
                                            <div class="dropdown-divider"></div>
                                            <a href="../cetak_surat/cetak_blkg_sppd.php?no_surat=<?php echo $p_surgas['no_surat']?>" class="dropdown-item bg-warning">
                                                <i class="fas fa-info-circle mr-2"></i> Unduh SPPD (Form Belakang)
                                            </a>
                                            <div class="dropdown-divider"></div>
                                            <a href="../cetak_surat/cetak_luar_kota.php?no_surat=<?php echo $p_surgas['no_surat']?>" class="dropdown-item">
                                                <i class="fas fa-print mr-2"></i> Cetak Surat
                                            </a>
                                            <div class="dropdown-divider"></div>
                                            <a href="dashboard.php" type="button" class="dropdown-item btn btn-default" data-toggle="modal" data-target="#edit_surgas<?php echo htmlspecialchars($p_surgas['id_surat'])?>">
                                             <i class="fas fa-edit mr-2"></i> Edit Surat
                                            </a>
                                            </div>
                                        </li> 
                                    </ul>
                                        <?php }else { ?>
                                    <ul class="navbar-nav ml-auto">
                                        <!-- Messages Dropdown Menu --> 
                                        <li class="nav-item dropdown">
                                            <a class="nav-link btn btn-warning" href="#" data-toggle="dropdown" ><strong><i class="fas fa-tasks"></i>  &nbspAksi</strong></a>
                                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                                            <div class="dropdown-divider"></div>
                                            <a href="../cetak_surat/cetak_dalam_kota.php?no_surat=<?php echo $p_surgas['no_surat']?>" class="dropdown-item">
                                                <i class="fas fa-print mr-2"></i> Cetak Surat
                                            </a>
                                            <div class="dropdown-divider"></div>
                                            <a href="dashboard.php" type="button" class="dropdown-item btn btn-default" data-toggle="modal" data-target="#edit_surgas<?php echo htmlspecialchars($p_surgas['id_surat'])?>">
                                             <i class="fas fa-edit mr-2"></i> Edit Surat
                                            </a>
                                            </div>
                                        </li> 
                                    </ul>
                                    <?php }?>
                                </td>
                                        </tr>
                                        <div class="modal fade" id="edit_surgas<?php echo htmlspecialchars($p_surgas['id_surat']) ?>">
                            <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header bg-primary">
                                <h5 class="modal-title col-11">
                                  <div class="info-box">
                                    <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-edit"></i></span>
                                    <div class="info-box-content" style="color:black">
                                      <span class="info-box-text"><strong>Edit Surat Perintah Tugas Guru 094/<?php echo $p_surgas['no_surat']?></strong> </span>
                                      <span class="info-box-number">
                                        <?php if($p_surgas['nip_guru'] == '-'){?>
                                          <small><?php echo $p_surgas['nama_guru']?></small>
                                          <?php } else {?>
                                        <small><?php echo $p_surgas['nama_guru']?> - <?php echo $p_surgas['nip_guru']?></small>
                                      <?php }?>
                                    </span>
                                    </div>
                                    <span class="info-box-footer mt-3 mr-3">
                                      <a href="#" class="btn btn-sm btn-primary float-right"><i class="fas fa-truck"></i> &nbsp<?php echo $p_surgas['jenis_surgas']?></a>
                                  </span>
                                    </div>
                                  </h5>
                                
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body bg-light">
                                <form action="edit_proses_surgas_guru.php" class="form-horizontal" method="post">
                                  
                                  <div class="form-group">
            <label for="formGroupExampleInput">Nomor Surat</label>
            <input type="text" name="no_surat" class="form-control" id="no_surat" value="<?php echo $p_surgas['no_surat']?>">
          </div>

        <!-- Card SPPD -->
          <div class="card">
            <div class="card-header bg-primary">Keterangan Surat Perintah Perjalanan Dinas (SPPD)</div>
            <div class="card-body">

        <!-- Nomor Surat SPPD, Tempat SPPD, dan Jenis Surat Tugas -->
        <div class="form-group row">
	      <div class="col-sm-6">
              <div class="form-group">
                <label for="formGroupExampleInput">Nomor Surat SPPD</label>
                <input type="text" name="no_surat_sppd" class="form-control" id="no_surat_sppd" value="<?php echo $p_surgas['no_surat_sppd']?>">
          </div>
      </div>
      <div class="col-sm-6">
        <div class="form-group">
            <label for="formGroupExampleInput">Tempat SPPD</label>
            <input type="text" name="tempat_sppd" class="form-control" id="tempat_sppd" value="<?php echo $p_surgas['tempat_sppd']?>">
          </div>
      </div>
    </div>
        
    <!-- Tujuan SPPD, dan Mata Anggaran-->
        <div class="form-group row">
	      <div class="col-sm-6">
              <div class="form-group">
                <label for="formGroupExampleInput">Tujuan SPPD</label>
                <textarea name="tujuan_sppd" rows="5" class="form-control" id="tujuan_sppd"><?php echo $p_surgas['tujuan_sppd']?></textarea>
          </div>
      </div>
      <div class="col-sm-6">
        <div class="form-group">
                <label for="formGroupExampleInput">Jenis Surat Tugas</label>
                <select id="jenis_surgas" class="form-control" name="jenis_surgas">
                  <?php if($p_surgas['jenis_surgas'] == "Dalam Kota"){?>
                    <option selected value="Dalam Kota">Dalam Kota</option>
                    <option value="Luar Kota">Luar Kota</option>
                  <?php } else {?>
                    <option selected value="Luar Kota">Luar Kota</option>
                    <option value="Dalam Kota">Dalam Kota</option>
                  <?php }?>
                </select>
              </div>
      <div class="form-group">
                <label for="formGroupExampleInput">Mata Anggaran SPPD</label>
                <select id="mata_anggaran" class="form-control" name="mata_anggaran" required autofocus>
                  <option selected value="<?php echo $p_surgas['mata_anggaran']?>"><?php echo $p_surgas['mata_anggaran']?></option>
                  <option disabled>Pilih Mata Anggaran SPPD</option>
                  <option value="BOS">Dana BOS</option>
                  <option value="BOP">Dana BOP</option>
                  <option value="Mandiri">Dana Mandiri</option>
                  <option value="Penyelenggara">Dana Penyelenggara</option>
                  <option value="Lainnya">Dana Lainnya</option>
                </select>
      </div>
    </div>
            </div>
            </div>
          </div>
        
        <div class="card">
            <div class="card-header bg-primary">Data Guru/Karyawan SMK Negeri 7 Surakarta</div>
            <div class="card-body">
                <!-- Nama Lengkap -->
                    <div class="form-group">
                                <label for="formGroupExampleInput">Nama Guru/Karyawan</label>
                                <input type="text" name="nama_guru" class="form-control" id="nama_guru_edit" value="<?php echo $p_surgas['nama_guru']?>">
                            </div>
                          
                
                            <!-- NIP, Pangkat, Golongan dan Jabatan -->
                        <div class="form-group row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="formGroupExampleInput">NIP</label>
                                <input type="text" name="nip_guru" class="form-control" id="nip_guru" value="<?php echo $p_surgas['nip_guru']?>">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="formGroupExampleInput">Pangkat</label>
                                <input type="text" name="pangkat_guru" class="form-control" id="pangkat_guru" value="<?php echo $p_surgas['pangkat_guru']?>">
                        </div>
                    </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="formGroupExampleInput">Golongan </label>
                                <input type="text" name="golongan_guru" class="form-control" id="golongan_guru" value="<?php echo $p_surgas['golongan_guru']?>">
                        </div>
                    </div>
                    </div>

                    <!-- Jabatan -->
                    <div class="form-group">
                            <label for="formGroupExampleInput">Jabatan</label>
                                <select id="jabatan" class="form-control" name="jabatan">
                                    <option selected value="<?php echo $p_surgas['jabatan']?>"><?php echo $p_surgas['jabatan']?></option>
                                    <option disabled>Pilih Jabatan</option>
                                    <option value="Kepala Sekolah">Kepala Sekolah</option>
                                    <option value="Plt. Ka Sub Bag Tata Usaha">Plt. Ka Sub Bag Tata Usaha</option>
                                    <option value="Guru">Guru</option>
                                <option value="Staf Tata Usaha">Staf Tata Usaha</option>
                                </select>
                            </div>
            </div>
        </div>
    

        <div class="card">
            <div class="card-header bg-primary">Isi Surat Perintah Tugas Guru</div>
            <div class="card-body">
                <!-- Dasar Surat -->
                    <div class="form-group">
                            <label for="formGroupExampleInput">Dasar Surat</label>
                                <?php if($p_surgas['dasar_surat'] == ''){?>
                                  <small><i>(Silahkan Masukkan Dasar Surat)</i></small>
                                  <textarea class="form-control" id="dasar_surat" name="dasar_surat" rows="5" placeholder="Masukkan Dasar Surat"></textarea>
                                  <?php } else {?>
                                    <small><i>(Silahkan Masukkan Dasar Surat)</i></small>
                                    <textarea class="form-control" id="dasar_surat" name="dasar_surat" rows="5"><?php echo $p_surgas['dasar_surat']?></textarea>
                                  <?php }?>
                            </div>

                    <!-- Isi Surat -->
                    <div class="form-group">
                            <label for="formGroupExampleInput">Isi Surat</label>
                            <textarea class="form-control" id="isi_surat" name="isi_surat" rows="5"><?php echo $p_surgas['isi_surat']?></textarea>
                            </div>

                    <!-- Tempat dan Jalan -->
                        <div class="form-group row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="formGroupExampleInput">Tempat</label>
                                <input type="text" name="tempat" class="form-control" id="tempat" value="<?php echo $p_surgas['tempat']?>">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="formGroupExampleInput">Jalan</label>
                                <input type="text" name="jalan" class="form-control" id="jalan" value="<?php echo $p_surgas['jalan']?>">
                        </div>
                    </div>
                    </div>

            </div>
        </div>
    
        <div class="card">
            <div class="card-header bg-primary">Waktu Diselenggarakan Acara</div>
            <div class="card-body">
            
            <div class="form-group">
                <label for="">Tanggal Mulai Acara <span class=""><small>(Wajib diisi)</small></span></label>
					<input type="date" name="tgl_kegiatan" class="form-control mb-4" id="tgl_kegiatan" value="<?php echo $p_surgas['tgl_kegiatan']?>">
			</div>
            
            <h5><strong>Pelaksanaan 1 Hari</strong></h5><hr>

            <!-- Tanggal & Jam Acara 1 Hari-->
    <div class="form-group row">
		<div class="col-sm-6 mb-2">
			<div class="form-group">
                <label for="">Waktu Mulai Acara</label>
						<input type="text" name="mulai_kegiatan" class="form-control" id="mulai_kegiatan" value="<?php echo $p_surgas['mulai_kegiatan']?>">
					<div class="form-text"><small>*Dipakai untuk 1 hari saja, Apabila lebih dari 1 hari dikosongi saja</small></div>
				</div>
            </div>
		<div class="col-sm-6 mb-2">
			<div class="form-group">
                <label for="">Waktu Selesai Acara</label>
						<input type="text" name="sampai_kegiatan" class="form-control" id="sampai_kegiatan" value="<?php echo $p_surgas['sampai_kegiatan']?>">
						<div class="form-text"><small>*Dipakai untuk 1 hari saja, Apabila lebih dari 1 hari dikosongi saja</small></div>

				</div>
            </div>
        </div>

        <h5><strong>Pelaksanaan Lebih dari 1 Hari</strong></h5><hr>

        <!-- Tanggal Pembukaan dan Penutupan Acara-->
    <div class="form-group row">
		<div class="col-sm-4">
			<div class="form-group">
                <label for="">Tanggal Selesai Acara</label>
					<input type="date" name="tgl_selesai" class="form-control" id="tgl_selesai" value="<?php echo $p_surgas['tgl_selesai']?>">
					<div class="form-text"><small>*Dipakai apabila lebih dari 1 hari</small></div>
			</div>
		</div>
		<div class="col-sm-4">
			<div class="form-group">
                <label for="">Tanggal Pembukaan Acara</label>
						<input type="date" name="tgl_pembukaan" class="form-control" id="tgl_pembukaan" value="<?php echo $p_surgas['tgl_pembukaan']?>">
					<div class="form-text"><small>*Dipakai apabila lebih dari 1 hari</small></div>
				</div>
            </div>
		<div class="col-sm-4">
			<div class="form-group">
                <label for="">Tanggal Penutupan Acara</label>
						<input type="date" name="tgl_penutupan" class="form-control" id="tgl_penutupan" value="<?php echo $p_surgas['tgl_penutupan']?>">
						<div class="form-text"><small>*Dipakai apabila lebih dari 1 hari</small></div>
				</div>
            </div>
        </div>

		<!-- Jam Pembukaan dan Penutupan Acara -->
    <div class="form-group row">
		<div class="col-sm-6">
			<div class="form-group">
                <label for="">Jam Pembukaan Acara</label>
			<input type="text" name="jam_pembukaan" class="form-control" id="jam_pembukaan" value="<?php echo $p_surgas['jam_pembukaan']?>">
			<div class="form-text"><small>*Dipakai apabila lebih dari 1 hari</small></div>
			</div>
		</div>
		<div class="col-sm-6">
			<div class="form-group">
                <label for="">Jam Penutupan Acara</label>
			<input type="text" name="jam_penutupan" class="form-control" id="jam_penutupan" value="<?php echo $p_surgas['jam_penutupan']?>">
			<div class="form-text"><small>*Dipakai apabila lebih dari 1 hari</small></div>
				</div>
            </div>
        </div>

            </div>
        </div>

              <div class="card">
                <div class="card-header bg-primary">Status Pencetakan Surat</div>
                <div class="card-body">
                <!-- Status Cetak -->
                        <div class="form-group row">
                            <div class="col-sm-6">
                            <div class="form-group">
                                <label for="formGroupExampleInput">Status Cetak Surat</label>
                                <select id="status_cetak" class="form-control" name="status_cetak">
                                  <?php if($p_surgas['status_cetak'] == "Selesai"){?>
                                    <option selected value="Selesai">Selesai</option>
                                    <option value="Pending">Pending</option>
                                    <?php } else {?>
                                      <option selected value="Pending">Pending</option>
                                      <option value="Selesai">Selesai</option>
                                      <?php }?>

                                </select>
                            </div>
                            </div>
                            <div class="col-sm-6">
                            <div class="form-group">
                                <label for="formGroupExampleInput">Yang Bertandatangan</label>
                                <select id="pejabat_ttd" class="form-control" name="pejabat_ttd">
                                <?php if($p_surgas['pejabat_ttd'] == "Inti Kurniati Sri Utami, S.Si"){?>
                                  <option selected value="Inti Kurniati Sri Utami, S.Si">Bu Inti Kurniati Sri Utami, S.Si</option>
                                    <option value="Kristiyono, S.Pd">Pak Kristiyono, S.Pd</option>
                                    <option value="Wardoyo, S.Pd., M.Pd">Pak Wardoyo, S.Pd., M.Pd</option>
                                    <?php } else if($p_surgas['pejabat_ttd'] == "Kristiyono, S.Pd"){?>
                                      <option selected value="Kristiyono, S.Pd">Pak Kristiyono, S.Pd</option>
                                      <option value="Inti Kurniati Sri Utami, S.Si">Bu Inti Kurniati Sri Utami, S.Si</option>
                                      <option value="Wardoyo, S.Pd., M.Pd">Pak Wardoyo, S.Pd., M.Pd</option>
                                      <?php } else {?>
                                        <option selected value="Wardoyo, S.Pd., M.Pd">Pak Wardoyo, S.Pd., M.Pd</option>
                                        <option value="Kristiyono, S.Pd">Pak Kristiyono, S.Pd</option>
                                      <option value="Inti Kurniati Sri Utami, S.Si">Bu Inti Kurniati Sri Utami, S.Si</option>
                                      <?php }?>
                                </select>
                            </div>
                            </div>
                        </div>
                </div>
              </div>
                                    
                                  </div>
                                      <div class="modal-footer justify-content-between">
                                      <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times mr-2"></i> Batal</button>
                                      <button type="submit" name="submit" class="btn btn-success"><i class="fas fa-paper-plane mr-2"></i> Kirim Data</button>
                                      </div>
                                      <input type="hidden" name="id_surat" id="id_surat" value="<?php echo $p_surgas['id_surat']?>">
                                    </form>
                            </div>
                            <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                        </div>
                        <!-- /.modal -->
                                </tbody>
                                <?php }
                                } else {
                                }?>

                              </table>
                            </div>
                          </div>
                    <?php } else {?>
                    <?php }?>
                    
                    <?php if($sp_homevisit != '0'){ ?>
                    <!-- Surat Kunjungan Rumah / Homevisit -->
                    <div class="card">
                            <div class="card-header bg-warning">Surat Kunjungan / Homevisit (<?php echo $sp_homevisit?> Surat Belum Dicetak/Pending)
                              <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
                            </div>
                            <div class="card-body">
                              <table class="table table-bordered table-striped">
                                <thead>
                                  <th>No Surat</th>
                                  <th>Nama Siswa</th>
                                  <th>Kelas</th>
                                  <th>Tanggal Kunjungan</th>
                                  <th>Tanggal Surat</th>
                                  <th>Pejabat TTD</th>
                                  <th>Creator</th>
                                </thead>

                                <?php $pending_homevisit = mysqli_query($db_conn,"SELECT * FROM homevisit WHERE status_cetak='Pending' ");
                                if(mysqli_num_rows($pending_homevisit) > 0){
                                  while($p_homevisit = mysqli_fetch_array($pending_homevisit)){?>

                                <tbody>
                                  <?php if($p_homevisit['tgl_create'] <= $today){?>
                                <td>094/<?php echo $p_homevisit['no_surat'] ?></td>
                                <?php } else {?>
                                  <td>800.1.11.1/<?php echo $p_homevisit['no_surat'] ?></td>
                                  <?php }?>
                                  <td><?php echo $p_homevisit['nama_lengkap']?></td>
                                  <td><?php echo $p_homevisit['kelas']?></td>
                                  <td><?php echo tgl_indo($p_homevisit['tgl_kunjungan'])?></td>
                                  <td><?php echo tgl_indo($p_homevisit['tgl_create'])?></td>
                                  <td><?php echo $p_homevisit['pejabat_ttd']?></td>
                                  <td><?php echo $p_homevisit['creator']?></td>
                                </tbody>
                                <?php
                                  }
                                } else {
                                } ?>

                              </table>
                            </div>
                          </div>
                    <?php } else {?>
                    <?php }?>

                    <?php if($sp_sk != '0'){ ?>
                    <!-- Surat Keterangan -->
                    <div class="card">
                            <div class="card-header bg-warning">Surat Keterangan (<?php echo $sp_sk?> Surat Belum Dicetak/Pending)
                              <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
                            </div>
                            <div class="card-body">
                              <table class="table table-bordered table-striped">
                                <thead>
                                  <th>No Surat</th>
                                  <th>Nama Siswa</th>
                                  <th>Kelas</th>
                                  <th>NIS</th>
                                  <th>Tempat, Tanggal Lahir</th>
                                  <th>Nama Orang Tua</th>
                                  <th>Tanggal Surat</th>
                                  <th>Pejabat TTD</th>
                                  <th>Creator</th>
                                  <th width="7%"></th>
                                </thead>

                                <?php $pending_keterangan = mysqli_query($db_conn,"SELECT * FROM surat_keterangan WHERE status_cetak='Pending' ");
                                if(mysqli_num_rows($pending_keterangan) > 0){
                                  while($p_keterangan = mysqli_fetch_array($pending_keterangan)){?>

                                <tbody>
                                  <tr>
                                    <?php if($p_keterangan['tgl_create'] <= $today){?>
                                <td>800/<?php echo $p_keterangan['no_surat'] ?></td>
                                <?php } else {?>
                                  <td>400.3.12.1/<?php echo $p_keterangan['no_surat'] ?></td>
                                  <?php }?>
                                  <td><?php echo $p_keterangan['nama_lengkap']?></td>
                                  <td><?php echo $p_keterangan['kelas']?></td>
                                  <td><?php echo $p_keterangan['nis']?></td>
                                  <td><?php echo $p_keterangan['ttl']?></td>
                                  <td><?php echo $p_keterangan['nama_ortu']?></td>
                                  <td><?php echo indo($p_keterangan['tgl_create'])?></td>
                                  <td><?php echo $p_keterangan['pejabat_ttd']?></td>
                                  <td><?php echo $p_keterangan['creator']?></td>
                                  <td>
                                    <ul class="navbar-nav ml-auto">
                                        <!-- Messages Dropdown Menu --> 
                                        <li class="nav-item dropdown">
                                            <a class="nav-link btn btn-warning" href="#" data-toggle="dropdown" ><strong><i class="fas fa-tasks"></i>  &nbspAksi</strong></a>
                                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                                            <div class="dropdown-divider"></div>
                                            <a href="../cetak_surat/cetak_keterangan.php?no_surat=<?php echo $p_keterangan['no_surat']?>" class="dropdown-item">
                                                <i class="fas fa-print mr-2"></i> Cetak Surat
                                            </a>
                                            <div class="dropdown-divider"></div>
                                            <a href="dashboard.php" type="button" class="dropdown-item btn btn-default" data-toggle="modal" data-target="#edit_sk<?php echo htmlspecialchars($p_keterangan['id_surat'])?>">
                                             <i class="fas fa-edit mr-2"></i> Edit Surat
                                            </a>
                                            </div>
                                        </li> 
                                    </ul>
                                </td>
                                </tr>

                                <div class="modal fade" id="edit_sk<?php echo htmlspecialchars($p_keterangan['id_surat']) ?>">
                            <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header bg-primary">
                                <h5 class="modal-title col-11">
                                  <div class="info-box">
                                    <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-edit"></i></span>
                                    <div class="info-box-content" style="color:black">
                                      <span class="info-box-text"><strong>Edit Surat Keterangan 400.3.12.1/<?php echo $p_keterangan['no_surat']?></strong> </span>
                                      <span class="info-box-number">
                                        <small><?php echo $p_keterangan['nama_lengkap']?> - <?php echo $p_keterangan['kelas']?></small>
                                      </span>
                                    </div>
                                    </div>
                                  </h5>
                                
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body bg-light">
                                  <form action="edit_proses_sk.php" class="form-horizontal" method="post">
                                  <!-- Nomor Surat -->
                                <div class="form-group">
                                    <label for="formGroupExampleInput">Nomor Surat</label>
                                    <input type="text" name="no_surat" class="form-control" id="no_surat" value="<?php echo $p_keterangan['no_surat'] ?>">
                                  </div>
                                
                                  <div class="card">
                                    <div class="card-header bg-primary">Identitas Siswa</div>
                                    <div class="card-body">
                                      
                                    <!-- Nama Lengkap -->
                                    <div class="form-group">
                                      <label for="formGroupExampleInput">Nama Lengkap</label>
                                      <input type="text" name="nama_lengkap" class="form-control" id="edit_nis"  value="<?php echo $p_keterangan['nama_lengkap'] ?>">
                                    </div>

                                <!-- NIS dan NISN -->
                                <div class="form-group row">
                                  <div class="col-sm-6">
                                      <div class="form-group">
                                        <label for="formGroupExampleInput">NIS (Nomor Induk Sekolah)</label>
                                        <input type="text" name="nis" class="form-control" id="edit_nis"  value="<?php echo $p_keterangan['nis'] ?>">
                                  </div>
                              </div>
                                <div class="col-sm-6">
                                      <div class="form-group">
                                        <label for="formGroupExampleInput">NISN (Nomor Induk Sekolah Nasional)</label>
                                        <input type="text" name="nisn" class="form-control" id="edit_nisn"  value="<?php echo $p_keterangan['nisn'] ?>">
                                  </div>
                              </div>
                            </div>
                              
                            <!-- Kelas dan TTL -->
                                <div class="form-group row">
                                  <div class="col-sm-6">
                                      <div class="form-group">
                                        <label for="formGroupExampleInput">Kelas</label>
                                        <input type="text" name="kelas" class="form-control" id="edit_kelas" value="<?php echo $p_keterangan['kelas'] ?>">
                                  </div>
                              </div>
                                <div class="col-sm-6">
                                      <div class="form-group">
                                        <label for="formGroupExampleInput">Tempat, Tanggal Lahir</label>
                                        <input type="text" name="ttl" class="form-control" id="edit_tempat_lahir"  value="<?php echo $p_keterangan['ttl'] ?>">
                                  </div>
                              </div>
                            </div>
                              
                                <!-- Nama Orang Tua -->
                                <div class="form-group">
                                        <label for="formGroupExampleInput">Nama Orang Tua</label>
                                        <input type="text" name="nama_ortu" class="form-control" id="edit_nama_ortu"  value="<?php echo $p_keterangan['nama_ortu'] ?>">
                                  </div>

                                    </div>
                                  </div>
                                    
                                <div class="card">
                                  <div class="card-header bg-primary">Isi Surat</div>
                                  <div class="card-body">
                                    
                                  <!-- Deskripsi / Isi Surat -->
                                  <div class="form-group">
                                        <label for="formGroupExampleInput">Deskripsi / Isi Surat</label>
                                        <textarea class="form-control" id="edit_deskripsi" name="deskripsi" rows="5"><?php echo $p_keterangan['deskripsi']?></textarea>
                                  </div>
                                
                            <!-- Penutup Surat -->
                                  <div class="form-group">
                                        <label for="formGroupExampleInput">Penutup Surat</label>
                                        <textarea class="form-control" id="edit_penutup_surat" name="penutup_surat" rows="5"><?php echo $p_keterangan['penutup_surat']?></textarea>
                                  </div>

                                  </div>
                                </div>
                                  
                                <div class="card">
                                  <div class="card-header bg-primary">Status Pencetakan Surat</div>
                                  <div class="card-body">
                                    
                                  <!-- Status Cetak -->
                                  <div class="form-group row">
                                    <div class="col-sm-4">
                                    <div class="form-group">
                                      <label for="formGroupExampleInput">Tanggal Surat</label>
                                    <input type="date" name="tgl_surat" class="form-control" id="edit_tgl_surat" value="<?php echo $p_keterangan['tgl_surat'] ?>">
                                    </div>
                                  </div>
                                    <div class="col-sm-4">
                                      <div class="form-group">
                                        <label for="formGroupExampleInput">Status Cetak Surat</label>
                                        <select id="edit_status_cetak" class="form-control" name="status_cetak">
                                          <?php if($p_keterangan['status_cetak'] == "Selesai"){?>
                                              <option selected value="Selesai">Selesai</option>
                                              <option value="Pending">Pending</option>
                                            <?php } else {?>
                                              <option selected value="Pending">Pending</option>
                                              <option value="Selesai">Selesai</option>
                                            <?php }?>
                                        </select>
                                      </div>
                                    </div>
                                    <div class="col-sm-4">
                                      <div class="form-group">
                                        <label for="formGroupExampleInput">Yang Bertandatangan</label>
                                        <select id="edit_pejabat_ttd" class="form-control" name="pejabat_ttd">
                                          <?php if($p_keterangan['pejabat_ttd'] == "Inti Kurniati Sri Utami, S.Si"){?>
                                              <option selected value="Inti Kurniati Sri Utami, S.Si">Bu Inti Kurniati Sri Utami, S.Si</option>
                                              <option value="Kristiyono, S.Pd">Pak Kristiyono, S.Pd</option>
                                              <option value="Wardoyo, S.Pd., M.Pd">Pak Wardoyo, S.Pd., M.Pd</option>
                                            <?php } else if($p_keterangan['pejabat_ttd'] == "Kristiyono, S.Pd"){?>
                                              <option selected value="Kristiyono, S.Pd">Pak Kristiyono, S.Pd</option>
                                              <option value="Inti Kurniati Sri Utami, S.Si">Bu Inti Kurniati Sri Utami, S.Si</option>
                                              <option value="Wardoyo, S.Pd., M.Pd">Pak Wardoyo, S.Pd., M.Pd</option>
                                            <?php } else {?>
                                              <option selected value="Wardoyo, S.Pd., M.Pd">Pak Wardoyo, S.Pd., M.Pd</option>
                                              <option value="Kristiyono, S.Pd">Pak Kristiyono, S.Pd</option>
                                              <option value="Inti Kurniati Sri Utami, S.Si">Bu Inti Kurniati Sri Utami, S.Si</option>
                                            <?php }?>
                                          
                                        </select>
                                      </div>
                                    </div>
                                </div>

                                  </div>
                                </div>
                                  
                                  
                                </div>
                                    <div class="modal-footer justify-content-between">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times mr-2"></i> Batal</button>
                                    <button type="submit" name="submit" class="btn btn-success"><i class="fas fa-save mr-2"></i> Simpan Perubahan</button>
                                    </div>
                                    <input type="hidden" name="id_surat" id="id_surat" value="<?php echo $p_keterangan['id_surat']?>">
                                  </form>
                            </div>
                            <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                        </div>
                        <!-- /.modal -->

                                </tbody>
                                <?php
                                  }
                                } else {                                  
                                }?>

                              </table>
                            </div>
                          </div>
                    <?php } else {?>
                    <?php }?>

                    <?php if($sp_rekomen != '0'){ ?>
                      
                    <!-- Surat Kunjungan Rumah / Homevisit -->
                    <div class="card">
                            <div class="card-header bg-warning">Surat Rekomendasi Siswa (<?php echo $sp_rekomen?> Surat Belum Dicetak/Pending)
                              <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
                            </div>
                            <div class="card-body">
                              
                              <table class="table table-bordered table-striped">
                                <thead>
                                  <th>No Surat</th>
                                  <th>Nama Siswa</th>
                                  <th>Kelas</th>
                                  <th>NIS</th>
                                  <th>Tanggal Surat</th>
                                  <th>Jenis Rekomendasi</th>
                                  <th>Pejabat TTD</th>
                                  <th>Creator</th>
                                  <th width="7%"></th>
                                </thead>
                                
                                <?php $pending_rekomendasi = mysqli_query($db_conn,"SELECT * FROM rekomendasi WHERE status_cetak='Pending' ");
                                if(mysqli_num_rows($pending_rekomendasi) > 0){
                                  while($p_rekomendasi = mysqli_fetch_array($pending_rekomendasi)){?>

                                <tbody>
                                  <?php if($p_rekomendasi['tgl_create'] <= $today){?>
                                <td>420.3/<?php echo $p_rekomendasi['no_surat'] ?></td>
                                <?php } else {?>
                                  <td>400.3.12.1/<?php echo $p_rekomendasi['no_surat'] ?></td>
                                  <?php }?>
                                  <td><?php echo $p_rekomendasi['nama_lengkap']?></td>
                                  <td><?php echo $p_rekomendasi['kelas']?></td>
                                  <td><?php echo $p_rekomendasi['nis']?></td>
                                  <td><?php echo indo($p_rekomendasi['tgl_create'])?></td>
                                  <td><?php echo $p_rekomendasi['jenis_rekomendasi']?></td>
                                  <td><?php echo $p_rekomendasi['pejabat_ttd']?></td>
                                  <td><?php echo $p_rekomendasi['creator']?></td>
                                  <td>
                                    <ul class="navbar-nav ml-auto">
                                        <!-- Messages Dropdown Menu --> 
                                        <li class="nav-item dropdown">
                                            <a class="nav-link btn btn-warning" href="#" data-toggle="dropdown" ><strong><i class="fas fa-tasks"></i>  &nbspAksi</strong></a>
                                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                                            <div class="dropdown-divider"></div>
                                            <?php if($p_rekomendasi['jenis_rekomendasi'] == 'Beasiswa KIPK'){?>
                                              <a href="../cetak_surat/cetak_Ranking.php?no_surat=<?php echo $p_rekomendasi['no_surat']?>" class="dropdown-item">
                                                  <i class="fas fa-print mr-2"></i> Cetak Surat
                                              </a>
                                              <?php } else {?>
                                            <a href="../cetak_surat/cetak_Rekomendasi.php?no_surat=<?php echo $p_rekomendasi['no_surat']?>" class="dropdown-item">
                                                <i class="fas fa-print mr-2"></i> Cetak Surat
                                            </a>
                                            <?php }?>
                                            <div class="dropdown-divider"></div>
                                            <a href="dashboard.php" type="button" class="dropdown-item btn btn-default" data-toggle="modal" data-target="#edit_rekomen<?php echo htmlspecialchars($p_rekomendasi['id_surat'])?>">
                                             <i class="fas fa-edit mr-2"></i> Edit Surat
                                            </a>
                                            </div>
                                        </li> 
                                    </ul>
                                </td>
                                </tr>

                                <div class="modal fade" id="edit_rekomen<?php echo htmlspecialchars($p_rekomendasi['id_surat']) ?>">
                            <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header bg-primary">
                                <h5 class="modal-title col-11">
                                  <div class="info-box">
                                    <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-edit"></i></span>
                                    <div class="info-box-content" style="color:black">
                                      <span class="info-box-text"><strong>Edit Surat Rekomendasi 
                                        <?php if($p_rekomendasi['tgl_create'] <= $today){?>
                                          420.3
                                        <?php } else {?>
                                         400.3.12.1
                                        <?php }?>
                                  /<?php echo $p_rekomendasi['no_surat']?></strong> </span>
                                      <span class="info-box-number">
                                        <small><?php echo $p_rekomendasi['nama_lengkap']?> - <?php echo $p_rekomendasi['kelas']?></small>
                                      </span>
                                    </div>
                                    </div>
                                  </h5>
                                
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body bg-light">
                                  <form action="edit_proses_rekomendasi.php" class="form-horizontal" method="post">
                                  <!-- Nomor Surat -->
                                <div class="form-group">
                                    <label for="formGroupExampleInput">Nomor Surat</label>
                                    <input type="text" name="no_surat" class="form-control" id="no_surat" value="<?php echo $p_rekomendasi['no_surat'] ?>">
                                  </div>
                                
                                  <div class="card">
                                    <div class="card-header bg-primary">Identitas Siswa</div>
                                    <div class="card-body">
                                      
                                    <!-- Nama Lengkap -->
                                    <div class="form-group">
                                      <label for="formGroupExampleInput">Nama Lengkap</label>
                                      <input type="text" name="nama_lengkap" class="form-control" id="nama_lengkap"  value="<?php echo $p_rekomendasi['nama_lengkap'] ?>">
                                    </div>

                                <!-- NIS dan NISN -->
                                <div class="form-group row">
                                  <div class="col-sm-6">
                                      <div class="form-group">
                                        <label for="formGroupExampleInput">NIS (Nomor Induk Sekolah)</label>
                                        <input type="text" name="nis" class="form-control" id="nis"  value="<?php echo $p_rekomendasi['nis'] ?>">
                                  </div>
                              </div>
                                <div class="col-sm-6">
                                      <div class="form-group">
                                        <label for="formGroupExampleInput">NISN (Nomor Induk Sekolah Nasional)</label>
                                        <input type="text" name="nisn" class="form-control" id="nisn"  value="<?php echo $p_rekomendasi['nisn'] ?>">
                                  </div>
                              </div>
                            </div>
                              
                            <!-- Kelas dan TTL -->
                                <div class="form-group row">
                                  <div class="col-sm-6">
                                      <div class="form-group">
                                        <label for="formGroupExampleInput">Kelas</label>
                                        <input type="text" name="kelas" class="form-control" id="kelas" value="<?php echo $p_rekomendasi['kelas'] ?>">
                                        <div id="emailHelp" class="form-text text-dark"><small>Contoh : XII KUL 1</small></div>
                                  </div>
                              </div>
                                <div class="col-sm-6">
                                      <div class="form-group">
                                        <label for="formGroupExampleInput">Tempat, Tanggal Lahir</label>
                                        <input type="text" name="ttl" class="form-control" id="ttl"  value="<?php echo $p_rekomendasi['ttl'] ?>">
                                        <div id="emailHelp" class="form-text text-dark"><small>Contoh : Surakarta, 13 September 2007</small></div>
                                  </div>
                              </div>
                            </div>
                              
                                <!-- Nama Orang Tua -->
                                <div class="form-group">
                                        <label for="formGroupExampleInput">Nama Orang Tua</label>
                                        <input type="text" name="nama_ortu" class="form-control" id="nama_ortu"  value="<?php echo $p_rekomendasi['nama_ortu'] ?>">
                                  </div>
                                
                                  <!-- Alamat Tempat Tinggal -->
                                <div class="form-group">
                                        <label for="formGroupExampleInput">Alamat</label>
                                        <input type="text" name="alamat" class="form-control" id="alamat"  value="<?php echo $p_rekomendasi['alamat'] ?>">
                                  </div>
                                    </div>
                                  </div>

                                  <?php if($p_rekomendasi['jenis_rekomendasi'] == 'Beasiswa KIPK'){?>
                                    <div class="card">
                                      <div class="card-header bg-primary">Ranking Semester 1-6</div>
                                      <div class="card-body">
                                        
                                      <div class="row mb-4">
                                          <div class="col">
                                            <h5>Semester 1</h5><hr>
                                              <label for="formGroupExampleInput">Rank Semester 1</label>
                                              <input type="number" min="0" max="50" name="rank_smt1" class="form-control" id="rank_smt1"  value="<?php echo $p_rekomendasi['rank_smt1'] ?>">
                                              <label for="formGroupExampleInput">Jumlah Siswa Semester 1</label>
                                              <input type="number" min="0" max="50" name="jumlah_smt1" class="form-control" id="jumlah_smt1"  value="<?php echo $p_rekomendasi['jumlah_smt1'] ?>">
                                        </div>
                                        <div class="col">
                                            <h5>Semester 2</h5><hr>
                                              <label for="formGroupExampleInput">Rank Semester 2</label>
                                              <input type="number" min="0" max="50" name="rank_smt2" class="form-control" id="rank_smt2"  value="<?php echo $p_rekomendasi['rank_smt2'] ?>">
                                              <label for="formGroupExampleInput">Jumlah Siswa Semester 2</label>
                                              <input type="number" min="0" max="50" name="jumlah_smt2" class="form-control" id="jumlah_smt2"  value="<?php echo $p_rekomendasi['jumlah_smt2'] ?>">
                                          </div>
                                          <div class="col">
                                            <h5>Semester 3</h5><hr>
                                              <label for="formGroupExampleInput">Rank Semester 3</label>
                                              <input type="number" min="0" max="50" name="rank_smt3" class="form-control" id="rank_smt3"  value="<?php echo $p_rekomendasi['rank_smt3'] ?>">
                                              <label for="formGroupExampleInput">Jumlah Siswa Semester 3</label>
                                              <input type="number" min="0" max="50" name="jumlah_smt3" class="form-control" id="jumlah_smt3"  value="<?php echo $p_rekomendasi['jumlah_smt3'] ?>">
                                          </div>
                                        </div>

                                        <div class="row mb-4">
                                          <div class="col">
                                            <h5>Semester 4</h5><hr>
                                              <label for="formGroupExampleInput">Rank Semester 4</label>
                                              <input type="number" min="0" max="50" name="rank_smt4" class="form-control" id="rank_smt4"  value="<?php echo $p_rekomendasi['rank_smt4'] ?>">
                                              <label for="formGroupExampleInput">Jumlah Siswa Semester 4</label>
                                              <input type="number" min="0" max="50" name="jumlah_smt4" class="form-control" id="jumlah_smt4"  value="<?php echo $p_rekomendasi['jumlah_smt4'] ?>">
                                        </div>
                                        <div class="col">
                                            <h5>Semester 5</h5><hr>
                                              <label for="formGroupExampleInput">Rank Semester 5</label>
                                              <input type="number" min="0" max="50" name="rank_smt5" class="form-control" id="rank_smt5"  value="<?php echo $p_rekomendasi['rank_smt5'] ?>">
                                              <label for="formGroupExampleInput">Jumlah Siswa Semester 5</label>
                                              <input type="number" min="0" max="50" name="jumlah_smt5" class="form-control" id="jumlah_smt5"  value="<?php echo $p_rekomendasi['jumlah_smt5'] ?>">
                                          </div>
                                          <div class="col">
                                            <h5>Semester 6</h5><hr>
                                              <label for="formGroupExampleInput">Rank Semester 6</label>
                                              <input type="number" min="0" max="50" name="rank_smt6" class="form-control" id="rank_smt6"  value="<?php echo $p_rekomendasi['rank_smt6'] ?>">
                                              <label for="formGroupExampleInput">Jumlah Siswa Semester 6</label>
                                              <input type="number" min="0" max="50" name="jumlah_smt6" class="form-control" id="jumlah_smt6"  value="<?php echo $p_rekomendasi['jumlah_smt6'] ?>">
                                          </div>
                                        </div>

                                      </div>
                                    </div>
                                    <?php } else {?>
                                      <?php }?>

                                    <div class="card">
                                      <div class="card-header bg-primary">Isi Surat Rekomendasi</div>
                                      <div class="card-body">
                                        
                                      <!-- Deskripsi / Isi Surat -->
                                  <div class="form-group">
                                        <label for="formGroupExampleInput">Deskripsi / Isi Surat</label>
                                        <textarea class="form-control" id="edit_deskripsi" name="deskripsi" rows="5"><?php echo $p_rekomendasi['deskripsi']?></textarea>
                                  </div>
                                
                            <!-- Penutup Surat -->
                                  <div class="form-group">
                                        <label for="formGroupExampleInput">Penutup Surat</label>
                                        <textarea class="form-control" id="edit_penutup_surat" name="penutup_surat" rows="5"><?php echo $p_rekomendasi['penutup_surat']?></textarea>
                                  </div>
                                  
                                  <!-- Status Cetak -->
                                  <div class="form-group row">
                                    <div class="col-sm-3">
                                    <div class="form-group">
                                      <label for="formGroupExampleInput">Tanggal Surat</label>
                                    <input type="date" name="tgl_surat" class="form-control" id="edit_tgl_surat" value="<?php echo $p_rekomendasi['tgl_surat'] ?>">
                                    </div>
                                  </div>
                                    <div class="col-sm-3">
                                      <div class="form-group">
                                        <label for="formGroupExampleInput">Status Cetak Surat</label>
                                        <select id="edit_status_cetak" class="form-control" name="status_cetak">
                                          <?php if($p_rekomendasi['status_cetak'] == "Selesai"){?>
                                              <option selected value="Selesai">Selesai</option>
                                              <option value="Pending">Pending</option>
                                            <?php } else {?>
                                              <option selected value="Pending">Pending</option>
                                              <option value="Selesai">Selesai</option>
                                          <?php }?>
                                        </select>
                                      </div>
                                    </div>
                                    <div class="col-sm-3">
                                  <div class="form-group">
                                    <label for="formGroupExampleInput">Jenis Rekomendasi</label>
                                    <select id="jenis_rekomendasi" class="form-control" name="jenis_rekomendasi">
                                      <?php if($p_rekomendasi['jenis_rekomendasi'] == "Lomba"){?>
                                        <option selected value="Lomba">Lomba</option>
                                        <option value="Beasiswa KIPK">Beasiswa KIPK</option>
                                        <option value="Beasiswa Lainnya">Beasiswa Lainnya</option>
                                        <option value="Bantuan">Bantuan</option>
                                      
                                        <?php } else if($p_rekomendasi['jenis_rekomendasi'] == "Beasiswa KIPK"){?>
                                          <option selected value="Beasiswa KIPK">Beasiswa KIPK</option>
                                          <option value="Lomba">Lomba</option>
                                          <option value="Beasiswa Lainnya">Beasiswa Lainnya</option>
                                          <option value="Bantuan">Bantuan</option>

                                      <?php } else if($p_rekomendasi['jenis_rekomendasi'] == "Beasiswa Lainnya"){?>
                                          <option selected value="Beasiswa Lainnya">Beasiswa Lainnya</option>
                                          <option value="Lomba">Lomba</option>
                                          <option value="Beasiswa KIPK">Beasiswa KIPK</option>
                                          <option value="Bantuan">Bantuan</option>

                                      <?php } else if($p_rekomendasi['jenis_rekomendasi'] == "Bantuan"){?>
                                          <option selected value="Bantuan">Bantuan</option>
                                          <option value="Beasiswa KIPK">Beasiswa KIPK</option>
                                          <option value="Lomba">Lomba</option>
                                          <option value="Beasiswa Lainnya">Beasiswa Lainnya</option>
                                      
                                          <?php } else {?>
                                            <option value="Lomba">Lomba</option>
                                            <option value="Beasiswa KIPK">Beasiswa KIPK</option>
                                            <option value="Beasiswa Lainnya">Beasiswa Lainnya</option>
                                            <option value="Bantuan">Bantuan</option>
                                        <?php }?>

                                    </select>
                                  </div>
                                </div>
                                    <div class="col-sm-3">
                                      <div class="form-group">
                                        <label for="formGroupExampleInput">Yang Bertandatangan</label>
                                        <select id="edit_pejabat_ttd" class="form-control" name="pejabat_ttd">
                                          <?php if($p_rekomendasi['pejabat_ttd'] == "Kristiyono, S.Pd"){?>
                                            <option selected value="Kristiyono, S.Pd">Pak Kristiyono, S.Pd</option>
                                            <option value="Wardoyo, S.Pd., M.Pd">Pak Wardoyo, S.Pd., M.Pd</option>
                                            <option value="Inti Kurniati Sri Utami, S.Si">Bu Inti Kurniati Sri Utami, S.Si</option>
                                          <?php } else if($p_rekomendasi['pejabat_ttd'] == "Inti Kurniati Sri Utami, S.Si"){?>
                                            <option selected value="Inti Kurniati Sri Utami, S.Si">Bu Inti Kurniati Sri Utami, S.Si</option>
                                            <option value="Kristiyono, S.Pd">Pak Kristiyono, S.Pd</option>
                                            <option value="Wardoyo, S.Pd., M.Pd">Pak Wardoyo, S.Pd., M.Pd</option>
                                          <?php } else {?>
                                            <option selected value="Wardoyo, S.Pd., M.Pd">Pak Wardoyo, S.Pd., M.Pd</option>
                                            <option value="Inti Kurniati Sri Utami, S.Si">Bu Inti Kurniati Sri Utami, S.Si</option>
                                            <option value="Kristiyono, S.Pd">Pak Kristiyono, S.Pd</option>
                                          <?php }?>
                                        </select>
                                      </div>
                                    </div>
                                </div>
                                      </div>
                                    </div>
                                
                                </div>
                                    <div class="modal-footer justify-content-between">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times mr-2"></i> Batal</button>
                                    <button type="submit" name="submit" class="btn btn-success"><i class="fas fa-save mr-2"></i> Simpan Perubahan</button>
                                    </div>
                                    <input type="hidden" name="id_surat" id="id_surat" value="<?php echo $p_rekomendasi['id_surat']?>">
                                  </form>
                            </div>
                            <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                        </div>
                        <!-- /.modal -->
                                </tbody>

                                <?php } 
                                  } else {?>
                                    <?php }?>

                              </table>
                              
                            </div>
                          </div>
                    <?php } else {?>
                    <?php }?>

                    <?php if($sp_panggilan != '0'){ ?>
                    <!-- Surat Keterangan -->
                    <div class="card">
                            <div class="card-header bg-warning">Surat Panggilan Orang Tua (<?php echo $sp_panggilan?> Surat Belum Dicetak/Pending)
                              <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
                            </div>
                            <div class="card-body">
                              <table class="table table-bordered table-striped">
                                <thead>
                                  <th>No Surat</th>
                                  <th>Nama Siswa</th>
                                  <th>Kelas</th>
                                  <th width="15%">Nama Wali Kelas</th>
                                  <th width="15%">Nama Guru BK</th>
                                  <th width="10%">Waktu Kunjungan</th>
                                  <th>Tanggal Surat</th>
                                  <th>Pejabat TTD</th>
                                  <th>Creator</th>
                                  <th width="7%"></th>
                                </thead>

                                <?php 
                                $pending_panggilan = mysqli_query($db_conn,"SELECT * FROM surat_panggilan WHERE status_cetak='Pending' ");
                                if(mysqli_num_rows($pending_panggilan) > 0){
                                  while($p_panggilan = mysqli_fetch_array($pending_panggilan)){
                                    $petik = $p_panggilan['jam_kunjungan'];
                                    $jam_kunjungan = str_replace(":", ".", $petik);
                                    ?>
                                <tbody>
                                  <tr>
                                  <td>421.3/<?php echo $p_panggilan['no_surat']?></td>
                                  <td><?php echo $p_panggilan['nama_lengkap']?></td>
                                  <td><?php echo $p_panggilan['kelas']?></td>
                                  <td><?php echo $p_panggilan['nama_walikelas']?><br><strong>NIP. <?php echo $p_panggilan['nip_walikelas']?></strong></td>
                                  <td><?php echo $p_panggilan['nama_bk']?><br><strong>NIP. <?php echo $p_panggilan['nip_bk']?></strong></td>
                                  <td><?php echo tgl_indo($p_panggilan['tgl_kunjungan'])?> <br><strong>Pukul : <?php echo $jam_kunjungan?> WIB</strong></td>
                                  <td><?php echo tgl_indo($p_panggilan['tgl_surat'])?></td>
                                  <td><?php echo $p_panggilan['pejabat_ttd']?></td>
                                  <td><?php echo $p_panggilan['creator']?></td>
                                  <td>
                                    <ul class="navbar-nav ml-auto">
                                        <!-- Messages Dropdown Menu --> 
                                        <li class="nav-item dropdown">
                                            <a class="nav-link btn btn-warning" href="#" data-toggle="dropdown" ><strong><i class="fas fa-tasks"></i>  &nbspAksi</strong></a>
                                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                                            <div class="dropdown-divider"></div>
                                            <a href="../cetak_surat/cetak_panggilan.php?no_surat=<?php echo $p_panggilan['no_surat']?>" class="dropdown-item">
                                                <i class="fas fa-print mr-2"></i> Cetak Surat
                                            </a>
                                            <div class="dropdown-divider"></div>
                                            <a href="dashboard.php" type="button" class="dropdown-item btn btn-default" data-toggle="modal" data-target="#edit_panggilan<?php echo htmlspecialchars($p_panggilan['id_surat'])?>">
                                             <i class="fas fa-edit mr-2"></i> Edit Surat
                                            </a>
                                            </div>
                                        </li> 
                                    </ul>
                                </td>
                                  </tr>

                                  <div class="modal fade" id="edit_panggilan<?php echo htmlspecialchars($p_panggilan['id_surat']) ?>">
                            <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header bg-primary">
                                <h5 class="modal-title col-11">
                                  <div class="info-box">
                                    <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-edit"></i></span>
                                    <div class="info-box-content" style="color:black">
                                      <span class="info-box-text"><strong>Edit Surat Keterangan 421.3/<?php echo $p_panggilan['no_surat']?></strong> </span>
                                      <span class="info-box-number">
                                        <small><?php echo $p_panggilan['nama_lengkap']?> - <?php echo $p_panggilan['kelas']?></small>
                                      </span>
                                    </div>
                                    </div>
                                  </h5>
                                
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body bg-light">
                                <form action="edit_proses_panggilan.php" class="form-horizontal" method="post">
                                <!-- Nomor Surat -->
                                <div class="form-group">
                                    <label for="formGroupExampleInput">Nomor Surat</label>
                                    <input type="text" name="no_surat" class="form-control" id="no_surat" value="<?php echo $p_panggilan['no_surat']?>">
                                </div>
                                
                                <div class="card">
                                  <div class="card-header bg-primary">Identitas Siswa</div>
                                  <div class="card-body">
                                    <!-- Nama Lengkap -->
                                    <div class="form-group">
                                    <label for="formGroupExampleInput">Nama Lengkap</label>
                                    <input type="text" name="nama_lengkap" class="form-control" id="nama_lengkap" value="<?php echo $p_panggilan['nama_lengkap']?>">
                                    </div>

                                    <!-- Nama Orang Tua -->
                                <div class="form-group row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="formGroupExampleInput">Nama Ayah</label>
                                        <input type="text" name="nama_ayah" class="form-control" id="nama_ayah" value="<?php echo $p_panggilan['nama_ayah']?>">
                                </div>
                            </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="formGroupExampleInput">Nama Ibu</label>
                                        <input type="text" name="nama_ibu" class="form-control" id="nama_ibu" value="<?php echo $p_panggilan['nama_ibu']?>">
                                </div>
                            </div>
                            </div>
                            
                            <!-- Kelas dan TTL -->
                                <div class="form-group row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="formGroupExampleInput">Kelas</label>
                                        <input type="text" name="kelas" class="form-control" id="kelas" value="<?php echo $p_panggilan['kelas']?>">
                                </div>
                            </div>
                                <div class="col-sm-8">
                                    <div class="form-group">
                                        <label for="formGroupExampleInput">Alamat</label>
                                        <input type="text" name="alamat" class="form-control" id="alamat" value="<?php echo $p_panggilan['alamat']?>">
                                </div>
                            </div>
                            </div>
                                  </div>
                                </div>
                                    
                            
                              <div class="card">
                                <div class="card-header bg-primary">Identitas Wali Kelas</div>
                                  <div class="card-body">
                            <!-- Nama Wali Kelas -->
                            <div class="form-group">
                                    <label for="formGroupExampleInput">Nama Wali Kelas</label>
                                    <input type="text" name="nama_walikelas" class="form-control" id="nama_walikelas" value="<?php echo $p_panggilan['nama_walikelas']?>">
                                    </div>

                                    <!-- NIP Wali Kelas -->
                                <div class="form-group">
                                    <label for="formGroupExampleInput">NIP Wali Kelas</label>
                                    <input type="text" name="nip_walikelas" class="form-control" id="nip_walikelas" value="<?php echo $p_panggilan['nip_walikelas']?>">
                                </div>

                                    <!-- Pangkat dan Golongan Wali Kelas -->
                                <div class="form-group row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="formGroupExampleInput">Pangkat Wali Kelas</label>
                                        <input type="text" name="pangkat_walikelas" class="form-control" id="pangkat_walikelas" value="<?php echo $p_panggilan['pangkat_walikelas']?>">
                                </div>
                            </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="formGroupExampleInput">Golongan Wali Kelas</label>
                                        <input type="text" name="golongan_walikelas" class="form-control" id="golongan_walikelas" value="<?php echo $p_panggilan['golongan_walikelas']?>">
                                </div>
                            </div>
                            </div>
                            </div>
                            </div>

                            <div class="card">
                                  <div class="card-header bg-primary">Identitas Guru BK</div>
                                  <div class="card-body">
                            <!-- Nama Guru BK -->
                            <div class="form-group">
                                    <label for="formGroupExampleInput">Nama Guru BK</label>
                                    <input type="text" name="nama_bk" class="form-control" id="nama_bk" value="<?php echo $p_panggilan['nama_bk']?>">
                                    </div>

                                    <!-- NIP Guru BK -->
                                <div class="form-group">
                                    <label for="formGroupExampleInput">NIP Guru BK</label>
                                    <input type="text" name="nip_bk" class="form-control" id="nip_bk" value="<?php echo $p_panggilan['nip_bk']?>">
                                </div>

                                    <!-- Pangkat dan Golongan Guru BK -->
                                <div class="form-group row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="formGroupExampleInput">Pangkat Guru BK</label>
                                        <input type="text" name="pangkat_bk" class="form-control" id="pangkat_bk" value="<?php echo $p_panggilan['pangkat_bk']?>">
                                </div>
                            </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="formGroupExampleInput">Golongan Guru BK</label>
                                        <input type="text" name="golongan_bk" class="form-control" id="golongan_bk" value="<?php echo $p_panggilan['golongan_bk']?>">
                                </div>
                            </div>
                            </div>
                            </div>
                            </div>

                            <div class="card">
                                <div class="card-header bg-primary">Waktu Pertemuan</div>
                                  <div class="card-body">
                                    <!-- Tanggal dan Jam Kunjungan -->
                                <div class="form-group row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="formGroupExampleInput">Tanggal Pertemuan</label>
                                        <input type="date" name="tgl_kunjungan" class="form-control" id="tgl_kunjungan" value="<?php echo $p_panggilan['tgl_kunjungan']?>">
                                </div>
                            </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="formGroupExampleInput">Jam Pertemuan</label>
                                        <input type="text" name="jam_kunjungan" class="form-control" id="jam_kunjungan" value="<?php echo $p_panggilan['jam_kunjungan']?>">
                                </div>
                            </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="formGroupExampleInput">Tempat Pertemuan</label>
                                        <input type="text" name="tempat" class="form-control" id="tempat" value="<?php echo $p_panggilan['tempat']?>">
                                </div>
                            </div>
                            </div>
                            </div>
                            </div>

                            <div class="card">
                                  <div class="card-header bg-primary">Status Pencetakan Surat</div>
                                  <div class="card-body">
                                <!-- Status Cetak -->
                                <div class="form-group row">
                                  <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="formGroupExampleInput">Tanggal Surat</label>
                                        <input type="date" name="tgl_surat" class="form-control" id="tgl_surat" value="<?php echo $p_panggilan['tgl_surat']?>">
                                    </div>
                                    </div>
                                    <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="formGroupExampleInput">Status Cetak Surat</label>
                                        <select id="status_cetak" class="form-control" name="status_cetak">
                                        <?php if($p_panggilan['status_cetak'] == "Selesai"){?>
                                              <option selected value="Selesai">Selesai</option>
                                              <option value="Pending">Pending</option>
                                            <?php } else {?>
                                              <option selected value="Pending">Pending</option>
                                              <option value="Selesai">Selesai</option>
                                            <?php }?>
                                        </select>
                                    </div>
                                    </div>
                                    <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="formGroupExampleInput">Yang Bertandatangan</label>
                                        <select id="pejabat_ttd" class="form-control" name="pejabat_ttd">
                                        <?php if($p_panggilan['pejabat_ttd'] == "Kristiyono, S.Pd"){?>
                                            <option selected value="Kristiyono, S.Pd">Pak Kristiyono, S.Pd</option>
                                            <option value="Wardoyo, S.Pd., M.Pd">Pak Wardoyo, S.Pd., M.Pd</option>
                                            <option value="Inti Kurniati Sri Utami, S.Si">Bu Inti Kurniati Sri Utami, S.Si</option>
                                          <?php } else if($p_panggilan['pejabat_ttd'] == "Inti Kurniati Sri Utami, S.Si"){?>
                                            <option selected value="Inti Kurniati Sri Utami, S.Si">Bu Inti Kurniati Sri Utami, S.Si</option>
                                            <option value="Kristiyono, S.Pd">Pak Kristiyono, S.Pd</option>
                                            <option value="Wardoyo, S.Pd., M.Pd">Pak Wardoyo, S.Pd., M.Pd</option>
                                          <?php } else {?>
                                            <option selected value="Wardoyo, S.Pd., M.Pd">Pak Wardoyo, S.Pd., M.Pd</option>
                                            <option value="Inti Kurniati Sri Utami, S.Si">Bu Inti Kurniati Sri Utami, S.Si</option>
                                            <option value="Kristiyono, S.Pd">Pak Kristiyono, S.Pd</option>
                                          <?php }?>
                                        </select>
                                    </div>
                                    </div>
                                </div>
                                </div>
                                </div>
                                
                                </div>
                                    <div class="modal-footer justify-content-between">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times mr-2"></i> Batal</button>
                                    <button type="submit" name="submit" class="btn btn-success"><i class="fas fa-paper-plane mr-2"></i> Kirim Data</button>
                                    </div>
                                    <input type="hidden" name="id_surat" id="id_surat" value="<?php echo $p_panggilan['id_surat']?>">
                                </form>
                            </div>
                            <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                        </div>
                        <!-- /.modal -->
                                  
                                </tbody>
                                <?php
                                  }
                                } else {                                  
                                }?>

                              </table>
                            </div>
                          </div>
                    <?php } else {?>
                    <?php }?>

                </div>
                </div>
                </div>
              </div>
              
        
        <!-- /.row -->
         <?php } else { ?>
        
        <?php } ?>


        <div class="row">
          <div class="col-sm-12 col-md-12">
            
          </div>
          </div>


          <div class="row">
            <div class="col-sm-7">
              <!-- DONUT CHART -->
            <div class="card card-danger">
              <div class="card-header">
                <h3 class="card-title">Grafik Administrasi Persuratan</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <canvas id="donutChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            </div>

            <div class="col-sm-5">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-user"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Richo Maylano Yozienanda</span>
                <span class="info-box-number">
                  <?php echo $sum ?>
                  <small>Surat</small>
                </span>
              </div>
              <?php 
              $admin = mysqli_query($db_conn,"SELECT * FROM data_admin WHERE username='Richo'");
              if(mysqli_num_rows($admin) > 0){
                while($data = mysqli_fetch_array($admin)){

              if($data['status_login'] == '1'){?>
              <span class="info-box-footer mt-3 mr-3">
                <a href="#" class="btn btn-sm btn-success float-right"><i class="fas fa-check"></i> &nbspStatus Aktif</a>
            </span>
            <?php } else{ ?>
              <span class="info-box-footer mt-3 mr-3">
                <a href="#" class="btn btn-sm btn-danger float-right"><i class="fas fa-times-circle"></i> &nbspStatus NonAktif</a>
            </span>
            <?php }
            }
          } else {
            echo '';
          }?>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->

            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-user"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Gunadi</span>
                <span class="info-box-number">
                  <?php echo $sum2 ?>
                  <small>Surat</small>
                </span>
              </div>
              <?php 
              $admin = mysqli_query($db_conn,"SELECT * FROM data_admin WHERE username='Gunadi'");
              if(mysqli_num_rows($admin) > 0){
                while($data = mysqli_fetch_array($admin)){

              if($data['status_login'] == '1'){?>
              <span class="info-box-footer mt-3 mr-3">
                <a href="#" class="btn btn-sm btn-success float-right"><i class="fas fa-check"></i> &nbspStatus Aktif</a>
            </span>
            <?php } else{ ?>
              <span class="info-box-footer mt-3 mr-3">
                <a href="#" class="btn btn-sm btn-danger float-right"><i class="fas fa-times-circle"></i> &nbspStatus NonAktif</a>
            </span>
            <?php }
            }
          } else {
            echo '';
          }?>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->

            <div class="info-box">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Jumlah Peserta Didik</span>
                <span class="info-box-number">
                  <?php echo $peserta_didik ?>
                  <small>Siswa</small>
                </span>
              </div>
              <span class="info-box-footer mt-3 mr-3">
                <a href="peserta_didik.php" class="btn btn-sm btn-warning float-right"><i class="fas fa-eye"></i> Lihat Selengkapnya</a>
            </span>
            </div>
            </div>
          </div>

        <div class="row">
          <div class="col-sm-6">

          <?php $result = mysqli_query($db_conn, "SELECT COUNT(*) AS 'count' FROM surat_keterangan");
            $row = mysqli_fetch_array($result);
            $count = $row['count'];
          ?>
          <div class="info-box mb-3 bg-primary">
              <span class="info-box-icon"><i class="fas fa-info"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Surat Keterangan</span>
                <span class="info-box-number"><?= $row['count']?> Surat</span>
              </div>
            </div>

          <?php $result6 = mysqli_query($db_conn, "SELECT COUNT(*) AS 'count' FROM surgas_guru");
            $row6 = mysqli_fetch_array($result6);
            $count6 = $row6['count'];
          ?>
          <div class="info-box mb-3 bg-warning">
              <span class="info-box-icon"><i class="fas fa-truck"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Surat Tugas Guru</span>
                <span class="info-box-number"><?= $row6['count']?> Surat</span>
              </div>
            </div>

            <?php $result5 = mysqli_query($db_conn, "SELECT COUNT(*) AS 'count' FROM surat_panggilan");
              $row5 = mysqli_fetch_array($result5);
              $count5 = $row5['count'];
            ?>
            <div class="info-box mb-3 bg-success">
              <span class="info-box-icon"><i class="fas fa-phone-volume"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Surat Panggilan Orang Tua</span>
                <span class="info-box-number"><?= $row5['count']?> Surat</span>
              </div>
            </div>

            <?php $result3 = mysqli_query($db_conn, "SELECT COUNT(*) AS 'count' FROM rekomendasi");
              $row3 = mysqli_fetch_array($result3);
              $count3 = $row3['count'];
            ?>
            <div class="info-box mb-3 bg-danger">
              <span class="info-box-icon"><i class="fas fa-envelope"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Surat Rekomendasi</span>
                <span class="info-box-number"><?= $row3['count']?> Surat</span>
              </div>
            </div>

            <?php $result2 = mysqli_query($db_conn, "SELECT COUNT(*) AS 'count' FROM homevisit");
              $row2 = mysqli_fetch_array($result2);
              $count2 = $row2['count'];
            ?>
            <div class="info-box mb-3 bg-info">
              <span class="info-box-icon"><i class="far fa-comment"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Surat Kunjungan / Homevisit</span>
                <span class="info-box-number"><?= $row2['count']?> Surat</span>
              </div>
            </div>
          </div>
          <div class="col-sm-6">

          <div class="card">
            <div class="card-header border-transparent bg-dark">
                <h3 class="card-title">Informasi Aplikasi</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
                </div>
              <div class="card-body p-0">
                  <div class="card-body">
                    
                  <div class="row">
                      <div class="col-sm-6">
                      <p class="mb-0">Nama Aplikasi</p>
                      </div>
                      <div class="col-sm-6">
                      <p class="text-muted mb-0">Sistem Aplikasi Persuratan</p>
                      </div>
                  </div><hr>
                 
                  <div class="row">
                      <div class="col-sm-6">
                      <p class="mb-0">Tujuan Dibuat</p>
                      </div>
                      <div class="col-sm-6">
                      <p class="text-muted mb-0">Mempermudah dalam pembuatan administrasi persuratan di SMK Negeri 7 Surakarta</p>
                      </div>
                  </div><hr>
                    
                  <div class="row">
                      <div class="col-sm-6">
                      <p class="mb-0">Versi Aplikasi</p>
                      </div>
                      <div class="col-sm-6">
                      <p class="text-muted mb-0">2.1.2 &nbsp&nbsp&nbsp
                      <a href="riwayat.php" class="btn btn-sm btn-primary"><i class="fas fa-eye"></i>&nbsp Cek Pembaharuan</a></p>
                      </div>
                  </div><hr>
                    
                  <div class="row">
                      <div class="col-sm-6">
                      <p class="mb-0">Versi Database Aplikasi</p>
                      </div>
                      <div class="col-sm-6">
                      <p class="text-muted mb-0">5.2.1</p>
                      </div>
                  </div><hr>
                    
                  <div class="row">
                      <div class="col-sm-6">
                      <p class="mb-0">Pembuat Aplikasi</p>
                      </div>
                      <div class="col-sm-6">
                      <p class="text-muted mb-0">Richo Maylano Yozienanda</p>
                      </div>
                  </div><hr>
                    
                  <div class="row">
                      <div class="col-sm-6">
                      <p class="mb-0">Instansi</p>
                      </div>
                      <div class="col-sm-6">
                      <p class="text-muted mb-0">SMK Negeri 7 Surakarta</p>
                      </div>
                  </div><hr>
                    
                  <div class="row">
                      <div class="col-sm-6">
                      <p class="mb-0">Contact Person</p>
                      </div>
                      <div class="col-sm-6">
                      <p class="text-muted mb-0">085600242904 ( <a href="https://api.whatsapp.com/send?phone=6285600242904"><i class="fab fa-whatsapp"></i> Whatsapp</a> )</p>
                      </div>
                  </div>

                  </div>
              </div>
            </div>

          </div>
        </div>

        <div class="row">
          <div class="col-sm-6">
          <div class="card">
              <div class="card-header border-transparent bg-primary">
                <h3 class="card-title">Rekap Surat Keterangan Terbaru</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <div class="table-responsive">
                <table class="table m-0">
                    <thead>
                    <tr>
                      <th>No</th>
                      <th>No Surat</th>
                      <th>NIS</th>
                      <th>Nama Siswa</th>
                      <th>Kelas</th>
                      <th>Tanggal Surat</th>
                      <th>Pembuat</th>
                    </tr>
                    </thead>
                    <?php $no = 1;
                    $qsiswa = mysqli_query($db_conn,"SELECT * FROM surat_keterangan ORDER BY id_surat DESC LIMIT 5 ");
                    if(mysqli_num_rows($qsiswa) > 0){
                        while($data = mysqli_fetch_array($qsiswa)){?>
                   <tbody>
                    <tr>
                        <td><?php echo $no++?></td>
                        <td><?php echo $data['no_surat']?></td>
                        <td><?php echo $data['nis']?></td>
                        <td><?php echo $data['nama_lengkap']?></td>
                        <td><?php echo $data['kelas']?></td>
                        <td><?php echo indo($data['tgl_create'])?></td>
                        <td><?php echo $data['creator']?></td>
                    </tr>

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
                  </table>
                </div>
                <!-- /.table-responsive -->
              </div>
              <!-- /.card-body -->

              <div class="card-footer clearfix">
                <a href="surat_keterangan.php" class="btn btn-sm btn-danger float-left"><i class="fas fa-exclamation-triangle"></i> &nbsp<?php echo $sp_sk?> Surat Belum Dicetak</a>
                <a href="surat_keterangan.php" class="btn btn-sm btn-primary float-right"><i class="fas fa-eye"></i> Lihat Surat</a>
              </div>
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
          </div>

          <div class="col-sm-6">
          <div class="card">
              <div class="card-header border-transparent bg-warning">
                <h3 class="card-title text-white">Rekap Surat Tugas Guru Terbaru</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <div class="table-responsive">
                <table class="table m-0">
                    <thead>
                    <tr>
                      <th>No</th>
                      <th>No Surat</th>
                      <th>Jenis Surgas</th>
                      <th>Nama Guru</th>
                      <th>Tanggal Kegiatan</th>
                      <th>Tanggal Surat</th>
                      <th>Pembuat</th>
                    </tr>
                    </thead>
                    <?php $no = 1;
                    $qsiswa = mysqli_query($db_conn,"SELECT * FROM surgas_guru ORDER BY id_surat DESC LIMIT 5 ");
                    if(mysqli_num_rows($qsiswa) > 0){
                        while($data = mysqli_fetch_array($qsiswa)){?>
                   <tbody>
                    <tr>
                        <td><?php echo $no++?></td>
                        <td><?php echo $data['no_surat']?></td>
                        <td><?php echo $data['jenis_surgas']?></td>
                        <td><?php echo $data['nama_guru']?></td>
                        <td><?php echo tgl_indo($data['tgl_kegiatan'])?></td>
                        <td><?php echo tgl_indo($data['tgl_create'])?></td>
                        <td><?php echo $data['creator']?></td>
                    </tr>

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
                  </table>
                </div>
                <!-- /.table-responsive -->
              </div>
              <!-- /.card-body -->

              <div class="card-footer clearfix">
                <a href="surat_tugas_guru.php" class="btn btn-sm btn-danger float-left"><i class="fas fa-exclamation-triangle"></i> &nbsp<?php echo $sp_surgas?> Surat Belum Dicetak</a>
                <a href="surat_tugas_guru.php" class="btn btn-sm btn-warning float-right text-white"><i class="fas fa-eye"></i> Lihat Surat</a>
              </div>
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        
        
        <div class="row">
          <div class="col-sm-6">
          <div class="card">
              <div class="card-header border-transparent bg-info">
                <h3 class="card-title">Rekap Surat Kunjungan/Homevisit Terbaru</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <div class="table-responsive">
                <table class="table m-0">
                    <thead>
                    <tr>
                      <th>No</th>
                      <th>No Surat</th>
                      <th>Kelas</th>
                      <th>Nama Siswa</th>
                      <th>Tanggal Kunjungan</th>
                      <th>Tanggal Surat</th>
                      <th>Pembuat</th>
                    </tr>
                    </thead>
                    <?php $no = 1;
                    $qsiswa = mysqli_query($db_conn,"SELECT * FROM homevisit ORDER BY id_surat DESC LIMIT 5 ");
                    if(mysqli_num_rows($qsiswa) > 0){
                        while($data = mysqli_fetch_array($qsiswa)){?>
                   <tbody>
                    <tr>
                        <td><?php echo $no++?></td>
                        <td><?php echo $data['no_surat']?></td>
                        <td><?php echo $data['kelas']?></td>
                        <td><?php echo $data['nama_lengkap']?></td>
                        <td><?php echo tgl_indo($data['tgl_kunjungan'])?></td>
                        <td><?php echo tgl_indo($data['tgl_create'])?></td>
                        <td><?php echo $data['creator']?></td>
                    </tr>

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
                  </table>
                </div>
                <!-- /.table-responsive -->
              </div>
              <!-- /.card-body -->

              <div class="card-footer clearfix">
                <a href="surat_homevisit.php" class="btn btn-sm btn-danger float-left"><i class="fas fa-exclamation-triangle"></i> &nbsp<?php echo $sp_homevisit?> Surat Belum Dicetak</a>
                <a href="surat_homevisit.php" class="btn btn-sm btn-info float-right"><i class="fas fa-eye"></i> Lihat Surat</a>
              </div>
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
          </div>
          <div class="col-sm-6">
          <div class="card">
              <div class="card-header border-transparent bg-danger">
                <h3 class="card-title">Rekap Surat Rekomendasi Terbaru</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <div class="table-responsive">
                <table class="table m-0">
                    <thead>
                    <tr>
                      <th>No</th>
                      <th>No Surat</th>
                      <th>NIS</th>
                      <th>Nama Siswa</th>
                      <th>Kelas</th>
                      <th>Tanggal Surat</th>
                      <th>Pembuat</th>
                    </tr>
                    </thead>
                    <?php $no = 1;
                    $qsiswa = mysqli_query($db_conn,"SELECT * FROM rekomendasi ORDER BY id_surat DESC LIMIT 5 ");
                    if(mysqli_num_rows($qsiswa) > 0){
                        while($data = mysqli_fetch_array($qsiswa)){?>
                   <tbody>
                    <tr>
                        <td><?php echo $no++?></td>
                        <td><?php echo $data['no_surat']?></td>
                        <td><?php echo $data['nis']?></td>
                        <td><?php echo $data['nama_lengkap']?></td>
                        <td><?php echo $data['kelas']?></td>
                        <td><?php echo indo($data['tgl_create'])?></td>
                        <td><?php echo $data['creator']?></td>
                    </tr>

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
                  </table>
                </div>
                <!-- /.table-responsive -->
              </div>
              <!-- /.card-body -->

              <div class="card-footer clearfix">
                <a href="surat_rekomendasi.php" class="btn btn-sm btn-danger float-left"><i class="fas fa-exclamation-triangle"></i> &nbsp<?php echo $sp_rekomen?> Surat Belum Dicetak</a>
                <a href="surat_rekomendasi.php" class="btn btn-sm btn-danger float-right"><i class="fas fa-eye"></i> Lihat Surat</a>
              </div>
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
          </div>
          </div>
        </div>

        <div class="row">
        <div class="col-sm-12">
          <div class="card">
              <div class="card-header border-transparent bg-success">
                <h3 class="card-title">Rekap Surat Panggilan Orang Tua Terbaru</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <div class="table-responsive">
                <table class="table m-0">
                    <thead>
                    <tr>
                      <th>No</th>
                      <th>No Surat</th>
                      <th>Nama Siswa</th>
                      <th>Kelas</th>
                      <th>Nama Wali Kelas</th>
                      <th>Nama Guru BK</th>
                      <th>Tanggal Kunjungan</th>
                      <th>Tanggal Surat</th>
                      <th>Pembuat</th>
                    </tr>
                    </thead>
                    <?php $no = 1;
                    $qsiswa = mysqli_query($db_conn,"SELECT * FROM surat_panggilan ORDER BY id_surat DESC LIMIT 5 ");
                    if(mysqli_num_rows($qsiswa) > 0){
                        while($data = mysqli_fetch_array($qsiswa)){?>
                   <tbody>
                    <tr>
                        <td><?php echo $no++?></td>
                        <td>421.3/<?php echo $data['no_surat']?></td>
                        <td><?php echo $data['nama_lengkap']?></td>
                        <td><?php echo $data['kelas']?></td>
                        <td><?php echo $data['nama_walikelas']?></td>
                        <td><?php echo $data['nama_bk']?></td>
                        <td><?php echo tgl_indo($data['tgl_kunjungan'])?></td>
                        <td><?php echo tgl_indo($data['tgl_create'])?></td>
                        <td><?php echo $data['creator']?></td>
                    </tr>

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
                  </table>
                </div>
                <!-- /.table-responsive -->
              </div>
              <!-- /.card-body -->

              <div class="card-footer clearfix">
                <a href="surat_panggilan_ortu.php" class="btn btn-sm btn-danger float-left"><i class="fas fa-exclamation-triangle"></i> &nbsp<?php echo $sp_panggilan?> Surat Belum Dicetak</a>
                <a href="surat_panggilan_ortu.php" class="btn btn-sm btn-success float-right"><i class="fas fa-eye"></i> Lihat Surat</a>
              </div>
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
        </div>
        </div>

        <div class="row">
          <div class="col-sm-6">
            
          </div>
          <div class="col-sm-6">
          
        </div>

        


      </div><!--/. container-fluid -->
    </section>
    
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


<?php
include 'footer.php';
?>