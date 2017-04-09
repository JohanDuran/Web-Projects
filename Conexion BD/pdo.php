<?php 
$id = $_GET['id'];

try {
	$conexion = new PDO('mysql:host=localhost; dbname=prueba_consola','root','');
	// echo "conexion OK<br/>";
//metodo query
	// $resultados=$conexion->query("select * from usuarios where id = 1");

	// foreach ($resultados as $fila) {
	// 	echo $fila['nombre'].'<br/>';
	// }
$statement = $conexion->prepare('select * from usuarios where id = :id');
$statement->execute(array(':id'=>$id));
$resultados = $statement->fetch();//FECTALL para obtener todos los valores
print_r($resultados);
} catch (PDOExeption $e) {
	echo "Error: ".$e->getMessage;
}
 ?>