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
				<p style="font-size:36px; font-weight:bold; margin:20px 0 0 0;">E-Coffee Gunungmalang</p>
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
			<td align="center">Nama User</td>
			<td align="center">Nama Barang</td>
			<td align="center">Jumlah Produk</td>
			<td align="center">Total</td>
			<td align="center">Tanggal</td>
		</tr>
			<?php $x=1; foreach($data as $list){ ?>
		<tr>
			<td align="center"><?php echo $x; ?></td>
			<td align="center"><?php echo $list['nama']; ?></td>
			<td align="center"><?php echo $list['nama_barang']; ?></td>
			<td align="center"><?php echo $list['ttl_produk']; ?></td>
			<td align="center"><?php echo $list['ttl_harga']; ?></td>
			<td align="center"><?php echo $list['tgl']; ?></td>
		</tr>
			<?php $x=$x+1; } ?>
	</table>
</body>
</body>
</html>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>
</body>
</html>
