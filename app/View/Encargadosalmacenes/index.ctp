<div class="encargadosalmacenes index">

	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo __('Encargadosalmacenes'); ?></h1>
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
								<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New Encargadosalmacene'), array('action' => 'add'), array('escape' => false)); ?></li>
								<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List Users'), array('controller' => 'users', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New User'), array('controller' => 'users', 'action' => 'add'), array('escape' => false)); ?> </li>
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
						<th><?php echo $this->Paginator->sort('nombreEncargado'); ?></th>
						<th><?php echo $this->Paginator->sort('fechaRegistroEncargado'); ?></th>
						<th><?php echo $this->Paginator->sort('fechaModificacionEncargado'); ?></th>
						<th><?php echo $this->Paginator->sort('DireccionEncargado'); ?></th>
						<th><?php echo $this->Paginator->sort('documentoIdentidad'); ?></th>
						<th><?php echo $this->Paginator->sort('fechaNacimiento'); ?></th>
						<th><?php echo $this->Paginator->sort('telefonoEncargado'); ?></th>
						<th><?php echo $this->Paginator->sort('personaReferencia'); ?></th>
						<th><?php echo $this->Paginator->sort('direccionPersonaReferencia'); ?></th>
						<th><?php echo $this->Paginator->sort('telefonoPersonaReferencia'); ?></th>
						<th><?php echo $this->Paginator->sort('user_id'); ?></th>
						<th class="actions"></th>
					</tr>
				</thead>
				<tbody>
				<?php foreach ($encargadosalmacenes as $encargadosalmacene): ?>
					<tr>
						<td><?php echo h($encargadosalmacene['Encargadosalmacene']['id']); ?>&nbsp;</td>
						<td><?php echo h($encargadosalmacene['Encargadosalmacene']['nombreEncargado']); ?>&nbsp;</td>
						<td><?php echo h($encargadosalmacene['Encargadosalmacene']['fechaRegistroEncargado']); ?>&nbsp;</td>
						<td><?php echo h($encargadosalmacene['Encargadosalmacene']['fechaModificacionEncargado']); ?>&nbsp;</td>
						<td><?php echo h($encargadosalmacene['Encargadosalmacene']['DireccionEncargado']); ?>&nbsp;</td>
						<td><?php echo h($encargadosalmacene['Encargadosalmacene']['documentoIdentidad']); ?>&nbsp;</td>
						<td><?php echo h($encargadosalmacene['Encargadosalmacene']['fechaNacimiento']); ?>&nbsp;</td>
						<td><?php echo h($encargadosalmacene['Encargadosalmacene']['telefonoEncargado']); ?>&nbsp;</td>
						<td><?php echo h($encargadosalmacene['Encargadosalmacene']['personaReferencia']); ?>&nbsp;</td>
						<td><?php echo h($encargadosalmacene['Encargadosalmacene']['direccionPersonaReferencia']); ?>&nbsp;</td>
						<td><?php echo h($encargadosalmacene['Encargadosalmacene']['telefonoPersonaReferencia']); ?>&nbsp;</td>
								<td>
			<?php echo $this->Html->link($encargadosalmacene['User']['id'], array('controller' => 'users', 'action' => 'view', $encargadosalmacene['User']['id'])); ?>
		</td>
						<td class="actions">
							<?php echo $this->Html->link('<span class="glyphicon glyphicon-search"></span>', array('action' => 'view', $encargadosalmacene['Encargadosalmacene']['id']), array('escape' => false)); ?>
							<?php echo $this->Html->link('<span class="glyphicon glyphicon-edit"></span>', array('action' => 'edit', $encargadosalmacene['Encargadosalmacene']['id']), array('escape' => false)); ?>
							<?php echo $this->Form->postLink('<span class="glyphicon glyphicon-remove"></span>', array('action' => 'delete', $encargadosalmacene['Encargadosalmacene']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $encargadosalmacene['Encargadosalmacene']['id'])); ?>
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