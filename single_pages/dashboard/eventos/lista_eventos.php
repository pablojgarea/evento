<?php defined('C5_EXECUTE') or die("Access Denied.");
?>

<div class="ccm-ui">
	<?php
	$dashboard = Loader::helper('concrete/dashboard');
	echo $dashboard->getDashboardPaneHeader('Listado de eventos');
	?>
	<div class="ccm-pane-body">
	<table class="table table-bordered">
		<tr>
			<th>ID</th>
			<th>Miniatura</th>
			<th>T&iacute;tulo</th>
			<th>Antet&iacute;tulo</th>
			<th>Descripc&iacute;on</th>
			<th>Fecha Inicio</th>
			<th>Fecha Fin</th>
			<th>Fecha Publicaci&oacute;n</th>
			<th>Fecha Fin Publicaci&oacute;n</th>
		</tr>
		<?php foreach ($lista_eventos as $evento): ?>
		<tr>
			<td><?php echo $evento->id ?></td>
			<td>                            <?php 
                                        $imagen = File::getByID($evento->miniatura);
                                        $ih = Loader::helper('image');
                                        $thumb = $ih->getThumbnail($imagen, 100, 100, true);
                                        ?>
                                        <img src="<?php echo $thumb->src; ?>" width="<?php echo $thumb->width; ?>" height="<?php echo $thumb->height; ?>" alt="" />
			</td>
			<td><?php echo $evento->titulo ?></td>
			<td><?php echo $evento->antetitulo ?></td>
			<td><?php echo $evento->descripcion ?></td>
			<td><?php echo date($evento->fecha_inicio) ?></td>
			<td><?php echo date($evento->fecha_fin) ?></td>
			<td><?php echo date($evento->fecha_publicacion) ?></td>
			<td><?php echo date($evento->fecha_fin_publicacion) ?></td>

			<td>
				<a href="<?php echo $this->url('/dashboard/eventos/add/edit',$evento->id)?>" class="btn">Editar</a>
				<a href="<?php echo $this->url('/dashboard/eventos/delete',$evento->id)?>" class="btn danger">Borrar</a>
			</td>
		</tr>
		<?php endforeach; ?>


		</table>	
		<a href="<?php echo $this->url('/dashboard/eventos/add')?>" class="btn btn-primary">Añadir</a>
	</div>