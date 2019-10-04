<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header"><?php echo $title; ?></h1>
		</div>
	</div><!--/.row-->		
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-body">
					<form id="form" name="lap" action="<?php echo base_url($cont.'/cetakper'); ?>" method="post" enctype="multipart/form-data">
					<table class="table table-striped">
						<thead>
							<tr>
								<td colspan="3">
									<a href="<?php echo base_url($cont.'/cetak'); ?>"><button class="btn btn-primary" type="button">Cetak Laporan</button></a>
								</td>
							</tr>
						</thead>
					</table>
					</form>
				</div>
			</div>					
		</div>
	</div><!--/.row-->
</div>	<!--/.main-->

<script src="<?php echo base_url(); ?>assets/js/jquery-3.2.1.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
<script>
	function cek(){
		if(document.lap.bulan.value==''){
			alert('Pilih bulan');
			return false;
		}else{
			return cek2();
		}
	}
	function cek2(){
		if(document.lap.tahun.value==''){
			alert('Pilih tahun');
			return false;
		}else{
			document.lap.submit();
		}
	}	
	function tambah(){
		$('#form')[0].reset();
		$('#modal_form').modal('show');
		$('.modal-title').text('Tambah Pengguna Baru');
	}
	function save(){
		var url = "<?php echo site_url('user/daftar')?>";
		$.ajax({
			url : url,
			type: "POST",
			data: $('#form').serialize(),
			dataType: "JSON",
			success: function(data){
				$('#modal_form').modal('hide');
				location.reload();
			},
			error: function (jqXHR, textStatus, errorThrown){
				alert(textStatus);
			}
		});
	}
	function hapus(id){
		if(confirm('Are you sure delete this data?')){
			$.ajax({
				url : "<?php echo site_url('user/hapus/')?>"+id,
				type: "POST",
				dataType: "JSON",
				success: function(data){            
					location.reload();
				},
				error: function (jqXHR, textStatus, errorThrown){
					alert('Error deleting data');
				}
			});
		}
	}
	!function ($) {
		$(document).on("click","ul.nav li.parent > a > span.icon", function(){          
			$(this).find('em:first').toggleClass("glyphicon-minus");      
		}); 
		$(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
	}(window.jQuery);
	$(window).on('resize', function () {
		if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
	})
	$(window).on('resize', function () {
		if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
	})
</script>	
<script src="<?php echo base_url(); ?>assets/js/bootstrap-table.js"></script>		
</body>
</html>
