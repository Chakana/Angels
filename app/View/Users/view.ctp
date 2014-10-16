<div class="users view">
	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo __('Usuario'); ?></h1>
			</div>
		</div>
	</div>

	<div class="row">

		<div class="col-md-3">
			<div class="actions">
				<div class="panel panel-default">
					<div class="panel-heading">Acciones</div>
						<div class="panel-body">
							<ul class="nav nav-pills nav-stacked">
									<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>&nbsp&nbsp;Editar Usuario'), array('action' => 'edit', $user['User']['id']), array('escape' => false)); ?> </li>
		
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;Ver Usuaruis'), array('action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;Nuevo User'), array('action' => 'add'), array('escape' => false)); ?> </li>
		
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;Ver Clientes'), array('controller' => 'clientes', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;Nuevo Cliente'), array('controller' => 'clientes', 'action' => 'add'), array('escape' => false)); ?> </li>	
		
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;Ver Vendedores'), array('controller' => 'vendedores', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;Nuevo Vendedor'), array('controller' => 'vendedores', 'action' => 'add'), array('escape' => false)); ?> </li>
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
			<?php echo h($user['User']['id']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Username'); ?></th>
		<td>
			<?php echo h($user['User']['username']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Password'); ?></th>
		<td>
			<?php echo h($user['User']['password']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Group'); ?></th>
		<td>
			<?php echo $this->Html->link($user['Group']['name'], array('controller' => 'groups', 'action' => 'view', $user['Group']['id'])); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Created'); ?></th>
		<td>
			<?php echo h($user['User']['created']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Modified'); ?></th>
		<td>
			<?php echo h($user['User']['modified']); ?>
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
	<?php if (!empty($user['Cliente'])): ?>
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
	<?php foreach ($user['Cliente'] as $cliente): ?>
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
<div class="related row">
	<div class="col-md-12">
	<h3><?php echo __('Related Encargadosalmacenes'); ?></h3>
	<?php if (!empty($user['Encargadosalmacene'])): ?>
	<table cellpadding = "0" cellspacing = "0" class="table table-striped">
	<thead>
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('NombreEncargado'); ?></th>
		<th><?php echo __('FechaRegistroEncargado'); ?></th>
		<th><?php echo __('FechaModificacionEncargado'); ?></th>
		<th><?php echo __('DireccionEncargado'); ?></th>
		<th><?php echo __('DocumentoIdentidad'); ?></th>
		<th><?php echo __('FechaNacimiento'); ?></th>
		<th><?php echo __('TelefonoEncargado'); ?></th>
		<th><?php echo __('PersonaReferencia'); ?></th>
		<th><?php echo __('DireccionPersonaReferencia'); ?></th>
		<th><?php echo __('TelefonoPersonaReferencia'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th class="actions"></th>
	</tr>
	<thead>
	<tbody>
	<?php foreach ($user['Encargadosalmacene'] as $encargadosalmacene): ?>
		<tr>
			<td><?php echo $encargadosalmacene['id']; ?></td>
			<td><?php echo $encargadosalmacene['nombreEncargado']; ?></td>
			<td><?php echo $encargadosalmacene['fechaRegistroEncargado']; ?></td>
			<td><?php echo $encargadosalmacene['fechaModificacionEncargado']; ?></td>
			<td><?php echo $encargadosalmacene['DireccionEncargado']; ?></td>
			<td><?php echo $encargadosalmacene['documentoIdentidad']; ?></td>
			<td><?php echo $encargadosalmacene['fechaNacimiento']; ?></td>
			<td><?php echo $encargadosalmacene['telefonoEncargado']; ?></td>
			<td><?php echo $encargadosalmacene['personaReferencia']; ?></td>
			<td><?php echo $encargadosalmacene['direccionPersonaReferencia']; ?></td>
			<td><?php echo $encargadosalmacene['telefonoPersonaReferencia']; ?></td>
			<td><?php echo $encargadosalmacene['user_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-search"></span>'), array('controller' => 'encargadosalmacenes', 'action' => 'view', $encargadosalmacene['id']), array('escape' => false)); ?>
				<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>'), array('controller' => 'encargadosalmacenes', 'action' => 'edit', $encargadosalmacene['id']), array('escape' => false)); ?>
				<?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>'), array('controller' => 'encargadosalmacenes', 'action' => 'delete', $encargadosalmacene['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $encargadosalmacene['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</tbody>
	</table>
<?php endif; ?>

	<div class="actions">
		<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;Nuevo Encargadosalmacene'), array('controller' => 'encargadosalmacenes', 'action' => 'add'), array('escape' => false, 'class' => 'btn btn-default')); ?> 
	</div>
	</div><!-- end col md 12 -->
</div>
<div class="related row">
	<div class="col-md-12">
	<h3><?php echo __('Related Movimientoproductos'); ?></h3>
	<?php if (!empty($user['Movimientoproducto'])): ?>
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
	<?php foreach ($user['Movimientoproducto'] as $movimientoproducto): ?>
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
	<h3><?php echo __('Related Vendedores'); ?></h3>
	<?php if (!empty($user['Vendedore'])): ?>
	<table cellpadding = "0" cellspacing = "0" class="table table-striped">
	<thead>
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('NombreVendedor'); ?></th>
		<th><?php echo __('FechaNacimiento'); ?></th>
		<th><?php echo __('FechaRegistro'); ?></th>
		<th><?php echo __('FechaModificacion'); ?></th>
		<th><?php echo __('DomicilioVendedor'); ?></th>
		<th><?php echo __('TelefonoVendedor'); ?></th>
		<th><?php echo __('DocumentoIdentidad'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th class="actions"></th>
	</tr>
	<thead>
	<tbody>
	<?php foreach ($user['Vendedore'] as $vendedore): ?>
		<tr>
			<td><?php echo $vendedore['id']; ?></td>
			<td><?php echo $vendedore['nombreVendedor']; ?></td>
			<td><?php echo $vendedore['fechaNacimiento']; ?></td>
			<td><?php echo $vendedore['fechaRegistro']; ?></td>
			<td><?php echo $vendedore['fechaModificacion']; ?></td>
			<td><?php echo $vendedore['DomicilioVendedor']; ?></td>
			<td><?php echo $vendedore['telefonoVendedor']; ?></td>
			<td><?php echo $vendedore['documentoIdentidad']; ?></td>
			<td><?php echo $vendedore['user_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-search"></span>'), array('controller' => 'vendedores', 'action' => 'view', $vendedore['id']), array('escape' => false)); ?>
				<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>'), array('controller' => 'vendedores', 'action' => 'edit', $vendedore['id']), array('escape' => false)); ?>
				<?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>'), array('controller' => 'vendedores', 'action' => 'delete', $vendedore['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $vendedore['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</tbody>
	</table>
<?php endif; ?>

	<div class="actions">
		<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;Nuevo Vendedore'), array('controller' => 'vendedores', 'action' => 'add'), array('escape' => false, 'class' => 'btn btn-default')); ?> 
	</div>
	</div><!-- end col md 12 -->
</div>
