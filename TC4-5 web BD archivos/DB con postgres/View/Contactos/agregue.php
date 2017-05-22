<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <?php require("Includes".DS."headers.php");  ?>
  <title>Contactos</title>
</head>
<body> 
	<div class="container-fluid">
		<h1 class="pageCss">Libro de contactos</h1>
		<br><p><a href="<?php echo $_SERVER["PHP_SELF"];?>">Mostrar listado de contactos</a></p>
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" class="">
	 		<input name="action" required="required" type="hidden" value="grabe"/>
			<input type="text" required="required" class="form-control" placeholder="Nombre" name="nombre">
			<input type="text" required="required" class="form-control" placeholder="Apellidos" name="apellidos">
			<input type="text" required="required" class="form-control" placeholder="Telefono de la casa" name="tel_casa">
			<input type="text" required="required" class="form-control" placeholder="Dirección de la casa" name="dir_casa">
			<input type="text" required="required" class="form-control" placeholder="Telefono del trabajo" name="tel_trabajo">
			<input type="text" required="required"  class="form-control" placeholder="Dirección del trabajo" name="dir_trabajo">
			<input type="email" required="required" class="form-control" placeholder="Correo" name="correo"><br>
			<input type="submit" required="required" class="btn btn-primary" >
		</form>
		<br><p><a href="<?php echo $_SERVER["PHP_SELF"];?>">Mostrar listado de contactos</a></p>
	</div>
  	<?php require("Includes".DS."scripts.php");  ?>
</body>
</html>