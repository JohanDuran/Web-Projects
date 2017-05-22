<?php 
class eb42319_contact extends ADODB_Active_Record {
	function __construct() {
		parent::__construct();
		$row = $GLOBALS['db']->GetRow("SELECT nextval('eb42319_contacts_id_seq'::regclass) AS id");
		$this->id = $row['id'];
	}
}
?>