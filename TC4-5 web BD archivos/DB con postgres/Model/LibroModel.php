<?php

/**
 * Modelo Libro.  Un libro de visitas tiene dos posibles métodos grabe y liste.
 *
 */
class LibroModel
{
	function liste()
	{
		$this->libro = array();
		$archivo = fopen('contactos.txt', 'r');
		while($registro = fgets($archivo))
		{
			$contacto = explode(':', $registro);
			$this->libro[] = new ContactoModel($contacto[0], $contacto[1],$contacto[2], $contacto[3],$contacto[4], $contacto[5], $contacto[6],$contacto[7],$contacto[8]);
		} // while
		fclose($archivo);
		return $this->libro;
	}

	function grabe(ContactoModel $contacto)
	{
		$archivo = fopen('contactos.txt', 'a+');
		if (fwrite($archivo, $contacto->serialice()."\n"))
		{
			fclose($archivo);
			return true;
		}
		else
		{
			fclose($archivo);
			return false;
		}
	}

	function borre($id){
		$handle = fopen("contactos.txt", 'r');

		$lineas = array();
		while ($linea=fgets($handle)) {
			$lineas[] = $linea;
		}

		$cantidadLineas = count($lineas);
		$contador=0;
		$newText ='';
		foreach ($lineas as $linea) {
			$columnas = explode(":", $linea);
			if(trim($columnas[0])!=trim($id)){
				$newText.=$linea;
				$contador++;
			}
		}
		if ($contador!=$cantidadLineas) {
			fclose($handle);
			$archivo = fopen('contactos.txt', 'w');
			if(!fwrite($archivo, $newText)){
				fclose($archivo);
				return true;
			}
			fclose($archivo);
			return true;
		}else{
			return false;
		}
	}

	function edite($id){
		$this->contact = array();
		$archivo = fopen('contactos.txt', 'r');
		while($registro = fgets($archivo))
		{
			$contacto = explode(':', $registro);
			if($contacto[0]==$id){
				$this->contact[] = new ContactoModel($contacto[0], $contacto[1],$contacto[2], $contacto[3],$contacto[4], $contacto[5], $contacto[6],$contacto[7],$contacto[8]);
				fclose($archivo);
				return $this->contact;
			}
		} // while
		return $this->contact;
	}

	function sobreescribe($id, $contactoSerial){
		$handle = fopen("contactos.txt", 'r');

		$lineas = array();
		while ($linea=fgets($handle)) {
			$lineas[] = $linea;
		}

		$cantidadLineas = count($lineas);
		$contador=0;
		$newText ='';
		foreach ($lineas as $linea) {
			$columnas = explode(":", $linea);
			if(trim($columnas[0])!=trim($id)){
				$newText.=$linea;
				$contador++;
			}else{
				$newText.=$contactoSerial;
			}
		}
		if ($contador!=$cantidadLineas) {
			fclose($handle);
			$archivo = fopen('contactos.txt', 'w');
			if(!fwrite($archivo, $newText)){
				fclose($archivo);
				return false;
			}
			fclose($archivo);
			return true;
		}else{
			return false;
		}
	}
}
