<?php 	
$conexion = mysql_connect('127.0.0.1', 'root', '') or die('no se pudo conectar a la BD');

mysql_select_db('prueba_consola', $conexion);

$resultados = mysql_query('select * from usuarios');


while ($fila = mysql_fetch_object($resultados)){
	echo $fila->id;
	echo $fila->nombre;
	echo "<br/>";
}

 ?>