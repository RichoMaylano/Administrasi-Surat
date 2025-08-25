 
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
     
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
      <strong>Copyright &copy; 2025 </strong>Developed by <strong><a href="https://adminlte.io">Richo Maylano Yozienanda</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 2.1.2
    </div>  
  </footer>

</div>
<!-- ./wrapper -->



<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="../../assets/AdminLTE/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="../../assets/AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Select2 -->
<script src="../../assets/AdminLTE/plugins/select2/js/select2.full.min.js"></script>

<!-- DataTables  & Plugins -->
<script src="../../assets/AdminLTE/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../assets/AdminLTE/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../../assets/AdminLTE/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../../assets/AdminLTE/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../../assets/AdminLTE/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../../assets/AdminLTE/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../../assets/AdminLTE/plugins/jszip/jszip.min.js"></script>
<script src="../../assets/AdminLTE/plugins/pdfmake/pdfmake.min.js"></script>
<script src="../../assets/AdminLTE/plugins/pdfmake/vfs_fonts.js"></script>
<script src="../../assets/AdminLTE/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../../assets/AdminLTE/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../../assets/AdminLTE/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- overlayScrollbars -->
<script src="../../assets/AdminLTE/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- ChartJS -->
<script src="../../assets/AdminLTE/plugins/chart.js/Chart.min.js"></script>
<!-- AdminLTE App -->
<script src="../../assets/AdminLTE/dist/js/adminlte.js"></script>
<!-- SweetAlert2 -->
<script src="../../assets/AdminLTE/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="../../assets/AdminLTE/plugins/toastr/toastr.min.js"></script>
<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="../../assets/AdminLTE/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="../../assets/AdminLTE/plugins/raphael/raphael.min.js"></script>
<script src="../../assets/AdminLTE/plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="../../assets/AdminLTE/plugins/jquery-mapael/maps/usa_states.min.js"></script>
<!-- ChartJS -->
<script src="../../assets/AdminLTE/plugins/chart.js/Chart.min.js"></script>

<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../../assets/AdminLTE/dist/js/pages/dashboard2.js"></script>
<?php
$quotes = [
	[
		'author' => 'Ralph Waldo Emerson',
		'text' => 'Kita harus berarti untuk diri kita sendiri dulu sebelum kita menjadi orang yang berharga bagi orang lain',
	],
	[
		'author' => 'Charles Darwin.',
		'text' => 'Seseorang yang berani membuang satu jam waktunya tidak mengetahui nilai dari kehidupan.',
	],
	[
		'author' => 'Wayne Huizenga',
		'text' => 'Beberapa orang memimpikan kesuksesan, sementara yang lain bangun setiap pagi untuk mewujudkannya.',
	],
	[
		'author' => 'Wayne Dyer',
		'text' => 'Apa yang kita pikirkan menentukan apa yang akan terjadi pada kita. Jadi jika kita ingin mengubah hidup, kita perlu sedikit mengubah pikiran kita',
	],
	[
		'author' => 'Tan Malaka',
		'text' => 'Tujuan pendidikan itu untuk mempertajam kecerdasan, memperkukuh kemauan serta memperhalus perasaan',
	],	
	[
		'author' => 'John D. Rockefeller',
		'text' => 'Rahasia sukses adalah melakukan hal-hal umum yang luar biasa dengan baik',
	],	
	[
		'author' => 'Najwa Shihab',
		'text' => 'Hanya pendidikan yang bisa menyelamatkan masa depan, tanpa pendidikan Indonesia tak mungkin bertahan',
	],	
	[
		'author' => 'Bill Gates',
		'text' => 'Tidak apa-apa untuk merayakan kesuksesan, tapi lebih penting untuk memperhatikan pelajaran tentang kegagalan.',
	],	

];

$quote = $quotes[array_rand($quotes)];
$quoteAuthor = $quote['author'];
$quoteText = $quote['text'];
?>

<script>
   $(function() {
    var Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });
    $('.swalDefaultSuccess').click(function() {
      Toast.fire({
        icon: 'success',
        title: 'Surat sudah berhasil dicetak, silahkan meminta tanda tangan Kepala Sekolah !'
      })
    });
	$('.toastrDefaultInfo').click(function() {
      toastr.info('<?php echo $quoteText ?> - <?php echo $quoteAuthor ?>')
    });
    $('.swalDefaultError').click(function() {
      Toast.fire({
        icon: 'error',
        title: 'Surat Belum Dicetak, mohon untuk mencetak terlebih dahulu!'
      })
    });
    });
</script>

<!-- Script Add Surat Keterangan -->
<script>
		$(function() {
			$("#siswa_sk").change(function(){
				var nama_lengkap = $("#siswa_sk").val();
 
				$.ajax({
					url: 'ajax.php',
					type: 'POST',
					dataType: 'json',
					data: {
						'nama_lengkap': nama_lengkap
					},
					success: function (data_siswa) {
						$("#nis").val(data_siswa['nis']);
						$("#nisn").val(data_siswa['nisn']);
						$("#tempat_lahir").val(data_siswa['tempat_lahir']);
						$("#ttl").val(data_siswa['ttl']);
						if(data_siswa['nama_ayah'] == '-'){
						$("#nama_ortu").val(data_siswa['nama_ibu']);
						} else{
							$("#nama_ortu").val(data_siswa['nama_ortu']);
						}
            $("#kelas").val(data_siswa['kelas']);
					}
				});
			});
		});
	</script>

<!-- Script Add Panggilan Ortu (Data Siswa)-->
<script>
		$(function() {
			$("#nama_lengkap").change(function(){
				var nama_lengkap = $("#nama_lengkap").val();
 
				$.ajax({
					url: 'ajax.php',
					type: 'POST',
					dataType: 'json',
					data: {
						'nama_lengkap': nama_lengkap
					},
					success: function (data_siswa) {
						if(data_siswa['nama_ayah'] == '-'){
						$("#nama_ayah").val(data_siswa['nama_ibu']);
						} else{
							$("#nama_ayah").val(data_siswa['nama_ayah']);
						}
						$("#nama_ibu").val(data_siswa['nama_ibu']);
						$("#kelas").val(data_siswa['kelas']);
					}
				});
			});
		});
	</script>

<!-- Script Add Panggilan Ortu (Data Wali Kelas)-->
<script>
		$(function() {
			$("#nama_walikelas").change(function(){
				var nama_guru = $("#nama_walikelas").val();
 
				$.ajax({
					url: 'ajax_homevisit.php',
					type: 'POST',
					dataType: 'json',
					data: {
						'nama_guru': nama_guru
					},
					success: function (data_guru) {
						if(data_guru['nip_guru'] == '-'){
						$("#nip_walikelas").val('-');
						} else{
							$("#nip_walikelas").val(data_guru['nip_guru']);
						}
						$("#pangkat_walikelas").val(data_guru['pangkat_guru']);
						$("#golongan_walikelas").val(data_guru['golongan_guru']);
					}
				});
			});
		});
	</script>

<!-- Script Add Panggilan Ortu (Data Guru BK)-->
<script>
		$(function() {
			$("#nama_bk").change(function(){
				var nama_guru = $("#nama_bk").val();
 
				$.ajax({
					url: 'ajax_homevisit.php',
					type: 'POST',
					dataType: 'json',
					data: {
						'nama_guru': nama_guru
					},
					success: function (data_guru) {
						if(data_guru['nip_guru'] == '-'){
						$("#nip_bk").val('-');
						} else{
							$("#nip_bk").val(data_guru['nip_guru']);
						}
						$("#pangkat_bk").val(data_guru['pangkat_guru']);
						$("#golongan_bk").val(data_guru['golongan_guru']);
					}
				});
			});
		});
	</script>


	<!-- Script Add Surat Tugas Guru (Data Guru)-->
	<script>
		$(function() {
			$("#nama_guru").change(function(){
				var nama_guru = $("#nama_guru").val();
 
				$.ajax({
					url: 'ajax_homevisit.php',
					type: 'POST',
					dataType: 'json',
					data: {
						'nama_guru': nama_guru
					},
					success: function (data_guru) {
						if(data_guru['nip_guru'] == '-'){
						$("#nip_guru").val('-');
						} else{
							$("#nip_guru").val(data_guru['nip_guru']);
						}
						$("#pangkat_guru").val(data_guru['pangkat_guru']);
						$("#golongan_guru").val(data_guru['golongan_guru']);
					}
				});
			});
		});
	</script>

<script>
var checkbox = document.getElementById("radioPrimary1");
var inputDiv = document.getElementById("nextSetOfComputerOptions");
function addmentor() {
  if (checkbox.checked = true) {
    inputDiv.style.display = "block";
  }
}
function hideInputDiv() {
  inputDiv.style.display = "none";
}
	</script>

<script>
	$(document).ready(function() {
            $("#siswa_sk").select2({
                dropdownParent: $("#add_sk")
            });
        });
</script>

<script>
	$(document).ready(function() {
            $("#nama_lengkap").select2({
                dropdownParent: $("#add_panggilan")
            });
        });
</script>

<script>
	$(document).ready(function() {
            $("#siswa").select2({
                dropdownParent: $("#add_rekomen")
            });
        });
</script>

<script>
$(document).ready(function(){
  $('.toast').toast('show');
});
</script>

<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>

<script>
        $( ".change" ).on("click", function() {
            if( $( "body" ).hasClass( "dark-mode" )) {
                $( "body" ).removeClass( "dark-mode" );
                $( ".change" ).text( "OFF" );
            } else {
                $( "body" ).addClass( "dark-mode" );
                $( ".change" ).text( "ON" );
            }
        });
    </script>

	<script>
		$(function () {
		//-------------
    //- DONUT CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
    var donutData        = {
      labels: [
          'Surat Keterangan',
          'Surat Tugas Guru',
          'Surat Panggilan Orang Tua',
          'Surat Rekomendasi',
          'Surat Kunjungan/Homevisit',
      ],
      datasets: [
        {
          data: [<?php 
					$jumlah_keterangan = mysqli_query($db_conn,"select * from surat_keterangan");
					echo mysqli_num_rows($jumlah_keterangan);
					?>,
				<?php 
					$jumlah_surgas = mysqli_query($db_conn,"select * from surgas_guru");
					echo mysqli_num_rows($jumlah_surgas);
					?>,
				<?php 
					$jumlah_panggilan = mysqli_query($db_conn,"select * from surat_panggilan");
					echo mysqli_num_rows($jumlah_panggilan);
					?>,
				<?php 
					$jumlah_rekomendasi = mysqli_query($db_conn,"select * from rekomendasi");
					echo mysqli_num_rows($jumlah_rekomendasi);
					?>,
				<?php 
					$jumlah_homevisit = mysqli_query($db_conn,"select * from homevisit");
					echo mysqli_num_rows($jumlah_homevisit);
					?>],
          backgroundColor : ['#3c8dbc', '#f39c12', '#00a65a', '#f56954', '#00c0ef'],
        }
      ]
    }
    var donutOptions     = {
      maintainAspectRatio : false,
      responsive : true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    new Chart(donutChartCanvas, {
      type: 'doughnut',
      data: donutData,
      options: donutOptions
    })
})
	</script>
</body>
</html>
