<?php defined('C5_EXECUTE') or die("Access Denied.");

$form = Loader::helper('form');

$dtt = Loader::helper('form/date_time');

?>

<div id="ccm-dashboard-content" class="evento">
<div class="ccm-ui">

	<?php
		$dashboard = Loader::helper('concrete/dashboard');
		echo $dashboard->getDashboardPaneHeader('Edición Evento');
	?>
<div class="ccm-pane-body">
<form class="formulario-edicion-evento form-horizontal" action="<?php echo $this->action('save')?>" method="POST">
	<div class="clearfix form-group">
		<?php echo $form->label('Imagen', t('imagen')); ?>
		<div class="input "><?php 
	                        $alh = Loader::helper('concrete/asset_library');
	                        $miniatura = $evento['miniatura'];
	                        $imagen = File::getByID($miniatura);
	                        echo $alh->image('miniatura', 'miniatura', t('Selecciona una imagen'), $imagen); 
	    				?></div>
    </div>

    <div class="clearfix form-group">
		<?php echo $form->label('titulo', t('Título')); ?>
		<div class="input "><?php echo $form->text('titulo',$evento['titulo']) ?></div>
	</div>
    <div class="clearfix form-group">
		<?php echo $form->label('antetitulo', t('Antetítulo')); ?>
		<div class="input "><?php echo $form->text('antetitulo',$evento['antetitulo']) ?></div>
	</div>
    <div class="clearfix form-group">
		<?php echo $form->label('descripcion', t('Descripcion')); ?>
		<div class="input "><?php echo $form->textarea('descripcion',$evento['descripcion'])?></div>
	</div>
	<div class="clearfix form-group">
		<div class="input ui-widget">
			<?php echo $form->label('municipio', t('Municipio')); ?>		
			<select id="combobox" name="municipio">
				<option value=""></option>
				<option value="abegondo">Abegondo</option>
				<option value="concellodeames">Ames</option>
				<option value="aranga">Aranga</option>
				<option value="ares">Ares</option>
				<option value="arteixo">Arteixo</option>
				<option value="arzua">Arzúa</option>
				<option value="abana">A Baña</option>
				<option value="bergondo">Bergondo</option>
				<option value="betanzos">Betanzos</option>
				<option value="boimorto">Boimorto</option>
				<option value="boiro">Boiro</option>
				<option value="boqueixon">Boqueixón</option>
				<option value="brion">Brión</option>
				<option value="cabana">Cabana de Bergantiños</option>
				<option value="cabanas">Cabanas</option>
				<option value="camarinas">Camariñas</option>
				<option value="cambre">Cambre</option>
				<option value="acapela">A Capela</option>
				<option value="carballo">Carballo</option>
				<option value="carnota">Carnota</option>
				<option value="carral">Carral</option>
				<option value="cedeira">Cedeira</option>
				<option value="cee">Cee</option>
				<option value="cerceda">Cerceda</option>
				<option value="cerdido">Cerdido</option>
				<option value="coiros">Coirós</option>
				<option value="corcubion">Corcubión</option>
				<option value="coristanco">Coristanco</option>
				<option value="acoruna">A Coruña</option>
				<option value="culleredo">Culleredo</option>
				<option value="curtis">Curtis</option>
				<option value="concellodedodro">Dodro</option>
				<option value="dumbria">Dumbría</option>
				<option value="fene">Fene</option>
				<option value="ferrol">Ferrol</option>
				<option value="fisterra">Fisterra</option>
				<option value="frades">Frades</option>
				<option value="irixoa">Irixoa</option>
				<option value="laxe">Laxe</option>
				<option value="alaracha">Laracha</option>
				<option value="lousame">Lousame</option>
				<option value="malpicadebergantinos">Malpica de Bergantiños</option>
				<option value="manon">Mañón</option>
				<option value="mazaricos">Mazaricos</option>
				<option value="melide">Melide</option>
				<option value="mesia">Mesía</option>
				<option value="mino">Miño</option>
				<option value="moeche">Moeche</option>
				<option value="monfero">Monfero</option>
				<option value="mugardos">Mugardos</option>
				<option value="muxia">Muxía</option>
				<option value="muros">Muros</option>
				<option value="naron">Narón</option>
				<option value="neda">Neda</option>
				<option value="concellodenegreira">Negreira</option>
				<option value="noia">Noia</option>
				<option value="oleiros">Oleiros</option>
				<option value="ordes">Ordes</option>
				<option value="oroso">Oroso</option>
				<option value="ortigueira">Ortigueira</option>
				<option value="outes">Outes</option>
				<option value="concellodeozacesuras">Oza-Cesuras</option>
				<option value="paderne">Paderne</option>
				<option value="padron">Padrón</option>
				<option value="opino">O Pino</option>
				<option value="apobra">A Pobra do Caramiñal</option>
				<option value="ponteceso">Ponteceso</option>
				<option value="pontedeume">Pontedeume</option>
				<option value="aspontes">As Pontes de García Rodríguez</option>
				<option value="portodoson">Porto do Son</option>
				<option value="rianxo">Rianxo</option>
				<option value="ribeira">Ribeira</option>
				<option value="rois">Rois</option>
				<option value="sada">Sada</option>
				<option value="sansadurnino">San Sadurniño</option>
				<option value="santacomba">Santa Comba</option>
				<option value="santiago">Santiago de Compostela</option>
				<option value="santiso">Santiso</option>
				<option value="sobrado">Sobrado dos Monxes</option>
				<option value="assomozas">As Somozas</option>
				<option value="teo">Teo</option>
				<option value="toques">Toques</option>
				<option value="tordoia">Tordoia</option>
				<option value="touro">Touro</option>
				<option value="trazo">Trazo</option>
				<option value="valdovino">Valdoviño</option>
				<option value="valdodubra">Val do Dubra</option>
				<option value="vedra">Vedra</option>
				<option value="vilasantar">Vilasantar</option>
				<option value="vilarmaior">Vilarmaior</option>
				<option value="vimianzo">Vimianzo</option>
				<option value="concellodezas">Zas</option>
				<option value="concellodecarino.com">Cariño</option>
				<option value="consorcioam">Consorcio As Mariñas</option>
			</select>
		</div>
	</div>
	
   	<div class="fechas-evento ccm-pane ccm-pane-body form-group">
	    <div class="clearfix col-md-6 col-lg-6">
			<?php echo $form->label('fecha_inicio', t('Fecha')); ?>
			<?php echo $dtt->datetime('fecha_inicio', date($evento['fecha_inicio']), false,true); $dtt->translate('fecha_inicio');?>
			
		</div>
	    <div class="clearfix col-md-6 col-lg-6">
			<?php echo $form->label('fecha_fin', t('Fecha Fin')); ?>
			<?php echo $dtt->datetime('fecha_fin', date($evento['fecha_fin']), false,true); $dtt->translate('fecha_fin');?>
			
		</div>
	    <div class="clearfix col-md-6 col-lg-6">
			<?php echo $form->label('fecha_publicacion', t('Fecha publicación')); ?>
			<?php echo $dtt->datetime('fecha_publicacion', date($evento['fecha_publicacion']), false,true); $dtt->translate('fecha_publicacion');?>
			
		</div>
	    <div class="clearfix col-md-6 col-lg-6">
			<?php echo $form->label('fecha_fin_publicacion', t('Fecha fin publicación')); ?>
			<?php echo $dtt->datetime('fecha_fin_publicacion', date($evento['fecha_fin_publicacion']), false,true); $dtt->translate('fecha_fin_publicacion');?>
			
		</div>
	</div>
	<div class="listado-adjuntos">
	<h3 class="titulo-enlaces" style="display:none;"></h3>
	<?php $i=0; 
	if($lista_enlaces){
		?>
	<?php foreach($lista_enlaces as $enlace):?>
		<div class="enlace-evento  ccm-pane ccm-pane-body item">
			<a href="" class="borrar-enlace btn danger">Borrar</a>
    		<div class="clearfix form-group">
			<label class='control-label'>Título</label><?php echo $form->text('titulo[]',$enlace->titulo);?>
			</div>
    		<div class="clearfix form-group">
    			<label class='control-label'>Enlace</label><?php echo $form->text('enlace[]',$enlace->enlace);?>
    		</div>
			<?php echo $form->hidden('orden[]',$enlace->orden);?>
					
		</div>
	<?php $i++; endforeach; }
	?>


	<h3 class="titulo-adjuntos" style="display:none;"></h3>
	<?php $i=0; 
	if($lista_adjuntos){
		?>
	<?php foreach($lista_adjuntos as $evento_adjunto):?>
		<div class="adjunto-evento  ccm-pane ccm-pane-body item">

    		<div class="clearfix form-group">
    		<a href="" class="borrar-adjunto btn danger">Borrar</a>		
			<label class='control-label'>Título</label><?php echo $form->text('titulo_adjunto[]',$evento_adjunto->titulo_adjunto);?>
			</div>
    		<div class="clearfix form-group">
    		<label class='control-label'>Adjunto</label><div class="input "><?php 
	                        $lh = Loader::helper('concrete/asset_library');
	                        $adjunto = File::getByID($evento_adjunto->adjunto);
	                        echo $lh->file('adjunto'.$i, 'adjunto[]', t('Selecciona un adjunto'), $adjunto ); 
	    				?></div>	
    			
    		</div>
			<?php echo $form->hidden('orden_adjunto[]',$evento_adjunto->orden);?>
				
		</div>
	<?php $i++; endforeach; }
	?>

	
	<h3 class="titulo-geolocalizaciones" style="display:none;"></h3>
	<?php $i=0; 
	if($lista_geolocalizaciones){
		?>
	<?php foreach($lista_geolocalizaciones as $evento_geolocalizacion):?>
		<div class="geolocalizacion-evento  ccm-pane ccm-pane-body">
			<a href="" class="borrar-geolocalizacion btn danger">Borrar</a>	
    		<div class="clearfix form-group">
    			<label class='control-label'>Título</label><?php echo $form->text('titulo_geolocalizacion[]',$evento_geolocalizacion->titulo);?>
			</div>
			<div class="clearfix form-group">
				<label class='control-label'>Descripcion</label><?php echo $form->textarea('descripcion_geolocalizacion[]',$evento_geolocalizacion->descripcion);?>
			</div>
			<div class="clearfix form-group">
				<label class='control-label'>Dirección</label><?php echo $form->textarea('direccion_geolocalizacion[]',$evento_geolocalizacion->direccion);?>
			</div>
			<div class="clearfix form-group">
				<fieldset class="gllpLatlonPicker">
					<input type="text" class="gllpSearchField"><input type="button" class="gllpSearchButton" value="Buscar">
					lat/lon: <input type="text" class="gllpLatitude" id="latitud[]" name="latitud[]" value="<?php echo $evento_geolocalizacion->latitud;?>"/> / <input type="text"  id="longitud[]" name="longitud[]" class="gllpLongitude" value="<?php echo $evento_geolocalizacion->longitud;?>"/>,
					zoom: <input id="zoom[]"  name="zoom[]" type="text" class="gllpZoom" value="<?php echo $evento_geolocalizacion->zoom;?>"/> <input type="button" class="gllpUpdateButton" value="Actualiza mapa">
					<br/>
					<div class="gllpMap">Google Maps</div>
				</fieldset>
			</div>

			
			<?php echo $form->hidden('orden_geolocalizacion[]',$evento_geolocalizacion->orden);?>
				
		</div>
	<?php $i++; endforeach; }
	?>



</div>

<a href="javascript:void(0)" class="nuevo-adjunto btn btn-primary">Añadir Adjunto</a>
<a href="" class="nuevo-enlace btn btn-primary">Añadir Enlace</a>
<a href="" class="nuevo-geolocalizacion btn btn-primary">Añadir Localización</a>

</div>
 	<div class="ccm-pane-footer">
 		<div class="dialog-buttons">
			<input class="btn btn-primary" type="submit" value="Save">
			<a href="<?php echo $this->url('/dashboard/eventos/lista_eventos')?>" class="btn">Cancel</a>
			<?php if($evento['id']): ?>
			  <?php echo $form->hidden('id',$evento['id']); ?>
			<?php endif; ?>
		</div>
	</div>
</form>
</div>
</div>



<script type="text/javascript">
$( document ).ready(function() {


	function nuevoAdjunto(n_adjuntos){
		
		var fichero_adjunto = '<div class="input "> \
				<div id="adjunto'+n_adjuntos+'-fm-selected" onclick="ccm_chooseAsset=false" class="ccm-file-selected-wrapper" style="display: none"> \
					<img src="/webc5/updates/concrete5.6.3.1_updater/concrete/images/throbber_white_16.gif"> \
				</div> \
				<div class="ccm-file-manager-select" id="adjunto-fm-display" ccm-file-manager-field="adjunto'+n_adjuntos+'" style="display: block"> \
					<a href="javascript:void(0)" onclick="ccm_chooseAsset=false; ccm_alLaunchSelectorFileManager(\'adjunto'+n_adjuntos+'\')">Selecciona un adjunto</a> \
				</div><input id="adjunto'+n_adjuntos+'-fm-value" type="hidden" name="adjunto[]" value="0"> \
			</div>';

		var div_adjunto = "<div class='adjunto-evento  ccm-pane ccm-pane-body item'><a href='' class='borrar-adjunto btn danger'>Borrar</a><div class='clearfix form-group'><label class='control-label'>Título</label>\
		<input id='titulo_adjunto[]' type='text' name='titulo_adjunto[]' value='' class='ccm-input-text'></div><div class='clearfix form-group'><label for='adjunto' class='control-label'><label class='control-label'>Adjunto</label></label>\  "
		+fichero_adjunto+"</div><input id='orden_adjunto[]' type='hidden' name='orden_adjunto[]' value='' class='ccm-input-text'>\
					</div>";

		div_adjunto = div_adjunto + '<script type="text/javascript"> \
		$(function() \
		 { ccm_triggerSelectFile(1692, \'adjunto['+n_adjuntos+']\'); } \
		);</sc'+'ript>';

		
		return div_adjunto;	
	}


	$(".nuevo-adjunto").click(function(event) {
		event.preventDefault();
		var n_adjuntos = $('.listado-adjuntos').children('.adjunto-evento').size();

		// var ultimo_adjunto = $(this).closest('.listado-adjuntos').children('.adjunto-evento').last();
		// if(ultimo_adjunto.length == 0){
		// 	ultimo_adjunto = $(this).closest('.listado-adjuntos').children('.titulo-adjuntos');
		// 	ultimo_adjunto.css('display','block'); 
		// }
		$(".listado-adjuntos").append(nuevoAdjunto(n_adjuntos));

		$(this).closest('.listado-adjuntos').on('click', '.borrar-adjunto', function(event) {
			event.preventDefault();
			$(this).parent().closest('.adjunto-evento').remove();
		});		
		ordenacion();
	});



});
</script>
