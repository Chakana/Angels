<div class="productos index">

	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo __('Productos Inactivos'); ?></h1>
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
								<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;Ver Productos'), array('action' => 'index'), array('escape' => false)); ?> </li>	
								<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;Nuevo Producto'), array('action' => 'add'), array('escape' => false)); ?></li>
								<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;Ver Inventario'), array('controller' => 'inventarioproductos', 'action' => 'index'), array('escape' => false)); ?> </li>					
								<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;Ver Movimientos'), array('controller' => 'movimientoproductos', 'action' => 'index'), array('escape' => false)); ?> </li>
								<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;Listado Simple de Productos'), array('action' => 'listadoProductos'), array('escape' => false)); ?></li>
							</ul>
						</div><!-- end body -->
				</div><!-- end panel -->
			</div><!-- end actions -->
		</div><!-- end col md 3 -->

		<div class="col-md-9">
			<table cellpadding="0" cellspacing="0" class="table table-striped">
				<thead>
					<tr>
						<th><?php echo $this->Paginator->sort('id'); ?></th>
						<th><?php echo $this->Paginator->sort('Nombre del Producto'); ?></th>
						<th><?php echo $this->Paginator->sort('Descripcion'); ?></th>
						<th><?php echo $this->Paginator->sort('categoria'); ?></th>
						<th><?php echo $this->Paginator->sort('Existencia'); ?></th>
						<th><?php echo $this->Paginator->sort('precioCompra'); ?></th>
						<th><?php echo $this->Paginator->sort('precio1'); ?></th>
						<th><?php echo $this->Paginator->sort('precio2'); ?></th>
						<th><?php echo $this->Paginator->sort('precio3'); ?></th>
						<th><?php echo $this->Paginator->sort('precio4'); ?></th>
						<th class="actions"></th>
					</tr>
				</thead>
				<tbody>
				<?php foreach ($productos as $producto): ?>

					<tr>
						<td><?php echo h($producto['Producto']['id']); ?>&nbsp;</td>
						<td><?php echo h($producto['Producto']['nombreProducto']); ?>&nbsp;</td>
						<td><?php echo h($producto['Producto']['descripcionProducto']); ?>&nbsp;</td>
						<td><?php echo h($producto['Producto']['categoria']); ?>&nbsp;</td>
						<td><?php echo h($producto['Inventarioproducto'][0]['existencia']); ?>&nbsp;</td>
						<td><?php echo h($producto['Producto']['precioCompra']); ?>&nbsp;</td>
						<td><?php echo h($producto['Producto']['precio1']); ?>&nbsp;</td>
						<td><?php echo h($producto['Producto']['precio2']); ?>&nbsp;</td>
						<td><?php echo h($producto['Producto']['precio3']); ?>&nbsp;</td>
						<td><?php echo h($producto['Producto']['precio4']); ?>&nbsp;</td>
						<td class="actions">
							<?php echo $this->Html->link('<span class="glyphicon glyphicon-search"></span>', array('action' => 'view', $producto['Producto']['id']), array('escape' => false)); ?>
							<?php echo $this->Html->link('<span class="glyphicon glyphicon-edit"></span>', array('action' => 'edit', $producto['Producto']['id']), array('escape' => false)); ?>
							<?php echo $this->Form->postLink('<span class="glyphicon glyphicon-ok"></span>', array('action' => 'activarProducto', $producto['Producto']['id']), array('escape' => false), __('Esta seguro que quiere activar el producto # %s?', $producto['Producto']['id'])); ?>
						</td>
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
	</div><!-- end row -->


</div><!-- end containing of content -->