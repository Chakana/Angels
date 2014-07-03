<div class="movimientoinsumos form">

	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo __('Edit Movimientoinsumo'); ?></h1>
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

																<li><?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;Delete'), array('action' => 'delete', $this->Form->value('Movimientoinsumo.id')), array('escape' => false), __('Are you sure you want to delete # %s?', $this->Form->value('Movimientoinsumo.id'))); ?></li>
																<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List Movimientoinsumos'), array('action' => 'index'), array('escape' => false)); ?></li>
									<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List Insumos'), array('controller' => 'insumos', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New Insumo'), array('controller' => 'insumos', 'action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List Almacenes'), array('controller' => 'almacenes', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New Almacene'), array('controller' => 'almacenes', 'action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List Encargados Almacenes'), array('controller' => 'encargados_almacenes', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New Encargados Almacene'), array('controller' => 'encargados_almacenes', 'action' => 'add'), array('escape' => false)); ?> </li>
							</ul>
						</div>
					</div>
				</div>			
		</div><!-- end col md 3 -->
		<div class="col-md-9">
			<?php echo $this->Form->create('Movimientoinsumo', array('role' => 'form')); ?>

				<div class="form-group">
					<?php echo $this->Form->input('id', array('class' => 'form-control', 'placeholder' => 'Id'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('insumo_id', array('class' => 'form-control', 'placeholder' => 'Insumo Id'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('almacene_id', array('class' => 'form-control', 'placeholder' => 'Almacene Id'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('encargadosAlmacene_id', array('class' => 'form-control', 'placeholder' => 'EncargadosAlmacene Id'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('cantidad', array('class' => 'form-control', 'placeholder' => 'Cantidad'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('tipoMovimiento', array('class' => 'form-control', 'placeholder' => 'TipoMovimiento'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('fechaMovimiento', array('class' => 'form-control', 'placeholder' => 'FechaMovimiento'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->submit(__('Submit'), array('class' => 'btn btn-default')); ?>
				</div>

			<?php echo $this->Form->end() ?>

		</div><!-- end col md 12 -->
	</div><!-- end row -->
</div>
