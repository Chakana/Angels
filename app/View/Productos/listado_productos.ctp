<div class="productos index">

	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo __('Listado Simple Productos'); ?></h1>
			</div>
		</div><!-- end col md 12 -->
	</div><!-- end row -->

	<div class="row">

		<div class="col-md-3">
			<div class="actions">
				<div class="panel panel-default">
					<div class="panel-heading">Opciones</div>
						<div class="panel-body">
							<ul class="nav nav-pills nav-stacked">
								<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;Nuevo Producto'), array('action' => 'add'), array('escape' => false)); ?></li>
								<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;Ver Inventario'), array('controller' => 'inventarioproductos', 'action' => 'index'), array('escape' => false)); ?> </li>					
								<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;Ver Movimientos'), array('controller' => 'movimientoproductos', 'action' => 'index'), array('escape' => false)); ?> </li>
								<li><a class="btn btn-lg btn-primary text-right" id="imprimirListadoBtn" href="#">
  				<i class="fa fa-print fa-2x"></i> Imprimir</a></li>
							</ul>
						</div><!-- end body -->
				</div><!-- end panel -->
			</div><!-- end actions -->
		</div><!-- end col md 3 -->
		
		<div id="imprimirListado">
			<div class="page-header">		
			  <hr/>			
			  <h2><?php echo $this->Session->read('nombreEmpresa')?></h2>
			  <h3>Listado Simple de productos</h3>
			  <hr/>			  
			  <h3>Fecha:<small><?php echo date("Y-m-d H:i:s") ?></small></h3>
			</div>	

			<div class="col-md-9">
				<table cellpadding="0" cellspacing="0" class="table table-striped">
					<thead>
						<tr>							
							<th><?php echo $this->Paginator->sort('Codigo Producto'); ?></th>
							<th><?php echo $this->Paginator->sort('Nombre de producto'); ?></th>
						</tr>
					</thead>
					<tbody>
					<?php foreach ($productos as $producto): ?>
						<tr>							
							<td><?php echo h($producto['Producto']['nombreProducto']); ?>&nbsp;</td>
							<td><?php echo h($producto['Producto']['descripcionProducto']); ?>&nbsp;</td>						
						</tr>
					<?php endforeach; ?>
					</tbody>
				</table>

				<p>
					<small><?php echo $this->Paginator->counter(array('format' => __('Pagina numero {:page} de {:pages}, mostrando el registro{:current} del total de {:count} , comenzando con el registro{:start}, finalizando en el registro nro{:end}')));?></small>
				</p>

				<?php
				$params = $this->Paginator->params();
				if ($params['pageCount'] > 1) {
				?>
				<ul class="pagination pagination-sm">
					<?php
						echo $this->Paginator->prev('&larr; Previous', array('class' => 'prev','tag' => 'li','escape' => false), '<a onclick="return false;">&larr; Previous</a>', array('class' => 'prev disabled','tag' => 'li','escape' => false));
						echo $this->Paginator->numbers(array('separator' => '','tag' => 'li','currentClass' => 'active','currentTag' => 'a'));
						echo $this->Paginator->next('Next &rarr;', array('class' => 'next','tag' => 'li','escape' => false), '<a onclick="return false;">Next &rarr;</a>', array('class' => 'next disabled','tag' => 'li','escape' => false));
					?>
				</ul>
				<?php } ?>

			</div> <!-- end col md 9 -->
			</div> <!-- end areaImprimible div -->
	</div><!-- end row -->


</div><!-- end containing of content -->

<script type="text/javascript">
	 $('#imprimirListadoBtn').click(function (event) {	 	
	 	$('#imprimirListado').printElement();
	 });

</script>
