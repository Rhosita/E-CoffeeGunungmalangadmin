<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Data Pengguna</h1>
		</div>
	</div><!--/.row-->		
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">Pimpinan</div>
				<div class="panel-body">
					<table class="table table-striped">
						<thead>
							<tr>
								<th>Nama</th>
								<th>Username</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach($data_p as $list) { ?>
								<tr class="header expand">
									<td><?php echo $list['nama']; ?></td>
									<td><?php echo $list['username']; ?></td>	
									<td>
									<button class="btn btn-warning" onclick="edit(<?php echo $list['id']; ?>)"><i class="glyphicon glyphicon-pencil"></i></button>
									<button class="btn btn-danger" onclick="hapus(<?php echo $list['id']; ?>)"><i class="glyphicon glyphicon-remove"></i></button>
									</td>			
								</tr>
								<?php
							}
							?>
						</tbody>
					</table>
				</div>
			</div>
			<div class="panel panel-default">
				<div class="panel-heading">Admin</div>
				<div class="panel-body">
					<table class="table table-striped">
						<thead>
							<tr>
								<th>Nama</th>
								<th>Username</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach($data_admin as $list) { ?>
								<tr class="header expand">
									<td><?php echo $list['nama']; ?></td>
									<td><?php echo $list['username']; ?></td>				
								</tr>
								<?php
							}
							?>
						</tbody>
					</table>
				</div>
			</div>				
			<div class="panel panel-default">
				<div class="panel-heading">Data User</div>
				<div class="panel-body">
					<table class="table table-striped">
						<thead>
							<tr>
								<th>Nama</th>
								<th>Username</th>
								<th>Action</th>
							</tr>		    
						</thead>
						<tbody>
							<?php foreach($data_user as $list) { ?>
								<tr class="header expand">
									<td><?php echo $list['nama']; ?></td>
									<td><?php echo $list['username']; ?></td>
									<td>
									<button class="btn btn-warning" onclick="edit(<?php echo $list['id']; ?>)"><i class="glyphicon glyphicon-pencil"></i></button>
									<button class="btn btn-danger" onclick="hapus(<?php echo $list['id']; ?>)"><i class="glyphicon glyphicon-remove"></i></button>
									</td>
								</tr>
								<?php
							}
							?>
						</tbody>
					</table>
				</div>
			</div>	
		</div>
	</div><!--/.row-->
	<button class="btn btn-primary" type="button" onclick="tambah()">Tambah Pengguna</button>
	<div class="modal fade" id="modal_form" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h3 class="modal-title"></h3>
				</div>
				<div class="modal-body form">
					<form action="#" id="form" class="form-horizontal">
						<div class="form-body">
							<div class="form-group">
								<label class="control-label col-md-3">Nama</label>
								<div class="col-md-9">       
									<input name="nama" id="nama" placeholder="Nama Lengkap" class="form-control" type="text">
								</div>
								<label class="control-label col-md-3">Alamat</label>
								<div class="col-md-9">           
									<input name="alamat" id="alamat" placeholder="Alamat Lengkap" class="form-control" type="text">
								</div>
								<label class="control-label col-md-3">Nomor Telepon</label>
								<div class="col-md-9">           
									<input name="notel" id="notel" placeholder="Nomor Telepon" class="form-control" type="text">
								</div>
								<label class="control-label col-md-3">Username</label>
								<div class="col-md-9">           
									<input name="username" id="username" placeholder="username" class="form-control" type="text">
								</div>
								<label class="control-label col-md-3">Password</label>
								<div class="col-md-9">           
									<input name="password" id="password" placeholder="Password" class="form-control" type="text">
								</div>
								<label class="control-label col-md-3">Jenis Akses</label>
								<div class="col-md-9">
									<select name="level" class="form-control">
										<option value="3">Pimpinan</option>
										<option value="1">Admin</option>
										<option value="2">User</option>
									</select>       
								</div>
								<input type="text" name="id" id="id" style="visibility:hidden;" />
							</div>
						</div>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
					<button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div>
</div>	<!--/.main-->

<script src="<?php echo base_url(); ?>assets/js/jquery-3.2.1.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
<script>
	function tambah(){
		$('#form')[0].reset();
		$('#modal_form').modal('show');
		$('.modal-title').text('Tambah Pengguna Baru');
	}
	
	function edit(id){
	  $('#form')[0].reset();
	  $.ajax({
        url : "<?php echo site_url('user/ubah')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
            $('[name="id"]').val(data.id);
            $('[name="nama"]').val(data.nama);
            $('[name="alamat"]').val(data.alamat);
            $('[name="notel"]').val(data.no_tlp);
            $('[name="username"]').val(data.username);
            $('[name="password"]').val(data.password);
			$('[name="level"]').val(data.level);
            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Edit User'); // Set title to Bootstrap modal title
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
	  
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
