<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Laporan</title>
</head>
<script>
	function cetak() {
		window.print();
	}
</script>
<body onload="cetak()">
	<table style="width:100%;">
		<tr>
			<td align="center">
				<p style="font-size:36px; font-weight:bold; margin:20px 0 0 0;">BANK Sampah Srayan Makarya Purwokerto</p>
				Jl. Gunung Wilis Bobosan Purwokerto Utara Banyumas 53151
			</td>
		</tr>
	</table>
	<br />
	<div style="padding-left:133px;">
		<p style="font-size:25px; font-weight:bold;"><?php echo $title; ?></p>
	</div>
	<table border="1" align="center" style="margin:0 10%; width:80%;">
		<tr>
			<td align="center">No</td>
			<td align="center">Id User</td>
			<td align="center">Nama</td>
			<td align="center">Username</td>
			<td align="center">Password</td>
			<td align="center">Level</td>
		</tr>
			<?php $x=1; foreach($data as $list){ ?>
		<tr>
			<td align="center"><?php echo $x; ?></td>
			<td align="center"><?php echo $list['id']; ?></td>
			<td align="center"><?php echo $list['nama']; ?></td>
			<td align="center"><?php echo $list['username']; ?></td>
			<td align="center"><?php echo $list['password']; ?></td>
			<td align="center"><?php if($list['level']==1){ 
											echo 'Admin';
									 }else if($list['level']==2){
									 		echo 'User';
									 }else{
									 		echo 'Pimpinan'; } ?></td>
		</tr>
			<?php $x=$x+1; } ?>
	</table>
</body>
</body>
</html>
