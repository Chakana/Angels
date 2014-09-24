<div class="productos form">

	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo __('Modificar Producto'); ?></h1>
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

																<li><?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;Borrar Producto'), array('action' => 'delete', $this->Form->value('Producto.id')), array('escape' => false), __('Are you sure you want to delete # %s?', $this->Form->value('Producto.id'))); ?></li>
																<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;Ver Productos'), array('action' => 'index'), array('escape' => false)); ?></li>
									<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;Ver Inventario de Productos'), array('controller' => 'inventarioproductos', 'action' => 'index'), array('escape' => false)); ?> </li>
		
							</ul>
						</div>
					</div>
				</div>			
		</div><!-- end col md 3 -->
		<div class="col-md-9">
			<?php echo $this->Form->create('Producto', array('role' => 'form')); ?>

				<div class="form-group">
					<?php echo $this->Form->input('id', array('class' => 'form-control', 'placeholder' => 'Id'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('nombreProducto', array('class' => 'form-control', 'placeholder' => 'NombreProducto'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('descripcionProducto', array('class' => 'form-control', 'placeholder' => 'DescripcionProducto'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('categoria', array('class' => 'form-control', 'placeholder' => 'Categoria'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->submit(__('Grabar'), array('class' => 'btn btn-primary')); ?>
				</div>

			<?php echo $this->Form->end() ?>

		</div><!-- end col md 12 -->
	</div><!-- end row -->
</div>
