<!DOCTYPE html>
<html lang="en">
<head>
  <?php require("Includes".DS."headers.php");  ?>
  <title>Contactos</title>
</head>
<body> 
	<div class="container-fluid">
		<h1 class="pageCss">Libro de contactos</h1>
		<br><p><a href="<?php echo $_SERVER["PHP_SELF"];?>">Mostrar listado de contactos</a></p>
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" class="">
	 		<input name="action" type="hidden" value="sobreescribe"/>
			<input class="form-control" type="hidden" placeholder="id" value="<?=$contacto['id']?>" name="id">
			<span>Nombre:</span>
			<input type="text" class="form-control" placeholder="Nombre" value="<?=$contacto['nombre']?>" name="nombre">
			<span>Apellidos:</span>
			<input type="text" class="form-control" placeholder="Apellidos" value="<?=$contacto['apellidos']?>" name="apellidos">
			<span>Tel&eacute;fono de la casa:</span>
			<input type="text" class="form-control" placeholder="Tel&eacute;fono de la casa" value="<?=$contacto['tel_casa']?>" name="tel_casa">
			<span>Direcci&oacute;n de la casa:</span>
			<input type="text" class="form-control" placeholder="Direcci&oacute;n de la casa" value="<?=$contacto['dir_casa']?>" name="dir_casa">
			<span>Tel&eacute;fono del trabajo:</span>
			<input type="text" class="form-control" placeholder="Tel&eacute;fono del trabajo" value="<?=$contacto['tel_trabajo']?>" name="tel_trabajo">
			<span>Direcci&oacute;n del trabajo:</span>
			<input type="text" class="form-control" placeholder="Direcci&oacute;n del trabajo" value="<?=$contacto['dir_trabajo']?>" name="dir_trabajo">
			<span>Correo:</span>
			<input type="text" class="form-control" placeholder="Correo" value="<?=$contacto['correo']?>" name="correo">
			<input class="form-control" type="hidden" placeholder="fecha" value="<?=$contacto['fecha']?>" name="fecha"><br>
			<input type="submit" class="btn btn-primary" >
		</form>
		<br><p><a href="<?php echo $_SERVER["PHP_SELF"];?>">Mostrar listado de contactos</a></p>
	</div>
  	<?php require("Includes".DS."scripts.php");  ?>
</body>
</html>