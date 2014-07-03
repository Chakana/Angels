<div class="ventadetalles form">

	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo __('Add Ventadetalle'); ?></h1>
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

																<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List Ventadetalles'), array('action' => 'index'), array('escape' => false)); ?></li>
									<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List Ventas'), array('controller' => 'ventas', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New Venta'), array('controller' => 'ventas', 'action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List Productos'), array('controller' => 'productos', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New Producto'), array('controller' => 'productos', 'action' => 'add'), array('escape' => false)); ?> </li>
							</ul>
						</div>
					</div>
				</div>			
		</div><!-- end col md 3 -->
		<div class="col-md-9">
			<?php echo $this->Form->create('Ventadetalle', array('role' => 'form')); ?>

				<div class="form-group">
					<?php echo $this->Form->input('venta_id', array('class' => 'form-control', 'placeholder' => 'Venta Id'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('producto_id', array('class' => 'form-control', 'placeholder' => 'Producto Id'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('cantidad', array('class' => 'form-control', 'placeholder' => 'Cantidad'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('precioUnitario', array('class' => 'form-control', 'placeholder' => 'PrecioUnitario'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('precioTotal', array('class' => 'form-control', 'placeholder' => 'PrecioTotal'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->submit(__('Submit'), array('class' => 'btn btn-default')); ?>
				</div>

			<?php echo $this->Form->end() ?>

		</div><!-- end col md 12 -->
	</div><!-- end row -->
</div>
