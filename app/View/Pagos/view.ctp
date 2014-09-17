<div class="pagos view">
	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo __('Pago'); ?></h1>
			</div>
		</div>
	</div>

	<div class="row">

		<div class="col-md-3">
			<div class="actions">
				<div class="panel panel-default">
					<div class="panel-heading">Opciones</div>
						<div class="panel-body">
							<ul class="nav nav-pills nav-stacked">
									<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>&nbsp&nbsp;Edit Pago'), array('action' => 'edit', $pago['Pago']['id']), array('escape' => false)); ?> </li>
		<li><?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;Delete Pago'), array('action' => 'delete', $pago['Pago']['id']), array('escape' => false), __('Esta seguro de eliminar # %s?', $pago['Pago']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;Ver Pagos'), array('action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;Nuevo Pago'), array('action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;Ver Ventas'), array('controller' => 'ventas', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;Nueva Venta'), array('controller' => 'ventas', 'action' => 'add'), array('escape' => false)); ?> </li>
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
			<?php echo h($pago['Pago']['id']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Venta'); ?></th>
		<td>
			<?php echo $this->Html->link($pago['Venta']['id'], array('controller' => 'ventas', 'action' => 'view', $pago['Venta']['id'])); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('FechaPago'); ?></th>
		<td>
			<?php echo h($pago['Pago']['fechaPago']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('TipoPago'); ?></th>
		<td>
			<?php echo h($pago['Pago']['tipoPago']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('MontoPago'); ?></th>
		<td>
			<?php echo h($pago['Pago']['montoPago']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Notas'); ?></th>
		<td>
			<?php echo h($pago['Pago']['notas']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('SaldoVenta'); ?></th>
		<td>
			<?php echo h($pago['Pago']['saldoVenta']); ?>
			&nbsp;
		</td>
</tr>
				</tbody>
			</table>

		</div><!-- end col md 9 -->

	</div>
</div>

