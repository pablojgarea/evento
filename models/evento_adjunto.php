<?php defined('C5_EXECUTE') or die("Access Denied.");
class Adjunto extends Model{
	public $_table='evento_adjunto';

	public function loadById($id){

		$db = Loader::db();
		$query = 'SELECT * FROM evento_adjunto WHERE id=?';

		$adjuntos = $db->getAll($query,$id);
		$adjunto = $adjuntos[0];

		$this->id = $adjunto['id'];
		$this->titulo_adjunto = $adjunto['titulo_adjunto'];
		$this->adjunto = $adjunto['adjunto'];
		$this->orden = $adjunto['orden'];

	}

	public function borrarAdjuntosEvento($id_evento){

		$db = Loader::db();

		$query = 'delete FROM evento_adjunto WHERE id_evento=?';
		$db->Execute($query,$id_evento);
	}

}

?>