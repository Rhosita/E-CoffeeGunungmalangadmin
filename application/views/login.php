<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Admin</title>

<link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url(); ?>assets/css/styles.css" rel="stylesheet" type="text/css">

<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->

</head>

<body>
	
	<div class="row">
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-default">
				<div class="panel-heading">Login E-Coffee Gunungmalang</div>
				<?php if($this->session->flashdata('gagal')){?><p><strong><?php echo $this->session->flashdata('gagal');}?></strong></p>
				<div class="panel-body">
					<form action="<?php echo base_url(); ?>user/login" method="post" onsubmit="return validasi_input(this)">
						<fieldset>
							<div class="form-group">
								<input class="form-control" placeholder="Username" name="username" type="text" autofocus="">
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Password" name="password" type="password" value="">
							</div>
							<button type="submit" class="btn btn-primary">Login</button>
						</fieldset>
					</form>
				</div>
			</div>
		</div><!-- /.col-->
	</div><!-- /.row -->	
	<script src="<?php echo base_url(); ?>assets/js/jquery-3.2.1.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
	<script type="text/javascript">
	function validasi_input(form){
		if (form.username.value == ""){
			alert("USERNAME masih kosong!");
			form.username.focus();
			return (false);
		}
		if (form.password.value == ""){
			alert("PASSWORD masih kosong!");
			form.password.focus();
			return (false);
		}
		pola_username=/^[a-zA-Z0-9\_\-]{4,32}$/;
		if (!pola_username.test(form.username.value)){
		alert ('USERNAME minimal 4 karakter, maksimal 32 karakter dan hanya boleh Huruf, Angka dan "-" atau "_"!');
		form.username.focus();
		return false;
		}
		if (!pola_username.test(form.password.value)){
		alert ('PASSWORD minimal 4 karakter, maksimal 32 karakter dan hanya boleh Huruf, Angka dan "-" atau "_"!');
		form.password.focus();
		return false;
		}
		return (true);
	}
</script>
</body>

</html>
