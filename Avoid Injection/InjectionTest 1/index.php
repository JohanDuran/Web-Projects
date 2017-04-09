<?php 
/*setcookie("username","admin", time()-3600);
setcookie("password","xss", time()-3600);
setcookie("username","normalUser", time()-3600);
setcookie("password","hackeado", time()-3600);*/

if (isset($_POST['submit'])) {
	if(isset($_POST['content'])&&isset($_POST['user'])&&isset($_POST['password'])){
		if($_POST['user']=='admin'){	
			setcookie("username",$_POST['user'], time()+3600);
			setcookie("password",$_POST['password'], time()+3600);
			$fp = fopen('comments.txt', 'a');
			fwrite($fp, 'Administrador dice: <br>'.$_POST['content']."<br>\n");
			fclose($fp);
		}else{
			setcookie("username",$_POST['user'], time()+3600);
			setcookie("password",$_POST['password'], time()+3600);
			$fp = fopen('comments.txt', 'a');
			fwrite($fp, $_POST['user'].' dice: <br>'.$_POST['content']."<br>\n");
			fclose($fp);	
		}
	}
}
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>injection stored XSS</title>
</head>
<body>


<form action="<?php echo $_SERVER["PHP_SELF"] ;?>" method="POST" style="background: #B69797;padding: 0% 10% 0% 10%;height: 1000px">
	<h1 style="text-align: center;">Cross site scripting</h1>
    <input type="text" name="user" id="" placeholder="Usuario" required>
    <input type="password" name="password" id="" placeholder="Contraseña" required> <br><br>
    <textarea name="content" rows="3" cols="100" placeholder="Commentario" required></textarea>
    <br>

    <input type="submit" name="submit" value="Submit">
<form>
<div id="nuevo" style="background: #CBC5E7;text-align: center; ">
<h1 style="background: #B6F7DB";>Comentarios:</h1> <br>	
	<?php
			echo nl2br(file_get_contents('comments.txt'));			
	 ?>
</div>
</body>
</html>

