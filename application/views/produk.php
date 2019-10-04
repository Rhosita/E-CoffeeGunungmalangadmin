<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
  <div class="row">
	<div class="col-lg-12">
	  <h1 class="page-header">Produk</h1>
	</div>
  </div><!--/.row-->
  <div class="row">
    <div class="col-lg-12">
	  <div class="panel panel-default">
		<div class="panel-body">
		  <table class="table table-striped">
			<thead>
			  <tr>
				<th>Nama</th>
				<th>Harga</th>
				<th>Keterangan</th>
				<th>Gambar</th>
				<th>Action</th>
			  </tr>
			</thead>
			<tbody>
			<?php foreach($data_p as $list) { ?>
			  <tr>
				<td><?php echo $list['nama_barang']; ?></td>
				<td><?php echo $list['harga']; ?></td>
				<td><?php echo $list['ket']; ?></td>
				<td><img src="<?php echo base_url(); ?>/assets/uploads/images/<?php echo $list['gambar']; ?>" width="50px"></td>
				<td><button class="btn btn-warning" onclick="edit(<?php echo $list['id_barang']; ?>)"><i class="glyphicon glyphicon-pencil"></i></button>
					<button class="btn btn-danger" onclick="hapus(<?php echo $list['id_barang']; ?>)"><i class="glyphicon glyphicon-remove"></i></button></td>
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
  <button class="btn btn-primary" type="button" onclick="tambah()">Tambah Produk</button>
	<div class="modal fade" id="modal_form" role="dialog">
	  <div class="modal-dialog">
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h3 class="modal-title"></h3>
		  </div>
		  <div class="modal-body form">
			<form id="form" action="<?php echo base_url('produk/tambah'); ?>" method="post" enctype="multipart/form-data">
			  <div class="form-body">
				<input type="hidden" name="id">
				<div class="form-group">
				  <label>Nama Barang</label>
				  <input type="text" class="form-control" placeholder="Nama barang" name="nama">
				</div>
				<div class="form-group">
				  <label>Harga</label>
				  <input type="number" class="form-control" placeholder="harga barang" name="harga">
				</div>
				<div class="form-group">
				  <label>Keterangan</label>
				  <textarea class="form-control" placeholder="Tulis keterangan barang disini" name="keterangan"></textarea>
				</div>
				<div class="form-group">
				  <label>Gambar</label>
				  <input type="hidden" name="gambar">
				  <input type="file" name="foto">
				  <div class="alert alert-warning">
					<strong>Perhatian!</strong><br>
					Ukuran Max 2MB.<br>
					Format file harus gif/jpg/png/jpeg
				  </div>
				</div>
			  </div>
			  <button type="submit" id="btnSave" class="btn btn-primary">Save</button>
			</form>
		  </div>
		  <div class="modal-footer">
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
	  $('.modal-title').text('Tambah Produk');
	}
	function edit(id){
	  $('#form')[0].reset();
	  $.ajax({
        url : "<?php echo site_url('produk/edit')?>/" + id,
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
	  if(confirm('Are you sure delete this data?')){
		$.ajax({
		  url : "<?php echo site_url('produk/hapus/')?>"+id,
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
