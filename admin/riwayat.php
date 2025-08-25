<?php
include "../database.php";
include '../assets/indo.php';
include '../assets/tgl_indo.php';

$title = "Riwayat Pembaharuan Page | Aplikasi Persuratan | Versi 2.1.2";
include 'header.php';
?>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Riwayat Pembaharuan Aplikasi</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Riwayat</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content">
      <div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
        <div class="card">
            <div class="card-header bg-primary"><h5>Log History Pembaharuan Aplikasi Persuratan</h5></div>
            <div class="card-body">

            <div class="card">
                <div class="card-header bg-warning">Kamis, 14 Agustus 2025</div>
                <div class="card-body">
                  <ul>
                    <li>Update Menu Kompetensi Keahlian</li>
                    <li>Update Menu Surat Keterangan (Perubahan Nomor Surat dan Format Cetak Surat)</li>
                  </ul>
                </div>
              </div>
              
              <div class="card">
                <div class="card-header bg-warning">Jumat, 15 Agustus 2025</div>
                <div class="card-body">
                  <ul>
                    <li>Penambahan Fitur Riwayat Pembaharuan Aplikasi</li>
                    <li>Update Menu Surat Rekomendasi (Perubahan Nomor Surat dan Format Cetak Surat)</li>
                    <li>Update Menu Surat Rekomendasi (Penambahan Menu untuk Ranking khusus Rekomendasi Beasiswa KIPK)</li>
                  </ul>
                </div>
              </div>

              <div class="card">
                <div class="card-header bg-warning">Selasa, 19 Agustus 2025</div>
                <div class="card-body">
                  <ul>
                    <li>Update Menu Surat Perintah Tugas Guru dan Surat Perintah Perjalanan Dinas</li>
                    <li>Update Menu Beranda (Cek Surat Pending)</li>
                    <li>Update Perubahan Nomor Surat (Menyesuaikan Perubahan Lama dan Baru)</li>
                  </ul>
                </div>
              </div>

              <div class="card">
                <div class="card-header bg-warning">Rabu, 20 Agustus 2025</div>
                <div class="card-body">
                  <ul>
                    <li>Penambahan Fitur Profile Pengguna</li>
                    <li>Update Menu Beranda (Update Fitur Cek Surat Belum Dicetak/Pending)</li>
                    <li>Update Tanda Tangan Pejabat Plt. Ka Sub Bag. Tata Usaha (Kristiyono, S.Pd)</li>
                    <li>Update Perubahan Nomor Surat (Menyesuaikan Perubahan Lama dan Baru)</li>
                  </ul>
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