<div class="clientes view">
	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo __('Cliente'); ?></h1>
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
									<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>&nbsp&nbsp;Editar Cliente'), array('action' => 'edit', $cliente['Cliente']['id']), array('escape' => false)); ?> </li>
		<li><?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;Eliminar Cliente'), array('action' => 'delete', $cliente['Cliente']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $cliente['Cliente']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;Ver Clientes'), array('action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;Nuevo Cliente'), array('action' => 'add'), array('escape' => false)); ?> </li>		
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;Ver Ventas'), array('controller' => 'ventas', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;Nueva Venta'), array('controller' => 'ventas', 'action' => 'add'), array('escape' => false)); ?> </li>
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
			<?php echo h($cliente['Cliente']['id']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Nombre Cliente'); ?></th>
		<td>
			<?php echo h($cliente['Cliente']['nombreCliente']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Direccion Principal'); ?></th>
		<td>
			<?php echo h($cliente['Cliente']['direccionPrincipal']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Telefono Fijo'); ?></th>
		<td>
			<?php echo h($cliente['Cliente']['telefonoFijo']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Celular'); ?></th>
		<td>
			<?php echo h($cliente['Cliente']['celular']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Fecha Registro'); ?></th>
		<td>
			<?php echo h($cliente['Cliente']['fechaRegistro']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Cedula Identidad'); ?></th>
		<td>
			<?php echo h($cliente['Cliente']['cedulaIdentidad']); ?>
			&nbsp;
		</td>
</tr>

<tr>
		<th><?php echo __('Ciudad'); ?></th>
		<td>
			<?php echo h($cliente['Cliente']['ciudad']); ?>
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
	<h3><?php echo __('Ventas Relacionadas'); ?></h3>
	<?php if (!empty($cliente['Venta'])): ?>
	<table cellpadding = "0" cellspacing = "0" class="table table-striped">
	<thead>
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('FechaVenta'); ?></th>		
		<th><?php echo __('Vendedore Id'); ?></th>
		<th><?php echo __('Cliente Id'); ?></th>
		<th class="actions"></th>
	</tr>
	<thead>
	<tbody>
	<?php foreach ($cliente['Venta'] as $venta): ?>
		<tr>
			<td><?php echo $venta['id']; ?></td>
			<td><?php echo $venta['fechaVenta']; ?></td>
			
			<td><?php echo $venta['vendedore_id']; ?></td>
			<td><?php echo $venta['cliente_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-search"></span>'), array('controller' => 'ventas', 'action' => 'view', $venta['id']), array('escape' => false)); ?>
				<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>'), array('controller' => 'ventas', 'action' => 'edit', $venta['id']), array('escape' => false)); ?>
				<?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>'), array('controller' => 'ventas', 'action' => 'delete', $venta['id']), array('escape' => false), __('Esta seguro de borrar la venta # %s?', $venta['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</tbody>
	</table>
<?php endif; ?>

	<div class="actions">
		<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;Nueva Venta'), array('controller' => 'ventas', 'action' => 'add'), array('escape' => false, 'class' => 'btn btn-default')); ?> 
	</div>
	</div><!-- end col md 12 -->
</div>
