<div class="encargadosalmacenes form">

	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo __('Edit Encargadosalmacene'); ?></h1>
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

																<li><?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;Delete'), array('action' => 'delete', $this->Form->value('Encargadosalmacene.id')), array('escape' => false), __('Are you sure you want to delete # %s?', $this->Form->value('Encargadosalmacene.id'))); ?></li>
																<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List Encargadosalmacenes'), array('action' => 'index'), array('escape' => false)); ?></li>
									<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List Users'), array('controller' => 'users', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New User'), array('controller' => 'users', 'action' => 'add'), array('escape' => false)); ?> </li>
							</ul>
						</div>
					</div>
				</div>			
		</div><!-- end col md 3 -->
		<div class="col-md-9">
			<?php echo $this->Form->create('Encargadosalmacene', array('role' => 'form')); ?>

				<div class="form-group">
					<?php echo $this->Form->input('id', array('class' => 'form-control', 'placeholder' => 'Id'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('nombreEncargado', array('class' => 'form-control', 'placeholder' => 'NombreEncargado'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('fechaRegistroEncargado', array('class' => 'form-control', 'placeholder' => 'FechaRegistroEncargado'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('fechaModificacionEncargado', array('class' => 'form-control', 'placeholder' => 'FechaModificacionEncargado'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('DireccionEncargado', array('class' => 'form-control', 'placeholder' => 'DireccionEncargado'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('documentoIdentidad', array('class' => 'form-control', 'placeholder' => 'DocumentoIdentidad'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('fechaNacimiento', array('class' => 'form-control', 'placeholder' => 'FechaNacimiento'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('telefonoEncargado', array('class' => 'form-control', 'placeholder' => 'TelefonoEncargado'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('personaReferencia', array('class' => 'form-control', 'placeholder' => 'PersonaReferencia'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('direccionPersonaReferencia', array('class' => 'form-control', 'placeholder' => 'DireccionPersonaReferencia'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('telefonoPersonaReferencia', array('class' => 'form-control', 'placeholder' => 'TelefonoPersonaReferencia'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('user_id', array('class' => 'form-control', 'placeholder' => 'User Id'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->submit(__('Submit'), array('class' => 'btn btn-default')); ?>
				</div>

			<?php echo $this->Form->end() ?>

		</div><!-- end col md 12 -->
	</div><!-- end row -->
</div>
