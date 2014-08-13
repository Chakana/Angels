<div class="localizaciones form">

	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo __('Add Localizacione'); ?></h1>
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

																<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List Localizaciones'), array('action' => 'index'), array('escape' => false)); ?></li>
									<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List Clientes'), array('controller' => 'clientes', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;Nuevo Cliente'), array('controller' => 'clientes', 'action' => 'add'), array('escape' => false)); ?> </li>
							</ul>
						</div>
					</div>
				</div>			
		</div><!-- end col md 3 -->
		<div class="col-md-9">
			<?php echo $this->Form->create('Localizacione', array('role' => 'form')); ?>

				<div class="form-group">
					<?php echo $this->Form->input('direccion', array('class' => 'form-control', 'placeholder' => 'Direccion'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('zona', array('class' => 'form-control', 'placeholder' => 'Zona'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('ciudad', array('class' => 'form-control', 'placeholder' => 'Ciudad'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('coordenadas', array('class' => 'form-control', 'placeholder' => 'Coordenadas'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->submit(__('Submit'), array('class' => 'btn btn-default')); ?>
				</div>

			<?php echo $this->Form->end() ?>

		</div><!-- end col md 12 -->
	</div><!-- end row -->
</div>
