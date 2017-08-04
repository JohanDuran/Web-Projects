<?php 
	require_once 'phpqrcode/qrlib.php';
	require 'vendor/autoload.php';


    $query=conectarBD()->findOne(array());
    $identifier=iterator_to_array($query)['_id'];
    // creates file, final two params are pixel and frame
	QRcode::png("http://192.168.43.8/Proyectos/Web-Projects%20Generals/Qr%20generator/author.php?objid=$identifier", 'qr_objid.png',QR_ECLEVEL_L, 2, 2);  


	$stamp = imagecreatefrompng('qr_objid.png');
	$im = imagecreatefromjpeg('6.jpg');
 	
	// Set the margins for the stamp and get the height/width of the stamp image
	$imx = imagesx($im);
	$imy =imagesy($im);
	$sx = imagesx($stamp);
	$sy =imagesy($stamp);
	$position = ubicacion($_GET['loc'],$imx,$imy,$sx,$sy);
	// Copy the stamp image onto our photo using the margin offsets and the photo 
	// width to calculate positioning of the stamp. 
	imagecopy($im, $stamp,$position[0],$position[1], 0, 0, $sx, $sy);

	// Output and free memory
	header('Content-type: image/png');
	imagepng($im);
	imagedestroy($im);

	function ubicacion($position,$imx,$imy,$sx,$sy)
	{//(0=izq:arriba),(1=der:arriba),(2=der:abajo),(3=izq:abajo) 
		$resultado= array();
		switch ($position) {
			case 0:
				$resultado[0]=1+5;
				$resultado[1]=1+5;
				break;
			case 1:
				$resultado[0]=$imx-$sx-5;
				$resultado[1]=1+5;
				break;
			case 2:
				$resultado[0]=$imx-$sx-5;
				$resultado[1]=$imy-$sy-5;
				break;
			case 3:
				$resultado[0]=1+5;
				$resultado[1]=$imy-$sy-5;
				break;
			default:
				break;
		}
		return $resultado;
	}

	function conectarBD(){
		//Base datos
		try {
	        $connection = new MongoDB\Client;
	        $bd = 'PuntosMuestreo';
	        $collection='DatosCurri';
	        $database = $connection->$bd;
	        $collection = $database->$collection;
	    } catch (MongoConnectionException $e) {
	        echo "Error: " . $e->getMessage();
	    }
	    return $collection;
	}
 ?>