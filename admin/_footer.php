<?php
if(isset($_SESSION['logged']) && !empty($_SESSION['logged'])){
?>

	<footer class="footer">
		<div class="container">
		<p class="text-muted">&copy; <?=$hsl['tahun'] ?> &middot; Richo Maylano Yozienanda &middot; <?=$hsl['sekolah'] ?></p>
		</div>
	</footer>
</body>
    
<script>	
$(document).ready(function() {
  $("#siswa").select2({
	width: '100%',
    dropdownParent: $("#add_sk")
  });
});
</script>

<script>	
$(document).ready(function() {
  $("#nama_siswa").select2({
	width: '100%',
    dropdownParent: $("#add_rekomendasi")
  });
});
</script>

    
<script>	
$(document).ready(function() {
  $("#nama_lengkap").select2({
	width: '100%',
    dropdownParent: $("#add_homevisit")
  });
});
</script>

<script>	
$(document).ready(function() {
  $("#nama_guru").select2({
	width: '100%',
    dropdownParent: $("#add_homevisit")
  });
});
</script>

<script>	
$(document).ready(function() {
  $("#nama_guru2").select2({
	width: '100%',
    dropdownParent: $("#add_homevisit")
  });
});
</script>

<script>	
$(document).ready(function() {
  $("#guru").select2({
	width: '100%',
    dropdownParent: $("#add_surgas_guru")
  });
});
</script>

<script>	
$(document).ready(function() {
  $("#nama_lengkap2").select2({
	width: '100%',
    dropdownParent: $("#add_panggilan")
  });
});
</script>



<!-- Notifikasi Pesan Surat Keterangan -->
		<script>
            $(document).ready(function(){setTimeout(function(){$("#add_msg").fadeIn('slow');}, 500);});
            setTimeout(function(){$("#add_msg").fadeOut('slow');}, 3000);
        </script>
		<script>
            $(document).ready(function(){setTimeout(function(){$("#del_msg").fadeIn('slow');}, 500);});
            setTimeout(function(){$("#del_msg").fadeOut('slow');}, 3000);
        </script>
		<script>
            $(document).ready(function(){setTimeout(function(){$("#edit_msg").fadeIn('slow');}, 500);});
            setTimeout(function(){$("#edit_msg").fadeOut('slow');}, 3000);
        </script>
		<script>
            $(document).ready(function(){setTimeout(function(){$("#id_sama").fadeIn('slow');}, 500);});
            setTimeout(function(){$("#id_sama").fadeOut('slow');}, 3000);
        </script>

    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.bootstrap5.min.js"></script>

    


</html>
<?php
} else {
	header('Location: ../');
}
?>