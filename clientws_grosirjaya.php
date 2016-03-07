<?php
$wsdl = 'http://localhost/latihan/jayagrosir/jayaservice.wsdl';
$client2 = new SoapClient ( $wsdl );

$hasil = $client2->infojaya();

echo $hasil->out;//object
echo '<br>';

$hasil2 =$client2->getBarangBekas(array('in'=>2));
$babe= $hasil2->out;

 /* foreach ($babe as $val){
	//object
	echo $val->desk.'	'.$val->balance;
	echo '<br>';
} 
 */

?>