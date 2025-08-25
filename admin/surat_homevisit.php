<?php
include "../database.php";
include "../assets/indo.php";
include "../assets/tgl_indo.php";
$title = "Surat Kunjungan Rumah Page | Aplikasi Persuratan | Versi 2.1.2";
include 'header.php';
?>

<?php $sk = mysqli_query($db_conn, "SELECT COUNT(id_surat) AS 'count' FROM homevisit");
$query_homevisit = mysqli_fetch_array($sk);
$surat_homevisit = $query_homevisit['count'];
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Surat Kunjungan Rumah</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Administrasi Surat</li>
              <li class="breadcrumb-item active">Surat Kunjungan Rumah</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

 <section class="content">
      <div class="container-fluid">

      <?php
        if (isset($_SESSION['msg_homevisit']) && $_SESSION['msg_homevisit'] <> '') {
        echo '<div class="alert alert-success alert-dismissible">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
  <h5><i class="icon fas fa-check"></i> <strong>SUCCESS !</strong></h5>
  '.$_SESSION['msg_homevisit'].'
</div>';
        }
        $_SESSION['msg_homevisit'] = '';
    ?>

        <!-- Info boxes -->
        <div class="row">
          <div class="col-12 col-sm-12 col-md-12">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-envelope"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Jumlah Surat Kunjungan Rumah</span>
                <span class="info-box-number">
                  <?php echo $surat_homevisit ?>
                  <small>Surat</small>
                </span>
              </div>
              <span class="info-box-icon elevation-1">
              <a class="btn btn-success" type="button" data-toggle="modal" data-target="#add_panggilan"><i class="fas fa-plus"></i></a>
              </span>
            </div>
          </div>
        </div>
    </section>

    <div class="modal fade" id="add_panggilan">
        <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-success">
              
            <h5 class="modal-title col-11">
                     <div class="info-box">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-envelope"></i></span>
              <div class="info-box-content" style="color:black">
                <span class="info-box-text"><strong>Tambah Surat Kunjungan Rumah</strong> </span>
                <span class="info-box-number">
                  <small>Silahkan mengisi data yang diperlukan untuk Surat Panggilan Orang Tua</small>
                </span>
              </div>
              </div>
              <div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button><h6><strong>Peringatan !</strong><br>Jangan lupa tetap mencatat nomor surat melalui excel di menu Surat Keluar<br>
            Tambahkan data yang diperlukan surat Panggilan Orang Tua melalui tombol <strong>Tambah Data</strong></h6></div>
            </h5>

            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body bg-light">
            
        <form action="add_proses_homevisit.php" class="form-horizontal" method="post">
          <!-- Nomor Surat -->
        <div class="form-group">
            <label for="formGroupExampleInput">1. Nomor Surat</label>
            <input type="text" name="no_surat" class="form-control" id="no_surat" placeholder="Masukkan Nomor Surat" required autofocus>
          </div>
        
            <!-- Nama Lengkap -->
            <div class="form-group">
              <label for="formGroupExampleInput">2. Nama Lengkap</label>
                <select id="nama_lengkap" class="form-control add_sk" style="width: 100%;" name="nama_lengkap">
                  <option disabled selected>--- Pilih Nama Lengkap ---</option>
                      <?php 
                        $s = mysqli_query($db_conn,"select * from data_siswa");
                          while($d = mysqli_fetch_array($s)){?>
                  <option value="<?php echo $d['nama_lengkap'] ?>"><?php echo $d['nama_lengkap'] ?> - <?php echo $d['jurusan'] ?> - <?php echo $d['nis'] ?></option>
                  <?php }?>				
                </select>
            </div>

             <!-- Nama Orang Tua -->
        <div class="form-group row">
          <div class="col-sm-6">
              <div class="form-group">
                <label for="formGroupExampleInput">3. Nama Ayah</label>
                <input type="text" name="nama_ayah" class="form-control" id="nama_ayah" placeholder="Masukkan Nama Ayah" readonly>
          </div>
      </div>
	      <div class="col-sm-6">
              <div class="form-group">
                <label for="formGroupExampleInput">4. Nama Ibu</label>
                <input type="text" name="nama_ibu" class="form-control" id="nama_ibu" placeholder="Masukkan Nama Ibu" readonly>
          </div>
      </div>
    </div>
       
    <!-- Kelas dan TTL -->
        <div class="form-group row">
          <div class="col-sm-4">
              <div class="form-group">
                <label for="formGroupExampleInput">5. Kelas</label>
                <input type="text" name="kelas" class="form-control" id="kelas" placeholder="Masukkan Kelas" readonly>
          </div>
      </div>
	      <div class="col-sm-8">
              <div class="form-group">
                <label for="formGroupExampleInput">6. Alamat</label>
                <input type="text" name="alamat" class="form-control" id="alamat" placeholder="Masukkan Alamat Tempat Tinggal" required autofocus>
          </div>
      </div>
    </div>
       
       <!-- Nama Wali Kelas -->
       <div class="form-group">
              <label for="formGroupExampleInput">7. Nama Wali Kelas</label>
                <select id="nama_walikelas" class="form-control add_sk" style="width: 100%;" name="nama_walikelas">
                  <option disabled selected>--- Pilih Wali Kelas ---</option>
                      <?php 
                        $s1 = mysqli_query($db_conn,"select * from data_guru");
                          while($d1 = mysqli_fetch_array($s1)){?>
                  <option value="<?php echo $d1['nama_guru'] ?>"><?php echo $d1['nama_guru'] ?> - <?php echo $d1['nip_guru'] ?></option>
                  <?php }?>				
                </select>
            </div>

            <!-- NIP Wali Kelas -->
        <div class="form-group">
            <label for="formGroupExampleInput">8. NIP Wali Kelas</label>
            <input type="text" name="nip_walikelas" class="form-control" id="nip_walikelas" placeholder="Masukkan NIP Wali Kelas" readonly>
          </div>

            <!-- Pangkat dan Golongan Wali Kelas -->
        <div class="form-group row">
          <div class="col-sm-6">
              <div class="form-group">
                <label for="formGroupExampleInput">9. Pangkat Wali Kelas</label>
                <input type="text" name="pangkat_walikelas" class="form-control" id="pangkat_walikelas" placeholder="Masukkan Pangkat Wali Kelas" readonly>
          </div>
      </div>
	      <div class="col-sm-6">
              <div class="form-group">
                <label for="formGroupExampleInput">10. Golongan Wali Kelas</label>
                <input type="text" name="golongan_walikelas" class="form-control" id="golongan_walikelas" placeholder="Masukkan Golongan Wali Kelas" readonly>
          </div>
      </div>
    </div>

    <!-- Nama Guru BK -->
    <div class="form-group">
              <label for="formGroupExampleInput">11. Nama Guru BK</label>
                <select id="nama_bk" class="form-control add_sk" style="width: 100%;" name="nama_bk">
                  <option disabled selected>--- Pilih Guru BK ---</option>
                      <?php 
                        $s2 = mysqli_query($db_conn,"select * from data_guru");
                          while($d2 = mysqli_fetch_array($s2)){?>
                  <option value="<?php echo $d2['nama_guru'] ?>"><?php echo $d2['nama_guru'] ?> - <?php echo $d2['nip_guru'] ?></option>
                  <?php }?>				
                </select>
            </div>

            <!-- NIP Guru BK -->
        <div class="form-group">
            <label for="formGroupExampleInput">12. NIP Guru BK</label>
            <input type="text" name="nip_bk" class="form-control" id="nip_bk" placeholder="Masukkan NIP Guru BK" readonly>
          </div>

            <!-- Pangkat dan Golongan Guru BK -->
        <div class="form-group row">
          <div class="col-sm-6">
              <div class="form-group">
                <label for="formGroupExampleInput">13. Pangkat Guru BK</label>
                <input type="text" name="pangkat_bk" class="form-control" id="pangkat_bk" placeholder="Masukkan Pangkat Guru BK" readonly>
          </div>
      </div>
	      <div class="col-sm-6">
              <div class="form-group">
                <label for="formGroupExampleInput">14. Golongan Guru BK</label>
                <input type="text" name="golongan_bk" class="form-control" id="golongan_bk" placeholder="Masukkan Golongan Guru BK" readonly>
          </div>
      </div>
    </div>

            <!-- Tanggal dan Jam Kunjungan -->
        <div class="form-group row">
          <div class="col-sm-6">
              <div class="form-group">
                <label for="formGroupExampleInput">15. Tanggal Pertemuan</label>
                <input type="date" name="tgl_kunjungan" class="form-control" id="tgl_kunjungan" placeholder="Masukkan Tanggal Pertemuan" required autofocus>
          </div>
      </div>
	      <div class="col-sm-6">
              <div class="form-group">
                <label for="formGroupExampleInput">16. Jam Pertemuan</label>
                <input type="text" name="jam_kunjungan" class="form-control" id="jam_kunjungan" placeholder="Masukkan Jam Pertemuan" required autofocus>
          </div>
      </div>
    </div>

          <!-- Status Cetak -->
          <div class="form-group row">
            <div class="col-sm-6">
              <div class="form-group">
                <label for="formGroupExampleInput">17. Status Cetak Surat</label>
                <select id="status_cetak" class="form-control" name="status_cetak">
                  <option value="Selesai">Selesai</option>
                  <option value="Pending">Pending</option>
                </select>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label for="formGroupExampleInput">18. Yang Bertandatangan</label>
                <select id="pejabat_ttd" class="form-control" name="pejabat_ttd">
                  <option value="Wardoyo, S.Pd., M.Pd">Pak Wardoyo, S.Pd., M.Pd</option>
                  <option value="Inti Kurniati Sri Utami, S.Si">Bu Inti Kurniati Sri Utami, S.Si</option>
                </select>
              </div>
            </div>
        </div>
          
        </div>
            <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times mr-2"></i> Batal</button>
            <button type="submit" name="submit" class="btn btn-success"><i class="fas fa-paper-plane mr-2"></i> Kirim Data</button>
            </div>
          </form>
        </div>
        <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12 col-sm-12 col-md-12">
            <div class="card">
            <div class="card-header border-transparent bg-info">
                <h3 class="card-title"><i class="fas fa-envelope mr-2"></i> Surat Kunjungan Rumah</h3>
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
                                    <th>Nama Siswa</th>
                                    <th>Wali Kelas</th>
                                    <th>Guru BP/BK</th>
                                    <th>Tanggal</th>
                                    <th>Pembuat Surat</th>
                                    <th>Status Cetak</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $qsiswa = mysqli_query($db_conn,"SELECT * FROM homevisit");
                                    $no = 1;
                                    if(mysqli_num_rows($qsiswa) > 0){
                                        while($data = mysqli_fetch_array($qsiswa)){
                                    $nama = strtolower($data['nama_lengkap']);
                                    $nama_siswa = ucwords($nama);
                                ?>
                                <tr>
                                <td><?php echo $no++ ?></td>
                                <td>094/<?php echo $data['no_surat'] ?></td>
                                <td><?php echo $nama_siswa?></td>
                                <td><?php echo $data['nama_walikelas'] ?></td>
                                <td><?php echo $data['nama_bk'] ?></td>
                                <td><?php echo tgl_indo($data['tgl_create']) ?></td>
                                <td><?php echo $data['creator'] ?></td>
                                <?php if($data['status_cetak'] == "Selesai"){ ?>
                                <td><a href="#" class="btn btn-success swalDefaultSuccess"><i class="fas fa-check"></i> Selesai</a></td>
                                <?php }else {?>
                                  <td><a href="#" class="btn btn-danger swalDefaultError" ><i class="fas fa-exclamation-triangle"></i> Pending</a></td>
                                  <?php }?>
                                <td>
                                    <ul class="navbar-nav ml-auto">
                                        <!-- Messages Dropdown Menu --> 
                                        <li class="nav-item dropdown">
                                            <a class="nav-link btn btn-warning" href="#" data-toggle="dropdown" ><strong><i class="fas fa-tasks"></i>  &nbspAksi</strong></a>
                                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                                            <div class="dropdown-divider"></div>
                                            <a href="../cetak_surat/cetak_homevisit.php?no_surat=<?php echo $data['no_surat']?>" class="dropdown-item">
                                                <i class="fas fa-print mr-2"></i> Cetak Surat
                                            </a>
                                            <div class="dropdown-divider"></div>
                                            <a href="dashboard.php" type="button" class="dropdown-item btn btn-default" data-toggle="modal" data-target="#edit_homevisit<?php echo htmlspecialchars($data['id_surat'])?>">
                                             <i class="fas fa-edit mr-2"></i> Edit Surat
                                            </a>
                                            <div class="dropdown-divider"></div>
                                            <a href="#" data-toggle="modal" data-target="#delete_homevisit<?php echo htmlspecialchars($data['id_surat'])?>" class="dropdown-item bg-danger"><i class="fas fa-trash-alt mr-2"></i> Hapus Surat</a>
                                            </div>
                                        </li> 
                                    </ul>
                                </td>
                                </tr>

                        <div class="modal fade" id="edit_homevisit<?php echo htmlspecialchars($data['id_surat']) ?>">
                            <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header bg-primary">
                                <h5 class="modal-title col-11">
                                  <div class="info-box">
                                    <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-edit"></i></span>
                                    <div class="info-box-content" style="color:black">
                                      <span class="info-box-text"><strong>Edit Surat Kunjungan Rumah 094/<?php echo $data['no_surat']?></strong> </span>
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
                                <form action="edit_proses_homevisit.php" class="form-horizontal" method="post">
                                <!-- Nomor Surat -->
                                <div class="form-group">
                                    <label for="formGroupExampleInput">1. Nomor Surat</label>
                                    <input type="text" name="no_surat" class="form-control" id="no_surat" value="<?php echo $data['no_surat']?>">
                                </div>
                                
                                    <!-- Nama Lengkap -->
                                    <div class="form-group">
                                    <label for="formGroupExampleInput">2. Nama Lengkap</label>
                                    <input type="text" name="nama_lengkap" class="form-control" id="nama_lengkap" value="<?php echo $data['nama_lengkap']?>">
                                    </div>

                                    <!-- Nama Orang Tua -->
                                <div class="form-group row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="formGroupExampleInput">3. Nama Ayah</label>
                                        <input type="text" name="nama_ayah" class="form-control" id="nama_ayah" value="<?php echo $data['nama_ayah']?>">
                                </div>
                            </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="formGroupExampleInput">4. Nama Ibu</label>
                                        <input type="text" name="nama_ibu" class="form-control" id="nama_ibu" value="<?php echo $data['nama_ibu']?>">
                                </div>
                            </div>
                            </div>
                            
                            <!-- Kelas dan TTL -->
                                <div class="form-group row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="formGroupExampleInput">5. Kelas</label>
                                        <input type="text" name="kelas" class="form-control" id="kelas" value="<?php echo $data['kelas']?>">
                                </div>
                            </div>
                                <div class="col-sm-8">
                                    <div class="form-group">
                                        <label for="formGroupExampleInput">6. Alamat</label>
                                        <input type="text" name="alamat" class="form-control" id="alamat" value="<?php echo $data['alamat']?>">
                                </div>
                            </div>
                            </div>
                            
                            <!-- Nama Wali Kelas -->
                            <div class="form-group">
                                    <label for="formGroupExampleInput">7. Nama Wali Kelas</label>
                                    <input type="text" name="nama_walikelas" class="form-control" id="nama_walikelas" value="<?php echo $data['nama_walikelas']?>">
                                    </div>

                                    <!-- NIP Wali Kelas -->
                                <div class="form-group">
                                    <label for="formGroupExampleInput">8. NIP Wali Kelas</label>
                                    <input type="text" name="nip_walikelas" class="form-control" id="nip_walikelas" value="<?php echo $data['nip_walikelas']?>">
                                </div>

                                    <!-- Pangkat dan Golongan Wali Kelas -->
                                <div class="form-group row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="formGroupExampleInput">9. Pangkat Wali Kelas</label>
                                        <input type="text" name="pangkat_walikelas" class="form-control" id="pangkat_walikelas" value="<?php echo $data['pangkat_walikelas']?>">
                                </div>
                            </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="formGroupExampleInput">10. Golongan Wali Kelas</label>
                                        <input type="text" name="golongan_walikelas" class="form-control" id="golongan_walikelas" value="<?php echo $data['golongan_walikelas']?>">
                                </div>
                            </div>
                            </div>

                            <!-- Nama Guru BK -->
                            <div class="form-group">
                                    <label for="formGroupExampleInput">11. Nama Guru BK</label>
                                    <input type="text" name="nama_bk" class="form-control" id="nama_bk" value="<?php echo $data['nama_bk']?>">
                                    </div>

                                    <!-- NIP Guru BK -->
                                <div class="form-group">
                                    <label for="formGroupExampleInput">12. NIP Guru BK</label>
                                    <input type="text" name="nip_bk" class="form-control" id="nip_bk" value="<?php echo $data['nip_bk']?>">
                                </div>

                                    <!-- Pangkat dan Golongan Guru BK -->
                                <div class="form-group row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="formGroupExampleInput">13. Pangkat Guru BK</label>
                                        <input type="text" name="pangkat_bk" class="form-control" id="pangkat_bk" value="<?php echo $data['pangkat_bk']?>">
                                </div>
                            </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="formGroupExampleInput">14. Golongan Guru BK</label>
                                        <input type="text" name="golongan_bk" class="form-control" id="golongan_bk" value="<?php echo $data['golongan_bk']?>">
                                </div>
                            </div>
                            </div>

                                    <!-- Tanggal dan Jam Kunjungan -->
                                <div class="form-group row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="formGroupExampleInput">15. Tanggal Pertemuan</label>
                                        <input type="date" name="tgl_kunjungan" class="form-control" id="tgl_kunjungan" value="<?php echo $data['tgl_kunjungan']?>">
                                </div>
                            </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="formGroupExampleInput">16. Jam Pertemuan</label>
                                        <input type="text" name="jam_kunjungan" class="form-control" id="jam_kunjungan" value="<?php echo $data['jam_kunjungan']?>">
                                </div>
                            </div>
                            </div>

                                <!-- Status Cetak -->
                                <div class="form-group row">
                                    <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="formGroupExampleInput">17. Status Cetak Surat</label>
                                        <select id="status_cetak" class="form-control" name="status_cetak">
                                        <option value="Selesai">Selesai</option>
                                        <option value="Pending">Pending</option>
                                        </select>
                                    </div>
                                    </div>
                                    <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="formGroupExampleInput">18. Yang Bertandatangan</label>
                                        <select id="pejabat_ttd" class="form-control" name="pejabat_ttd">
                                        <option value="Wardoyo, S.Pd., M.Pd">Pak Wardoyo, S.Pd., M.Pd</option>
                                        <option value="Inti Kurniati Sri Utami, S.Si">Bu Inti Kurniati Sri Utami, S.Si</option>
                                        </select>
                                    </div>
                                    </div>
                                </div>
                                
                                </div>
                                    <div class="modal-footer justify-content-between">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times mr-2"></i> Batal</button>
                                    <button type="submit" name="submit" class="btn btn-success"><i class="fas fa-paper-plane mr-2"></i> Kirim Data</button>
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
                        <div class="modal fade" id="delete_homevisit<?php echo htmlspecialchars($data['id_surat']) ?>">
                            <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header bg-danger text-white">
                                <h5 class="modal-title col-11">
                                  <div class="info-box">
                                    <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-trash"></i></span>
                                    <div class="info-box-content" style="color:black">
                                      <span class="info-box-text"><strong>Hapus Surat Panggilan Orang Tua 421.3/<?php echo $data['no_surat']?></strong> </span>
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
                                    <strong>Kelas</strong>
                                  </div>
                                  <div class="col-sm-8"> :
                                  <?php echo $data['kelas']?>
                                  </div>
                                </div>  
                                <div class="row">
                                  <div class="col-sm-3">
                                    <strong>Nama Orang Tua</strong>
                                  </div>
                                  <div class="col-sm-8"> :
                                  <?php echo $data['nama_ayah']?> - <?php echo $data['nama_ibu']?>
                                  </div>
                                </div>  
                                <div class="row">
                                  <div class="col-sm-3">
                                    <strong>Nama Wali Kelas</strong>
                                  </div>
                                  <div class="col-sm-8"> :
                                  <?php echo $data['nama_walikelas']?>
                                  </div>
                                </div>  
                                <div class="row">
                                  <div class="col-sm-3">
                                    <strong>Nama Guru BK</strong>
                                  </div>
                                  <div class="col-sm-8"> :
                                  <?php echo $data['nama_bk']?>
                                  </div>
                                </div>  
                                <div class="row">
                                  <div class="col-sm-3">
                                    <strong>Jadwal Pertemuan</strong>
                                  </div>
                                  <div class="col-sm-8"> :
                                  <?php echo tgl_indo($data['tgl_kunjungan'])?>, Pukul <?php echo $data['jam_kunjungan']?> WIB
                                  </div>
                                </div>  
                                <hr><h5>Yakin ingin menghapus <strong>Surat Panggilan Orang Tua Nomor 421.3/<?php echo $data['no_surat']?></strong> ?</h5>
                                
                                </div>
                                <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times mr-2"></i> Batal</button>
                                <a href="delete_proses_homevisit.php?id_surat=<?php echo $data['id_surat']?>" type="submit" name="submit" class="btn btn-danger"><i class="fas fa-trash mr-2"></i> Hapus Data</a>
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
                                        <td colspan="9"><em>Belum ada data! Segera lakukan upload data.</em></td>
                                        </tr>';
                                    }
			                    ?>
                            </tbody>
                            <tfoot class="text-center">
                                <tr>
                                    <th>No</th>
                                    <th>Nomor Surat</th>
                                    <th>Nama Siswa</th>
                                    <th>Wali Kelas</th>
                                    <th>Guru BP/BK</th>
                                    <th>Tanggal</th>
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