<?php defined('C5_EXECUTE') or die("Access Denied.");
class Geolocalizacion extends Model{
	public $_table='evento_geolocalizacion';

	public function loadById($id){

		$db = Loader::db();
		$query = 'SELECT * FROM evento_geolocalizacion WHERE id=?';

		$geolocalizaciones = $db->getAll($query,$id);
		$geolocalizacion = $geolocalizaciones[0];

		$this->id = $geolocalizacion['id'];
		$this->titulo = $geolocalizacion['titulo'];
		$this->descripcion = $geolocalizacion['descripcion'];
		$this->direccion = $geolocalizacion['direccion'];
		$this->latitud = $geolocalizacion['latitud'];
		$this->longitud = $geolocalizacion['longitud'];
		$this->zoom = $geolocalizacion['zoom'];		
		$this->orden = $geolocalizacion['orden'];

	}

	public function borrarGeolocalizacionesEvento($id_evento){

		$db = Loader::db();

		$query = 'delete FROM evento_geolocalizacion WHERE id_evento=?';
		$db->Execute($query,$id_evento);
	}

}

?>