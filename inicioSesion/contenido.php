<?php session_start();
if(isset($_SESSION['usuario'])){
	//echo $_SESSION['usuario'];
	require 'views/contenido.view.html';
}else{
	header('Location: login.php');
}

 ?>


 <!--en este archivo podemos mostrar contenido solo de un usuario especifico-->