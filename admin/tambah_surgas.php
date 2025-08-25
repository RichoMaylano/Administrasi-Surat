<?php
include "../database.php";
include "../assets/indo.php";
include "../assets/tgl_indo.php";
$title = "Surat Perintah Tugas Guru Page | Aplikasi Persuratan | Versi 2.1.2";
include 'header.php';
?>

<?php $surgas = mysqli_query($db_conn, "SELECT COUNT(id_surat) AS 'count' FROM surgas_guru");
$query_surgas = mysqli_fetch_array($surgas);
$surgas_guru = $query_surgas['count'];
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
              <a href="surat_tugas_guru.php" class="info-box-icon bg-warning elevation-1"><i class="fas fa-envelope text-white"></i></a>

              <div class="info-box-content">
                <span class="info-box-text">Jumlah Surat Tugas Guru</span>
                <span class="info-box-number">
                  <?php echo $surgas_guru ?>
                  <small>Surat</small>
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
                <h3 class="card-title text-white"><i class="fas fa-envelope mr-2"></i> Tambah Surat Tugas Guru</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
                </div>

    <div class="card-body" id="add_surgas">
      <div class="modal-body">
         <form action="add_proses_surgas_guru.php" class="form-horizontal" method="post">

            <div class="form-group">
            <label for="formGroupExampleInput">Nomor Surat</label>
            <input type="text" name="no_surat" class="form-control" id="no_surat" placeholder="Masukkan Nomor Surat" required autofocus>
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
                <input type="text" name="no_surat_sppd" class="form-control" id="no_surat_sppd" placeholder="Masukkan Nomor Surat SPPD" required autofocus>
          </div>
      </div>
      <div class="col-sm-6">
        <div class="form-group">
            <label for="formGroupExampleInput">Tempat SPPD</label>
            <input type="text" name="tempat_sppd" class="form-control" id="tempat_sppd" placeholder="Masukkan Tempat Tujuan SPPD" required autofocus>
          </div>
      </div>
    </div>
        
    <!-- Tujuan SPPD, dan Mata Anggaran-->
        <div class="form-group row">
	      <div class="col-sm-6">
              <div class="form-group">
                <label for="formGroupExampleInput">Tujuan SPPD</label>
                <textarea name="tujuan_sppd" rows="5" class="form-control" id="tujuan_sppd" placeholder="Masukkan Tujuan SPPD" required autofocus></textarea>
          </div>
      </div>
      <div class="col-sm-6">
        <div class="form-group">
                <label for="formGroupExampleInput">Jenis Surat Tugas</label>
                <select id="jenis_surgas" class="form-control" name="jenis_surgas">
                  <option value="Dalam Kota">Dalam Kota</option>
                  <option value="Luar Kota">Luar Kota</option>
                </select>
              </div>
      <div class="form-group">
                <label for="formGroupExampleInput">Mata Anggaran SPPD</label>
                <select id="mata_anggaran" class="form-control" name="mata_anggaran" required autofocus>
                  <option disabled selected>Pilih Mata Anggaran SPPD</option>
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
                                <select id="nama_guru" class="form-control add_sk" style="width: 100%;" name="nama_guru">
                                <option disabled selected>--- Pilih Nama Lengkap ---</option>
                                    <?php 
                                        $s = mysqli_query($db_conn,"select * from data_guru");
                                        while($d = mysqli_fetch_array($s)){?>
                                <option value="<?php echo $d['nama_guru'] ?>"><?php echo $d['nama_guru'] ?> - <?php echo $d['nip_guru'] ?></option>
                                <?php }?>				
                                </select>
                            </div>
                
                            <!-- NIP, Pangkat, Golongan dan Jabatan -->
                        <div class="form-group row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="formGroupExampleInput">NIP</label>
                                <input type="text" name="nip_guru" class="form-control" id="nip_guru" placeholder="Masukkan NIP" readonly>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="formGroupExampleInput">Pangkat</label>
                                <input type="text" name="pangkat_guru" class="form-control" id="pangkat_guru" placeholder="Masukkan Pangkat" readonly>
                        </div>
                    </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="formGroupExampleInput">Golongan </label>
                                <input type="text" name="golongan_guru" class="form-control" id="golongan_guru" placeholder="Masukkan Golongan" readonly>
                        </div>
                    </div>
                    </div>

                    <!-- Jabatan -->
                    <div class="form-group">
                            <label for="formGroupExampleInput">Jabatan</label>
                                <select id="jabatan" class="form-control" name="jabatan">
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
                    
                                <div class="form-group clearfix">
                                    <div class="icheck-primary d-inline">
                                        <input type="radio"  name="type" id="radioPrimary1" value="ada" onChange="addmentor();">
                                        <label for="radioPrimary1"> Ada
                                        </label>
                                    </div> &nbsp&nbsp&nbsp
                                    <div class="icheck-danger d-inline">
                                        <input type="radio" name="type" id="radioDanger1" value="tidak ada" onClick="hideInputDiv();" checked>
                                        <label for="radioDanger1"> Tidak Ada
                                        </label> 
                                    </div>
                                    </div>

                                    <div id="nextSetOfComputerOptions" style="display: none;">
                                        <small><i>Silahkan Masukkan Dasar Surat</i></small>
                                        <textarea class="form-control" id="dasar_surat" name="dasar_surat" rows="5" placeholder="Masukkan Dasar Surat"></textarea>
                                    </div>
                            </div>

                    <!-- Isi Surat -->
                    <div class="form-group">
                            <label for="formGroupExampleInput">Isi Surat</label>
                            <textarea class="form-control" id="isi_surat" name="isi_surat" rows="5" placeholder="Masukkan Isi Surat" required autofocus></textarea>
                            </div>

                    <!-- Tempat dan Jalan -->
                        <div class="form-group row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="formGroupExampleInput">Tempat</label>
                                <input type="text" name="tempat" class="form-control" id="tempat" placeholder="Masukkan Tempat Diselenggarakannya Kegiatan" required autofocus>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="formGroupExampleInput">Jalan</label>
                                <input type="text" name="jalan" class="form-control" id="jalan" placeholder="Masukkan Jalan Diselenggarakannya Kegiatan" required autofocus>
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
					<input type="date" name="tgl_kegiatan" class="form-control mb-4" id="tgl_kegiatan" required autofocus>
			</div>
            
            <h5><strong>Pelaksanaan 1 Hari</strong></h5><hr>

            <!-- Tanggal & Jam Acara 1 Hari-->
    <div class="form-group row">
		<div class="col-sm-6 mb-2">
			<div class="form-group">
                <label for="">Waktu Mulai Acara</label>
						<input type="text" name="mulai_kegiatan" class="form-control" id="mulai_kegiatan" placeholder="Masukkan Waktu Mulai Acara">
					<div class="form-text"><small>*Dipakai untuk 1 hari saja, Apabila lebih dari 1 hari dikosongi saja</small></div>
				</div>
            </div>
		<div class="col-sm-6 mb-2">
			<div class="form-group">
                <label for="">Waktu Selesai Acara</label>
						<input type="text" name="sampai_kegiatan" class="form-control" id="sampai_kegiatan" placeholder="Masukkan Waktu Selesai Acara">
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
					<input type="date" name="tgl_selesai" class="form-control" id="tgl_selesai" >
					<div class="form-text"><small>*Dipakai apabila lebih dari 1 hari</small></div>
			</div>
		</div>
		<div class="col-sm-4">
			<div class="form-group">
                <label for="">Tanggal Pembukaan Acara</label>
						<input type="date" name="tgl_pembukaan" class="form-control" id="tgl_pembukaan">
					<div class="form-text"><small>*Dipakai apabila lebih dari 1 hari</small></div>
				</div>
            </div>
		<div class="col-sm-4">
			<div class="form-group">
                <label for="">Tanggal Penutupan Acara</label>
						<input type="date" name="tgl_penutupan" class="form-control" id="tgl_penutupan">
						<div class="form-text"><small>*Dipakai apabila lebih dari 1 hari</small></div>
				</div>
            </div>
        </div>

		<!-- Jam Pembukaan dan Penutupan Acara -->
    <div class="form-group row">
		<div class="col-sm-6">
			<div class="form-group">
                <label for="">Jam Pembukaan Acara</label>
			<input type="text" name="jam_pembukaan" class="form-control" id="jam_pembukaan" placeholder="Masukkan Waktu Pembukaan Acara">
			<div class="form-text"><small>*Dipakai apabila lebih dari 1 hari</small></div>
			</div>
		</div>
		<div class="col-sm-6">
			<div class="form-group">
                <label for="">Jam Penutupan Acara</label>
			<input type="text" name="jam_penutupan" class="form-control" id="jam_penutupan" placeholder="Masukkan Waktu Penutupan Acara">
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
                                <option value="Selesai">Selesai</option>
                                <option value="Pending">Pending</option>
                                </select>
                            </div>
                            </div>
                            <div class="col-sm-6">
                            <div class="form-group">
                                <label for="formGroupExampleInput">Yang Bertandatangan</label>
                                <select id="pejabat_ttd" class="form-control" name="pejabat_ttd">
                                <option value="Wardoyo, S.Pd., M.Pd">Pak Wardoyo, S.Pd., M.Pd</option>
                                <option value="Kristiyono, S.Pd">Pak Kristiyono, S.Pd</option>
                                <option value="Inti Kurniati Sri Utami, S.Si">Bu Inti Kurniati Sri Utami, S.Si</option>
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
          </form>


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