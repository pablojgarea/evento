<?php defined('C5_EXECUTE') or die("Access Denied.");
class Enlace extends Model{
	public $_table='evento_enlace';

	public function loadById($id){

		$db = Loader::db();
		$query = 'SELECT * FROM evento_enlace WHERE id=?';

		$enlaces = $db->getAll($query,$id);
		$enlace = $enlaces[0];

		$this->id = $enlace['id'];
		$this->titulo = $enlace['titulo'];
		$this->enlace = $enlace['enlace'];
		$this->orden = $enlace['orden'];

	}

	public function borrarEnlacesEvento($id_evento){

		$db = Loader::db();

		$query = 'delete FROM evento_enlace WHERE id_evento=?';
		$db->Execute($query,$id_evento);
	}

}

?>