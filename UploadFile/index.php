<?php
	session_start();
	if(isset($_SESSION['usuario'])){
		header('Location:cargar.php');
		//require 'vista/index_vista.php';
	}else{
		header('Location:login.php');
	}
 ?>