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
              <li class="breadcrumb-item active">Surat Rekomendasi Ranking</li>
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
          
        <div class="row">
          <div class="col-12 col-sm-12 col-md-12">
            <div class="card">
            <div class="card-header border-transparent bg-warning">
                <h3 class="card-title text-white"><i class="fas fa-trophy mr-2"></i> Tambah Surat Rekomendasi Ranking</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
                </div>

    <div class="card-body" id="add_rekomen">
      <!-- Isi Form -->
        <div class="modal-body bg-light">
        <form action="add_proses_ranking.php" class="form-horizontal" method="post">
          <!-- Nomor Surat -->
        <div class="form-group">
            
            <label for="formGroupExampleInput">Nomor Surat <span><small>(*Kode Nomor : 400.3.12.1)</small></span></label>
            <input type="text" name="no_surat" class="form-control" id="no_surat" placeholder="Masukkan Nomor Surat" required autofocus>
          </div>
        
          <div class="card">
            <div class="card-header bg-primary">Identitas Siswa</div>
            <div class="card-body">
<!-- Nama Lengkap -->
            <div class="form-group">
              <label for="formGroupExampleInput">Nama Lengkap</label>
                <select id="siswa" class="form-control add_rekomen" style="width: 100%;" name="nama_lengkap">
                  <option disabled selected>--- Pilih Nama Lengkap ---</option>
                      <?php 
                        $s = mysqli_query($db_conn,"select * from data_siswa");
                          while($d = mysqli_fetch_array($s)){?>
                  <option value="<?php echo $d['nama_lengkap'] ?>"><?php echo $d['nama_lengkap'] ?> - <?php echo $d['jurusan'] ?> - <?php echo $d['nis'] ?></option>
                  <?php }?>				
                </select>
            </div>

        <!-- NIS dan NISN -->
        <div class="form-group row">
          <div class="col-sm-6">
              <div class="form-group">
                <label for="formGroupExampleInput">NIS (Nomor Induk Sekolah)</label>
                <input type="text" name="nis" class="form-control" id="nis" placeholder="Masukkan NIS" readonly>
          </div>
      </div>
	      <div class="col-sm-6">
              <div class="form-group">
                <label for="formGroupExampleInput">NISN (Nomor Induk Sekolah Nasional)</label>
                <input type="text" name="nisn" class="form-control" id="nisn" placeholder="Masukkan NISN" readonly>
          </div>
      </div>
    </div>
       
    <!-- Kelas dan TTL -->
        <div class="form-group row">
          <div class="col-sm-4">
              <div class="form-group">
                <label for="formGroupExampleInput">Kelas</label>
                <input type="text" name="kelas" class="form-control" id="kelas" placeholder="Masukkan Kelas" required autofocus>
          </div>
      </div>
	      <div class="col-sm-4">
              <div class="form-group">
                <label for="formGroupExampleInput">Tempat Lahir</label>
                <input type="text" name="tempat_lahir" class="form-control" id="tempat_lahir" placeholder="Masukkan Tempat Lahir" readonly>
          </div>
      </div>
        <div class="col-sm-4">
        <div class="form-group">
                <label for="formGroupExampleInput">Tanggal Lahir</label>
                <input type="text" name="ttl" class="form-control" id="ttl" placeholder="Masukkan Tanggal Lahir" readonly>
          </div>
        </div>
    </div>
       
        <!-- Nama Orang Tua -->
        <div class="form-group">
                <label for="formGroupExampleInput">Nama Orang Tua</label>
                <input type="text" name="nama_ortu" class="form-control" id="nama_ortu" placeholder="Masukkan Nama Orang Tua" readonly>
          </div>
        
          <!-- Alamat -->
        <div class="form-group">
                <label for="formGroupExampleInput">Alamat</label>
                <input type="text" name="alamat" class="form-control" id="alamat" placeholder="Masukkan Alamat">
          </div>
            </div>
          </div>
            
          
          <div class="card">
            <div class="card-header bg-primary">Rekap Prestasi Ranking Kelas</div>
            <div class="card-body">
              
          <div class="form-group row mb-4">
            <div class="col-sm-6">
              <h5 class="">Semester 1</h5><hr>
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="formGroupExampleInput">Ranking Kelas</label>
                    <input type="number" min="0" max="100" name="rank_smt1" class="form-control" id="rank_smt1" placeholder="Masukkan Ranking Kelas">
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="formGroupExampleInput">Jumlah Siswa</label>
                    <input type="number" min="0" max="100" name="jumlah_smt1" class="form-control" id="jumlah_smt1" placeholder="Masukkan Jumlah Siswa" >
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-6">
              <h5 class="">Semester 2</h5><hr>
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="formGroupExampleInput">Ranking Kelas</label>
                    <input type="number" min="0" max="100" name="rank_smt2" class="form-control" id="rank_smt2" placeholder="Masukkan Ranking Kelas">
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="formGroupExampleInput">Jumlah Siswa</label>
                    <input type="number" min="0" max="100" name="jumlah_smt2" class="form-control" id="jumlah_smt2" placeholder="Masukkan Jumlah Siswa" >
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="form-group row mb-4">
            <div class="col-sm-6">
              <h5 class="">Semester 3</h5><hr>
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="formGroupExampleInput">Ranking Kelas</label>
                    <input type="number" min="0" max="100" name="rank_smt3" class="form-control" id="rank_smt3" placeholder="Masukkan Ranking Kelas">
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="formGroupExampleInput">Jumlah Siswa</label>
                    <input type="number" min="0" max="100" name="jumlah_smt3" class="form-control" id="jumlah_smt3" placeholder="Masukkan Jumlah Siswa" >
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-6">
              <h5 class="">Semester 4</h5><hr>
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="formGroupExampleInput">Ranking Kelas</label>
                    <input type="number" min="0" max="100" name="rank_smt4" class="form-control" id="rank_smt4" placeholder="Masukkan Ranking Kelas">
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="formGroupExampleInput">Jumlah Siswa</label>
                    <input type="number" min="0" max="100" name="jumlah_smt4" class="form-control" id="jumlah_smt4" placeholder="Masukkan Jumlah Siswa" >
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="form-group row">
            <div class="col-sm-6">
              <h5 class="">Semester 5</h5><hr>
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="formGroupExampleInput">Ranking Kelas</label>
                    <input type="number" min="0" max="100" name="rank_smt5" class="form-control" id="rank_smt5" placeholder="Masukkan Ranking Kelas">
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="formGroupExampleInput">Jumlah Siswa</label>
                    <input type="number" min="0" max="100" name="jumlah_smt5" class="form-control" id="jumlah_smt5" placeholder="Masukkan Jumlah Siswa" >
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-6">
              <h5 class="">Semester 6</h5><hr>
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="formGroupExampleInput">Ranking Kelas</label>
                    <input type="number" min="0" max="100" name="rank_smt6" class="form-control" id="rank_smt6" placeholder="Masukkan Ranking Kelas">
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="formGroupExampleInput">Jumlah Siswa</label>
                    <input type="number" min="0" max="100" name="jumlah_smt6" class="form-control" id="jumlah_smt6" placeholder="Masukkan Jumlah Siswa" >
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- End of Card Body and Card -->
            </div>
          </div>
          
          <div class="card">
            <div class="card-header bg-primary">Isi Surat Rekomendasi</div>
            <div class="card-body">
<!-- Deskripsi / Isi Surat -->
          <div class="form-group">
                <label for="formGroupExampleInput">Deskripsi / Isi Surat</label>
                <textarea class="form-control" id="deskripsi_ranking" name="deskripsi" rows="5" required autofocus></textarea>
          </div>

		<!-- Penutup Surat -->
          <div class="form-group">
                <label for="formGroupExampleInput">Penutup Surat</label>
                <textarea class="form-control" id="penutup_surat" name="penutup_surat" rows="5" required autofocus></textarea>
          </div>
          
          <!-- Status Cetak -->
          <div class="form-group row">
            <div class="col-sm-3">
              <div class="form-group">
                <label for="formGroupExampleInput">Tanggal Surat</label>
               <input type="date" name="tgl_surat" class="form-control" id="tgl_surat">
              </div>
            </div>
            <div class="col-sm-3">
              <div class="form-group">
                <label for="formGroupExampleInput">Status Cetak Surat</label>
                <select id="status_cetak" class="form-control" name="status_cetak">
                  <option value="Selesai">Selesai</option>
                  <option value="Pending">Pending</option>
                </select>
              </div>
            </div>
            <div class="col-sm-3">
              <div class="form-group">
                <label for="formGroupExampleInput">Yang Bertandatangan</label>
                <select id="pejabat_ttd" class="form-control" name="pejabat_ttd">
                  <option value="Wardoyo, S.Pd., M.Pd">Pak Wardoyo, S.Pd., M.Pd</option>
                  <option value="Inti Kurniati Sri Utami, S.Si">Bu Inti Kurniati Sri Utami, S.Si</option>
                  <option value="Kristiyono, S.Pd">Pak Kristiyono, S.Pd</option>
                </select>
              </div>
            </div>
            <div class="col-sm-3">
              <div class="form-group">
                <label for="formGroupExampleInput">Jenis Rekomendasi</label>
                <select id="jenis_rekomendasi_ranking" class="form-control" name="jenis_rekomendasi" onchange="autodescript_rank()">
                  <option disabled selected value="">Pilih Jenis Rekomendasi</option>
                  <option value="Lomba">Lomba</option>
                  <option value="Beasiswa KIPK">Beasiswa KIPK</option>
                  <option value="Beasiswa Lainnya">Beasiswa Lainnya</option>
                  <option value="Bantuan">Bantuan</option>
                </select>
              </div>
            </div>
        </div>
            </div>
          </div>
          
          
        </div>
            <div class="modal-footer justify-content-between">
            <a type="button" class="btn btn-danger" href="surat_rekomendasi.php"><i class="fas fa-times mr-2"></i> Batal</a>
            <button type="submit" name="submit" class="btn btn-success"><i class="fas fa-paper-plane mr-2"></i> Kirim Data</button>
            </div>
          </form>
        </div>


                    </div>
            </div>
            </div>
        </div>
    </div>

        </div>
    </section>

<?php
include 'footer.php';
?>