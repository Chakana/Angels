<div class="pagos form">


	<div class="row">
		
		<div class="col-md-12">
		<?php if($estadoPagado=='OK'){ ?>
			<?php echo $this->Form->create('Pago', array('role' => 'form')); ?>
				
				<div class="form-group">
					<?php echo $this->Form->input('fechaPago', array('class' => 'form-control', 'placeholder' => 'FechaPago','type'=>'hidden'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('tipoPago', array('class' => 'form-control', 'placeholder' => 'TipoPago','default' => 'EFECTIVO','type'=>'hidden'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('montoPago', array('class' => 'form-control', 'placeholder' => 'MontoPago'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('notas', array('class' => 'form-control', 'placeholder' => 'Notas'));?>
				</div>				
				<div class="form-group">
					<?php echo $this->Form->submit(__('Submit'), array('class' => 'btn btn-default')); ?>
				</div>

			<?php echo $this->Form->end() ?>
		<?php }elseif ($estadoPagado=='PAGADO') { ?>
				<div class="alert alert-danger" role="alert">Esta venta ya esta cancelada,no puede efectuar mas pagos.</div>
		<?php }elseif ($estadoPagado=='MONTO_ERROR') {?>
				<div class="alert alert-danger" role="alert">Existe un error en el monto, no puede ser mayor al total de la venta.</div>
				<?php echo $this->Form->create('Pago', array('role' => 'form')); ?>
				
				<div class="form-group">
					<?php echo $this->Form->input('fechaPago', array('class' => 'form-control', 'placeholder' => 'FechaPago','type'=>'hidden'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('tipoPago', array('class' => 'form-control', 'placeholder' => 'TipoPago','default' => 'EFECTIVO','type'=>'hidden'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('montoPago', array('class' => 'form-control', 'placeholder' => 'MontoPago'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('notas', array('class' => 'form-control', 'placeholder' => 'Notas'));?>
				</div>				
				<div class="form-group">
					<?php echo $this->Form->submit(__('Submit'), array('class' => 'btn btn-default')); ?>
				</div>

			<?php echo $this->Form->end() ?>
		<?php }elseif ($estadoPagado=='PAGOHECHO') {?>
				<div class="alert alert-success" role="alert">Pago registrado correctamente.</div>
		<?php }elseif ($estadoPagado=='ERROR') {?>
				<div class="alert alert-danger" role="alert">Existe un error al registrar el pago, favor reintente nuevamente.</div>
				<?php echo $this->Form->create('Pago', array('role' => 'form')); ?>
				
				<div class="form-group">
					<?php echo $this->Form->input('fechaPago', array('class' => 'form-control', 'placeholder' => 'FechaPago','type'=>'hidden'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('tipoPago', array('class' => 'form-control', 'placeholder' => 'TipoPago','default' => 'EFECTIVO','type'=>'hidden'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('montoPago', array('class' => 'form-control', 'placeholder' => 'MontoPago'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('notas', array('class' => 'form-control', 'placeholder' => 'Notas'));?>
				</div>				
				<div class="form-group">
					<?php echo $this->Form->submit(__('Submit'), array('class' => 'btn btn-default')); ?>
				</div>
		<?php }?>

		</div><!-- end col md 12 -->
	</div><!-- end row -->
</div>
