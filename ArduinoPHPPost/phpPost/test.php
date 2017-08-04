<?php
	if($_SERVER['REQUEST_METHOD']=='GET'){
		//$data = json_decode(file_get_contents('php://input'), true);
		$fichero = 'newFile.txt';
		// Abre el fichero para obtener el contenido existente
		$actual = file_get_contents($fichero);
		// Añade una nueva persona al fichero
		$actual .= $_GET['a'].$_GET['b']."\n";
		// Escribe el contenido al fichero
		file_put_contents($fichero, $actual);
		//fclose($fichero);
		//$v = ['Hola'=>'RECIBIDO'];
		echo 'recibido';
	}
?>