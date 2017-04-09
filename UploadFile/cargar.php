<?php 
session_start();
if (!isset($_SESSION['usuario'])) {
	header('Location:login.php');
}

?>
<!DOCTYPE html>
<html>
<body>

<form action="upload.php" method="post" enctype="multipart/form-data">
    <br>
    Seleccione archivo a subir:
    <input type="file" name="file" id="fileToUpload">
    <input type="submit" value="Upload file" name="submit">
</form>

</body>
</html>