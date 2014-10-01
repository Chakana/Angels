<div class="clientes form">

	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo __('Editar Cliente'); ?></h1>
			</div>
		</div>
	</div>



	<div class="row">
		<div class="col-md-3">
			<div class="actions">
				<div class="panel panel-default">
					<div class="panel-heading">Acciones</div>
						<div class="panel-body">
							<ul class="nav nav-pills nav-stacked">

								<li><?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;Borrar'), array('action' => 'delete', $this->Form->value('Cliente.id')), array('escape' => false), __('Estas seguro de querer eliminar# %s?', $this->Form->value('Cliente.id'))); ?></li>
								<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;Listar Clientes'), array('action' => 'index'), array('escape' => false)); ?></li>
									
								<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;Listar Usuarios'), array('controller' => 'users', 'action' => 'index'), array('escape' => false)); ?> </li>
								<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;Nuevo Usuario'), array('controller' => 'users', 'action' => 'add'), array('escape' => false)); ?> </li>
								<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;Listar Ventas'), array('controller' => 'ventas', 'action' => 'index'), array('escape' => false)); ?> </li>
								<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;Nuevo Venta'), array('controller' => 'ventas', 'action' => 'add'), array('escape' => false)); ?> </li>
							</ul>
						</div>
					</div>
				</div>			
		</div><!-- end col md 3 -->
		<div class="col-md-9">
			<?php echo $this->Form->create('Cliente', array('role' => 'form')); ?>

				<div class="form-group">
					<?php echo $this->Form->input('id', array('class' => 'form-control', 'placeholder' => 'Id'));?>
				</div>
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
					<?php echo $this->Form->input('cedulaIdentidad', array('class' => 'form-control', 'placeholder' => 'Cedula de Identidad'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('ciudad', array('class' => 'form-control', 'placeholder' => 'Ciudad'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('user_id', array('class' => 'form-control', 'placeholder' => 'User Id'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->submit(__('Grabar'), array('class' => 'btn btn-success')); ?>
				</div>

			<?php echo $this->Form->end() ?>

		</div><!-- end col md 12 -->
	</div><!-- end row -->
</div>
