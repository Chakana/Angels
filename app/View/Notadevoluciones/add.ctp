<div class="notadevoluciones form">
	<div class="row">		
		<div class="col-md-12">
		<div id="formNota">
			<?php if($estadoNota=='OK'){ ?>
			<?php echo $this->Form->create('Notadevolucione', array('role' => 'form')); ?>				
				<div class="form-group">
					<?php echo $this->Form->input('producto_id', array('class' => 'form-control', 'placeholder' => 'Producto Id'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('cantidad', array('class' => 'form-control', 'placeholder' => 'Cantidad'));?>
				</div>				
				<div class="form-group">
					<?php echo $this->Js->submit('Enviar', array(  //create 'ajax' save button
						    'update' => '#formNota','class'=>'btn btn-success btnVenta'  //id of DOM element to update with selector
						    ));?>					
				</div>
			<?php echo $this->Form->end();echo $this->Js->writeBuffer(); ?>
			<?php }elseif ($estadoNota=='NOTA_GRABADA') {?>
					<div class="alert alert-success" role="alert">Nota de devolucion Creada satisfactoriamente.</div>
			<?php }elseif ($estadoNota=='ERROR_NOTA') {?>
					<div class="alert alert-danger" role="alert">Error al guardar la nota de devolucion, por favor intente de nuevo.</div>
						<?php echo $this->Form->create('Notadevolucione', array('role' => 'form')); ?>				
					<div class="form-group">
						<?php echo $this->Form->input('producto_id', array('class' => 'form-control', 'placeholder' => 'Producto Id'));?>
					</div>
					<div class="form-group">
						<?php echo $this->Form->input('cantidad', array('class' => 'form-control', 'placeholder' => 'Cantidad'));?>
					</div>				
					<div class="form-group">
						<?php echo $this->Js->submit('Enviar', array(  //create 'ajax' save button
							    'update' => '#formNota','class'=>'btn btn-success btnVenta'  //id of DOM element to update with selector
							    ));?>					
					</div>
					<?php echo $this->Form->end();echo $this->Js->writeBuffer(); ?>
				<?php }?>
		</div>
		
		</div><!-- end col md 12 -->
	</div><!-- end row -->
</div>
