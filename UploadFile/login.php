<?php 
	session_start();
	if (isset($_SESSION['usuario'])) {
		header('Location:cargar.php');
	}
	$error='';
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$usuario = $_POST['usuario'];
	$password = $_POST['password'];
	if($usuario=='lalala'&&$password=="LALALA"){
		$_SESSION['usuario']='javiervasquez';
		header('Location:index.php');
	}else{
		$error="usuario o contraseña incorrectos";
	}
	}
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login</title>
</head>
<body>
	<?php 
	if ($error!='') :?>
		error:<?php echo $error; ?>
	<?php endif; ?>
	 
	<form class="formulario" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
		Usuario: <br>
		<input type="text" placeholder="Usuario" name="usuario"><br><br>
		contraseña: <br>
		<input type="password" placeholder="contraseña" name="password">
		<br><br><input type="submit">
	</form>
</body>
</html>