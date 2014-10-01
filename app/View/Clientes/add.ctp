<div class="clientes form">

	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo __('Nuevo Cliente'); ?></h1>
			</div>
		</div>
	</div>



	<div class="row">
		<div class="col-md-3">
			<div class="actions">
				<div class="panel panel-default">
					<div class="panel-heading">Actions</div>
						<div class="panrel-body">
							<ul class="nav nav-pills nav-stacked">

																<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;Ver Clientes'), array('action' => 'index'), array('escape' => false)); ?></li>
									<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;Ver Localizaciones'), array('controller' => 'localizaciones', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;Nueva Localizacion'), array('controller' => 'localizaciones', 'action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;Ver Usuarios'), array('controller' => 'users', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;Nuevo Usuario'), array('controller' => 'users', 'action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;Ver Ventas'), array('controller' => 'ventas', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;Nueva Venta'), array('controller' => 'ventas', 'action' => 'add'), array('escape' => false)); ?> </li>
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
					<?php echo $this->Form->input('cedulaIdentidad', array('class' => 'form-control', 'placeholder' => 'Cedula de Identidad'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('ciudad', array('class' => 'form-control', 'placeholder' => 'Ciudad Id'));?>
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
