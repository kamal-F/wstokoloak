<!doctype html>
<html>
<head>
<title>TOKO LOAK (JSON)</title>
<link rel="stylesheet" type="text/css" href="css/latih.css" />
<link rel="shortcut icon" href="images/test.ico">

</head>
<body>


	<div id="bungkus">
		<div id="headerjson">TOKO LOAK (JSON)</div>

		<div id="wrapnavconten">
			<div id="navigasi">
				<ul>
					<li class='aktifnav'><a href='#'>home</a></li>
				</ul>
			</div>
			<div id="conten">
				<h1>Info Barang Loak</h1>
				<br />
		<?php
		include 'jsonklien.php';
		?>		
		<table border="1" class="cTableBarang">
					<tr>
						<th>Deskripsi</th>
						<th>Tersedia</th>
					</tr>
		<?php
		
		foreach ( $phpArray->data as $key ) {
			echo '<tr><td>' . $key->data->desk . '</td><td>' . $key->data->balance . '</td></tr>';
		}
		?>		
		</table>
			</div>
		</div>

		<div id="infobawahjson">2016</div>
	</div>
</body>
</html>