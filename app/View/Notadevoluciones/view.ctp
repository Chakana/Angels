<div class="notadevoluciones view">
	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo __('Nota de devolucion'); ?></h1>
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
									<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;Listar Notas de devolucion'), array('action' => 'index'), array('escape' => false)); ?></li>
									<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;Listar Ventas'), array('controller' => 'ventas', 'action' => 'index'), array('escape' => false)); ?> </li>
									<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;Nueva Venta'), array('controller' => 'ventas', 'action' => 'add'), array('escape' => false)); ?> </li>
									<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;Listar Productos'), array('controller' => 'productos', 'action' => 'index'), array('escape' => false)); ?> </li>
									<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;Nuevo Producto'), array('controller' => 'productos', 'action' => 'add'), array('escape' => false)); ?> </li>
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
			<?php echo h($notadevolucione['Notadevolucione']['id']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Venta'); ?></th>
		<td>
			<?php echo $this->Html->link($notadevolucione['Venta']['id'], array('controller' => 'ventas', 'action' => 'view', $notadevolucione['Venta']['id'])); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Producto'); ?></th>
		<td>
			<?php echo $this->Html->link($notadevolucione['Producto']['nombreProducto'], array('controller' => 'productos', 'action' => 'view', $notadevolucione['Producto']['id'])); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Cantidad'); ?></th>
		<td>
			<?php echo h($notadevolucione['Notadevolucione']['cantidad']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Fecha'); ?></th>
		<td>
			<?php echo h($notadevolucione['Notadevolucione']['fecha']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('User'); ?></th>
		<td>
			<?php echo $this->Html->link($notadevolucione['User']['id'], array('controller' => 'users', 'action' => 'view', $notadevolucione['User']['id'])); ?>
			&nbsp;
		</td>
</tr>
				</tbody>
			</table>

		</div><!-- end col md 9 -->

	</div>
</div>

