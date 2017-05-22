<?php

/**
 * Modelo Visita.
 *
 */
class ContactoModel
{
	/**
	 * Constructor
	 */
	function __construct($ident='',$nombre,$apellido,$telCasa,$dirCasa,$telTrabajo,$dirTrabajo, $correo,$fecha='')
	{
		if($ident==''){//se está insertando
			$data = @file_get_contents("identificadores.txt");
			if($data == ''){
				$ident = 0;
				file_put_contents("identificadores.txt", $ident);
			}else{//se está listando
				$ident = intval($data)+1;
				file_put_contents("identificadores.txt", $ident);
			}
			$this->id=$ident;
		}else{
			$this->id=$ident;
		}

		$this->nombre = $nombre;
		$this->apellido=$apellido;
		$this->telCasa=$telCasa;
		$this->dirCasa=$dirCasa;
		$this->telTrabajo=$telCasa;
		$this->dirTrabajo=$dirTrabajo;
		$this->correo = $correo;
		if($fecha==''){//se está insertando
			$this->fecha = date('d/m/Y');
		}else{//se está listando
			$this->fecha=$fecha;
		}
	}


	function serialice(){
		return 	$this->id.":".$this->nombre.":".$this->apellido.":".$this->telCasa.":".$this->dirCasa.":".$this->telTrabajo.":".$this->dirTrabajo.":".$this->correo.":".$this->fecha; 
	}


}
