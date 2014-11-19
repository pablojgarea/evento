<?php defined('C5_EXECUTE') or die("Access Denied.");
class DashboardEventosAddController extends Controller{

	public function save(){
		Loader::model('evento','evento');
		Loader::model('enlace','evento');
		Loader::model('evento_adjunto','evento');
		Loader::model('evento_geolocalizacion','evento');

		$dtt = Loader::helper('form/date_time');
		$evento=new Evento();
		$enlace=new Enlace();
		$adjunto=new Adjunto();
		$geolocalizacion=new Geolocalizacion();

		if($this->post('id')){
			$evento->load('id=?',$this->post('id'));
			$enlaces_evento = $enlace->find('id_evento=?',$this->post('id'));
			$adjuntos_evento = $adjunto->find('id_evento=?',$this->post('id'));
			$geolocalizaciones_evento = $geolocalizacion->find('id_evento=?',$this->post('id')); 
			
			//borrar enlaces de esta evento
			$enlace->borrarEnlacesEvento($this->post('id'));
			$adjunto->borrarAdjuntosEvento($this->post('id'));
			$geolocalizacion->borrarGeolocalizacionesEvento($this->post('id'));
		}

		$evento->miniatura = $this->post('miniatura');

		$evento->titulo = $this->post('titulo');

		$evento->antetitulo = $this->post('antetitulo');

		$evento->descripcion = $this->post('descripcion');

		$evento->enlace = $this->post('enlace');

		$evento->fecha_inicio = $dtt->translate('fecha_inicio');

		$evento->fecha_fin = $dtt->translate('fecha_fin');

		$evento->fecha_publicacion = $dtt->translate('fecha_publicacion');

		$evento->fecha_fin_publicacion = $dtt->translate('fecha_fin_publicacion');

		$evento->replace();

		$i=0;
		//enlaces
        foreach ($_POST['titulo'] as $key => $value){
        	//para cada título, nuevo evento
        	$enlace=new Enlace();
        	$enlace->id_evento = $evento->id;
        	$enlace->titulo=$value;
        	$i=array_search($key,array_keys($_POST['titulo']));

        	$enlace->enlace=$_POST['enlace'][$i];
        	$enlace->orden=$_POST['orden'][$i];
        	$enlace->save();
        }

        //ficheros
        foreach ($_POST['titulo_adjunto'] as $key => $value){
        	//para cada título, nuevo evento
        	$adjunto=new Adjunto();
        	$adjunto->id_evento = $evento->id;
        	$adjunto->titulo_adjunto=$value;
        	$i=array_search($key,array_keys($_POST['titulo_adjunto']));

        	$adjunto->adjunto=$_POST['adjunto'][$i];
        	$adjunto->orden=$_POST['orden_adjunto'][$i];
        	$adjunto->save();
        }

                //ficheros
        foreach ($_POST['titulo_geolocalizacion'] as $key => $value){
        	//para cada título, nuevo evento
        	$geolocalizacion=new Geolocalizacion();
        	$geolocalizacion->id_evento = $evento->id;
        	$geolocalizacion->titulo=$value;
        	$i=array_search($key,array_keys($_POST['titulo_geolocalizacion']));

        	$geolocalizacion->descripcion=$_POST['descripcion_geolocalizacion'][$i];
        	$geolocalizacion->direccion=$_POST['direccion_geolocalizacion'][$i];
        	$geolocalizacion->latitud=$_POST['latitud'][$i];
        	$geolocalizacion->longitud=$_POST['longitud'][$i];
        	$geolocalizacion->zoom=$_POST['zoom'][$i];
        	$geolocalizacion->orden=$_POST['orden_geolocalizacion'][$i];
        	$geolocalizacion->save();
        }

		$this->redirect('/dashboard/eventos/lista_eventos');
	}

	public function edit($id){
		Loader::model('evento','evento');

		$evento = new Evento();
		
		$evento->load('id=?',$id);

		$this->set('evento',(array)$evento);

		//cargamos enlaces asociados
		Loader::model('enlace','evento');

		$enlace = new Enlace();

		$lista_enlaces = $enlace->find('id_evento=?',$id);

		$this->set('lista_enlaces',$lista_enlaces);

		//cargamos adjuntos asociados
		Loader::model('evento_adjunto','evento');

		$adjunto = new Adjunto();

		$lista_adjuntos = $adjunto->find('id_evento=?',$id);

		$this->set('lista_adjuntos',$lista_adjuntos);

		//cargamos geolocalizaciones asociados
		Loader::model('evento_geolocalizacion','evento');

		$geolocalizacion = new Geolocalizacion();

		$lista_geolocalizaciones = $geolocalizacion->find('id_evento=?',$id);

		$this->set('lista_geolocalizaciones',$lista_geolocalizaciones);

		$html = Loader::helper('html');

//		$this->addHeaderItem($html->javascript('maps-api.js?sensor=false','evento'));
//		$this->addHeaderItem($html->javascript('jquery-2.1.1.min.js','evento'));
		$this->addHeaderItem('<script src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>');
		$this->addHeaderItem($html->css('jquery-gmaps-latlon-picker.css','evento'));
		$this->addHeaderItem($html->javascript('jquery-gmaps-latlon-picker.js','evento'));
		$this->addHeaderItem($html->javascript('formulario.js','evento'));
	}
	public function add(){
		$html = Loader::helper('html');

//		$this->addHeaderItem($html->javascript('maps-api.js?sensor=false','evento'));
//		$this->addHeaderItem($html->javascript('jquery-2.1.1.min.js','evento'));
		$this->addHeaderItem('<script src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>');
		$this->addHeaderItem($html->css('jquery-gmaps-latlon-picker.css','evento'));
		$this->addHeaderItem($html->javascript('jquery-gmaps-latlon-picker.js','evento'));
		$this->addHeaderItem($html->javascript('formulario.js','evento'));
	}

}

?>