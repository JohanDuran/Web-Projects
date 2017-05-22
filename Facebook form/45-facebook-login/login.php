<?php 
if($_SERVER['REQUEST_METHOD']=='POST'){
	$user = $_POST['email'];
	$password=$_POST['password'];
	echo "<h1>Busca la contraseña con wireshark</h1>";
	$data="email: ".$user." password: ".$password;
	echo $data;
	$fichero = 'contrasenas.txt';
	// Abre el fichero para obtener el contenido existente
	$actual = file_get_contents($fichero);
	// Añade una nueva persona al fichero
	echo $actual;
	$actual .= $data;
	// Escribe el contenido al fichero
	file_put_contents($fichero, $actual);
}

?>