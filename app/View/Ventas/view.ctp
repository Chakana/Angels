<div class="ventas view">
	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo __('Venta'); ?></h1>
			</div>
		</div>
	</div>

	<div class="row">

		<div class="col-md-3">
			<div class="actions">
				<div class="panel panel-default">
					<div class="panel-heading">Actions</div>
						<div class="panel-body">
							<ul class="nav nav-pills nav-stacked">
									<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>&nbsp&nbsp;Edit Venta'), array('action' => 'edit', $venta['Venta']['id']), array('escape' => false)); ?> </li>
		<li><?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;Delete Venta'), array('action' => 'delete', $venta['Venta']['id']), array('escape' => false), __('Esta seguro de eliminar # %s?', $venta['Venta']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;Ver Ventas'), array('action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;Nueva Venta'), array('action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;Ver Vendedor'), array('controller' => 'vendedores', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;Nuevo Vendedore'), array('controller' => 'vendedores', 'action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;Ver Clientes'), array('controller' => 'clientes', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;Nuevo Cliente'), array('controller' => 'clientes', 'action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;Ver Pagos'), array('controller' => 'pagos', 'action' => 'index'), array('escape' => false)); ?> </li>
		
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
			<?php echo h($venta['Venta']['id']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('FechaVenta'); ?></th>
		<td>
			<?php echo h($venta['Venta']['fechaVenta']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Vendedore'); ?></th>
		<td>
			<?php echo $this->Html->link($venta['Vendedore']['id'], array('controller' => 'vendedores', 'action' => 'view', $venta['Vendedore']['id'])); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Cliente'); ?></th>
		<td>
			<?php echo $this->Html->link($venta['Cliente']['id'], array('controller' => 'clientes', 'action' => 'view', $venta['Cliente']['id'])); ?>
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
	<h3><?php echo __('Related Pagos'); ?></h3>
	<?php if (!empty($venta['Pago'])): ?>
	<table cellpadding = "0" cellspacing = "0" class="table table-striped">
	<thead>
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Venta Id'); ?></th>
		<th><?php echo __('FechaPago'); ?></th>
		<th><?php echo __('TipoPago'); ?></th>
		<th><?php echo __('MontoPago'); ?></th>
		<th><?php echo __('Notas'); ?></th>
		<th><?php echo __('SaldoVenta'); ?></th>
		<th class="actions"></th>
	</tr>
	<thead>
	<tbody>
	<?php foreach ($venta['Pago'] as $pago): ?>
		<tr>
			<td><?php echo $pago['id']; ?></td>
			<td><?php echo $pago['venta_id']; ?></td>
			<td><?php echo $pago['fechaPago']; ?></td>
			<td><?php echo $pago['tipoPago']; ?></td>
			<td><?php echo $pago['montoPago']; ?></td>
			<td><?php echo $pago['notas']; ?></td>
			<td><?php echo $pago['saldoVenta']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-search"></span>'), array('controller' => 'pagos', 'action' => 'view', $pago['id']), array('escape' => false)); ?>
				<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>'), array('controller' => 'pagos', 'action' => 'edit', $pago['id']), array('escape' => false)); ?>
				<?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>'), array('controller' => 'pagos', 'action' => 'delete', $pago['id']), array('escape' => false), __('Esta seguro de eliminar # %s?', $pago['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</tbody>
	</table>
<?php endif; ?>

	<div class="actions">
		<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;Nuevo Pago'), array('controller' => 'pagos', 'action' => 'add'), array('escape' => false, 'class' => 'btn btn-default')); ?> 
	</div>
	</div><!-- end col md 12 -->
</div>
<div class="related row">
	<div class="col-md-12">
	<h3><?php echo __('Related Ventadetalles'); ?></h3>
	<?php if (!empty($venta['Ventadetalle'])): ?>
	<table cellpadding = "0" cellspacing = "0" class="table table-striped">
	<thead>
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Venta Id'); ?></th>
		<th><?php echo __('Producto Id'); ?></th>
		<th><?php echo __('Cantidad'); ?></th>
		<th><?php echo __('PrecioUnitario'); ?></th>
		<th><?php echo __('PrecioTotal'); ?></th>
		<th class="actions"></th>
	</tr>
	<thead>
	<tbody>
	<?php foreach ($venta['Ventadetalle'] as $ventadetalle): ?>
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
				<?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>'), array('controller' => 'ventadetalles', 'action' => 'delete', $ventadetalle['id']), array('escape' => false), __('Esta seguro de eliminar# %s?', $ventadetalle['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</tbody>
	</table>
<?php endif; ?>

	<div class="actions">
		<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;Nuevo Ventadetalle'), array('controller' => 'ventadetalles', 'action' => 'add'), array('escape' => false, 'class' => 'btn btn-default')); ?> 
	</div>
	</div><!-- end col md 12 -->
</div>
