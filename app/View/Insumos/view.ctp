<div class="insumos view">
	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo __('Insumo'); ?></h1>
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
									<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>&nbsp&nbsp;Edit Insumo'), array('action' => 'edit', $insumo['Insumo']['id']), array('escape' => false)); ?> </li>
		<li><?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;Delete Insumo'), array('action' => 'delete', $insumo['Insumo']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $insumo['Insumo']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Insumos'), array('action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New Insumo'), array('action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Almacenes'), array('controller' => 'almacenes', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New Almacene'), array('controller' => 'almacenes', 'action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Movimientoinsumos'), array('controller' => 'movimientoinsumos', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New Movimientoinsumo'), array('controller' => 'movimientoinsumos', 'action' => 'add'), array('escape' => false)); ?> </li>
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
			<?php echo h($insumo['Insumo']['id']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('NombreInsumo'); ?></th>
		<td>
			<?php echo h($insumo['Insumo']['nombreInsumo']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('FechaRegistroInsumo'); ?></th>
		<td>
			<?php echo h($insumo['Insumo']['fechaRegistroInsumo']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('FechaModificacionInsumo'); ?></th>
		<td>
			<?php echo h($insumo['Insumo']['fechaModificacionInsumo']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Cantidad'); ?></th>
		<td>
			<?php echo h($insumo['Insumo']['cantidad']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Categoria'); ?></th>
		<td>
			<?php echo h($insumo['Insumo']['categoria']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Almacene'); ?></th>
		<td>
			<?php echo $this->Html->link($insumo['Almacene']['id'], array('controller' => 'almacenes', 'action' => 'view', $insumo['Almacene']['id'])); ?>
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
	<h3><?php echo __('Related Movimientoinsumos'); ?></h3>
	<?php if (!empty($insumo['Movimientoinsumo'])): ?>
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
	<?php foreach ($insumo['Movimientoinsumo'] as $movimientoinsumo): ?>
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
