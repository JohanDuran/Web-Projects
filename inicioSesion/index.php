<?php session_start();

function contar_visitas(){
	$archivo = 'cantidadVisitas.txt';
	if (file_exists($archivo)) {
		$cuenta = file_get_contents($archivo)+1;
		file_put_contents($archivo, $cuenta);
		return $cuenta;
	}else{
		file_put_contents($archivo, 1);		
		return 1;
	}
}

contar_visitas();

if (isset($_SESSION['usuario'])) {
	header('Location: contenido.php');
}else{
	header('Location: registrate.php');
}

 ?>
<!--
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Contador de visitas</title>
</head>
<body>
	<div class="visitantes">
		<p class="numero"><?php echo contar_visitas() ?></p>
		<p class="texto">Visitas</p>
	</div>
</body>
</html>
-->