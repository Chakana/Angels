<div class="almacenes form">

	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo __('Editar Almacen'); ?></h1>
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

																<li><?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;Delete'), array('action' => 'delete', $this->Form->value('Almacene.id')), array('escape' => false), __('Are you sure you want to delete # %s?', $this->Form->value('Almacene.id'))); ?></li>
																<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List Almacenes'), array('action' => 'index'), array('escape' => false)); ?></li>
									<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List Encargados Almacenes'), array('controller' => 'encargados_almacenes', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;Nuevo Encargado Almacen'), array('controller' => 'encargados_almacenes', 'action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;Listar Insumos'), array('controller' => 'insumos', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;Nuevo Insumo'), array('controller' => 'insumos', 'action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;Listar Movimientoinsumos'), array('controller' => 'movimientoinsumos', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;Nuevo Movimientoinsumo'), array('controller' => 'movimientoinsumos', 'action' => 'add'), array('escape' => false)); ?> </li>
							</ul>
						</div>
					</div>
				</div>			
		</div><!-- end col md 3 -->
		<div class="col-md-9">
			<?php echo $this->Form->create('Almacene', array('role' => 'form')); ?>

				<div class="form-group">
					<?php echo $this->Form->input('id', array('class' => 'form-control', 'placeholder' => 'Id'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('descripcion', array('class' => 'form-control', 'placeholder' => 'Descripcion'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('DireccionAlmacen', array('class' => 'form-control', 'placeholder' => 'DireccionAlmacen'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('fechaRegistroAlmacen', array('class' => 'form-control', 'placeholder' => 'FechaRegistroAlmacen'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('fechaModificacion', array('class' => 'form-control', 'placeholder' => 'FechaModificacion'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('encargadosAlmacene_id', array('class' => 'form-control', 'placeholder' => 'EncargadosAlmacene Id'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->submit(__('Submit'), array('class' => 'btn btn-default')); ?>
				</div>

			<?php echo $this->Form->end() ?>

		</div><!-- end col md 12 -->
	</div><!-- end row -->
</div>
