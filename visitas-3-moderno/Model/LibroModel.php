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
		$archivo = fopen('visitas.txt', 'r');
		while($registro = fgets($archivo))
		{
			$visita = explode(':', $registro);
			$this->libro[] = new VisitaModel($visita[0], $visita[1], $visita[3]);
		} // while
		fclose($archivo);
		return $this->libro;
	}

	function grabe(VisitaModel $visita)
	{
		$archivo = fopen('visitas.txt', 'a+');
		if (fwrite($archivo, $visita->serialice()."\n"))
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
}
