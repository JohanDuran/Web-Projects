<?php
		try {
			$connection = new new MongoClient();
		}
		catch (MongoConnectionException $e) {
			die("No se ha podido conectar a la base de datos " . $e->getMessage());
		}
?>