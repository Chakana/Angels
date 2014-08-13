<div class="localizaciones view">
	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo __('Localizacione'); ?></h1>
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
									<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>&nbsp&nbsp;Edit Localizacione'), array('action' => 'edit', $localizacione['Localizacione']['id']), array('escape' => false)); ?> </li>
		<li><?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;Delete Localizacione'), array('action' => 'delete', $localizacione['Localizacione']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $localizacione['Localizacione']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Localizaciones'), array('action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;Nuevo Localizacione'), array('action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Clientes'), array('controller' => 'clientes', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;Nuevo Cliente'), array('controller' => 'clientes', 'action' => 'add'), array('escape' => false)); ?> </li>
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
			<?php echo h($localizacione['Localizacione']['id']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Direccion'); ?></th>
		<td>
			<?php echo h($localizacione['Localizacione']['direccion']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Zona'); ?></th>
		<td>
			<?php echo h($localizacione['Localizacione']['zona']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Ciudad'); ?></th>
		<td>
			<?php echo h($localizacione['Localizacione']['ciudad']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Coordenadas'); ?></th>
		<td>
			<?php echo h($localizacione['Localizacione']['coordenadas']); ?>
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
	<h3><?php echo __('Related Clientes'); ?></h3>
	<?php if (!empty($localizacione['Cliente'])): ?>
	<table cellpadding = "0" cellspacing = "0" class="table table-striped">
	<thead>
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('NombreCliente'); ?></th>
		<th><?php echo __('DireccionPrincipal'); ?></th>
		<th><?php echo __('TelefonoFijo'); ?></th>
		<th><?php echo __('Celular'); ?></th>
		<th><?php echo __('FechaRegistro'); ?></th>
		<th><?php echo __('FechaModificacion'); ?></th>
		<th><?php echo __('FechaNacimiento'); ?></th>
		<th><?php echo __('Localizacione Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th class="actions"></th>
	</tr>
	<thead>
	<tbody>
	<?php foreach ($localizacione['Cliente'] as $cliente): ?>
		<tr>
			<td><?php echo $cliente['id']; ?></td>
			<td><?php echo $cliente['nombreCliente']; ?></td>
			<td><?php echo $cliente['direccionPrincipal']; ?></td>
			<td><?php echo $cliente['telefonoFijo']; ?></td>
			<td><?php echo $cliente['celular']; ?></td>
			<td><?php echo $cliente['fechaRegistro']; ?></td>
			<td><?php echo $cliente['fechaModificacion']; ?></td>
			<td><?php echo $cliente['fechaNacimiento']; ?></td>
			<td><?php echo $cliente['localizacione_id']; ?></td>
			<td><?php echo $cliente['user_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-search"></span>'), array('controller' => 'clientes', 'action' => 'view', $cliente['id']), array('escape' => false)); ?>
				<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>'), array('controller' => 'clientes', 'action' => 'edit', $cliente['id']), array('escape' => false)); ?>
				<?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>'), array('controller' => 'clientes', 'action' => 'delete', $cliente['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $cliente['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</tbody>
	</table>
<?php endif; ?>

	<div class="actions">
		<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;Nuevo Cliente'), array('controller' => 'clientes', 'action' => 'add'), array('escape' => false, 'class' => 'btn btn-default')); ?> 
	</div>
	</div><!-- end col md 12 -->
</div>
