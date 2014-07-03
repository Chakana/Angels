<div class="inventarioproductos view">
	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo __('Inventarioproducto'); ?></h1>
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
									<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>&nbsp&nbsp;Edit Inventarioproducto'), array('action' => 'edit', $inventarioproducto['Inventarioproducto']['id']), array('escape' => false)); ?> </li>
		<li><?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;Delete Inventarioproducto'), array('action' => 'delete', $inventarioproducto['Inventarioproducto']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $inventarioproducto['Inventarioproducto']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Inventarioproductos'), array('action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New Inventarioproducto'), array('action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Productos'), array('controller' => 'productos', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New Producto'), array('controller' => 'productos', 'action' => 'add'), array('escape' => false)); ?> </li>
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
			<?php echo h($inventarioproducto['Inventarioproducto']['id']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Producto'); ?></th>
		<td>
			<?php echo $this->Html->link($inventarioproducto['Producto']['id'], array('controller' => 'productos', 'action' => 'view', $inventarioproducto['Producto']['id'])); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('FechaIngreso'); ?></th>
		<td>
			<?php echo h($inventarioproducto['Inventarioproducto']['fechaIngreso']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Existencia'); ?></th>
		<td>
			<?php echo h($inventarioproducto['Inventarioproducto']['existencia']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('FechaModificacion'); ?></th>
		<td>
			<?php echo h($inventarioproducto['Inventarioproducto']['fechaModificacion']); ?>
			&nbsp;
		</td>
</tr>
				</tbody>
			</table>

		</div><!-- end col md 9 -->

	</div>
</div>

