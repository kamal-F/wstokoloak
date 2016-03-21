<!doctype html>
<html>
<head>
<title>TOKO LOAK (SOAP WSDL)</title>
<link rel="stylesheet" type="text/css" href="css/latih.css" />
<link rel="shortcut icon" href="images/test.ico">

</head>
<body>


<div id="bungkus">
	<div id="header"> TOKO LOAK (SOAP WSDL)</div>
	
	<div id="wrapnavconten">		
		<div id="navigasi">
		  <ul>
		    <li class='aktifnav'><a href='#'>home</a></li>
		    <li class='aktifnav'><a href='tambah.php'>tambah</a></li>		    
		  </ul>
		</div>
		<div id="conten">
		<h1>Info Barang Loak</h1><br/>
		<?php 
		include 'clientws_grosirjaya.php';		
		?>		
		<table border="1" class="cTableBarang">
		<tr><th>Deskripsi</th><th>Tersedia</th></tr>
		<?php 
		foreach ($babe as $val){
			echo '<tr><td>'.$val->desk.'</td><td>'.$val->balance.'</td></tr>';			
		}		
		?>		
		</table>
		</div>
	</div>
	
	<div id="infobawah">2013</div>
</div>
</body>
</html>