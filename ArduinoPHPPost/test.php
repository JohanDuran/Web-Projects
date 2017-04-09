<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	echo $_POST['data'];
	$valorR = $_POST['data'];
	try {
		$conexion = new PDO('mysql:host=127.0.0.1;dbname=test', 'root@localhost', '');
	} catch (PDOException $e) {
		echo "Error".$e->getMessage();
	}
		$statement = $conexion->prepare('INSERT INTO pruebapost(Valor) VALUES (:valorR)');
		$statement->execute(array(':valorR' => $valorR));
}else{
	echo "sin valores que mostrar";
}
	
?>