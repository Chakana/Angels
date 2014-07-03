<div class="encargadosalmacenes view">
	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo __('Encargadosalmacene'); ?></h1>
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
									<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>&nbsp&nbsp;Edit Encargadosalmacene'), array('action' => 'edit', $encargadosalmacene['Encargadosalmacene']['id']), array('escape' => false)); ?> </li>
		<li><?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;Delete Encargadosalmacene'), array('action' => 'delete', $encargadosalmacene['Encargadosalmacene']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $encargadosalmacene['Encargadosalmacene']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Encargadosalmacenes'), array('action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New Encargadosalmacene'), array('action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Users'), array('controller' => 'users', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New User'), array('controller' => 'users', 'action' => 'add'), array('escape' => false)); ?> </li>
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
			<?php echo h($encargadosalmacene['Encargadosalmacene']['id']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('NombreEncargado'); ?></th>
		<td>
			<?php echo h($encargadosalmacene['Encargadosalmacene']['nombreEncargado']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('FechaRegistroEncargado'); ?></th>
		<td>
			<?php echo h($encargadosalmacene['Encargadosalmacene']['fechaRegistroEncargado']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('FechaModificacionEncargado'); ?></th>
		<td>
			<?php echo h($encargadosalmacene['Encargadosalmacene']['fechaModificacionEncargado']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('DireccionEncargado'); ?></th>
		<td>
			<?php echo h($encargadosalmacene['Encargadosalmacene']['DireccionEncargado']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('DocumentoIdentidad'); ?></th>
		<td>
			<?php echo h($encargadosalmacene['Encargadosalmacene']['documentoIdentidad']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('FechaNacimiento'); ?></th>
		<td>
			<?php echo h($encargadosalmacene['Encargadosalmacene']['fechaNacimiento']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('TelefonoEncargado'); ?></th>
		<td>
			<?php echo h($encargadosalmacene['Encargadosalmacene']['telefonoEncargado']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('PersonaReferencia'); ?></th>
		<td>
			<?php echo h($encargadosalmacene['Encargadosalmacene']['personaReferencia']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('DireccionPersonaReferencia'); ?></th>
		<td>
			<?php echo h($encargadosalmacene['Encargadosalmacene']['direccionPersonaReferencia']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('TelefonoPersonaReferencia'); ?></th>
		<td>
			<?php echo h($encargadosalmacene['Encargadosalmacene']['telefonoPersonaReferencia']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('User'); ?></th>
		<td>
			<?php echo $this->Html->link($encargadosalmacene['User']['id'], array('controller' => 'users', 'action' => 'view', $encargadosalmacene['User']['id'])); ?>
			&nbsp;
		</td>
</tr>
				</tbody>
			</table>

		</div><!-- end col md 9 -->

	</div>
</div>

