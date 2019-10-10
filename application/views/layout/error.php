<script>function eror(){ alert('Uang yang diambil melebihi saldo!');} </script>
<body onLoad="eror()">
  <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
	<div class="container-fluid">
	  <div class="navbar-header">
		<a class="navbar-brand" href="#"><span>E-Coffee Gunungmalang Admin</span></a>
		<ul class="user-menu">
		  <li class="dropdown pull-right">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> <?php echo $this->session->userdata('nama'); ?> <span class="caret"></span></a>
			<ul class="dropdown-menu" role="menu">
			  <li><a href="#"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Profile & Settings</a></li>
			  <li><a href="<?php echo base_url('user/logout'); ?>"><svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> Logout</a></li>
			</ul>
		  </li>
		</ul>
	  </div>						
	</div><!-- /.container-fluid -->
  </nav>
  <div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
	<ul class="nav menu">
	  <li><a href="<?php echo base_url(); ?>"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg> Dashboard</a></li>
	  <li><a href="<?php echo base_url('home/users'); ?>"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> User & Admin</a></li>
	  <li><a href="<?php echo base_url('produk'); ?>"><svg class="glyph stroked laptop computer and mobile"><use xlink:href="#stroked-laptop-computer-and-mobile"/></svg> Produk</a></li>
	  <li><a href="<?php echo base_url('transaksi'); ?>"><svg class="glyph stroked app window with content"><use xlink:href="#stroked-app-window-with-content"/></svg> Transaksi</a></li>
	  <li><a href="<?php echo base_url('pengambilan'); ?>"><svg class="glyph stroked app window with content"><use xlink:href="#stroked-app-window-with-content"/></svg> Pengambilan</a></li>
	  <li><a href="<?php echo base_url('home/laporan'); ?>"><svg class="glyph stroked clipboard with paper"><use xlink:href="#stroked-clipboard-with-paper"/></svg> Laporan</a></li>			
	  <li role="presentation" class="divider"></li>
	</ul>
  </div>