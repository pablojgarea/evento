<?php defined('C5_EXECUTE') or die("Access Denied.");
class Evento extends Model{

	public $_table='evento';

	public function createEvento($miniatura, $titulo, $antetitulo, $descripcion, $enlace, $municipio, $localizacion,$estado,$fecha_inicio, $fecha_fin, $fecha_publicacion, $fecha_fin_publicacion){

		$db = Loader::db();
		$this->miniatura = $miniatura;
		$this->titulo = $titulo;
		$this->antetitulo = $antetitulo;
		$this->descripcion = $descripcion;
		$this->enlace = $enlace;
		$this->municipio = $municipio;
		$this->fecha_inicio = $fecha_inicio;
		$this->fecha_fin = $fecha_fin;
		$this->fecha_publicacion = $fecha_publicacion;
		$this->fecha_fin_publicacion = $fecha_fin_publicacion;
		$query = 'INSERT INTO evento (miniatura, titulo, antetitulo, descripcion, enlace,fecha_inicio, fecha_fin, fecha_publicacion, fecha_fin_publicacion) VALUES (?,?,?,?,?,?,?,?)';
		$values = array($miniatura,$titulo,$antetitulo,$descripcion,$enlace,$fecha_inicio,$fecha_fin,$fecha_publicacion,$fecha_fin_publicacion);
		$db->execute($query,$values);
		$this->id = mysql_insert_id();

		return $this->id;
	}

	public function loadById($id){

		$db = Loader::db();
		$query = 'SELECT * FROM evento WHERE id=?';

		$eventos = $db->getAll($query,$id);
		$evento = $eventos[0];

		$this->id = $evento['id'];
		$this->miniatura = $evento['miniatura'];
		$this->titulo = $evento['titulo'];
		$this->antetitulo = $evento['antetitulo'];
		$this->descripcion = $evento['descripcion'];
		$this->enlace = $evento['enlace'];
		$this->municipio = $evento['municipio'];
		$this->fecha_inicio = $evento['fecha_inicio'];
		$this->fecha_fin = $evento['fecha_fin'];
		$this->fecha_publicacion = $evento['fecha_publicacion'];
		$this->fecha_fin_publicacion = $evento['fecha_fin_publicacion'];				

	}

	public function search($parametros){

		$db = Loader::db();
		$sql_where = '';

		if(!empty($parametros['texto'])){
			$parametros['titulo'] = $parametros['texto'];
			$parametros['descripcion'] = $parametros['texto'];
			$parametros['antetitulo'] = $parametros['texto'];
			$parametros['municipio'] = $parametros['texto'];

		}

		if(!empty($parametros['numero_noticias'])){
			$numero_noticias = $parametros['numero_noticias'];
			unset($parametros['numero_noticias']);
		}
		unset($parametros['fecha_inicio']);
		unset($parametros['fecha_fin']);

		foreach ($parametros as $key => $value) {
			$sql_where .= "(".$key." LIKE '%".$value."%') AND ";
		}
		
		$query = "SELECT id FROM evento WHERE ".$sql_where." 1=1 ";

		$result = $db->Execute($query);
		$lista_eventos = array();

		while ($row = $result->FetchRow()) {

			$nueva_evento = new Evento();
    		$nueva_evento->loadById($row['id']);
    		$lista_eventos[] = $nueva_evento;
		}

		return $lista_eventos;

	}


	public function getEnlaces(){
		$db = Loader::db();
		Loader::model('enlace','evento');

		$query_enlaces = "SELECT id FROM evento_enlace WHERE id_evento=".$this->id;
	
		$result = $db->Execute($query_enlaces);
		$lista_enlaces = array();

		while ($row = $result->FetchRow()) {
			$nueva_enlace = new Enlace();
    		$nueva_enlace->loadById($row['id']);
    		$lista_enlaces[] = $nueva_enlace;
		}

		return $lista_enlaces;
	}

	public function getAdjuntos(){
		$db = Loader::db();
		Loader::model('evento_adjunto','evento');
		
		$query_adjuntos = "SELECT id FROM evento_adjunto WHERE id_evento=".$this->id;
	
		$result = $db->Execute($query_adjuntos);
		$lista_adjuntos = array();

		while ($row = $result->FetchRow()) {
			$nueva_adjunto = new Adjunto();
    		$nueva_adjunto->loadById($row['id']);
    		$lista_adjuntos[] = $nueva_adjunto;
		}

		return $lista_adjuntos;
	}

	public function getCalendarJSON(){
		$data = date('Y-m-d', strtotime("+".$i." days"));
		$out = array();
    	$out = array(
	        'id' => $this->id,
	        'title' => $this->titulo,
	        'url' => 'http://www.google.com',
	        'class' => 'event-important',
	        'start' => strtotime($this->fecha).'000'
	    );
	    return $out;
	}


}
Model::ClassHasMany('Evento','evento_enlace','id_evento');
Model::ClassHasMany('Evento','evento_adjunto','id_evento');
Model::ClassHasMany('Evento','evento_geolocalizacion','id_evento');
?>
