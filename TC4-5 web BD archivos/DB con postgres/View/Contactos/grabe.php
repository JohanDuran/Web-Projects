<!DOCTYPE html>
<html lang="en">
<head>
  <?php require("Includes".DS."headers.php");  ?>
  <title>Contactos</title>
</head>
<body>
	<div class="container-fluid">
		<h1 class="pageCss">Libro de contactos</h1>
		<div class="alert alert-info"><?=$mensaje ?></div>
		<p><a href="<?php $_SERVER["PHP_SELF"];?>?action=agregue"><i class="fa fa-plus"></i>Agregar nuevo contacto</a></p>
		<p><a href="<?php $_SERVER["PHP_SELF"];?>">Mostrar listado de contactos</a></p>
	</div>
  	<?php require("Includes".DS."scripts.php");  ?>
</body>
</html>