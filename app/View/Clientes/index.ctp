<div class="clientes index">

	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo __('Clientes'); ?></h1>
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
								<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New Cliente'), array('action' => 'add'), array('escape' => false)); ?></li>
								<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List Localizaciones'), array('controller' => 'localizaciones', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New Localizacione'), array('controller' => 'localizaciones', 'action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List Users'), array('controller' => 'users', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New User'), array('controller' => 'users', 'action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List Ventas'), array('controller' => 'ventas', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New Venta'), array('controller' => 'ventas', 'action' => 'add'), array('escape' => false)); ?> </li>
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
						<th><?php echo $this->Paginator->sort('nombreCliente'); ?></th>
						<th><?php echo $this->Paginator->sort('direccionPrincipal'); ?></th>
						<th><?php echo $this->Paginator->sort('telefonoFijo'); ?></th>
						<th><?php echo $this->Paginator->sort('celular'); ?></th>
						<th><?php echo $this->Paginator->sort('fechaRegistro'); ?></th>
						<th><?php echo $this->Paginator->sort('fechaModificacion'); ?></th>
						<th><?php echo $this->Paginator->sort('fechaNacimiento'); ?></th>
						<th><?php echo $this->Paginator->sort('localizacione_id'); ?></th>
						<th><?php echo $this->Paginator->sort('user_id'); ?></th>
						<th class="actions"></th>
					</tr>
				</thead>
				<tbody>
				<?php foreach ($clientes as $cliente): ?>
					<tr>
						<td><?php echo h($cliente['Cliente']['id']); ?>&nbsp;</td>
						<td><?php echo h($cliente['Cliente']['nombreCliente']); ?>&nbsp;</td>
						<td><?php echo h($cliente['Cliente']['direccionPrincipal']); ?>&nbsp;</td>
						<td><?php echo h($cliente['Cliente']['telefonoFijo']); ?>&nbsp;</td>
						<td><?php echo h($cliente['Cliente']['celular']); ?>&nbsp;</td>
						<td><?php echo h($cliente['Cliente']['fechaRegistro']); ?>&nbsp;</td>
						<td><?php echo h($cliente['Cliente']['fechaModificacion']); ?>&nbsp;</td>
						<td><?php echo h($cliente['Cliente']['fechaNacimiento']); ?>&nbsp;</td>
								<td>
			<?php echo $this->Html->link($cliente['Localizacione']['id'], array('controller' => 'localizaciones', 'action' => 'view', $cliente['Localizacione']['id'])); ?>
		</td>
								<td>
			<?php echo $this->Html->link($cliente['User']['id'], array('controller' => 'users', 'action' => 'view', $cliente['User']['id'])); ?>
		</td>
						<td class="actions">
							<?php echo $this->Html->link('<span class="glyphicon glyphicon-search"></span>', array('action' => 'view', $cliente['Cliente']['id']), array('escape' => false)); ?>
							<?php echo $this->Html->link('<span class="glyphicon glyphicon-edit"></span>', array('action' => 'edit', $cliente['Cliente']['id']), array('escape' => false)); ?>
							<?php echo $this->Form->postLink('<span class="glyphicon glyphicon-remove"></span>', array('action' => 'delete', $cliente['Cliente']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $cliente['Cliente']['id'])); ?>
						</td>
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