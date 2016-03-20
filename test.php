<?php
$wsdl = 'http://localhost/latihan/jayagrosir/jayaservice.wsdl';
$client2 = new SoapClient ( $wsdl );

$hasil = $client2->infojaya();

var_dump($client2->__getFunctions());

echo $hasil->out;//object
echo '<br>';

$hasil2 =$client2->getBarangBekas(array('in'=>2));
$babe= $hasil2->out;

 foreach ($babe as $val){
	//object
	echo $val->desk.'	'.$val->balance;
	echo '<br>';
} 
	

$isi=['desk'=>'percobann 1',
		'balance'=>2,
		'vendor'=>3,
		'tipe'=>4
];
$hasil3=$client2->addbarangbekas($isi);
var_dump($hasil3);
?>