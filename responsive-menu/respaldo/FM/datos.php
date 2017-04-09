<?php 
$datos='';
for ($i=0; $i < 25; $i++) { 
	$datos.=rand(2000,2020) ;
	$datos.=" ";
}

$datos.=" , ";
for ($i=25; $i < 50; $i++) { 
	$datos.=rand(0,100);
	$datos.=" ";	
}

echo $datos;

?>