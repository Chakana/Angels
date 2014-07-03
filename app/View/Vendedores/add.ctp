<div class="vendedores form">

	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo __('Add Vendedore'); ?></h1>
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

																<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List Vendedores'), array('action' => 'index'), array('escape' => false)); ?></li>
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
			<?php echo $this->Form->create('Vendedore', array('role' => 'form')); ?>

				<div class="form-group">
					<?php echo $this->Form->input('nombreVendedor', array('class' => 'form-control', 'placeholder' => 'NombreVendedor'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('fechaNacimiento', array('class' => 'form-control', 'placeholder' => 'FechaNacimiento'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('fechaRegistro', array('class' => 'form-control', 'placeholder' => 'FechaRegistro'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('fechaModificacion', array('class' => 'form-control', 'placeholder' => 'FechaModificacion'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('DomicilioVendedor', array('class' => 'form-control', 'placeholder' => 'DomicilioVendedor'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('telefonoVendedor', array('class' => 'form-control', 'placeholder' => 'TelefonoVendedor'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('documentoIdentidad', array('class' => 'form-control', 'placeholder' => 'DocumentoIdentidad'));?>
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
