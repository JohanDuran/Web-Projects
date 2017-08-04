<?php

/*
 * Controlador de visitas
 *
 */
class ContactosController extends Controller {
	function index()
	{
	}

	function liste()
	{
		$contact = new eb42319_contact();
		$contactos=$contact->Find('');
		$rows=array();
		foreach ($contactos as $contacto) {
			$row=array();
			$row['id']=$contacto->id;
			$row['nombre']=$contacto->nombre;
			$row['apellidos']=$contacto->apellidos;
			$row['tel_casa']=$contacto->tel_casa;
			$row['dir_casa']=$contacto->dir_casa;
			$row['tel_trabajo']=$contacto->tel_trabajo;
			$row['dir_trabajo']=$contacto->dir_trabajo;
			$row['correo']=$contacto->correo;
			$row['fecha']=$contacto->fecha;
			$rows[]=$row;
		}

		$this->view->assign('contactos', $rows);
	}

	function grabe()
	{
		$contact = new eb42319_contact();
		$contact->nombre=$_POST['nombre'];
		$contact->apellidos=$_POST['apellidos'];
		$contact->tel_casa=$_POST['tel_casa'];
		$contact->dir_casa=$_POST['dir_casa'];
		$contact->tel_trabajo=$_POST['tel_trabajo'];
		$contact->dir_trabajo=$_POST['dir_trabajo'];
		$contact->correo=$_POST['correo'];
		$contact->fecha = date('Y-m-d');
		$estado=$contact->Save();
		if($estado){
			$this->view->assign('mensaje', 'Contacto agregado de forma satisfactoria');
		}else{
			$this->view->assign('mensaje', 'Error al guardar el comentario');
		}
	}

	function agregue(){
	}

	function edite(){
		$contact = new eb42319_contact();
		$id=$_GET['id'];
		$contacto=$contact->Find("id=$id");
		$row=array();
		if ($contacto) {
			$row['id']=$contacto[0]->id;
			$row['nombre']=$contacto[0]->nombre;
			$row['apellidos']=$contacto[0]->apellidos;
			$row['tel_casa']=$contacto[0]->tel_casa;
			$row['dir_casa']=$contacto[0]->dir_casa;
			$row['tel_trabajo']=$contacto[0]->tel_trabajo;
			$row['dir_trabajo']=$contacto[0]->dir_trabajo;
			$row['correo']=$contacto[0]->correo;
			$row['fecha']=$contacto[0]->fecha;
		}
		$this->view->assign('contacto', $row);
	}

	function borre(){
		$contact = new eb42319_contact();
		$id = $_GET['id'];
		if($contact->Load("id=$id")){
			$contact->Delete();
			$contact->Save();
			$this->view->assign('mensaje',"Contacto borrado satisfactoriamente.");
		}else{
			$this->view->assign('mensaje',"Error al borrar el mensaje");
		}

	}

	function sobreescribe(){
		$contact = new eb42319_contact();
		$id=$_POST['id'];
		$row=array();
		if ($contact->Load("id=$id")) {
			$contact->id=$_POST['id'];
			$contact->nombre=$_POST['nombre'];
			$contact->apellidos=$_POST['apellidos'];
			$contact->tel_casa=$_POST['tel_casa'];
			$contact->dir_casa=$_POST['dir_casa'];
			$contact->tel_trabajo=$_POST['tel_trabajo'];
			$contact->dir_trabajo=$_POST['dir_trabajo'];
			$contact->correo=$_POST['correo'];
			$contact->fecha=$_POST['fecha'];
			$contact->Save();
			if ($contact)
			{
				$this->view->assign('mensaje', 'Edición de contacto satifactoria.');
			}
			else
			{
				$this->view->assign('mensaje', 'Error al editar el contacto.');
			}
		}else{
			$this->view->assign('mensaje', 'Error al editar el contacto.');
		}
	}
}
