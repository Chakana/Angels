<div class="productos view">
	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo __('Producto'); ?></h1>
			</div>
		</div>
	</div>

	<div class="row">

		<div class="col-md-3">
			<div class="actions">
				<div class="panel panel-default">
					<div class="panel-heading">Opciones</div>
						<div class="panel-body">
							<ul class="nav nav-pills nav-stacked">
									<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>&nbsp&nbsp;Modificar Producto'), array('action' => 'edit', $producto['Producto']['id']), array('escape' => false)); ?> </li>
									<li><?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;Eliminar Producto'), array('action' => 'delete', $producto['Producto']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $producto['Producto']['id'])); ?> </li>
									<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;Ver Productos'), array('action' => 'index'), array('escape' => false)); ?> </li>
							</ul>
						</div><!-- end body -->
				</div><!-- end panel -->
			</div><!-- end actions -->
		</div><!-- end col md 3 -->

		<div class="col-md-9">			
			<table cellpadding="0" cellspacing="0" class="table table-striped">
				<tbody>
				<tr>
		<th><?php echo __('Id'); ?></th>
		<td>
			<?php echo h($producto['Producto']['id']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('NombreProducto'); ?></th>
		<td>
			<?php echo h($producto['Producto']['nombreProducto']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('DescripcionProducto'); ?></th>
		<td>
			<?php echo h($producto['Producto']['descripcionProducto']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Categoria'); ?></th>
		<td>
			<?php echo h($producto['Producto']['categoria']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Existencia'); ?></th>
		<td>
			<?php echo h($existencia); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('precioCompra'); ?></th>
		<td>
			<?php echo h($producto['Producto']['precioCompra']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('precio1'); ?></th>
		<td>
			<?php echo h($producto['Producto']['precio1']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('precio2'); ?></th>
		<td>
			<?php echo h($producto['Producto']['precio2']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('precio3'); ?></th>
		<td>
			<?php echo h($producto['Producto']['precio3']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('precio4'); ?></th>
		<td>
			<?php echo h($producto['Producto']['precio4']); ?>
			&nbsp;
		</td>
</tr>
				</tbody>
			</table>

		</div><!-- end col md 9 -->

	</div>
</div>


<div class="related row">
	<div class="col-md-12">
	<h3><?php echo __('Movimientos del Producto'); ?></h3>
	<?php if (!empty($producto['Movimientoproducto'])): ?>
	<table cellpadding = "0" cellspacing = "0" class="table table-striped">
	<thead>
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Producto Id'); ?></th>
		<th><?php echo __('TipoMovimiento'); ?></th>
		<th><?php echo __('FechaMovimiento'); ?></th>
		<th><?php echo __('Cantidad'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th class="actions"></th>
	</tr>
	<thead>
	<tbody>
	<?php foreach ($producto['Movimientoproducto'] as $movimientoproducto): ?>
		<tr>
			<td><?php echo $movimientoproducto['id']; ?></td>
			<td><?php echo $movimientoproducto['producto_id']; ?></td>
			<td><?php echo $movimientoproducto['tipoMovimiento']; ?></td>
			<td><?php echo $movimientoproducto['fechaMovimiento']; ?></td>
			<td><?php echo $movimientoproducto['cantidad']; ?></td>
			<td><?php echo $movimientoproducto['user_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-search"></span>'), array('controller' => 'movimientoproductos', 'action' => 'view', $movimientoproducto['id']), array('escape' => false)); ?>
				<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>'), array('controller' => 'movimientoproductos', 'action' => 'edit', $movimientoproducto['id']), array('escape' => false)); ?>
				<?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>'), array('controller' => 'movimientoproductos', 'action' => 'delete', $movimientoproducto['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $movimientoproducto['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</tbody>
	</table>
<?php endif; ?>

	<div class="actions">
		<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;Nuevo Movimientoproducto'), array('controller' => 'movimientoproductos', 'action' => 'add'), array('escape' => false, 'class' => 'btn btn-default')); ?> 
	</div>
	</div><!-- end col md 12 -->
</div>
<div class="related row">
	<div class="col-md-12">
	<h3><?php echo __('Detalle de Ventas'); ?></h3>
	<?php if (!empty($producto['Ventadetalle'])): ?>
	<table cellpadding = "0" cellspacing = "0" class="table table-striped">
	<thead>
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Venta Id'); ?></th>
		<th><?php echo __('Producto'); ?></th>
		<th><?php echo __('Cantidad'); ?></th>
		<th><?php echo __('PrecioUnitario'); ?></th>
		<th><?php echo __('PrecioTotal'); ?></th>
		<th class="actions"></th>
	</tr>
	<thead>
	<tbody>
	<?php foreach ($producto['Ventadetalle'] as $ventadetalle): ?>
		<tr>
			<td><?php echo $ventadetalle['id']; ?></td>
			<td><?php echo $ventadetalle['venta_id']; ?></td>
			<td><?php echo $ventadetalle['producto_id']; ?></td>
			<td><?php echo $ventadetalle['cantidad']; ?></td>
			<td><?php echo $ventadetalle['precioUnitario']; ?></td>
			<td><?php echo $ventadetalle['precioTotal']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-search"></span>'), array('controller' => 'ventadetalles', 'action' => 'view', $ventadetalle['id']), array('escape' => false)); ?>
				<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>'), array('controller' => 'ventadetalles', 'action' => 'edit', $ventadetalle['id']), array('escape' => false)); ?>
				<?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>'), array('controller' => 'ventadetalles', 'action' => 'delete', $ventadetalle['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $ventadetalle['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</tbody>
	</table>
<?php endif; ?>

	<div class="actions">
		<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;Nueva Venta'), array('controller' => 'ventadetalles', 'action' => 'add'), array('escape' => false, 'class' => 'btn btn-default')); ?> 
	</div>
	</div><!-- end col md 12 -->
</div>
