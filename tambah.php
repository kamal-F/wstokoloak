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
		    <li class='aktifnav'><a href='index.php'>home</a></li>		    		    
		  </ul>
		</div>
		<div id="conten">
		<h1>Tambah Barang Loak</h1><br/>
		<?php 
		$wsdl = 'http://localhost/latihan/jayagrosir/jayaservice.wsdl';
		$client2 = new SoapClient ( $wsdl );
		
		//if post
		$desk = $_POST['desk'];
		$balance = $_POST['balance'];
		$vendor = $_POST['vendor'];
		$tipe =  $_POST['tipe'];
		
		if(	isset($desk) && is_numeric($balance) && is_numeric($vendor) && 	is_numeric($tipe))
		{
			//isi ke array
			$isi = ['desk'=>$desk,
					'balance'=>$balance,
					'vendor'=>$vendor,
					'tipe'=>$tipe
			];
			//masukan data ke server, via wsdl
			$hasil3 = $client2->addbarangbekas($isi);
			
			echo $hasil3->out;
		}
		?>		
		<form action="" method="post">
			<p>deskripsi: <input type="text" name="desk"></p>
			<p>balance: <input type="text" name="balance"></p>
			<p>vendor: <input type="text" name="vendor"></p>
			<p>tipe: <input type="text" name="tipe"></p>
			<button type="submit">Tambah</button>
		</form>
		</div>
	</div>
	
	<div id="infobawah">2016</div>
</div>
</body>
</html>