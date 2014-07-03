<div class="movimientoinsumos view">
	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo __('Movimientoinsumo'); ?></h1>
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
									<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>&nbsp&nbsp;Edit Movimientoinsumo'), array('action' => 'edit', $movimientoinsumo['Movimientoinsumo']['id']), array('escape' => false)); ?> </li>
		<li><?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;Delete Movimientoinsumo'), array('action' => 'delete', $movimientoinsumo['Movimientoinsumo']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $movimientoinsumo['Movimientoinsumo']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Movimientoinsumos'), array('action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New Movimientoinsumo'), array('action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Insumos'), array('controller' => 'insumos', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New Insumo'), array('controller' => 'insumos', 'action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Almacenes'), array('controller' => 'almacenes', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New Almacene'), array('controller' => 'almacenes', 'action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Encargados Almacenes'), array('controller' => 'encargados_almacenes', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New Encargados Almacene'), array('controller' => 'encargados_almacenes', 'action' => 'add'), array('escape' => false)); ?> </li>
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
			<?php echo h($movimientoinsumo['Movimientoinsumo']['id']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Insumo'); ?></th>
		<td>
			<?php echo $this->Html->link($movimientoinsumo['Insumo']['id'], array('controller' => 'insumos', 'action' => 'view', $movimientoinsumo['Insumo']['id'])); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Almacene'); ?></th>
		<td>
			<?php echo $this->Html->link($movimientoinsumo['Almacene']['id'], array('controller' => 'almacenes', 'action' => 'view', $movimientoinsumo['Almacene']['id'])); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Encargados Almacene'); ?></th>
		<td>
			<?php echo $this->Html->link($movimientoinsumo['EncargadosAlmacene']['id'], array('controller' => 'encargados_almacenes', 'action' => 'view', $movimientoinsumo['EncargadosAlmacene']['id'])); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Cantidad'); ?></th>
		<td>
			<?php echo h($movimientoinsumo['Movimientoinsumo']['cantidad']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('TipoMovimiento'); ?></th>
		<td>
			<?php echo h($movimientoinsumo['Movimientoinsumo']['tipoMovimiento']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('FechaMovimiento'); ?></th>
		<td>
			<?php echo h($movimientoinsumo['Movimientoinsumo']['fechaMovimiento']); ?>
			&nbsp;
		</td>
</tr>
				</tbody>
			</table>

		</div><!-- end col md 9 -->

	</div>
</div>

