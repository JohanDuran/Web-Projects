<?php session_start();

require 'config.php';
require '../functions.php';

comprobarSession();

$conexion = conexion($bd_config);
if (!$conexion) {
	header('Location: ../error.php');
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$titulo = limpiarDatos($_POST['titulo']);

	$statement = $conexion->prepare(
	'INSERT INTO categorias (categoria)
	VALUES (:titulo)'
	);

	$statement->execute(array(
		':titulo' => $titulo,
	));

	header('Location: '. RUTA . '/admin');
}

require '../views/categoria.view.php';

?>