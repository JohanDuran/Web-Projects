<?php 
require '../../vendor/autoload.php';
	if($_SERVER["REQUEST_METHOD"]=="GET"){
		$objId=$_GET['objid'];
		$item = conectarBD()->findOne(['_id'=>new MongoDB\BSON\ObjectID($objId)]);
		$item = iterator_to_array($item);
		$obligatorios=$item['Muestra']['obligatorios'];
		$opcionales=$item['Muestra']['opcionales'];
		$location=$item["POI"]["location"];
		$date =$item["Muestra"]['fecha']->toDateTime()->format('d-m-Y');
		$estacion =$item["POI"]['nombre_estacion'];
		$institucion=$item["POI"]['nombre_institucion'];
		$author=$item["Muestra"]['usuario'];
		require 'view_author.php';
	}
	
	function conectarBD(){
		//Base datos
		try {
	    	$client = new MongoDB\Client(
		    'mongodb://localhost:27017',
		    [
		        'username' => 'lector',
		        'password' => 'WatMonCR2017',
		        'authSource' => 'MonitoreoAgua',
		    ]);
	        $database = $client->MonitoreoAgua;
	        $collection = $database->puntosMuestreo;
	    } catch (MongoConnectionException $e) {
	        echo "Error: " . $e->getMessage();
	    }

	    return $collection;
	}

 ?>