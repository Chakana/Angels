<div class="pagos index">

	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo __('Pagos'); ?></h1>
			</div>
		</div><!-- end col md 12 -->
	</div><!-- end row -->



	<div class="row">

		<div class="col-md-3">
			<div class="actions">
				<div class="panel panel-default">
					<div class="panel-heading">Opciones</div>
						<div class="panel-body">
							<ul class="nav nav-pills nav-stacked">								
								<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;Ver Ventas'), array('controller' => 'ventas', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;Nuevo Venta'), array('controller' => 'ventas', 'action' => 'add'), array('escape' => false)); ?> </li>
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
						<th><?php echo $this->Paginator->sort('fechaPago'); ?></th>
						<th><?php echo $this->Paginator->sort('tipoPago'); ?></th>
						<th><?php echo $this->Paginator->sort('montoPago'); ?></th>
						<th><?php echo $this->Paginator->sort('notas'); ?></th>
						<th><?php echo $this->Paginator->sort('saldoVenta'); ?></th>
						<th class="actions"></th>
					</tr>
				</thead>
				<tbody>
				<?php foreach ($pagos as $pago): ?>
					<tr>
						<td><?php echo h($pago['Pago']['id']); ?>&nbsp;</td>
								<td>
			<?php echo $this->Html->link($pago['Venta']['id'], array('controller' => 'ventas', 'action' => 'view', $pago['Venta']['id'])); ?>
		</td>
						<td><?php echo h($pago['Pago']['fechaPago']); ?>&nbsp;</td>
						<td><?php echo h($pago['Pago']['tipoPago']); ?>&nbsp;</td>
						<td><?php echo h($pago['Pago']['montoPago']); ?>&nbsp;</td>
						<td><?php echo h($pago['Pago']['notas']); ?>&nbsp;</td>
						<td><?php echo h($pago['Pago']['saldoVenta']); ?>&nbsp;</td>
						<td class="actions">
							<?php echo $this->Html->link('<span class="glyphicon glyphicon-search"></span>', array('action' => 'view', $pago['Pago']['id']), array('escape' => false)); ?>
							<?php echo $this->Html->link('<span class="glyphicon glyphicon-edit"></span>', array('action' => 'edit', $pago['Pago']['id']), array('escape' => false)); ?>
							<?php echo $this->Form->postLink('<span class="glyphicon glyphicon-remove"></span>', array('action' => 'delete', $pago['Pago']['id']), array('escape' => false), __('Esta seguro de eliminar # %s?', $pago['Pago']['id'])); ?>
						</td>
					</tr>
				<?php endforeach; ?>
				</tbody>
			</table>

			<p>
				<small><?php echo $this->Paginator->counter(array('format' => __('Pagina numero {:page} de {:pages}, viendo el registro{:current} del total de registro{:count} , comenzando con el registo {:start}, hasta el registro nro {:end}')));?></small>
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