<div class="clientes form">

	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo __('Add Cliente'); ?></h1>
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

																<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List Clientes'), array('action' => 'index'), array('escape' => false)); ?></li>
									<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List Localizaciones'), array('controller' => 'localizaciones', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New Localizacione'), array('controller' => 'localizaciones', 'action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List Users'), array('controller' => 'users', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New User'), array('controller' => 'users', 'action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List Ventas'), array('controller' => 'ventas', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New Venta'), array('controller' => 'ventas', 'action' => 'add'), array('escape' => false)); ?> </li>
							</ul>
						</div>
					</div>
				</div>			
		</div><!-- end col md 3 -->
		<div class="col-md-9">
			<?php echo $this->Form->create('Cliente', array('role' => 'form')); ?>

				<div class="form-group">
					<?php echo $this->Form->input('nombreCliente', array('class' => 'form-control', 'placeholder' => 'NombreCliente'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('direccionPrincipal', array('class' => 'form-control', 'placeholder' => 'DireccionPrincipal'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('telefonoFijo', array('class' => 'form-control', 'placeholder' => 'TelefonoFijo'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('celular', array('class' => 'form-control', 'placeholder' => 'Celular'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('fechaRegistro', array('class' => 'form-control', 'placeholder' => 'FechaRegistro'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('fechaModificacion', array('class' => 'form-control', 'placeholder' => 'FechaModificacion'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('fechaNacimiento', array('class' => 'form-control', 'placeholder' => 'FechaNacimiento'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('localizacione_id', array('class' => 'form-control', 'placeholder' => 'Localizacione Id'));?>
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
