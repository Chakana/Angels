<div class="inventarioproductos index">

	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo __('Inventario de Productos'); ?></h1>
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
						<th><?php echo $this->Paginator->sort('codigo producto'); ?></th>
						<th><?php echo $this->Paginator->sort('fecha Ingreso'); ?></th>
						<th><?php echo $this->Paginator->sort('existencia'); ?></th>
						<th><?php echo $this->Paginator->sort('ultima fecha Modificacion'); ?></th>						
					</tr>
				</thead>
				<tbody>
				<?php foreach ($inventarioproductos as $inventarioproducto): ?>
					<tr>
						
								<td>
			<?php echo $this->Html->link($inventarioproducto['Producto']['nombreProducto'], array('controller' => 'productos', 'action' => 'view', $inventarioproducto['Producto']['id'])); ?>
		</td>
						<td><?php echo h($inventarioproducto['Inventarioproducto']['fechaIngreso']); ?>&nbsp;</td>
						<td><?php echo h($inventarioproducto['Inventarioproducto']['existencia']); ?>&nbsp;</td>
						<td><?php echo h($inventarioproducto['Inventarioproducto']['fechaModificacion']); ?>&nbsp;</td>
						
					</tr>
				<?php endforeach; ?>
				</tbody>
			</table>

			<p>
				<small><?php echo $this->Paginator->counter(array('format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')));?></small>
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