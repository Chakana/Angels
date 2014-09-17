<div class="almacenes view">
	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo __('Almacene'); ?></h1>
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
									<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>&nbsp&nbsp;Edit Almacene'), array('action' => 'edit', $almacene['Almacene']['id']), array('escape' => false)); ?> </li>
		<li><?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;Delete Almacene'), array('action' => 'delete', $almacene['Almacene']['id']), array('escape' => false), __('Estas seguro de querer eliminar # %s?', $almacene['Almacene']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;Listar Almacenes'), array('action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;Nuevo Almacen'), array('action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;Listar Encargados Almacenes'), array('controller' => 'encargados_almacenes', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;Nuevo Encargados Almacene'), array('controller' => 'encargados_almacenes', 'action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;Listar Insumos'), array('controller' => 'insumos', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;Nuevo Insumo'), array('controller' => 'insumos', 'action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;Listar Movimientoinsumos'), array('controller' => 'movimientoinsumos', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;Nuevo Movimientoinsumo'), array('controller' => 'movimientoinsumos', 'action' => 'add'), array('escape' => false)); ?> </li>
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
			<?php echo h($almacene['Almacene']['id']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Descripcion'); ?></th>
		<td>
			<?php echo h($almacene['Almacene']['descripcion']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('DireccionAlmacen'); ?></th>
		<td>
			<?php echo h($almacene['Almacene']['DireccionAlmacen']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('FechaRegistroAlmacen'); ?></th>
		<td>
			<?php echo h($almacene['Almacene']['fechaRegistroAlmacen']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('FechaModificacion'); ?></th>
		<td>
			<?php echo h($almacene['Almacene']['fechaModificacion']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Encargados Almacene'); ?></th>
		<td>
			<?php echo $this->Html->link($almacene['EncargadosAlmacene']['id'], array('controller' => 'encargados_almacenes', 'action' => 'view', $almacene['EncargadosAlmacene']['id'])); ?>
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
	<h3><?php echo __('Related Insumos'); ?></h3>
	<?php if (!empty($almacene['Insumo'])): ?>
	<table cellpadding = "0" cellspacing = "0" class="table table-striped">
	<thead>
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('NombreInsumo'); ?></th>
		<th><?php echo __('FechaRegistroInsumo'); ?></th>
		<th><?php echo __('FechaModificacionInsumo'); ?></th>
		<th><?php echo __('Cantidad'); ?></th>
		<th><?php echo __('Categoria'); ?></th>
		<th><?php echo __('Almacene Id'); ?></th>
		<th class="actions"></th>
	</tr>
	<thead>
	<tbody>
	<?php foreach ($almacene['Insumo'] as $insumo): ?>
		<tr>
			<td><?php echo $insumo['id']; ?></td>
			<td><?php echo $insumo['nombreInsumo']; ?></td>
			<td><?php echo $insumo['fechaRegistroInsumo']; ?></td>
			<td><?php echo $insumo['fechaModificacionInsumo']; ?></td>
			<td><?php echo $insumo['cantidad']; ?></td>
			<td><?php echo $insumo['categoria']; ?></td>
			<td><?php echo $insumo['almacene_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-search"></span>'), array('controller' => 'insumos', 'action' => 'view', $insumo['id']), array('escape' => false)); ?>
				<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>'), array('controller' => 'insumos', 'action' => 'edit', $insumo['id']), array('escape' => false)); ?>
				<?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>'), array('controller' => 'insumos', 'action' => 'delete', $insumo['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $insumo['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</tbody>
	</table>
<?php endif; ?>

	<div class="actions">
		<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New Insumo'), array('controller' => 'insumos', 'action' => 'add'), array('escape' => false, 'class' => 'btn btn-default')); ?> 
	</div>
	</div><!-- end col md 12 -->
</div>
<div class="related row">
	<div class="col-md-12">
	<h3><?php echo __('Related Movimientoinsumos'); ?></h3>
	<?php if (!empty($almacene['Movimientoinsumo'])): ?>
	<table cellpadding = "0" cellspacing = "0" class="table table-striped">
	<thead>
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Insumo Id'); ?></th>
		<th><?php echo __('Almacene Id'); ?></th>
		<th><?php echo __('EncargadoAlmacene Id'); ?></th>
		<th><?php echo __('Cantidad'); ?></th>
		<th><?php echo __('TipoMovimiento'); ?></th>
		<th><?php echo __('FechaMovimiento'); ?></th>
		<th class="actions"></th>
	</tr>
	<thead>
	<tbody>
	<?php foreach ($almacene['Movimientoinsumo'] as $movimientoinsumo): ?>
		<tr>
			<td><?php echo $movimientoinsumo['id']; ?></td>
			<td><?php echo $movimientoinsumo['insumo_id']; ?></td>
			<td><?php echo $movimientoinsumo['almacene_id']; ?></td>
			<td><?php echo $movimientoinsumo['encargadoAlmacene_id']; ?></td>
			<td><?php echo $movimientoinsumo['cantidad']; ?></td>
			<td><?php echo $movimientoinsumo['tipoMovimiento']; ?></td>
			<td><?php echo $movimientoinsumo['fechaMovimiento']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-search"></span>'), array('controller' => 'movimientoinsumos', 'action' => 'view', $movimientoinsumo['id']), array('escape' => false)); ?>
				<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>'), array('controller' => 'movimientoinsumos', 'action' => 'edit', $movimientoinsumo['id']), array('escape' => false)); ?>
				<?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>'), array('controller' => 'movimientoinsumos', 'action' => 'delete', $movimientoinsumo['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $movimientoinsumo['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</tbody>
	</table>
<?php endif; ?>

	<div class="actions">
		<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New Movimientoinsumo'), array('controller' => 'movimientoinsumos', 'action' => 'add'), array('escape' => false, 'class' => 'btn btn-default')); ?> 
	</div>
	</div><!-- end col md 12 -->
</div>
