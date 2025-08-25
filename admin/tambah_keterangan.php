<?php
include "../database.php";
include "../assets/indo.php";
include "../assets/tgl_indo.php";
$title = "Surat Keterangan Page | Aplikasi Persuratan | Versi 2.1.2";
include 'header.php';
?>

<?php $sk = mysqli_query($db_conn, "SELECT COUNT(id_surat) AS 'count' FROM surat_keterangan");
$query_keterangan = mysqli_fetch_array($sk);
$surat_keterangan = $query_keterangan['count'];
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Surat Keterangan</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Administrasi Surat</li>
              <li class="breadcrumb-item active">Surat Keterangan</li>
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
                <h3 class="card-title"><i class="fas fa-envelope mr-2"></i> Tambah Surat Keterangan</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
                </div>
                    <div class="card-body" id="add_sk">

      <!-- Isi Form -->
        <div class="modal-body">
        <form action="add_proses_sk.php" class="form-horizontal" method="post">
          <!-- Nomor Surat -->
        <div class="form-group">
            <label for="formGroupExampleInput">Nomor Surat</label>
            <input type="text" name="no_surat" class="form-control" id="no_surat" placeholder="Masukkan Nomor Surat" required autofocus>
          </div>
        
          <div class="card">
            <div class="card-header bg-primary">Identitas Siswa</div>
            <div class="card-body">

        <!-- Nama Lengkap -->
            <div class="form-group">
              <label for="formGroupExampleInput">Nama Lengkap</label>
                <select id="siswa_sk" class="form-control add_sk" style="width: 100%;" name="nama_lengkap">
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
                <div id="emailHelp" class="form-text text-white"><small>Contoh : XII KUL 1</small></div>
          </div>
      </div>
	      <div class="col-sm-4">
              <div class="form-group">
                <label for="formGroupExampleInput">Tempat Lahir</label>
                <input type="text" name="tempat_lahir" class="form-control" id="tempat_lahir" placeholder="Masukkan Tempat Lahir" readonly>
                <div id="emailHelp" class="form-text text-white"><small>Contoh : Surakarta</small></div>
          </div>
      </div>
        <div class="col-sm-4">
        <div class="form-group">
                <label for="formGroupExampleInput">Tanggal Lahir</label>
                <input type="text" name="ttl" class="form-control" id="ttl" placeholder="Masukkan Tanggal Lahir" readonly>
                <div id="emailHelp" class="form-text text-white"><small>Contoh : 13 September 2007</small></div>
          </div>
        </div>
    </div>
       
        <!-- Nama Orang Tua -->
        <div class="form-group">
                <label for="formGroupExampleInput">Nama Orang Tua</label>
                <input type="text" name="nama_ortu" class="form-control" id="nama_ortu" placeholder="Masukkan Nama Orang Tua" readonly>
          </div>
            </div>
          </div>
            
        <div class="card">
            <div class="card-header bg-primary">Isi Surat</div>
            <div class="card-body">

        <!-- Deskripsi / Isi Surat -->
          <div class="form-group">
                <label for="formGroupExampleInput">Deskripsi / Isi Surat</label>
                <textarea class="form-control" id="deskripsi" name="deskripsi" rows="5" placeholder="Masukkan Deskripsi Surat" required autofocus></textarea>
          </div>
        
		<!-- Penutup Surat -->
          <div class="form-group">
                <label for="formGroupExampleInput">Penutup Surat</label>
                <textarea class="form-control" id="penutup_surat" name="penutup_surat" rows="5" required autofocus>Demikian Surat Keterangan ini kami sampaikan, untuk dapat digunakan sebagaimana mestinya.</textarea>
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
               <input type="date" name="tgl_surat" class="form-control" id="tgl_surat">
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
                  <option value="Kristiyono, S.Pd">Pak Kristiyono, S.Pd</option>
                </select>
              </div>
            </div>
        </div>
        </div>
        </div>
          
        </div>
            <div class="modal-footer justify-content-between">
            <a type="button" class="btn btn-danger" href="surat_keterangan.php"><i class="fas fa-times mr-2"></i> Batal</a>
            <button type="submit" name="submit" class="btn btn-success"><i class="fas fa-paper-plane mr-2"></i> Kirim Data</button>
            </div>
          </form>
        </div>
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