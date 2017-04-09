<?php 

$conexion = mysql_connect('localhost', 'root', '') or die('No se pudo conectar a la bd');

mysql_select_db('prueba_datos', $conexion);

$resultados = mysql_query('SELECT * FROM usuarios');

while($fila = mysql_fetch_array($resultados)){
	echo $fila['nombre'];
	echo "<br>";
}

?>