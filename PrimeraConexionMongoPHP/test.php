<?php
require 'vendor/autoload.php'; // include Composer goodies

$client = new MongoDB\Client("mongodb://localhost:27017");
$NombrebaseDatos = $client->Muestre; //ingresar a la base de datos Peliculas
$resultados=$NombrebaseDatos->createCollection("primeraMuestra"); //creación de una colección

var_dump($resultados);
?>