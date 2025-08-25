<?php
include "../database.php";
include "../assets/indo.php";
include "../assets/tgl_indo.php";
$title = "Surat Panggilan Orang Tua Page | Aplikasi Persuratan | Versi 2.1.2";
include 'header.php';
?>

<?php $panggilan = mysqli_query($db_conn, "SELECT COUNT(id_surat) AS 'count' FROM surat_panggilan");
$query_panggilan = mysqli_fetch_array($panggilan);
$surat_panggilan = $query_panggilan['count'];
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Surat Panggilan Orang Tua</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Administrasi Surat</li>
              <li class="breadcrumb-item active">Surat Panggilan Orang Tua</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content">
      <div class="container-fluid">
        
        <div class="row">
          <div class="col-12 col-sm-12 col-md-12">
            <div class="card">
            <div class="card-header border-transparent bg-success">
                <h3 class="card-title"><i class="fas fa-envelope mr-2"></i> Tambah Surat Panggilan Orang Tua</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
                </div>
                    <div class="card-body" id="add_panggilan">

    <div class="modal-body">
            
        <form action="add_proses_panggilan.php" class="form-horizontal" method="post">
          <!-- Nomor Surat -->
        <div class="form-group">
            <label for="formGroupExampleInput">Nomor Surat</label>
            <input type="text" name="no_surat" class="form-control" id="no_surat" placeholder="Masukkan Nomor Surat" required autofocus>
          </div>
        
          <div class="card">
            <div class="card-header bg-primary">identitas Siswa</div>
            <div class="card-body">
                <!-- Nama Lengkap -->
                    <div class="form-group">
                    <label for="formGroupExampleInput">Nama Lengkap</label>
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
                        <label for="formGroupExampleInput">Nama Ayah</label>
                        <input type="text" name="nama_ayah" class="form-control" id="nama_ayah" placeholder="Masukkan Nama Ayah" readonly>
                </div>
            </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="formGroupExampleInput">Nama Ibu</label>
                        <input type="text" name="nama_ibu" class="form-control" id="nama_ibu" placeholder="Masukkan Nama Ibu" readonly>
                </div>
            </div>
            </div>
            
            <!-- Kelas dan TTL -->
                <div class="form-group row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="formGroupExampleInput">Kelas</label>
                        <input type="text" name="kelas" class="form-control" id="kelas" placeholder="Masukkan Kelas" readonly>
                </div>
            </div>
                <div class="col-sm-8">
                    <div class="form-group">
                        <label for="formGroupExampleInput">Alamat</label>
                        <input type="text" name="alamat" class="form-control" id="alamat" placeholder="Masukkan Alamat Tempat Tinggal" required autofocus>
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
                    <label for="formGroupExampleInput">NIP Wali Kelas</label>
                    <input type="text" name="nip_walikelas" class="form-control" id="nip_walikelas" placeholder="Masukkan NIP Wali Kelas" readonly>
                </div>

                    <!-- Pangkat dan Golongan Wali Kelas -->
                <div class="form-group row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="formGroupExampleInput">Pangkat Wali Kelas</label>
                        <input type="text" name="pangkat_walikelas" class="form-control" id="pangkat_walikelas" placeholder="Masukkan Pangkat Wali Kelas" readonly>
                </div>
            </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="formGroupExampleInput">Golongan Wali Kelas</label>
                        <input type="text" name="golongan_walikelas" class="form-control" id="golongan_walikelas" placeholder="Masukkan Golongan Wali Kelas" readonly>
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
                    <label for="formGroupExampleInput">NIP Guru BK</label>
                    <input type="text" name="nip_bk" class="form-control" id="nip_bk" placeholder="Masukkan NIP Guru BK" readonly>
                </div>

                    <!-- Pangkat dan Golongan Guru BK -->
                <div class="form-group row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="formGroupExampleInput">Pangkat Guru BK</label>
                        <input type="text" name="pangkat_bk" class="form-control" id="pangkat_bk" placeholder="Masukkan Pangkat Guru BK" readonly>
                </div>
            </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="formGroupExampleInput">Golongan Guru BK</label>
                        <input type="text" name="golongan_bk" class="form-control" id="golongan_bk" placeholder="Masukkan Golongan Guru BK" readonly>
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
                    <input type="date" name="tgl_kunjungan" class="form-control" id="tgl_kunjungan" placeholder="Masukkan Tanggal Pertemuan" required autofocus>
            </div>
        </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="formGroupExampleInput">Jam Pertemuan</label>
                    <input type="time" name="jam_kunjungan" class="form-control" id="jam_kunjungan" placeholder="Masukkan Jam Pertemuan" required autofocus>
            </div>
        </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="formGroupExampleInput">Tempat Pertemuan</label>
                    <input type="text" name="tempat" class="form-control" id="tempat" placeholder="Masukkan Tempat Pertemuan" required autofocus>
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
                        <input type="date" name="tgl_surat" class="form-control" id="tgl_surat" required autofocus>
                    </div>
                    </div>
                    <div class="col-sm-4">
                    <div class="form-group">
                        <label for="formGroupExampleInput">Status Cetak Surat</label>
                        <select id="status_cetak" class="form-control" name="status_cetak">
                        <option value="Selesai">Selesai</option>
                        <option value="Pending">Pending</option>
                        </select>
                    </div>
                    </div>
                    <div class="col-sm-4">
                    <div class="form-group">
                        <label for="formGroupExampleInput">Yang Bertandatangan</label>
                        <select id="pejabat_ttd" class="form-control" name="pejabat_ttd">
                        <option value="Wardoyo, S.Pd., M.Pd">Pak Wardoyo, S.Pd., M.Pd</option>
                        <option value="Inti Kurniati Sri Utami, S.Si">Bu Inti Kurniati Sri Utami, S.Si</option>
                        </select>
                    </div>
                    </div>
                </div>
            </div>
          </div>
          
        </div>
            <div class="modal-footer justify-content-between">
            <a type="button" class="btn btn-danger" href="surat_panggilan_ortu.php"><i class="fas fa-times mr-2"></i> Batal</a>
            <button type="submit" name="submit" class="btn btn-success"><i class="fas fa-paper-plane mr-2"></i> Kirim Data</button>
            </div>
          </form>
        </div>
        <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

            </div>
        </div>
    </div>
</section>


    </div>

    

<?php
include 'footer.php';
?>