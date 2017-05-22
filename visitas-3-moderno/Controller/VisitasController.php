<?php

/*
 * Controlador de visitas
 *
 */
class VisitasController extends Controller {
	function index()
	{
	}

	function liste()
	{
		$libro = new LibroModel();
		$this->view->assign('visitas', $libro->liste());
	}

	function grabe()
	{
		$libro = new LibroModel();
		$visita = new VisitaModel($_POST['nombre'], $_POST['correo'], $_POST['comentario']);
		if ($libro->grabe($visita))
		{
			$this->view->assign('mensaje', 'Su comentario ha sido recibido satisfactoriamente.');
		}
		else
		{
			$this->view->assign('mensaje', 'Su comentario no se pudo guardar.');
		}
	}
}
