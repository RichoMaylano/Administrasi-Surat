<?php
include "../database.php";
include "../assets/indo.php";
include "../assets/tgl_indo.php";
$title = "Surat Perintah Tugas Guru Page | Aplikasi Persuratan | Versi 2.1.2";
include 'header.php';
?>

<?php $sk = mysqli_query($db_conn, "SELECT COUNT(id_surat) AS 'count' FROM surgas_guru");
$query_guru = mysqli_fetch_array($sk);
$surat_guru = $query_guru['count'];
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Surat Perintah Tugas Guru</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Administrasi Surat</li>
              <li class="breadcrumb-item active">Surat Perintah Tugas Guru</li>
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
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-envelope"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Jumlah Surat Perintah Tugas Guru</span>
                <span class="info-box-number">
                  <?php echo $surat_guru ?>
                  <small>Surat</small>
                </span>
              </div>
              <span class="info-box-icon elevation-1">
              <a class="btn btn-success" href="tambah_surgas.php"><i class="fas fa-plus"></i></a>
              </span>
            </div>
          </div>
        </div>
    </section>

    <section class="content">
      <div class="container-fluid">

      <?php
        if (isset($_SESSION['msg']) && $_SESSION['msg'] <> '') {
        echo '<div class="alert alert-success alert-dismissible">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
  <h5><i class="icon fas fa-check"></i> <strong>SUCCESS !</strong></h5>
  '.$_SESSION['msg'].'
</div>';
        }
        $_SESSION['msg'] = '';
    ?>      
    
        <div class="row">
          <div class="col-12 col-sm-12 col-md-12">
            <div class="card">
            <div class="card-header border-transparent bg-warning">
                <h3 class="card-title"><i class="fas fa-envelope mr-2"></i> Surat Perintah Tugas Guru</h3>
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
                                    <th>Nama Guru</th>
                                    <th>Pangkat / Golongan</th>
                                    <th>Jenis Surat Tugas</th>
                                    <th>Tanggal</th>
                                    <th>Pejabat TTD</th>
                                    <th>Pembuat Surat</th>
                                    <th>Status Cetak</th>
                                    <th width="7%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $today = date("2025-08-17");
                                    $qsiswa = mysqli_query($db_conn,"SELECT * FROM surgas_guru");
                                    $no = 1;
                                    if(mysqli_num_rows($qsiswa) > 0){
                                        while($data = mysqli_fetch_array($qsiswa)){
                                            ?>
                                <tr>
                                <td class="text-center"><?php echo $no++ ?></td>
                                <?php if($data['tgl_create'] <= $today){?>
                                <td>094/<?php echo $data['no_surat'] ?></td>
                                <?php } else {?>
                                  <td>800.1.11.1/<?php echo $data['no_surat'] ?></td>
                                  <?php }?>
                                <td><?php echo $data['nama_guru']?></td>
                                <td>
                                    <?php if($data['pangkat_guru'] == '-' || $data['golongan_guru'] == ''){ ?>
                                        <?php echo '-' ?>
                                        <?php } else{ ?>
                                    <?php echo $data['pangkat_guru'] ?> / <?php echo $data['golongan_guru'] ?>
                                    <?php }?>
                                </td>
                                <td><?php echo $data['jenis_surgas'] ?></td>
                                <td><?php echo tgl_indo($data['tgl_create']) ?></td>
                                <td><?php echo $data['pejabat_ttd'] ?></td>
                                <td><?php echo $data['creator'] ?></td>
                                <?php if($data['status_cetak'] == "Selesai"){ ?>
                                <td><a href="#" class="btn btn-success swalDefaultSuccess"><i class="fas fa-check"></i> Selesai</a></td>
                                <?php }else {?>
                                  <td><a href="#" class="btn btn-danger swalDefaultError" ><i class="fas fa-exclamation-triangle"></i> Pending</a></td>
                                  <?php }?>
                                <td>
                                    <?php if($data['jenis_surgas'] == 'Luar Kota'){?>
                                        <ul class="navbar-nav ml-auto">
                                        <!-- Messages Dropdown Menu --> 
                                        <li class="nav-item dropdown">
                                            <a class="nav-link btn btn-warning" href="#" data-toggle="dropdown" ><strong>&nbsp<i class="fas fa-tasks"></i>  &nbspAksi</strong>&nbsp</a>
                                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                                            <div class="dropdown-divider"></div>
                                            <a href="../cetak_surat/cetak_sppd.php?no_surat=<?php echo $data['no_surat']?>" class="dropdown-item bg-primary">
                                                <i class="fas fa-truck mr-2"></i> Unduh SPPD
                                            </a>
                                            <div class="dropdown-divider"></div>
                                            <a href="../cetak_surat/cetak_blkg_sppd.php?no_surat=<?php echo $data['no_surat']?>" class="dropdown-item bg-warning">
                                                <i class="fas fa-info-circle mr-2"></i> Unduh SPPD (Form Belakang)
                                            </a>
                                            <div class="dropdown-divider"></div>
                                            <a href="../cetak_surat/cetak_luar_kota.php?no_surat=<?php echo $data['no_surat']?>" class="dropdown-item">
                                                <i class="fas fa-print mr-2"></i> Cetak Surat
                                            </a>
                                            <div class="dropdown-divider"></div>
                                            <a href="dashboard.php" type="button" class="dropdown-item btn btn-default" data-toggle="modal" data-target="#edit_surgas<?php echo htmlspecialchars($data['id_surat'])?>">
                                             <i class="fas fa-edit mr-2"></i> Edit Surat
                                            </a>
                                            <div class="dropdown-divider"></div>
                                            <a href="#" data-toggle="modal" data-target="#delete_surgas<?php echo htmlspecialchars($data['id_surat'])?>" class="dropdown-item bg-danger"><i class="fas fa-trash-alt mr-2"></i> Hapus Surat</a>
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
                                            <a href="../cetak_surat/cetak_dalam_kota.php?no_surat=<?php echo $data['no_surat']?>" class="dropdown-item">
                                                <i class="fas fa-print mr-2"></i> Cetak Surat
                                            </a>
                                            <div class="dropdown-divider"></div>
                                            <a href="dashboard.php" type="button" class="dropdown-item btn btn-default" data-toggle="modal" data-target="#edit_surgas<?php echo htmlspecialchars($data['id_surat'])?>">
                                             <i class="fas fa-edit mr-2"></i> Edit Surat
                                            </a>
                                            <div class="dropdown-divider"></div>
                                            <a href="#" data-toggle="modal" data-target="#delete_surgas<?php echo htmlspecialchars($data['id_surat'])?>" class="dropdown-item bg-danger"><i class="fas fa-trash-alt mr-2"></i> Hapus Surat</a>
                                            </div>
                                        </li> 
                                    </ul>
                                    <?php }?>
                                </td>
                                </tr>

                        <div class="modal fade" id="edit_surgas<?php echo htmlspecialchars($data['id_surat']) ?>">
                            <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header bg-primary">
                                <h5 class="modal-title col-11">
                                  <div class="info-box">
                                    <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-edit"></i></span>
                                    <div class="info-box-content" style="color:black">
                                      <span class="info-box-text"><strong>Edit Surat Perintah Tugas Guru 094/<?php echo $data['no_surat']?></strong> </span>
                                      <span class="info-box-number">
                                        <?php if($data['nip_guru'] == '-'){?>
                                          <small><?php echo $data['nama_guru']?></small>
                                          <?php } else {?>
                                        <small><?php echo $data['nama_guru']?> - <?php echo $data['nip_guru']?></small>
                                      <?php }?>
                                    </span>
                                    </div>
                                    <span class="info-box-footer mt-3 mr-3">
                                      <a href="#" class="btn btn-sm btn-primary float-right"><i class="fas fa-truck"></i> &nbsp<?php echo $data['jenis_surgas']?></a>
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
            <input type="text" name="no_surat" class="form-control" id="no_surat" value="<?php echo $data['no_surat']?>">
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
                <input type="text" name="no_surat_sppd" class="form-control" id="no_surat_sppd" value="<?php echo $data['no_surat_sppd']?>">
          </div>
      </div>
      <div class="col-sm-6">
        <div class="form-group">
            <label for="formGroupExampleInput">Tempat SPPD</label>
            <input type="text" name="tempat_sppd" class="form-control" id="tempat_sppd" value="<?php echo $data['tempat_sppd']?>">
          </div>
      </div>
    </div>
        
    <!-- Tujuan SPPD, dan Mata Anggaran-->
        <div class="form-group row">
	      <div class="col-sm-6">
              <div class="form-group">
                <label for="formGroupExampleInput">Tujuan SPPD</label>
                <textarea name="tujuan_sppd" rows="5" class="form-control" id="tujuan_sppd"><?php echo $data['tujuan_sppd']?></textarea>
          </div>
      </div>
      <div class="col-sm-6">
        <div class="form-group">
                <label for="formGroupExampleInput">Jenis Surat Tugas</label>
                <select id="jenis_surgas" class="form-control" name="jenis_surgas">
                  <?php if($data['jenis_surgas'] == "Dalam Kota"){?>
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
                  <option selected value="<?php echo $data['mata_anggaran']?>"><?php echo $data['mata_anggaran']?></option>
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
                                <input type="text" name="nama_guru" class="form-control" id="nama_guru" value="<?php echo $data['nama_guru']?>">
                            </div>
                          
                
                            <!-- NIP, Pangkat, Golongan dan Jabatan -->
                        <div class="form-group row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="formGroupExampleInput">NIP</label>
                                <input type="text" name="nip_guru" class="form-control" id="nip_guru" value="<?php echo $data['nip_guru']?>">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="formGroupExampleInput">Pangkat</label>
                                <input type="text" name="pangkat_guru" class="form-control" id="pangkat_guru" value="<?php echo $data['pangkat_guru']?>">
                        </div>
                    </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="formGroupExampleInput">Golongan </label>
                                <input type="text" name="golongan_guru" class="form-control" id="golongan_guru" value="<?php echo $data['golongan_guru']?>">
                        </div>
                    </div>
                    </div>

                    <!-- Jabatan -->
                    <div class="form-group">
                            <label for="formGroupExampleInput">Jabatan</label>
                                <select id="jabatan" class="form-control" name="jabatan">
                                    <option selected value="<?php echo $data['jabatan']?>"><?php echo $data['jabatan']?></option>
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
                                <?php if($data['dasar_surat'] == ''){?>
                                  <small><i>Silahkan Masukkan Dasar Surat</i></small>
                                  <textarea class="form-control" id="dasar_surat" name="dasar_surat" rows="5" placeholder="Masukkan Dasar Surat"></textarea>
                                  <?php } else {?>
                                    <small><i>Silahkan Masukkan Dasar Surat</i></small>
                                    <textarea class="form-control" id="dasar_surat" name="dasar_surat" rows="5"><?php echo $data['dasar_surat']?></textarea>
                                  <?php }?>
                            </div>

                    <!-- Isi Surat -->
                    <div class="form-group">
                            <label for="formGroupExampleInput">Isi Surat</label>
                            <textarea class="form-control" id="isi_surat" name="isi_surat" rows="5"><?php echo $data['isi_surat']?></textarea>
                            </div>

                    <!-- Tempat dan Jalan -->
                        <div class="form-group row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="formGroupExampleInput">Tempat</label>
                                <input type="text" name="tempat" class="form-control" id="tempat" value="<?php echo $data['tempat']?>">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="formGroupExampleInput">Jalan</label>
                                <input type="text" name="jalan" class="form-control" id="jalan" value="<?php echo $data['jalan']?>">
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
					<input type="date" name="tgl_kegiatan" class="form-control mb-4" id="tgl_kegiatan" value="<?php echo $data['tgl_kegiatan']?>">
			</div>
            
            <h5><strong>Pelaksanaan 1 Hari</strong></h5><hr>

            <!-- Tanggal & Jam Acara 1 Hari-->
    <div class="form-group row">
		<div class="col-sm-6 mb-2">
			<div class="form-group">
                <label for="">Waktu Mulai Acara</label>
						<input type="text" name="mulai_kegiatan" class="form-control" id="mulai_kegiatan" value="<?php echo $data['mulai_kegiatan']?>">
					<div class="form-text"><small>*Dipakai untuk 1 hari saja, Apabila lebih dari 1 hari dikosongi saja</small></div>
				</div>
            </div>
		<div class="col-sm-6 mb-2">
			<div class="form-group">
                <label for="">Waktu Selesai Acara</label>
						<input type="text" name="sampai_kegiatan" class="form-control" id="sampai_kegiatan" value="<?php echo $data['sampai_kegiatan']?>">
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
					<input type="date" name="tgl_selesai" class="form-control" id="tgl_selesai" value="<?php echo $data['tgl_selesai']?>">
					<div class="form-text"><small>*Dipakai apabila lebih dari 1 hari</small></div>
			</div>
		</div>
		<div class="col-sm-4">
			<div class="form-group">
                <label for="">Tanggal Pembukaan Acara</label>
						<input type="date" name="tgl_pembukaan" class="form-control" id="tgl_pembukaan" value="<?php echo $data['tgl_pembukaan']?>">
					<div class="form-text"><small>*Dipakai apabila lebih dari 1 hari</small></div>
				</div>
            </div>
		<div class="col-sm-4">
			<div class="form-group">
                <label for="">Tanggal Penutupan Acara</label>
						<input type="date" name="tgl_penutupan" class="form-control" id="tgl_penutupan" value="<?php echo $data['tgl_penutupan']?>">
						<div class="form-text"><small>*Dipakai apabila lebih dari 1 hari</small></div>
				</div>
            </div>
        </div>

		<!-- Jam Pembukaan dan Penutupan Acara -->
    <div class="form-group row">
		<div class="col-sm-6">
			<div class="form-group">
                <label for="">Jam Pembukaan Acara</label>
			<input type="text" name="jam_pembukaan" class="form-control" id="jam_pembukaan" value="<?php echo $data['jam_pembukaan']?>">
			<div class="form-text"><small>*Dipakai apabila lebih dari 1 hari</small></div>
			</div>
		</div>
		<div class="col-sm-6">
			<div class="form-group">
                <label for="">Jam Penutupan Acara</label>
			<input type="text" name="jam_penutupan" class="form-control" id="jam_penutupan" value="<?php echo $data['jam_penutupan']?>">
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
                            <div class="col-sm-6">
                            <div class="form-group">
                                <label for="formGroupExampleInput">Yang Bertandatangan</label>
                                <select id="pejabat_ttd" class="form-control" name="pejabat_ttd">
                                  <?php if($data['pejabat_ttd'] == "Inti Kurniati Sri Utami, S.Si"){?>
                                  <option selected value="Inti Kurniati Sri Utami, S.Si">Bu Inti Kurniati Sri Utami, S.Si</option>
                                    <option value="Kristiyono, S.Pd">Pak Kristiyono, S.Pd</option>
                                    <option value="Wardoyo, S.Pd., M.Pd">Pak Wardoyo, S.Pd., M.Pd</option>
                                    <?php } else if($data['pejabat_ttd'] == "Kristiyono, S.Pd"){?>
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
                                      <input type="hidden" name="id_surat" id="id_surat" value="<?php echo $data['id_surat']?>">
                                    </form>
                            </div>
                            <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                        </div>
                        <!-- /.modal -->

                        <!-- Modal Delete Data-->
                        <div class="modal fade" id="delete_surgas<?php echo htmlspecialchars($data['id_surat']) ?>">
                            <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header bg-danger text-white">
                                <h5 class="modal-title col-11">
                                  <div class="info-box">
                                    <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-trash"></i></span>
                                    <div class="info-box-content" style="color:black">
                                      <span class="info-box-text"><strong>Hapus Surat Perintah Tugas Guru 094/<?php echo $data['no_surat']?></strong> </span>
                                      <span class="info-box-number">
                                        <small><?php echo $data['nama_guru']?> 
                                        <?php if($data['nip_guru'] == '-'){?>
                                      <?php } else{?>
                                      - <?php echo $data['nip_guru']?>
                                    <?php }?>
                                      </small>
                                      </span>
                                    </div>
                                    <span class="info-box-footer mt-3 mr-3">
                                      <a href="#" class="btn btn-sm btn-danger float-right"><i class="fas fa-truck"></i> &nbsp<?php echo $data['jenis_surgas']?></a>
                                  </span>
                                    </div>
                                  </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body">
                                    <?php 
                                      $hari = array ( 1 =>    
                                      'Senin',
                                      'Selasa',
                                      'Rabu',
                                      'Kamis',
                                      'Jumat',
                                      'Sabtu',
                                      'Minggu');
                                      $tgl = date('N', strtotime($data['tgl_kegiatan']));
                                      $tgl2 = date('N', strtotime($data['tgl_penutupan']));
                                    ?>
                                <div class="row">
                                  <div class="col-sm-3">
                                    <strong>Nama Guru/Karyawan</strong>
                                  </div>
                                  <div class="col-sm-8"> :
                                  <?php echo $data['nama_guru']?>
                                  </div>
                                </div>  
                                <div class="row">
                                  <div class="col-sm-3">
                                    <strong>NIP</strong>
                                  </div>
                                  <div class="col-sm-8"> :
                                    <?php if($data['nip_guru'] == '-'){?>
                                      -
                                      <?php } else{?>
                                      <?php echo $data['nip_guru']?>
                                    <?php }?>
                                  </div>
                                </div>  
                                <div class="row">
                                  <div class="col-sm-3">
                                    <strong>Pangkat / Golongan</strong>
                                  </div>
                                  <div class="col-sm-8"> :
                                  <?php if($data['nip_guru'] == '-'){?>
                                      -
                                      <?php } else{?>
                                      <?php echo $data['pangkat_guru']?> / <?php echo $data['golongan_guru']?>
                                    <?php }?>
                                  </div>
                                </div> 
                                <div class="row">
                                  <div class="col-sm-3">
                                    <strong>Jabatan</strong>
                                  </div>
                                  <div class="col-sm-8"> :
                                  <?php echo $data['jabatan']?>
                                  </div>
                                </div>  
                                <div class="row">
                                  <div class="col-sm-3">
                                    <strong>Dasar Surat</strong>
                                  </div>
                                  <div class="col-sm-8"> :
                                    <?php if($data['dasar_surat'] == ''){?>
                                      <i class="text-danger">Tidak Ada Dasar Surat</i>
                                      <?php }else{?>
                                      <?php echo $data['dasar_surat']?>
                                    <?php }?>
                                  </div>
                                </div>  
                                <div class="row">
                                  <div class="col-sm-3">
                                    <strong>Isi Surat</strong>
                                  </div>
                                  <div class="col-sm-8"> :
                                  <?php echo $data['isi_surat']?>
                                  </div>
                                </div>  
                                <div class="row">
                                  <div class="col-sm-3">
                                    <strong>Lama Hari</strong>
                                  </div>
                                  <div class="col-sm-8"> :
                                    <?php if($data['tgl_selesai'] == '0000-00-00'){
                                        $tgl_mulai = date_create($data['tgl_kegiatan']);
                                        $tgl_selesai = date_create($data['tgl_kegiatan']);
                                      } else {
                                        $tgl_mulai = date_create($data['tgl_kegiatan']);
                                        $tgl_selesai = date_create($data['tgl_selesai']);
                                      }
                                      $selisih  = date_diff($tgl_mulai, $tgl_selesai);
                                      $hasil = $selisih->days;
                                      if($hasil == '0'){
                                      echo '&nbsp1 Hari';
                                      }else {
                                        echo '&nbsp'.$hasil." Hari";
                                    }?>
                                  </div>
                                </div>  
                                <div class="row">
                                  <div class="col-sm-3">
                                    <strong>Hari/Tanggal</strong>
                                  </div>
                                  <div class="col-sm-8"> :
                                  <?php if($data['tgl_selesai'] == '0000-00-00'){?>
                                    <?php echo $hari[$tgl]?>, <?php echo tgl_indo($data['tgl_kegiatan'])?>
                                    <?php }else{?>
                                      <?php echo $hari[$tgl]?> s.d. <?php echo $hari[$tgl2]?>, <?php echo tgl_indo($data['tgl_kegiatan'])?> s.d. 
                                        <?php if($data['tgl_penutupan'] == '0000-00-00'){
                                          echo tgl_indo($data['tgl_selesai']);
                                        }else if($data['tgl_selesai'] == '0000-00-00'){ 
                                          echo tgl_indo($data['tgl_penutupan']);
                                        }else{
                                          echo tgl_indo($data['tgl_penutupan']);
                                        }?>
                                        <?php }?>
                                  </div>
                                </div> 
                                <?php if($data['mulai_kegiatan'] == '' && $data['sampai_kegiatan'] == ''){?>
                                <div class="row">
                                  <div class="col-sm-3">
                                    <strong>Pembukaan</strong>
                                  </div>
                                  <div class="col-sm-8"> :
                                  <?php echo $hari[$tgl]?>, <?php echo tgl_indo($data['tgl_kegiatan'])?>, Pukul <?php echo $data['jam_pembukaan']?>
                                  </div>
                                </div> 
                                <div class="row">
                                  <div class="col-sm-3">
                                    <strong>Penutupan</strong>
                                  </div>
                                  <div class="col-sm-8"> :
                                  <?php echo $hari[$tgl2]?>, <?php echo tgl_indo($data['tgl_penutupan'])?>, Pukul <?php echo $data['jam_penutupan']?>
                                  </div>
                                </div> 
                                <?php }else { 
                                  if($data['sampai_kegiatan'] == 'Selesai' || $data['sampai_kegiatan'] == 'selesai'){?>
                                  <div class="row">
                                  <div class="col-sm-3">
                                    <strong>Waktu</strong>
                                  </div>
                                  <div class="col-sm-8"> :
                                  Pukul <?php echo $data['mulai_kegiatan']?> WIB - <?php echo $data['sampai_kegiatan']?>
                                  </div>
                                </div> 
                                <?php }else {?>
                                  <div class="row">
                                  <div class="col-sm-3">
                                    <strong>Waktu</strong>
                                  </div>
                                  <div class="col-sm-8"> :
                                  Pukul <?php echo $data['mulai_kegiatan']?> - <?php echo $data['sampai_kegiatan']?>  WIB
                                  </div>
                                </div> 
                                    <?php }?>
                                  <?php }?>
                                  <div class="row">
                                  <div class="col-sm-3">
                                    <strong>Tempat Kegiatan</strong>
                                  </div>
                                  <div class="col-sm-8"> :
                                    <?php echo ($data['tempat'])?>
                                  </div>
                                </div> 
                                <?php if($data['jalan'] == '' || $data['jalan'] == '-'){
                                    echo '';
                                  } else { ?>
                                  <div class="row">
                                  <div class="col-sm-3">
                                    <strong>Jalan</strong>
                                  </div>
                                  <div class="col-sm-8"> :
                                    <?php echo ($data['jalan'])?>
                                  </div>
                                </div> 
                                  <?php }?>
                                  
                                <hr><h5>Yakin ingin menghapus <strong>Surat Perintah Tugas Guru Nomor 094/<?php echo $data['no_surat']?></strong> ?</h5>
                                
                                </div>
                                <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times mr-2"></i> Batal</button>
                                <a href="delete_proses_surgas_guru.php?id_surat=<?php echo $data['id_surat']?>" type="submit" name="submit" class="btn btn-danger"><i class="fas fa-trash mr-2"></i> Hapus Data</a>
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
                                    <th>Nama Guru</th>
                                    <th>Pangkat / Golongan</th>
                                    <th>Jenis Surat Tugas</th>
                                    <th>Tanggal</th>
                                    <th>Pejabat TTD</th>
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