<?php 	
$conexion = mysql_connect('sql9.freesqldatabase.com', 'sql9133858','nIj7PvN9QI') or die('no se pudo conectar a la BD');

mysql_select_db('sql9133858', $conexion);

$resultados = mysql_query('select * from variablesEntorno');

while ($fila = mysql_fetch_object($resultados)){
	echo $fila->FechaMuestra;
	echo "<br/>";
	echo $fila->Temperatura;
	echo "<br/>";
}

 ?>