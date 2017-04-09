<?php
	if($_SERVER['REQUEST_METHOD']=='POST'){
		$data = json_decode(file_get_contents('php://input'), true);
		$fichero = 'newFile.txt';
		// Abre el fichero para obtener el contenido existente
		$actual = file_get_contents($fichero);
		// Añade una nueva persona al fichero
		$actual .= $data['id1']."\n";
		// Escribe el contenido al fichero
		file_put_contents($fichero, $actual);
		echo "RECIBIDO";
	}
?>