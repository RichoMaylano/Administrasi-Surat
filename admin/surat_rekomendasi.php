<?php
include "../database.php";
include "../assets/indo.php";
include "../assets/tgl_indo.php";
$title = "Surat Rekomendasi Page | Aplikasi Persuratan | Versi 2.1.2";
include 'header.php';
?>

<?php $sk = mysqli_query($db_conn, "SELECT COUNT(id_surat) AS 'count' FROM rekomendasi");
$query_rekomendasi = mysqli_fetch_array($sk);
$surat_rekomendasi = $query_rekomendasi['count'];
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Surat Rekomendasi</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Administrasi Surat</li>
              <li class="breadcrumb-item active">Surat Rekomendasi</li>
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
          <div class="col-12 col-sm-12 col-md-12">
            <div class="info-box">
              <a href="surat_rekomendasi.php" class="info-box-icon bg-danger elevation-1"><i class="fas fa-envelope"></i></a>

              <div class="info-box-content">
                <span class="info-box-text">Jumlah Surat Rekomendasi</span>
                <span class="info-box-number">
                  <?php echo $surat_rekomendasi ?>
                  <small>Surat</small>
                </span>
              </div>
              <span class="info-box-icon elevation-1">
              <a class="btn btn-success" type="button" href="tambah_rekomendasi.php"><i class="fas fa-plus"></i></a>
              </span>
              <span class="info-box-icon elevation-1 ml-2">
              <a class="btn btn-warning text-white" type="button" href="tambah_ranking.php"><i class="fas fa-trophy"></i></a>
              </span>
            </div>
          </div>
        </div>
    </section>

    <section class="content">
      <div class="container-fluid">
        <?php
        if (isset($_SESSION['msg_rekomendasi']) && $_SESSION['msg_rekomendasi'] <> '') {
        echo '<div class="alert alert-success alert-dismissible">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
  <h5><i class="icon fas fa-check"></i> <strong>SUCCESS !</strong></h5>
  '.$_SESSION['msg_rekomendasi'].'
</div>';
        }
        $_SESSION['msg_rekomendasi'] = '';
    ?>
        <div class="row">
          <div class="col-12 col-sm-12 col-md-12">
            <div class="card">
            <div class="card-header border-transparent bg-danger">
                <h3 class="card-title"><i class="fas fa-envelope mr-2"></i> Surat Rekomendasi</h3>
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
                    <table id="example1" class="table table-bordered table-striped">
                            <thead class="text-center">
                                <tr>
                                    <th>No</th>
                                    <th>Nomor Surat</th>
                                    <th>NISN</th>
                                    <th>NIS</th>
                                    <th>Nama Siswa</th>
                                    <th>Kelas</th>
                                    <th>Tanggal Surat</th>
                                    <th>Tanggal Perubahan</th>
                                    <th>Jenis</th>
                                    <th>Pembuat Surat</th>
                                    <th>Status Cetak</th>
                                    <th width="7%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $today = date("2025-08-17");
                                    $qsiswa = mysqli_query($db_conn,"SELECT * FROM rekomendasi");
                                    $no = 1;
                                    if(mysqli_num_rows($qsiswa) > 0){
                                        while($data = mysqli_fetch_array($qsiswa)){
                                    $nama = strtolower($data['nama_lengkap']);
                                    $nama_siswa = ucwords($nama);
                                ?>
                                <tr>
                                <td><?php echo $no++ ?></td>
                                <?php if($data['tgl_create'] <= $today){?>
                                <td>420.3/<?php echo $data['no_surat'] ?></td>
                                <?php } else {?>
                                  <td>400.3.12.1/<?php echo $data['no_surat'] ?></td>
                                  <?php }?>
                                <td><?php echo $data['nisn'] ?></td>
                                <td><?php echo $data['nis'] ?></td>
                                <td><?php echo $nama_siswa ?></td>
                                <td><?php echo $data['kelas'] ?></td>
                                <td><?php echo indo($data['tgl_create']) ?></td>
                                <td><?php if($data['tgl_edit'] == NULL || $data['tgl_edit'] == '0000-00-00 00:00:00'){?>
                                  <i>Belum ada Perubahan</i>
                                <?php } else {?>
                                  <?php echo indo($data['tgl_edit']) ?>
                                  <?php }?>
                                </td>
                                <td><?php echo $data['jenis_rekomendasi'] ?></td>
                                <td><?php echo $data['creator'] ?></td>
                                <?php if($data['status_cetak'] == "Selesai"){ ?>
                                <td><a href="#" class="btn btn-success swalDefaultSuccess"><i class="fas fa-check"></i> Selesai</a></td>
                                <?php }else {?>
                                  <td><a href="#" class="btn btn-danger swalDefaultError"><i class="fas fa-exclamation-triangle"></i> Pending</a></td>
                                  <?php }?>
                                <td>
                                    <ul class="navbar-nav ml-auto">
                                        <!-- Messages Dropdown Menu --> 
                                        <li class="nav-item dropdown">
                                            <a class="nav-link btn btn-warning" href="#" data-toggle="dropdown" ><strong>&nbsp <i class="fas fa-tasks"></i>  &nbspAksi</strong>&nbsp </a>
                                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                                            <div class="dropdown-divider"></div>
                                            <?php if($data['jenis_rekomendasi'] == 'Beasiswa KIPK'){?>
                                              <a href="../cetak_surat/cetak_Ranking.php?no_surat=<?php echo $data['no_surat']?>" class="dropdown-item">
                                                  <i class="fas fa-print mr-2"></i> Cetak Surat
                                              </a>
                                              <?php } else {?>
                                            <a href="../cetak_surat/cetak_Rekomendasi.php?no_surat=<?php echo $data['no_surat']?>" class="dropdown-item">
                                                <i class="fas fa-print mr-2"></i> Cetak Surat
                                            </a>
                                            <?php }?>
                                            <div class="dropdown-divider"></div>
                                            <a href="dashboard.php" type="button" class="dropdown-item btn btn-default" data-toggle="modal" data-target="#edit_rekomen<?php echo htmlspecialchars($data['id_surat'])?>">
                                             <i class="fas fa-edit mr-2"></i> Edit Surat
                                            </a>
                                            <div class="dropdown-divider"></div>
                                            <a href="#" data-toggle="modal" data-target="#delete_rekomen<?php echo htmlspecialchars($data['id_surat'])?>" class="dropdown-item bg-danger"><i class="fas fa-trash-alt mr-2"></i> Hapus Surat</a>
                                            </div>
                                        </li> 
                                    </ul>
                                </td>
                                </tr>

                        <div class="modal fade" id="edit_rekomen<?php echo htmlspecialchars($data['id_surat']) ?>">
                            <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header bg-primary">
                                <h5 class="modal-title col-11">
                                  <div class="info-box">
                                    <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-edit"></i></span>
                                    <div class="info-box-content" style="color:black">
                                      <span class="info-box-text"><strong>Edit Surat Rekomendasi 400.3.12.1/<?php echo $data['no_surat']?></strong> </span>
                                      <span class="info-box-number">
                                        <small><?php echo $data['nama_lengkap']?> - <?php echo $data['kelas']?></small>
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
                                    <input type="text" name="no_surat" class="form-control" id="no_surat" value="<?php echo $data['no_surat'] ?>">
                                  </div>
                                
                                  <div class="card">
                                    <div class="card-header bg-primary">Identitas Siswa</div>
                                    <div class="card-body">
                                      
                                    <!-- Nama Lengkap -->
                                    <div class="form-group">
                                      <label for="formGroupExampleInput">Nama Lengkap</label>
                                      <input type="text" name="nama_lengkap" class="form-control" id="edit_nis"  value="<?php echo $data['nama_lengkap'] ?>">
                                    </div>

                                <!-- NIS dan NISN -->
                                <div class="form-group row">
                                  <div class="col-sm-6">
                                      <div class="form-group">
                                        <label for="formGroupExampleInput">NIS (Nomor Induk Sekolah)</label>
                                        <input type="text" name="nis" class="form-control" id="edit_nis"  value="<?php echo $data['nis'] ?>">
                                  </div>
                              </div>
                                <div class="col-sm-6">
                                      <div class="form-group">
                                        <label for="formGroupExampleInput">NISN (Nomor Induk Sekolah Nasional)</label>
                                        <input type="text" name="nisn" class="form-control" id="edit_nisn"  value="<?php echo $data['nisn'] ?>">
                                  </div>
                              </div>
                            </div>
                              
                            <!-- Kelas dan TTL -->
                                <div class="form-group row">
                                  <div class="col-sm-6">
                                      <div class="form-group">
                                        <label for="formGroupExampleInput">Kelas</label>
                                        <input type="text" name="kelas" class="form-control" id="edit_kelas" value="<?php echo $data['kelas'] ?>">
                                        <div id="emailHelp" class="form-text text-dark"><small>Contoh : XII KUL 1</small></div>
                                  </div>
                              </div>
                                <div class="col-sm-6">
                                      <div class="form-group">
                                        <label for="formGroupExampleInput">Tempat, Tanggal Lahir</label>
                                        <input type="text" name="ttl" class="form-control" id="edit_tempat_lahir"  value="<?php echo $data['ttl'] ?>">
                                        <div id="emailHelp" class="form-text text-dark"><small>Contoh : Surakarta, 13 September 2007</small></div>
                                  </div>
                              </div>
                            </div>
                              
                                <!-- Nama Orang Tua -->
                                <div class="form-group">
                                        <label for="formGroupExampleInput">Nama Orang Tua</label>
                                        <input type="text" name="nama_ortu" class="form-control" id="edit_nama_ortu"  value="<?php echo $data['nama_ortu'] ?>">
                                  </div>
                                
                                  <!-- Alamat Tempat Tinggal -->
                                <div class="form-group">
                                        <label for="formGroupExampleInput">Alamat</label>
                                        <input type="text" name="alamat" class="form-control" id="alamat"  value="<?php echo $data['alamat'] ?>">
                                  </div>
                                    </div>
                                  </div>

                                  <?php if($data['jenis_rekomendasi'] == 'Beasiswa KIPK'){?>
                                    <div class="card">
                                      <div class="card-header bg-primary">Ranking Semester 1-6</div>
                                      <div class="card-body">
                                        
                                      <div class="row mb-4">
                                          <div class="col">
                                            <h5>Semester 1</h5><hr>
                                              <label for="formGroupExampleInput">Rank Semester 1</label>
                                              <input type="number" min="0" max="50" name="rank_smt1" class="form-control" id="rank_smt1"  value="<?php echo $data['rank_smt1'] ?>">
                                              <label for="formGroupExampleInput">Jumlah Siswa Semester 1</label>
                                              <input type="number" min="0" max="50" name="jumlah_smt1" class="form-control" id="jumlah_smt1"  value="<?php echo $data['jumlah_smt1'] ?>">
                                        </div>
                                        <div class="col">
                                            <h5>Semester 2</h5><hr>
                                              <label for="formGroupExampleInput">Rank Semester 2</label>
                                              <input type="number" min="0" max="50" name="rank_smt2" class="form-control" id="rank_smt2"  value="<?php echo $data['rank_smt2'] ?>">
                                              <label for="formGroupExampleInput">Jumlah Siswa Semester 2</label>
                                              <input type="number" min="0" max="50" name="jumlah_smt2" class="form-control" id="jumlah_smt2"  value="<?php echo $data['jumlah_smt2'] ?>">
                                          </div>
                                          <div class="col">
                                            <h5>Semester 3</h5><hr>
                                              <label for="formGroupExampleInput">Rank Semester 3</label>
                                              <input type="number" min="0" max="50" name="rank_smt3" class="form-control" id="rank_smt3"  value="<?php echo $data['rank_smt3'] ?>">
                                              <label for="formGroupExampleInput">Jumlah Siswa Semester 3</label>
                                              <input type="number" min="0" max="50" name="jumlah_smt3" class="form-control" id="jumlah_smt3"  value="<?php echo $data['jumlah_smt3'] ?>">
                                          </div>
                                        </div>

                                        <div class="row mb-4">
                                          <div class="col">
                                            <h5>Semester 4</h5><hr>
                                              <label for="formGroupExampleInput">Rank Semester 4</label>
                                              <input type="number" min="0" max="50" name="rank_smt4" class="form-control" id="rank_smt4"  value="<?php echo $data['rank_smt4'] ?>">
                                              <label for="formGroupExampleInput">Jumlah Siswa Semester 4</label>
                                              <input type="number" min="0" max="50" name="jumlah_smt4" class="form-control" id="jumlah_smt4"  value="<?php echo $data['jumlah_smt4'] ?>">
                                        </div>
                                        <div class="col">
                                            <h5>Semester 5</h5><hr>
                                              <label for="formGroupExampleInput">Rank Semester 5</label>
                                              <input type="number" min="0" max="50" name="rank_smt5" class="form-control" id="rank_smt5"  value="<?php echo $data['rank_smt5'] ?>">
                                              <label for="formGroupExampleInput">Jumlah Siswa Semester 5</label>
                                              <input type="number" min="0" max="50" name="jumlah_smt5" class="form-control" id="jumlah_smt5"  value="<?php echo $data['jumlah_smt5'] ?>">
                                          </div>
                                          <div class="col">
                                            <h5>Semester 6</h5><hr>
                                              <label for="formGroupExampleInput">Rank Semester 6</label>
                                              <input type="number" min="0" max="50" name="rank_smt6" class="form-control" id="rank_smt6"  value="<?php echo $data['rank_smt6'] ?>">
                                              <label for="formGroupExampleInput">Jumlah Siswa Semester 6</label>
                                              <input type="number" min="0" max="50" name="jumlah_smt6" class="form-control" id="jumlah_smt6"  value="<?php echo $data['jumlah_smt6'] ?>">
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
                                        <textarea class="form-control" id="edit_deskripsi" name="deskripsi" rows="5"><?php echo $data['deskripsi']?></textarea>
                                  </div>
                                
                            <!-- Penutup Surat -->
                                  <div class="form-group">
                                        <label for="formGroupExampleInput">Penutup Surat</label>
                                        <textarea class="form-control" id="edit_penutup_surat" name="penutup_surat" rows="5"><?php echo $data['penutup_surat']?></textarea>
                                  </div>
                                  
                                  <!-- Status Cetak -->
                                  <div class="form-group row">
                                    <div class="col-sm-3">
                                    <div class="form-group">
                                      <label for="formGroupExampleInput">Tanggal Surat</label>
                                    <input type="date" name="tgl_surat" class="form-control" id="edit_tgl_surat" value="<?php echo $data['tgl_surat'] ?>">
                                    </div>
                                  </div>
                                    <div class="col-sm-3">
                                      <div class="form-group">
                                        <label for="formGroupExampleInput">Status Cetak Surat</label>
                                        <select id="edit_status_cetak" class="form-control" name="status_cetak">
                                          <?php if($data['status_cetak'] == "Selesai"){?>
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
                                      <?php if($data['jenis_rekomendasi'] == "Lomba"){?>
                                        <option selected value="Lomba">Lomba</option>
                                        <option value="Beasiswa KIPK">Beasiswa KIPK</option>
                                        <option value="Beasiswa Lainnya">Beasiswa Lainnya</option>
                                        <option value="Bantuan">Bantuan</option>
                                      
                                        <?php } else if($data['jenis_rekomendasi'] == "Beasiswa KIPK"){?>
                                          <option selected value="Beasiswa KIPK">Beasiswa KIPK</option>
                                          <option value="Lomba">Lomba</option>
                                          <option value="Beasiswa Lainnya">Beasiswa Lainnya</option>
                                          <option value="Bantuan">Bantuan</option>

                                      <?php } else if($data['jenis_rekomendasi'] == "Beasiswa Lainnya"){?>
                                          <option selected value="Beasiswa Lainnya">Beasiswa Lainnya</option>
                                          <option value="Lomba">Lomba</option>
                                          <option value="Beasiswa KIPK">Beasiswa KIPK</option>
                                          <option value="Bantuan">Bantuan</option>

                                      <?php } else if($data['jenis_rekomendasi'] == "Bantuan"){?>
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
                                          <?php if($data['pejabat_ttd'] == "Kristiyono, S.Pd"){?>
                                            <option selected value="Kristiyono, S.Pd">Pak Kristiyono, S.Pd</option>
                                            <option value="Wardoyo, S.Pd., M.Pd">Pak Wardoyo, S.Pd., M.Pd</option>
                                            <option value="Inti Kurniati Sri Utami, S.Si">Bu Inti Kurniati Sri Utami, S.Si</option>
                                          <?php } else if($data['pejabat_ttd'] == "Inti Kurniati Sri Utami, S.Si"){?>
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
                                    <input type="hidden" name="id_surat" id="id_surat" value="<?php echo $data['id_surat']?>">
                                  </form>
                            </div>
                            <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                        </div>
                        <!-- /.modal -->

                        <!-- Modal Delete Data-->
                        <div class="modal fade" id="delete_rekomen<?php echo htmlspecialchars($data['id_surat']) ?>">
                            <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header bg-danger text-white">
                                <h5 class="modal-title col-11">
                                  <div class="info-box">
                                    <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-trash"></i></span>
                                    <div class="info-box-content" style="color:black">
                                      <span class="info-box-text"><strong>Hapus Surat Rekomendasi 420.2/<?php echo $data['no_surat']?></strong> </span>
                                      <span class="info-box-number">
                                        <small><?php echo $data['nama_lengkap']?> - <?php echo $data['kelas']?></small>
                                      </span>
                                    </div>
                                    </div>
                                  </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body">
                                <div class="row">
                                  <div class="col-sm-3">
                                    <strong>Nama</strong>
                                  </div>
                                  <div class="col-sm-8"> :
                                  <?php echo $data['nama_lengkap']?>
                                  </div>
                                </div>  
                                <div class="row">
                                  <div class="col-sm-3">
                                    <strong>NIS / NISN</strong>
                                  </div>
                                  <div class="col-sm-8"> :
                                  <?php echo $data['nis']?> / <?php echo $data['nisn']?>
                                  </div>
                                </div>  
                                <div class="row">
                                  <div class="col-sm-3">
                                    <strong>Kelas</strong>
                                  </div>
                                  <div class="col-sm-8"> :
                                  <?php echo $data['kelas']?>
                                  </div>
                                </div>  
                                <div class="row">
                                  <div class="col-sm-3">
                                    <strong>Tempat, Tanggal Lahir</strong>
                                  </div>
                                  <div class="col-sm-8"> :
                                  <?php echo $data['ttl']?>
                                  </div>
                                </div>  
                                <div class="row">
                                  <div class="col-sm-3">
                                    <strong>Nama Orang Tua</strong>
                                  </div>
                                  <div class="col-sm-8"> :
                                  <?php echo $data['nama_ortu']?>
                                  </div>
                                </div>  
                                <div class="row">
                                  <div class="col-sm-3">
                                    <strong>Isi Surat</strong>
                                  </div>
                                  <div class="col-sm-8"> :
                                  <?php echo $data['deskripsi']?>
                                  </div>
                                </div>  
                                <hr><h5>Yakin ingin menghapus <strong>Surat Rekomendasi Nomor 420.2/<?php echo $data['no_surat']?></strong> ?</h5>
                                
                                </div>
                                <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times mr-2"></i> Batal</button>
                                <a href="delete_proses_rekomendasi.php?id_surat=<?php echo $data['id_surat']?>" type="submit" name="submit" class="btn btn-danger"><i class="fas fa-trash mr-2"></i> Hapus Data</a>
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
                                        <td colspan="10"><em>Belum ada data! Segera lakukan upload data.</em></td>
                                        </tr>';
                                    }
			                    ?>
                            </tbody>
                            <tfoot class="text-center">
                                <tr>
                                    <th>No</th>
                                    <th>Nomor Surat</th>
                                    <th>NISN</th>
                                    <th>NIS</th>
                                    <th>Nama Siswa</th>
                                    <th>Kelas</th>
                                    <th>Tanggal Surat</th>
                                    <th>Tanggal Perubahan</th>
                                    <th>Jenis</th>
                                    <th>Pembuat Surat</th>
                                    <th>Status Cetak</th>
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