<?php defined('C5_EXECUTE') or die(_("Access Denied."));

class EventoPackage extends Package {

     protected $pkgHandle = 'evento';
     protected $appVersionRequired = '5.3.0';
     protected $pkgVersion = '1.0';

     public function getPackageDescription() {
          return t("Gestión de eventos.");
     }

     public function getPackageName() {
          return t("Eventos");
     }
     public function on_start() {
      
          $html = Loader::helper("html");
          $v = View::getInstance();
          $v->addHeaderItem($html->css("evento.css", "evento"));
     }

     public function install() {
          $pkg = parent::install();
     
          Loader::model('single_page'); 
          SinglePage::add('/dashboard/eventos/add',$pkg);
          SinglePage::add('/dashboard/eventos/lista_eventos',$pkg);

          //Frontend Blocktype:
          $this->getOrInstallBlockType($pkg, 'listado_evento');
          $this->getOrInstallBlockType($pkg, 'calendario_bootstrap');

     }



     private function getOrInstallBlockType($pkg, $btHandle) {
          $bt = BlockType::getByHandle($btHandle);
          if (empty($bt)) {
               BlockType::installBlockTypeFromPackage($btHandle, $pkg);
               $bt = BlockType::getByHandle($btHandle);
          }
          return $bt;
     }
     
}