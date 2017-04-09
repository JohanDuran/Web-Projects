<?php require 'header.php'; ?>

<div class="contenedor">
	<div class="post">
		<article>
			<h2 class="titulo">Nueva Categoría</h2>
			<form class="formulario" method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
				<input type="text" name="titulo" placeholder="Titulo de Categoría">
				<input type="submit" value="Crear Categoría">
			</form>
		</article>
	</div>
</div>

<?php require 'footer.php'; ?>