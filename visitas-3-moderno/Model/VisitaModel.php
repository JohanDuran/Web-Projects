<?php

/**
 * Modelo Visita.
 *
 */
class VisitaModel
{
	/**
	 * Constructor
	 */
	function __construct($nombre, $correo, $comentario)
	{
		$this->nombre = $nombre;
		$this->correo = $correo;
		$this->fecha = date('d/m/Y');
		$this->comentario = $comentario;
	}

	function serialice(){
		return $this->nombre.':'.$this->correo.':'.$this->fecha.':'.str_replace("\n", '<br />',  str_replace("\r\n", '<br />', $this->comentario));
	}
}
