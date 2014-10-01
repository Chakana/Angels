<div class="notadevoluciones index">

	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo __('Notas de devolucion'); ?></h1>
			</div>
		</div><!-- end col md 12 -->
	</div><!-- end row -->



	<div class="row">

		<div class="col-md-3">
			<div class="actions">
				<div class="panel panel-default">
					<div class="panel-heading">Actions</div>
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
				<thead>
					<tr>
						<th><?php echo $this->Paginator->sort('id'); ?></th>
						<th><?php echo $this->Paginator->sort('venta_id'); ?></th>
						<th><?php echo $this->Paginator->sort('producto_id'); ?></th>
						<th><?php echo $this->Paginator->sort('cantidad'); ?></th>
						<th><?php echo $this->Paginator->sort('fecha'); ?></th>
						<th><?php echo $this->Paginator->sort('user_id'); ?></th>
						<th class="actions"></th>
					</tr>
				</thead>
				<tbody>
				<?php foreach ($notadevoluciones as $notadevolucione): ?>
					<tr>
						<td><?php echo h($notadevolucione['Notadevolucione']['id']); ?>&nbsp;</td>
								<td>
			<?php echo $this->Html->link($notadevolucione['Venta']['id'], array('controller' => 'ventas', 'action' => 'view', $notadevolucione['Venta']['id'])); ?>
		</td>
								<td>
			<?php echo $this->Html->link($notadevolucione['Producto']['nombreProducto'], array('controller' => 'productos', 'action' => 'view', $notadevolucione['Producto']['id'])); ?>
		</td>
						<td><?php echo h($notadevolucione['Notadevolucione']['cantidad']); ?>&nbsp;</td>
						<td><?php echo h($notadevolucione['Notadevolucione']['fecha']); ?>&nbsp;</td>
								<td>
			<?php echo $this->Html->link($notadevolucione['User']['id'], array('controller' => 'users', 'action' => 'view', $notadevolucione['User']['id'])); ?>
		</td>
						<td class="actions">
							<?php echo $this->Html->link('<span class="glyphicon glyphicon-search"></span>', array('action' => 'view', $notadevolucione['Notadevolucione']['id']), array('escape' => false)); ?>
							<?php echo $this->Html->link('<span class="glyphicon glyphicon-edit"></span>', array('action' => 'edit', $notadevolucione['Notadevolucione']['id']), array('escape' => false)); ?>
							<?php echo $this->Form->postLink('<span class="glyphicon glyphicon-remove"></span>', array('action' => 'delete', $notadevolucione['Notadevolucione']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $notadevolucione['Notadevolucione']['id'])); ?>
						</td>
					</tr>
				<?php endforeach; ?>
				</tbody>
			</table>

			<p>
				<small><?php echo $this->Paginator->counter(array('format' => __('Pagina {:page} of {:pages}, mostrando {:current} registros de {:count}')));?></small>
			</p>

			<?php
			$params = $this->Paginator->params();
			if ($params['pageCount'] > 1) {
			?>
			<ul class="pagination pagination-sm">
				<?php
					echo $this->Paginator->prev('&larr; Previous', array('class' => 'prev','tag' => 'li','escape' => false), '<a onclick="return false;">&larr; Previous</a>', array('class' => 'prev disabled','tag' => 'li','escape' => false));
					echo $this->Paginator->numbers(array('separator' => '','tag' => 'li','currentClass' => 'active','currentTag' => 'a'));
					echo $this->Paginator->next('Next &rarr;', array('class' => 'next','tag' => 'li','escape' => false), '<a onclick="return false;">Next &rarr;</a>', array('class' => 'next disabled','tag' => 'li','escape' => false));
				?>
			</ul>
			<?php } ?>

		</div> <!-- end col md 9 -->
	</div><!-- end row -->


</div><!-- end containing of content -->