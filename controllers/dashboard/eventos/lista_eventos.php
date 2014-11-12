<?php defined('C5_EXECUTE') or die("Access Denied.");
class DashBoardEventosListaEventosController extends Controller{

	public function view(){
		Loader::model('evento','evento');

		$evento = new Evento();

		$lista_eventos = $evento->find('1=1');

		$this->set('lista_eventos',$lista_eventos);

	}

	public function delete($id){

		Loader::model('evento','evento');

		$evento = new Evento();

		$evento->load('id=?',$id);

		$evento->delete();

		//falta borrar adjuntos y enlaces
		
		$this->redirect('/dashboard/eventos/lista_eventos');
	}
}

?>