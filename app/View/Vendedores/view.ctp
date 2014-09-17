<div class="vendedores view">
	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo __('Vendedor'); ?></h1>
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
									<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>&nbsp&nbsp;Edit Vendedore'), array('action' => 'edit', $vendedore['Vendedore']['id']), array('escape' => false)); ?> </li>
		<li><?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;Eliminar Vendedor'), array('action' => 'delete', $vendedore['Vendedore']['id']), array('escape' => false), __('Esta seguro de eliminar # %s?', $vendedore['Vendedore']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;Ver Vendedores'), array('action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;Nuevo Vendedor'), array('action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;Ver Usuarios'), array('controller' => 'users', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;Nuevo Usuario'), array('controller' => 'users', 'action' => 'add'), array('escape' => false)); ?> </li>
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
			<?php echo h($vendedore['Vendedore']['id']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('NombreVendedor'); ?></th>
		<td>
			<?php echo h($vendedore['Vendedore']['nombreVendedor']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('FechaNacimiento'); ?></th>
		<td>
			<?php echo h($vendedore['Vendedore']['fechaNacimiento']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('FechaRegistro'); ?></th>
		<td>
			<?php echo h($vendedore['Vendedore']['fechaRegistro']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('FechaModificacion'); ?></th>
		<td>
			<?php echo h($vendedore['Vendedore']['fechaModificacion']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('DomicilioVendedor'); ?></th>
		<td>
			<?php echo h($vendedore['Vendedore']['DomicilioVendedor']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('TelefonoVendedor'); ?></th>
		<td>
			<?php echo h($vendedore['Vendedore']['telefonoVendedor']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('DocumentoIdentidad'); ?></th>
		<td>
			<?php echo h($vendedore['Vendedore']['documentoIdentidad']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('User'); ?></th>
		<td>
			<?php echo $this->Html->link($vendedore['User']['id'], array('controller' => 'users', 'action' => 'view', $vendedore['User']['id'])); ?>
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
	<h3><?php echo __('Related Ventas'); ?></h3>
	<?php if (!empty($vendedore['Venta'])): ?>
	<table cellpadding = "0" cellspacing = "0" class="table table-striped">
	<thead>
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('FechaVenta'); ?></th>
		<th><?php echo __('Descripcion'); ?></th>
		<th><?php echo __('Vendedore Id'); ?></th>
		<th><?php echo __('Cliente Id'); ?></th>
		<th class="actions"></th>
	</tr>
	<thead>
	<tbody>
	<?php foreach ($vendedore['Venta'] as $venta): ?>
		<tr>
			<td><?php echo $venta['id']; ?></td>
			<td><?php echo $venta['fechaVenta']; ?></td>
			<td><?php echo $venta['descripcion']; ?></td>
			<td><?php echo $venta['vendedore_id']; ?></td>
			<td><?php echo $venta['cliente_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-search"></span>'), array('controller' => 'ventas', 'action' => 'view', $venta['id']), array('escape' => false)); ?>
				<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>'), array('controller' => 'ventas', 'action' => 'edit', $venta['id']), array('escape' => false)); ?>
				<?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>'), array('controller' => 'ventas', 'action' => 'delete', $venta['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $venta['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</tbody>
	</table>
<?php endif; ?>

	<div class="actions">
		<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;Nuevo Venta'), array('controller' => 'ventas', 'action' => 'add'), array('escape' => false, 'class' => 'btn btn-default')); ?> 
	</div>
	</div><!-- end col md 12 -->
</div>
