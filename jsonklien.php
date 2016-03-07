<?php
$batas = 1;

$pesan = array (
		"batas" => $batas 
);

$c = curl_init ();
curl_setopt ( $c, CURLOPT_RETURNTRANSFER, 1 );
curl_setopt ( $c, CURLOPT_HTTPHEADER, array (
		'Accept: application/json',
		'Content-Type: application/json' 
) );

curl_setopt ( $c, CURLOPT_URL, 'http://localhost/latihan/jayagrosir/jsonserver.php' );
// curl_setopt ( $ch, CURLOPT_SSL_VERIFYPEER, false );
curl_setopt ( $c, CURLOPT_POSTFIELDS, json_encode ( $pesan ) );

$data = curl_exec ( $c );
curl_close ( $c );

$phpArray = json_decode ( $data );

// var_dump($phpArray);
/*
 * foreach ($phpArray->data as $key) { echo $key->data->desc; }
 */
?>