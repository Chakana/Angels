<div class="insumos form">

	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo __('Edit Insumo'); ?></h1>
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

																<li><?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;Delete'), array('action' => 'delete', $this->Form->value('Insumo.id')), array('escape' => false), __('Are you sure you want to delete # %s?', $this->Form->value('Insumo.id'))); ?></li>
																<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List Insumos'), array('action' => 'index'), array('escape' => false)); ?></li>
									<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List Almacenes'), array('controller' => 'almacenes', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New Almacene'), array('controller' => 'almacenes', 'action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List Movimientoinsumos'), array('controller' => 'movimientoinsumos', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New Movimientoinsumo'), array('controller' => 'movimientoinsumos', 'action' => 'add'), array('escape' => false)); ?> </li>
							</ul>
						</div>
					</div>
				</div>			
		</div><!-- end col md 3 -->
		<div class="col-md-9">
			<?php echo $this->Form->create('Insumo', array('role' => 'form')); ?>

				<div class="form-group">
					<?php echo $this->Form->input('id', array('class' => 'form-control', 'placeholder' => 'Id'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('nombreInsumo', array('class' => 'form-control', 'placeholder' => 'NombreInsumo'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('fechaRegistroInsumo', array('class' => 'form-control', 'placeholder' => 'FechaRegistroInsumo'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('fechaModificacionInsumo', array('class' => 'form-control', 'placeholder' => 'FechaModificacionInsumo'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('cantidad', array('class' => 'form-control', 'placeholder' => 'Cantidad'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('categoria', array('class' => 'form-control', 'placeholder' => 'Categoria'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('almacene_id', array('class' => 'form-control', 'placeholder' => 'Almacene Id'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->submit(__('Submit'), array('class' => 'btn btn-default')); ?>
				</div>

			<?php echo $this->Form->end() ?>

		</div><!-- end col md 12 -->
	</div><!-- end row -->
</div>
