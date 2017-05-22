<?php

define('DS', DIRECTORY_SEPARATOR);
define('TEMPLATE_DIR', 'View' . DS);
define('BASE_DIR', getcwd() . DS);
require __DIR__ . DS.'vendor'.DS.'autoload.php';
require __DIR__ . DS.'vendor'.DS.'adodb'.DS.'adodb-php'.DS.'adodb-active-record.inc.php';
$db = NewADOConnection('postgres9://eb42319:eb42319@localhost/ci2413');
$dictionary = NewDataDictionary($db);
$dictionary->SetSchema('eb42319');
ADOdb_Active_Record::SetDatabaseAdapter($db);

/*$valores=$db->Execute("SELECT *
  FROM eb42319.eb42319_contactos;
");
var_dump($valores->getRows());*/
// Acá debería haber algún tipo de boostrapping o un llamado a una clase que
// se encargue de hacerlo.
//
// Ver un ejemplo en:  http://phpsnaps.com/snaps/view/bootstrap-php-code/
//
// Por supuesto, adaptado a la estructura que estamos manejando.

spl_autoload_register(
	function ($class)
	{
		preg_match('/^(?<name>\w+)(?<function>(Controller|Model)){1}$/', $class, $matches);
		switch (@$matches['function']) {
			case 'Controller':
				require_once('Controller' . DS . $class . '.php');
				break;
			case 'Model':
				require_once('Model' . DS . $class . '.php');
				break;  
			default:
				if($class=="eb42319_contact"){
					require_once('Model'.DS.'eb42319_contact.php');
				}else{
					require_once('Ekeke' . DS . $class . '.class.php');
				}
		} // switch
	}
);

$visitasController = new ContactosController();

?>