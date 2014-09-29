<div class="ventadetalles index">

	



	<div class="row">

		<div class="col-md-12">
			<h1><?php echo h('Total de Venta:'.$sumaVentaTotal);?></h1>
			<table cellpadding="0" cellspacing="0" class="table table-striped" >
				<thead>
					<tr>
						<th><?php echo $this->Paginator->sort('id'); ?></th>
						<th><?php echo $this->Paginator->sort('producto'); ?></th>
						<th><?php echo $this->Paginator->sort('cantidad'); ?></th>
						<th><?php echo $this->Paginator->sort('precio Unitario'); ?></th>
						<th><?php echo $this->Paginator->sort('precio Total'); ?></th>
						<th class="actions"></th>
					</tr>
				</thead>
				<tbody>
				<?php foreach ($ventadetalles as $ventadetalle): ?>
					<tr>
						<td><?php echo h($ventadetalle['Ventadetalle']['id']); ?>&nbsp;</td>								
								<td>
			<?php echo $this->Html->link($ventadetalle['Producto']['nombreProducto'], array('controller' => 'productos', 'action' => 'view', $ventadetalle['Producto']['id'])); ?>
		</td>
						<td><?php echo h($ventadetalle['Ventadetalle']['cantidad']); ?>&nbsp;</td>
						<td><?php echo h($ventadetalle['Ventadetalle']['precioUnitario']); ?>&nbsp;</td>
						<td><?php echo h($ventadetalle['Ventadetalle']['precioTotal']); ?>&nbsp;</td>
						<td class="actions">
							<?php echo $this->Html->link('<span class="glyphicon glyphicon-search"></span>', array('action' => 'view', $ventadetalle['Ventadetalle']['id']), array('escape' => false)); ?>
							<?php echo $this->Html->link('<span class="glyphicon glyphicon-edit"></span>', array('action' => 'edit', $ventadetalle['Ventadetalle']['id']), array('escape' => false)); ?>
							<?php echo $this->Form->postLink('<span class="glyphicon glyphicon-remove"></span>', array('action' => 'delete', $ventadetalle['Ventadetalle']['id']), array('escape' => false), __('Esta seguro de eliminar # %s?', $ventadetalle['Ventadetalle']['id'])); ?>
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