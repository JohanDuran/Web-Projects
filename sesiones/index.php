<?php 
session_start();
$_SESSION['nombre']= 'Johan';
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
	<title>Sessions</title>
</head>
<body>
<h1>Pagina de inicio</h1>
<p></p>
<a href="pagina2.php">ir a pagina 2</a>
</body>
</html>