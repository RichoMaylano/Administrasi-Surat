<?php
include "../database.php";
include '../assets/indo.php';
include '../assets/tgl_indo.php';

$title = "Profile Page | Aplikasi Persuratan | Versi 2.1.2";
include 'header.php';
?>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Profile Page</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Profile</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <?php if($_SESSION['nama_lengkap'] == "Richo Maylano Yozienanda"){?>
    <section class="content">
      <div class="container-fluid">
    <div class="row">
        <div class="col-sm-8">
        
        <div class="card">
            <div class="card-header bg-primary"><h5>Profile Biodata <?php echo $_SESSION['nama_lengkap']?></h5></div>
            <div class="card-body">
                
                <div class="row">
                    <div class="col-sm-3">
                        <div class="card">
                            <div class="card-header bg-primary"><center>Foto Profil</center></div>
                            <div class="card-body">
                                <center><img src="../assets/images/richo.jpg" width="150px" alt="" class="img-rounded mb-2"></center>
                                <span><i><center>Foto 4x6</center></i></span>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-9">
                        <div class="card">
                            <div class="card-header bg-primary"><center>Biodata</center></div>
                            <div class="card-body">
                                <table class="table table-stripped table-bordered">
                                    <tbody>
                                        <tr>
                                            <td><strong>Nama Lengkap</strong></td>
                                            <td><?php echo $_SESSION['nama_lengkap']?></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Tempat, Tanggal Lahir</strong></td>
                                            <td>Surakarta, 18 Mei 2000</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Alamat</strong></td>
                                            <td>Sumpingan RT 05/RW 06, Kadipiro, Banjarsari, Surakarta</td>
                                        </tr>
                                        <tr>
                                            <td><strong>No Telp</strong></td>
                                            <td>085600242904</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Website</strong></td>
                                            <td><a href="https://smkn7surakarta.sch.id">SMK Negeri 7 Surakarta</a></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
        </div>

        <div class="col-sm-4">
            <div class="card">
                <div class="card-header bg-primary"><h5>Tentang Aplikasi</h5></div>
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
                </div>
            </div>
        </div>

    </div>
    </div>
</section>

<?php } else {?>
    <section class="content">
      <div class="container-fluid">
    <div class="row">
        <div class="col-sm-8">
        
        <div class="card">
            <div class="card-header bg-primary"><h5>Profile Biodata <?php echo $_SESSION['nama_lengkap']?></h5></div>
            <div class="card-body">
                
                <div class="row">
                    <div class="col-sm-3">
                        <div class="card">
                            <div class="card-header bg-primary"><center>Foto Profil</center></div>
                            <div class="card-body">
                                <center><img src="../assets/images/img_avatar.png" width="150px" alt="" class="img-rounded mb-2"></center>
                                <span><i><center>Foto 4x6</center></i></span>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-9">
                        <div class="card">
                            <div class="card-header bg-primary"><center>Biodata</center></div>
                            <div class="card-body">
                                <table class="table table-stripped table-bordered">
                                    <tbody>
                                        <tr>
                                            <td><strong>Nama Lengkap</strong></td>
                                            <td><?php echo $_SESSION['nama_lengkap']?></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Tempat, Tanggal Lahir</strong></td>
                                            <td>Surakarta, 4 Februari 1993</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Alamat</strong></td>
                                            <td>Siwal, Baki, Surakarta</td>
                                        </tr>
                                        <tr>
                                            <td><strong>No Telp</strong></td>
                                            <td>085263299912</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Website</strong></td>
                                            <td><a href="https://smkn7surakarta.sch.id">SMK Negeri 7 Surakarta</a></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
        </div>

        <div class="col-sm-4">
            <div class="card">
                <div class="card-header bg-primary"><h5>Tentang Aplikasi</h5></div>
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
                </div>
            </div>
        </div>

    </div>
    </div>
</section>
    <?php }?>

<?php
include 'footer.php';
?>