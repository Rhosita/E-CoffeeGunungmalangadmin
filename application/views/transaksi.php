		<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
			<div class="row">
				<div class="col-lg-12">
					<h1 class="page-header">Data Transaksi</h1>
				</div>
			</div><!--/.row-->
			<div class="row">
				<div class="col-lg-12">
					<div class="panel panel-default">
						<div class="panel-body">
							<table class="table table-striped">
								<thead>
									<tr>
										<th>Id Transaksi</th>
										<th>Nama User</th>
										<th>Nama Produk</th>
										<th>Total</th>
										<th>Harga</th>
										<th>Tanggal Setor</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach($data_p as $list) { ?>
										<tr>
											<td><?php echo $list['id_trs']; ; ?></td>
											<td><?php echo $list['nama']; ?></td>
											<td><?php echo $list['nama_barang']; ?></td>
											<td><?php echo $list['ttl_produk']; ?></td>
											<td><?php echo $list['ttl_harga']; ?></td>
											<td><?php echo $list['tgl']; ?></td>			
											<td><button class="btn btn-danger" onclick="hapus(<?php echo $list['id_trs']; ?>)"><i class="glyphicon glyphicon-remove"></i></button></td>
											</tr>
											<?php
										}
										?>
									</tbody>
								</table>
							</div>
						</div>
					</div>			
				</div>
				<button class="btn btn-primary" type="button" onclick="tambah()">Tambah</button>
				<div class="modal fade" id="modal_form" role="dialog">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								<h3 class="modal-title"></h3>
							</div>
							<div class="modal-body form">
								<form id="form" action="<?php echo base_url('transaksi/tambah'); ?>" method="post" enctype="multipart/form-data">
								  	<div class="form-body">
										<input type="hidden" name="id">
										<div class="form-group">
									  		<label>Barang</label>
									  		<select name="barang" class="form-control">
												<option value="">Nama Barang</option>
												<?php foreach($data_i as $list){ ?>
													<option value="<?php echo $list['id_barang']; ?>"><?php echo $list['nama_barang']; ?></option>
												<?php } ?>
											</select>
										</div>
										<div class="form-group">
									  		<label>Nama</label>
									  		<select name="user" class="form-control">
												<option value="">Nama User</option>
												<?php foreach($data_u as $list){ ?>
													<option value="<?php echo $list['id']; ?>"><?php echo $list['nama']; ?></option>
												<?php } ?>
											</select>
										</div>
										<div class="form-group">
									  		<label>Total</label>
									  		<input type="number" class="form-control" placeholder="Total(dalam satuan Kilogram)" name="total">
										</div>
										<div class="form-group">
									  		<label>Tanggal Setor</label>
									  		<input type="text" class="form-control" readonly="true" value="<?php echo date('Y-m-d'); ?>" name="tgl">
										</div>
								  </div>
								</form>
							</div>
							<div class="modal-footer">
								<button type="button" id="btnSave" onclick="document.getElementById('form').submit();" class="btn btn-primary">Tambah</button>
								<button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
							</div>
						</div><!-- /.modal-content -->
					</div><!-- /.modal-dialog -->
				</div>
			</div>

			<script src="<?php echo base_url(); ?>assets/js/jquery-3.2.1.min.js"></script>
			<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
			<script>	
				$(document).ready(function(){

					var no =1;
					$('#tambah').click(function(){
						no++;
						$('#dynamic').append('<tr id="row'+no+'"><td><input type="text" name="name[]" placeholder="Masukkan Nama" class="form-control" /></td><td><button type="button" id="'+no+'" class="btn btn-danger btn_remove">Hapus</button></td></tr>');
					});

					$(document).on('click', '.btn_remove', function(){
						var button_id = $(this).attr("id"); 
						$('#row'+button_id+'').remove();
					});
				});															
				function tambah(){
					$('#form')[0].reset();

					$('#modal_form').modal('show');
					$('.modal-title').text('Tambah Transaksi');
				}
				function save(){
					$.ajax({
						url : "<?php echo site_url('transaksi/tambah')?>",
						type: "POST",
						data: $('#form').serialize(),
						dataType: "JSON",
						success: function(data){
							$('#modal_form').modal('hide');
							//location.reload();
							console.log(data);
						},
						error: function (jqXHR, textStatus, errorThrown){
							alert(textStatus);
						}
					});
				}
				function edit(id){
					$('#form')[0].reset();
					$.ajax({
						url : "<?php echo site_url('transaksi/edit')?>/" + id,
						type: "GET",
						dataType: "JSON",
						success: function(data)
						{
							$('[name="id"]').val(data.id_barang);
							$('[name="nama"]').val(data.nama_barang);
							$('[name="harga"]').val(data.harga);
							$('[name="keterangan"]').val(data.ket);
							$('[name="gambar"]').val(data.gambar);
		            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
		            $('.modal-title').text('Edit Produk'); // Set title to Bootstrap modal title
		        },
		        error: function (jqXHR, textStatus, errorThrown)
		        {
		        	alert('Error get data from ajax');
		        }
		    });

				}

				function hapus(id){
					if(confirm('Anda yakin ingin hapus data?')){
						$.ajax({
							url : "<?php echo site_url('transaksi/hapus/')?>"+id,
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

