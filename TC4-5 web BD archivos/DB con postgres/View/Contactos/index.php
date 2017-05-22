<!DOCTYPE html>
<html lang="en">
<head>
  	<?php require("Includes".DS."headers.php");  ?>
  	<title>Contactos</title>
</head>
<body>
	<div class="container-fluid">
		<h1 class="pageCss">Libro de contactos</h1>
	  	<!-- Link para agregar un nuevo contacto -->
	  	<p><a href="<?php echo $_SERVER['PHP_SELF'];?>?action=agregue"><i class="fa fa-plus"></i>Agregar nuevo contacto</a></p>
		<br>
		<table>
			<tr>		
				<th>Id</th>
				<th>Nombre</th>
				<th>Apellidos</th>
				<th>Teléfono de la Casa</th>
				<th>Dirección de la Casa</th>
				<th>Teléfono del Trabajo</th>
				<th>Dirección del Trabajo</th>
				<th>Correo Electrónico</th>
				<th>Fecha</th>
				<th></th>
				<th></th>
			</tr>
			<?php $contador=0; $id='';?>
		  	<?php foreach ($contactos as $contacto) {?>
		  		<tr>
				<?php foreach ($contacto as $key=>$columna) {?>
		    		<td><?=$columna?></td>
					<?php if ($contador==0) {
						$id=$columna;
						$contador++;
					} ?>
				<?php } ?>
				<?php $contador=0; ?>
	    		<td><a href="<?php echo $_SERVER['PHP_SELF'];?>?action=edite&id=<?=$id?>"><i class="fa fa-edit"></i></a></td>
	    		<td><a href="<?php echo $_SERVER['PHP_SELF'];?>?action=borre&id=<?=$id?>"><i class="fa fa-remove"></i></a></td>
			  	</tr>
			<?php } ?>
		</table>	

	  	<!-- Link para agregar un nuevo contacto -->
	  	<br><br>
	  	<p><a href="<?php echo $_SERVER['PHP_SELF'];?>?action=agregue"><i class="fa fa-plus"></i>Agregar nuevo contacto</a></p>
	  	<?php require("Includes".DS."scripts.php");  ?>
	</div>
</body>
</html>